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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/navigation.js"></script>

	<?php wp_head(); ?>
</head>

<body>
	<header id="masthead" class="site-header" role="banner">
		<div id="search-icon" class="search-icon">
			<i class="material-icons md-36">search</i>
		</div>
		<div id="search-main" class="search hidden">
			<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
				<input id="searchbox-main" type="search" name="search" id="s" placeholder="Search.." value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
			</form>
		</div>
		
		<div class="logo">
			<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
		</div>

		<div id="nav-icon" class="hamburger-icon"><span></span><span></span><span></span></div>
	</header>
	
	<div id="nav-main" class="nav-container">
		<?php wp_nav_menu(array('theme_location' => 'main', 'menu_class' => 'main')); ?>
		<?php wp_nav_menu(array('theme_location' => 'sub', 'menu_class' => 'sub')); ?>
		
		<!--<ul class="sub">
			<li><a href="<?php echo esc_url(home_url('/about')); ?>">About</a><li>
			<li><a href="<?php echo esc_url(home_url('/advertising')); ?>">Advertising</a><li>
			<li><a href="<?php echo esc_url(home_url('/classifieds')); ?>">Classifieds</a><li>
			<li><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a><li>
			<li><a href="<?php echo esc_url(home_url('/staff')); ?>">Staff</a><li>
			<li><a href="<?php echo esc_url(bloginfo('rss2_url')); ?>">RSS</a><li>
		</div>-->
	</div>
	
	<div id="page" class="site">
	
		<div class="adcontainer-header">
			<div class="ad-leaderboard">
				This is a test ad!
			</div>
		</div>

		<div id="content" class="site-content">
