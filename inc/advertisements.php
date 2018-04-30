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
	$adClass = str_replace(' ', '', $name);

	printf('<div class="ad-container-%1$s">', $containerClass);
	get_template_part('inc/openx/' . $adClass);
	printf('</div>');
}
 
 ?>