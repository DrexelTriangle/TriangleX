<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Triangle_X
 */

get_header(); ?>

<div class="generic-wrapper">
	<?php
		while (have_posts())
		{
			the_post();
			get_template_part('template-parts/page', get_the_title());
		}
	?>
</div>

<?php get_footer(); ?>