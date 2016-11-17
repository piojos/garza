<?php // <section id="promos">

	$options = get_sub_field('options');
	$imgMain = get_sub_field('img_big');
	$imgMobile = get_sub_field('img_mobile');
	$imgHuge = get_sub_field('img_huge');
	$hasLink = get_sub_field('link');
	if(in_array('bg', $options)) $hasBg = 1;

	while ( have_rows('bg') ) : the_row();
		$bgImg = get_sub_field('image');
		$bgColor = get_sub_field('color');
	endwhile;

	// echo $hasBg;

?>
	<div class="block promo<?php echo blockClass($options); ?>"<?php
		if($hasBg) {

			echo 'style="';
			// if($bgImg)
			echo 'background-image:url('.$bgImg['url'].'); ';
			if($bgColor) echo 'background-color:'.$bgColor.'; ';
			echo '"';
		} ?>><?php

			// <a>
			if($hasLink) echo '<a href="'.$hasLink.'" target="_blank">';

			if(in_array('content', $options)) { ?>
				<div class="wrap content">
					<?php the_sub_field('content'); ?>
				</div><?php
			} else {
				if(!$hasBg) {
					if($imgHuge) { ?>
						<img src="<?php echo $imgHuge['url']; ?>" class="huge" alt="<?php echo $imgHuge['alt']; ?>"><?php
					} else { ?>
						<img src="<?php echo $imgMain['url']; ?>" class="huge" alt="<?php echo $imgMain['alt']; ?>"><?php
					}
				} ?>
				<img src="<?php echo $imgMain['sizes']['large']; ?>" class="<?php if(!$hasBg) { echo 'large'; } else { echo 'both'; } ?>"><?php
				if($imgMobile) { ?>
					<img src="<?php echo $imgMobile['url']; ?>" class="mobile" alt="<?php echo $imgMobile['alt']; ?>"><?php
				} else { ?>
					<img src="<?php echo $imgMain['sizes']['medium']; ?>" class="mobile" alt="<?php echo $imgMain['alt']; ?>"><?php
				}
			}

			// <a>
			if($hasLink) echo '</a>'; ?>
	</div>

<?php /*
	<div class="block promo complex push_top push_bot no_text back_cover" >
		<!-- no_text: No text, removes the inline-style bottom margin from images & no .wrap on content -->
		<!-- back_cover back_center -->
		<div class="content">
			<div style="text-align:center;">
				<img src="http://placehold.it/1000x500&text=LARGE">
			</div>
		</div>
	</div>


	<div class="block promo complex pad_top pad_bot" style="background-color:#FFB6C1">
		<!-- style="background-image:url(http://placehold.it/80x40&text=tile)" -->
		<!-- back_cover back_center back_tile: style="background-image:url(tile.jpg)" -->
		<div class="wrap content">
		</div>
	</div>
</section> */ ?>
