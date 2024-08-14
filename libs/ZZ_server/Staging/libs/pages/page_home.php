



<?php //include 'libs/pages/header-new-design.php';?>


                            
<div class="cov_slide web767 animate__animated animate__fadeIn animate__faster">
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
  	<?php
	$a=0;
	$sqls = $dbc->Query("select * from slide_photo where status > 0 order by sort asc");
	$ar_photo = array();
	$ar_tt = array();
	while($row = $dbc->Fetch($sqls))
	{
		$act = ($a==0)?'active':'';
		$photo = json_decode($row['photo'],true);
		array_push($ar_photo,imagePath($photo));
		array_push($ar_tt,$row['brief']);
		
		echo '<div class="carousel-item '.$act.'  ">';
			echo '<img  src="'.imagePath($photo).'" class="d-block w-100" alt="inspiringvillas cover">';// 
			echo '<div class="det_slide">'.$row['brief'].'</div>';
		echo '</div>';
		$a++;
	}
	?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>


<div class="slider mob767 animate__animated animate__fadeIn animate__faster">
<?php 
$a=0;
foreach($ar_photo as $photos)
{
	echo '<div class="slide"><div class="det_slide">'.$ar_tt[$a].'</div></div>';
	$a++;
}
?>
</div>

<style>
<?php 
$x=0;
$y=1;
foreach($ar_photo as $photos)
{
	$time = ($x==0)?$x.'s':'-'.$x.'s';
	?>
	
    .slider .slide:nth-child(<?php echo $y;?>) {
	  background-image: url('<?php echo $photos;?>');
	  animation-delay: <?php echo $time;?>;
	}
    
	<?php
    $x=$x+6.5;
	$y++;
}
?>
</style>
<!--
<div class="slider">
    <div class="slide"></div>
    <div class="slide"></div>
    <div class="slide"></div>
</div>-->









<!--search bar-->
<script>
$(document).ready(function(e) {
    $(".lazy").lazyload();
});
function cleartime(func)
{
	clearInterval(func);
}
</script>
<?php include "libs/pages/google_remarketing.php";?>
<?php include "libs/pages/search.php";?>
<!--search bar-->





<div class="container-fluid box_explore">
	<div class="row justify-content-center">
    
    	<div class="col-10 col-md-12 col-lg-12 col-xl-10 row justify-content-center">
            <div class="col-12 col-md-6 col-xl-6 ex_boxes t_t1- animate__animated hid" >
                <div class="ex_title">Explore</div>
                <div class="ex_det">luxury villa thailand.<br>private luxury villas for rent</div>
            </div>
            <div class="col-12 col-md-6 col-xl-6 t_t2-">
                <div class="row justify-content-center r1 animate__animated animate__delay-05s hid">
                    <div class="col-12 col-md-3 "><img  data-src="../../upload/new_design/img-top-bg-icon.png" class="ex_icon lazy" alt=""></div>
                    <div class="col-12 col-md-9  box_ex_det">
                        <div class="exr_title">DISCOVER LUXURY VILLAS</div>
                        <div class="exr_det">With an exceptional collection of luxury villas in Thailand,
    one can truly get away from the pressures of everyday life
    and escape to the tropical beauty of Southeast Asia. For a
    wedding, honeymoon or a family vacation, Inspiring Villas
    offers a complete range of luxury villas to choose from.</div>
                    </div>
                </div>
                <div class="row justify-content-center r2 animate__animated animate__delay-06s hid">
                    <div class="col-12 col-md-3 "><img data-src="../../upload/new_design/img-top-bg-icon2.png" class="ex_icon lazy" alt=""></div>
                    <div class="col-12 col-md-9  box_ex_det">
                        <div class="exr_title">A HANDPICKED COLLECTION</div>
                        <div class="exr_det">With an exceptional collection of luxury villas in Thailand,
    one can truly get away from the pressures of everyday life
    and escape to the tropical beauty of Southeast Asia. For a
    wedding, honeymoon or a family vacation, Inspiring Villas
    offers a complete range of luxury villas to choose from.</div>
                    </div>
                </div>
                <div class="row justify-content-center r3 animate__animated animate__delay-07s hid">
                    <div class="col-12 col-md-3 "><img data-src="../../upload/new_design/img-top-bg-icon3.png" class="ex_icon lazy" alt=""></div>
                    <div class="col-12 col-md-9  box_ex_det">
                        <div class="exr_title">PERSONALISED SERVICE</div>
                        <div class="exr_det">With an exceptional collection of luxury villas in Thailand,
    one can truly get away from the pressures of everyday life
    and escape to the tropical beauty of Southeast Asia. For a
    wedding, honeymoon or a family vacation, Inspiring Villas
    offers a complete range of luxury villas to choose from.</div>
                    </div>
                </div>
                
                
            </div>
        </div>
        
        
    </div>
    <div class="row justify-content-center category_box">
    	<div class="col-11 col-lg-12 col-xl-11 row">
        <?php 
				$sql_cate = $dbc->Query("select * from categories where status > 0 and id IN (6,4,8,5) order by sort asc limit 0,4"); //
				$zz=0;
				while($r_cate = $dbc->Fetch($sql_cate))
				{
					$nam = explode("-",$r_cate['name']);
					$pho = json_decode($r_cate['photo'],true);
					if($zz<=1){$cal="top10 cab";}else{$cal="top10 cab";}
					$zz++;
					$delay='';
					if($zz==1)
					{
						$delay = "animate__delay-05s animate__fast";
					}
					elseif($zz==2)
					{
						$delay = "animate__delay-06s animate__fast";
					}
					elseif($zz==3)
					{
						$delay = "animate__delay-07s animate__fast";
					}
					elseif($zz==4)
					{
						$delay = "animate__delay-08s animate__fast";
					}
					
					echo '<div class="col-12 col-sm-6 col-lg-3 '.$cal.' animate__animated hid ca-'.$zz.' '. $delay.'">';
					if($r_cate['id']==4)
					{
						$ht_links = "/search-rent/thailand/all-beach/all-price.html?room=all-bedrooms&cate=seaview-villas&sort=all-sort";
						//$ht_links = "/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html";
					}
					else
					{
						$ht_links = "/".$r_cate['ht_link'].".html";
					}
						echo '<a href="'.$ht_links.'"><div class="col-md-12 col-sm-12 col-xs-12 boxpho nopad">';
							if($r_cate['id']==5)
							{
								$name_more = '(>14)';
							}
							else
							{
								$name_more = '';
							}
							
							$rcate =($r_cate['id']==5)?"f13":"";
							if($r_cate['id']==4)
							{
								//echo '<div class="ca_box_name">Thailand Villas</div>';
								echo '<div class="ca_box_name_new_2 ">'.switchcase_sort($r_cate['id']).' '.$name_more.'</div>';
								$phuket_link = $url_link . 'search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/'.collection_home($r_cate['id']).'/all-sort.html';
                        		$koh_samui_link = $url_link . 'search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/seaview-villas.html?sort=all-sort';
							}
							else
							{
								echo '<div class="ca_box_name_new_2">'.switchcase_sort($r_cate['id']).' '.$name_more.'</div>';
								$phuket_link = $url_link . 'search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/'.collection_home($r_cate['id']).'/all-sort.html';
                        		$koh_samui_link = $url_link . 'search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/'.collection_home($r_cate['id']).'/all-sort.html';
							}
							
							if($zz<-3)
							{
								echo '<div class="col-12"><img src="'.imagePath($pho).'" width="100%" alt="'.switchcase_alt($r_cate['id']).'"></div>';
								//echo '<img src="'.$pho.'" width="100%" alt="'.switchcase_alt($r_cate['id']).'">';
							}
							else
							{
								echo '<div class="col-12"><img class="lazy" data-src="'.imagePath($pho).'" width="100%" alt="'.switchcase_alt($r_cate['id']).'"></div>';
								//echo '<img class="lazy" data-src="'.$pho.'" width="100%" alt="'.switchcase_alt($r_cate['id']).'">';
							}
							
							
							//$rcate = $r_cate['id'];
							
						echo '</div></a>';
						
						$vn = explode("-",$r_cate['name']);
						$ca_name = explode("Villas",$vn[0]); 
                        
                        if($r_cate['id']==6)
						{
							$small_font = 'sm_text';
						}
						elseif($r_cate['id']==5)
						{
							$small_font = 'sm_text_l';
						}
						else
						{
							$small_font = '';
						}
                        
						echo '<div class=" row   but_cate">'; //col-md-12 col-sm-12 col-xs-12
                        
							echo '<div class="col-6 top10" onclick="window.location.href=\'' . $phuket_link . '\'" style="cursor: pointer; padding-right:4px;" id="locationBox">';
								echo '<div class="col-md-12 col-sm-12 col-xs-12 boxbot nopad f14">';
                                    echo '<div style="text-align: center;"><a class="locationText" id="locationText" href="' . $phuket_link . '">Phuket '.$ca_name[0].'</a></div>';								
								echo '</div>';     
							echo '</div>';  
                            
                            echo '<div class="col-6 top10" onclick="window.location.href=\'' . $koh_samui_link . '\'" style="cursor: pointer;padding-left:4px;" id="locationBox">';
                                echo '<div class="col-md-12 col-sm-12 col-xs-12 boxbot nopad f14 '.$rcate.' '.$small_font.'">';
                                    echo '<div style="text-align: center;"><a class="locationText" id="locationText" href="' . $koh_samui_link . '">Koh Samui '.$ca_name[0].'</a></div>';
                                echo '</div>';
                            echo '</div>';                           
                            
						echo '</div>';
					echo '</div>';
                    
				}
				function collection_home($option)
				{
					switch($option)
					{
						case "2" :
							return "party-villas";
						break;
						case "3" :
							return "family-villas";
						break;
						case "4" :
							return "seaview-villas";
						break;
						case "5" :
							return "larger-group-villas";
						break;
						case "6" :
							return "beachfront-villas";
						break;
						case "8" :
							return "wedding-villas";
						break;
						default:
							return "all-collections";
					}
				}
				function switchcase_alt($val)
				{
					switch($val)
					{
						case "2":
							return "Party Villa";
						break;
						case "3":
							return "Family Villas";
						break;
						case "4":
							return "Seaview Villa Photo";
						break;
						case "5":
							return "Large Villa Photo";
						break;
						case "6":
							return "Beach Villa Photo";//return "Beachfront Villas - Phuket, Koh Samui, Thailand";
						break;
						case "8":
							return "Villa Wedding Photo";
						break;
						default:
					}
				}
				?>
        	<div class="col-6 col-lg-3"></div>
        </div>
    </div>
    
</div>



<!--<div class="container-fluid category_box">
	
</div>
-->



<!--<br><br><br><br><br><br><br><br><br>-->


<div class="container-fluid story_box">
	<img data-src="../../upload/new_design/Story/img-story-sec-bg-logo1.png" class="str_bg_1 lazy" alt="">
	<div class="row justify-content-center">
    	<div class="col-12 col-md-10 text-center">
        	<div class="str_title text-center animate__animated animate__delay-05s hid animate__fast">story</div>
            <div class="str_det text-center animate__animated animate__delay-1s hid animate__fast">villa in thailand</div>
            <img data-src="../../upload/new_design/Story/line.png" class="str_line  lazy animate__animated animate__delay-1s hid animate__fast" alt="">
            
            <div class="row stroy_inside s1">
            	<div class="col-12 col-md-6 nopad "><img data-src="../../upload/new_design/Story/img-story-sec-img1.png" class="w-100 lazy stp1 animate__animated animate__delay-05s hid animate__fast" alt=""></div>
                <div class="col-12 col-md-6 nopad ">
                	<div class="str_box_des std1 animate__animated animate__delay-05s hid animate__fast">
                        <img data-src="../../upload/new_design/Story/img-story-sec-text-icon.png" class="db6_top lazy" alt="">
                            <div class="str_in_tt">FIND YOUR IDEAL BEACH VILLA IN THAILAND TODAY</div>
                            <div class="str_in_det">Finding the right luxury villa for rent in Thailand
    is key to creating the kind of experience that will
    be truly unforgettable. Browse our collection of
    luxury villas online today to nd the perfect
    property for your dream Thailand holiday.</div>
                        <img data-src="../../upload/new_design/Story/img-story-sec-text-icon2.png" class="db6_bot lazy" alt="">
                    </div>
                </div>
            </div>
            
            <div class="row stroy_inside s2">
            	<div class="mob col-12 col-md-6 nopad"><img data-src="../../upload/new_design/Story/img-story-sec-img2.png" class="w-100 lazy stp2 animate__animated animate__delay-05s hid animate__fast" alt=""></div>
                <div class="col-12 col-md-6 nopad">
                	<div class="str_box_des std2 animate__animated animate__delay-05s hid animate__fast">
                        <img data-src="../../upload/new_design/Story/img-story-sec-text-icon.png" class="db6_top lazy" alt="">
                            <div class="str_in_tt">THE ULTIMATE THAILAND BEACH VILLA WITH A PRIVATE POOL</div>
                            <div class="str_in_det">If a luxury pool villa in Thailand is on your list,
    then there is no better choice than a trip to the
    lush shores of Koh Samui. Select your villa location
    from one of the 15 stunning beach destinations
    dotted around the island and fast-track your way
    to relaxing in your private infinity pool while looking
    out at the azure waters beyond.</div>
                        <img data-src="../../upload/new_design/Story/img-story-sec-text-icon2.png" class="db6_bot lazy" alt="">
                    </div>
                </div>
                <div class="web col-12 col-md-6 nopad"><img data-src="../../upload/new_design/Story/img-story-sec-img2.png" class="w-100 lazy stp2 animate__animated animate__delay-05s hid animate__fast" alt=""></div>
            </div>
            
            <div class="row stroy_inside s3">
            	<div class="col-12 col-md-6 nopad"><img data-src="../../upload/new_design/Story/img-story-sec-img3.png" class="w-100 lazy stp3 animate__animated animate__delay-05s hid animate__fast" alt=""></div>
                <div class="col-12 col-md-6 nopad">
                	<div class="str_box_des std3 animate__animated animate__delay-05s hid animate__fast">
                        <img data-src="../../upload/new_design/Story/img-story-sec-text-icon.png" class="db6_top lazy" alt="">
                            <div class="str_in_tt">FIND THE PERFECT BEACH VILLA IN PHUKET, THAILAND</div>
                            <div class="str_in_det">The ideal beach villa for rent awaits you in the
    ever-popular tourism destination of Phuket.
    Our Phuket collection features a range of luxury
    villas that can accommodate groups of all shapes
    and sizes. From a romantic getaway for two to
    a trip with friends that will be beyond compare,
    you will find all you need in our stunning collection
    of luxury villas in Phuket.</div>
                        <img data-src="../../upload/new_design/Story/img-story-sec-text-icon2.png" class="db6_bot lazy" alt="">
                    </div>
                </div>
            </div>
            
            <div class="row stroy_inside s4">
            	<div class="mob col-12 col-md-6 nopad"><img data-src="../../upload/new_design/Story/img-story-sec-img4.png" class="w-100 lazy stp4 animate__animated animate__delay-05s hid animate__fast" alt=""></div>
                <div class="col-12 col-md-6 nopad">
                	<div class="str_box_des std4 animate__animated animate__delay-05s hid animate__fast">
                        <img data-src="../../upload/new_design/Story/img-story-sec-text-icon.png" class="db6_top lazy" alt="">
                            <div class="str_in_tt">KOH PHANGAN LUXURY VACATION RENTALS IN THAILAND</div>
                            <div class="str_in_det">If the blissful calm shores of an island paradise
    are calling, then Inspiring Villas can answer that
    call. Choose from one of our stunning villa options
    for the perfect escape from the rest of the world.
    Whether you're perched atop a cliff overlooking
    the sparkling bay below or want to open your
    patio doors right onto the beach, there's a private
    villa for rent in Koh Phangan perfectly suited to you.</div>
                        <img data-src="../../upload/new_design/Story/img-story-sec-text-icon2.png" class="db6_bot lazy" alt="">
                    </div>
                </div>
                <div class="web col-12 col-md-6 nopad"><img data-src="../../upload/new_design/Story/img-story-sec-img4.png" class="w-100 lazy stp4 animate__animated animate__delay-05s hid animate__fast" alt=""></div>
            </div>
            
            
            
        </div>
    </div>
    
    <div class="row sql justify-content-center text-center">
    	<div class="ql_tt animate__animated animate__delay-05s hid animate__fast">quick links</div>
        <div class="ql_but_box">
        	<a href=""><button class="ql_but animate__animated animate__delay-05s hid animate__fast">puhket villas</button></a>
            <a href=""><button class="ql_but animate__animated animate__delay-06s hid animate__fast">Koh samui villas</button></a>
            <a href=""><button class="ql_but animate__animated animate__delay-07s hid animate__fast">koh pha ngan villas</button></a>
        </div>
    </div>
    
    <img data-src="../../upload/new_design/Story/img-story-sec-bg-logo2.png" class="str_bg_2 lazy sd4 animate__animated animate__delay-1s hid" alt="">
</div>




<div class="container-fluid about_box animate__animated animate__delay-05s hid animate__fast">
	<div class="row justify-content-center text-center">
    	<div class="col-12 col-md-10">
        	<div class="abb_tt abt1 animate__animated animate__delay-07s hid animate__fast">about us</div>
            <div class="abb_des abt2 animate__animated animate__delay-09s hid animate__fast">Inspiring Villas offers a unique and sensational villa holiday experience in the finest hand-picked
luxury villas in Thailand , the holiday of a lifetime, receiving full 24/7 care from our professional
team inside and outside the villa.</div>
			<a href="" class="abb animate__animated animate__delay-1s hid animate__fast"><button class="abb_but ">More</button></a>
        </div>
    </div>
</div>

<div class="tshwr"></div>
<div class="container-fluid hwr_box animate__animated animate__delay-05s hid animate__fast">
	<div class="row justify-content-center text-center">
    	<div class="col-12 col-md-9">
        	<div class="abb_tt top_hwr_tt animate__animated animate__delay-06s hid animate__fast">who<br class="mob"> we are</div>
            <div class="abb_des top_hwr_des animate__animated animate__delay-07s hid animate__fast">Inspiring Villas offers a unique and sensational villa holiday experience in the finest hand-picked
luxury villas in Thailand , the holiday of a lifetime, receiving full 24/7 care from our professional
team inside and outside the villa.</div>
			
        </div>
        <div class="col-12 col-md-10 row">
            <div class="col-12 col-md-4">
                <div class="hwr_icon hwp1 animate__animated animate__delay-07s hid animate__fast"><img data-src="../../upload/new_design/who_we_are/img-who-we-are-icon.png" class="hwricon  lazy " alt=""></div>
                <div class="hwr_tt hwt1 animate__animated animate__delay-07s hid animate__fast">LUXURY VILLA RENTALS</div>
                <div class="hwr_des hwd1 animate__animated animate__delay-07s hid animate__fast">Our selection of Thailand villas for rent offer
    a unique villa holiday experience. We offer the
    best villas in the most incredible locations.
    Guests enjoy exclusivity and privacy, complete
    with full ser vice from dedicated villa staff, a
    private chef and incredible facilities.</div>
            </div>
            <div class="col-12 col-md-4">
                <div class="hwr_icon hwp2 animate__animated animate__delay-08s hid animate__fast"><img data-src="../../upload/new_design/who_we_are/img-who-we-are-icon2.png" class="hwricon lazy " alt=""></div>
                <div class="hwr_tt hwt2 animate__animated animate__delay-08s hid animate__fast">BE INSPIRED</div>
                <div class="hwr_des hwd2 animate__animated animate__delay-08s hid animate__fast">There is trul y something f or ever yone. Our s taff
    can find the perf ect holiday villa match f or you,
    helping you to discover the location and villa
    that best suits your needs. We will show you
    which beach (in Phuket, Koh Samui, Koh Phagnan)
    and villa are perfect for your next vacation.</div>
            </div>
            <div class="col-12 col-md-4">
                <div class="hwr_icon hwp3 animate__animated animate__delay-09s hid animate__fast"><img data-src="../../upload/new_design/who_we_are/img-who-we-are-icon3.png" class="hwricon lazy " alt=""></div>
                <div class="hwr_tt hwt3 animate__animated animate__delay-09s hid animate__fast">WHY CHOOSE US</div>
                <div class="hwr_des hwd3 animate__animated animate__delay-09s hid animate__fast">Inspiring Villas selects only the fines t luxury
    villas in Thailand to be featured in our collection.
    Our experienced team carefully inspects every
    villa before check in, and provides full concierge
    services throughout the stay to ensure that
    your experience is the very best one.</div>
            </div>
        </div>
    </div>
</div>




<div class="conrtainer-fluid our_box">
	<div class="row justify-content-center text-center our_box_1">
    	<div class="col-9 col-sm-10 row">
        	<!--<div class="col-1"></div>-->
            <div class="col-12 col-md-7 our_bl">
            	<div class="our_ins_box">
                    <div class="our_tt our_tl animate__animated animate__delay-05s hid animate__fast">our</div>
                    <div class="our_tt our_tr animate__animated animate__delay-06s hid animate__fast">services</div>
                    <div class="to our_sub_tt animate__animated animate__delay-07s hid animate__fast">luxury villas</div>
                </div>
                <img data-src="../../upload/new_design/our_service/img-our-service-icon.png" class="our_line lazy animate__animated animate__delay-07s hid animate__fast" alt="">
            </div>
            <div class="col-12 col-md-5 ourbr">
            	<div class="row justify-content-center text-center">
                    <div class="col-12 col-sm-8 t_t2-">
                        <div class="row top20 ob1 animate__animated animate__delay-06s hid animate__fast">
                            <div class="col-3 ourinboximg"><img data-src="../../upload/new_design/our_service/img-our-service-icon2.png" class="w-100 our_icon lazy" alt=""></div>
                            <div class="col ourinbox_text">concierge services</div>
                        </div>
                        <div class="row top20 ob2 animate__animated animate__delay-07s hid animate__fast">
                            <div class="col-3 ourinboximg"><img data-src="../../upload/new_design/our_service/img-our-service-icon3.png" class="w-100 our_icon lazy" alt=""></div>
                            <div class="col ourinbox_text">asset management</div>
                        </div>
                        <div class="row top20 ob3 animate__animated animate__delay-08s hid animate__fast">
                            <div class="col-3 ourinboximg"><img data-src="../../upload/new_design/our_service/img-our-service-icon4.png" class="w-100 our_icon lazy" alt=""></div>
                            <div class="col ourinbox_text">margketing management</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row justify-content-center text-center our_box_2">
    	<div class="col-12">
        	<div class="our_tt our_box_2_tt animate__animated animate__delay-05s hid animate__fast">our <span class="to">sunstanable</span><br><span class="to">villa</span> concept</div>
            <div class="our_box_2_des animate__animated animate__delay-08s hid animate__fast">Inspiring Villas offers a unique and sensational villa holiday experience in the finest hand-picked<br class="web">
luxury villas in Thailand , the holiday of a lifetime, receiving full 24/7 care from our professional<br class="web">
team inside and outside the villa.</div>
            <a href="" class="orb animate__animated animate__delay-1s hid animate__fast"><button class="abb_but ">read More</button></a>
        </div>
    </div>
    
    
</div>


<img data-src="../../upload/new_design/our_service/img-our-stanable-bg.png" class="our_bg lazy animate__animated animate__delay-1s hid animate__fast" alt="">
<div class="col-12 bottom_our_sun"></div>


<?php $paa = 'home';?>
<?php include "libs/pages/section_our_yachting.php";?>

<?php include "libs/pages/section_life_style.php";?>

<?php include "libs/pages/section_follow_me.php";?>

<?php  include "libs/pages/section_contact_us_footer.php";?>



<?php //include "libs/pages/embed_ig_photo_new_design.php";?>












<?php /*?><script>
var tt0=true;
$(window).scroll(function () {
	if ($(this).scrollTop() > $(".mg-book-now ").offset().top-50) 
	{
		if(tt0==true)
		{
			$(".lovmore").fadeIn(100);
			$.ajax({
				url:"<?php echo $url_link;?>libs/actions/action-load-home-cate.php",
				type:"POST",
				dataType:"html",
				data:{htt:'0'},
				success: function(res){
					$(".lovmore").fadeOut(100);
					$(".vmore").html(res);
				}
			});
			tt0=false;
		}
	}
	else
	{
		
	}
});
</script><?php */?>






<!--INTERESTED IN ONE OF YOUR RECENTLY VIEWED VILLAS?-->
<!--<div class="container">
<div class="inside_data_recently_home"></div>
</div>
<script>
$(document).ready(function(e) {
	$.ajax({
		url:"<?php echo $url_link;?>libs/actions/check-recently-home.php",
		type:"POST",
		dataType:"html",
		data:{},
		success: function(res){
			$(".inside_data_recently_home").html(res);
		}
	});
    setTimeout(function(){
		//window.location.reload();
	},500);
});

</script>-->

<!--INTERESTED IN ONE OF YOUR RECENTLY VIEWED VILLAS?-->





<!--<script>
$(document).ready(function(e) {
    $(".ard").click(function(e) {
		var tard = $("#t_ard").val();
        if(tard=='0')
		{
			$("#t_ard").val(1);
			$(".ard").removeClass('fa-angle-down');
			$(this).addClass('fa-angle-up');
			$(".covlife").slideDown(600);
		}
		else
		{
			$("#t_ard").val('0');
			$(".ard").removeClass('fa-angle-up');
			$(this).addClass('fa-angle-down');
			$(".covlife").slideUp(600);
		}
    });
});
</script>-->
<!--<style>
.top70
{
	margin-top:0px;
}
.paa>p{font-family:unset !important}.paa>center>.mg-sec-left-title:after,.mg-widget-title:after{content:'';display:block;width:110px;height:1px;background-color:#d3a267;position:absolute;bottom:0;left:50%;margin-left:-55px;margin-bottom:10px !important}.mg-sec-left-title:after,.mg-widget-title:after{content:'';display:block;width:80px;height:0px;background-color:#d3a267;position:absolute;bottom:0;left:0;margin-top:-15px !important;top:43px}.mg-sec-title h2{color:#16262e;font-size:30px;text-transform:inherit;font-weight:400;margin:-33px 0 10px}.mg-feature .mg-feature-icon-title i{display:block;width:40px;line-height:40px;background-color:#112845;text-align:center;font-size:21px;color:#fff;border-radius:50%;float:left;-webkit-transition:background-color 0.3s;transition:background-color 0.3s;margin-top:1px}.mg-feature .mg-feature-icon-title h3{display:block;font-family:"Playfair Display",serif;font-size:17px;color:#16262e;font-weight:400;margin-left:60px;margin-top:13px;margin-bottom:-3px;text-transform:uppercase}

.navbar-brand img {
    -webkit-transition: none !important;
    transition: none !important;
}
</style>-->
<!--, #mega-sliders > div > .carousel-item -->

<!-- This site is converting visitors into subscribers and customers with OptinMonster - https://optinmonster.com-->
<!--<script type="text/javascript" src="https://a.optmnstr.com/app/js/api.min.js" data-account="41772" data-user="36782" async></script>-->
<!-- / OptinMonster -->