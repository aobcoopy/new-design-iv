<?php

    // Edit the Email Account Config Here
/*    
    define("_EMAIL_ACCOUNT","govisible@ymail.com");
    define("_EMAIL_PASSWORD","w3tBGh_oujzmEby");
    define("_EMAIL_PORT","465");
    define("_EMAIL_HOST","smtp.mail.yahoo.ca"); 
*/    
    define("_EMAIL_ACCOUNT","rsvn.inspiringvillas@gmail.com");
    define("_EMAIL_PASSWORD","SwNDjXAvTjKUCxNfLcgW");
    define("_EMAIL_PORT","587");
    define("_EMAIL_HOST","smtp.gmail.com"); 
        
    /////////////////////////////////////
    
    

    use PHPMailer\PHPMailer\PHPMailer;
    require __DIR__ . '/vendor/autoload.php';

    function newSendMail($strTo,$strSubject,$strMessage,$strHeader='')
    {
        
        // Uncomment to test sendmail function
        //$strTo = "info@govisible.ca";
        
/*      
        // old. Do not use! 
        $flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);
        
        if($flgSend) return true;
        else return false;        
*/       

         
         
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0; // set to 2 for testing purposes
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
            
            $recipients = explode(",", $strTo);
            
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
        
        if (!$mail->send()) return false;
        else return true;
  
   
     
    }


?>