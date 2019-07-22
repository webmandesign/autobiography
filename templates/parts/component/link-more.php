<?php defined( 'ABSPATH' ) || exit; ?>

<div class="link-more">
	<a href="<?php the_permalink(); ?>" class="more-link" aria-label="<?php

	echo esc_attr( sprintf(
		/* translators: %s: Name of current post */
		__( 'Continue reading %s', 'memories' ),
		the_title_attribute( array( 'echo' => false ) )
	) );

	?>"><?php

		esc_html_e( 'Continue reading &rarr;', 'memories' );

	?></a>
</div>
