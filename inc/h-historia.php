<?php
	if(have_rows('header')) { while(have_rows('header')) {
		the_row();
		$title = get_sub_field('title');
		$excerpt = get_sub_field('excerpt');
		$author = get_sub_field('author');
	}}
?>
	<div class="two-col columns"><?php

	if(is_single()) {
		$cat = get_the_category();
		echo '<p><b>'.$cat[0]->name.'</b></p>';
	} else {
		echo '<p><b>Anything else</b></p>';
	}

	?>
		<h1><b><?php the_title(); ?></b></h1><?php

		if( $author ):
			foreach( $author as $post):
				setup_postdata($post);
				if(have_rows('info')) { while(have_rows('info')) {
					the_row();
					$org = get_sub_field('org');
					$rol = get_sub_field('rol');
				}}
				?>
				<div class="featured-content">
					<a href="<?php the_permalink(); ?>" class="info-profile"><?php
					if ( has_post_thumbnail() ) : ?>
						<div class="cir-profile-img" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div><?php
					endif; ?>
						<div class="info">
							<h4 class="small-txt"><strong><?php the_title(); ?></strong></h4>
							<?php if($rol) echo '<h3 class="small-txt">'.$rol.'</h3>'; ?>
							<?php if($org) echo '<p class="small-txt"><strong>'.$org.'</strong></p>'; ?>
						</div>
					</a>
				</div><?php
			endforeach;
			wp_reset_postdata();
		endif;

		?>
	</div><?php

	if(have_rows('header')) { ?>
		<div class="two-col columns">
			<h1><?php echo $title; ?></h1><br>
			<h3><?php echo $excerpt; ?></h3>
		</div><?php
	} ?>
