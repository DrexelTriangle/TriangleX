<?php
/**
 * Sidecar file for theme options.
 */

add_action('admin_menu', 'create_ad_settings_page');
function create_ad_settings_page() {
	add_menu_page(
		'Ad Locations',
		'Ad Locations',
		'manage_options',
		'ad_options',
		'ad_options_page_content',
		'dashicons-welcome-widgets-menus',
		30
	);
}

add_action('admin_init', 'init_ad_options');
function init_ad_options() {
	if( false === get_option( 'ad_options' ) ) {  
	    add_option( 'ad_options', 0);
	} 

	// Initialize Section
	add_settings_section(
		'active_ad_locations',
		'Active Ad Locations',
		'active_ad_locations_content',
		'ad_options'
	);

	// Initialize Fields

	add_settings_field(
		'show_banner_top',
		'Banner Top',
		'show_banner_top_content',
		'ad_options',
		'active_ad_locations'
	);

	add_settings_field(
		'show_banner_bottom',
		'Banner Bottom',
		'show_banner_bottom_content',
		'ad_options',
		'active_ad_locations'
	);

	add_settings_field(
		'show_sidebar_top',
		'Sidebar Top',
		'show_sidebar_top_content',
		'ad_options',
		'active_ad_locations'
	);

	add_settings_field(
		'show_sidebar_bottom',
		'Sidebar Bottom',
		'show_sidebar_bottom_content',
		'ad_options',
		'active_ad_locations'
	);
	
	add_settings_field(
		'show_frontpage_sponsore',
		'Frontpage Sponsor',
		'show_frontpage_sponsor_content',
		'ad_options',
		'active_ad_locations'
	);

	// Register Fields

	register_setting(
		'ad_options',
		'ad_options'
	);
}

// Callbacks

function active_ad_locations_content() {
	echo 'Select any ad zone below to activate it.';
}

function show_banner_top_content() {
	$options = get_option('ad_options');
	$html = '<input type="checkbox" id="show_banner_top" name="ad_options[show_banner_top]" value="1" ' . checked(1, isset( $options['show_banner_top'] ) ? $options['show_banner_top'] : 0, false) . '/>';
	echo $html;
}

function show_banner_bottom_content() {
	$options = get_option('ad_options');
	$html = '<input type="checkbox" id="show_banner_bottom" name="ad_options[show_banner_bottom]" value="1" ' . checked(1, isset( $options['show_banner_bottom'] ) ? $options['show_banner_bottom'] : 0, false) . '/>';
	echo $html;
}

function show_sidebar_top_content() {
	$options = get_option('ad_options');
	$html = '<input type="checkbox" id="show_sidebar_top" name="ad_options[show_sidebar_top]" value="1" ' . checked(1, isset( $options['show_sidebar_top'] ) ? $options['show_sidebar_top'] : 0, false) . '/>';
	echo $html;
}

function show_sidebar_bottom_content() {
	$options = get_option('ad_options');
	$html = '<input type="checkbox" id="show_sidebar_bottom" name="ad_options[show_sidebar_bottom]" value="1" ' . checked(1, isset( $options['show_sidebar_bottom'] ) ? $options['show_sidebar_bottom'] : 0, false) . '/>';
	echo $html;
}

function show_frontpage_sponsor_content() {
	$options = get_option('ad_options');
	$html = '<input type="checkbox" id="show_frontpage_sponsor" name="ad_options[show_frontpage_sponsor]" value="1" ' . checked(1, isset( $options['show_frontpage_sponsor'] ) ? $options['show_frontpage_sponsor'] : 0, false) . '/>';
	echo $html;
}

// Page
 
function ad_options_page_content() { ?>
	<div class="wrap">
		<h2>Ad Options</h2>
		<form action="options.php" method="post">
			<?php settings_fields('ad_options'); ?>
			<?php do_settings_sections('ad_options'); ?>
			<?php submit_button(); ?>
		</form>
	</div>
<?php }