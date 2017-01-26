(function ($, root, undefined) {

	$(function () {

		'use strict';
		// DOM ready, take it away

		//FADE MENU ON SCROLL
		$(window).scroll(function() {
			var tap = $(window).scrollTop();
			var heroFixed = $('.hero-fixed').offset().top;
			var map1 = $('#map1').offset().top - 300;
			var map2 = $('#map2').offset().top - 300;
			var blockIcons = $('#blockIcons').offset().top - 300;
			var blockHab = $('#blockHab').offset().top - 200;
			var blockInfo = $('#blockInfo').offset().top - 200;
			var blockInfo2 = $('#blockInfo').offset().top + 200;

			if ( tap > heroFixed ) {
				$('#fixMenu').addClass('fixtop');
			} if ( tap < heroFixed ) {
				$('#fixMenu').removeClass('fixtop');
			} if ( tap > map1 ) {
				$('#map1').addClass('show');
				$('#cir').addClass('show');
			} if ( tap < map1 ) {
				$('#map1').removeClass('show');
				$('#cir').removeClass('show');
			} if ( tap > map2 ) {
				$('#map2').addClass('show');
				$('#cir2').addClass('show');
			} if ( tap < map2 ) {
				$('#map2').removeClass('show');
				$('#cir2').removeClass('show');
			} if ( tap > blockIcons ) {
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
			} if ( tap < blockIcons ) {
				$('#blockIcons .cir-img-x2').removeClass('show');
			} if ( tap > blockHab ) {
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
			//
			} if ( tap < blockHab ) {
				$('#blockHab').removeClass('show');
				$('#blockHab .cir-img-x2').removeClass('show');
			} if ( tap > blockInfo) {
				$('#blockInfo').addClass('show');
			} if ( tap < blockInfo) {
				$('#blockInfo').removeClass('show');
			} if ( tap > blockInfo2) {
				$('#blockInfo2').addClass('show');
			} if ( tap < blockInfo2) {
				$('#blockInfo2').removeClass('show');
			}

		});

	});

})(jQuery, this);
