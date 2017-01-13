<?php
	/**
	 * Template Name: Página de Inicio
	 */

	get_header();
	// get_template_part('inc/breadcrumbs');

	$projQ = new WP_Query( array(
		'post_type' => 'proyectos',
		'posts_per_page' => 8
	));

	$histQ = new WP_Query( array(
		'post_type' => 'post',
		'category_name' => 'blog',
		'posts_per_page' => 8
	));
	$notiQ = new WP_Query( array(
		'post_type' => 'post',
		'category_name' => 'noticias',
		'posts_per_page' => 5
	));
	?>

	<section class="bg-aqua ptb100">
		<div class="wrap">
			<div class="two-col columns">
				<div class="video-wrap">
					<?php the_field('video_embed'); ?>
				</div>
			</div>
			<div class="two-col columns pl100">
				<h1><?php the_field('pitch'); ?></h1>
			</div>
		</div>
	</section>

	<section class="ptb100 bg-sand">
		<div class="wrap">
			<div class="two-col columns">
				<h4 class="c-aqua mb20"><strong>Proyectos</strong></h4>
				<h1 class="c-black"><strong>Los tres grandes ejes de DistritoTec:</strong></h1>
			</div>
			<div class="two-col columns">
				<ul class="project-type">
					<li>Evolución del Campus</li>
					<li>Mejora del Entorno</li>
					<li>Clúster Tecnológico</li>
				</ul>
			</div>
		</div>
	</section><?php

	if(have_rows('featured')) :
		while(have_rows('featured')) :
			the_row();

			$ftd_project = get_sub_field('project');
			if($ftd_project) {
				$post = $ftd_project;
				setup_postdata( $post );

				$obj = get_post_type_object( get_post_type($post->ID) );
				$thisType = wp_get_post_terms(get_the_id(), $obj->taxonomies[0]);
				$video = get_sub_field('vid_override');
				$about = get_sub_field('about');

				$catSlug = $thisType[0]->slug;
				if($catSlug == 'mejora-del-entorno') $barClass = ' bg-red';
				if($catSlug == 'cluster') $barClass = ' bg-yellow';
				if($catSlug == 'evolucion-del-campus') $barClass = ' bg-blue';

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
				} ?>
	<div class="hero-home ptb100<?php echo $barClass; ?>">
		<div class="wrap">
			<div class="three-col columns img">
				<h4 class="c-white mb20"><strong>Proyecto Destacado</strong></h4>
				<div class="video-wrap"><?php
				if($video) {
					echo $video;
				} elseif(has_post_thumbnail()) { ?>

					<div class="img" style="background-image: url('<?php the_post_thumbnail_url($post->ID, 'medium' ); ?>);"></div><?php
				} ?>
				</div>
			</div>
			<div class="one-fourth columns info">
				<div class="progress-bar-txt">
					<h1><?php the_title(); ?></h1><?php
					if($thisType) { ?>

					<p class="mb20"><b><?php echo listCategories($thisType); ?></b></p><?php
					} ?>

					<div class="specs"><?php

					if(get_post_type() == 'proyectos') { ?>

						<p><?php echo $sLabel; ?></p>
						<div class="progress-bar"><span style="width:<?php echo $sPercent; ?>%;" class="<?php echo $barClass; ?>"></span></div><?php
					}

					if($about) { ?>

						<p class="description"><?php echo $about; ?></p><?php
					} ?>

					</div>
				</div>
				<a class="cta-more" href="<?php the_permalink(); ?>">Ver Proyecto</a>
			</div>
		</div>
	</div><?php
				wp_reset_postdata();
			}
		endwhile;
	endif;


	if ( $projQ->have_posts() ) : ?>

	<section class="ptb100 bg-sand">
		<div class="wrap thumbnail-fourths projects-slider">
			<h4 class="mb20"><strong>Todos los Proyectos</strong></h4>
			<div class="slider"><?php

		while ( $projQ->have_posts() ) :
			$projQ->the_post();
			echo card();
		endwhile;
		wp_reset_postdata(); ?>

			</div>
		</div>
	</section><?php
	endif; ?>

	<section class="ptb100">
		<div class="wrap about-specs">
			<h2 class="t-center"><strong class="c-aqua">Acerca de</strong></br>DistritoTec</h2><?php

			if(have_rows('acerca')) : ?>

			<div class="specs"><?php
				while (have_rows('acerca')) {
					the_row();
					$a = wp_get_attachment_image_src(get_sub_field('img'),'large'); ?>

				<div class="btn- bg-aqua">
					<div class="mask" style="background-image: url('<?php echo $a[0]; ?>');"></div>
					<div class="txt"><h2><?php the_sub_field('num'); ?></br><?php the_sub_field('txt'); ?></h2></div>
				</div><?php
				} ?>

			</div><?php
			endif; ?>
			<a href="#" class="cta-gray">Conoce más de DistritoTec</a>
		</div>
	</section><?php


	if ( $histQ->have_posts() ) : ?>

	<section class="ptb100 bg-sand full-slider">
		<div class="wrap"><h2 class="mb20"><strong>Blog</strong></h2></div>
		<div class="square-thumbnails slider"><?php

		while ( $histQ->have_posts() ) :
			$histQ->the_post();
			echo card();
		endwhile;
		wp_reset_postdata(); ?>

		</div>
	</section><?php
	endif;


/*
	<div class="one-fifth columns">
		<a href="#">
			<div class="img" style="background-image: url('img/map-bg.png');"></div>
			<div class="txt">
				<h3>Calles al Óleo</h3>
				<p>9 de Enero 2017</p>
			</div>
		</a>
	</div>
*/


	if ( $notiQ->have_posts() ) : ?>
	<section class="ptb100">
		<div class="wrap square-thumbnails">
			<h2 class="mb20"><strong>Noticias Recientes:</strong></h2><?php
		while ( $notiQ->have_posts() ) :
			$notiQ->the_post();
			echo card(5);
		endwhile; ?>
		</div>
	</section><?php
	endif;

	get_footer(); ?>
