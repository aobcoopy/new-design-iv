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
	$sql = $dbc->Query("select * from villa_form_datas where vfm = '".$_REQUEST['id']."' and type = 'arrival'");
	$i=0;
	while($row = $dbc->Fetch($sql))
	{
		$i++;
		$row_data = json_decode($row['data'],true);
		/*$arr[] = array(
			'tx_sname_a' => $row_data['tx_sname_a']
		);*/
		/*echo '<div class="row top30 box_arv_det rela">';
			echo '<div class="namne__head">Sign Name :</div> <div class="det__head">'.$row_data['tx_sname_a'].'</div>';
			echo '<div class="namne__head">Date :</div> <div class="det__head">'.$row_data['tx_date_a'].'</div>';
			echo ' <div class="tricorner bluee"></div>';
		echo '</div>';*/
		
		
		echo '<dl class="row top30 box_arv_det rela">';
			echo '<div class="i_no">'.$i.'</div>';
			echo '<div class="i_time">'.$row['created'].'</div>';
			
			echo '<button type="button" class="btn btn-danger del__butt " onClick="del_arrival('.$row['id'].');"><i class="fa fa-trash" aria-hidden="true"></i></button> ';
			echo '<dt class="col-sm-1 ">Sign Name : </dt>';
			echo '<dd class="col tx_sname_a">'.$row_data['tx_sname_a'].'</dd>';
			
			echo '<dt class="col-sm-1 ">Date :</dt>';
			echo '<dd class="col tx_sname_a">'.$row_data['tx_date_a'].'</dd>';
			
			echo '<dt class="col-sm-1 ">Airport/Hotel :</dt>';
			echo '<dd class="col tx_sname_a">'.$row_data['tx_airline_a'].'</dd>';
			
			echo '<div class="w-100"></div>';
			
			echo '<dt class="col-sm-2 ">Flight number :</dt>';
			echo '<dd class="col tx_sname_a">'.$row_data['tx_flight_a'].'</dd>';
			
			
			
			echo '<dt class="col-sm-1 ">Time :</dt>';
			echo '<dd class="col tx_sname_a">'.$row_data['tx_time_a'].'</dd>';
			
			echo '<dt class="col-sm-2 ">No. of Adults/Kids (Kids age) :</dt>';
			echo '<dd class="col tx_sname_a">'.$row_data['tx_pass_a'].'</dd>';
			
			echo '<dt class="col-sm-3 ">Transfer Arrangement Yes or No :</dt>';
			echo '<dd class="col tx_sname_a">'.$row_data['tx_transfer_a'].'</dd>';
			
			echo '<div class="w-100"></div>';
			
			echo '<dt class="col-sm-2 ">Contact number :</dt>';
			echo '<dd class="col tx_sname_a">'.$row_data['tx_Contact_a'].'</dd>';
						
			echo '<dt class="col-sm-2 ">No.of Luggages :</dt>';
			echo '<dd class="col tx_sname_a">'.$row_data['tx_luggages_a'].'</dd>';
			
			echo '<dt class="col-sm-2 ">Special Request :</dt>';
			echo '<dd class="col tx_sname_a">'.$row_data['tx_Special_Request_a'].'</dd>';
			echo ' <div class="tricorner bluee"></div>';
		echo '</dl>';
		//echo $row['tx_sname_a'];
	}
	//echo json_encode($arr);
?>
