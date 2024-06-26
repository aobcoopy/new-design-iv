<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
	
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	$addressMap = $dbc->GetRecord("icons","*","id=".$_REQUEST['id']);
	$photo = json_decode($addressMap['icon'],true);
?>
<div class="modal fade" id="dialog_edit_group" data-backdrop="static">
  	<div class="modal-dialog" style="width:80%;">
		<form id="form_edit_addressMap" class="form-horizontal" role="form" onsubmit="fn.app.addressMap.addressMap.save_change();return false;">
		<input type="hidden" name="txtID" value="<?php echo $addressMap['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Edit addressMap</h4>
      		</div>
		    <div class="modal-body">
            	<div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="txTitle_edit" name="txTitle_edit" value="<?php echo $addressMap['name'];?>">
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Icon</label>
					<div class="col-sm-10">
                    <?php
					$icnmap = $addressMap['iconmap'];
					$expo = explode("/",$icnmap);
					if($addressMap['updated']>='2020-11-09')
					{
						$expo_2 = explode(".",$expo[6]);
					}
					else
					{
						$expo_2 = explode(".",$expo[7]);
					}
					
					$iname = $expo_2[0];
					for($i=0;$i<36;$i++)
					{
						$arr_pic = ["Adventure","airport","Aquarium","beach","boat","buddha","cam","canyon","castle","Crocodile","Farm","golf","hospital","museum","Office","Restaurants","rocks","shopping","sport","town","Transport","Walking_Street","Water_Park","waterfall","water_rollerball","water_ski","yacht","zoo","fastival","elephant","cabaret","lake","hotel","pier","school","park"];//,"netflix"
						
						
						?>
                        
                        <button type="button" class="btn btn-default btnic <?php echo $arr_pic[$i];?>" onClick="select_icon_e('<?php echo $arr_pic[$i];?>',this);"><img src="../../../../upload/icomaps/<?php echo $arr_pic[$i];?>.png" width="60px"></button><?php
					}
					?>
					<script>
                    function select_icon_e(location,me)
					{
						//var lo = "../../../../upload/map/ok/"+location+".png";
						var lo = "../../../../upload/icomaps/"+location+".png";
						$("#tx_icon_e").val(lo);
						$("#tx_icon_name_e").text(location);
						
						$(".btnic").removeClass("btn-success");
						$(".btnic").addClass("btn-default");
						$(me).removeClass("btn-default");
						$(me).addClass("btn-success");
					}
                    </script>
                       <h3 id="tx_icon_name_e" style="margin-top: 15px;text-transform: capitalize;"><?php echo $iname;?></h3>
                       <input type="hidden" class="form-control" id="tx_icon_e" name="tx_icon_e" value="<?php echo $addressMap['iconmap'];?>"> 
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Location</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="tx_la_e" name="tx_la_e" readonly value="<?php echo $addressMap['la'];?>">
					</div>
                    <div class="col-sm-5">
						<input type="text" class="form-control" id="tx_ln_e" name="tx_ln_e" readonly value="<?php echo $addressMap['ln'];?>">
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Map</label>
					<div class="col-sm-10">
                    	<input id="pac-input_e" class="controls form-control" type="text" placeholder="Search Box">
						<div id="i_map_e"></div> 
					</div>
				</div>
                <?php /*?><div role="tabpanel" class="tab-pane" id="photoss">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Icon</label>
                        <div class="col-sm-10">
                            <button type="button" class="btn btn-primary" onClick="fn.app.addressMap.addressMap.upload_photo_edit()">Upload</button>
                        </div>
                    </div>
                    <div class="thumbs">
                    	<label class="col-sm-2 control-label"></label>
                        <div class="col-md-2 phof">
							<input type="hidden" class="paths" id="path_photo_edit" name="path_photo_edit" value="<?php echo $photo;?>">
							<input type="hidden" name="txt_photo_edit" id="txt_photo_edit"  value="<?php echo $photo;?>">
							<img src="<?php echo $photo;?>"  width="100%" class=" phos">
							<button type="button" class="btn btn-danger bc_edit" style="width:100%; display:none" onclick="fn.app.addressMap.addressMap.remove_photo_edit(this);">
								<i class="fa fa-times" aria-hidden="true"></i>
							</button>
						</div>
                    </div>
                </div><?php */?>
                
                
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
        <form id="form_edit_photo" class="hidden">
            <input id="f_Photo_edit" name="file" type="file">
            <button type="button" id="btn_upp2" onClick="fn.app.addressMap.addressMap.upload_photo_file_edit()">UP</button>
        </form>
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
      var map;
	  var lati_2 ='<?php echo ($addressMap['la']!='')?$addressMap['la']:7.880840;?>';
	  var long_2 = '<?php echo ($addressMap['ln']!='')?$addressMap['ln']:98.391883;?>';
	  
	 function initialize() {
	  var myLatlng = new google.maps.LatLng(lati_2,long_2);//new google.maps.LatLng(13.698369,100.604312);
	  var mapOptions = {
		  scrollwheel: false,
		  //styles: styleArray,
		  center: {lat:lati_2, lng:long_2 },//{lat: 13.698369, lng: 100.604312},
		  zoom: 14,
		  center: myLatlng
	  }
	  var map = new google.maps.Map(document.getElementById('i_map_e'), mapOptions);
	
	  var marker = new google.maps.Marker({
		  position: myLatlng,
		  map: map,
		  title: 'Share Olanlab Com',
		  //icon:'upload/logo.png'
	  });
	  
	  // Create the initial InfoWindow.
        var infoWindow = new google.maps.InfoWindow(
            {content: 'My Location', position: myLatlng});
        //infoWindow.open(map);
		 

        // Configure the click listener.
        map.addListener('click', function(mapsMouseEvent) {
          // Close the current InfoWindow.
          infoWindow.close();

          // Create a new InfoWindow.
          infoWindow = new google.maps.InfoWindow({position: mapsMouseEvent.latLng});
          infoWindow.setContent(mapsMouseEvent.latLng.toString());
          infoWindow.open(map);
		  
		  var str = mapsMouseEvent.latLng.toString();
		  var txt1 = str.replace("(","");
		  var txt2 = txt1.replace(")","");
    	  var res = txt2.split(",");
		  $("#tx_la_e").val(res[0]);
		  $("#tx_ln_e").val(res[1]);
		  //$("#tx_la_e").val(mapsMouseEvent.latLng);
        });
		
		
		
		//-----add box search
		
		// Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input_e');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
	  
	  // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });
		
		var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
		//-----add box search
	}
	google.maps.event.addDomListener(window, 'load', initialize);
		
	
	
	
	
	
		
     
	 
	 
    </script>
    

    
    
<script tyle="text/javascript">
var sel_icon = '<?php echo ($iname!='')?$iname:'';?>';
$(function(){
	$('#dialog_edit_group').on('shown.bs.modal', function () {
		$("#txtName").focus();
		initialize();
		if(sel_icon!='')
		{
			$("."+sel_icon).click();
		}
		
	});
	$("#dialog_edit_group").on("hidden.bs.modal",function(){
		$(this).remove();
		google.maps.event.addDomListener(window, 'load', initialize);
	});
	$("#dialog_edit_group").modal('show');
});	

	
</script>

<style>
  #i_map_e {
	height: 400px;
	width:100%;
  }
  .pac-container
  {
	  z-index:1100 !important;
  }
  #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input_e {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input_e:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
      #target {
        width: 345px;
      }
</style>
  
    

   
   