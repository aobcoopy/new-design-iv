<div id="mega-sliders2" class="carousel slide top48 mob992" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" >
        <?php
        $aq=0;
        $ar_pp_768 = ['/upload/slide/768/yang-20201591684020.webp','upload/slide/768/vth20201591684721.webp','upload/slide/768/inspiring_villas1594905061.webp'];
		$ar_pp_430 = ['/upload/slide/430/yang-20201591684020.webp','upload/slide/430/vth20201591684721.webp','upload/slide/430/inspiring_villas1594905061.webp'];
		$d=0;
        foreach($ar_pp_430 as $m_p )
        {
            $act = ($aq==0)?'active beactive':'';
			
           /* $ar_pp_768 = ['/upload/slide/768/yang-20201591684020.webp','upload/slide/768/vth20201591684721.webp','upload/slide/768/inspiring_villas1594905061.webp'];
			$ar_pp_430 = ['/upload/slide/430/yang-20201591684020.webp','upload/slide/430/vth20201591684721.webp','upload/slide/430/inspiring_villas1594905061.webp'];*/
            /*if($aq==0)
            {*/
                $imagess = '<img class="mob992 cal_mob lazy" data-src="'.$m_p.'" width="430" height="141" alt="inspiringvillas cover ">';
				/*$imagess = '<picture>';
							  $imagess.= '<source media="(min-width:768px)" srcset="'.$ar_pp_768[$aq].'" > ';//width="768" height="252"';
							  $imagess.= '<source media="(min-width:465px)" srcset="'.$ar_pp_430[$aq].'" > ';//width="430" height="141"';
							  $imagess.= '<img src="'.$ar_pp_430[$aq].'" alt="inspiringvillas " width="430" height="141" class="npic">';
							$imagess.= '</picture>';*/
            /*}
            else
            {
                $imagess = '<img class="mob992" src="'.$m_p.'" alt="inspiringvillas cover " class="lazy">';
            }*/
            echo '<div class="item '.$act.'  ">';
                echo $imagess;// 
                //echo '<div class="carousel-caption">';
                    //echo '<!--<img src="libs/images/stars.png" alt="">-->';
                //echo '</div>';
            echo '</div>';
            $aq++;
        }
        ?>
        </div>
        <a class="left carousel-control" aria-label="prev" href="#mega-sliders2" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
        <a class="right carousel-control" aria-label="next" href="#mega-sliders2" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
    </div>