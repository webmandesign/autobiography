<?php defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();

	get_template_part( 'templates/parts/content/content', get_post_type() );

	echo str_replace(
		'post-navigation',
		'post-navigation alignwide',
		get_the_post_navigation( array(
			'prev_text' => '<span class="nav-label">' . esc_html_x( 'Previous:', 'Entry, post.', 'autobiography' ) . ' </span>%title',
			'next_text' => '<span class="nav-label">' . esc_html_x( 'Next:', 'Entry, post.', 'autobiography' ) . ' </span>%title',
		) )
	);

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

endwhile;

get_footer();
