<?php
/**
 * The template for displaying all categories.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#category
 *
 * @package Triangle_X
 */

get_header(); ?>

<div id="primary" class="generic-wrapper">
	<?php get_template_part('template-parts/category', get_queried_object()->name);	?>
</div>

<?php get_footer(); ?>