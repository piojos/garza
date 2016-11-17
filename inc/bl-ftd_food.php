<?php

	$options = get_sub_field('options');
	$imgMain = get_sub_field('header_img');
	$imgMobile = get_sub_field('header_img_mobile');

?>
<div class="block food<?php echo blockClass($options); ?>" id="ahorita"><?php
if($imgMain) { ?>
	<img src="<?php echo $imgMain['sizes']['large']; ?>" class="large"><?php
}
if($imgMobile) { ?>
	<img src="<?php echo $imgMobile['url']; ?>" class="mobile" alt="<?php echo $imgMobile['alt']; ?>"><?php
} else { ?>
	<img src="<?php echo $imgMain['sizes']['medium']; ?>" class="mobile" alt="<?php echo $imgMain['alt']; ?>"><?php
} ?>
	<h2><?php the_sub_field('title'); ?></h2>
	<?php get_template_part('inc/slider', 'food'); ?>
	<a href="<?php echo home_url(); ?>/menu/" class="gotomenu">CHECA <u>TODO</u> EL MENU</a>
</div>
