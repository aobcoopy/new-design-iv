(function ($) {
	"use strict";
	[].slice.call(document.querySelectorAll('select.cs-select')).forEach(function (el) {
		new SelectFx(el);
	});
	$('.parallax').parallax("50%", 0.2);
	$('.beactive').addClass('active');
	$('.beactive').removeClass('beactive');
	$('.mg-booking-form > ul > li:nth-child(1)').click(function () {
		if ($('.mg-booking-form > ul > li:nth-child(1)').hasClass('mg-step-done')) {
			$('.mg-booking-form > ul > li:nth-child(1)').removeClass('mg-step-done');
		}
		if ($('.mg-booking-form > ul > li:nth-child(2)').hasClass('mg-step-done')) {
			$('.mg-booking-form > ul > li:nth-child(2)').removeClass('mg-step-done');
		}
		if ($('.mg-booking-form > ul > li:nth-child(3)').hasClass('mg-step-done')) {
			$('.mg-booking-form > ul > li:nth-child(3)').removeClass('mg-step-done');
		}
		if ($('.mg-booking-form > ul > li:nth-child(4)').hasClass('mg-step-done')) {
			$('.mg-booking-form > ul > li:nth-child(4)').removeClass('mg-step-done');
		}
	});
	$('.mg-booking-form > ul > li:nth-child(2)').click(function () {
		$('.mg-booking-form > ul > li:nth-child(1)').addClass('mg-step-done');
		if ($('.mg-booking-form > ul > li:nth-child(2)').hasClass('mg-step-done')) {
			$('.mg-booking-form > ul > li:nth-child(2)').removeClass('mg-step-done');
		}
		if ($('.mg-booking-form > ul > li:nth-child(3)').hasClass('mg-step-done')) {
			$('.mg-booking-form > ul > li:nth-child(3)').removeClass('mg-step-done');
		}
		if ($('.mg-booking-form > ul > li:nth-child(4)').hasClass('mg-step-done')) {
			$('.mg-booking-form > ul > li:nth-child(4)').removeClass('mg-step-done');
		}
	});
	$('.mg-booking-form > ul > li:nth-child(3)').click(function () {
		$('.mg-booking-form > ul > li:nth-child(1)').addClass('mg-step-done');
		$('.mg-booking-form > ul > li:nth-child(2)').addClass('mg-step-done');
		if ($('.mg-booking-form > ul > li:nth-child(3)').hasClass('mg-step-done')) {
			$('.mg-booking-form > ul > li:nth-child(3)').removeClass('mg-step-done');
		}
		if ($('.mg-booking-form > ul > li:nth-child(4)').hasClass('mg-step-done')) {
			$('.mg-booking-form > ul > li:nth-child(4)').removeClass('mg-step-done');
		}
	});
	$('.mg-booking-form > ul > li:nth-child(4)').click(function () {
		$('.mg-booking-form > ul > li:nth-child(1)').addClass('mg-step-done');
		$('.mg-booking-form > ul > li:nth-child(2)').addClass('mg-step-done');
		$('.mg-booking-form > ul > li:nth-child(3)').addClass('mg-step-done');
		if ($('.mg-booking-form > ul > li:nth-child(4)').hasClass('mg-step-done')) {
			$('.mg-booking-form > ul > li:nth-child(4)').removeClass('mg-step-done');
		}
	});
	$('.btn-next-tab').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
		$('html, body').animate({
			scrollTop: $(".mg-booking-form").offset().top - 100
		}, 300);
		$('a[href="' + $(this).attr('href') + '"]').parents('li').trigger('click');
		$('.mg-booking-form > ul > li.active').removeClass('active');
		$('a[href="' + $(this).attr('href') + '"]').parents('li').addClass('active');
	});
	$('.btn-prev-tab').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
		$('html, body').animate({
			scrollTop: $(".mg-booking-form").offset().top - 100
		}, 300);
		$('a[href="' + $(this).attr('href') + '"]').parents('li').trigger('click');
		$('.mg-booking-form > ul > li.active').removeClass('active');
		$('a[href="' + $(this).attr('href') + '"]').parents('li').addClass('active');
	});
	$('.mg-search-box-trigger').click(function () {
		var sbox = $(this).next();
		$(this).find('i').toggleClass('fa-times');
		sbox.toggleClass('mg-sb-active');
		return false;
	});
	if ($(window).width() >= 768) {
		$('.dropdown').hover(function () {
			$(this).addClass('open');
		}, function () {
			$(this).removeClass('open');
		});
	}
	$(window).resize(function () {
		if ($(window).width() >= 768) {
			$('.dropdown').hover(function () {
				$(this).addClass('open');
			}, function () {
				$(this).removeClass('open');
			});
		}
	});
	$('.input-group.mg-check-in').on('show', function (e) {
		$(e.currentTarget).addClass('focus');
	});
	$('.input-group.mg-check-out').on('show', function (e) {
		$(e.currentTarget).addClass('focus');
	});
	$('.input-group.mg-check-out').on('hide', function (e) {
		$(e.currentTarget).removeClass('focus');
	});
	$(window).ready(function () {
		sticky_check(this);
	});
	$(window).scroll(function () {
		sticky_check(this);
	});
	$(window).resize(function () {
		sticky_check(this);
	});

	function sticky_check($this) {
		if ($(window).width() >= 767) {
			if ($($this).scrollTop() > 150) {
				if (!$('.sticky-on-fixed').length && !$('.header.sticky').hasClass('transp')) {
					$('body').prepend('<div class="sticky-on-fixed" style="height:' + $('.header.sticky').height() + 'px"></div>');
				};
				$('.header.sticky').addClass("sticky-on");
			} else {
				$('.header.sticky').removeClass("sticky-on");
				$('.sticky-on-fixed').remove();
			}
		} else {
			$('.header.sticky').removeClass("sticky-on");
			$('.sticky-on-fixed').remove();
		}
	}
	$('#mg-star-position').on('starrr:change', function (e, value) {
		$('#mg-star-position-input').val(value);
	});
	$('#mg-star-comfort').on('starrr:change', function (e, value) {
		$('#mg-star-comfort-input').val(value);
	});
	$('#mg-star-price').on('starrr:change', function (e, value) {
		$('#mg-star-price-input').val(value);
	});
	$('#mg-star-quality').on('starrr:change', function (e, value) {
		$('#mg-star-quality-input').val(value);
	});
	if ($('#mg-map').length) {
		var map = new GMaps({
			el: '#mg-map',
			lat: -37.81792,
			lng: 144.96506,
			zoom: 17
		});
		map.addMarker({
			lat: -37.81792,
			lng: 144.96506,
			title: 'Map',
			infoWindow: {
				content: '<strong>Envato</strong><br>Level 13, 2 Elizabeth St, Melbourne<br>Victoria 3000 Australia'
			}
		});
	}
})(jQuery);

function showLoader(loaderID) {
  var x = document.getElementById(loaderID);
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}