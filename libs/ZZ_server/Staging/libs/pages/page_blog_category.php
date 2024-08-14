<?php include "libs/pages/top_blog.php";?>
<?php include "libs/pages/search.php";?>


<div class="container-fluid lf_highlight">
	<div class="row justify-content-center">
    	<div class="col-9 col-md-7">
        	<div class="hl_tt text-center"><?php echo $d_cate['name'];?> experiences</div>
            <div class="hl_des text-center"><?php echo base64_decode($d_cate['detail'],true);?></div>
        </div>
    </div>
<br><br><br>
</div>

<br><br>

<div class="container-fluid <?php echo $lf_cate_box.' '.$bg;?>">
	<div class="row justify-content-center">
    	<div class="col-12 col-lg-10">
<?php
$tt_blog = $dbc->GetCount("blogs","category = '".$d_cate['id']."' and status > 0");
	//echo $tt_blog;
	
if($tt_blog>0)
{
	$ls = $dbc->Query("select * from blogs where category = '".$d_cate['id']."' and status > 0 order by created desc ");
	$y=0;
	$cate_id = 0;
	$ar_blog_1 = array();
	$ar_blog_all = array();
	while($res = $dbc->Fetch($ls))
	{
		$photo_main = '/'.json_decode($res['photo_main'],true);
		$img_photo_hl_1 = '/'.json_decode($res['photo_hl_1'],true);
		$img_photo_high = '/'.json_decode($res['photo_hl_2'],true);
		$name = string_len($res['name'],100);
		$author = dateType($res['day']).' | by '.$res['byname'];
		$des = string_len(base64_decode($res['brief'],true),150);
		$cate_name = $dbc->GetRecord("blog_category","*","id = '".$res['category']."'");
		$urll = "/blog/" . strtolower(str_replace(" ", "-", $name) ) . ".html";
		
		$ar_blog_all[] = array(
			'id' => $res['id'],
			'photo_mail' => $photo_main,
			'img_photo_hl_1' => $img_photo_hl_1,
			'img_photo_high' => $img_photo_high,
			'name' => $name,
			'author' => $author,
			'des' => $des,
			'cate_name' => $cate_name['name'],
			'link' => $urll,
			'cate_link' => '/lifestyle-category-'.$cate_name['slug'].'.html'
		);
		
	}
?>
			<!---------------------------------------------  WEB ------------------------------------------------------------------->
            
            
            <div class="row justify-content-center">
                <div class="col-11">
                        <div class="row">
                            <?php
                            $q=0;
                            foreach($ar_blog_all as $b_all)
                            {
                                ?>
                                <div class="col-12 col-md-6 col-lg-4 ">
                                    <div class="lsarti_ins_box">
                                        <a href="<?php echo $b_all['link'];?>" target="_blank">
                                        <img data-src="<?php echo imagePath($b_all['photo_mail']);?>" width="100%" class="ls_arti_photo lazy" alt="">
                                        </a>
                                        <div class="lsarti_tt"><a href="<?php echo $b_all['link'];?>" target="_blank" class="tblue"><?php echo $b_all['name'];?></a></div>
                                        <div class="lsarti_author"><?php echo $b_all['author'];?></div>
                                        <div class="lsarti_cate"><a href="/blog" class="ls_sltopbut">Lifestyle</a><a href="<?php echo $b_all['cate_link'];?>" class="ls_sltopbut"><?php echo $b_all['cate_name'];?></a></div>
                                        <div class="lsarti_des"><?php echo $b_all['des'];?></div>
                                        <div class="lsarti_share">
                                            <a href="" class="lsarti_icon"><img src="../../upload/new_design/lifestyle/img-arc-facebook-small.png" alt=""></a>
                                            <a href="" class="lsarti_icon"><img src="../../upload/new_design/lifestyle/img-arc-twister-small.png" alt=""></a>
                                            <a href="" class="lsarti_icon"><img src="../../upload/new_design/lifestyle/img-arc-ig-small.png" alt=""></a>
                                        </div>
                                        <a href="<?php echo $b_all['link'];?>" target="_blank"><div class="ls_l_box_readmore">read more...</div></a>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            
                        </div><!--row-->
                        
                        <!--<button class="rma">read more all</button>-->
                </div><!--col-11-->
            </div><!--row-->
 <?php
}
?>
            <!---------------------------------------------  WEB ------------------------------------------------------------------->
        </div>
    </div>
</div>














<?php include "libs/pages/section_our_yachting.php";?>
<?php include "libs/pages/section_blog_other_choose.php";?>
<?php //include "libs/pages/section_life_style.php";?>

<?php include "libs/pages/section_follow_me.php";?>

<?php include "libs/pages/section_contact_us_footer.php";?>











<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Send email</h4>
      </div>
      <div class="modal-body">
      <form id="form_sendblog">
        <?php /*?><div class="mg-contact-form-input">
            <!--<label for="full-name">Full Name</label>-->
            <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name">
        </div><?php */?>
        <div class="mg-contact-form-input">
            <!--<label for="email">E-mail</label>-->
            <input type="text" class="form-control" id="txemail" name="txemail" placeholder="E-mail">
        </div>
        <?php /*?><div class="mg-contact-form-input">
            <!--<label for="subject">Phone</label>-->
            <input type="text" class="form-control" id="txsubject" name="txsubject" placeholder="Phone">
        </div>
        <div class="mg-contact-form-input">
            <!--<label for="subject">Message</label>-->
            <textarea class="form-control" id="txmessage" name="txmessage" rows="5" placeholder="Message"></textarea>
        </div><?php */?>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onClick="sendemail()">Sent</button>
      </div>
    </div>
  </div>
</div>




<script src="libs/js/jquery-3.1.1.min.js"></script>
<script>

function sendemail()
{
	if($("#txemail").val()=='')
	{
		alert("Please fill your data");
		$("#txemail").focus();
		return false;
	}
	else
	{
		var Email=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/
		if(!document.getElementById("txemail").value.match(Email))
		{
		   alert('Email format is not valid');
		   document.getElementById("txemail").focus();
		   return false;
		}
		else
		{
			$.ajax({
				url:"libs/actions/action-send-email.php",
				type:"POST",
				dataType:"json"	,
				data:$("#form_sendblog").serialize(),
				success: function(res){
					if(res.status==true)
					{
						alert(res.msg);
						window.location.reload();
					}
					else
					{
						alert(res.msg);
						return false;
					}
				}
			});
		}
	}
}
</script>
 <script>
$(document).ready(function(e) {
    $(".lazy").lazyload();
});

$(document).ready(function(e) {
	 $('[data-toggle="tooltip"]').tooltip();
});
</script>           

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






<!--google-->
<!--<script>
function gPlus(url){
    window.open(
        'https://plus.google.com/share?url='+url,
        'popupwindow',
        'scrollbars=yes,width=800,height=600'
    ).focus();
    return false;
}
</script>-->

<!--google-->