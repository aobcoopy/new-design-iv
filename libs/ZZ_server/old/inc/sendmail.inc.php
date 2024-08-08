<?php

    // Edit the Email Account Config Here
    
    //define("_EMAIL_ACCOUNT","rsvn.inspiringvillas@gmail.com");
//    define("_EMAIL_PASSWORD","SwNDjXAvTjKUCxNfLcgW");
    /*define("_EMAIL_ACCOUNT","rsvn@inspiringvillas.com");
    define("_EMAIL_PASSWORD","Rsvn_VI-MAIL@51");*/
	define("_EMAIL_ACCOUNT","rsvn@inspiringvillas.com");
    define("_EMAIL_PASSWORD","pfcixjdixxdvzzhc");
	//define("_EMAIL_ACCOUNT","myself.graphic@gmail.com");
//    define("_EMAIL_PASSWORD","mquisiyjqmmlfwln");
	
    define("_EMAIL_PORT","587");
    define("_EMAIL_HOST","smtp.gmail.com"); 
        
    /////////////////////////////////////

    use PHPMailer\PHPMailer\PHPMailer;
    require __DIR__ . '/vendor/autoload.php';

    function newSendMail($strTo,$strSubject,$strMessage,$strHeader='')
    {
        global $dbc;
        
        $data = array(
            "subject" => addslashes($strSubject),
            "recipients" => $strTo,
            "message" => addslashes($strMessage),
            "header" => addslashes($strHeader),
            "status" => "waiting",
            "#created_at" => "NOW()"
        );  
        
        $dbc->Insert("asynchronous_emails", $data); 
        
        return true;         
        
    }
    
    function sendWithPhpMailer($strTo,$strSubject,$strMessage,$strHeader='')
    {    
        global $debug;
        
        // Uncomment to test sendmail function
        //$strTo = "info@govisible.ca"; 
      
        // old. Do not use! 
        /*$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);
        
        if($flgSend) return true;
        else return false;*/ 
        
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 2;
        $mail->Debugoutput = 'html';
        $mail->Host = _EMAIL_HOST; 
        $mail->SMTPSecure = 'tls';
        $mail->Port = _EMAIL_PORT;
        $mail->SMTPAuth = true;
        $mail->Username = _EMAIL_ACCOUNT;
        $mail->Password = _EMAIL_PASSWORD;
        $mail->setFrom(_EMAIL_ACCOUNT, 'Inspiring Villas Team');
        $mail->addReplyTo(_EMAIL_ACCOUNT, 'Inspiring Villas Team');
        //$mail->addAddress($strTo, 'Receiver Name');
        
        // various recipients, seperated by ','
        if (strpos($strTo, ',') !== false){
            
            $recipients = explode(",", str_replace(" ", "", $strTo) );
            
            $mail->addAddress($recipients[0]);
            
            for($i=1;$i<=count($recipients);$i++){
                
                $mail->AddCC($recipients[$i]);
            
            }            
            
        } else $mail->addAddress($strTo);
        
        $mail->Subject = $strSubject;
        $mail->msgHTML($strMessage, __DIR__);
        //$mail->addCustomHeader($strHeader); //NOT WORKING
        //$mail->AltBody = 'This is a plain text message body';
        //$mail->addAttachment('test.txt');
        
        // logging the errors
        $debug = '';
        $mail->Debugoutput = function($str, $level) {
            $GLOBALS['debug'] .= "$level: $str\n";
        };
        
        if (!$mail->send()) return $debug;
        else return "sent";
     
    }

?>