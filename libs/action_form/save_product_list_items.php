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
	
	$slp_id = isset($_REQUEST['datas']['SPL_ID'])?$_REQUEST['datas']['SPL_ID']:0;
	
	if(count($_REQUEST['datas']['tables'])>0)
	{
	
		$dbc->Delete("shopping_list_items","shopping_list = '".$slp_id."' ");
		
		foreach($_REQUEST['datas']['tables'] as $item)
		{
			//echo $item['name'];
			
			$data = array(
				'#id' => 'DEFAULT',
				'#item' => $item['items'],
				'#amount' => $item['amount'],
				'#total' => $item['totals'],
				'#created' => 'NOW()',
				'#status' => 0,
				'#shopping_list' => $slp_id,
				'#cate' => $item['cate'],
				'#price' => $item['price'],
				//'#user' => $_SESSION['auth']['user_id']
			);
			$dbc->Insert("shopping_list_items",$data);
	
		}

		$dbc->Update("shopping_list",['#status' => 1],"id = '".$slp_id."'");
		echo json_encode(array(
				'status' => true,
				'msg' => 'Success'
			));
		
		/*if($dbc->Insert("shopping_list_items",$data))
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
		}*/
}
else
{
	echo json_encode(array(
		'status' => false,
		'msg' => 'Saved.'
	));	
}

	
	
	
?>
