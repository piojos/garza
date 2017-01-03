<?php

	get_header();
	get_template_part('inc/breadcrumbs');

	// $pTypes = get_terms('tipos_de_proyectos');
	$pTypes = wp_get_post_terms(get_the_id(), 'tipos_de_proyectos');

	while (have_rows('status')) {
		the_row();
		$prog = get_sub_field('percent');
		$stage = get_sub_field('stage');
		$date = get_sub_field('date');
	}
	$colonias = get_field('zone');
	$ftdGallery = get_field('ftd_gallery');

?>
<section class="bg-aqua">
	<div class="wrap">
		<div class="three-col columns">
			<p><b>Proyecto</b></p>
			<h1><b><?php the_title(); ?></b></h1><?php

		// Tipo de Proyecto
		foreach( $pTypes as $pType ) { ?>
			<h3><a href="<?php echo get_term_link($pType->term_id) ?>" title="<?php echo $pType->name ?>"><?php echo $pType->name; ?></a></h3><?php
		}


		// Seleccionar Colonia
		if( $colonias ):
			foreach( $colonias as $post):
			setup_postdata( $post ); ?>
			<div class="featured-content">
				<a href="<?php the_permalink(); ?>"><?php
				if ( has_post_thumbnail() ) { ?>
					<div class="cir-img border-aqua" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');"></div><?php
				}  ?>
					<div class="txt"><h4>Colonia</h4><h3><b><?php the_title(); ?></b></h3></div>
				</a>
			</div><?php
			endforeach;
			wp_reset_postdata();
		endif; ?>
		</div>
		<div class="one-fourth columns">
			<div class="progress-bar-txt"><?php

		// Completado
		if($prog) { ?>
				<p><b><?php echo $prog; ?>%</b> Completado</p>
				<div class="progress-bar"><span style="width:<?php echo $prog; ?>%;" class="bg-blue"></span></div><?php
		}

		// Meta
		if($stage) { ?>
				<p><b><?php echo $stage; ?></b></p><?php
		}
		if($date) { ?>
				<p><?php echo $date; ?></p><?php
		} ?>
			</div>
		</div>
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
			$randomProjects->the_post();
			get_template_part('inc/cards');
		endwhile;
		wp_reset_postdata(); ?>
	</div>
</section><?php
	endif;

	get_footer(); ?>
