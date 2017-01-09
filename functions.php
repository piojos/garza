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


if (function_exists('add_theme_support')) {
	// Add Menu Support
	add_theme_support('menus');

	// Add Thumbnail Theme Support
	add_theme_support('post-thumbnails');
	add_image_size('medium', 450, '', true); // Medium Thumbnail
	add_image_size('large', 1200, '', true); // Large Thumbnail
	add_image_size('huge', 2000, '', true); // Huge Thumbnail
	// add_image_size('small', 120, '', true); // Small Thumbnail


	// Enables post and comment RSS feed links to head
	add_theme_support('automatic-feed-links');

	// Localisation Support
	load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}


//    2 Borrar tamaño original de disco y opción

	function replace_uploaded_image($image_data) {
		// if there is no large image : return
		if (!isset($image_data['sizes']['huge'])) return $image_data;

		// paths to the uploaded image and the large image
		$upload_dir = wp_upload_dir();
		$uploaded_image_location = $upload_dir['basedir'] . '/' .$image_data['file'];
		$large_image_filename = $image_data['sizes']['huge']['file'];

		// Do what wordpress does in image_downsize() ... just replace the filenames ;)
		$image_basename = wp_basename($uploaded_image_location);
		$large_image_location = str_replace($image_basename, $large_image_filename, $uploaded_image_location);

		// delete the uploaded image
		unlink($uploaded_image_location);

		// rename the large image
		rename($large_image_location, $uploaded_image_location);

		// update image metadata and return them
		$image_data['width'] = $image_data['sizes']['huge']['width'];
		$image_data['height'] = $image_data['sizes']['huge']['height'];
		unset($image_data['sizes']['huge']);

		// Check if other size-configurations link to the large-file
		foreach($image_data['sizes'] as $size => $sizeData) {
		  if ($sizeData['file'] === $large_image_filename)
		      unset($image_data['sizes'][$size]);
		}

		return $image_data;
	}
	add_filter('wp_generate_attachment_metadata', 'replace_uploaded_image');


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
		$obj = get_post_type_object( get_post_type($post->ID) );
		$thisType = wp_get_post_terms(get_the_id(), $obj->taxonomies[0]);
		$catSlug = $thisType[0]->slug;

		if($cat[0]->slug == 'colonias') { $class = ' bg-aqua'; }
		elseif(is_singular('eventos')) { $class = ' bg-white'; }
		elseif(is_singular('proyectos') OR is_tax()) {
			if($catSlug == 'mejora-del-entorno') $class = ' bg-red';
			if($catSlug == 'cluster') $class = ' bg-yellow';
			if($catSlug == 'evolucion-del-campus') $class = ' bg-blue';
		}
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


	// Allow Space breaks
	remove_filter ('acf_the_content', 'wpautop');



	// Cards

	function card($width = 4) {
	// 	Brains

		$obj = get_post_type_object( get_post_type($post->ID) );
		$thisType = wp_get_post_terms(get_the_id(), $obj->taxonomies[0]);

		while (have_rows('status')) {
			the_row();
			$opts = get_sub_field('options');
			$prog = get_sub_field('percent');
		}
		if($opts['value'] == 'percent') {
			$sLabel = '<b>'. $prog.'%</b> Terminado';
			$sPercent = $prog;
		} elseif($opts['value'] == 'prox') {
			$sLabel = '<b>'. $opts['label'] .'</b>';
			$sPercent = 0;
		} else {
			$sLabel = '<b>'. $opts['label'] .'</b>';
			$sPercent = 100;
		}
		$catSlug = $thisType[0]->slug;
		if($catSlug == 'mejora-del-entorno') $barClass = ' red';
		if($catSlug == 'cluster') $barClass = ' yellow';
		// if($catSlug == 'evolucion-del-campus') ;

		if($width == 5) {
			$widthClass = 'one-fifth ';
		} else {
			$widthClass = 'one-fourth ';
		}

		if(get_post_type() == 'eventos') {
			$date = get_field('date', false, false);
			$date = new DateTime($date);
		}



		$cardOut = '<div class="'.$widthClass.'columns">';

// Don't link if Proximamente
		if($opts['value'] != 'prox') $cardOut .= '<a href="'.get_the_permalink().'" title="'.get_the_title().'">';
		if(has_post_thumbnail()) $cardOut .= '<div class="img" style="background-image: url('.get_the_post_thumbnail_url($post->ID, 'medium' ).');"></div>';

		$cardOut .= '<div class="txt">';

			if(get_post_type() == 'eventos') {
			$cardOut .= '
			<div class="cir-date">
				<div class="date" style="background-color:#F5F5F5;">
					<p><span>'.$date->format('M').'</span></p><p>'.$date->format('j').'</p>
				</div>
				<img class="logo" src="'.get_field('img', 'tipos_de_eventos_'.$thisType[0]->term_id).'" alt="">
			</div>';
			if($thisType) $cardOut .= '<p class="small-txt c-blue" style="color:'.get_field('color', 'tipos_de_eventos_'.$thisType[0]->term_id).';"><b>'.listCategories($thisType).'</b></p>';
			}

			$cardOut .= '<h3>'. get_the_title() .'</h3>';

			if (has_category( 'blog' )) $cardOut .= '<p>'.get_the_time('j \d\e F Y').'</p>';

			if(get_post_type() == 'proyectos') {
				if($thisType) $cardOut .= '<p class="small-txt c-blue mb20" style="color:'.get_field('color', 'tipos_de_proyectos_'.$thisType[0]->term_id).';"><b>'.listCategories($thisType).'</b></p>';
				$cardOut .= '<div class="marquee"><p class="small-txt"><b>'.listTitles(get_field('zone')).'</b></p></div>';
			}

		$cardOut .= '</div>'; // Close .txt

		if(get_post_type() == 'proyectos') {
			$cardOut .= '
			<div class="thumb-progress-bar'.$barClass.'">
				<p>'.$sLabel.'</p>
				<div style="width:'.$sPercent.'%;" class="bg-blue"></div>
			</div>';
		}

		if($opts['value'] != 'prox') $cardOut .= '</a>';
		$cardOut .= '</div>';

		return $cardOut;
	}
