<?php

	while (have_posts()) :
		the_post();
		echo card();
	endwhile; ?>
