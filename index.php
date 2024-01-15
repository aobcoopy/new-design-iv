<?php 

	session_start();
	include_once "config/define.php";
	include_once "libs/class/db.php";
    include_once "inc/functions.inc.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	$dbc = new dbc;
	$dbc->Connect();
    
     // reverted to old system on 2019-01-19
    /*if( strpos($_SERVER['REQUEST_URI'], OLD_RENTAL_SEARCH_PREFIX . URL_STRING_DEVIDER) == 1 || strpos($_SERVER['REQUEST_URI'], OLD_RENTAL_SEARCH_PREFIX . URL_STRING_DEVIDER) == 2) routingOldSearch($arrayUrlVariables);
    else*/if( strpos($_SERVER['REQUEST_URI'], RENTAL_SEARCH_PREFIX . URL_STRING_DEVIDER) == 1 || strpos($_SERVER['REQUEST_URI'], RENTAL_SEARCH_PREFIX . URL_STRING_DEVIDER) == 2) routingSearch();
    elseif( strpos($_SERVER['REQUEST_URI'], 'luxury-villas' . URL_STRING_DEVIDER) == 1) routingProperties($arrayUrlVariables);
	// blog URLs
    elseif( strpos($_SERVER['REQUEST_URI'], 'blog' . URL_STRING_DEVIDER) == 1) showBlog($dbc);
    // redirect villa collections to homepage
    elseif( strpos($_SERVER['REQUEST_URI'], 'villa-collections') == 1) threeOone('/');
    // check if html file exists on server
    elseif( pathinfo($_SERVER['REQUEST_URI'], PATHINFO_EXTENSION) == "html") checkHtmlUrlValidity($arrayUrlVariables);
    //die("index.php: ".$_SERVER['REQUEST_URI']);        
    //die($_SESSION['parDef'] . "<br><br>index.php?page=forrent&des=" . $_REQUEST['des'] . "&sub=" . $_REQUEST['sub'] . "&pri=" . $_REQUEST['pri'] . "&room=" . $_REQUEST['room'] . "&cate=" . $_REQUEST['cate'] . "&sort=all");
	
	//$cms = new cms($dbc);
	include_once "libs/bootstrap.php";
	
?>

