 <?php 
 session_start();
	include_once "../../config/define.php";
    include_once "../class/db.php";
    include_once "../class/minerva.php"; 
    include_once "../../inc/functions.inc.php"; 
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	$os = new minerva($dbc);
	
	?>
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
				$sql_cate = $dbc->Query("select * from categories where status > 0 and id IN (6,4,8,5) order by sort asc limit 0,4"); //
				$zz=0;
				while($r_cate = $dbc->Fetch($sql_cate))
				{
					$nam = explode("-",$r_cate['name']);
					$pho = json_decode($r_cate['photo'],true);
					if($zz<=1){$cal="top10";}else{$cal="top30";}
					$zz++;
					echo '<div class="col-sm-6 col-md-6 '.$cal.'">';
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
							if($zz<3)
							{
								echo '<img src="'.imagePath($pho).'" width="100%" alt="'.switchcase_alt($r_cate['id']).'">';
								//echo '<img src="'.$pho.'" width="100%" alt="'.switchcase_alt($r_cate['id']).'">';
							}
							else
							{
								echo '<img class="lazy" data-src="'.imagePath($pho).'" width="100%" alt="'.switchcase_alt($r_cate['id']).'">';
								//echo '<img class="lazy" data-src="'.$pho.'" width="100%" alt="'.switchcase_alt($r_cate['id']).'">';
							}
							
							if($r_cate['id']==5)
							{
								$name_more = '(>14)';
							}
							else
							{
								$name_more = '';
							}
							//$rcate = $r_cate['id'];
							$rcate =($r_cate['id']==5)?"f13":"";
							if($r_cate['id']==4)
							{
								//echo '<div class="ca_box_name">Thailand Villas</div>';
								echo '<div class="ca_box_name">'.switchcase_sort($r_cate['id']).' '.$name_more.'</div>';
								$phuket_link = $url_link . 'search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/'.collection_home($r_cate['id']).'/all-sort.html';
                        		$koh_samui_link = $url_link . 'search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/seaview-villas.html?sort=all-sort';
							}
							else
							{
								echo '<div class="ca_box_name">'.switchcase_sort($r_cate['id']).' '.$name_more.'</div>';
								$phuket_link = $url_link . 'search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/'.collection_home($r_cate['id']).'/all-sort.html';
                        		$koh_samui_link = $url_link . 'search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/'.collection_home($r_cate['id']).'/all-sort.html';
							}
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
                        
						echo '<div class="col-md-12 col-sm-12 col-xs-12  nopad bottom20">'; 
                        
							echo '<div class="col-xs-6 col-sm-6 col-md-6  bpl top10" onclick="window.location.href=\'' . $phuket_link . '\'" style="cursor: pointer;" id="locationBox">';
								echo '<div class="col-md-12 col-sm-12 col-xs-12 boxbot nopad f14">';
                                    echo '<div style="text-align: center;"><a class="locationText" id="locationText" href="' . $phuket_link . '">Phuket '.$ca_name[0].'</a></div>';								
								echo '</div>';     
							echo '</div>';  
                            
                            echo '<div class="col-xs-6 col-sm-6 col-md-6  bpr top10" onclick="window.location.href=\'' . $koh_samui_link . '\'" style="cursor: pointer;" id="locationBox">';
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
            return "Beach Villas Thailand";//"Beachfront Villas";
        break;
        case "8":
            return "Thailand Wedding Villas";//"Wedding Villas";
        break;
        default:
    }
}
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