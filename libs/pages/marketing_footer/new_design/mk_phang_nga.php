<?php
if($page_link == 'phang_nga')
{
	$ar_content = array(
		array(
			'title' => 'The Ultimate Vacation Experience in Phang Nga Villas for rent',
			'type' => 1,
			'content' => '
			Along the gorgeous shores and tropical landscapes of Phang Nga, you’ll find our amazing collection of luxury villa Phang Nga rentals. Phang Nga has become known as one of the country\'s most enchanting regions, with few tourists and lots of natural beauty. All of the Phang Nga villas for rent in our collection go beyond the traditional accommodation and provide a homebase for your unforgettable holiday full of relaxation and adventure.<br><br>
Each of the Phang Nga villas for rent in our collection represents luxury villa, offering guests large living areas, private pools, luxury pool villa, and elegant interior design. When staying at one of our villas, you can always expect state-of-the-art kitchens, bedrooms with panoramic views, and bathrooms equipped with deluxe amenities. Venturing outside of the villa, you’ll find impressive outdoor spaces with infinity pools, sun loungers, and alfresco dining areas for those relaxing evenings under the moon and stars.
<br><br>
			'
		),
		array(
			'title' => 'Tailored Experiences for Every Traveler',
			'type' => 1,
			'content' => '
			No matter the reason for your vacation, all guests at our villas experience a custom luxury experience. Whether you’re on a romantic holiday, a fun family adventure, or a group of friends celebrating a special occasion, there is something for everyone. Families love the child-friendly facilities and secure locations, while friends on a trip can enjoy the spacious entertainment areas. If you’re traveling as a couple, all of these villas are romantic, private and serene. You’ll be sure to create lasting memories at these Phang Nga villas for rent.<br><br>
The natural beauty of Phang Nga Thailand is renowned, with incredible limestone cliffs and beautiful emerald waters. The villas are located for easy access to a variety of outdoor activities, including kayaking through mangrove forests, exploring hidden lagoons, island hopping, and diving adventures. You won’t have to worry about proximity to the best local attractions such as James Bond Island and traditional fishing villages that bring out the allure of this incredible location in Thailand. There are endless opportunities to explore Phang Nga and jump into the local culture for new experiences.
<br><br>
			'
		),
		array(
			'title' => 'Exclusive Services and Hospitality',
			'type' => 1,
			'content' => '
			Thai hospitality is unlike any other, and each of our Phang Nga villas for rent include world-class levels of personalized service. This level of customization ensures all guests have a hassle-free and ideal vacation. From the delicious Thai and international meals prepared by private chefs, to the custom tours and activities organized by our luxury concierge, every detail is handled for you. Guests have the opportunity to partake in relaxing spa treatments in their villa, yoga sessions overlooking Phang Nga bay, or personalized adventures to explore the region.<br><br>
When choosing a villa rentals in Phang Nga, you’re choosing more than a place to stay; it’s about crafting an experience that blends luxury living with the natural wonder and adventure of Thailand. All of our villas cater to this level of experience, with unparalleled amenities, stunning locations, and access to a variety of activities. Perfect for all travelers seeking an exclusive and memorable holiday, each villa delivers an amazing Phang Nga experience. Discover the joy of waking up to breathtaking views, dining under the stars, and making lasting memories with loved ones in the serene beauty of Phang Nga.
<br><br><br>
			'
		),
		/*array(
			'title' => '<a href="/search-rent/thailand-phuket/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html" class="tor">2,3,4 Bedroom Villas</a>',
			'type' => 2,
			'content' => '
			Suitable for couples, families and small groups searching for a private villa vacation.

			'
		),*/
		
		
	);
	/*$tt = 'The benefits of Koh Samui villa rental';
	//$detail = '<div class="bottom20"><h3 class="ft_subject" ><a class="tor" href="/">/</a></h3></div>';
	$detail = '
	Renting a Luxury Koh Samui Villas for rent is a different way to experience the island. Instead of hotel-style service, you will have the opportunity to enjoy other features which include an on-site villa manager, in-house chef, private pools, fitness centres, games rooms and more. Villas in Samui are designed to provide the ultimate privacy for you and your travel companions. Whether you are seeking the perfect wedding villa, a sea view escape from the realities of the world or something that’s only a short walk to a stunning beach, Inspiring Villas has the right property for you.
	';*/
	$i=0;
	foreach($ar_content as $con)
	{
		$top = ($i>0)?'top50':'top0';
		$content .='<div class="col-11 text-center '.$top.'">';
		if($con['type']==1)
		{
			$content .='<h2 class="nct_main_tt">'.$con['title'].'</h2>';
		}
		else
		{
			$content .='<div class="bottom20"><h3 class="ft_subject" >'.$con['title'].'</h3></div>';
		}
		$content .='</div>';
		$content .='<div class="col-11 text-center">';
			$content .='<div class="text-center">';
			$content .= $con['content'];
			$content .='</div>';
		$content .='</div>';
		$detail='';
		$i++;
	}
}
elseif($page_link == 'phang_nga_seaview')
{
	$ar_content = array(
		array(
			'title' => 'Discover the best sea view villas in Phuket',
			'type' => 1,
			'content' => '
			Sea view villas sit in the hills just above Phuket’s beautiful beaches.<br>
On cliff tops and high up on hill tops the panoramic view of the sea all around can be incredible.

			'
		),
		array(
			'title' => '<span class="tblk">What to expect in a sea view villa</span>',
			'type' => 2,
			'content' => '
			With more space available it is the sea view villas that tend to be bigger inside and out.<br><br>
Expect manicured lawns sloping down to pool decks and an infinity pool.<br>
Large areas for groups to relax and enjoy themselves together.<br>
And sea views in every direction. Often from every room in the villa.<br><br>
With all the extra space you can expect the very best array of amenities like games, fitness and cinema rooms, aswell as spa, steam and saunas.
<br><br>
			'
		),
		array(
			'title' => 'Phuket sea view villas by bedroom numbers',
			'type' => 1,
			'content' => '
			To make it as easy as possible to find the best villa for your group, please find the bedroom range links below.<br>
Here you can find all the villas that will accommodate the number of bedrooms you will need.<br>
On each villa details page you can view the price for the number of bedrooms required.
<br>
			'
		),
		array(
			'title' => '<a href="/search-rent/thailand-phuket/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html" class="tor">2,3,4 Bedroom Villas</a>',
			'type' => 2,
			'content' => '
			Suitable for couples, families and small groups searching for a private villa vacation.

			'
		),
		array(
			'title' => '<a style="cursor:default !important" class="tor">5,6,7 Bedroom Villas</a>',
			'type' => 2,
			'content' => '
			The most common villa size and with all the facilities you could need.<br>
Enjoy fitness, games, cinema and spa rooms, aswell as sea views from infinity pools overlooking the beaches and sea.

			'
		),
		array(
			'title' => '<a href="/search-rent/thailand-phuket/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html" class="tor">8,9,10 Bedroom Villas</a>',
			'type' => 2,
			'content' => '
			Accommodating larger groups with big spaces indoors and outside, making it easy to travel together and much better value than a hotel.
<br><br>
			'
		),
		
		
	);
	/*$tt = 'The benefits of Koh Samui villa rental';
	//$detail = '<div class="bottom20"><h3 class="ft_subject" ><a class="tor" href="/">/</a></h3></div>';
	$detail = '
	Renting a Luxury Koh Samui Villas for rent is a different way to experience the island. Instead of hotel-style service, you will have the opportunity to enjoy other features which include an on-site villa manager, in-house chef, private pools, fitness centres, games rooms and more. Villas in Samui are designed to provide the ultimate privacy for you and your travel companions. Whether you are seeking the perfect wedding villa, a sea view escape from the realities of the world or something that’s only a short walk to a stunning beach, Inspiring Villas has the right property for you.
	';*/
	$i=0;
	foreach($ar_content as $con)
	{
		$top = ($i>0)?'top50':'top0';
		$content .='<div class="col-11 text-center '.$top.'">';
		if($con['type']==1)
		{
			$content .='<h2 class="nct_main_tt">'.$con['title'].'</h2>';
		}
		else
		{
			$content .='<div class="bottom20"><h3 class="ft_subject" >'.$con['title'].'</h3></div>';
		}
		$content .='</div>';
		$content .='<div class="col-11 text-center">';
			$content .='<div class="text-center">';
			$content .= $con['content'];
			$content .='</div>';
		$content .='</div>';
		$detail='';
		$i++;
	}
}
?>
