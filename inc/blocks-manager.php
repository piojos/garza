<?php

if( have_rows('blocks') ):
	while ( have_rows('blocks') ) : the_row();

		if( get_row_layout() == 'promo' ):
			get_template_part('inc/bl', 'promo');

		elseif( get_row_layout() == 'tours' ):
			get_template_part('inc/bl', 'tours');

		elseif( get_row_layout() == 'ftd_food' ):
			get_template_part('inc/bl', 'ftd_food');

		elseif( get_row_layout() == 'ratings' ):
			get_template_part('inc/bl', 'ratings');

		elseif( get_row_layout() == 'separator' ): ?>
			<div class="block separator<?php echo blockClass(get_sub_field('options')); ?>">
				<div class="wrap">
					<hr>
				</div>
			</div><?php

		elseif( get_row_layout() == 'video' ):
			get_template_part('inc/bl', 'video');

		elseif( get_row_layout() == 'about' ):
			get_template_part('inc/bl', 'about');

		elseif( get_row_layout() == 'faq' ):
			get_template_part('inc/bl', 'faq');

		elseif( get_row_layout() == 'news' ):
			get_template_part('inc/bl', 'newsfeed');

		elseif( get_row_layout() == 'contact' ):
			get_template_part('inc/bl', 'contacto');

		// elseif( get_row_layout() == '' ):
		// 	get_template_part('inc/bl', '');

		endif;

	endwhile;
endif; ?>
