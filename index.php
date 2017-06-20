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

<div class="frontpage-navbar-container">
	<div id="search-icon-frontpage" class="header-search-icon black">
		<i class="material-icons md-36">search</i>
	</div>
	
	<div class="search-container">
		<form role="search" method="get" class="search-form" action="<?php echo get_site_url(); ?>">
			<input id="searchbox-frontpage" type="search" class="search-textbox" placeholder="Search..." value="" name="s">
		</form>
	</div>
	
	<div class="frontpage-navbar-links">
		<a href="about" rel="About">About Us</a> |
		<a href="advertising" rel="Advertising">Advertising</a> |
		<a href="classifieds" rel="Classifieds">Classifieds</a> |
		<a href="contact" rel="Contact">Contact</a>
	</div>
	
	<div id="nav-icon-frontpage" class="header-hamburger-icon black"><span></span><span></span><span></span></div>
</div>

<div class="generic-wrapper">
	<?php insert_ad('Global Banner Top', 'banner-top'); ?>

	<header id="header-frontpage" class="frontpage-header">
		<div class="frontpage-logo">
			<img src="<?php echo get_template_directory_uri() . '//images/logo-black.svg'; ?>"></img>
		</div>
		<nav>
			<?php
				if(has_nav_menu('main'))
					wp_nav_menu(array('theme_location' => 'main', 'menu_class' => 'frontpage'));
				else
					// Display error message if menu "main" has not been defined within WordPress
					echo '<div class="menu-main-container"><ul class="frontpage"><li>Menu "main" is not defined!</li></ul></div>';
			?>
		</nav>
	</header>

	<div class="frontpage-section-top">
		<section class="frontpage-feature">
			<?php get_frontpage_feature(); ?>
		</section>
		
		<section id="frontpage-category-popular" class="frontpage-category-side">
			<h1 class="frontpage-category-title">Most Popular</h1>
			<?php populate_most_popular(8); ?>
		</section>
		
		<?php get_sponsored_message(); ?>
		
		<section id="frontpage-category-news" class="frontpage-category-main">
			<h1 class="frontpage-category-title"><a href="news">News</a></h1>
			<?php populate_category_include_thumbnails('news', 5, 'single'); ?>
		</section>
	</div>
		
	<!--<div class="frontpage-section-media">
		Reserved for future use for photoblog and videos
	</div>-->
	
	<div class="generic-flex-container">		
		<main class="flex-main">
			<section id="section-opinion" class="frontpage-category-main">
				<h1 class="frontpage-category-title"><a href="opinion">Opinion</a></h1>
				<?php populate_category_include_thumbnails('opinion', 6); ?>
			</section>
		
			<section id="section-entertainment" class="frontpage-category-main">
				<h1 class="frontpage-category-title"><a href="entertainment">Arts & Entertainment</a></h1>
				<?php populate_category_include_thumbnails('entertainment', 6); ?>
			</section>
			
			<section id="section-sports" class="frontpage-category-main">
				<h1 class="frontpage-category-title"><a href="sports">Sports</a></h1>
				<?php populate_category_include_thumbnails('sports', 6); ?>
			</section>
		</main>
		
		<aside class="flex-sidebar">
			<div class="sidebar-item">
				<?php insert_ad('Global Medium Rectangle Top', 'medium-rectangle');	?>
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
			
			<!--<div id="podcasts" class="sidebar-item">
				<div class="sidebar-title">Podcasts</div>
				Put latest podcasts here?
			</div>-->
			
			<div class="sidebar-item">
				<?php insert_ad('Global Medium Rectangle Bottom', 'medium-rectangle');	?>
			</div>
		</aside>
	</div>
	
	<?php insert_ad('Global Banner Bottom', 'banner-bottom'); ?>
</div>

<?php get_footer(); ?>