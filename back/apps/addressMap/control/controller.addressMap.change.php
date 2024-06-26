<?php
	
?>
<script tyle="text/javascript">
	fn.app.addressMap.addressMap.change = function(id) {
		$.ajax({
			url: "apps/addressMap/view/dialog.addressMap.edit.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.addressMap.addressMap.save_change = function(){
		/*if(document.getElementById("txt_photo_edit").value=='')
		{
			//alert('Please fill ypur data');
			$(".bc_edit").click();
			return false;
		}
		else
		{*/
			$.post('apps/addressMap/xhr/action-edit-addressMap.php',$('#form_edit_addressMap').serialize(),function(response){
				if(response.success){
					//$("#tblSlide").DataTable().draw();
					$("#tblSlide").DataTable().ajax.reload(null,false);
					$("#dialog_edit_group").modal('hide');
					//$("#thumbnail_edit").attr('src','../../../../upload/addressMap.jpg');
				}else{
					//fn.engine.alert("Alert",response.msg);
				}
			},'json');
			return false;
		/*}*/
		
	};
	
	var file_upload_edit = "#f_Photo_edit";

	fn.app.addressMap.addressMap.upload_photo_edit = function(){
		$(file_upload_edit).click();
		$(file_upload_edit).unbind();
		
		$(file_upload_edit).on("change",function(e){
			var files = this.files
			$("#btn_upp2").click();    
		});
	};
	
	fn.app.addressMap.addressMap.upload_photo_file_edit = function(){
		var data = new FormData($("#form_edit_photo")[0]);
		var s = '';
		jQuery.ajax({
			url: 'apps/addressMap/xhr/action-up-photo.php',
			data: data,
			cache: false,
			contentType: false,
			processData: false,
			type: 'POST',
			dataType: 'json',
			success: function(response){
				if(response.success){
					$("#form_edit_addressMap #path_photo_edit").val(response.path);
					$("#form_edit_addressMap #txt_photo_edit").val(response.path);
					$("#form_edit_addressMap .phos").attr('src',response.path);
					$("#form_edit_addressMap .bc_edit").show();
					/*$("#tblbrand").DataTable().draw();
					$("#dialog_edit_icon").modal('hide');*/
				}else{
					fn.engine.alert("Alert",response.msg);
				}	
			}
		});
	};
	
	fn.app.addressMap.addressMap.remove_photo_edit = function(me){
		var file_path = $(me).parent().find('.paths').val();
		//alert(file_path);
		$.ajax({
			url:"apps/addressMap/xhr/action-remove-photo.php",
			type:"POST",
			dataType:"json",
			data:{path:file_path},
			success: function(resp){
				if(resp.status==true)
				{
					$("#path_photo").val('');
					$("#txt_photo").val('');
					$(".phos").attr('src','');
					$(".bc_edit").hide();
					fn.engine.alert("Alert",response.msg);
				}
				else
				{
					fn.engine.alert("Alert",response.msg);
				}
				
			}
		});
	};
</script>
