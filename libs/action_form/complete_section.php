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
	
	$data = array(
		'#id' => 'DEFAULT',
		'#vfm' => $_REQUEST['id'],
		'sections' => $_REQUEST['posi'],
		'#created' => 'NOW()',
		'#status' => 1,
		//'type' => 'orders_b',
		'#user' => $_SESSION['auth']['user_id']
	);
	
	
	
	if($dbc->HasRecord("villa_form_status","vfm = '".$_REQUEST['id']."' and sections = '".$_REQUEST['posi']."'"))
	{
		$dbc->Delete("villa_form_status","vfm = '".$_REQUEST['id']."' and sections = '".$_REQUEST['posi']."'");
		
		$total_section = $dbc->GetCount("villa_form_status","vfm = '".$_REQUEST['id']."'");
		$percent = ($total_section*100)/5;
		
		echo json_encode(array(
				'status' => true,
				'msg' => 'Success',
				'percent' => $percent,
				'display' => 'show'
			));
	}
	else
	{
		if($dbc->Insert("villa_form_status",$data))
		{
			$total_section = $dbc->GetCount("villa_form_status","vfm = '".$_REQUEST['id']."'");
			$percent = ($total_section*100)/5;
			echo json_encode(array(
				'status' => true,
				'msg' => 'Success',
				'percent' => $percent,
				'display' => 'hide'
			));
		}
		else
		{
			echo json_encode(array(
				'status' => false,
				'msg' => 'Saved.'
			));
		}
	}
	
	
	
	
	
?>
