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
	
	
	//$ar_data = array('arrival'=>[],'departure'=>[]);
//	//print_r($_REQUEST['tx_dinner']);
//	
//	foreach($_REQUEST['arrival'] as $val)
//	{
//		$ar_data['arrival'][] = array(
//			'tx_sname_a' => $val['tx_sname_a'],
//			'tx_date_a' => $val['tx_date_a'],
//			'tx_airline_a' => $val['tx_airline_a'],
//			'tx_flight_a' => $val['tx_flight_a'],
//			'tx_time_a' => $val['tx_time_a'],
//			'tx_pass_a' => $val['tx_pass_a'],
//			'tx_transfer_a' => $val['tx_transfer_a'],
//			'tx_Contact_a' => $val['tx_Contact_a'],
//			'tx_luggages_a' => $val['tx_luggages_a'],
//			'tx_Special_Request_a' => $val['tx_Special_Request_a'],
//		);
//	}
//	
//	foreach($_REQUEST['departure'] as $val)
//	{
//		$ar_data['departure'][] = array(
//			'tx_sname_d' => $val['tx_sname_d'],
//			'tx_date_d' => $val['tx_date_d'],
//			'tx_airline_d' => $val['tx_airline_d'],
//			'tx_flight_d' => $val['tx_flight_d'],
//			'tx_time_d' => $val['tx_time_d'],
//			'tx_pass_d' => $val['tx_pass_d'],
//			'tx_transfer_d' => $val['tx_transfer_d'],
//			'tx_Contact_Number_d' => $val['tx_Contact_Number_d'],
//			'tx_Special_Request_d' => $val['tx_Special_Request_d'],
//			'tx_luggages_d' => $val['tx_luggages_d'],
//		);
//		//echo '----'.$val['tx_first'].'----'.$val['tx_passport'].'----'.$val['tx_city'].'----'.$val['tx_date'].'----'.$val['tx_nationality'].'----'.$val['tx_room'];
//		//array_push($ar_data,$val);
//	}
	//print_r($ar_data);
	
	
	$ar_data = array(
			'tx_sname_a' => $_REQUEST['tx_sname_a'],
			'tx_date_a' => $_REQUEST['tx_date_a'],
			'tx_airline_a' => $_REQUEST['tx_airline_a'],
			'tx_flight_a' => $_REQUEST['tx_flight_a'],
			'tx_time_a' => $_REQUEST['tx_time_a'],
			'tx_pass_a' => $_REQUEST['tx_pass_a'],
			'tx_transfer_a' => $_REQUEST['tx_transfer_a'],
			'tx_Contact_a' => $_REQUEST['tx_Contact_a'],
			'tx_luggages_a' => $_REQUEST['tx_luggages_a'],
			'tx_Special_Request_a' => $_REQUEST['tx_Special_Request_a'],
		);
		
	$data = array(
		'#id' => 'DEFAULT',
		'vfm' => $_REQUEST['txtIDMapping'],
		'data' => json_encode($ar_data),
		'#created' => 'NOW()',
		'#status' => 0,
		'type' => 'arrival',
		//'#user' => $_SESSION['auth']['user_id']
	);
	
	if($dbc->Insert("villa_form_datas",$data))
	{
		/*$id_vfd = $dbc->GetID();
		$data = array('airport_transfer' => $id_vfd);
		$dbc->Update("villa_form_mapping",$data,"id = '".$_REQUEST['txtID']."' ");*/
		
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
