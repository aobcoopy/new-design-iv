<div class="col-md-12">
    <div class="panel panel-default">
        <div id="panel-heading-group" class="panel-heading">
            <h3 class="panel-title">villa_data</h3>
        </div>
        <div class="panel-body">
        <br><br>
        
         <!-- Nav tabs -->
         
        <ul class="nav nav-tabs" role="tablist">         
			<?php
            $countDestinations = 0;
            $arrayDestinations_name_slug_id = [];
            $sql_destinations = $dbc->Query("select * from destinations WHERE parent IS NULL"); 
            while($result_destinations = $dbc->Fetch($sql_destinations))
            {
                $countDestinations++;
                $arrayDestinations_name_slug_id[] = array($result_destinations['name'], $result_destinations['slug'], $result_destinations['id']);
            ?>
                <li role="presentation" id="tab_<?php echo $result_destinations['slug'];?>" class="<?php if($countDestinations == 1) echo "active" ?>">
                    <a href="#<?php echo $result_destinations['slug'] ?>" aria-controls="<?php echo $result_destinations['slug'] ?>" role="tab" data-toggle="tab">
                        <?php echo $result_destinations['name'] ?>
                    </a>
                </li>
            <?php            
            } 
            ?>         
        </ul>
        
            <!-- Tab panes -->
            <div class="tab-content">
            
            <!--<pre>-->
            	<?php //print_r($arrayDestinations_name_slug_id);?>
            <!--</pre>-->
			<?php
			$countTabs = 0;
			foreach ($arrayDestinations_name_slug_id as $array_Name_Slug_id)
			{
				$destination_id = $array_Name_Slug_id[2];
				$countTabs++;
				//echo $destination_id.'<<<';
			?>        
            
                        
                
                
                <div role="tabpanel" class="tab-pane<?php if($countTabs == 1) echo " active" ?>" id="<?php echo $array_Name_Slug_id[1] ?>"><br>
                
                
                
                
                        <!-- NEW -->
                        <div class="row">
                            <div class="col-md-12">
                                <label for="txtName" class="col-sm-2 control-label text-right">Beach</label>
                                <div class="col-md-6">
                                    <select name="cbbFilter_<?php echo $countTabs;?>" id="cbbFilter_<?php echo $countTabs;?>" class="form-control">
                                        <option value="all|<?php echo $array_Name_Slug_id[1];?>">all</option>
                                        <?php 
                                        $sql_destinations_filter = $dbc->Query("select * from destinations WHERE parent = '".$destination_id."' ORDER BY name asc"); 
                                        while($result_destinations_filter = $dbc->Fetch($sql_destinations_filter))
                                        {
                                            $beach_id = $result_destinations_filter['id'];
                                            $act = (isset($_REQUEST['beach']) && $_REQUEST['beach']==$beach_id)?'selected':'';
                                            $beach_name = $result_destinations_filter['name'];
                                            ?><option value="<?php echo $beach_id.'|'.$array_Name_Slug_id[1];?>" <?php echo $act;?>><?php echo $beach_name;?></option>
                                            
                                        <?php            
                                        } 
                                        ?>     
                                    </select>
                                </div>
                                
                            
                            </div><br><br><br>
                        </div>
                        <!-- NEW -->
                        
                        
                        
                    <div class="table-responsive">
                        <table id="tblSlide<?php if($countTabs > 1) echo "_" . $countTabs ?>" class="tblSlide_<?php echo $countTabs ?> table table-striped table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>
                                        <label class="label-checkbox">
                                            <input id="chk_group" type="checkbox"><span class="custom-checkbox"></span>
                                        </label>
                                    </th>
                                    <!--<th class="photo_tab">Photo</th>-->
                                    <th>Villa Name</th>
                                    <th>Beach Name</th>
                                    <th>Location</th>
                                    <th>Villa Description</th>
                                    <th>Bed Configuations</th>
                                    <th>Number of Bedroom</th>
                                    <th>Number of Bathroom</th>
                                    <th>Google Coordinator</th>
                                    <th>Min and Max Price</th>
                                    <th>category</th>
                                    <th>Facilities</th>
                                    <th>Villa Inclusions</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>            
                    </div>
                </div>
			<?php
			}
            ?>
            </div>
        </div>
    </div>
</div>
<style>
.photo_tab
{
	width:215px !important;
}
.actii
{
    width:160px !important;
}
.rows img
{
  height:100px !important; 
  width:auto;
  cursor:move;
}
.tblSlide_1 tbody tr ,.imgas,#tblSlide tbody tr
{
    height:100px !important;
}
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    border-color: transparent;
    padding: 5px 5px;
    background: #F0F4F9;
    color: #656C78;
    font-size: 13px;
}
.table
{
	width:100% !important;
}
.dataTables_info
{
	width:50%;
}
.bgy
{
	background:#FFEED3 !important;
	border: 1px solid #fea223 !important;
    color: #e58500 !important;
}
.bgred
{
	background:#FFE8E8 !important;
	border: 1px solid #ffa8a8 !important;
    color: #d91c1c !important;
}
</style>
<script>
$(function(){
    var ii = 1;
	
	
<?php
$countSlides = 0;
foreach ($arrayDestinations_name_slug_id as $array_Name_Slug_id)
{ 
    $countSlides++;
	
	//--- NEW ------
	if($_REQUEST['dest'] == $array_Name_Slug_id[1])
	{
		if(isset($_REQUEST['beach']) && $_REQUEST['beach']!='all')
		{
			$condition = "&beach=".$_REQUEST['beach'];
		}
		else
		{
			$condition = "&beach=all";
		}
	}
	else
	{
		$condition = "&beach=all";
	}
	
	//echo '>>>'.$array_Name_Slug_id[1];
	
?>    
	$("#cbbFilter_<?php echo $countSlides;?>").change(function(e) {
		var vall = $(this).val();
		var res = vall.split("|");
		if(res[1]!='undefined' || res[1]=='')
		{
			var dest = '&dest='+res[1];
		}
		else
		{
			var dest = '&dest=phuket';
		}
        window.location = '/back/?app=villa_data&beach='+res[0]+dest;
		
    });
	
	
	$(document).ready(function(e) {
		setTimeout(function(){
			$("li#tab_<?php echo $_REQUEST['dest'];?>").children().click();
		},800);
        
    });
	//--- NEW ------
	
    $("#tblSlide<?php if($countSlides > 1) echo "_" . $countSlides ?>").data( "selected", [] );
    $("#tblSlide<?php if($countSlides > 1) echo "_" . $countSlides ?>").DataTable({
            
        "processing": true,
        "serverSide": true,
        "stateSave": true,
        "ajax": "apps/villa_data/store/store-villa_data-all-regions.php?destinationID=<?php echo $array_Name_Slug_id[2].$condition;?>",  //--- NEW ------
        "aoColumns": [
            { "bSortable": false},
            //{"bSort" : false, class:"rows hidden", width:"215px" },
            {"bSortable": false, class:"hidden-"},
            {"bSortable": false, class:"hidden-xs" ,swidth:"262px"},
            {"bSortable": true},
            {"bSortable": true},
            {"bSortable": false},
            {"bSortable": false },
            {"bSortable": false , class:"text-center" },
            {"bSortable": false , class:"text-center" },
            {"bSortable": false , class:"text-center" },
            {"bSortable": false },
			{"bSortable": false },
            {"bSortable": false ,width:"391px"},
			{"bSortable": false }
        ],
		"lengthMenu": [[-1], [ "All"]],
		dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ],
        //"order": [[ 7, "desc" ]],
       
        "createdRow": function ( row, data, index ) {
            var selected = false;
            var checked = "";
            if ( $.inArray(data.DT_RowId, $("#tblSlide<?php if($countSlides > 1) echo "_" . $countSlides ?>").data( "selected")) !== -1 ) {
                $(row).addClass('selected');
                selected = true;
            }
            var s = '';
            s += fn.engine.datatable.checkbox('chk_group',data[0],selected);
            s += '<br>'+data[0];
            $('td', row).eq(0).html(s).addClass("text-center");
        }
    });
    fn.engine.datatable.add_selectable('tblSlide<?php if($countSlides > 1) echo "_" . $countSlides ?>','chk_group');
<?php } ?>    
});
</script>