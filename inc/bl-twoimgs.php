<section class="bg-sand">
	<div class="wrap">
		<div class="two-cols gal-txt"><?php
		$imageA = get_sub_field('img_A');
		$imageB = get_sub_field('img_B');

		if( !empty($imageA) ): ?>
			<figure>
				<img src="<?php echo $imageA['sizes']['large']; ?>" alt="<?php echo $imageA['alt']; ?>"><?php
				if($imageA['description']) { ?>
					<figcaption><p><?php echo $imageA['description']; ?></p></figcaption><?php
				} ?>
			</figure><?php
		endif;

		if( !empty($imageB) ): ?>
			<figure>
				<img src="<?php echo $imageB['sizes']['large']; ?>" alt="<?php echo $imageB['alt']; ?>"><?php
				if($imageB['description']) { ?>
					<figcaption><p><?php echo $imageB['description']; ?></p></figcaption><?php
				} ?>
			</figure><?php
		endif; ?>

		</div>
	</div>
</section>
