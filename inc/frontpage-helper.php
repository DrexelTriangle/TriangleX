<?php
/**
 * Helper functions for populating the front page
 *
 * @link https://thetriangle.org
 *
 * @package Triangle_X
 */

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