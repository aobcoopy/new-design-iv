<div class="col-md-12">
	<div class="panel panel-default">
		<div id="panel-heading-group" class="panel-heading">
	        <h3 class="panel-title">Destination</h3>
	    </div>
	    <div class="panel-body">
	        <div class="table-responsive">
	            <table id="tblSlide" class="table table-striped table-bordered datatable">
	                <thead>
	                    <tr>
	                        <th>
								<label class="label-checkbox">
									<input id="chk_group" type="checkbox"><span class="custom-checkbox"></span>
								</label>
							</th>
                            <!--<th>icon</th>-->
                            <th>name</th>
                            <th>URL Slug</th>
	                        <th>user</th>
                            <th>Updated</th>
                            <th>Status</th>
							<th>Action</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    
	                </tbody>
	            </table>	        
	        </div>
	    </div>
	</div>
</div>
<style>
.rows img
{
  height:50px !important; 
  width:auto;
  cursor:move;
}
.immg
{
	height:50px !important;
}
#tblSlide tbody tr 
{
	height:50px;
}
</style>
<script>
  $(function() {
	//$("#panel-heading-group").append('<button id="btnSavesort" type="button" onclick="fn.app.destination.destination.sort()" class="btn btn-info pull-right">Save Sort</button>');
	//$( "#tblSlide" ).children().sortable();
	//$( "#tblSlide " ).disableSelection();
  });


fn.app.destination.destination.sort = function(id) {
	var data = {
		tables : []			
	};
	var io=1;
	$("#tblSlide tbody tr").each(function(index, element) {
		data.tables.push({
				id : $(this).find("input[name=tid]").val(),
				sort : io
			});
			io++;
	});
	
	
	$.ajax({
		url:"apps/destination/xhr/action-save-sort.php",
		type:"POST",
		dataType:"json"	,
		data:data,
		success: function(response){
			$("#tblSlide").DataTable().draw();
			window.location.reload();
		}
	});   
};





$(function(){
	var ii = 1;
	$("#tblSlide").data( "selected", [] );
	$("#tblSlide").DataTable({
		"processing": true,
		"serverSide": true,
		"ajax": "apps/destination/store/store-destination.php",
		"aoColumns": [
			{ "bSortable": false},
			//{"bSort" : false, class:"rows", "sWidth":"60px"},
			{"bSortable": true},
            {"bSortable": false },
			{"bSortable": false },
			{"bSortable": false , class:"text-center" },
			{"bSortable": false },
			{"bSortable": false }
		],
		"order": [[ 1, "asc" ]],
		"createdRow": function ( row, data, index ) {
			var selected = false;
			var checked = "";
			if ( $.inArray(data.DT_RowId, $("#tblSlide").data( "selected")) !== -1 ) {
                $(row).addClass('selected');
				selected = true;
            }
			var s = '';
			s += fn.engine.datatable.checkbox('chk_group',data[0],selected);
			s += '<br>';
			s += data[0];
			
			$('td', row).eq(0).html(s).addClass("text-center");
			s = '';
			s += fn.engine.datatable.button('btn-default','fa-pencil','fn.app.destination.destination.change('+data[0]+')','Edit',' ');
			
			s += ' ';
			//s += fn.engine.datatable.button('btn-warning','fa-lock','fn.app.destination.group.permission('+data[0]+')');
			$('td', row).eq(6).html(s);
			
			
			
			
			
			
			/*var p='';
			p+= '<img src="'+data[1]+'" class="immg">';
			p+= '<input type="hidden" name="tid" value="'+data[0]+'">';
			p+= '<input type="hidden" name="sor" value="'+ii+'">';
			$('td', row).eq(1).html(p);
			ii ++;*/
			
			var strn = data[1];
			var resn = strn.split("|");
			
			var a = '';
			if(data[5]==1){
				a +='<div class="switch">';
				a += '<input type="hidden" class="txn" value="'+resn[0]+'">';
				a +='<input id="cmn-toggle-'+data[0]+'" class="cmn-toggle cmn-toggle-round" checked type="checkbox" onClick="fn.app.edit.change_status('+data[0]+',this,'+data[5]+')">';
				a += '<label for="cmn-toggle-'+data[0]+'"></label>';
				a += '</div>'; 
			}else {
				a +='<div class="switch">';
				a += '<input type="hidden" class="txn" value="'+resn[0]+'">';
				a +='<input id="cmn-toggle-'+data[0]+'" class="cmn-toggle cmn-toggle-round" type="checkbox" onClick="fn.app.edit.change_status('+data[0]+',this,'+data[5]+')">';
				a += ' <label for="cmn-toggle-'+data[0]+'"></label>';
				a += '</div>';
			}
			$('td', row).eq(5).html(a);
		}
	});
	fn.engine.datatable.add_selectable('tblSlide','chk_group');
	
});
</script>