<?php
class meClass{
	private $app = "metatag_search";
	private $dbc = null;
	
	function __construct($dbc=null){
		$this->dbc = $dbc;
	}
	
	private $header_meta = array(
		array('add_metatags'	,"Add metatags",	'fa fa-group'),
        array("show_metatags",    'List, Edit, Delete metatags',        'fa fa-group')
	);
	
	function PageHeader($active){
		echo '<div id="breadcrumb">';
			echo '<ul class="breadcrumb push-down-0">';
				echo ' <li><a href="?app='.$this->app.'"> Search page metatags</a></li>';
				
				foreach($this->header_meta as $header){
					if($header[0]==$active){
						echo '<li class="active">'.$header[1].'</li>';;
					}
				}	
			echo '</ul>';
		echo '</div>';
				
	}
	
	function PageTabPanel($active){
		echo '<div class="page-tabs">';
		foreach($this->header_meta as $header){
			echo '<a href="?app='.$this->app.'&view='.$header[0].'"'.($header[0]==$active?' class="active"':'').'>';
				echo ''.$header[1];
			echo '</a>';
		}
		echo '</div>';
	}
}
?>