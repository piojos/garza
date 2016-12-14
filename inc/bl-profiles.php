<section>
	<div class="wrap cir-small-thumbnail">
		<h3 class="c-green bg-line">Involucrados en </br>este  proyecto:</h3><?php

		$involved = get_sub_field('select');

		if( $involved ): ?>
		<div id="profile-thumb-slider"><?php
			foreach($involved as $post):
				setup_postdata($post);
				if(have_rows('info')) { while(have_rows('info')) {
					the_row();
					$org = get_sub_field('org');
					$rol = get_sub_field('rol');
				}}
				?>
					<a href="<?php the_permalink(); ?>"><?php
					if ( has_post_thumbnail() ) : ?>
						<div class="img" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div><?php
					endif; ?>
						<h5 class="small-txt"><strong><?php the_title(); ?></strong></h5>
						<?php if($rol) echo '<p class="small-txt">'.$rol.'</p>'; ?>
						<?php if($org) echo '<p class="small-txt"><span>'.$org.'</span></p>'; ?>
					</a><?php
			endforeach;
			wp_reset_postdata(); ?>
		</div><?php
		endif;

		?>
	</div>
</section>
