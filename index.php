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
	<!--<div id="search-icon-frontpage" class="header-search-icon black">
		<i class="material-icons md-36">search</i>
	</div>-->
	
	<div class="search-container">
		<form role="search" method="get" class="search-form" action="<?php echo get_site_url(); ?>" id="form-search">
			<input id="searchbox-frontpage" type="search" class="search-textbox" placeholder="Find Articles, Authors, and more..." value="" name="s">
			<button type="submit" class="search-button" form="form-search" value="Submit"><i class="fa fa-search"></i></button>
		</form>
	</div>
	
	<nav class="frontpage-navbar-links">
		<?php
			if(has_nav_menu('frontpage-top'))
				wp_nav_menu(array('theme_location' => 'frontpage-top', 'menu_class' => 'frontpage-top-menu'));
			else
				// Display error message if menu "frontpage-top" has not been defined within WordPress
				echo 'Menu "frontpage-top" is not defined!';
		?>
	</nav>
</div>

<div class="generic-wrapper">
	<?php insert_ad('Global Banner Top', 'banner-top'); ?>

	<header id="header-frontpage" class="frontpage-header">
		<div class="frontpage-logo">
			<img src="<?php echo get_template_directory_uri() . '/images/logo-black.svg'; ?>"></img>
		</div>
		<nav>
			<?php
				if(has_nav_menu('main'))
					wp_nav_menu(array('theme_location' => 'main', 'menu_class' => 'frontpage'));
				else
					// Display error message if menu "main" has not been defined within WordPress
					echo '<ul class="frontpage"><li>Menu "main" is not defined!</li></ul>';
			?>
		</nav>
	</header>
	
	<div class="generic-container">
		<?php dynamic_sidebar('frontpage-content-top'); ?>
	</div>
	
	<div class="generic-container">
		<?php get_sponsored_message(); ?>
	</div>
	
	<div class="generic-flex-container">		
		<main class="flex-main">
			<?php dynamic_sidebar('frontpage-content-bottom'); ?>
		</main>
		
		<aside class="flex-sidebar">
			<?php insert_ad('Global Medium Rectangle Top', 'medium-rectangle');	?>
			<?php dynamic_sidebar('sidebar-frontpage'); ?>
			<?php insert_ad('Global Medium Rectangle Bottom', 'medium-rectangle');?>
		</aside>
	</div>
	
	<?php insert_ad('Global Banner Bottom', 'banner-bottom'); ?>
</div>

<?php get_footer(); ?>