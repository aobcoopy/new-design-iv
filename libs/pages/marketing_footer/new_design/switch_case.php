<?php
$this_link = $_SERVER['REQUEST_URI'];
$page_link = '';

$mk_head_photo = 'dis_none';
$mk_photo_and_text = 'dis_none';
$mk_text_only = 'dis_none';
$mk_section_destination_LUXURY_VILLA = 'dis_none';
$mk_section_villa_with_full_time_chef = 'dis_none';
$mk_section_category = 'dis_none';
$mk_section_villa_cost_survey = 'dis_none';
$mk_section_FAQ = 'dis_none';
$mk_photo_and_text_bottom = 'dis_none';
$mk_section_price_table = 'dis_none';
$mk_section_BEACH = 'dis_none';
if($_REQUEST['des']==38 && $_REQUEST['cate']!='all')
{
	$mk_head_photo = '';
}
if($_REQUEST['des']==39 && $_REQUEST['cate']!='all')
{
	$mk_head_photo = '';
}
//echo '>>'.$this_link;

switch($this_link)
{
	//--------------------destination----------------------------
	case "/search-rent/thailand/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" :
		$page_link = 'all';
		$mk_head_photo = '';
		$mk_text_only = '';
	break;
	case "/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" :
		$page_link = 'phuket';
		$mk_head_photo = '';
		$mk_photo_and_text = '';
		$mk_text_only = '';
		$mk_section_destination_LUXURY_VILLA = '';
		$mk_section_villa_with_full_time_chef = '';
		$mk_section_category = '';
		$mk_section_villa_cost_survey = '';
		$mk_section_FAQ = '';
		$mk_photo_and_text_bottom = '';
		$mk_section_price_table = '';
		$mk_section_BEACH = '';
	break;
	case "/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" :
		$page_link = 'koh_samui';
		$mk_head_photo = '';
		$mk_photo_and_text = '';
		$mk_text_only = '';
		$mk_section_destination_LUXURY_VILLA = '';
		$mk_section_villa_with_full_time_chef = '';
		$mk_section_category = '';
		$mk_section_villa_cost_survey = '';
		$mk_section_FAQ = '';
		$mk_photo_and_text_bottom = '';
		$mk_section_price_table = '';
		$mk_section_BEACH = '';
	break;
	//--------------------destination----------------------------
	
	//--------------------destination + bedroom----------------------------
	case "/search-rent/thailand-phuket/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html" :
		$page_link = 'phuket_1_4';
		$mk_head_photo = '';
		$mk_text_only = '';
	break;
	case "/search-rent/thailand-phuket/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html" :
		$page_link = 'phuket_5_7';
		$mk_head_photo = '';
		$mk_text_only = '';
	break;
	case "/search-rent/thailand-phuket/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html" :
		$page_link = 'phuket_8_10';
		$mk_head_photo = '';
		$mk_text_only = '';
	break;
	case "/search-rent/thailand-koh-samui/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html" :
		$page_link = 'samui_1_4';
		$mk_head_photo = '';
		$mk_text_only = '';
		$mk_section_FAQ = '';
	break;
	case "/search-rent/thailand-koh-samui/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html" :
		$page_link = 'samui_5_7';
		$mk_head_photo = '';
		$mk_text_only = '';
		$mk_section_FAQ = '';
	break;
	case "/search-rent/thailand-koh-samui/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html" :
		$page_link = 'samui_8_10';
		$mk_head_photo = '';
		$mk_text_only = '';
		$mk_section_FAQ = '';
	break;
	//--------------------destination + bedroom----------------------------
	
	//--------------------category----------------------------
	case "/search-rent/thailand/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html" :
		$page_link = 'beachfront';
		$mk_text_only = '';
	break;
	case "/search-rent/thailand/all-beach/all-price/all-bedrooms/wedding-villas/all-sort.html" :
		$page_link = 'wedding';
		$mk_text_only = '';
	break;
	case "/search-rent/thailand/all-beach/all-price/all-bedrooms/larger-group-villas/all-sort.html" :
		$page_link = 'larger-group';
		$mk_text_only = '';
	break;
	case "/search-rent/thailand/all-beach/all-price/all-bedrooms/seaview-villas/all-sort.html" :
		$page_link = 'seaview';
		$mk_text_only = '';
	break;
	case "/search-rent/thailand/all-beach/all-price/all-bedrooms/full-staff-service-villas/all-sort.html" :
		$page_link = 'full-staff-service-villas';
		$mk_text_only = '';
	break;
	case "/search-rent/thailand/all-beach/all-price/all-bedrooms/affordable-private-pool-villas/all-sort.html" :
		$page_link = 'affordable-private-pool-villas';
		$mk_text_only = '';
	break;
	//--------------------category----------------------------
	
	
	//--------------------phuket + category----------------------------
	case "/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html" :
		$page_link = 'phuket_beachfront';
		$mk_text_only = '';
		$mk_section_FAQ = '';
	break;
	case "/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/seaview-villas/all-sort.html" :
		$page_link = 'phuket_seaview';
		$mk_text_only = '';
	break;
	case "/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/wedding-villas/all-sort.html" :
		$page_link = 'phuket_wedding';
		$mk_text_only = '';
	break;
	case "/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/larger-group-villas/all-sort.html" :
		$page_link = 'phuket_larger_group';
		$mk_text_only = '';
	break;
	//--------------------phuket + category----------------------------
	
	//--------------------phuket + beach----------------------------
	case "/search-rent/thailand-phuket/ao-yon-bay/all-price/all-bedrooms/all-collections/all-sort.html" :
		$page_link = 'thailand-phuket/ao-yon-bay';
		$mk_text_only = '';
	break;
	case "/search-rent/thailand-phuket/bang-tao-beach/all-price/all-bedrooms/all-collections/all-sort.html" :
		$page_link = 'thailand-phuket/bang-tao-beach';
		$mk_text_only = '';
	break;
	case "/search-rent/thailand-phuket/cape-panwa-beach/all-price/all-bedrooms/all-collections/all-sort.html" :
		$page_link = 'thailand-phuket/cape-panwa-beach';
		$mk_text_only = '';
	break;
	case "/search-rent/thailand-phuket/cape-yamu/all-price/all-bedrooms/all-collections/all-sort.html" :
		$page_link = 'thailand-phuket/cape-yamu';
		$mk_text_only = '';
	break;
	case "/search-rent/thailand-phuket/kamala-beach/all-price/all-bedrooms/all-collections/all-sort.html" :
		$page_link = 'thailand-phuket/kamala-beach';
		$mk_text_only = '';
	break;
	case "/search-rent/thailand-phuket/kata-beach/all-price/all-bedrooms/all-collections/all-sort.html" :
		$page_link = 'thailand-phuket/kata-beach';
		$mk_text_only = '';
	break;
	case "/search-rent/thailand-phuket/layan-beach/all-price/all-bedrooms/all-collections/all-sort.html" :
		$page_link = 'thailand-phuket/layan-beach';
		$mk_text_only = '';
	break;
	case "/search-rent/thailand-phuket/nai-harn/all-price/all-bedrooms/all-collections/all-sort.html" :
		$page_link = 'thailand-phuket/nai-harn';
		$mk_text_only = '';
	break;
	case "/search-rent/thailand-phuket/natai-beach/all-price/all-bedrooms/all-collections/all-sort.html" :
		$page_link = 'thailand-phuket/natai-beach';
		$mk_text_only = '';
	break;
	case "/search-rent/thailand-phuket/patong/all-price/all-bedrooms/all-collections/all-sort.html" :
		$page_link = 'thailand-phuket/patong';
		$mk_text_only = '';
		$mk_head_photo = '';
	break;
	case "/search-rent/thailand-phuket/surin-beach/all-price/all-bedrooms/all-collections/all-sort.html" :
		$page_link = 'thailand-phuket/surin-beach';
		$mk_text_only = '';
		//$mk_head_photo = '';
	break;
	//--------------------phuket + beach----------------------------
	
	
	//--------------------koh samui + category----------------------------
	case "/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html" :
		$page_link = 'koh_samui_beachfront';
		$mk_text_only = '';
		$mk_section_FAQ = '';
		$mk_section_price_table = '';
	break;
	case "/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/seaview-villas/all-sort.html" :
		$page_link = 'koh_samui_seaview';
		$mk_text_only = '';
		$mk_photo_and_text = '';
	break;
	case "/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/wedding-villas/all-sort.html" :
		$page_link = 'koh_samui_wedding';
		$mk_text_only = '';
	break;
	case "/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/larger-group-villas/all-sort.html" :
		$page_link = 'koh_samui_larger_group';
		$mk_text_only = '';
	break;
	//--------------------koh samui + category----------------------------
	
	//--------------------koh samui + beach----------------------------
	case "/search-rent/thailand-koh-samui/bangrak-beach/all-price/all-bedrooms/all-collections/all-sort.html" :
		$page_link = 'thailand-koh-samui/bangrak-beach';
		$mk_text_only = '';
	break;
	case "/search-rent/thailand-koh-samui/bophut-beach/all-price/all-bedrooms/all-collections/all-sort.html" :
		$page_link = 'thailand-koh-samui/bophut-beach';
		$mk_text_only = '';
		$mk_head_photo ='';
	break;
	case "/search-rent/thailand-koh-samui/chaweng-beach/all-price/all-bedrooms/all-collections/all-sort.html" :
		$page_link = 'thailand-koh-samui/chaweng-beach';
		$mk_text_only = '';
	break;
	case "/search-rent/thailand-koh-samui/chaweng-noi/all-price/all-bedrooms/all-collections/all-sort.html" :
		$page_link = 'thailand-koh-samui/chaweng-noi';
		$mk_text_only = '';
	break;
	case "/search-rent/thailand-koh-samui/choeng-mon-beach/all-price/all-bedrooms/all-collections/all-sort.html" :
		$page_link = 'thailand-koh-samui/choeng-mon-beach';
		$mk_text_only = '';
	break;
	case "/search-rent/thailand-koh-samui/laem-set-beach/all-price/all-bedrooms/all-collections/all-sort.html" :
		$page_link = 'thailand-koh-samui/laem-set-beach';
		$mk_text_only = '';
	break;
	case "/search-rent/thailand-koh-samui/laem-sor-beach/all-price/all-bedrooms/all-collections/all-sort.html" :
		$page_link = 'thailand-koh-samui/laem-sor-beach';
		$mk_text_only = '';
	break;
	case "/search-rent/thailand-koh-samui/lamai-beach/all-price/all-bedrooms/all-collections/all-sort.html" :
		$page_link = 'thailand-koh-samui/lamai-beach';
		$mk_text_only = '';
	break;
	case "/search-rent/thailand-koh-samui/lipa-noi-beach/all-price/all-bedrooms/all-collections/all-sort.html" :
		$page_link = 'thailand-koh-samui/lipa-noi-beach';
		$mk_text_only = '';
	break;
	case "/search-rent/thailand-koh-samui/maenam-beach/all-price/all-bedrooms/all-collections/all-sort.html" :
		$page_link = 'thailand-koh-samui/maenam-beach';
		$mk_text_only = '';
	break;
	case "/search-rent/thailand-koh-samui/taling-ngam-beach/all-price/all-bedrooms/all-collections/all-sort.html" :
		$page_link = 'thailand-koh-samui/taling-ngam-beach';
		$mk_text_only = '';
	break;
	//--------------------koh samui + beach----------------------------
	
	//--------------------koh phangan----------------------------
	case "/search-rent/thailand-koh-phangan/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" :
		$page_link = 'koh_phangan';
		$mk_text_only = '';
	break;
	//--------------------koh phangan----------------------------
	//--------------------koh phangan + cate----------------------------
	case "/search-rent/thailand-koh-phangan/all-beach/all-price/all-bedrooms/seaview-villas/all-sort.html" :
		$page_link = 'koh_phangan_seaview';
		$mk_text_only = '';
	break;
	//--------------------koh phangan + cate----------------------------
	
	
	//--------------------krabi----------------------------
	case "/search-rent/thailand-krabi/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" :
		$page_link = 'krabi';
		$mk_text_only = '';
		$mk_head_photo = '';
	break;
	case "/search-rent/thailand-krabi/all-beach/all-price/all-bedrooms/seaview-villas/all-sort.html" :
		$page_link = 'krabi_seaview';
		$mk_text_only = '';
	break;
	//--------------------krabi----------------------------
	
	
	//--------------------Phang Nga----------------------------
	case "/search-rent/thailand-phang-nga/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" :
		$page_link = 'phang_nga';
		$mk_text_only = '';
		$mk_head_photo = '';
	break;
	case "/search-rent/thailand-phang-nga/all-beach/all-price/all-bedrooms/seaview-villas/all-sort.html" :
		$page_link = 'phang_nga_seaview';
		$mk_text_only = '';
	break;
	//--------------------Phang Nga----------------------------
}
?>
<script>
$(document).ready(function(e) {
    $(".dis_none").remove();
});
</script>
<style>
.dis_none
{
	display:none;
}
</style>