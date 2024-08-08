<div class="modal fade" id="dialog_add_banner" data-backdrop="static">
  	<div class="modal-dialog">
		<form id="form_add_banner" class="form-horizontal" role="form" onsubmit="fn.app.banner.banner.add();return false;">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Add Banner</h4>
      		</div>
		    <div class="modal-body">
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label">Photo</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="parth" name="parth" readonly>
					</div>
                    <div class="col-sm-1">
						<button type="button" id="upload" class="btn btn-info"><i class="fa fa-picture-o" aria-hidden="true"></i></button>
					</div>
				</div>
                <div class="form-group">
					<label for="txtName" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                    	<img  class="loads" src="../../../../upload/loading (1).gif" width="50" style="display:none" >
						<img id="thumbnail" src="../../../../upload/banner.jpg" width="100%">
					</div>
				</div>
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
	  	</div><!-- /.modal-content -->
		</form>
        
        <form class="form form-horizontal" id="myFrom" method="post" action="apps/banner/xhr/action-up-photo.php?idc=<?php echo $con['id'];?>"  role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-8">
                    <input id="file_upload" style="display:none" name="upfile" type="file" >
                    <button class="btn btn-primary pull-right" id="multi_post" style="display:none;">up</button>
                </div>
            </div>    
       </form>
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
var my_from = "#myFrom";
var button = "#upload";
var btn_up = "#multi_post";
var parth = "#parth";
var file_upload = "#file_upload";
var thumbnail = "#thumbnail";

	$(document).ready(function(e) {
	 $(button).on("click",function(e){
        $(file_upload).show().click().hide();
        e.preventDefault();
    });
	$(file_upload).on("change",function(e){

        var files = this.files
        showThumbnail(files)  
		$(btn_up).click();  
		$(".loads").show();    
		
    });
	function showThumbnail(files){

        $(thumbnail).html("");
        for(var i=0;i<files.length;i++){
            var file = files[i]
            var imageType = /image.*/
            if(!file.type.match(imageType)){
                //     console.log("Not an Image");
                continue;
            }

            var image = document.createElement("img");
            var thumbnail = document.getElementById("thumbnail");
            image.file = file;
            thumbnail.appendChild(image)

            var reader = new FileReader()
            reader.onload = (function(aImg){
                return function(e){
                    aImg.src = e.target.result;
                };
            }(image))

            var ret = reader.readAsDataURL(file);
            var canvas = document.createElement("canvas");
            ctx = canvas.getContext("2d");
            image.onload= function(){
                ctx.drawImage(image,50,50)
            }
        } // end for loop

    } // end showThumbnail
	
   
    function getDoc(frame) {
     var doc = null;
     
     // IE8 cascading access check
     try {
         if (frame.contentWindow) {
             doc = frame.contentWindow.document;
         }
     } catch(err) {
     }

     if (doc) { // successful getting content
         return doc;
     }

     try { // simply checking may throw in ie8 under ssl or mismatched protocol
         doc = frame.contentDocument ? frame.contentDocument : frame.document;
     } catch(err) {
         // last attempt
         doc = frame.document;
     }
     return doc;
 }

	$(my_from).submit(function(e)
	{
			$("#multi-msg").html("<img src='loading.gif'/>");
	
		var formObj = $(this);
		var formURL = formObj.attr("action");
	
	if(window.FormData !== undefined)  // for HTML5 browsers
	//	if(false)
		{
	
			var formData = new FormData(this);
			$.ajax({
				url: formURL,
				type: 'POST',
				data:  formData,
				mimeType:"multipart/form-data",
				contentType: false,
				cache: false,
				processData:false,
				success: function(data, textStatus, jqXHR)
				{
					if(data=='file is not supported')
					{
						$(parth).val(data);
						$(".loads").hide(0);
						$(thumbnail).attr('src','../../../../upload/banner_not.jpg');
						//$("#unlik").show();
					}
					else
					{
						$(parth).val(data);
						$(".loads").hide(0);
						$(thumbnail).attr('src',data);
						//$("#unlik").show();
					}
						
				},
				error: function(jqXHR, textStatus, errorThrown) 
				{
					$("#multi-msg").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
				} 	        
		   });
			e.preventDefault();
			//e.unbind();
					
			
	   }
	   else  //for olden browsers
		{
			//generate a random id
			var  iframeId = 'unique' + (new Date().getTime());
	
			//create an empty iframe
			var iframe = $('<iframe src="javascript:false;" name="'+iframeId+'" />');
	
			//hide it
			iframe.hide();
	
			//set form target to iframe
			formObj.attr('target',iframeId);
	
			//Add iframe to body
			iframe.appendTo('body');
			iframe.load(function(e)
			{
				var doc = getDoc(iframe[0]);
				var docRoot = doc.body ? doc.body : doc.documentElement;
				var data = docRoot.innerHTML;
				//$("#multi-msg").html('<pre><code>'+data+'</code></pre>');
				
			});
		
		}
	
	});
	
	$(btn_up).click(function()
	{
			$(my_from).submit(function(e){ 
				console.log(e);
            });
	});

});
</script>
