<?php
	session_start();
	include_once "../../config/define.php";
	include_once "../class/db.php";
	include_once "../class/minerva.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	$tags = $_REQUEST['tags'];
	
	//$data = $dbc->GetRecord("properties","*","name LIKE '%".$tags."%' ");
	if($tags=='Villa U')
	{
		$sql = $dbc->Query("select * from properties where name LIKE '".$tags."%'  and status > 0");
		while($row = $dbc->Fetch($sql))
		{
			$v_name = explode("|",$row['name']);
			if(trim($v_name[0])==$tags)
			{
				$data = $dbc->GetRecord("properties","*","id = '".$row['id']."'  ");
				//echo $v_name[0].'++'.$row['id'].'<br>';
			}
			else
			{
				//echo 'noo++'.$v_name[0].'<br>';
			}
		}
		//echo 'YESS'.'<br><br><br>';
	}
	elseif($tags=='Villa M')
	{
		$sql = $dbc->Query("select * from properties where name LIKE '".$tags."%' and status > 0");
		while($row = $dbc->Fetch($sql))
		{
			$v_name = explode("|",$row['name']);
			if(trim($v_name[0])==$tags)
			{
				$data = $dbc->GetRecord("properties","*","id = '".$row['id']."'  ");
				//echo $v_name[0].'++'.$row['id'].'<br>';
			}
			else
			{
				//echo 'noo++'.$v_name[0].'<br>';
			}
		}
		//echo 'YESS'.'<br><br><br>';
	}
	elseif($tags=='Villa Uno')
	{
		$data = $dbc->GetRecord("properties","*","name LIKE '".$tags."%'  and status > 0");
		//echo 'NOOOOOOOOOOOOOOOOOOOOOOOOO'.'<br>';
	}
	elseif($tags=='Villa Serenity  5+1,  Phuket')
	{
		//'Villa Serenity | 5+1';
		$name_0 = explode(" ",$tags);
		//print_r($name_0);
		$new_name = $name_0[0].' '.$name_0[1].' | '.str_replace(",","",$name_0[3]);
		//echo $new_name.'<br>';
		$data = $dbc->GetRecord("properties","*","name LIKE '".$new_name."%'  and status > 0");
	}
	elseif($tags=='Villa Serenity  8+2,  Phuket')
	{
		//'Villa Serenity | 5+1';
		$name_0 = explode(" ",$tags);
		//print_r($name_0);
		$new_name = $name_0[0].' '.$name_0[1].' | '.str_replace(",","",$name_0[3]);
		//echo $new_name.'<br>';
		$data = $dbc->GetRecord("properties","*","name LIKE '".$new_name."%'  and status > 0");
	}
	elseif($tags=='Villa Serenity  4,  Koh Phangan')
	{
		//'Villa Serenity | 5+1';
		$name_0 = explode(" ",$tags);
		//print_r($name_0);
		$new_name = $name_0[0].' '.$name_0[1].' | '.str_replace(",","",$name_0[3]);
		//echo $new_name.'<br>';
		$data = $dbc->GetRecord("properties","*","name LIKE '".$new_name."%'  and status > 0");
	}
	elseif($tags=='Villa Aqua  8,  Phuket')
	{
		//'Villa Serenity | 5+1';
		$name_0 = explode(" ",$tags);
		//print_r($name_0);
		$new_name = $name_0[0].' '.$name_0[1].' | '.str_replace(",","",$name_0[3]);
		//echo $new_name.'<br>';
		$data = $dbc->GetRecord("properties","*","name LIKE '".$new_name."%'  and status > 0");
	}
	else
	{
		//$dbc->Query("select SUBSTRING_INDEX(name,'|',1) as name from properties");
		$data = $dbc->GetRecord("properties"," SUBSTRING_INDEX(name,'|',1) as name,ht_link","SUBSTRING_INDEX(name,'|',1)  = '".$tags."'  and status > 0");
		//print_r($data);
		//echo 'NOOOOOOOOOOOOOOOOOOOOOOOOO'.'<br>';
	}
	
	//echo $tags.'----<br>/'.$data['name'].'/<br>----'.$data['ht_link'];
	echo json_encode($data['ht_link']);
	
?>