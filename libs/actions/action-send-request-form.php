<?php 
	session_start();
	include_once "../../config/define.php";
	include_once "../class/db.php";
	include_once "../class/minerva.php"; 
        include_once "../../inc/sendmail.inc.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	$os = new minerva($dbc);
	
	$yin = substr($_REQUEST['Arrival'],0,4);
	$min = substr($_REQUEST['Arrival'],5,2);
	$din = substr($_REQUEST['Arrival'],8,2);
	$in = $din.'/'.month($min).'/'.$yin;

	$yout = substr($_REQUEST['Departure'],0,4);
	$mout = substr($_REQUEST['Departure'],5,2);
	$dout = substr($_REQUEST['Departure'],8,2);
	$out = $dout.'/'.month($mout).'/'.$yout;
	
	function month($data)
	{
		$m = $data;
		switch($m)
		{
			case'01':  $month = 'Jan';break;
			case'02':  $month = 'Feb';break;
			case'03':  $month = 'Mar';break;
			case'04':  $month = 'Apr';break;
			case'05':  $month = 'May';break;
			case'06':  $month = 'Jun';break;
			case'07':  $month = 'Jul';break;
			case'08':  $month = 'Aug';break;
			case'09':  $month = 'Sep';break;
			case'10':  $month = 'Oct';break;
			case'11':  $month = 'Nov';break;
			case'12':  $month = 'Dec';break;
		}
		return  $month;
	}
	
	$fullname = $_REQUEST['f_name'].'  '.$_REQUEST['l_name'];
	$email = $_REQUEST['tx_email'];
	$phone = $_REQUEST['countryCode2'].'-'.$_REQUEST['tx_tel'];
	
	function get_client_ip() 
	{
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
		   $ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}
	
	
	$data = array(
		'#id' => 'DEFAULT',
		'#type' => '3',
		'name' => $fullname,
		'email' => $email,
		'phone' => $phone,
		'message' => base64_encode($_REQUEST['Message']),
		'#created' => 'NOW()',
		'#updated' => 'NOW()',
		'#status' => '0',
		'checkin' => $in ,
		'checkout' => $out,
		'destination' => $_REQUEST['cbb_destination'],
		'guest' => $_REQUEST['cbb_Adults'],
		'children' => $_REQUEST['cbb_Children'],
		'bedroom' => $_REQUEST['cbb_Bedrooms'],
		'country' => $_REQUEST['cbbCountry'],
		'budget' => $_REQUEST['cbb_Budget'],
		'cipadd' => $_REQUEST['txtIP'].' / '.get_client_ip(),
	);
	/*$secret = "6LfbCgMoAAAAACNdyVkKNrHdFFsZr3-GF2HxSp9l";
	if(isset($_POST['g-recaptcha-response']))
	{
		$captcha = $_POST['g-recaptcha-response'];
		$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$captcha);
		$responseData = json_decode($verifyResponse);
		
		if(!$captcha)
		{
			echo json_encode(
				array(
					'status' => false,
					'msg' => 'Please check reCAPTCHA'
				)
			);
		}
		else
		{
			if($responseData->success)
			{*/
				if($dbc->Insert("contact_us",$data))
				{
					$to = $email;
					$strTo = $to;//.",aobcoopy@gmail.com";
					$strHeader = "Content-type: text/html; charset=UTF-8\r\n"; // or UTF-8 //
					$strHeader .= "From: rsvn@inspiringvillas.com";
					$strSubject = "Thank You from Inspiring Villas" ;
					
					$strMessage = "
					
					<style type='text/css'>
					
					body{
						width: 100%; 
						background-color: #FFFFFF; 
						margin:0; 
						padding:0; 
						-webkit-font-smoothing: antialiased;
						-webkit-text-size-adjust:none;
						-ms-text-size-adjust: 100%;
						-webkit-text-size-adjust: 100%;
						mso-margin-top-alt:0px; mso-margin-bottom-alt:0px; mso-padding-alt: 0px 0px 0px 0px;
					}
					
					p,h1,h2,h3,h4{
						margin-top:0;
						margin-bottom:0;
						padding-top:0;
						padding-bottom:0;
					}
					
					
					html{
						width: 100%; 
					}
					
					a:link, span.MsoHyperlink {
						mso-style-priority:99;
						color:blue;
						text-decoration:underline;
					}
					
					/* iOS BLUE LINKS */
					a[x-apple-data-detectors] {
						color: inherit !important;
						text-decoration: none !important;
						font-size: inherit !important;
						font-family: inherit !important;
						font-weight: inherit !important;
						line-height: inherit !important;
					}
					.fix {
					 display:none;
					 display:none!important;
					}
					
					
				</style>
					
				
				
				
				
				
					<div style='padding:0px; background:#fff; border:0px solid #CDCDCD;width:600px;margin:auto;'>
						<img src='https://www.inspiringvillas.com/upload/emphoto/p1.png' width='100%'>
						<center>
							<h2>Thank you for your request</h2>
						</center>
						<div class='detail' style='font-size: 15px;padding:0px 10px;'><br>
							
							A villa specialist will contact you shortly to help you plan your stay.<br><br>
							
							<strong>Why choose Inspiring Villas?</strong><br><br>
							
							-Experienced Villa Specialists providing a complete concierge service<br>
							-Best Price Guaranteed Always with no booking fees & no hidden charges<br>
							-<strong>$150 credit on any excursion you book with us for your villa stay</strong>
							<br><br><br>
							
							<div class='l' style='width: 50%;float: left;height: 90px;'>
								<strong>Best Regards</strong>,<br><br> 
								
								Inspiring Villas Team 
							</div>
					
							<div class='r' style=' width: 50%;float: right;height: 90px;'>
								<img src='https://www.inspiringvillas.com/upload/PATA-Member-Logo-H.jpg' style='width: 110px;    margin-left: 180px; '>
							</div>
							
							
						</div>
						
					   <a href='https://www.inspiringvillas.com/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html' style='cursor:pointer'>
							<button class='fine' style='background: #112845; width: 100%;color: #fff;border: none;padding: 10px;margin-bottom:15px;cursor:pointer;'>FIND MORE THAILAND VILLAS</button>
					   </a>
					   
					   
					   
					   <a href='https://www.inspiringvillas.com/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html' target='_blank'>
					   <img src='https://www.inspiringvillas.com/upload/emphoto/p21.png' width='100%' style='margin-bottom:15px;'>
					   </a>
					   
						<a href='https://www.inspiringvillas.com//search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html' target='_blank'>
						<img src='https://www.inspiringvillas.com/upload/emphoto/p31.png' width='100%' style='margin-bottom:15px;'>
						</a>
						
						
						
						<a href='https://www.inspiringvillas.com/luxury-villas/villa-viva-panwa/cape-panwa-phuket-thailand.html' target='_blank'>
							<img src='https://www.inspiringvillas.com/upload/emphoto/02.png' width='100%' style='margin-bottom:15px;'>
						</a>
						
						<a href='https://www.inspiringvillas.com/luxury-villas/villa-thousand-hills/nai-harn-phuket-thailand.html' target='_blank'>
							<img src='https://www.inspiringvillas.com/upload/emphoto/05.png' width='100%' style='margin-bottom:15px;'>
						</a>
						
						<a href='https://www.inspiringvillas.com/luxury-villas/talay-nai-harn-villa/nai-harn-phuket-thailand.html' target='_blank'>
							<img src='https://www.inspiringvillas.com/upload/emphoto/01.png' width='100%' style='margin-bottom:15px;'>
						</a>
						
						<a href='https://www.inspiringvillas.com/luxury-villas/villa-yang/kamala-phuket-thailand.html' target='_blank'>
							<img src='https://www.inspiringvillas.com/upload/emphoto/yang.jpg' width='100%' style='margin-bottom:15px;'>
						</a>
						
						<a href='https://www.inspiringvillas.com/luxury-villas/villa-thousand-cliffs/nai-harn-phuket-thailand.html' target='_blank'>
							<img src='https://www.inspiringvillas.com/upload/emphoto/03.png' width='100%' style='margin-bottom:15px;'>
						</a>
						
						<a href='https://www.inspiringvillas.com/luxury-villas/villa-chan-grajang/surin-phuket-thailand.html' target='_blank'>
							<img src='https://www.inspiringvillas.com/upload/emphoto/10.png' width='100%' style='margin-bottom:15px;'>
						</a>
						
						<a href='https://www.inspiringvillas.com/luxury-villas/the-kamonchat/kamala-phuket-thailand.html' target='_blank'>
							<img src='https://www.inspiringvillas.com/upload/emphoto/km01.jpg' width='100%' style='margin-bottom:15px;'>
						</a>
						
						<a href='https://www.inspiringvillas.com/luxury-villas/la-colline-villa-napalai/layan-phuket-thailand.html' target='_blank'>
							<img src='https://www.inspiringvillas.com/upload/emphoto/npl01.jpg' width='100%' style='margin-bottom:15px;'>
						</a>
			
						<a href='https://www.inspiringvillas.com/luxury-villas/la-colline-villa-suriyan/layan-phuket-thailand.html' target='_blank'>
							<img src='https://www.inspiringvillas.com/upload/emphoto/suriyan.jpg' width='100%' style='margin-bottom:15px;'>
						</a>
			
						<a href='https://www.inspiringvillas.com/luxury-villas/villa-soraya/surin-phuket-thailand.html' target='_blank'>
							<img src='https://www.inspiringvillas.com/upload/emphoto/soraya.jpg' width='100%' style='margin-bottom:15px;'>
						</a>
			   
			   
			   
						   <div class='foot' style='background: #3a3a3a; padding: 20px; color:#fff;font-size: 14px;'>
								<center>
									<a href='' style='padding: 10px;'><img src='https://www.inspiringvillas.com/upload/emphoto/facebook_icon.png'></a>
									<a href='' style='padding: 10px;'><img src='https://www.inspiringvillas.com/upload/emphoto/twitter_icon.png'></a>
									<a href='' style='padding: 10px;'><img src='https://www.inspiringvillas.com/upload/emphoto/instagram_icon.png'></a>
									<a href='' style='padding: 10px;'><img src='https://www.inspiringvillas.com/upload/emphoto/hyperlink_icon.png'></a>
									<a href='' style='padding: 10px;'><img src='https://www.inspiringvillas.com/upload/emphoto/skype_icon.png'></a>
									<hr style='margin-top:15px;'>
									<div style='margin-top:15px;padding:10px 0px 15px 0px;'>
										<strong>Contact Us</strong><br><br>
										Skype <a href='skype:Inspiringvillas?call' target='_blank' style=' color:#fff;'>inspiringvillas</a><br>
										Samui <a href='tel:+66836556452' style=' color:#fff;'>+66 83 655 6452</a><br>
										Phuket <a href='tel:+66846771551' style=' color:#fff;'>+66 84 677 1551</a><br>
										Thailand <a href='tel:+6676626762' style=' color:#fff;'>+66 (0)76 626 762</a><br>
										Hong Kong <a href='tel:+85281986765' style=' color:#fff;'>+852 8198 6765</a><br>
										Website: <a href='https://www.inspiringvillas.com/' style=' color:#fff;'>www.inspiringvillas.com</a>
										
									</div>
									<hr>
									<div style='margin-top:15px;'><em>Copyright &copy; 2018 InspiringVillas, All rights reserved</em></div>
								</center>
						   </div>
					</div>";
						
						
			
			
			
					//$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //
					$flgSend = newSendMail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //
					
					if($flgSend)
					{
			
						$strTo_2 = "rsvn@inspiringvillas.com";
						//$strTo_2 = "aobcoopy@gmail.com";
						$strHeader_2 = "Content-type: text/html; charset=UTF-8\r\n"; // or UTF-8 //
						$strHeader_2 .= "From: rsvn@inspiringvillas.com";
						$strSubject_2 = "Thank You from Inspiring Villas" ;
						$strMessage_2 = "<div style=\"padding:0px; background:#fff; border:1px solid #CDCDCD;width:600px;padding:10px;\">
							<div style=\" height: 82px; width: 100%;\">
								<div style=\"width:100%; \">
									<center>
										<img src=\"https://www.inspiringvillas.com/libs/actions/logo.png\" width=\"80\">
									</center>
								</div>
							</div>
							<div style=\" width:100%; border-top:0px solid #CCC;margin-top:25px;\">
								<div style=\"color:#999999;font-size:16px;\">
									<div class=\"\" style=\"border-bottom:0px solid #999;font-family: sans-serif;padding: 0px 30px;\">
										Thank you for contacting us. We have received your enquiry, our team will get back to you as soon as we can.<br><br>";
										$strMessage_2.= "Name : ".$fullname."<br>";
										$strMessage_2.= "Email : ".$email."<br>";
										$strMessage_2.= "Phone : ".$phone."<br>";
										$strMessage_2.= "Arrival : ".$in ."<br>";
										$strMessage_2.= "Departure : ".$out."<br>";
										$strMessage_2.= "Destination : ".$_REQUEST['cbb_destination']."<br>";
										$strMessage_2.= "Number of Adults : ".$_REQUEST['cbb_Adults']."<br>";
										$strMessage_2.= "Number of Children : ".$_REQUEST['cbb_Children']."<br>";
										$strMessage_2.= "Required Number of Bedrooms : ".$_REQUEST['cbb_Bedrooms']."<br>";
										$strMessage_2.= "Country of Residence : ".$_REQUEST['cbbCountry']."<br>";
										$strMessage_2.= "Budget per night (USD) : ".$_REQUEST['cbb_Budget']."<br>";
										$strMessage_2.= "Note :".$_REQUEST['Message']."
									</div>
								</div>
							</div>
							<div style=\" background: #0c2647;margin-top:25px;padding:20px;color: #ffffff !important;font-size:11px;\">
								<div style=\"font-size: 14px;font-family: sans-serif;color: #ffffff;\">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E:rsvn@inspiringvillas.com &nbsp;&nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;&nbsp;&nbsp;
								<a href=\"http://www.inspiringvillas.com\" target=\"_blank\" style=\"color: #fff;\">www.inspiringvillas.com</a>&nbsp;&nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;&nbsp;&nbsp;
								<a href=\"tel:+66915046665\"  style=\"color: #fff;\">T:+66 84 677 1551</a>
								</div>
							</div>
						</div>";
						
							//mail($strTo_2,$strSubject_2,$strMessage_2,$strHeader_2); 
							newSendMail($strTo_2,$strSubject_2,$strMessage_2,$strHeader_2); 
						
						echo json_encode(
							array(
								'status' => true,
								'msg' => 'Successfull'
							)
						);
					}
					else
					{
						echo json_encode(
							array(
								'status' => false,
								'msg' => 'Please try again'
							)
						);
						//echo "Email Can Not Send.";
					}
	
		
	}
				else
				{
					echo json_encode(
						array(
							'status' => false,
							'msg' => 'Please try again'
						)
					);
				}
				
			/*}
		}
	}
	else
	{
		echo json_encode(
				array(
					'status' => false,
					'msg' => 'Please check reCAPTCHA'
				)
			);
	}*/
	
?>
