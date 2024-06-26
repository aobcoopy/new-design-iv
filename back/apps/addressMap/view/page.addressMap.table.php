<div class="col-md-12">
	<div class="panel panel-default">
		<div id="panel-heading-group" class="panel-heading">
	        <h3 class="panel-title">Address Map</h3>
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
                           <!-- <th>icon</th>-->
                            <th>name</th>
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
/*.rows img
{
  height:200px !important; 
  width:auto;
  cursor:move;
}

#tblSlide tbody tr 
{
	height:200px;
}*/
</style>
<script>
  $(function() {
	//$("#panel-heading-group").append('<button id="btnSavesort" type="button" onclick="fn.app.addressMap.addressMap.sort()" class="btn btn-info pull-right">Save Sort</button>');
	///$( "#tblSlide" ).children().sortable();
	//$( "#tblSlide " ).disableSelection();
  });


fn.app.addressMap.addressMap.sort = function(id) {
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
		url:"apps/addressMap/xhr/action-save-sort.php",
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
		"ajax": "apps/addressMap/store/store-addressMap.php",
		"aoColumns": [
			{ "bSortable": false},
			//{"bSort" : false, class:"rows", "sWidth":"60px"},
			{"bSortable": false},
			{"bSortable": false },
			{"bSortable": false , class:"text-center" },
			{"bSortable": false },
			{"bSortable": false }
		],
		"stateSave": true,
		//"order": [[ 0, "desc" ]],
		"createdRow": function ( row, data, index ) {
			var selected = false;
			var checked = "";
			if ( $.inArray(data.DT_RowId, $("#tblSlide").data( "selected")) !== -1 ) {
                $(row).addClass('selected');
				selected = true;
            }
			var s = '';
			s += fn.engine.datatable.checkbox('chk_group',data[0],selected);
			$('td', row).eq(0).html(s).addClass("text-center");
			s = '';
			s += fn.engine.datatable.button('btn-default','fa-pencil','fn.app.addressMap.addressMap.change('+data[0]+')');
			s += ' ';
			//s += fn.engine.datatable.button('btn-warning','fa-lock','fn.app.addressMap.group.permission('+data[0]+')');
			$('td', row).eq(5).html(s);
			
			
			var p='';
			
			if(data[8]!=null)
			{
				p+= '<img src="'+data[8]+'" width="40"  class="pull-right">';
			}
			
			
			if(data[6]!=null && data[7]!=null)
			{
				p+= data[1]+'<br>';
				p+= 'La : <button type="button" class="btn btn-success btn-xs">'+data[7]+'</button>';
				p+= '   Ln : <button type="button" class="btn btn-info btn-xs">'+data[6]+'</button>';
			}
			else
			{
				p+= data[1];
			}
			$('td', row).eq(1).html(p);
			
			
			/*var p='';
			p+= '<img src="'+data[1]+'" width="50">';
			p+= '<input type="hidden" name="tid" value="'+data[0]+'">';
			p+= '<input type="hidden" name="sor" value="'+ii+'">';
			$('td', row).eq(1).html(p);
			ii ++;*/
			
			var a = '';
			if(data[4]==1){
				a +='<div class="switch">';
				a +='<input id="cmn-toggle-'+data[0]+'" class="cmn-toggle cmn-toggle-round" checked type="checkbox" onClick="fn.app.edit.change_status('+data[0]+',this)">';
				a += '<label for="cmn-toggle-'+data[0]+'"></label>';
				a += '</div>'; 
			}else {
				a +='<div class="switch">';
				a +='<input id="cmn-toggle-'+data[0]+'" class="cmn-toggle cmn-toggle-round" type="checkbox" onClick="fn.app.edit.change_status('+data[0]+',this)">';
				a += ' <label for="cmn-toggle-'+data[0]+'"></label>';
				a += '</div>';
			}
			$('td', row).eq(4).html(a);
		}
	});
	fn.engine.datatable.add_selectable('tblSlide','chk_group');
	
});
</script>