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

<div class="category-title">
	<h1 class="text-title-large"><?php single_cat_title('', true); ?></h1>
</div>

<div id="section-highlights" class="generic-container">	
	<?php $highlights = new WP_Query(array('posts_per_page' => 4, 'offset' => 0, 'cat' => $cat->term_id)); ?>

	<div class="highlights-container">
		<div class="highlights-left">
			<div class="story">
				<?php
					$highlights->the_post();
					$link = get_permalink();
					$timeSincePost = human_time_diff(get_post_time('U', true), current_time('timestamp'));
					
					printf('<a href="%1$s"><div class="highlights-thumbnail-desktop">%2$s</div></a>', $link, get_the_post_thumbnail());
					printf('<a href="%1$s"><div class="highlights-thumbnail-mobile">%2$s</div></a>', $link, get_the_post_thumbnail(null, array('class' => '169-preview-medium')));
					printf('<a class="text-headline-medium" href="%1$s">%2$s</a>', $link, get_the_title());
					printf('<div class="category-tease">%1$s</div>', get_the_excerpt());
					printf('<div class="category-author">%1$s ago • By %2$s</div>', $timeSincePost, coauthors_posts_links(null, null, null, null, false));
				?>
			</div>
		</div>
		
		<div class="highlights-center">
			<div class="story">
				<?php
					$highlights->the_post();
					$link = get_permalink();
					$timeSincePost = human_time_diff(get_post_time('U', true), current_time('timestamp'));
					
					printf('<a href="%1$s"><div class="highlights-thumbnail-desktop">%2$s</div></a>', $link, get_the_post_thumbnail());
					printf('<a href="%1$s"><div class="highlights-thumbnail-mobile">%2$s</div></a>', $link, get_the_post_thumbnail(null, array('class' => '169-preview-medium')));
					printf('<a class="text-headline-medium" href="%1$s">%2$s</a>', $link, get_the_title());
					printf('<div class="category-tease">%1$s</div>', get_the_excerpt());
					printf('<div class="category-author">%1$s ago • By %2$s</div>', $timeSincePost, coauthors_posts_links(null, null, null, null, false));
				?>
			</div>
		</div>
		
		<div class="highlights-right">
			<div class="story">
				<div class="highlights-right-top">
					<?php
						$highlights->the_post();
						$link = get_permalink();
						$timeSincePost = human_time_diff(get_post_time('U', true), current_time('timestamp'));
						
						printf('<a href="%1$s"><div class="highlights-thumbnail-mobile">%2$s</div></a>', $link, get_the_post_thumbnail(null, array('class' => '169-preview-medium')));
						printf('<a class="text-headline-medium" href="%1$s">%2$s</a>', $link, get_the_title());
						printf('<div class="category-tease"><a href="%3$s"><div class="highlights-thumbnail-desktop">%1$s</div></a> %2$s</div>', get_the_post_thumbnail(null, array('class' => '169-preview-medium')), get_the_excerpt(), $link);
						printf('<div class="category-author">%1$s ago • By %2$s</div>', $timeSincePost, coauthors_posts_links(null, null, null, null, false));
					?>
				</div>
				
				<div class="highlights-right-bottom">
					<?php
						$highlights->the_post();
						$link = get_permalink();
						$timeSincePost = human_time_diff(get_post_time('U', true), current_time('timestamp'));
						
						printf('<a href="%1$s"><div class="highlights-thumbnail-mobile">%2$s</div></a>', $link, get_the_post_thumbnail(null, array('class' => '169-preview-medium')));
						printf('<a class="text-headline-medium" href="%1$s">%2$s</a>', $link, get_the_title());
						printf('<div class="category-tease"><a href="%3$s"><div class="highlights-thumbnail-desktop">%1$s</div></a> %2$s</div>', get_the_post_thumbnail(null, array('class' => '169-preview-medium')), get_the_excerpt(), $link);
						printf('<div class="category-author">%1$s ago • By %2$s</div>', $timeSincePost, coauthors_posts_links(null, null, null, null, false));
					?>
				</div>
			</div>
		</div>
	</div>
</div>	

<div class="generic-flex-container">
	<main id="section-articles" class="flex-main">
		<?php			
			$query = new WP_Query(array('posts_per_page' => 15, 'offset' => 4, 'cat' => $cat->term_id));
			
			while($query->have_posts())
			{
				$query->the_post();
				
				$title = get_the_title();
				$link = get_permalink();
				$date = get_the_date('M. j, Y');
				$authors = coauthors_posts_links(null, null, null, null, false);
				$excerpt = get_the_excerpt();
				$thumb = get_the_post_thumbnail($post, array('class' => '169-preview-medium'));
				
				echo '<div class="category-post">';
				
				// Left box - date
				printf('<div class="category-date">%1$s</div>', esc_attr($date));
				
				// Middle box flex - headline, author, and excerpt
				echo '<div class="category-post-info">';
				printf('<a class="text-headline-medium" href="%1$s">%2$s</a>', $link, $title);
				printf('<div class="category-tease">%1$s</div>', $excerpt);
				printf('<div class="category-author">By %1$s</div>', $authors);
				echo '</div>';
				
				// Right box - thumbnail
				printf('<a href="%1$s"><div class="category-thumbnail">%2$s</div></a>', $link, $thumb);
				
				echo '</div>';
			}
			
			// Allow infinite scroll using Ajax Load More plugin
			echo do_shortcode("[ajax_load_more post_type='post, snowball' repeater='default' offset='19' posts_per_page='15' transition='fade' category='" . $cat->slug . "']");
		?>
	</main>

	<aside class="flex-sidebar">
		<?php insert_ad('Global Medium Rectangle Top', 'medium-rectangle');	?>
	
		<div id="subsections" class="sidebar-item">
			<?php get_template_part('template-parts/sidebar-subsections'); ?>
		</div>
		
		<?php dynamic_sidebar('sidebar-global'); ?>
		<?php insert_ad('Global Medium Rectangle Bottom', 'medium-rectangle');	?>
	</aside>
</div>

<?php insert_ad('Global Banner Bottom', 'banner-bottom'); ?>