<?php
/**
 * Helper functions for populating the front page
 *
 * @link https://thetriangle.org
 *
 * @package Triangle_X
 */

// Check to see if there are any featured articles, display the most recent one if there are
function get_frontpage_feature()
{
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
			$thumb = get_the_post_thumbnail($post);
			$title = get_the_title();
			$category = get_the_category();
			$excerpt = get_the_excerpt();
			$author = get_the_author();
			$date = get_the_date();
			$link = get_permalink();
			$catName = $category[0]->cat_name;
			
			printf('<h1 class="frontpage-category-title">Featured This Week in %1$s</h1>', $catName);
			printf('<a href="%1$s">%2$s</a>', $link, $thumb);
			printf('<a class="frontpage-feature-link" href="%1$s">%2$s</a>', $link, $title);
			printf('<div class="frontpage-postinfo">By %1$s | %2$s</div>', $author, $date);
			printf('<div class="frontpage-feature-excerpt">%1$s</div>', $excerpt);
		}
	}
}

function populate_category($cat, $numPosts)
{
	$posts = [];
	$posts = get_posts(array('posts_per_page' => $numPosts, 'offset' => 0, 'category_name' => $cat));
	
	echo '<ul class="frontpage-item-container">';
	
	foreach ($posts as $post)
	{
		$postID = $post->ID;
		setup_postdata($post);
		
		echo '<li class="frontpage-item-list">';
		printf('<a class="link" href="%1$s">%2$s</a>', get_the_permalink($postID), get_the_title($postID));
		printf('<div class="frontpage-postinfo">By %1$s | %2$s</div>', get_the_author($postID), get_the_date('M. j, Y', $postID));
		echo '</li>';
	}
	
	echo '</ul>';
}

function populate_category_include_thumbnails($cat, $numPosts)
{
	$posts = [];
	$posts = get_posts(array('posts_per_page' => $numPosts, 'offset' => 0, 'category_name' => $cat));
	
	echo '<ul class="frontpage-item-container">';
	
	foreach ($posts as $post)
	{
		$postID = $post->ID;
		setup_postdata($post);
		
		echo '<li class="frontpage-item-thumbnail">';
		if(has_post_thumbnail($postID))
		{
			printf('<a href="%1$s">%2$s</a>', get_the_permalink($postID), get_the_post_thumbnail($postID));
			printf('<div class="frontpage-postinfo">By %1$s | %2$s</div>', get_the_author($postID), get_the_date('M. j, Y', $postID));
			printf('<a class="link" href="%1$s">%2$s</a>', get_the_permalink($postID), get_the_title($postID));
		}
		else
		{
			printf('<a class="link-big" href="%1$s">%2$s</a>', get_the_permalink($postID), get_the_title($postID));
			printf('<div class="frontpage-postinfo">By %1$s | %2$s</div>', get_the_author($postID), get_the_date('M. j, Y', $postID));
			printf('<p>%1$s</p>', get_the_excerpt($post));
		}
		echo '</li>';
	}
	
	echo '</ul>';
}

?>