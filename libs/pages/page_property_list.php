<?php
$url_link = "http://127.0.0.1:9119/";
if($photo[0]['name']=='')
{
	$img_tag = $name[0];
}
else
{
	$img_tag = $name[0].'- '.$photo[0]['name'];
}



$p_discount='';
$p_min='';
$p_max='';
$exchange='';

$price_data = $dbc->GetRecord("pricing","*","property=".$row['id']);
if($price_data['exchange']=='usd' || $price_data['exchange']=='')
{
	$p_min = $row['pmin'];
	$p_max = $row['pmax'];
	$p_discount = $row['discount'];
}
else
{
	$exchange = $dbc->GetRecord("variable","*","name='thb'");
	$p_min = $row['pmin_th']/$exchange['value'];
	$p_max = $row['pmax_th']/$exchange['value'];
	$p_discount = $row['discount'];//*$exchange['value'];
}
//echo $row['pro_exp'].'>='.$D_today;					
if($row['discount']!='')
{
	if($row['pro_exp']!='0000-00-00' && $row['pro_exp']>=$D_today)
	{
			/*$discount = '<div class="inside rela">
			From <del class="linedis"><span class="tx_discount_old">$'.number_format($p_min).'</span></del>
			<span class="inprice tx_discount">$'.number_format($p_discount).'</span>/Night
			</div>';*/
			$discount = '<div class="inside rela">
			From <span class="tx_discount_new">$'.number_format($p_min).'<span class="linedis"></span></span>
			<span class="inprice tx_discount">$'.number_format($p_discount).'</span> / Night
			</div>';
	}
	else
	{
		$discount = '<div class="inside">From <span class="inprice">$'.number_format($p_min).'</span> / Night</div>';
	}
}
else
{
	$discount = '<div class="inside">From <span class="inprice">$'.number_format($p_min).'</span> / Night</div>';
}
array_push($ar_photo,"https://www.inspiringvillas.com".imagePath($photo[0]['img']));

$imgs = array();
$i_i=0;
foreach($photo as $i_photo)
{
	if($i_i<5)
	{
		array_push($imgs,"https://www.inspiringvillas.com".$i_photo['img']);
		$i_i++;
	}
}
$ar_url[] = array(
  "@type" => "ListItem",
  "name" => $name[0],
  "image" => $imgs,//imageP($photo[0]['img']),//"https://www.inspiringvillas.com".
  "position" => $zz,
  "url" => "https://www.inspiringvillas.com/".$row['ht_link'].".html",
  /*"author"=> array(
	"@type" => "Person",
	"name" => "Inspiring Villas"
  ),*/
);
// $imgs ='';


$ar_url_2[] = array(
  "@context" => "http://schema.org/",
  "@type" => "Recipe",
  "name" => $name[0],
  "image" => imagePath($photo[0]['img']),//"https://www.inspiringvillas.com".
  "position" => $zz,
  "url" => "https://www.inspiringvillas.com/".$row['ht_link'].".html",
  "author"=> array(
	"@type" => "Person",
	"name" => "Inspiring Villas"
  ),
);

//array_push($ar_url,"https://www.inspiringvillas.com/".$row['ht_link'].'.html');

echo '<img  src="'.imagePath($photo[0]['img']).'" alt="" class="img-responsive " width="100%" style="display:none;">';//itemprop="image"

$p_tag = '';
$exp_date = $row['tag_exp'];
$D_today = date("Y-m-d");
//echo $D_today.'--'.$exp_date;
if($exp_date>=$D_today || $exp_date=='0000-00-00' || $exp_date=='')
{
	//echo 'Yes';
	if($row['tag']!=0)
	{
		if(in_array($row['tag'],$arr_tag_id))
		{
			$p_tag = '<div class="tags_bar"><i class="fa fa-tag" aria-hidden="true"></i> '.$tag_name.'</div>';
		}
	}
}
//echo '---->'.$url_link.'<---';
echo '<div class="row bottom40 pad10">';
	echo '<div class="col-12 col-lg-4 col-xl-4 nopad new_img web992" style="background-image:url('.imagePath($photo[0]['img']).'); ">';
		//echo '<img src="'.$url_link.'upload/new_design/search/Artboard 134.png" width="100%" alt="" class="mob992">';
		echo $p_tag;

    echo '</div>';
	
	echo '<div class="col-12 col-lg-4 col-xl-4 nopad- mob992">';
		echo $p_tag;
		echo '<img src="'.imagePath($photo[0]['img']).'" width="100%" alt="" class="mob992">';
		
    echo '</div>';
	
	//------ web --------------------------------------------------------------------------------
    echo '<div class="col nopad box_villa_main rela web992">';
    	echo '<div class="triangle_1"></div>';
    	echo '<div class="row- box_vname">';
            echo '<a href="/'.$row['ht_link'].'.html" target="_blank"><div class="villa_name tblue">'.$name[0].'</div></a>';
            echo '<div class="villa_price tblue">'.$discount.' </div>';
        echo '</div>';
        echo '<div class="box_villa_detail">';
        	echo base64_decode($row['short_det']);
        echo '</div>';
    	echo '<div class="row villa_icon">';
        	echo '<div class="col">';
            	echo '<div class="row align-items-center ">';
                	echo '<div class="col-2 nopad text-center"><img data-src="'.$url_link.'upload/new_design/search/location.png" class="micon- lazy" width="35"  alt=""></div>';
                    echo '<div class="col"><div class="villa_iname">'.$full_location.'</div></div>';
                echo '</div>';
				
				if($icon_cate == "seas")
				{
					//echo '<image  data-src="' . S3_BUCKET_URL . '/upload/'.$icon_cate.'.svg"  class="micon lazy" style="width: 28px !important;height: 32px;margin-left: -5px;" />';
					$imgg = '<image  data-src="'.$url_link.'upload/'.$icon_cate.'.svg"  class="micon- lazy" width="30"  />';
					$luxu = "Luxury ";
				}
				else
				{
					//echo '<image  data-src="' . S3_BUCKET_URL . '/upload/'.$icon_cate.'.svg"  class="micon lazy" />';
					$imgg = '<image  data-src="'.$url_link.'upload/'.$icon_cate.'.svg"  class="micon- lazy" width="30" />';
					$luxu = "";
				}
				
				//echo '<div class="ic_name f15t" >&nbsp;&nbsp;'.$luxu.''.$icon_name.'</div>';//str_ireplace('Villas','Villa',$catename[0]).'
                echo '<div class="row align-items-center top5">';
                	echo '<div class="col-2 nopad text-center">'.$imgg.'</div>';
                    echo '<div class="col"><div class="villa_iname">'.$luxu.''.$icon_name.'</div></div>';
                echo '</div>';
				
            echo '</div>';
            echo '<div class="col">';
            	echo '<div class="row align-items-center">';
                	echo '<div class="col-2 nopad text-center"><img src="'.$url_link.'upload/new_design/search/bed.png" class="lazy" width="35" alt=""></div>';//
                    echo '<div class="col"><div class="villa_iname">'.$row['bedroom_range'].'</div></div>';
                echo '</div>';
                echo '<div class="row align-items-center top5">';
                	echo '<div class="col-2 nopad text-center"><img data-src="'.$url_link.'upload/new_design/search/guest.png" width="35" alt="" class="micon- lazy"></div>';
                    echo '<div class="col"><div class="villa_iname">'.$row['adults'].' Guests</div></div>';
                echo '</div>';
            echo '</div>';
            echo '<div class="col">';
            	echo '<a href="/'.$row['ht_link'].'.html" target="_blank"><button class="btn_villa btn_detail" target="_blank">View Details</button></a>';
                echo '<a href="/'.$row['ht_link'].'.html" target="_blank"><button class="btn_villa btn_enquire" target="_blank">Enquire Now</button></a>';
            echo '</div>';
        echo '</div>';
    echo '</div>'; //--------- col
	//------ web --------------------------------------------------------------------------------
	
	//------ mob --------------------------------------------------------------------------------
    echo '<div class="col nopad-  mob992">';
		
    	echo '<div class="row- box_vname">';
            echo '<a href="/'.$row['ht_link'].'.html" target="_blank"><div class="villa_name tblue">'.$name[0].'</div></a>';
            echo '<div class="villa_price tblue">'.$discount.' </div>';
        echo '</div>';
		
		echo '<div class="box_villa_main rela">';
			echo '<div class="triangle_1"></div>';
			echo '<div class="box_villa_detail">';
				echo base64_decode($row['short_det']);
			echo '</div>';
			echo '<div class="row villa_icon">';
				echo '<div class="col-7 t_t1-">';
					echo '<div class="row align-items-center ">';
						echo '<div class="col-2 nopad text-center"><img data-src="'.$url_link.'upload/new_design/search/location.png" width="35" class="micon- lazy"  alt=""></div>';
						echo '<div class="col"><div class="villa_iname">'.$full_location.'</div></div>';
					echo '</div>';
					
					if($icon_cate == "seas")
					{
						//echo '<image  data-src="' . S3_BUCKET_URL . '/upload/'.$icon_cate.'.svg"  class="micon lazy" style="width: 28px !important;height: 32px;margin-left: -5px;" />';
						$imgg = '<image  data-src="'.$url_link.'upload/'.$icon_cate.'.svg"  class="micon- lazy" width="30"  />';
						$luxu = "Luxury ";
					}
					else
					{
						//echo '<image  data-src="' . S3_BUCKET_URL . '/upload/'.$icon_cate.'.svg"  class="micon lazy" />';
						$imgg = '<image  data-src="'.$url_link.'upload/'.$icon_cate.'.svg"  class="micon- lazy" width="30" />';
						$luxu = "";
					}
					
					//echo '<div class="ic_name f15t" >&nbsp;&nbsp;'.$luxu.''.$icon_name.'</div>';//str_ireplace('Villas','Villa',$catename[0]).'
					echo '<div class="row align-items-center top10">';
						echo '<div class="col-2 nopad text-center">'.$imgg.'</div>';
						echo '<div class="col"><div class="villa_iname">'.$luxu.''.$icon_name.'</div></div>';
					echo '</div>';
					
				/*echo '</div>';
				echo '<div class="col-7 t_t2">';*/
					echo '<div class="row align-items-center top10">';
						echo '<div class="col-2 nopad text-center"><img data-src="'.$url_link.'upload/new_design/search/bed.png" class="micon- lazy" width="35" alt=""></div>';//
						echo '<div class="col"><div class="villa_iname">'.$row['bedroom_range'].'</div></div>';
					echo '</div>';
					echo '<div class="row align-items-center top5">';
						echo '<div class="col-2 nopad text-center"><img data-src="'.$url_link.'upload/new_design/search/guest.png" width="35" alt="" class="micon- lazy"></div>';
						echo '<div class="col"><div class="villa_iname">'.$row['adults'].' Guests</div></div>';
					echo '</div>';
				echo '</div>';
				echo '<div class="col">';
					echo '<a href="/'.$row['ht_link'].'.html" target="_blank"><button class="btn_villa btn_detail top10" target="_blank">View Details</button></a>';
					echo '<a href="/'.$row['ht_link'].'.html" target="_blank"><button class="btn_villa btn_enquire top10" target="_blank">Enquire Now</button></a>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
		
    echo '</div>'; //--------- col
	
	//------ mob --------------------------------------------------------------------------------
echo '</div>';




//------------------------- NEW ----------------------------------------------------------

			
?>