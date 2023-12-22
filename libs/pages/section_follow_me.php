<div class="container-fluid follow_box">
	<div class="row justify-content-center text-center">
    	<div class="fl_tt">follow <span class="italic">me</span> on ig</div>
    </div>
</div>



<div class="embed_ig"></div>
<div class="row justify-content-center text-center">

<div class="text-center loaddeddd" style="display:none;">
  <div class="spinner-border" role="status">
    
  </div><br>Loading...
</div>

</div>


<script>
var trigge = true;
$(window).scroll(function () 
{
	var follow_box = $(".follow_box").offset().top-300;
	
	if($(this).scrollTop() > follow_box) 
	{
		
		if(trigge==true)
		{
			$(".loaddeddd").show();
			trigge = false;
			
			$.ajax({
				url:"<?php echo $url_link;?>libs/pages/embed_ig_photo_new_design.php",
				type:"POST",
				dataType:"html",
				data:{},
				success: function(res){
					$(".embed_ig").html(res);
					$(".loaddeddd").hide();
				}
			});
		}
	}
	
    setTimeout(function(){
		//window.location.reload();
	},500);
});
</script>