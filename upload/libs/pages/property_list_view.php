<?php
if($photo[0]['name']=='')
{
	$img_tag = $name[0];
}
else
{
	$img_tag = $name[0].'- '.$photo[0]['name'];
}

//echo '<!--room-->';
	echo '<div class="mg-avl-room '.$padd_1.'1 '.$paddbutt.'1 " ><span  >';//itemscope itemtype="http://schema.org/Product"
	//echo '<span itemprop="brand" itemscope itemtype="http://schema.org/Brand"><span itemprop="name" class="tw tbrand" >Inspiring Villas</span></span>';
		echo '<div class="row">';//echo $row['id'];
		
		echo '<div class="col-xs-12 col-sm-12 col-md-12 t_t33 villa_boxs">';
		echo '<div class=" row nopad-1 villa_boxs_inside">';
			//--------------------------web-----------------------------
			echo '<div class="col-xs-12 col-sm-5 col-md-4 nopad t_t22 v_img" style="background-image:url('.imagePath($photo[0]['img']).');">';  //-------------cheange
			
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
						echo '<div class="tags_bar"><i class="fa fa-tag" aria-hidden="true"></i> '.$tag_name.'</div>';
					}
				}
			}
			else
			{
				//echo 'Noooo';
			}
			
				echo '';
				//echo slide_photo($photo,$row['id']);
				if($zz==1)
				{
					//echo '<a href="/'.$row['ht_link'].'.html" target="_blank"><img  src="'.imagePath($photo[0]['img']).'" alt="'.$img_tag.'" class="img-responsive middle_screen" width="100%"></a>';//itemprop="image"
					//echo '<img  src="'.imageP($photo[0]['img']).'" alt="'.$img_tag.'" class="img-responsive middle_screen" width="100%"></a>';//itemprop="image"
				}
				else
				{   
					//echo '<a href="/'.$row['ht_link'].'.html" target="_blank"><img data-src="'.imagePath($photo[0]['img']).'" alt="'.$img_tag.'" class="img-responsive middle_screen lazy" width="100%"></a>';
					//echo '<img data-src="'.imageP($photo[0]['img']).'" alt="'.$img_tag.'" class="img-responsive middle_screen lazy" width="100%"></a>';
				}
			//array_push($ar_photo,"https://www.inspiringvillas.com".imageP($photo[0]['img']));
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
			//echo '<img  src="'.imageP($photo[0]['img']).'" alt="" class="img-responsive " width="100%" style="display:none;">';//itemprop="image"
				
			echo '</div>';
			//------------------------------------------------------------------echo '';
			
			echo '<div class="col-xs-12 col-sm-7 col-md-8 web t_t33 nopad1200 v_details" style="margin-top:19px;">';  //-------------cheange
			
				echo '<div class="col-xs-12 col-sm-12 col-md-12 nopad t_t33">';
					echo '<a href="/'.$row['ht_link'].'.html" target="_blank">';
						echo '<div class="col-xs-12 col-sm-12 col-md-12 nopad t_t11"><h3 class="mg-avl-room-title vtitle f23_2"><span >'.$name[0].'</span></h3></div>';//--itemprop="name"
					echo '</a>';
				echo '</div>';
				
				echo '<div  class="top20 tb t_t44 f18t- f17Desk- f15t " ><div class="indet"><span  style="font-family:pt !important">'.base64_decode($row['short_det']).'</span></div></div>';//itemprop="description"
				//echo '<span ><span  style="color:#f05b46;border-bottom: 0px solid #dbdbda;">Price Range $'.$row['pmin'].' - $'.$row['pmax'].' / room nights / season</span></span>';
				
				//echo '<p>'.string_len(base64_decode($row['short_det'],true),700).'</p>';
				//echo '</div>';
				echo '<div class="gray_mob">';
					echo '<div class="row mg-room-fecilities">';
						echo '<div class="col-12 col-md-6  col-lg-4  top15 t_t11">';  //-------------cheange
							echo '<ul>';
								echo '<li style="margin-bottom: -2px;">';
										//echo '<image data-src="' . S3_BUCKET_URL . '/upload/location.svg"  class="micon lazy" style="width: 23px !important;"/>';
										echo '<image data-src="/upload/location.svg"  class="micon lazy" style="width: 23px !important;"/>';
									
									//echo '<div class="ic_name">&nbsp;&nbsp;'.$full_location.'</div>';
									echo '<div class="ic_name f15t f14ip" >&nbsp;&nbsp;'.$full_location.'</div>';
								echo '</li>';
								if($row['cate_icon']!='')
								{
								echo '<li>';
									/*echo '<svg width="30" height="30">';
										echo '<image xlink:href="/upload/'.$icon_cate.'.svg"  class="micon" />';
									echo '</svg>';*/
									if($icon_cate == "seas")
									{
										//echo '<image  data-src="' . S3_BUCKET_URL . '/upload/'.$icon_cate.'.svg"  class="micon lazy" style="width: 28px !important;height: 32px;margin-left: -5px;" />';
										echo '<image  data-src="/upload/'.$icon_cate.'.svg"  class="micon lazy" style="width: 28px !important;height: 32px;margin-left: -5px;" />';
										$luxu = "Luxury ";
									}
									else
									{
										//echo '<image  data-src="' . S3_BUCKET_URL . '/upload/'.$icon_cate.'.svg"  class="micon lazy" />';
										echo '<image  data-src="/upload/'.$icon_cate.'.svg"  class="micon lazy" />';
										$luxu = "";
									}
									
									echo '<div class="ic_name f15t" >&nbsp;&nbsp;'.$luxu.''.$icon_name.'</div>';//str_ireplace('Villas','Villa',$catename[0]).'
								echo '</li>';
								}
								else
								{
									//echo '-----';
								}
						echo '</ul>';
					echo '</div>';
					echo '<div class="col-12 col-md-6  col-lg-4  top15 nopad t_t22">'; //-------------cheange
							echo '<ul>';
								echo '<li>';
									
									//echo '<image data-src="' . S3_BUCKET_URL . '/upload/bed.svg"  class="micon lazy" />';
									echo '<image data-src="/upload/bed.svg"  class="micon lazy" />';
									echo '<div class="ic_name f15t" >&nbsp;&nbsp;'.$row['bedroom_range'].'</div>';
									
									//echo '<br><br><div class="ic_name">&nbsp;&nbsp;'.$row['actualbed'].' Bedroom</div><br><br>';
								echo '</li>';
								echo '<li>';
									
									//echo '<image data-src="' . S3_BUCKET_URL . '/upload/team.svg"  class="micon lazy"/>';
									echo '<image data-src="/upload/team.svg"  class="micon lazy"/>';
									
									echo '<div class="ic_name f15t" >&nbsp;&nbsp;'.$row['adults'].' Guests</div>';
								echo '</li>';
							echo '</ul>';
						echo '</div>';

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
			$discount = '<div class="inside">From <del><span class="tx_discount_old">$'.number_format($p_min).'</span></del><span class="inprice tx_discount">$'.number_format($p_discount).'</span>/Night</div>';
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
						
						echo '<div class="col-12  col-lg-4 t_price text-right nopad t_t33">'; //-------------cheange
							echo '<div class="col-xs-12 col-sm-5 col-md-12 text-right nopad  tb t_t22">'.$discount.'</div>'; //-------------cheange
							echo '<div class="col-xs-12 col-sm-7 col-md-12  nopad top10 t_t31">'; //-------------cheange
								echo '<button class="btn_villa btn_detail" target="_blank">View Details</button>';
								echo '<button class="btn_villa btn_enquire" target="_blank">Enquire Now</button>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
			
			//--------------------------web-----------------------------
			echo '</div>'; //---------villa_boxs_inside
			echo '</div>'; //---------villa_boxs
			
			
			
			
			
			
			
			//--------------------------mob-----------------------------
			if($zz==1)
				{
					echo '<a href="/'.$row['ht_link'].'.html" target="_blank"><img  src="'.imagePath($photo[0]['img']).'" alt="'.$img_tag.'" class="img-responsive middle_screen mob" width="100%"></a>';//itemprop="image"
					//echo '<img  src="'.imageP($photo[0]['img']).'" alt="'.$img_tag.'" class="img-responsive middle_screen" width="100%"></a>';//itemprop="image"
				}
				else
				{   
					echo '<a href="/'.$row['ht_link'].'.html" target="_blank"><img data-src="'.imagePath($photo[0]['img']).'" alt="'.$img_tag.'" class="img-responsive middle_screen lazy mob" width="100%"></a>';
					//echo '<img data-src="'.imageP($photo[0]['img']).'" alt="'.$img_tag.'" class="img-responsive middle_screen lazy" width="100%"></a>';
				}
			echo '<div class="col-xs-12 col-sm-12 col-md-6 mob top10">';
				//echo '<p>'.string_len(base64_decode($row['short_det'],true),700).'</p>';
				//echo '</div>';
				echo '<div class="gray_mob ">';
					echo '<div class="row mg-room-fecilities">';
						echo '<div class="col-xs-12 col-sm-12 col-md-6 row padleft25 padright25 t_t11">';
							echo '<h3 class=" font_mob top0"><a class="fbk" href="/'.$row['ht_link'].'.html" ><span ><strong>'.$name[0].' </strong></span></a></h3>';//itemprop="name"
							echo '<div  class="col-12 top10 tb f15t "><span  class="pt">'.base64_decode($row['short_det']).'</span></div>';//f13 itemprop="description"
							echo '</div>';
							//echo '<div class="col-xs-12 col-sm-12 col-md-12 padleft25 top10 t_t41">';
							echo '<div class="col-6 col-sm-7 padleft25 top10 t_t11">';
								echo '<ul>';
									echo '<li class="pdmb">';
										/*echo '<svg width="30" height="30" style="padding-left: 5px;">';
											echo '<image xlink:href="/upload/location.svg" src="/upload/location.svg"  class="micon" style="width: 20px !important;" />';
										echo '</svg>';*/
										
										//echo '<image data-src="' . S3_BUCKET_URL . '/upload/location.svg"  class="micon lazy" style="width: 22px !important;padding-left: 5px;"/>';
										echo '<image data-src="/upload/location.svg"  class="micon lazy" style="width: 22px !important;padding-left: 5px;"/>';
										
										
										//echo '<div class="ic_name">&nbsp;&nbsp;'.$full_location.'</div>';
										echo '<div class="ic_name f13">&nbsp;'.$full_location.'</div>';
									echo '</li>';
									if($row['cate_icon']!='')
									{
										echo '<li class="pdmb">';
											/*echo '<svg width="30" height="30">';
												echo '<image xlink:href="/upload/'.$icon_cate.'.svg"  class="micon" />';
											echo '</svg>';*/
											if($icon_cate == "seas")
											{
												//echo '<image data-src="' . S3_BUCKET_URL . '/upload/'.$icon_cate.'.svg"  class="micon lazy" style="width: 34px !important;height: 37px;margin-left: -5px;background: #ffcdcd00;margin-top: -8px;margin-bottom: -1px !important;" />';
												echo '<image data-src="/upload/'.$icon_cate.'.svg"  class="micon lazy" style="width: 34px !important;height: 37px;margin-left: -5px;background: #ffcdcd00;margin-top: -8px;margin-bottom: -1px !important;" />';
												$luxu_mo = "Luxury ";
											}
											else
											{
												//echo '<image data-src="' . S3_BUCKET_URL . '/upload/'.$icon_cate.'.svg"  class="micon lazy" />';
												echo '<image data-src="/upload/'.$icon_cate.'.svg"  class="micon lazy" />';
												$luxu_mo = "";
											}
											echo '<div class="ic_name f13">&nbsp;'.$luxu_mo.''.$icon_name.'</div>';//'.str_ireplace('Villas','Villa',$catename[0]).'
										echo '</li>';
									}
								echo '</ul>';
							echo '</div>';
							echo '<div class="col-6 col-sm-5 padleft251 top10 t_t22">';
								echo '<ul>';
									echo '<li class="pdmb">';
										/*echo '<svg width="30" height="30">';
											echo '<image xlink:href="/upload/bed.svg"  class="micon" />';
										echo '</svg>';*/
										//echo '<image data-src="' . S3_BUCKET_URL . '/upload/bed.svg"  class="micon lazy" />';
										echo '<image data-src="/upload/bed.svg"  class="micon lazy" />';
										echo '<div class="ic_name f13">&nbsp;'.$row['bedroom_range'].'</div>';
									echo '</li>';
									echo '<li class="pdmb">';
										/*echo '<svg width="30" height="30">';
											echo '<image xlink:href="/upload/team.svg"  class="micon" />';
										echo '</svg>';*/
										//echo '<image data-src="' . S3_BUCKET_URL . '/upload/team.svg"  class="micon lazy" />';
										echo '<image data-src="/upload/team.svg"  class="micon lazy" />';
										echo '<div class="ic_name f13">&nbsp;'.$row['adults'].' Guests</div>';
									echo '</li>';
								echo '</ul>';
							echo '</div>';
if($row['discount']!='')
{
	$discount_mob = '<del><span class="tx_discount_old">$'.number_format($p_min).'</span></del><span class="inprice tx_discount">$'.number_format($p_discount).'</span>';
}
else
{
	$discount_mob = '<span class="inprice">$'.number_format($p_min).'</span>';
}      																			
						echo '<div class=" row t_price  t_t21">';
							echo '<div class="col-6  text-center padleft-1 top20 bottom51 t_t31">';
								echo '<div class=" text_price tp2">From '.$discount_mob.' /Night</div>';
								//echo '<a href="/'.$row['ht_link'].'.html" target="_blank"><button class="btn_villa btn_detail" target="_blank">View Details</button></a>';
							echo '</div>';
							echo '<div class="col-6  text-center padright top20 bottom51 t_t31">';
								
								echo '<a href="/'.$row['ht_link'].'.html"  target="_blank"><button class="btn_villa_2 w-100" target="_blank">View Details</button></a>';
								//echo '<a href="/'.$row['ht_link'].'.html"  target="_blank"><button class="btn_villa btn_enquire" target="_blank">Enquire Now</button></a>';
								?><?php /*?><button class="btn_villa btn_enquire" type="button" onClick="pop_enquiry('<?php echo $row['id'];?>','<?php echo $name[0];?>');"> Enquire Now</button><?php */?><?php
							echo '</div>';
							
						echo '</div>';
					echo '</div>';
					/*echo '<div class="col-xs-12 col-sm-12 col-md-12 t_t3">';
						echo '<a href="/'.$row['ht_link'].'.html" class="btn btn-main bto" target="_blank">View Detail</a>';
					echo '</div>';*/
				echo '</div>';
			echo '</div>';
			//--------------------------mob-----------------------------
		echo '</div>';
	echo '</span></div>';
//echo '<!--room-->';
?>
<style>
@media screen and (min-width: 1400px)
{
	.v_img {
		background-repeat: no-repeat;
		background-position: center;
		background-size: contain;
		margin-left: -28px;
	}
	.nopad1200 {
		padding: 10px;
	}
}
@media screen and (min-width: 1200px)
{
	.t_price {
		padding-top: 20px;
		padding-bottom: 12px;
		font-size: 14px;
		color: #000;
		padding-right: 4px;
	}
}
</style>