<?php
/**
 * The template for displaying author pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Triangle_X
 */

get_header(); ?>

<div id="primary" class="generic-wrapper">
	<?php get_template_part('template-parts/author', get_queried_object()->name); ?>
</div>

<?php get_footer(); ?>