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
		'guest' => $_REQUEST['tx_guest_amt'],
		'dishes' => $_REQUEST['tx_dishes_amt'],
	);
	//print_r($_REQUEST['tx_dinner']);
	
	//foreach($_REQUEST['tx_dinner'] as $dinner)
//	{
//		//echo '----'.$dinner;
//		array_push($ar_data,$dinner);
//	}
	//print_r($ar_data);
	
	$data = array(
		'first_dinner_amt' => json_encode($ar_data),
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