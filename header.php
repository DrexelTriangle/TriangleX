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
	<header id="masthead" class="site-header" role="banner">
		<div class="search">
			<input type="text" name="search" placeholder="Search..">
		</div>
		
		<div class="logo">
			<a href="/" rel="home">The Triangle</a>
		</div>

		<div class="hamburger-icon" onclick="toggleNav()"><span></span><span></span><span></span></div>
		
		<nav id="site-navigation" class="main-navigation" role="navigation">
		</nav>
	</header>

	<div id="page" class="site">
	<div id="content" class="site-content">
