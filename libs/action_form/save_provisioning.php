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
	
	$wl = array();
	foreach($_REQUEST['chk_wine'] as $chk_wine)
	{
		array_push($wl,$chk_wine);
	}
	
	$ar_data = array(
		'note' => $_REQUEST['tx_note_provisioning'],
		'provisioning' => $_REQUEST['tx_Provisioning'],
		'wine' => $_REQUEST['tx_Wine'],
		'file_path' => $_REQUEST['tx_file_path'],
		'filename' => $_REQUEST['tx_file_name'],
		'wine_list' => $wl,
		'wine_list_link' => $_REQUEST['tx_Wine_link']
	);
	$data = array(
		'provisioning' => json_encode($ar_data),
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
