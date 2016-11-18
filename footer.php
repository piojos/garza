<?php

	wp_footer();

	?>
		<footer>
			<div>
				<div class="logo"><img src="<?php bloginfo('template_url'); ?>/img/logo.svg" alt="Distrito Tec"></div>
				<?php wp_nav_menu( array( 'menu' => 'extra-menu', 'container_class' => 'sitemap' ) ); ?>
			</div>
			<div>
				<div>
					<div class="logo"><img src="<?php bloginfo('template_url'); ?>/img/tec-logo.png" alt="Distrito Tec"></div>
				</br><?php the_field('ft_disclaimer', 'option'); ?><p></p>

				</div>
				<div><?php


				// Social
				if(have_rows('ft_redes', 'option')) : ?>
				<div>
					<ul class="social-media"><?php
					while (have_rows('ft_redes', 'option')) :
					the_row();
					$smName = get_sub_field('name');
					$smIcon = get_sub_field('icon');
					?>
					<li class="tw-btn-foot">
						<a href="<?php the_sub_field('url'); ?>" title="<?php echo $smName; ?>"><?php
							if($smIcon) {
								echo '<img src="'. $smIcon['url'] .'" alt="'. $smIcon['description'] .'"><br>';
							}
							echo $smName; ?></a>
					</li><?php
					endwhile; ?>
					</ul>
				</div><?php
				endif;

					?>
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
