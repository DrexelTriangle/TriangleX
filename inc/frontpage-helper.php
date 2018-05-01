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
			printf('<div class="frontpage-postinfo">Featured this week in %1$s</div>', get_the_category()[0]->name);
			printf('<div class="category-author">By %1$s | %2$s</div>', coauthors_posts_links(null, null, null, null, false), get_the_date('M. j, Y'));
			printf('<p>%1$s</p>', get_the_excerpt());
		}
	}
}

// Gets first sponsored article
function get_sponsored_message()
{
	$options = get_option('ad_options');
	if($options['show_frontpage_sponsor'] == false)
	{
		return;
	}
	
	$query = new WP_Query(array('posts_per_page' => 1, 'offset' => 0, 'category_name' => 'sponsored-articles'));
	
	if($query->have_posts())
	{
		while($query->have_posts())
		{
			$query->the_post();
			$link = get_permalink();
			
			printf('<section id="frontpage-sponsor" class="ad-container-sponsor-frontpage">');
			printf('<div class="category-post" style="border: none">');
			printf('<a href="%1$s"><div class="category-thumbnail">%2$s</div></a>', $link, get_the_post_thumbnail(null, array('class' => '169-preview-medium')));
			
			// Sponsored article info
			printf('<div class="category-post-info">');
			printf('<a class="text-headline-medium" href="%1$s">%2$s</a>', $link, get_the_title());
			printf('<div class="category-author">Sponsored by %1$s</div>', coauthors_posts_links(null, null, null, null, false));
			printf('<div class="category-tease">%1$s</div>', get_the_excerpt());
			printf('<p><p class="ad-disclaimer">Advertisement</p></p>');
			printf('</div>');
			
			printf('</div>');
			printf('</section>');
		}
	}
}

// Get news stories for font page left column
function get_news_teasers()
{
	// Get feature post to make sure it's not duplicated because this function is called before the global array is populated
	$do_not_duplicate = array();
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
			array_push($do_not_duplicate, get_the_ID());
		}
	}	
	
	$query = new WP_Query(array('posts_per_page' => 2, 'offset' => 0, 'category_name' => 'news', 'post__not_in' => $do_not_duplicate));

	while($query->have_posts())
	{
		$query->the_post();
		$link = get_the_permalink();
		
		echo '<li class="story-item">';
		printf('<a href="%1$s"><div class="highlights-thumbnail-mobile">%2$s</div></a>', $link, get_the_post_thumbnail(null, array('class' => '169-preview-medium')));
		printf('<a class="text-headline-medium" href="%1$s">%2$s</a>', $link, get_the_title());
		printf('<div class="category-tease"><a href="%3$s"><div class="highlights-thumbnail-desktop">%1$s</div></a> %2$s</div>', get_the_post_thumbnail(null, array('class' => '169-preview-medium')), get_the_excerpt(), $link);
		printf('<div class="category-author">By %1$s | %2$s</div>', coauthors_posts_links(null, null, null, null, false), get_the_date('M. j, Y'));
		echo '<li class="story-item">';
	}
}

// Get news stories for font page right column
function get_news_stories()
{
	global $do_not_duplicate;
	$query = new WP_Query(array('posts_per_page' => 3, 'offset' => 2, 'category_name' => 'news', 'post__not_in' => $do_not_duplicate));

	while($query->have_posts())
	{
		$query->the_post();
		echo '<li class="story-item">';		
		printf('<a class="text-headline-small" href="%1$s">%2$s</a>', get_the_permalink(), get_the_title());
		printf('<div class="category-author">By %1$s | %2$s</div>', coauthors_posts_links(null, null, null, null, false), get_the_date('M. j, Y'));
		printf('<p>%1$s</p>', get_the_excerpt());
		echo '</li>';
	}	
}

// Prints out results from specified category with thumbnails
function populate_category($cat, $numPosts, $ulClass)
{
	global $do_not_duplicate;
	$query = new WP_Query(array('posts_per_page' => $numPosts, 'offset' => 0, 'category_name' => $cat, 'post__not_in' => $do_not_duplicate));
	
	echo '<ul class="' . $ulClass . '">';
	
	while($query->have_posts())
	{
		$query->the_post();
		
		echo '<li class="story-item">';
		if(has_post_thumbnail())
		{
			// For stories with thumbnails
			printf('<a href="%1$s">%2$s</a>', get_the_permalink(), get_the_post_thumbnail());
			printf('<div class="frontpage-postinfo">By %1$s | %2$s</div>', coauthors_posts_links(null, null, null, null, false), get_the_date('M. j, Y'));
			printf('<a class="text-headline-small" href="%1$s">%2$s</a>', get_the_permalink(), get_the_title());
		}
		else
		{
			// For stories with no thumbnails, print bigger headline
			printf('<a class="text-headline-medium" href="%1$s">%2$s</a>', get_the_permalink(), get_the_title());
			printf('<div class="frontpage-postinfo">By %1$s | %2$s</div>', coauthors_posts_links(null, null, null, null, false), get_the_date('M. j, Y'));
			printf('<p>%1$s</p>', get_the_excerpt());
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