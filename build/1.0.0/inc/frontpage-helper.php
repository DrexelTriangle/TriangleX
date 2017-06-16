<?php
/**
 * Helper functions for populating the front page
 *
 * @link https://thetriangle.org
 *
 * @package Triangle_X
 */

$do_not_duplicate = array();
 
// Check to see if there are any featured articles, display the most recent one if there are
function get_frontpage_feature()
{
	global $do_not_duplicate;
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
			$link = get_permalink();
			array_push($do_not_duplicate, $postID);
			
			printf('<a href="%1$s">%2$s</a>', $link, get_the_post_thumbnail());
			printf('<a class="text-headline-large" href="%1$s">%2$s</a>', $link, get_the_title());
			printf('<div class="frontpage-postinfo">By %1$s | %2$s</div>', coauthors_posts_links(null, null, null, null, false), get_the_date('M. j, Y'));
			printf('<div class="frontpage-feature-excerpt">%1$s</div>', get_the_summary($postID));
		}
	}
}

// Gets first sponsored article
function get_sponsored_message()
{
	$options = get_option('ad_options');
	if ($options['show_frontpage_sponsor'] == false)
	{
		return;
	}
	
	$posts = get_posts(array('posts_per_page' => 1, 'offset' => 0, 'category_name' => 'sponsored-articles'));
	
	if (!empty($posts))
	{
		foreach($posts as $post)
		{
			the_post();
			setup_postdata($post);
			
			$postID = $post->ID;
			$title = get_the_title($postID);
			$link = get_permalink($postID);
			$date = get_the_date('M. j, Y', $postID);
			$sponsor = get_the_author($postID);
			$excerpt = get_the_excerpt($postID);
			$thumb = get_the_post_thumbnail($post, array('class' => '169-preview-medium'));
			
			printf('<section id="frontpage-sponsor" class="ad-container-sponsor-frontpage">');
			printf('<div class="category-post" style="border: none">');
			printf($thumb);
			printf('<div class="category-post-info">');
			printf('<a class="text-headline-medium" href="%1$s">%2$s</a>', esc_attr($link), esc_html($title));
			printf('<div class="category-author">Sponsored by %1$s</div>', $sponsor);
			printf('<div class="category-tease">%1$s</div>', $excerpt);
			printf('<p><p class="ad-disclaimer">Advertisement</p></p>');
			printf('</div>');
			printf('</div>');
			printf('</section>');
		}
	}
}

function populate_most_popular($numPosts)
{
	if(function_exists('stats_get_csv'))
	{
        $popular = stats_get_csv('postviews', array('days' => 2, 'limit' => $numPosts));
		
        echo '<ul class="frontpage-item-container">';
		
        foreach ($popular as $p)
		{			
			echo '<li class="frontpage-item-list">';
			printf('<a class="text-headline-small" href="%1$s">%2$s</a>', $p['post_permalink'], $p['post_title']);
			//printf('<div class="frontpage-postinfo">By %1$s | %2$s</div>', $p['post_author'], get_the_date('M. j, Y', $postID));
			printf('<div class="frontpage-postinfo">By %1$s</div>', $p['post_author']);
			echo '</li>';
        }
        
		echo '</ul>';
	}
	else
		echo("No popular posts found. Check Jetpack connection.");
}

// Prints out results from specified category without thumbnails
function populate_category($cat, $numPosts)
{
	$posts = [];
	$posts = get_posts(array('posts_per_page' => $numPosts, 'offset' => 0, 'category_name' => $cat));
	
	echo '<ul class="frontpage-item-container">';
	
	foreach($posts as $post)
	{
		$postID = $post->ID;
		setup_postdata($post);
		
		echo '<li class="frontpage-item-list">';
		printf('<a class="text-headline-small" href="%1$s">%2$s</a>', get_the_permalink($postID), get_the_title($postID));
		printf('<div class="frontpage-postinfo">By %1$s | %2$s</div>', get_the_author($postID), get_the_date('M. j, Y'));
		echo '</li>';
	}
	
	echo '</ul>';
}

// Prints out results from specified category with thumbnails
function populate_category_include_thumbnails($cat, $numPosts, $ulClass = '')
{
	global $do_not_duplicate;
	$query = new WP_Query(array('posts_per_page' => $numPosts, 'offset' => 0, 'category_name' => $cat, 'post__not_in' => $do_not_duplicate));
	
	echo '<ul class="frontpage-item-container ' . $ulClass . '">';
	
	while($query->have_posts())
	{
		$query->the_post();
		$postID = $post->ID;
		
		echo '<li class="frontpage-item-thumbnail ' . $ulClass . '">';
		if(has_post_thumbnail($postID))
		{
			printf('<a href="%1$s">%2$s</a>', get_the_permalink($postID), get_the_post_thumbnail($postID));
			printf('<div class="frontpage-postinfo">By %1$s | %2$s</div>', coauthors_posts_links($postID, null, null, null, false), get_the_date('M. j, Y', $postID));
			printf('<a class="text-headline-small" href="%1$s">%2$s</a>', get_the_permalink($postID), get_the_title($postID));
		}
		else
		{
			printf('<a class="text-headline-medium" href="%1$s">%2$s</a>', get_the_permalink($postID), get_the_title($postID));
			printf('<div class="frontpage-postinfo">By %1$s | %2$s</div>', coauthors_posts_links($postID, null, null, null, false), get_the_date('M. j, Y', $postID));
			printf('<p>%1$s</p>', get_the_summary($postID));
		}
		echo '</li>';
	}
	
	echo '</ul>';
}

// Inserts breaking news alert
function insert_breaking_news()
{
	// Check to see if we have any breaking news using custom fields
	$query_breaking = new WP_Query(array(
		'meta_key' => 'breaking_news',
		'meta_value' => 1
	));

	// If we have breaking news, iterate over all content while keeping count.
	if($query_breaking->have_posts())
	{
		$i = 1;
		$post_count = $query_breaking->post_count;
		$span = '';

		while($query_breaking->have_posts())
		{
			$query_breaking->the_post();
			
			// Make sure any breaking news items aren't duplicated, using our array.
			//$do_not_duplicate[] = $post->ID; 
			
			// Concatenate breaking news stories into one string
			$span = sprintf('<span id="breaking-1" class="breaking-notification">Breaking News: <a class="breaking-headline" href=%1$s>%2$s</a></span>', get_the_permalink(), get_the_title());
			$span .= sprintf('<span id="breaking-2" class="breaking-notification">Breaking News: <a class="breaking-headline" href=%1$s>%2$s</a></span>', get_the_permalink(), get_the_title());
			
			// Use our count to add an elipsis to the end of each title except the last one.
			if($i < $post_count)
				echo '&hellip;';
			
			$i++;
		}
		
		// Echo marquee with duplaicated spans
		echo '<div class="marquee"> <div>';
		echo $span;
		echo '</div> </div>';
	}
}

?>