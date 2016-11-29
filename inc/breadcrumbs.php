

<div class="breadcrumbs<?php echo bg_color(); ?>">
	<ul>
		<li><a href="#">Inicio</a></li><?php


	if(is_singular('proyectos')) { ?>
		<li><a href="#">Proyectos</a></li><?php
		$pTypes = wp_get_post_terms(get_the_id(), 'tipos_de_proyectos');
		foreach( $pTypes as $pType ) { ?>
		<li><a href="<?php echo get_term_link($pType->term_id) ?>" title="<?php echo $pType->name ?>"><?php echo $pType->name; ?></a></li><?php
		}


	} elseif(is_single()) { ?>
		<li><?php the_category(' '); ?></li>
		<?php


	} else {
		echo 'no info';
	} ?>
		<li><a href="<?php the_permalink(); ?>" class="active"><?php the_title(); ?></a></li>
	</ul>
</div>
