<?php defined( 'ABSPATH' ) || exit; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>

	<header class="entry-header">
		<?php

		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php

				memories_posted_on();
				memories_posted_by();

				?>
			</div>
			<?php
		endif;

		?>
	</header>

	<div class="entry-content">
		<?php

		if ( is_singular() ) {
			the_content();
		} else {
			the_excerpt();

			get_template_part( 'templates/parts/component/link', 'more' );
		}

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'memories' ),
			'after'  => '</div>',
		) );

		?>
	</div>

	<?php if ( is_singular() ) : ?>
	<footer class="entry-footer">
		<?php memories_entry_footer(); ?>
	</footer>
	<?php endif; ?>

</article>
