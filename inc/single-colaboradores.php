<?php

function makelupe($rows) {
	if($rows) {
		$luper = array();
		// $luper = $rows;
		foreach($rows as $row) {
			// $luper[] .= $row['author'];
			$authPosts = $row['author'];
			foreach($authPosts as $authPost) {
				$luper[] .= $authPost;
				// $luper[] .= $authPost->post_name;
			}
		}
	}
	return $luper;
}

	if(have_rows('info')) { while(have_rows('info')) {
		the_row();
		$org = get_sub_field('org');
		$rol = get_sub_field('rol');
	}}

?>
<section class="bg-aqua">
	<div class="wrap">
		<div class="two-col columns">
			<h1 class="c-black"><strong><?php the_title(); ?></strong></h1>
			<?php if($rol) echo '<h4><strong>'.$rol.'</strong></h4>'; ?>
			<?php if($org) echo '<h3 class="mt20"><strong>'.$org.'</strong></h3>'; ?>
		</div>
	</div>
</section>

<section class="bg-sand single-profile">
	<div class="wrap">
		<div class="two-col description">
			<?php the_content(); ?>
		</div>
		<div class="two-col profile-picture"><?php
		if ( has_post_thumbnail() ) : ?>
			<div class="img" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div><?php
		endif; ?>
			<h5 class="mt20"><strong>Contacto</strong></h5><?php

			if(have_rows('redes')) { ?>
			<ul><?php
				while(have_rows('redes')) { the_row(); ?>
				<li><a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('name'); ?></a></li><?php
				} ?>
			</ul><?php
			}

			?>
		</div>
	</div><?php

	// Related

	$relatedStories = array(
		'post_type' => 'post',
		'category_name' => 'historias',
		'posts_per_page' => -1,
		'meta_query'	=> array(
			array(
				'key'		=> 'header_%_author',
				'compare'	=> 'LIKE',
				'value'		=> get_the_ID()
			)
		)
	);

	$relatedProjects = array(
		'post_type' => 'proyectos',
		'posts_per_page' => -1,
		'meta_query'	=> array(
			array(
				'key'		=> 'bloques_%_select',
				'compare'	=> 'LIKE',
				'value'		=> get_the_ID()
			)
		)
	);


	$story_query = new WP_Query( $relatedStories );
	$projects_query = new WP_Query( $relatedProjects );
	$result = new WP_Query();

	$result->posts = array_merge( $story_query->posts, $projects_query->posts );
	$result->post_count = count( $result->posts );

	if ( $result->have_posts() ) : ?>

	<div class="wrap thumbnail-fourths">
		<h3 class="mb24 bg-line"><strong>Ha colaborado en:</strong></h3><?php

		while ( $result->have_posts() ) :
			$result->the_post();

			echo card();

		endwhile;
		wp_reset_postdata(); ?>
	</div><?php
	endif;


	?>
</section>
