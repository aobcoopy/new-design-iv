<?php
	session_start();
	include_once "../../../config/define.php";
	include_once "../../../libs/class/db.php";
    include_once "../../../inc/functions.inc.php";
	include_once "../../../inc/format_photo.php";
	@ini_set('display_errors',DEBUG_MODE?1:0);
	date_default_timezone_set(DEFAULT_TIMEZONE);
	
	$dbc = new dbc;
	$dbc->Connect();
	
	$yacth_fleet = $dbc->GetRecord("yacth_destination","*","id=".$_REQUEST['id']);
	//$photo = json_decode($yacth_fleet['photo'],true);
	//$photo = imagePath($photo);
    //$coverphoto = json_decode($yacth_fleet['cover'],true);
	//$coverphoto = imagePath($coverphoto);
?>
<div class="modal fade" id="dialog_edit_group" data-backdrop="static">
  	<div class="modal-dialog">
		<form id="form_edit_slide" class="form-horizontal" role="form" onsubmit="fn.app.yacth_fleet.yacth_fleet.save_change();return false;">
		<input type="hidden" name="txtID" value="<?php echo $yacth_fleet['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Edit</h4>
      		</div>
		    <div class="modal-body">
                <div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="txTitle_edit" name="txTitle_edit" value="<?php echo $yacth_fleet['name'];?>" onKeyUp="set_link(this,'#txLinke_edit');">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label">Link Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="txLinke_edit" name="txLinke_edit" value="<?php echo $yacth_fleet['slug'];?>" readonly>
                    </div>
                </div>
                <?php /*?><div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label">Short Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="txBrief_edit" name="txBrief_edit" value="<?php echo $yacth_fleet['brief'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtName" class="col-sm-2 control-label">Filter Box</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="txFilter_edit" name="txFilter_edit" value="<?php echo $yacth_fleet['filter_box'];?>">
                    </div>
                </div>                
            	<div class="form-group">
					<label for="txtSlug" class="col-sm-2 control-label">URL Slug</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="txSlug_edit" name="txSlug_edit" value="<?php echo $yacth_fleet['slug'];?>">
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Over all Detail</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="txDetail_edit" name="txDetail_edit" ><?php echo base64_decode($yacth_fleet['detail'],true);?></textarea>
					</div>
				</div>
               <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Inside Detail</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="txInside_edit" name="txInside_edit" ><?php echo base64_decode($yacth_fleet['inside'],true);?></textarea>
					</div>
				</div>
                
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Meta Title</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="txTitlee" name="txTitlee" ><?php echo $yacth_fleet['meta_title'];?></textarea>
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">H1</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="txH1e" name="txH1e" ><?php echo $yacth_fleet['meta_h1'];?></textarea>
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">H2</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="txH2e" name="txH2e" ><?php echo $yacth_fleet['meta_h2'];?></textarea>
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Descript</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="txDescripte" name="txDescripte" ><?php echo $yacth_fleet['meta_des'];?></textarea>
					</div>
				</div>
                
                <div role="tabpanel" class="tab-pane" id="photoss">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Photo</label>
                        <div class="col-sm-10">
                            <button type="button" class="btn btn-primary" onClick="fn.app.yacth_fleet.yacth_fleet.upload_photo_edit()">Upload</button>
                            <font color="#ff0000"> 1200 x 779 px</font>
                        </div>
                    </div>
                    <div class="thumbs">
                        <div class="col-md-12 phof">
							<input type="hidden" class="paths" id="path_photo_edit" name="path_photo_edit" value="<?php echo $photo;?>">
							<input type="hidden" name="txt_photo_edit" id="txt_photo_edit"  value="<?php echo $photo;?>">
							<img src="<?php echo imagePath($photo);?>"  width="100%" class=" phos">
							<!--<button type="button" class="btn btn-danger bc_edit" style="width:100%; display:none" onclick="fn.app.yacth_fleet.yacth_fleet.remove_photo_edit(this);">
								<i class="fa fa-times" aria-hidden="true"></i>
							</button>-->
						</div>
                    </div>
                </div>
                <div class="form-group">
					
				</div>
                
                    <div class="form-group" style="margin-top:15px;">
                        <label class="col-sm-2 control-label">Cover Photo</label>
                        <div class="col-sm-10">
                            <button type="button" class="btn btn-primary" onClick="fn.app.yacth_fleet.yacth_fleet.upload_coverphoto_edit()">Upload</button>
                            <font color="#ff0000"> 1920 x 600 px</font>
                        </div>
                    </div>
                    <div class="thumbs">
                        <div class="col-md-12 phof">
							<input type="hidden" class="paths" id="path_coverphoto_edit" name="path_coverphoto_edit" value="<?php echo $coverphoto;?>">
							<input type="hidden" name="txt_coverphoto_edit" id="txt_coverphoto_edit"  value="<?php echo $coverphoto;?>">
							<img src="<?php echo imagePath($coverphoto);?>"  width="100%" class=" covphos">
						<!--	<button type="button" class="btn btn-danger bc_coveredit" style="width:100%; display:none" onclick="fn.app.yacth_fleet.yacth_fleet.remove_coverphoto_edit(this);">
								<i class="fa fa-times" aria-hidden="true"></i>
							</button>-->
						</div>
                    </div>
                <?php */?>
                
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
        <?php /*?><form id="form_edit_photo" class="hidden">
            <input id="f_Photo_edit" name="file" type="file">
            <button type="button" id="btn_upp2" onClick="fn.app.yacth_fleet.yacth_fleet.upload_photo_file_edit()">UP</button>
        </form>
        
        <form id="form_edit_coverphoto" class="hidden">
            <input id="f_coverPhoto_edit" name="file" type="file">
            <button type="button" id="btn_coverupp2" onClick="fn.app.yacth_fleet.yacth_fleet.upload_coverphoto_file_edit()">UP</button>
        </form><?php */?>
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script tyle="text/javascript">
$(function(){
	$('#dialog_edit_group').on('shown.bs.modal', function () {
		$("#txtName").focus();
	});
	$("#dialog_edit_group").on("hidden.bs.modal",function(){
		$(this).remove();
	});
	$("#dialog_edit_group").modal('show');
});	

	
</script>