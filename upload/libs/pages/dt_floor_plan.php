<?php 
	$bed = json_decode($room['plan'],true);
	if($bed!='')
	{ 
		$flp_photo = json_decode($room['plan'],true);
		//echo $flp_photo;
		 if(is_array($flp_photo))
		 {
			 if($flp_photo[0]!='')
			 {
				 ?><?php //echo '>>'.$flp_photo[0];//imagePath();?>
                 <div class="col-md-12 top20 mg-room-fecilities bedrooms" style="margin-top: 12px;">
            
                    <h5 class="mg-sec-left-title l15">Floor Plan</h5>
                    <div class="row ">
                       <div class="col-md-12 nopad">
                            <img data-src="<?php echo $flp_photo[0];//imagePath();?>" alt="<?php echo $vi_name[0];?>Floor Plan" width="100%" data-bs-toggle="modal" data-bs-target="#myModal_floor" onClick="vire_floor()" class="pointer lazy">
                        </div>
                    </div>
                </div>
			 <?php
			 }
			 else
			 {
				// echo '0000000000000';
			 }
			 
		 }
		 else
		 {
			 ?>
             <div class="col-md-12 top20 mg-room-fecilities bedrooms" style="margin-top: 12px;">
    	
                <h5 class="mg-sec-left-title l15">Floor Plan</h5>
                <div class="row ">
                   <div class="col-md-12 nopad">
                         <img data-src="<?php echo imagePath($flp_photo);?>" alt="<?php echo $vi_name[0];?>Floor Plan" width="100%" data-bs-toggle="modal" data-bs-target="#myModal_floor" onClick="vire_floor()" class="pointer lazy">
                    </div>
                </div>
            </div>
			 <?php
		 }
	?>
	
    
	<?php
	}
?>
<script>
function vire_floor(img)
{
	$(".modal-backdrop").hide();
	$(".modal-content").css({"background-color":"#ffffff00"});
	//$(".c_floorpaln").attr('src',img);
}
</script>

<div class="modal fade " id="myModal_floor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg mfloor" role="document"  data-scroll-scope="force" style="--bs-modal-width: 70%;" >
    <div class="modal-content cont">
      <div class="modal-header modal-h">
        
        <h4 class="modal-title" id="myModalLabel">Floor Plan</h4>
        <button type="button" class="close btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
      </div>
      <div class="modal-body">
		  <!--<img class="c_floorpaln" width="100%">-->
          
            <div id="fl_plan" class="carousel slide" data-bs-ride="carousel">
                <!-- Indicators -->
                <?php /*?><ol class="carousel-indicators my_dot">
                <?php for($zz=0;$zz<count($flp_photo);$zz++)
				{
					$ac = ($zz==0)?'active':'';
					echo '<li data-target="#carousel-fl-plan" data-slide-to="'.$zz.'" class="'.$ac.'"></li>';
				}
				
				?>
                </ol><?php */?>
                
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                <?php 
				if(is_array($flp_photo))
				{
					$x=0;
					foreach($flp_photo as $fl_img)
					{
						$selc = ($x==0)?'active':'';
						echo '<div class="carousel-item '.$selc.'">';
							echo '<img src="'.$fl_img.'" class="d-block w-100" width="100%" alt="...">';
						echo '</div>';
						$x++;
					}
				}
				else
				{
					$x=0;
					$selc = ($x==0)?'active':'';
					echo '<div class="carousel-item '.$selc.'">';
						echo '<img src="'.imagePath($flp_photo).'" width="100%" alt="...">';
					echo '</div>';
				}
				?>
                </div>
                
                <button class="carousel-control-prev" type="button" data-bs-target="#fl_plan" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#fl_plan" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
  
                <!-- Controls -->
               <!-- <a class="left arrleft carousel-control-prev" data-bs-slide="#carousel-fl-plan" >
                    <i class="fa fa-angle-left"></i>         
                    <span class="visually-hidden">Previous</span>      
                </a>
                <a class="right carousel-control-next" data-bs-slide="#carousel-fl-plan" >
                    <i class="fa fa-angle-right"></i>
                    <span class="visually-hidden">Next</span>
                </a>-->
            </div>
            
          
          
          
          
	  </div>
    </div>
  </div>
</div>
<style>
.my_dot > li
{
	background:#969696;
	border-color:#969696;
}
.my_dot > li.active
{
	background:#e6e6e6;
	border-color:#969696;
}
/*.my_dot
{
	background:#3300ff00;
	width:auto;
	height:35px;
	transform:translateX(50%);
	border:2px solid #969696;
	left:50%;
	position:absolute;
	border-radius:25px;
	padding:6px 8px 0px 8px !important;
	bottom:0;
}*/
</style>