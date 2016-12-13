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
		$(document).ready(function() {
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
		});

// MOVE MARQUEE
		$(document).ready(function(){
			$(".marquee").each(function() {
				var marqWidth = $(this).find(".small-txt").width();
				if( marqWidth > 216 ){
					$(this).find(".small-txt").addClass('moveMarquee');
				}
			});
		});



	});

})(jQuery, this);
