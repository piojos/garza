<?php

	// when on home
	$ftd_food = get_sub_field('selected_food');

	$currentTitle = get_the_title(get_the_ID()); // Title of page you're in
	$currentID = get_the_ID(); // ID of page you're in

	global $thisID;

	// echo get_the_ID();


	// Page: Inicio / Promos
	if( $ftd_food ): ?>
	<div class="slider wrap"><?php
		foreach( $ftd_food as $post):
			setup_postdata($post);
		get_template_part('inc/card', 'food');
		endforeach; ?>
	</div><?php
	wp_reset_postdata();


	// Page: Cualquier Y MENU
	else :

		$query = new WP_Query( 'post_type=food&cat='.$thisID );

		if ( $query->have_posts() ) : ?>
	<div class="slider wrap"><?php
			while ( $query->have_posts() ) : $query->the_post();

			get_template_part('inc/card', 'food');

			endwhile;
			wp_reset_postdata();
		else : ?>
		<p><?php _e( 'No hay comida que mostrar.' ); ?></p>
	</div><?php

		endif;


	endif;

	$thisID = ''; // reset variable ?>
