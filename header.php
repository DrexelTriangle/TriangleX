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
	<meta name="viewport" content="user-scalable=no width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />	
	<?php wp_head(); ?>
</head>

<body>
<?php insert_breaking_news(); ?>

<header id="header-global" class="<?php is_front_page() ? print('header-global hidden') : print('header-global') ?>" role="banner">
	<div id="header-search-icon" class="header-search-icon white">
		<i class="material-icons md-36">search</i>
	</div>
	
	<div class="search-container">
		<form role="search" method="get" class="search-form" action="<?php echo get_site_url(); ?>">
			<input id="searchbox-main" type="search" class="search-textbox" placeholder="Search..." value="" name="s">
		</form>
	</div>
	
	<div class="header-logo">
		<div class="header-logo-desktop">
			<a id="triangle-logo" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
				<img src="<?php echo get_template_directory_uri() . '//images/logo-white.svg'; ?>"></img>
			</a>
		</div>
		<a id="menu-notif" style="color: white; font-size: 12px; right: 60px; position: absolute;">Menu</a>
	</div>
	
	<div class="header-logo-mobile">
		<div class="img-container">
			<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img id="logo-mobile" src="<?php echo get_template_directory_uri() . '//images/tri-icon.png'; ?>"></img></a>
		</div>
	</div>

	<div id="nav-icon" class="header-hamburger-icon white"><span></span><span></span><span></span></div>
</header>

<div id="nav-main" class="header-nav-container">
	<?php
		if(has_nav_menu('main'))
			wp_nav_menu(array('theme_location' => 'main', 'menu_class' => 'main'));
		else
			// Display error message if menu "main" has not been defined within WordPress
			echo 'Menu "main" is not defined!</br>';
			
		
		if(has_nav_menu('sub'))
			wp_nav_menu(array('theme_location' => 'sub', 'menu_class' => 'sub'));
		else
			// Display error message if menu "sub" has not been defined within WordPress
			echo 'Menu "sub" is not defined!</br>';
	?>
</div>