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
	
	
	$phos = array();
	if(isset($_REQUEST['datas']['photo']))
	{
		foreach($_REQUEST['datas']['photo'] as $img)
		{
			$ph_name = base64_encode($img['name']);
			$phos_data = array(
				'img' => $img['photo'],
				'name' => $ph_name,
				//'posi' => $img['posi']
			);
			
			//echo str_replace("\_", "'",$ph_name)."<br>";
			array_push($phos,$phos_data);
		}
	}
	
		$data = array(
			'bedroom_photo' => json_encode($phos),
			'bedroom_description' => base64_encode($_REQUEST['datas']['txb_det']),
			'#updated' => 'NOW()',
			'#br_status' => 1,
			'#users' => $_SESSION['auth']['user_id'],
		);
		
		if($dbc->Update("properties",$data,"id=".$_REQUEST['datas']['txtID'])){
			$id = $_REQUEST['datas']['txtID'];
			echo json_encode(array(
				'success'=>true,
				'msg'=> $id
			));
			
			$banners = $dbc->GetRecord("properties","*","id=".$id);
			$os->save_log(0,$_SESSION['auth']['user_id'],"properties-add",$id,$banners);
		}else{
			echo json_encode(array(
				'success'=>false,
				'msg' => "Insert Error"
			));
		}
	
	$dbc->Close();
?>