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
		'#onsite_status' => $_REQUEST['me'],
		'#updated' => 'NOW()',
		//'#user' => $_SESSION['auth']['user_id']
	);
	
	if($dbc->Update("villa_form",$data,"id = '".$_REQUEST['txtID']."' "))//villa_form_mapping
	{
		echo json_encode(array(
			'status' => true,
			'msg' => 'Success',
			'val' =>$_REQUEST['me']
		));
	}
	else
	{
		echo json_encode(array(
			'status' => false,
			'msg' => 'Saved.',
			'val' =>$_REQUEST['me']
		));
	}
	
?>