<?php
/**
 * Template Name: Advertising Page
 *
 * @package Working Copy
 */
?>

<?php insert_ad('Global Banner Top', 'banner-top'); ?>

<div class="category-title">
	<center><h1 class="text-title-large"><?php the_title(); ?></h1></center>
</div>

<div class="generic-container">
	<em><strong>Below are the currently listed classifieds for The Triangle. If you would like to submit a classified ad to The Triangle, please <a href="https://secure.touchnet.com/C20688_ustores/web/store_main.jsp?STOREID=67">click here</a>. Thank you.</strong></em>
	<br>
	<hr>
	<br>
	<?php the_content(); ?>
</div>

<?php insert_ad('Global Banner Bottom', 'banner-bottom'); ?>