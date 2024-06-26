<?php
$arr_link = array(
'/search-rent/thailand/all-beach/all-price/all-bedrooms/full-staff-service-villas/all-sort.html',
'/search-rent/thailand/all-beach/all-price/all-bedrooms/mid-price-range-villas/all-sort.html',
'/search-rent/thailand/all-beach/all-price/all-bedrooms/affordable-private-pool-villas/all-sort.html'
);
$arr_link_Phuket = array(
'/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/full-staff-service-villas/all-sort.html',
'/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/mid-price-range-villas/all-sort.html',
'/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/affordable-private-pool-villas/all-sort.html');
$arr_link_Koh_Samui = array(
'/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/full-staff-service-villas/all-sort.html',
'/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/mid-price-range-villas/all-sort.html',
'/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/affordable-private-pool-villas/all-sort.html');
?>
<div class="col-md-12 text-center">
<?php
if(in_array($_SERVER['REQUEST_URI'],$arr_link))
{
	?>
    <a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="tgold abtl"><button class="btl">See All Phuket Villas</button></a>
    <a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html"><button class="btl">See All Koh Samui Villas</button></a>
    <?php
}

if(in_array($_SERVER['REQUEST_URI'],$arr_link_Phuket))
{
	?>
    <a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="tgold abtl"><button class="btl">See All Phuket Villas</button></a>
    <?php
}

if(in_array($_SERVER['REQUEST_URI'],$arr_link_Koh_Samui))
{
	?>
    <a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="tgold abtl"><button class="btl">See All Koh Samui Villas</button></a>
    <?php
}
?>
</div>
<style>
.btl
{
	border:none;
	background:white;
	color:#f7941d;
	padding:5px 15px;
	transition:0.3s all;
}
.btl:hover
{
	background:#eeeeee;
}
</style>