<?php /*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
?><?php
	/**/session_start();
	include_once "../../config/define.php";
	include_once "../class/db.php";
	include_once "../class/minerva.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	$os = new minerva($dbc);
	
	$des = isset($_REQUEST['cbbDestination'])?$_REQUEST['cbbDestination']:'all';
	$beach = isset($_REQUEST['cbbSub'])?$_REQUEST['cbbSub']:'all';
	$room = isset($_REQUEST['cbbRoom'])?$_REQUEST['cbbRoom']:'all';
	$ar_cate = array();
	$ar_cate_chk = array();
	
	//echo $des.'---'.$beach;
	
	if($des == 'all')
	{
		$destination = "WHERE properties.destination BETWEEN 38 AND 39 ";
	}
	else
	{
		$destination = "WHERE properties.destination = '".$des."'";
	}
	
	
	
	if($beach == 'all')
	{
		$beachname = "";
	}
	else
	{
		$beachname = "AND properties.subdestination = '".$beach."'";
	}
	
	
	
	if($room == 'all')
	{
		if($des == 'all' && $room != 'all')
		{
			$room_s = "AND property_room.room = '".$room."'";
		}
		else
		{
			$room_s = "";
		}
	}
	else
	{
			$room_s = "AND property_room.room = '".$room."'";
	}
	
	/*echo "SELECT
		properties.id AS id,
		properties.`name` AS `name`,
		properties.destination AS des,
		properties.subdestination AS sub,
		property_room.room AS room
		FROM
		properties
		LEFT JOIN property_room ON properties.id = property_room.property
		".$destination." ".$beachname."
		";*/
		
	$sql =$dbc->Query("SELECT
		properties.id,
		properties.`name` AS `name`,
		property_cate.caategory AS cate,
		property_room.room AS room,
		properties.destination AS des,
		properties.subdestination AS subdes,
        categories.`name` AS cname,
		categories.`filter_box` AS filter_box,
		categories.`status` AS cstatus,
		categories.`sort` 
		FROM
		properties
		INNER JOIN property_cate ON properties.id = property_cate.property
		INNER JOIN property_room ON properties.id = property_room.property
		INNER JOIN categories ON property_cate.caategory = categories.id
		".$destination." ".$beachname." ".$room_s."
		AND properties.`status` > 0
		AND categories.`status` > 0
		ORDER BY categories.`sort`  ASC
	");
    // removed:
    /*AND categories.`id` IN (6,4,8,5)*/
    
	//$ar_cate[]='';
	while($row = $dbc->Fetch($sql))
	{
		
		if(!in_array($row['cate'],$ar_cate_chk))
		{
			//echo $row['cate'].'--'.$row['cname']."<br>";
			if($room==1 && $row['cate']==5)
			{
				
			}
			else
			{
				array_push($ar_cate_chk,$row['cate']);
				$ar_cate[] = array(
					"sort" =>$row['sort'],
					"id" =>$row['cate'],
					"name" =>$row['filter_box'],
				);
			}
			
			
		}
	}
	ksort($ar_cate);
	//print_r($ar_cate);
	echo json_encode($ar_cate);
?>