<?php
$cate = '';
if(isset($_REQUEST['cate']) && $_REQUEST['cate']!='')
{
	$d_cate = $dbc->GetRecord("blog_category","*","slug = '".$_REQUEST['cate']."' ");
	$cate_id = " AND category = ".$d_cate['id'];
}

	$a=0;
	$sqls = $dbc->Query("select * from blogs where status > 0 ".$cate_id."  order by sort asc");//and heightlight =1
	$ar_photo = array();
	$ar_tt = array();
	$ar_lf= array();
	$ar_lf_hlotm = array();
	while($row = $dbc->Fetch($sqls))
	{
		$act = ($a==0)?'active':'';
		$photo = '/'.json_decode($row['photo_main'],true);
		$photo_hl_1 = '/'.json_decode($row['photo_hl_1'],true);
		array_push($ar_photo,imagePath($photo));
		array_push($ar_tt,$row['brief']);
		$urll = "/blog/" . strtolower(str_replace(" ", "-", $row['name']) ) . ".html";
		
		if($row['heightlight']==1)
		{
			$data_cate = $dbc->GetRecord("blog_category","*","id = '".$row['category']."'");
			$ar_lf[] = array(
				'photo' => $photo,
				'name' => string_len($row['name'],30),
				'brief' => base64_decode($row['brief'],true),
				'snippet_1' =>  string_len(base64_decode($row['snippet'],true),50),
				'snippet_2' =>  string_len(base64_decode($row['snippet_2'],true),50),
				'author' => dateType($row['day']).' | by '.$row['byname'],
				'category' => $data_cate['name'],
				'slug' => $data_cate['slug'],
				'link_post' => $urll
			);
		}
		if($row['hl_of_tm']==1)
		{
			$data_cate = $dbc->GetRecord("blog_category","*","id = '".$row['category']."'");
			$ar_lf_hlotm[] = array(
				'photo' => $photo_hl_1,
				'name' => $row['name'],
				'brief' => string_len(base64_decode($row['brief'],true),130),
				'snippet_1' =>  string_len(base64_decode($row['snippet'],true),50),
				'snippet_2' =>  string_len(base64_decode($row['snippet_2'],true),50),
				'author' => dateType($row['day']).' | by '.$row['byname'],
				'category' => $data_cate['name'],
				'slug' => $data_cate['slug'],
				'link_post' => $urll
			);
		}
		$a++;
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
							echo '<div  class="box_caro_text_cate"><a href="/blog" class="ls_sltopbut">Lifestyle</a><a href="lifestyle-category-'.$lf_slide['slug'].'.html" target="_blank" class="ls_sltopbut">'.$lf_slide['category'].'</a></div>';
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
          <button class="carousel-control-prev" type="button" data-bs-target="#top_lift_style" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#top_lift_style" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
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
<button class="carousel-control-prev caros ca_l" type="button" data-bs-target="#mob_top_lift_style" data-bs-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next caros ca_r" type="button" data-bs-target="#mob_top_lift_style" data-bs-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="visually-hidden">Next</span>
</button>
</div>

<?php /*?><div class="slider mob767">
<?php 
$a=0;
foreach($ar_lf as $lf_slide)
{
	echo '<div class="slide">';
		echo '<div  class="box_caro_text">';
                        echo '<div  class="box_caro_text_1">'.$lf_slide['snippet_1'].'</div>';
                        echo '<div  class="box_caro_text_2">'.$lf_slide['name'].'</div>';
                        echo '<div  class="box_caro_text_3">'.$lf_slide['snippet_2'].'</div>';
                        echo '<div  class="box_caro_text_4">'.$lf_slide['brief'].'</div>';
                        echo '<a href="#"><button class="box_caro_rmbut">read more </button></a>';
						echo '<div  class="box_caro_text_author">'.$lf_slide['author'].'</div>';
						echo '<div  class="box_caro_text_cate"><a href="/blog" class="ls_sltopbut">Lifestyle</a><a href="#" class="ls_sltopbut">'.$lf_slide['category'].'</a></div>';
						echo '<div  class="box_caro_share">';
						echo '<a href="" class="icon_share"><img src="../../upload/new_design/lifestyle/img-arc-facebook.png"  alt=""></a>';
						echo '<a href="" class="icon_share"><img src="../../upload/new_design/lifestyle/img-arc-twister.png"  alt=""></a>';
						echo '<a href="" class="icon_share"><img src="../../upload/new_design/lifestyle/img-arc-ig.png"   alt=""></a>';
						echo '</div>';
                    echo '</div>';
	echo '</div>';
	$a++;
}
?>
</div>

<style>
<?php 
$x=0;
$y=1;
foreach($ar_lf as $lf_slide)
{
	$time = ($x==0)?$x.'s':'-'.$x.'s';
	?>
	
    .slider .slide:nth-child(<?php echo $y;?>) {
	  background-image: url('<?php echo imagePath($lf_slide['photo']);?>');
	  animation-delay: <?php echo $time;?>;
	}
    
	<?php
    $x=$x+6.5;
	$y++;
}
?>
</style><?php */?>