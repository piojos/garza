<?php

	get_header();
	get_template_part('inc/breadcrumbs');
	$nlURL = get_field('nl_url') ?>


	<!-- HEADING PAGE TITLE-OTHERSPECS-PROGRESS BLOCK -->
	<section class="ptb100">
		<div class="wrap">
			<div class="two-col columns">
				<h1><strong>Contáctanos</strong></h1>
			</div>
			<div class="two-col columns">
				<h1><?php the_field('excerpt'); ?></h1>
			</div>
		</div>
	</section><?php

	if(get_field('cform')) { ?>
	<section class="contact-block" style="background-image: url(<?php bloginfo('template_url'); ?>/img/map-bg.jpg);"></div>
		<div class="bg-sand-mask"></div>
		<div class="wrap">
			<h3><strong>Escríbenos:</strong></h3>
			<?php the_field('cform'); ?>
		</div>
	</section><?php
	} ?>


	<section class="ptb100">
		<div class="wrap bg-line pt20"><?php

	if(have_rows('forms')) {
		while (have_rows('forms')) {
			the_row(); ?>
			<div class="one-fourth columns">
				<h3><?php the_sub_field('forma'); ?>:</h3>
				<a href="<?php the_sub_field('url'); ?>" class="c-aqua"><strong><?php the_sub_field('texto'); ?></strong></a>
			</div><?php
		}
	}

	if(have_rows('locaciones')) { ?>

		<div class="mt40 rectangle-thumbnails"><?php
		while (have_rows('locaciones')) {
			the_row(); ?>
			<div class="two-col columns"><?php

				$address = get_sub_field('address');
				$location = get_sub_field('map');
				$img = get_sub_field('img');

				if( !empty($location) ) { ?>
				<div class="img" id="gMap">
					<div class="acf-map">
						<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
					</div>
				</div><?php
				} else { ?>
				<div class="img" style="background-image: url('<?php echo $img['sizes']['large']; ?>');"></div><?php
				} ?>

				<div class="txt">
					<h1><?php the_sub_field('name'); ?></h1><?php
					if($address) {
						echo '<h5>'.$address.'</h5>';
					} else {
						echo '<h5>'.$location['address'].'</h5>';
					} ?>
				</div>
			</div><?php
		} ?>
		</div><?php
	} ?>
		</div>
	</section><?php

	if($nlURL) { ?>
		<div class="newsletter-block" style="background-image: url(<?php bloginfo('template_url'); ?>/img/about1.jpg);">
			<div class="bg-aqua-mask"></div>
			<a href="<?php echo $nlURL; ?>" class="ptb100" target="_blank">
				<div class="one-fourth">
					<h1 class="c-white"><strong>Suscríbete a nuestro Newsletter</strong></h1>
				</div>
			</a>
		</div><?php
	}


	get_footer(); ?>
