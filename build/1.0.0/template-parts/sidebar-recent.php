<?php
/**
 * Template part for displaying most recent articles sidebar item.
 *
 * @package Triangle_X
 */
?>

<div class="sidebar-title">Most Recent Articles</div>

<?php
	$args = array('post_type' => array('post', 'snowball'), 'numberposts' => '5');
	$recent_posts = wp_get_recent_posts($args);	
	
	print('<ul class="frontpage-item-container">');
		
	foreach ($recent_posts as $r)
	{	
		echo '<li class="frontpage-item-list">';
		printf('<a class="text-headline-small" href="%1$s">%2$s</a>', get_permalink($r["ID"]), $r['post_title']);
		echo '</li>';
	}
	
	print('</ul>');
?>