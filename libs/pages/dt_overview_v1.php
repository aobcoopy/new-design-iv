<?php 

   // display_breadcrumbs($room['destination'], $room['subdestination'], 'all-bedrooms', 'all-collections', 'all-prices', 'price|asc', '');
    //include 'libs/pages/dt_breadcrumb.php';

    $brieff = base64_decode($room['brief'],true);
    $bex = explode(",",$brieff);
	$vi_name = explode("|",$room['name']);
    $nu_rate = $dbc->GetCount("rating","property = '".$room['id']."'");
	
	//-----cut namr---------
	if($room['id']=='402')
	{
		$name_no_beach = str_replace("Beachss","",$room['name']);
		$ex_1 = explode(",",$name_no_beach);
		$positition_name = strrpos($ex_1[0]," ");
		$first_name = substr_replace($ex_1[0],",",$positition_name).$ex_1[1];
	}
	elseif($room['id']=='441')
	{
		$name_no_beach = str_replace("Beach","",$room['name']);
		$ex_1 = explode(",",$name_no_beach);
		$positition_name = strrpos($ex_1[0]," ");
		$first_name = $name_no_beach;//substr_replace($ex_1[0],",",$positition_name).$ex_1[1];
	}
	elseif($room['id']=='155')
	{
		$name_no_beach = str_replace("Bay","",$room['name']);
		$ex_1 = explode(",",$name_no_beach);
		$positition_name = strrpos($ex_1[0]," ");
		$first_name = substr_replace($ex_1[0],",",$positition_name).$ex_1[1];
	}
	elseif($room['id']=='269')
	{
		$name_no_beach = $room['name'];
		$ex_1 = explode(",",$name_no_beach);
		$positition_name = strrpos($ex_1[0]," ");
		$first_name = substr_replace($ex_1[0],",",$positition_name).$ex_1[1];
	}
	elseif($room['id']=='87')
	{
		$name_no_beach = $room['name']; //--full name
		$ex_1 = explode(",",$name_no_beach); //-- get name before ,
		$positition_name = strrpos($ex_1[0]," "); //-- check blank space
		$first_name = $name_no_beach;//substr_replace($ex_1[0],",",$positition_name).$ex_1[1];
	}
	else
	{
		$ex_name_1 = explode("|",$room['name']);
		$myString = $ex_name_1[1];

		if ( strstr( $myString, 'Beach' ) ) 
		{
			//echo "Text found";
			$ex_name_2 = explode("|",$room['name']);
			$name_no_beach = str_replace("Beach","",$ex_name_2[1]);
			$ex_1 = explode(",",$name_no_beach);
			$positition_name = strrpos($ex_1[0]," ");
			$first_name = $ex_name_2[0]." | ".substr_replace($ex_1[0],",",$positition_name).$ex_1[1];
		} 
		else
		{
			//echo "Text not found";
			$name_no_beach = str_replace("Beach","",$room['name']);
			$ex_1 = explode(",",$name_no_beach);
			$positition_name = strrpos($ex_1[0]," ");
			$first_name = $name_no_beach;//substr_replace($ex_1[0],",",$positition_name).$ex_1[1];
		}
	}
	
	$price_data = $dbc->GetRecord("pricing","*","property=".$_REQUEST['id']);
	if($price_data['exchange']=='usd' || $price_data['exchange']=='')
	{
		$p_min = $room['pmin'];
		$p_max = $room['pmax'];
	}
	else
	{
		$exchange = $dbc->GetRecord("variable","*","name='thb'");
		$p_min = $room['pmin_th']/$exchange['value'];
		$p_max = $room['pmax_th']/$exchange['value'];
	}
	//$name_no_beach = str_replace("Beach","",$room['name']);
//	$ex_1 = explode(",",$name_no_beach);
//	$positition_name = strrpos($ex_1[0]," ");
//	$first_name = substr_replace($ex_1[0],",",$positition_name).$ex_1[1];
	//-----cut namr---------
?>

<br class="d-block d-lg-none">
<h1 itemprop="name" class="f20 f188 hidden- mobtop0  myhone h1lh myHone-" ><?php echo $first_name;?></h1>
<!--<span itemprop="description"  class="minitext t5b24 hidden-xs1 f14"><?php echo $bex[0]?>,</span>

<span  itemprop="description"  class="minitext t5b24 hidden-xs1 f14">
	<span itemprop="offers" class="f14" itemscope itemtype="http://schema.org/AggregateOffer">Price Range
		<span itemprop="priceCurrency" content="USD">$</span><span itemprop="lowPrice" content="<?php echo $p_min;?>"><?php echo $p_min;?></span>
        -
        <span itemprop="priceCurrency" content="USD">$</span><span itemprop="highPrice" content="<?php echo $p_max;?>"><?php echo $p_max;?></span>
    </span>
    / season
</span>
-->

<div class="pr col-md-12 nopad t_t22 minitext t5b24 hidden-xs1 f16 tb" style="line-height:1.8">
    <span itemprop="description"  class="minitext t5b24 hidden-xs1 f16 tb">
		<?php //echo $bex[0]<br>?>
        <?php
        if($room['adults']!=0)
		{
			echo '<i class="fa fa-users"></i> '.$room['adults'].' Guests &nbsp;&nbsp;';
		}
		
		if($room['bedroom_range']!=0)
		{
			echo '<i class="fa fa-bed"></i> '.$room['bedroom_range'].' &nbsp;';
		}
		
		if($room['bathroom']!=0)
		{
			echo '<i class="fa fa-bath"></i> '.$room['bathroom'].' Bathrooms';
		}
		?>
		
       
        
    </span><br>
    <div class="aa" style="width: 100%;height: 12px;"></div>
    <a class="blu" onClick="goto_price_table();">Price Range  $<?php echo number_format($p_min);?> - $<?php echo number_format($p_max);?> <span class="hidden-xs hidden-sm">/ season</span></a>
    <div class="aa" style="width: 100%;height: 12px;"></div>
    <?php
    if($nu_rate>0)
	{
		?>
        <a class="blu " onClick="goto_review();"><?php echo $nu_rate;?> Reviews</a>
        <?php
	}
	?>
</div>


<br class="d-none d-md-block  hidden-xs hidden-sm">



<?php /*?>google structure data <?php */?>
<span  itemprop="description"  class="minitext t5b24 hidden f14">
	<span itemprop="offers" class="f14" itemscope itemtype="http://schema.org/AggregateOffer">Price Range
		<span itemprop="priceCurrency" content="USD">$</span><span itemprop="lowPrice" content="<?php echo number_format($p_min,0,'','');?>"><?php echo number_format($p_min,0,'','');?></span>
        -
        <span itemprop="priceCurrency" content="USD">$</span><span itemprop="highPrice" content="<?php echo number_format($p_max,0,'','');?>"><?php echo number_format($p_max,0,'','');?></span>
        <span itemprop="offerCount" class="hidden"><?php echo number_format($p_max,0,'','');?></span>
    </span>
    / season
    
</span>
<?php /*?>google structure data <?php */?>



 <?php /*?> <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
    <!--price is 1000, a number, with locale-specific thousands separator
    and decimal mark, and the $ character is marked up with the
    machine-readable code "USD" -->
    <span itemprop="priceCurrency" content="USD">$</span>
    <span itemprop="price" content="1000.00">1,000.00</span>
    <link itemprop="availability" href="http://schema.org/InStock" />
    In stock
  </div><?php */?>



<script>
$(document).ready(function(e) {
    $('.carousel').carousel({
	  interval: 10000
	})
});


</script>


<h2 class="minitext t5b24 hidden-sm hidden-md hidden-lg"></h2><!--<br>-->
<?php /*?><span class="minitext"><?php echo base64_decode($room['brief'],true);?><br></span><br>
<img itemprop="image" src="https://www.inspiringvillas.com/upload/property//photo_1503720247.png" width="100%" alt="..."><?php */?>


<?php /*?><div class="col-md-12 nopad slidetop" >
    <div class="mg-gallery-container">
    
    
    
    <div id="mega-slider" class="carousel slide " data-ride="carousel"  onClick="open_pop();">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php 
        $slide = json_decode($room['photo'],true);
        $aa=0;
        foreach($slide as $img)
        {
            if($aa<=1)
            {
                $act = ($aa==0)?'active':'';
                echo '<li data-target="#mega-slider" data-slide-to="'.$aa.'" class="'.$act.'"></li>';
            }
            $aa++;
        }
        ?>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner spho" role="listbox">
        <div class="coverb"  onClick="open_pop();"><?php /*?>data-toggle="modal" data-target=".bs-example-modal-lgs"<?php *-/?>
            <div class="tview">SEE MORE PHOTOS</div>
        </div>
        <?php 
        //$slide = json_decode($room['photo'],true);
		$vi_name_1 = explode("|",$room['name']);
        $a=0;
        foreach($slide as $img)
        {
            $ac = ($a==0)?'active beactive':'';
            if($a<=1)
            {
            //echo '<li data-toggle="modal" data-target=".bs-example-modal-lgs"><img src="'.$img['img'].'" alt="Partner Logo" width="100%">'.tag($room['tag']).'</li>';
            echo '<div class="item '.$ac.' " >';
				echo '<img itemprop="image" src="'.$img['img'].'" width="100%" alt="'.$vi_name_1[0].$img['name'].'">';//
            echo '</div>';
            }
            $a++;
        }
        ?>
        </div>

        <?php /*?> Controls 
        <a class="left carousel-control" href="#mega-slider" role="button" data-slide="prev">
        </a>
        <a class="right carousel-control" href="#mega-slider" role="button" data-slide="next">
        </a><?php *-/?>
    </div>

    </div>
</div><?php */?>


<div class="col-sm-12 col-md-12 cm12 nopad web">
   <?php /*?> <ul class="newbar" style="padding:0px;">
        <li onClick="visitto('details')">details</li>
        <li onClick="visitto('table-responsive')">rate</li>
        <li onClick="visitto('bedrooms')">bedroom</li>
        <li onClick="visitto('')">floorplan</li>
        <li onClick="visitto('map')">map</li>
        <li onClick="visitto('Reviews')">reviews</li>
    </ul><?php */?>
</div>
<?php /*?><div class="col-sm-12 col-md-12 nopad ">
<br>
</div><?php */?>
<?php /*?><div class="col-md-12 nopad mg-room-fecilities details">
    <h2 class=" ">Overview Description </h2>
    <div class="row " >
        <div class="col-md-12 nopad ">
            <p class="f16"><?php echo base64_decode($room['detail']);?></p>
        </div>  
    </div>
</div><?php */?>
<?php 
$meta = $dbc->GetRecord("metatag","*","property=".$_REQUEST['id']);
$namep = explode("|",$meta['title']);
$namep2 = explode(",",$namep[0]);

function destination_gb($option)
{
	switch($option)
	{
		case "38" :
			return "thailand-phuket";//"phuket";
		break;
		case "39" :
			return "thailand-koh-samui";//"koh-samui";
		break;
		case "100" :
			return "indonesia-bali";//"koh-samui";
		break;
		case "110" :
			return "sri-lanka-sr";//"koh-samui";
		break;
		default:
			return "thailand";
	}
}
function destination_gb_name($option)
{
	switch($option)
	{
		case "38" :
			return "Phuket";//"phuket";
		break;
		case "39" :
			return "Koh Samui";//"koh-samui";
		break;
		case "100" :
			return "Bali";//"koh-samui";
		break;
		case "110" :
			return "Sri Lanka";//"koh-samui";
		break;
		default:
			return "Thailand";
	}
}
?>
<style>
.read_more_box > p, .read_more_box > p > span , .read_more_box > p > span > span
{
	font-size:16px !important;
	line-height: 1.8 !important;
}
.f017
{
	font-size:17px !important;
}
</style>

<div class="col-sm-12 col-md-12 nopad details" style="margin-bottom:-25px; margin-top:17px;">
    <div class="mg-single-room-txt dett det_2">
        <h2 class="mg-sec-left-title hidden-sm hidden" style="padding-bottom: 0px; margin-bottom:-5px !important;margin-top: 10px;"><?php //echo $namep2[0];?> <!--Overview--></h2>
        
        <div class="read_more_box">
            <p class="f18  lh18" style="margin-left:0px !important; font-size:16px !important;line-height: 1.8 !important;"><?php echo base64_decode($room['detail']);?></p>
            <div class="gob  f18t">Go back to view all <a href="/search-rent/<?php echo destination_gb($room['destination']);?>/all-beach/all-price/all-bedrooms/all-collections/all-sort.html"><?php echo destination_gb_name($room['destination']);?> Luxury Villas</a><br><br></div>
            <div class="butrec f18t web992" onClick="goto_recent();">Or go to any <span style="color:#f05542;">Recently Viewed Villas</span></div>
            
            <?php /*?><div class="  f18t">Or go to all your <strong>Recently Viewed Villas</strong></div><?php */?>
            
        </div>
        <div class="read_more_coverbox mob"><button class="see_more" onClick="see_more_detail();"><i class="fa fa-chevron-down"></i> READ MORE</button></div>
        
        
    </div>
</div>

<?php 
if($room['destination']==38)
{
	$whatsapp = '66846771551';
}
else
{
	$whatsapp = '66836556452';
}
//echo $whatsapp;
?>
<?php /*?><a href="https://api.whatsapp.com/send?phone=<?php echo $whatsapp;?>" target="_blank"><button class="inside_bar mob992"><strong><img src="/upload/whatsapp.png" alt="WhatsApp Inspiring Villas" width="30"> - Whatsapp us to help you find the right villa</strong> <strong class="tred">- Click Here!</strong></button></a><?php */?>

<script>
var re_hi;
$(document).ready(function(e) {
//    $('html,body').animate({ 
//			scrollTop: $(".topfoot").offset().top
//		}, 1);
//	$('html,body').animate({ 
//		scrollTop: 0
//	}, 200);
});

function see_more_detail()
{
	$(".read_more_box").css({"height":"auto"});
	//$(".read_more_box").animate({height:"auto"},300);
	$(".see_more,.read_more_coverbox").hide();
}
function goto_review()
{
	var testDiv = document.getElementById("pos_my_reviews");
	if($(window).width()<976)
	{
		var re_top = testDiv.offsetTop+210;
  		window.scrollTo(0, re_top);
	}
	else if($(window).width()> 976 && $(window).width()<1100)
	{
		var re_top = testDiv.offsetTop+250;
  		window.scrollTo(0, re_top);
	}
	else if($(window).width()> 1100 && $(window).width()<1300)
	{
		var re_top = testDiv.offsetTop+300;
  		window.scrollTo(0, re_top);
	}
	else if($(window).width()> 1300 && $(window).width()<1500)
	{
		var re_top = testDiv.offsetTop+310;
  		window.scrollTo(0, re_top);
	}
	else
	{
		var re_top = testDiv.offsetTop+400;
		window.scrollTo(0, re_top);
	}
	setTimeout(function(){
		setTimeout(function(){
			$(".pos_my_reviews").css({"background": "#ffb0b0"});
		},500);	
		setTimeout(function(){
			$(".pos_my_reviews").css({"background": ""});
		},2000);	
	},1000);
	//alert($(".recently_web").height()+'---'+re_hi);
}

function goto_price_table()
{
	var rental = document.getElementById("rental_rate");
	if($(window).width()<600)
	{
		var rental_top = rental.offsetTop+230;
		window.scrollTo(0, rental_top);
	}
	else if($(window).width()> 700 && $(window).width()<900)
	{
		var rental_top = rental.offsetTop+250;
		window.scrollTo(0, rental_top);
	}
	else if($(window).width()> 900 && $(window).width()<1100)
	{
		var rental_top = rental.offsetTop+250;
		window.scrollTo(0, rental_top);
	}
	else if($(window).width()> 1100 && $(window).width()<1200)
	{
		var rental_top = rental.offsetTop+300;
		window.scrollTo(0, rental_top);
	}
	else if($(window).width()> 1200 && $(window).width()<1400)
	{
		var rental_top = rental.offsetTop+300;
		window.scrollTo(0, rental_top);
	}
	else if($(window).width()> 1400 && $(window).width()<1600)
	{
		var rental_top = rental.offsetTop+350;
		window.scrollTo(0, rental_top);
	}
	else
	{
		var rental_top = rental.offsetTop+400;
		window.scrollTo(0, rental_top);
	}
	
		
	setTimeout(function(){
		setTimeout(function(){
			$(".rental_rate").css({"background": "#ffb0b0"});
		},500);	
		setTimeout(function(){
			$(".rental_rate").css({"background": ""});
		},2000);	
	},1000);
}

function goto_recent()
{
	setTimeout(function(){
		re_hi = $(".my_recent_posi").height();//($(".recent").height()*2)+70;///2;
	},1000);

	re_hi = $(".my_recent_posi").height();
	if($(window).width()<976)
	{
		$('html,body').animate({ 
			scrollTop: $(".recently_mob").offset().top-100
		}, 1000);
	}
	else
	{
		$('html,body').animate({ 
			scrollTop: $(".my_recent_posi").offset().top-150//-(re_hi+190)
		}, 100);
	}
	setTimeout(function(){
		setTimeout(function(){
			$(".my_recent_posi").css({"background": "#ffb0b0"});
		},500);	
		setTimeout(function(){
			$(".my_recent_posi").css({"background": ""});
		},2000);	
	},1000);
	//alert($(".my_recent_posi").height()+'---'+re_hi);
}
</script>

<style>
@media screen and (min-width:768px)
{
	.det_2
	{
		margin-top: -30px;
	}
}
.butrec
{
	cursor:pointer;
	margin-top:-20px;
	margin-bottom:40px;
}
.recent,.pos_my_reviews,.rental_rate
{
	transition:all 1s;
}
</style>