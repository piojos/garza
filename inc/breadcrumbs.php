

<div class="breadcrumbs<?php echo bg_color(); ?>">
	<ul>
		<li><a href="#">Inicio</a></li><?php

	if(is_category()) { ?>
		<li><a href="#" class="active"><?php single_cat_title(); ?></a></li><?php
	} elseif(is_archive()) { ?>
		<li><a href="#" class="active"><?php post_type_archive_title(); ?></a></li><?php
	} else {
		if(is_singular( array( 'proyectos', 'eventos' ))) {
			$obj = get_post_type_object( get_post_type($post->ID) );
			$pTypes = wp_get_post_terms(get_the_id(), $obj->taxonomies[0]); ?>
			<li><a href="<?php echo home_url($obj->name); ?>"><?php echo $obj->label; ?></a></li><?php
			foreach( $pTypes as $pType ) { ?>
			<li><a href="<?php echo get_term_link($pType->term_id) ?>" title="<?php echo $pType->name ?>"><?php echo $pType->name; ?></a></li><?php
			}


		} elseif(is_single()) { ?>
			<li><?php the_category(' '); ?></li><?php


		} else {
			echo 'no info';
		} ?>
		<li><a href="<?php the_permalink(); ?>" class="active"><?php the_title(); ?></a></li><?php
	} ?>
	</ul>
</div>
