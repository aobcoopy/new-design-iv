<meta name="robots" content="noindex">
<?php
$id = $_REQUEST['id'];//base64_decode($_REQUEST['id']);//echo $id;
$dear_show = 0;
$bg = '#E5E5E5';
if(isset($_SESSION['auth']['user_id']))
{
	$bg = '#fff';//'#fff4e4';
	$dear_show = 1;
	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$form = $dbc->GetRecord("villa_form_mapping","*","links = '".$id."'");
	?>
    <div class="container-fluid nopad top50" style="position:fixed; width:100%; z-index:10;">
        <div class="col-12 nopad text-center">
            <!--<button type="button" class="btn btn-primary btn_back" onClick="goback()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>-->
            <?php /*?><div class="col-md-6 nopad"><button type="button" class="btn btn-primary btn_back btn-sm btn-block" onClick="goback()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></div><?php */?>
            <div class="col-md-12 nopad"><button class="btn btn-warning btn-md btn-block">Edit Form Customer Name <?php echo $form['cus_name'];?></button></div>
            
        </div>
    </div>
    <!--<div class="container top50"><br><br>
        <div class="col-12 text-center">
            <button type="button" class="btn btn-primary btn_back" onClick="goback()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
            <input type="text" class="tx_my_link" value="<?php echo $actual_link;?>">
            <button type="button" class="btn btn-success " onClick="copylink()"><i class="fa  fa-clipboard" aria-hidden="true"></i> Copy Link</button>
        </div>
    </div>-->
    
    <!--<button type="button" class="btn btn-success btn_back" onClick="view_form()"><i class="fa fa-search" aria-hidden="true"></i> View</button>-->
    <script>
	function goback()
	{
		window.history.back();
	}
	
	function view_form()
	{
		window.location = '/view-villaform-<?php echo $_REQUEST['id'];?>.html';
	}
	
	function copylink()
	{
		$(".tx_my_link").select();
		document.execCommand("copy");
	}
	</script>
	<?php
}
else
{
	$dear_show = 0;
	$bg = '#E5E5E5';
}
?>





<br>
<br>
<br>
<?php
	
	if($dbc->HasRecord("villa_form_mapping","links = '".$id."'"))
	{
		$form = $dbc->GetRecord("villa_form_mapping","*","links = '".$id."'");
		$form_id = $form['id'];
		
		$villa_form = $dbc->GetRecord("villa_form","*","id = '".$form['villaform_id']."'");
			
		$data = $dbc->GetRecord("properties","*","id='".$villa_form['property']."'");
		$vil_name = explode("|",$data['name']);
		
		
		
	}
	else
	{
		$villa_form = '';
		$data = '';
		$vil_name = '';
		$form = '';
		$form_id = '';
	}
		
?>

<script>
function alert_text(inp)
{
	alert("Please fill your data");
	$(inp).focus();
	return false;
}
</script>

<!--<div class="container back_form">
<form id="v_form_0">
<input type="hidden" name="txtID" value="<?php echo $form_id;?>">
    <div class="col-md-12 nopad ">
        <div class="vf_titlea">
            <strong>Customer :</strong> <?php echo $form['cus_name'];?> / 
            <strong>Travel date :</strong>  <?php echo $form['arrive'];?> - <?php echo $form['arrive_to'];?>
           
        </div>
    </div>
    
</form>
</div>-->
<script>
function save_cus()
{
	if($("#tx_cus").val()=='')
	{
		alert_text("#tx_cus");
	}
	else if($("#tx_cusdate").val()=='')
	{
		alert_text("#tx_cusdate");
	}
	else
	{
		$.ajax({
			url:"libs/action_form/save_cus.php",
			type:"POST",
			dataType:"json",
			data:$("#v_form_0").serialize(),
			success: function(res){
				if(res.status==true)
				{
					$(".cok0").fadeIn(300);
					$(".cno0,.tno0").hide();
				}
				else
				{
					$(".cno0,.tno0").fadeIn(300);
					$(".tno0").html(res.msg);
					$(".cok0").hide();
				}
			}
		});
	}
}
</script>
    


<!-- new -->
<br><br><br><br><br>
<div class="container-fluid">
	<div class="row justify-content-center">
    	<div class="col-6 align-self-end text-end"><img src="../../upload/new_design/villa_form/Artboard 112.png" class="vf_img" width="150" alt=""></div>
        <div class="col-6 align-self-start text-start">
        <?php 
			if($villa_form['logo_part']!='')
			{
				$logo_r = json_decode($villa_form['logo_part']);
				echo '<img src="'.$logo_r.'" class="img_r_logo_tmb" width="150" alt="">';
			}
			else
			{
				echo '<img src="../../upload/new_design/villa_form/logo_right.jpg" class="img_r_logo_tmb" width="150" alt="">';
			}
		?><!--<img src="../../upload/new_design/villa_form/Artboard 113.png" width="150" alt="">--></div>
    </div>
    
    <div class="row text-center ">    
        <div class="top_cus_name"><?php echo $form['dear_name'];?></div>
        <div class="top_thk">Thank you for your reservation with InspiringVillas.</div>
    </div>
    <div class="row">
    	<div class="col-12 nopad">
         <?php
        if($villa_form['main_photo']!='')
			{
				$main_photo = json_decode($villa_form['main_photo']);
				echo '<img src="'.$main_photo.'" class="img_amin_tmb" width="100%" alt="">';
			}
			else
			{
				echo '<img src="../../upload/new_design/villa_form/main.jpg" class="img_amin_tmb" width="100%" alt="">';
			}
		?>
        <!--<img src="../../upload/new_design/villa_form/1.jpg" width="100%" alt="">--></div>
    </div>
</div>
<!--<div class="container">
    <div class="row">
    	<div class="col-12 nopad"><img src="../../upload/new_design/villa_form/Artboard 114.png" width="100%" alt=""></div>
    </div>
</div>-->

<div class="container-fluid box_dear">
	<div class="row justify-content-center">
    	<div class="col-11 col-md-10 col-xl-8">
            <form id="v_form_1">
            <input type="hidden" name="txtID" value="<?php echo $form_id;?>">
                <div class="col-md-12 nopad top15">
                    <div class="vf_title">Dear 
                    <?php if($dear_show == 1)
                    {
                        ?><input type="text" name="tx_dear" id="tx_dear" value="<?php echo $form['dear_name'];?>">,<button type="button" class="btn btn-primary " onClick="save_dear();"> Save</button><?php
                    }
                    else
                    {
                        ?><?php echo $form['dear_name'];?>,<?php
                    }
                    ?>
                    
                    
                    <span class="icon">
                        <i class="fa fa-check cok cok1" aria-hidden="true"></i> <span class="tok tok1"></span>
                        <i class="fa fa-check cno cno1" aria-hidden="true"></i> <span class="tno tno1"></span>
                    </span></div>
                    <br>
                    Thank you for your reservation with InspiringVillas.<br>
                    I would like to gather the information to make sure your stay at <strong><?php echo $vil_name[0];?></strong> will be as wonderful as possible.
                </div>
            </form>
        </div>
    	
    </div>
</div>



<div class="container-fluid">
	<div class="row justify-content-center">
    	<div class="col-11">
        	<div class="row justify-content-center">
            	<div class="col-3 d-none d-md-block">
                <?php
                if($villa_form['side_photo']!='')
                    {
                        $side_photo = json_decode($villa_form['side_photo']);
                        echo '<img src="'.$side_photo.'" class="img_side_tmb" width="100%" alt="">';
                    }
                    else
                    {
                        echo '<img src="../../upload/new_design/villa_form/side.jpg" class="img_side_tmb" width="100%" alt="">';
                    }
                ?>
                <!--<img src="../../upload/new_design/villa_form/2.png" width="100%" alt="">--></div>
                <div class="col-12 col-lg-7 text-center">
                	<img src="../../upload/new_design/villa_form/Artboard 177.png" width="100%" class="side_mob" alt="">
                	<div class="book_title">booking</div>
                    <div class="subtt">details</div>
                    <div class="book_line"></div>
                    
                    <div class="book_details t_t1-">
                    	<?php 
						$inf = json_decode($villa_form['informations'],true);
						$booking = json_decode(base64_decode($inf['booking']),true);
						$bd = ($booking['booking_details']!='')?'block':'none';
						//$bi = ($booking['booking_inclusions']!='')?'block':'none';
						$ac = ($booking['additional_charges']!='')?'block':'none';
						
						$inc = json_decode(base64_decode($inf['inclusions']),true);
						$bi = (count($inc)>0)?'block':'none';
						$not = json_decode(base64_decode($inf['note']),true);
						$notess = (count($not)>0)?'block':'none';
						?>
						
						<div class="row justify-content-center top70">
							<div class="col-9 t_t2-">
								<dl class="row text-start">
									<dt class="col-sm-4">Villa Name</dt>
									<dd class="col-sm-8"><?php echo $vil_name[0];?></dd>
									<dt class="col-sm-4">Address</dt>
									<dd class="col-sm-8"><?php echo $inf['address'];?></dd>
									<dt class="col-sm-4">Location</dt>
									<dd class="col-sm-8"><?php echo $inf['location'];?></dd>
									<dt class="col-sm-12"> <?php 
							$disp = ($inf['map']!='')?:'disabled';
							?>
								<a href="<?php echo $inf['map'];?>" target="_blank" class=" <?php echo $disp;?>"><div class="btn_google_map"><!--<img src="../../upload/new_design/villa_form/Google-Maps-Logo.jpg" class="googlemap_but" alt="">--></div></a></dt>
								<br><br> <br><br>
									
									<dt class="col-sm-4"><strong>Booking Details</strong></dt>
									<dd class="col-sm-8"><?php echo nl2br($booking['booking_details']);?></dd>
									<?php 
									/*$bd = str_replace("<br>","|",nl2br($booking['booking_details']));
									echo $bd;
									$vdetail =  explode(":",$booking['booking_details']);//nl2br($booking['booking_details'])
									$g=0;
									foreach($vdetail as $v_detail)
									{
										if(($g%2)==0)
										{
											echo '<dt class="col-sm-4"><strong>'.$v_detail.'</strong></dt>';
									
											//echo $v_detail.'<br>';
										}
										else
										{
											echo '<dd class="col-sm-8">'.$v_detail.'</dd>';
										}
										$g++;
									}*/
									?>
									
									
									<dt class="col-sm-4 top50">Booking Inclusions</dt>
									<dd class="col-sm-8 top50" style="display:<?php echo $bd;?>">
									<?php
									if(count($inc)>0)
										{
											foreach($inc as $inclus)
											{
												echo '<div class="inclu_inp">';
													echo '- '.$inclus;
												echo '</div>';
											}
										}
									?>
									</dd>
									
									<dt class="col-sm-4 top50" style="display:<?php echo $ac;?>">Additional Charges</dt>
									<dd class="col-sm-8 top50" style="display:<?php echo $ac;?>"><?php echo nl2br($booking['additional_charges']);?></dd>
									
									<dt class="col-sm-4 top50" style="display:<?php echo $notess;?>">Note</dt>
									<dd class="col-sm-8 top50" style="display:<?php echo $notess;?>"></dd>
									<dt class="col-sm-8 " style="display:<?php echo $notess;?>">
									<?php
									if(count($not)>0)
										{
											foreach($not as $notee)
											{
												echo '<div class="inclu_inp">';
													echo '- '.$notee;
												echo '</div>';
											}
										}
									?>
									</dt>
									
									
									<div class="book_line"></div>
									
									
									
									
									<!--<dt class="col-sm-3">Term</dt>
									<dd class="col-sm-9">
									<p>Definition for the term.</p>
									<p>And some more placeholder definition text.</p>
									</dd>
									
									<dt class="col-sm-3">Another term</dt>
									<dd class="col-sm-9">This definition is short, so no extra paragraphs or anything.</dd>
									
									<dt class="col-sm-3 text-truncate">Truncated term is truncated</dt>
									<dd class="col-sm-9">This can be useful when space is tight. Adds an ellipsis at the end.</dd>
									
									<dt class="col-sm-3">Nesting</dt>
									<dd class="col-sm-9">
									<dl class="row">
									<dt class="col-sm-4">Nested definition list</dt>
									<dd class="col-sm-8">I heard you like definition lists. Let me put a definition list inside your definition list.</dd>
									</dl>
									</dd>-->
								</dl>
							</div>
						</div>
        


                    </div>
                </div>
                <div class="col-0 col-md-1"></div>
            </div>
            
            <img src="../../upload/new_design/villa_form/EDM-detail-villa.png" class="iv_logo_big" alt="">
            
        </div>
    </div>
</div>

<div class="container-fluid box_dear">
	<div class="row justify-content-center">
    	<div class="col-11 col-md-10 col-xl-8">
            
            <dl class="row">
              <dt class="col-sm-3">SERVICE HOURS</dt>
              <dd class="col-sm-9"><?php echo $villa_form['services'];?></dd>
              
               <?php 
					$os_status_vi = ($villa_form['onsite_status']==1)?'block':'none';
				?>
              <dt class="col-sm-3" style="display:<?php echo $os_status_vi;?>">ONSITE CONTACT</dt>
              <?php 
					$os_status = ($villa_form['onsite_status']==1)?$villa_form['onsite_con']:'-';
				?> 
              <dd class="col-sm-9" style="display:<?php echo $os_status_vi;?>"><?php echo $os_status;?></dd>
              
              <?php $arrival = json_decode($villa_form['arrival'],true);?>
              <dt class="col-sm-3">ARRIVAL AND DEPARTURE TIMES</dt>
              <dd class="col-sm-9">
              	Please provide your flight information in tables below for our team to be ready to check your party in.
              	<div class="row nomar">
                    <div class="col-md-6 text-left"><strong>Check-in time: <?php echo $arrival['check_in'];?></strong></div>	
                    <div class="col-md-6 text-left"><strong>Check-out time: <?php echo $arrival['check_out'];?></strong></div>	
                </div>
              </dd>
            	
            </dl>

        </div>
        
        <div class="w-100"></div>
        
        <div class=" bg_ap rela">
        	<div class="ovl"></div>
        	<div class="tx_ap2">airport transfer</div>
        </div>
        
       
        <div class="w-100"></div>
        
        <div class="col-11 col-md-10 col-xl-8 top50">
            <dl class="row">
              <dt class="col-sm-3"><div class="tx_head">AIRPORT TRANSFER</div>	</dt>
              <dd class="col-sm-9">
              <?php
                $aptf = $arrival['transfer'];
                //echo $arrival['transfer'].'---<br>';
                foreach($aptf as $aptf_val)
                {
                    echo '- '.$aptf_val.'<br>';
                }
                ?>
              </dd>
            
            </dl>
        </div>
        
        
        <div class="w-100"></div>
        
        <div class="col-11 col-md-10 col-xl-10 top50">
            
            <form id="v_form_4">
            <input type="hidden" name="txtID" value="<?php echo $form_id;?>"> 
                <div class="col-md-12 r_arrival">
                    <div class=""><button type="button" class="btn btn_addarv " onClick="add_arrival_4();"><i class="fa fa-plus" aria-hidden="true"></i> Arrival</button></div><br>
                     <?php 
                     $air = json_decode($form['airport_transfer'],true);
                     if(count($air['arrival'])>0)
                     {
                         $xx=0;
                         foreach($air['arrival'] as $at)
                         {
                             $xx++;
                             ?>
                             <div class="alert alert-success col-md-12 arrival row" role="alert">
                            
                                <h2> <span class="tb">+</span>
                                <button type="button" class="btn btn-danger " onClick="$(this).parent().parent().remove();"><i class="fa fa-trash" aria-hidden="true"></i></button> 
                                Transfers Arrival <span class="badge badge-info"><?php echo $xx;?></span>
                                </h2>
                                
                                <div class="col-md-4">
                                    <div class="form-group rela">
                                        <label for="Sign Name">Sign Name</label>
                                        <input type="text" class="form-control li_blu" id="tx_sname_a" name="tx_sname_a" value="<?php echo $at['tx_sname_a'];?>">
                                        <div class="tricorner_mini bluee"></div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group rela">
                                        <label for="Sign Name">Date</label>
                                        <input type="date" class="form-control li_blu" id="tx_date_a" name="tx_date_a" value="<?php echo $at['tx_date_a'];?>">
                                        <div class="tricorner_mini bluee"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group rela">
                                        <label for="Sign Name">Airport/Hotel</label>
                                        <input type="text" class="form-control li_blu" id="tx_airline_a" name="tx_airline_a" value="<?php echo $at['tx_airline_a'];?>">
                                        <div class="tricorner_mini bluee"></div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group rela">
                                        <label for="Sign Name">Flight number</label>
                                        <input type="text" class="form-control li_blu" id="tx_flight_a" name="tx_flight_a" value="<?php echo $at['tx_flight_a'];?>">
                                        <div class="tricorner_mini bluee"></div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group rela">
                                        <label for="Sign Name">Time</label>
                                        <input type="text" class="form-control li_blu" id="tx_time_a" name="tx_time_a" value="<?php echo $at['tx_time_a'];?>">
                                        <div class="tricorner_mini bluee"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group rela">
                                        <label for="Sign Name">No. of Adults/Kids (Kids age)</label>
                                        <input type="text" class="form-control li_blu" id="tx_pass_a" name="tx_pass_a" value="<?php echo $at['tx_pass_a'];?>">
                                        <div class="tricorner_mini bluee"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group rela">
                                        <label for="Sign Name">Transfer Arrangement Yes or No</label>
                                        <input type="text" class="form-control li_blu" id="tx_transfer_a" name="tx_transfer_a" value="<?php echo $at['tx_transfer_a'];?>">
                                        <div class="tricorner_mini bluee"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group rela">
                                        <label for="Sign Name">Contact number</label><!-- and Special Request -->
                                        <input type="text" class="form-control li_blu" id="tx_Contact_a" name="tx_Contact_a" value="<?php echo $at['tx_Contact_a'];?>">
                                        <div class="tricorner_mini bluee"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group rela">
                                        <label for="Sign Name">No.of Luggages </label>
                                        <input type="text" class="form-control li_blu" id="tx_luggages_a" name="tx_luggages_a" value="<?php echo $at['tx_luggages_a'];?>">
                                        <div class="tricorner_mini bluee"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group rela">
                                        <label for="Sign Name">Special Request</label>
                                        <input type="text" class="form-control li_blu" id="tx_Special_Request_a" name="tx_Special_Request_a" value="<?php echo $at['tx_Special_Request_a'];?>">
                                        <div class="tricorner_mini bluee"></div>
                                    </div>
                                </div>
                                
                                <div class="tricorner bluee"></div>
                            </div>
                        <?php
                         }
                    }
                     ?>
                </div>
                
                <div class="col-md-12 r_departure">
                    
                    <div class=""><button type="button" class="btn btn_adddpt " onClick="add_dpt_4();"><i class="fa fa-plus" aria-hidden="true"></i> Departure</button></div><br>
                    <?php
                     if(count($air['departure'])>0)
                     {
                         $yy=0;
                         foreach($air['departure'] as $at)
                         {
                             $yy++;
                             ?>
                                <div class="alert alert-warning col-md-12 departure row" role="alert">
                                
                                    <h2> <span class="tb">+</span>
                                    <button type="button" class="btn btn-danger " onClick="$(this).parent().parent().remove();"><i class="fa fa-trash" aria-hidden="true"></i></button> Transfers Departure <span class="badge badge-warning"><?php echo $yy;?></span></h2>
                                    <div class="col-md-4">
                                        <div class="form-group rela">
                                            <label for="Sign Name">Sign Name</label>
                                            <input type="text" class="form-control li_ora" id="tx_sname_d" name="tx_sname_d" value="<?php echo $at['tx_sname_d'];?>">
                                            <div class="tricorner_mini orangee"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group rela">
                                            <label for="Sign Name">Date</label>
                                            <input type="date" class="form-control li_ora" id="tx_date_d" name="tx_date_d" value="<?php echo $at['tx_date_d'];?>">
                                            <div class="tricorner_mini orangee"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group rela">
                                            <label for="Sign Name">Airport/Hotel</label>
                                            <input type="text" class="form-control li_ora" id="tx_airline_d" name="tx_airline_d" value="<?php echo $at['tx_airline_d'];?>">
                                            <div class="tricorner_mini orangee"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group rela">
                                            <label for="Sign Name">Flight number</label>
                                            <input type="text" class="form-control li_ora" id="tx_flight_d" name="tx_flight_d" value="<?php echo $at['tx_flight_d'];?>">
                                            <div class="tricorner_mini orangee"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group rela">
                                            <label for="Sign Name">Time</label>
                                            <input type="text" class="form-control li_ora" id="tx_time_d" name="tx_time_d" value="<?php echo $at['tx_time_d'];?>">
                                            <div class="tricorner_mini orangee"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group rela">
                                            <label for="Sign Name">No. of Adults/Kids (Kids age)</label>
                                            <input type="text" class="form-control li_ora" id="tx_pass_d" name="tx_pass_d" value="<?php echo $at['tx_pass_d'];?>">
                                            <div class="tricorner_mini orangee"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group rela">
                                            <label for="Sign Name">Transfer Arrangement Yes or No</label>
                                            <input type="text" class="form-control li_ora" id="tx_transfer_d" name="tx_transfer_d" value="<?php echo $at['tx_transfer_d'];?>">
                                            <div class="tricorner_mini orangee"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group rela">
                                            <label for="Sign Name">Contact Number</label>
                                            <input type="text" class="form-control li_ora" id="tx_Contact_Number_d" name="tx_Contact_Number_d" value="<?php echo $at['tx_Contact_Number_d'];?>">
                                            <div class="tricorner_mini orangee"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group rela">
                                            <label for="Sign Name">No.of Luggages </label>
                                            <input type="text" class="form-control li_ora " id="tx_luggages_d" name="tx_luggages_d" value="<?php echo $at['tx_luggages_d'];?>">
                                            <div class="tricorner_mini orangee"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group rela">
                                            <label for="Sign Name">Special Request</label>
                                            <input type="text" class="form-control li_ora" id="tx_Special_Request_d" name="tx_Special_Request_d" value="<?php echo $at['tx_Special_Request_d'];?>">
                                            <div class="tricorner_mini orangee"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="tricorner orangee"></div>
                                </div>
                         <?php
                         }
                     }
                     ?>
                </div>
                
                <?php $a_xx = ($xx<=0)?1:$xx; $a_yy = ($yy<=0)?1:$yy;?>
                <input type="hidden" class="txarv" value="<?php echo $a_xx;?>">
                <input type="hidden" class="txdpt" value="<?php echo $a_yy;?>">
                
                
                <div class="">
                <button type="button" class="btn btn-primary " onClick="save_airport();"> Save</button> 
                <span class="icon">
                    <i class="fa fa-check cok cok4" aria-hidden="true"></i> <span class="tok tok4"></span>
                    <i class="fa fa-check cno cno4" aria-hidden="true"></i> <span class="tno tno4"></span>
                </span>
                <!--<button type="button" class="btn btn-success " onClick="add_table_4();"><i class="fa fa-plus" aria-hidden="true"></i></button>-->
                <!--<button type="button" class="btn btn-success " onClick="add_arrival_4();"><i class="fa fa-plus" aria-hidden="true"></i></button>-->
                </div>
                
    
                <p><strong>NOTE:</strong> 100% of the service price may be charged for cancellation and adjustment less than 24 hours before the booking.</p>
                <p >
                    <strong>Special Request </strong><br>
                    <div class="rela">
                        <textarea class="txt_line tx_overlay" name="tx_spcrq" id="tx_spcrq" cols="30" rows="5" placeholder=" " style="width:100%;"><?php echo json_decode($form['special_request']);?></textarea>
                        <label for="tx_spcrq" class="bedcon">Special Request </label>
                        <div class="tricorner_2 bluee"></div>
                    </div>
                    <button type="button" class="btn btn-primary " onClick="save_special_request();"> Save</button> 
                    <span class="icon">
                        <i class="fa fa-check cok cok4_1" aria-hidden="true"></i> <span class="tok tok4_1"></span>
                        <i class="fa fa-check cno cno4_1" aria-hidden="true"></i> <span class="tno tno4_1"></span>
                    </span>
                </p>
                
            </form>
        </div>
        
        <div class="w-100"></div>
        
        <div class=" bg_guest rela"><div class="ovl"></div>
        	<div class="tx_ap2">guest registration</div>
        </div>
        
        <div class="col-11 col-md-11 col-xl-10 top50">
            <form id="v_form_6">
            <input type="hidden" name="txtID" id="txtID" value="<?php echo $form_id;?>">
                <div class="col-md-12 nopad top15">
                    <div class="tx_head">GUEST REGISTRATION</div>	
                    <p class="top15">Pursuant to The Rental Terms & Conditions, there will be a charge of $300 per night for any unregistered guest who stays at the villa. For your room assignment, please have a look at floor plan attached</p>
                </div>
                
                <div class="col-md-12 nopad top15">
                <div class="">
                <button type="button" class="btn btn-primary " onClick="save_guest();"> Save</button> 
                <span class="icon">
                    <i class="fa fa-check cok cok6" aria-hidden="true"></i> <span class="tok tok6"></span>
                    <i class="fa fa-check cno cno6" aria-hidden="true"></i> <span class="tno tno6"></span>
                </span>
                <button type="button" class="btn btn-success " onClick="add_guest()"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
                    <div class="table-responsive">
                    <table id="tb_guest" width="100%%" border="1" class="table table-stripeda table-borderless">
                     <thead>
                        <tr>
                          <th>No.</th>
                          <th width="390">First & Last Name</th>
                          <th>Passport No.</th>
                          <th>City/Country of Residence</th>
                          <th>Date of Birth</th>
                          <th>Nationality</th>
                          <th>Room assignment</th>
                          <th>#</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php 
                     $gue = json_decode($form['guest'],true);
                     if(count($gue)>0)
                     {
                         $a=0;
                         foreach($gue as $guest)
                         {
                             $a++;
                            echo '<tr>';
                                echo '<td>'.$a.'</td>';
                                echo '<td><input class="inp txt_line_2" type="text" name="tx_first" id="tx_first" value="'.$guest['tx_first'].'"></td>';
                                echo '<td><input class="inp txt_line_2" type="text" name="tx_passport" id="tx_passport" value="'.$guest['tx_passport'].'"></td>';
                                echo '<td><input class="inp txt_line_2" type="text" name="tx_city" id="tx_city" value="'.$guest['tx_city'].'"></td>';
                                echo '<td><input class="inp txt_line_2" type="date" name="tx_date" id="tx_date" value="'.$guest['tx_date'].'"></td>';
                                echo '<td><input class="inp txt_line_2" type="text" name="tx_nationality" id="tx_nationality" value="'.$guest['tx_nationality'].'"></td>';
                                echo '<td><input class="inp txt_line_2" type="text" name="tx_room" id="tx_room" value="'.$guest['tx_room'].'"></td>';
                                echo '<td><button type="button" class="btn btn-danger " onClick="delme(this)"><i class="fa fa-trash" aria-hidden="true"></i></button></td>';
                            echo '</tr>';
                         }
                     }
                     else
                     {
                         ?>
                            <tr>
                                <td>1</td>
                                <td><input class="inp txt_line_2" type="text" name="tx_first" id="tx_first"></td>
                                <td><input class="inp txt_line_2" type="text" name="tx_passport" id="tx_passport"></td>
                                <td><input class="inp txt_line_2" type="text" name="tx_city" id="tx_city"></td>
                                <td><input class="inp txt_line_2" type="date" name="tx_date" id="tx_date"></td>
                                <td><input class="inp txt_line_2" type="text" name="tx_nationality" id="tx_nationality"></td>
                                <td><input class="inp txt_line_2" type="text" name="tx_room" id="tx_room"></td>
                                <td><button type="button" class="btn btn-danger " onClick="delme(this)"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                            </tr>
                         <?php
                     }
                     ?>
                        
                      </tbody>
                    </table>
                    </div>
                    <p>
                        <!--<strong>Bed Configurations </strong><br>-->
                        <div class="rela">
                            <textarea name="tx_bconf" id="tx_bconf" class="txt_line tx_bconf" cols="30" rows="5" style="width:100%;" placeholder=" "><?php echo $form['bed_configuration'];?></textarea>
                            <label for="tx_bconf" class="bedcon">Bed Configurations</label>
                            <div class="tricorner_2 bluee"></div>
                        </div>
                        <button type="button" class="btn btn-primary " onClick="save_tx_bconf();"> Save</button> 
                        <span class="icon">
                            <i class="fa fa-check cok cok6_1" aria-hidden="true"></i> <span class="tok tok6_1"></span>
                            <i class="fa fa-check cno cno6_1" aria-hidden="true"></i> <span class="tno tno6_1"></span>
                        </span>
                    </p>
                    <!--<p><strong>NOTE:</strong> 100% of the service price may be charged for cancellation and adjustment less than 24 hours before the booking.</p>-->
                </div>
                
            </form>
            <?php $aaa = ($a!=0)?$a:1;?>
    <input class="inp1" type="hidden" value="<?php echo $aaa;?>">
        </div>
        
        <div class="w-100"></div>
        
        <div class=" bg_food rela"><div class="ovl"></div>
        	<div class="tx_ap2">food and beverages</div>
        </div>
        
        
        <div class="col-11 col-md-10 col-xl-8 top50">
        <?php $dis_pl = ($villa_form['tx_food_link']!='')?'':'disabled';?>
        	<div class="tx_head">FOOD AND BEVERAGES</div>		
            <div class="tx_head top50">
            A. FIRST DINNER 
            <a  href="<?php echo $villa_form['tx_food_link'];?>" target="_blank" >
                <button type="button" <?php echo $dis_pl;?> class="btn btn-primary"><!--<i class="fa fa-cutlery" aria-hidden="true"></i>--> Menulink</button>	
            </a>
            </div>	
            <div class="col-12 top20">
            Please select from the <strong>villa menu</strong> the dinner dishes which are served family style rather than ala carte from the attached villa menu. That means that you cannot order individual servings, but the cook will prepare enough of each dish to serve your entire party. The recommended maximum number of items served for more than 6 guests are 8 dishes including appetizers and desserts. 
            </div>
            <div class="col-md-12 nopad ">
                <div class="nopad vf_title_sub col-md-12 dinn">
                	<?php
					$din = json_decode($villa_form['dinner'],true);
					$a=0;
					foreach($din as $dinner)
					{
						$a++;
						echo '<div class="row nomarlr- top10">';
							echo '<div class="col-12 ">'.$a.' '.$dinner.' </div>';
							//echo '<div class="col-md-8 nopad">'.$dinner.'</div>';
							
						echo '</div>';
					}
					?>
                	<!--<div class="col-md-12 nopad top10">
                    
                        <div class="col-md-8 nopad"><input class="inp" type="text" name="tx_dinner[]" id="tx_dinner"></div>
                        <div class="col-md-4"></div>
                    </div>-->
                </div>
            </div>
            <?php $a_comp =  json_decode($villa_form['complimentary'],true);?>
            <div class="col-md-12 nopad top15 <?php echo ($a_comp['display']=='on')?'':'hidden';?>">
                <div class="">Complimentary Food & Beverages: <?php echo $a_comp['complimentary'];?></div>
            </div>
            
            
            <?php 
			$breakfast = json_decode($villa_form['breakfast'],true);
			$breakfast_customer = json_decode($form['breakfast'],true); 
			$sprq = base64_decode($breakfast_customer['spacial_request']);
			$ar_bfood = array();
			foreach($breakfast_customer['food'] as $bf)
			{
				//$exp = explode("|",$bf);
				array_push($ar_bfood,$bf['name']);
			}
			//$ar_bfood = $breakfast_customer['food'];
			?>
            
            <div class="col-md-12 nopad top15">
                <div class="tx_head top50">B. FIRST BREAKFAST
                <a href="<?php echo $breakfast['link'];?>" target="_blank" class="<?php echo ($breakfast['link']=='')?'hidden':'';?>"><button type="button" class="btn btn-primary"><!--<i class="fa fa-search" aria-hidden="true"></i>--> Menulink</button></a>
                <a href="<?php echo $breakfast['filename'];?>" target="_blank" class="<?php echo ($breakfast['filename']=='')?'hidden':'';?>"><button type="button" class="btn btn-primary"><i class="fa fa-picture-o" aria-hidden="true"></i> File/Photo</button></a></div>
                <p class="top15 vf_title_sub">
                </p>
            </div>
            
            
            
            <div class="row">
                <div class="col-6">
                	Select from lists
					<?php
                    if(count($breakfast['food'])>0)
                    {
                        $a=0;
                        foreach($breakfast['food'] as $b_food)
                        {
                            if(in_array($b_food,$ar_bfood))
                            {
                                ?>
                                <div class="col-md-12 top20">
                                    <div class="col-md-6 b_food_list">
                                        <input type="checkbox" class="chk_b_food" name="chk_b_food" checked onClick="choose_b_food(this);" value="<?php echo $b_food;?>"> <?php echo $b_food;?> &nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                                <?php
                            }
                            else
                            {
                                ?>
                                <div class="col-md-12 top20">
                                    <div class="col-md-6 b_food_list">
                                        <input type="checkbox" class="chk_b_food" name="chk_b_food"  onClick="choose_b_food(this);" value="<?php echo $b_food;?>"> <?php echo $b_food;?> &nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    }
                    ?>
            
                </div>
                <div class="col-6">
                	Total
                    <div class="box_b_food">
                        <?php 
                        if(count($breakfast_customer['food'])>0)
                        {
                            foreach($breakfast_customer['food'] as $list_b_food)
                            {
                                //echo $list_b_food['name'].$list_b_food['amount'];
                                echo '<div class="row sbbox top10">';
                                    echo '<div class="col t_t2-">';
                                        echo '<input type="hidden" class="chk_b_food '.$list_b_food['name'].'" name="chk_name_b_food" value="'.$list_b_food['name'].'" readonly>';
                                        echo '<input type="number" class="tx_b_food txt_line_2 '.$list_b_food['name'].'" min="0" name="tx_amount_b_food" placeholder="Amount" value="'.$list_b_food['amount'].'" >'.$list_b_food['name'];
										//echo '<span class="f_name">'.$list_b_food['name'].'</span>';
                                    echo '</div>';
									/*echo '<div class="col-2 t_t1- text-left">';
                                        echo $list_b_food['name'];
                                    echo '</div>';*/
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12 nopad top20 rela">
                
                <textarea name="tx_BREAKFAST" id="tx_BREAKFAST" cols="30" rows="5" class="txt_line tx_overlay" placeholder=" " style="width:100%"><?php echo ($sprq!='')?$sprq:'-';?></textarea>
                <label for="tx_BREAKFAST" class="bedcon">Special Request</label>
                <div class="tricorner_2 bluee"></div>
            </div>
            <p>
            <div class="col-md-12 nopad top20">
            	<button type="button" class="btn btn-primary " onClick="save_first_breakfast();" >Save</button>
            	<span class="icon">
                    <i class="fa fa-check cok cok7b_food" aria-hidden="true"></i> <span class="tok tok7b_food"></span>
                    <i class="fa fa-check cno cno7b_food" aria-hidden="true"></i> <span class="tno tno7b_food"></span>
                </span>
            </div>
            
            
            <?php $f7c = json_decode($villa_form['provisioning'],true);
			$f7c_vfm = json_decode($form['provisioning'],true); ?>
    		<form id="v_form_7c">
    		<input type="hidden" name="txtID" value="<?php echo $form_id;?>">
            <div class="col-md-12 nopad top15">
                <div class="tx_head top50">C. INITIAL PROVISIONING</div>
            </div>
            <div class="col-12 top20">Please select from the <strong>provisional list</strong> attached the ingredients and groceries pre-stocked for your arrival.</div>
            
            <div class="row">
            	<div class="col-12"> 
                    <div class="tx_head top50">Provisioning 
                        <button type="button" class="btn btn-primary" onClick="select_item('<?php echo $form_id;?>');"><!--<i class="fa fa-shopping-cart" aria-hidden="true"></i> Select items-->Menulink</button>
                    </div>
                    <div class="col-12 top20"> <?php echo ($f7c['wine']=='')?'Please select and attach back the provisional list with your requirements.':$f7c['provisioning'];?> &nbsp;</div>
                </div>
                
                <div class="w-100 top50"></div>
                
                <?php $show_wll = ($f7c['wine_list_link']!='')?'block':'none';?>
                <div class="col-6">
                	<div class="row">
                    	<div class="col-12 col-lg-4">
                        Wine List 
                        <a href="<?php echo $f7c['wine_list_link'];?>" target="_blank" style="display:<?php echo $show_wll;?>">
                            <button type="button" class="btn btn-primary " ><i class="fa fa-glass" aria-hidden="true"></i> View Lists</button>
                        </a>
                        </div>
                        <div class="col-12 col-lg-6">
							 <?php 
								foreach($f7c['wine_list'] as $wine)
								{
									$wl = $dbc->GetRecord("wine_list","*","id = '".$wine."'");	
									if(in_array($wl['id'],$f7c_vfm['wine_list']))
									{
										?>
									<div class="checkbox">
										<label>
											<input type="checkbox" checked name="chk_wine[]" value="<?php echo $wl['id'];?>"> &nbsp;<?php echo $wl['name'];?>
										</label>
									</div>
									<?php
									}
									else
									{
										?>
									<div class="checkbox">
										<label>
											<input type="checkbox" name="chk_wine[]" value="<?php echo $wl['id'];?>"> &nbsp;<?php echo $wl['name'];?>
										</label>
									</div>
									<?php
									}
								}
							?>
                        </div>
                    </div> 
                    
                    
                   
                </div>
                <div class="col-6"></div>
                
                <div class="col-12 top50 ">
                	 <div class="col-md-12 nopad rela">
                    	
                    	<textarea name="tx_c_conf" id="tx_c_conf" cols="30" class="txt_line tx_overlay" placeholder=" " rows="5" style="width:100%;"><?php echo $f7c_vfm['complimentary'];?></textarea>
                        <label for="tx_c_conf" class="bedcon">Complimentary Food & Beverages</label>
                        <div class="tricorner_2 bluee"></div>
                    </div>
                    <div class="col-md-12 nopad top30 rela">
                    	
                    	<textarea name="tx_c_Special" id="tx_c_Special" cols="30"  class="txt_line tx_overlay"  placeholder=" " rows="5" style="width:100%;"><?php echo $f7c_vfm['special'];?></textarea>
                        <label for="tx_c_Special" class="bedcon">Special Request</label>
                        <div class="tricorner_2 bluee"></div>
                    </div>
                </div>
                
                <p>
                <button type="button" class="btn btn-primary " onClick="save_wine_list();" >Save</button>
                <span class="icon">
                    <i class="fa fa-check cok cok7c" aria-hidden="true"></i> <span class="tok tok7c"></span>
                    <i class="fa fa-check cno cno7c" aria-hidden="true"></i> <span class="tno tno7c"></span>
                </span>
                </p>
                <div class="col-md-12">File Wine List : <a href="<?php echo ($f7c['file_path']!='')?$f7c['file_path']:'#';?>" target="_blank"> <?php echo ($f7c['filename']!='')?$f7c['filename']:'';?></a></div>
            </div>
            </form>
            
            
            <form id="v_form_7d">
            <input type="hidden" name="txtID" value="<?php echo $form_id;?>">
                <div class=" top15">
                    
                    <div class="col-md-12 nopad top15">
                        <div class="tx_head top50">D. SPECIAL DIETARY</div>
                        <p class="top15 ">Please advise of any special dietary requirements i.e. vegetarian, vegan, food allergies, low sodium, etc.</p>
                    </div>
                <?php $d_dietary = base64_decode($form['dietary']);?>
                    
                    
                    <div class="col-md-12 nopad rela">
                    <textarea name="tx_special" id="tx_special" cols="30" rows="5" class="txt_line tx_overlay" placeholder=" " style="width:100%" ><?php echo ($d_dietary!='')?$d_dietary:'';?></textarea>
                    <label for="tx_special" class="bedcon">SPECIAL DIETARY</label>
                    <div class="tricorner_2 bluee"></div>
                    </div>
                    
                    <p>
                        <button type="button" class="btn btn-primary " onClick="save_cus_special();"> Save</button>	
                        <span class="icon">
                            <i class="fa fa-check cok cok7d" aria-hidden="true"></i> <span class="tok tok7d"></span>
                            <i class="fa fa-check cno cno7d" aria-hidden="true"></i> <span class="tno tno7d"></span>
                        </span>
                    </p>
                    
                </div>
            </form>
        
        </div>
        
        
        <div class="col-12 w-100"></div>
        
        <div class=" bg_payment rela"><div class="ovl"></div>
        	<div class="tx_ap2">payment on arrival</div>
        </div>
        
        
        <?php $deposit =  json_decode($villa_form['deposit'],true);?>
        <div class="col-11 col-md-10 col-xl-8 top50 ">
            <form id="v_form_8">
            <input type="hidden" name="txtID" value="<?php echo $form_id;?>">
                <div class="tx_head ">PAYMENT ON ARRIVAL</div>
                <p class="top15">Any expense made at the villa is only payable in cash</p>
                
                <div class="tx_head top50">A. SECURITY DEPOSIT</div>
                <p class="top15">The refundable security deposit <?php echo ($deposit['deposit']!='')?$deposit['deposit']:'-';?> in any major currency will be collected cash upon arrival or credit card authorization.<br>
                Damage security deposit <?php echo $deposit['damage_deposit'];?></p>
                
                <div class="tx_head top50">B. PAYMENT ON ARRIVAL</div>
                <p class="top15"><?php echo ($villa_form['payment_on_arrival']!='')?$villa_form['payment_on_arrival']:'-';?></p>
                
                <div class="tx_head top50">C. REIMBURSEMENT</div>
                <p class="top15">At your arrival, you may be required to make cash payment to the villa manager or the concierge to cover the cost of items purchased in advance and for your anticipated requirements, such as meal orders, pre-stocking items & additional airport transfers.</p>
            
            </form>
        </div>
        
        
         <div class="col-12 w-100"></div>
        
        <div class=" bg_conceirge rela"><div class="ovl"></div>
        	<div class="tx_ap2">conceirge services</div>
        </div>
        
        <div class="col-11 col-md-10 col-xl-8 top50 ">
        <?php $f9 = json_decode($villa_form['service'],true);?>
        	<form id="v_form_9">
    		<input type="hidden" name="txtID" value="<?php echo $form_id;?>">
        	<div class="tx_head ">CONCEIRGE SERVICES</div>
            <p class="top15">Any expense made at the villa is only payable in cash</p>
        	
            <div class="row justify-content-center">
                <div class="col-10 t_t1-">
                    <dl class="row">
                      <dt class="col-sm-3">Excursion & Tours</dt>
                      <dd class="col-sm-9"><?php echo ($f9['Tours']=='')?'Yacht, speedboat, snorkeling, diving, Phuket island, Golf, cooking classes, others…':$f9['Tours'];?></dd>
                      
                      <dt class="col-sm-3">Yacht Charters</dt>
                      <dd class="col-sm-9"><?php echo ($f9['Yacht']=='')?'Yacht, speedboat, snorkeling, diving, Phuket island, Golf, cooking classes, others…':$f9['Yacht'];?></dd>
                      
                      <dt class="col-sm-3">Restaurant Reservation</dt>
                      <dd class="col-sm-9"><?php echo $f9['Restaurant'];?></dd>
                      
                      <dt class="col-sm-3">Massage & Spa</dt>
                      <dd class="col-sm-9"><?php echo $f9['Massage'];?></dd>
                      
                      <dt class="col-sm-3">Special Occasion</dt>
                      <dd class="col-sm-9"><?php echo ($f9['Occasion']=='')?'Birthday, Anniversary, Wedding, Proposal, Honeymoon, others…':$f9['Occasion'];?></dd>
                      
                      <dt class="col-sm-3">Other Arrangements</dt>
                      <dd class="col-sm-9"><?php echo($f9['Arrangements']=='')?'Baby equipment required, extra bed, ':$f9['Arrangements'];?></dd>
                      
                      <dt class="col-sm-3">Dietary</dt>
                      <dd class="col-sm-9"><?php echo ($f9['Dietary']=='')?'Vegan, vegetarian, gluten free, kosher, Muslim, allergies:':$f9['Dietary'];?></dd>
                      
                    </dl>
                </div>
            </div>
            
            <?php $f9_cus = json_decode($form['service'],true);?>
            <div class="col-md-12 top30 nopad rela">
            <!--Comment <?php echo ($f9['Comment']!='')?$f9['Comment']:'-';?>-->
            <textarea name="tx_Comment" id="tx_Comment" cols="30" rows="5" class="txt_line tx_overlay" style="width:100%" placeholder=" " ><?php echo $f9_cus['Comment'];?></textarea>
            <label for="tx_Comment" class="bedcon">Comment</label>
            <div class="tricorner_2 bluee"></div>
            </div>
            
            <p><button type="button" class="btn btn-primary " onClick="save_service();"> Save</button>	
                <span class="icon">
                    <i class="fa fa-check cok cok9" aria-hidden="true"></i> <span class="tok tok9"></span>
                    <i class="fa fa-check cno cno9" aria-hidden="true"></i> <span class="tno tno9"></span>
                </span>
            </p>
        
            </form>
        </div>
        
        <div class="col-11 col-md-10 col-xl-8 top50  text-center">
        	<div class="tx_big">GRATUITIES</div>
            
            <div class="col-md-12 nopad top100"><br>
                <p class="top15">Gratuities are not mandatory but a customary gesture to award the staff for their kind hospitality and flexibility. The method of payment is cash for tips on-site.
                I look forward to receiving the above information and welcoming you to Talay Naiharn Villa. Please do not hesitate to contact us if you have questions or requests.</p>
            </div>
            
            <div class="col-md-12 nopad top100">
                <p class="top15">Kind regards,</p>
                <p class="top15"><strong>Your Inspiring Villas Team!</strong></p>
            </div>
        </div>
        
        
        <div class="col-11 col-md-10 col-xl-8 top100  text-center">
        	<div class="tx_big_2">or you interesting</div>
            
            <div class="row top100">
            	<div class="col-12 col-lg-4 rela">
                	<img src="../../upload/new_design/villa_form/ils.jpg" class="bg_oyi" alt="">
                    <img src="../../upload/new_design/villa_form/ils.png" class="logo_oyi" alt="">
                    <a href="https://inspiringlivingsolutions.com/" class="a_but">join us</a>
                </div>
                <div class="col-12 col-lg-4 rela">
                	<img src="../../upload/new_design/villa_form/iy.jpg" class="bg_oyi" alt="">
                    <img src="../../upload/new_design/villa_form/iy.png" class="logo_oyi" alt="">
                    <a href="http://inspiringyachting.com/" class="a_but">join us</a>
                </div>
                <div class="col-12 col-lg-4 rela">
                	<img src="../../upload/new_design/villa_form/ie.jpg" class="bg_oyi" alt="">
                    <img src="../../upload/new_design/villa_form/ie.png" class="logo_oyi" alt="">
                    <a href="http://inspiring-experiences.com/" class="a_but">join us</a>
                </div>
            </div>
        </div>
        
    	
    </div>
</div>

<div class="container-fluid footer_vf">
	<div class="row">
        <div class="col-12 col-lg-4"><img src="../../upload/new_design/villa_form/logofooter.png" class="log_foot" alt=""></div>
        <div class="col-12 col-lg-8 align-self-end">
            <ul class="minii">
                <li><img src="../../upload/new_design/villa_form/map.png" class="mini_icons" alt=""></li>
                <li><img src="../../upload/new_design/villa_form/phone.png" class="mini_icons" alt=""></li>
                <li><img src="../../upload/new_design/villa_form/whatsapp.png" class="mini_icons" alt=""></li>
                <li><img src="../../upload/new_design/villa_form/internet.png" class="mini_icons" alt=""></li>
                <li><img src="../../upload/new_design/villa_form/mail.png" class="mini_icons" alt=""></li>
                <li><img src="../../upload/new_design/villa_form/facebook.png" class="mini_icons" alt=""></li>
                <li><img src="../../upload/new_design/villa_form/ig.png" class="mini_icons" alt=""></li>
                <li><img src="../../upload/new_design/villa_form/tw.png" class="mini_icons" alt=""></li>
                <li><img src="../../upload/new_design/villa_form/skype.png" class="mini_icons" alt=""></li>
            </ul>
            <div class="ftext">Thailand +66 (0)76 626 762</div>
            <ul class="tx_phone ">
                <li>Thailand +66 (0)76 626 762</li>
                <li>Samui +66 83 655 6452</li>
                <li>Hong Kong +852 6765</li>
            </ul>
        </div>
    </div>
</div>


<!-- new -->

 <script>
    function save_dear()
	{
		if($("#tx_dear").val()=='')
		{
			alert_text("#tx_dear");
		}
		else
		{
			$.ajax({
				url:"libs/action_form/save_dear.php",
				type:"POST",
				dataType:"json",
				data:$("#v_form_1").serialize(),
				success: function(res){
					if(res.status==true)
					{
						$(".cok1").fadeIn(300);
						$(".cno1,.tno1").hide();
					}
					else
					{
						$(".cno1,.tno1").fadeIn(300);
						$(".tno1").html(res.msg);
						$(".cok1").hide();
					}
				}
			});
		}
	}
    </script>  

<script>
	function add_arrival_4()
	{
		var vnext = parseInt($(".txarv").val())+1;
		$(".txarv").val(vnext);
		var s='';
				s+= '<div class="alert alert-success col-md-12 arrival row" role="alert">';
                
                    s+= '<h2><span class="tb">+</span><button type="button" class="btn btn-danger " onClick="$(this).parent().parent().remove();"><i class="fa fa-trash" aria-hidden="true"></i></button> Transfers Arrival <span class="badge badge-info">'+vnext+'</span></h2>';
                    s+= '<div class="col-md-4">';
                        s+= '<div class="form-group rela">';
                            s+= '<label for="Sign Name">Sign Name</label>';
                            s+= '<input type="text" class="form-control li_blu" id="tx_sname_a" name="tx_sname_a">';
							s+= '<div class="tricorner_mini bluee"></div>';
                        s+= '</div>';
                    s+=  '</div>';
                    s+=  '<div class="col-md-2">';
                        s+=  '<div class="form-group rela">';
                            s+=  '<label for="Sign Name">Date</label>';
                            s+= '<input type="date" class="form-control li_blu" id="tx_date_a" name="tx_date_a">';
							s+= '<div class="tricorner_mini bluee"></div>';
                        s+= '</div>';
                    s+= '</div>';
                    s+= '<div class="col-md-4">';
                        s+= '<div class="form-group rela">';
                            s+= '<label for="Sign Name">Airport/Hotel</label>';
                            s+= '<input type="text" class="form-control li_blu" id="tx_airline_a" name="tx_airline_a">';
							s+= '<div class="tricorner_mini bluee"></div>';
                        s+= '</div>';
                    s+= '</div>';
                    s+= '<div class="col-md-2">';
                        s+= '<div class="form-group rela">';
                            s+= '<label for="Sign Name">Flight number</label>';
                            s+= '<input type="text" class="form-control li_blu" id="tx_flight_a" name="tx_flight_a">';
							s+= '<div class="tricorner_mini bluee"></div>';
                        s+= '</div>';
                    s+= '</div>';
                    s+= '<div class="col-md-2">';
                        s+= '<div class="form-group rela">';
                            s+= '<label for="Sign Name">Time</label>';
                            s+= '<input type="text" class="form-control li_blu" id="tx_time_a" name="tx_time_a">';
							s+= '<div class="tricorner_mini bluee"></div>';
                        s+= '</div>';
                    s+= '</div>';
                    s+= '<div class="col-md-4">';
                        s+= '<div class="form-group rela">';
                            s+= '<label for="Sign Name">No. of Adults/Kids (Kids age)</label>';
                           s+= '<input type="text" class="form-control li_blu" id="tx_pass_a" name="tx_pass_a">';
						   s+= '<div class="tricorner_mini bluee"></div>';
                        s+= '</div>';
                    s+= '</div>';
                    s+= '<div class="col-md-4">';
                        s+= '<div class="form-group rela">';
                            s+= '<label for="Sign Name">Transfer Arrangement Yes or No</label>';
                            s+= '<input type="text" class="form-control li_blu" id="tx_transfer_a" name="tx_transfer_a">';
							s+= '<div class="tricorner_mini bluee"></div>';
                        s+= '</div>';
                    s+= '</div>';
                    s+= '<div class="col-md-3">';
                        s+= '<div class="form-group rela">';
                            s+= '<label for="Sign Name">Contact number</label>';// and Special Request 
                            s+= '<input type="text" class="form-control li_blu inp" id="tx_transfer_a" name="tx_transfer_a">';
							s+= '<div class="tricorner_mini bluee"></div>';
                        s+= '</div>';
                    s+= '</div>';
					s+= '<div class="col-md-3">';
                        s+= '<div class="form-group rela">';
                            s+= '<label for="Sign Name">No.of Luggages</label>';
                            s+= '<input type="text" class="form-control li_blu inp" id="tx_luggages_a" name="tx_luggages_a">';
							s+= '<div class="tricorner_mini bluee"></div>';
                        s+= '</div>';
                    s+= '</div>';
					s+= '<div class="col-md-6">';
						s+= '<div class="form-group rela">';
							s+= '<label for="Sign Name">Special Request</label>';
							s+= '<input type="text" class="form-control li_blu" id="tx_Special_Request_a" name="tx_Special_Request_a">';
							s+= '<div class="tricorner_mini bluee"></div>';
						s+= '</div>';
					s+= '</div>';
                    s+= '<div class="tricorner bluee"></div>';
                s+= '</div>';
		$(".r_arrival").append(s);
	}
	
	function add_dpt_4()
	{
		var vnext = parseInt($(".txdpt").val())+1;
		$(".txdpt").val(vnext);
		var s='';
				s+= '<div class="alert alert-warning col-md-12 departure row" role="alert">';
                
                    s+= '<h2><span class="tb">+</span><button type="button" class="btn btn-danger " onClick="$(this).parent().parent().remove();"><i class="fa fa-trash" aria-hidden="true"></i></button> Transfers Departure <span class="badge badge-info">'+vnext+'</span></h2>';
                    s+= '<div class="col-md-4">';
                        s+= '<div class="form-group rela">';
                            s+= '<label for="Sign Name">Sign Name</label>';
                            s+= '<input type="text" class="form-control li_ora" id="tx_sname_d" name="tx_sname_d">';
							s+= '<div class="tricorner_mini orangee"></div>';
                        s+= '</div>';
                    s+=  '</div>';
                    s+=  '<div class="col-md-2">';
                        s+=  '<div class="form-group rela">';
                            s+=  '<label for="Sign Name">Date</label>';
                            s+= '<input type="date" class="form-control li_ora" id="tx_date_d" name="tx_date_d">';
							s+= '<div class="tricorner_mini orangee"></div>';
                        s+= '</div>';
                    s+= '</div>';
                    s+= '<div class="col-md-4">';
                        s+= '<div class="form-group rela">';
                            s+= '<label for="Sign Name">Airport/Hotel</label>';
                            s+= '<input type="text" class="form-control li_ora" id="tx_airline_d" name="tx_airline_d">';
							s+= '<div class="tricorner_mini orangee"></div>';
                        s+= '</div>';
                    s+= '</div>';
                    s+= '<div class="col-md-2">';
                        s+= '<div class="form-group rela">';
                            s+= '<label for="Sign Name">Flight number</label>';
                            s+= '<input type="text" class="form-control li_ora" id="tx_flight_d" name="tx_flight_d">';
							s+= '<div class="tricorner_mini orangee"></div>';
                        s+= '</div>';
                    s+= '</div>';
                    s+= '<div class="col-md-2">';
                        s+= '<div class="form-group rela">';
                            s+= '<label for="Sign Name">Time</label>';
                            s+= '<input type="text" class="form-control li_ora" id="tx_time_d" name="tx_time_d">';
							s+= '<div class="tricorner_mini orangee"></div>';
                        s+= '</div>';
                    s+= '</div>';
                    s+= '<div class="col-md-4">';
                        s+= '<div class="form-group rela">';
                            s+= '<label for="Sign Name">No. of Adults/Kids (Kids age)</label>';
                           s+= '<input type="text" class="form-control li_ora" id="tx_pass_d" name="tx_pass_d">';
						   s+= '<div class="tricorner_mini orangee"></div>';
                        s+= '</div>';
                    s+= '</div>';
                    s+= '<div class="col-md-4">';
                        s+= '<div class="form-group rela">';
                            s+= '<label for="Sign Name">Transfer Arrangement Yes or No</label>';
                            s+= '<input type="text" class="form-control li_ora" id="tx_transfer_d" name="tx_transfer_d">';
							s+= '<div class="tricorner_mini orangee"></div>';
                        s+= '</div>';
                    s+= '</div>';
					
					s+= '<div class="col-md-3">';
                        s+= '<div class="form-group rela">';
                            s+= '<label for="Sign Name">Contact Number</label>';
                            s+= '<input type="text" class="form-control li_ora" id="tx_Contact_Number_d" name="tx_Contact_Number_d">';
							s+= '<div class="tricorner_mini orangee"></div>';
                        s+= '</div>';
                    s+= '</div>';
					s+= '<div class="col-md-3">';
						s+= '<div class="form-group rela">';
							s+= '<label for="Sign Name">No.of Luggages </label>';
							s+= '<input type="text" class="form-control li_ora " id="tx_luggages_d" name="tx_luggages_d">';
							s+= '<div class="tricorner_mini orangee"></div>';
						s+= '</div>';
					s+= '</div>';
					s+= '<div class="col-md-6">';
                        s+= '<div class="form-group rela">';
                            s+= '<label for="Sign Name">Special Request</label>';
                            s+= '<input type="text" class="form-control li_ora" id="tx_Special_Request_d" name="tx_Special_Request_d">';
							s+= '<div class="tricorner_mini orangee"></div>';
                        s+= '</div>';
                    s+= '</div>';
					
                    /*s+= '<div class="col-md-4">';
                        s+= '<div class="form-group rela">';
                            s+= '<label for="Sign Name">Contact number and Special Request </label>';
                            s+= '<input type="text" class="form-control inp" id="tx_transfer_d" name="tx_transfer_d">';
                        s+= '</div>';
                    s+= '</div>';*/
                    s+= '<div class="tricorner orangee"></div>';
                s+= '</div>';
		$(".r_departure").append(s);
	}
	
	function save_special_request()
	{
		var data = {
			txtID : $("#txtID").val(),
			tx_spcrq : $("#tx_spcrq").val(),
		};
					
		$.ajax({
			url:"libs/action_form/save_special_request.php",
			type:"POST",
			dataType:"json",
			data:data,
			success: function(res){
				if(res.status==true)
				{
					$(".cok4_1").fadeIn(300);
					$(".cno4_1,.tno4_1").hide();
				}
				else
				{
					$(".cno4_1,.tno4_1").fadeIn(300);
					$(".tno4_1").html(res.msg);
					$(".cok4_1").hide();
				}
			}
		});
	}
	
	function save_airport()
	{
		var data = {
			txtID : $("#txtID").val(),
			arrival : [],
			departure : []
		};
		
		$(".r_arrival ").children('.arrival').each(function(index, element) {
			data.arrival.push({
					tx_sname_a : $(this).find("input[name=tx_sname_a]").val(),
					tx_date_a : $(this).find("input[name=tx_date_a]").val(),
					tx_airline_a : $(this).find("input[name=tx_airline_a]").val(),
					tx_flight_a : $(this).find("input[name=tx_flight_a]").val(),
					tx_time_a : $(this).find("input[name=tx_time_a]").val(),
					tx_pass_a : $(this).find("input[name=tx_pass_a]").val(),
					tx_transfer_a : $(this).find("input[name=tx_transfer_a]").val(),
					tx_Contact_a : $(this).find("input[name=tx_Contact_a]").val(),
					tx_luggages_a : $(this).find("input[name=tx_luggages_a]").val(),
					tx_Special_Request_a : $(this).find("input[name=tx_Special_Request_a]").val(),
				});
		});
		
		$(".r_departure").children('.departure').each(function(index, element) {
			data.departure.push({
					tx_sname_d : $(this).find("input[name=tx_sname_d]").val(),
					tx_date_d : $(this).find("input[name=tx_date_d]").val(),
					tx_airline_d : $(this).find("input[name=tx_airline_d]").val(),
					tx_flight_d : $(this).find("input[name=tx_flight_d]").val(),
					tx_time_d : $(this).find("input[name=tx_time_d]").val(),
					tx_pass_d : $(this).find("input[name=tx_pass_d]").val(),
					tx_transfer_d : $(this).find("input[name=tx_transfer_d]").val(),
					tx_Contact_Number_d : $(this).find("input[name=tx_Contact_Number_d]").val(),
					tx_Special_Request_d : $(this).find("input[name=tx_Special_Request_d]").val(),
					tx_luggages_d : $(this).find("input[name=tx_luggages_d]").val(),
				});
		});
					
		$.ajax({
			url:"libs/action_form/save_airport.php",
			type:"POST",
			dataType:"json",
			data:data,
			success: function(res){
				if(res.status==true)
				{
					$(".cok4").fadeIn(300);
					$(".cno4,.tno4").hide();
				}
				else
				{
					$(".cno4,.tno4").fadeIn(300);
					$(".tno4").html(res.msg);
					$(".cok4").hide();
				}
			}
		});
	}
	
    function add_table_4()
	{
		var s='';
			s+= '<tr>';
			  s+= '<td  style="width: 140px;"><div class="col-md-12 nopad">Arrival</div><div class="col-md-12 nopad top20">Departure</div></td>';
			  s+= '<td ><div class="col-md-12 nopad"><input class="inp" type="date" name="tx_date_a" id="tx_date_a"></div><div class="col-md-12 nopad top10"><input class="inp" type="date" name="tx_date_d" id="tx_date_d"></div></td>';
			  s+= '<td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_airline_a" id="tx_airline_a"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_airline_d" id="tx_airline_d"></div></td>';
			  s+= '<td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_flight_a" id="tx_flight_a"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_flight_d" id="tx_flight_d"></div></td>';
			  s+= '<td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_time_a" id="tx_time_a"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_time_d" id="tx_time_d"></div></td>';
			  s+= '<td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_pass_a" id="tx_pass_a"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_pass_d" id="tx_pass_d"></div></td>';
			  s+= '<td ><div class="col-md-12 nopad"><input class="inp" type="text" name="tx_transfer_a" id="tx_transfer_a"></div><div class="col-md-12 nopad top10"><input class="inp" type="text" name="tx_transfer_d" id="tx_transfer_d"></div></td>';
			  s+= '<td  valign="middle"><button type="button" class="btn btn-danger top20" onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button></td>';
			s+= '</tr>';
		$("#tb_4").children('tbody').append(s);
	}
    </script>

<script>
    function save_phone()
	{
		if($("#tx_phone").val()=='')
		{
			alert_text("#tx_phone");
		}
		else
		{
			$.ajax({
				url:"libs/action_form/save_phone.php",
				type:"POST",
				dataType:"json",
				data:$("#v_form_5").serialize(),
				success: function(res){
					if(res.status==true)
					{
						$(".cok5").fadeIn(300);
						$(".cno5,.tno5").hide();
					}
					else
					{
						$(".cno5,.tno5").fadeIn(300);
						$(".tno5").html(res.msg);
						$(".cok5").hide();
					}
				}
			});
		}
	}
    </script>
<script>
function save_tx_bconf()
{
	var data = {
		txtID : $("#txtID").val(),
		tx_bconf : $("#tx_bconf").val(),
	};
				
	$.ajax({
		url:"libs/action_form/save_bed_configuration.php",
		type:"POST",
		dataType:"json",
		data:data,
		success: function(res){
			if(res.status==true)
			{
				$(".cok6_1").fadeIn(300);
				$(".cno6_1,.tno6_1").hide();
			}
			else
			{
				$(".cno6_1,.tno6_1").fadeIn(300);
				$(".tno6_1").html(res.msg);
				$(".cok6_1").hide();
			}
		}
	});
}

function save_guest()
{
	var data = {
		txtID : $("#txtID").val(),
		val : []
	};
	
	$("#tb_guest tbody tr").each(function(index, element) {
		data.val.push({
				tx_first : $(this).find("input[name=tx_first]").val(),
				tx_passport : $(this).find("input[name=tx_passport]").val(),
				tx_city : $(this).find("input[name=tx_city]").val(),
				tx_date : $(this).find("input[name=tx_date]").val(),
				tx_nationality : $(this).find("input[name=tx_nationality]").val(),
				tx_room : $(this).find("input[name=tx_room]").val(),
			});
	});
				
	$.ajax({
		url:"libs/action_form/save_guest.php",
		type:"POST",
		dataType:"json",
		data:data,
		success: function(res){
			if(res.status==true)
			{
				$(".cok6").fadeIn(300);
				$(".cno6,.tno6").hide();
			}
			else
			{
				$(".cno6,.tno6").fadeIn(300);
				$(".tno6").html(res.msg);
				$(".cok6").hide();
			}
		}
	});
}

function add_guest()
{
	var no = parseInt($(".inp1").val());
	var next = no+1;
	var z = '';
		z+= '<tr>';
		  z+= '<td>'+next+'</td>';
		  z+= '<td><input class="inp txt_line_2" type="text" name="tx_first" id="tx_first"></td>';
		  z+= '<td><input class="inp txt_line_2" type="text" name="tx_passport" id="tx_passport"></td>';
		  z+= '<td><input class="inp txt_line_2" type="text" name="tx_city" id="tx_city"></td>';
		  z+= '<td><input class="inp txt_line_2" type="date" name="tx_date" id="tx_date"></td>';
		  z+= '<td><input class="inp txt_line_2" type="text" name="tx_nationality" id="tx_nationality"></td>';
		  z+= '<td><input class="inp txt_line_2" type="text" name="tx_room" id="tx_room"></td>';
		  z+= '<td><button type="button" class="btn btn-danger " onClick="delme(this)"><i class="fa fa-trash" aria-hidden="true"></i></button></td>';
		z+= '</tr>';
		
	$("#tb_guest").children("tbody").append(z);	
	$(".inp1").val(next);
}
function delme(me)
{
	var no = parseInt($(".inp1").val());
	var next = no-1;
	$(me).parent().parent().remove();
	$(".inp1").val(next);
}
</script>

<script>
	function save_first_breakfast()
	{
		var sele = 0;
		var datas = {
			txtID : $("#tx_b_food_id").val(),
			tx_BREAKFAST : $("#tx_BREAKFAST").val(),
			b_food : []
		};
		
		$(".box_b_food .sbbox").each(function(index, element) {
			if($(this).find("input[name=tx_amount_b_food]").val()!='')
			{
				sele = 1;
				datas.b_food.push({
					name : $(this).find("input[name=chk_name_b_food]").val(),
					amount : $(this).find("input[name=tx_amount_b_food]").val(),
				});
			}
			else
			{
				alert("Please fill your Amount!");
				return false;
			}
        });
		
		//console.log(datas);
		/*if(sele==0)
		{
			alert("Please fill your data!");
		}
		else
		{*/
			$.ajax({
				url:"libs/action_form/save_breakfast_food_customer.php",
				type:"POST",
				dataType:"json",
				data:datas,
				success: function(res){
					if(res.status==true)
					{
						$(".cok7b_food").fadeIn(300);
						$(".cno7b_food,.tno7b_food").hide();
					}
					else
					{
						$(".cno7b_food,.tno7b_food").fadeIn(300);
						$(".tno7b_food").html(res.msg);
						$(".cok7b_food").hide();
					}
				}
			});
		/*}*/
		
	}
	
    function choose_b_food(me)
	{
		var z = '';
		if($(me).is(':checked'))
		{								
			z += '<div class="row sbbox top10">';
				/*z += '<div class="col-md-4 text-right">';
					z += $(me).val();
				z += '</div>';*/
				z += '<div class="col">';
					z += '<input type="hidden" class="chk_b_food '+$(me).val()+'" name="chk_name_b_food" value="'+$(me).val()+'" readonly>';
					z += '<input type="number" class="tx_b_food txt_line_2 '+$(me).val()+'" name="tx_amount_b_food"  min="0" placeholder="Amount" value="1">'+$(me).val();
				z += '</div>';
			z += '</div>';
		}
		else
		{
			var posi = $(me).val();
			$('.'+posi).parent().parent().remove();
			//$(me).parent().find('.tx_b_food').val('');
		}
		$(".box_b_food").append(z);
	}
    </script>


<script>
	function save_wine_list()
	{
		$.ajax({
			url:"libs/action_form/save_wine_list.php",
			type:"POST",
			dataType:"json",
			data:$("#v_form_7c").serialize(),
			success: function(res){
				if(res.status==true)
				{
					$(".cok7c").fadeIn(300);
					$(".cno7c,.tno7c").hide();
				}
				else
				{
					$(".cno7c,.tno7c").fadeIn(300);
					$(".tno7c").html(res.msg);
					$(".cok7c").hide();
				}
			}
		});
	}
	
    function select_item(fid)
	{
		window.open('/product-lists-'+fid+'-<?php echo str_replace(" ","",$vil_name[0]);?>-<?php echo str_replace(" ","",$form['cus_name']);?>.html','_blank');
	}
    </script>

<script>
    function save_cus_special()
	{
		$.ajax({
			url:"libs/action_form/save_special_cus.php",
			type:"POST",
			dataType:"json",
			data:$("#v_form_7d").serialize(),
			success: function(res){
				if(res.status==true)
				{
					$(".cok7d").fadeIn(300);
					$(".cno7d,.tno7d").hide();
				}
				else
				{
					$(".cno7d,.tno7d").fadeIn(300);
					$(".tno7d").html(res.msg);
					$(".cok7d").hide();
				}
			}
		});
	}
    </script>

<script>
    function save_deposit()
	{
		if($("#tx_deposit").val()=='')
		{
			alert_text("#tx_deposit");
		}
		else
		{
			$.ajax({
				url:"libs/action_form/save_deposit.php",
				type:"POST",
				dataType:"json",
				data:$("#v_form_8").serialize(),
				success: function(res){
					if(res.status==true)
					{
						$(".cok8").fadeIn(300);
						$(".cno8,.tno8").hide();
					}
					else
					{
						$(".cno8,.tno8").fadeIn(300);
						$(".tno8").html(res.msg);
						$(".cok8").hide();
					}
				}
			});
		}
	}
    </script>







<script>
    function save_service()
	{
		/*if($("#tx_Comment").val()=='')
		{
			alert_text("#tx_Comment");
		}*/
		/*else if($("#tx_Restaurant").val()=='')
		{
			alert_text("#tx_Restaurant");
		}
		else if($("#tx_Massage").val()=='')
		{
			alert_text("#tx_Massage");
		}*-/
		else if($("#tx_Occasion").val()=='')
		{
			alert_text("#tx_Occasion");
		}
		else if($("#tx_Arrangements").val()=='')
		{
			alert_text("#tx_Arrangements");
		}
		else if($("#tx_Dietary").val()=='')
		{
			alert_text("#tx_Dietary");
		}*/
		/*else
		{*/
			$.ajax({
				url:"libs/action_form/save_service_cus.php",
				type:"POST",
				dataType:"json",
				data:$("#v_form_9").serialize(),
				success: function(res){
					if(res.status==true)
					{
						$(".cok9").fadeIn(300);
						$(".cno9,.tno9").hide();
					}
					else
					{
						$(".cno9,.tno9").fadeIn(300);
						$(".tno9").html(res.msg);
						$(".cok9").hide();
					}
				}
			});
		/*}*/
	}
    </script>

<style>
#tb_guest > tbody > tr > td
{
	padding-left:5px;
	padding-right:5px;
	border-left:10px solid white;
}
</style>