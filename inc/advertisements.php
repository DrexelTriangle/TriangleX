<?php
/**
 * Abstraction layer for advertisement functions
 *
 * @link https://thetriangle.org
 *
 * @package Triangle_X
 */

function insert_ad($name, $containerClass)
{
	$options = get_option('ad_options');
	$adLocation = str_replace(' ', '', $name);
	$toggle = 'show_' . $adLocation;

	// If ad space is toggled to visible in admin menu
	if($options[$toggle] == true)
	{
		printf('<div class="ad-container-%1$s">', $containerClass);
		get_template_part('inc/flytedesk/' . $adLocation);
		printf('</div>');
	}
}
 
 ?>