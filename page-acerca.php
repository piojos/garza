<?php

	get_header();
	get_template_part('inc/breadcrumbs');
	$ftd_img = get_field('ftd_img'); ?>

	<section class="ptb100">
		<div class="wrap">
			<div class="two-col c-center t-center">
				<h1><?php the_field('slogan'); ?></h1>
			</div>
		</div>
	</section>

	<section class="fixed-menu bg-skyblue" id="fixMenu">
		<div class="burger">Menu</div>
		<div class="st-menu">
			<ul>
			</ul>
		</div>
	</section><?php

	if($ftd_img) echo '<div class="hero-fixed" style="background-image: url('. $ftd_img['sizes']['huge'] .');"></div>';

	if( have_rows('blocks') ):
	while ( have_rows('blocks') ) : the_row();

		if( get_row_layout() == 'titles' ):

			$check = get_sub_field('new_section');
			$section_title = get_sub_field('section_title');
			$texts = get_sub_field('texts');

			if( $check && in_array('new', $check) ) { $sectionID = ' id="'.$section_title.'"'; }
			else { $sectionID = ''; }

			if( $check && in_array('gray', $check) ) { $bgColor = ' bg-sand'; $wrap = '';}
			else { $bgColor = ''; $wrap = ' med-wrap'; } ?>

			<div class="t-center ptb100<?php echo $bgColor; if(!empty($sectionID)) echo ' ancla'; ?>"<?php echo $sectionID; ?>>
				<div class="wrap<?php echo $wrap; ?>"><?php

					if($sectionID) echo '<p><strong>'.$section_title.'</strong></p>';
					if(have_rows('texts')) {
						while(have_rows('texts')) {
							the_row();
							$text = get_sub_field('txt');
							$size = get_sub_field('size');
							if($size == 'big' ) { echo '<h1>'.$text.'</h1>'; }
							else { echo '<h3>'.$text.'</h3>'; }
						}
					}
				?>
				</div>
			</div><?php


		elseif( get_row_layout() == 'info_list' ):

			if(have_rows('imglist')) :?>
			<section class="pb100 t-center">
				<div class="wrap square-thumbnails"><?php
				while(have_rows('imglist')) :
					the_row();
					$bullImg = get_sub_field('img'); ?>

					<div class="one-third columns">
						<?php if( !empty($bullImg) ) echo '<div class="img" style="background-image: url('.$bullImg['sizes']['large'].');"></div>'; ?>
						<div class="txt">
							<h3><?php the_sub_field('descripcion'); ?></h3>
						</div>
					</div><?php
				endwhile; ?>
				</div>
			</section><?php
			endif;


		elseif( get_row_layout() == 'video_list' ): ?>

		<section class="pb100">
			<div class="wrap odds"><?php
			if(have_rows('vidlist')) {
				while (have_rows('vidlist')) {
					the_row();
					$liChoose = get_sub_field('choose');
					$liImg = get_sub_field('img');
					$liVid = get_sub_field('vid');
					$liTitle = get_sub_field('caption_title');
					$liAbout = get_sub_field('caption_about'); ?>
				<div class="mb40">
					<div class="two-col columns">
						<div class="video-wrap">
							<?php
							if($liChoose == 'vid') { echo $liVid; }
							elseif($liChoose == 'img') { echo '<img src="'.$liImg['sizes']['large'].'">'; } ?>
						</div>
					</div>
					<div class="two-col columns">
						<div class="table">
							<div class="table-cell"><h2 class="c-blue"><strong><?php echo $liTitle; ?></strong></h2><p><?php echo $liAbout; ?></p></div>
						</div>
					</div>
				</div><?php
					}
				} ?>
			</div>
		</section><?php


		elseif( get_row_layout() == 'single_video' ):

			$caption = get_sub_field('caption');
			$iframe = get_sub_field('vid');

			// use preg_match to find iframe src
			preg_match('/src="(.+?)"/', $iframe, $matches);
			$src = $matches[1];

			// add extra params to iframe src
			$params = array(
				'controls'    => 0,
				'hd'        => 1,
				'autohide'    => 1
			);
			$new_src = add_query_arg($params, $src);
			$iframe = str_replace($src, $new_src, $iframe);

			// add extra attributes to iframe html
			$attributes = 'frameborder="0"';
			$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe); ?>

		<div class="pb100 bg-sand">
			<div class="about-media-block">
				<div class="video-wrap">
					<?php echo $iframe; ?>
				</div><?php
			if( !empty($caption) ) { ?>
				<div class="full-video-cap mt20"><p><?php echo $caption; ?></p></div><?php
			} ?>
			</div>
		</div><?php


		elseif( get_row_layout() == 'story' ):

			get_template_part('inc/bl', 'timeline');


		elseif( get_row_layout() == 'custom' ):

			the_sub_field('codes');


		elseif( get_row_layout() == 'projects' ): ?>

		<section class="ft-project">
			<div class="wrap info">
				<div class="two-col">
					<p class="mb20 ancla" id="Proyectos"><strong>Proyectos</strong></p>
					<h1>Los tres grandes ejes de DistritoTec:</h1>
					<p class="small-txt mb40"><strong>Estos son ejemplos de los</br> 3 tipos de proyectos:</strong></p>
				</div>
				<div class="two-col mt40">
					<ul class="project-type">
						<li>Evolución del Campus</li>
						<li>Clúster de Investigación</li>
						<li>Mejora del Entorno</li>
					</ul>
				</div>
			</div>
			<div class="wrap thumbnail-fourths"><?php
				$ftdCampus = get_sub_field('ftd_campus');
				$ftdCluster = get_sub_field('ftd_cluster');
				$ftdEntorno = get_sub_field('ftd_entorno');

				if( $ftdCampus ):
					$post = $ftdCampus;
					setup_postdata( $post );
						echo card(3);
					wp_reset_postdata();
				endif;

				if( $ftdCluster ):
					$post = $ftdCluster;
					setup_postdata( $post );
						echo card(3);
					wp_reset_postdata();
				endif;

				if( $ftdEntorno ):
					$post = $ftdEntorno;
					setup_postdata( $post );
						echo card(3);
					wp_reset_postdata();
				endif; ?>
			</div>
		</section><?php


		elseif( get_row_layout() == 'search' ): ?>

		<section class="bg-sand ptb100">
			<div class="wrap square-thumbnails tornado"><?php

			$n = 1;
			if(have_rows('search_list')) :
				while (have_rows('search_list')) :
					the_row();
					$sImg = get_sub_field('img');
					$sTitle = get_sub_field('title');
					$sAbout = get_sub_field('about'); ?>
				<div>
					<div class="one-third">
						<div class="img" style="background-image: url(<?php echo $sImg['sizes']['medium']; ?>);">
							<div class="c-cir"><?php echo $n++; ?></div>
						</div>
						<div class="txt">
							<h1 class="c-blue"><?php echo $sTitle; ?></h1>
							<p><?php echo $sAbout; ?></p>
						</div>
					</div>
				</div><?php
				endwhile;
			endif; ?>
			</div>
		</section><?php


		endif;

	endwhile;

endif;

	get_footer(); ?>
