<?php

	$images = get_sub_field('gallery'); ?>


<div class="img-video-slider bg-blue">
	<div class="small-description">
		<div>
			<?php the_sub_field('about'); ?>
		</div>
	</div><?php

	if( $images ): ?>
	<ul class="slider"><?php
		foreach( $images as $image ): ?>
			<li><img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>"><div><?php echo $image['caption']; ?></div></li><?php
		endforeach; ?>
	</ul><?php
	endif;

	?>
	<div class="small-description">
		<?php the_sub_field('details'); ?>
	</div>
</div>
