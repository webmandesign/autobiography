<?php defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'autobiography_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function autobiography_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Autobiography, use a find and replace
		 * to change 'autobiography' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'autobiography', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Block editor compatibility.
		 */
		add_theme_support( 'align-wide' );
	}
endif;
add_action( 'after_setup_theme', 'autobiography_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function autobiography_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'autobiography_content_width', 640 );
}
add_action( 'after_setup_theme', 'autobiography_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function autobiography_scripts() {
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Noto+Serif:400,400i,700,700i&display=swap&subset=latin-ext' );

	wp_enqueue_style( 'autobiography-main', get_theme_file_uri( 'assets/css/style.css' ) );
	wp_enqueue_style( 'autobiography-style', get_stylesheet_uri() );

	// For inline styles.
	wp_register_style( 'autobiography', '' );
	wp_enqueue_style( 'autobiography' );

	wp_enqueue_script( 'autobiography-skip-link-focus-fix', get_theme_file_uri( 'assets/js/skip-link-focus-fix.js' ), array(), '20151215', true );

	// For inline scripts.
	wp_register_script( 'autobiography', '', array(), '', true );
	wp_enqueue_script( 'autobiography' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'autobiography_scripts' );

/**
 * Adds inline JavaScript.
 */
function autobiography_js_inline() {
	// Apply dark theme between 20:00 and 7:00.
	wp_add_inline_script(
		'autobiography',
		'var currentTime = new Date(), hours = currentTime.getHours();

		if ( 8 > hours || 20 < hours ) {
			document.body.classList.add( "night-theme" );
		} else {
			document.body.classList.add( "day-theme" );
		}'
	);
}
add_filter( 'wp_enqueue_scripts', 'autobiography_js_inline' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/includes/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';
