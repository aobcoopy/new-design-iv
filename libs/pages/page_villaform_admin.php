<meta name="robots" content="noindex">


<?php
$id = $_REQUEST['id'];//base64_decode($_REQUEST['id']);//echo $id;
if($dbc->HasRecord("villa_form","id = '".$id."'"))
{
	$villa_form = $dbc->GetRecord("villa_form","*","id = '".$id."'");
	$form_id = $villa_form['id'];
		
	$data = $dbc->GetRecord("properties","*","id='".$villa_form['property']."'");
	$vil_name = explode("|",$data['name']);
	
	$form = $dbc->GetRecord("villa_form_mapping","*","villaform_id = '".$id."'");
	
}
else
{
	$villa_form = '';
	$data = '';
	$vil_name = '';
	$form = '';
	$form_id = '';
}
	
if(isset($_SESSION['auth']['user_id']))
{
	?>
    <div class="container-fluid nopad top50" style="position:fixed; width:100%; z-index:10;">
        <div class="col-12 nopad text-center">
            <!--<button type="button" class="btn btn-primary btn_back" onClick="goback()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>-->
            <!--<div class="col-md-6 nopad"><button type="button" class="btn btn-success btn_back btn-sm btn-block" onClick="view_form()"><i class="fa fa-search" aria-hidden="true"></i> Preview</button></div>-->
            <div class="col-md-12 nopad"><button class="btn btn-danger btn-sm btn-block"><?php echo $vil_name[0].'Template';?></button></div>
            
        </div>
    </div>
    <script>
	function goback()
	{
		window.history.back();
	}
	
	function view_form()
	{
		window.location = '/view-villaformadmin-<?php echo str_replace(" ","",$vil_name[0]).'-'.$_REQUEST['id'];?>.html';
	}
	</script>
	<?php
}
?>

<ul class="nav navvv justify-content-center">
              <li class="nav-item">
                <a class="nav-link" href="#booking_detail">BOOKING DETAILS</a>
              </li>
              <!--<li class="nav-item">
                <a class="nav-link" href="#AIRPORT">AIRPORT TRANSFER</a>
              </li>-->
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

<div class="container">
	<div class="col-12 text-center">
    	
    </div>
</div>
<style>
.form-control {
    border-radius: 1px;
    margin-bottom: 20px;
    border-color: #ced4d7;
    padding: 5px 8px !important;
    height: auto;
    box-shadow: none;
    color: #4b565b;
}
.badge {
    display: inline-block;
    min-width: 10px;
    padding: 3px 7px;
    font-size: 12px;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    background-color: #f05542;
    border-radius: 10px;
}
.alert-warning {
    border-color: #0b2646;
    background-color: #617b99;
    color: #0b2646;
}
.alert-warning h1, .alert-warning h2, .alert-warning h3, .alert-warning h4, .alert-warning h5, .alert-warning h6 {
    color: #0b2646;
    margin-top: 0;
}
.alert-success h1, .alert-success h2, .alert-success h3, .alert-success h4, .alert-success h5, .alert-success h6 {
    color: #0b2646;
    margin-top: 0;
}
.alert-success {
    border-color: #0b2646;
    background-color: #c3d4e8;
    color: #0b2646;
}

body
{
	background: #FFF4F4;
}
.back_form
{
	background:white;
	box-shadow:0px 0px 5px #b7b7b7;
	padding:20px 20px 20px 20px;
	font-size:18px;
}
.btn_back
{
	/*width:100px;*/
	z-index:10;
	position:relative;
}
.vf_title
{
	font-weight:bold;
	font-size:22px;
}
.vt_undl
{
	text-decoration:underline;
}
.vf_title_sub
{
	margin-left:50px;
}
.inp
{
	width:100%;
}
.cok,.tok
{
	color:#3bcc39;
	display:none;
}
.cno,.tno
{
	color:#369000;
	display:none;
}
input,textarea
{
	border:1px solid #a7a7a7 !important;
	padding:5px 5px;
	background:#e5e5e5;
}
input:focus,textarea:focus
{
	border:1px solid #a7a7a7 !important;
	padding:5px 5px;
	background:#fff;
}
</style>

<br>
<br>
<br>


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

<?php /*?><div class="container back_form">
<form id="v_form_0">
<input type="hidden" name="txtID" value="<?php echo $form_id;?>">
    <div class="col-md-12 nopad ">
        <div class="vf_titlea">
            Customer <input type="text" name="tx_cus" id="tx_cus" value="<?php echo $form['cus_name'];?>">
            Travel date From <input type="date" name="tx_cusdate" id="tx_cusdate" value="<?php echo $form['arrive'];?>">
             To <input type="date" name="tx_arrive_to" id="tx_arrive_to" value="<?php echo $form['arrive_to'];?>">
            <button type="button" class="btn btn-primary " onClick="save_cus();"> Save</button>
            <span class="icon">
                <i class="fa fa-check cok cok0" aria-hidden="true"></i> <span class="tok tok0"></span>
                <i class="fa fa-check cno cno0" aria-hidden="true"></i> <span class="tno tno0"></span>
            </span>
        </div>
    </div>
    
</form>
</div>
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
</script><?php */?>
    
    
    
<script >
function save_photo(button)
{
	$("#"+button).click();
}

function select_photo(button)
{
	$("#"+button).click();
}

function showImgs(input,posi,image,width,txt_path) 
{
    let fileName = input.files[0].name;
    if ($.trim(fileName)) {
        $('label[for="img"]').text(fileName);
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                //var img = '<img src="' + e.target.result + '" width="100%" />';
				var img_r_logo = '<img src="' + e.target.result + '" width="'+width+'"  />';
                
                //$('#preview-img').html(img); 
				$('.'+image).html(img_r_logo);
				//$('.img_r_logo').attr(src,img);
				$("."+posi).hide();
				$("#"+txt_path).val(fileName);
            };
            reader.readAsDataURL(input.files[0]);
        }
    } else {
        $('label[for="img"]').text('Choose file');
    }
};

function save_logo(form,inp_1,inp_2,inp_3,cok,cno,tno,field,loaded)
{
	$("."+loaded).show();
	if($("#"+inp_1).val() != $("#"+inp_2).val())
	{
		save_logo_file(form,inp_1,inp_2,inp_3);
		setTimeout(function()
		{
			if($("#"+inp_3).val()!='')
			{
				$.ajax({
					url:"libs/action_form/save_file_logo_to_db.php",
					type:"POST",
					dataType:"json",
					data:{
						path:$("#"+inp_1).val(),
						id:<?php echo $id;?>,
						field:field
						},
					success: function(resp){
						if(resp.status==true)
						{
							$("."+cok).fadeIn(300);
							$("."+cno+",."+tno).hide();
							
						}
						else
						{
							$("."+cno+",."+tno).fadeIn(300);
							$("."+tno).html(resp.msg);
							$("."+cok).hide();
						}
						$("."+loaded).hide();
					}
				});
			}
		},1000);
	}
	else
	{
		$.ajax({
			url:"libs/action_form/save_file_logo_to_db.php",
			type:"POST",
			dataType:"json",
			data:{
				path:$("#"+inp_2).val(),
				id:<?php echo $id;?>,
				field:field
				},
			success: function(resp){
				if(resp.status==true)
				{
					$("."+cok).fadeIn(300);
					$("."+cno+",."+tno).hide();
				}
				else
				{
					$("."+cno+",."+tno).fadeIn(300);
					$("."+tno).html(resp.msg);
					$("."+cok).hide();
				}
				$("."+loaded).hide();
				/*if(resp.status==true)
				{
					$(".cok001").fadeIn(300);
					$(".cno001,.tno001").hide();
				}
				else
				{
					$(".cno001,.tno001").fadeIn(300);
					$(".tno001").html(resp.msg);
					$(".cok001").hide();
				}*/
			}
		});
	}
};
function save_logo_file(form,inp_1,inp_2,inp_3){
	var formData = new FormData($(form)[0]);
	$.ajax({
		url: "libs/action_form/save_file_logo.php",
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
			$("#"+inp_1).val('');
			$("#"+inp_1).val(response.file_path);
			$("#"+inp_3).val(response.file_path);
			if(response.file_path!='')
			{
				return true;
			}
			else
			{
				return false;
			}
		} 
	});
};


/*fn.app.yacth_cover.yacth_cover.remove_cover = function(file_path){
		//var file_path = $(me).val();
		//alert(file_path);
		$.ajax({
			url:"apps/yacth_cover/xhr/action-remove-photo.php",
			type:"POST",
			dataType:"json",
			data:{path:file_path},
			success: function(resp){
				if(resp.status==true)
				{
					fn.engine.alert("Alert",resp.msg);
					setTimeout(function(){
						$("#bt_save").click();
					},1000);
					
				}
				else
				{
					fn.engine.alert("Alert",resp.msg);
				}
				
			}
		});
	};*/
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
        
            <div class="img_r_logo"></div>
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
			
			if(isset($_SESSION['auth']['user_id']))
			{
			?>
            
           <!-- <button type="button" class="btn btn-primary" onClick="select_photo('b_file');">Upload</button>
            <button type="button" id="bt_1_save" class="btn btn-primary bt_1_save" onClick="save_photo('bt_save');">
            <div class="spinner-border text-warning loaded_1" role="status" style="display:none;">
              <span class="visually-hidden">Loading...</span>
            </div><br class="loaded_1" style="display:none;">Save</button>-->
            
            <?php 
			} 
			?>
            <?php /*?><span class="icon">
                <i class="fa fa-check cok cok001" aria-hidden="true"></i> <span class="tok tok001"></span>
                <i class="fa fa-check cno cno001" aria-hidden="true"></i> <span class="tno tno001"></span>
            </span>
            <br>
            <!--<font color="#ff0000"> 207 x 129 px</font>-->
            <input type="hidden" class="paths" id="path_photo_logo" name="path_photo_logo" value="<?php echo $logo_r;?>">
            <input type="hidden" class="paths2" id="path_photo_logo_2" name="path_photo_logo_2" value="<?php echo $logo_r;?>">
            <input type="hidden" class="paths3" id="path_photo_logo_3" name="path_photo_logo_3" >
        </div><?php */?>
        
        <form id="logo_r" class="form-horizontal" role="form" enctype="multipart/form-data" onsubmit="save_logo(this,'path_photo_logo','path_photo_logo_2','path_photo_logo_3','cok001','cno001','tno001','logo_part','loaded_1');return false;">
            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input validate hidden d-none" id="b_file" name="b_file" placeholder="img" onchange="showImgs(this,'img_r_logo_tmb','img_r_logo','150','path_photo_logo');">
                        <label class="custom-file-label hidden" for="img"><?php echo $image_name; ?></label>
                        
                    </div>
                    <div class="form-group row"><br>
                        <div class="col-sm-6" id="preview-img">
                        <?php echo $image; ?>
                        </div>
                    </div>
                    <!--<button type="button" class="btn btn-danger " <?php echo ($path!='')?'':'disabled';?> onClick="fn.app.yacth_cover.yacth_cover.remove_cover('<?php echo $path;?>');"><i class="fa fa-remove"></i></button>-->
                </div>
            </div>
            
            <div class="thumbs">
                <label class="col-sm-2 control-label"></label>
                <div class="col-md-10 phof">
                    
                    <input type="hidden" name="txt_photo" id="txt_photo" >
                    <img src=""  width="100%" class=" phos">
                </div>
            </div>
            <button type="submit" id="bt_save" class="btn btn-primary d-none">Save</button>
        </form>
            
            
    </div>
    
    <div class="row text-center ">    
        <div class="top_cus_name">Customer name</div>
        <div class="top_thk">Thank you for your reservation with InspiringVillas.</div>
    </div>
    <div class="row">
    	<div class="col-6"><font color="#ff0000"> 1926 x 768 px</font>
        
     <?php 
			
			
			if(isset($_SESSION['auth']['user_id']))
			{
			?>
            
            <button type="button" class="btn btn-primary" onClick="select_photo('c_file');">Upload</button>
            <button type="button" id="bt_1_save" class="btn btn-primary bt_1_save text-center" onClick="save_photo('bt_save_2');">
            <div class="spinner-border text-warning loaded_2 text-center" role="status" style="display:none;">
              <span class="visually-hidden">Loading...</span>
            </div><br class="loaded_2" style="display:none;">Save</button>
            
            <?php 
			} 
			?>
            <span class="icon">
                <i class="fa fa-check cok cok0011" aria-hidden="true"></i> <span class="tok tok0011"></span>
                <i class="fa fa-check cno cno0011" aria-hidden="true"></i> <span class="tno tno0011"></span>
            </span>
        </div>
    	<div class="col-12 nopad">
        	<div class="img_main_logo"></div>
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
        <input type="hidden" class="paths" id="path_photo_main" name="path_photo_main" value="<?php echo $main_photo;?>">
        <input type="hidden" class="paths2" id="path_photo_main_2" name="path_photo_main_2" value="<?php echo $main_photo;?>">
        <input type="hidden" class="paths3" id="path_photo_main_3" name="path_photo_main_3" >
        <!--<img src="../../upload/new_design/villa_form/main.jpg" width="100%" alt=""></div>-->
    </div>
</div>

<form id="main" class="form-horizontal" role="form" enctype="multipart/form-data" onsubmit="save_logo(this,'path_photo_main','path_photo_main_2','path_photo_main_3','cok0011','cno0011','tno0011','main_photo','loaded_2');return false;">
    <div class="form-group">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-10">
            <div class="custom-file">
                <input type="file" class="custom-file-input validate hidden d-none" id="c_file" name="b_file" placeholder="img" onchange="showImgs(this,'img_amin_tmb','img_main_logo','100%','path_photo_main');">
                <label class="custom-file-label hidden" for="img"><?php echo $image_name; ?></label>
                
            </div>
            <div class="form-group row"><br>
                <div class="col-sm-6" id="preview-img">
                <?php echo $image; ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="thumbs">
        <label class="col-sm-2 control-label"></label>
        <div class="col-md-10 phof">
            
            <input type="hidden" name="txt_photo" id="txt_photo" >
            <img src=""  width="100%" class=" phos">
        </div>
    </div>
    <button type="submit" id="bt_save_2" class="btn btn-primary d-none">Save</button>
</form>

<form id="main" class="form-horizontal" role="form" enctype="multipart/form-data" onsubmit="save_logo(this,'path_photo_side','path_photo_side_2','path_photo_side_3','cok00111','cno00111','tno00111','side_photo','loaded_3');return false;">
    <div class="form-group">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-10">
            <div class="custom-file">
                <input type="file" class="custom-file-input validate hidden d-none" id="d_file" name="b_file" placeholder="img" onchange="showImgs(this,'img_side_tmb','img_side','100%','path_photo_side');">
                <label class="custom-file-label hidden" for="img"><?php echo $image_name; ?></label>
                
            </div>
            <div class="form-group row"><br>
                <div class="col-sm-6" id="preview-img">
                <?php echo $image; ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="thumbs">
        <label class="col-sm-2 control-label"></label>
        <div class="col-md-10 phof">
            
            <input type="hidden" name="txt_photo" id="txt_photo" >
            <img src=""  width="100%" class=" phos">
        </div>
    </div>
    <button type="submit" id="bt_save_3" class="btn btn-primary d-none">Save</button>
</form>
      

<div class="container-fluid box_dear">
	<div class="row justify-content-center">
    	<div class="col-11 col-md-10 col-xl-10">
        
        	<form id="v_form_11">
            <input type="hidden" name="txtID" value="<?php echo $form_id;?>">  
        	<div class="row justify-content-center">
            	<div class="col-4 d-none d-md-block">
                
                <!--<font color="#ff0000"> 661 x 2093 px</font>-->
				 <?php 
                if(isset($_SESSION['auth']['user_id']))
                {
                ?>
                
                <!--<button type="button" class="btn btn-primary" onClick="select_photo('d_file');">Upload</button>
                <button type="button" id="bt_1_save" class="btn btn-primary bt_1_save" onClick="save_photo('bt_save_3');">
                <div class="spinner-border text-warning loaded_3 text-center" role="status" style="display:none;">
                  <span class="visually-hidden">Loading...</span>
                </div><br class="loaded_3" style="display:none;">Save</button>-->
                <?php 
                } 
                ?>
                <!--<span class="icon">
                    <i class="fa fa-check cok cok00111" aria-hidden="true"></i> <span class="tok tok00111"></span>
                    <i class="fa fa-check cno cno00111" aria-hidden="true"></i> <span class="tno tno00111"></span>
                </span>
                
                <div class="img_side"></div>-->
                
                <!--<img src="../../upload/new_design/villa_form/side_main.jpg" class="img_side_tmb" width="100%" alt="">        photo side -->   
				<?php
               /* if($villa_form['side_photo']!='')
                    {
                        $side_photo = json_decode($villa_form['side_photo']);
                        echo '<img src="'.$side_photo.'" class="img_side_tmb" width="100%" alt="">';
                    }
                    else
                    {
                        echo '<img src="../../upload/new_design/villa_form/side.jpg" class="img_side_tmb" width="100%" alt="">';
                    }*/
                ?>
                <input type="hidden" class="paths" id="path_photo_side" name="path_photo_side" value="<?php echo $side_photo;?>">
                <input type="hidden" class="paths2" id="path_photo_side_2" name="path_photo_side_2" value="<?php echo $side_photo;?>">
                <input type="hidden" class="paths3" id="path_photo_side_3" name="path_photo_side_3" >
        
                <!--<img src="../../upload/new_design/villa_form/side.jpg" width="100%" alt="">-->
                
                </div>
                <div id="booking_detail" class="col-12 col-lg-12 text-center">
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
                        <?php 
						$inf = json_decode($villa_form['informations'],true);
						$booking = json_decode(base64_decode($inf['booking']),true);?>
						
						
						<div class="row justify-content-center top70">
							<div class="col-9 t_t2-">
								<dl class="row text-start">
									<dt class="col-sm-4">Villa Name</dt>
									<dd class="col-sm-8"><?php echo $vil_name[0];?></dd>
									<dt class="col-sm-4">Address</dt>
									<dd class="col-sm-8">
                                    <textarea name="tx_in_address" id="tx_in_address" style="width:100%;" placeholder="24/27, Soi Naya, Tambon Rawai, Amphoe Mueang Phuket, Chang Wat Phuket 83100"><?php echo $inf['address'];?></textarea>
                                    </dd>
									
                                    <dt class="col-sm-4">Location</dt>
									<dd class="col-sm-8">
									<input type="text" name="tx_in_location" id="tx_in_location" placeholder="Naiharn Beach, Phuket"  style="width:100%;" value="<?php echo $inf['location'];?>">
                                    </dd>
                                    
                                    <dt class="col-sm-4">Google Map</dt>
									<dd class="col-sm-8">
									<input type="text" name="tx_in_map" id="tx_in_map" placeholder="Link"  style="width:100%;" value="<?php echo $inf['map'];?>">
                                    </dd>
                                    
									<?php
									$a=0;
									if($a==10)
									{
										?>
									<dt class="col-sm-4"><strong>Booking Details</strong></dt>
									<dd class="col-sm-8"><textarea class="editor" name="tx_bd" id="tx_bd" cols="30" rows="7" style="width:100%"><?php echo json_decode(base64_decode($booking['booking_details'],true));?></textarea></dd>
									<dt class="col-sm-4 top50">Booking Inclusions</dt>
									<dd class="col-sm-8 top50" ><!--style="display:<?php echo $bd;?>"-->
									<button type="button" class="btn btn-primary" onClick="add_inclu();"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    <div class="box_inclu">
                                    <?php
                                    $inc = json_decode(base64_decode($inf['inclusions']),true);
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
                                        $notes = json_decode(base64_decode($inf['note']),true);
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
									?>
									
									<div class="book_line"></div>
								</dl>
							</div>
						</div>
        


                    </div>
                </div>
                <div class="col-0 col-md-1"></div>
            </div>
            </form>
            
            <img src="../../upload/new_design/villa_form/EDM-detail-villa.png" class="iv_logo_big" alt="">
            

        </div>
        
        <div class="col-11 col-md-10 col-xl-8">
        <form id="v_form_2">
        <input type="hidden" name="txtID" value="<?php echo $form_id;?>">   
        	<dl class="row">
            	<dt class="col-sm-3">SERVICE HOURS</dt>
                <dd class="col-sm-9"><input type="text" name="tx_ser_hour" id="tx_ser_hour" placeholder="The service hours at the villa are from 07:00 – 22:00."  style="width:100%;" value="<?php echo $villa_form['services'];?>"></dd>
            </dl>
            
            <?php
			if(isset($_SESSION['auth']['user_id']))
			{
			?>
			<button type="button" class="btn btn-primary " onClick="save_services();"> Save</button>
			<?php } ?>
            
            <span class="icon">
                <i class="fa fa-check cok cok02" aria-hidden="true"></i> <span class="tok tok02"></span>
                <i class="fa fa-check cno cno02" aria-hidden="true"></i> <span class="tno tno02"></span>
            </span>
        </form>
        
        <br><br>
        
        <form id="v_form_3">
        <input type="hidden" id="txtID_os" name="txtID" value="<?php echo $form_id;?>">     
        <?php 
            $os_status = ($villa_form['onsite_status']==1)?'Show':'Hide';
            $os_status_2 = ($villa_form['onsite_status']==1)?'':'checked';
        ?> 
        	<dl class="row">
            	<dt class="col-sm-3">ONSITE CONTACT <!--<button class="btn_status btn btn-info btn-xs" type="button"><?php echo $os_status;?></button>--></dt>
                <dd class="col-sm-9"><!--<input type="checkbox" class=" form-check-input" id="chk_nsct" name="chk_nsct" <?php echo $os_status_2;?> onClick="change_os_status(this)">
              <label class="custom-control-label" for="customCheck1">Hide</label>--></dd><!--เอาออก เพราะมีระบบให้ที่หน้าของลูกค้าแล้ว-->
            </dl>
            
            <p class="top15"><input type="text" name="tx_onsite" id="tx_onsite" placeholder="Villa Manager:	Ms. Kaew +66 97 002 9208"  style="width:100%;" value="<?php echo $villa_form['onsite_con'];?>"></p>
            	
                 <?php
			if(isset($_SESSION['auth']['user_id']))
			{
			?>
			<button type="button" class="btn btn-primary " onClick="save_onsite();"> Save</button>
			<?php } ?>
            	
                <span class="icon">
                    <i class="fa fa-check cok cok03" aria-hidden="true"></i> <span class="tok tok03"></span>
                    <i class="fa fa-check cno cno03" aria-hidden="true"></i> <span class="tno tno03"></span>
                </span>
        
        </form>
        
        <br><br>
        <form id="v_form_41_2">
            <input type="hidden" name="txtID" value="<?php echo $form_id;?>">
            <?php $arrival = json_decode($villa_form['arrival'],true);?>
                <dl class="row">
                    <dt class="col-sm-3">ARRIVAL AND DEPARTURE TIMES</dt>
                    <dd class="col-sm-9">Please provide your flight information in tables below for our team to be ready to check your party in.
                        <div class="row nomar">
                            <div class="col-md-6 text-center">Check-in time: <input type="text" name="tx_air_check_in" id="tx_air_check_in" placeholder="15:00 onwards" value="<?php echo $arrival['check_in'];?>"></div>	
                            <div class="col-md-6 text-center">Check-out time: <input type="text" name="tx_air_check_out" id="tx_air_check_out" placeholder="12:00 noon" value="<?php echo $arrival['check_out'];?>"></div>	
                        </div>
                    </dd>
                </dl>
                
                
                <div class="col-md-12 nopad top15">
                    <div class="vf_title_sub vt_undl">AIRPORT TRANSFER</div> 
                    <p class="top15 vf_title_sub">
                    
                    <button type="button" class="btn btn-primary" onClick="add_aptf_box()"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    
                    <div class="aptf_row">
                     <?php
                    $aptf = $arrival['transfer'];
                    //echo $arrival['transfer'].'---<br>';
                    foreach($aptf as $aptf_val)
                    {
                        echo '<div class="row top15">';
                            echo '<div class="col-1 text-end">';
                                echo '<button type="button" class="btn btn-danger" onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button>';
                            echo '</div>';
                            echo '<div class="col">';
                                echo '<input type="text" name="tx_air_transfer[]"  style="width:100%;" value="'.$aptf_val.'" >';//id="tx_air_transfer"
                            echo '</div>';
                        echo '</div>';
                    }
                    ?>
                    </div>
                    </p>
                </div>
                
                <?php
			if(isset($_SESSION['auth']['user_id']))
			{
			?>
			<button type="button" class="btn btn-primary " onClick="save_airrival();"> Save</button>
			<?php } ?>
            
                    <span class="icon">
                        <i class="fa fa-check cok cok41" aria-hidden="true"></i> <span class="tok tok41"></span>
                        <i class="fa fa-check cno cno41" aria-hidden="true"></i> <span class="tno tno41"></span>
                    </span>
                
        </form> 
            </div>
            
            
            
            <div class="w-100"></div>
        
        <div id="GUEST" class=" bg_guest rela"><div class="ovl"></div>
        	<div class="tx_ap2">guest registration</div>
        </div>
        
        <div class="col-11 col-md-11 col-xl-10 top50">
            <form id="v_form_6_bedr">
            <input type="hidden" name="txtID" id="txtID" value="<?php echo $form_id;?>">
           
                <div class="col-md-12 nopad top15">
                    <div class="tx_head" style="text-transform:uppercase">Bedroom Configuration</div>	
                    <!--<p class="top15">Pursuant to The Rental Terms & Conditions, there will be a charge of $300 per night for any unregistered guest who stays at the villa. For your room assignment, please have a look at floor plan attached</p>-->
                </div>
               
                
                <div class="">
                <?php
                if(isset($_SESSION['auth']['user_id']))
				{
					?><button type="button" class="btn btn-primary " onClick="save_bedroon_config();"> Save</button> <?php
				}
				?>
                <span class="icon">
                    <i class="fa fa-check cok cok6_bed" aria-hidden="true"></i> <span class="tok tok6_bed"></span>
                    <i class="fa fa-check cno cno6_bed" aria-hidden="true"></i> <span class="tno tno6_bed"></span>
                </span>
                <button type="button" class="btn btn-success " onClick="add_bedr();"><i class="fa fa-plus" aria-hidden="true"></i></button>
                </div>
                
                <div class="nopad top15 col-md-12 bedrr">
                	<!--<div class="row nomarlr top10">
                    	<div class="col-md-8 "><input class="inp" type="text" name="tx_dinner[]" id="tx_dinner" value=""></div>
                        <div class="col-md-4"><button type="button" class="btn btn-danger " onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button></div>
                    </div>-->
                	<?php 
					
					foreach($bedroom_config as $bed)
					{	
						echo '<div class="row nomarlr top20">';
							echo '<div class="col-md-8 "><input class="inp" type="text" name="tx_bedr[]" id="tx_bedr" value="'.$bed.'"></div>';
							echo '<div class="col-md-4"><button type="button" class="btn btn-danger " onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button></div>';
						echo '</div>';
					}
					?>
                </div>
                
                <script>
                function add_bedr()
				{
					var z='';
					z+=  '<div class="row nomarlr top20">';
							 z+='<div class="col-md-8 "><input class="inp" type="text" name="tx_bedr[]" id="tx_bedr" ></div>';
							 z+='<div class="col-md-4"><button type="button" class="btn btn-danger " onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button></div>';
						 z+='</div>';
					$(".bedrr").append(z);
				}
				
				function save_bedroon_config()
				{
						$.ajax({
							url:"libs/action_form/save_bedroom_config.php",
							type:"POST",
							dataType:"json",
							data:$("#v_form_6_bedr").serialize(),
							success: function(res){
								if(res.status==true)
								{
									$(".cok6_bed").fadeIn(300);
									$(".cno6_bed,.tno6_bed").hide();
								}
								else
								{
									$(".cno6_bed,.tno6_bed").fadeIn(300);
									$(".tno6_bed").html(res.msg);
									$(".cok6_bed").hide();
								}
							}
						});
				}
                </script> 
                    <?php 
						$bed = json_decode($data['bed'],true);
						if($bed!='')
						{
							echo '<div class="col-md-12 nopad top15">';
                    			//echo '<div class="tx_head">Bedroom Configuration</div>';
                   				echo '<p class="top15">';
								$butt =  json_decode($data['plan'],true);
								if($butt==''){}
								else
								{
									?>
									<?php /*?><button class="fplan1 pull-right" data-toggle="modal" data-target="#myModal_floor" onClick="vire_floor('<?php echo json_decode($room['plan'],true);?>')">
										<div class="inb">View Floor Plan</div>
									</button><?php */?>
									<?php
								}
								
									echo '<ul class="bedr">';
										foreach($bed as $val)
										{
											echo '<li  class="fo15"><strong>'.$val['title'].'</strong> - '.$val['detail'].'</li>';
										}
	
									echo '</ul>';
								echo '</p>';
							echo '</div>';
						  }
					?>
					
                
                <div class="col-md-12 nopad top15">
                
                    <!--<div class="table-responsive">-->
                   <?php /*?> <table id="tb_guest" width="100%%" border="1" class="table table-stripeda table-borderless">
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
                    </table><?php */?>
                    <!--</div>-->
                    <!--<p>-->
                        <!--<strong>Bed Configurations </strong><br>-->
                        <!--<div class="rela">
                            <textarea name="tx_bconf" id="tx_bconf" class="txt_line tx_bconf" cols="30" rows="5" style="width:100%;" placeholder=" "><?php echo $form['bed_configuration'];?></textarea>
                            <label for="tx_bconf" class="bedcon">Bed Configurations</label>
                            <div class="tricorner_2 bluee"></div>
                        </div>
                        <button type="button" class="btn btn-primary " onClick="save_tx_bconf();"> Save</button> 
                        <span class="icon">
                            <i class="fa fa-check cok cok6_1" aria-hidden="true"></i> <span class="tok tok6_1"></span>
                            <i class="fa fa-check cno cno6_1" aria-hidden="true"></i> <span class="tno tno6_1"></span>
                        </span>
                    </p>-->
                    <!--<p><strong>NOTE:</strong> 100% of the service price may be charged for cancellation and adjustment less than 24 hours before the booking.</p>-->
                </div>
                
            </form>
            <?php $aaa = ($a!=0)?$a:1;?>
            <input class="inp1" type="hidden" value="<?php echo $aaa;?>">
        </div>
        
        
        
        
        
        
            
             <div class="w-100"></div>
            
            <div id="FOOD" class=" bg_food rela"><div class="ovl"></div>
                <div class="tx_ap2">food and beverages</div>
            </div>
           
            <div class="w-100"></div>

            <div class="col-11 col-md-10 col-xl-10 top50">
            <form id="v_form_7a">
            <input type="hidden" class="tt7" name="txtID" id="txtIDAMT" value="<?php echo $form_id;?>">
            	<div class="tx_head">FOOD AND BEVERAGES</div>		
                <dl class="row top50">
                    <dt class="col-sm-3">Menu Link</dt>
                    <dd class="col-sm-9"><input type="text" name="tx_food_link" id="tx_food_link" style="width:100%" value="<?php echo $villa_form['tx_food_link'];?>">
                    <?php
			if(isset($_SESSION['auth']['user_id']))
			{
			?>
			<button type="button" class="btn btn-primary top15" onClick="save_menu_link();"> Save</button>
			<?php } ?>
            
						<span class="icon">
							<i class="fa fa-check cok cok7_ml" aria-hidden="true"></i> <span class="tok tok7_ml"></span>
							<i class="fa fa-check cno cno7_ml" aria-hidden="true"></i> <span class="tno tno7_ml"></span>
						</span>
                    </dd>
                </dl>
                <p>&nbsp;
						
					</p>

                <div class="tx_head top50">
                	A. FIRST DINNER 
                </div>
                <?php $dinner_amt = json_decode($villa_form['first_dinner_amt'],true); //print_r($dinner_amt);?>
                <div class="top15">
                	Please select from the <strong>villa menu</strong> the dinner dishes which are served family style rather than ala carte from the attached villa menu. That means that you cannot order individual servings, but the cook will prepare enough of each dish to serve your entire party. The recommended maximum number of items served for each meal are 
                    <!--<input type="text"  id="tx_guest_amt" name="tx_guest_amt" value="<?php echo $dinner_amt['guest'];?>"> guests are -->
                    <input type="text"  id="tx_dishes_amt" name="tx_dishes_amt" value="<?php echo $dinner_amt['dishes'];?>"> dishes including appetizers and desserts.
                     <?php
					if(isset($_SESSION['auth']['user_id']))
					{
						echo '<button type="button" class="btn btn-primary " onClick="save_first_dinner();"> Save</button> ';
					}
					
					?>
                    <span class="icon">
                        <i class="fa fa-check cok din_ok" aria-hidden="true"></i> <span class="tok t_din_ok"></span>
                        <i class="fa fa-check cno din_no" aria-hidden="true"></i> <span class="tno t_din_no"></span>
                    </span>
                    <br><br><br>
                </div>
                
<script>
function save_first_dinner()
{
    if($("#tx_guest_amt").val()=='')
    {
        alert_text("#tx_guest_amt");
    }
    else if($("#tx_dishes_amt").val()=='')
    {
        alert_text("#tx_dishes_amt");
    }
    else
    {
        $.ajax({
            url:"libs/action_form/save_first_dinner.php",
            type:"POST",
            dataType:"json",
            data:{
				tx_guest_amt:$("#tx_guest_amt").val(),
				tx_dishes_amt:$("#tx_dishes_amt").val(),
				txtID:$("#txtIDAMT").val()
				},
            success: function(res){
                if(res.status==true)
                {
                    $(".din_ok").fadeIn(300);
                    $(".din_no,.t_din_no").hide();
                }
                else
                {
                    $(".din_no,.t_din_no").fadeIn(300);
                    $(".t_din_no").html(res.msg);
                    $(".din_ok").hide();
                }
            }
        });
    }
}
</script>                
                <div class="top15">
                	 <?php
					if(isset($_SESSION['auth']['user_id']))
					{
					?>
					<button type="button" class="btn btn-primary " onClick="save_dinner();"> Save</button> 
                    <button type="button" class="btn btn-success " onClick="add_dinner();"><i class="fa fa-plus" aria-hidden="true"></i></button>
					<?php } ?>
                    
                    <span class="icon">
                        <i class="fa fa-check cok cok7a" aria-hidden="true"></i> <span class="tok tok7a"></span>
                        <i class="fa fa-check cno cno7a" aria-hidden="true"></i> <span class="tno tno7a"></span>
                    </span>
                </div>
                
                <div class="nopad top15 col-md-12 dinn">
                	<?php
					$din = json_decode($villa_form['dinner'],true);
					foreach($din as $dinner)
					{
						echo '<div class="row nomarlr top20">';
							echo '<div class="col-md-8 "><input class="inp" type="text" name="tx_dinner[]" id="tx_dinner" value="'.$dinner.'"></div>';
							echo '<div class="col-md-4"><button type="button" class="btn btn-danger " onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button></div>';
						echo '</div>';
					}
					?>
                </div>
            </form>    
            </div>
        	
            <div class="col-11 col-md-10 col-xl-10 top50">
            <?php $a_comp =  json_decode($villa_form['complimentary'],true);?>
            <form id="v_form_7a_11">
    		<input type="hidden" class="tt7" name="txtID" value="<?php echo $form_id;?>">
            	<div class="tx_head top50">
                	Complimentary Food & Beverages 
                </div>
                <div class="top15"><input type="checkbox" class="form-check-input" id="chk_a_comp" name="chk_a_comp" <?php echo ($a_comp['display']=='on')?'checked':'';?>> Show</div>
                <div class="rela">
                	<textarea name="tx_Complimentary" id="tx_Complimentary" cols="30" rows="5" style="width:100%"><?php echo $a_comp['complimentary'];?></textarea>
                </div>
                <div class="top15">
                	<?php
			if(isset($_SESSION['auth']['user_id']))
			{
			?>
			<button type="button" class="btn btn-primary " onClick="save_Complimentary();"> Save</button>
			<?php } ?>
            
                    <span class="icon">
                        <i class="fa fa-check cok cok7a_11" aria-hidden="true"></i> <span class="tok tok7a_11"></span>
                        <i class="fa fa-check cno cno7a_11" aria-hidden="true"></i> <span class="tno tno7a_11"></span>
                    </span>
                </div>
            </form>
            </div>
            
            
            <div class="col-11 col-md-10 col-xl-10 top50">
            <?php $breakfast = json_decode($villa_form['breakfast'],true);?>
            <form id="v_form_7b">
            <input type="hidden" name="txtID" value="<?php echo $form_id;?>">
            	<div class="tx_head top50">
                	B. FIRST BREAKFAST <button type="button" class="btn btn-success " onClick="add_food();"><i class="fa fa-plus" aria-hidden="true"></i></button>
                </div>
                <div class="top15 row">
                	<div class="b_food col-12">
						<?php 
                        if(count($breakfast['food'])>0)
                        {
                            foreach($breakfast['food'] as $b_food)
                            {
                                echo '<div class="b_sub_food top20 row">';
                                    echo '<div class="col-md-8  top10"> <input type="text" name="tx_b_food[]" value="'.$b_food.'" style="width:100%"></div>';
                                    echo '<div class="col-md-2 top10"><button type="button" class="btn btn-danger " onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button></div>';
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12  top15">
                        <div class="col-md-2 nopad">Breakfast Link</div>
                        <div class="col-md-10"><input type="text" id="tx_b_link" name="tx_b_link" style="width:100%" value="<?php echo $breakfast['link'];?>"></div>
                    </div>
                    <div class="col-md-12  top15">    
                        <div class="col-md-2 nopad">Breakfast File</div>
                        <div class="col-md-2"><button type="button" class="btn btn-info pull-left <?php echo isset($_SESSION['auth']['user_id'])?'':'d-none';?>" onClick="choose_file('b_file');">Upload</button></div>
                        <div class="col-md-8">
                        	<div class="col-md-12">
                                <p><span class="tx_b_filename" color="#ff0000" style="display:inline-block;"> <?php echo ($breakfast['filename']!='')?$breakfast['filename']:'Choose File';?></span>
                                <button class="btn btn-danger <?php echo isset($_SESSION['auth']['user_id'])?'':'d-none';?>"  type="button"><i class="fa fa-times b_trem" aria-hidden="true" onClick="remove_file_upload('b_trem','tx_b_path','tx_b_filename');" style="float: left;color:#fff; cursor:pointer;<?php echo ($breakfast['filename']!='')?'display:block;':'display:none;';?>"></i></button></p>
                                <?php $file_status = ($breakfast['filename']!='')?1:0;?>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input validate hidden d-none"  id="b_file" name="b_file" placeholder="img" onchange="showFile(this,'tx_b_path','tx_b_filename');">
                                    <!--<label class="custom-file-label hidden" for="img"><?php echo $image_name; ?></label>-->
                                    <input type="hidden" class="tx_b_path" id="tx_b_path" name="tx_b_path" value="<?php echo ($breakfast['filename']!='')?$breakfast['filename']:'';?>">
                                    <input type="hidden" class="tx_b_file_path" id="tx_b_file_path" name="tx_b_file_path" value="<?php echo ($breakfast['filename']!='')?$breakfast['filename']:'';?>">
                                    <input type="hidden" class="tx_b_path_old" id="tx_b_path_old" name="tx_b_path_old" value="<?php echo ($breakfast['filename']!='')?$breakfast['filename']:'';?>">
                                    <input type="hidden" class="tx_b_check" id="tx_b_check" name="tx_b_check" value="">
                                    <!--<input type="hidden" class="tx_tpath" id="tx_file_path" name="tx_file_path" value="<?php echo ($breakfast['file_path']!='')?$breakfast['file_path']:'';?>">-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 nopad top10">
                    <p>
                        <?php
			if(isset($_SESSION['auth']['user_id']))
			{
			?>
			<button type="button" class="btn btn-primary " onClick="save_BREAKFAST('<?php echo $file_status;?>');"> Save</button>
			<?php } ?>
            
                        <span class="icon">
                            <i class="fa fa-check cok cok7b" aria-hidden="true"></i> <span class="tok tok7b"></span>
                            <i class="fa fa-check cno cno7b" aria-hidden="true"></i> <span class="tno tno7b"></span>
                        </span>
                    </p>
                </div>
                
            </form>
            </div>
            
            <div class="col-11 col-md-10 col-xl-10 top50">
            <?php $f7c = json_decode($villa_form['provisioning'],true); ?>
            <form id="v_form_7c" role="form" enctype="multipart/form-data">
            <input type="hidden" name="txtID" value="<?php echo $form_id;?>">
            	<div class="col-md-12 nopad top15">
                    <div class="tx_head top50">C. INITIAL PROVISIONING</div>
                    <div class="top15">Please select from the <strong>provisional list</strong> attached the ingredients and groceries pre-stocked for your arrival. </div>
                    <dl class="row top20">
                    	<dt class="col-sm-3">Note</dt>
                        <dd><textarea name="tx_note_provisioning" id="tx_note_provisioning" class="inp" cols="30" rows="5"><?php echo ($f7c['note']=='')?'':$f7c['note'];?></textarea></dd>
                    </dl>
                </div>
                
                <div class="tx_head"></div>		
                <dl class="row top50">
                    <dt class="col-sm-3">Provisioning</dt>
                    <dd class="col-sm-9"><input class="inp" type="text" name="tx_Provisioning" id="tx_Provisioning" value="<?php echo ($f7c['wine']=='')?'Please select and attach back the provisional list with your requirements.':$f7c['provisioning'];?>">
                    </dd>
                    <dt class="col-sm-3">Wine List Choices</dt>
                    <dd class="col-sm-9">
                   		<?php $wine = $dbc->Query("select * from wine_list where status > 0 order by name asc");
							while($wl = $dbc->Fetch($wine))
							{
								if(in_array($wl['id'],$f7c['wine_list']))
								{
									?>
								<div class="checkbox">
									<label>
										<input type="checkbox" class="form-check-input" checked name="chk_wine[]" value="<?php echo $wl['id'];?>"> &nbsp;<?php echo $wl['name'];?>
									</label>
								</div>
								

								<?php
								}
								else
								{
									?>
								<div class="checkbox">
									<label>
										<input type="checkbox" class="form-check-input" name="chk_wine[]" value="<?php echo $wl['id'];?>"> &nbsp;<?php echo $wl['name'];?>
									</label>
								</div>
								

								<?php
								}
							}
						?>
                    </dd>
                    <dt class="col-sm-3">Wine List Link	</dt>
                    <dd class="col-sm-9"><input class="inp" type="text" name="tx_Wine_link" id="tx_Wine_link" value="<?php echo $f7c['wine_list_link'];?>">
                    </dd>
                    <?php $file_status = ($f7c['filename']!='')?1:0;?>
                    <dt class="col-sm-3">Wine List File 	</dt>
                    <dd class="col-sm-9">
                    	<p><button type="button" class="btn btn-info pull-left <?php echo isset($_SESSION['auth']['user_id'])?'':'d-none';?>" onClick="choose_photo();">Upload</button> &nbsp;
                        <span class="tx_filename" color="#ff0000" style="display:inline-block;"> <?php echo ($f7c['filename']!='')?$f7c['filename']:'Choose File';?></span>
                        <button class="btn btn-danger <?php echo isset($_SESSION['auth']['user_id'])?'':'d-none';?>"  type="button"><i class="fa fa-times btrem" aria-hidden="true" onClick="remove_file();" style="float: left;color:#fff; cursor:pointer;<?php echo ($f7c['filename']!='')?'display:block;':'display:none;';?>"></i></button>
                        </p>
                        
                        <div class="custom-file">
                            <input type="file" class="custom-file-input validate hiddens" id="img" name="img" placeholder="img" onchange="showImg(this);" style="display:none;">
                            <label class="custom-file-label hidden d-none" for="img"><?php echo $image_name; ?></label>
                            <input type="hidden" class="tx_tpath" id="tx_file_name" name="tx_file_name" value="<?php echo ($f7c['filename']!='')?$f7c['filename']:'';?>">
                            <input type="hidden" class="tx_tpath" id="tx_file_path" name="tx_file_path" value="<?php echo ($f7c['file_path']!='')?$f7c['file_path']:'';?>">
                            <input type="hidden" class="tx_tpath_oldd" id="tx_tpath_oldd" name="tx_tpath_oldd" value="<?php echo ($f7c['filename']!='')?$f7c['filename']:'';?>">
                        </div>
                    </dd>
                    <dt class="col-sm-3"></dt>
                    <dd class="col-sm-9">
                    	<p>
                        <?php
			if(isset($_SESSION['auth']['user_id']))
			{
			?>
			<button type="button" class="btn btn-primary " onClick="save_Provisioning('<?php echo $file_status;?>');"> Save</button>
			<?php } ?>
            
                        <span class="icon">
                            <i class="fa fa-check cok cok7c" aria-hidden="true"></i> <span class="tok tok7c"></span>
                            <i class="fa fa-check cno cno7c" aria-hidden="true"></i> <span class="tno tno7c"></span>
                        </span>
                        </p>
                    </dd>
                </dl>
    		</form>
            
            	<div class="col-md-12 nopad top15">
                    <div class="tx_head top50">D. SPECIAL DIETARY</div>
                    <div class="top15">Please advise of any special dietary requirements i.e. vegetarian, vegan, food allergies, low sodium, etc. </div>
                </div>
            </div>
            
             <div class="col-12 w-100"></div>
        
            <div id="PAYMENT" class=" bg_payment rela"><div class="ovl"></div>
                <div class="tx_ap2">payment on arrival</div>
            </div>
            
            <div class="col-11 col-md-10 col-xl-10 top50">
            <form id="v_form_8">
    		<input type="hidden" name="txtID" value="<?php echo $form_id;?>">
            <?php 
			$deposit =  json_decode($villa_form['deposit'],true);
			$payment_oarv =  json_decode($villa_form['datas'],true);
			
			//print_r($payment_oarv);
			//echo '<br>---'.$payment_oarv['chk_payment']['chk_1'];
			?>
            	<dl class="row">
                	<dt class="col-sm-3">PAYMENT ON ARRIVAL</dt>
                	<dd class="col-sm-9">
                    
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="1" id="chk_1" name="chk_1" <?php echo ($payment_oarv['chk_payment']['chk_1']==1)?'checked':'';?> onChange="save_payment_on_arrival();">
                      <label class="form-check-label" for="defaultCheck1">
                        Any expense made at the villa is only payable in cash
                      </label>
                    </div>
                    
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="1" id="chk_2" name="chk_2" <?php echo ($payment_oarv['chk_payment']['chk_2']==1)?'checked':'';?> onChange="save_payment_on_arrival();">
                      <label class="form-check-label" for="defaultCheck1">
                        Any expense made at the villa is payable in cash or credit card with bank fee.
                      </label>
                    </div>
					<span class="icon">
                            <i class="fa fa-check cok cok_pm" aria-hidden="true"></i> <span class="tok tok_pm"></span>
                            <i class="fa fa-check cno cno8_pm" aria-hidden="true"></i> <span class="tno tno_pm"></span>
                    </span>
                    <script>
                    function save_payment_on_arrival()
					{
						$.ajax({
							url:"libs/action_form/save_payment_on_arrival_pay_option.php",
							type:"POST",
							dataType:"json"	,
							data:$("#v_form_8").serialize(),
							success: function(res){
								if(res.status==true)
								{
									$(".cok_pm").fadeIn(300);
									$(".cno_pm,.tno_pm").hide();
								}
								else
								{
									$(".cno_pm,.tno_pm").fadeIn(300);
									$(".tno_pm").html(res.msg);
									$(".cok_pm").hide();
								}
							}
						});
					}
                    </script>
                    <br>

                   
                    
                    <?php
					if(isset($_SESSION['auth']['user_id']))
					{
					?>
					<!--<button type="button" class="btn btn-primary top15" onClick="save_deposit();"> Save</button>-->
					<?php } ?>
            
                    <!--<span class="icon">
                            <i class="fa fa-check cok cok8" aria-hidden="true"></i> <span class="tok tok8"></span>
                            <i class="fa fa-check cno cno8" aria-hidden="true"></i> <span class="tno tno8"></span>
                    </span>-->
                    </dd>
                    
                    
                	<dt class="col-sm-3">A. SECURITY DEPOSIT</dt>
                	<dd class="col-sm-9">
                    The refundable security deposit <input class="" type="text" name="tx_deposit" id="tx_deposit" placeholder="of US$1500 " value="<?php echo $deposit['deposit'];?>"> in any major currency will be collected cash upon arrival or credit card authorization.<br>
                    
					The refundable security deposit <input class="" type="text" name="tx_damage_deposit" id="tx_damage_deposit"  placeholder="USD 1,000 or THB 30,000 upon check in via cash or bank transfer." value="<?php echo $deposit['damage_deposit'];?>"> in any major currency will be collected cash upon arrival, no credit card facilities available at the villa.
                    <br>



                    <!--The refundable security deposit  in any major currency will be collected cash upon arrival or credit card authorization.<br> Damage security deposit -->
                    
                    
                    <?php
					if(isset($_SESSION['auth']['user_id']))
					{
					?>
					<button type="button" class="btn btn-primary top15" onClick="save_deposit();"> Save</button>
					<?php } ?>
            
                    <span class="icon">
                            <i class="fa fa-check cok cok8" aria-hidden="true"></i> <span class="tok tok8"></span>
                            <i class="fa fa-check cno cno8" aria-hidden="true"></i> <span class="tno tno8"></span>
                    </span>
                    <br><br>
                    </dd>
                    
                    
                    <dt class="col-sm-3">B. PAYMENT ON ARRIVAL</dt>
                    <dd class="col-sm-9">
                    	<input class="" type="text" name="tx_payment_on_arrival" id="tx_payment_on_arrival" placeholder="of US$1500 " value="<?php echo $villa_form['payment_on_arrival'];?>"> 
                        <?php
						if(isset($_SESSION['auth']['user_id']))
						{
						?>
						<button type="button" class="btn btn-primary " onClick="save_pmoarv();"> Save</button>
						<?php } ?>
            
                        <span class="icon">
                                <i class="fa fa-check cok cok8_payment_on_arrival" aria-hidden="true"></i> <span class="tok tok8_payment_on_arrival"></span>
                                <i class="fa fa-check cno cno8_payment_on_arrival" aria-hidden="true"></i> <span class="tno tno8_payment_on_arrival"></span>
                        </span>
                    </dd>
                	
                    <dt class="col-sm-3">C. REIMBURSEMENT</dt>
					<dd class="col-sm-9">At your arrival, you may be required to make cash payment to the villa manager or the concierge to cover the cost of items purchased in advance and for your anticipated requirements, such as meal orders, pre-stocking items & additional airport transfers. </dd>
                </dl>
            
            </form>
            </div>
            
            
            <div class="col-12 w-100"></div>
        
            <div id="CONCEIRGE" class=" bg_conceirge rela"><div class="ovl"></div>
                <div class="tx_ap2">conceirge services</div>
            </div>
            
            <div class="col-11 col-md-10 col-xl-10 top50 ">
            	<?php $f9 = json_decode($villa_form['service'],true);?>
                <form id="v_form_9">
                <input type="hidden" name="txtID" id="txtID_spa" value="<?php echo $form_id;?>">
                	<div class="tx_head ">CONCEIRGE SERVICES</div>
                    <div class="col top15">Any expense made at the villa is only payable in cash</div>
                    
                    <dl class="row top20">
                        <dt class="col-sm-3">Excursion & Tours</dt>
                        <dd class="col-sm-9"><input class="inp" type="text" name="tx_tour" id="tx_tour" value="<?php echo ($f9['Tours']=='')?'Yacht, speedboat, snorkeling, diving, Phuket island, Golf, cooking classes, others…':$f9['Tours'];?>"></dd>
                        <dt class="col-sm-3">Yacht Charters</dt>
                        <dd class="col-sm-9"><input class="inp" type="text" name="tx_Yacht" id="tx_Yacht" value="<?php echo ($f9['Yacht']=='')?'Yacht, speedboat, snorkeling, diving, Phuket island, Golf, cooking classes, others…':$f9['Yacht'];?>"></dd>
                        <dt class="col-sm-3">Restaurant Reservation	</dt>
                        <dd class="col-sm-9"><input class="inp" type="text" name="tx_Restaurant" id="tx_Restaurant" value="<?php echo $f9['Restaurant'];?>"></dd>
                        
                        <?php $spa_datas =  json_decode($villa_form['datas'],true);?>
						<dt class="col-sm-3">Massage & Spa</dt>
                        <dd class="col-sm-9">
                        	<input class="inp" type="text" name="tx_Massage" id="tx_Massage" value="<?php echo $f9['Massage'];?>">
                            <input class="inp " type="text" name="tx_spa_link" id="tx_spa_link" value="<?php echo $spa_datas['spa']['link'];?>" placeholder="Link" style="margin-top:8px;">
                            <input class="inp" type="hidden" name="tx_spa_file" id="tx_spa_file" value="<?php echo $spa_datas['spa']['file'];?>" style="margin-top:8px;">
                            
                            <?php
                            if(isset($_SESSION['auth']['user_id']))
                            {
                            ?>
                            <button type="button" class="btn btn-primary " onClick="choose_file_spa();" style="margin-top:8px;">Upload</button>	
                            <span class="text_spa"><?php echo $spa_datas['spa']['file'];?></span>
                            <button type="button" class="btn btn-danger btn__spa_del <?php echo ($spa_datas['spa']['file']!='')?'':'d-none';?>" onClick="remove_spa_file();" style="margin-top:8px; "><i class="fa fa-trash" aria-hidden="true"></i></button>	
                            <button type="button" class="btn btn-primary btn__save__spa " onClick="save_spa_data();" style="margin-top:8px;">Save</button>	
                            
                            <span class="icon">
                                <i class="fa fa-check cok cok_spa" aria-hidden="true"></i> <span class="tok tok_spa"></span>
                                <i class="fa fa-check cno cno_spa" aria-hidden="true"></i> <span class="tno tno_spa"></span>
                            </span>
                            
                            <?php } ?>
                            
                        </dd>
                        <dt class="col-sm-3">Special Occasion</dt>
                        <dd class="col-sm-9"><input class="inp" type="text" name="tx_Occasion" id="tx_Occasion" value="<?php echo ($f9['Occasion']=='')?'Birthday, Anniversary, Wedding, Proposal, Honeymoon, others…':$f9['Occasion'];?>"></dd>
                        <dt class="col-sm-3">Other Arrangements</dt>
                        <dd class="col-sm-9"><input class="inp" type="text" name="tx_Arrangements" id="tx_Arrangements" value="<?php echo($f9['Arrangements']=='')?'Baby equipment required, extra bed, ':$f9['Arrangements'];?>"></dd>
                        <dt class="col-sm-3">Dietary</dt>
                        <dd class="col-sm-9"><input class="inp" type="text" name="tx_Dietary" id="tx_Dietary" value="<?php echo ($f9['Dietary']=='')?'Vegan, vegetarian, gluten free, kosher, Muslim, allergies:':$f9['Dietary'];?>"></dd>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9">
                        	<p>
							<?php
                            if(isset($_SESSION['auth']['user_id']))
                            {
                            ?>
                            <button type="button" class="btn btn-primary " onClick="save_service();"> Save</button>	
                            <?php } ?>
                    
                            <span class="icon">
                                <i class="fa fa-check cok cok9" aria-hidden="true"></i> <span class="tok tok9"></span>
                                <i class="fa fa-check cno cno9" aria-hidden="true"></i> <span class="tno tno9"></span>
                            </span>
                            
                            </p>
                        </dd>
                    </dl>
                    
                </form>
        	</div>
    </div>
</div>


<form id="form_CONCEIRGE_spa" class="form-horizontal d-none" role="form" enctype="multipart/form-data" onsubmit="upload_file_spa(this);return false;">
	<input type="hidden" name="txtID" value="<?php echo $form_id;?>">
   <button type="submit" id="but_save_spa" class="btn btn-primary pull-right">Save</button>
   <input type="file" class="custom-file-input validate " id="file_spa" name="file_spa" placeholder="img" onchange="read_file_name(this);">         
   <input type="text" name="txt_spa" id="txt_spa" >         
</form>
				
<!-- new -->  
    
    
<script>
function choose_file_spa()
{
	$("#file_spa").click();
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
				$('.text_spa').html(fileName);
				$("#txt_spa").val(fileName);
				$("#but_save_spa").click();
            };
            reader.readAsDataURL(input.files[0]);
        }
    } else {
        //$('label[for="img"]').text('Choose file');
    }

}
function save_file_spa()
{
	$("#but_save_spa").click();
}

function save_spa_data()
{
	$.ajax({
		url:"libs/action_form/save_spa_data.php",
		type:"POST",
		dataType:"json",
		data:{
			txtID_spa:$("#txtID_spa").val(),
			tx_spa_link:$("#tx_spa_link").val(),
			tx_spa_file:$("#tx_spa_file").val()
		},
		success: function(res){
			if(res.status==true)
			{
				$(".cok_spa").fadeIn(300);
				$(".cno_spa,.tno_spa").hide();
			}
			else
			{
				$(".cno_spa,.tno_spa").fadeIn(300);
				$(".tno_spa").html(res.msg);
				$(".cok_spa").hide();
			}
		}
	});
}

function remove_spa_file()
{
	$("#tx_spa_file").val('');
	$(".text_spa").html('');
	$(".btn__spa_del").hide();
	$.ajax({
		url:"libs/action_form/remove_spa_data.php",
		type:"POST",
		dataType:"json",
		data:{
			txtID_spa:$("#txtID_spa").val()
			//tx_spa_link:$("#tx_spa_link").val(),
			//tx_spa_file:$("#tx_spa_file").val()
		},
		success: function(res){
			save_spa_data();
		}
	});
}

function upload_file_spa(form)
{
	var formData = new FormData($(form)[0]);
	$.ajax({
		url: "libs/action_form/upload_file_spa.php",
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
			$("#tx_spa_file").val(response.file_path);
			$("#txt_spa").val('');
			$('.text_spa').html(response.file_path);
			$(".btn__spa_del").removeClass('d-none');
			save_spa_data();
		} 
	});

}














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
    if($("#tx_in_address").val()=='')
    {
        alert_text("#tx_in_address");
    }
    else if($("#tx_in_location").val()=='')
    {
        alert_text("#tx_in_location");
    }
    /*else if($("#tx_in_phone").val()=='')
    {
        alert_text("#tx_in_phone");
    }*/
    else
    {
        $.ajax({
            url:"libs/action_form/save_information.php",
            type:"POST",
            dataType:"json",
            data:$("#v_form_11").serialize(),
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
    }
}
</script>
<script>
function save_services()
{
	if($("#tx_in_address").val()=='')
	{
		alert_text("#tx_in_address");
	}
	else
	{
		$.ajax({
			url:"libs/action_form/save_services.php",
			type:"POST",
			dataType:"json",
			data:$("#v_form_2").serialize(),
			success: function(res){
				if(res.status==true)
				{
					$(".cok02").fadeIn(300);
					$(".cno02,.tno02").hide();
				}
				else
				{
					$(".cno02,.tno02").fadeIn(300);
					$(".tno02").html(res.msg);
					$(".cok02").hide();
				}
			}
		});
	}
}
</script>   
    
<script>
function change_os_status(me)
{
	var x=0;
	if($('#chk_nsct').is(':checked'))
	{
		x=0;
	}
	else
	{
		x=1;
	}
	$.ajax({
		url:"libs/action_form/save_onsite_status.php",
		type:"POST",
		dataType:"json",
		data:{me:x,txtID:$("#txtID_os").val()},
		success: function(res){
			if(res.val==1)
			{
				$(".btn_status").text('Show');
			}
			else
			{
				$(".btn_status").text('Hide');
			}
		}
	});
}

function save_onsite()
{
	if($("#tx_onsite").val()=='')
	{
		alert_text("#tx_onsite");
	}
	else
	{
		$.ajax({
			url:"libs/action_form/save_onsite.php",
			type:"POST",
			dataType:"json",
			data:$("#v_form_3").serialize(),
			success: function(res){
				if(res.status==true)
				{
					$(".cok03").fadeIn(300);
					$(".cno03,.tno03").hide();
				}
				else
				{
					$(".cno03,.tno03").fadeIn(300);
					$(".tno03").html(res.msg);
					$(".cok03").hide();
				}
			}
		});
	}
}
</script>    
<script>
function add_aptf_box()
{
	var x='';
	x+='<div class="row top15">';
		x+='<div class="col-1 text-end">';
			x+='<button type="button" class="btn btn-danger" onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button>';
		x+='</div>';
		x+='<div class="col">';
			x+='<input type="text" name="tx_air_transfer[]"  style="width:100%;" >';//id="tx_air_transfer"
		x+='</div>';
	x+='</div>';
	$(".aptf_row").append(x);
}

function save_airrival()
{
	if($("#tx_air_check_in").val()=='')
	{
		alert_text("#tx_air_check_in");
	}
	else if($("#tx_air_check_out").val()=='')
	{
		alert_text("#tx_air_check_out");
	}
	/*else if($("#tx_air_transfer").val()=='')
	{
		alert_text("#tx_air_transfer");
	}*/
	else
	{
		$.ajax({
			url:"libs/action_form/save_arrival.php",
			type:"POST",
			dataType:"json",
			data:$("#v_form_41_2").serialize(),
			success: function(res){
				if(res.status==true)
				{
					$(".cok41").fadeIn(300);
					$(".cno41,.tno41").hide();
				}
				else
				{
					$(".cno41,.tno41").fadeIn(300);
					$(".tno41").html(res.msg);
					$(".cok41").hide();
				}
			}
		});
	}
}
</script>   
<script>
function save_menu_link()
{
	$.ajax({
		url:"libs/action_form/save_menu_link.php",
		type:"POST",
		dataType:"json",
		data:$("#v_form_7a").serialize(),
		success: function(res){
			if(res.status==true)
			{
				$(".cok7_ml").fadeIn(300);
				$(".cno7_ml,.tno7_ml").hide();
			}
			else
			{
				$(".cno7_ml,.tno7_ml").fadeIn(300);
				$(".tno7_ml").html(res.msg);
				$(".cok7_ml").hide();
			}
		}
	});
}

function add_food()
{
	var x='';
		x+='<div class="col-md-12 top15">';
				x+='<div class="col-md-1"><button type="button" class="btn btn-danger " onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button> </div>';
				x+='<div class="col-md-11"><input type="text" name="tx_food" style="width:100%;"></div>';
			x+='</div>';
	$(".box_food").append(x);
}

function save_food()
{
	var data = {
		txtID : $(".tt7").val(),
		val : []
	};
	
	$(".box_food").children().each(function(index, element) {
		data.val.push({
			tx_food : $(this).find("input[name=tx_food]").val(),
		});
	});
	
	$.ajax({
		url:"libs/action_form/save_food.php",
		type:"POST",
		dataType:"json",
		data:data,
		success: function(res){
			if(res.status==true)
			{
				$(".cok7a_1").fadeIn(300);
				$(".cno7a_1,.tno7a_1").hide();
			}
			else
			{
				$(".cno7a_1,.tno7a_1").fadeIn(300);
				$(".tno7a_1").html(res.msg);
				$(".cok7a_1").hide();
			}
		}
	});
}

function save_dinner()
{
	$.ajax({
		url:"libs/action_form/save_dinner.php",
		type:"POST",
		dataType:"json",
		data:$("#v_form_7a").serialize(),
		success: function(res){
			if(res.status==true)
			{
				$(".cok7a").fadeIn(300);
				$(".cno7a,.tno7a").hide();
			}
			else
			{
				$(".cno7a,.tno7a").fadeIn(300);
				$(".tno7a").html(res.msg);
				$(".cok7a").hide();
			}
		}
	});
}


function add_dinner()
{
	var x='';
	x+= '<div class="row nomarlr top20">';
		x+= '<div class="col-md-8 "><input class="inp" type="text" name="tx_dinner[]" id="tx_dinner"></div>';
		x+= '<div class="col-md-4"><button type="button" class="btn btn-danger " onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button></div>';
	x+= '</div>';
	$(".dinn").append(x);
}
</script>    
<script>
    function save_Complimentary()
	{
		$.ajax({
			url:"libs/action_form/save_complimentary.php",
			type:"POST",
			dataType:"json",
			data:$("#v_form_7a_11").serialize(),
			success: function(res){
				if(res.status==true)
				{
					$(".cok7a_11").fadeIn(300);
					$(".cno7a_11,.tno7a_11").hide();
				}
				else
				{
					$(".cno7a_11,.tno7a_11").fadeIn(300);
					$(".tno7a_11").html(res.msg);
					$(".cok7a_11").hide();
				}
			}
		});
	}
    </script>    
    
<script>
	function remove_file_upload(button,path,filename)
	{
		$("."+path).val('');
		$("."+filename).html('');
		$("."+button).hide();
	}
	
	function choose_file(button)
	{
		$("#"+button).click();
	}
	function showFile(input,path,filename) 
	{
		let fileName = input.files[0].name;
		if ($.trim(fileName)) {
			$('label[for="img"]').text(fileName);
			if (input.files && input.files[0]) {
				let reader = new FileReader();
				reader.onload = function (e) {
					var img = '<img src="' + e.target.result + '" width="100%" />';
					
					//$('#preview-img').html(img);
					$("#"+path).val(fileName);
					$("."+filename).html(fileName);
				};
				reader.readAsDataURL(input.files[0]);
			}
		} else {
			$('label[for="img"]').text('Choose file');
		}
	};
					
	function add_food()
	{
		var z = '';
		z += '<div class="b_sub_food top10 row">';
			z += '<div class="col-md-8  top20"> <input type="text" name="tx_b_food[]" style="width:100%"></div>';
			z += '<div class="col-md-2 top20"><button type="button" class="btn btn-danger " onClick="$(this).parent().parent().remove();"><i class="fa fa-minus" aria-hidden="true"></i></button></div>';
		z += '</div>';
		$(".b_food").append(z);
	}
	
	function save_file_uploaded(form,path,filename,button)
	{
		var sta = true;
		var formData = new FormData($(form)[0]);
		$.ajax({
			url: "libs/action_form/save_file_upload.php",
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
				$("."+filename).html(response.file_name);
				$("#"+path).val(response.file_path);
				$(".tx_b_check").val(response.file_path);
				if(response.success==true)
				{
					$("."+button).show();
					sta = true;
				}
				else
				{
					sta = false;
				}
			} 
		});
		return sta;
		
		
		
	}
	
    function save_BREAKFAST(file_status)
	{
		/*if($("#tx_BREAKFAST").val()=='')
		{
			alert_text("#tx_BREAKFAST");
		}
		else
		{*/
			if($("#tx_b_path").val()!='')
			{
				var file_new = $(".tx_b_path_old").val();
				if(file_status==1)
				{
					if($("#tx_b_path").val() != file_new)
					{
						var result = save_file_uploaded($('#v_form_7b'),'tx_b_path','tx_b_filename','b_trem');
						//alert(result);
						//console.log(save_file_uploaded($('#v_form_7b'),'tx_b_path','tx_b_filename','b_trem'));
						if(result==true)
						{
							setTimeout(function(){
								if($(".tx_b_check").val()=='')
								{
									alert("Please try again.");
								}
								else
								{
									$.ajax({
										url:"libs/action_form/save_breakfast.php",
										type:"POST",
										dataType:"json",
										data:$("#v_form_7b").serialize(),
										success: function(res){
											if(res.status==true)
											{
												$(".cok7b").fadeIn(300);
												$(".cno7b,.tno7b").hide();
												$(".tx_b_check").val('');
											}
											else
											{
												$(".cno7b,.tno7b").fadeIn(300);
												$(".tno7b").html(res.msg);
												$(".cok7b").hide();
											}
										}
									});
								}
							},1000);
						}
					}
					else
					{
						$.ajax({
							url:"libs/action_form/save_breakfast.php",
							type:"POST",
							dataType:"json",
							data:$("#v_form_7b").serialize(),
							success: function(res){
								if(res.status==true)
								{
									$(".cok7b").fadeIn(300);
									$(".cno7b,.tno7b").hide();
								}
								else
								{
									$(".cno7b,.tno7b").fadeIn(300);
									$(".tno7b").html(res.msg);
									$(".cok7b").hide();
								}
							}
						});
					}
				}
				else
				{
					var result = save_file_uploaded($('#v_form_7b'),'tx_b_path','tx_b_filename','b_trem');
					//alert(result);
					//console.log(save_file_uploaded($('#v_form_7b'),'tx_b_path','tx_b_filename','b_trem'));
					if(result==true)
					{
						setTimeout(function(){
							if($(".tx_b_check").val()=='')
								{
									alert("Please try again.");
								}
								else
								{
									$.ajax({
										url:"libs/action_form/save_breakfast.php",
										type:"POST",
										dataType:"json",
										data:$("#v_form_7b").serialize(),
										success: function(res){
											if(res.status==true)
											{
												$(".cok7b").fadeIn(300);
												$(".cno7b,.tno7b").hide();
												$(".tx_b_check").val('');
											}
											else
											{
												$(".cno7b,.tno7b").fadeIn(300);
												$(".tno7b").html(res.msg);
												$(".cok7b").hide();
											}
										}
									});
								}
						},1000);
					}
				}
				
			}
			else
			{
				$.ajax({
					url:"libs/action_form/save_breakfast.php",
					type:"POST",
					dataType:"json",
					data:$("#v_form_7b").serialize(),
					success: function(res){
						if(res.status==true)
						{
							$(".cok7b").fadeIn(300);
							$(".cno7b,.tno7b").hide();
						}
						else
						{
							$(".cno7b,.tno7b").fadeIn(300);
							$(".tno7b").html(res.msg);
							$(".cok7b").hide();
						}
					}
				});
			}
			
		/*}*/
	}
    </script>    
<script>
function remove_file()
{
	$(".tx_tpath").val('');
	$(".tx_filename").html('');
	$(".btrem").hide();
}

function choose_photo()
{
	$("#img").click();
}
function showImg(input) 
{
	let fileName = input.files[0].name;
	if ($.trim(fileName)) {
		$('label[for="img"]').text(fileName);
		if (input.files && input.files[0]) {
			let reader = new FileReader();
			reader.onload = function (e) {
				var img = '<img src="' + e.target.result + '" width="100%" />';
				
				//$('#preview-img').html(img);
				$("#tx_file_name,#tx_file_path").val(fileName);
				$(".tx_filename").html(fileName);
			};
			reader.readAsDataURL(input.files[0]);
		}
	} else {
		$('label[for="img"]').text('Choose file');
	}
};

</script>  
<script>
	function save_file_upload(form)
	{
		var formData = new FormData($(form)[0]);
		$.ajax({
			url: "libs/action_form/save_file.php",
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
				$(".tx_filename").html(response.file_name);
				$("#tx_file_name").val(response.file_name);
				$("#tx_file_path").val(response.file_path);
				if(response.file_path!=null)
				{
					$(".btrem").show();
				}
			} 
		});
	}
	
    function save_Provisioning(file_status)
	{
		/*if($("#tx_Provisioning").val()=='')
		{
			alert_text("#tx_Provisioning");
		}
		else if($("#tx_Wine").val()=='')
		{
			alert_text("#tx_Wine");
		}
		else
		{*/
			//save_file_upload($("#v_form_7c")[0]);
			if($("#tx_file_name").val()!='' && $("#tx_file_path").val()!=''  )
			{
				var file_news = $(".tx_tpath_oldd").val();
				if(file_status==1)
				{
					if(file_news !=$ ("#tx_file_name").val())
					{
						var formData = new FormData($("#v_form_7c")[0]);
						$.ajax({
							url: "libs/action_form/save_file.php",
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
								$(".tx_filename").html(response.file_name);
								$("#tx_file_name").val(response.file_name);
								$("#tx_file_path").val(response.file_path);
								if(response.file_path!=null)
								{
									$(".btrem").show();
								}
								
								$.ajax({
									url:"libs/action_form/save_provisioning.php",
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
						});
					}
					else
					{
						$.ajax({
							url:"libs/action_form/save_provisioning.php",
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
				}
				else
				{
					var formData = new FormData($("#v_form_7c")[0]);
					$.ajax({
						url: "libs/action_form/save_file.php",
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
							$(".tx_filename").html(response.file_name);
							$("#tx_file_name").val(response.file_name);
							$("#tx_file_path").val(response.file_path);
							if(response.file_path!=null)
							{
								$(".btrem").show();
							}
							
							$.ajax({
								url:"libs/action_form/save_provisioning.php",
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
					});
				}
			}
			else
			{
				$.ajax({
					url:"libs/action_form/save_provisioning.php",
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
			
			
			
		/*}*/
	}
    </script>    
<script>
    function save_special()
	{
		if($("#tx_special").val()=='')
		{
			alert_text("#tx_special");
		}
		else
		{
			$.ajax({
				url:"libs/action_form/save_special.php",
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
	}
    </script> 
<script>
	function save_pmoarv()
	{
		if($("#tx_payment_on_arrival").val()=='')
		{
			alert_text("#tx_payment_on_arrival");
		}
		else
		{
			$.ajax({
				url:"libs/action_form/save_payment_on_arrival.php",
				type:"POST",
				dataType:"json",
				data:$("#v_form_8").serialize(),
				success: function(res){
					if(res.status==true)
					{
						$(".cok8_payment_on_arrival").fadeIn(300);
						$(".cno8_payment_on_arrival,.tno8_payment_on_arrival").hide();
					}
					else
					{
						$(".cno8_payment_on_arrival,.tno8_payment_on_arrival").fadeIn(300);
						$(".tno8_payment_on_arrival").html(res.msg);
						$(".cok8_payment_on_arrival").hide();
					}
				}
			});
		}
	}
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
		if($("#tx_tour").val()=='')
		{
			alert_text("#tx_tour");
		}
		/*else if($("#tx_Restaurant").val()=='')
		{
			alert_text("#tx_Restaurant");
		}
		else if($("#tx_Massage").val()=='')
		{
			alert_text("#tx_Massage");
		}*/
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
		}
		else
		{
			$.ajax({
				url:"libs/action_form/save_service.php",
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
		}
	}
    </script>
    
     

<style>
input[type=checkbox]:checked:before {
    /* content: '\f00d'; */
    content: unset;
    margin: 2px 0 0 -1px;
    color: #ffffff;
    font-weight:bold;
    font-size:30px;
    border:none !important;
    outline:none;
    margin-top:-7px;
}
</style>  
    
    
    
    
    
    
    
    











