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
	
	$id = $_REQUEST['id'];
	
	$check = $dbc->GetRecord("blogs","*","id='".$id."'");
	
	if($check['hl_of_tm']==0)
	{
		if($dbc->GetCount("blogs"," hl_of_tm = '1'")>=5)
		{
			echo json_encode(
				array(
					'status' => false,
					'msg' => 'Limit 5 hl_of_tm please try again.'
				)
			);
		}
		else
		{
			$dbc->Update("blogs",array('#hl_of_tm' => '1','#updated' => 'NOW()'),"id='".$id."'");
			echo json_encode(array(
					'status' => true,
					'msg' => 'Successful'
				)
			);
		}
	}
	else
	{
		$dbc->Update("blogs",array('#hl_of_tm' => '0','#updated' => 'NOW()'),"id='".$id."'");
			echo json_encode(array(
					'status' => true,
					'msg' => 'Successful'
				)
			);
	}
	
	
	/*$sql = $dbc->Query("select * from blogs where hl_of_tm = '1'");
	while($row = $dbc->Fetch($sql))
	{
		$dbc->Update("blogs",array('#hl_of_tm' => '0','#updated' => 'NOW()'),"id='".$row['id']."'");
	}*/
	
	
	
	
	
	
	$dbc->Close();
?>