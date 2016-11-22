<?php

	$options = get_sub_field('options');
	$image = get_sub_field('img');

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
