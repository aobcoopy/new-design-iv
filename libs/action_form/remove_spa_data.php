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
	
	$old_data = $dbc->GetRecord("villa_form","*","id='".$_REQUEST['txtID_spa']."'");
	$ar_data = json_decode($old_data['datas'],true);
	
	if(unlink('../../'.$ar_data['spa']['file']))
	{
		echo json_encode(array(
			'success'=>true,
			'msg'=> $id
		));
	}
	else
	{
		echo json_encode(array(
			'success'=>false,
			'msg' => "Please try again"
		));
	}
	
	
	
	
	
		
	
?>
