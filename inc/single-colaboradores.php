<?php

	if(have_rows('info')) { while(have_rows('info')) {
		the_row();
		$org = get_sub_field('org');
		$rol = get_sub_field('rol');
	}}

?>
<section class="bg-skyblue">
	<div class="wrap">
		<div class="two-col columns">
			<h1 class="c-black"><strong><?php the_title(); ?></strong></h1>
			<?php if($rol) echo '<h4><strong>'.$rol.'</strong></h4>'; ?>
			<?php if($org) echo '<h3 class="mt20"><strong>'.$org.'</strong></h3>'; ?>
		</div>
	</div>
</section>

<section class="bg-sand single-profile">
	<div class="wrap">
		<div class="two-col description">
			<?php the_content(); ?>
		</div>
		<div class="two-col profile-picture"><?php
		if ( has_post_thumbnail() ) : ?>
			<div class="img" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div><?php
		endif; ?>
			<h5 class="mt20"><strong>Contacto</strong></h5><?php

			if(have_rows('redes')) { ?>
			<ul><?php
				while(have_rows('redes')) { the_row(); ?>
				<li><a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('name'); ?></a></li><?php
				} ?>
			</ul><?php
			}

			?>
		</div>
	</div>

	<!-- FOURTHS BLOCK -->
	<div class="wrap thumbnail-fourths">
		<h3 class="mb24 bg-line"><strong>Ha colaborado en:</strong></h3>
		<div class="one-fourth columns">
			<a href="#">
				<div class="img" style="background-image: url('http://placehold.it/750x750');"></div>
				<div class="txt">
					<h3>Teatro de la Ciudad</h3>
					<p class="small-txt c-blue mb20"><b>Mejora del Entorno</b></p>
					<div class="marquee"><p class="small-txt"><b>Todas las Colonias#1, Todas las Colonias#2, Todas las Colonias#3, Todas las Colonias#4, Todas las Colonias#5, Todas las Colonias#6</b></p></div>
				</div>
				<div class="thumb-progress-bar">
					<p><b>80%</b> Completado</p>
					<div style="width:80%;" class="bg-blue"></div>
				</div>
			</a>
		</div>
		<div class="one-fourth columns">
			<a href="#">
				<div class="img" style="background-image: url('http://placehold.it/750x750');"></div>
				<div class="txt">
					<h3>Teatro de la Ciudad</h3>
					<p class="small-txt c-blue mb20"><b>Mejora del Entorno</b></p>
					<div class="marquee"><p class="small-txt"><b>Todas las Colonias#1, Todas las Colonias#2, Todas las Colonias#3, Todas las Colonias#4, Todas las Colonias#5, Todas las Colonias#6</b></p></div>
				</div>
				<div class="thumb-progress-bar">
					<p><b>80%</b> Completado</p>
					<div style="width:80%;" class="bg-blue"></div>
				</div>
			</a>
		</div>
	</div>
</section>
