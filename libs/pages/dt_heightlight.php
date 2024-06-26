<div class="row">
	<div class="col-12">
        <div class="box_headline">
            <h3 class="">Highlight Features</h3>
        </div>
    </div>
    
    <div class="row">
    
    	<?php 
            $b=0;
            foreach(json_decode($room['features']) as $feat)
            {
                $sqlicon_feat = $dbc->Query("select * from icons where id=".$feat);
                $icon_feat = $dbc->Fetch($sqlicon_feat);
				
				$ex1 = explode("photo",json_decode($icon_feat['icon'],true));
				$ex_name = explode("_",$ex1[1]);
				$svg = explode(".",$ex_name[1]);
										
                echo '<div class="col-xs-6 col-lg-4 col-xl-3 ">';
					echo '<div class="padding">';
					echo '<ul class="bedr">';
                        //echo '<li><img data-src="'.json_decode($icon_feat['icon'],true).'" class="micon lazy" alt="'.$icon_feat['name'].'"> '.$icon_feat['name'].'  </li>';
						$ar_new = array('2001','2003','2002','2005','2008','2007','2006');
						if(in_array($icon_feat['id'],$ar_new))
						{
							echo '<li class="fo15"><image  data-src="'.json_decode($icon_feat['icon'],true).'" alt="'.$icon_feat['name'].'"  class="micon lazy" style="width: 34px !important;height: 32px;margin-left: -5px;" /> '.$icon_feat['name'].'</li>';
							//echo '<li class="fo15"><image  data-src="' . S3_BUCKET_URL . ''.json_decode($icon_feat['icon'],true).'" alt="'.$icon_feat['name'].'"  class="micon lazy" style="width: 34px !important;height: 32px;margin-left: -5px;" /> '.$icon_feat['name'].'</li>';
						}
						else
						{
							if($icon_feat['created']>date("2019-01-01"))
							{
								echo '<li class="fo15"><image  data-src="'.json_decode($icon_feat['icon'],true).'" alt="'.$icon_feat['name'].'"  class="micon lazy" style="width: 34px !important;height: 32px;margin-left: -5px;" /> '.$icon_feat['name'].'</li>';
								//echo '<li class="fo15"><image  data-src="' . S3_BUCKET_URL . ''.json_decode($icon_feat['icon'],true).'" alt="'.$icon_feat['name'].'"  class="micon lazy" style="width: 34px !important;height: 32px;margin-left: -5px;" /> '.$icon_feat['name'].'</li>';
							}
							else
							{
								echo '<li class="fo15"><image  data-src="/upload/icons/'.$svg[0].'.svg" alt="'.$icon_feat['name'].'"  class="micon lazy" style="width: 34px !important;height: 32px;margin-left: -5px;" /> '.$icon_feat['name'].'</li>';
								//echo '<li class="fo15"><image  data-src="' . S3_BUCKET_URL . '/upload/icons/'.$svg[0].'.svg" alt="'.$icon_feat['name'].'"  class="micon lazy" style="width: 34px !important;height: 32px;margin-left: -5px;" /> '.$icon_feat['name'].'</li>';
							}
							
						}
						//echo '<li class="fo15"><image  data-src="' . S3_BUCKET_URL . '/upload/icons/'.$svg[0].'.svg" alt="'.$icon_feat['name'].'"  class="micon lazy" style="width: 34px !important;height: 32px;margin-left: -5px;" /> '.$icon_feat['name'].'</li>';
                    echo '</ul>';
					echo '</div>';
                echo '</div>';
                $b++;
                if(($b%3)==0)
                {
                    //echo '</div><div class="row col-md-12 nopad">';
                }
            }
        ?>
    </div>
    
    
    
    <!--<div class="col-12 bggray">
        <div class="row col-md-12 nopad">
        
        </div>
    </div>-->
</div>




