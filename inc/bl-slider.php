<?php

	// $gallery = get_sub_field('gallery');

?>


<div class="img-video-slider bg-blue">
	<div class="small-description">
		<div>
			<?php the_sub_field('about'); ?>
		</div>
	</div><?php

	if(have_rows('gallery')) : ?>
		<ul class="slider"><?php
		while(have_rows('gallery')) :
			the_row();
			if(get_sub_field('choose') == 'img') {
				$img = get_sub_field('img'); ?>
			<li><img src="<?php echo $img['sizes']['large']; ?>" alt="<?php echo $img['alt']; ?>"><div><?php echo $img['caption']; ?></div></li><?php
			} else { ?>
			<li><?php the_sub_field('embed'); ?></li><?php
			} ?><?php
		endwhile; ?>
		</ul><?php
	endif;

	?>
	<div class="small-description">
		<?php the_sub_field('details'); ?>
	</div>
</div>
