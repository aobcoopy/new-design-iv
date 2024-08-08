<?php 
//-- dselete cookie
/*$cookie_time = time() - 3600;
$cookie_name = ['iv_usdv','iv_usip','iv_usurl','iv_svip','iv_usssid','iv_usmb'];//"";

for($xx=0;$xx<=count($cookie_name);$xx++)
{
	setcookie($cookie_name[$xx], '',$cookie_time , "/");
}*/
//-- dselete cookie
	
if(isset($_COOKIE['iv_usip']))
{
}
else
{
	?>
	<!--<div class="pdpa_area">
        <div class="papd_text">This site uses cookies in order to improve your user experience and to provide content tailored specifically to your interests. By continuing to browse our site you agree to our use of cookies, <a href="/privacy">Data Privacy Policy</a> and <a href="/terms">Terms & Conditions</a>. 
        <button class="btn_pdpa" onClick="agree_pdpa();">Agree</button></div>
    </div>-->
    <!--<div class="pdpa_area_new" style="display:none;">
    	<button class="btn___close_consent" onClick="close_consent();"><i class="fa fa-times" aria-hidden="true"></i></button>
        <div class="papd_text">This site uses cookies in order to improve your user experience and to provide content tailored specifically to your interests. By continuing to browse our site you agree to our use of cookies, <a href="/privacy">Data Privacy Policy</a> and <a href="/terms">Terms & Conditions</a>. 
        <div class="boo"><button class="btn_consent" onClick="agree_pdpa_new('Decline'),allConsentDenied();">Decline</button>
        <button id="btn__consent" class="btn_consent actt" onClick="agree_pdpa_new('Agree'),allConsentGranted();">Agree</button>
        <?php /*?><button id="btn__consent" class="btn_consent actt" onClick="agree_pdpa_new('Agree');">Agree</button><?php */?>
        </div>
        </div>
    </div>-->
<?php
}
?>
    
<script>
$(document).ready(function(e) {
    setTimeout(function(){
		$(".pdpa_area_new").fadeIn(300);
	},3000);
});
function close_consent()
{
	$(".pdpa_area_new").fadeOut(300);
}

function agree_pdpa_new(agreement)
{
	$.ajax({
		url:"<?php echo $url_link;?>/libs/actions/set_cookie_data.php",
		type:"POST",
		dataType:"json"	,
		data:{
			actual_link : '<?php echo $actual_link;?>',
			agreement:agreement
		},
		success: function(res){
			if(res.status==true)
			{
				$(".pdpa_area_new").fadeOut(300);
				/*alert(res.msg);
				window.location.reload();*/
			}
			else
			{
				alert(res.msg);
				return false;
			}
		}
	});
}
</script>

<style>
.up {
    margin-right: 23px;
    margin-bottom: 85px;
}
</style>
<?php
$pagg=isset($_REQUEST['page'])?$_REQUEST['page']:'home';
//echo $pagg;
if($pagg=='propertydetail')
{
	?>
    <style>
    @media screen and (max-width:768px)
	{
		.pdpa_area_new
		{
			width: 100% !important;
			margin-left: 0px !important;
			left: 0 !important;
			/* transform: translate(-50%); */
			border-radius: 0px !important;
			/* margin-bottom: 187px; */
			padding: 6px !important;
			top: 0;
			bottom: unset !important;
			font-size: 11px;
			line-height: 0.95;
			margin-top: 70px;
		}
		.up {
			margin-right: 23px;
			margin-bottom: 85px !important;
		}
	}
    </style>
	
	<?php
}
else
{
	?>
    <style>
    @media screen and (max-width:768px)
	{
		.pdpa_area_new 
		{
			width: 100% !important;
			margin-left: 0px !important;
			left: 0 !important;
			/* transform: translate(-50%); */
			border-radius: 0px !important;
			margin-bottom: 0px !important;
			padding: 6px !important;
			top: unset;
			bottom: 0 !important;
			font-size: 11px;
			line-height: 0.95;
			margin-top: 70px;
		}
		.up {
			margin-right: 23px;
			margin-bottom: 90px;
		}
	}
    </style>
	
	<?php
}
?>


<style>
.btn___close_consent
{
	position:absolute;
	left:100%;
	margin-left:-25px;
	margin-top:-18px;
	border:none;
	background:none;
}
.pdpa_area_new
{
	position:fixed;
	bottom:0;
	left:0;
	z-index:1200;
	width: 570px;
	background:#fff;
	padding:20px;
	border-radius:10px;
	margin-left:20px;
	margin-bottom:20px;
	box-shadow: 0px 0px 10px #cbcbcb;
}
.btn_consent
{
	background:#fff;
	border:1px solid #183251;
	color:#183251;
	text-align:center;
	margin:0 auto;
	padding:5px 25px 3px 25px;
	margin-top:15px;
}
.actt
{
	background:#183251 !important;
	color:#fff !important;
}
@media screen and (max-width:768px)
{
	/*.pdpa_area_new
	{
		width: 90%;
		margin-left: 0px;
		left: 50%;
		transform:translate(-50%);
	}*/
	/*.pdpa_area_new
	{
		width: 100%;
        margin-left: 0px;
        left: 0;
        border-radius: 0px;
        margin-bottom: 0px;
        padding: 6px;
	}*/
	.btn___close_consent
	{
		bottom: 0;
	}
	.btn_consent
	{
		margin-top:5px;
	}
	
}
.box_whatsapp {
    background: #ffffff96;
    outline: none;
    border: 1px solid #112845;
    border-radius: 100%;
    position: fixed;
    right: 0;
    z-index: 1205;
    bottom: 0;
    height: 45px;
    width: 45px;
    padding: 5px;
    margin-right: 19px;
    margin-bottom: 134px;
}
</style>    