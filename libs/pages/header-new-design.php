<?php session_start();?>
<span itemprop="brand" itemscope itemtype="http://schema.org/Brand" style="position: absolute;z-index: -1;"><span itemprop="name" class="tw tbrand" >Inspiring Villas</span>
<img itemprop="logo"  src="<?php echo $url_link;?>upload/new_design/logo.png" class="hidden" height="10" alt="Inspiring Villas logo">
</span>

<?php include "00-new_style.php";?>


<?php 

//unset($_SESSION['recent'],$_SESSION['recent_all']);
if(isset($_SESSION['recent']) && isset($_SESSION['recent_all'])){}
else
{
    $_SESSION['recent'] = array();
    $_SESSION['recent_all'] = array();
}
if(isset($_SESSION['favorite'])){}
else
{
    $_SESSION['favorite'] = array();
}
$pa = $_REQUEST['page'];
?>

<div class="top_bg_gradient"></div>

<div class="container-fluid nav_home animate__animated animate__fadeInDown animate__fast">
	<div class="row  justify-content-center">
    	<div class="row py-5-">
            <div class="col-4 col-md-2 col-lg-3 col-xxl-4 t_t1-"><a href="/"><img src="../../upload/new_design/img-top-Logo.png" width="140" alt="" class="logoiv"></a></div>
            <div class="col text-md-end menu_right t_t2-">
            	<input type="text" name="tags" id="tags" class="tx_search form-control" placeholder="SEARCH BY VILLA NAME">
                
                    <ul class="mynav ">
                    	<li class="li_villa web590">
                            Villa Destinations <i class="fa fa-caret-down" aria-hidden="true"></i> <span class="caret"></span>
                            <ul class="d-menus ">
                                <li><a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Phuket Villas</a></li>
                                <li><a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Koh Samui Villa</a></li>
                                <li><a href="/search-rent/thailand-koh-phangan/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Koh Pha Ngan Villa</a></li>
                                <li class="mob <?php echo($pa=='faq')?'active':'';?>"><a href="/faq">FAQ</a></li>
                                <li class="mob <?php echo($pa=='blog')?'active':'';?>"><a href="/blog">Lifestyle</a></li>
                                <li class="mob <?php echo($pa=='contact')?'active':'';?> "><a href="/contact" class="lilast">Contact</a></li>
                            </ul>
                        </li>
                        <li class="web <?php echo($pa=='faq')?'active':'';?>"><a href="/faq">FAQ</a></li>
                        <li class="web <?php echo($pa=='blog')?'active':'';?>"><a href="/blog">Lifestyle</a></li>
                        <li class="web <?php echo($pa=='contact')?'active':'';?> "><a href="/contact" class="lilast">Contact</a></li>
                    </ul>
                
            </div>
        </div>
    	
    </div>
</div>
<div class="hamb mob590" onClick="open_menu();"><i class="fa fa-bars" aria-hidden="true"></i></div>
<ul class="mob_nav mob590">
	<li class="m_villa">Villa Destinations <i class="fa fa-caret-down" aria-hidden="true"></i> <span class="caret"></span>
    	<ul class="mob-menus ">
            <li><a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Phuket Villas</a></li>
            <li><a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Koh Samui Villa</a></li>
            <li><a href="/search-rent/thailand-koh-phangan/all-beach/all-price/all-bedrooms/all-collections/all-sort.html">Koh Pha Ngan Villa</a></li>
        </ul>
    </li>
	<li class=" <?php echo($pa=='faq')?'active':'';?>"><a href="/faq">FAQ</a></li>
    <li class=" <?php echo($pa=='blog')?'active':'';?>"><a href="/blog">Lifestyle</a></li>
    <li class=" <?php echo($pa=='contact')?'active':'';?> "><a href="/contact" class="lilast">Contact</a></li>
</ul>
<div class="bgmob"></div>



<script src="<?php echo $url_link;?>libs/js/autocomplete.js"></script> 
              
<script>
<?php  $all_villas = allAvailableVillaNames($dbc); ?>
    var allVillas = <?php echo $all_villas; ?>;
    //autocomplete(document.getElementById("tags"), allVillas);
 	
$(function() {
    $( "#tags" ).autocomplete({
      source: allVillas
    });
	$(".ui-menu").click(function(e) {
        $.ajax({
            url:"<?php echo $url_link;?>libs/actions/check-villas-link.php",
            type:"POST",
            dataType:"json"    ,
            data:{tags:$("#tags").val()},
            success: function(res){
                window.location = '/'+res+'.html';
            }
        });
    });
	$("#tags").keypress(function(event) {
		if (event.which == 13) {
			event.preventDefault();
			go_to_link();
			}
    });
});
  
</script> 



<script>
function open_menu()
{
	$(".mob_nav").slideToggle(300);
	$(".bgmob").show();
}
$(document).ready(function(e) {
    $(".bgmob").click(function(e) {
        $(".mob_nav").slideUp(300);
		$(".bgmob").hide();
    });
});
$(window).scroll(function () {
	//var mybar = ($(".cov_slide").height() / 2); 
	//$(".nav_home").offset().top-38;
	if ($(this).scrollTop() > 60) 
	{
		$(".nav_home").addClass('nv_2');
	}
	else
	{
		$(".nav_home").removeClass('nv_2');
	}
});

function go_to_link()
{
    if($("#tags").val()=='')
    {
        //setTimeout(function(){
            $("#tags").css({"background":"#ff6565"});    
            $("#tags").val('Please fill your data');
        //},500);
        
        setTimeout(function(){
            $("#tags").css({"background":""});    
            $("#tags").val('');
            $("#tags").focus();
        },1500);
    }
    else
    {
        $.ajax({
            url:"<?php echo $url_link;?>libs/actions/check-villas-link.php",
            type:"POST",
            dataType:"json"    ,
            data:{tags:$("#tags").val()},
            success: function(res){
                window.location = '/'+res+'.html';
            }
        });
    }
    
}
</script>
<?php 
function dateType($data)
{
    $y = substr($data,0,4);
    $m = substr($data,5,2);
    $d = substr($data,8,2);
    switch($m)
    {
        case'01':  $month = 'Jan';break;
        case'02':  $month = 'Feb';break;
        case'03':  $month = 'Mar';break;
        case'04':  $month = 'Apr';break;
        case'05':  $month = 'May';break;
        case'06':  $month = 'Jun';break;
        case'07':  $month = 'Jul';break;
        case'08':  $month = 'Aug';break;
        case'09':  $month = 'Sep';break;
        case'10':  $month = 'Oct';break;
        case'11':  $month = 'Nov';break;
        case'12':  $month = 'Dec';break;
    }
    return  $d.'  '.$month .', '.$y;
}
function day($data)
{
    $d = substr($data,8,2);
    return  $d;
}
function month($data)
{
    $m = substr($data,5,2);
    switch($m)
    {
        case'01':  $month = 'Jan';break;
        case'02':  $month = 'Feb';break;
        case'03':  $month = 'Mar';break;
        case'04':  $month = 'Apr';break;
        case'05':  $month = 'May';break;
        case'06':  $month = 'Jun';break;
        case'07':  $month = 'Jul';break;
        case'08':  $month = 'Aug';break;
        case'09':  $month = 'Sep';break;
        case'10':  $month = 'Oct';break;
        case'11':  $month = 'Nov';break;
        case'12':  $month = 'Dec';break;
    }
    return  $month;
}

function string_len($text,$amount)
{
    if(strlen($text)>$amount)
    {
        return substr($text,0,$amount).'...';
    }
    else
    {
        return $text;
    }
}


function switchcase($val)
{
    switch($val)
    {
        case "2":
            return "Party Villa - Phuket, Koh Samui, Thailand";
        break;
        case "3":
            return "Family Villas - Phuket, Koh Samui, Thailand";
        break;
        case "4":
            return "Seaview Villas - Phuket, Koh Samui, Thailand";
        break;
        case "5":
            return "Large Group Villas - Phuket, Koh Samui, Thailand";
        break;
        case "6":
            return "Beachfront Villas - Phuket, Koh Samui, Thailand";//return "Beachfront Villas - Phuket, Koh Samui, Thailand";
        break;
        case "8":
            return "Wedding Villas - Phuket, Koh Samui, Thailand";
        break;
        default:
    }
}



function switchcase_sort($val)
{
    switch($val)
    {
        case "2":
            return "Party Villa";
        break;
        case "3":
            return "Family Villas";
        break;
        case "4":
            return "Thailand Seaview Villas";//"Seaview Villas";
        break;
        case "5":
            return "Large Group Villas";
        break;
        case "6":
            return "Beach Villas Thailand";//"Beachfront Villas";
        break;
        case "8":
            return "Thailand Wedding Villas";//"Wedding Villas";
        break;
        default:
    }
}

function imageP($url,$pos='')
{
	//echo $url;
	if($pos!='')
	{
		return $url;
	}
	else
	{
		if(strrchr($url,'https://127.0.0.1/'))
		{
			//echo 'yes';
			$lin = explode("upload",$url);
			return substr_replace('https://127.0.0.1/','https://media.inspiringvillas.com/prd/',$url).'upload'.$lin[1];
		}
		else
		{
			//echo 'noooooooooooooo';
			return  "https://media.inspiringvillas.com/prd".$url;
	//		echo $url;
		}
	}
	
}

?>
<button id="top" class="up"><i class="fa fa-angle-up" aria-hidden="true"></i></button>

