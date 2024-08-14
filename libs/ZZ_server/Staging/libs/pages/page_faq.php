<?php //require_once "libs/pages/base_mini_cover.php";?>
<?php 
$cover = $dbc->GetRecord("cover","*","page='faq' AND status > 0");
$photo_cover = json_decode($cover['photo'],true);
$photo_cover = imagePath($photo_cover);
?>
<style>
.mg-page-title {
    padding-top: 0px;
    padding-bottom: 50px;
    padding-left: 0px;
    background-image: url(<?php echo $photo_cover;?>);
    background-repeat: no-repeat;
	background-position-x: 50% !important;
    /* background-position: 0% !important; *s/
    color: #fff;
    text-align: center;
    height: 600px;
    /* background: red; */
}
.mg-sec-left-title,
.mg-widget-title {
  font-family: "Playfair Display", serif;
  color: #16262e;
  font-size: 25px;
   text-transform: inherit !important\; 
  font-weight: 400;
  margin: 0 0 0px;
  padding-bottom: 15px;
  position: relative;
}
.panel-body
{
	font-family:pt;
}
</style>
<!--<script src="libs/js/jquery-3.1.1.min.js"></script>-->

<div class="mg-page-titles top68" style="display:none;"><!--parallax-->
    <div class="container-fluid nopad">
            <img class="lazy" data-src="<?php echo $photo_cover;?>" alt="inspiringvillas cover" width="100%" class="motop">
        <div class="row">
            <!--<div class="col-md-12">
                <h2>Faq</h2>
                <p>Cogitavisse erant puerilis utrum efficiantur adhuc expeteretur.</p>
            </div>-->
        </div>
    </div>
</div>
<!--<div class="mg-page-title mobi"></div>-->
<br><br><br class="mob992"><br class="web992">

<?php include "libs/pages/search.php";?>






<div class="container">
	<div class="row">
    	<div class="col-md-12 text-center">
               <!-- <center>-->
                <h1 class="hidden-xss " style="margin-top: 55px;">FAQ</h1>
                <!--<h2 class="f16 text-center ftop" style="    font-family: pt !important;">FAQ</h2><br>-->
                <p>Read our FAQ and find answer for common questions. If you can’t find the answer <br>feel free to <a href="/contact">contact us</a> via the form. For any urgent requests, please call us at +66 84 677 1551</p>
                <!--</center>-->
            </div>
    	<div class="col-md-8"><br>
        	
            
                 <?php
				$ii=0;
				$sql_group = $dbc->Query("select * from faq where status > '0' AND parent IS NULL order by sort asc");
				while($row = $dbc->Fetch($sql_group))
				{
					echo '<h2 class="mg-widget-title tfaq">'.$row['name'].'</h2>';
					
					echo '<div class="accordion" id="accordionPanelsStayOpenExample">';
					$sql_sub = $dbc->Query("select * from faq where status > '0' AND parent = '".$row['id']."' order by name asc");
					while($line = $dbc->Fetch($sql_sub))
					{
						$ii++;
						echo '<div class="accordion-item">';
							echo '<h2 class="accordion-header" id="panelsStayOpen-headingOne_'.$ii.'">';
								echo '<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne_'.$ii.'" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne_'.$ii.'">';
									echo $line['name'];
								echo '</button>';
							echo '</h2>';
							echo '<div id="panelsStayOpen-collapseOne_'.$ii.'" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-headingOne_'.$ii.'">';
								echo '<div class="accordion-body">';
									 echo base64_decode($line['detail'],true);
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
					echo '</div>';
					echo '<br><br>';
				}?>
            



            

              
        </div>
        <div class="col-md-4">
            <br>
            <div class="col-md-12 nopad">
            	<img class="lazy" data-src="../../files/Why Choose Us Box.png" width="100%" alt="Why Choose Us Box Inspiring Villas">
                <img class="lazy" data-src="../../files/We Accept.png" width="100%" alt="We Accept Inspiring Villas">
            </div>
        </div>
    </div>
</div><br><br><br>
<style>
.mg-sec-left-title:after, .mg-widget-title:after {
    content: '';
    display: block;
    width: 45px;
    height: 2px;
    background-color: #d3a267;
    position: absolute;
    bottom: 0;
    left: 0;
    margin-top: -15px;
    top: 43px;
}
.panel-body
{
	border:1px solid #eeeeee;
	padding:10px;
	border-radius:5px;
	margin-bottom:10px;
	margin-top:-12px;
}
</style>
<script>
$(document).ready(function(e) {
    $(".lazy").lazyload();
});
</script>