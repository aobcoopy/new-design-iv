<div class="container-fluid ot_choose">
	<div class="row justify-content-center text-center">
    	<div class="fl_tt">other choose</div>
    </div>
	<div class="row justify-content-center">
    	<div class="col-10">
        	<div class="row justify-content-center">
                <?php
				$i=0;
				$limit = 'limit 3 ';
				//echo $page;
				if($blod_dt==1)
				{
					$limit = 'limit 4 ';
				}
				$choose = $dbc->Query("select * from blog_category where status > 0 and id != '".$d_cate['id']."' order by RAND() ".$limit." ");
				while($res = $dbc->Fetch($choose))
				{
					$photo = json_decode($res['photo'],true);
					$sh = ($i==2)?'d-none d-sm-block':'';
					echo '<div class="col-6 col-sm-3 '.$sh.'">';
						echo '<a href="lifestyle-category-'.$res['slug'].'.html" target="_blank" style="color:#000">';
							echo '<img src="'.imagePath('/'.$photo).'" class="img-fluid" alt="">';
							echo '<div class="ch_name">'.$res['name'].'<br>experiences</div>';
						echo '</a>';
					echo '</div>';
					$i++;
				}
				?>
            </div>
        </div>
    </div>
</div>

