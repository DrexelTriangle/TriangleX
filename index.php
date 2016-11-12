<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Triangle_X
 */

get_header(); ?>

<div class="wrapper-frontpage">
	<header id="header-frontpage" class="frontpage">
		<div id="logo-frontpage" class="logo-frontpage"><?php bloginfo('name'); ?></div>
		<?php wp_nav_menu(array('theme_location' => 'main', 'menu_class' => 'frontpage')); ?>
	</header>

	<section class="frontpage-top">
		<article class="item-featured">
			<?php get_template_part('template-parts/frontpage-section', 'featured'); ?>
		</article>
	</section>
	
	<section class="frontpage-media">
		Reserved for future use for photoblog and videos
	</section>
	
	<section class="frontpage-main">		
		<div class="sections-container">
			<?php
				// Get sections, exclude no-section and comics
				$categories = get_categories(array('orderby' => 'term_id', 'parent'  => 0, 'exclude' => '1, 506'));
				foreach ($categories as $category)
				{						
					echo '<section id="'.$category->name.'">';
					
					// Echo section name
					echo '<div class="section-name">';
					printf('<a href="%1$s">%2$s</a><br />', $category->slug, esc_html($category->name));
					echo '</div>';
					
					// Populate section with most recent articles
					$categoryPosts = get_posts(array('posts_per_page' => 5, 'offset' => 1, 'category' => $category->term_id));
					foreach($categoryPosts as $post)
					{
						$postID = $post->ID;
						$title = get_the_title($postID);
						$thumb = get_the_post_thumbnail($post, array('class' => 'front-page-tease-sm'));
						$link = get_permalink($postID);
						
						echo '<li><a href="'.$link.'">';
						echo '<div class="thumbnail-container" href="'.$link.'">'.$thumb.'</div>';
						echo $title;
						echo '</li></a>';
					}
					
					echo '</section>';
				}
			?>
		</div>
		
		<div class="sidebar" style="left:0px;">
			<div class="ad-medium-rectangle">This is a test ad!</div>
		</div>
	</section>
</div>

<?php get_footer(); ?>