
<?php
$sql = $dbc->Query("SELECT
	COUNT(id) AS amt,  
	contact_us.type, 
	contact_us.property, 
	contact_us.`name`, 
	contact_us.phone, 
	contact_us.email, 
	SUBSTRING_INDEX(created,'-',1) AS cdate,
	contact_us.updated
FROM
	contact_us
WHERE
	contact_us.type = 2
GROUP BY
	cdate");
	
$array_data = array();
$array_data_2 = array();
while($data = $dbc->Fetch($sql))
{
	//array_push($array_data,$data['']);
	/*$array_data[] = array(
		'x'=> 'new Date('.$data['cdate'].', 0)', 
		'y'=> $data['amt']
	);*/
	/*$val = '{ x: new Date('.$data['cdate'].', 0), y: '.$data['amt'].' }';
	array_push($array_data_2,$val);*/
	$array_data[] = array(
		'x'=> $data['cdate'], 
		'y'=> $data['amt']
	);
	
}
//$total = json_encode($array_data_2);
/*echo $total;*/
/*echo '<pre>';
print_r($array_data);
echo '</pre>';*/


$sql_2 = $dbc->Query("SELECT
	c.id, 
	c.type, 
	c.property AS villa, 
	c.`name`, 
	c.phone, 
	c.email, 
	SUBSTRING_INDEX(c.created,'-',1) AS cdate, 
	v.`name` AS villaname, 
	COUNT(v.id) AS tt_villa
FROM
	contact_us AS c
	INNER JOIN
	properties AS v
	ON 
		c.property = v.id
WHERE
	c.type = 2
GROUP BY
	villa
ORDER BY
	tt_villa DESC
LIMIT 10");
$arr_2 = array();
while($data_2 = $dbc->Fetch($sql_2))
{
	$v_name = explode("|",$data_2['villaname']);
	$arr_2[] = array(
		'label' => $v_name[0],
		'y' => $data_2['tt_villa']
	);
}
$total_villa = json_encode($arr_2);
//echo $total_villa;



$sql_3 = $dbc->Query("SELECT
	c.id, 
	c.type, 
	c.property AS villa, 
	c.`name`, 
	c.phone, 
	c.email, 
	SUBSTRING_INDEX(c.created,'-',1) AS cdate, 
	v.`name` AS villaname, 
	COUNT(v.id) AS tt_villa
FROM
	contact_us AS c
	INNER JOIN
	properties AS v
	ON 
		c.property = v.id
WHERE
	c.type = 2 AND SUBSTRING_INDEX(c.created,'-',1) = '".date('Y')."'
GROUP BY
	villa
ORDER BY
	tt_villa DESC
LIMIT 10");
$arr_3 = array();
while($data_3 = $dbc->Fetch($sql_3))
{
	$v_name = explode("|",$data_3['villaname']);
	$arr_3[] = array(
		'label' => $v_name[0],
		'y' => $data_3['tt_villa']
	);
}
$total_villa_3 = json_encode($arr_3);
//echo $total_villa_3;



$sql_4 = $dbc->Query("SELECT
	COUNT(id) AS amt, 
	type, 
	property, 
	`name`, 
	phone, 
	email, 
	SUBSTRING_INDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(created,'-',-2),'-',1),' ',1) AS cdate, 
	updated, 
	SUBSTRING_INDEX(contact_us.created,'-',1) AS dated
FROM
	contact_us
WHERE
	type = 2 AND
	SUBSTRING_INDEX(created,'-',1) = '".date('Y')."'
GROUP BY
	cdate
ORDER BY
	created");
$array_data_4 = array();
while($data_4 = $dbc->Fetch($sql_4))
{
	/*$v_name = explode("|",$data_4['villaname']);
	$arr_4[] = array(
		'label' => $v_name[0],
		'y' => $data_4['tt_villa']
	);*/
	
	/*$val = '{ x: new Date('.$data_4['cdate'].', 0), y: '.$data_4['amt'].' }';
	array_push($arr_4,$val);*/
	$array_data_4[] = array(
		'x'=> $data_4['dated'], 
		'y'=> $data_4['amt']
	);
}
$total_villa_4 = json_encode($array_data_4);
//echo $total_villa_4;
?>

<script>
window.onload = function () {
	CanvasJS.addColorSet("Blue",
	[
	"#0B3861",
	"#084B8A",
	"#045FB4",
	"#0174DF",
	"#0080FF",
	"#2E9AFE",    
	"#58ACFA",  
	"#81BEF7",     
	"#A9D0F5",  
	"#CEE3F6"
	]);
	CanvasJS.addColorSet("Blue2",
	[
	"#58ACFA",
	"#FFBF00",
	
	]);
	
	CanvasJS.addColorSet("Orange",
	[
	"#61380B",
	"#8A4B08",
	"#B45F04",
	"#DF7401",
	"#FF8000",
	"#FE9A2E",    
	"#FAAC58",  
	"#F7BE81",     
	"#F5D0A9",  
	"#F6E3CE"
	]);
	CanvasJS.addColorSet("Orange2",
	[
	"#FAAC58",
	"#FFBF00",
	
	]);
var chart1 = new CanvasJS.Chart("chartContainer_1",{
    animationEnabled: true,  exportEnabled: true,
	colorSet: "Blue2",
	title:{
		text: "Booking Data by Year",
		fontSize: 25,
		fontFamily: "sans-serif",
		fontWeight: "bold",
	},
	axisY: {
		title: "Booking",
		//valueFormatString: "#0,,.",
		//suffix: "mn",
		//prefix: "Amt"
	},
	data: [{
		type: "splineArea",
		markerSize: 5,
		xValueFormatString: "YYYY",
		yValueFormatString: "",//"$#,##0.##",
		dataPoints:[
		<?php $i=0;
		foreach($array_data as $va)
		{
			echo '{ x: new Date('.$va['x'].', '.$i.'), y: '.$va['y'].'},';
			$i++;
		}
		?>
		]
	}]
});
chart1.render();


var data_set = <?php echo $total_villa;?>;
var chart2 = new CanvasJS.Chart("chartContainer_2",{
    animationEnabled: true,exportEnabled: true,
	colorSet: "Blue",
	title: {
		text: "Top 10 Villa Booking",
		fontSize: 25,
		fontFamily: "sans-serif",
		fontWeight: "bold",
	},
	data: [{
		type: "doughnut",
		innerRadius: "60%",
		showInLegend: true,
		legendText: "{label}",
		//indexLabel: "{label}: #total",
		dataPoints: data_set
		/*[
			{ label: "Department Stores", y: 6492917 },
			{ label: "Discount Stores", y: 7380554 },
			{ label: "Stores for Men / Women", y: 1610846 },
			{ label: "Teenage Specialty Stores", y: 950875 },
			{ label: "All other outlets", y: 900000 }
		]*/
	}]
});
chart2.render();


var data_set_3 = <?php echo $total_villa_3;?>;
var chart3 = new CanvasJS.Chart("chartContainer_3",{
    exportEnabled: true,
	animationEnabled: true,
	colorSet: "Orange",
	title: {
		text: "Top 10 Villa Booking in <?php echo date('Y');?>",
		fontSize: 25,
		fontFamily: "sans-serif",
		fontWeight: "bold",
	},
	data: [{
		type: "doughnut",
		innerRadius: "60%",
		showInLegend: true,
		legendText: "{label}",
		//indexLabel: "{label}: #total",
		dataPoints: data_set_3
		/*[
			{ label: "Department Stores", y: 6492917 },
			{ label: "Discount Stores", y: 7380554 },
			{ label: "Stores for Men / Women", y: 1610846 },
			{ label: "Teenage Specialty Stores", y: 950875 },
			{ label: "All other outlets", y: 900000 }
		]*/
	}]
});
chart3.render();



var data_set_4 = <?php echo $total_villa_4;?>;
var chart3 = new CanvasJS.Chart("chartContainer_4",{
    exportEnabled: true,
	colorSet: "Orange2",
	animationEnabled: true,
	title: {
		text: "Booking Data <?php echo date('Y');?>",
		fontSize: 25,
		fontFamily: "sans-serif",
		fontWeight: "bold",
	},
	axisY: {
		title: "Booking",
		//valueFormatString: "#0,,.",
		//suffix: "mn",
		//prefix: "Amt"
	},
	data: [
	{
		type: "splineArea",
		//type: "spline",
		name: "Units Sold",
		showInLegend: true,
		xValueFormatString: "MMM YYYY",
		dataPoints: [
			<?php 
			$i=0;
		foreach($array_data_4 as $va)
		{
			echo '{ x: new Date('.$va['x'].', '.$i.',1), y: '.$va['y'].'},';
			$i++;
		}
		?>
		]
	}
	]
});
chart3.render();



}

</script>
<div class="col-md-3"><div id="chartContainer_4" style="height: 370px; width: 100%; margin-bottom:20px;"></div></div>
<div class="col-md-3"><div id="chartContainer_3" style="height: 370px; width: 100%; margin-bottom:20px;"></div></div>
<div class="col-md-3"><div id="chartContainer_1" style="height: 370px; width: 100%; margin-bottom:20px;"></div></div>
<div class="col-md-3"><div id="chartContainer_2" style="height: 370px; width: 100%; margin-bottom:20px;"></div></div>

<div class="col-md-6"></div>




<script src="libs/js/jquery-1.11.1.min.js"></script>
<script src="libs/js/jquery.canvasjs.min.js"></script>
