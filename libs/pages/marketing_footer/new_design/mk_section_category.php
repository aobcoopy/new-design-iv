<?php 
$display = $mk_section_category;
if($page_link=='all')
{
	
}
elseif($page_link=='phuket')
{
	?>
	<div class="container-fluid top100 bottom80 <?php echo $display;?>">
        <div class="row justify-content-center category_box-">
            <div class="col-11 col-lg-12 col-xl-10 row">
            <?php 
                    $sql_cate = $dbc->Query("select * from categories where status > 0 and id IN (6,4,8,5) order by sort asc limit 0,4"); //
                    $zz=0;
                    while($r_cate = $dbc->Fetch($sql_cate))
                    {
                        //echo $zz;
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
                        
                        echo '<div class="col-12 col-sm-6 col-lg-3 '.$cal.' animate__animated hid- ca-'.$zz.' '. $delay.'">';
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
                                    $phuket_link = $url_link . 'search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/'.$r_cate['slug'].'/all-sort.html';
                                    $koh_samui_link = $url_link . 'search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/seaview-villas.html?sort=all-sort';
                                }
                                else
                                {
                                    echo '<div class="ca_box_name_new_2">'.switchcase_sort($r_cate['id']).' '.$name_more.'</div>';
                                    $phuket_link = $url_link . 'search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/'.($r_cate['slug']).'/all-sort.html';
                                    $koh_samui_link = $url_link . 'search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/'.($r_cate['slug']).'/all-sort.html';
                                }
                                
                                if($zz<-3)
                                {
                                    echo '<div class="col-12"><img data-src="'.imagePath($pho).'" width="100%" alt="'.switchcase_alt($r_cate['id']).'"></div>';
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
                    
                    ?>
                <div class="col-6 col-lg-3"></div>
            </div>
        </div>
    </div>

	<?php
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
function switchcase($val)
{
    switch($val)
    {
        case "2":
            return "Party Villa - Phuket, Koh Samui, Thailand";
        break;
        case "3":
            return "Family Villas - Phuket, Koh Samui, Thailand";
        break;
        case "4":
            return "Seaview Villas - Phuket, Koh Samui, Thailand";
        break;
        case "5":
            return "Large Group Villas - Phuket, Koh Samui, Thailand";
        break;
        case "6":
            return "Beachfront Villas - Phuket, Koh Samui, Thailand";//return "Beachfront Villas - Phuket, Koh Samui, Thailand";
        break;
        case "8":
            return "Wedding Villas - Phuket, Koh Samui, Thailand";
        break;
        default:
    }
}

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