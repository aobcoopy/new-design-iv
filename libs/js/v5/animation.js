// Home Page
$(window).scroll(function () {
	var myPosition = $(".box_searching").offset().top-8;
	var ele = $(".ex_boxes");
	if ($(this).scrollTop() > myPosition) 
	{
		$(ele).removeClass('hid');
		$(ele).addClass('animate__fadeInUp');
	}
	
	var myPosition = $(".box_searching").offset().top-100;
	var ele = $(".r1,.r2,.r3");
	if ($(this).scrollTop() > myPosition) 
	{
		$(ele).removeClass('hid');
		$(ele).addClass('animate__fadeInUp');
	}
	
	var myPosition = $(".category_box").offset().top-700;
	var ele = $(".ca-1,.ca-2,.ca-3,.ca-4");
	if ($(this).scrollTop() > myPosition) 
	{
		$(ele).removeClass('hid');
		$(ele).addClass('animate__fadeInUp');
	}
	
	var myPosition = $(".story_box").offset().top-300;
	var ele = $(".str_title,.str_det,.str_line");
	if ($(this).scrollTop() > myPosition) 
	{
		$(ele).removeClass('hid');
		$(ele).addClass('animate__fadeInUp');
	}
	
	var myPosition = $(".s1").offset().top-400;
	var ele = $(".sp1,.sd1");
	var ele1 = $(".sp1");
	var ele2 = $(".sd1");
	if ($(this).scrollTop() > myPosition) 
	{
		$(ele).removeClass('hid');
		$(ele1).addClass('animate__fadeInLeft');
		$(ele2).addClass('animate__fadeIn');
	}
	
	var myPosition = $(".s2").offset().top-400;
	var ele = $(".sp2,.sd2");
	var ele1 = $(".sp2");
	var ele2 = $(".sd2");
	if ($(this).scrollTop() > myPosition) 
	{
		$(ele).removeClass('hid');
		$(ele1).addClass('animate__fadeInRight');
		$(ele2).addClass('animate__fadeIn');
	}
	
	var myPosition = $(".s3").offset().top-400;
	var ele = $(".sp3,.sd3");
	var ele1 = $(".sp3");
	var ele2 = $(".sd3");
	if ($(this).scrollTop() > myPosition) 
	{
		$(ele).removeClass('hid');
		$(ele1).addClass('animate__fadeInLeft');
		$(ele2).addClass('animate__fadeIn');
	}
	
	var myPosition = $(".s4").offset().top-400;
	var ele = $(".sp4,.sd4");
	var ele1 = $(".sp4");
	var ele2 = $(".sd4");
	if ($(this).scrollTop() > myPosition) 
	{
		$(ele).removeClass('hid');
		$(ele1).addClass('animate__fadeInRight');
		$(ele2).addClass('animate__fadeIn');
	}
});