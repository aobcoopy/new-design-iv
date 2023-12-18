<?php
global $dbc;

include_once "../../config/define.php";
include_once "../class/db.php";
include_once "../class/minerva.php";

@ini_set('display_errors',DEBUG_MODE?1:0);
date_default_timezone_set(DEFAULT_TIMEZONE);

$dbc = new dbc;
$dbc->Connect();
$os = new minerva($dbc);
	
$data = $dbc->GetRecord("blog_ig_photo","*","id=1");
$ig = json_decode($data['photo'],true);
$ig_photo = array();
foreach($ig as  $link)
{
	$ex = explode("p/",$link);	
	$path = str_replace("/","",$ex[1]);
	array_push($ig_photo,$path);
}

$arr_post = $ig_photo;//array('CP3O8ojLbn5','CPk9_tyLRj2','CPdPmB8ro1y','CPVpw9_lqES','CPIYEWQLSNY','CN5CWlmBDzu');
//$arr_post = array('CP3O8ojLbn5','CPk9_tyLRj2','CPdPmB8ro1y','CPVpw9_lqES','CPIYEWQLSNY','CN5CWlmBDzu');






//echo '<div class="owl-carousel web">';
for($i=0;$i<6;$i++)
{
	$post = $arr_post[$i];
	$access_token = '367335174001704|18e0f23556f5b787b311a9ac1642eb57'; //{your-app_id}|{your-app_secret}
	
	//$access_token = '322375449395829|b72d7c7722f36fae7b892088ee5d6ab2';

	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://graph.facebook.com/v10.0/instagram_oembed?url=https://www.instagram.com/p/".$post."&maxwidth=640&fields=thumbnail_url%2Cauthor_name%2Cprovider_name%2Cprovider_url%20&access_token=".$access_token."",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
		"cache-control: no-cache",
		"postman-token: 2aec2144-75f4-8bf6-01d9-852056b14bcd"
	  ),
	));
	
	$response = curl_exec($curl);
	$decode = json_decode($response,true);
	$err = curl_error($curl);
	
	curl_close($curl);
	
	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  //echo $response;
	  $img = $decode['thumbnail_url'];
	  //array_push($ig_array,$img);
	  $ig_array[] = array(
	  	'photo' => $img,
		'link' => $post
	  );
	 //echo '<br><br><br><br><br><br>';
	  
	}//echo '-*--'.$decode['thumbnail_url'];
	
	
}
?>





<div class="owl-carousel web ig_carousel">
<?php 
foreach($ig_array as $igp_web)
{
echo '<div class="owl_box"> <a class="" href="https://www.instagram.com/p/'.$igp_web['link'].'" target="_blank"><img src="'.$igp_web['photo'].'" alt="" class="ig_photo"></a> </div>';
}
?>
</div>



<div id="igp" class="carousel slide mob" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php 
		$c=0;
		foreach($ig_array as $igp)
		{
			$act = ($c==0)?'active':'';
			
			echo '<div class="carousel-item '.$act.'">';
				echo '<a href="https://www.instagram.com/p/'.$igp['link'].' " target="_blank">';
					echo '<img src="'.$igp['photo'].'" class="d-block w-100" alt="...">';
				echo '</a>';
			echo '</div>';
			$c++;
			//echo 'https://www.instagram.com/p/'.$igp.'<br>';
		}
		?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#igp" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#igp" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>



<link rel="stylesheet" href="libs/css/owl/owl.carousel.min.css">
<link rel="stylesheet" href="libs/css/owl/owl.theme.default.min.css">
<!--<script src="jquery.min.js"></script>-->
<script src="libs/js/owl/owl.carousel.min.js"></script>

<script>
$('.ig_carousel').owlCarousel({
    loop:true,
    margin:0,
	lazyLoad: true,
	nav:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:3,
			margin:0,
			nav:true
        },
        600:{
            items:3,
			margin:0,
			nav:true
        },
        768:{
            items:3,
			margin:0,
			nav:true
        },
		900:{
            items:4,
			margin:0,
			nav:true
        },
        1000:{
            items:4,
			margin:0,
			nav:true
        },
        1200:{
            items:5,
			margin:0,
			nav:true
        },
        1400:{
            items:5,
			margin:0,
			nav:true
        },
        1500:{
            items:6,
			margin:0,
			nav:true
        }
    }
})
</script>