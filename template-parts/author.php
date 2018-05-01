<?php
/**
 * Template part for displaying categories.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Triangle_X
 */

$author = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
 
?>

<?php insert_ad('Global Banner Top', 'banner-top'); ?>

<div class="category-title">
	<h1 class="text-title-large">Articles by <?php printf('%1$s %2$s', $author->first_name, $author->last_name); ?></h1>
</div>

<div class="generic-flex-container">
	<main class="flex-main">
		<?php
			while(have_posts())
			{
				the_post();				
				$link = get_permalink();
				
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
		?>
		
		<div class="category-pagination">
			<?php posts_nav_link(' ','<< Newer Stories','Older Stories >>'); ?>
		</div>
	</main>

	<aside class="flex-sidebar">	
		<div class="sidebar-item">
			<?php insert_ad('Global Medium Rectangle Top', 'medium-rectangle');	?>
		</div>

		<div id="social-links" class="sidebar-item">
			<?php get_template_part('template-parts/sidebar-social'); ?>
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