<div class="container-fluid footer_box">
	<div class="row justify-content-center">
    	<div class="col-12 col-md-12">
        	<div class="row">
            	<div class="col-5 col-sm-6 col-lg-3 t_t1- text-center"><a href="/"><img src="../../upload/new_design/img-top-Logo.png" class="footer_logo" alt=""></a></div>
                <div class="col-7 col-sm-6 col-lg-3 t_t2-">
                	<ul class="ft_menu">
                    	<li><a href="/our-service">our services</a></li>
                        <li><a href="/blog">bolg & lifestyle</a></li>
                        <li><a href="/faq">faq</a></li>
                        <li><a href="/villa-promotions">promotions</a></li>
                        <li><a href="/aboutus">about us</a></li>
                        <li><a href="/terms">terms & conditions</a></li>
                        <li><a href="/privacy">privacy</a></li>
                    </ul>
                </div>
              	<div class="col-9 col-md-9 col-lg-4 t_t3-">
                	<div id="mc_embed_signup2">
                    	<div class="foot_nlt">newsletter</div>
                        <form action="https://inspiringvillas.us16.list-manage.com/subscribe/post?u=8799b771b290a84cd6090d2c1&amp;id=5298a5b57a" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                            <div id="mc_embed_signup_scroll">
                            
                            <input type="email" value="" name="EMAIL" class="email emailsub" id="mce-EMAIL" placeholder="Enter Your Email Address" required>
                            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_8799b771b290a84cd6090d2c1_5298a5b57a" tabindex="-1" value=""></div>
                            <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn_subscribe" style="font-family: pt !important;"></div><!--btn btn-main btnn2-->
                            </div>
                        </form>
                    </div>
                    
                    <div class="tx_footer2 web">Let's socialize</div>
                    <ul class="footer_icon web ">
                        <li><a href="#"><img src="../../upload/new_design/footer/img-footer-sub-icon-map.png" alt=""></a></li>
                        <li><a href="#"><img src="../../upload/new_design/footer/img-footer-sub-icon-call.png" alt=""></a></li>
                        <li><a href="#"><img src="../../upload/new_design/footer/img-footer-sub-icon-cwhatapp.png" alt=""></a></li>
                        <li><a href="#"><img src="../../upload/new_design/footer/img-footer-sub-icon-web.png" alt=""></a></li>
                        <li><a href="#"><img src="../../upload/new_design/footer/img-footer-sub-icon-mail.png" alt=""></a></li>
                        <li><a href="https://www.facebook.com/inspiringvillas"><img src="../../upload/new_design/footer/img-footer-sub-icon-facebook.png" alt=""></a></li>
                        <li><a href="https://www.instagram.com/inspiringvillas/"><img src="../../upload/new_design/footer/img-footer-sub-icon-ig.png" alt=""></i></a></li>
                        <li><a href="#"><img src="../../upload/new_design/footer/img-footer-sub-icon-twister.png" alt=""></a></li>
                        <li><a href="#"><img src="../../upload/new_design/footer/img-footer-sub-icon-skype.png" alt=""></a></li>

                        <?php /*?><li><a href="https://twitter.com/inspiringvillas/"><i class="fa fa-twitter"></i></a></li><?php */?>
                        <!--<li><a href="https://plus.google.com/112701507552163060701"><i class="fa fa-google-plus"></i></a></li>-->
                    </ul>
                        
                </div>
                <div class="col-3 col-md-3 col-lg-2 t_t4-"><img src="/upload/pata.png" width="165" class="pata_img" alt="PATA Logo"></div>
                
                <div class="col-12 mob text-center">
                	<div class="tx_footer2">Let's socialize</div>
                        <ul class="footer_icon text-center">
                        <li><a href="#"><img src="../../upload/new_design/footer/img-footer-sub-icon-map.png" alt=""></a></li>
                        <li><a href="#"><img src="../../upload/new_design/footer/img-footer-sub-icon-call.png" alt=""></a></li>
                        <li><a href="#"><img src="../../upload/new_design/footer/img-footer-sub-icon-cwhatapp.png" alt=""></a></li>
                        <li><a href="#"><img src="../../upload/new_design/footer/img-footer-sub-icon-web.png" alt=""></a></li>
                        <li><a href="#"><img src="../../upload/new_design/footer/img-footer-sub-icon-mail.png" alt=""></a></li>
                        <li><a href="https://www.facebook.com/inspiringvillas"><img src="../../upload/new_design/footer/img-footer-sub-icon-facebook.png" alt=""></a></li>
                        <li><a href="https://www.instagram.com/inspiringvillas/"><img src="../../upload/new_design/footer/img-footer-sub-icon-ig.png" alt=""></i></a></li>
                        <li><a href="#"><img src="../../upload/new_design/footer/img-footer-sub-icon-twister.png" alt=""></a></li>
                        <li><a href="#"><img src="../../upload/new_design/footer/img-footer-sub-icon-skype.png" alt=""></a></li>
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</div>

<?php 
include "page_messenger_chat.php";?>
 
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
    <div class="pdpa_area text-center animate__animated animate__fadeInUp animate__fast">
        <div class="papd_text">This site uses cookies in order to improve your browsing experience. GDPR
        <!--and to provide content tailored specifically to your interests. By continuing to browse our site you agree to our use of cookies, <a href="/privacy">Data Privacy Policy</a> and <a href="/terms">Terms & Conditions</a>. -->
        <br>
        <button class="btn_pdpa" onClick="agree_pdpa2();">decline</button>
        <button class="btn_pdpa allo" onClick="agree_pdpa2();">allow</button>
        </div>
    </div>
	<?php /*?><div class="pdpa_area">
        <div class="papd_text">This site uses cookies in order to improve your user experience and to provide content tailored specifically to your interests. By continuing to browse our site you agree to our use of cookies, <a href="/privacy">Data Privacy Policy</a> and <a href="/terms">Terms & Conditions</a>. 
        <button class="btn_pdpa" onClick="agree_pdpa();">Agree</button></div>
    </div><?php */?>
   
<?php
}
$actual_link = $_SERVER['REQUEST_URI'];//(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]".$_SERVER['REQUEST_URI'];?>

<a target="_blank" href="https://api.whatsapp.com/send?phone=66846771551&text=I want more information about => <?php echo $actual_link;?>"><button class="box_whatsapp" type="button"><img class="share_icon center-block" src="../../upload/whatsapp_new.png" width="30"></button></a>

<script>
function agree_pdpa2()
{
	$(".pdpa_area").fadeOut(300);
}
function agree_pdpa()
{
	$.ajax({
		url:"<?php echo $url_link;?>/libs/actions/set_cookie_data.php",
		type:"POST",
		dataType:"json"	,
		data:{actual_link : '<?php echo $actual_link;?>'},
		success: function(res){
			if(res.status==true)
			{
				$(".pdpa_area").fadeOut(300);
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
/*.box_whatsapp
{
	background:#ffffff96;
	outline:none;
	border:1px solid #112845;
	border-radius:100%;
	position:fixed;
	right:0;
	z-index:10;
	bottom:0;
	height:45px;
	width:45px;
	padding:5px;
	margin-right:95px;
	margin-bottom:24px;
}*/
.up {
    margin-right: 23px;
    margin-bottom: 95px;
}
/*.pdpa_area
{
	background:#061120;
	width:100%;
	padding:10px 15px;
	position:fixed;
	bottom:0;
	color:#fff;
}
.btn_pdpa
{
	background:#fff;
	color:#f03929;
	border-radius:0px;
	transition:all 0.3s;
	padding:5px 20px;
}*/

</style>