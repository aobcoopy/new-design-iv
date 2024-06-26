<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	include_once "../../../libs/class/minerva.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	$os = new minerva($dbc);
	
	if($dbc->HasRecord("messages","message = '".$_REQUEST['tx_Question_e']."' AND id != ".$_REQUEST['txtID'])){
		echo json_encode(array(
			'success'=>false,
			'msg'=>'messages is already exist.'
		));
	}else{
		$category = $dbc->GetRecord("messages","*","id=".$_REQUEST['txtID']);
		$data = array(
			'message' => $_REQUEST['tx_Question_e'],
			'answer' => $_REQUEST['tx_Answer_e'],
			'#updated' => 'NOW()',
			'#user' => $_SESSION['auth']['user_id']
			//'#parent' => isset($_REQUEST['parent'])?$_REQUEST['parent']:'NULL'
		);
		
		if($dbc->Update("messages",$data,"id=".$_REQUEST['txtID'])){
			echo json_encode(array(
				'success'=>true
			));
			$category_new = $dbc->GetRecord("messages","*","id=".$_REQUEST['txtID']);
			$os->save_log(0,$_SESSION['auth']['user_id'],"messages-edit",$_REQUEST['txtID'],array(
				"old" => $category,
				"new" => $category_new
			));
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "No Change"
			));
		}
	}
	
	$dbc->Close();
?>