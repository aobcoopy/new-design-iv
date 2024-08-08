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
	
	/*echo '<pre>';
	print_r($ar_data);
	echo '</pre>';
	
	if(array_key_exists("spa",$ar_data))
	{
		echo "Key exists!";
		$ar_data['spa'] = array(
			'link' => $_REQUEST['tx_spa_link'],
			'file' => $_REQUEST['tx_spa_file']
		);
	}
	else
	{
		echo "Key does not exist!";
		$array = array(
			'spa' => array()
		);
		
		$ar_data['spa'] = array(
			'link' => $_REQUEST['tx_spa_link'],
			'file' => $_REQUEST['tx_spa_file']
		);
		//array_push($ar_data,$ar_data['spa']);
	}
	
  	echo '<pre>';
	print_r($ar_data);
	echo '</pre>';*/
	
	$ar_data['spa'] = array(
		'link' => $_REQUEST['tx_spa_link'],
		'file' => $_REQUEST['tx_spa_file']
	);
	
	$data = array(
		'datas' => json_encode($ar_data)
	);
	
	
	if($dbc->Update("villa_form",$data,"id='".$_REQUEST['txtID_spa']."'")){
		echo json_encode(array(
			'success'=>true,
			'msg'=> $id
		));
		
	}else{
		echo json_encode(array(
			'success'=>false,
			'msg' => "Saved"
		));
	}
		
	
?>
