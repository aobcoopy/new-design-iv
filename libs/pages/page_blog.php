<?php
	$a=0;
	$sqls = $dbc->Query("select * from blogs where status > 0  order by sort asc");//and heightlight =1
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
		
		$data_cate = $dbc->GetRecord("blog_category","*","id = '".$row['category']."'");
		if($row['heightlight']==1)
		{
			$ar_lf[] = array(
				'photo' => $photo,
				'name' => string_len($row['name'],30),
				'brief' => base64_decode($row['brief'],true),
				'snippet_1' =>  string_len(base64_decode($row['snippet'],true),50),
				'snippet_2' =>  string_len(base64_decode($row['snippet_2'],true),50),
				'author' => dateType($row['day']).' | by '.$row['byname'],
				'category' => $data_cate['name']
			);
		}
		if($row['hl_of_tm']==1)
		{
			$ar_lf_hlotm[] = array(
				'photo' => $photo_hl_1,
				'name' => $row['name'],
				'brief' => string_len(base64_decode($row['brief'],true),130),
				'snippet_1' =>  string_len(base64_decode($row['snippet'],true),50),
				'snippet_2' =>  string_len(base64_decode($row['snippet_2'],true),50),
				'author' => dateType($row['day']).' | by '.$row['byname'],
				'category' => $data_cate['name']
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
                        echo '<div  class="box_caro_text_1">'.$lf_slide['snippet_1'].'</div>';
                        echo '<div  class="box_caro_text_2">'.$lf_slide['name'].'</div>';
                        echo '<div  class="box_caro_text_3">'.$lf_slide['snippet_2'].'</div>';
                        echo '<div  class="box_caro_text_4">'.$lf_slide['brief'].'</div>';
                        
						echo '<div  class="box_caro_text_author">'.$lf_slide['author'].'</div>';
						echo '<div  class="box_caro_text_cate"><a href="/blog" class="ls_sltopbut">Lifestyle</a><a href="#" class="ls_sltopbut">'.$lf_slide['category'].'</a></div>';
						echo '<div  class="box_caro_share">';
							echo '<a href="" class="icon_share"><img src="../../upload/new_design/lifestyle/img-arc-facebook.png"  alt=""></a>';
							echo '<a href="" class="icon_share"><img src="../../upload/new_design/lifestyle/img-arc-twister.png"  alt=""></a>';
							echo '<a href="" class="icon_share"><img src="../../upload/new_design/lifestyle/img-arc-ig.png"   alt=""></a>';
						echo '</div>';
						echo '<a href="#"><button class="box_caro_rmbut">read more </button></a>';
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


<?php include "libs/pages/search.php";?>


<div class="container-fluid lf_highlight">
	<div class="row justify-content-center">
    	<div class="col-7">
        	<div class="hl_tt">highlight of the month on this time</div>
            <div class="hl_des">A private beach villa is the true definition of an island escape done right. Our collection of Koh Samui villas offers
pristine luxury A private beach villa is the true definition</div>
        </div>
    </div>
    <div class="row justify-content-end">
        <div class="col-12">
        	
            
            
            
            <div class="lf_carousel owl-carousel owl-theme">
            <?php
			$c=0;
			foreach($ar_lf_hlotm as $hl_of_tm)
			{
				echo '<div class="item hlotm_sl_box" data-hash="'.$c.'">';
					echo '<img data-src="'.imagePath($hl_of_tm['photo']).'" class=" lazy" alt="">';
					echo '<div class="lf_hlotm_box">';
						echo '<div class="hlotm_tt">'.$hl_of_tm['name'].'</div>';
						echo '<div class="hlotm_author_box">';
							echo '<div class="hlotm_author">'.$hl_of_tm['author'].'</div>';
							echo '<div class="hlotm_cate"><a href="/blog" class="ls_sltopbut">Lifestyle</a><a href="#" class="ls_sltopbut">'.$lf_slide['category'].'</a></div>';
						echo '</div>';
						echo '<div class="hlotm_des">'.$hl_of_tm['brief'].'</div>';
						echo '<div class="hlotm_share">';
							echo '<a href="" class="hlotm_ico_share"><img src="../../upload/new_design/lifestyle/img-arc-facebook-small.png" width="40px" alt=""></a>';
							echo '<a href="" class="hlotm_ico_share"><img src="../../upload/new_design/lifestyle/img-arc-twister-small.png" width="40" alt=""></a>';
							echo '<a href="" class="hlotm_ico_share"><img src="../../upload/new_design/lifestyle/img-arc-ig-small.png" width="40" alt=""></a>';
						echo '</div>';
						echo '<div class="hlotm_readmore">READ MORE...</div>';
					echo '</div>';
				echo '</div>';
				$c++;
			}
			?>
                
            </div>
            
            
        </div>
        <?php /*?><div class="col-12 lf_line">
        <?php for($i=0;$i<$c;$i++)
		{
			echo '<a class="btn_url" href="#'.$i.'"><button class="lf_dot"></button></a>';
		}
		?>
        </div><?php */?>
    </div>

</div>


<link rel="stylesheet" href="libs/css/owl/owl.carousel.min.css">
<link rel="stylesheet" href="libs/css/owl/owl.theme.default.min.css">
<script src="libs/js/owl/owl.carousel.min.js"></script>
<script>
$(document).ready(function(e) {
    $('.owl-next').click();
});
$('.lf_carousel').owlCarousel({
    loop:false,
    margin:30,
    nav:true,
	center:true,
	/*URLhashListener:true,
	autoplayHoverPause:true,
	startPosition: 'URLHash',*/
	//startPosition:3000,
	navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
</script>






<?php
$cate = $dbc->Query("select * from blog_category where status > 0 order by sort asc");
$x=0;
$bg = '';
while($line = $dbc->Fetch($cate))
{
	if($x==1)
	{
		$bg = 'ls_bg_right';
	}
	elseif($x==2)
	{
		$bg = 'ls_bg_left';
	}
	else
	{
		$bg = '';
	}
	$ex_name = $line['name'];//explode(" ",$line['name']);
	
	$tt_blog = $dbc->GetCount("blogs","category = '".$line['id']."' and status > 0");
	//echo $tt_blog;
	
	if($tt_blog>0)
	{
	$ls = $dbc->Query("select * from blogs where category = '".$line['id']."' and status > 0 order by created desc ");
	$y=0;
	$cate_id = 0;
	$ar_blog_1 = array();
	$ar_blog_all = array();
	while($res = $dbc->Fetch($ls))
	{
		$photo_main = '/'.json_decode($res['photo_main'],true);
		$img_photo_hl_1 = '/'.json_decode($res['photo_hl_1'],true);
		$img_photo_high = '/'.json_decode($res['photo_hl_2'],true);
		$name = string_len($res['name'],100);
		$author = dateType($res['day']).' | by '.$res['byname'];
		$des = string_len(base64_decode($res['brief'],true),150);
		$cate_name = $dbc->GetRecord("blog_category","*","id = '".$res['category']."'");
		$urll = "/blog/" . strtolower(str_replace(" ", "-", $name) ) . ".html";
		if($y==0)
		{
			$ar_blog_1[] = array(
				'id' => $res['id'],
				'photo_mail' => $photo_main,
				'img_photo_hl_1' => $img_photo_hl_1,
				'img_photo_high' => $img_photo_high,
				'name' => $name,
				'author' => $author,
				'des' => $des,
				'cate_name' => $cate_name['name'],
				'link' => $urll
			);
		}
		else
		{
			$ar_blog_all[] = array(
				'id' => $res['id'],
				'photo_mail' => $photo_main,
				'img_photo_hl_1' => $img_photo_hl_1,
				'img_photo_high' => $img_photo_high,
				'name' => $name,
				'author' => $author,
				'des' => $des,
				'cate_name' => $cate_name['name'],
				'link' => $urll
			);
		}
		$y++;
	}
	?>
<div class="container-fluid lf_cate_box <?php echo $bg;?>">
	<div class="row justify-content-center">
    	<div class="col-10">
        	<div class="ls_category">
            	<div class="row">
                
                	<?php
						if(($x%2)==0)
						{
							?>
							<!--content------------------------------------------------>
							<div class="col-6">
								<?php
								foreach($ar_blog_1 as $blog_1)
								{
								?>
								<div class="lsarti_l_box">
									<img data-src="<?php echo imagePath($blog_1['img_photo_high']);?>" width="100%" class="ls_left_box lazy" alt="">
									<div class="lsarti_left_box">
										<div class="ls_l_box_tt"><?php echo $blog_1['name'];?></div>
										<div class="ls_l_box_author"><?php echo $blog_1['author'];?></div>
										<div class="ls_l_box_cate"><a href="/blog" class="ls_sltopbut">Lifestyle</a><a href="#" class="ls_sltopbut"><?php echo $blog_1['cate_name'];?></a></div>
										<div class="ls_l_box_des"><?php echo $blog_1['des'];?></div>
										<div class="ls_l_box_share">
											<a href="" class="lsarti_icon"><img src="../../upload/new_design/lifestyle/img-arc-facebook-small.png" alt=""></a>
											<a href="" class="lsarti_icon xx"><img src="../../upload/new_design/lifestyle/img-arc-twister-small2.png" alt=""></a>
											<a href="" class="lsarti_icon"><img src="../../upload/new_design/lifestyle/img-arc-ig-small.png" alt=""></a>
										</div>
										<a href="<?php echo $blog_1['link'];?>" target="_blank" ><div class="ls_l_box_readmore" style="color:#fff">read more...</div></a>
									</div>
								</div>
								<?php 
								}
								?>
							</div>
							<div class="col-6">
								<div class="row justify-content-center">
									<div class="col-11">
								
										<div class="ls_cate_tt_1"><?php echo $ex_name;?></div>
											<div class="ls_cate_tt_2">experiences<?php //echo $ex_name[1];?> </div>
											
											<div class="w-100"></div>
											
											<div class="row">
												<?php
												foreach($ar_blog_all as $b_all)
												{
												?>
												<div class="col-6 ">
													<div class="lsarti_ins_box">
														<img data-src="<?php echo imagePath($b_all['photo_mail']);?>" width="100%" class="ls_arti_photo lazy" alt="">
														<div class="lsarti_tt"><?php echo $b_all['name'];?></div>
														<div class="lsarti_author"><?php echo $b_all['author'];?></div>
														<div class="lsarti_cate"><a href="/blog" class="ls_sltopbut">Lifestyle</a><a href="#" class="ls_sltopbut"><?php echo $b_all['cate_name'];?></a></div>
														<div class="lsarti_des"><?php echo $b_all['des'];?></div>
														<div class="lsarti_share">
															<a href="" class="lsarti_icon"><img src="../../upload/new_design/lifestyle/img-arc-facebook-small.png" alt=""></a>
															<a href="" class="lsarti_icon"><img src="../../upload/new_design/lifestyle/img-arc-twister-small.png" alt=""></a>
															<a href="" class="lsarti_icon"><img src="../../upload/new_design/lifestyle/img-arc-ig-small.png" alt=""></a>
														</div>
														<a href="<?php echo $b_all['link'];?>" target="_blank"><div class="ls_l_box_readmore">read more...</div></a>
													</div>
												</div>
												<?php
												}
												?>
												
											</div><!--row-->
											
											<button class="rma">read more all</button>
									</div><!--col-11-->
								</div><!--row-->
							</div><!--col-6-->
						
							<!--content------------------------------------------------>
						<?php
							
						}
						else
						{
														?>
							<!--content------------------------------------------------>
							
							<div class="col-6">
								<div class="row justify-content-center">
									<div class="col-11">
								
										<div class="ls_cate_tt_1"><?php echo $ex_name;?></div>
											<div class="ls_cate_tt_2">experiences<?php //echo $ex_name[1];?> </div>
											
											<div class="w-100"></div>
											
											<div class="row">
												<?php
												foreach($ar_blog_all as $b_all)
												{
												?>
												<div class="col-6 ">
													<div class="lsarti_ins_box">
														<img data-src="<?php echo imagePath($b_all['photo_mail']);?>" width="100%" class="ls_arti_photo lazy" alt="">
														<div class="lsarti_tt"><?php echo $b_all['name'];?></div>
														<div class="lsarti_author"><?php echo $b_all['author'];?></div>
														<div class="lsarti_cate"><a href="/blog" class="ls_sltopbut">Lifestyle</a><a href="#" class="ls_sltopbut"><?php echo $b_all['cate_name'];?></a></div>
														<div class="lsarti_des"><?php echo $b_all['des'];?></div>
														<div class="lsarti_share">
															<a href="" class="lsarti_icon"><img src="../../upload/new_design/lifestyle/img-arc-facebook-small.png" alt=""></a>
															<a href="" class="lsarti_icon"><img src="../../upload/new_design/lifestyle/img-arc-twister-small.png" alt=""></a>
															<a href="" class="lsarti_icon"><img src="../../upload/new_design/lifestyle/img-arc-ig-small.png" alt=""></a>
														</div>
														<a href="<?php echo $b_all['link'];?>" target="_blank"><div class="ls_l_box_readmore">read more...</div></a>
													</div>
												</div>
												<?php
												}
												?>
												
											</div><!--row-->
											
											<button class="rma">read more all</button>
									</div><!--col-11-->
								</div><!--row-->
							</div><!--col-6-->
							<div class="col-6">
								<?php
								foreach($ar_blog_1 as $blog_1)
								{
								?>
								<div class="lsarti_l_box">
									<img data-src="<?php echo imagePath($blog_1['img_photo_high']);?>" width="100%" class="ls_left_box lazy" alt="">
									<div class="lsarti_left_box">
										<div class="ls_l_box_tt"><?php echo $blog_1['name'];?></div>
										<div class="ls_l_box_author"><?php echo $blog_1['author'];?></div>
										<div class="ls_l_box_cate"><a href="/blog" class="ls_sltopbut">Lifestyle</a><a href="#" class="ls_sltopbut"><?php echo $blog_1['cate_name'];?></a></div>
										<div class="ls_l_box_des"><?php echo $blog_1['des'];?></div>
										<div class="ls_l_box_share">
											<a href="" class="lsarti_icon"><img src="../../upload/new_design/lifestyle/img-arc-facebook-small.png" alt=""></a>
											<a href="" class="lsarti_icon xx"><img src="../../upload/new_design/lifestyle/img-arc-twister-small2.png" alt=""></a>
											<a href="" class="lsarti_icon"><img src="../../upload/new_design/lifestyle/img-arc-ig-small.png" alt=""></a>
										</div>
										<a href="<?php echo $blog_1['link'];?>" target="_blank" ><div class="ls_l_box_readmore" style="color:#fff">read more...</div></a>
									</div>
								</div>
								<?php 
								}
								?>
							</div>
							<!--content------------------------------------------------>
							<?php
						}
						?>
                	
                    
                    
                    
                    
                    
                </div><!--row-->
            </div><!--ls_category-->
        </div>
    </div>
</div>
<?php 
	}
$x++;
}
?>













<!--<script>
const carousel = document.querySelector(".carousel-container");
const slide = document.querySelector(".carousel-slide");

function handleCarouselMove(positive = true) {
  const slideWidth = slide.clientWidth;
  carousel.scrollLeft = positive ? carousel.scrollLeft + slideWidth : carousel.scrollLeft - slideWidth;
}
</script>-->

<?php /*?><style>
main {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  padding-bottom: 64px;
}

.carousel-arrow {
  position: absolute;
  display: flex;
  justify-content: center;
  top: 0;
  bottom: 64px;
  margin-block: auto;
  height: fit-content;
  width: 48px;
  background-color: white;
  border: none;
  font-size: 3rem;
  padding: 0;
  cursor: pointer;
  opacity: 0.5;
  transition: opacity 100ms;
}

.carousel-arrow:hover,
.carousel-arrow:focus {
  opacity: 1;
}

.carousel-arrow--prev {
  left: 0;
}

.carousel-arrow--next {
  right: 0;
}

.carousel-container {
  width: 100%;
  padding-block: 16px 32px;
  margin: 16px 48px;
  overflow-x: auto;
  display: flex;
  width: 100%;
  gap: 8px;
  align-items: center;
  scroll-snap-type: x mandatory;
  flex-flow: row nowrap;
  scroll-behavior: smooth;
}

.carousel-container::-webkit-scrollbar {
  height: 14px;
  width: calc(100% - 48px);
}

.carousel-container::-webkit-scrollbar-track {
  background: #b1b3b399;
}

.carousel-container::-webkit-scrollbar-thumb {
  background: #29AB87;
}

.carousel-container::-webkit-scrollbar-track-piece:start {
  background: #29AB87;
}

.carousel-slide {
  flex: 1 0 30%;
  aspect-ratio: 1;
  flex-flow: column nowrap;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #bae;
  scroll-snap-align: center;
}

@media (max-width: 600px) {
  .carousel-slide {
    flex: 1 0 90%;
  }
}

</style><?php */?>





<?php include "libs/pages/section_our_yachting.php";?>

<?php //include "libs/pages/section_life_style.php";?>

<?php include "libs/pages/section_follow_me.php";?>

<?php include "libs/pages/section_contact_us_footer.php";?>











<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Send email</h4>
      </div>
      <div class="modal-body">
      <form id="form_sendblog">
        <?php /*?><div class="mg-contact-form-input">
            <!--<label for="full-name">Full Name</label>-->
            <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name">
        </div><?php */?>
        <div class="mg-contact-form-input">
            <!--<label for="email">E-mail</label>-->
            <input type="text" class="form-control" id="txemail" name="txemail" placeholder="E-mail">
        </div>
        <?php /*?><div class="mg-contact-form-input">
            <!--<label for="subject">Phone</label>-->
            <input type="text" class="form-control" id="txsubject" name="txsubject" placeholder="Phone">
        </div>
        <div class="mg-contact-form-input">
            <!--<label for="subject">Message</label>-->
            <textarea class="form-control" id="txmessage" name="txmessage" rows="5" placeholder="Message"></textarea>
        </div><?php */?>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onClick="sendemail()">Sent</button>
      </div>
    </div>
  </div>
</div>




<script src="libs/js/jquery-3.1.1.min.js"></script>
<script>

function sendemail()
{
	if($("#txemail").val()=='')
	{
		alert("Please fill your data");
		$("#txemail").focus();
		return false;
	}
	else
	{
		var Email=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/
		if(!document.getElementById("txemail").value.match(Email))
		{
		   alert('Email format is not valid');
		   document.getElementById("txemail").focus();
		   return false;
		}
		else
		{
			$.ajax({
				url:"libs/actions/action-send-email.php",
				type:"POST",
				dataType:"json"	,
				data:$("#form_sendblog").serialize(),
				success: function(res){
					if(res.status==true)
					{
						alert(res.msg);
						window.location.reload();
					}
					else
					{
						alert(res.msg);
						return false;
					}
				}
			});
		}
	}
}
</script>
 <script>
$(document).ready(function(e) {
    $(".lazy").lazyload();
});

$(document).ready(function(e) {
	 $('[data-toggle="tooltip"]').tooltip();
});
</script>           

<!--<script defer src="http://static.ak.fbcdn.net/connect.php/js/FB.Loader" type="text/javascript"></script>
<script defer src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script> -->
<script>
function onShare(idp,title,desc,image)
{
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1684480814898909',
      xfbml      : true,
      version    : 'v3.2'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

  		FB.ui({
 			  method: 'feed',
			  name: title,
			  link: idp,
			  caption: title,
			  display: 'popup',
			  description: desc+'...',
			  picture:'https://www.inspiringvillas.com'+image,
			}, function(response){});
}
</script>
   <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v3.2&appId=1684480814898909";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

var mlink  = "<?php echo $Urllink;?>";
</script>






<!--google-->
<!--<script>
function gPlus(url){
    window.open(
        'https://plus.google.com/share?url='+url,
        'popupwindow',
        'scrollbars=yes,width=800,height=600'
    ).focus();
    return false;
}
</script>-->

<!--google-->