<?php session_start();?>
<script>
$(document).ready(function(e) {
    $(".lazy").lazyload();
});
function cleartime(func)
{
	clearInterval(func);
}
</script>
<?php /*?>--------------------new-----------------------<?php */?>
<?php 
//$cover = $dbc->GetRecord("slide_photo","*"," status > 0 order by sort asc limit 1");
//$photo_cover = json_decode($cover['photo'],true);
?>
<?php /*?><div class="mg-page-titles top68"><!--parallax-->
    <div class="container-fluid nopad">
    <img class="lazy mtop_cover" data-src="<?php echo $photo_cover;?>" alt="inspiringvillas cover" width="100%" >
        <div class="row">
        </div>
    </div>
</div>
<?php */?>
<?php /*?>--------------------new-----------------------<?php */?>
<!--<script>
	$(document).ready(function(e) {
        $('#mega-sliders2').carousel({
			pause:true
		});
    });
    
    </script>-->
    
    
<?php
if (isMobile()) {
    // User is on a mobile device
	?>
    <div id="mega-sliders2" class="carousel slide top48 mob992" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" >
        <?php
        $aq=0;
        //$ar_pp_768 = ['/upload/slide/768/yang-20201591684020.webp','upload/slide/768/vth20201591684721.webp','upload/slide/768/inspiring_villas1594905061.webp'];
		$ar_pp_618 = ['/upload/slide/618/yang-20201591684020.webp','upload/slide/618/vth20201591684721.webp','upload/slide/618/inspiring_villas1594905061.webp'];
		$ar_pp_618_jpg = ['/upload/slide/618/yang-20201591684020.jpg','upload/slide/618/vth20201591684721.jpg','upload/slide/618/inspiring_villas1594905061.jpg'];
		$ar_pp_430 = ['/upload/slide/430/yang-20201591684020.jpg','upload/slide/430/vth20201591684721.jpg','upload/slide/430/inspiring_villas1594905061.jpg'];
		$d=0;
        foreach($ar_pp_618_jpg as $m_p )
        {
            $act = ($aq==0)?'active beactive':'';
			
           /* $ar_pp_768 = ['/upload/slide/768/yang-20201591684020.webp','upload/slide/768/vth20201591684721.webp','upload/slide/768/inspiring_villas1594905061.webp'];
			$ar_pp_430 = ['/upload/slide/430/yang-20201591684020.webp','upload/slide/430/vth20201591684721.webp','upload/slide/430/inspiring_villas1594905061.webp'];*/
			
			/*$ar_pp_768 = ['/upload/slide/768/yang-20201591684020.webp','upload/slide/768/vth20201591684721.webp','upload/slide/768/inspiring_villas1594905061.webp'];
			$ar_pp_618 = ['/upload/slide/618/yang-20201591684020.webp','upload/slide/618/vth20201591684721.webp','upload/slide/618/inspiring_villas1594905061.webp'];
			$ar_pp_430 = ['/upload/slide/430/yang-20201591684020.jpg','upload/slide/430/vth20201591684721.jpg','upload/slide/430/inspiring_villas1594905061.jpg'];*/
            if($aq==0)
            {
                //$imagess = '<img class="mob992 cal_mob lazy" data-src="'.$m_p.'" width="430" height="141" alt="inspiringvillas cover ">';
				$imagess = '<img class="mob992 cal_mob lazy" src="'.$m_p.'" width="618" height="203" alt="inspiringvillas cover ">';
				/*$imagess = '<picture>';
				  $imagess.= '<source media="(min-width:768px)" srcset="'.$ar_pp_768[$aq].'" > ';//width="768" height="252"';
				  $imagess.= '<source media="(min-width:618px)" srcset="'.$ar_pp_430[$aq].'" > ';//width="430" height="141"';
				  $imagess.= '<source media="(min-width:465px)" srcset="'.$ar_pp_618[$aq].'" > ';//width="430" height="141"';
				  $imagess.= '<img data-src="'.$ar_pp_430[$aq].'" alt="inspiringvillas " width="430" height="141" class="npic wid_100 lazy">';
				$imagess.= '</picture>';*/
            }
            else
            {
                $imagess = '<img class="mob992 cal_mob lazy" data-src="'.$m_p.'" width="618" height="203" alt="inspiringvillas cover ">';
            }
            echo '<div class="item '.$act.'  ">';
                echo $imagess;// 
                //echo '<div class="carousel-caption">';
                    //echo '<!--<img src="libs/images/stars.png" alt="">-->';
                //echo '</div>';
            echo '</div>';
            $aq++;
        }
        ?>
        </div>
        <a class="left carousel-control" aria-label="prev" href="#mega-sliders2" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
        <a class="right carousel-control" aria-label="next" href="#mega-sliders2" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
    </div>
	<!--<div class="ptmb"></div>-->

	<?php
} else {
    ?>
	<div id="mega-sliders" class="carousel slide top48 web992 ws"  data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" ><!--role="listbox"-->
        <?php
        $a=0;
        $sqls = $dbc->Query("select * from slide_photo where status > 0 order by sort asc");
        $imagess = '';
        while($row = $dbc->Fetch($sqls))
        {
            $act = ($a==0)?'active beactive':'';
            $photo = json_decode($row['photo'],true);
            if($a==0)
            {
                $imagess = '<img class="web992 wid_100"  src="'.imagePath($photo).'" width="1863" height="610" alt="inspiringvillas cover " >';
            }
            else
            {
                $imagess = '<img class="web992 lazy wid_100" src="'.imagePath($photo).'" width="1863" height="610" alt="inspiringvillas cover " >';
            }
            echo '<div class="item '.$act.'  ">';
                echo $imagess;// 
                echo '<div class="carousel-caption">';
                    //echo '<!--<img src="libs/images/stars.png" alt="">-->';
                echo '</div>';
            echo '</div>';
            $a++;
        }
        ?>
        </div>
        <a class="left carousel-control" aria-label="prev" href="#mega-sliders" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
        <a class="right carousel-control" aria-label="next" href="#mega-sliders" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
    </div>
	<?php
}
?>





<?php /*?><img class="lazy" data-src="/upload/category/photo_1503739883.jpg" />
<img class="lazy" src="/upload/category/photo_1503739883.jpg" data-src="/upload/category/photo_1503739883.jpg"  /><?php */?>


<?php include "libs/pages/google_remarketing.php";?>
<?php include "libs/pages/search.php";?>


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


<div class="container">
	<div class="row">
    	<div class="col-md-10  col-lg-8 col-md-offset-1 col-lg-offset-2">
        	<div class="col-xs-12 col-sm-12 col-md-12 " >
            	<div style="height: 40px;"></div>
            </div>
            
        	<?php /*?><div class="col-xs-12 col-sm-4 col-md-4 text-center nopad t_t11 ql_text"><strong>Quick Link >>></strong></div>
            <div class="col-xs-6 col-sm-4 col-md-4 text-center nopad t_t22"><a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html"><button class="ql_home" alt="Phuket">Phuket</button></a></div>
            <div class="col-xs-6 col-sm-4 col-md-4 text-center nopad t_t33"><a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html"><button class="ql_home" alt="Koh Samui">Koh Samui</button></a></div><?php */?>
            <?php /*?><div class="col-xs-4 col-sm-3 col-md-3 text-center nopad t_t44"><a href="/search-rent/sri-lanka-sr/all-beach/all-price/all-bedrooms/all-collections/all-sort.html"><button class="ql_home" alt="Sri Lanka">Sri Lanka</button></a></div><?php */?>
        </div>
    </div>
</div>



<div class="container">
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
		/*$.ajax({
			url:"<?php echo $url_link;?>libs/loadmore/photo_slide.php",
			type:"POST",
			dataType:"html",
			data:{htt:'0'},
			success: function(res){
				$(".ptmb").html(res);
			}
		});*/
			
	},50);
});

</script>



<div class="mg-best-rooms catego " style="    margin-top: -40px;">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                    <center>
                    <h1 class="hidden-xs1 mtop255_2 subtop" >Explore luxury villa Thailand, private villas, luxury pool villa for rent</h1>
                    <h2 class="f16 subtop" style="font-family: pr !important;">Discover Luxury Villas</h2>
                    <p class="f16 top20 subtop" style="font-family: pt !important;">
                    	With an exceptional collection of luxury villas in Thailand, one can truly get away from the pressures...
                    </p>
                    
                    <div class="inside_category"></div>
        </div>
    </div>
</div>
<br>

<script>
var tt1=true;
$(window).scroll(function () {
	if ($(this).scrollTop() > $(".catego").offset().top-800) 
	{
		if(tt1==true)
		{
			//$(".lowho_we_are").fadeIn(100);
			$.ajax({
				url:"<?php echo $url_link;?>libs/loadmore/category.php",
				type:"POST",
				dataType:"html",
				data:{htt:'0'},
				success: function(res){
					//$(".lowho_we_are").fadeOut(100);
					$(".blk").hide();
					$(".inside_category").html(res);
					$(".subtop").hide();
				}
			});
			$.ajax({
				url:"<?php echo $url_link;?>libs/loadmore/category_bottom.php",
				type:"POST",
				dataType:"html",
				data:{htt:'0'},
				success: function(res){
					$(".category_bottom").html(res);
				}
			});
			tt1=false;
		}
	}
	
	/*if ($(this).scrollTop() > $(".catego").offset().top-400) 
	{
		if(tt1==true)
		{
			$.ajax({
				url:"<?php echo $url_link;?>libs/loadmore/category_bottom.php",
				type:"POST",
				dataType:"html",
				data:{htt:'0'},
				success: function(res){
					$(".category_bottom").html(res);
				}
			});
			tt1=false;
		}
	}*/
});
</script>

<div class="category_bottom"></div>


<script>
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
</script>
<style>
.paa>p{font-family:unset !important}.paa>center>.mg-sec-left-title:after,.mg-widget-title:after{content:'';display:block;width:110px;height:1px;background-color:#d3a267;position:absolute;bottom:0;left:50%;margin-left:-55px;margin-bottom:10px !important}.mg-sec-left-title:after,.mg-widget-title:after{content:'';display:block;width:80px;height:0px;background-color:#d3a267;position:absolute;bottom:0;left:0;margin-top:-15px !important;top:43px}.mg-sec-title h2{color:#16262e;font-size:30px;text-transform:inherit;font-weight:400;margin:-33px 0 10px}.mg-feature .mg-feature-icon-title i{display:block;width:40px;line-height:40px;background-color:#112845;text-align:center;font-size:21px;color:#fff;border-radius:50%;float:left;-webkit-transition:background-color 0.3s;transition:background-color 0.3s;margin-top:1px}.mg-feature .mg-feature-icon-title h3{display:block;font-family:"Playfair Display",serif;font-size:17px;color:#16262e;font-weight:400;margin-left:60px;margin-top:13px;margin-bottom:-3px;text-transform:uppercase}</style>
<div class="optmnstr"></div>
<script>
var tt=0;
$(window).scroll(function () {
var mybar = $(".transp").offset().top-100;
if ($(this).scrollTop() > mybar) 
{
	if(tt==0)
	{
		$( ".optmnstr" ).load( "libs/pages/optinmonster.php" );
		tt=1;
	}
}
});
</script>
<style>
@media screen and (max-width: 768px)
{
	.but_ql {
		width:100%;
	}
	.ql_text 
	{
		margin-top: -20px;
		margin-bottom:30px !important;
	}
}
@media screen and (min-width: 768px) 
{
.but_ql {
    padding: 10px 25px 10px 25px !important;
    color: #fff;
    background: none;
    border: none;
    /* width: 100%; */
}
}
.bar_inside {
   width: 100%;
   margin-left: 0px;
}
@media screen and (max-width:992px)
{
	.mbt30m
	{
		margin-bottom: 30px;
	}
}

.ddet p{font-family:pt !important}
.carousel-caption2
{
	/*border:1px solid #000;*/
	background-color:#eee;
}
.blu_line
{
	border-top: 23px solid #112845;
    margin-top: 35px;
}
@media screen and(max-width:768px)
{
	.mtop255{
		margin-top: 25px;
	}
	.mtop255_2{
		margin-top: 25px;
	}
}
@media screen and(min-width:768px)
{
	.mtop255{
		/*margin-top: 25px;*/
	}
	.mtop255_2{
		margin-top: 15px;
	}
}

#locationBox:hover #locationText {
   color: #FFF;
}
.locationText{
    text-align: center;
    color: #112845; 
}
.cal_mob
{
	width:100%;
	height:auto;
}
.npic
{
    width:100%;
}
.wid_100
{
	width:100% !important;
}
</style>
