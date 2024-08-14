<div class="container-fluid top100">
	<div class="row justify-content-center">
    	<div class="col-12 col-xl-10 text-center">
        	<div class="epl_villa_tt">explore villas</div>
            <div class="epl_villa_tt_2">In the same categories</div>
        </div>
    	
    </div>
</div>

    
    <?php
	if(isset($_REQUEST['id']))
	{
		$villa_destination = $dbc->GetRecord("destinations","*","id='".$room['destination']."'");
		//---- beach
		$beach = $dbc->GetRecord("destinations","*","id='".$room['subdestination']."'");
		$sub_str_beach = explode(",",$beach['name']);
		$rename_beach = str_replace("Beach","Villas",$sub_str_beach[0]);
		$beach_name = $rename_beach;
		$beach_slug = $beach['slug'];
		//---- beach
		
		//---- bedroom
		$get_bedroom = $dbc->GetRecord("property_room AS pr	INNER JOIN bedroom AS b	ON pr.room = b.id",
		"pr.id, pr.property, pr.room, b.`name`, b.short_name, b.slug AS slug",
		"pr.property = '".$_REQUEST['id']."' ORDER BY rand() 
		LIMIT 1");
		$br_name = '';
		switch($get_bedroom['name'])
		{
			case "1-4 Bedroom" :
				$br_name = '2,3,4';
			break;
			case "5-7 Bedroom" :
				$br_name = '5,6,7';
			break;
			case "8> Bedroom" :
				$br_name = '8,9,10>';
			break;
			default:
		}
		$bedroom_name = $br_name.' Bedroom Villas'.$villa_destination['name'];
		//---- bedroom
		
		//---- collection
		$get_colloection = $dbc->GetRecord("property_cate AS pc INNER JOIN categories AS c ON  pc.caategory = c.id",
		"pc.id,pc.property,c.id,c.`name`AS cname,c.slug AS slug,c.photo AS cphoto",
		"pc.property = '".$_REQUEST['id']."' ORDER BY
			rand() 
		LIMIT 1");
		$sub_coll_name_1 = explode("-",$get_colloection['cname']);
		$coll_name = $villa_destination['name'].' '.$sub_coll_name_1[0];
		$coll_photo = json_decode($get_colloection['cphoto']);
		//---- collection
		
		
		$villa = $dbc->GetRecord("properties","*","id='".$_REQUEST['id']."'");
		$villa_photo = json_decode($room['photo'],true);
		$bedroom = json_decode($room['bedroom_photo'],true);
		//$qry_beach = $dbc->GetRecord("porperties","*","status > 0 and ");
	}
	?>
<div class="container-fluid explore_box">            
    <div class="row justify-content-center ">
    	<div class="col-xl-10 row">
            <div class="col-4 col-sm-4 col-md-4 text-center nopad">
               <div class="photo_ep_box"><img src="../../upload/new_design/v_details/v1.png" alt=""></div>
                <div class="exp_link_main"><a class="exp_link" href="/search-rent/<?php echo 'thailand-'.$villa_destination['slug'];?>/<?php echo $beach_slug;?>/all-price/all-bedrooms/all-collections/all-sort.html" target="_blank"><?php echo $beach_name;?></a></div>
            </div>
            <div class="col-4 col-sm-4 col-md-4 text-center nopad">
                <div class="photo_ep_box"><img src="../../upload/new_design/v_details/b2.png" alt=""></div>
                <div class="exp_link_main"><a class="exp_link" href="/search-rent/<?php echo 'thailand-'.$villa_destination['slug'];?>/<?php echo $beach_slug;?>/all-price/all-bedrooms/all-collections/all-sort.html" target="_blank"><?php echo $bedroom_name;?></a></div>
            </div>
            <div class="col-4 col-sm-4 col-md-4 text-center nopad">
                <div class="photo_ep_box"><img src="../../upload/new_design/v_details/c3.png" alt=""></div>
                <div class="exp_link_main"><a class="exp_link" href="/search-rent/<?php echo 'thailand-'.$villa_destination['slug'];?>/all-beach/all-price/all-bedrooms/<?php echo $get_colloection['slug'];?>/all-sort.html" target="_blank"><?php echo $coll_name;?></a></div>
            </div>	
        </div>
    </div>    
</div>




<!--<div class="container t_t1- top100">
    <div class="col-md-12 nopad " style="margin-top: 50px;">
        <h2 class=" mb f30 tg top text-center tt_vd_footer"><strong>Unique Experiences - Holiday Villa Rental</strong></h2>
    </div>  

    <div class="row justify-content-center nopad top21" style="overflow:hidden;margin-bottom: -10px;">
        <div class="col-md-12 top10">
            <h3 class=" mb  top text-center subtt_vd_footer">Browse all Thailand Villa Rentals or Explore more destinations below</h3>
            
            <div class="row justify-content-center top30">
                <div class="col-10 nopad  top30 text-center "> 
                    <a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="subtt_vd_footer ">Phuket Villas</a>
                </div>
                <div class="col-10 nopad top20 text-center vd_footer_link_block "> 
                    <a href="/search-rent/thailand-phuket/kamala-beach/all-price/all-bedrooms/all-collections/all-sort.html">Kamala</a> 
                    <a href="/search-rent/thailand-phuket/bang-tao-beach/all-price/all-bedrooms/all-collections/all-sort.html">Bang Tao</a> 
                    <a href="/search-rent/thailand-phuket/kata-beach/all-price/all-bedrooms/all-collections/all-sort.html">Kata</a> 
                    <a href="/search-rent/thailand-phuket/surin-beach/all-price/all-bedrooms/all-collections/all-sort.html">Surin</a> 
                    <a href="/search-rent/thailand-phuket/nai-harn/all-price/all-bedrooms/all-collections/all-sort.html">Nai Harn</a> 
                    <a href="/search-rent/thailand-phuket/cape-yamu/all-price/all-bedrooms/all-collections/all-sort.html">Cape Yamu</a> 
                    <a href="/search-rent/thailand-phuket/layan-beach/all-price/all-bedrooms/all-collections/all-sort.html">Layan</a>
                    <a href="/search-rent/thailand-phuket/cape-panwa-beach/all-price/all-bedrooms/all-collections/all-sort.html">Cape Panwa</a>
                    <a href="/search-rent/thailand-phuket/ao-yon-bay/all-price/all-bedrooms/all-collections/all-sort.html">Ao Yon</a>
                    <a href="/search-rent/thailand-phuket/patong/all-price/all-bedrooms/all-collections/all-sort.html">Patong </a> 
                </div>
                <div class="col-10 nopad  top30 text-center "> 
                    <a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="subtt_vd_footer ">Koh Samui Villas</a>
                </div>
                <div class="col-10 nopad top21 text-center vd_footer_link_block "> 
                    <a href="/search-rent/thailand-koh-samui/bophut-beach/all-price/all-bedrooms/all-collections/all-sort.html">Bophut</a>
                    <a href="/search-rent/thailand-koh-samui/maenam-beach/all-price/all-bedrooms/all-collections/all-sort.html">Maenam</a> 
                    <a href="/search-rent/thailand-koh-samui/lipa-noi-beach/all-price/all-bedrooms/all-collections/all-sort.html">Lipa Noi</a>
                    <a href="/search-rent/thailand-koh-samui/chaweng-beach/all-price/all-bedrooms/all-collections/all-sort.html">Chaweng Noi</a>
                    <a href="/search-rent/thailand-koh-samui/taling-ngam-beach/all-price/all-bedrooms/all-collections/all-sort.html">Taling Ngam</a>
                    <a href="/search-rent/thailand-koh-samui/bangrak-beach/all-price/all-bedrooms/all-collections/all-sort.html">Bangrak</a>
                    <a href="/search-rent/thailand-koh-samui/lamai-beach/all-price/all-bedrooms/all-collections/all-sort.html">Lamai</a>
                    <a href="/search-rent/thailand-koh-samui/choeng-mon-beach/all-price/all-bedrooms/all-collections/all-sort.html">Choeng Mon</a> 
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
</div>--> 
  			<?php /*?><div class="photo_ep_box" style="background:url('<?php echo imagePath($villa_photo[0]['img']);?>');"><!--<img src="<?php echo imagePath($villa_photo[0]['img']);?>" alt="">--></div>
                <a href="/search-rent/<?php echo 'thailand-'.$villa_destination['slug'];?>/<?php echo $beach_slug;?>/all-price/all-bedrooms/all-collections/all-sort.html" target="_blank"><?php echo $beach_name;?></a>
            </div>
            <div class="col-12 col-md-4 text-center">
                <div class="photo_ep_box" style="background:url('<?php echo imagePath($bedroom[0]['img']);?>');"><!--<img src="<?php echo imagePath($bedroom[0]['img']);?>" alt="">--></div>
                <a href="/search-rent/<?php echo 'thailand-'.$villa_destination['slug'];?>/<?php echo $beach_slug;?>/all-price/all-bedrooms/all-collections/all-sort.html" target="_blank"><?php echo $bedroom_name;?></a>
            </div>
            <div class="col-12 col-md-4 text-center">
                <div class="photo_ep_box" style="background:url('<?php echo imagePath($coll_photo);?>');"><img src="<?php echo imagePath($coll_photo);?>" alt=""></div>
                <a href="/search-rent/<?php echo 'thailand-'.$villa_destination['slug'];?>/all-beach/all-price/all-bedrooms/<?php echo $get_colloection['slug'];?>/all-sort.html"><?php echo $coll_name;?></a>
            </div>	<?php */?>