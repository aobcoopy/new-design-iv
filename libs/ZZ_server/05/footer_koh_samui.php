<?php
$this_year = date('Y');
$last_year = date('Y')-1;
if($show_koh_samui == '')
{
	//echo "11111111111---show_koh_samui";
?>
<div class="container <?php echo $show_koh_samui.' '.$f_foot;?>">

				<?php
				if($_SERVER['REQUEST_URI']=='/search-rent/thailand-koh-samui/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html')
				{
					?>
                    
                    <h2 class=" mb f30 top"><strong>Where are the Best 5,6,7 Bedroom Villas in Koh Samui?</strong></h2>
                    <div class="col-md-12 nopad top41">
                        <table class="table table-bordered table-striped ttb" width="100%%" border="1">
                            <thead>
                                <tr>
                                    <th>Koh Samui Location</th>
                                    <th>Price From</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/bophut-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Bophut <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$300</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/chaweng-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Chaweng Noi <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$450</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/maenam-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Maenam <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$850</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/lipa-noi-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Lipa Noi <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$700</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/lamai-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Lamai <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$600</td>
                                </tr>
                                
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/laem-sor-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Laem Sor <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$1,000</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/taling-ngam-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Taling Ngam <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$405</td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </div>
        
				<?php
				}
				elseif($_SERVER['REQUEST_URI']=='/search-rent/thailand-koh-samui/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html')
				{
					?>
                    <h2 class=" mb f30 top"><strong><?php /*?><a class="tg cdf" ><?php */?>Where are the best 8,9,10> bedroom Villas in Koh Samui?<?php /*?></a><?php */?></strong></h2>
                    <div class="col-md-12 nopad top41">
                        <table class="table table-bordered table-striped ttb" width="100%%" border="1">
                            <thead>
                                <tr>
                                    <th>Koh Samui Location</th>
                                    <th>Price From</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/bophut-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Bophut <?php echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$1,350</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/maenam-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Maenam <?php echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$600</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/lipa-noi-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Lipa Noi <?php echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$1,300</td>
                                </tr>
                                
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/laem-sor-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Laem Sor <?php echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$1,000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

				<?php
				}
				?>

				<?php 
				if($_REQUEST['cate']!=6 && $_REQUEST['cate']!=8 && $_REQUEST['cate']!=5)
				{
					
					if($_SERVER['REQUEST_URI']=='/search-rent/thailand-koh-samui/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html' )
					{
					}
					elseif($_SERVER['REQUEST_URI']=='/search-rent/thailand-koh-samui/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html')
					{
						?>
						<div class="col-md-12 nopad top41">
                            <h2 class=" mb f30"><strong>The Luxury of Large Villa Koh Samui 8, 9, 10 Bedroom Villas in Koh Samui</strong></h2>
                            <div class="col-md-12 nopad top21 f18">
                                Across the gulf of Thailand, you’ll find many incredible locations, but few as gorgeous as Koh Samui. For travelers visiting this gem of an island, we have an awesome collection of large villas that are perfect for hosting big groups. You won’t need to sacrifice on luxury or experience with 8, 9, 10 Bedroom Villas, whether you’re planning a family reunion, glamorous wedding, or a special corporate retreat. Each 8,9,10 Bedroom Villas in this collection offers an amazing backdrop with unforgettable views, state-of-the-art facilities, and welcoming interiors to make you feel at home.
                            </div>
                        </div>
                        
                        <div class="col-md-12 nopad top41">
                            <h3 class=" mb f30"><strong>The Best of Large Villa Koh Samui</strong></h3>
                            <div class="col-md-12 nopad top21 f18">
                                Among the many 8,9,10 bedroom villa Koh Samui in this collection, Villa Shadow and Ban Sairee stand out. Located near the popular Chaweng Noi Beach, Villa Shadow features nine bedrooms, two pools, and multiple lounging areas. This villa has become a sanctuary of comfort for many travelers, providing king-sized beds and modern ensuites, great for both celebrations and relaxing getaways.
For those seeking a more traditional Thai experience without making any sacrifices in the area of luxury, Ban Sairee is the perfect choice. Its location places guests near a secluded beach, and combines modern amenities with gorgeous Thai architecture. From the giant trampoline to the stylish bunk rooms, Ban Sairee is a villa meant for those who want some authenticity alongside their modern comforts. Enhancing Your Stay with Exclusive Villa Features
8,9,10 bedroom villas in Koh Samui is designed to offer something special. In Villa Shadow, you’ll find an impeccable in-villa spa and yoga area, a great option for those in need of some relaxation and mindfulness. Koh Samui is renowned for its health and fitness culture, and 8,9,10 bedroom villas elevate that lifestyle to new heights. There are so many ways to connect with the nature of Koh Samui, and each of our villas helps facilitate this connection. Some villas even provide an outdoor sala with kayaks available so you can jump into some water sports without straying too far from your villa.
                            </div>
                        </div>
                        
                        <div class="col-md-12 nopad top41">
                            <h3 class=" mb f30"><strong>Activities and Attractions Near the Villas</strong></h3>
                            <div class="col-md-12 nopad top21 f18">
                               All of the Koh Samui villas we offer ensure that you’re never too far away from activities and attractions. 8,9,10 bedroom villas in Koh Samui is conveniently located with easy access to the best that the island has to offer. From Na Muang waterfalls, Big Buddha, and the Fisherman Village, these 8,9, and 10 bedroom villas will place your group in the heart of Koh Samui without sacrificing privacy. Don’t miss some of the island’s exceptional dining options, from high-end restaurants to local eateries by the beach, all palates can be satisfied when staying with Inspiring Villas.<br><br>
If your group, or some individuals are interested in outdoor activities, we’ve got just the thing! You can enjoy everything from snorkeling and scuba diving in the Gulf of Thailand to golfing at nearby courses or even joining cooking classes to learn the art of Thai cuisine. There is something in reach for everyone, so don’t worry about coordinating many personalities while in villa Koh Samui.
                            </div>
                        </div>
                        
                        <div class="col-md-12 nopad top41">
                            <h3 class=" mb f30"><strong>A Stay Beyond Expectations</strong></h3>
                            <div class="col-md-12 nopad top21 f18">
                              Traveling in large groups can be stressful, and we are here to alleviate this stress while traveling in Koh Samui. All of these large villas go well beyond a place to rest your head, and create unforgettable experiences for you and your fellow travelers in one of the world’s most gorgeous locations. With luxurious amenities, stunning views, and ample space, these villas promise a vacation that is as relaxing as it is exciting. Whether you're watching the sunset over the sea or celebrating under the stars, these properties ensure your holiday is nothing short of spectacular.
                            </div>
                        </div>
						<?php
					}
					elseif($_SERVER['REQUEST_URI']=='/search-rent/thailand-koh-samui/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html')
					{
						?>
                        <div class="col-md-12 nopad top41">
						<h2 class=" mb f30"><strong>Koh Samui’s Best 2,3,4 Bedroom Luxury Villas</strong></h2>
                        <div class="col-md-12 nopad top21 f18">
                        There is no island paradise quite like Koh Samui, a destination that attracts global travelers to its gorgeous shores. Koh Samui is home to an incredible collection of large villas that can accommodate groups of travelers. Each villa provides access to this tropical beauty while ensuring security, privacy, and personalization. Each 2,3,4 bedroom villas is designed to cater to various group sizes and preferences, combining modern Thai architecture with natural island beauty. So if you’re seeking the perfect backdrop to your dream vacation in Thailand, look no further than these 2,3,4 bedroom villas in Koh Samui.
                        </div>
                        </div>
                        
                        <div class="col-md-12 nopad top41">
                        <h2 class=" mb f30"><strong>Elegant Interiors and Lavish Amenities</strong></h2>
                        <div class="col-md-12 nopad top21 f18">
                        Each 2,3,4 bedroom villas in our collection epitomizes luxury and relaxation, featuring elegant interior spaces and state-of-the-art amenities. Options such as Villa Blue Tiger and Villa Blue Butterfly in Chaweng Noi, as well as Villa Sierra in Plai Laem provide spacious living areas, gourmet kitchens, and private pools. All of our guests can access high-speed internet, smart TVs, and fitness facilities, ensuring both relaxation and entertainment.<br><br>
Nestled in the island’s most ideal location, each of these villas has breathtaking views of the island’s pristine water and iconic landscape. If you’re looking to stay in the hills of Chaweng Noi or by beaches of Plai Laem, our collection of villas can cater to your needs. Guests can find easy access to Koh Samui’s famous attractions, vibrant night markets, inspiring temples, and adventurous activities.
                        </div>
                        </div>
                        
                        <div class="col-md-12 nopad top41">
                        <h2 class=" mb f30"><strong>Tailored Experiences and Exceptional Service</strong></h2>
                        <div class="col-md-12 nopad top21 f18">
                        The level of hospitality in Koh Samui is legendary, and your stay at each of 2,3,4 bedroom villas is no exception. Services include private chefs, in-villa spa treatments, and personalized day trips so that each guest can enjoy a perfectly tailored holiday experience. We take immense pride in our staff, who are always on hand to sort the details of your holiday. We can provide transfers from the airport, daily housekeeping, and anything in between.<br><br>
The design of each villa blends indoor and outdoor living, allowing guests to have a truly immersive experience on this beautiful island. The large terraces, infinity pools, and outdoor dining areas provide places to relax or gather with your travel companions. And don’t worry… you’re always able to enjoy the natural views of the island.
                        </div>
                        </div>
                        
                        
                        <div class="col-md-12 nopad top41">
                        <h2 class=" mb f30"><strong>Activities and Nearby Attractions</strong></h2>
                        <div class="col-md-12 nopad top21 f18">
                        We selected incredible villas that are situated near the island’s best attractions. There is a lot to explore 2,3,4 bedroom villas in Koh Samui, whether it is the nightlife of Chaweng Beach or the iconic Fisherman’s Village and Big Buddha. Each guest can easily find activities that match their interests. Adventurers enjoy snorkeling, diving, and jungle trekking, while those seeking relaxation can unwind on the beaches or explore the local culinary scene.<br><br>
For those seeking private sanctuaries during their stay in Koh Samui, 2,3,4 bedroom villas are perfect for you. They are each designed to blend luxury and tranquility. From the spacious layouts, modern amenities, and beautiful surroundings, all guests will enjoy a private haven of comfort. This ensures that every moment during your stay in Koh Samui is truly unforgettable.
                        </div>
                        </div>
                        
                        <div class="col-md-12 nopad top41">
                        <h2 class=" mb f30"><strong>An Idyllic Escape in Koh Samui</strong></h2>
                        <div class="col-md-12 nopad top21 f18">
                       So if you’re in need of the perfect island escape and seeking both luxury and comfort, take a look at these 2,3,4 bedroom villas in Koh Samui. The locations are stunning, the service is impeccable, and the amenities are world-class. Each villa can be your idyllic retreat to relax and rejuvenate while you experience the best that Koh Samui has to offer.
                        </div>
                        </div>
                        
						<?php
					}
					else
					{
					?>
                	 <h2 class=" mb f30"><strong><?php /*?><a class="tg cdf" ><?php */?>Discover Luxury Koh Samui Villas for rent<?php /*?></a><?php */?></strong></h2>
                    <?php
					}
					
					
					
					
					
					if($_SERVER['REQUEST_URI']=='/search-rent/thailand-koh-samui/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html' )
					{
					}
					elseif($_SERVER['REQUEST_URI']=='/search-rent/thailand-koh-samui/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html')
					{
					}
					elseif($_SERVER['REQUEST_URI']=='/search-rent/thailand-koh-samui/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html')
					{
					}
					else
					{
					?>
                    
                    <div class="col-xs-4 top20 nopad"><img data-src="/upload/slide/768/Luxury-Koh-Samui-Villas-for-rent.webp" class="lazy" width="100%" alt="Luxury Koh Samui Villas for rent"></div>
                     <div class="col-md-12 nopad top41 f18">
                        <!-----15-06-66  Koh Samui is a beautiful tropical island in the southern Gulf of Thailand. Relaxed, laid back and small, everything is easy and convenient. The type of villa holiday you go to for a week’s break to refresh & recharge in luxury. -->
                        Refresh and recharge by selecting one of our stunning Luxury Koh Samui Villas for rent. A luxury villa in Koh Samui provides the opportunity for you to experience this beautiful tropical island at its best from a base that is steeped in style and designed specifically to help you unwind. From your private chef to the housekeeping team to your villa manager, a team of professionals is always on hand to ensure that your beach or pool villa in Koh Samui is everything you’ve dreamed of and more. 

        <br><br>
                    </div>
                 <?php
					}
				}
				elseif($_REQUEST['cate']==6)
				{
						?>
                     <h2 class=" mb f30"><strong><?php /*?><a class="tg cdf" ><?php */?>Discover Beachfront Villas Koh Samui<?php /*?></a><?php */?></strong></h2>
                     <div class="col-md-12 nopad top41 f18">
                    Koh Samui is a beautiful tropical island in the southern Gulf of Thailand. Relaxed, laid back and small, everything is easy and convenient.
    The type of villa holiday on the beach you go to for a week’s break to refresh & recharge in privacy and luxury.
    <br><br>
    				Taking a trip to Koh Samui and deciding to stay at a beachfront villa is an unmatched holiday experience in Thailand. The merging of luxury, privacy, and culture results in memories that you and your fellow travelers will cherish for years to come. <a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Koh Samui Villas for rent</a> in particular is home to many elite beach front properties that provide incredible views, easy beach access, and a variety of experiences and activities that bring out the best of Koh Samui.<br><br>
The choice of a luxury Beachfront Villas Koh Samui delivers the combination of luxury and island life, all wrapped into one. All of the villas in our curated collection are designed for world travelers with high-level taste. Accommodations range from more intimate one-bedroom options, perfect for a couple on their honeymoon, all the way up to large six bedroom properties that can host an entire family gathering or friend retreat. We have a Beachfront Villas Koh Samui to match everyone’s style and needs.<br><br>
Each Beachfront Villas Koh Samui is fully equipped with modern amentinities with the aim of top-tier comfort. You can start your day with a swim in a private infinity pool, surrounded by picture perfect views of the ocean. Some of the villas provide very lush gardens, great for a meal outside in the vibrant nature of the island. In-villa spa services take the relaxation up a notch, offering various treatments such as traditional Thai massage or contemporary wellness therapies. Entertainment options are vast, with private cinemas, full gyms, and state-of-the-art sound systems. All of this can be experienced from the comfort and privacy of your very own beachfront villa in Koh Samui.
    
                </div>
				<?php
				}
				elseif($_REQUEST['cate']==5)
				{
					
				//--------large group---- 55555
				?>
					
                        
                        
                        
                     <h2 class=" mb f30"><strong><?php /*?><a class="tg cdf" ><?php */?>Discover the best Koh Samui Villas for Large Groups<?php /*?></a><?php */?></strong></h2>
                     <div class="col-md-12 nopad top41 f18">
                        <a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Koh Samui</a> is a mecca for villa holidays for good reason.<br>
                        The small island in the gulf of Thailand is a tropical paradise with a laid back atmosphere.<br>
                        And for those travelling in groups there are so many villas and settings to choose from.<br><br>
                        
                        Firstly some helpful advice.<br>
                        Many villas offer a bedroom accommodating multiple children or provide extra beds in rooms.<br>
                        This means most groups find what they are looking for in one of the <a href="/search-rent/thailand-koh-samui/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html" class="blu">5,6,7 bedroom villas in Koh Samui</a>.<br>
                        In fact medium sized groups sometimes find a <a href="/search-rent/thailand-koh-samui/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html" class="blu">2,3,4 bedroom villa</a> that fits their group size.<br>
                        The search results and villa details pages clearly show the number of guests and children accommodated in the villa.<br><br>
                        
                        The villa choices are incredible.<br>
                        Maybe you are looking for a  <a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html" class="blu">Beachfront Villas Koh Samui</a> or a villa in the hills with panoramic views all around.<br>
                        Or it could be your group needs more than one villa and would like them directly next to each other to create a private complex.<br>
                        
                        It could even be that you need support to organise your <a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/wedding-villas/all-sort.html" class="blu">Koh Samui Villa Wedding</a>.<br>
Or maybe you haven’t decided where to celebrate yet and require advice on how to choose between here and a<a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/wedding-villas/all-sort.html" class="blu">wedding villas Phuket</a>.<br>

                        Whatever the requirements trust us to provide a professional and complete concierge service to find the right villa for you.<br>
                        We know all the villas, settings, facilities and staff and will know immediately which villas will suit your group best. <br><br>
                        <?php /*?>Our expertise also applies to all the villas in <a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Phuket </a>  <?php */?>
                </div>
				<?php
				}
				?>
                
               <?php 
				if( $_REQUEST['cate']!=8 && $_REQUEST['cate']!=5)
				{
				?>
                <?php /*?><div class="col-md-12 nopad top4-1"><?php */?>
                <?php /*?><h4 class=" mb f30 top"><strong><a class="tg cdf" >Koh Samui villa rentals</a></strong></h4><?php */?>
                    <?php /*?><div class="col-md-12 nopad top21 f18">
                        There is a <a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">wide range of luxury villas for rent in Koh Samui</a> and a wide range of pricing too. Even if a villa is large with eight bedrooms they will let you use less bedrooms and pay less per night. But you still get the use of the entire private villa and all its amenities.<br>
    Prices vary between seasons and are highest over the peak season of Christmas and New year.
    
                    </div>
                </div><?php */?>
                <?php
				}
				?>
                
                 <?php
                if($_REQUEST['room']=='all')
				{
					if($_REQUEST['cate']==6)
					{?>
                    
                    	<div class="col-md-12 nopad top41">
                        <h3 class=" mb f30 top"><strong>Beachfront Villas Koh Samui By Bedroom Numbers</strong></h3>
                            <div class="col-md-12 nopad top21 f18">
                                To help you find the best Beachfront Villas Koh Samui for your group as quickly as possible here are the links to the villas that open these number of bedrooms. <br>
And they are right on the beach, just steps from the pool to white sand and clear blue sea.<br>
There are all villa sizes to accommodate a small family up to an extended group.
                            </div>
                        </div>
                        
                        
                        <div   class="col-md-12 nopad top21">
                        <h4 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?><a href="/search-rent/thailand-koh-samui/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html" class="blu"><span >2,3,4 Bedroom Villas on Samui</span></a><?php /*?></a><?php */?></strong></h4>
                            <div class="col-md-12 nopad top21 f18">
                                Perfect for couples, families and small groups, and all with great amenities.
                            </div>
                        </div>
                        
                        <div   class="col-md-12 nopad top21">
                        <h4 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?><a href="/search-rent/thailand-koh-samui/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html" class="blu"><span >5,6,7 Bedroom Villas</span></a><?php /*?></a><?php */?></strong></h4>
                            <div class="col-md-12 nopad top21 f18">
                                The most available size of beach villa with incredible spaces and grounds for everybody to enjoy their vacation.
                            </div>
                        </div>
                        
                        <div   class="col-md-12 nopad top21">
                        <h4 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?><a href="/search-rent/thailand-koh-samui/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html" class="blu"><span >8,9,10 Bedroom Villas</span></a><?php /*?></a><?php */?></strong></h4>
                            <div class="col-md-12 nopad top21 f18">
                                For larger groups that want their very own tropical villa estate to enjoy their time away.
                            </div>
                        </div>
                        
                         <?php /*?><div   class="col-md-12 nopad top21">
                        <h4 class=" mb f22 top"><strong><a class="tg cdf" ><a href="/search-rent/thailand-koh-samui/all-beach/all-price/1-4-bedrooms/beachfront-villas/all-sort.html" class="blu"><span >2,3,4 Bedroom Beachfront Villas</span></a></a></strong></h4>
                            <div class="col-md-12 nopad top21 f18">
                                Perfect for couples, families and small groups, and all with great amenities.
                            </div>
                        </div>
                        
                        <div   class="col-md-12 nopad top21">
                        <h4 class=" mb f22 top"><strong><a class="tg cdf" ><a href="/search-rent/thailand-koh-samui/all-beach/all-price/5-7-bedrooms/beachfront-villas/all-sort.html" class="blu"><span >5,6,7 Bedroom Beachfront Villas</span></a></a></strong></h4>
                            <div class="col-md-12 nopad top21 f18">
                                The most available size of beach villa with incredible spaces and grounds for everybody to enjoy their vacation.
                            </div>
                        </div>
                        
                        <div   class="col-md-12 nopad top21">
                        <h4 class=" mb f22 top"><strong><a class="tg cdf" ><a href="/search-rent/thailand-koh-samui/all-beach/all-price/8-10-bedrooms/beachfront-villas/all-sort.html" class="blu"><span >8,9,10 Bedroom Beachfront Villas</span></a></a></strong></h4>
                            <div class="col-md-12 nopad top21 f18">
                                For larger groups that want their very own tropical villa estate to enjoy their time away.
                            </div>
                        </div><?php */?>
                        
                        
                        <div class="col-md-12 nopad top41">
                        <h4 class=" mb f30 top"><strong><?php /*?><a class="tg cdf" ><?php */?>What is included in your villa<?php /*?></a><?php */?></strong></h4>
                            <div class="col-md-12 nopad top21 f18">
                                When you rent a private Beachfront Villas Koh Samui it’s your personal accommodation. All the villas are staffed with a villa manager, housekeeping, and nearly all include a full time chef. All have facilities such as cinema, games and fitness rooms.<br>
                                And their private pools of course.<br><br>
            
            
            All you need to do is pay for your groceries should you wish the chef to cook meals for you. But dont worry, you wont need to go shopping, that will happen whilst you are lying beside the pool. Daily breakfast is often included.
            
                            </div>
                        </div>
                <?php
					}
					else
					{
						if($_REQUEST['cate']!=8 && $_REQUEST['cate']!=5)
						{
						?>
                        	<div class="col-md-12 nopad top21">
                            	<div class=" mb f30 top"><strong>The benefits of Koh Samui villa rental</strong></div>
                                <div class="col-md-12 nopad top21 f18">
                                   Renting a Luxury Koh Samui Villas for rent is a different way to experience the island. Instead of hotel-style service, you will have the opportunity to enjoy other features which include an on-site villa manager, in-house chef, private pools, fitness centres, games rooms and more. Villas in Samui are designed to provide the ultimate privacy for you and your travel companions. Whether you are seeking the perfect wedding villa, a sea view escape from the realities of the world or something that’s only a short walk to a stunning beach, Inspiring Villas has the right property for you.
                                </div>
                            </div>
                            
                            <div class="col-md-12 nopad top21">
                            	<div class=" mb f30 top"><strong>Find ideal villa rentals in Koh Samui</strong></div>
                                <div class="col-md-12 nopad top21 f18">
                                   Whether it’s the most beautiful beachfront villa, a tropical garden luxury villa or a Koh Samui Villas for rent that is perfect for larger groups, you will find all you need with Inspiring Villas. Browse our collection and book your own private oasis today.
                                </div>
                            </div>
                            
                        	<div class="col-md-12 nopad top21">
                            	<h3 class=" mb f30 top"><strong>What a Koh Samui Luxury Villas includes</strong></h3>
                                <div class="col-md-12 nopad top21 f18">
                                   When the words “villas” and “Koh Samui” are spoken, it conjures extravagant images of private infinity pools, lush tropical gardens, unspoilt beaches and more, and this is exactly what you should expect when you rent a villa in Koh Samui with Inspiring Villas. Each property is handpicked to deliver some of the most exceptional experiences that Thailand has to offer in a stylish and elegant setting. 
<br><br>
Each villa on our list comes with a team of staff and a few key elements that are designed to create a once-in-a-lifetime experience. Your Koh Samui luxury villas will come with its own private pool and fitness area with a games and cinema room so that even on rainy days, you still have the opportunity to make the most of your time on the island. 
                                </div>
                            </div>
                            
                            
                            <div class="col-md-12 nopad top21">
                            	<h3 class=" mb f30 top"><strong>Find the ultimate Koh Samui Luxury Villas with Inspiring Villas today</strong></h3>
                                <div class="col-md-12 nopad top21 f18">
                                   With the help of our dedicated concierge team, Inspiring Villas can find the perfect Samui villa rental for you. With your group’s profile, we will match the space and location to the ideal villa. Our Samui villa rental team knows the ins and outs of every property on our list, so rather than using your valuable time to search for the right beach villa in Koh Samui, we will take care of the research for you. All you need to do is show up.
                                </div>
                            </div>
                            <?php /*?><div class="col-md-12 nopad top41">
                            	<h4 class=" mb f30 top"><strong>---What is included in your villa</strong></h4> 
                                <div class="col-md-12 nopad top21 f18">
                                   --When you rent a private villa it’s your personal accommodation for that period of time. All the villas are staffed with a villa manager, housekeeping, and nearly all include a full time chef. All have facilities such as cinema, games and fitness rooms.<br>
And their private pools of course.<br><br>

All you need to do is pay for your groceries should you wish the chef to cook meals for you. But dont worry, you wont need to go shopping, that will happen whilst you are lying beside the pool. Daily breakfast is often included.
                
                                </div>
                            </div><?php */?>
						<?php
						}
					}
				}
				else
				{
					if($_SERVER['REQUEST_URI']=='/search-rent/thailand-koh-samui/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html')
					{
					}
					elseif($_SERVER['REQUEST_URI']=='/search-rent/thailand-koh-samui/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html')
					{
					}
					else
					{
						
					
					?><div class="col-md-12 nopad  f18">
                        Inspiring Villas has curated an incredible collection of large villas for rent, full of 5,6, and 7 bedroom villas in Koh Samui luxury properties. All of the 5,6,7 bedroom villas available represent both luxury and exclusivity, catering to the elite traveler’s needs and expectations. Often located with great views of the ocean, each villa is unique. From the vast living areas, private sanctuaries, sophisticated decor, state-of-the-art facilities, and seamless indoor-outdoor living spaces, you can experience comfortable living that highlights the natural beauty of Koh Samui.<br><br>
The design of 5,6,7 bedroom villas seamlessly blends traditional Thai elements with contemporary global luxury, creating a unique ambiance for each guest. High ceilings, open-plan layouts, and floor-to-ceiling windows create an unrivaled ambiance featuring natural light and unobstructed views. The interiors of each villa are decorated with bespoke furniture, tasteful artwork, and premium materials. This is how we offer a refined aesthetic that is harmonious with the natural tropical locations.
                        <br><br><br>
                    </div>
                    
                    <div class="col-md-12 nopad  "><h3 class=" mb f30 top top41"><strong>Bespoke Amenities for Discerning Guests</strong></h3></div>
                    <div class="col-md-12 nopad top41 f18">
                        Luxury travel means personalized services and experiences, something that we are well experienced in delivering. All guests of the 5,6,7 bedroom villas can access the array of amenities that include gourmet kitchens, private cinemas, state-of-the-art gyms, and spa-like bathrooms. Equally as stunning as the indoor space, is the outdoor space at each villa. Outdoor areas include infinity pools, terraces, and gardens for your enjoyment. These spaces ensure that your villa transforms into an oasis for personal relaxation and group entertainment.
                        <br><br><br>
                    </div>
                    
                    <div class="col-md-12 nopad  "><h3 class=" mb f30 top top41"><strong>Ultimate Privacy and Exclusivity</strong></h3></div>
                    <div class="col-md-12 nopad top41 f18">
                        Privacy is so important when staying in a villa in Thailand, and all of 5,6,7 bedroom villas in Koh Samui properties deliver total privacy. The secluded gardens, private beach access, and gate entrances ensure a discreet and exclusive experience in Koh Samui. If your goal is to escape the daily grind and busyness of the world, immerse yourself in these picturesque and private worlds of luxury.<br><br>
                        
Entertainment and leisure activities are always in reach at these <a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Koh Samui Villas for rent</a>. The island is full of a range of activities that cater to all desires, and these villas put you close to everything you might be seeking. From private tennis courts and beach volleyball to snorkeling and kayaking, there is something to satisfy every interest. The location of each 5,6,7 bedroom villas provides easy access to Koh Samui’s best golf courses, marinas, and cultural attractions, ensuring a fulfilling and diverse holiday.
<br><br>
Personalization is at the heart of luxury, as you want to get the perfect experience catered to you. The personalized services at these villas include private chefs, butlers, and concierge services. Guests enjoy access to culinary experiences designed to your taste buds, adventures planned to suit your preferences, and exclusive access to Koh Samui’s best-kept secrets. All of these services aim to deliver a hassle-free dream holiday, so you can enjoy your time relaxing instead of stressing about plans.<br><br>

In conclusion, Koh Samui’s 5, 6, and 7 bedroom villas are available to provide the ideal choice to discerning travelers. If you’re seeking a luxury unforgettable island holiday, there is a villa with your name on it. From the stunning locations and bespoke amenities, to the personalized services and welcoming living spaces, each villa in this collection sets new standards for luxury accommodations in Koh Samui Thailand.

                        <br><br>
                    </div>
                    
						<div class="col-md-12 nopad top41">
                            <h4 class=" mb f30 top"><strong>What is included in your 5,6,7 Bedroom Villas in Koh Samui holiday</strong></h4>
                                <div class="col-md-12 nopad top21 f18">
                                   When you rent a private 5,6,7 bedroom villas in Koh Samui it’s your personal accommodation for that period of time. All the villas are staffed with a villa manager, housekeeping, and nearly all include a full time chef. All have facilities such as cinema, games and fitness rooms.<br>
And their private pools of course.<br><br>

All you need to do is pay for your groceries should you wish the chef to cook meals for you. But dont worry, you wont need to go shopping, that will happen whilst you are lying beside the pool. Daily breakfast is often included.
                
                                </div>
                            </div>
                            
                            <!--<div class="col-md-12 nopad  f18">
                       
                        <br><br><br>
                    </div>-->
                    
						<?php	
					}
					
				}?>
                <?php
                if($_REQUEST['room']=='all')
				{
					if($_REQUEST['cate']!=6 && $_REQUEST['cate']!=8 && $_REQUEST['cate']!=5)
					{
						?>
						<div class="col-md-12 nopad top41">
						<h4 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?>Villas with full-time chef <?php /*?></a><?php */?></strong></h4>
							<div class="col-md-12 nopad top21 f18">
								One of the biggest attractions of renting your own villa is the level of service and attention.<br>
								There will be a villa manager to tend to your every need.<br>
								Shopping, transportation, excursion or restaurant bookings. They are your personal concierge.<br>
								Then there is the housekeeping staff and your personal full-time chef in most villas.Daily breakfast is usually included, if you want to have a barbecue or luncheon at the villa then all you have to do is ask them to make the arrangements.
							</div>
						</div>
				<?php
					}
				}
				?>
                <?php 
				if($_REQUEST['cate']!=6 && $_REQUEST['cate']!=8 && $_REQUEST['cate']!=5)
				{
					
				?>
                <div class="col-md-12 nopad top41">
                <h4 class=" mb f30 top"><strong><?php /*?><a class="tg cdf" ><?php */?>Luxury Koh Samui Villas for rent<?php /*?></a><?php */?></strong></h4> <?php /*?>Luxury villa rentals Koh Samui<?php */?>
                    <div class="col-md-12 nopad top21 f18">
                        There are a range of villas to rent in Koh Samui which are able to serve groups of different sizes<br><br>
                        
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                <h4 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?>2,3,4 bedroom villas Koh Samui<?php /*?></a><?php */?></strong></h4>
                    <div class="col-md-12 nopad top21 f18">
                        There is a great range of mid sized villa rentals for your Koh Samui holiday in the <a class="blu" href="/search-rent/thailand-koh-samui/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html">2,3,4 bedrooms villas in Koh Samui</a>.
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                <h4 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?><a class="blu" href="/search-rent/thailand-koh-samui/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html">5,6,7 bedrooms villas in Koh Samui</a><?php /*?></a><?php */?></strong></h4>
                    <div class="col-md-12 nopad top21 f18">
                        These villas offer the largest flexibility in group numbers. Sleeping up to 14 adults and children but allowing you to pay less and use less bedrooms too. So a smaller group can get a great villa to hang out in at a much reduced price.<br>
    Most have cinema room, games and fitness room as well as other amenities.
    
                    </div>
                </div>
                
                <div class="col-md-12 nopad top41">
                <h4 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?><a class="blu" href="/search-rent/thailand-koh-samui/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html">8,9,10 > bedrooms villas in Koh Samui</a><?php /*?></a><?php */?></strong></h4>
                    <div class="col-md-12 nopad top21 f18">
                        Finally there are the large group luxury villas with expansive space and amenities.<br>
    These 8,9,10 > bedroom villas offer huge space with many different indoor and outdoor areas for extended groups
    
                    </div>
                </div>
                <?php }else{}?>
               <?php
			   if($_REQUEST['cate']==6)
			   {
				   ?> 
                   <div class="col-md-12 nopad top41">
                    <h4 class=" mb f30 top"><strong><?php /*?><a class="tg cdf" ><?php */?>What type of Beachfront Villas Koh Samui are available for rent?<?php /*?></a><?php */?></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                        There is such a range of villa sizes, types and locations that you are spoilt for choice for your villa holiday here. By using our search you can sort the villas by BEACHFRONT and browse through the large selection of villa rentals on Koh Samui. There is a whole range of villas and pricing. Some sit on the most quiet parts of a beach making for a private holiday experience. Others are set up for socialising with pool bars and outdoor cinema screens. One main difference in Koh Samui is if the beach is swimmable or not as parts of the island are tidal and rocky.
                        </div>
                    </div>
                    
				   <div class="col-md-12 nopad top41">
                    <h4 class=" mb f30 top"><strong><?php /*?><a class="tg cdf" ><?php */?>Beach Villas on the best swimming beaches<?php /*?></a><?php */?></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                            <a href="/search-rent/thailand-koh-samui/maenam-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Maenam</a>, 
                            <a href="/search-rent/thailand-koh-samui/bophut-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Bophut</a> and 
                            <a href="/search-rent/thailand-koh-samui/lipa-noi-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Lipa Noi</a> are the best swimming beaches on the island. If you are looking to walk onto the beach into a calm and safe sea then there are a range of different villas on these beaches to choose from.<br>
                        </div>
                    </div>
                    
                    <div class="col-md-12 nopad top41">
                    <h4 class=" mb f30 top"><strong><?php /*?><a class="tg cdf" ><?php */?>Koh Samui Beachfront Villas on secluded beaches (non-swimmable)<?php /*?></a><?php */?></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
    With fabulous views across to the islands of the marine park <a href="/search-rent/thailand-koh-samui/laem-sor-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Laem Sor</a> and <a href="/search-rent/thailand-koh-samui/taling-ngam-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Taling Ngam</a> offer the most secluded locations in Koh Samui with villas on the beach.<br>
    If you would like to view all the beaches with villas directly onto the sand then scroll down to see the complete list. Or maybe you are still choosing your location and would like to view all <a href="/search-rent/thailand/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html" class="blu">Beachfront Villas</a>.
                        </div>
                    </div>
				<?php
			   }
			   ?>
                 <?php 
				if($_REQUEST['cate']==6)
				{
				?>
                <?php /*?><div class="col-md-12 nopad top41">
                <h4 class=" mb f30 top"><strong><a class="tg cdf" >Where can I find the best beachfront villas in Koh Samui</a></strong></h4>
                    <div class="col-md-12 nopad top21 f18">
                        Right here is the answer. We represent all the very best villas and other agents have to rent them through us<br>
						so if you would like to rent a private beach villa direct from the owner then Inspiring Villas is the place to do this. 
                    </div>
                </div><?php */?>
				<?php 
				}else{}
				?>
                <?php 
				if($_REQUEST['room']=='all' && $_REQUEST['cate']==0)
				{
				?>
                	<?php /*?><div class="col-md-12 nopad top41">
                        <h4 class=" mb f30 top"><strong><a class="tg cdf" >What type of villas are available for rent on Koh Samui?</a></strong></h4> <?php /*?>What type of luxury villas are available for rent on Koh Samui?<?php *-/?>
                        <div class="col-md-12 nopad top21 f18">
                       	1.Beachfront Villas in Koh Samui offer the sand between your toes and the feeling you need go nowhere else. Kayaks on the beach, sunset swims, beach restaurants just a walk away. There are exquisite <a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html" class="blu">beach villas in koh samui</a> and even some with private beaches.<br><br>

2.In the hills above are many beautiful private villas. Villas that offer privacy and panoramic views of the Gulf of Thailand. There are many <a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">seaview villas in Koh Samui</a> as most beaches on the island have hilltops behind them.
                        </div>
                    </div><?php */?>
                <?php 
				}else{}
				?>
                 <?php 
				if($_REQUEST['room']!='all' && $_REQUEST['cate']==0)
				{
				?>
                    <div class="col-md-12 nopad top41">
                        <h4 class=" mb f30 top"><strong><?php /*?><a class="tg cdf" ><?php */?>What type of luxury villas are available for rent on Koh Samui?<?php /*?></a><?php */?></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                       	1.Beachfront Villas offer the sand between your toes and the feeling you need go nowhere else. Kayaks on the beach, sunset swims, beach restaurants just a walk away. There are exquisite <a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html" class="blu">Beachfront villas Koh Samui</a> and even some with private beaches.
                        
                       <?php /*?> <a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html" class="blu">Beachfront Villas in Koh Samui</a> offer the sand between your toes and the feeling you need go nowhere else. Kayaks on the beach, sunset swims, beach restaurants just a walk away. There are exquisite Koh Samui villas on the beach and even some with private beaches.<?php */?><br><br>

2.In the hills above are many beautiful private villas. Villas that offer privacy and panoramic views of the Gulf of Thailand. There are many <a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/seaview-villas/all-sort.html" class="blu">Koh Samui Seaview Villas</a> as most beaches on the island have hilltops behind them.
                        </div>
                    </div>
                    
                    <div class="col-md-12 nopad top41">
                        <h4 class=" mb f30 top"><strong><?php /*?><a class="tg cdf" ><?php */?>FAQ<?php /*?></a><?php */?></strong></h4>
                    </div>
                    
                    <div class="col-md-12 nopad top41">
                        <h4 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?>1.How are children accommodated<?php /*?></a><?php */?></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                       	Private villas are prefect for children. More space to run around and specific areas of the villa for them to hang out. Most villas have games and cinema rooms and of course every one of the villas has its own private pool. Dependent on ages children can be accommodated in adult’s rooms or many villas also have multiple beds in one room for the kids.
                        </div>
                    </div>
                    
                    <div class="col-md-12 nopad top41">
                        <h4 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?>2.Can you organise my <a href="/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/wedding-villas/all-sort.html" class="blu">Wedding Villas Koh Samui</a><?php /*?></a><?php */?></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                       	Yes of course, small or large weddings can be organized in these luxury villas. We can liaise with wedding villa planners on Koh Samui and help organize your big day.
                        </div>
                    </div>
                    
                    
                    <div class="col-md-12 nopad top41">
                        <h4 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?>3.How do I book<?php /*?></a><?php */?></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                       	All our inquiries through the website go direct to the Owner. Once you make an inquiry our concierge service will contact you to work through your plans and provide a full range of villa options available. When you decide which villa, the Owner will hold the villa for a period of time to receive a deposit.
                        </div>
                    </div>
                <?php 
				}else{}
				
				if($_REQUEST['cate']!=8 && $_REQUEST['cate']!=5 )
				{
					if($_SERVER['REQUEST_URI']=='/search-rent/thailand-koh-samui/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html' )
					{
					}
					elseif($_SERVER['REQUEST_URI']=='/search-rent/thailand-koh-samui/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html')
					{
					}
					elseif($_SERVER['REQUEST_URI']=='/search-rent/thailand-koh-samui/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html')
					{
					}
					else
					{
						?>
						<div class="col-md-12 nopad top41">
						<h4 class=" mb f30 top"><strong>How to get to Koh Samui</strong></h4>
							<div class="col-md-12 nopad top21 f18">
								There is one airport on the island.Known as one of the coolest airports in the world, with open air boarding gates and trolley buses that take you to your plane. International flights arrive from China, Hong Kong, Singapore and Kuala Lumpur. Domestic flights arrive daily from Bangkok where international flights connect.
			
							</div>
						</div>
					   
						<div class="col-md-12 nopad top41">
						<h4 class=" mb f30 top"><strong>When to go to Koh Samui</strong></h4>
							<div class="col-md-12 nopad top21 f18">
								Peak season is Christmas and New Year followed by dry season through to end of April. Monsoon rains come in June, October and November.
						  </div>
						</div>
						<?php
					}
				}
				?>
                
                <?php 
			if($_REQUEST['cate']!=6)
			{
				/*if($_REQUEST['room']=='all')
				{
				}*/
            }
			else
			{
            ?>
            
                
                 <div class="col-md-12 nopad top41">
                    <h4 class=" mb f30 top"><strong><?php /*?><a class="tg cdf" ><?php */?><?php echo $this_year;?> Koh Samui Beach Villa Cost Survey<?php /*?></a><?php */?></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                            Beachfront Villas Koh Samui generally demand a higher rental value than hilltop seaview and garden villas.<br>
                            They offer the benefit of the sand just meters away from the pool and villa garden.<br>
                            There are many villas available directly on the beach in Koh Samui so they are the most affordable beachfront option in this beautiful country.<br>
                            The average rental value of a room in a Koh Samui beachfront villa in <?php echo $last_year;?> was USD$314++ per room per night.<br>
                            That calculates as USD$157++ per person per night on average.<br>
                            For our many Australian guests this equates to AUD$218++ as of December <?php echo $last_year;?>.<br>
                            Tax ++ in Thailand is 17.7% 
                      </div>
                    </div>
                    
                    
            <div class="col-md-12 nopad top41">
            <h4 class=" mb f30 top"><strong><?php /*?><a class="tg cdf" ><?php */?>FAQs<?php /*?></a><?php */?></strong></h4>
            </div>
    
            <div class="col-md-12 nopad top41">
            <h4 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?>1. How are children accommodated<?php /*?></a><?php */?></strong></h4>
                <div class="col-md-12 nopad top21 f18">
                    Beach villas are prefect for children. More space to run around, able to go directly from the pool to the white sandy beach. The beach can be their very own playground. And most villas will have watersports equipment like kayaks, aswell as games and cinema rooms. Dependent on ages children can be accommodated in adult’s rooms or many villas also have multiple beds in one room for the kids.
                </div>
            </div>
            
            <div class="col-md-12 nopad top41">
            <h4 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?>2. What time is check-in and check-out<?php /*?></a><?php */?></strong></h4>
                <div class="col-md-12 nopad top21 f18">
                    Private villas work similarly to hotels so the check-in is usually in the afternoon and check-out is by midday. Each villa is different so please ask us.
                </div>
            </div>
            
            <div class="col-md-12 nopad top41">
            <h4 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?>3. How do I book<?php /*?></a><?php */?></strong></h4>
                <div class="col-md-12 nopad top21 f18">
                    All our inquiries through the website go direct to the Owner. Once you make an inquiry our concierge service will contact you to work through your plans and provide a full range of villa options available.
                </div>
            </div>
            <?php
            }?>
        	
            <?php if($_REQUEST['cate']!=8 && $_REQUEST['cate']!=5)
			{
				if($_SERVER['REQUEST_URI']=='/search-rent/thailand-koh-samui/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html' )
				{
				}
				elseif($_SERVER['REQUEST_URI']=='/search-rent/thailand-koh-samui/all-beach/all-price/1-4-bedrooms/all-collections/all-sort.html')
				{
				}
				elseif($_SERVER['REQUEST_URI']=='/search-rent/thailand-koh-samui/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html')
				{
				}
				else
				{	
			?>
                <div class="col-md-12 nopad top41">
                <h4 class=" mb f30 top"><strong><?php /*?><a class="tg cdf" ><?php */?>What to do in Koh Samui<?php /*?></a><?php */?></strong></h4>
                    <div class="col-md-12 nopad top21 f18">
                        The laid-back vibe on this small island makes it very easy just to relax at your villa and maybe pop out for one or two meals and massages. That’s what the villas are set up for too, in incredible locations and with all the facilities you could desire. If you do want to venture out there are several picturesque spots to visit on the island like the deserted beaches in the south, Laem Sor & Taling Ngam are the best. If you want to get out on the water then there are excursions to Angthong Marine park, an archipelago of 42 incredible islands.<br>
                    </div>
                </div>
             <?php   
				}
            }
			?>    
                <?php
				if($_SERVER['REQUEST_URI']=='/search-rent/thailand-koh-samui/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html')
				{
					?>
                    
                    <?php /*?><h4 class=" mb f30 top"><strong><a class="tg cdf" >Discover the Best 5,6,7 Bedroom Villas in Koh Samui</a></strong></h4>
                    <div class="col-md-12 nopad top41">
                        <table class="table table-bordered table-striped ttb" width="100%%" border="1">
                            <thead>
                                <tr>
                                    <th>Koh Samui Location</th>
                                    <th>Price From</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/bophut-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Bophut <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$300</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/chaweng-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Chaweng Noi <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$450</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/maenam-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Maenam <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$850</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/lipa-noi-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Lipa Noi <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$700</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/lamai-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Lamai <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$600</td>
                                </tr>
                                
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/laem-sor-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Laem Sor <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$1,000</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/taling-ngam-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Taling Ngam <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$405</td>
                                </tr>
                            </tbody>
                        </table>
                    </div><?php */?>
        
				<?php
				}
				elseif($_SERVER['REQUEST_URI']=='/search-rent/thailand-koh-samui/all-beach/all-price/8-10-bedrooms/all-collections/all-sort.html')
				{
					?>
                    <?php /*?><h4 class=" mb f30 top"><strong><a class="tg cdf" >Popular 8,9,10> bedroom Villa locations in Koh Samui</a></strong></h4>
                    <div class="col-md-12 nopad top41">
                        <table class="table table-bordered table-striped ttb" width="100%%" border="1">
                            <thead>
                                <tr>
                                    <th>Koh Samui Location</th>
                                    <th>Price From</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/bophut-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Bophut <?php echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$1,350</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/maenam-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Maenam <?php echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$600</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/lipa-noi-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Lipa Noi <?php echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$1,300</td>
                                </tr>
                                
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/laem-sor-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Laem Sor <?php echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$1,000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div><?php */?>
					<?php /*?><div class="col-md-12 nopad top41">
                    <h4 class=" mb f30 top"><strong><a class="tg cdf" >Most Popular 8,9,10> Bedroom Villas in Koh Samui</a></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                           
                        </div>
                    </div>
                     
                    <div   class="col-md-12 nopad top21">
                    <h4 class=" mb f22 top"><strong><a class="tg cdf" >1. <a href="/luxury-villas/baan-kilee/lipa-noi-beach-koh-samui-thailand.html" class="blu"><span >Baan Kilee</span></a> <span class="tg">in Lipa Noi</span></a></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                            This villa has an expansive beach frontage and garden, just steps away from the calm swimming waters of Lipa Noi.<br>
With shalas around the pool and outdoor cinema screen it’s made for spending great days enjoying the outside amenities and beach.

                        </div>
                    </div>
                    
                    <div   class="col-md-12 nopad top21">
                    <h4 class=" mb f22 top"><strong><a class="tg cdf" >2. <a href="/luxury-villas/ban-sairee/laem-sor-beach-koh-samui-thailand.html" class="blu"><span >Ban Sairee</span></a> <span class="tg">in Laem Sor</span></a></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                            With it’s own private beach and beautifully landscaped lawns and gardens this villa makes for the ultimate private group holiday.
Sleeps up to 14 adults and 4 children.
                        </div>
                    </div>
                    
                    <div   class="col-md-12 nopad top21">
                    <h4 class=" mb f22 top"><strong><a class="tg cdf" >3. <a href="/luxury-villas/baan-hinta-baan-hinyai/lamai-beach-koh-samui-thailand.html" class="blu"><span >Baan Hinta & Hinyai</span></a> <span class="tg">in Lamai</span></a></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                            These two luxury beachfront villas in Lamai offer ten bedrooms sleeping up to 20.Ideal for large groups, families and retreats.
                        </div>
                    </div>
                    
                    <div   class="col-md-12 nopad top21">
                    <h4 class=" mb f22 top"><strong><a class="tg cdf" >4. <a href="/luxury-villas/sangsuri-estate-c/bophut-beach-koh-samui-thailand.html" class="blu"><span >Sangsuri Estate Villas</span></a> <span class="tg">in Bophut</span></a></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                            Combine 3 of the best beachfront villas on Koh Samui to accommodate your entire group in luxury and stunning surroundings.<br>
Enjoy incredible facilities and and 5 star service. Sleeps up to 42 adults and 24 children.

                        </div>
                    </div>
                    
                    <div   class="col-md-12 nopad top21">
                    <h4 class=" mb f22 top"><strong><a class="tg cdf" >5. <a href="/luxury-villas/villa-miskawaan/maenam-beach-koh-samui-thailand.html" class="blu"><span >Miskawaan The Residences</span></a> <span class="tg">in Maenam</span></a></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                            With 14 bedrooms these new villas are perfect for large groups, sleeping up to 28 adults and 12 children. <br>
The attention to detail & service is always great here. And you are on the best swimming, sandy beach on Koh Samui.

                        </div>
                    </div><?php */?>
				<?php
				}
				?>
                <?php 
				if($_REQUEST['room']=='all')
				{
				?>
                <?php 
				if($_REQUEST['cate']!=6 && $_REQUEST['cate']!=8 && $_REQUEST['cate']!=5)
				{
				?>
               	<?php /*?><div class="col-md-12 nopad top41">
                <h4 class=" mb f30 top"><strong><a class="tg cdf" >How can i find the best Koh Samui villas</a></strong></h4> <?php /*?>How can i find the best Koh Samui luxury villas<?php *-/?>
                    <div class="col-md-12 nopad top21 f18">
                    	We have every luxury villa in Koh Samui available.<br>
                        All you have to do is find which holiday villa suits you best.<br>
                        What would you like?<br>
                        Villa on the beach, in the hills, how many bedrooms, what amenities. <br>
                        We have all the villas for rent in Koh Samui to choose from.<br>
                        
                    </div>
                </div><?php */?>
                <?php
                  }else{}
				?>
                <?php 
				if($_REQUEST['cate']!=6 && $_REQUEST['cate']!=8 && $_REQUEST['cate']!=5 && $_REQUEST['room']=='all')
				{
				?>
                
                <div class="col-md-12 nopad top41">
                    <h4 class=" mb f30 top"><strong><?php /*?><a class="tg cdf" ><?php */?>How do I book a villa in Koh Samui<?php /*?></a><?php */?></strong></h4> <?php /*?>How do I book a luxury villa in Koh Samui<?php */?>
                        <div class="col-md-12 nopad top21 f18">
                           Koh Samui Villas for rent the easiest way is to let us find the choice for you.<br>
                            This way you don’t have to look endlessly but just rely on our dedicated concierge staff to present you the best villas available. <br>
                            All we need to know is your group profile, villa location preference, requests and your budget range.<br>
                            We will provide a list of the best luxury villa rentals that match and are available.<br><br>
                            
                            Once a decision is made we can secure the villa by placing it on hold for you to give you time to transfer a deposit.<br>
                            It’s that simple.<br>
                            Balance is due later and concierge staff will contact you prior about arrival and support services.<br><br>
                            
                            So whats all the buzz about villa holidays in Koh Samui<br><br>
                            
                            They really are quite cool.<br>
                            The first thing to know is you can match the villa with exactly what you are looking for.<br>
                            There are so many luxury villa rentals available that you are sure to be able to find what you need.<br>
                            Whether that's lots of space and amenities for the kids.<br>
                            A private villa on it’s own beach.<br>
                            A villa with an emphasis on entertaining for a celebration.<br>
                            Whatever you are looking for its sure to be possible.<br>
                            The time you spend here is rather special.<br>
                            The luxury villa offers everything you would expect of a resort. All facilities and more, such as modern cinema rooms and wine cellar selections.<br>
                            All villas are fully staffed and so the level of service is personal and attentive. Making the stay quite remarkable.
                            
                        </div>
                    </div>
                    
                    
                    <div class="col-md-12 nopad top41">
                    <h4 class=" mb f30 top"><strong><?php /*?><a class="tg cdf" ><?php */?><?php echo $this_year;?> Koh Samui Villas for rent Cost Survey<?php /*?></a><?php */?></strong></h4> <?php /*?>2018/ 2019 Koh Samui Luxury Villa Cost Survey
<?php */?>
                        <div class="col-md-12 nopad top21 f18">
                           Using our rental data we are publishing the average rental values of <?php echo $last_year;?>.<br>
                            Costs change based on the villa setting, facilities, time of year, group size, number of nights and any booking window opportunities.<br>
                            This serves as the most accurate guide to the current average luxury villa rental cost.<br>
                            Koh Samui, although less popular than <a href="/search-rent/thailand-phuket/all-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Phuket holiday villas</a>, offers many more luxury villa rentals to select from.<br>
                            As a result it is more competitive in pricing over the year.<br>
                            With the weather and attractions making it less attractive as a year round destination price variance between high and low season can be great.<br>
                            The average cost of renting a villa in <?php echo $last_year;?> in Koh Samui was USD$190++ per room per night<br>
                            Being $95++ per person per night.<br>
                            In Australian dollars this would be AUD$132++ as of December <?php echo $last_year;?>.<br>
                            Tax ++ in Thailand is 17.7%
                        </div>
                    </div>
                    
                    
                    <div class="col-md-12 nopad top41">
                    <h4 class=" mb f30 top"><strong><?php /*?><a class="tg cdf" ><?php */?>FAQs<?php /*?></a><?php */?></strong></h4>
                    </div>
                    
                    <div class="col-md-12 nopad top41">
                    <h4 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?>1. Is there a minimum booking period?<?php /*?></a><?php */?></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                            The vast majority of villas in our portfolio will require a minimum length of stay.  Usually, this is 3 nights for most of the year, except for high season where it can go up to 5 to 7 days, and even up to 10 nights in peak season.  We list the specific details for each of the villas.
                        </div>
                    </div>
                    
                    <div class="col-md-12 nopad top41">
                    <h4 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?>2. At what time can we check-in and check-out?<?php /*?></a><?php */?></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                           Most privately owned villas adopt similar rules as the hotel industry.  The check-in is usually at some point mid-afternoon, and the check-out time is between 11-12am.  This is different for each of our villas, so please ask for specific details.
                        </div>
                    </div>
                    
                    <div class="col-md-12 nopad top41">
                    <h4 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?>3. How do we make a booking? <?php /*?></a><?php */?></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                           The inquiries we receive via the website are submitted directly to the villa owners.  Our concierge service will reach out to you to learn about your travel plans and itinerary, so we can supply you with a comprehensive list of villa choices that meet your needs and requirements.
                        </div>
                    </div>
                    
                    
                    
                    <div class="col-md-12 nopad top41">
                    <h4 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?>4. Is it possible to only reserve or use a fixed number of bedrooms?<?php /*?></a><?php */?></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                          Typically, most luxury villas will give you the option to only reserve and use a set number of bedrooms.  This is reflected at different price levels, depending on the villa.  However, you will still be able to enjoy the rest of the villa grounds and facilities. 
                        </div>
                    </div>
                    
                    <div class="col-md-12 nopad top41">
                    <h4 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?>5. What about kids?<?php /*?></a><?php */?></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                         In the large majority of cases, the villas will allow kids.  Some of the villas even provide special play areas and entertainment and game rooms, as well as gardens and kid pools.  Each group profile and composition is specific, so just let us know which villa(s) you are most interested in, and we will advise you which of the properties in our portfolio best fits your specific needs.
                        </div>
                    </div>
                    
                    <div class="col-md-12 nopad top41">
                    <h4 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?>6. Can you help us arrange excursions & transportation?<?php /*?></a><?php */?></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                         In most cases, there is a villa manager or representative who can respond to your every needs and requirements.   They can help you book restaurants, spa treatments, and beach transportation.  Furthermore, we are happy to assist you with special excursions or other transportation.   Let us know your ideas, and we will assist you with a wide range of alternatives.  It us our goal to make sure you enjoy your luxury villa holiday stay in Koh Samui and without hassles.
                        </div>
                    </div>
                    
                    <div class="col-md-12 nopad top41">
                    <h4 class=" mb f22 top"><strong><?php /*?><a class="tg cdf" ><?php */?>7. How far ahead of time should I consider making a booking?<?php /*?></a><?php */?></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                         If you have specific properties in mind as meeting your needs and schedule, then we recommend booking as early as you can.  Keep in mind that year end with Christmas and New Year is the busiest time, and properties are typically reserved very early.  Save yourself stress and let-down by booking as far in advance as possible. 
                        </div>
                    </div>
                    
                    
                    <?php /*?><div class="col-md-12 nopad top41">
                    <h4 class=" mb f22 top"><strong><a class="tg cdf" >1. Do villas require a minimum number of nights booking</a></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                            Most villas ask for a minimum number of nights stay to be able to make any booking.<br>
This is typically 3 nights throughout the year although in high season this can increase to 5 or 7, and even 10 nights in peak season. At the bottom of our villa details pages we show the minimum nights required at the different times of the year.
                        </div>
                    </div>
                    
                    <div class="col-md-12 nopad top41">
                    <h4 class=" mb f22 top"><strong><a class="tg cdf" >2. What time is check-in and check-out</a></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                           Private villas work similarly to hotels so the check-in is usually in the afternoon and check-out is by late morning or midday. Each villa is different so please ask us.
                        </div>
                    </div>
                    
                    <div class="col-md-12 nopad top41">
                    <h4 class=" mb f22 top"><strong><a class="tg cdf" >3. How do I book</a></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                           All our inquiries through the website go direct to the Owner. Once you make an inquiry our concierge service will contact you to work through your plans and provide a full range of villa options available.
                        </div>
                    </div>
                    
                    
                    
                    <div class="col-md-12 nopad top41">
                    <h4 class=" mb f22 top"><strong><a class="tg cdf" >4. Can i rent a set number of bedrooms</a></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                          Yes, luxury villas offer you the flexibility to rent a different number of  bedrooms at different prices.<br>
And you still get the use of the entire villa and its facilities.
                        </div>
                    </div>
                    
                    <div class="col-md-12 nopad top41">
                    <h4 class=" mb f22 top"><strong><a class="tg cdf" >5. Are children allowed</a></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                         Yes, all the villas allow children, they make great playgrounds to keep the kids occupied with games and cinema rooms plus<br>
incredible gardens & pool decks. Every group profile is different so please contact us by inquiring on the villa that interests you<br>
most and we will provide a list of all the villas that have a bedroom configuration that works best for your group and requirements. 
                        </div>
                    </div>
                    
                    <div class="col-md-12 nopad top41">
                    <h4 class=" mb f22 top"><strong><a class="tg cdf" >6. How do I organise excursions & transport</a></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                         The villa manager is there to take care of your daily needs during your stay so a restaurant booking or transport to the beach<br>
is easy to arrange. If you are interested in private excursions or transport always on standby <br>
for your stay then please discuss your requirements with us so that we can provide you with the best available options.<br>
We are here to make your luxury villa holiday in Koh Samui as enjoyable and hassle-free as possible.
                        </div>
                    </div>
                    
                    <div class="col-md-12 nopad top41">
                    <h4 class=" mb f22 top"><strong><a class="tg cdf" >7. How far in advance can i book</a></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                         If you are interested in choosing from a few villas that match your group requirements then being early is a must.<br>
All villas are booked early in the year for the Christmas and New Year period.<br>
Booking well in advance will give you the most choice of villas and avoid disappointment.
                        </div>
                    </div><?php */?>
                <?php
				}
				?>
                <div class="col-md-12 nopad top21">
                <?php 
				if($_REQUEST['cate']!=6 && $_REQUEST['cate']!=8 && $_REQUEST['cate']!=5)
				{
				?>
                	<h4 class=" mb f30 top"><strong><?php /*?><a class="tg cdf" ><?php */?>Where are the Best Villas in Koh Samui?<?php /*?></a><?php */?></strong></h4>
                 <?php
				}
				elseif($_REQUEST['cate']==6)
				{
					?>
                    <h2 class=" mb f30 top"><strong><?php /*?><a class="tg cdf" ><?php */?>Where are the Best Beachfront Villas in Koh Samui?<?php /*?></a><?php */?></strong></h2>
					<?php
				}
				?>
                </div>
                
                <?php 
				if($_REQUEST['cate']!=8 && $_REQUEST['cate']!=5)
				{
					?>
                <div class="col-md-12 nopad top210">
                    <div class="col-md-12 nopad  f18">
                        Koh Samui is quite small with a few locations being the most popular for private villas on the beach. Here are the top destinations for your next villa holiday.
                    </div>
                </div>
                <?php
				}
				?>
                
                
                
                <?php 
				if($_REQUEST['cate']!=6)
				{
					$link_url_footer = $_SERVER['REQUEST_URI'];
					if($link_url_footer == '/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/all-collections/all-sort.html')
					{
						$f_villas = "";
					}
					else
					{
						$f_villas = "Villas";
					}
				?>
                
					<?php 
                    if($_REQUEST['cate']!=8 && $_REQUEST['cate']!=5)
                    {
                        ?>
                    <div class="col-md-12 nopad top41">
                        <table class="table table-bordered table-striped ttb" width="100%%" border="1">
                            <thead>
                                <tr>
                                    <th>Koh Samui Location</th>
                                    <th>Price From</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/bophut-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Bophut <?php echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$300</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/maenam-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Maenam <?php echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$850</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/lipa-noi-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Lipa Noi <?php echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$700</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/lamai-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Lamai <?php echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$280</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/laem-sor-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Laem Sor <?php echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$1,150</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/taling-ngam-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Taling Ngam <?php echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$405 </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                    
                    
                    <div   class="col-md-12 nopad top41">
                    <h4 class=" mb f22 top tg"><strong><?php /*?><a class="tg cdf" ></a><?php */?>1. <a class="blu" href="/search-rent/thailand-koh-samui/bophut-beach/all-price/all-bedrooms/all-collections/all-sort.html"><span >Bophut Villas</span></a></strong></h4>
                        <div  class="col-md-12 nopad top21 f18">
                            A beautiful beach with many restaurants and shops in the charming Fishermans Village. The sweeping bay is perfect for swimming with clear safe water. There are many luxury villas for rent in Bophut Koh Samui looking out to it’s neighbouring island.
                        </div>
                    </div>
                    
                    <?php /*?><div   class="col-md-12 nopad top41">
                    <h4 class=" mb f22 top tg"><strong><a class="tg cdf" ></a>2. <a class="blu" href="/search-rent/thailand-koh-samui/chaweng-beach/all-price/all-bedrooms/all-collections/all-sort.html"><span >Chaweng Villas</span></a></strong></h4>
                        <div  class="col-md-12 nopad top21 f18">
                            Chaweng is the center of the nightlife, entertainment and restaurants in Koh Samui, located around one of the islands best beaches.
        Chaweng Noi just to the south offers more tranquil surroundings with convenient access to this busy area. 
        
                        </div>
                    </div><?php */?>
                    
                    <div   class="col-md-12 nopad top41">
                    <h4 class=" mb f22 top tg"><strong><?php /*?><a class="tg cdf" ></a><?php */?>2. <a class="blu" href="/search-rent/thailand-koh-samui/maenam-beach/all-price/all-bedrooms/all-collections/all-sort.html"><span >Maenam Villas</span></a></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                            Maenam is next to Bophut on the north of the island directly facing the island of Koh Phangan. A beautiful long bay with crystal clear water there are many beachfront luxury villas here.
        
                        </div>
                    </div>
                    
                    <div   class="col-md-12 nopad top41">
                    <h4 class=" mb f22 top tg"><strong><?php /*?><a class="tg cdf" ></a><?php */?>3. <a class="blu" href="/search-rent/thailand-koh-samui/lipa-noi-beach/all-price/all-bedrooms/all-collections/all-sort.html"><span >Lipa Noi Villas</span></a></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                            Lovely secluded bay away from any tourist trail, quiet and safe for swimming.<br>
    There are beach villas all the way along this beautiful beach and Niki beach club is located here.
                        </div>
                    </div>
                    
                    
                    <div   class="col-md-12 nopad top41">
                    <h4 class=" mb f22 top tg"><strong><?php /*?><a class="tg cdf" ></a><?php */?>4. <a class="blu" href="/search-rent/thailand-koh-samui/lamai-beach/all-price/all-bedrooms/all-collections/all-sort.html"><span >Lamai Villas</span></a></strong></h4>
                        <div class="col-md-12 nopad top21 f18">
                            Koh Samui’s second tourist center there are plenty of restaurants, cafes and bars here.<br>
    The villas are away from the center and in prime beach or hillside locations.
                        </div>
                    </div>
                    
                    
                    <div   class="col-md-12 nopad top41">
                    <h4 class=" mb f22 top tg"><strong><?php /*?><a class="tg cdf" ></a><?php */?>5. <a class="blu" href="/search-rent/thailand-koh-samui/laem-sor-beach/all-price/all-bedrooms/all-collections/all-sort.html"><span >Laem Sor Villas</span></a></strong></h4>
                        <div  class="col-md-12 nopad top21 f18">
                            Solitude awaits you in this choice of beach villas with incredible views across to nearby islands.
                        </div>
                    </div>
                    
                    <div   class="col-md-12 nopad top41">
                    <h4 class=" mb f22 top tg"><strong><?php /*?><a class="tg cdf" ></a><?php */?>6. <a class="blu" href="/search-rent/thailand-koh-samui/taling-ngam-beach/all-price/all-bedrooms/all-collections/all-sort.html"><span >Taling Ngam Villas</span></a></strong></h4>
                        <div  class="col-md-12 nopad top21 f18">
                           Taling Ngam is where you can find the most exclusive resorts and villas on Koh Samui.<br>
    Quiet & private, there are jsut a few luxury villas here to spend an unforgettable vacation.<br><br><br>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
             <?php
				}
				else
				{
					$link_url_footer = $_SERVER['REQUEST_URI'];
					if($link_url_footer == '/search-rent/thailand-koh-samui/all-beach/all-price/all-bedrooms/beachfront-villas/all-sort.html')
					{
						$f_villas = "";
					}
					else
					{
						$f_villas = "Villas";
					}
					
					?>
                    <div class="col-md-12 nopad top41">
                    <table class="table table-bordered table-striped ttb" width="100%%" border="1">
                        <thead>
                            <tr>
                                <th>Beach Villas</th>
                                <th>Price From</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                <h3 class="f14 th3">
                                    <a href="/search-rent/thailand-koh-samui/bophut-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Bophut <?php echo $f_villas;?></a>
                                </h3>
                                </td>
                                <td>$680</td>
                            </tr>
                            <tr>
                                <td>
                                <h3 class="f14 th3">
                                    <a href="/search-rent/thailand-koh-samui/maenam-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Maenam <?php echo $f_villas;?></a>
                                </h3>
                                </td>
                                <td>$850</td>
                            </tr>
                            <tr>
                                <td>
                                <h3 class="f14 th3">
                                    <a href="/search-rent/thailand-koh-samui/lipa-noi-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Lipa Noi <?php echo $f_villas;?></a>
                                </h3>
                                </td>
                                <td>$700</td>
                            </tr>
                            <tr>
                                <td>
                                <h3 class="f14 th3">
                                    <a href="/search-rent/thailand-koh-samui/laem-sor-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Laem Sor <?php echo $f_villas;?></a>
                                </h3>
                                </td>
                                <td>$1,150</td>
                            </tr>
                            <tr>
                                <td>
                                <h3 class="f14 th3">
                                    <a href="/search-rent/thailand-koh-samui/taling-ngam-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Taling Ngam <?php echo $f_villas;?></a>
                                </h3>
                                </td>
                                <td>$600</td>
                            </tr>
                            
                        </tbody>
                    </table><br><br>
            	</div>
                
                
                <?php /*?><div   class="col-md-12 nopad top41">
                <h4 class=" mb f22 top tg"><strong><a class="tg cdf" ></a>1. <a class="blu" href="/search-rent/thailand-koh-samui/bophut-beach/all-price/all-bedrooms/all-collections/all-sort.html"><span >Bophut Villas-------</span></a></strong></h4>
                    <div  class="col-md-12 nopad top21 f18">
                        A beautiful beach with many restaurants and shops in the charming Fishermans Village. The sweeping bay is perfect for swimming with clear safe water. There are many luxury villas for rent in Bophut Koh Samui looking out to it’s neighbouring island.
                    </div>
                </div><?php */?>
                
                <?php /*?><div   class="col-md-12 nopad top41">
                <h4 class=" mb f22 top tg"><strong><a class="tg cdf" ></a>2. <a class="blu" href="/search-rent/thailand-koh-samui/chaweng-beach/all-price/all-bedrooms/all-collections/all-sort.html"><span >Chaweng Villas</span></a></strong></h4>
                    <div  class="col-md-12 nopad top21 f18">
                        Chaweng is the center of the nightlife, entertainment and restaurants in Koh Samui, located around one of the islands best beaches.
    Chaweng Noi just to the south offers more tranquil surroundings with convenient access to this busy area. 
    
                    </div>
                </div><?php */?>
                
               <?php /*?> <div   class="col-md-12 nopad top41">
                <h4 class=" mb f22 top tg"><strong><a class="tg cdf" ></a>2. <a class="blu" href="/search-rent/thailand-koh-samui/maenam-beach/all-price/all-bedrooms/all-collections/all-sort.html"><span >Maenam Villas</span></a></strong></h4>
                    <div class="col-md-12 nopad top21 f18">
                        Maenam is next to Bophut on the north of the island directly facing the island of Koh Phangan. A beautiful long bay with crystal clear water there are many beachfront luxury villas here.
    
                    </div>
                </div><?php */?>
                
                <?php /*?><div   class="col-md-12 nopad top41">
                <h4 class=" mb f22 top tg"><strong><a class="tg cdf" ></a>3. <a class="blu" href="/search-rent/thailand-koh-samui/lipa-noi-beach/all-price/all-bedrooms/all-collections/all-sort.html"><span >Lipa Noi Villas</span></a></strong></h4>
                    <div class="col-md-12 nopad top21 f18">
                        Lovely secluded bay away from any tourist trail, quiet and safe for swimming.<br>
There are beach villas all the way along this beautiful beach and Niki beach club is located here.
                    </div>
                </div>
                <?php */?>
                
                <?php /*?><div   class="col-md-12 nopad top41">
                <h4 class=" mb f22 top tg"><strong><a class="tg cdf" ></a>5. <a class="blu" href="/search-rent/thailand-koh-samui/lamai-beach/all-price/all-bedrooms/all-collections/all-sort.html"><span >Lamai Villas</span></a></strong></h4>
                    <div class="col-md-12 nopad top21 f18">
                        Koh Samui’s second tourist center there are plenty of restaurants, cafes and bars here.<br>
The villas are away from the center and in prime beach or hillside locations.
                    </div>
                </div><?php */?>
                
                
                <?php /*?><div   class="col-md-12 nopad top41">
                <h4 class=" mb f22 top tg"><strong><a class="tg cdf" ></a>4. <a class="blu" href="/search-rent/thailand-koh-samui/laem-sor-beach/all-price/all-bedrooms/all-collections/all-sort.html"><span >Laem Sor Villas</span></a></strong></h4>
                    <div  class="col-md-12 nopad top21 f18">
                        Solitude awaits you in this choice of beach villas with incredible views across to nearby islands.
                    </div>
                </div>
                
                <div   class="col-md-12 nopad top41">
                <h4 class=" mb f22 top tg"><strong><a class="tg cdf" ></a>5. <a class="blu" href="/search-rent/thailand-koh-samui/taling-ngam-beach/all-price/all-bedrooms/all-collections/all-sort.html"><span >Taling Ngam Villas</span></a></strong></h4>
                    <div  class="col-md-12 nopad top21 f18">
                       Taling Ngam is where you can find the most exclusive resorts and villas on Koh Samui.<br>
Quiet & private, there are jsut a few luxury villas here to spend an unforgettable vacation.<br><br><br>
                    </div>
                </div><?php */?>
                    <?php
				}
				?>
                
                
                
                
                
                
                
                
                
                
                
                <?php /*?><div   class="col-md-12 nopad top41">
                <h4 class=" mb f22 top tg"><strong><a class="tg cdf" ></a>1. <a class="blu" href="/search-rent/thailand-koh-samui/bophut-beach/all-price/all-bedrooms/all-collections/all-sort.html"><span >Bophut Villas</span></a></strong></h4>
                    <div  class="col-md-12 nopad top21 f18">
                        A beautiful beach with many restaurants and shops in the charming Fishermans Village. The sweeping bay is perfect for swimming with clear safe water. There are many luxury villas for rent in Bophut Koh Samui looking out to it’s neighbouring island.
                    </div>
                </div>
                
                <div   class="col-md-12 nopad top41">
                <h4 class=" mb f22 top tg"><strong><a class="tg cdf" ></a>2. <a class="blu" href="/search-rent/thailand-koh-samui/chaweng-beach/all-price/all-bedrooms/all-collections/all-sort.html"><span >Chaweng Villas</span></a></strong></h4>
                    <div  class="col-md-12 nopad top21 f18">
                        Chaweng is the center of the nightlife, entertainment and restaurants in Koh Samui, located around one of the islands best beaches.
    Chaweng Noi just to the south offers more tranquil surroundings with convenient access to this busy area. 
    
                    </div>
                </div>
                
                <div   class="col-md-12 nopad top41">
                <h4 class=" mb f22 top tg"><strong><a class="tg cdf" ></a>3. <a class="blu" href="/search-rent/thailand-koh-samui/maenam-beach/all-price/all-bedrooms/all-collections/all-sort.html"><span >Maenam Villas</span></a></strong></h4>
                    <div class="col-md-12 nopad top21 f18">
                        Maenam is next to Bophut on the north of the island directly facing the island of Koh Phangan. A beautiful long bay with crystal clear water there are many beachfront luxury villas here.
    
                    </div>
                </div>
                
                <div   class="col-md-12 nopad top41">
                <h4 class=" mb f22 top tg"><strong><a class="tg cdf" ></a>4. <a class="blu" href="/search-rent/thailand-koh-samui/lipa-noi-beach/all-price/all-bedrooms/all-collections/all-sort.html"><span >Lipa Noi Villas</span></a></strong></h4>
                    <div class="col-md-12 nopad top21 f18">
                        Lovely secluded bay away from any tourist trail, quiet and safe for swimming.<br>
There are beach villas all the way along this beautiful beach and Niki beach club is located here.
                    </div>
                </div>
                
                
                <div   class="col-md-12 nopad top41">
                <h4 class=" mb f22 top tg"><strong><a class="tg cdf" ></a>5. <a class="blu" href="/search-rent/thailand-koh-samui/lamai-beach/all-price/all-bedrooms/all-collections/all-sort.html"><span >Lamai Villas</span></a></strong></h4>
                    <div class="col-md-12 nopad top21 f18">
                        Koh Samui’s second tourist center there are plenty of restaurants, cafes and bars here.<br>
The villas are away from the center and in prime beach or hillside locations.
                    </div>
                </div>
                
                
                <div   class="col-md-12 nopad top41">
                <h4 class=" mb f22 top tg"><strong><a class="tg cdf" ></a>6. <a class="blu" href="/search-rent/thailand-koh-samui/laem-sor-beach/all-price/all-bedrooms/all-collections/all-sort.html"><span >Laem Sor</span></a></strong></h4>
                    <div  class="col-md-12 nopad top21 f18">
                        Solitude awaits you in this choice of beach villas with incredible views across to nearby islands.
                    </div>
                </div>
                
                <div   class="col-md-12 nopad top41">
                <h4 class=" mb f22 top tg"><strong><a class="tg cdf" ></a>7. <a class="blu" href="/search-rent/thailand-koh-samui/taling-ngam-beach/all-price/all-bedrooms/all-collections/all-sort.html"><span >Taling Ngam</span></a></strong></h4>
                    <div  class="col-md-12 nopad top21 f18">
                       Taling Ngam is where you can find the most exclusive resorts and villas on Koh Samui.<br>
Quiet & private, there are jsut a few luxury villas here to spend an unforgettable vacation.<br><br><br>
                    </div>
                </div><?php */?>
                 <?php
				}
				else
				{
					?>
                    <div class="col-md-12 nopad top41">
                        <div class="col-md-12 nopad top21 f18">
                        </div>
                    </div>
				<?php
				}?>
                
                
                
                
                
                <?php 
				if($_REQUEST['cate']==5)//--------large group---- 55555
				{
					?>
                    <h2 class=" mb f30 top"><strong><?php /*?><a class="tg cdf" ><?php */?>Popular Villa locations Koh Samui<?php /*?></a><?php */?></strong></h2>
                    <div class="col-md-12 nopad top41">
                        <table class="table table-bordered table-striped ttb" width="100%%" border="1">
                            <thead>
                                <tr>
                                    <th>Koh Samui Location</th>
                                    <th>Price From</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/bophut-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Bophut <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$300</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/chaweng-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Chaweng Noi <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$450</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/maenam-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Maenam <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$850</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/lipa-noi-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Lipa Noi <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$700</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/lamai-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Lamai <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$600</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/laem-sor-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Laem Sor <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$1,000</td>
                                </tr>
                                <tr>
                                    <td>
                                    <h3 class="f14 th3">
                                        <a href="/search-rent/thailand-koh-samui/taling-ngam-beach/all-price/all-bedrooms/all-collections/all-sort.html" class="blu">Taling Ngam <?php //echo $f_villas;?></a>
                                    </h3>
                                    </td>
                                    <td>$405 </td>
                                </tr>
                                
                            </tbody>
                        </table>
                        <br><br>

                    </div>
					<div class="col-md-12 nopad top41">
                    <!--<h4 class=" mb f30 top"><strong><a class="tg cdf" >Popular large group Villas in Koh Samui</a></strong></h4>-->
                        <div class="col-md-12 nopad top21 f18">
                           <h2 class="f30"><strong>The Perfect Koh Samui villas for large groups</strong></h2>
                            <div class="col-md-12 nopad top21 f18">Here to provide unforgettable large group experiences, Inspiring Villas has brought together some of the most beautiful Koh Samui villas for large groups. When traveling to an island as stunning as Koh Samui as a group, a comfortable and accessible villa is key. Our selection includes options that range from 8-10 bedrooms, with multi-unit facilities available large enough to host up to 50 guests.<br>
                            No matter the choice, we always ensure your large gathering, whether it be a company retreat, wedding, or vacation with friends, has an atmosphere that is elegant and inspiring. All of the Koh Samui large group villas in our collection are fully equipped with modern amenities to deliver a top-notch tailored experience. Infinity pools, in-villa spas, dedicated yoga and relaxation space all ensures that every guest finds a spot to enjoy. We all know it can be difficult to cater to various personalities, so each of our villas is designed to provide a diverse set of options.
                            </div>
                            </div>
                            <div class="col-md-12 nopad top21 f18">
                            <h3><strong>Beautifully Designed Villas in Koh Samui</strong></h3>
                            <div class="col-md-12 nopad top21 f18">The interior of each Koh Samui villas for large groups is thoughtfully constructed with comfortable bedrooms, ensuite bathrooms, large living spaces, and modern amenities. We aim to make sure that each room is welcoming, so everyone feels at ease and safe. State of the art features make sure you can always catch up on your netflix show, or listen to a new album on Spotify. Space for conversation or some coxy alone time, you’ll find a place for you at these villas.<br>
                            Not only are the interiors gorgeous, but outdoor spaces are next level. Rooms that open up to stunning views of Koh Samui, creating an experience that blends between indoor and outdoor living. All of the villa's outdoor spaces provide expanse and intimacy, so that your vibe can be matched throughout your stay. The pools are perfect for some sunshine outside, while dinners outside during sunset become great memories of your time in Thailand. These spaces are meant to form memories.
                            </div>
                            </div>
                            <div class="col-md-12 nopad top21 f18">
                            <h3><strong>Koh Samui villas for large groups with a Great Location</strong></h3>
                            <div class="col-md-12 nopad top21 f18">Exploring some of the best Koh Samui villas for large groups, our list is full of options. Villa Amina-Flora for example has 8-bedrooms and panoramic views that you’ll never forget. This Maenam Koh Samui villa has two infinity pools and jacuzzis, so the family pool party can be daily. Koh Koon is another favorite villa for large groups in Thailand. Overlooking Chaweng Bay, this villa accommodates 22 guests with a massive pool, game room, and even a mini golf cours and outdoor cinema.
                            </div>
                            </div>
                            <div class="col-md-12 nopad top21 f18">
                            <h3><strong>Unforgettable Group Villa Experience in Koh Samui</strong></h3>
                            <div class="col-md-12 nopad top21 f18">Inspiring Villas deeply understands the complexities of traveling with large groups, both family and friends. This is why we take such pride in our work, offering a seamless experience that is highly personalized and hassle-free. From the airport transfers to the daily maid service, our team is always available to provide the best Koh Samui vacation villa experience possible. We’ve even got chefs at the ready to serve up an incredible international meal or authentic Thai dining experience.<br>
                            Not only are the Koh Samui villas for large groups accommodations unmatched, but your group will always be close to some of the island’s best destinations. From iconic locations like Big Buddha at Phra Yai Temple to the beaches of Lamai, everyone in your group will find something to make their trip incredible. Koh Samui Elephant Sanctuaries and Bophut Fisherman’s Village are a more serene experience, while the adventuresome can jump into a jungle Jeep tour. All of these villas provide the perfect group sanctuary, as you all enjoy the culture, relaxation, and entertainment that Koh Samui has to offer.
                            <br><br><br><br>
                            </div>
                        </div>
                    </div>	
                    
                    
                   <?php /*?> <div   class="col-md-12 nopad top41">
                    <h4 class=" mb f22 top tg"><strong><a class="tg cdf" ></a>1. <a class="blu" href="/luxury-villas/villa-miskawaan/maenam-beach-koh-samui-thailand.html"><span >Misakwaan The Residences</span></a></strong></h4>
                        <div  class="col-md-12 nopad top21 f18">
                            Two luxury villas next to each other on stunning Maenam beach, with white soft sand and clear blue water.<br>
The service here is impeccable and can cater for any type of private group, weddings and corporate retreats.<br>
Sleeps up to 28 adults and 12 children across the 14 bedrooms.
                        </div>
                    </div>
                    
                    
                    <div   class="col-md-12 nopad top41">
                    <h4 class=" mb f22 top tg"><strong><a class="tg cdf" ></a>2. <a class="blu" href="/luxury-villas/baan-hinta-baan-hinyai/lamai-beach-koh-samui-thailand.html"><span >Bann HintaHinyai</span></a></strong></h4>
                        <div  class="col-md-12 nopad top21 f18">
                            Next door to each other on this quiet part of Lamai beach are these wooden style architectural beach villas.<br>
Enjoy watersports, lounge by the pools and relax in the oversized spaces indoors in the evening.<br>
Sleeps 20 in the 10 master bedrooms.
                        </div>
                    </div>
                    
                    
                    <div   class="col-md-12 nopad top41">
                    <h4 class=" mb f22 top tg"><strong><a class="tg cdf" ></a>3. <a class="blu" href="/luxury-villas/villa-kalyana/laem-sor-beach-koh-samui-thailand.html"><span >Villa Kalyana</span></a></strong></h4>
                        <div  class="col-md-12 nopad top21 f18">
                            This private beach estate is the epitome of a secluded tropical retreat, located in the quiet south of the island.<br>
Four stylish pavillions are dotted in the palm tree grounds, a pool is central to the gardens and leads down to the private beach.<br>
Sleeps up to 20 adults and 18 children.
                        </div>
                    </div>
                    
                    
                    <div   class="col-md-12 nopad top41">
                    <h4 class=" mb f22 top tg"><strong><a class="tg cdf" ></a>4. <a class="blu" href="/luxury-villas/ban-sairee/laem-sor-beach-koh-samui-thailand.html"><span >Ban Sairee</span></a></strong></h4>
                        <div  class="col-md-12 nopad top21 f18">
                            A majestic 9 bedroom estate in a secluded area with private beach, bedroom pavilions on stilts and serene lush grounds.<br>
This Thai style chic beach estate is perfect for celebrations of all types, sleeping up to 18 people.<br><br><br>
                        </div>
                    </div><?php */?>
					<?php
				}
				?>
                
                
                
                
              <?php
				if($_SERVER['REQUEST_URI']=='/search-rent/thailand-koh-samui/all-beach/all-price/5-7-bedrooms/all-collections/all-sort.html')
				{
					?>
                    
                    
                    
        
				<?php
				}
				?>  
                
                
                
                
				
	</div>
<?php    
}
else
{
	//echo "000000000---show_koh_samui";
}
?>