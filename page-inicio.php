<?php
	/**
	 * Template Name: Página de Inicio
	 */

	get_header();
	// get_template_part('inc/breadcrumbs');
	get_template_part('inc/h-catarch');

	?>

	<section class="bg-sand">
		<div class="wrap thumbnail-fourths">
			<h1 class="c-blue"><?php single_cat_title(); ?></h1><?php


			$projQ = new WP_Query( array(
				'post_type' => 'proyectos',
				'posts_per_page' => 4,
			));
			$notiQ = new WP_Query( array(
				'post_type' => 'post',
				'category_name' => 'noticias',
				'posts_per_page' => 4,
			));
			$histQ = new WP_Query( array(
				'post_type' => 'post',
				'category_name' => 'historias',
				'posts_per_page' => 4,
			));
			$colaQ = new WP_Query( array(
				'post_type' => 'post',
				'category_name' => 'colaboradores',
				'posts_per_page' => 4,
			));
			$coloQ = new WP_Query( array(
				'post_type' => 'post',
				'category_name' => 'colonias',
				'posts_per_page' => 4,
			));

			if ( $projQ->have_posts() ) : ?>

			<div class="wrap thumbnail-fourths">
				<h3 class="mb24 bg-line"><strong>Proyectos Recientes:</strong></h3><?php

				while ( $projQ->have_posts() ) :
					$projQ->the_post();

					get_template_part('inc/cards');

				endwhile;
				wp_reset_postdata(); ?>
			</div><?php
			endif;


			if ( $notiQ->have_posts() ) : ?>

			<div class="wrap thumbnail-fourths">
				<h3 class="mb24 bg-line"><strong>Noticias Recientes:</strong></h3><?php

				while ( $notiQ->have_posts() ) :
					$notiQ->the_post();

					get_template_part('inc/cards');

				endwhile;
				wp_reset_postdata(); ?>
			</div><?php
			endif;


			if ( $histQ->have_posts() ) : ?>

			<div class="wrap thumbnail-fourths">
				<h3 class="mb24 bg-line"><strong>Historias Recientes:</strong></h3><?php

				while ( $histQ->have_posts() ) :
					$histQ->the_post();

					get_template_part('inc/cards');

				endwhile;
				wp_reset_postdata(); ?>
			</div><?php
			endif;


			if ( $colaQ->have_posts() ) : ?>

			<div class="wrap thumbnail-fourths">
				<h3 class="mb24 bg-line"><strong>Colaboradores:</strong></h3><?php

				while ( $colaQ->have_posts() ) :
					$colaQ->the_post();

					get_template_part('inc/cards');

				endwhile;
				wp_reset_postdata(); ?>
			</div><?php
			endif;


			if ( $coloQ->have_posts() ) : ?>

			<div class="wrap thumbnail-fourths">
				<h3 class="mb24 bg-line"><strong>Colonias:</strong></h3><?php

				while ( $coloQ->have_posts() ) :
					$coloQ->the_post();

					get_template_part('inc/cards');

				endwhile;
				wp_reset_postdata(); ?>
			</div><?php
			endif;



			// get_template_part('loop');
			// get_template_part('pagination'); ?>

		</div>
	</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
