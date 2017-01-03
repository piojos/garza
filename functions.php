<?php

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/


/* Proper way to enqueue scripts and styles */

	function wpdocs_theme_name_scripts() {
		wp_enqueue_style( 'Normalizer', get_template_directory_uri() . '/css/normalize.min.css');
		wp_enqueue_style( 'Style', get_stylesheet_uri() );
		wp_enqueue_style( 'Slick', get_template_directory_uri() . '/css/slick.css');
		wp_enqueue_style( 'Shame', get_template_directory_uri() . '/css/shame.css');
		wp_enqueue_script( 'Slickjs', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js', array('jquery') );
		wp_enqueue_script( 'Magic', get_template_directory_uri() . '/js/scripts.js' );
	}
	add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );




/*------------------------------------*\
	Theme Support
\*------------------------------------*/


if (function_exists('add_theme_support'))
{
	// Add Menu Support
	add_theme_support('menus');

	// Add Thumbnail Theme Support
	add_theme_support('post-thumbnails');
	add_image_size('medium', 450, '', true); // Medium Thumbnail
	add_image_size('large', 1200, '', true); // Medium Thumbnail
	// add_image_size('small', 120, '', true); // Small Thumbnail
	// add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');


	// Enables post and comment RSS feed links to head
	add_theme_support('automatic-feed-links');

	// Localisation Support
	load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}




// Register Menus

	function register_my_menus() {
		register_nav_menus(
			array(
				'header-menu' => __( 'Menu principal' ),
				'extra-menu' => __( 'Menu secundario' ),
				'footer-menu' => __( 'Menu inferior' )
			)
		);
	}
	add_action( 'init', 'register_my_menus' );




/*------------------------------------*\
	Functions
\*------------------------------------*/


// Add page slug to body class, love this - Credit: Starkers Wordpress Theme

	function add_slug_to_body_class($classes) {
		global $post;
		if (is_home()) {
			$key = array_search('blog', $classes);
		if ($key > -1) {
			unset($classes[$key]);
		}
		} elseif (is_page()) {
			$classes[] = sanitize_html_class($post->post_name);
		} elseif (is_singular()) {
			$classes[] = sanitize_html_class($post->post_name);
		}

		return $classes;
	}




// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin

	function pagination() {
		global $wp_query;
		$big = 999999999;
		echo paginate_links(array(
			'base' => str_replace($big, '%#%', get_pagenum_link($big)),
			'format' => '?paged=%#%',
			'current' => max(1, get_query_var('paged')),
			'total' => $wp_query->max_num_pages
		));
	}




// Create the Custom Excerpts callback

	function html5wp_excerpt($length_callback = '', $more_callback = '') {
		global $post;
		if (function_exists($length_callback)) {
			add_filter('excerpt_length', $length_callback);
		}
		if (function_exists($more_callback)) {
			add_filter('excerpt_more', $more_callback);
		}
		$output = get_the_excerpt();
		$output = apply_filters('wptexturize', $output);
		$output = apply_filters('convert_chars', $output);
		$output = '<p>' . $output . '</p>';
		echo $output;
	}



/* Google API key */

	function my_acf_init() {
		acf_update_setting('google_api_key', 'AIzaSyCG3l_pG-5BMKnGDpYenf_eUgVSy0wtPes');
	}
	add_action('acf/init', 'my_acf_init');




/* Add options pages */

	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page(array(
			'page_title' 	=> 'Opciones Generales',
			'menu_title'	=> 'Opciones',
			'menu_slug' 	=> 'general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Opciones de Header',
			'menu_title'	=> 'Header',
			'parent_slug'	=> 'general-settings',
		));
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Opciones de Footer',
			'menu_title'	=> 'Footer',
			'parent_slug'	=> 'general-settings',
		));
	}




/* Allow .SVG */

	function cc_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');




// Cambiar Entradas a Descubre

	function change_post_label() {
		global $menu;
		global $submenu;
		$menu[5][0] = 'Descubre';
	}
	add_action( 'admin_menu', 'change_post_label' );




/*------------------------------------*\
	Theme specific Functions
\*------------------------------------*/


// Classes for blocks

	function blockClass($op) {
		if(in_array('push_top', $op)) $classes .= ' push_top';
		if(in_array('push_bot', $op)) $classes .= ' push_bot';
		if(in_array('pad_top', $op)) $classes .= ' pad_top';
		if(in_array('pad_bot', $op)) $classes .= ' pad_bot';

		return $classes;
	}



	// Classes for blocks

	function bg_color($getcat=0) {
		if($getcat) {
			$cat = $getcat;
		} else {
			$cat = get_the_category(get_the_ID());
		}
		if($cat[0]->slug == 'colonias') { $class = ' bg-aqua'; }
		elseif(is_singular('eventos')) { $class = ' bg-white'; }
		else { $class = ' bg-aqua'; }
		return $class;
	}



	// List Titles (Colonias,)

	function listTitles($field) {
		$colonias = '';
		$i = 0;
		$length = count($field);
		if( $field ) :
			foreach( $field as $post_object):
				$colonias .= get_the_title($post_object->ID);
				if (!($i == $length - 1)) $colonias .= ', ';
				$i++;
			endforeach;
		endif;
		return $colonias;
	}


	// List Categories (Tipos de proyecto)

	function listCategories($field) {
		$cats = '';
		$i = 0;
		$length = count($field);
		if( $field ) :
			foreach( $field as $post_object):
				$cats .= $post_object->name;
				if (!($i == $length - 1)) $cats .= ', ';
				$i++;
			endforeach;
		endif;
		return $cats;
	}


	// Query meta through ACF Repeaters

	function my_posts_where( $where ) {

		$where = str_replace("meta_key = 'header_%", "meta_key LIKE 'header_%", $where);
		$where = str_replace("meta_key = 'bloques_%", "meta_key LIKE 'bloques_%", $where);

		return $where;
	}

	add_filter('posts_where', 'my_posts_where');



remove_filter ('acf_the_content', 'wpautop');
