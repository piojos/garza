<?php

if( have_rows('bloques') ):
	while ( have_rows('bloques') ) : the_row();

		if( get_row_layout() == 'quote' ):
			get_template_part('inc/bl', 'quote');

		elseif( get_row_layout() == 'description' ):
			get_template_part('inc/bl', 'about');

		elseif( get_row_layout() == 'gallery' ):
			get_template_part('inc/bl', 'slider');

		elseif( get_row_layout() == 'profiles' ):
			get_template_part('inc/bl', 'profiles');

		elseif( get_row_layout() == 'story' ):
			get_template_part('inc/bl', 'story');

		// elseif( get_row_layout() == '' ):
		// 	get_template_part('inc/bl', '');

		endif;

	endwhile;
endif; ?>
