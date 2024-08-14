<?php include "libs/pages/top_blog_detail.php";?>
<?php include "libs/pages/search.php";
$blod_dt = 1;?>


<link href="../libs/css/blog/blog_style_1.css" rel="stylesheet">
<!-- Responsive styles for this template -->
<link href="../libs/css/blog/responsive.css" rel="stylesheet">
<!-- Colors for this template -->
<link href="../libs/css/blog/colors.css" rel="stylesheet">
<!--<link href="libs/css/blog/bootstrap.css" rel="stylesheet">-->



<section class="section wb">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="blog-title-area">
                            <ol class="breadcrumb hidden-xs-down">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="/blog">Blog</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo $cate_link;?>" style="text-transform:capitalize;"><?php echo $data_cate['name'];?></a></li>
                                <li class="breadcrumb-item active" style="text-transform:capitalize;"><?php echo $blogs['name'];?></li>
                            </ol>
                            
                            <div class="box_caro_text_cate top10">
                                <a href="/blog" class="ls_sltopbut tw">Lifestyle</a>
                                <?php 
                                $qcate = $dbc->Query("select * from blog_category where status > 0 order by  sort asc");
                                while($re = $dbc->Fetch($qcate))
                                {
                                    echo '<a href="/lifestyle-category-'.$re['slug'].'.html" target="_blank" class="ls_sltopbut tw">'.$re['name'].'</a>';
                                }
                                ?>
                                
                            </div>
                            

                            <!--<span class="color-aqua"><a href="#" title=""><?php echo $cate['name'];?></a></span>-->
                            <div class="top10">
                            <h1 class="tblue"><?php echo $blogs['name'];?></h1>
                            </div>

                            <div class="blog-meta big-meta">
                                <small><?php echo dateType2($blogs['day']);?></small>
                                <small>by <?php echo $blogs['byname'];?></small>
                                <!--<small><a href="#" title=""><i class="fa fa-eye"></i> 2344</a></small>-->
                            </div><!-- end meta -->

                            <div class="post-sharing">
                                <ul class="list-inline">
                                    <li onClick="onShare('<?php echo 'https://www.inspiringvillas.com'.$_SERVER['REQUEST_URI'];?>','<?php echo $blogs['name'];?>','<?php echo string_len_2b($brie,300);?>','<?php echo imagePath($photo_share);?>');"><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                    <li onclick="popUp=window.open('https://twitter.com/share?text=<?php echo string_len_2b($blogs['name'],100).'-'.string_len_2b(base64_decode($blogs['brief'],true),200);?>&hashtags=inspiringvillas&original_referer=<?php echo $urll;?>&data-url=<?php echo $urll;?>&via=inspiringvillas', 'popupwindow', 'scrollbars=yes,width=800,height=400');popUp.focus();return false"><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                    <!--<li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>-->
                                </ul>
                            </div><!-- end post-sharing -->
                        </div><!-- end title -->

                        <div class="single-post-media">
                            <img src="<?php echo $photo;?>" alt="" class="img-fluid">
                        </div><!-- end media -->

                        <div class="blog-content">  
                            <?php echo base64_decode($blogs['detail'],true);?>
                        </div><!-- end content -->

                        <div class="blog-title-area">

                            <div class="post-sharing">
                                <ul class="list-inline">
                                    <li onClick="onShare('<?php echo 'https://www.inspiringvillas.com'.$_SERVER['REQUEST_URI'];?>','<?php echo $blogs['name'];?>','<?php echo string_len_2b($brie,300);?>','<?php echo imagePath($photo_share);?>');"><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                    <li onclick="popUp=window.open('https://twitter.com/share?text=<?php echo string_len_2b($blogs['name'],100).'-'.string_len_2b(base64_decode($blogs['brief'],true),200);?>&hashtags=inspiringvillas&original_referer=<?php echo $urll;?>&data-url=<?php echo $urll;?>&via=inspiringvillas', 'popupwindow', 'scrollbars=yes,width=800,height=400');popUp.focus();return false"><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                    <!--<li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>-->
                                </ul>
                            </div><!-- end post-sharing -->
                        </div><!-- end title -->


                       <!-- <hr class="invis1">


                        <hr class="invis1">
-->
                        <?php /*?><div class="custombox clearfix">
                            <h4 class="small-title">You may also like</h4>
                            <div class="row">
                                <?php
                                $sql_rec = $dbc->Query("select * from blogs where status > 0 order by sort asc limit 2");
                                while($line = $dbc->Fetch($sql_rec))
                                {
                                    $rid1 = $line['id'];
                                    $photo = imagePath('/'.json_decode($line['photo_main'],true));
                                    $urll = "/blog/" . strtolower(str_replace(" ", "-", $line['name']) ) . ".html";
                                    $cate = $dbc->GetRecord("blog_category","*","id='".$line['category']."'");
                                    ?>
                                    <div class="col-lg-6">
                                        <div class="blog-box">
                                            <div class="post-media">
                                                <a href="<?php echo $urll;?>" title="">
                                                    <img src="<?php echo $photo;?>" alt="" class="img-fluid">
                                                    <div class="hovereffect">
                                                        <span class=""></span>
                                                    </div><!-- end hover -->
                                                </a>
                                            </div><!-- end media -->
                                            <div class="blog-meta">
                                                <h4><a href="<?php echo $urll;?>" title=""><?php echo $line['name'];?></a></h4>
                                                <small><a href="<?php echo $urll;?>" title=""><?php echo $cate['name'];?></a></small>
                                                <small><a href="<?php echo $urll;?>" title=""><?php echo dateType2($line['day']);?></a></small>
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->
                                    </div><!-- end col -->
                                    <?php
                                
                                }
                                ?>
                    
                                

                                
                            </div><!-- end row -->
                        </div><!-- end custom-box --><?php */?>

                       <!-- <hr class="invis1">-->

                        
                    </div><!-- end page-wrapper -->
                </div><!-- end col -->
                
                <div class="col-1"></div>
                
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <div class="ls_recent">Recent Posts</div>
                    
                    <div class="row">
                        <?php
                        $q=0;
                        $sql_rec = $dbc->Query("select * from blogs where status > 0 order by created asc limit 4");
                        while($line = $dbc->Fetch($sql_rec))
                        {
                            $photo = '/'.json_decode($line['photo_main'],true);
                            $data_cate = $dbc->GetRecord("blog_category","*","id = '".$line['category']."'");
                            $author = dateType($line['day']).' | by '.$line['byname'];
                            $urll = "/blog/" . strtolower(str_replace(" ", "-", $line['name']) ) . ".html";
                            ?>
                            <div class="col-12">
                                <div class="lsarti_ins_box">
                                    <a href="<?php echo $urll;?>" target="_blank"><img data-src="<?php echo imagePath($photo);?>" width="100%" class="ls_arti_photo lazy" alt=""></a>
                                    <div class="lsarti_tt"><?php echo $line['name'];?></div>
                                    <div class="lsarti_author"><?php echo $author;?></div>
                                    <div class="lsarti_cate"><a href="/blog" class="ls_sltopbut">Lifestyle</a><a href="#" class="ls_sltopbut"><?php echo $data_cate['name'];?></a></div>
                                    <div class="lsarti_des"><?php echo string_len(base64_decode($line['brief'],true),120);?></div>
                                    <div class="lsarti_share">
                                        <a href="" class="lsarti_icon"><img src="../../upload/new_design/lifestyle/img-arc-facebook-small.png" alt=""></a>
                                        <a href="" class="lsarti_icon"><img src="../../upload/new_design/lifestyle/img-arc-twister-small.png" alt=""></a>
                                        <a href="" class="lsarti_icon"><img src="../../upload/new_design/lifestyle/img-arc-ig-small.png" alt=""></a>
                                    </div>
                                    <a href="<?php echo $urll;?>" target="_blank"><div class="ls_l_box_readmore">read more...</div></a>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    
                    </div><!--row-->
                
                    
                </div><!-- end col -->
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</section>


<?php include "libs/pages/section_our_yachting.php";?>
<?php include "libs/pages/section_blog_other_choose.php";?>
<?php //include "libs/pages/section_life_style.php";?>

<?php include "libs/pages/section_follow_me.php";?>

<?php include "libs/pages/section_contact_us_footer.php";?>

<link rel="stylesheet" href="../libs/css/owl/owl.carousel.min.css">
<link rel="stylesheet" href="../libs/css/owl/owl.theme.default.min.css">
<script src="../libs/js/owl/owl.carousel.min.js"></script>
<style>
.lsarti_tt
{
	height:auto !important;
}
.lsarti_des {
    margin-bottom: 20px;
    height: auto;
    overflow-y: auto;
    line-height: 1.3;
    /* background: red; */
    width: 100%;
}
.ls_l_box_readmore {
    display: inline-block;
    float: right;
    text-transform: uppercase;
    font-weight: bold;
    letter-spacing: 2px;
	color:#18325;
	font-size:14px;
}
</style>
<!--<script defer src="libs/js/blog/js/jquery.min.js"></script>
<script defer src="libs/js/blog/js/tether.min.js"></script>
<script defer src="libs/js/blog/js/bootstrap.min.js"></script>
<script defer src="libs/js/blog/js/custom.js"></script>-->

<!--<script defer src="http://static.ak.fbcdn.net/connect.php/js/FB.Loader" type="text/javascript"></script>
<script defer src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script> -->
<script>
function onShare(idp,title,desc,image)
{
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1684480814898909',
      xfbml      : true,
      version    : 'v3.2'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

  		FB.ui({
 			  method: 'feed',
			  name: title,
			  link: idp,
			  caption: title,
			  display: 'popup',
			  description: desc+'...',
			  picture:'https://www.inspiringvillas.com'+image,
			}, function(response){});
}
</script>
   <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v3.2&appId=1684480814898909";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

var mlink  = "<?php echo $Urllink;?>";
</script>
<style>
.btn-contact {
    background: #fff !important;
}
</style>