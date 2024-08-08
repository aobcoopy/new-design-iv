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
	
	$arr = array();
	$sql = $dbc->Query("select * from villa_form_datas where vfm = '".$_REQUEST['id']."' and type = 'special_dietary'");
	$i=0;
	echo '<ul class="list-group ">';
	while($row = $dbc->Fetch($sql))
	{
		$i++;
		$row_data = json_decode($row['data'],true);
		echo '<li class="list-group-item  "><strong>'.$i.'. '.$row_data.'</strong> <div class="dis_time">'.$row['created'].'</div> <button type="button" class="btn__dele food"  onClick="del_dietary('.$row['id'].');"><i class="fa fa-trash" aria-hidden="true"></i></span></li>';
	}
	echo '</ul>';
	//echo json_encode($arr);
?>
