<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
    include_once "../../../inc/functions.inc.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();


	$aColumns = array(
		'p.id',
		'p.name',
		'p.subdestination',
		'd.name',
		'p.detail',
		'p.bed',
		'p.bedroom_range',
		'p.bathroom',
		'CONCAT(p.latitude,\',  \',p.longtitude)',
		'CONCAT(p.pmin,\' - \',p.pmax)',
		'p.id',
		'p.appliances',
		'p.id',
		'p.id',
		//'u.name',
		//'p.updated',
		//'p.status',
		//'p.heightlight',
		//'p.popup',//'p.sort',
		//'p.topsearch',
		//'p.id',
		//'p.pro_status',
		
		//'p.pro_exp',
		//'p.price_table_status',
		//'p.price_exchange',
		//'p.photo'
	);
	$sIndexColumn = "p.id";
	
	//$sTable = "properties AS p  ORDER BY p.sort ASC";
	$sTable = "properties AS p 
		
		LEFT JOIN destinations AS d ON p.destination = d.id
		";//LEFT JOIN users AS u ON p.users = u.id
	$sLimit = "";
	
	if ( isset( $_REQUEST['start'] ) && $_REQUEST['length'] != '-1' ){
		$sLimit = "LIMIT ".$dbc->Escape_String( $_REQUEST['start'] ).", ".
		$dbc->Escape_String( $_REQUEST['length'] );
	}

	if ( isset( $_REQUEST['order'] ) ){
		$sOrder = "ORDER BY  ";
		for ( $i=0 ; $i<count( $_REQUEST['order'] ) ; $i++ ){
			if($_REQUEST['columns'][intval($_REQUEST['order'][$i]['column'])]['orderable']=="true"){
				
				$sOrder .= $aColumns[ intval( $_REQUEST['order'][$i]['column'] ) ]."
				 	".$dbc->Escape_String( $_REQUEST['order'][$i]['dir'] ) .", ";
			}
		}
		
		$sOrder = substr_replace( $sOrder, "", -2 );
		if ( $sOrder == "ORDER BY" ){
			$sOrder = "";
		}
	}
	$sOrder = " ORDER BY p.status DESC , p.name ASC";

	//----- NEW -----
	if(isset($_REQUEST['beach']) && $_REQUEST['beach']!='all')
	{
		$beach_id = $_REQUEST['beach'];
		$condition_beach = " AND p.subdestination = '".$beach_id."' ";
	}
	else
	{
		$condition_beach = "";
	}
	//----- NEW -----
	
	$sWhere = "";
	if ( $_REQUEST['search']['value'] != "" ){
		$sWhere = "WHERE p.status > 0 and p.destination = '" . $_GET['destinationID'] . "' $condition_beach AND (  ";
		
		for ( $i=0 ; $i<count($aColumns) ; $i++ ){
			$sWhere .= $aColumns[$i]." LIKE '%".$dbc->Escape_String( $_REQUEST['search']['value'] )."%' OR ";
		}
		$sWhere = substr_replace( $sWhere, "", -3 );
		$sWhere .= " )";
	}
	else
	{
		$sWhere .="WHERE p.status > 0 and p.destination = '" . $_GET['destinationID'] . "' $condition_beach ";
	}
	
	
	if ( isset($_REQUEST['filter'])){
		if ( $sWhere == "" ){
			$sWhere = "WHERE ";
		}else{
			$sWhere .= " AND ";
		}
		$sWhere .= $_REQUEST['filter']." ";
	}
	
	//$sLimit = "limit 1";
	
	$sQuery = "
		SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
		FROM   $sTable
		$sWhere
		$sOrder
		$sLimit
	";
	
	//echo $sQuery;
	
	$rResult = $dbc->Query($sQuery) or die(mysql_error());
	
	/* Data set length after filtering */
	$sQuery = "
		SELECT FOUND_ROWS()
	";
	$rResultFilterTotal = $dbc->Query( $sQuery) or die(mysql_error());
	$aResultFilterTotal = $dbc->Fetch($rResultFilterTotal);
	$iFilteredTotal = $aResultFilterTotal[0];
	
	/* Total data set length */
	$sQuery = "
		SELECT COUNT(".$sIndexColumn.")
		FROM   $sTable
	";
	$rResultTotal = $dbc->Query( $sQuery)  or die(mysql_error());
	$aResultTotal = $dbc->Fetch($rResultTotal);
	$iTotal = $aResultTotal[0];
	
	
	/*
	 * Output
	 */
	$output = array(
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => array()
	);
	
	while ( $aRow = $dbc->Fetch( $rResult ) ){
		$row = array();
		for ( $i=0 ; $i<count($aColumns) ; $i++ ){
			
			if($i==2)
			{
				if($aRow[$i]!='')
				{
					$destinations = $dbc->GetRecord("destinations","*","id=".$aRow[$i]);
					$row[] = $destinations['name'];
				}
				else
				{
					$row[] = '-';
				}
			}
			elseif($i==4)
			{
				$row[] = base64_decode($aRow[$i],true);
			}
			elseif($i==5)
			{
				$bed = json_decode($aRow[$i],true);
				$ar_bed = '<ul>';
				foreach($bed as $bed_data)
				{
					//$data_bed = $dbc->GetRecord("","","");
					//$ar_bed.= $bed_data['title'].' - '.$bed_data['detail'].'<br> | ';
					$ar_bed.= '<li>['.$bed_data['title'].' - '.$bed_data['detail'].'] , </li>';
				}
				$ar_bed.= '</ul>';
				$row[] = $ar_bed;
			}
			elseif($i==10)
			{
				$sqll = $dbc->Query("select 
					property_cate.id, 
					property_cate.property AS villa, 
					categories.`name` AS cname
					FROM property_cate LEFT JOIN categories 
					ON property_cate.caategory = categories.id
					WHERE property_cate.property = '".$aRow[$i]."'");
					
				$cate = '<ul>';
				while($rows = $dbc->Fetch($sqll))
				{
					$cate.= '<li>['.$rows['cname'].'] , </li>';
				}
				$cate .= '</ul>';
				$row[] = $cate;
			}
			elseif($i==11)
			{
				$faci = json_decode($aRow[$i],true);
				$fa = '<ul>';
				foreach($faci as $fac)
				{
					$icon = $dbc->GetRecord("icons","*","id='".$fac."'");
					$fa .= '<li>['.$icon['name'].'] , </li>';
				}
				$fa .= '</ul>';
				$row[] = $fa;
			}
			elseif($i==12)
			{
				$room = $dbc->GetRecord("properties","*","id = '".$aRow[$i]."'");
				$what_ic1 = json_decode($room['what_ic1']);
				$what_ic2 = json_decode($room['what_ic2']);
				$what_ic3 = json_decode($room['what_ic3']);
				$what_ic4 = json_decode($room['what_ic4']);
				$what_ic5 = json_decode($room['what_ic5']);
				$what_ic6 = json_decode($room['what_ic6']);
				$what_ic7 = json_decode($room['what_ic7']);
				
				$list = '<ul>';
				//What Is Included
				if(count($what_ic1)!='0')
				{
					foreach($what_ic1 as $wic1)
					{
						$list .= '[<li class="fo15">'.str_replace("#","'",$wic1).'</li>] , ';
					}
				}
				
				//Available at extra charge
				if(count($what_ic6)!='0')
				{
					foreach($what_ic6 as $wic6)
					{
						$list .= '[<li class="fo15">'.str_replace("#","'",$wic6).'</li>] , ';
					}
				}
				
				//House rules
				if(count($what_ic7)!='0')
				{
					foreach($what_ic7 as $wic7)
					{
						$list .= '[<li class="fo15">'.str_replace("#","'",$wic7).'</li>] , ';
					}
				}	
				
				//Complimentary airport transfer
				if(count($what_ic2)!='0')
				{
					foreach($what_ic2 as $wic2)
					{
						$list .= '[<li class="fo15">'.str_replace("#","'",$wic2).'</li>] , ';
					}
				}
					
				//Staff service inclusion
				if(count($what_ic3)!='0')
				{
					foreach($what_ic3 as $wic3)
					{
						$list .= '[<li class="fo15">'.str_replace("#","'",$wic3).'</li>] , ';
					}
				}
				
				//Extra Charge
				if(count($what_ic4)!='0')
				{
					foreach($what_ic4 as $wic4)
					{
						$list .= '[<li class="fo15">'.str_replace("#","'",$wic4).'</li>] , ';
					}
				}
				
				//Special Note
				if(count($what_ic5)!='0')
				{
					foreach($what_ic5 as $wic5)
					{
						$list = '[<li class="fo15">'.str_replace("#","'",$wic5).'</li>] , ';
					}
				}
				$list .= '</ul>';
				
				
				$row[] = $list;
			}
			elseif($i==13)
			{
				$price = '';
				if($dbc->HasRecord("pricing","property=".$aRow[$i]))
				{
					$properties = $dbc->GetRecord("pricing","*","property = '".$aRow[$i]."'");
					if($properties['updated']>='2020-11-30')
					{
						$data = json_decode(base64_decode($properties['val']),true);
					}
					else
					{
						$data = json_decode($properties['val'],true);
					}
					
					$price .= '<ul>';
					foreach($data as $valu)
					{
						$price .= '<li>';
						$price .= '['.$valu['date1'].' - '.$valu['date2'].' '.$valu['night'].' Night] ';
						for($i=1;$i<=28;$i++)
						{
							
							if($valu['val'.$i]!='')
							{
								$price .= ' ['.$i.' BR] ';
								$price .= ' [ '.number_format($valu['val'.$i],2).' ] ';
							}
						}
						$price .= '</li>';
					}
					$price .= '</ul>';
				}
				
				$row[] = $price;
			}
			/*elseif($i==6)
			{
				$y = substr($aRow[$i],0,4);
				$m = substr($aRow[$i],5,2);
				$d = substr($aRow[$i],8,2);
				switch($m)
				{
					case'01': $mm = 'Jan';break;
					case'02': $mm =  'Feb';break;
					case'03': $mm =  'Mar';break;
					case'04': $mm =  'Apr';break;
					case'05': $mm =  'May';break;
					case'06': $mm =  'Jun';break;
					case'07': $mm =  'Jul';break;
					case'08': $mm =  'Aug';break;
					case'09': $mm =  'Sep';break;
					case'10': $mm =  'Oct';break;
					case'11': $mm =  'Nov';break;
					case'12': $mm =  'Dec';break;
				}
				$row[] = $d.' / '.$mm.' / '.$y;
			}*/
			/*elseif($i==17)
			{
				$slide = json_decode($aRow[$i],true);
				$row[] = count($slide);
			}*/
			else
			{
				$row[] = $aRow[$i];
			}
			
			if($i==0)$row["DT_RowId"] = $aRow[$i];
			
		}
		$output['aaData'][] = $row;
	}
	
    //file_put_contents("data.txt",json_encode( $output ));
	echo json_encode( $output );
	
	$dbc->Close();

?>





