(function ($, root, undefined) {

	$(function () {

		'use strict';
		// DOM ready, take it away


		$('.st-menu ul.sub-menu').appendTo('.dropdown-wrap');

		$('aside li.menu-item-has-children').removeClass('dropdown-menu');
		$('aside li.menu-item-has-children > a').remove();

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

// TRIGGER DROPDOWN FORM FIXED MENU
		$('#fixMenu .burger').click(function(){
			$('#fixMenu').toggleClass('show');
		});


// GALLERY SLIDER
		$('.img-video-slider .slider').slick({
			infinite: true,
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

		//FADE MENU ON SCROLL

		console.log('6');
		$(window).scroll(function() {
			var top = $(window).scrollTop();

			var heroFixed = $('.hero-fixed').offset().top;
			var map1 = $('#map1').offset().top - 300;
			var map2 = $('#map2').offset().top - 300;
			var blockIcons = $('#blockIcons').offset().top - 300;
			var blockHab = $('#blockHab').offset().top - 200;
			var blockInfo = $('#blockInfo').offset().top - 200;
			var blockInfo2 = $('#blockInfo').offset().top + 200;

			var topMedia = $(".hero-slider").offset().top;
			var bottomMedia = $(".wrap.thumbnail-fourths").offset().top;

			if ( top > heroFixed ) {
				$('#fixMenu').addClass('fixtop');
			} if ( top < heroFixed ) {
				$('#fixMenu').removeClass('fixtop');
			} if ( top > map1 ) {
				$('#map1').addClass('show');
				$('#cir').addClass('show');
			} if ( top < map1 ) {
				$('#map1').removeClass('show');
				$('#cir').removeClass('show');
			} if ( top > map2 ) {
				$('#map2').addClass('show');
				$('#cir2').addClass('show');
			} if ( top < map2 ) {
				$('#map2').removeClass('show');
				$('#cir2').removeClass('show');
			} if ( top > blockIcons ) {
				$('#blockIcons .cir-img-x2').addClass('show');
				$('#blockIcons').addClass('show');
				var divs = $("#blockIcons ul li");
				var interval = setInterval(function () {
					var ds = divs.not(".listedelements");
					ds.eq(Math.floor(Math.random() * ds.length)).addClass('listedelements');
					if (ds.length == 1) {
						clearInterval(interval);
					}
				}, 100);

			} if ( top < blockIcons ) {
				$('#blockIcons .cir-img-x2').removeClass('show');
			} if ( top > blockHab ) {
				$('#blockHab .cir-img-x2').addClass('show');
				$('#blockHab').addClass('show');
				var divs = $("#blockHab ul li");
				var interval = setInterval(function () {
					var ds = divs.not(".listedelements");
					ds.eq(Math.floor(Math.random() * ds.length)).addClass('listedelements');
					if (ds.length == 1) {
						clearInterval(interval);
					}
				}, 300);

			} if ( top < blockHab ) {
				$('#blockHab').removeClass('show');
				$('#blockHab .cir-img-x2').removeClass('show');
			} if ( top > blockInfo) {
				$('#blockInfo').addClass('show');
			} if ( top < blockInfo) {
				$('#blockInfo').removeClass('show');
			} if ( top > blockInfo2) {
				$('#blockInfo2').addClass('show');
			} if ( top < blockInfo2) {
				$('#blockInfo2').removeClass('show');
			}

			if ( top > topMedia) {
				$(".share-media-btns").addClass('show');
			} if ( top < topMedia) {
				$(".share-media-btns").removeClass('show');
			} if ( top > bottomMedia) {
				$(".share-media-btns").removeClass('show');
			}

		});


		var $newdiv = $('<li><img src="http://prod011azws05.southcentralus.cloudapp.azure.com/wp-content/uploads/2016/11/blockhab2.png" alt=""></li>');
		for (var i = 0; i < 324; i++) {
			$newdiv = $('<li><img src="http://prod011azws05.southcentralus.cloudapp.azure.com/wp-content/uploads/2016/11/blockhab2.png" alt=""></li>');
			$('#vectorHab .table-cell > ul').append($newdiv);
		}

		var $newdiv = $('<li><img src="http://prod011azws05.southcentralus.cloudapp.azure.com/wp-content/uploads/2016/11/icon-house.png" alt=""></li>');
		for (var i = 0; i < 324; i++) {
			$newdiv = $('<li><img src="http://prod011azws05.southcentralus.cloudapp.azure.com/wp-content/uploads/2016/11/icon-house.png" alt=""></li>');
			$('#vectorIcons .table-cell > ul').append($newdiv);
		}

		$.each($('.ancla'), function() {
			var listAnclaId = this.id;
			$("#fixMenu .st-menu > ul").append( "<li><a href= '#"+ listAnclaId +"'> " + listAnclaId +" </a> </li>" );
			//alert( this.id );
		});


	});

})(jQuery, this);
