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
	
	$data = array(
		'dietary' => base64_encode($_REQUEST['tx_special']),
		'#updated' => 'NOW()',
		//'#user' => $_SESSION['auth']['user_id']
	);
	
	if($dbc->Update("villa_form_mapping",$data,"id = '".$_REQUEST['txtID']."' "))//villa_form_mapping
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
