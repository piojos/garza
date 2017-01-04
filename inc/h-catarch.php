
<section class="<?php echo bg_color(); ?>">
	<div class="wrap">
		<div class="two-col columns"><?php


	if(is_post_type_archive()) {
		$obj = get_post_type_object( get_post_type() );
		$title = $obj->labels->name .' en <br>Distritotec';
		$legend = 'Filtrar: ';
		$description = $obj->description;

		$thisType = get_terms($obj->taxonomies);

	} elseif(is_archive()) {
		$catID = get_queried_object_id();
		$title = get_cat_name($catID);
		$legend = '';
		$description = category_description( $catID );
	} else {
		$title = 'DistritoTec';
		$legend = '';
		$description = 'El lugar donde viven las grandes ideas.';
	} ?>
			<h1><b><?php echo $title; ?></b></h1>
			<p class="mt20"><b><?php echo $legend; ?></b></p><?php

			if($thisType) { ?>
					<div class="filter-menu">
						<select name="filter" onchange="location = this.value;"><?php
				foreach( $thisType as $pType ) {
					print_r($pType); ?>
							<option value="<?php echo get_term_link($pType); ?>"><?php echo $pType->name; ?> <?php // echo '('.$pType->count.')'; ?> </option><?php
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
