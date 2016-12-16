	<div class="<?php if(is_singular('eventos')) {echo 'two-col';} else {echo 'three-col';} ?> columns"><?php

	$obj = get_post_type_object( get_post_type($post->ID) );
	$thisType = wp_get_post_terms(get_the_id(), $obj->taxonomies[0]);

	if(is_singular('eventos')) {
		echo '<h4 class="mb20"><strong>Evento</strong></h4>';
	} elseif(is_single()) {
		$cat = get_the_category();
		echo '<p><b>'.$cat[0]->name.'</b></p>';
	} else {
		echo '<p><b>Anything else</b></p>';
	}

	?>
		<h1><b><?php the_title(); ?></b></h1><?php

	if(is_singular('eventos')) { ?>
		<h3 class="mb20 c-red" style="color:<?php the_field('color', 'tipos_de_eventos_'.$thisType[0]->term_id); ?>;"><b><?php echo listCategories($thisType); ?></b></h3><?php
	} ?>
	</div>
