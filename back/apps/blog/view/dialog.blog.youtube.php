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
	
	$blog = $dbc->GetRecord("blogs","*","id=".$_REQUEST['id']);
	$youtube = json_decode($blog['youtube'],true);
	
?>
<script>
	$(document).ready(function(e) {
       $( 'textarea.editor' ).ckeditor();
    });
</script>
<!--<script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>-->

<div class="modal fade" id="dialog_edit_group" data-backdrop="static">
  	<div class="modal-dialog  modal-lg" >
		<form id="form_edit_youtube" class="form-horizontal" role="form" onsubmit="fn.app.blog.blog.save_youtube();return false;">
		<input type="hidden" name="txtID" value="<?php echo $blog['id'];?>">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Edit blog</h4><?php //echo $_SESSION['b_name'];?>
      		</div>
		    <div class="modal-body"><br><br>
            <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#Information_e" aria-controls="Information_e" role="tab" data-toggle="tab">Information</a></li>
                    <!--<li role="presentation"><a href="#Photo_e" aria-controls="Photo_e" role="tab" data-toggle="tab">Photo</a></li>-->
                </ul>
            	
                <!-- Tab panes -->
                <div class="tab-content"><br>
                    <div role="tabpanel" class="tab-pane active" id="Information_e">
                    	<div class="col-md-12">
                        	
                            <div class="ytd">
                            <?php
							foreach($youtube as $yt)
							{
								?>
								<div class="form-group">
                                    <label for="txtName" class="col-sm-2 control-label">Youtube</label>
                                    <div class="col-sm-5">
                                        EX : https://www.youtube.com/watch?v=<span style="color:red">g9fyIeMzOGs</span>
                                        <input type="text" class="form-control" id="tx_youtube" name="tx_youtube[]" value="<?php echo $yt;?>" onKeyUp="yt(this);" onBlur="yt(this);" placeholder="g9fyIeMzOGs">
                                    </div>
                                    <div class="col-sm-5">
                                        <iframe class="yt" width="100%" src="https://www.youtube.com/embed/<?php echo $yt;?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <?php
							}
							?>
                                
                            </div>

                        </div>
                    </div>
                   
                </div>
            
                
                
		    </div>
			<div class="modal-footer">
				<button type="button" onClick="add_more();" class="btn btn-info pull-left"><i class="fa fa-plus" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
        <!--<form id="form_add_pdf_edit" class="hidden">
            <input id="f_pdf_edit" name="file" type="file">
            <button type="button" id="btn_upp_pdf_edit" onClick="fn.app.blog.blog.upload_pdf_file_edit()">UP</button>
        </form>-->
       
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
function add_more()
{
	var z ='';
	z+='<div class="form-group">';
		z+='<label for="txtName" class="col-sm-2 control-label">Youtube</label>';
		z+='<div class="col-sm-5">';
			z+='EX : https://www.youtube.com/watch?v=<span style="color:red">g9fyIeMzOGs</span>';
			z+='<input type="text" class="form-control" id="tx_youtube" name="tx_youtube[]"  onKeyUp="yt(this);" onBlur="yt(this);" placeholder="g9fyIeMzOGs">';
		z+='</div>';
		z+='<div class="col-sm-5">';
			z+='<iframe class="yt" width="100%" src="https://www.youtube.com/embed/g9fyIeMzOGs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
		z+='</div>';
	z+='</div>';
	$(".ytd").append(z);
}
$(document).ready(function(e) {
    $("#tx_youtube").focus();
	$("#tx_youtube").blur();
});
  $(function() {
	$( ".thumbs_photo_edit" ).sortable();
	$( ".thumbs_photo_edit" ).disableSelection();
  });
  
  function yt(me)
  {
	  var yt = 'https://www.youtube.com/embed/'+$(me).val();
	  $(me).parent().parent().find(".yt").attr('src',yt);
  }
</script>
<script tyle="text/javascript">
$(function(){
	$('#dialog_edit_group').on('shown.bs.modal', function () {
		$("#txtName").focus();
		<?php $_SESSION['b_name'] = $blog['name'];?>
	});
	$("#dialog_edit_group").on("hidden.bs.modal",function(){
		$(this).remove();
	});
	$("#dialog_edit_group").modal('show');
});	

	
</script>
<!--<script>
	CKEDITOR.replace( 'txDetail_e', {
	  height: 300,
	  filebrowserUploadUrl: "apps/blog/upload.php"
 });
</script>-->