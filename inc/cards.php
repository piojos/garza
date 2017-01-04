<?php

	// 	Brains

	$obj = get_post_type_object( get_post_type($post->ID) );
	$thisType = wp_get_post_terms(get_the_id(), $obj->taxonomies[0]);

	while (have_rows('status')) {
		the_row();
		$opts = get_sub_field('options');
		$prog = get_sub_field('percent');
	}
	if($opts['value'] == 'percent') {
		$sLabel = '<b>'. $prog.'%</b> Terminado';
		$sPercent = $prog;
	} elseif($opts['value'] == 'prox') {
		$sLabel = '<b>'. $opts['label'] .'</b>';
		$sPercent = 0;
	} else {
		$sLabel = '<b>'. $opts['label'] .'</b>';
		$sPercent = 100;
	}
	$catSlug = $thisType[0]->slug;
	if($catSlug == 'mejora-del-entorno') $barClass = ' red';
	if($catSlug == 'cluster') $barClass = ' yellow';
	// if($catSlug == 'evolucion-del-campus') ;



	?>

	<div class="one-fourth columns"><?php


	// Don't link if Proximamente
		if($opts['value'] != 'prox') { ?>

		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php
		}

		if(has_post_thumbnail()) { ?>
			<div class="img" style="background-image: url('<?php the_post_thumbnail_url( 'medium' ); ?>');"></div><?php
		} ?>

			<div class="txt"><?php


	// Event circles
		if(get_post_type() == 'eventos') {

			$date = get_field('date', false, false);
			$date = new DateTime($date); ?>

			<div class="cir-date">
				<div class="date" style="background-color:#F5F5F5;">
					<p><span><?php echo $date->format('M'); ?></span></p><p><?php echo $date->format('j'); ?></p>
				</div>
				<img class="logo" src="<?php the_field('img', 'tipos_de_eventos_'.$thisType[0]->term_id); ?>" alt="">
			</div><?php
			if($thisType) { ?>

			<p class="small-txt c-blue" style="color:<?php the_field('color', 'tipos_de_eventos_'.$thisType[0]->term_id); ?>;"><b><?php echo listCategories($thisType); ?></b></p><?php
			}
		}

		?>

				<h3><?php the_title(); ?></h3><?php

		if(get_post_type() == 'proyectos') {
			if($thisType) { ?>
				<p class="small-txt c-blue mb20" style="color:<?php the_field('color', 'tipos_de_proyectos_'.$thisType[0]->term_id); ?>;"><b><?php echo listCategories($thisType); ?></b></p><?php
			} ?>
				<div class="marquee"><p class="small-txt"><b><?php echo listTitles(get_field('zone')); ?></b></p></div><?php
		} ?>
			</div><?php



	// Proyectos bar
		if(get_post_type() == 'proyectos') { ?>
			<div class="thumb-progress-bar<?php echo $barClass; ?>">
				<p><?php echo $sLabel; ?></p>
				<div style="width:<?php echo $sPercent; ?>%;" class="bg-blue"></div>
			</div><?php
		}

	// Don't link if Proximamente
		if($opts['value'] != 'prox') { ?>

		</a><?php
		}

	// edit_post_link(); ?>

	</div>
