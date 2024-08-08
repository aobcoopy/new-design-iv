<meta name="robots" content="noindex">
<?php
$id = $_REQUEST['id'];//base64_decode($_REQUEST['id']);//echo $id;
$dear_show = 0;
$bg = '#E5E5E5';
//echo '<br><br><br><br><br><br><br><br><br>'.$id;
$visib = '';
if($dbc->HasRecord("villa_form_mapping","links = '".$id."'"))
{
	$form = $dbc->GetRecord("villa_form_mapping","*","links = '".$id."'");
	$form_id = $form['id'];
	$form_mapping_id = $form['id'];
	$villa_form_mapping = $form;
	
	$villa_form = $dbc->GetRecord("villa_form","*","id = '".$form['villaform_id']."'");
		
	$data = $dbc->GetRecord("properties","*","id='".$villa_form['property']."'");
	$vil_name = explode("|",$data['name']);
	
	$sql_status = $dbc->Query("select * from villa_form_status where vfm = '".$form_mapping_id."'");
	$airport ='';
	$guest = '';
	$food = '';
	$payment = '';
	$conceirge = '';
	while($row = $dbc->Fetch($sql_status))
	{
		if($row['sections']=='airport')
		{
			$airport = $row['sections'];
		}
		elseif($row['sections']=='guest')
		{
			$guest = $row['sections'];
		}
		elseif($row['sections']=='food')
		{
			$food = $row['sections'];
		}
		elseif($row['sections']=='payment')
		{
			$payment = $row['sections'];
		}
		elseif($row['sections']=='conceirge')
		{
			$conceirge = $row['sections'];
		}
		//echo $row['sections'].'<br>';
	}
	
	
}
else
{
	$villa_form = '';
	$data = '';
	$vil_name = '';
	$form = '';
	$form_id = '';
	fourTen();
	$visib = 'd-none';
}
		


if(isset($_SESSION['auth']['user_id']))
{
	$bg = '#fff';//'#fff4e4';
	$dear_show = 1;
	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	//$form = $dbc->GetRecord("villa_form_mapping","*","links = '".$id."'");
	
	$total_section = $dbc->GetCount("villa_form_status","vfm = '".$form['id']."'");
	$percent = ($total_section*100)/5;
	
	?>
    <div class="container-fluid nopad top50" style="position:fixed; width:100%; z-index:10;">
        <div class="col-12 nopad text-center">
            <!--<button type="button" class="btn btn-primary btn_back" onClick="goback()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>-->
            <?php /*?><div class="col-md-6 nopad"><button type="button" class="btn btn-primary btn_back btn-sm btn-block" onClick="goback()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></div><?php */?>
            <div class="col-md-12 nopad <?php echo $visib;?>"><button class="btn btn-warning btn-md btn-block">Edit Form Customer Name <?php echo $form['cus_name'];?></button></div>
            
            
            


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

<script>
function complete_airport(id,posi)
{
	$.ajax({
		url:"libs/action_form/complete_section.php",
		type:"POST",
		dataType:"json",
		data:{
			id:id,
			posi:posi
			},
		success: function(res){
			$(".new_progress_bar").css({"width":res.percent+'%'});
			$(".pg_percent").animate({"left":res.percent+'%'},300);
			$(".pg_percent").html(res.percent+'%');
			if(res.display =='show')
			{
				$("."+posi).show();
			}
			else
			{
				$("."+posi).hide();
			}
			
		}
	});
}
</script>
<div class="progress new_progress <?php echo $visib; echo isset($_SESSION['auth']['user_id'])?'':'d-none';?>" >
	<div class="pg_percent jello-horizontal color-change-5x"><?php echo $percent;?>%</div>
  <div class="progress-bar progress-bar-striped progress-bar-animated new_progress_bar color-change-5x" role="progressbar" aria-label="Example with label" style="width:<?php echo $percent;?>%"  aria-valuenow="<?php echo $percent;?>" aria-valuemin="0" aria-valuemax="100"></div>
</div>

<ul class="nav navvv justify-content-center">
              <li class="nav-item">
                <a class="nav-link" href="#booking_detail">BOOKING DETAILS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#AIRPORT">AIRPORT TRANSFER</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#GUEST">GUEST REGISTRATION</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="#FOOD">FOOD AND BEVERAGES</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#PAYMENT">PAYMENT ON ARRIVAL</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#CONCEIRGE">CONCEIRGE SERVICES</a>
              </li>
            </ul>


<br>
<br>
<br>

<script>
$(document).ready(function(e) {
    var airport = '<?php echo $airport;?>';
	var guest = '<?php echo $guest;?>';
	var food = '<?php echo $food;?>';
	var payment = '<?php echo $payment;?>';
	var conceirge = '<?php echo $conceirge;?>';
	var pcent = '<?php echo $percent;?>';
	$(".pg_percent").animate({"left":pcent+'%'},1000);
	
	setTimeout(function(){
		if(airport != '')
		{
			$("."+airport).hide();
		}
		
		if(guest != '')
		{
			$("."+guest).hide();
		}
		
		if(food != '')
		{
			$("."+food).hide();
		}
		
		if(payment != '')
		{
			$("."+payment).hide();
		}
		
		if(conceirge != '')
		{
			$("."+conceirge).hide();
		}
	},800);
	//alert(airport+'-'+guest+'-'+food+'-'+payment+'-'+conceirge);
});
</script> 


<script>
$(document).ready(function(e) {
   $( 'textarea.editor' ).ckeditor();
});
</script>
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
    	<div class="col-12 align-self-end text-center">
        	<img src="../../upload/new_design/villa_form/Artboard 112.png" class="vf_img" width="150" alt="">
            <div class="villa_name_top"><?php echo $vil_name[0];?></div>	
        </div>
    	<!--<div class="col-6 align-self-end text-end"><img src="../../upload/new_design/villa_form/Artboard 112.png" class="vf_img" width="150" alt=""></div>
        <div class="col-6 align-self-start text-start">
        	<div class="villa_name_top"><?php echo $vil_name[0];?></div>	-->
        <?php 
			/*if($villa_form['logo_part']!='')
			{
				$logo_r = json_decode($villa_form['logo_part']);
				echo '<img src="'.$logo_r.'" class="img_r_logo_tmb" width="150" alt="">';
			}
			else
			{
				echo '<img src="../../upload/new_design/villa_form/logo_right.jpg" class="img_r_logo_tmb" width="150" alt="">';
			}*/
		?><!--<img src="../../upload/new_design/villa_form/Artboard 113.png" width="150" alt="">-->
        <!--</div>-->
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

<div id="booking_detail" class="container-fluid box_dear">
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
                	<img src="../../upload/new_design/villa_form/side_main.jpg" class="img_side_tmb" width="100%" alt="">
                <?php
                /*if($villa_form['side_photo']!='')
                    {
                        $side_photo = json_decode($villa_form['side_photo']);
                        echo '<img src="'.$side_photo.'" class="img_side_tmb" width="100%" alt="">';
                    }
                    else
                    {
                        echo '<img src="../../upload/new_design/villa_form/side.jpg" class="img_side_tmb" width="100%" alt="">';
                    }*/
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
						$inf_2 = json_decode($villa_form_mapping['informations'],true);
						$booking = json_decode(base64_decode($inf_2['booking']),true);
						$bd = ($booking['booking_details']!='')?'block':'none';
						//$bi = ($booking['booking_inclusions']!='')?'block':'none';
						$ac = ($booking['additional_charges']!='')?'block':'none';
						
						$inc = json_decode(base64_decode($inf_2['inclusions']),true);
						$bi = (count($inc)>0)?'block':'none';
						$not = json_decode(base64_decode($inf_2['note']),true);
						$notess = (count($not)>0)?'block':'none';
						?>
						
                        
                
                        
                        
                        <form id="v_form_infoma">
            			<input type="hidden" name="txtID" value="<?php echo $form_id;?>">  
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
									
                                    <?php
									if(isset($_SESSION['auth']['user_id']))
									{
										?>
                                    <dt class="col-sm-4"><strong>Booking Details</strong></dt>
									<dd class="col-sm-8"><textarea class="editor" name="tx_bd" id="tx_bd" cols="30" rows="7" style="width:100%"><?php echo json_decode(base64_decode($booking['booking_details'],true));?></textarea></dd>
									<dt class="col-sm-4 top50">Booking Inclusions</dt>
									<dd class="col-sm-8 top50" ><!--style="display:<?php echo $bd;?>"-->
									<button type="button" class="btn btn-primary" onClick="add_inclu();"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    <div class="box_inclu">
                                    <?php
                                    $inc = json_decode(base64_decode($inf_2['inclusions']),true);
                                    if(count($inc)>0)
                                    {
                                        foreach($inc as $inclus)
                                        {
                                            echo '<div class="inclu_inp top20 row">';
                                                echo '<div class="col-md-10 nopad"><input type="text" name="tx_inclusions[]" style="width:100%" value="'.$inclus.'"></div>';
                                                echo '<div class="col-md-1 text-right"><button type="button" class="btn btn-danger" onClick="$(this).parent().parent().remove();"><i class="fa fa-remove" aria-hidden="true"></i></button></div>';
                                            echo '</div>';
                                        }
                                    }
                                    ?>
                                    </div>
									</dd>
									
									<dt class="col-sm-4 top50" >Additional Charges</dt>
									<dd class="col-sm-8 top50" ><textarea name="tx_ac" id="tx_ac" cols="30" rows="7" style="width:100%"><?php echo $booking['additional_charges'];?></textarea></dd>
									
									<dt class="col-sm-4 top50" >Note</dt>
									<dd class="col-sm-8 top50" >
                                    	<button type="button" class="btn btn-primary" onClick="add_notes();"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                        <div class="box_notes">
                                        <?php
                                        $notes = json_decode(base64_decode($inf_2['note']),true);
                                        if(count($notes)>0)
                                        {
                                            foreach($notes as $notess)
                                            {
                                                echo '<div class="inclu_inp top20 row">';
                                                    echo '<div class="col-md-10 nopad"><input type="text" name="tx_notes[]" style="width:100%" value="'.$notess.'"></div>';
                                                    echo '<div class="col-md-1 text-right"><button type="button" class="btn btn-danger" onClick="$(this).parent().parent().remove();"><i class="fa fa-remove" aria-hidden="true"></i></button></div>';
                                                echo '</div>';
                                            }
                                        }
                                        ?>
                                        </div>
                                    </dd>
									
                                    <div class="col-12">
                                    	<?php
										if(isset($_SESSION['auth']['user_id']))
										{
										?>
                                        <button type="button" class="btn btn-primary " onClick="save_information();"> Save</button>
                                        <?php } ?>
                                        <span class="icon">
                                            <i class="fa fa-check cok cok01" aria-hidden="true"></i> <span class="tok tok01"></span>
                                            <i class="fa fa-check cno cno01" aria-hidden="true"></i> <span class="tno tno01"></span>
                                        </span>
									</div>
                                    <?php
									}
									else
									{
										?>
<!--************************************************************************************ admin ******************************************************************-->                                    
									<dt class="col-sm-4"><strong>Booking Details</strong></dt>
									<dd class="col-sm-8"><?php echo json_decode(base64_decode($booking['booking_details'],true));//nl2br(json_decode(base64_decode($booking['booking_details'],true)));?></dd>
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
									<?php
									}
									?>
									
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
						</div><!--row-->
                        
                        
                        </form>
        


                    </div>
                </div>
                <div class="col-0 col-md-1"></div>
            </div>
            
            <img src="../../upload/new_design/villa_form/EDM-detail-villa.png" class="iv_logo_big" alt="">
            
        </div>
    </div>
</div>

<script>
function add_notes()
{
    var z='';
    z+= '<div class="inclu_inp top20 row">';
        z+= '<div class="col-md-10 nopad"><input type="text" name="tx_notes[]" style="width:100%"></div>';
        z+= '<div class="col-md-1 text-right"><button type="button" class="btn btn-danger" onClick="$(this).parent().parent().remove();"><i class="fa fa-remove" aria-hidden="true"></i></button></div>';
    z+= '</div>';
    $(".box_notes").append(z);
}

function add_inclu()
{
    var z='';
    z+= '<div class="inclu_inp top20 row">';
        z+= '<div class="col-md-10 nopad"><input type="text" name="tx_inclusions[]" style="width:100%"></div>';
        z+= '<div class="col-md-1 text-right"><button type="button" class="btn btn-danger" onClick="$(this).parent().parent().remove();"><i class="fa fa-remove" aria-hidden="true"></i></button></div>';
    z+= '</div>';
    $(".box_inclu").append(z);
}

function save_information()
{
    /*if($("#tx_in_address").val()=='')
    {
        alert_text("#tx_in_address");
    }
    else if($("#tx_in_location").val()=='')
    {
        alert_text("#tx_in_location");
    }
    else if($("#tx_in_phone").val()=='')
    {
        alert_text("#tx_in_phone");
    }
    else
    {*/
        $.ajax({
            url:"libs/action_form/save_information_mapping.php",
            type:"POST",
            dataType:"json",
            data:$("#v_form_infoma").serialize(),
            success: function(res){
                if(res.status==true)
                {
                    $(".cok01").fadeIn(300);
                    $(".cno01,.tno01").hide();
                }
                else
                {
                    $(".cno01,.tno01").fadeIn(300);
                    $(".tno01").html(res.msg);
                    $(".cok01").hide();
                }
            }
        });
    /*}*/
}

function set_date_onside(me)
{
	var id = $(me).parent().find('#txtIDOS').val();
	$.ajax({
		url:"libs/action_form/save_onsite_display.php",
		type:"POST",
		dataType:"json",
		data:{
			id:id,
			tx_chkindate:$(me).val()
		},
		success: function(res){
			if(res.status==true)
			{
				$(".cok01_os").fadeIn(300);
				$(".cno01_os,.tno01_os").hide();
			}
			else
			{
				$(".cno01_os,.tno01_os").fadeIn(300);
				$(".tno01_os").html(res.msg);
				$(".cok01_os").hide();
			}
		}
	});
}
</script>

<div class="container-fluid box_dear">
	<div class="row justify-content-center">
    	<div class="col-11 col-md-10 col-xl-8">
            
            <dl class="row">
              <dt class="col-sm-3">SERVICE HOURS</dt>
              <dd class="col-sm-9"><?php echo $villa_form['services'];?></dd>
              
               <?php //$os_status_vi = ($villa_form['onsite_status']==1)?'block':'none';
			    $os_status_vi = ($villa_form_mapping['onsite_con']<=date('Y-m-d'))?'block':'none';
			    $os_status = ($villa_form['onsite_status']==1)?$villa_form['onsite_con']:$villa_form['onsite_con'];
				
				//echo $os_status_vi .'|----|'. $os_status;
				?>
              
				<?php
                if(isset($_SESSION['auth']['user_id']))
                {
					$onsite_con = $villa_form_mapping['onsite_con'];
					echo '<dt class="col-sm-3" style="display:">ONSITE CONTACT</dt>';
              		echo '<dd class="col-sm-3" style="display:">'.$os_status.' </dd>';
					
					echo '<dt class="col-sm-2">Display on </dt>';
					echo '<dd class="col-sm-3" >';
						echo '<input type="hidden" id="txtIDOS" name="txtID" value="'.$form_id.'">';
						echo '<input type="date" name="tx_chkindate" id="tx_chkindate" onChange="set_date_onside(this);" value="'.$onsite_con.'">';
							echo '<span class="icon">';
								echo '<i class="fa fa-check cok cok01_os" aria-hidden="true"></i> <span class="tok tok01_os"></span>';
								echo '<i class="fa fa-check cno cno01_os" aria-hidden="true"></i> <span class="tno tno01_os"></span>';
							echo '</span>';
					echo '</dd>';
                }
				else
				{
					if($os_status_vi=='block')
					{
						echo '<dt class="col-sm-3" style="display:'.$os_status_vi.'">ONSITE CONTACT</dt>';
						echo '<dd class="col-sm-3" style="display:'.$os_status_vi.'">'.$os_status.' </dd><!--style="display:<?php echo $os_status_vi;?>"-->';
					}
					else
					{
						echo '<dt class="col-sm-3" style="display:"></dt>';
              			echo '<dd class="col-sm-3" style="display:"></dd>';
					}
					//echo '<div class="w-100"></div>';
					echo '<dt class="col-sm-2"></dt>';
					echo '<dd class="col-sm-3" >';
						//echo '<input type="hidden" id="txtIDOS" name="txtID" value="'.$form_id.'">';
						//echo '<input type="date" name="tx_chkindate" id="tx_chkindate" onChange="set_date_onside(this);" value="'.$onsite_con.'">';
							echo '<span class="icon">';
								echo '<i class="fa fa-check cok cok01_os" aria-hidden="true"></i> <span class="tok tok01_os"></span>';
								echo '<i class="fa fa-check cno cno01_os" aria-hidden="true"></i> <span class="tno tno01_os"></span>';
							echo '</span>';
					echo '</dd>';
				}
                ?> 
                
              
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
        
        <div id="AIRPORT" class=" bg_ap rela">
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
            
            <form id="v_form_4_arv">
            <input type="hidden" name="txtID" value="<?php echo $form_id;?>"> 
            <input type="hidden" id="txtIDMapping" name="txtIDMapping" value="<?php echo $form_mapping_id;?>"> 
            	 <h2 style=" font-family:sr;font-family: sr !important;font-weight: bold; letter-spacing:3px; text-transform:uppercase;"> <span class="tb">+</span>
                    <!--<button type="button" class="btn btn-danger " onClick="$(this).parent().parent().remove();"><i class="fa fa-trash" aria-hidden="true"></i></button> -->
                    Transfers Arrival <!--<span class="badge badge-info"><?php echo $xx;?></span>-->
                    </h2>
                    
                    <div class="row">
                    <div class="col-12">
                        
						<div class="arv_display row">
                        	
                        </div>
                        
                        <br><br><br>
                    </div>
                    </div>
                    
                    <div class="alert alert-success col-md-12 arrival row airport" role="alert">
                    
                    
                    
                    <div class="col-md-4">
                        <div class="form-group rela">
                            <label for="Sign Name">Sign Name</label>
                            <input type="text" class="form-control li_blu" id="tx_sname_a" name="tx_sname_a" >
                            <div class="tricorner_mini bluee"></div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group rela">
                            <label for="Sign Name">Date</label>
                            <input type="date" class="form-control li_blu" id="tx_date_a" name="tx_date_a" >
                            <div class="tricorner_mini bluee"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group rela">
                            <label for="Sign Name">Airport/Hotel</label>
                            <input type="text" class="form-control li_blu" id="tx_airline_a" name="tx_airline_a" >
                            <div class="tricorner_mini bluee"></div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group rela">
                            <label for="Sign Name">Flight number</label>
                            <input type="text" class="form-control li_blu" id="tx_flight_a" name="tx_flight_a" >
                            <div class="tricorner_mini bluee"></div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group rela">
                            <label for="Sign Name">Time</label>
                            <input type="text" class="form-control li_blu" id="tx_time_a" name="tx_time_a" >
                            <div class="tricorner_mini bluee"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group rela">
                            <label for="Sign Name">No. of Adults/Kids (Kids age)</label>
                            <input type="text" class="form-control li_blu" id="tx_pass_a" name="tx_pass_a" >
                            <div class="tricorner_mini bluee"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group rela">
                            <label for="Sign Name">Transfer Arrangement Yes or No</label>
                            <input type="text" class="form-control li_blu" id="tx_transfer_a" name="tx_transfer_a" >
                            <div class="tricorner_mini bluee"></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group rela">
                            <label for="Sign Name">Contact number</label><!-- and Special Request -->
                            <input type="text" class="form-control li_blu" id="tx_Contact_a" name="tx_Contact_a" >
                            <div class="tricorner_mini bluee"></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group rela">
                            <label for="Sign Name">No.of Luggages </label>
                            <input type="text" class="form-control li_blu" id="tx_luggages_a" name="tx_luggages_a" >
                            <div class="tricorner_mini bluee"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group rela">
                            <label for="Sign Name">Special Request</label>
                            <input type="text" class="form-control li_blu" id="tx_Special_Request_a" name="tx_Special_Request_a" >
                            <div class="tricorner_mini bluee"></div>
                        </div>
                    </div>
                    
                    <div class="tricorner bluee"></div>
                </div>
                <button type="button" class="btn btn-primary airport" onClick="save_airport_arv();"> Save</button> 
           </form>
           
           <script>
		   $(document).ready(function(e) {
				load_arrival();
        	});
			
			function del_arrival(id)
			{
				var Delconf = confirm('Are you sure to delete !');
				if(Delconf==false)
				{
					return false;
				}
				else
				{
					$.ajax({
						url:"libs/action_form/del_arrival_data.php",
						type:"POST",
						dataType:"json",
						data:{id:id},
						success: function(res){
							load_arrival();
						}
					});
				}
			}
			
			function load_arrival()
			{
				$.ajax({
					url:"libs/action_form/load_arrival_data.php",
					type:"POST",
					dataType:"html",
					data:{id:$("#txtIDMapping").val()},
					success: function(res){
						$(".arv_display").html(res);
					}
				});
			}
			
           function save_airport_arv()
		   {
			   $.ajax({
					url:"libs/action_form/save_airport_arrival.php",
					type:"POST",
					dataType:"json",
					data:$("#v_form_4_arv").serialize(),
					success: function(res){
						if(res.status==true)
						{
							load_arrival();
							$(".li_blu").val('');
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
           </script>
           <br><br>
           
           
           
           
           
            <form id="v_form_4_dpt">
            <input type="hidden" name="txtID" value="<?php echo $form_id;?>"> 
            <input type="hidden" id="txtIDMapping" name="txtIDMapping" value="<?php echo $form_mapping_id;?>"> 
            	 <h2 style="color:#F7941D; font-family:sr;font-family: sr !important;font-weight: bold; letter-spacing:3px;"> <span class="tb">+</span>
                    TRANSFERS DEPARTURE 
                    </h2>
                    
                    <div class="row">
                    <div class="col-12">
                        
						<div class="dpt_display row">
                        	
                        </div>
                        
                        <br><br><br>
                    </div>
                    </div>
                    
                    <div class="alert alert-warning col-md-12 departure row airport" role="alert">
                                
                        <?php /*?><h2> <span class="tb">+</span>
                        <!--<button type="button" class="btn btn-danger " onClick="$(this).parent().parent().remove();"><i class="fa fa-trash" aria-hidden="true"></i></button>--> Transfers Departure <span class="badge badge-warning"><?php echo $yy;?></span></h2><?php */?>
                        <div class="col-md-4">
                            <div class="form-group rela">
                                <label for="Sign Name">Sign Name</label>
                                <input type="text" class="form-control li_ora" id="tx_sname_d" name="tx_sname_d" >
                                <div class="tricorner_mini orangee"></div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group rela">
                                <label for="Sign Name">Date</label>
                                <input type="date" class="form-control li_ora" id="tx_date_d" name="tx_date_d" >
                                <div class="tricorner_mini orangee"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group rela">
                                <label for="Sign Name">Airport/Hotel</label>
                                <input type="text" class="form-control li_ora" id="tx_airline_d" name="tx_airline_d" >
                                <div class="tricorner_mini orangee"></div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group rela">
                                <label for="Sign Name">Flight number</label>
                                <input type="text" class="form-control li_ora" id="tx_flight_d" name="tx_flight_d" >
                                <div class="tricorner_mini orangee"></div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group rela">
                                <label for="Sign Name">Time</label>
                                <input type="text" class="form-control li_ora" id="tx_time_d" name="tx_time_d" >
                                <div class="tricorner_mini orangee"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group rela">
                                <label for="Sign Name">No. of Adults/Kids (Kids age)</label>
                                <input type="text" class="form-control li_ora" id="tx_pass_d" name="tx_pass_d" >
                                <div class="tricorner_mini orangee"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group rela">
                                <label for="Sign Name">Transfer Arrangement Yes or No</label>
                                <input type="text" class="form-control li_ora" id="tx_transfer_d" name="tx_transfer_d" >
                                <div class="tricorner_mini orangee"></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group rela">
                                <label for="Sign Name">Contact Number</label>
                                <input type="text" class="form-control li_ora" id="tx_Contact_Number_d" name="tx_Contact_Number_d" >
                                <div class="tricorner_mini orangee"></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group rela">
                                <label for="Sign Name">No.of Luggages </label>
                                <input type="text" class="form-control li_ora " id="tx_luggages_d" name="tx_luggages_d" >
                                <div class="tricorner_mini orangee"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group rela">
                                <label for="Sign Name">Special Request</label>
                                <input type="text" class="form-control li_ora" id="tx_Special_Request_d" name="tx_Special_Request_d" >
                                <div class="tricorner_mini orangee"></div>
                            </div>
                        </div>
                        
                        <div class="tricorner orangee"></div>
                    </div>
                <button type="button" class="btn btn-primary airport" onClick="save_airport_dpt();"> Save</button> 
           </form>
           
           <script>
		   $(document).ready(function(e) {
				load_departure();
        	});
			
			function del_departure(id)
			{
				var Delconf = confirm('Are you sure to delete !');
				if(Delconf==false)
				{
					return false;
				}
				else
				{
					$.ajax({
						url:"libs/action_form/del_departure_data.php",
						type:"POST",
						dataType:"json",
						data:{id:id},
						success: function(res){
							load_departure();
						}
					});
				}
			}
			
			function load_departure()
			{
				$.ajax({
					url:"libs/action_form/load_departure_data.php",
					type:"POST",
					dataType:"html",
					data:{id:$("#txtIDMapping").val()},
					success: function(res){
						$(".dpt_display").html(res);
					}
				});
			}
			
           function save_airport_dpt()
		   {
			   $.ajax({
					url:"libs/action_form/save_airport_departure.php",
					type:"POST",
					dataType:"json",
					data:$("#v_form_4_dpt").serialize(),
					success: function(res){
						if(res.status==true)
						{
							load_departure();
							$(".li_ora").val('');
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
           </script>
           <form id="v_form_4">
            <input type="hidden" name="txtID" value="<?php echo $form_id;?>">             
                       
                       
                       
                            
                <?php /*?><div class="col-md-12 r_arrival">
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
                </div><?php */?>
                
                <?php /*?><div class="col-md-12 r_departure">
                    
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
                </div><?php */?>
                
                <?php $a_xx = ($xx<=0)?1:$xx; $a_yy = ($yy<=0)?1:$yy;?>
                <input type="hidden" class="txarv" value="<?php echo $a_xx;?>">
                <input type="hidden" class="txdpt" value="<?php echo $a_yy;?>">
                
                
                <!--<div class="">
                <button type="button" class="btn btn-primary " onClick="save_airport();"> Save</button> 
                <span class="icon">
                    <i class="fa fa-check cok cok4" aria-hidden="true"></i> <span class="tok tok4"></span>
                    <i class="fa fa-check cno cno4" aria-hidden="true"></i> <span class="tno tno4"></span>
                </span>-->
                <!--<button type="button" class="btn btn-success " onClick="add_table_4();"><i class="fa fa-plus" aria-hidden="true"></i></button>-->
                <!--<button type="button" class="btn btn-success " onClick="add_arrival_4();"><i class="fa fa-plus" aria-hidden="true"></i></button>-->
                <!--</div>-->
                
    			<br><br>
                <p><strong>NOTE:</strong> 100% of the service price may be charged for cancellation and adjustment less than 24 hours before the booking.</p>
                <p >
                    <strong>Special Request </strong>
                    
                    <div class="col-12 col-md-6"><div class="display_special_request_airport_transfer"></div></div>
                    
                    <div class="rela top30 airport">
                        <textarea class="txt_line tx_overlay" name="tx_spcrq" id="tx_spcrq" cols="30" rows="5" placeholder=" " style="width:100%;"></textarea>
                        <label for="tx_spcrq" class="bedcon">Special Request </label>
                        <div class="tricorner_2 bluee"></div>
                    </div>
                    <?php /*?><div class="rela">
                        <textarea class="txt_line tx_overlay" name="tx_spcrq" id="tx_spcrq" cols="30" rows="5" placeholder=" " style="width:100%;"><?php echo json_decode($form['special_request']);?></textarea>
                        <label for="tx_spcrq" class="bedcon">Special Request </label>
                        <div class="tricorner_2 bluee"></div>
                    </div><?php */?>
                    <button type="button" class="btn btn-primary airport" onClick="save_special_request_vfd();"> Save</button> 
                    <span class="icon">
                        <i class="fa fa-check cok cok4_1" aria-hidden="true"></i> <span class="tok tok4_1"></span>
                        <i class="fa fa-check cno cno4_1" aria-hidden="true"></i> <span class="tno tno4_1"></span>
                    </span>
                </p>
                
            </form>
        </div>
        
        <?php $vf_airport = ($dbc->HasRecord("villa_form_status","vfm = '".$form_mapping_id."' and sections = 'airport'")?'checked':'');?>
        
        <div class="row- col-12 rela <?php echo isset($_SESSION['auth']['user_id'])?'':'d-none';?>">
            <div class="switch">
                <input id="cmn-toggle-aptf" class="cmn-toggle cmn-toggle-round" <?php echo $vf_airport;?>  type="checkbox" onClick="complete_airport('<?php echo $form_mapping_id;?>','airport')">
                <label for="cmn-toggle-aptf"></label><span class="tx_sta">Complete</span>
            </div>
        </div>
        
        
        
        <script>
		$(document).ready(function(e) {
            load_special_request_airport();
        });
		
		
		
		function load_special_request_airport()
		{
			var data = {
				id : $("#txtID").val(),
				tx_spcrq : $("#tx_spcrq").val(),
			};
			
			$.ajax({
				url:"libs/action_form/load_special_request_vfd.php",
				type:"POST",
				dataType:"html",
				data:data,
				success: function(res){
					$(".display_special_request_airport_transfer").html(res);
				}
			});
		}
		
		function del_special_request_airport(id)
		{
			var Delconf = confirm('Are you sure to delete it?');
			if(Delconf==false)
			{
				return false;
				
			}
			else
			{
				$.ajax({
					url:"libs/action_form/del_special_request_airport.php",
					type:"POST",
					dataType:"html",
					data:{id:id},
					success: function(res){
						load_special_request_airport();
					}
				});
			}
		}
		
        function save_special_request_vfd()
		{
			var data = {
				txtID : $("#txtID").val(),
				tx_spcrq : $("#tx_spcrq").val(),
			};
			
			if( $("#tx_spcrq").val()=='')
			{
				alert_text("#tx_spcrq");
			}
			else
			{
				$.ajax({
					url:"libs/action_form/save_special_request_vfd.php",
					type:"POST",
					dataType:"json",
					data:data,
					success: function(res){
						if(res.status==true)
						{
							load_special_request_airport();
							$("#tx_spcrq").val('');
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
		}
        </script>
        
        <div class="w-100"></div>
        
        <div id="GUEST" class=" bg_guest rela"><div class="ovl"></div>
        	<div class="tx_ap2">guest registration</div>
        </div>
        
        <div class="col-11 col-md-11 col-xl-10 top50">
            <form id="v_form_6">
            <input type="hidden" name="txtID" id="txtID" value="<?php echo $form_id;?>">
                <div class="col-md-12 nopad top15">
                    <div class="tx_head">GUEST REGISTRATION</div>	
                    <p class="top15">Pursuant to The Rental Terms & Conditions, there will be a charge of $300 per night for any unregistered guest who stays at the villa. For your room assignment, please have a look at floor plan attached</p>
                </div>
                
                 <?php $flp_photo = json_decode($data['plan'],true);
					if($flp_photo!='')
					{ 
						 if(is_array($flp_photo))
						 {
							 if($flp_photo[0]!='')
							 {
								 ?>
                                <div class="col-md-12 nopad top50">
                                    <div class="tx_head">FLOOR PLAN</div>	
                                    
                                    <!--<p class="top15">
                                        <img data-src="<?php echo $flp_photo[0];?>" alt="<?php echo $vil_name[0];?>Floor Plan" width="100%" data-bs-toggle="modal" data-bs-target="#myModal_floor" onClick="vire_floor()" class="pointer lazy">
                                    </p>-->
                                </div>
                                
                                <div id="fl_plan" class="carousel slide" data-bs-ride="carousel">
                    				<!-- Indicators -->
									
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
                                    
                                    <button class="carousel-control-prev caro__but" type="button" data-bs-target="#fl_plan" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next caro__but" type="button" data-bs-target="#fl_plan" data-bs-slide="next">
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
                 <?php
							 }
						 }
					}
					?>
                
                    
                    
				 <?php $bedroom_config = json_decode($villa_form['bedroom_config'],true);
				 //echo count($bedroom_config);
				if(count($bedroom_config)>0)
				{
				?>
                <div class="col-md-12 nopad top50">
                    <div class="tx_head " style="text-transform:uppercase">Bedroom Configuration</div>	
                    <?php //$bedroom_config = json_decode($villa_form['bedroom_config'],true);
					echo '<ul class="bedr top20">';
					foreach($bedroom_config as $bed)
					{	
						echo '<li  class="fo15"><strong>'.$bed.'</strong></li>';
						/*echo '<div class="row nomarlr top10">';
							echo '<div class="col-md-8 "><input class="inp" type="text" name="tx_bedr[]" id="tx_bedr" value="'.$bed.'"></div>';
							echo '<div class="col-md-4"><button type="button" class="btn btn-danger " onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button></div>';
						echo '</div>';*/
					}
					echo '</ul>';
					?></p>
                </div>
                <?php
				}
				?>
                
                
                
                
                <div class="col-md-12 nopad top50 row"> 
                	<div class="display_guest_list"></div>
                </div>
                
                
                <div class="col-md-12 nopad top50 row guest">
                    <div class="col-md-2 text-md-end"><strong>First & Last Name</strong></div>
                    <div class="col-md-4 "><input class="inp txt_line_2 gl" type="text" name="tx_first" id="tx_first"></div>
                    
                    <div class="col-md-2 text-md-end "><strong>Passport No.</strong></div>
                    <div class="col-md-4 "><input class="inp txt_line_2 gl" type="text" name="tx_passport" id="tx_passport"></div>
                    
                    <div class="w-100"></div>
                    
                    <div class="col-md-2 text-md-end top20"><strong>City/Country of Residence</strong></div>
                    <div class="col-md-4 top20"><input class="inp txt_line_2 gl" type="text" name="tx_city" id="tx_city"></div>
                    
                    <div class="col-md-2 text-md-end top20"><strong>Date of Birth</strong></div>
                    <div class="col-md-4 top20"><input class="inp txt_line_2 gl" type="date" name="tx_date" id="tx_date"></div>
                    
                    <div class="w-100"></div>
                    
                    <div class="col-md-2 text-md-end top20"><strong>Nationality</strong></div>
                    <div class="col-md-4 top20"><input class="inp txt_line_2 gl" type="text" name="tx_nationality" id="tx_nationality"></div>
                    
                    <div class="col-md-2 text-md-end top20"><strong>Room assignment</strong></div>
                    <div class="col-md-4 top20"><input class="inp txt_line_2 gl" type="text" name="tx_room" id="tx_room"></div>
                    
                    <div class="col-md-2 top20  text-md-end"></div>
                    <div class="col-md-2 top20  "><button type="button" class="btn btn-primary" onClick="save_guest_list();">Save</button></div>
                </div>
               
               <script>
			    $(document).ready(function(e) {
					load_guest_list();
				});
				
				function load_guest_list()
				{
					$.ajax({
							url:"libs/action_form/load_guest_list.php",
							type:"POST",
							dataType:"html",
							data:{id:$("#orders_id").val()},
							success: function(res){
								$(".display_guest_list").html(res);
							}
						});
				}
				
				function del_guest_list(id)
				{
					var Delconf = confirm('Are you sure to delete it?');
					if(Delconf==false)
					{
						return false;
						
					}
					else
					{
						$.ajax({
							url:"libs/action_form/del_guest_list.php",
							type:"POST",
							dataType:"html",
							data:{id:id},
							success: function(res){
								load_guest_list();
							}
						});
					}
				}
			
               function save_guest_list()
			   {
					if($("#tx_first").val()=='')
					{
						alert_text("#tx_first");
					}
					else if($("#tx_passport").val()=='')
					{
						alert_text("#tx_passport");
					}
					else if($("#tx_city").val()=='')
					{
						alert_text("#tx_city");
					}
					else if($("#tx_date").val()=='')
					{
						alert_text("#tx_date");
					}
					else if($("#tx_nationality").val()=='')
					{
						alert_text("#tx_nationality");
					}
					else if($("#tx_room").val()=='')
					{
						alert_text("#tx_room");
					}
					else
					{
					   $.ajax({
							url:"libs/action_form/save_guest_list.php",
							type:"POST",
							dataType:"json",
							data:$("#v_form_6").serialize(),
							success: function(res){
								if(res.status==true)
								{
									load_guest_list();
									$(".gl").val('');
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
			   }
               </script>
               
               
               
               
               
                    
                    <?php 
						//$bed = json_decode($data['bed'],true);
//						if($bed!='')
//						{
//							echo '<div class="col-md-12 nopad top15">';
//                    			echo '<div class="tx_head">Bedroom Configuration</div>';
//                   				echo '<p class="top15">';
//								$butt =  json_decode($data['plan'],true);
//								if($butt==''){}
//								else
//								{
//									?>
									<?php /*?><button class="fplan1 pull-right" data-toggle="modal" data-target="#myModal_floor" onClick="vire_floor('<?php echo json_decode($room['plan'],true);?>')">
//										<div class="inb">View Floor Plan</div>
//									</button><?php */?>
									<?php
//								}
//								
//									echo '<ul class="bedr">';
//										foreach($bed as $val)
//										{
//											echo '<li  class="fo15"><strong>'.$val['title'].'</strong> - '.$val['detail'].'</li>';
//										}
//	
//									echo '</ul>';
//								echo '</p>';
//							echo '</div>';
//						  }
					?>
					
                
                <div class="col-md-12 nopad top15">
                <?php /*?><div class="">
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
                    </div><?php */?>
                    
                    <p>
                        <!--<strong>Bed Configurations </strong><br>-->
                        <div class="rela">
                            <textarea name="tx_bconf" id="tx_bconf" class="txt_line tx_bconf" cols="30" rows="5" style="width:100%;" placeholder=" "><?php echo $form['bed_configuration'];?></textarea>
                            <label for="tx_bconf" class="bedcon">Bed Configurations</label>
                            <div class="tricorner_2 bluee"></div>
                        </div>
                        <button type="button" class="btn btn-primary guest" onClick="save_tx_bconf();"> Save</button> 
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
        
        
        
        <?php $vf_guest = ($dbc->HasRecord("villa_form_status","vfm = '".$form_mapping_id."' and sections = 'guest'")?'checked':'');?>
        <div class="row- col-12 rela <?php echo isset($_SESSION['auth']['user_id'])?'':'d-none';?>">
            <div class="switch">
                <input id="cmn-toggle-guest" class="cmn-toggle cmn-toggle-round" <?php echo $vf_guest;?>  type="checkbox" onClick="complete_airport('<?php echo $form_mapping_id;?>','guest')">
                <label for="cmn-toggle-guest"></label><span class="tx_sta">Complete</span>
            </div>
        </div>
        
        
        
        
        <div class="w-100"></div>
        
        <div id="FOOD" class=" bg_food rela"><div class="ovl"></div>
        	<div class="tx_ap2">food and beverages</div>
        </div>
        
        
        <div class="col-11 col-md-10 col-xl-10 top50">
        <?php $dis_pl = ($villa_form['tx_food_link']!='')?'':'disabled';?>
        	<div class="tx_head">FOOD AND BEVERAGES</div>		
            <div class="tx_head top50">
            A. FIRST DINNER 
            <a  href="<?php echo $villa_form['tx_food_link'];?>" target="_blank" >
                <button type="button" <?php echo $dis_pl;?> class="btn btn-primary"><!--<i class="fa fa-cutlery" aria-hidden="true"></i>--> Menulink</button>	
            </a>
            </div>	
            <?php $dinner_amt = json_decode($villa_form['first_dinner_amt'],true); //print_r($dinner_amt);?>
            <div class="col-12 top20">
            Please select from the <strong>villa menu</strong> the dinner dishes which are served family style rather than ala carte from the attached villa menu. That means that you cannot order individual servings, but the cook will prepare enough of each dish to serve your entire party. The recommended maximum number of items served for each meal are <?php /*?><?php echo $dinner_amt['guest'];?> guests are <?php */?> <?php echo $dinner_amt['dishes'];?> dishes including appetizers and desserts. 
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
            <div class="col-md-12 nopad top15 <?php echo ($a_comp['display']=='on')?'':'d-none';?>">
                <div class="">Complimentary Food & Beverages: <?php echo $a_comp['complimentary'];?></div>
            </div>
            
            <form id="v_form_orders">
    		<input type="hidden" name="txtID" id="orders_id" value="<?php echo $form_id;?>">
            <div class="col-md-12 nopad top15 ">
                <div class=""><strong>Please place an order</strong> <!--<button type="button" class="btn btn-success " ><i class="fa fa-plus" aria-hidden="true"></i></button>--></div>
                
                <div class="orders_list top20"></div>
                
                <div class="orders top20">
                	<div class="row">
                    	<div class="col"><input type="text" name="tx_orders" id="tx_orders" class="tx_orders w-100 food"></div>
                    	<div class="col-2"><button type="button" class="btn btn-primary food" onClick="add_orders();">Save</button></div>
                    </div>
                </div>
            </div>
            </form>
            
            
            <script>
			$(document).ready(function(e) {
                load_orders();
            });
			function load_orders()
			{
				$.ajax({
						url:"libs/action_form/load_orders.php",
						type:"POST",
						dataType:"html",
						data:{id:$("#orders_id").val()},
						success: function(res){
							$(".orders_list").html(res);
						}
					});
			}
			
			function del_orders(id)
			{
				var Delconf = confirm('Are you sure to delete it?');
				if(Delconf==false)
				{
					return false;
					
				}
				else
				{
					$.ajax({
						url:"libs/action_form/del_orders.php",
						type:"POST",
						dataType:"html",
						data:{id:id},
						success: function(res){
							load_orders();
						}
					});
				}
			}
			
            function add_orders()
			{
				if($("#tx_orders").val()=='')
				{
					alert_text("#tx_orders");
				}
				else
				{
					$.ajax({
						url:"libs/action_form/save_orders.php",
						type:"POST",
						dataType:"json",
						data:$("#v_form_orders").serialize(),
						success: function(res){
							if(res.status==true)
							{
								load_orders();
								$("#tx_orders").val('');
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
				/*var z='';
					z+='<div class="row top15">';
                    	z+='<div class="col"><input type="text" name="tx_orders" class="tx_orders w-100"></div>';
                    	z+='<div class="col-2"><button type="button" class="btn btn-danger " onClick="$(this).parent().parent().remove();"><i class="fa fa-trash" aria-hidden="true"></i></button></div>';
                    z+='</div>';
					$(".orders").append(z);*/
			}
            </script>
            
            
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
                                        <input type="checkbox" class="chk_b_food food" name="chk_b_food" checked onClick="choose_b_food(this);" value="<?php echo $b_food;?>"> <?php echo $b_food;?> &nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                                <?php
                            }
                            else
                            {
                                ?>
                                <div class="col-md-12 top20">
                                    <div class="col-md-6 b_food_list">
                                        <input type="checkbox" class="chk_b_food food" name="chk_b_food"  onClick="choose_b_food(this);" value="<?php echo $b_food;?>"> <?php echo $b_food;?> &nbsp;&nbsp;&nbsp;
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
            
            <div class="col-md-12 nopad top20 rela d-none">
                
                <textarea name="tx_BREAKFAST" id="tx_BREAKFAST" cols="30" rows="5" class="txt_line tx_overlay" placeholder=" " style="width:100%; display:none;"><?php echo ($sprq!='')?$sprq:'-';?></textarea>
                <label for="tx_BREAKFAST" class="bedcon d-none">Special Request</label>
                <div class="tricorner_2 bluee"></div>
            </div>
            <p>
            <div class="col-md-12 nopad top20 food">
            	<input type="hidden" name="txtID" id="tx_breakf" value="<?php echo $form_id;?>">
            	<button type="button" class="btn btn-primary " onClick="save_first_breakfast();" >Save</button>
            	<span class="icon">
                    <i class="fa fa-check cok cok7b_food" aria-hidden="true"></i> <span class="tok tok7b_food"></span>
                    <i class="fa fa-check cno cno7b_food" aria-hidden="true"></i> <span class="tno tno7b_food"></span>
                </span>
            </div>
            
            
            <br><br>
            <form id="v_form_orders_b">
    		<input type="hidden" name="txtID" id="orders_id_b" value="<?php echo $form_id;?>">
            <div class="col-md-12 nopad top15 ">
                <div class=""><strong>Please place an order</strong> <!--<button type="button" class="btn btn-success " ><i class="fa fa-plus" aria-hidden="true"></i></button>--></div>
                
                <div class="orders_list_b top20"></div>
                
                <div class="orders top20">
                	<div class="row">
                    	<div class="col"><input type="text" name="tx_orders_b" id="tx_orders_b " class="tx_orders_b w-100 food"></div>
                    	<div class="col-2"><button type="button" class="btn btn-primary food" onClick="add_orders_b();">Save</button></div>
                    </div>
                </div>
            </div>
            </form>
            
            
            <script>
			$(document).ready(function(e) {
                load_orders_b();
            });
			function load_orders_b()
			{
				$.ajax({
						url:"libs/action_form/load_orders_b.php",
						type:"POST",
						dataType:"html",
						data:{id:$("#orders_id_b").val()},
						success: function(res){
							$(".orders_list_b").html(res);
						}
					});
			}
			
			function del_orders_b(id)
			{
				var Delconf = confirm('Are you sure to delete it?');
				if(Delconf==false)
				{
					return false;
					
				}
				else
				{
					$.ajax({
						url:"libs/action_form/del_orders_b.php",
						type:"POST",
						dataType:"html",
						data:{id:id},
						success: function(res){
							load_orders_b();
						}
					});
				}
			}
			
            function add_orders_b()
			{
				if($("#tx_orders_b").val()=='')
				{
					alert_text("#tx_orders_b");
				}
				else
				{
					$.ajax({
						url:"libs/action_form/save_orders_b.php",
						type:"POST",
						dataType:"json",
						data:$("#v_form_orders_b").serialize(),
						success: function(res){
							if(res.status==true)
							{
								load_orders_b();
								$(".tx_orders_b").val('');
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
			}
            </script>
            
            
            
            
            
            
<form id="form_CONCEIRGE_provisioning" class="form-horizontal d-none" role="form" enctype="multipart/form-data" onsubmit="upload_file_provisioning(this);return false;">
	<input type="hidden" name="txtID" value="<?php echo $form_id;?>">
   <button type="submit" id="but_save_provisioning" class="btn btn-primary pull-right">Save</button>
   <input type="file" class="custom-file-input validate " id="file_provisioning" name="file_provisioning" placeholder="img" onchange="read_file_name(this);">         
   <input type="text" name="txt_provisioning" id="txt_provisioning" >         
</form>
<script>
function choose_file_provisioning()
{
	$("#file_provisioning").click();
}

function read_file_name(input)
{
	let fileName = input.files[0].name;
    if ($.trim(fileName)) {
        //$('label[for="img"]').text(fileName);
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                var img = '<img src="' + e.target.result + '" width="100%" />';
                
                //$('#preview-img').html(img);
				$('.text_provisioning').html(fileName);
				$("#txt_provisioning").val(fileName);
				$("#but_save_provisioning").click();
            };
            reader.readAsDataURL(input.files[0]);
        }
    } else {
        //$('label[for="img"]').text('Choose file');
    }

}
function save_file_provisioning()
{
	$("#but_save_provisioning").click();
}

function save_provisioning_data()
{
	$.ajax({
		url:"libs/action_form/save_provisioning_data.php",
		type:"POST",
		dataType:"json",
		data:{
			txtID_provisioning:$("#txtID").val(),
			//tx_provisioning_link:$("#tx_provisioning_link").val(),
			tx_provisioning_file:$("#tx_provisioning_file").val()
		},
		success: function(res){
			if(res.status==true)
			{
				$(".cok_provisioning").fadeIn(300);
				$(".cno_provisioning,.tno_provisioning").hide();
			}
			else
			{
				$(".cno_provisioning,.tno_provisioning").fadeIn(300);
				$(".tno_provisioning").html(res.msg);
				$(".cok_provisioning").hide();
			}
		}
	});
}

function remove_provisioning_file()
{
	$("#tx_provisioning_file").val('');
	$(".text_provisioning").html('');
	$(".btn__provisioning_del").hide();
	$.ajax({
		url:"libs/action_form/remove_provisioning_data.php",
		type:"POST",
		dataType:"json",
		data:{
			txtID_provisioning:$("#txtID_provisioning").val()
			//tx_provisioning_link:$("#tx_provisioning_link").val(),
			//tx_provisioning_file:$("#tx_provisioning_file").val()
		},
		success: function(res){
			save_provisioning_data();
		}
	});
}

function upload_file_provisioning(form)
{
	var formData = new FormData($(form)[0]);
	$.ajax({
		url: "libs/action_form/upload_file_provisioning.php",
		cache: false,
		contentType: false,
		processData: false,
		type: 'POST',
		dataType: 'json',
		data: formData,
		beforeSend: function () {
		},
		success: function (response) {
				//window.location.reload();
			$("#tx_provisioning_file").val(response.file_path);
			$("#txt_provisioning").val('');
			$('.text_provisioning').html(response.file_name);
			$(".btn__provisioning_del").removeClass('d-none');
			save_provisioning_data();
		} 
	});

}

</script>
            
            <?php $f7c = json_decode($villa_form['provisioning'],true);
			$f7c_vfm = json_decode($form['provisioning'],true); ?>
    		<form id="v_form_7c">
    		<input type="hidden" name="txtID" value="<?php echo $form_id;?>">
            <input type="hidden" id="txtID_provisioning" name="txtID_provisioning" value="<?php echo $form_id;?>">
            <div class="col-md-12 nopad top15">
                <div class="tx_head top50">C. INITIAL PROVISIONING</div>
            </div>
            <div class="col-12 top20">Please select from the <strong>provisional list</strong> attached the ingredients and groceries pre-stocked for your arrival.</div>
           
           <?php $provisioning_datas =  json_decode($form['datas'],true);
		   $pro_ex = explode("/",$provisioning_datas['provisioning']['file']);?>
            <input class="inp" type="hidden" name="tx_provisioning_file" id="tx_provisioning_file" value="<?php echo $provisioning_datas['provisioning']['file'];?>" style="margin-top:8px;">
            <button type="button" class="btn btn-primary food" onClick="choose_file_provisioning();" style="margin-top:8px;">Upload</button>	
            <a href="<?php echo $provisioning_datas['provisioning']['file'];?>" target="_blank"><span class="text_provisioning"><?php echo $pro_ex[2];?></span></a>
            <button type="button" class="btn btn-danger btn__provisioning_del food <?php echo ($provisioning_datas['provisioning']['file']!='')?'':'d-none';?>" onClick="remove_provisioning_file();" style="margin-top:8px; "><i class="fa fa-trash" aria-hidden="true"></i></button>	
            <button type="button" class="btn btn-primary btn__save__provisioning d-none" onClick="save_provisioning_data();" style="margin-top:8px;">Save</button>	
            
            <span class="icon">
                <i class="fa fa-check cok cok_provisioning" aria-hidden="true"></i> <span class="tok tok_provisioning"></span>
                <i class="fa fa-check cno cno_provisioning" aria-hidden="true"></i> <span class="tno tno_provisioning"></span>
            </span>
            
            <?php 
			if($f7c['note']!='')
			{
				?>
                <div class="col-md-12 nopad top15">
                <strong>Note :</strong> <?php echo $f7c['note'];?>
                </div>                
                
                <?php
			}
			?>
            
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
									<div class="checkbox food">
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
                	 <!--<div class="col-md-12 nopad rela">
                    	
                    	<textarea name="tx_c_conf" id="tx_c_conf" cols="30" class="txt_line tx_overlay" placeholder=" " rows="5" style="width:100%;"><?php echo $f7c_vfm['complimentary'];?></textarea>
                        <label for="tx_c_conf" class="bedcon">Complimentary Food & Beverages</label>
                        <div class="tricorner_2 bluee"></div>
                    </div>-->
                    <div class="col-md-12 nopad top30 rela">
                    	
                    	<textarea name="tx_c_Special" id="tx_c_Special" cols="30"  class="txt_line tx_overlay"  placeholder=" " rows="5" style="width:100%;"><?php echo $f7c_vfm['special'];?></textarea>
                        <label for="tx_c_Special" class="bedcon">Special Request</label>
                        <div class="tricorner_2 bluee"></div>
                    </div>
                </div>
                
                <p>
                <button type="button" class="btn btn-primary food" onClick="save_wine_list();" >Save</button>
                <span class="icon">
                    <i class="fa fa-check cok cok7c" aria-hidden="true"></i> <span class="tok tok7c"></span>
                    <i class="fa fa-check cno cno7c" aria-hidden="true"></i> <span class="tno tno7c"></span>
                </span>
                </p>
                <div class="col-md-12">File Wine List : 
                <a href="<?php echo ($f7c['file_path']!='')?$f7c['file_path']:'#';?>" target="_blank"> 
                <button type="button" class="btn btn-primary "><i class="fa fa-picture-o" aria-hidden="true"></i> File/Photo</button> <?php //echo ($f7c['filename']!='')?$f7c['filename']:'';?>
                </a>
                </div>
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
                    
                    
                   <!-- <div class="col-md-12 nopad rela">
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
                    </p>-->
                    
                </div>
            </form>
        	
            <form id="v_form_dietary">
    		<input type="hidden" name="txtID" id="dietary_id" value="<?php echo $form_id;?>">
            <div class="col-md-12 nopad top15 ">
                <div class=""><strong>SPECIAL DIETARY</strong> <!--<button type="button" class="btn btn-success " ><i class="fa fa-plus" aria-hidden="true"></i></button>--></div>
                
                <div class="special_dietary top20"></div>
                
                <div class="orders top20">
                	<div class="row">
                    	<div class="col"><input type="text" name="tx_dietary" id="tx_dietary" class="tx_dietary w-100 food"></div>
                    	<div class="col-2"><button type="button" class="btn btn-primary food" onClick="add_dietary();">Save</button></div>
                    </div>
                </div>
            </div>
            </form>
            
            
            <script>
			$(document).ready(function(e) {
                load_dietary();
            });
			function load_dietary()
			{
				$.ajax({
						url:"libs/action_form/load_dietary.php",
						type:"POST",
						dataType:"html",
						data:{id:$("#dietary_id").val()},
						success: function(res){
							$(".special_dietary").html(res);
						}
					});
			}
			
			function del_dietary(id)
			{
				var Delconf = confirm('Are you sure to delete it?');
				if(Delconf==false)
				{
					return false;
					
				}
				else
				{
					$.ajax({
						url:"libs/action_form/del_dietary.php",
						type:"POST",
						dataType:"html",
						data:{id:id},
						success: function(res){
							load_dietary();
						}
					});
				}
			}
			
            function add_dietary()
			{
				if($("#tx_dietary").val()=='')
				{
					alert_text("#tx_dietary");
				}
				else
				{
					$.ajax({
						url:"libs/action_form/save_dietary.php",
						type:"POST",
						dataType:"json",
						data:$("#v_form_dietary").serialize(),
						success: function(res){
							if(res.status==true)
							{
								load_dietary();
								$("#tx_dietary").val('');
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
			}
            </script>
            
        </div>
        
        
        
        <?php $vf_food = ($dbc->HasRecord("villa_form_status","vfm = '".$form_mapping_id."' and sections = 'food'")?'checked':'');?>
        <div class="row- col-12 rela top50 <?php echo isset($_SESSION['auth']['user_id'])?'':'d-none';?>">
            <div class="switch">
                <input id="cmn-toggle-food" class="cmn-toggle cmn-toggle-round" <?php echo $vf_food;?>  type="checkbox" onClick="complete_airport('<?php echo $form_mapping_id;?>','food')">
                <label for="cmn-toggle-food"></label><span class="tx_sta">Complete</span>
            </div>
        </div>
        
        
        
        <div class="col-12 w-100"></div>
        
        <div id="PAYMENT" class=" bg_payment rela"><div class="ovl"></div>
        	<div class="tx_ap2">payment on arrival</div>
        </div>
        
       
        
        
        
        
        <?php 
		$deposit =  json_decode($villa_form['deposit'],true);
		$payment_oarv =  json_decode($villa_form['datas'],true);
		$paym_show = 0;
		if($payment_oarv['chk_payment']['chk_1']==1 || $payment_oarv['chk_payment']['chk_2']==1)
		{
			$paym_show = 1;
		}
				
		?>
        <div class="col-11 col-md-10 col-xl-8 top50 ">
            <form id="v_form_8">
            <input type="hidden" name="txtID" value="<?php echo $form_id;?>">
                <div class="tx_head " style="display:<?php echo ($paym_show==1)?'block':'none';?>">PAYMENT ON ARRIVAL</div>
                <p class="top15">
                <?php 
				
				if($payment_oarv['chk_payment']['chk_1']==1)
				{
					echo 'Any expense made at the villa is only payable in cash.<br>';
				}
				
				if($payment_oarv['chk_payment']['chk_2']==1)
				{
					echo 'Any expense made at the villa is payable in cash or credit card with bank fee.';
				}
				?>
                
                </p>
                
                <div class="tx_head top50">A. SECURITY DEPOSIT</div>
                <p class="top15">
                <?php
				if($deposit['deposit']!='')
				{
					echo 'The refundable security deposit '.$deposit['deposit'].' in any major currency will be collected cash upon arrival or credit card authorization. <br>';
				}
				
				if($deposit['damage_deposit']!='')
				{
					echo 'The refundable security deposit '.$deposit['damage_deposit'].' in any major currency will be collected cash upon arrival, no credit card facilities available at the villa.';
				}
				?>
                


<?php /*?>The refundable security deposit <?php echo ($deposit['deposit']!='')?$deposit['deposit']:'-';?> in any major currency will be collected cash upon arrival or credit card authorization.<br>
                Damage security deposit <?php echo $deposit['damage_deposit'];?><?php */?>
                
                </p>
                
                <div class="tx_head top50">B. PAYMENT ON ARRIVAL</div>
                <p class="top15"><?php echo ($villa_form['payment_on_arrival']!='')?$villa_form['payment_on_arrival']:'-';?></p>
                
                <div class="tx_head top50">C. REIMBURSEMENT</div>
                <p class="top15">At your arrival, you may be required to make cash payment to the villa manager or the concierge to cover the cost of items purchased in advance and for your anticipated requirements, such as meal orders, pre-stocking items & additional airport transfers.</p>
            
            </form>
        </div>
        
         <?php $vf_payment = ($dbc->HasRecord("villa_form_status","vfm = '".$form_mapping_id."' and sections = 'payment'")?'checked':'');?>
        <div class="row- col-12 rela top20 <?php echo isset($_SESSION['auth']['user_id'])?'':'d-none';?>">
            <div class="switch">
                <input id="cmn-toggle-payment" class="cmn-toggle cmn-toggle-round" <?php echo $vf_payment;?>  type="checkbox" onClick="complete_airport('<?php echo $form_mapping_id;?>','payment')">
                <label for="cmn-toggle-payment"></label><span class="tx_sta">Complete</span>
            </div>
        </div>
        
        
        
        
        
         <div class="col-12 w-100"></div>
        
        <div id="CONCEIRGE" class=" bg_conceirge rela"><div class="ovl"></div>
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
                      
                      <?php $spa_datas =  json_decode($villa_form['datas'],true);?>
                      <dt class="col-sm-3">Massage & Spa</dt>
                      <dd class="col-sm-9"><?php echo $f9['Massage'];?> 
                      <a href="<?php echo $spa_datas['spa']['link'];?>" target="_blank"><button type="button" class="btn btn-primary"><i class="fa fa-external-link" aria-hidden="true"></i></button></a>
                      <a href="<?php echo $spa_datas['spa']['file'];?>" target="_blank"><button type="button" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button></a>
                      </dd>
                      
                      
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
            
            <p><button type="button" class="btn btn-primary conceirge" onClick="save_service();"> Save</button>	
                <span class="icon">
                    <i class="fa fa-check cok cok9" aria-hidden="true"></i> <span class="tok tok9"></span>
                    <i class="fa fa-check cno cno9" aria-hidden="true"></i> <span class="tno tno9"></span>
                </span>
            </p>
        
            </form>
        </div>
        
        
        
        <?php $vf_conceirge = ($dbc->HasRecord("villa_form_status","vfm = '".$form_mapping_id."' and sections = 'conceirge'")?'checked':'');?>
        <div class="row- col-12 rela top20 <?php echo isset($_SESSION['auth']['user_id'])?'':'d-none';?>">
            <div class="switch">
                <input id="cmn-toggle-conceirge" class="cmn-toggle cmn-toggle-round" <?php echo $vf_conceirge;?>  type="checkbox" onClick="complete_airport('<?php echo $form_mapping_id;?>','conceirge')">
                <label for="cmn-toggle-conceirge"></label><span class="tx_sta">Complete</span>
            </div>
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
			txtID : $("#tx_breakf").val(),
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