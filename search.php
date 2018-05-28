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
	
	<div class="category-title">
		<h1 class="text-title-large"><?php printf(esc_html__( 'Search Results for: %s', 'triangle-x' ), '<span>' . get_search_query() . '</span>'); ?></h1>
	</div>

	<div class="generic-flex-container">
		<main class="flex-main">
			<?php
				if(have_posts())
				{
					while(have_posts())
					{
						the_post();
						$link = get_the_permalink();
						
						echo '<div class="category-post">';
						
						// Left box - date
						printf('<div class="category-date">%1$s</div>', get_the_date('M. j, Y'));
						
						// Middle box flex - headline, author, and excerpt
						echo '<div class="category-post-info">';
						printf('<a class="text-headline-medium" href="%1$s">%2$s</a>', $link, get_the_title());
						printf('<div class="category-tease">%1$s</div>', get_the_excerpt());
						printf('<div class="category-author">By %1$s</div>', coauthors_posts_links(null, null, null, null, false));
						echo '</div>';
						
						// Right box - thumbnail
						printf('<a href="%1$s"><div class="category-thumbnail">%2$s</div></a>', $link, get_the_post_thumbnail(null, array('class' => '169-preview-medium')));
						
						echo '</div>';
					}
				}				
				else
					get_template_part('template-parts/content', 'none');
			?>
			
			<div class="category-pagination">
				<?php posts_nav_link(' ','<< Newer Stories','Older Stories >>'); ?>
			</div>
		</main>
		
		<aside class="flex-sidebar">		
			<?php insert_ad('Global Medium Rectangle Top', 'medium-rectangle');	?>
			<?php dynamic_sidebar('sidebar-global'); ?>
			<?php insert_ad('Global Medium Rectangle Bottom', 'medium-rectangle');?>
		</aside>
	</div>
	
	<?php insert_ad('Global Banner Bottom', 'banner-bottom'); ?>
</div>

<?php get_footer(); ?>