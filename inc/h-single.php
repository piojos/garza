	<div class="<?php if(is_singular('eventos')) {echo 'two-col';} else {echo 'three-col';} ?> columns"><?php

	$obj = get_post_type_object( get_post_type($post->ID) );
	$thisType = wp_get_post_terms(get_the_id(), $obj->taxonomies[0]);

	if(is_singular('eventos')) {
		echo '<h4 class="mb20"><strong>Evento</strong></h4>';
	} elseif(is_single()) {
		$cat = get_the_category();
		echo '<p><b>'.$cat[0]->name.'</b></p>';
	} else {
		echo '<p><b>Anything else</b></p>';
	}

	?>
		<h1><b><?php the_title(); ?></b></h1><?php

	if(is_singular('eventos')) { ?>
		<h3 class="mb20 c-red" style="color:<?php the_field('color', 'tipos_de_eventos_'.$thisType[0]->term_id); ?>;"><b><?php echo listCategories($thisType); ?></b></h3><?php
	} ?>
	</div><?php
	if(have_rows('area_contact')) {
		while (have_rows('area_contact')) {
			the_row();
			$name = get_sub_field('name');
			$phone = get_sub_field('phone');
			$email = get_sub_field('email');
			$fb_link = get_sub_field('fb_link');
			$tw_link = get_sub_field('tw_link');
		}
	}
	if($name AND ($phone OR $email) ) { ?>

	<div class="profile-specs">
		<h4><img src="<?php bloginfo('template_url'); ?>/img/icon1.svg"> <span>Contacta a la Mesa Directiva de esta colonia:</span></h4>
		<ul><?php
		if(!empty($name)) echo '
			<li><img src="'.get_template_directory_uri().'/img/icon2.svg"><strong>'.$name.'</strong></li>';
		if(!empty($phone)) echo '
			<li><a href="tel:'.$phone.'"><img src="'.get_template_directory_uri().'/img/icon3.svg"><u>'.$phone.'</u></a></li>';
		if(!empty($email)) echo '
			<li><a href="mailto:'.$email.'"><img src="'.get_template_directory_uri().'/img/icon4.svg"><u>'.$email.'</u></a></li>';
		if(!empty($fb_link)) echo '
			<li><a href="http://facebook.com/'.$fb_link.'"><img src="'.get_template_directory_uri().'/img/icon5.svg"><u>/'.$fb_link.'</u></a></li>';
		if(!empty($tw_link)) echo '
			<li><a href="https://twitter.com/'.$tw_link.'"><img src="'.get_template_directory_uri().'/img/icon6.svg"><u>@'.$tw_link.'</u></a></li>'; ?>
		</ul>
	</div><?php

	} ?>
