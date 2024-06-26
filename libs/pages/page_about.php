<?php 
/*$cover = $dbc->GetRecord("cover","*","page='about' AND status > 0");
$photo_cover = json_decode($cover['photo'],true);
$photo_cover = imagePath($photo_cover);*/
?>
<script>
$(document).ready(function(e) {
    $(".lazy").lazyload();
});
</script>


<div class="container-fluid ">
	<div class="row justify-content-center">
    	<div class="col-12 col-md-11  web">
        	<img src="../../upload/new_design/aboutus/about_head.png" width="100%" alt="">
        </div>
    	<div class="col-12 col-md-11 box_about_head mob">
        	
        </div>
    </div>
</div>


<div class="container-fluid ">
	<div class="row justify-content-center">
    	<div class="col-11 col-md-8 ">
        	<div class="ab_tt">Inspiring Villas in Thailand</div>
            <div class="ab_sub">Koh Samui & Phuket</div>
            <div class="ab_detail">
            	Inspiring Villas are a highly motivated team of skilled professionals who understand how the accommodation plays a big part in the villa holiday experience. Every member of our team has had the opportunity to stay in our luxury villa rentals in Thailand to experience each villa service that our guests will receive. This provides firsthand knowledge and unique insight into which villas match the needs of our guests. Put another way, each member of our staff have been inspired to pass the best experience onto you. Just let us know what you’re looking for, not only for accommodation, but in the overall experience you want your vacation to be. We’re here to help you choose the perfect villa holiday in Thailand and to facilitate the best, most stress-free holiday you could dream of. Begin your path to Inspiration by booking our 5-star villa holidays in Thailand today.
            </div>
        </div>
        
        <div class="col-11 col-md-8 top80">
        	<div class="row justify-content-center">
            	<div class="col-6 col-md-4 text-center">
                	<img src="../../upload/new_design/aboutus/PICKED.png" class="ab_icon" alt="">
                    <div class="ab_icon_tt">PICKED BY PROFESSIONAL</div>
                    <div class="ab_icon_sub">Carefully Hand-Picked & Inspected</div>
                </div>
                <div class="col-6 col-md-4 text-center">
                	<img src="../../upload/new_design/aboutus/FULL.png" class="ab_icon" alt="">
                    <div class="ab_icon_tt">FULL SERVICED VILLAS</div>
                    <div class="ab_icon_sub">Dedicated with Chef, Staff, Manager</div>
                </div>
                <div class="col-6 col-md-4 text-center">
                	<img src="../../upload/new_design/aboutus/PRICE.png" class="ab_icon" alt="">
                    <div class="ab_icon_tt">PRICE GUARANTEED</div>
                    <div class="ab_icon_sub">Best Valued Price</div>
                </div>
                <div class="col-6 col-md-4 text-center">
                	<img src="../../upload/new_design/aboutus/SERVICED.png" class="ab_icon" alt="">
                    <div class="ab_icon_tt">SERVICED WITH LOVE</div>
                    <div class="ab_icon_sub">24/7 Experienced Customer Service</div>
                </div>
                <div class="col-6 col-md-4 text-center">
                	<img src="../../upload/new_design/aboutus/PERSONAL.png" class="ab_icon" alt="">
                    <div class="ab_icon_tt">PERSONAL CONCIERGE SERVICE</div>
                    <div class="ab_icon_sub">Tailor Made Personalized Activities</div>
                </div>
                <div class="col-6 col-md-4 text-center">
                	<img src="../../upload/new_design/aboutus/SECURED.png" class="ab_icon" alt="">
                    <div class="ab_icon_tt">SECURED PAYMENT</div>
                    <div class="ab_icon_sub">Electronic & Remittance Accepted</div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php include "libs/pages/section_contact_us_footer.php";?>





















<?php /*?><div class="mg-page-titles webss top68"><!--parallax-->
    <div class="container-fluid nopad">
            <img data-src="<?php echo $photo_cover;?>" class="lazy" alt="inspiringvillas cover" width="100%">
        <div class="row" >
        </div>
    </div>
</div><?php */?>
<!--<div class="mg-page-title mobi"></div>-->
<?php //include "libs/pages/search.php";?>



