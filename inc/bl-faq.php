<div class="block faq push_bot push_top pad_bot">
	<div class="wrap content">
		<h2><?php the_sub_field('title'); ?></h2><?php


		if(have_rows('q_and_a')) : ?>
		<dl class="wrap tight"><?php
			while (have_rows('q_and_a')) {
				the_row(); ?>
				<dt><?php the_sub_field('question'); ?></dt>
				<dd><?php the_sub_field('answer'); ?></dd><?php
			} ?>
		</dl><?php
		endif; ?>
	</div>
</div>
