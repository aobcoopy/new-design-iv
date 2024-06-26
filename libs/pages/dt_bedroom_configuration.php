<?php 
	$bed = json_decode($room['bed'],true);
	if($bed!='')
	{
	?>
    <div class="row">
        <div class="col-12">
            <div class="box_headline">
                <h3 class="">Bedroom Configuration</h3>
            </div>
        </div>
        
        <div class="col-12 ">
        	<div class="padding">
        	<?php 
			$butt =  json_decode($room['plan'],true);
			if($butt==''){}
			else
			{
				?>
				<?php /*?><button class="fplan1 pull-right" data-toggle="modal" data-target="#myModal_floor" onClick="vire_floor('<?php echo json_decode($room['plan'],true);?>')">
					<div class="inb">View Floor Plan</div>
				</button><?php */?>
				<?php
			}
			?>
        	<ul class="bedr">
			<?php
                foreach($bed as $val)
                {
                    echo '<li  class="fo15"><strong>'.$val['title'].'</strong> - '.$val['detail'].'</li>';
                }
            ?>
            </ul>
            </div>
        </div>
    </div>
    
    
	
	<?php
	  }
?>
<script>
function open_pop_bedroom_photo()
{
	//alert(1);
	var room = '<?php echo $room['id'];?>';
	$.ajax({
		url:"<?php echo $url_link;?>libs/actions/slide_photo_bedroom.php",
		type:"POST",
		dataType:"html",
		data:{room:room},
		success: function(res)
		{
			$(".showslide").html(res);
		}
	});
	$(".modal-content").css({"background-color":"#ff000000"});
	$("#myslides").modal('show');
	$(".modal-backdrop").hide();
}
</script>
