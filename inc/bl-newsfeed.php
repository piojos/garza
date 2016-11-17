<?php

	$ftdSel = get_sub_field('ftd_news');

	if($ftdSel) {
		$ftdPost = new WP_Query( 'post_type=post&p='.$ftdSel );
		$ftdSelArray = array($ftdSel);
		$restPost = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 3, 'post__not_in' => $ftdSelArray ));
	} else {
		$ftdPost = new WP_Query( 'post_type=post&posts_per_page=1' );
		$restPost = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 3, 'offset' => 1 ));
	}

?>
<div class="block newsfeed push_top push_bot">
	<div class="wrap">
		<div class="titling">
			<h2><?php the_sub_field('title'); ?></h2>
			<a href="<?php echo home_url(); ?>/noticias" class="button">VER TODAS LAS NOTICIAS</a>
		</div><?php

	if ( $ftdPost->have_posts() ) { ?>
		<div class="newsloop"><?php

		// echo $ftdSelArray;
		print_r($ftdSelArray);

		while ( $ftdPost->have_posts() ) {
			$ftdPost->the_post(); ?>
			<div class="featured">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail("large"); ?>
					<h3><?php the_title(); ?></h3>
					<p><?php the_date('M j Y'); ?> por <strong><?php the_author(); ?></strong>.</p>
					<p class="excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id risus sit amet odio posuere commodo non ut metus. Aenean ipsum felis, rutrum id lacus et, blandit mollis orci…</p>
				</a>
			</div><?php
		}
		while ( $restPost->have_posts() ) {
			$restPost->the_post(); ?>
			<div>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail('medium'); ?>
					<h3><?php the_title(); ?></h3>
					<p><?php the_time('M j Y'); ?> por <strong><?php the_author(); ?></strong>.</p>
				</a>
			</div>
			<?php
		} ?>
		</div>
		<div class="titling">
			<a href="<?php echo home_url(); ?>/noticias" class="button">Ver todas las noticias</a>
		</div><?php

		// <div class="pagination">
		// 	<a href="#">2</a>
		// 	<a href="#">3</a>
		// 	<p>...</p>
		// 	<a href="#">▶</a>
		// </div>

		wp_reset_postdata();
	} ?>
	</div>
</div>
