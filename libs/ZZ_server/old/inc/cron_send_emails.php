<?php

    // run this script as cron job
    // ***** php /var/www/html/inspiringvillas.com/inc/cron_send_emails.php (staging server)
    // ***** php /externalVolume/html/inspiringvillas.com/inc/cron_send_emails.php (live server)
    
    // staging server
    $sitePath = "/var/www/html/inspiringvillas.com";
    
    // live server
    //$sitePath = "/externalVolume/html/inspiringvillas.com"; 
    
    // local server
    //$sitePath = ".."; 
    
    include_once $sitePath. "/config/define.php";
    include_once $sitePath. "/inc/sendmail.inc.php";
    include_once $sitePath. "/libs/class/db.php";
    include_once $sitePath. "/libs/class/minerva.php";
    
    @ini_set('display_errors',DEBUG_MODE?1:0);
    date_default_timezone_set(DEFAULT_TIMEZONE);
    
    $dbc = new dbc;
    $dbc->Connect();
    $os = new minerva($dbc);

    $sql_send_messages = $dbc->Query("select * from asynchronous_emails where status = 'waiting'"); 
    
    while($email = $dbc->Fetch($sql_send_messages))        
    {        

        $log = sendWithPhpMailer($email['recipients'], $email['subject'], $email['message'], $email['header']);
        
        if($log == "sent") $status = "sent";
        else $status = "failure";
        
        $data = array(
            "status" => $status,
            "error_log" => $log,
            "#updated_at" => "NOW()"
        );
        
        $dbc->Delete("asynchronous_emails","status='sent'");                
        $dbc->Update("asynchronous_emails", $data,"id=" . $email['id']);
        //echo "\nStatus = " . $status . "\n";
      
    }

?>