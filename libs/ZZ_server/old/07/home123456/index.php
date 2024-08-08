<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>TESTING</title>
<script src="https://media.inspiringvillas.com/prd/libs/js/jquery-3.1.1.min.js"></script>
<meta name="robots" content="noindex">

<link href="../../libs/css/bootstrap.min.css" rel="stylesheet">
<link href="../../libs/css/style.css" rel="stylesheet"><link href="../../libs/css/a_style.css" rel="stylesheet">
</head>

<body>


<br><br><br>
<div class="container-fluid">
<?php
	session_start();
	include_once "../../config/define.php";
	include_once "../../libs/class/db.php";
    include_once "../../inc/functions.inc.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	$dbc = new dbc;
	$dbc->Connect();

	$url_link = 'https://www.inspiringvillas.com/';

?>
<script>
$(document).ready(function(e) {
    $(".lazy").lazyload();
});
function cleartime(func)
{
	clearInterval(func);
}
</script>


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
                $imagess = '<img class="mob992 cal_mob lazy" src="'.$m_p.'" width="618" height="203" alt="inspiringvillas cover ">';
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
<?php /*?><img class="lazy" data-src="/upload/category/photo_1503739883.jpg" />
<img class="lazy" src="/upload/category/photo_1503739883.jpg" data-src="/upload/category/photo_1503739883.jpg"  /><?php */?>





<div class="container">
	<div class="row">
    	<div class="col-md-10  col-lg-8 col-md-offset-1 col-lg-offset-2">
        	<div class="col-xs-12 col-sm-12 col-md-12 " >
            	<div style="height: 40px;"></div>
            </div>
            
        </div>
    </div>
</div>



<div class="container">
<div class="inside_data_recently_home"></div>
</div>
<script>
$(document).ready(function(e) {
	//load_cont();
	
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
                    
                    <h1 class="hidden-xs1 mtop255_2" >Explore luxury villa Thailand, private luxury villas for rent</h1>
                    <h2 class="f16" style="font-family: pr !important;">Discover Luxury Villas</h2>
                    <p class="f16 top20" style="font-family: pt !important;">
                    	With an exceptional collection of luxury villas, private villas, luxury pool villa in Thailand, one can truly get away from the pressures of everyday life and escape to the tropical beauty of Southeast Asia. For a wedding, honeymoon or a family vacation, Inspiring Villas offers a complete range of luxury villas to choose from. 
                    </p>
                    
                    <h2 class="f16" style="font-family: pr !important;">A handpicked collection</h2>
                    <p class="f16 top20" style="font-family: pt !important;">
                    	Privacy, exclusivity and location are what make a private villa in Thailand an unforgettable experience. Each property in the Inspiring Villas collection has been personally inspected and selected for its unique style, design and potential to make an otherwise ordinary vacation exceptional. 
                    </p>
                    
                    <h2 class="f16" style="font-family: pr !important;">Personalised service</h2>
                    <p class="f16 top20" style="font-family: pt !important;">
                    	Each one of our Thailand villas comes with the complete and personalised service of our incredible team. Whether you choose to visit the lush island shores of Koh Samui, the thriving beach metropolis of Phuket or the laid-back vibes in Koh Phangan, your experience will come with 100% support from a dedicated team to ensure that your holiday is nothing short of extraordinary. 
                    </p>
                    </center>
                <br>
                <div class="row">
                
                
				<?php 
				$sql_cate = $dbc->Query("select * from categories where status > 0 and id IN (6,4,8,5,17,18) order by sort asc limit 0,6"); //
				$zz=0;
				while($r_cate = $dbc->Fetch($sql_cate))
				{
					$nam = explode("-",$r_cate['name']);
					$pho = json_decode($r_cate['photo'],true);
					if($zz<=1){$cal="top10";}else{$cal="top30";}
					$zz++;
					echo '<div class="col-sm-6 col-md-6 '.$cal.'">';
					
					if($r_cate['id']==5)
					{
						$name_more = '(>14)';
					}
					else
					{
						$name_more = '';
					}
					
					$ca_box_name = '';
					$PK_Full_cate_name = '';
					$KSM_Full_cate_name = '';
					
					if($r_cate['id']==4)
					{
						$ht_links = "/search-rent/thailand/all-beach/all-price/all-bedrooms/seaview-villas/all-sort.html";
						$cate_name = $r_cate['brief'];
						$small_font = '';
						//$ht_links = "/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html";
						
						//echo '<div class="ca_box_name">Thailand Villas</div>';
						//echo '<div class="ca_box_name">'.switchcase_sort($r_cate['id']).' '.$name_more.'</div>';
						$ca_box_name = '<div class="ca_box_name">'.switchcase_sort($r_cate['id']).' '.$name_more.'</div>';
						$phuket_link = $url_link . 'search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/'.$r_cate['slug'].'/all-sort.html';
						$koh_samui_link = $url_link . 'search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/'.$r_cate['slug'].'/all-sort.html';
						
						$vn = explode("-",$r_cate['name']);
						$ca_name = explode("Villas",$vn[0]);
						$cate_name = $vn[0];
						
						$PK_Full_cate_name = 'Phuket '.$cate_name;
						$KSM_Full_cate_name = 'Koh Samui '.$cate_name;
					}
					elseif($r_cate['id']==5)
					{
						$ht_links = "/".$r_cate['ht_link'].".html";
						$cate_name = $r_cate['brief'];
						$small_font = 'sm_text_l';
						
						//echo '<div class="ca_box_name">'.switchcase_sort($r_cate['id']).' '.$name_more.'</div>';
						$ca_box_name = '<div class="ca_box_name">'.switchcase_sort($r_cate['id']).' '.$name_more.'</div>';
						$phuket_link = $url_link . 'search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/'.$r_cate['slug'].'/all-sort.html';
						$koh_samui_link = $url_link . 'search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/'.$r_cate['slug'].'/all-sort.html';
						
						$vn = explode("-",$r_cate['name']);
						$ca_name = explode("Villas",$vn[0]);
						$cate_name = $ca_name[0];
						
						$PK_Full_cate_name = 'Phuket '.$cate_name;
						$KSM_Full_cate_name = 'Koh Samui '.$cate_name;
					}
					elseif($r_cate['id']==6)
					{
						$ht_links = "/".$r_cate['ht_link'].".html";
						$cate_name = $r_cate['brief'];
						$small_font = 'sm_text';
						
						//echo '<div class="ca_box_name">'.switchcase_sort($r_cate['id']).' '.$name_more.'</div>';
						$ca_box_name = '<div class="ca_box_name">'.switchcase_sort($r_cate['id']).' '.$name_more.'</div>';
						$phuket_link = $url_link . 'search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/'.$r_cate['slug'].'/all-sort.html';
						$koh_samui_link = $url_link . 'search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/'.$r_cate['slug'].'/all-sort.html';
						
						/*$vn = explode("-",$r_cate['name']);
						$ca_name = explode("Villas",$vn[0]);
						$cate_name = $ca_name[0];*/
						
						$PK_Full_cate_name = $cate_name.' Phuket';
						$KSM_Full_cate_name = $cate_name.' Koh Samui';
					}
					elseif($r_cate['id']==8)
					{
						$ht_links = "/".$r_cate['ht_link'].".html";
						$cate_name = $r_cate['brief'];
						$small_font = 'sm_text_l';
						
						//echo '<div class="ca_box_name">'.switchcase_sort($r_cate['id']).' '.$name_more.'</div>';
						$ca_box_name = '<div class="ca_box_name">'.switchcase_sort($r_cate['id']).' '.$name_more.'</div>';
						$phuket_link = $url_link . 'search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/'.$r_cate['slug'].'/all-sort.html';
						$koh_samui_link = $url_link . 'search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/'.$r_cate['slug'].'/all-sort.html';
						
						$vn = explode("-",$r_cate['name']);
						$ca_name = explode("Villas",$vn[0]);
						$cate_name = $vn[0];
						
						$PK_Full_cate_name = 'Phuket '.$cate_name;
						$KSM_Full_cate_name = 'Koh Samui '.$cate_name;
					}
					elseif($r_cate['id']==17)//--Full-Service
					{
						$ht_links = "/search-rent/thailand/all-beach/all-price/all-bedrooms/full-staff-service-villas/all-sort.html";
						$cate_name = $r_cate['brief'];
						$small_font = '';
						
						//echo '<div class="ca_box_name">Thailand '.$r_cate['brief'].' '.$name_more.'</div>';
						$ca_box_name = '<div class="ca_box_name">Thailand '.$r_cate['brief'].' '.$name_more.'</div>';
						$phuket_link = $url_link . 'search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/full-staff-service-villas/all-sort.html';
						$koh_samui_link = $url_link . 'search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/full-staff-service-villas/all-sort.html';
						
						$PK_Full_cate_name = 'Phuket '.$cate_name;
						$KSM_Full_cate_name = 'Koh Samui '.$cate_name;
					}
					elseif($r_cate['id']==18)//--Mid-Range
					{
						$ht_links = "/search-rent/thailand/all-beach/all-price/all-bedrooms/mid-price-range-villas/all-sort.html";
						$cate_name = $r_cate['brief'];
						$small_font = '';
						
						//echo '<div class="ca_box_name">Thailand '.$r_cate['brief'].' '.$name_more.'</div>';
						$ca_box_name = '<div class="ca_box_name">Thailand '.$r_cate['brief'].' '.$name_more.'</div>';
						$phuket_link = $url_link . 'search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/mid-price-range-villas/all-sort.html';
						$koh_samui_link = $url_link . 'search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/mid-price-range-villas/all-sort.html';
						
						$PK_Full_cate_name = 'Phuket '.$cate_name;
						$KSM_Full_cate_name = 'Koh Samui '.$cate_name;
					}
					else
					{
						$ht_links = "/".$r_cate['ht_link'].".html";
						
						$vn = explode("-",$r_cate['name']);
						$ca_name = explode("Villas",$vn[0]);
						$cate_name = $ca_name[0];
						
						$small_font = '';
						
						//echo '<div class="ca_box_name">'.switchcase_sort($r_cate['id']).' '.$name_more.'</div>';
						$ca_box_name = '<div class="ca_box_name">'.switchcase_sort($r_cate['id']).' '.$name_more.'</div>';
						$phuket_link = $url_link . 'search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/'.$r_cate['slug'].'/all-sort.html';
						$koh_samui_link = $url_link . 'search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/'.$r_cate['slug'].'/all-sort.html';
						
						$PK_Full_cate_name = 'Phuket '.$cate_name;
						$KSM_Full_cate_name = 'Koh Samui '.$cate_name;
					}
					
					
						echo '<a href="'.$ht_links.'"><div class="col-md-12 col-sm-12 col-xs-12 boxpho nopad">';
							if($zz<3)
							{
								echo '<img src="'.imagePath($pho).'" width="100%" alt="'.switchcase_alt($r_cate['id']).'">';
								//echo '<img src="'.$pho.'" width="100%" alt="'.switchcase_alt($r_cate['id']).'">';
							}
							else
							{
								echo '<img class="lazy" src="'.imagePath($pho).'" width="100%" alt="'.switchcase_alt($r_cate['id']).'">';
								//echo '<img class="lazy" data-src="'.$pho.'" width="100%" alt="'.switchcase_alt($r_cate['id']).'">';
							}
							
							
							//$rcate = $r_cate['id'];
							$rcate =($r_cate['id']==5)?"f13":"";
						
							echo $ca_box_name;
						echo '</div></a>';
						
						
						echo '<div class="col-md-12 col-sm-12 col-xs-12  nopad bottom20">'; 
                        
							echo '<div class="col-xs-6 col-sm-6 col-md-6  bpl top10" onclick="window.location.href=\'' . $phuket_link . '\'" style="cursor: pointer;" id="locationBox">';
								echo '<div class="col-md-12 col-sm-12 col-xs-12 boxbot nopad f14">';
                                    echo '<div style="text-align: center;"><a class="locationText" id="locationText" href="' . $phuket_link . '">'.$PK_Full_cate_name.'</a></div>';								
								echo '</div>';     
							echo '</div>';  
                            
                            echo '<div class="col-xs-6 col-sm-6 col-md-6  bpr top10" onclick="window.location.href=\'' . $koh_samui_link . '\'" style="cursor: pointer;" id="locationBox">';
                                echo '<div class="col-md-12 col-sm-12 col-xs-12 boxbot nopad f14 '.$rcate.' '.$small_font.'">';
                                    echo '<div style="text-align: center;"><a class="locationText" id="locationText" href="' . $koh_samui_link . '">'.$KSM_Full_cate_name.'</a></div>';
                                echo '</div>';
                            echo '</div>';                           
                            
						echo '</div>';
					echo '</div>';
                    
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
							return "Thailand Seaview Villas";
						break;
						case "5":
							return "Thailand large groups villas";
						break;
						case "6":
							return "Beach Villa Photo";//return "Beachfront Villas - Phuket, Koh Samui, Thailand";
						break;
						case "8":
							return "Thailand Wedding Villas";
						break;
						case "17":
							return "Thailand Full-Service Villas";
						break;
						case "18":
							return "Thailand Mid-Range";
						break;
						default:
					}
				}
				?>
                <div class="loadd lovmore">
                    <img src="<?php echo $url_link;?>upload/loading.gif" width="50"><br>Loading..
                </div>
                <div class="vmore" style="    margin-top: 330px;"></div>
                
            </div>
<?php
function switchcase_sort($val)
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
            return "Thailand Seaview Villas";//"Seaview Villas";
        break;
        case "5":
            return "Large Group Villas";
        break;
        case "6":
            return "Beachfront Villas Thailand";//"Beachfront Villas";
        break;
        case "8":
            return "Thailand Wedding Villas";//"Wedding Villas";
        break;
        default:
    }
}
?>
                    
                    
                    
                    
                    
                    
                    
                    <div class="inside_category"></div>
        </div>
    </div>
</div>
<br>


<div class="container">
	<div class="row">
    	<div class="col-md-8 col-md-offset-2">
        	<center>
                <h2 class="f16" style="font-family: pr !important;">Find your ideal beach private villas in Thailand today</h2>
                <p class="f16 top20" style="font-family: pt !important;">
                    Finding the right luxury villa for rent in Thailand is key to creating the kind of experience that will be truly unforgettable. Browse our collection of luxury villas online today to find the perfect property for your dream Thailand holiday. 
                </p>
                
                <h2 class="f16" style="font-family: pr !important;">The ultimate Thailand beach with a private luxury pool villa</h2>
                <p class="f16 top20" style="font-family: pt !important;">
                    If a luxury pool villa in Thailand is on your list, then there is no better choice than a trip to the lush shores of Koh Samui. Select your villa location from one of the 15 stunning beach destinations dotted around the island and fast-track your way to relaxing in your private infinity pool while looking out at the azure waters beyond.   
                </p>
                
                <h2 class="f16" style="font-family: pr !important;">Find the perfect beach villa in Phuket, Thailand</h2>
                <p class="f16 top20" style="font-family: pt !important;">
                    The ideal beach villa for rent awaits you in the ever-popular tourism destination of Phuket. Our Phuket collection features a range of luxury villas that can accommodate groups of all shapes and sizes. From a romantic getaway for two to a trip with friends that will be beyond compare, you will find all you need in our stunning collection of luxury villas in Phuket. 
                </p>
                
                <h2 class="f16" style="font-family: pr !important;">Koh Phangan luxury vacation rentals in Thailand </h2>
                <p class="f16 top20" style="font-family: pt !important;">
                    If the blissful calm shores of an island paradise are calling, then Inspiring Villas can answer that call. Choose from one of our stunning villa options for the perfect escape from the rest of the world. Whether you're perched atop a cliff overlooking the sparkling bay below or want to open your patio doors right onto the beach, there's a private villas for rent in Koh Phangan perfectly suited to you. 
                </p>
           </center>
                    
        	
            
        	<?php /*?><div class="col-xs-12 col-sm-4 col-md-4 text-center nopad t_t11 ql_text"><strong>Quick Link >>></strong></div>
            <div class="col-xs-6 col-sm-4 col-md-4 text-center nopad t_t22"><a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html"><button class="ql_home" alt="Phuket">Phuket</button></a></div>
            <div class="col-xs-6 col-sm-4 col-md-4 text-center nopad t_t33"><a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html"><button class="ql_home" alt="Koh Samui">Koh Samui</button></a></div><?php */?>
            <?php /*?><div class="col-xs-4 col-sm-3 col-md-3 text-center nopad t_t44"><a href="/search-rent/sri-lanka-sr/all-beach/all-price/all-bedrooms/all-collections/all-sort.html"><button class="ql_home" alt="Sri Lanka">Sri Lanka</button></a></div><?php */?>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center t_t1- ql_text" style="margin-bottom:30px;">
            	<div class="bar_inside">
                <button class="but_ql but_main tb"><strong>Quick Links >>></strong></button>
                <a href="https://www.inspiringvillas.com/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="but_ql ql_sub">Phuket Villas</a>
                <a href="https://www.inspiringvillas.com/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="but_ql ql_sub">Koh Samui Villas</a>
                <a href="https://www.inspiringvillas.com/search-rent/thailand-koh-phangan/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="but_ql ql_sub">Koh Pha Ngan Villas</a>
                <a href="https://www.inspiringvillas.com/search-rent/thailand-krabi/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="but_ql ql_sub">Krabi Villas</a>
                <a href="https://www.inspiringvillas.com/search-rent/thailand-phang-nga/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="but_ql ql_sub">Phang Nga Villas</a>
                </div>
            </div>
    </div>
</div>



<div class="loadd lowho_we_are">
    <img src="<?php echo $url_link;?>upload/loading.gif" width="50"><br>Loading..
</div>
<div class="who_we_are"></div>

<div class="mg-about parallax">
    <div class="container">
        <div class="row">
        	<div class="col-md-12">
                    <center><h2 style="color:#fff;">WHO WE ARE</h2>
                    <p class="f16" style="font-family:pt !important;">
                    Welcome to Inspiring Villas: Your Gateway to Luxury Villa Rental Experiences<br>
At Inspiring Villas, we redefine luxury with our exquisite collection of private villas and luxury pool villas in Thailand. We offers a unique and sensational luxury villa holiday experience in the finest hand-picked luxury villas in <a href="/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Thailand</a>, the holiday of a lifetime, receiving full 24/7 care from our professional team inside and outside the villa.<br>
Discover unparalleled luxury experience with our selection of private villas. Each villa offers a luxury comfort holiday experience, which you could ever imagine for. Escape to your very own luxury pool villa in Thailand, where every moment is a celebration of exclusivity and elegance. Embrace the allure of a private luxury villa sanctuary, complete with lavish amenities and breathtaking seaview.


                    <?php /*?>Inspiring Villas offers a unique and sensational villa holiday experience in the finest hand-picked luxury villas in <a href="/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Thailand</a>, the holiday of a lifetime, receiving full 24/7 care from our professional team inside and outside the villa.<?php */?>
                    </p>
                    <br>
                    <?php /*?><a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Luxury Villas Phuket</a><br>
                    <a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Koh Samui luxury villas</a><?php */?>
                    </center>
                    
                    <?php /*?><div class="col-md-6">
                        <div class="col-md-12 nopad  text-center  f18 mbt30m">
                            <a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Koh Samui</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12 nopad  text-center f18 mbt30m">
                            <a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Phuket</a>
                        </div>
                    </div><?php */?>
                    
                    
                    <?php /*?><div class="col-md-4">
                        <div class="col-md-12 nopad  text-center f18 mbt30m">
                            <a href="/search-rent/sri-lanka-sr/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Sri Lanka</a>
                        </div>
                    </div><?php */?>
                    <?php /*?><div class="col-md-3">
                        <div class="col-md-12 nopad  text-center f18 ">
                            <a href="/search-rent/indonesia-bali/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Bali</a>
                        </div>
                    </div><?php */?>
                    
                    <div class="col-md-12 mob top30">
                    	<img src="https://www.inspiringvillas.com/upload/pata.webp" width="120" height="95" class="center-block" alt="PATA Logo">
                        <?php /*?><img src="/upload/travller.png" width="165" class="center-block" alt="traveller Logo"><?php */?>
                    </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid web af" style="background:#eee;">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="mg-feature"  style="border-right: 1px solid #ddd;">
                    <div class="mg-feature-icon-title">
                        <i class="fa fa-heart"></i>
                        <h3>LUXURY VILLA RENTALS</h3>
                    </div>
                    <p class="f16"  style="font-family:pt !important;">Our selection of Thailand villas for rent offer a unique villa holiday experience. We offer the best villas in the most incredible locations. Guests enjoy exclusivity and privacy, complete with full service from dedicated villa staff, a private chef and incredible facilities.
                    <?php /*?>Our selection of luxury & private villas for rent offer a unique villa holiday experience. We offer the best private pool villas in the most incredible locations- Wedding Villas, Sea View Villas, Garden Villas, Beachfront Villas and more. Guests enjoy exclusivity and privacy, complete with full service from dedicated villa staffs.<?php */?></p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="mg-feature"  style="border-right: 1px solid #ddd;">
                    <div class="mg-feature-icon-title">
                        <i class="fa fa-lightbulb-o"></i>
                        <h3>BE INSPIRED</h3>
                    </div>
                    <p class="f16"  style="font-family:pt !important;"> There is truly something for everyone. Our staff can find the perfect holiday villa match for you, helping you to discover the location and villa that best suits your needs. We will show you which beach (in Phuket, Koh Samui, Koh Phagnan) and villa are perfect for your next vacation.
                    <?php /*?>There is truly something for everyone. Our staff can find the perfect holiday villa match for you, helping you to discover the location and villa that best suits your needs. We will show you which beach (in Phuket or Koh Samui) and villa are perfect for your next vacation.<?php */?>
                    </p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="mg-feature">
                    <div class="mg-feature-icon-title">
                        <i class="fa fa-thumbs-up"></i>
                        <h3>WHY CHOOSE US</h3>
                    </div>
                    <p class="f16"  style="font-family:pt !important;">Inspiring Villas selects only the finest luxury villas in Thailand to be featured in our collection. Our experienced team carefully inspects every villa before check in, and provides full concierge services throughout the stay to ensure that your experience is the very best one.
                    <?php /*?>Inspiring Villas selects only the finest luxury villas to be featured in our collections. Our experienced team carefully inspects every villa before check in, and provides full concierge services throughout the stay to ensure that all guests have the very best experience.<?php */?><?php /*?>Inspiring Villas selects only the finest Thailand luxury villas to be featured in our collections. Our experienced team carefully inspects every villa before check in, and provides full concierge services throughout the stay to ensure that all guests have the very best experience.<?php */?></p>
                </div>
            </div>
        </div>
    </div><br>
</div>

<div class="container-fluid mob af" style="background:#eee;">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="mg-feature">
                    <div class="mg-feature-icon-title">
                        <i class="fa fa-thumbs-up"></i>
                        <h3>WHY CHOOSE US</h3>
                    </div>
                    <p class="f16"  style="font-family:pt !important;">Inspiring Villas selects only the finest luxury villas in Thailand to be featured in our collection. Our experienced team carefully inspects every villa before check in, and provides full concierge services throughout the stay to ensure that your experience is the very best one.
                    <?php /*?>Inspiring Villas selects only the finest luxury villas to be featured in our collections. Our experienced team carefully inspects every villa before check in, and provides full concierge services throughout the stay to ensure that all guests have the very best experience.<?php */?><?php /*?>Inspiring Villas selects only the finest Thailand luxury villas to be featured in our collections. Our experienced team carefully inspects every villa before check in, and provides full concierge services throughout the stay to ensure that all guests have the very best experience.<?php */?></p><br><br>
                </div>
            </div>
       </div>
   </div>
</div>

<script>
function load_cont()
{
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
}

var tt1=true;
$(window).scroll(function () {
	if ($(this).scrollTop() > $(".catego").offset().top-800) 
	{
		if(tt1==true)
		{
			//$(".blk").hide();
			//$(".subtop").hide();
			//$(".lowho_we_are").fadeIn(100);
			
			/*$.ajax({
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
			});*/
			
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
<style>
@media screen and (min-width: 992px) {
    .mg-book-now .mg-bn-title {
        font-family: "Playfair Display", serif;
        color: #d3a267 !important;
        font-size: 25px;
        line-height: 20px;
        text-transform: uppercase;
        margin: 0;
        padding: 5px 5px 0px 10px;
        box-shadow: 0px 0 #d3a261;
        margin-top: 18px;
        border-right: 2px solid #d3a261;
    }
}
</style>




</body>
</html>