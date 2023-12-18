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

	$min = substr($_REQUEST['checkin'],0,2);
	$din = substr($_REQUEST['checkin'],3,2);
	$yin = substr($_REQUEST['checkin'],6,4);
	$in = $din.'/'.month($min).'/'.$yin;

	$mout = substr($_REQUEST['checkout'],0,2);
	$dout = substr($_REQUEST['checkout'],3,2);
	$yout = substr($_REQUEST['checkout'],6,4);
	$out = $dout.'/'.month($mout).'/'.$yout;

	//echo '////////////////////'.$in.'--'.$out;
	
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

	$data = array(
		'#id' => 'DEFAULT',
		'#type' => '2',
		'#property' => $_REQUEST['txtID'],
		'name' => $_REQUEST['full_name'],
		'email' => $_REQUEST['txemail'],
		'phone' => $_REQUEST['countryCode_en_d'].'-'.$_REQUEST['txsubject'],
		'message' => $_REQUEST['txmessage'],
		'#created' => 'NOW()',
		'#updated' => 'NOW()',
		'#status' => '0',
		'checkin' => $in,
		'checkout' => $out,
		'guest' => $_REQUEST['cbbGuest'],
		'children' => $_REQUEST['cbbChildren'],
		'bedroom' => $_REQUEST['no_bed'],
	);
	
	$fullname = $_REQUEST['full_name'];
	$ex_name = explode(" ",$fullname);
	$userTrimFirstName = trim($ex_name[0]);
	$phone_no = $_REQUEST['countryCode_en_d'].'-'.$_REQUEST['txsubject'];
	
	if($dbc->Insert("contact_us",$data))
	{
		$id_co = $dbc->GetID();
		$contact_us_name = $dbc->GetRecord("contact_us","*","id='".$id_co."'");
		$fullname = $contact_us_name['name'];//$_REQUEST['full_name_mo'];
		
		$prop = $dbc->GetRecord("properties","*","id=".$_REQUEST['txtID']);
		$v_name = explode("|",$prop['name']);
		$des = $dbc->GetRecord("destinations","*","id = '".$prop['destination']."'");
		$villa_name_1 = $v_name[0].', '.$des['name'];
		$posiotion_text = strrpos($v_name[0]," ");
		$complete_text = substr_replace($v_name[0],",",$posiotion_text);
		$villa_name = $complete_text.' '.$des['name'];
		//$id = $_REQUEST['tx_id'];
		//$name = $_REQUEST['tx_name'];
		//$link = '<a href="http://www.inspiringvillas.com/?page=propertydetail&id='.$_REQUEST['tx_id'].'"><button>View Detail</button></a>';
		$strTo = $_REQUEST['txemail'];//.",aobcoopy@gmail.com";
		
		$strTo = $strTo;//.",aobcoopy@gmail.com";
		$strHeader = "Content-type: text/html; charset=UTF-8\r\n"; // or UTF-8 //
		$strHeader.= "From: rsvn@inspiringvillas.com";
		
		$str_name = $fullname." Enquiry ".$villa_name;
		$strSubject = "=?utf-8?B?".base64_encode($str_name)."?=";
		
		//$strHeader .= "From: info@inspiringvillas.com";
		//$strSubject = "Thank you from inspiringvillas" ;
		
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
				We have already placed your request with the Villa Owner and will get back to you very soon.
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
			
			
			
			<button class='fine' style='background: #112845; width: 100%;color: #fff;border: none;padding: 10px;margin-bottom:15px;cursor:pointer;'>
				<div type='button' style='border-top: 1px solid #ffffff;border-bottom: 1px solid #ffffff;padding: 15px;font-size: 18px;'>OUR VILLA COLLECTIONS</div>
			</button>
			
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
		
		
		

        //$strTo = "govisible@ymail.com";
		//mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //
		newSendMail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //
		
		/*if($prop['destination']=='38')
		{
			$strTo_2 = "phuket-rsvn@inspiringvillas.com";
		}
		elseif($prop['destination']=='100')
		{
			$strTo_2 = "bali-rsvn@inspiringvillas.com";
		}
		elseif($prop['destination']=='110')
		{
			$strTo_2 = "srilanka-rsvn@inspiringvillas.com";
		}
		else
		{
			$strTo_2 = "samui-rsvn@inspiringvillas.com";
		}*/
		
		$strTo_2 = "aobcoopy@gmail.com";
		
		$strHeader_2 = "Content-type: text/html; charset=UTF-8\r\n"; // or UTF-8 //
		$strHeader_2.= "MIME-Version: 1.0' . \r\n";
		$strHeader_2.= "From: rsvn@inspiringvillas.com";
		//$strSubject_2 = $_REQUEST['full_name']." Enquiry ".$villa_name;
		$this_day = date("Y-m-d_H:i:s");
		$str_name_2 = strtolower($userTrimFirstName)." Enquiry ".$villa_name;
		$strSubject_2 = "=?utf-8?B?".base64_encode($str_name_2)."?=";//$str_name_2;//"=?utf-8?B?".base64_encode($str_name_2)."?=";
		
		//$strHeader .= "From: info@inspiringvillas.com";
		//$strSubject = "Thank you from inspiringvillas" ;
		$strMessage_2 = "<div style=\"padding:0px; background:#f5f6f5; border:1px solid #CDCDCD;width:600px;padding:10px;margin:auto;\">
				<div style=\" height: 82px; width: 100%;\">
					<div style=\"width:100%;padding: 0px 30px; \"><br>
                        <img src=\"https://www.inspiringvillas.com/libs/actions/logo.png\" width=\"80\">
                    </div>
				</div>
				<div style=\"width:100%;border-top:0px solid #CCC;margin-top: 45px;\">
					<div style=\"color: #000000;font-size:16px;\">
						<div class=\"\" style=\"border-bottom:0px solid #999;font-family: sans-serif;padding: 0px 30px;\">
                        	<h2>Thank you for your request.</h2>
							<h2>This enquiry has already been delivered direct to the villa owner</h2><br><br>
							A member of the reservation team will be back in touch with you shortly<br><br>
							<br>";
							$strMessage_2.= "Name: ".$fullname."<br>";
							$strMessage_2.= "Email: ".$_REQUEST['txemail']."<br>";
							$strMessage_2.= "Property Name: <span style=\"color:#f05542;\">".$villa_name."</span><br>";
							$strMessage_2.= "No. Bedroom: <span style=\"color:#f05542;\">".$_REQUEST['no_bed']."</span><br>";
                            $strMessage_2.= "Check In: <span style=\"color:#f05542;\">".$in."</span><br>";//$_REQUEST['checkin']
                            $strMessage_2.= "Check Out: <span style=\"color:#f05542;\">".$out."</span><br>";//$_REQUEST['checkout']
                            $strMessage_2.= "No. Adults: ".$_REQUEST['cbbGuest']."<br>";
							$strMessage_2.= "No. Children: ".$_REQUEST['cbbChildren']."<br>";
							$strMessage_2.= "Phone: ".$phone_no."<br>";
                            $strMessage_2.= "Note:".$_REQUEST['txmessage'];
							$strMessage_2.= "<a href='https://www.inspiringvillas.com/email-detail-".base64_encode($id_co)."-".base64_encode(2)."-".base64_encode('main').".html' target='_blank' ><button style='background-color: #112945;color: white;text-transform: uppercase;padding: 8px 0px 6px 0px;font-size: 12px;width: 100%;border: none; margin-top:15px; cursor:pointer;'>View Detail</button></a>";
                            $strMessage_2.= "<br><br>
                            Best Regards,<br>
                            Inspiring Villas Team
						</div>
					</div>
				</div>
                <div style=\"padding: 0px 30px;margin-top: 45px;\">
                    <div style=\"background: none;margin-top:25px;padding: 10px; !importantfont-size:11px;border-top: 1px solid #999;\">
                        <div style=\"font-size: 14px;font-family: sans-serif;color: #292929;\">
                        E:rsvn@inspiringvillas.com &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href=\"http://www.inspiringvillas.com\" target=\"_blank\" style=\"color: #292929; text-decoration:none;\">www.inspiringvillas.com</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href=\"tel:+66846771551\" style=\"color: #292929; text-decoration:none;\">T:+66 84 677 1551</a>
                        </div>
                    </div>
                </div>
			</div>";
		
        //$strTo_2 = "info@govisible.ca";	
		//mail($strTo_2,$strSubject_2,$strMessage_2,$strHeader_2);  // @ = No Show Error //
		newSendMail($strTo_2,$strSubject_2,$strMessage_2,$strHeader_2);  // @ = No Show Error //
		
		
		if($prop['email']!='')
		{
			//$strTo_3 = $prop['email'].",rsvn_partners@inspiringvillas.com";//"rsvn@inspiringvillas.com";
			$strTo_3 = "aob_405@hotmail.com,aobcoopy@gmail.com";
			$strHeader_3 = "Content-type: text/html; charset=UTF-8\r\n"; // or UTF-8 //
			$strHeader_3.= "MIME-Version: 1.0' . \r\n";
			$strHeader_3.= "From: rsvn@inspiringvillas.com";
			//$strSubject_3 = $_REQUEST['full_name']." Enquiry ".$villa_name;
			
			//$str_name_3 = $fullname." Enquiry ".$villa_name;
			//$strSubject_3 = $str_name_3;//"=?utf-8?B?".base64_encode($str_name_3)."?=";
			
			$str_name_3 = strtolower($userTrimFirstName)." Enquiry ".$villa_name;
			$strSubject_3 = "=?utf-8?B?".base64_encode($str_name_3)."?=";//$str_name_2;//"=?utf-8?B?".base64_encode($str_name_2)."?=";
		
			//$strHeader .= "From: info@inspiringvillas.com";
			//$strSubject = "Thank you from inspiringvillas" ;
			
			if($prop['destination']==38)
			{
				$desit = "Phuket";
				$elink = "/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html";
			}
			else
			{
				$desit = "Koh Samui";
				$elink = "/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html";
			}
				$strMessage_3 = "<div style='padding:0px; background:#eee; border:0px solid #CDCDCD;width:600px;margin:auto;'>
				<img src='https://www.inspiringvillas.com/upload/emphoto/p1.png' width='100%'>
				
				<div class='detail' style='font-size: 15px;margin-top:15px;padding:0px 10px;'>
					Dear Partner<br><br>
			
					Greetings from <a href='https://www.inspiringvillas.com/".$elink."'>Inspiring Villas!</a><br><br>
					
					We are pleased to notify you that we have a request for <a href='https://www.inspiringvillas.com/".$prop['ht_link'].".html'>".$villa_name."</a> with the 
					following details.<br><br>
					
					Name: ".$fullname."<br>
					Check In: ".$in."<br>
					Check Out: ".$out."<br>
					No. of Adults: ".$_REQUEST['cbbGuest']." <br>
					No. of Children: ".$_REQUEST['cbbChildren']." <br>
					No. of Bedroom: ".$_REQUEST['no_bed']." <br>";
					
					$strMessage_3.= "<a href='https://www.inspiringvillas.com/email-detail-".base64_encode($id_co)."-".base64_encode(2)."-".base64_encode('partner').".html' target='_blank' ><button style='background-color: #112945;color: white;text-transform: uppercase;padding: 8px 0px 6px 0px;font-size: 12px;width: 100%;border: none; margin-top:15px; cursor:pointer;'>View Detail</button></a>";
                 	$strMessage_3.= "<br><br>
					
					Best Regards,
					<br><br>
					Inspiring Villas Team 
					<br><br>
					Skype : inspiringvillas<br>
					iPhone/Whatsapp: +66 83 655 6452<br>
					Hong Kong: +852 8198 6765<br>
					Sydney: +28 005 7651<br>
					Phuket: +66 (0) 76 626 762<br>
					Koh Samui: +66 84 677 1551 <br>
					website: <a href='https://www.inspiringvillas.com/'>www.inspiringvillas.com</a>
					<br><br>
					
					
				</div>
			   <img src='https://www.inspiringvillas.com/upload/emphoto/p4.png' width='100%' >
			   </div>
			</div>";
				//Note: ".$_REQUEST['txmessage']."

////////			//$strTo_3 = "wolf@govisible.ca";	
////////			//mail($strTo_3,$strSubject_3,$strMessage_3,$strHeader_3);  // @ = No Show Error //
			newSendMail($strTo_3,$strSubject_3,$strMessage_3,$strHeader_3);  // @ = No Show Error //
		}
		
		echo json_encode(
			array(
				'status' => true,
				'msg' => 'Success full'
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
	}
?>