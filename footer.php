<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Triangle_X
 */

?>

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="footer-container">
		<div class="footer-branding">
			<div class="logo">
				<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
			</div>
		</div>
	</div>
	<div class="copyright">
		&copy<?php echo date("Y"); ?> The Triangle. All rights are reserved, except where otherwise noted.
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
