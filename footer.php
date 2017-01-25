<?php

	wp_footer(); ?>
		<footer style="background-image: url(<?php bloginfo('template_url'); ?>/img/about1.jpg);">
			<div class="sitemap">
				<div class="bg-aqua-mask"></div>
				<div class="two-col columns">
					<h1 class="c-white"><strong>Una iniciativa de regeneración urbana</strong></h1>
				</div>
				<div class="two-col columns">
					<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container_class' => 'three-cols' ) ); ?>
					<?php /* <ul class="three-cols">
						<li><a href="#">Proyectos</a></li>
						<li><a href="#">Eventos</a></li>
						<li><a href="#">Noticias</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">Participantes</a></li>
						<li><a href="#">Acerca</a></li>
						<li><a href="#">Contáctanos</a></li>
						<li><a href="#">Newsletter</a></li>
						<li><a href="#">Colonias</a></li>
					</ul> */ ?>
				</div>
			</div>

			<?php /* <div class="contact-block">
				<div class="bg-white-mask"></div>
				<h3><strong>Escríbenos:</strong></h3>
				<form>
					<input type="text" placeholder="Tu Nombre:">
					<input type="text" placeholder="Tu Apellido:">
					<input type="text" placeholder="Tu Correo:">
					<input type="text" placeholder="Asunto:">
					<input type="submit" value="ENVIAR">
				</form>
			</div> */ ?>

			<div class="rights">
				<div class="bg-white-mask"></div>
				<div class="logo"><img src="<?php bloginfo('template_url'); ?>/img/logo.svg" alt="Distrito Tec"></div>
				<div>
					<div class="two-col">
						<!-- <div class="logo"><img src="< ?php bloginfo('template_url'); ?>/img/tec-logo.png" alt="Distrito Tec"></div> -->
						</br><p><?php the_field('ft_disclaimer', 'option'); ?></p>
					</div><?php


					// Social
					if(have_rows('ft_redes', 'option')) : ?>
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
					</ul><?php
					endif;

					?>
				</div>
			</div>
		</footer>

		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-90416762-1', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

	</body>
</html>
