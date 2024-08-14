<?php 
$bg_head = 'search_box_photo_2 search_box_photo_3';
$bread_c = 'sub_search_2';
$top_bg = 'top_mobile_2';
?>
<div class="container-fluid <?php echo $top_bg;?>  mob768">
	<div class="row">
    	<div class="col-1"><a href="/"><img src="<?php echo $url_link;?>upload/newpoplog.png" width="100" alt="" class="top_search_mobile"></a></div>
        <div class="col">
        	<ul class="mynav_2 mynav_2_mob">
                <li class="li_villa ">
                    <a href="/faq" style="border:none;" class="d-none">FAQ</a> <i class="fa fa-caret-down" aria-hidden="true"></i> <span class="caret"></span>
                    <ul class="d-menus ">
                        <li class=" <?php echo($pa=='faq')?'active':'';?>"><a href="/faq">FAQ</a></li>
                        <li class=" <?php echo($pa=='blog')?'active':'';?>"><a href="/blog">Lifestyle</a></li>
                        <li class=" <?php echo($pa=='contact')?'active':'';?> "><a href="/contact" class="lilast">Contact</a></li>
                    </ul>
                </li>
            </ul>
            
        </div>
        <div class="col-4 col-sm-3">
        	<a href="/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html"><img src="<?php echo $url_link;?>upload/new_design/v_details/search.png" alt="search" class="icon_search_mob icon_search2 icon_top_mob"></a>
            <a href="/recently"><img src="<?php echo $url_link;?>upload/new_design/v_details/recently.png" alt="recently" class="icon_recently icon_top_mob"></a>
            <a href="/contact"><img src="<?php echo $url_link;?>upload/new_design/v_details/phone_w.png" alt="contact" class="icon_telephone icon_top_mob"></a>
        </div>
    </div>
</div>

 
<form id="forn_search_rent">
<div class="container-fluid <?php echo $bg_head;?> fixed-top text-center web">
	<div class="row justify-content-center">
    	<div class="col-12 col-md-1 col-lg-2 t_t1- web768" ><a href="/"><img src="<?php echo $url_link;?>upload/newpoplog.png" width="100" alt=""></a></div>
        <div class="col-12 col-md-11 col-lg-10 t_t2- align-self-end">
        	
                <div class="row justify-content-end">
                    <div class="col-md-2 col-12 bottom10"> 
                        <select id="cbbDestination" name="cbbDestination" onChange="load_subdestination(this);" class="cbbdes2 cs-select cs-skin-elastic cbbo dbb_vd_2">
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
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12 bottom10">
                    <?php //echo $_REQUEST['sub'];?>
                        <select name="cbbSub" id="cbbSub" class="cbbSub suboption cs-select cs-skin-elastic fixscroll dbb_vd_2" >
                            <option value="all|all" class="oldd" >All Areas <div class="optin">- Optional</div></option>
                            <?php 
                            $ssub = $dbc->Query("select * from destinations where parent is not null and status > 0 AND num_properties > 0 order by name asc");
                            while($lin = $dbc->Fetch($ssub))
                            {
                                $d_name = explode(",",$lin['name']);
                        
                                $subact = ($_REQUEST['sub']==$lin['id'])?'selected':'';
                                echo '<option value="'.$lin['id'].'|'.$lin['parent'].'" '.$subact.'  class="oldd '.$lin['parent'].'">'.$d_name[0].'</option>';
                            }
                            ?>
                       </select> 
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12 bottom10">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <select name="cbbRoom" id="cbbRoom" class="cs-select cs-skin-elastic fixscroll2 cbbo cRooms dbb_vd_2">
                                    <option value="all"  <?php echo !isset($_REQUEST['room'])?'selected':'';?> >All Bedrooms <div class="optin">- Optional</div></option>
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
                        </div>
                    </div>
                    <div class="col-12 col-md-1 col-lg-1 d-grid padd nopad992 bottom10">
                        <button type="button" id="bt_search" onClick="searching1()" class="btn btn-main btn-block text_up fonn bt_search_2">GO</button>
                    </div>
                    <div class="col-md-3 col-lg-3 web768">
                    	<ul class=" mynav_2 mynav_2_search ">
                            <li class="li_villa web590">
                                <a href="/faq" style="border:none;"  class="d-none">FAQ</a> <i class="fa fa-caret-down" aria-hidden="true"></i> <span class="caret"></span>
                                <ul class="d-menus ">
                                    <li class=" <?php echo($pa=='faq')?'active':'';?>"><a href="/faq">FAQ</a></li>
                                    <li class=" <?php echo($pa=='blog')?'active':'';?>"><a href="/blog">Lifestyle</a></li>
                                    <li class=" <?php echo($pa=='contact')?'active':'';?> "><a href="/contact" class="lilast">Contact</a></li>
                                </ul>
                            </li>
                        </ul>
                        <a href="/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html"><img src="<?php echo $url_link;?>upload/new_design/v_details//search.png" alt="search" class="icon_search2"></a>
                        <a href="/recently"><img src="<?php echo $url_link;?>upload/new_design/v_details/recently.png" alt="recently" class="icon_recently"></a>
                        <a href="/contact"><img src="<?php echo $url_link;?>upload/new_design/v_details/phone_w.png" alt="contact" class="icon_telephone"></a>
                    </div>
                </div>
                <input type="hidden" id="tx_sort" name="tx_sort">
                <input type="hidden" id="t_view" name="t_view" >
                <input type="hidden" id="textH2" name="textH2" value="<?php echo $textH2;?>" >
                <input type="hidden" id="t_Collection" name="t_Collection"  value="<?php echo isset($_REQUEST['cate'])?$_REQUEST['cate']:'0';?>">
                <input type="hidden" id="cbbSub_sort" name="cbbSub_sort" value="<?php echo isset($_REQUEST['sub'])?$_REQUEST['sub']:'all';?>">
           
        
        </div>
        <div class="col-1 t_t3-"></div>
    </div>
</div>
</form>





<script>
$(document).ready(function(e) {
	var c_beach = '<?php echo $_REQUEST['sub'];?>';
	var c_room = '<?php echo $_REQUEST['room'];?>';
	
	if(c_beach=='all')
	{
		$(".cbbSub").children('.cs-placeholder').html('All Areas <label class="optin">- Optional</label>');;
	}
	
	if(c_room=='all')
	{
		$(".cRooms").children('.cs-placeholder').html('All Bedrooms <label class="optin">- Optional</label>');
	}
	
	$(".cbbdes2").attr("onClick","load_subdestination($(this).children('.cs-options').children('ul').children('li.cs-selected')),check_rooms('forn_search_rent'),check_cate('forn_search_rent','des')");
	$(".cbbSub").attr("onClick","check_rooms('forn_search_rent'),check_cate('forn_search_rent','beach')");
	$(".cRooms").attr("onClick","check_cate('forn_search_rent')");
	
	$(".cbbSub").children('.cs-options').children('ul').children('li').each(function(index, element) {
		var str = $(this).attr('data-value');
		var n_str = str.split("|");
		if(n_str[0]=='all')
		{
			$(this).addClass(n_str[1]);
			$(this).attr('data-value',n_str[0]);
		}
		else
		{
			$(this).addClass(n_str[1]+" ali");
			$(this).attr('data-value',n_str[0]);
		}
		
	});

	$("#cbbSub").children().each(function(index, element) {
		var str2 = $(this).val();
		var n2_str = str2.split("|");
		if(n2_str[0]=='all')
		{
			$(this).val(n2_str[0]);//.attr('data-value',n2_str[0]);
		}
		else
		{
			$(this).val(n2_str[0]);
		}
	});
});
function load_subdestination(me)
{
	$(".ali").removeClass('cs-selected');
	$(".cbbSub").children('.cs-placeholder').text('');
	var tx = '<span class="optin">- Optional</span>';
	$(".cbbSub").children('.cs-placeholder').html('All Areas <label class="optin">- Optional</label>');
	$("#cbbSub").val('all');
	
	if($("#cbbDestination").val()=='all')
	{
		$(".suboption").children('.cs-options').css({"height":"auto"});
		$(".suboption").children('.cs-options').children('ul').children('li.ali').addClass('hidden');
	}
	else
	{
		if($(window).width()<976)
		{
			$(".suboption").children('.cs-options').css({"height":"auto"});
		}
		else
		{
			$(".suboption").children('.cs-options').css({"height":"auto"});
		}
		
		$(".suboption").children('.cs-options').removeClass('hidden');
		//var sb = $(me);
		var str = $(me).attr('data-value');
		var n_str = str.split("|");
		//alert(n_str[0]);
		
		
		$(".suboption").children('.cs-options').children('ul').children('li.all').addClass('cs-selected');
		$(".suboption").children('.cs-options').children('ul').children('li.ali').addClass('hidden');
		$(".suboption").children('.cs-options').children('ul').children('li.'+n_str[0]).removeClass('hidden');
	}
}

if($("#cbbDestination").val()=='all')
{
	$(".suboption").children('.cs-options').children('ul').children('li.ali').addClass('hidden');
	$(".suboption").children('.cs-options').css({"height":"auto"});
	$('.fixscroll.cs-active .cs-options').css({"height":"0px"});
}
else
{
	if($(window).width()<976)
	{
		$(".suboption").children('.cs-options').css({"height":"auto"});
	}
	else
	{
		$(".suboption").children('.cs-options').css({"height":"auto"});
	}
}


if($("#cbbDestination").val()=='all')
{
	$(".suboption").children('.cs-options').css({"height":"auto"});
	$(".suboption").children('.cs-options').children('ul').children('li.ali').addClass('hidden');
}
else
{
	if($(window).width()<976)
	{
		$(".suboption").children('.cs-options').css({"height":"auto"});
	}
	else
	{
		$(".suboption").children('.cs-options').css({"height":"auto"});
	}
	
	$(".suboption").children('.cs-options').removeClass('hidden');
	
	$(".suboption").children('.cs-options').children('ul').children('li.all').addClass('cs-selected');
	$(".suboption").children('.cs-options').children('ul').children('li.ali').addClass('hidden');
	$(".suboption").children('.cs-options').children('ul').children('li.'+$("#cbbDestination").val()).removeClass('hidden');
}
</script>
<script> 
function searching1()
{
	//alert(1);
    $("#cbbCollection").val('0');
    $.ajax({
        url:"<?php echo $url_link;?>libs/actions/check-link.php",
        type:"POST",
        dataType:"html",
        data:$("#forn_search_rent").serialize(),
        success: function(res){
            //alert(res);
            //alert('<?php echo isset($_REQUEST['cbbArrayActualBedrooms'])?$_REQUEST['cbbArrayActualBedrooms']:''; ?>');
            window.location = "<?php echo $url_link;?>"+res;
        }
    }); 
    
  
<?php /*?>    var des = $("#cbbDestination").val();
    var subd = $("#cbbSub").val();
    var pri = $("#cbbPrice").val();
    var room = $("#cbbRoom").val();
    window.location = "<?php echo $url_link;?>search-forrent/"+des+"/"+subd+"/"+pri+"/"+room+"/list.html";
<?php */?>}


function searchByBedroomRangeFilter()
{    
    $.ajax({
        url:"<?php echo $url_link;?>libs/actions/check-bedroom-filter-link.php",
        type:"POST",
        dataType:"html",
        data:$("#forn_search_rent").serialize(),
        success: function(res){
            window.location = "<?php echo $url_link;?>"+res;
        }
    });
}  

function searching2()
{    
    //$("#cbbCollection").val('0');
    $.ajax({
        url:"<?php echo $url_link;?>libs/actions/check-link.php",
        type:"POST",
        dataType:"html",
        data:$("#forn_search_rent").serialize(),
        success: function(res){ 
            window.location = "<?php echo $url_link;?>"+res;
        }
    });
}
       
function searching(va)
{
    $("#cbbCollection").val('0');
    var des = $("#cbbDestination").val();
    var subd = $("#cbbSub").val();
    var pri = $("#cbbPrice").val();
    var room = $("#cbbRoom").val();
    var view = $("#t_view").val();
    var coll = $("#cbbCollection").val();
    var sort = $("#cbbSort").val();
    
    window.location = "<?php echo $url_link;?>search-forrent/"+des+"/"+subd+"/"+pri+"/"+room+"/"+view+".html";
}

function viewsType(view)
{
    $("#t_view").val(view);
    $(".loadd").show();
    $(".roomold").hide(0);
    $("#tx_sort").val($("#cbbSort").val());
    $.ajax({
        url:"<?php echo $url_link;?>libs/actions/action-load-property.php",
        type:"POST",
        dataType:"html"    ,
        data:$("#forn_search_rent").serialize(),
        success: function(res){
            $(".loadd").hide();
            $(".rooms").html(res);
        }
    });
}
$(document).ready(function(e) {
    $(".cbbo").click(function(e) {
    });
    var viewer = '<?php echo isset($_REQUEST['view'])?$_REQUEST['view']:'';?>';
    if(viewer!='')
    {
        //searching();
    }
    
    var des = '<?php echo isset($_REQUEST['des'])?$_REQUEST['des']:'';?>';
    if(des=='all')
    {
        //searching();
    }
    
    $("#cbbCollection").change(function(e) { 
        searching2();
    });    
    
    $("#bedroomRangeFilter").change(function(e) { 
        searchByBedroomRangeFilter();
    });    

});

</script>
