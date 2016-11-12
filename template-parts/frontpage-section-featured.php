<?php
/**
 * Content template for the big feature article at the top of the front page.
 * 
 * @package Working Copy
 */

// Check to see if there are any featured articles, display the most recent one if there are
$query_featured = new WP_Query(array(
	'meta_key' => 'featured_article',
	'post_type' => array('post', 'snowball'),
	'meta_value' => 1,
	'posts_per_page' => 1
));

if($query_featured->have_posts())
{
	while($query_featured->have_posts())
	{
		$query_featured->the_post();
		$postID = get_the_ID();
		$thumb = get_the_post_thumbnail($post, array('class' => 'single-post-feature'));
		$title = get_the_title();
		$category = get_the_category();
		$link = get_permalink();
		
		echo '<div class="featuredin">Featured This Week in ' . $category[0]->cat_name . '</div>';
		echo '<a href="'.$link.'">' . $thumb . '</a>';
		echo '<a href="'.$link.'">' . $title . '</a>';
		
		// Don't duplicate any featured articles. This carries through from header.php
		$do_not_duplicate[] = $post->ID;
	}
}
?>