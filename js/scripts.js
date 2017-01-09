(function ($, root, undefined) {

	$(function () {

		'use strict';
		// DOM ready, take it away


		$('.st-menu ul.sub-menu').appendTo('.dropdown-wrap');


// MAIN NAVIGATION (MOBILE VERSION)
		$('#openMenu, #closeBtn').click(function(){
			$('aside').toggleClass('openMenu');
		});


// NESTED NAVIGATION ON ASIDE (MOBILE VERSION)
		$('li#dropdown a').click(function(){
			$('.dropdown-menu').toggleClass('openDropdown');
		});


// TRIGGER SEARCH BOX
		$('#openSearch').click(function(){
			$('#searchBox').toggleClass('openSearch');
		});


// TRIGGER DROPDOWN FORM ST-MENU
		$('.dropdownStTrigger').click(function(){
			$('#dropdownWrapStMenu').toggleClass('openStDropdown');
			$(this).toggleClass('openStDropdown');
		});


// GALLERY SLIDER
		$('.img-video-slider .slider').slick({
			infinite: false,
			slidesToShow: 1,
			slidesToScroll: 2,
			dots: false,
			arrows: true,
			variableWidth: true,
			centerMode: true,
			responsive: [
			{
			breakpoint: 800,
			settings: {
					variableWidth: true,
					slidesToShow: 2
				}
			},
			{
			breakpoint: 600,
			settings: {
					variableWidth: false,
					slidesToShow: 1
				}
			}]
		});


// GALLERY SLIDER
		$('.hero-slider .slider').slick({
			infinite: false,
			slidesToShow: 1,
			slidesToScroll: 1,
			dots: true,
			arrows: true
		});


// GALLERY SLIDER
		$('.projects-slider .slider').slick({
			infinite: true,
			slidesToShow: 4,
			slidesToScroll: 1,
			dots: false,
			arrows: true,
			responsive: [
			{
			breakpoint: 1300,
			settings: {
					slidesToScroll: 2,
					slidesToShow: 3
				}
			},
			{
			breakpoint: 900,
			settings: {
					slidesToScroll: 2,
					slidesToShow: 2
				}
			},
			{
			breakpoint: 600,
			settings: {
					slidesToScroll: 1,
					slidesToShow: 1
				}
			}]
		});


// PROJECTS SLIDER
		$('.full-slider .slider').slick({
			infinite: true,
			slidesToShow: 4,
			slidesToScroll: 1,
			dots: false,
			arrows: true,
			responsive: [
			{
			breakpoint: 1300,
			settings: {
					slidesToScroll: 2,
					slidesToShow: 3
				}
			},
			{
			breakpoint: 900,
			settings: {
					slidesToScroll: 2,
					slidesToShow: 2
				}
			},
			{
			breakpoint: 600,
			settings: {
					slidesToScroll: 1,
					slidesToShow: 1
				}
			}]
		});


// PROFILES SLIDER
		$('#profile-thumb-slider').slick({
			slidesToShow: 8,
			slidesToScroll: 1,
			dots: false,
			arrows: true,
			responsive: [
			{
			breakpoint: 1300,
			settings: {
					slidesToScroll: 2,
					slidesToShow: 6
				}
			},
			{
			breakpoint: 1200,
			settings: {
					slidesToScroll: 2,
					slidesToShow: 4
				}
			},
			{
			breakpoint: 800,
			settings: {
					slidesToScroll: 1,
					slidesToShow: 3
				}
			},
			{
			breakpoint: 400,
			settings: {
					slidesToScroll: 1,
					slidesToShow: 1
				}
			}]
		});


// MOVE MARQUEE
		$(".marquee").each(function() {
			var marqWidth = $(this).find(".small-txt").width();
			// var marqLength = $(this).find(".small-txt").text().length;
			if( marqWidth > 216 ){
				$(this).find(".small-txt").addClass('moveMarquee');
			}
		});


// TIMELINE SLIDER
		$('.timeline-block ul').slick({
			infinite: false,
			slidesToShow: 3,
			slidesToScroll: 1,
			dots: false,
			arrows: true,
			responsive: [
			{
			breakpoint: 800,
			settings: {
					slidesToScroll: 1,
					slidesToShow: 2
				}
			},
			{
			breakpoint: 600,
			settings: {
					slidesToScroll: 1,
					slidesToShow: 1
				}
			}]
		});

		$('.timeline-block ul').on('afterChange', function (event, slick, currentSlide) {
			if(currentSlide === 0) {
				$('.slick-prev').css({'opacity' : '0'});
			}
			else {
				$('.slick-prev').css({'opacity' : '1'});
			}
		});

		var controller = $.superscrollorama();
		controller.pin($('#vectorStroke'), 4000, {
			anim: (new TimelineLite())
			.append(
				TweenMax.fromTo($('#cir1'), 1,
					{css:{'margin-top' : '-50px'}, immediateRender:true},
					{css:{'margin-top' : '50px'}})
			),
			// .append(
			// 	TweenMax.to($('#cir1'), 1,
			// 	{css:{left: 200}})
			// ),
			onPin: function() {
				$('#vectorStroke').addClass('show');
				$(window).scroll(startCounter);
				function startCounter() {
					if ($(window).scrollTop() > 200) {
						$(window).off("scroll", startCounter);
						$('.count').each(function () {
							var $this = $(this);
							jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
								duration: 1000,
								easing: 'swing',
								step: function () {
									$this.text(Math.ceil(this.Counter));
								}
							});
						});
					}
				}
			},
			onUnpin: function() {
				$('#vectorStroke').removeClass('show');
			}
		});
		controller.pin($('#vectorPath'), 4000, {
			// anim: (new TimelineLite())
			// .append(
			// 	TweenMax.to($('#cir2'), 1,
			// 	{css:{'margin-right': '50px'}},
			// 	{css:{'margin-right': '-120px'}})
			// ),
			onPin: function() {
				$('#vectorPath').addClass('show');
				$('#cir2').addClass('show');

				var loader     = new TimelineMax({ repeat: 0, yoyo: true }),
				svglength  = $('#vectorPath svg polygon').length,
				bubbles    = [];

				for(var i = 1, l = svglength; i <= l; i++) {
					bubbles.push($('#vectorPath polygon:nth-of-type('+ i +'), #vectorPath path:nth-of-type('+ i +')'));
				}

				loader.staggerTo(bubbles, 0.1, {
					css : {
						fill: '#396FB6',
						opacity: 1
					}
				}, 0.1);

				$(window).scroll(startCounter);
				function startCounter() {
					if ($(window).scrollTop() > 200) {
						$(window).off("scroll", startCounter);
						$('.count').each(function () {
							var $this = $(this);
							jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
								duration: 1000,
								easing: 'swing',
								step: function () {
									$this.text(Math.ceil(this.Counter));
								}
							});
						});
					}
				}
			},
			onUnpin: function() {
				$('#vectorPath').removeClass('show');
				$('#cir2').removeClass('show');

				var loader     = new TimelineMax({ repeat: 1, yoyo: true }),
				svglength  = $('#vectorPath svg polygon').length,
				bubbles    = [];

				for(var i = 1, l = svglength; i <= l; i++) {
					bubbles.push($('#vectorPath polygon:nth-of-type('+ i +'), #vectorPath path:nth-of-type('+ i +')'));
				}

				loader.staggerTo(bubbles, 0, {
					css : {
						fill: '#396FB6',
						opacity: 0
					}
				}, 0);
			}
		});
		controller.pin($('#vectorIcons'), 4000, {
			onPin: function () {
				// $('#vectorIcons ul > li').each(function(i) {
				// 	$(this).fadeOut(0).delay(20*i).fadeIn(150);
				// });
				$('#cir3').addClass('show');

				// ANIMATE LISTED ICONS
				var v = $("#vectorIcons ul > li").css('visibility', 'hidden'), cur = 0;
				for(var j, x, i = v.length; i; j = parseInt(Math.random() * i), x = v[--i], v[i] = v[j], v[j] = x);
				function fadeInNextLI() {
					v.eq(cur++).css({'visibility':'visible'}).hide().fadeIn();
					if(cur != v.length) setTimeout(fadeInNextLI, 3);
				}
				fadeInNextLI();

				// ANIMATE COUNTER
				$(window).scroll(startCounter);
				function startCounter() {
					if ($(window).scrollTop() > 200) {
						$(window).off("scroll", startCounter);
						$('.count').each(function () {
							var $this = $(this);
							jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
								duration: 1000,
								easing: 'swing',
								step: function () {
									$this.text(Math.ceil(this.Counter));
								}
							});
						});
					}
				}
			},
			onUnpin: function() {
				$('#cir3').removeClass('show');
			}
		});
		controller.pin($('#vectorHab'), 4000, {
			onPin: function () {
				$('#cir3').addClass('show');

				// ANIMATE LISTED ICONS
				var v = $("#vectorHab ul > li").css('visibility', 'hidden'), cur = 0;
				for(var j, x, i = v.length; i; j = parseInt(Math.random() * i), x = v[--i], v[i] = v[j], v[j] = x);
				function fadeInNextLI() {
					v.eq(cur++).css('visibility','visible').hide().fadeIn();
					if(cur != v.length) setTimeout(fadeInNextLI, 3);
				}
				fadeInNextLI();

				// ANIMATE COUNTER
				$(window).scroll(startCounter);
				function startCounter() {
					if ($(window).scrollTop() > 200) {
						$(window).off("scroll", startCounter);
						$('.count').each(function () {
							var $this = $(this);
							jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
								duration: 1000,
								easing: 'swing',
								step: function () {
									$this.text(Math.ceil(this.Counter));
								}
							});
						});
					}
				}
			},
			onUnpin: function() {
				$('#cir3').removeClass('show');
			}
		});



		var $newdiv = $('<li><img src="img/icon-person.svg" alt=""></li>');
		for (var i = 0; i < 324; i++) {
			$newdiv = $('<li><img src="img/icon-person.svg" alt=""></li>');
			$('#vectorHab .table-cell > ul').append($newdiv);
		}

		var $newdiv = $('<li><img src="img/icon-house.png" alt=""></li>');
		for (var i = 0; i < 324; i++) {
			$newdiv = $('<li><img src="img/icon-house.png" alt=""></li>');
			$('#vectorIcons .table-cell > ul').append($newdiv);
		}


	});

})(jQuery, this);
