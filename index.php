<?php defined( 'ABSPATH' ) || exit;

get_header();

if ( have_posts() ) :

	if ( is_home() && ! is_front_page() ) :
		?>

		<header>
			<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
		</header>

		<?php
	elseif ( is_search() ) :
		?>

		<header class="page-header">
			<h1 class="page-title">
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search Results for: %s', 'autobiography' ), '<span>' . get_search_query() . '</span>' );
				?>
			</h1>
		</header>

		<?php
	elseif ( is_archive() ) :
		?>

		<header class="page-header">
			<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
			?>
		</header>

		<?php
	endif;

	?>

	<section class="posts">

	<?php

	while ( have_posts() ) :
		the_post();

		get_template_part( 'templates/parts/content/content', get_post_type() );

	endwhile;

	echo str_replace(
		'posts-navigation',
		'posts-navigation alignwide',
		get_the_posts_navigation()
	);

	?>

	</section>

	<?php

else :

	get_template_part( 'templates/parts/content/content', 'none' );

endif;

get_footer();
