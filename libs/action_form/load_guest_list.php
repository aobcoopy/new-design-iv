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
	$sql = $dbc->Query("select * from villa_form_datas where vfm = '".$_REQUEST['id']."' and type = 'guest_list'");
	$total = $dbc->GetCount("villa_form_datas","vfm = '".$_REQUEST['id']."' and type = 'guest_list'");
	$i=0;
	
	if($total>0)
	{
	?>
    <div class="table-responsive">
        <table id="tb_guest" width="100%%" border="1" class="table table-stripeda table-borderless">
         <thead>
            <tr>
              <th>No.</th>
              <th width="390">First & Last Name</th>
              <th>Passport No.</th>
              <th>City/Country of Residence</th>
              <th>Date of Birth</th>
              <th>Nationality</th>
              <th>Room assignment</th>
              <th class="guest">#</th>
            </tr>
         </thead>
         <tbody>
    
    <?php
	while($row = $dbc->Fetch($sql))
	{
		$i++;
		$row_data = json_decode(base64_decode($row['data']),true);
		echo '<tr>';
			echo '<td class="text-center">'.$i.'</td>';
			echo '<td>'.$row_data['tx_first'].' <div class="dis_time">'.$row['created'].'</div></td>';
			echo '<td>'.$row_data['tx_passport'].'</td>';
			echo '<td>'.$row_data['tx_city'].'</td>';
			echo '<td>'.$row_data['tx_date'].'</td>';
			echo '<td>'.$row_data['tx_nationality'].'</td>';
			echo '<td>'.$row_data['tx_room'].'</td>';
			echo '<td class="guest"><button type="button" class="btn btn-danger guest" onClick="del_guest_list('.$row['id'].');"><i class="fa fa-trash" aria-hidden="true"></i></button></td>';
		echo '</tr>';
		
		//echo '<li class="list-group-item  "><strong>'.$i.'. '.$row_data.'</strong> <div class="dis_time">'.$row['created'].'</div> <button type="button" class="btn__dele"  onClick="del_orders_b('.$row['id'].');"><i class="fa fa-trash" aria-hidden="true"></i></span></li>';
	}
?>
            </tbody>
        </table>
    </div>
    <?php
	}
	?>
				
                      