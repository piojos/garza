<?php
 ?>

<section class="bg-blue">
	<div class="wrap">
		<div class="two-col columns"><?php

	if(is_post_type_archive()) {
		$title = 'Proyectos en <br>Distritotec';
		$legend = 'Tipos: ';
		$description = 'Documentamos la mejora del entorno social en Distrito Tec con el campus y Cluster tecnológico.';
		$thisType = get_terms('tipos_de_proyectos');
	} elseif(is_archive()) {
		$catID = get_queried_object_id();
		$title = get_cat_name($catID);
		$legend = '';
		$description = category_description( $catID );
	} else {
		$title = '–';
		$legend = '–';
		$description = '';
	} ?>
			<h1><b><?php echo $title; ?></b></h1>
			<p class="mt20"><b><?php echo $legend; ?></b></p><?php

	if($thisType) {
		// echo '<pre>';
		// print_r($thisType);
		// echo '</pre>';
		// $slug = get_terms('tipos_de_proyectos');
		// $all = get_term_link($thisType, 'cluster');
		// echo $all; ?>
			<div class="filter-menu">
				<select name="filter" onchange="location = this.value;"><?php
		foreach( $thisType as $pType ) { ?>
					<option value="<?php // echo get_term_link('tipos_de_proyectos', $pType->slug); ?>"><?php echo $pType->name; ?> (<?php echo $pType->count; ?>) </option><?php
		} ?>
				</select>
			</div><?php
	} ?>
		</div>
		<div class="two-col columns">
			<h1><?php echo $description; ?></h1>
		</div>
	</div>
</section>
