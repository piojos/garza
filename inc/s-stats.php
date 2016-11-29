<?php

	$img_zone = get_field('zone');
	while(have_rows('info')) {
		the_row();
		$hectareas = get_sub_field('hectareas');
		$superficie = get_sub_field('superficie');
		$poblacion = get_sub_field('poblacion');
		$poblacion_tec = get_sub_field('poblacion_tec');
		$viviendas = get_sub_field('viviendas');
	}

?>
<section class="bg-sand">
	<div class="wrap">
		<div class="img-info-wrap three-col">
			<div class="two-col mb40">
				<h3 class="c-aqua">Información Estadística</h3>
			</div>
			<div>
				<div class="three-col columns"><?php
				if( !empty($img_zone) ): ?>
					<div class="map"><img src="<?php echo $img_zone['url']; ?>" alt=""></div><?php
				endif; ?>
					<a href="#" class="c-aqua">Ver ubicación en Google Maps</a>
				</div>
				<div class="one-fourth columns">
					<ul><?php
					if($hectareas) echo '<li><h4>Hectáreas </h4><p>'.$hectareas.'</p></li>';
					if($superficie) echo '<li><h4>Superficie de DistritoTec </h4><p>'.$superficie.'</p></li>';
					if($poblacion) echo '<li><h4>Población </h4><p>'.$poblacion.'</p></li>';
					if($poblacion_tec) echo '<li><h4>Población de DistritoTec </h4><p>'.$poblacion_tec.'</p></li>';
					if($viviendas) echo '<li><h4>Número de Viviendas </h4><p>'.$viviendas.'</p></li>';
					?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
