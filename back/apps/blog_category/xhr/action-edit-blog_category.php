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
	$slug = str_replace(" ","-",$_REQUEST['tx_link_e']);
		$data = array(
			'name' => $_REQUEST['txTitle_edit'],
			'detail' => base64_encode($_REQUEST['txDetail_edit']),
			'color' => $_REQUEST['tx_color_e'],
			'#updated' => 'NOW()',
			'#status' => '0',
			'slug' => trim(strtolower($slug)),
			//'#user' => $_SESSION['auth']['user_id']
		);
		
		if($dbc->Update("blog_category",$data,"id=".$id)){
			
				
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$banners = $dbc->GetRecord("blog_category","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"blog_category-edit",$id,$banners);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	
	$dbc->Close();
?>