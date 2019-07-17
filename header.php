<?php defined( 'ABSPATH' ) || exit;

?><!doctype html>

<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'autobiography' ); ?></a>

<header id="masthead" class="site-header">

	<div class="site-branding">
		<?php

		if ( is_front_page() && is_home() ) :
			?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php
		else :
			?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
		endif;

		$autobiography_description = get_bloginfo( 'description', 'display' );

		if ( $autobiography_description || is_customize_preview() ) :
			?>
			<p class="site-description"><?php echo $autobiography_description; /* WPCS: xss ok. */ ?></p>
			<?php
		endif;

		?>
	</div>

	<div class="site-search">
		<?php get_search_form(); ?>
	</div>

</header>

<div id="content" class="site-content">
<main id="content" class="site-main content-area">
