<?php 
//$blogs = $dbc->GetRecord("blogs","*","id=".$_REQUEST['id']);
$sqlblogs = $dbc->Query("select * from blogs where id='".$_REQUEST['id']."'");
$blogs = $dbc->Fetch($sqlblogs);
$cate = $dbc->GetRecord("blog_category","*","id='".$blogs['category']."'");
$photo_share = json_decode($blogs['photo_main'],true);
//$photo = imagePath('/'.json_decode($blogs['photo_main'],true));
$urll = "/blog/" . strtolower(str_replace(" ", "-", $blogs['name']) ) . ".html";


$ar_lf= array();
$data_cate = $dbc->GetRecord("blog_category","*","id = '".$blogs['category']."'");
$cate_link = "/lifestyle-category-".$data_cate['slug'].'.html';
$photo = '/'.json_decode($blogs['photo_main'],true);
$ar_lf[] = array(
	'photo' => $photo,
	'name' => string_len($blogs['name'],30),
	'brief' => base64_decode($blogs['brief'],true),
	'snippet_1' =>  string_len(base64_decode($blogs['snippet'],true),50),
	'snippet_2' =>  string_len(base64_decode($blogs['snippet_2'],true),50),
	'author' => dateType($blogs['day']).' | by '.$blogs['byname'],
	'category' => $data_cate['name'],
	'slug' => $data_cate['slug'],
	'link_post' => $urll
);
			
//$user = $dbc->GetRecord("users","*","id=".$blogs['users']);
/*$sqluser = $dbc->Query("select * from users where id=".$blogs['users']);
$user = $dbc->Fetch($sqluser);*/
function string_len_2b($text,$amount)
{
	if(strlen($text)>$amount)
	{
		return substr($text,0,$amount).'...';
	}
	else
	{
		return $text;
	}
}
function dateType2($data)
{
	$y = substr($data,0,4);
	$m = substr($data,5,2);
	$d = substr($data,8,2);
	switch($m)
	{
		case'01':  $month = 'Jan';break;
		case'02':  $month = 'Feb';break;
		case'03':  $month = 'Mar';break;
		case'04':  $month = 'Apr';break;
		case'05':  $month = 'May';break;
		case'06':  $month = 'Jun';break;
		case'07':  $month = 'Jul';break;
		case'08':  $month = 'Aug';break;
		case'09':  $month = 'Sep';break;
		case'10':  $month = 'Oct';break;
		case'11':  $month = 'Nov';break;
		case'12':  $month = 'Dec';break;
	}
	return  $d.' '.$month .', '.$y;
}
?>
<div class="cov_slide2 web767">

    <div id="top_lift_style" class="carousel slide" data-bs-ride="carousel">
    <div class="lf_left_blue"></div>
        <div class="carousel-indicators lf">
            <?php
            $b=0;
            foreach($ar_lf as $lf_slide)
            {
                $ac = ($b==0)?'active':'';
                echo '<button type="button" data-bs-target="#top_lift_style" data-bs-slide-to="'.$b.'" class="'.$ac.'"  ></button>';
                $b++;
            }
            ?>
          </div>
          <div class="carousel-inner">
            <?php
            $c=0;
            foreach($ar_lf as $lf_slide)
            {
                $act = ($c==0)?'active':'';
                
                echo '<div class="carousel-item '.$act.'  ">';
                    echo '<img  src="'.imagePath($lf_slide['photo']).'" class="d-block w-100" alt="inspiringvillas cover">';// 
                    echo '<div  class="box_caro_text">';
						
							echo '<div  class="box_caro_text_1">'.$lf_slide['snippet_1'].'</div>';
							echo '<div  class="box_caro_text_2">'.$lf_slide['name'].'</div>';
							echo '<div  class="box_caro_text_3">'.$lf_slide['snippet_2'].'</div>';
							echo '<div  class="box_caro_text_4">'.$lf_slide['brief'].'</div>';
							echo '<a href="'.$lf_slide['link_post'].'"><button class="box_caro_rmbut">read more </button></a>';
							echo '<div  class="box_caro_text_author">'.$lf_slide['author'].'</div>';
							echo '<div  class="box_caro_text_cate"><a href="/blog" class="ls_sltopbut">Lifestyle</a><a href="'.$cate_link.'" target="_blank" class="ls_sltopbut">'.$lf_slide['category'].'</a></div>';
							echo '<div  class="box_caro_share">';
							echo '<a href="" class="icon_share"><img src="../../upload/new_design/lifestyle/img-arc-facebook.png"  alt=""></a>';
							echo '<a href="" class="icon_share"><img src="../../upload/new_design/lifestyle/img-arc-twister.png"  alt=""></a>';
							echo '<a href="" class="icon_share"><img src="../../upload/new_design/lifestyle/img-arc-ig.png"   alt=""></a>';
							echo '</div>';
						
                    echo '</div>';
                echo '</div>';
                $c++;
            }
            ?>
          </div>
          <!--<button class="carousel-control-prev" type="button" data-bs-target="#top_lift_style" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#top_lift_style" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>-->
    </div>
</div>






<div class="cov_mob_slide2 mob767">

    <div id="mob_top_lift_style" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators lf_mob">
            <?php
            $b=0;
            foreach($ar_lf as $lf_slide)
            {
                $ac = ($b==0)?'active':'';
                echo '<button type="button" data-bs-target="#mob_top_lift_style" data-bs-slide-to="'.$b.'" class="'.$ac.'"  ></button>';
                $b++;
            }
            ?>
          </div>
          <div class="carousel-inner">
            <?php
            $c=0;
            foreach($ar_lf as $lf_slide)
            {
                $act = ($c==0)?'active':'';
                
                echo '<div class="carousel-item '.$act.'  ">';
                    echo '<img  src="'.imagePath($lf_slide['photo']).'" class="d-block w-100" alt="inspiringvillas cover">';// 
                    echo '<div  class="box_caro_text">';
						echo '<div  class="box_caro_text_inside">';
							echo '<div  class="box_caro_text_1">'.$lf_slide['snippet_1'].'</div>';
							echo '<div  class="box_caro_text_2">'.$lf_slide['name'].'</div>';
							echo '<div  class="box_caro_text_3">'.$lf_slide['snippet_2'].'</div>';
							echo '<div  class="box_caro_text_4">'.$lf_slide['brief'].'</div>';
							
							echo '<div  class="box_caro_text_author">'.$lf_slide['author'].'</div>';
							echo '<div  class="box_caro_text_cate"><a href="/blog" class="ls_sltopbut">Lifestyle</a><a href="lifestyle-category-'.$lf_slide['slug'].'.html" target="_blank" class="ls_sltopbut">'.$lf_slide['category'].'</a></div>';
							echo '<div  class="box_caro_share">';
								echo '<a href="" class="icon_share"><img src="../../upload/new_design/lifestyle/img-arc-facebook.png"  alt=""></a>';
								echo '<a href="" class="icon_share"><img src="../../upload/new_design/lifestyle/img-arc-twister.png"  alt=""></a>';
								echo '<a href="" class="icon_share"><img src="../../upload/new_design/lifestyle/img-arc-ig.png"   alt=""></a>';
							echo '</div>';
							echo '<a href="#"><button class="box_caro_rmbut">read more </button></a>';
						echo '</div>';
					echo '</div>';
                echo '</div>';
                $c++;
            }
            ?>
          </div>
          
    </div>
<!--<button class="carousel-control-prev caros ca_l" type="button" data-bs-target="#mob_top_lift_style" data-bs-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next caros ca_r" type="button" data-bs-target="#mob_top_lift_style" data-bs-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="visually-hidden">Next</span>
</button>-->
</div>






