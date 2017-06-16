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
	if(function_exists('drawAdsPlace'))
	{
		// TODO - check if ad exists for place
		if(true)
		{
			printf('<div class="ad-container-%1$s">', $containerClass);
			drawAdsPlace(array('name' => $name), false);
			printf('<p class="ad-disclaimer">Advertisement</p></div>');
		}
	}
}
 
 ?>