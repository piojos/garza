<?php

	get_header();
	get_template_part('inc/breadcrumbs');

	// $pTypes = get_terms('tipos_de_proyectos');

	$ftdGallery = get_field('ftd_gallery');
	$cat = get_the_category();

	if ( have_posts() ) : while ( have_posts() ) : the_post();

		if(in_category('colaboradores')) {
			get_template_part('inc/single', 'colaboradores');
		} else {
?>
<section class="<?php echo bg_color(); ?>">
	<div class="wrap"><?php

	if(is_singular('proyectos')) {
		get_template_part('inc/h', 'colonia');
	} else {
		if(in_category('historias')) {
			get_template_part('inc/h', 'historia');
		} else {
			get_template_part('inc/h', 'single');
		}
	}

	?>
	</div>
</section><?php


	if(has_post_thumbnail() OR $ftdGallery) { ?>
	<div class="hero-slider<?php echo bg_color(); ?>">
		<ul class="slider"><?php
		if(has_post_thumbnail()) { ?>
			<li><div style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');"></div></li><?php
		}
		if($ftdGallery) {
			foreach( $ftdGallery as $image ) : ?>
			<li><div style="background-image:url('<?php echo $image['sizes']['large']; ?>');" alt="<?php echo $image['alt']; ?>"></div></li><?php
			endforeach;
		} ?>
		</ul>
	</div><?php
	}


	if($cat[0]->slug == 'colonias') {
		get_template_part('inc/s', 'stats');
	}


	// Contenido
	get_template_part('inc/blocks', 'manager');


	// Related
	$randomProjects = new WP_Query( array(
		'post_type' => 'proyectos',
		'posts_per_page' => 4,
		'orderby' => 'rand',
		'post__not_in' => array( get_the_id() )
	) );

	if ( $randomProjects->have_posts() ) : ?>

<section class="bg-sand">
	<div class="wrap thumbnail-fourths">
		<h1 class="c-blue">Otros proyectos </br>de Distrito Tec</h1><?php
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

		}
	endwhile; endif;
	get_footer(); ?>
