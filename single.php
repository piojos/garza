<?php

	get_header();
	if (have_posts()): while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="wrap tight"><?php 

			if ( has_post_thumbnail()) : // Check if Thumbnail exists
				the_post_thumbnail(); // Fullsize image for the single post
			endif; ?>

			<h1><?php the_title(); ?></h1>

			<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
			<span class="author"><?php _e( 'Published by', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>
			<span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span>

			<div class="content">
				<?php the_content(); ?>
			</div>

			<?php the_tags( __( 'Tags: ' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>

			<p><?php _e( 'Categorised in: ' ); the_category(', '); // Separated by commas ?></p>

			<p><?php _e( 'This post was written by ' ); the_author(); ?></p>

		</div>
	</article><?php

	endwhile;
	else: ?>

	<article>

		<h1><?php _e( 'Sorry, nothing to display.' ); ?></h1>

	</article><?php

	endif;
	get_footer(); ?>
