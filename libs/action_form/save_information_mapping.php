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
	
	$ar_ifmt = array(
		'booking_details' => base64_encode(json_encode($_REQUEST['tx_bd'])),
		//'booking_inclusions' => ($_REQUEST['tx_bi']),
		'additional_charges' => ($_REQUEST['tx_ac']),
	);
	//echo count($_REQUEST['tx_inclusions']).'--<br>';
	$ar_inclu = array();
	for($i=0;$i<count($_REQUEST['tx_inclusions']);$i++)
	{
		//echo $_REQUEST['tx_inclusions'][$i].'<br>';
		array_push($ar_inclu,$_REQUEST['tx_inclusions'][$i]);
	}
	
	$ar_note = array();
	for($i=0;$i<count($_REQUEST['tx_notes']);$i++)
	{
		//echo $_REQUEST['tx_notes'][$i].'<br>';
		array_push($ar_note,$_REQUEST['tx_notes'][$i]);
	}
	
	$ar_data = array(
		//'address' => $_REQUEST['tx_in_address'],
		//'location' => $_REQUEST['tx_in_location'],
		//'map' => $_REQUEST['tx_in_map'],
		//'phone' => $_REQUEST['tx_in_phone'],
		'booking' => base64_encode(json_encode($ar_ifmt)),
		'inclusions' =>  base64_encode(json_encode($ar_inclu)),
		'note' =>  base64_encode(json_encode($ar_note))
	);
	
	$data = array(
		'informations' => json_encode($ar_data),
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
