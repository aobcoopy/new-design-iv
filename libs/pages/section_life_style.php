<div class="container-fluid lifestyle_box_1">
	<div class="row justify-content-center text-center">
    	<div class="col-12 col-md-10">
            <div class="lf_tt">inspiring life style</div>
        </div>
        <div class="col-12 col-md-7">
            <div class="lf_des">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet</div>
        </div>
    </div>
</div>
<div class="container-fluid lifestyle_box">    
    <div class="row justify-content-center">
    	<div class="col-12 col-md-10">
        	<div class="row">
            <?php
			$sql_blog = $dbc->Query("select * from blogs where status > 0 and heightlight > 0 order by sort asc limit 0,3");
			while($res = $dbc->Fetch($sql_blog))
			{
				$photo = imagePath('/'.json_decode($res['photo_hl_3'],true));
				$urll = "/blog/" . strtolower(str_replace(" ", "-", $res['name']) ) . ".html";
				?>
                <div class="col-12 col-sm-6 col-lg-4 nopad575">
                	<div class="col-12 lf_inside">
                        <div class="col-12">
                            <a href="<?php echo $urll;?>"><img data-src="<?php echo $photo;?>" class="lf_ing lazy" alt=""></a>
                        </div>
                        <div class="col-12 lf_inside_box">
                            <div class="lf_tt_box"><?php echo $res['name'];?></div>
                            <div class="lf_des_box"><?php echo string_len(base64_decode($res['brief'],true),110);?><span class="lf_more"><a href="<?php echo $urll;?>" class="lf_more">more</a></span></div>
                        </div>
                    </div>
                </div>
				<?php
			}
			?>
                <!--<div class="col-12 col-sm-6 col-lg-4 nopad575">
                	<div class="col-12 lf_inside">
                        <div class="col-12">
                            <img data-src="../../upload/new_design/img-lifestyle-img.png" class="lf_ing lazy" alt="">
                        </div>
                        <div class="col-12 lf_inside_box">
                            <div class="lf_tt_box">5 TIPS TO CHOOSE A LUXURY VILLAFOR YOUR HOLIDAY IN THAILAND</div>
                            <div class="lf_des_box">Unveiling the Essence of Thai Luxury Thailand, a land where majestic coastlines, verdant rainforests, and ...<span class="lf_more">more</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4  nopad575">
                	<div class="col-12 lf_inside">
                        <div class="col-12">
                            <img data-src="../../upload/new_design/img-lifestyle-img2.png" class="lf_ing lazy" alt="">
                        </div>
                        <div class="col-12 lf_inside_box">
                            <div class="lf_tt_box">LET’S TALK GREENWASHING : THE ELEPHANT IN THE ROOM</div>
                            <div class="lf_des_box">The Greenwashing conversation, what it is, and how to combat false claims. In the midst of a world that’s ...<span class="lf_more">more</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-lg-4 d-none d-lg-block nopad575">
                	<div class="col-12 lf_inside">
                        <div class="col-12">
                            <img data-src="../../upload/new_design/img-lifestyle-img3.png" class="lf_ing lazy" alt="">
                        </div>
                        <div class="col-12 lf_inside_box">
                            <div class="lf_tt_box">THE ROLE OF CUSTOMER EXPERIENCE IN RUNNING A SUCCESSFUL VACATION RENTAL VILLA</div>
                            <div class="lf_des_box">When it comes to running a successful vacation rental villa, one of the most crucial factors for long-term ...<span class="lf_more">more</span></div>
                        </div>
                    </div>
                </div>-->
            </div>
            
            <a href="/blog"><button class="lf_but">read more</button></a>
        </div>
    </div>
<!--    <img src="../../upload/new_design/img-lifestyle-Logo.png" class="lf_photo" alt="">-->
</div>
