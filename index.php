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
	<header id="header-frontpage" class="frontpage-header">
		<div id="logo-frontpage" class="logo-frontpage"><?php bloginfo('name'); ?></div>
		<nav>
			<?php
				if(has_nav_menu('main'))
					wp_nav_menu(array('theme_location' => 'main', 'menu_class' => 'frontpage'));
				else
					// Display error message if menu "main" has not been defined within WordPress
					echo '<div class="menu-main-container"><ul class="frontpage"><li>Menu "main" is not defined!</li></ul>';
			?>
		</nav>
	</header>

	<div class="frontpage-section-top">
		<section class="frontpage-feature">
			<?php get_frontpage_feature(); ?>
		</section>
		
		<section id="frontpage-category-opinion" class="frontpage-category-news">
			<h1 class="frontpage-category-title"><a href="news">Opinion</a></h1>
			<?php populate_category('opinion', 8); ?>
		</section>
		
		<?php insert_ad('Global Banner Inline', 'banner-inline'); ?>
		
		<section id="frontpage-category-news" class="frontpage-category-sports">
			<h1 class="frontpage-category-title"><a href="sports">News</a></h1>
			<?php populate_category_include_thumbnails('news', 8); ?>
		</section>
	</div>
		
	<div class="frontpage-section-media">
		Reserved for future use for photoblog and videos
	</div>
	
	<div class="generic-flex-container">		
		<main class="flex-main">			
			<section id="section-entertainment" class="frontpage-category-sports">
				<h1 class="frontpage-category-title"><a href="entertainment">Arts & Entertainment</a></h1>
				<?php populate_category_include_thumbnails('entertainment', 6); ?>
			</section>
			
			<section id="section-sports" class="frontpage-category-sports">
				<h1 class="frontpage-category-title"><a href="opinion">Sports</a></h1>
				<?php populate_category_include_thumbnails('sports', 6); ?>
			</section>
			
			<section id="section-style" class="frontpage-category-sports">
				<h1 class="frontpage-category-title"><a href="style">Style</a></h1>
				<?php populate_category_include_thumbnails('style', 6); ?>
			</section>
		</main>
		
		<aside class="flex-sidebar">
			<?php insert_ad('Global Medium Rectangle Sidebar', 'medium-rectangle');	?>
		</aside>
	</div>
</div>

<?php get_footer(); ?>