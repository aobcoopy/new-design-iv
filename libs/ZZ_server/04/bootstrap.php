<?php ob_start('ob_gzhandler');
 //$offset = 1 ;//* 60 * 24 * 7; // 7 Day 
 $offset = 60 * 60 * 24 * 7; // 7 Day 
 $ExpStr = "Expires: " . gmdate("D, d M Y H:i:s", time() + $offset) . " GMT";
 
 header($ExpStr);
 header("Pragma: no-cache"); 
 //header("Cache-Control: max-age=604800");
 header("Cache-Control: max-age=604800 must-revalidate");
?>
<!doctype html><html lang="en"><head>


<?php 

    //$url_link = "http://127.0.0.1:8105/";
    //$url_link = "http://inspiringvillas.local/";
    $url_link = "https://" . $_SERVER['SERVER_NAME'] . "/";
    //$url_link = "https://www.inspiringvillas.com/";
    
    $AWS_S3_link = S3_BUCKET_URL."/";  
    
    
    include "metatag.php";
    $page=isset($_REQUEST['page'])?$_REQUEST['page']:'home';
    include "canonical.php";
    include "noindex.php";
	if($photo_id!='')
	{
		if($page=='yacht')
		{
			$photo_PageMap = $photo_id;
		}
		else
		{
			$photo_PageMap = S3_BUCKET_URL.$photo_id;
		}
		
	}
	else
	{
		$photo_PageMap = $AWS_S3_link . "upload/default_page_map.jpg";
	}
	
     //---inspiringgroup
	if($page !='inspiringgroup')
	{
		if($page == 'home')
		{
			echo '<link href="libs/css/bootstrap.min.home.css" rel="stylesheet" >';
			//echo '<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet" />';//rel="preload" as="font"
		}
		else
		{
			if($page=='villaform-admin' || $page =='villaform-customer' || $page =='view-villaform-admin'  )
			{
			}
			else
			{
				echo '<link href="'.$AWS_S3_link.'libs/css/bootstrap.min.css" rel="stylesheet" >';
			}
		}
	   /* <link href="<?php echo $url_link;?>libs/css/font-awesome.min.css" rel="stylesheet"> 
		<link href="<?php echo $url_link;?>libs/css/cs-select.css" rel="stylesheet"> */
		
		if($page=='propertydetail' || $page=='villa_private')
		{
			echo '<link href="'.$AWS_S3_link.'libs/css/bootstrap-datepicker3.min.css" rel="stylesheet">'; 
			echo '<link rel="preload" href="'.$AWS_S3_link.'libs/css/datepicker.css" rel="stylesheet">';
		}
		
		if( $page=='forrent')
		{
			echo '<link href="'.$AWS_S3_link.'libs/css/bootstrap-datepicker3.min.css" rel="stylesheet">';
			/*<link rel="preload" href="<?php echo $AWS_S3_link;?>libs/css/datepicker.css" rel="stylesheet">*/
		}
		
		if($page == 'home')
		{
			echo '<link href="libs/css/homepage3.css" rel="stylesheet">';
			echo '<script  src="'.$AWS_S3_link.'libs/js/jquery-3.1.1.min.js"></script>';
			/*<!--<link href="<?php echo $AWS_S3_link;?>libs/css/style.css?v=00082" rel="stylesheet" >
			<link href="<?php echo $AWS_S3_link;?>libs/css/a_style.css?v=00087" rel="stylesheet" >-->*/
		}
		else
		{
			if($page=='villaform-admin' || $page =='villaform-customer' || $page =='view-villaform-admin'  )
			{
			}
			else
			{
				echo '<link href="'.$AWS_S3_link.'libs/css/style.css?v=00082" rel="stylesheet" >';
				echo '<link href="'.$AWS_S3_link.'libs/css/a_style.css?v=00087" rel="stylesheet" >'; 
				echo '<script  src="'.$AWS_S3_link.'libs/js/jquery-3.1.1.min.js"></script>';
			}
		}
		
		if($page=='villaform-admin' || $page =='villaform-customer' || $page =='view-villaform-admin'  )//|| $page =='product-lists'
		{
			echo '<link href="'.$AWS_S3_link.'libs/css/style.css?v=00082" rel="stylesheet" >';
			echo '<link href="'.$url_link.'libs/css/v5/bootstrap_5/bootstrap.min.css" rel="stylesheet" >';
			echo '<link href="'.$url_link.'libs/css/v5/villa_form.css" rel="stylesheet"> ';
			echo '<link href="'.$url_link.'libs/css/v5/villa_form_responsive.css" rel="stylesheet"> ';
			echo '<link href="'.$AWS_S3_link.'libs/css/a_style.css?v=00087" rel="stylesheet" >'; 
			echo '<script  src="'.$AWS_S3_link.'libs/js/jquery-3.1.1.min.js"></script>';
		}
    } //---inspiringgroup
    ?>
    
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo $meta_description;?>">
    <meta name="author" content="Inspiringvillas">
	<?php /*?><meta name="viewport" content="width=device-width, initial-scale=1"> <?php */?>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=3.0">
    <!--<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">-->
    <meta name="msvalidate.01" content="E38E748C2673AE382D71A04F846950AF" />
    
    <meta property="og:title" content="<?php echo $title_tag." - InspiringVillas.com";?>"/>
    <meta property="og:image" content="<?php echo $photo_PageMap;?>">
    <meta property="og:description" content="<?php echo $meta_description;?>"/>
    <meta property="og:url" content="<?php echo "https://www.inspiringvillas.com".$_SERVER['REQUEST_URI'];?>"/>
    <meta property="og:type" content="website"/>
    <meta property="fb:app_id" content="367335174001704"/>
    
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?php echo $title_tag." - InspiringVillas.com";?>">
    <meta name="twitter:description" content="<?php echo $meta_description;?>">
    <meta name="twitter:image" content="<?php echo $photo_PageMap;?>">
    
    <meta name="thumbnail" content="<?php echo $photo_PageMap;?>" />

    <!--  <PageMap>
        <DataObject type="thumbnail">
          <Attribute name="src" value="<?php echo $photo_PageMap;?>"/>
          <Attribute name="width" value="100"/>
          <Attribute name="height" value="auto"/>
        </DataObject>
      </PageMap>
    -->   
    
    <!--Google data structure-->
    <meta itemprop="url" content="<?php echo $url_link.$url;?>">
    <!--Google data structure--> 
    
    <?php if(($ppa=='home' || !isset($ppa)) || $title_tag == "Koh Samui Beachfront Villa - Luxury Villas for rent in Koh Samui" || $title_tag == "Phuket beachfront villa - Luxury villas for rent in Phuket Thailand") { ?>
        <title><?php echo $title_tag;?></title>
    <?php } else { 
			$array_link = ['/search-rent/thailand-phuket/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html',
			'/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/larger-group-villas/all-sort.html',
			'/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html',
			'/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html',
			'/search-rent/thailand-phuket/kamala-beach/all-price/all-bedrooms/all-collections/all-sort.html',
			'/search-rent/thailand-phuket/surin-beach/all-price/all-bedrooms/all-collections/all-sort.html',
			'/search-rent/thailand-koh-samui/bophut-beach/all-price/all-bedrooms/all-collections/all-sort.html',
			'/search-rent/thailand-phang-nga/all-beach/all-price/all-bedrooms/all-collections/all-sort.html',
			'/search-rent/thailand-phuket/nai-harn/all-price/all-bedrooms/all-collections/all-sort.html',
			'/search-rent/thailand-koh-samui/lamai-beach/all-price/all-bedrooms/all-collections/all-sort.html',
			'/search-rent/thailand-koh-samui/laem-sor-beach/all-price/all-bedrooms/all-collections/all-sort.html',
			'/search-rent/thailand-koh-samui/maenam-beach/all-price/all-bedrooms/all-collections/all-sort.html',
			'/search-rent/thailand-phuket/patong/all-price/all-bedrooms/all-collections/all-sort.html',
			'/search-rent/thailand-koh-samui/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html',
			'/search-rent/thailand-phuket/cape-yamu/all-price/all-bedrooms/all-collections/all-sort.html',
			'/search-rent/thailand-koh-samui/lipa-noi-beach/all-price/all-bedrooms/all-collections/all-sort.html'];
			if(in_array($_SERVER['REQUEST_URI'],$array_link))
			{
				echo '<title>'.$title_tag.'</title>';
			}
			else
			{
				echo '<title>'.$title_tag.' - InspiringVillas.com</title>';
			}
    } ?>


    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <link rel="apple-touch-icon" href="icon.jpg">
    
   
   
<meta name="google-site-verification" content="p8BqI9tJsNKVYmP4Bnyy9-iCEv5GoqS22vlxxCCxfEM" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<!-- Google Tag Manager -->
<!--<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PXJL4NQ');</script>-->

<script defer src="<?php echo $url_link;?>libs/Google.js"></script>
<!-- End Google Tag Manager -->

<!-- Google Tag Manager -->
<!--<script defer>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-P46GWJJ');</script>-->
<!-- End Google Tag Manager -->



<meta name="facebook-domain-verification" content="52718f10gh8gwm8nfz9zr2r5uqaa2v" />

<link rel="preload" as="image" href="<?php echo $url_link;?>upload/logo.webp" /> 
<link rel="preload" as="image" href="<?php echo $url_link;?>upload/logo.png" /> 
<link rel="preload" as="image" href="<?php echo $url_link;?>upload/slide/618/yang-20201591684020.webp" /> 
<link rel="preload" as="image" href="<?php echo $url_link;?>upload/slide/618/vth20201591684721.webp" /> 
<link rel="preload" as="image" href="<?php echo $url_link;?>upload/slide/618/inspiring_villas1594905061.webp" /> 
<link rel="preload" as="image" href="<?php echo $url_link;?>upload/pata.webp" /> 




<?php include_once("analyticstracking.php");?>
</head>
<body>



<?php //$page=isset($_REQUEST['page'])?$_REQUEST['page']:'home';

if($page=='step1' || $page=='step2'  || $page=='inspiringgroup'){}
elseif($page=='booking' ||  $page=='villaform-admin' || $page =='villaform-customer' || $page =='view-villaform-admin' || $page =='product-lists')
{
}
elseif($page=='email_detail'){}
else{include "pages/header.php";}

switch($page)
{   
    case"home":include "pages/page_home.php";include "pages/popup.php";break;
    case"service":include "pages/page_our_service.php";break;
    case"forrent":include "pages/page_property.php";include "pages/popup.php";break;
    case"blog":include "pages/page_blog.php";break;
    case"blogdetail":include "pages/page_blog_detail.php";break;
    case"faq":include "pages/page_faq.php";break;
    case"contact":include "pages/page_contact.php";break;
    case"propertydetail":include "pages/page_property_detail.php";break;
    //case"villas":include "pages/page_villas.php";break;
    case"about":include "pages/page_about.php";break;
    case"thanks":include "pages/thank_you.php";break;
    case"thank-you-question":include "pages/thank_you_question.php";break;
    case"thank-you-contact":include "pages/thank_you_contact.php";break;
    case"step1":include "pages/payment_form.php";break;
    case"step2":include "pages/payment_confirm.php";break;
    //case"410":include "pages/410.php";break;
    case"testpage":include "pages/testpage.php";break;
    case"testpage2":include "pages/testpageKohSamui.php";break;
    case"testpage3":include "pages/testpagePhuket.php";break;
    case"booking":include "pages/booking_page.php";break;
    case"terms":include "pages/page_terms.php";break;
    case"privacy":include "pages/page_privacy.php";break;
    case"recently":include "pages/page_recently.php";break;
	case"villaform":include "pages/page_villaform.php";break;
	case"viewvillaform":include "pages/page_viewvillaform.php";break;
	case"favorite":include "pages/page_favorite_view.php";break;
	
	case"villa-promotions":include "pages/page_villa_promotions.php";break;
	case"villa_review":include "pages/page_property_review.php";break;
	case"yacht":include "pages/page_yacht.php";break;
	case"villa_private":include "pages/page_property_private.php";break;
	
	case"test_blog":include "pages/test_blog.php";break;
	case"email_detail":include "pages/page_show_email_detail.php";break;
	
	case"villaform-admin":include "pages/page_villaform_admin.php";break;
	case"villaform-customer":include "pages/page_villaform_customer.php";break;
	case"view-villaform-admin":include "pages/page_view_villaform_admin.php";break;
	case"product-lists":include "pages/page_product_lists.php";break;

    case"block_preview":include "pages/page_blog_detail_2.php";break;
    case"yacht_preview":include "pages/page_yacht_preview.php";break;
	case"yacht_thanks":include "pages/thank_you_yacht.php";break;
	case"yacht_recently":include "pages/page_yacht_recently.php";break;
	
	case"inspiringgroup":include "inspiringgroup/index.php";break;
	case"hubpage":include "pages/page_hubpage.php";break;
	//case"blog/blog-author":include "pages/page_blog.php";break;
}

    if($page!='thanks' && $page!='yacht_thanks')
    {
		$arrr_linkss = array('step1','step2','testpage','testpage2','testpage3','booking','inspiringgroup','thank-you-question','thank-you-contact','villaform','viewvillaform','villaform-admin','villaform-customer','view-villaform-admin','product-lists','email_detail');
		if(!in_array($page,$arrr_linkss))
		{
			include "pages/footer.php";
		}
		else
		{
		}
    }
    //if($page!='propertydetail'){include "pages/popup.php";}
    
if($page !='inspiringgroup')
{
		echo '<script defer src="'.$AWS_S3_link.'libs/js/bootstrap.min.js"></script>';
        echo '<script defer src="'.$AWS_S3_link.'libs/js/selectFx.js"></script>';

        if($page=='home' )
        {
            echo '<script defer src="'.$AWS_S3_link.'libs/js/jquery.parallax-1.1.3.js"></script>';
			echo '<script defer src="libs/js/script1.js?v=05"></script>'; 
        }
		elseif($page=='propertydetail')
		{
			echo '<script defer src="'.$AWS_S3_link.'libs/js/jquery.parallax-1.1.3.js"></script>';
			echo '<script defer src="'.$AWS_S3_link.'libs/js/script.js?v=05"></script>'; 
		}
		else
		{
			echo '<script defer src="'.$AWS_S3_link.'libs/js/script.js?v=05"></script>'; 
		}

        if($page=='propertydetail' || $page=='villa_private' || $page=='villa_review')
        {
            echo '<script defer src="'.$AWS_S3_link.'libs/js/jssor.slider.mini.js"></script>';
            echo '<script defer src="'.$AWS_S3_link.'libs/js/star-rating.js"></script>';
            echo '<script defer src="'.$AWS_S3_link.'libs/js/bootstrap-datepicker.js"></script>';
            echo '<script defer src="'.$AWS_S3_link.'libs/js/input_nark.js"></script>';
        	/*<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBL4iy_QqditYvmqAYsZ2UP-kVUQm3uFNs&callback=initMap"></script>*/
        }
		
        if( $page=='forrent')
        {
            echo '<script defer src="'.$AWS_S3_link.'libs/js/bootstrap-datepicker.js"></script>';
			/*<script defer src="<?php echo $url_link;?>libs/js/input_nark.js"></script>
			<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBL4iy_QqditYvmqAYsZ2UP-kVUQm3uFNs&callback=initMap"></script>*/
        }
	     if($page=='home' )
		 {
			 /*echo '<script defer src="libs/js/lazysizes.min1.js" ></script>';*/
			 echo '<script defer src="'.$AWS_S3_link.'libs/js/lazyload.min.js"></script>';
		 }
		 else
		 {
			 echo '<script defer src="'.$AWS_S3_link.'libs/js/lazyload.min.js"></script>';
		 }
			
        
}

include "pages/head_js.php";
?>


<style>
select {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    padding: 8px;
    margin: 0;
    background: url(data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCIgdmlld0JveD0iMCAwIDI5Mi4zNjIgMjkyLjM2MiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMjkyLjM2MiAyOTIuMzYyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxnPgoJPHBhdGggZD0iTTI4Ni45MzUsNjkuMzc3Yy0zLjYxNC0zLjYxNy03Ljg5OC01LjQyNC0xMi44NDgtNS40MjRIMTguMjc0Yy00Ljk1MiwwLTkuMjMzLDEuODA3LTEyLjg1LDUuNDI0ICAgQzEuODA3LDcyLjk5OCwwLDc3LjI3OSwwLDgyLjIyOGMwLDQuOTQ4LDEuODA3LDkuMjI5LDUuNDI0LDEyLjg0N2wxMjcuOTA3LDEyNy45MDdjMy42MjEsMy42MTcsNy45MDIsNS40MjgsMTIuODUsNS40MjggICBzOS4yMzMtMS44MTEsMTIuODQ3LTUuNDI4TDI4Ni45MzUsOTUuMDc0YzMuNjEzLTMuNjE3LDUuNDI3LTcuODk4LDUuNDI3LTEyLjg0N0MyOTIuMzYyLDc3LjI3OSwyOTAuNTQ4LDcyLjk5OCwyODYuOTM1LDY5LjM3N3oiIGZpbGw9IiMwMDAwMDAiLz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K) 96% / 10px no-repeat #fff0 !important;
    width: 100%;
    color: #fff;
    border-color: #fff;
}
/* cyrillic-ext */
@font-face {
  font-family: 'Roboto';
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu72xKOzY.woff2) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}
.wid_100
{
	width:100% !important;
}
</style>
<!--<style nonce="hXqCnmhrVZ">.pixel{display:none}</style>-->
<!--<script nonce="hXqCnmhrVZ">
setTimeout(function(){
   /* Facebook Pixel Code */
 
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '3605778229438852');
  fbq('track', 'PageView');
   }, 3000);
   
</script>-->
<!--<noscript>
<img height="1" width="1" class="pixel" style="display:none" src="https://www.facebook.com/tr?id=3605778229438852&ev=PageView&noscript=1"/>
</noscript>-->
<!-- Facebook Pixel Code -->
<!--<script>
$(document).ready(function(e) {
	var urll='<?php echo $_SERVER['REQUEST_URI'];?>';
    if(urll=='/blog/blog-author.html')
    {
        window.location = 'https://www.inspiringvillas.com/blog';
    }
});
</script>-->
<script defer src="<?php echo $url_link;?>libs/FB_Pixel.js"></script>
<noscript>
<img height="1" width="1" class="pixel" style="display:none" src="https://www.facebook.com/tr?id=3605778229438852&ev=PageView&noscript=1"/>
</noscript>
<!-- Facebook Pixel Code -->


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-59VWVL67"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PXJL4NQ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P46GWJJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

 </body></html>
