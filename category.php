<?php get_header(); ?>

	<section class="bg-sand">
		<div class="wrap thumbnail-fourths">
			<h1 class="c-blue"><?php single_cat_title(); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</div>
	</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
