<?php include "libs/pages/top_blog.php";?>
<?php include "libs/pages/search.php";?>


<div class="container-fluid lf_highlight">
	<div class="row justify-content-center">
    	<div class="col-9 col-md-7">
        	<div class="hl_tt">highlight of the month on this time</div>
            <div class="hl_des">A private beach villa is the true definition of an island escape done right. Our collection of Koh Samui villas offers
pristine luxury A private beach villa is the true definition</div>
        </div>
    </div>
    <div class="row justify-content-end">
        <div class="col-12 nopad">
        	
            
            <?php /*?><pre><?php print_r($ar_lf_hlotm);?></pre><?php */?>
            
            <div class="lf_carousel owl-carousel owl-theme">
            <?php
			$c=0;
			
			foreach($ar_lf_hlotm as $hl_of_tm)
			{
				
				echo '<div class="item hlotm_sl_box" data-hash="'.$c.'">';
					echo '<a href="'.$hl_of_tm['link_post'].'">';
					echo '<img data-src="'.imagePath($hl_of_tm['photo']).'" class=" lazy" alt="">';
					echo '</a>';
					
					echo '<div class="lf_hlotm_box">';
						echo '<div class="lf_hlotm_box_2">';
							echo '<div class="hlotm_tt"><a href="'.$hl_of_tm['link_post'].'" class="tblue">'.$hl_of_tm['name'].'</a></div>';
							echo '<div class="hlotm_author_box">';
								echo '<div class="hlotm_author">'.$hl_of_tm['author'].'</div>';
								echo '<div class="hlotm_cate"><a href="/blog" class="ls_sltopbut">Lifestyle</a><a  href="lifestyle-category-'.$hl_of_tm['slug'].'.html" target="_blank" class="ls_sltopbut">'.$hl_of_tm['category'].'</a></div>';
							echo '</div>';
							echo '<div class="hlotm_des">'.$hl_of_tm['brief'].'</div>';
							echo '<div class="hlotm_share">';
								echo '<a href="" class="hlotm_ico_share"><img src="../../upload/new_design/lifestyle/img-arc-facebook-small.png" width="40px" alt=""></a>';
								echo '<a href="" class="hlotm_ico_share"><img src="../../upload/new_design/lifestyle/img-arc-twister-small.png" width="40" alt=""></a>';
								echo '<a href="" class="hlotm_ico_share"><img src="../../upload/new_design/lifestyle/img-arc-ig-small.png" width="40" alt=""></a>';
							echo '</div>';
							echo '<div class="hlotm_readmore"><a href="'.$hl_of_tm['link_post'].'" class="tblue">READ MORE...</a></div>';
						echo '</div>';
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


<link rel="stylesheet" href="<?php echo $url_link;?>libs/css/owl/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo $url_link;?>libs/css/owl/owl.theme.default.min.css">
<script src="<?php echo $url_link;?>libs/js/owl/owl.carousel.min.js"></script>
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
        100:{
            items:1
        },
		350:{
            items:1.5
        },
        560:{
            items:2
        },
		700:{
            items:2.5
        },
        800:{
            items:3
        },
		992:{
            items:2.5
        },
        1200:{
            items:3
        },
		1300:{
            items:3.5
        },
        1500:{
            items:4
        },
		1600:{
            items:4.2
        },
		1700:{
            items:4.5
        }
    }
})
</script>






<?php
$cate = $dbc->Query("select * from blog_category where status > 0 order by sort asc");
$x=0;
$bg = '';
$lf_cate_box='';
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
				'link' => $urll,
				'cate_link' => '/lifestyle-category-'.$cate_name['slug'].'.html'
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
				'link' => $urll,
				'cate_link' => '/lifestyle-category-'.$cate_name['slug'].'.html'
			);
		}
		$y++;
	}
	
	if($x==0)
	{
		$lf_cate_box = 'lf_cate_box';
	}
	else
	{
		$lf_cate_box = 'lf_cate_box_2';
	}
	?>
    
<div class="container-fluid <?php echo $lf_cate_box.' '.$bg;?>">
	<div class="row justify-content-center">
    	<div class="col-12 col-lg-12 col-xl-11 col-xxl-10">
        	<!---------------------------------------------  WEB ------------------------------------------------------------------->
        	<div class="ls_category web992">
            	<div class="row">
                
                	<?php
						if(($x%2)==0)
						{
							?>
							<!--content------------------------------------------------>
							<div class="col-6 col-lg-5 col-xxl-6">
								<?php
								foreach($ar_blog_1 as $blog_1)
								{
								?>
								<div class="lsarti_l_box">
									<a href="<?php echo $blog_1['link'];?>" target="_blank" class="tblue">
                                    <img data-src="<?php echo imagePath($blog_1['img_photo_high']);?>" width="100%" class="ls_left_box lazy" alt="">
                                    </a>
									<div class="lsarti_left_box">
										<div class="ls_l_box_tt"><a href="<?php echo $blog_1['link'];?>" target="_blank" class="tw"><?php echo $blog_1['name'];?></a></div>
										<div class="ls_l_box_author"><?php echo $blog_1['author'];?></div>
										<div class="ls_l_box_cate"><a href="/blog" class="ls_sltopbut">Lifestyle</a><a href="<?php echo $blog_1['cate_link'];?>" class="ls_sltopbut"><?php echo $blog_1['cate_name'];?></a></div>
										<div class="ls_l_box_des"><?php echo $blog_1['des'];?></div>
										<div class="ls_l_box_share">
											<a href="" class="lsarti_icon"><img src="../../upload/new_design/lifestyle/img-arc-facebook-small.png" alt=""></a>
											<a href="" class="lsarti_icon xx"><img src="../../upload/new_design/lifestyle/img-arc-twister-small2.png" alt=""></a>
											<a href="" class="lsarti_icon"><img src="../../upload/new_design/lifestyle/img-arc-ig-small.png" alt=""></a>
										</div>
										<a href="<?php echo $blog_1['link'];?>" target="_blank" class="tblue"><div class="ls_l_box_readmore" style="color:#fff">read more...</div></a>
									</div>
								</div>
								<?php 
								}
								?>
							</div>
							<div class="col-6 col-lg-7 col-xxl-6">
								<div class="row justify-content-center">
									<div class="col-11">
								
										<div class="ls_cate_tt_1"><?php echo $ex_name;?></div>
											<div class="ls_cate_tt_2">experiences<?php //echo $ex_name[1];?> </div>
											
											<div class="w-100"></div>
											
											<div class="row">
												<?php
												$q=0;
												foreach($ar_blog_all as $b_all)
												{
													if($q<4)
													{
												?>
												<div class="col-6 <?php echo ($q>=2)?'d-none d-xxl-block':'';?>">
													<div class="lsarti_ins_box">
														<a href="<?php echo $b_all['link'];?>" target="_blank" class="tblue">
                                                        <img data-src="<?php echo imagePath($b_all['photo_mail']);?>" width="100%" class="ls_arti_photo lazy" alt="">
                                                        </a>
														<div class="lsarti_tt"><a href="<?php echo $b_all['link'];?>" target="_blank" class="tblue"><?php echo $b_all['name'];?></a></div>
														<div class="lsarti_author"><?php echo $b_all['author'];?></div>
														<div class="lsarti_cate"><a href="/blog" class="ls_sltopbut">Lifestyle</a><a href="<?php echo $b_all['cate_link'];?>" class="ls_sltopbut"><?php echo $b_all['cate_name'];?></a></div>
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
												$q++;
												}
												?>
												
											</div><!--row-->
											
											<a href="lifestyle-category-<?php echo $line['slug'];?>.html"><button class="rma">read more all</button></a>
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
												$w=0;
												foreach($ar_blog_all as $b_all)
												{
													if($w<4)
													{
												?>
												<div class="col-6 <?php echo ($w==2)?'d-none d-xl-block':'';?>">
													<div class="lsarti_ins_box">
														<a href="<?php echo $b_all['link'];?>" target="_blank" class="tblue">
                                                        <img data-src="<?php echo imagePath($b_all['photo_mail']);?>" width="100%" class="ls_arti_photo lazy" alt="">
                                                        </a>
														<div class="lsarti_tt"><a href="<?php echo $b_all['link'];?>" target="_blank" class="tblue"><?php echo $b_all['name'];?></a></div>
														<div class="lsarti_author"><?php echo $b_all['author'];?></div>
														<div class="lsarti_cate"><a href="/blog" class="ls_sltopbut">Lifestyle</a><a href="<?php echo $b_all['cate_link'];?>" class="ls_sltopbut"><?php echo $b_all['cate_name'];?></a></div>
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
												$w++;
												}
												?>
												
											</div><!--row-->
											
											<a href="lifestyle-category-<?php echo $line['slug'];?>.html"><button class="rma">read more all</button></a>
									</div><!--col-11-->
								</div><!--row-->
							</div><!--col-6-->
							<div class="col-6">
								<?php
								foreach($ar_blog_1 as $blog_1)
								{
								?>
								<div class="lsarti_l_box">
									<a href="<?php echo $blog_1['link'];?>" target="_blank" class="tblue">
                                    <img data-src="<?php echo imagePath($blog_1['img_photo_high']);?>" width="100%" class="ls_left_box lazy" alt="">
                                    </a>
									<div class="lsarti_left_box">
										<div class="ls_l_box_tt"><a href="<?php echo $blog_1['link'];?>" target="_blank" class="tw"><?php echo $blog_1['name'];?></a></div>
										<div class="ls_l_box_author"><?php echo $blog_1['author'];?></div>
										<div class="ls_l_box_cate"><a href="/blog" class="ls_sltopbut">Lifestyle</a><a href="<?php echo $blog_1['cate_link'];?>" class="ls_sltopbut"><?php echo $blog_1['cate_name'];?></a></div>
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
            </div><!--ls_category web992-->
            <!---------------------------------------------  WEB ------------------------------------------------------------------->
            
            
            <!---------------------------------------------  MOBILE ------------------------------------------------------------------->
            <div class="ls_category mob992">
            	<div class="row justify-content-center">
                
                	<div class="box_m_tt ">
                        <div class="ls_cate_tt_1"><?php echo $ex_name;?></div>
                        <div class="ls_cate_tt_2">experiences<?php //echo $ex_name[1];?> </div>
                    </div>
                    <div class="w-100"></div>
                    
							<!--content------------------------------------------------>
							<div class="col-12 nopad">
								<?php
								foreach($ar_blog_1 as $blog_1)
								{
								?>
								<div class="lsarti_l_box">
									<img data-src="<?php echo imagePath($blog_1['photo_mail']);?>" width="100%" class="ls_left_box lazy" alt="">
									<div class="lsarti_left_box">
										<div class="ls_l_box_tt"><?php echo $blog_1['name'];?></div>
										<div class="ls_l_box_author"><?php echo $blog_1['author'];?></div>
										<div class="ls_l_box_cate"><a href="/blog" class="ls_sltopbut">Lifestyle</a><a href="<?php echo $blog_1['cate_link'];?>" class="ls_sltopbut"><?php echo $blog_1['cate_name'];?></a></div>
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
							<div class="col-12">
								<div class="row justify-content-center">
									<div class="col-11">
								
										
											
											<div class="row">
												<?php
												$z=0;
												foreach($ar_blog_all as $b_all)
												{
													if($z<4)
													{
												?>
												<div class="col-12 col-md-6  <?php echo ($z==3)?'d-none d-md-block':'';?>">
													<div class="lsarti_ins_box">
														<img data-src="<?php echo imagePath($b_all['photo_mail']);?>" width="100%" class="ls_arti_photo lazy" alt="">
														<div class="lsarti_tt"><?php echo $b_all['name'];?></div>
														<div class="lsarti_author"><?php echo $b_all['author'];?></div>
														<div class="lsarti_cate"><a href="/blog" class="ls_sltopbut">Lifestyle</a><a href="<?php echo $b_all['cate_link'];?>" class="ls_sltopbut"><?php echo $b_all['cate_name'];?></a></div>
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
												$z++;
												}
												?>
												
											</div><!--row-->
											
											<a href="/lifestyle-category-<?php echo $line['slug'];?>.html" target="_blank" class="tblue"><button class="rma">read more all</button></a>
									</div><!--col-11-->
								</div><!--row-->
							</div><!--col-6-->
						
							<!--content------------------------------------------------>
						
						
                </div><!--row-->
            </div><!--ls_category mob992-->
            <!---------------------------------------------  MOBILE ------------------------------------------------------------------->
            
            
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




<script src="<?php echo $url_link;?>libs/js/jquery-3.1.1.min.js"></script>
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