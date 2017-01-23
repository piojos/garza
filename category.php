<?php
	/**
	 * Template Name: Category template
	 *
	 */

	get_header();
	get_template_part('inc/breadcrumbs');
	get_template_part('inc/h', 'catarch');

	$catID = get_queried_object_id(); ?>

	<section class="bg-sand">
		<div class="wrap thumbnail-fourths<?php if(get_cat_name($catID) == 'Colonias') echo ' small-fourths'; ?>">
			<h1 class="c-blue"><?php single_cat_title(); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</div>
	</section>

<?php get_footer(); ?>
