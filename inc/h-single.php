	<div class="three-col columns"><?php

	if(is_single()) {
		$cat = get_the_category();
		echo '<p><b>'.$cat[0]->name.'</b></p>';
	} else {
		echo '<p><b>Anything else</b></p>';
	}

	?>
		<h1><b><?php the_title(); ?></b></h1>
	</div>
