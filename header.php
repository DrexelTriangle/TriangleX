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
	<div class="header-container">
		<div class="header-logo-container">
			<a id="logo-home" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
				<img class="header-logo" src="<?php echo get_template_directory_uri() . '//images/logo-white.svg'; ?>"></img>
			</a>
		</div>
	</div>
	
	<div class="header-container">
		<?php
			if(has_nav_menu('main'))
				wp_nav_menu(array('container' => 'div',
								  'container_class' => 'header-nav-container',
								  'menu_class' => 'navbar-nav',
								  'theme_location' => 'main'));
			else
				// Display error message if menu "main" has not been defined within WordPress
				echo 'Menu "main" is not defined!</br>';
		?>
	</div>
</header>

<div id="header-clearfix" class="header-clearfix"></div>