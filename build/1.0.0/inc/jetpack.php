<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.com/
 *
 * @package Triangle_X
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 */
function triangle_x_jetpack_setup()
{
	// Add theme support for Infinite Scroll.
	add_theme_support('infinite-scroll', array(
		'container' => 'main',
		'render'    => 'triangle_x_infinite_scroll_render',
		'footer'    => 'page',
	));

	// Add theme support for Responsive Videos.
	add_theme_support('jetpack-responsive-videos');
}
add_action('after_setup_theme', 'triangle_x_jetpack_setup');

// Custom render function for Infinite Scroll.
function triangle_x_infinite_scroll_render()
{
	while (have_posts())
	{
		the_post();
		
		if (is_search())
			get_template_part('template-parts/content', 'search');
		else
			get_template_part( 'template-parts/content', get_post_format() );
	}
}

// Removes ShareDaddy buttons from bottom of content posts.
function jptweak_remove_share()
{
    remove_filter('the_content', 'sharing_display', 19);
    remove_filter('the_excerpt', 'sharing_display', 19);
    if (class_exists('Jetpack_Likes'))
        remove_filter('the_content', array(Jetpack_Likes::init(), 'post_likes'), 30, 1);
}
add_action('loop_start', 'jptweak_remove_share');

?>
