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

	<div class="generic-container">
		<div class="category-title"><?php printf(esc_html__( 'Search Results for: %s', 'triangle-x' ), '<span>' . get_search_query() . '</span>'); ?></div>
	</div>

	<div class="generic-flex-container">
		<main class="flex-main">
			<?php
				if(have_posts())
				{
					while(have_posts())
					{
						the_post();

						$postID = get_the_ID();
						$link = get_permalink($postID);
						
						echo '<div class="category-post">';
						
						// Left box - date
						printf('<div class="category-date">%1$s</div>', get_the_date('M. j, Y'));
						
						// Middle box flex - headline, author, and excerpt
						echo '<div class="category-post-info">';
						printf('<a class="text-headline-medium" href="%1$s">%2$s</a>', esc_attr($link), get_the_title());
						printf('<div class="category-author">By %1$s</div>', coauthors_posts_links(null, null, null, null, false));
						printf('<div class="category-tease">%1$s</div>', get_the_summary($postID));
						echo '</div>';
						
						// Right box - thumbnail
						printf('<a href="%1$s">%2$s</a>', $link, get_the_post_thumbnail($post, array('class' => '169-preview-medium')));
						
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