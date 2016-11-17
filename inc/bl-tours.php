<?php


$options = get_sub_field('options');
if(in_array('bg', $options)) :
	$hasBg = 1;
	while ( have_rows('bg') ) : the_row();
		$bgImg = get_sub_field('image');
		$bgColor = get_sub_field('color');
	endwhile;
endif;?>

<div class="block explore<?php echo blockClass($options); ?>" id="explora">
	<h2>EXPLORA MR. BROWN EN</h2><?php

	// Tab controller
	if(have_rows('sucursales')) : ?>
	<div class="locations"><?php
		while (have_rows('sucursales')) {
			the_row(); ?>
			<a href="#"><?php the_sub_field('title'); ?></a><?php
		} ?>
	</div><?php
	endif;

	// Tabbed Content
	if(have_rows('sucursales')) : ?>
		<div class="slider wrap"><?php
		while (have_rows('sucursales')) {
			the_row(); ?>
			<div class="slide">
				<div class="mapa">
					<?php the_sub_field('embed'); ?>
				</div>
				<div class="contact">
					<h3>Sucursal <?php the_sub_field('title'); ?></h3>
					<br>
					<?php the_sub_field('info'); ?>
				</div>
			</div><?php
		} ?>
		</div><?php
	endif; ?>
</div>
