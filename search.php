<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Triangle_X
 */

get_header(); ?>

<div class="generic-wrapper">
	<?php insert_ad('Global Banner Top', 'banner-top'); ?>

	<div class="category-title"><?php printf(esc_html__( 'Search Results for: %s', 'triangle-x' ), '<span>' . get_search_query() . '</span>'); ?></div>

	<div class="generic-flex-container">
		<main class="flex-main">
			<?php
				if(have_posts())
				{
					while(have_posts())
					{
						the_post();

						$postID = get_the_ID();
						$title = get_the_title($postID);
						$link = get_permalink($postID);
						$date = get_the_date('M. j, Y', $postID);
						$authors = coauthors_posts_links(null, null, null, null, false);
						$excerpt = get_the_excerpt($postID);
						$excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $post_id));
						$thumb = get_the_post_thumbnail($post, array('class' => '169-preview-medium'));
						
						echo '<div class="category-post">';
						
						// Left box - date
						printf('<div class="category-date">%1$s</div>', esc_attr($date));
						
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
				}
				
				else
					get_template_part( 'template-parts/content', 'none' );
			?>
		</main>
		
		<aside class="flex-sidebar">		
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
</div>

<?php get_footer(); ?>