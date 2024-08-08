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
	
	/*$ar_ifmt = array(
		'booking_details' => ($_REQUEST['tx_bd']),
		//'booking_inclusions' => ($_REQUEST['tx_bi']),
		'additional_charges' => ($_REQUEST['tx_ac']),
	);
	//echo count($_REQUEST['tx_inclusions']).'--<br>';
	$ar_inclu = array();
	for($i=0;$i<count($_REQUEST['tx_inclusions']);$i++)
	{
		//echo $_REQUEST['tx_inclusions'][$i].'<br>';
		array_push($ar_inclu,$_REQUEST['tx_inclusions'][$i]);
	}*/
	
	//$ar_food = array();
	foreach($_REQUEST['b_food'] as $b_food)
	{
		$ar_food[] = array(
			'name' => $b_food['name'],
			'amount' => $b_food['amount']
		);
		
		
		/*$food = $b_food['name'].'|'.$b_food['amount'];
		array_push($ar_food,$food);*/
	}
	
	$ar_data = array(
		'food' => $ar_food,
		//'spacial_request' =>  base64_encode($_REQUEST['tx_BREAKFAST'])
	);
	
	$data = array(
		'breakfast' => json_encode($ar_data),
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
