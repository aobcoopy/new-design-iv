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
	
	$slp_id = isset($_REQUEST['SPL_ID'])?$_REQUEST['SPL_ID']:0;

	if(!$dbc->HasRecord("shopping_list","villa_form_mapping = '".$_REQUEST['villa_form_mapping']."' and villa_name = '".$_REQUEST['txt_vname']."' "))
	{
		$data = array(
			'#id' => 'DEFAULT',
			'#form_id' => $_REQUEST['FID'],
			'#villa_form_mapping' => $_REQUEST['villa_form_mapping'],
			'name' => $_REQUEST['txt_name'],
			'adult' => $_REQUEST['txt_nop'],
			'villa_name' => $_REQUEST['txt_vname'],
			'arrival_date' => $_REQUEST['txt_avd'],
			'arrival_time' => $_REQUEST['txt_avt'],
			'check_out' => $_REQUEST['txt_co'],
			'#created' => 'NOW()',
			'#status' => 0,
			//'#user' => $_SESSION['auth']['user_id']
		);

		if($dbc->Insert("shopping_list",$data))
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
	}
	else
	{
		$data = array(
			'name' => $_REQUEST['txt_name'],
			'adult' => $_REQUEST['txt_nop'],
			'arrival_date' => $_REQUEST['txt_avd'],
			'arrival_time' => $_REQUEST['txt_avt'],
			'check_out' => $_REQUEST['txt_co'],
			'#status' => 0,
			//'#user' => $_SESSION['auth']['user_id']
		);

		if($dbc->Update("shopping_list",$data," id = '".$slp_id."'"))
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

	}
	
	
	
?>
