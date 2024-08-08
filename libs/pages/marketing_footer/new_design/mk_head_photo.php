<div class="container top_photo <?php echo $mk_head_photo;?>">
	<div class="row justify-content-center">
    	<div class="col-12 nopad- text-center">
        <?php
        if($page_link=='all')
		{
			echo '<img src="'.$url_link.'upload/Private-Villa-With-Private-Pool.jpg" alt="Private Villa With Private Pool"  class="img-responsive">';
		}
		elseif($page_link=='phuket')
		{
			get_vdo($_REQUEST['des'],$url_link);
			echo '<img src="'.$url_link.'upload/Artboard 120.png" alt="" width="100%" class="top50">';
		}
		elseif($page_link=='phuket_1_4' || $page_link=='phuket_5_7' || $page_link=='phuket_8_10')
		{
			get_vdo($_REQUEST['des'],$url_link);
			//echo '<img src="'.$url_link.'upload/Artboard 120.png" alt="" width="100%" class="top50">';
		}
		elseif($_REQUEST['des']==38 && $_REQUEST['cate']!='all')
		{
			get_vdo($_REQUEST['des'],$url_link);
		}
		elseif($_REQUEST['des']==39 && $_REQUEST['cate']!='all')
		{
			get_vdo($_REQUEST['des'],$url_link);
		}
		elseif($page_link=='samui_1_4' || $page_link=='phuket_5_7' || $page_link=='phuket_8_10')
		{
			get_vdo($_REQUEST['des'],$url_link);
			//echo '<img src="'.$url_link.'upload/Artboard 120.png" alt="" width="100%" class="top50">';
		}
		elseif($page_link=='thailand-phuket/patong')
		{
			echo '<img src="'.$url_link.'upload/Patong-villas-for-rent.jpeg" alt="Patong villas for rent" class="img-responsive top50" >';
		}
		else
		{
			echo '<img src="'.$url_link.'upload/Artboard 120.png" alt="" width="100%" class="top_search">';
		}
		
		
		
		?>
        
        </div>
    </div>
</div> 

<?php
function get_vdo($des,$url_link)
{
	if($des==38)
	{
		$img_vdo = "Phuket";
		$texts = "Discover Phuket ";
		$photo = $url_link.'upload/'.$img_vdo.'.jpg';
		$photo_mob = $url_link.'upload/'.$img_vdo.'2.jpg';
	}
	elseif($des==39)
	{
		$img_vdo = "Koh_Samui";
		$texts = "Discover Koh Samui";
		$photo = $url_link.'upload/'.$img_vdo.'.jpg';
		$photo_mob = $url_link.'upload/'.$img_vdo.'2.jpg';
	}
	else
	{
		$img_vdo = "pall";
		$texts = "Discover Thailand";
		$photo = $url_link.'upload/'.$img_vdo.'.jpg';
		$photo_mob = $url_link.'upload/'.$img_vdo.'2.jpg';
	}
	//echo '<img src="'.$url_link.'upload/Artboard 120.png" alt="" width="100%" class="top_search">';
	?>
	
	<!--<div class="container-fluid tvdo">-->
		<div class=" web">    
			<div class="col-md-12 pal nopad ">
				<div class="col-md-12 rela nopad">
					<div class="filters"></div>
					<div class="text-center ttmain"><?php echo $texts;?></div>
					<div class="ttsub text-center"></div>
					<i class="fa fa-play-circle" onClick="popu('<?php echo $des;?>')"></i>
					<div class="imggs">
						<img class="lazy vdo_cov" data-src="<?php echo $photo;?>" alt="<?php echo $img_vdo;?>" width="100%" >
					</div>
				</div>
			</div>
		</div>
		<div class=" mob">
			<div class="col-md-12 pal nopad pmob ">
				<div class="col-md-12 cinside rela nopad">
					<div class="filters2"></div>
					<div class="text-center ttmain"><?php echo $texts;?></div>
					<div class="ttsub text-center"></div>
					<i class="fa fa-play-circle" onClick="popu('<?php echo $des;?>')"></i>
					<div class="imggs">
						<img class="lazy vdo_cov" data-src="<?php echo $photo_mob;?>" alt="<?php echo $img_vdo;?>" width="100%" >
					</div>
				</div>
			</div>
		</div>
	<!--</div>-->
	<?php
}
?>