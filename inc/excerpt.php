<?php
/**
 * Functions for getting article excerpts
 *
 * @link https://thetriangle.org
 *
 * @package Triangle_X
 */

// Set the 'read more' link at the end of the excerpt to an ellipsis
function disable_excerpt_more($more)
{
	return '&hellip;';
}
add_filter('excerpt_more', 'disable_excerpt_more');

// Set the excerpt length to 25 words
function triangle_x_excerpt_length($length)
{
	return 25;
}
add_filter('excerpt_length', 'triangle_x_excerpt_length', 999);

// Get the first paragraph of the article not including image
/*function triangle_x_excerpt($text, $raw_excerpt)
{
	if($raw_excerpt)
	{
        $content = apply_filters('the_content', get_the_content());
        $text = (preg_match(sprintf('~(<p>.+?</p>){%d}~i', 1), $content, $matches)) ? $matches[0] : $content;
    }

    $text = preg_replace("/<img[^>]+\>/i", "", $text);
	return wp_strip_all_tags($text);
}
add_filter('get_the_excerpt', 'triangle_x_excerpt', 20, 2);*/

?>