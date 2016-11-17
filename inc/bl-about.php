<?php

	$options = get_sub_field('options');
	$image = get_sub_field('img');


?>
<div class="block about<?php echo blockClass($options); ?>" style="background:#FFDF22">
	<div class="wrap content wrap tight"><?php
	if($image) { ?>
		<img src="<?php echo $image['url']; ?>" width="300" class="alignleft" alt="<?php echo $image['alt']; ?>"><?php
	} ?>
		<?php the_sub_field('text'); ?>
	</div>
</div>
