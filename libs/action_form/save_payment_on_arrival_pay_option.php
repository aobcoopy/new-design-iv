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
	
	$old_data = $dbc->GetRecord("villa_form","*","id='".$_REQUEST['txtID']."'");
	$ar_data = json_decode($old_data['datas'],true);
	
	/*$ar_chk = array(
			'chk_1' => '',
			'chk_2' => ''
		);*/
		
	if(isset($_REQUEST['chk_1']))
	{
		$ar_chk['chk_1'] = $_REQUEST['chk_1'];
	}
	
	if(isset($_REQUEST['chk_2']))
	{
		$ar_chk['chk_2'] = $_REQUEST['chk_2'];
	}
	
	/*$ar_data = array(
		'chk_payment' => $ar_chk
	);*/
	
	$ar_data['chk_payment'] = $ar_chk;
	
	$data = array(
		'datas' => json_encode($ar_data),
		//'#user' => $_SESSION['auth']['user_id']
	);
	
	if($dbc->Update("villa_form",$data,"id='".$_REQUEST['txtID']."'"))
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
