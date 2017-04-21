<?php
/**
 * Functions for getting article excerpts
 *
 * @link https://thetriangle.org
 *
 * @package Triangle_X
 */

// Remove read more link at end of excerpt
function disable_excerpt_more($more)
{
	return '';
}
add_filter('excerpt_more', 'disable_excerpt_more');

// Set the excerpt length to more than necessary
function triangle_x_excerpt_length($length)
{
	return 999;
}
add_filter('excerpt_length', 'triangle_x_excerpt_length', 999);

// Get the first paragraph of the article
function triangle_x_excerpt($text, $raw_excerpt)
{
	if($raw_excerpt)
	{
        $content = apply_filters('the_content', get_the_content());
        $text = (preg_match(sprintf('~(<p>.+?</p>){%d}~i', 1), $content, $matches)) ? $matches[0] : $content;
    }

    $text = preg_replace("/<img[^>]+\>/i", "", $text);
	return wp_strip_all_tags($text);
}
add_filter('get_the_excerpt', 'triangle_x_excerpt', 20, 2);

function get_the_summary($id)
{
	$value = get_field("summary", $id);

	if($value)
	{		
		return $value;
	}
	else
	{		
		return get_the_excerpt($id);
	}
}

?>