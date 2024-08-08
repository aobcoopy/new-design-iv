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
	
	$ar_data = array(
		'tx_first' => $_REQUEST['tx_first'],
		'tx_passport' => $_REQUEST['tx_passport'],
		'tx_city' => $_REQUEST['tx_city'],
		'tx_date' => $_REQUEST['tx_date'],
		'tx_nationality' => $_REQUEST['tx_nationality'],
		'tx_room' => $_REQUEST['tx_room'],
	);
	
	$data = array(
		'#id' => 'DEFAULT',
		'#vfm' => $_REQUEST['txtID'],
		'data' => base64_encode(json_encode($ar_data)),
		'#created' => 'NOW()',
		'#status' => 0,
		'type' => 'guest_list',
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
