<?php
/**
 * Triangle X functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Triangle_X
 */

if (!function_exists('triangle_x_setup'))
{
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function triangle_x_setup()
	{
		date_default_timezone_set('America/New_York');
		
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Triangle X, use a find and replace
		 * to change 'triangle-x' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('triangle-x', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');
		add_image_size('standard-monitor', 1280, 960, true);
		add_image_size('hd-video', 1280, 720, true);
		add_image_size('feature-jumbotron', 1480, 560, true);
		add_image_size('169-preview-large', 1600, 900, true);
		add_image_size('169-preview-medium', 800, 450, true);
		add_image_size('169-preview-small', 400, 225, true);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'main' => esc_html__('Main', 'triangle-x'),
			'sub' => esc_html__('Sub', 'triangle-x'),
			'footer' => esc_html__('Footer', 'triangle-x')
		));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('triangle_x_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));
	}
}
add_action('after_setup_theme', 'triangle_x_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function triangle_x_content_width()
{
	$GLOBALS['content_width'] = apply_filters('triangle_x_content_width', 640);
}
add_action('after_setup_theme', 'triangle_x_content_width', 0);

/**
 * Register custom theme widgets.
 *
 * @link https://codex.wordpress.org/Widgets_API
 */

require get_template_directory() . '/widgets/fp-2x3-feature.php';
require get_template_directory() . '/widgets/fp-story-grid.php';
require get_template_directory() . '/widgets/mailchimp-signup.php';
require get_template_directory() . '/widgets/social-widget.php';

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function triangle_x_widgets_init()
{
	register_sidebar(array(
		'name'          => 'Global Sidebar',
		'id'            => 'sidebar-global',
		'description'   => 'Sidebar for all pages except the front page.',
		'before_widget' => '<div id="%1$s" class="sidebar-item %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="sidebar-title">',
		'after_title'   => '</div>',
	));
	
	register_sidebar(array(
		'name'          => 'Frontpage Sidebar',
		'id'            => 'sidebar-frontpage',
		'description'   => 'Sidebar for front page only.',
		'before_widget' => '<div id="%1$s" class="sidebar-item %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="sidebar-title">',
		'after_title'   => '</div>',
	));
	
	register_sidebar(array(
		'name'          => 'Frontpage Content Top',
		'id'            => 'frontpage-content-top',
		'description'   => 'Content for the top part of the front page.',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	));
	
	register_sidebar(array(
		'name'          => 'Frontpage Content Bottom',
		'id'            => 'frontpage-content-bottom',
		'description'   => 'Content for the bottom part of the front page.',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h1 class="frontpage-category-title">',
		'after_title'   => '</h1>',
	));
}
add_action('widgets_init', 'triangle_x_widgets_init');

// Enqueue scripts and styles.
function triangle_x_scripts()
{
	// jQuery
	wp_deregister_script('jquery');
	wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js", false, null);
	wp_enqueue_script('jquery');
	
	// jQuery viewport plugin
	wp_enqueue_script('triangle-x-inviewport', get_template_directory_uri() . '/js/jquery.viewport.js', array(), '20151215', true);
	
	wp_enqueue_style('triangle-x-style', get_stylesheet_uri());
	wp_enqueue_script('triangle-x-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);
	wp_enqueue_script('triangle-x-search', get_template_directory_uri() . '/js/search.js', array(), '20151215', true);
	wp_enqueue_script('triangle-x-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

	if (is_singular() && comments_open() && get_option('thread_comments'))
		wp_enqueue_script('comment-reply');
}
add_action('wp_enqueue_scripts', 'triangle_x_scripts');

// Disable admin bar
add_filter( 'show_admin_bar', '__return_false' );
show_admin_bar(false);
show_admin_bar(0);

// Abstraction layer for advertisement functions
require get_template_directory() . '/inc/advertisements.php';

// Implement the Custom Header feature.
require get_template_directory() . '/inc/custom-header.php';

// Customizer additions.
require get_template_directory() . '/inc/customizer.php';

// Functions for excerpt configuration
require get_template_directory() . '/inc/excerpt.php';

// Custom functions that act independently of the theme templates.
require get_template_directory() . '/inc/extras.php';

// Helper functions for populating the front page
require get_template_directory() . '/inc/frontpage-helper.php';

// Load Jetpack compatibility file.
require get_template_directory() . '/inc/jetpack.php';

// Advertisement options admin page
require get_template_directory() . '/inc/options.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';
