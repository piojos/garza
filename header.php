<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700" rel="stylesheet">
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

		<header>
			<div class="three-cols">
				<div class="burger" id="openMenu">
					<div class="wrapper"><div></div><div></div><div></div></div>
				</div>
				<div class="logo"><a href="<?php echo home_url(); ?>" title="Inicio"><img src="<?php bloginfo('template_url'); ?>/img/logo.svg" alt="Distrito Tec"></a></div>
				<div class="st-menu">
					<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' => false ) ); ?>
				</div>
				<div class="nd-menu">
					<?php wp_nav_menu( array( 'theme_location' => 'extra-menu', 'container' => false ) ); ?>
					<div class="search">
						<img src="<?php bloginfo('template_url'); ?>/img/search.svg" alt="Search" id="openSearch">
					</div>
				</div>
			</div>
		</header>

		<!-- HIDDEN ELEMENTS FROM HEADER -->
		<div class="dropdown-wrap" id="dropdownWrapStMenu">
		</div>

		<div class="search-wrap">
			<form role="search" method="get" id="searchform" class="searchform" action="http://distritotec.itesm.mx/" _lpchecked="1">
				<input type="text" value="" name="s" id="searchBox" placeholder="Buscar">
				<input type="submit" id="searchsubmit" value="" style="display:none">
			</form>
		</div>
		<!-- HIDDEN ELEMENTS FROM HEADER ENDS-->

		<aside>
			<div class="close-btn" id="closeBtn"><div></div><div></div></div><?php

			wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' => false ) );
			wp_nav_menu( array( 'theme_location' => 'extra-menu', 'container' => false ) ); ?>


			<div class="search">
				<form role="search" method="get" id="searchform" class="searchform" action="http://distritotec.itesm.mx/" _lpchecked="1">
					<input type="text" value="" name="s">
					<input type="submit" id="searchsubmit" value="Buscar">
				</form>
			</div>
			<div class="legal"><p>©Distrito Tec <?php echo current_time('Y'); ?>.</p></div>
		</aside>
