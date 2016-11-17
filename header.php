<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<!-- <script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script> -->

	</head><?php

	$currentID = get_the_ID();
	$dtml = get_field('dtmenu_left', 'options');
	$dtmr = get_field('dtmenu_right', 'option');
	$mainLogo = get_field('logo_main', 'options');
	$animatedLogo = get_field('logo_anim', 'options');

	function dtmenu_elements($rep, $cID) {
		foreach($rep as $post_object):
			$isCurrent = '';
			if($post_object->ID == $cID) $isCurrent = ' class="current"';
			$elements .= '<a href="'. get_permalink($post_object->ID) .'"'.$isCurrent.'><span>'. get_the_title($post_object->ID) .'</span></a>';
		endforeach;
		return $elements;
	}

	?>
	<body <?php body_class(); ?>>

	<header class="header clear" role="banner">
		<div class="dt_nav wrap"><?php

			// print_r($dtml);
			echo dtmenu_elements($dtml, $currentID);
			?>
			<a href="<?php echo home_url(); ?>" class="logo"><?php
				if( !empty($animatedLogo) ): ?>
					<img src="<?php echo $animatedLogo['url']; ?>" alt="<?php echo $animatedLogo['alt']; ?>" class="random hide" /><?php
				endif;
				if( !empty($mainLogo) ): ?>
					<img src="<?php echo $mainLogo['url']; ?>" alt="<?php echo $mainLogo['alt']; ?>" class="real" /><?php
				endif; ?>
			</a><?php

			// print_r($dtmr);
			echo dtmenu_elements($dtmr, $currentID); ?>

		</div>
		<div class="mobile bar"><?php

		if( !empty($mainLogo) ): ?>
			<a href="<?php echo home_url(); ?>" class="mobile_logo">
				<img src="<?php echo $mainLogo['url']; ?>" alt="<?php echo $mainLogo['alt']; ?>" width="24" />
			</a><?php
		endif; ?>
			<h1 class="breadcrumbs">Inicio / Promos</h1>
			<button class="toggle"><span>🍔</span><span class="hide">❌</span></button>
		</div><?php

		if( have_rows('mb_menu', 'options') ): ?>
		<nav class="nav mobile" role="navigation"><?php
			while ( have_rows('mb_menu', 'options') ) : the_row();
				$options = get_sub_field('options');
				$isSub = '';

				if(in_array('url', $options)) { ?>
			<a href="<?php the_sub_field('ext_url'); ?>"<?php if(in_array('sub', $options)) echo ' class="sub"';?>><?php the_sub_field('name'); ?></a><?php

				} else {

					$post_object = get_sub_field('page-item');
					if(in_array('sub', $options)) $isSub = ' class="sub"';
					if( $post_object ):
						$post = $post_object;
						setup_postdata( $post ); ?>
			<a href="<?php the_permalink(); ?>"<?php echo $isSub; ?>><?php the_title(); ?></a><?php

					wp_reset_postdata();
				endif;
				}
			endwhile; ?>
		</nav><?php
		endif; ?>
	</header>

	<div class="stripe">
		<div class="wrap">
			<div>Buen día Bro</div>
			<div class="text_promo"><?php the_field('stripe_promo', 'option'); ?></div>
			<div id="currentTime"></div>
		</div>
	</div>
