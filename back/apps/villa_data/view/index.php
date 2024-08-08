<script type="text/javascript" src="apps/villa_data/app_1.js"></script>

<?php
	include_once "apps/villa_data/include/me.class.php";
	$my = new meClass;
	$view = isset($_REQUEST['view'])?$_REQUEST['view']:"villa_data";
?>
	<?php
		$my->PageHeader($view);
		$my->PageTabPanel($view);
	?>
	
	<div class="page-content-wrap page-tabs-item active">
		<div class="row">
		<?php
			switch($view){
				case "villa_data":
					include_once "apps/villa_data/view/page.villa_data.table.php";
									
					if($os->allow('villa_data','add'))
					include_once "apps/villa_data/control/controller.villa_data.add.php";
								
					if($os->allow('villa_data','edit'))
					include_once "apps/villa_data/control/controller.villa_data.change.php";
					
					if($os->allow('villa_data','delete'))
					include_once "apps/villa_data/control/controller.villa_data.remove.php";
								
					//if($os->allow('villa_data','edit'))
					//include_once "apps/villa_data/control/controller.villa_data.permission.php";
				
					//if($os->allow('villa_data','edit'))
					//include_once "apps/villa_data/control/controller.villa_data.export.php";
				break;
			}
		?>
		</div>  
	</div>

