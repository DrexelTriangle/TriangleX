<?php
/**
 * Template part for displaying all pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Triangle_X
 */
 
?>

<?php insert_ad('Global Banner Top', 'banner-top'); ?>

<div class="category-title">
	<center><h1 class="text-title-large"><?php the_title(); ?></h1></center>
</div>

<div class="generic-container">
	<div class="page-container">
		<?php the_content(); ?>
	</div>
</div>

<?php insert_ad('Global Banner Bottom', 'banner-bottom'); ?>