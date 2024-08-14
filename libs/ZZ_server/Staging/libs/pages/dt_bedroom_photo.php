<?php
$slide = json_decode($room['bedroom_photo'],true);
$vi_name_1 = explode("|",$room['name']);
$ph__name_ = '';
$base_status = 0;
if($room['br_status']==1)
{
	$base_status = 1;
}

if($base_status==1)
{
	$ph__desc = base64_decode($room['bedroom_description'],true);
}
else
{
	$ph__desc = $room['bedroom_description'];
}


?>

<div class="row">
    <div class="col-12">
        <div class="box_headline_2">
            <h3 class="">Bedroom Photo</h3>
        </div>
    </div>
    
    <div class="owl-carousel  bedroom_carousel" >
    <?php 
    if(count($slide)>0)
    {
        $i=0;
        foreach($slide as $img)
        {
            $i++;
            echo '<div class="owl_box-2 " onClick="open_pop_bedroom_photo();">';
                // <a class="" href="https://www.instagram.com/p/'.$igp_web['link'].'" target="_blank"><img src="'.$igp_web['photo'].'" alt="" class="ig_photo"></a> </div>';
                echo '<img src="'.imagePath($img['img']).'" itemprop=" photo" width="100%" alt="'.$vi_name_1[0].$ph__name_.'" class="lazy pcover">';
                echo '<div class="covboxx rela">';
                    echo '<div class="bedroom_name">'.$vi_name_1[0].' '.$i.'</div>';
                    echo '<div class="bedroom_dt">'.string_len($ph__desc,50).'</div>';
                    echo '<div class="tri tri_bedroom"></div>';
                echo '</div>';
            echo '</div>';
        }
    }
    ?>
    </div>
</div>

<?php /*?><div id="igp" class="carousel slide mob" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php 
		$c=0;
		foreach($slide as $img)
		{
			if($base_status==1)
			{
				$ph__name_ = base64_decode($img['name'],true);
			}
			else
			{
				$ph__name_ = $img['name'];
			}
						
			$act = ($c==0)?'active':'';
			
			echo '<div class="carousel-item '.$act.'">';
				echo '<a href="https://www.instagram.com/p/'.$igp['link'].' " target="_blank">';
					echo '<img data-src="'.imagePath($img['img']).'" itemprop=" photo" class="d-block w-100 lazy" alt="'.$vi_name_1[0].$ph__name_.'">';
				echo '</a>';
			echo '</div>';
			$c++;
			
			//echo 'https://www.instagram.com/p/'.$igp.'<br>';
		}
		?><?php echo '<img data-src="'.imagePath($img['img']).'" itemprop=" photo" width="100%" alt="'.$vi_name_1[0].$ph__name_.'" class="lazy pcover">';//?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#igp" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#igp" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div><?php */?>

<link rel="stylesheet" href="<?php echo $url_link;?>libs/css/owl/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo $url_link;?>libs/css/owl/owl.theme.default.min.css">
<!--<script src="jquery.min.js"></script>-->
<script src="<?php echo $url_link;?>libs/js/owl/owl.carousel.min.js"></script>
<script>
$('.bedroom_carousel').owlCarousel({
    loop:true,
    margin:0,
	lazyLoad: true,
	nav:true,
	navText: ["<img src='<?php echo $url_link;?>upload/new_design/v_details/left.png'>","<img src='<?php echo $url_link;?>upload/new_design/v_details/right.png'>"],
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
			margin:0,
			nav:true
        },
        600:{
            items:1,
			margin:0,
			nav:true
        },
        768:{
            items:1,
			margin:0,
			nav:true
        },
		992:{
            items:1,
			margin:0,
			nav:true
        },
        1000:{
            items:2,
			margin:10,
			nav:true
        },
        1200:{
            items:2,
			margin:10,
			nav:true
        },
        1300:{
            items:3,
			margin:10,
			nav:true
        }/*,
        1500:{
            items:3,
			margin:10,
			nav:true
        }*/
    }
})
</script>