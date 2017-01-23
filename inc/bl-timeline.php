<section>
	<div class="wrap timeline-block">
		<div class="three-col">
			<div class="two-col mb40">
				<h2 class="c-blue ancla" id="Historia"><strong>Historia</strong></h2></br>
				<?php the_sub_field('about'); ?>
			</div>
		</div><?php
		if(have_rows('years')) { ?>
		<ul><?php
			while (have_rows('years')) {
				the_row();
				$storyImg = get_sub_field('img'); ?>
				<li>
					<h2><?php the_sub_field('year'); ?></h2>
					<figure><?php
						if( !empty($storyImg) ) : ?>
							<img src="<?php echo $storyImg['sizes']['medium']; ?>" alt="<?php the_sub_field('img_caption'); ?>"><?php
						endif; ?>
						<figcaption>
							<p class="m20 c-blue"><?php the_sub_field('img_caption'); ?></p>
							<?php the_sub_field('about'); ?>
						</figcaption>
					</figure>
				</li><?php
			} ?>
		</ul><?php
		}?>
	</div>
</section>
