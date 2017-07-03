<?php
/**
 * Template part for displaying categories.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Triangle_X
 */ 
?>

<?php insert_ad('Global Banner Top', 'banner-top'); ?>

<div class="category-title">
	<h1 class="text-title-large"><?php the_archive_title() ?></h1>
</div>

<div class="generic-flex-container">
	<main class="flex-main">
		<?php			
			while(have_posts())
			{
				the_post();
				
				$title = get_the_title();
				$link = get_permalink();
				$date = get_the_date('M. j, Y');
				$authors = coauthors_posts_links(null, null, null, null, false);
				$excerpt = get_the_summary($post->ID);
				$thumb = get_the_post_thumbnail(null, array('class' => '169-preview-medium'));
				
				echo '<div class="category-post">';
				
				// Left box - date
				printf('<div class="category-date">%1$s</div>', esc_attr($date));
				
				// Middle box flex - headline, author, and excerpt
				echo '<div class="category-post-info">';
				printf('<a class="text-headline-medium" href="%1$s">%2$s</a>', esc_attr($link), esc_html($title));
				printf('<div class="category-tease">%1$s</div>', $excerpt);
				printf('<div class="category-author">By %1$s</div>', $authors);
				echo '</div>';
				
				// Right box - thumbnail
				printf('<a href="%1$s"><div class="category-thumbnail">%2$s</div></a>', $link, $thumb);
				
				echo '</div>';
			}
		?>
		
		<div class="category-pagination">
			<?php posts_nav_link(' ','<< Newer Stories','Older Stories >>'); ?>
		</div>
	</main>

	<aside class="flex-sidebar">	
		<div class="sidebar-item">
			<?php insert_ad('Global Medium Rectangle Top', 'medium-rectangle');	?>
		</div>

		<div id="most-recent" class="sidebar-item">
			<?php get_template_part('template-parts/sidebar-recent'); ?>
		</div>
		
		<div id="poll" class="sidebar-item">
			<div class="sidebar-poll">
				<div class="sidebar-title">Weekly Poll</div>
				<?php get_poll(); ?>
			</div>
		</div>
		
		<div id="newsletter" class="sidebar-item">
			<?php get_template_part('template-parts/sidebar-newsletter'); ?>
		</div>
		
		<div class="sidebar-item">
			<?php insert_ad('Global Medium Rectangle Bottom', 'medium-rectangle');	?>
		</div>
	</aside>
</div>

<?php insert_ad('Global Banner Bottom', 'banner-bottom'); ?>