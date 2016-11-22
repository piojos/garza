<?php

	$options = get_sub_field('options');
	$image = get_sub_field('img');

/*

<div class="block about<?php echo blockClass($options); ?>" style="background:#FFDF22">
	<div class="wrap content wrap tight"><?php
	if($image) { ?>
		<img src="<?php echo $image['url']; ?>" width="300" class="alignleft" alt="<?php echo $image['alt']; ?>"><?php
	} ?>
		<?php the_sub_field('text'); ?>
	</div>
</div>
*/
?>


<!-- MORE-TXT BLOCK -->
<section class="bg-sand">
	<div class="wrap">
		<div class="three-col">
			<div class="two-col mb40">
				<h3 class="c-blue"><?php the_sub_field('title'); ?></h3>
			</div>
			<div class="one-col columns col-x2">
				<?php the_sub_field('content'); ?>
			</div>
		</div>
	</div>
</section>
