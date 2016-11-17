<?php /*
<div class="block video">
	<!-- video -->
</div> */

if(have_rows('intro')) :
	while(have_rows('intro')) { the_row();
		$fallback = get_sub_field('fallback');
		$webm = get_sub_field('webm');
		$mp4 = get_sub_field('mp4');
		$introClass = ' intro';
	}
else :
	$fallback = get_sub_field('fallback');
	$webm = get_sub_field('webm');
	$mp4 = get_sub_field('mp4');
endif;
$animatedLogo = get_field('logo_anim', 'options');

 ?>


<div class="block video<?php echo $introClass; ?>"><?php
	if( !empty($animatedLogo) ): ?>
	<div class="message">
		<img id="sticky" src="<?php echo $animatedLogo['url']; ?>" alt="<?php echo $animatedLogo['alt']; ?>" class="random" data-aos="huge-out" data-aos-anchor-placement="top-top" />
	</div><?php
	endif; ?>
	<video poster='<?php echo $fallback[url]; ?>' playsinline autoplay muted loop ><?php
	if($webm) { ?>
		<source src='<?php echo $webm[url]; ?>' type='video/webm'><?php
	}

	if($mp4) { ?>
		<source src='<?php echo $mp4[url]; ?>' type='video/mp4'><?php
	} ?>
	</video>

</div>
