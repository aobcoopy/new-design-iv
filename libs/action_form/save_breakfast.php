<?php 
	session_start();
	include_once "../../config/define.php";
	include_once "../class/db.php";
	include_once "../class/minerva.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	$os = new minerva($dbc);
	
	$ar_food = array();
	foreach($_REQUEST['tx_b_food'] as $food)
	{
		array_push($ar_food,$food);
	}
	
	$ar_data = array(
		'breakfast' => $_REQUEST['tx_BREAKFAST'],
		'food' => $ar_food,
		'filename' => $_REQUEST['tx_b_path'],
		'link' => $_REQUEST['tx_b_link'],
	);
	
	$data = array(
		'breakfast' => json_encode($ar_data),
		'#updated' => 'NOW()',
		//'#user' => $_SESSION['auth']['user_id']
	);
	
	if($dbc->Update("villa_form",$data,"id = '".$_REQUEST['txtID']."' "))//villa_form_mapping
	{
		echo json_encode(array(
			'status' => true,
			'msg' => 'Success'
		));
	}
	else
	{
		echo json_encode(array(
			'status' => false,
			'msg' => 'Saved.'
		));
	}
	
?>
