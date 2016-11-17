<div class="block contacto pad_top pad_bot">
	<div class="wrap"><?php


	while(have_rows('redes')) :
		the_row(); ?>
		<div>
			<h3><?php the_sub_field('title'); ?></h3>
			<?php the_sub_field('info'); ?>
		</div><?php
	endwhile;


	while(have_rows('form')) :
		the_row(); ?>
		<div>
			<h3><?php the_sub_field('title'); ?></h3>
			<?php the_sub_field('info'); ?>
			<form>
				<input type="text" placeholder="Nombre">
				<input type="text" placeholder="Correo">
				<textarea placeholder="Mensaje"></textarea>
				<button type="submit">Enviar</button>
			</form>
		</div><?php
	endwhile;


	while(have_rows('join')) :
		the_row(); ?>
		<div>
			<h3><?php the_sub_field('title'); ?></h3>
			<?php the_sub_field('info'); ?>
		</div><?php
	endwhile; ?>
	</div>
</div>
