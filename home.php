<?php get_header();



	// Related
	$randomProjects = new WP_Query( array(
		'post_type' => 'proyectos',
		'posts_per_page' => 4,
		// 'orderby' => 'rand',
		// 'post__not_in' => array( get_the_id() )
	) );

	if ( $randomProjects->have_posts() ) : ?>

	<section class="bg-sand">
	<div class="wrap thumbnail-fourths">
		<h1 class="c-blue">Proyectos </br>de Distrito Tec</h1><?php


		while ( $randomProjects->have_posts() ) :
			$randomProjects->the_post(); ?>
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
			</div><?php


		endwhile;
		wp_reset_postdata(); ?>
	</div>
	</section><?php
	endif;

	get_footer(); ?>
