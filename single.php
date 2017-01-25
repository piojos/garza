<?php

	get_header();
	get_template_part('inc/breadcrumbs');

	// $pTypes = get_terms('tipos_de_proyectos');

	$ftdGallery = get_field('ftd_gallery');
	$cat = get_the_category();

	if ( have_posts() ) : while ( have_posts() ) : the_post();

		if(in_category('participantes')) {
			get_template_part('inc/single', 'colaboradores');
		} else {
?>
<section class="<?php echo bg_color(); ?>">
	<div class="wrap"><?php

		if(in_category('blog') OR in_category('noticias')) {
			get_template_part('inc/h', 'historia');
		} else {
			get_template_part('inc/h', 'single');
		}

	?>
	</div>
</section><?php


	if(has_post_thumbnail() OR $ftdGallery) { ?>
	<div class="hero-slider<?php echo bg_color(); ?>">
		<ul class="slider"><?php
		if(has_post_thumbnail()) { ?>
			<li><div style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');"></div></li><?php
		}
		if($ftdGallery) {
			foreach( $ftdGallery as $image ) : ?>
			<li><div style="background-image:url('<?php echo $image['sizes']['large']; ?>');" alt="<?php echo $image['alt']; ?>"></div></li><?php
			endforeach;
		} ?>
		</ul>
	</div><?php
	}


	if($cat[0]->slug == 'colonias') {
		get_template_part('inc/s', 'stats');
	}


	// Contenido
	get_template_part('inc/blocks', 'manager'); ?>

	<section class="bg-sand"><?php
	if(has_tag()) { ?>
		<div class="small-wrap t-center related-tags">
			<h5 class="bg-line"><strong>ETIQUETAS</strong></h5>
			<?php the_tags('<ul><li>', '</li><li>', '</li></ul>'); ?>
		</div><?php
	} ?>
		<div class="share-media-btns">
			<h5><b>SHARE</b></h5>
			<ul>
				<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no, toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img src="<?php bloginfo('template_url'); ?>/img/fb-gray.svg" alt=""></a></li>
				<li><a href="http://twitter.com/home?status= DistritoTec: <?php the_permalink(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no, toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img src="<?php bloginfo('template_url'); ?>/img/tw-gray.svg" alt=""></a></li>
			</ul>
		</div>
	</section><?php

	// Related
	$randomProjects = new WP_Query( array(
		'category_name' => $cat[0]->slug,
		'posts_per_page' => 4,
		'orderby' => 'rand',
		'post__not_in' => array( get_the_id() )
	) );

	if ( $randomProjects->have_posts() ) : ?>

<section class="bg-sand">
	<div class="wrap thumbnail-fourths">
		<h1 class="c-blue">Más <?php echo $cat[0]->name; ?> </br>de Distrito Tec</h1><?php
		while ( $randomProjects->have_posts() ) :
			$randomProjects->the_post();
			echo card();
		endwhile;
		wp_reset_postdata(); ?>
	</div>
</section><?php
	endif;

		}
	endwhile; endif;
	get_footer(); ?>
