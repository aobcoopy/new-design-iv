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
	
	$id = $_REQUEST['txtID'];

	$arr_youtube = array();
	if(isset($_REQUEST['tx_youtube']))
	{
		foreach($_REQUEST['tx_youtube'] as $yt)
		{
			array_push($arr_youtube,$yt);
		}
	}
	
		$data = array(
			'youtube' => json_encode($arr_youtube),
			'#updated' => 'NOW()',
			//'#status' => '0',
			'#users' => $_SESSION['auth']['user_id'],
		);
		
		if($dbc->Update("blogs",$data,"id=".$id)){
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$banners = $dbc->GetRecord("blogs","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"blogs-edit",$id,$banners);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	
	$dbc->Close();
	unset($_SESSION['b_name']);
?>