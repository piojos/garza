<?php

	while (have_posts()) :
		the_post();


		?>

	<div class="one-fourth columns">

		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php
		$thisType = wp_get_post_terms(get_the_id(), 'tipos_de_proyectos');
		if(has_post_thumbnail()) { ?>
			<div class="img" style="background-image: url('<?php the_post_thumbnail_url( 'medium' ); ?>');"></div><?php
		} ?>
			<div class="txt">
				<h3><?php the_title(); ?></h3><?php
		foreach( $thisType as $pType ) { ?>
				<p class="small-txt c-blue mb20"><b><?php echo $pType->name; ?></b></p><?php
		} ?>
				<div class="marquee"><p class="small-txt"><b><?php echo listColonias(get_field('zone')); ?></b></p></div>
			</div><?php



			while (have_rows('status')) {
				the_row();
				$opts = get_sub_field('options');
				$prog = get_sub_field('percent');
			}
			if($prog) { ?>
			<div class="thumb-progress-bar"><?php

				if($opts['value'] == 'percent') {
					$sLabel = '<b>'. $prog.'%</b> Completado';
					$sPercent = $prog;
				} elseif($opts['value'] == 'prox') {
					$sLabel = '<b>'. $opts['label'] .'</b>';
					$sPercent = 0;
				} else {
					$sLabel = '<b>'. $opts['label'] .'</b>';
					$sPercent = 100;
				} ?>

				<p><?php echo $sLabel; ?></p>
				<div style="width:<?php echo $sPercent; ?>%;" class="bg-blue"></div>
			</div><?php
			} ?>
		</a>

		<?php // edit_post_link(); ?>

	</div><?php


	endwhile; ?>
