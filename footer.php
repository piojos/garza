<?php

	wp_footer();
	$yeLogo = get_field('ft_logo_main', 'option');
	$yeMenu = get_field('ft_menu_main', 'option'); // Post Objects
	$whLogo = get_field('ft_logo_low', 'option');

	?>
		<footer class="footer" role="contentinfo">

			<div class="socks">
				<div class="wrap">
					<a class="logo"><?php


					// Logo
					if($yeLogo) {
						echo '<img src="'. $yeLogo['url'] .'" alt="'. $yeLogo['description'] .'" class="desktop">';
					} ?>
					</a><?php


					// Menu
					if( $yeMenu ): ?>
					<div class="nav"><?php
						foreach( $yeMenu as $post_object):
						$title = get_the_title($post_object->ID); ?>
						<a href="<?php echo get_permalink($post_object->ID); ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a><?php
						endforeach; ?>
					</div><?php
					endif;


					// Social
					if(have_rows('ft_redes', 'option')) : ?>
					<div class="social"><?php
						while (have_rows('ft_redes', 'option')) :
						the_row();
						$smName = get_sub_field('name');
						$smIcon = get_sub_field('icon');
						?>
						<a href="<?php the_sub_field('url'); ?>" title="<?php echo $smName; ?>"><?php
							if($smIcon) {
								echo '<img src="'. $smIcon['url'] .'" alt="'. $smIcon['description'] .'">';
							}
						?></a><?php
						endwhile; ?>
					</div><?php
					endif;



					// Sucursales
					global $post;
					if(!($post->post_name == 'sucursales')) { // Hide if in 'sucursales' page

						if(have_rows('ft_sucursales', 'option')) : ?>
						<ul><?php
							while (have_rows('ft_sucursales', 'option')) :
							the_row(); ?>
							<li>
								<?php the_sub_field('info'); ?>
							</li><?php
							endwhile; ?>
						</ul><?php
						endif;
					}

					?>
				</div>
			</div>

			<div class="copyright">
				<div class="wrap"><?php


					// End logo
					if($whLogo) { ?>
					<a href="<?php echo home_url(); ?>" class="logo">
						<img src="<?php echo $whLogo['url']; ?>" alt="<?php echo $whLogo['description']; ?>" class="desktop">
					</a><?php
					} ?>

					<div class="disclaim">
						Todos los derechos reservados.<br>
						<?php bloginfo('name'); ?> &copy; <?php echo date('Y'); ?>. <a href="//raidho.mx" target="_blank">Raidho</a>.
					</div><?php


					// Sub navigation
					if(have_rows('ft_links', 'option')) : ?>
					<div class="sub_nav"><?php
						while (have_rows('ft_links', 'option')) :
						the_row();
						$smName = get_sub_field('name');
						$showMobile = get_sub_field('options'); ?>
						<a href="<?php the_sub_field('url'); ?>" title="<?php echo $smName; ?>"<?php
							if($showMobile) echo ' class="legal"'; ?>><?php echo $smName; ?></a><?php
						endwhile; ?>
					</div><?php
					endif; ?>
				</div>
			</div>

		</footer>

		<!-- analytics
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>
 		-->

	</body>
</html>
