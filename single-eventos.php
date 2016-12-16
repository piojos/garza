<?php

	get_header();
	get_template_part('inc/breadcrumbs');

	$obj = get_post_type_object( get_post_type($post->ID) );
	$thisType = wp_get_post_terms(get_the_id(), $obj->taxonomies[0]);

	if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
	<section class="<?php echo bg_color(); ?>">
		<div class="wrap">
			<?php get_template_part('inc/h', 'single'); ?>
		</div>
	</section>
	<section class="bg-sand single-event">
		<div class="wrap">
			<div class="two-col description"><?php

				$date = get_field('date', false, false);
				$date = new DateTime($date); ?>

				<div class="cir-date">
					<div class="date" style="background-color:#FFF;">
						<p><span><?php echo $date->format('M'); ?></span></p><p><?php echo $date->format('j'); ?></p>
					</div>
					<img class="logo" src="<?php the_field('img', 'tipos_de_eventos_'.$thisType[0]->term_id); ?>" alt="">
				</div>
				<ul class="specs"><?php


				if($thisType[0]->description) { ?>
					<li>
						<h5>Acerca de <?php echo $thisType[0]->name; ?></h5>
						<p><?php echo $thisType[0]->description; ?></p>
					</li><?php
				} ?>
					<li>
						<h5>Horario</h5>
						<p><?php
						if(get_field('hour_detail')) {
							the_field('hour_detail');
						} else {
							echo $date->format('H:i') . ' hrs.';
						} ?></p>
					</li><?php


				$location = get_field('address');
				if($location) { ?>
					<li>
						<h5>Dirección</h5>
						<p><?php echo $location['address']; ?><br>
							<a href="https://www.google.com/maps?saddr=My+Location&daddr=<?php echo $location['lat'] . ',' . $location['lng']; ?>" target="_blank">(cómo llegar)</a></p>
					</li><?php
				}


				if(get_field('cost_check')) { ?>
					<li>
						<h5>Costo</h5>
						<p><?php
							if(get_field('cost')) {
								echo '$'.get_field('cost');
							} else {
								echo 'Entrada Gratuita';
							} ?></p>
					</li><?php
				} ?>
				</ul>
			</div>
			<div class="two-col featured-img"><?php
			if ( has_post_thumbnail() ) { ?>
				<div class="img" style="background-image: url('<?php the_post_thumbnail_url( 'large' ); ?>');"></div><?php
			}  ?>
				<?php the_content(); ?>
			</div>
		</div>
	</section>

	<section class="bg-sand">
		<div class="wrap thumbnail-fourths">
			<h3 class="mb24 bg-line"><strong>Próximos Eventos</strong></h3>
			<div class="one-fourth columns">
				<a href="#">
					<div class="img" style="background-image: url('http://placehold.it/750x750');"></div>
					<div class="txt">
						<div class="cir-date">
							<div class="date" style="background-color:#F5F5F5;">
								<p><span>FEB</span></p><p>5</p>
							</div>
						</div>
						<p class="small-txt c-blue" style="color: #E0434A;"><b>Mejora del Entorno</b></p>
						<h3>Teatro de la Ciudad</h3>
					</div>
				</a>
			</div>
			<div class="one-fourth columns">
				<a href="#">
					<div class="img" style="background-image: url('http://placehold.it/750x750');"></div>
					<div class="txt">
						<div class="cir-date">
							<div class="date" style="background-color:#F5F5F5;">
								<p><span>FEB</span></p><p>5</p>
							</div>
							<div class="logo" style="background-color: #F9A41D;">
								<img src="img/logo1.png" alt="">
							</div>
						</div>
						<p class="small-txt c-blue" style="color:#F9A31B;"><b>Mejora del Entorno</b></p>
						<h3>Teatro de la Ciudad</h3>
					</div>
				</a>
			</div>
		</div>
	</section>
<?php

	endwhile; endif;
	get_footer(); ?>
