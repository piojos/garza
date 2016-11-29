<?php

	$pTypes = wp_get_post_terms(get_the_id(), 'tipos_de_proyectos');

	while (have_rows('status')) {
		the_row();
		$prog = get_sub_field('percent');
		$stage = get_sub_field('stage');
		$date = get_sub_field('date');
	}
	$colonias = get_field('zone');

?>
	<div class="three-col columns"><?php

	if(is_singular('proyectos')) {
		echo '<p><b>Proyecto</b></p>';
	} else {
		echo '<p><b>Anything else</b></p>';
	}

	?>
		<h1><b><?php the_title(); ?></b></h1><?php

	// Tipo de Proyecto
	foreach( $pTypes as $pType ) { ?>
		<h3><a href="<?php echo get_term_link($pType->term_id) ?>" title="<?php echo $pType->name ?>"><?php echo $pType->name; ?></a></h3><?php
	}

	// Seleccionar Colonia
	if( $colonias ):
		$post = $colonias;
		setup_postdata( $post ); ?>
		<div class="featured-content">
			<a href="<?php the_permalink(); ?>"><?php
			if ( has_post_thumbnail() ) { ?>
				<div class="cir-img border-aqua" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');"></div><?php
			}  ?>
				<div class="txt"><h4>Colonia</h4><h3><b><?php the_title(); ?></b></h3></div>
			</a>
		</div><?php
		wp_reset_postdata();
	endif; ?>
	</div>
	<div class="one-fourth columns">
		<div class="progress-bar-txt"><?php

	// Completado
	if($prog) { ?>
		<p><b><?php echo $prog; ?>%</b> Completado</p>
		<div class="progress-bar"><span style="width:<?php echo $prog; ?>%;" class="bg-blue"></span></div><?php
	}

	// Meta
	if($stage) { ?>
		<p><b><?php echo $stage; ?></b></p><?php
	}
	if($date) { ?>
		<p><?php echo $date; ?></p><?php
	} ?>
		</div>
	</div>
