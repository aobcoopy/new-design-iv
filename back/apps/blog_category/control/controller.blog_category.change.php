<?php
	
?>
<script tyle="text/javascript">
	fn.app.blog_category.blog_category.photo = function(id) {
		$.ajax({
			url: "apps/blog_category/view/dialog.blog_category.photo.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	fn.app.blog_category.blog_category.choose_photo_popup = function(button)
	{
		$("#"+button).click();
	};
	fn.app.blog_category.blog_category.showImgPopup = function (input) 
	{
		let fileName = input.files[0].name;
		if ($.trim(fileName)) {
			$(input).parent().find('label[for="img"]').text(fileName);
			if (input.files && input.files[0]) {
				let reader = new FileReader();
				reader.onload = function (e) {
					var img = '<img src="' + e.target.result + '" width="100%" />';
					
					$(input).parent().parent().find('#preview-img').html(img);
					$(input).parent().parent().find(".paths").val(fileName);
				};
				reader.readAsDataURL(input.files[0]);
			}
		} else {
			$('label[for="img"]').text('Choose file');
		}
	};
	fn.app.blog_category.blog_category.upload_photo_file = function(){
		var data = new FormData($("#form_edit_photo")[0]);
		var format_photo_name =$('#format_photo_name').val();
		var s = '';
		//Edit by Parinyimz 20190813
		var url = 'apps/blog_category/xhr/action-up-photo.php?format_photo_name='+format_photo_name;
		jQuery.ajax({
			url: url,
			data: data,
			cache: false,
			contentType: false,
			processData: false,
			type: 'POST',
			dataType: 'json',
			success: function(response){
				if(response.success){
					s += '<div class="col-md-4 pho">';
							s += '<input type="hidden" class="paths" name="path_photo_e" value="'+response.path+'">';
							s += '<input type="hidden" name="txt_photo_e[]" value="'+response.path+'">';
							s += '<img src="<?php echo S3_BUCKET_URL ?>'+response.path+'"  width="100%" class="img-thumbnail pho">';
							s += '<button type="button" class="btn btn-danger" style="width:100%" onclick="fn.app.blog.blog.remove_photo_file(this);">';
								s += '<i class="fa fa-times" aria-hidden="true"></i>';
								s += '<input type="hidden" class="paths" name="path_photo_e" value="'+response.path+'">';
							s += '</button>';
						s += '</div>';
					//s += '</div>';
					$(".thumbs_photo_edit").append(s);
					/*$("#form_edit_slide #path_photo_edit").val(response.path);
					$("#form_edit_slide #txt_photo_edit").val(response.path);
					$("#form_edit_slide .phos").attr('src',response.path);
					$("#form_edit_slide .bc").show();*/
					/*$("#tblbrand").DataTable().draw();
					$("#dialog_edit_icon").modal('hide');*/
				}else{
					fn.engine.alert("Alert",response.msg);
				}	
			}
		});
	};
	fn.app.blog_category.blog_category.remove_multi_photo = function(path,me,imgs,id){
        $.ajax({
            url: 'apps/blog_category/xhr/action-remove-multi-photo.php',
            type: 'POST',
            dataType: 'json',
            data: {path:path,img:imgs,id:id},
            beforeSend: function () {
            },
            success: function (response) {
					$(me).attr('disabled',true);
					$("label."+imgs).text('');
					$("img."+imgs).attr('src','../../../../upload/photo.jpg');
                } 
        });
	};
	fn.app.blog_category.blog_category.save_photo = function(form){
		$(".i_load").show();
		var formData = new FormData($(form)[0]);
		$.ajax({
			url: 'apps/blog_category/xhr/action-up-multi-photo.php',
			cache: false,
			contentType: false,
			processData: false,
			type: 'POST',
			dataType: 'json',
			data: formData,
			beforeSend: function () {
			},
			success: function (response) {
					$(".i_load").hide();
					window.location.reload();
				} 
		});
	};
	
	
	
	
	
	fn.app.blog_category.blog_category.change = function(id) {
		$.ajax({
			url: "apps/blog_category/view/dialog.blog_category.edit.php",
			data: {id:id},
			type: "POST",
			dataType: "html",
			success: function(html){
				$("body").append(html);
			}	
		});
	};
	
	fn.app.blog_category.blog_category.save_change = function(){
		if(document.getElementById("txTitle_edit").value==''  )
		{
			alert('The Title, Short Title, Filter name and URL Slug are required');
			$("#txTitle_edit").focus();
			return false;
		}
		else if(document.getElementById("tx_link_e").value==''  )
		{
			alert('The Title, Short Title, Filter name and URL Slug are required');
			$("#tx_link_e").focus();
			return false;
		}
		else
		{ 
			$.post('apps/blog_category/xhr/action-edit-blog_category.php',$('#form_edit_slide').serialize(),function(response){
				if(response.success){
					$("#tblSlide").DataTable().draw();
					$("#dialog_edit_group").modal('hide');
					//$("#thumbnail_edit").attr('src','../../../../upload/blog_category.jpg');
				}else{
					//fn.engine.alert("Alert",response.msg);
				}
			},'json');
			return false;
		}
		
	};
	
	var file_upload_edit = "#f_Photo_edit";

	fn.app.blog_category.blog_category.upload_photo_edit = function(){
		$(file_upload_edit).click();
		$(file_upload_edit).unbind();
		
		$(file_upload_edit).on("change",function(e){
			var files = this.files
			$("#btn_upp2").click();    
		});
	};
	
	fn.app.blog_category.blog_category.upload_photo_file_edit = function(){
		var data = new FormData($("#form_edit_photo")[0]);
		var s = '';
		if($("#txt_photo_edit").val() != ''){
			remove_photo_file($("#txt_photo_edit").val());
		}
		var url = 'apps/blog_category/xhr/action-up-photo.php?format_photo_name='+format_photo($("#txTitle_edit").val());
		jQuery.ajax({
			url: url,
			data: data,
			cache: false,
			contentType: false,
			processData: false,
			type: 'POST',
			dataType: 'json',
			success: function(response){
				if(response.success){
					$("#form_edit_slide #path_photo_edit").val(response.path);
					$("#form_edit_slide #txt_photo_edit").val(response.path);
					$("#form_edit_slide .phos").attr('src','<?php echo S3_BUCKET_URL ?>'+response.path);
					//$("#form_edit_slide .phos").attr('src',response.path);
					$("#form_edit_slide .bc").show();
					/*$("#tblbrand").DataTable().draw();
					$("#dialog_edit_icon").modal('hide');*/
				}else{
					fn.engine.alert("Alert",response.msg);
				}	
			}
		});
	};
	//Edit by parinyimz 20180814
	function remove_photo_file(path){
		var url ='inc/delete_photo.php?path='+path;
		$.ajax({
			type: "GET",
			url: url,
			dataType: "json",
			success : function(data){
				if(data.success == '200'){
					//$(me).parent().remove();	
				}
			}
		});	
	};
/*	fn.app.blog_category.blog_category.remove_photo_edit = function(me){
		var file_path = $(me).parent().find('.paths').val();
		//alert(file_path);
		$.ajax({
			url:"apps/blog_category/xhr/action-remove-photo.php",
			type:"POST",
			dataType:"json",
			data:{path:file_path},
			success: function(resp){
				if(resp.status==true)
				{
					$("#path_photo").val('');
					$("#txt_photo").val('');
					$(".phos").attr('src','');
					$(".bc").hide();
					fn.engine.alert("Alert",response.msg);
				}
				else
				{
					fn.engine.alert("Alert",response.msg);
				}
				
			}
		});
	};*/
	function format_photo(path_name){
		var new_path_name =path_name.toLowerCase();
		new_path_name =new_path_name.split(' ').join('-');
		return new_path_name;
	}
	
	//----- cover photo
	var file_upload_edit_cover = "#f_coverPhoto_edit";

	fn.app.blog_category.blog_category.upload_coverphoto_edit = function(){
		$(file_upload_edit_cover).click();
		$(file_upload_edit_cover).unbind();
		
		$(file_upload_edit_cover).on("change",function(e){
			var files = this.files
			$("#btn_coverupp2").click();    
		});
	};
	
	fn.app.blog_category.blog_category.upload_coverphoto_file_edit = function(){
		var data = new FormData($("#form_edit_coverphoto")[0]);
		var s = '';
		if($("#txt_coverphoto_edit").val() != ''){
			remove_photo_file($("#txt_coverphoto_edit").val());
		}
		var url = 'apps/blog_category/xhr/action-up-photo.php?format_photo_name='+format_photo($("#txTitle_edit").val());
		jQuery.ajax({
			url: url,
			data: data,
			cache: false,
			contentType: false,
			processData: false,
			type: 'POST',
			dataType: 'json',
			success: function(response){
				if(response.success){
					$("#form_edit_slide #path_coverphoto_edit").val(response.path);
					$("#form_edit_slide #txt_coverphoto_edit").val(response.path);
					$("#form_edit_slide .covphos").attr('src','<?php echo S3_BUCKET_URL ?>'+response.path);
					//$("#form_edit_slide .covphos").attr('src',response.path);
					$("#form_edit_slide .bc_coveredit").show();
					/*$("#tblbrand").DataTable().draw();
					$("#dialog_edit_icon").modal('hide');*/
				}else{
					fn.engine.alert("Alert",response.msg);
				}	
			}
		});
	};
	
/*	fn.app.blog_category.blog_category.remove_photo_edit = function(me){
		var file_path = $(me).parent().find('.paths').val();
		//alert(file_path);
		$.ajax({
			url:"apps/blog_category/xhr/action-remove-photo.php",
			type:"POST",
			dataType:"json",
			data:{path:file_path},
			success: function(resp){
				if(resp.status==true)
				{
					$("#path_coverphoto_edit").val('');
					$("#txt_coverphoto_edit").val('');
					$(".covphos").attr('src','');
					$(".bc_coveredit").hide();
					fn.engine.alert("Alert",response.msg);
				}
				else
				{
					fn.engine.alert("Alert",response.msg);
				}
				
			}
		});
	};*/
</script>
