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

<?php insert_ad('Global Banner Top', 'banner-top'); ?>

<div class="category-title"><?php single_cat_title('', true); ?></div>

<div class="generic-container">
	<div class="category-highlights-container">
		<?php
			$query = new WP_Query(array('posts_per_page' => 2, 'offset' => 0, 'cat' => $cat->term_id));

			while($query->have_posts())
			{
				$query->the_post();
				$link = get_permalink();
				
				printf('<li>');
				printf('<a href="%1$s">%2$s</a>', $link, get_the_post_thumbnail());
				printf('<a class="category-headline" href="%1$s">%2$s</a>', $link, get_the_title());
				printf('<div class="category-tease">%1$s</div>', get_the_summary($post->ID));
				printf('<div class="category-author">By %1$s | %2$s</div>', coauthors_posts_links(null, null, null, null, false), get_the_date());
				printf('</li>');
			}
		?>
		
		<div class="category-highlights-right">
			<?php
				$query = new WP_Query(array('posts_per_page' => 2, 'offset' => 2, 'cat' => $cat->term_id));
				
				while($query->have_posts())
				{
					$query->the_post();
					$link = get_permalink();
					
					printf('<li>');
					printf('<a class="category-headline" href="%1$s">%2$s</a>', $link, get_the_title());
					printf('<div class="category-tease">%1$s %2$s</div>', get_the_post_thumbnail(null, array('class' => '169-preview-medium')), get_the_summary($post->ID));
					printf('<div class="category-author">By %1$s | %2$s</div>', coauthors_posts_links(null, null, null, null, false), get_the_date());
					printf('</li>');
				}
			?>
		</div>
	</div>
</div>	

<div class="generic-flex-container">
	<main class="flex-main">
		<?php			
			$query = new WP_Query(array('posts_per_page' => 15, 'offset' => 4, 'cat' => $cat->term_id));
			
			while($query->have_posts())
			{
				$query->the_post();
				
				$title = get_the_title();
				$link = get_permalink();
				$date = get_the_date('M. j, Y');
				$authors = coauthors_posts_links(null, null, null, null, false);
				$excerpt = get_the_summary($post->ID);
				$thumb = get_the_post_thumbnail($post, array('class' => '169-preview-medium'));
				
				echo '<div class="category-post">';
				
				// Left box - date
				printf('<div class="category-date">%1$s</div>', esc_attr($date));
				
				// Middle box flex - headline, author, and excerpt
				echo '<div class="category-post-info">';
				printf('<a class="category-headline" href="%1$s">%2$s</a>', esc_attr($link), esc_html($title));
				printf('<div class="category-tease">%1$s</div>', $excerpt);
				printf('<div class="category-author">By %1$s</div>', $authors);
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
	
		<div id="ad-sidebar" style="margin-bottom:25px;">
			<?php
				if(function_exists('drawAdsPlace'))
							drawAdsPlace(array('name' => 'Global Medium Rectangle Sidebar'), false);
			?>
		</div>

		<div id="most-recent" class="sidebar-item">
			<?php get_template_part('template-parts/sidebar-recent'); ?>
		</div>
	</aside>
</div>

<?php insert_ad('Global Banner Bottom', 'banner-bottom'); ?>