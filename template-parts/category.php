<?php
/**
 * Template part for displaying categories.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Triangle_X
 */

$cat = get_queried_object();
 
?>

<div class="category-title"><?php single_cat_title('', true); ?></div>

<div class="generic-flex-container">
	<main class="flex-main">
		<?php
			$posts = get_posts(array('posts_per_page' => 15, 'offset' => 0, 'category' => $cat->term_id));
			
			foreach($posts as $post)
			{
				$postID = $post->ID;
				$title = get_the_title($postID);
				$link = get_permalink($postID);
				$date = get_the_date('M. j, Y', $postID);
				$authors = coauthors_posts_links(null, null, null, null, false);
				//$excerpt = get_the_excerpt($postID);
				$excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $post_id));
				$thumb = get_the_post_thumbnail($post, array('class' => '169-preview-medium'));
				
				echo '<div class="category-post">';
				
				// Left box - date
				printf('<div class="date">%1$s</div>', esc_attr($date));
				
				// Middle box flex - headline, author, and excerpt
				echo '<div class="category-post-info">';
				printf('<a class="category-headline" href="%1$s">%2$s</a>', esc_attr($link), esc_html($title));
				printf('<div class="category-author">By %1$s</div>', $authors);
				printf('<div class="category-tease">%1$s</div>', $excerpt);
				echo '</div>';
				
				// Right box - thumbnail
				printf($thumb);
				
				echo '</div>';
			}
		?>
	</main>

	<aside class="flex-sidebar">
		<div id="subsections" class="sidebar-item">
			<?php get_template_part('template-parts/sidebar-subsections'); ?>
		</div>
	
		<div id="ad-top" class="ad-medium-rectangle" style="margin-bottom:25px;">This is a test ad!</div>

		<div id="most-recent" class="sidebar-item">
			<?php get_template_part('template-parts/sidebar-recent'); ?>
		</div>
	</aside>
</div>