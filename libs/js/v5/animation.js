// Home Page
$(window).scroll(function () {
	//EXPLORE
	var myPosition = $(".box_searching").offset().top-8;
	var ele = $(".ex_boxes");
	if ($(this).scrollTop() > myPosition) 
	{
		$(ele).removeClass('hid');
		$(ele).addClass('animate__fadeInUp');
	}
	// 
	var myPosition = $(".box_searching").offset().top-100;
	var ele = $(".r1,.r2,.r3");
	if ($(this).scrollTop() > myPosition) 
	{
		$(ele).removeClass('hid');
		$(ele).addClass('animate__fadeInUp');
	}
	// category
	var myPosition = $(".category_box").offset().top-700;
	var ele = $(".ca-1,.ca-2,.ca-3,.ca-4");
	if ($(this).scrollTop() > myPosition) 
	{
		$(ele).removeClass('hid');
		$(ele).addClass('animate__fadeInUp');
	}
	// STORY
	var myPosition = $(".story_box").offset().top-300;
	var ele = $(".str_title,.str_det,.str_line");
	if ($(this).scrollTop() > myPosition) 
	{
		$(ele).removeClass('hid');
		$(ele).addClass('animate__fadeInUp');
	}
	
	var myPosition = $(".s1").offset().top-400;
	var ele = $(".stp1,.std1");
	var ele1 = $(".stp1");
	var ele2 = $(".std1");
	if ($(this).scrollTop() > myPosition) 
	{
		$(ele).removeClass('hid');
		$(ele1).addClass('animate__fadeInLeft');
		$(ele2).addClass('animate__fadeIn');
	}
	
	var myPosition = $(".s2").offset().top-400;
	var ele = $(".stp2,.std2");
	var ele1 = $(".stp2");
	var ele2 = $(".std2");
	if ($(this).scrollTop() > myPosition) 
	{
		$(ele).removeClass('hid');
		$(ele1).addClass('animate__fadeInRight');
		$(ele2).addClass('animate__fadeIn');
	}
	
	var myPosition = $(".s3").offset().top-400;
	var ele = $(".stp3,.std3");
	var ele1 = $(".stp3");
	var ele2 = $(".std3");
	if ($(this).scrollTop() > myPosition) 
	{
		$(ele).removeClass('hid');
		$(ele1).addClass('animate__fadeInLeft');
		$(ele2).addClass('animate__fadeIn');
	}
	
	var myPosition = $(".s4").offset().top-400;
	var ele = $(".stp4,.std4,.sd4");
	var ele1 = $(".stp4");
	var ele2 = $(".std4");
	var ele3 = $(".sd4");
	if ($(this).scrollTop() > myPosition) 
	{
		$(ele).removeClass('hid');
		$(ele1).addClass('animate__fadeInRight');
		$(ele2).addClass('animate__fadeIn');
		$(ele3).addClass('animate__fadeIn');
	}
	//QUICK LINKS
	var myPosition = $(".sql").offset().top-400;
	var ele = $(".ql_tt,.ql_but");
	var ele1 = $(".ql_tt");
	var ele2 = $(".ql_but");
	if ($(this).scrollTop() > myPosition) 
	{
		$(ele).removeClass('hid');
		$(ele1).addClass('animate__fadeInUp');
		$(ele2).addClass('animate__fadeInUp');
	}
	//ABOUT US
	var myPosition = $(".sql").offset().top-100;
	var ele = $(".about_box,.abt1,.abt2,.abb");
	var ele1 = $(".about_box");
	var ele2 = $(".abt1,.abb");
	var ele3 = $(".abt2");
	if ($(this).scrollTop() > myPosition) 
	{
		$(ele).removeClass('hid');
		$(ele1).addClass('animate__fadeInUp');
		$(ele2).addClass('animate__fadeInUp');
		$(ele3).addClass('animate__fadeIn');
	}
	//WHO WE ARE
	var myPosition = $(".tshwr").offset().top-300;
	var ele = $(".hwr_box,.top_hwr_tt,.top_hwr_des");
	var ele1 = $(".hwr_box");
	var ele2 = $(".top_hwr_tt");
	var ele3 = $(".top_hwr_des");
	if ($(this).scrollTop() > myPosition) 
	{
		$(ele).removeClass('hid');
		$(ele1).addClass('animate__fadeInUp');
		$(ele2).addClass('animate__fadeInUp');
		$(ele3).addClass('animate__fadeIn');
	}
	
	var myPosition = $(".tshwr").offset().top;
	var ele = $(".hwp1,.hwt1,.hwd1,.hwp2,.hwt2,.hwd2,.hwp3,.hwt3,.hwd3");
	var ele1 = $(".hwp1,.hwp2,.hwp3");
	var ele2 = $(".hwt1,.hwt2,.hwt3");
	var ele3 = $(".hwd1,.hwd2,.hwd3");
	if ($(this).scrollTop() > myPosition) 
	{
		$(ele).removeClass('hid');
		$(ele1).addClass('animate__fadeInUp');
		$(ele2).addClass('animate__fadeInUp');
		$(ele3).addClass('animate__fadeIn');
	}
	//OUR SERVICES
	var myPosition = $(".our_box").offset().top-400;
	var ele = $(".our_tl,.our_tr,.our_sub_tt,.our_line,.ob1,.ob2,.ob3");
	var ele1 = $(".our_tl,.our_tr,.our_sub_tt");
	var ele2 = $(".our_line");
	var ele3 = $(".ob1,.ob2,.ob3");
	if ($(this).scrollTop() > myPosition) 
	{
		$(ele).removeClass('hid');
		$(ele1).addClass('animate__fadeInLeft');
		$(ele2).addClass('animate__fadeInDown');
		$(ele3).addClass('animate__fadeInRight');
	}
	
	// OUR SUNSTANABLE VILLA CONCEPT
	var myPosition = $(".our_box_1").offset().top-250;
	var ele = $(".our_box_2_tt,.our_box_2_des,.orb,.our_bg");
	var ele1 = $(".our_box_2_des,.orb");
	var ele2 = '';//$(".our_bg");
	var ele3 = $(".our_box_2_tt");
	if ($(this).scrollTop() > myPosition) 
	{
		$(ele).removeClass('hid');
		$(ele1).addClass('animate__fadeInDown');
		$(ele2).addClass('animate__fadeInUp');
		$(ele3).addClass('focus-in-contract');
	}
	
	var myPosition = $(".our_box_2").offset().top-250;
	var ele = $(".our_bg");
	//var ele1 = $(".our_box_2_des,.orb");
	var ele2 = $(".our_bg");
	//var ele3 = $(".our_box_2_tt");
	if ($(this).scrollTop() > myPosition) 
	{
		$(ele).removeClass('hid');
		//$(ele1).addClass('animate__fadeInDown');
		$(ele2).addClass('animate__fadeInUp');
		//$(ele3).addClass('focus-in-contract');
	}
	
	
	//INSPIRING LIFE STYLE
	/*var myPosition = $(".lifestyle_box_1").offset().top-350;
	var ele = $(".lf_tt,.lf_des,.lstB,.rmb");
	var ele1 = $(".lf_tt");
	var ele2 = $(".lf_des");
	var ele3 = $(".lstB,.rmb");
	if ($(this).scrollTop() > myPosition) 
	{
		$(ele).removeClass('hid');
		$(ele1).addClass('focus-in-contract');
		$(ele2).addClass('text-focus-in ');
		$(ele3).addClass('flip-in-hor-top');
	}*/
	//FOLLOW ME ON IG
	/*var myPosition = $(".follow_box").offset().top-350;
	var ele = $(".fl_tt");
	var ele1 = $(".fl_tt");
	if ($(this).scrollTop() > myPosition) 
	{
		$(ele).removeClass('hid');
		$(ele1).addClass('focus-in-contract');
	}
	//CONTACT US
	var myPosition = $(".cc").offset().top-350;
	var ele = $(".con_tt,.ff1,.ff2,.ff3,.ff4,.ff5,.ff6,.contact_box");
	var ele1 = $(".con_tt,.contact_box");
	var ele2 = $(".ff1,.ff2,.ff3,.ff4,.ff5,.ff6");
	if ($(this).scrollTop() > myPosition) 
	{
		$(ele).removeClass('hid');
		$(ele1).addClass('focus-in-contract');
		$(ele2).addClass('puff-in-center');
		//$(".ove").hide();
	}*/
	//footer_box
	/*var myPosition = $(".topf").offset().top-350;
	var ele = $(".ffooootteerr");
	var ele1 = $(".ffooootteerr");
	//var ele2 = $(".ff1,.ff2,.ff3,.ff4,.ff5,.ff6");
	if ($(this).scrollTop() > myPosition) 
	{
		$(ele).removeClass('hid');
		$(ele1).addClass('focus-in-contract');
		//$(ele2).addClass('puff-in-center');
		$(".ove").hide();
	}*/
	
	
});





















