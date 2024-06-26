<?php 
$sql_qry = "SELECT *
FROM
	properties
WHERE
	destination = '".$room['destination']."'  AND
	subdestination = '".$room['subdestination']."' AND
	status > 0 AND
	id != '".$room['id']."'
	ORDER BY RAND()
LIMIT 3";

?>
<div class="web mg-room-fecilities v_rec" >
	<div class="eqy_ep_tt">explore villas</div>
    <div class="eqy_ep_sub">in the same categories</div>
    <div class="row">
	<?php
    $Recomend = $dbc->Query($sql_qry);
    while($recdat = $dbc->Fetch($Recomend))
    {
		switch($recdat['cate_icon'])
		{
			case"4":
				$icon_cate = "beach";
				$icon_name = "Seaview Villa";
			break;
			case"5":
				$icon_cate = "largegroup";
				$icon_name = "Large Group Villa";
			break;
			case"6":
				$icon_cate = "seas";
				$icon_name = "Beachfront Villa";
			break;
			case"8":
				$icon_cate = "wedding";
				$icon_name = "Wedding Villa";
			break;
			case"9":
				$icon_cate = "house";
				$icon_name = "Garden Villa";
			break;
			case"10":
				$icon_cate = "house";
				$icon_name = "Tropical Villa";
			break;
			default:
				$icon_cate = "";
				$icon_name = "";
		}
		
		if(strstr($recdat['dname'],'Beach'))
		{
			$split = explode(",",$recdat['dname']);// แบ่งข้อความโดชใช้ ,
			$locations = str_ireplace('Beach','',$split[0]);// แทนที่ข้อความ
			
			$nost = strrpos($locations," ")."<br>";// หาตำแหน่งสุดท้าย
			//echo $recdat['dname']."<br>";// แสดงข้อความเต็ม
			//echo substr_replace($locations,",",$nost);// แสดงข้อความที่ถูกตัดออก
			$full_location = substr_replace($locations,",",$nost).$split[1];
		}
		elseif(strstr($recdat['dname'],'Bay'))
		{
			$split = explode(",",$recdat['dname']);// แบ่งข้อความโดชใช้ ,
			$locations = str_ireplace('Bay','',$split[0]);// แทนที่ข้อความ
			
			$nost = strrpos($locations," ")."<br>";// หาตำแหน่งสุดท้าย
			//echo $recdat['dname']."<br>";// แสดงข้อความเต็ม
			//echo substr_replace($locations,",",$nost);// แสดงข้อความที่ถูกตัดออก
			$full_location = substr_replace($locations,",",$nost).$split[1];
		}
		elseif(strstr($recdat['dname'],'Bophut'))
		{
			//echo $recdat['dname']."<br>";// แสดงข้อความเต็ม
			$full_location = $recdat['dname'];
		}
		else
		{
			//echo $recdat['dname']."<br>";// แสดงข้อความเต็ม
			$full_location = $recdat['dname'];
		}
		
		$full_location_1 = explode("Villa - ",$recdat['name']);
		$full_location =ltrim($full_location_1[1]);
		
		$v_name = explode("|",$recdat['name']);
		$v_photo = json_decode($recdat['photo'],true);
		echo '<div class="col-12">';
        	echo '<a href="/'.$recdat['ht_link'].'.html">';
					echo '<img src="'.imagePath($v_photo[0]['img']).'" width="100%">';
					echo '<div class="tb">';
						echo '<div class="epl_villa_title">'.$v_name[0].'</div>';
						echo '<div class="epl_villa_price">from $'.number_format($recdat['pmin']).' / night</div>';
						echo '<div class="epl_villa_detail">'.base64_decode($recdat['brief'],true).'</div>';
					echo '</div>';
				echo '</a>';
				
				echo '<div class="row pad10">';
					echo '<div class="col-7 t_t1-">';
						echo '<div class="row align-items-center ">';
							echo '<div class="col-2 nopad text-center"><img data-src="'.$url_link.'upload/new_design/search/location.png" width="35" class="micon- lazy"  alt=""></div>';
							echo '<div class="col"><div class="villa_iname">'.$full_location.'</div></div>';
						echo '</div>';
						//echo $recdat['name'];
						
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
							echo '<div class="col"><div class="villa_iname">'.$recdat['bedroom_range'].'</div></div>';
						echo '</div>';
						echo '<div class="row align-items-center top5">';
							echo '<div class="col-2 nopad text-center"><img data-src="'.$url_link.'upload/new_design/search/guest.png" width="35" alt="" class="micon- lazy"></div>';
							echo '<div class="col"><div class="villa_iname">'.$recdat['adults'].' Guests</div></div>';
						echo '</div>';
					echo '</div>';
					echo '<div class="col rela">';
						echo '<div class="box__btn">';
							echo '<a href="/'.$recdat['ht_link'].'.html" target="_blank"><button class="btn__detail btn__eplor" target="_blank">View Details</button></a>';
							echo '<a href="/'.$recdat['ht_link'].'.html" target="_blank"><button class="btn__enquiry btn__eplor" target="_blank">Enquire Now</button></a>';
						echo '</div>';
					echo '</div>';
					echo '<div class="box__des"></div>';
				echo '</div>'; //------ row
				
        echo '</div>';
        //echo $recdat['name'].'---'.$recdat['price']."<br>";
    }
?>
	</div>
</div>

