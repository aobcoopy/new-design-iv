 <?php 
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

	$_REQUEST['cate'] = isset($_REQUEST['cate'])?$_REQUEST['cate']:0;
	$_REQUEST['des'] = isset($_REQUEST['des'])?$_REQUEST['des']:'all';
	$_REQUEST['sub'] = isset($_REQUEST['sub'])?$_REQUEST['sub']:'all';
	$_REQUEST['room'] = isset($_REQUEST['room'])?$_REQUEST['room']:'all';
?>
<?php /*?><div class="ontop">
>>>>>> <?php 
echo 'page = '.$_REQUEST['page'];
echo '  room = '.$_REQUEST['room'];
echo '  cate = '.$_REQUEST['cate'];
echo '  des = '.$_REQUEST['des'];
echo '  sub = '.$_REQUEST['sub'];
?> <<<<<
</div>
<style>
.ontop
{
	position:fixed;
	top:0;
	left:0;
	right:0;
	height:auto;
	background:#7EF37D;
	z-index:1200;
}
</style><?php */?>

<script>
var urll = '<?php echo $_SERVER['REQUEST_URI'];?>';
<?php /*?>$(document).ready(function(e){if(urll=='/blog/top-10-phuket-luxury-villas.html') {window.location='https://www.inspiringvillas.com/blog/the-10-best-phuket-luxury-villas.html';} else if(urll=='/forrentt') {window.location='https://www.inspiringvillas.com/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html';} else if(urll=='/?page=forrent&des=2&pri=2&room=1&guest=null') {window.location='https://www.inspiringvillas.com/search-rent/thailand/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html';} else if(urll=='/?page=contact') {window.location='https://www.inspiringvillas.com/contact';} else if(urll=='/?page=forrent&des=2&pri=3&room=2&guest=3') {window.location='/search-rent/thailand/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html';} else if(urll=='/?page=forrent&des=1&pri=3&room=2&guest=1') {window.location='/search-rent/thailand/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html';} else if(urll=='/?page=forrent&des=2&pri=1&room=2&guest=3') {window.location='/search-rent/thailand/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html';} else if(urll=='/?page=forrent&des=1&pri=3&room=4&guest=4') {window.location='/search-rent/thailand/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html';} else if(urll=='/search-rent/thailand-koh-samui/lamai-beach/all-price/all-bedrooms/seaview-villas/all-sort.html') {window.location='/search-rent/thailand-koh-samui/lamai-beach/all-price/all-bedrooms/all-collections/all-sort.html';} else if(urll=='/search-rent/thailand-phuket/surin-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html') {window.location='/search-rent/thailand-phuket/surin-beach/all-price/all-bedrooms/all-collections/all-sort.html';} else if(urll=='/?page=forrent&des=1&pri=2&room=4&guest=2') {window.location='/search-rent/thailand/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html';} else if(urll=='/search-rent/thailand-phuket/natai-beach/all-price/1-4-bedrooms/all-collections/all-sort.html') {window.location='/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html';} else if(urll=='blog/top-10-phuket-luxury-villas.html') {window.location='https://www.inspiringvillas.com/blog/the-10-best-phuket-luxury-villas.html';}});<?php */?>

var r=true;
function openinig() {if($(window).width()>976) {} else {if(r==true) {$(".ccc").slideDown(400);$(".mg-book-now").animate({"height":"100%"},function(){});$(".ffd").css({"transform":"rotate(180deg)"});r=false;} else {$(".ccc").slideUp(400);$(".mg-book-now").animate({"height":"90px"});$(".ffd").css({"transform":"rotate(0deg)"});r=true;}}}

var pa = '<?php echo $_REQUEST['page'];?>';
var c_room = '<?php echo $_REQUEST['room'];?>';
var c_cate = '<?php echo $_REQUEST['cate'];?>';
var c_des = '<?php echo $_REQUEST['des'];?>';
var c_beach = '<?php echo $_REQUEST['sub'];?>';

$(document).ready(function (e) {
	//alert(pa);
	setTimeout(function () {
		if (pa == 'forrent') {
			//if (c_beach == 'all') {} else {
				check_rooms_first('forn_search_rent');
			//}
		} else if (pa == 'propertydetail') {
            check_rooms('forn_search');    
        }
        
	    check_cate('forn_search_rent');
        
	}, 800);
});

function check_rooms_first(forms) {
	$(".cRooms").children('.cs-options').children('ul').children('li').each(function (index, element) {
		var str_1 = $(this).attr('data-value');
		var n_str_1 = str_1.split("|");
		$(this).addClass('roomlist');
		if (str_1 == 'all') {} else {
			$(this).addClass('r_list hidden');
		}
	});
	$.ajax({
		url: "<?php echo $url_link;?>libs/actions/check-room.php",
		type: "POST",
		dataType: "json",
		data: $("#" + forms).serialize(),
		success: function (res) {
			for (i in res) {
				$(".cRooms").children('.cs-options').children('ul').children('li').each(function (index, element) {
					var str_1R = $(this).attr('data-value');
					if (str_1R == res[i]) {
						$(this).removeClass('hidden');
					}
				});
			}
		}
	});
}


function check_rooms(forms) {
	$(".cRooms").removeClass('cs-selected');
	$(".cRooms").children('.cs-placeholder').text('');
	$(".cRooms").children('.cs-placeholder').html('All Bedrooms <label class="optin">- Optional</label>');
	$("#cbbRoom").val('all');
	$(".cRooms").children('.cs-options').children('ul').children('li').each(function (index, element) {
		var str_1 = $(this).attr('data-value');
		var n_str_1 = str_1.split("|");
		$(this).addClass('roomlist');
		if (str_1 == 'all') {} else {
			$(this).addClass('r_list hidden');
		}
	});
	$.ajax({
		url: "<?php echo $url_link;?>libs/actions/check-room.php",
		type: "POST",
		dataType: "json",
		data: $("#" + forms).serialize(),
		success: function (res) {
			console.log('');
			for (i in res) {
				$(".cRooms").children('.cs-options').children('ul').children('li').each(function (index, element) {
					var str_1R = $(this).attr('data-value');
					if (str_1R == res[i]) {
						$(this).removeClass('hidden');
					}
				});
			}
		}
	});
}

<?php /*?>​function check_rooms_first(forms) {$(".cRooms").children('.cs-options').children('ul').children('li').each(function(index,element){var str_1=$(this).attr('data-value');var n_str_1=str_1.split("|");$(this).addClass('roomlist');if(str_1=='all') {} else {$(this).addClass('r_list hidden');}});$.ajax({url:"<?php echo $url_link;?>libs/actions/check-room.php",type:"POST",dataType:"json",data:$("#"+forms).serialize(),success:function(res){for(i in res) {$(".cRooms").children('.cs-options').children('ul').children('li').each(function(index,element){var str_1R=$(this).attr('data-value');if(str_1R==res[i]) {$(this).removeClass('hidden');}});}}});}

function check_rooms(forms) {$(".cRooms").removeClass('cs-selected');$(".cRooms").children('.cs-placeholder').text('');$(".cRooms").children('.cs-placeholder').html('All Bedrooms <label class="optin">- Optional</label>');$("#cbbRoom").val('all');$(".cRooms").children('.cs-options').children('ul').children('li').each(function(index,element){var str_1=$(this).attr('data-value');var n_str_1=str_1.split("|");$(this).addClass('roomlist');if(str_1=='all') {} else {$(this).addClass('r_list hidden');}});$.ajax({url:"<?php echo $url_link;?>libs/actions/check-room.php",type:"POST",dataType:"json",data:$("#"+forms).serialize(),success:function(res){console.log('');for(i in res) {$(".cRooms").children('.cs-options').children('ul').children('li').each(function(index,element){var str_1R=$(this).attr('data-value');if(str_1R==res[i]) {$(this).removeClass('hidden');}});}}});}
<?php */?>
var catego = '<?php echo $_REQUEST['cate'];?>';
var tiigg = 0;
var tiigg_2 = 0;
function check_cate(forms, opts) {

	if (opts == 'des') {
		if (tiigg == 1) {
			tiigg = 0;
		} else {
			tiigg = 1;
			var sa = '';
			$("#cbbCollection").children('.cca').remove();
			$.ajax({
				url: "<?php echo $url_link;?>libs/actions/check-collection.php",
				type: "POST",
				dataType: "json",
				data: $("#" + forms).serialize(),
				success: function (cat) {
					$("#cbbCollection").children('.cca').remove();
					for (i in cat) {
						if (catego == cat[i]['id']) {
							sa += '<option value="' + cat[i]['id'] + '" selected class="' + cat[i]['id'] + ' cca">' + cat[i]['name'] + '</option>';
						} else {
							sa += '<option value="' + cat[i]['id'] + '" class="' + cat[i]['id'] + ' cca">' + cat[i]['name'] + '</option>';
						}
					}
					$("#cbbCollection").append(sa);
					catego = 0;
				}
			});
		}
	} else {
		if (tiigg_2 == 1) {
			tiigg_2 = 0;
		} else {
			tiigg_2 = 1;
			var sa = '';
			$("#cbbCollection").children('.cca').remove();
			$.ajax({
				url: "<?php echo $url_link;?>libs/actions/check-collection.php",
				type: "POST",
				dataType: "json",
				data: $("#" + forms).serialize(),
				success: function (cat) {
					$("#cbbCollection").children('.cca').remove();
					for (i in cat) {
						if (catego == cat[i]['id']) {
							sa += '<option value="' + cat[i]['id'] + '" selected class="' + cat[i]['id'] + ' cca">' + cat[i]['name'] + '</option>';
						} else {
							sa += '<option value="' + cat[i]['id'] + '" class="' + cat[i]['id'] + ' cca">' + cat[i]['name'] + '</option>';
						}
					}
					$("#cbbCollection").append(sa);
					catego = 0;
				}
			});
		}
	}
}
</script>

<script>
$(document).ready(function(){
	// hide #back-top first
	$("#top,.box_whatsapp").hide();
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#top,.box_whatsapp').fadeIn();
			} else {
				$('#top,.box_whatsapp').fadeOut();
			}
		});
		// scroll body to 0px on click
		$('#top').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});
});

$(document).ready(function(e) {
    $(".lazy").lazyload();
});
</script>

<script>
 /* window.lazyLoadOptions = {
    elements_selector: '.lazy'
  }*/
</script>


