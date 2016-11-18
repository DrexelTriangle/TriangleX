<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Triangle_X
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body>
<header id="header-global" class="header-global hidden" role="banner">
	<div id="search-icon" class="header-search-icon">
		<i class="material-icons md-36">search</i>
	</div>
	<div id="search-main" class="header-search hidden">
		<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
			<input id="searchbox-main" type="search" name="search" id="s" placeholder="Search.." value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
		</form>
	</div>
	
	<div class="header-logo">
		<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
	</div>

	<div id="nav-icon" class="header-hamburger-icon"><span></span><span></span><span></span></div>
</header>

<div id="nav-main" class="header-nav-container">
	<?php wp_nav_menu(array('theme_location' => 'main', 'menu_class' => 'main')); ?>
	<?php wp_nav_menu(array('theme_location' => 'sub', 'menu_class' => 'sub')); ?>
</div>
	
	<!--<div id="page" class="site">  #page div is closed in footer -->
	
		<!--<div class="adcontainer-header">
			<div class="ad-leaderboard">
				This is a test ad!
			</div>
		</div>
		
		<?php
			$options = get_option('ad_options');
			if ($options['show_banner_top'] == false) // debug - change to true for production
			{
				// If the top ad banner is enabled, show it.
				echo '<div class="adcontainer-header">';
				if(function_exists('drawAdsPlace'))
					drawAdsPlace(array('name' => 'ad-leaderboard'), false);
				echo '</div>';
			}
			else
			{
				// ONLY USE FOR DEBUG
				echo '<div class="adcontainer-header"><div class="ad-leaderboard">This is a test ad!</div></div>';
			}
		?>-->
