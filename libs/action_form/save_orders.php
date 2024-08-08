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
		'#id' => 'DEFAULT',
		'#vfm' => $_REQUEST['txtID'],
		'data' => json_encode($_REQUEST['tx_orders']),
		'#created' => 'NOW()',
		'#status' => 0,
		'type' => 'orders',
		//'#user' => $_SESSION['auth']['user_id']
	);
	
	if($dbc->Insert("villa_form_datas",$data))
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
