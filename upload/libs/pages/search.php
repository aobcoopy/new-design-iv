<?php /*?><script src="<?php echo $url_link;?>libs/js/jquery-3.1.1.min.js"></script><?php */?>

<div class="container-fluid box_searching">
	<div class="row justify-content-center">
    	<div class="col-12 col-md-11 row in_box_search">
            <div class="col-12 col-md-3">
                <div class="tt_1">For rates & availability</div>
                <div class="tt_2">Search Villas</div>
            </div>
            <div class="col">
                <form id="forn_search">
                    <div class="row justify-content-center">
                        <div class="col-10 col-md-3 bot20">
                                <select id="cbbDestination" name="cbbDestination" onChange="load_subdestination(this);" class="cbbdes2 cs-select cs-skin-elastic ">
                                    <option value="all"  <?php echo isset($_REQUEST['des'])?'':'selected';?>>All Destinations </option>
                                    <?php 
                                    $sql_destinations = $dbc->Query("select * from destinations where parent is null and status > 0 AND num_properties > 0 order by name asc");
                                    while($r_destinations = $dbc->Fetch($sql_destinations))
                                    {
                                        $act = ($_REQUEST['des']==$r_destinations['id'])?'selected':'';
                                        echo '<option value="'.$r_destinations['id'].'"'.$act.'>'.$r_destinations['name'].'</option>';
                                    }
                                    ?>
                                </select>
                                <script>
                                $(document).ready(function(e) {
                                    $(".cbbdes2").attr("onClick","load_subdestination($(this).children('.cs-options').children('ul').children('li.cs-selected').attr('data-value')),check_rooms('forn_search')");
                                    //$(".cbbSub").attr("onBlur","check_beach_blur($(this).children('.cs-options').children('ul').children('li.cs-selected').attr('data-value'))");
                                    $(".cbbSub").attr("onClick","check_rooms('forn_search')");
                                });
                                </script>
                        </div>
                        <div class="col-10 col-md-3 bot20">
                           <select name="cbbSub" id="cbbSub" class="cbbSub suboption cs-select cs-skin-elastic fixscroll" >
                                <option value="all|all" class="oldd">All Areas</option>
                            <?php 
                            $ssub = $dbc->Query("select * from destinations where parent is not null and status > 0 AND num_properties > 0 order by name asc");
                            while($lin = $dbc->Fetch($ssub))
                            {
                                $d_name = explode(",",$lin['name']);
                                echo '<option value="'.$lin['id']."|".$lin['parent'].'"  class="oldd hidden">'.$d_name[0].'</option>';
                            }
                            ?>
                           </select>
                        </div>
                        <div class="col-10 col-md-3 bot20">
                            
                                    <select name="cbbRoom" id="cbbRoom" class="cs-select cs-skin-elastic fixscroll2 cRooms">
                                        <option value="all"  <?php echo !isset($_REQUEST['room'])?'selected':'';?>>All Bedrooms </option>
                                        <?php
                                        $s_r = $dbc->Query("select * from bedroom where status > 0 order by sort asc");
                                        while($room_bed = $dbc->Fetch($s_r))
                                        {
                                            $selc = ($_REQUEST['room']==$room_bed['id'])?'selected':'';
                                            echo '<option value="'.$room_bed['id'].'" '.$selc.'>'.$room_bed['name'].'</option>';
                                        }
                                        ?>
                                    </select>
                                
                        </div>
                        <div class="col-10 col-md-3 d-grid nopad992-" style="margin-bottom:0px;">
                            <button type="button" id="bt_search_1" onClick="searching1()" class="btn btn-main btn-block text_up fonn co_orange" style="margin-right: 0px;">GO</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php /*?><div class="mg-book-now ">
    <div class="container">
        <div class="row h_form">
            <div class="col-xl-3 d-none d-xl-block" onClick="openinig();"><!---->
               
                <h3 class="mg-bn-title tsearch txt_co_orange"><center>Search Villas <span class="mg-bn-big">For rates & availability</span></center></h3>

            </div>
            <div class="col-12 col-xl-9 ccc2">
                <div class="mg-bn-forms ">
                    <form id="forn_search">
                        <div class="row">
                            <div class="col-12 col-md-3">
                                    <select id="cbbDestination" name="cbbDestination" onChange="load_subdestination(this);" class="cbbdes2 cs-select cs-skin-elastic ">
                                        <option value="all"  <?php echo isset($_REQUEST['des'])?'':'selected';?>>All Destinations </option>
                                        <?php 
                                        $sql_destinations = $dbc->Query("select * from destinations where parent is null and status > 0 AND num_properties > 0 order by name asc");
                                        while($r_destinations = $dbc->Fetch($sql_destinations))
                                        {
                                            $act = ($_REQUEST['des']==$r_destinations['id'])?'selected':'';
                                            echo '<option value="'.$r_destinations['id'].'"'.$act.'>'.$r_destinations['name'].'</option>';
                                        }
                                        ?>
                                    </select>
                                    <script>
                                    $(document).ready(function(e) {
                                        $(".cbbdes2").attr("onClick","load_subdestination($(this).children('.cs-options').children('ul').children('li.cs-selected').attr('data-value')),check_rooms('forn_search')");
										//$(".cbbSub").attr("onBlur","check_beach_blur($(this).children('.cs-options').children('ul').children('li.cs-selected').attr('data-value'))");
										$(".cbbSub").attr("onClick","check_rooms('forn_search')");
                                    });
                                    </script>
                            </div>
                            <div class="col-12 col-md-3">
                               <select name="cbbSub" id="cbbSub" class="cbbSub suboption cs-select cs-skin-elastic fixscroll" >
                               		<option value="all|all" class="oldd">All Areas</option>
                               	<?php 
								$ssub = $dbc->Query("select * from destinations where parent is not null and status > 0 AND num_properties > 0 order by name asc");
								while($lin = $dbc->Fetch($ssub))
								{
									$d_name = explode(",",$lin['name']);
									echo '<option value="'.$lin['id']."|".$lin['parent'].'"  class="oldd hidden">'.$d_name[0].'</option>';
								}
								?>
                               </select>
                            </div>
                            <div class="col-12 col-md-3">
                                
                                        <select name="cbbRoom" id="cbbRoom" class="cs-select cs-skin-elastic fixscroll2 cRooms">
                                            <option value="all"  <?php echo !isset($_REQUEST['room'])?'selected':'';?>>All Bedrooms </option>
                                            <?php
											$s_r = $dbc->Query("select * from bedroom where status > 0 order by sort asc");
											while($room_bed = $dbc->Fetch($s_r))
											{
												$selc = ($_REQUEST['room']==$room_bed['id'])?'selected':'';
												echo '<option value="'.$room_bed['id'].'" '.$selc.'>'.$room_bed['name'].'</option>';
											}
											?>
                                        </select>
                                    
                            </div>
                            <div class="col-12 col-md-3 d-grid nopad992" style="margin-bottom:0px;">
                                <button type="button" id="bt_search_1" onClick="searching1()" class="btn btn-main btn-block text_up fonn co_orange" style="margin-right: 0px;">Search Villas</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><?php */?>
<style>
#bt_search_1
{
	height: 38px;
}
</style>
<script>
function searching1() {
	$.ajax({
		url: "<?php echo $url_link;?>libs/actions/check-link.php",
		type: "POST",
		dataType: "html",
		data: $("#forn_search").serialize(),
		success: function (res) {
            //alert(res);
            //window.location = "/";
            
			window.location = "<?php echo $url_link;?>" + res;
		}
	});
}
var sel_text = '';

function load_subdestination(me) {
	$(".ali").removeClass('cs-selected');
	$(".cbbSub").children('.cs-placeholder').text('');
	//$(".cbbSub").children('.cs-placeholder').text('All Areas');
	$(".cbbSub").children('.cs-placeholder').html('All Areas <label class="optin">- Optional</label>');;
	
	$("#cbbSub").val('all');
	if ($("#cbbDestination").val() == 'all') {
		$(".suboption").children('.cs-options').css({
			"height": "auto"
		});
		$(".suboption").children('.cs-options').children('ul').children('li.ali').addClass('hidden');
	} else {
		if ($(window).width() < 976) {
			$(".suboption").children('.cs-options').css({
				"height": "auto"
			});
		} else {
			$(".suboption").children('.cs-options').css({
				"height": "auto"
			});
		}
		$(".suboption").children('.cs-options').removeClass('hidden');
		var str = $(me).attr('data-value');
		$(".suboption").children('.cs-options').children('ul').children('li.all').addClass('cs-selected');
		$(".suboption").children('.cs-options').children('ul').children('li.ali').addClass('hidden');
		$(".suboption").children('.cs-options').children('ul').children('li.' + me).removeClass('hidden');
	}
}
$(document).ready(function (e) {
	var c_beach = '<?php echo isset($_REQUEST['sub'])?$_REQUEST['sub']:'all';?>';
	var c_room = '<?php echo isset($_REQUEST['room'])?$_REQUEST['room']:'all';?>';
	
	if(c_beach=='all')
	{
		$(".cbbSub").children('.cs-placeholder').html('All Areas <label class="optin">- Optional</label>');;
	}
	
	if(c_room=='all')
	{
		$(".cRooms").children('.cs-placeholder').html('All Bedrooms <label class="optin">- Optional</label>');
	}
	
	
	$(".cbbSub").children('.cs-options').children('ul').children('li').each(function (index, element) {
		var str = $(this).attr('data-value');
		var n_str = str.split("|");
		if (n_str[0] == 'all') {
			$(this).addClass(n_str[1]);
			$(this).attr('data-value', n_str[0]);
		} else {
			$(this).addClass(n_str[1] + " ali");
			$(this).attr('data-value', n_str[0]);
		}
	});
	$("#cbbSub").children().each(function (index, element) {
		var str2 = $(this).val();
		var n2_str = str2.split("|");
		if (n2_str[0] == 'all') {
			$(this).val(n2_str[0]);
		} else {
			$(this).val(n2_str[0]);
		}
	});
	if ($("#cbbDestination").val() == 'all') {
		$(".suboption").children('.cs-options').children('ul').children('li.ali').addClass('hidden');
		$(".suboption").children('.cs-options').css({
			"height": "auto"
		});
		$('.fixscroll.cs-active .cs-options').css({
			"height": "0px"
		});
	} else {
		if ($(window).width() < 976) {
			$(".suboption").children('.cs-options').css({
				"height": "auto"
			});
		} else {
			$(".suboption").children('.cs-options').css({
				"height": "auto"
			});
		}
	}
});
</script>