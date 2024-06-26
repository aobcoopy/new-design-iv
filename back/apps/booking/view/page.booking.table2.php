<div class="col-md-12">
	<div class="panel panel-default">
		<div id="panel-heading-group" class="panel-heading">
	        <h3 class="panel-title">Booking </h3>
	    </div>
	    <div class="panel-body">
        
        
<form>
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="inputEmail4">Start</label>
      <input type="date" class="form-control" id="date_start" name="date_start">
    </div>
    <div class="form-group col-md-5">
      <label for="inputPassword4">End</label>
      <input type="date" class="form-control" id="date_end" name="date_end">
    </div>
    <div class="form-group col-md-2">
      <br>
      <button type="button" onClick="load_data();" class="btn btn-primary">Gen Report</button>
    </div>
  </div>
</form>


	        <div class="table-responsive">
	            <table id="tblGroup" class="table table-striped table-bordered datatable">
	                <thead>
	                    <tr>
	                        <th>
								<label class="label-checkbox">
									<input id="chk_group" type="checkbox"><span class="custom-checkbox"></span>
								</label>
							</th>
                            <!--<th>from</th>-->
                            <th>Property</th>
                            <th>name</th>
                            <th>phone</th>
                            <th>email</th>
	                        <th>Date</th>
                            <th>Checkin</th>
                            <th>Checkout</th>
                            <th>User</th>
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

<script>
/*function load_data()
{
	var start = $("#date_start").val();
	var end = $("#date_end").val();
	
	table = $(".datatable").DataTable({
		"ajax": "apps/booking/store/store-booking.php?tx_start="+start+"&tx_end="+end+"",
		 paging: false,
		 searching: false,
		 "lengthMenu": [[3000, 35, 50, -1], [3000, 35, 100, "All"]],
		dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ],
		"aoColumns": [
			{ "bSortable": false},
			//{"bSort" : true},
			{"bSortable": true},
			{"bSortable": true},
			{"bSortable": true},
			{"bSortable": false },
			{"bSortable": false },
			{"bSortable": false },
			{"bSortable": false },
			{"bSortable": false },
			{"bSortable": false },
			{"bSortable": false }
		],
		//"order": [[ 0, "desc" ]],
		
	});
	//table.destroy();
}*/

$(function(){
//	var i=0;
	$(".datatable").data( "selected", [] );
	$(".datatable").DataTable({
		"processing": true,
		"serverSide": true,
		"ajax": "apps/booking/store/store-booking.php",
		"lengthMenu": [[30, 35, 50, -1], [30, 35, 100, "All"]],
		dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ],
		"aoColumns": [
			{ "bSortable": false},
			//{"bSort" : true},
			{"bSortable": true},
			{"bSortable": true},
			{"bSortable": true},
			{"bSortable": false },
			{"bSortable": false },
			{"bSortable": false },
			{"bSortable": false },
			{"bSortable": false },
			{"bSortable": false },
			{"bSortable": false }
		],
		//"order": [[ 0, "desc" ]],
		
		"createdRow": function ( row, data, index ) {
			var selected = false;
			var checked = "";
			if ( $.inArray(data.DT_RowId, $(".datatable").data( "selected")) !== -1 ) {
                $(row).addClass('selected');
				selected = true;
            }
			//i++;
			var s = '';
			s += fn.engine.datatable.checkbox('chk_group',data[0],selected);
			//s += ''+i;
			
			$('td', row).eq(0).html(s).addClass("text-center");
			
			s = '';
			s += fn.engine.datatable.button('btn-default','fa-search','fn.app.booking.booking.view('+data[0]+')');
			s += ' ';
			//s += fn.engine.datatable.button('btn-warning','fa-lock','fn.app.booking.group.permission('+data[0]+')');
			$('td', row).eq(10).html(s);
			
			
			
			var a = '';
			if(data[9]==1){
				/*a +='<div class="switch">';
				a +='<input id="cmn-toggle-'+data[0]+'" class="cmn-toggle cmn-toggle-round" checked type="checkbox" onClick="fn.app.edit.change_status('+data[0]+',this)">';
				a += '<label for="cmn-toggle-'+data[0]+'"></label>';
				a += '</div>';*/
				a+='<button class="btn btn-success"><i class="fa fa-file-text-o" aria-hidden="true"></i></button>' 
			}else {
				/*a +='<div class="switch">';
				a +='<input id="cmn-toggle-'+data[0]+'" class="cmn-toggle cmn-toggle-round" type="checkbox" onClick="fn.app.edit.change_status('+data[0]+',this)">';
				a += ' <label for="cmn-toggle-'+data[0]+'"></label>';
				a += '</div>';*/
				a+='<button class="btn btn-warning"><i class="fa fa-envelope " aria-hidden="true"></i></button>' 
			}
			$('td', row).eq(9).html(a);
		}
	});
	fn.engine.datatable.add_selectable('tblGroup','chk_group');
	
});
</script>