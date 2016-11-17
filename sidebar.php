<?php

	// Page: Menu
	if (get_the_ID() == 4) :

		$dishTypes = get_field('dish_types'); ?>

<div class="mobile sub_nav menu_filter">
	<a href="#" class="currentId">Burgers</a>
	<div class="instructions">
		Mostrar solo: <br>
		<button class="delivery"><img src="<?php bloginfo('template_url'); ?>/img/icon-moto-white.svg"></button>
		<button class="foodtruck"><img src="<?php bloginfo('template_url'); ?>/img/icon-truck-white.svg"></button>
	</div><?php
	if( $dishTypes ): ?>
	<ul><?php
		foreach( $dishTypes as $term ): ?>
			<li class="<?php echo $term->slug; ?>"><a href="#<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
		<?php endforeach; ?>
	</ul><?php
	endif;



	if(have_rows('delivery_contact', 'options')) : ?>
	<div class="call"><?php
		while (have_rows('delivery_contact', 'options')) :
			the_row();
			$tel = get_sub_field('tel'); ?>
			<?php the_sub_field('title'); ?><br>
			<strong><a href="tel:<?php echo $tel; ?>"><?php echo $tel; ?></a></strong><?php
		endwhile; ?>
	</div><?php
	endif; ?>

</div><?php


	// Any other
	else :

/*
<div class="mobile sub_nav">
	<a href="#" class="currentId">Promos</a>
	<ul>
		<li><a href="#">Something Else</a></li>
		<li><a href="#">Something Else</a></li>
		<li><a href="#">Something Else</a></li>
		<li><a href="#">Something Else</a></li>
	</ul>
</div>
*/
	endif;?>
