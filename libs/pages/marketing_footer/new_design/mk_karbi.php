<?php
if($page_link=='krabi')
{
	$ar_content = array(
		array(
			'title' => 'Explore Best Krabi Villas for Rent',
			'content' => '
			When traveling to Krabi, you open a door to one of Thailand’s most gorgeous and calming areas, with clear waters and lush tropical greenery. It has become a destination for adventurers, nature lovers, and anyone looking to escape the tourist-heavy areas of the country for something more relaxed. Our Krabi villas for rent are for those that want to immerse themselves into nature with a hint of luxury. While you might not find some of the extensive staff options like chefs and butlers, you will discover a unique and inspiring charm that is more affordable yet remains refined and world-class.
<br><br>
Our exclusive collection of Krabi villas for rent are designed for comfort, privacy, and inspiration. The options include beachfront bungalows, hilltop retreats, and larger accommodations perfectly positioned to soak in Krabi’s natural beauty. The affordability of these Krabi villas for rent makes Krabi an appealing destination for many travelers, whether you’re on a romantic getaway or a larger group looking to explore the islands and culture. Many villa options in Krabi are waiting for you to enjoy!
<br><br>
			'
		),
		array(
			'title' => 'Krabi: Your Gateway to Adventure and Serenity',
			'content' => '
			Start your unforgettable adventure in Krabi at one of our amazing villas. Our guests are never far away from new adventures like island hopping to gems like Phi Phi Island or Railay Beach, ancient cave exploration, or simply beautiful sunsets from your private terrace. If you’re a traveler with an eye toward cultural experiences, Krabi has a vibrant scene of markets, restaurants, and community events. All of these make Krabi an awesome choice for a glimpse into the authentic taste of Thailand and its wonderful culture.
<br><br>
All of the amenities at our Krabi villas for rent are designed to make your stay enriching. Wake up in a spacious air-conditioned bedroom and walk outside onto a terrace with one-of-a-kind views of the Andaman Sea or lush tropical gardens. Many of these villa options have infinity pools for you to unwind and enjoy a gaze at the horizon, modern kitchens to prepare meals, and more! The living areas are equipped with large smart TVs for a chill evening in, and even tropical-style outdoor bathrooms for showers and baths under the open sky. With daily housekeeping to ensure a clean and comfortable living space, Krabi villas for rent are here to deliver an unforgettable trip in Krabi.
<br>
Krabi places you in a welcoming local environment and community with many opportunities to explore food, culture, and nature. Your villa might not come equipped with full-time chefs and butlers like in <a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="tor">Phuket holiday villas for rent</a> or <a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="tor">Koh Samui Villas for rent</a>, but you will always have the freedom to choose from many great local dining options. Personalization is still a major element of your stay with us in Krabi, adding to the unique experience and adventure of your stay.
<br><br>
You might be drawn to the untamed local landscapes, the serene beaches free of huge crowds, or the charm of Thai village life. No matter your preference, Krabi is an unmatched destination for global travelers. Create memories at a retreat far from the crowds at a sanctuary for you to unwind and recharge. These options are your escape from the mundane and into the extraordinary. So choose your Krabi villas for rent with Inspiring Villas, combining the comfort of private accommodations with the excitement of exploring one of Thailand\'s most captivating regions.
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
			$content .='<h2 class="nct_main_tt">'.$con['title'].'</h2>';
		$content .='</div>';
		$content .='<div class="col-11 text-center">';
			$content .='<div class="text-center">';
			$content .= $con['content'];
			$content .='</div>';
		$content .='</div>';
		$detail='';
		$i++;
	}

	/*$content .='<div class="col-11 text-center top0">';
		$content .='<h2 class="nct_main_tt">'.$tt.'</h2>';
	$content .='</div>';
	$content .='<div class="col-11 text-center">';
		$content .='<div class="text-center">';
		$content .= $detail;
		$content .='</div>';
	$content .='</div>';
	$detail='';*/
}
elseif($page_link == 'krabi_seaview')
{
	$ar_content = array(
		array(
			'title' => 'Discover the best sea view villas in Phuket',
			'type' => 1,
			'content' => '
			Sea view villas sit in the hills just above Phuket’s beautiful beaches.<br>
On cliff tops and high up on hill tops the panoramic view of the sea all around can be incredible.
<br><br>
			'
		),
		array(
			'title' => 'What to expect in a sea view villa',
			'type' => 1,
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
			'title' => '<a href="/search-rent/thailand-phuket/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html" class="tor">2,3,4 Bedroom Villas</a>',
			'type' => 2,
			'content' => '
			Suitable for couples, families and small groups searching for a private villa vacation.

			'
		),
		array(
			'title' => '<a class="tor" style="cursor:default !important">5,6,7 Bedroom Villas</a>',
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
