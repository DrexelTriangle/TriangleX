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
	<p>Can&rsquo;t see the PDF? Click <a href="http://files.thetriangle.org/rate-cards/ratecard.pdf">here</a> to download a copy.</p>
	<iframe style="width: 100%; height: 11in;" src="http://files.thetriangle.org/rate-cards/ratecard.pdf" frameborder="0" seamless></iframe>
</div>

<?php insert_ad('Global Banner Bottom', 'banner-bottom'); ?>