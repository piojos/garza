<?php if (have_posts()): while (have_posts()) : the_post(); ?>


	<div class="one-fourth columns">

		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php
		$thisType = wp_get_post_terms(get_the_id(), 'tipos_de_proyectos');
		if(has_post_thumbnail()) { ?>
			<div class="img" style="background-image: url('<?php the_post_thumbnail_url( 'medium' ); ?>');"></div><?php
		} ?>
			<h3><?php the_title(); ?></h3><?php
		foreach( $thisType as $pType ) { ?>
			<p class="small-txt"><?php echo $pType->name; ?></p><?php
		} ?>
		</a>

		<?php // edit_post_link(); ?>

	</div>
	<!-- /article -->

<?php endwhile; ?>

<?php else: /* ?>

	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article><?php
*/
endif; ?>
