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
	</section>

	<div class="hero-home bg-blue ptb100">
		<div class="wrap">
			<div class="three-col columns img">
				<h4 class="c-white mb20"><strong>Proyecto Destacado</strong></h4>
				<div class="video-wrap">
					<iframe width="100%" height="500" src="https://www.youtube.com/embed/wXr9jWolLRE" frameborder="0" allowfullscreen=""></iframe>
				</div>
			</div>
			<div class="one-fourth columns info">
				<div class="progress-bar-txt">
					<h1>Nueva Rotonda Garza Sada</h1>
					<p class="mb20"><strong>Evolución del Campus</strong></p>
					<div class="specs">
						<p><b>80%</b> Completado</p>
						<div class="progress-bar"><span style="width:80%;" class="bg-blue"></span></div>
						<p class="description">La rehabilitación de la rotonda Garza Sada transformará la cultura de convivencia vial hacia una más cordial e incluyente en el DistritoTec. </p>
					</div>
				</div>
				<a class="cta-more" href="#">Ver Proyecto</a>
			</div>
		</div>
	</div><?php


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
