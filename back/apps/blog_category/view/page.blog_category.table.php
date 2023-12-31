<div class="col-md-12">
	<div class="panel panel-default">
		<div id="panel-heading-group" class="panel-heading">
	        <h3 class="panel-title">Blog Category</h3>
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
                            <th>name</th>
                            <th>Link Name</th>
                            <th>Updated</th>
                            <th>Status</th>
                            <th>Sort</th>
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
  height:100px !important; 
  width:auto;
  cursor:move;
}

#tblSlide tbody tr 
{
	height:80px;
}
</style>
<script>
  $(function() {
	$("#panel-heading-group").append('<button id="btnSavesort" type="button" onclick="fn.app.blog_category.blog_category.sort()" class="btn btn-info pull-right">Save Sort</button>');
	$( "#tblSlide" ).children().sortable();
	$( "#tblSlide " ).disableSelection();
  });


fn.app.blog_category.blog_category.sort = function(id) {
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
		url:"apps/blog_category/xhr/action-save-sort.php",
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
		"ajax": "apps/blog_category/store/store-blog_category.php",
		"aoColumns": [
			{ "bSortable": false},
			{"bSort" : false, class:"rows"},
			{"bSortable": false},
			{"bSortable": false},
            {"bSortable": false},
			{"bSortable": true},
			{"bSortable": false}
		],
		//"order": [[ 0, "desc" ]],
		 "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		 iDisplayLength: -1,
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
			s += fn.engine.datatable.button('btn-default','fa-pencil','fn.app.blog_category.blog_category.change('+data[0]+')');
			s += ' ';
			s += fn.engine.datatable.button('btn-warning','fa-photo','fn.app.blog_category.blog_category.photo('+data[0]+')','','Photo');
			s += ' ';
			//s += fn.engine.datatable.button('btn-warning','fa-lock','fn.app.blog_category.group.permission('+data[0]+')');
			$('td', row).eq(6).html(s);
			
			
			
			
			
			
			var p='';
			if(data[8]!='')
			{
				p+= '<img src="'+data[8]+'" width="150"><br>';
			}
			
			//p+= '<button class="btn" style="background:'+data[7]+'">';
			p+= data[1];
			//p+= '</button>';
			p+= '<input type="hidden" name="tid" value="'+data[0]+'">';
			p+= '<input type="hidden" name="sor" value="'+ii+'">';
			$('td', row).eq(1).html(p);
			ii ++;
			
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
			
			/*var a = '';
			if(data[10]==1){
				a +='<div class="switch">';
				a +='<input id="cmn-toggle-'+data[0]+'-v" class="cmn-toggle cmn-toggle-round" checked type="checkbox" onClick="fn.app.edit.change_v_status('+data[0]+',this)">';
				a += '<label for="cmn-toggle-'+data[0]+'-v"></label>';
				a += '</div>'; 
			}else {
				a +='<div class="switch">';
				a +='<input id="cmn-toggle-'+data[0]+'-v" class="cmn-toggle cmn-toggle-round" type="checkbox" onClick="fn.app.edit.change_v_status('+data[0]+',this)">';
				a += ' <label for="cmn-toggle-'+data[0]+'-v"></label>';
				a += '</div>';
			}
			$('td', row).eq(10).html(a);*/
		}
	});
	fn.engine.datatable.add_selectable('tblSlide','chk_group');
	
});
</script>