<?php
	//define("PHP_TIMEZONE","Asia/Bangkok");
	//define("PHP_DATEFORMAT","Asia/Bangkok");
    
    //define("APP_ENV","live");
    //define("APP_ENV","staging");    
    define("APP_ENV","local");  
    
    //define("ROOT_DIR","/externalVolume/html/inspiringvillas.com");   
    //define("ROOT_DIR","/var/www/html/inspiringvillas.com");   
    //define("ROOT_DIR","F:/www/inspiringvillas");  
	define("ROOT_DIR","C:/xampp/htdocs/IV_New_design");          
	
	/*define("DB_NAME","starjour_db");
	define("DB_USER","starjour_user");
	define("DB_PASS","inv159753");
	define("DB_SERVER","localhost");*/

    define("DB_NAME","inspiring_db");
    define("DB_USER","inspiring_user");
    define("DB_PASS","3ULNUL6AiL");
    define("DB_SERVER","localhost");
    
    define("DEBUG_MODE",false);
	
    define("DEFAULT_TIMEZONE","Asia/Bangkok");
    define("DEFAULT_LANGUAGE","en");
	
    define("DEFAULT_THEME","default");
    
    //if(APP_ENV == "live") define("S3_BUCKET_URL","https://s3-ap-southeast-1.amazonaws.com/static.inspiringvillas.com");
    /*if(APP_ENV == "live") define("S3_BUCKET_URL","https://d16141fmzmgv6p.cloudfront.net");
    elseif(APP_ENV == "staging") define("S3_BUCKET_URL","https://s3-ap-southeast-1.amazonaws.com/static.inspiringvillas.com/staging");*/
	if(APP_ENV == "live") define("S3_BUCKET_URL","https://d3nda6ep2r6vmy.cloudfront.net");
	elseif(APP_ENV == "staging") define("S3_BUCKET_URL","https://s3-ap-southeast-1.amazonaws.com/static.inspiringvillas/staging");
    // enter local domain name or IP address here (or leave empty)
    //elseif(APP_ENV == "local") define("S3_BUCKET_URL","https://www.inspiringvillas.com");
    elseif(APP_ENV == "local") define("S3_BUCKET_URL","https://" . $_SERVER['SERVER_NAME']);
    
	
?>
