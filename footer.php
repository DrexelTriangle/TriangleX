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

<footer id="colophon" class="footer-wrapper">
	<div class="footer-container">
		<div class="footer-branding">
			<div class="logo">
				<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
			</div>
			
			<div class="footer-social">
				<a href="https://www.facebook.com/drexel.triangle/" target="_blank">
					<span class="fa-stack fa-1x">
						<i class="fa fa-circle fa-stack-2x" style="color: #3b5998;"></i>
						<i class="fa fa-facebook fa-stack-1x"></i>
					</span>
				</a>
				<a href="https://twitter.com/thetriangle/" target="_blank">
					<span class="fa-stack fa-1x">
						<i class="fa fa-circle fa-stack-2x" style="color: #00acee;"></i>
						<i class="fa fa-twitter fa-stack-1x"></i>
					</span>
				</a>
				<a href="https://www.instagram.com/drexeltriangle/" target="_blank">
					<span class="fa-stack fa-1x">
						<i class="fa fa-circle fa-stack-2x" style="color: #125688;"></i>
						<i class="fa fa-instagram fa-stack-1x"></i>
					</span>
				</a>
				<a href="https://www.youtube.com/user/DrexelTriangle" target="_blank">
					<span class="fa-stack fa-1x">
						<i class="fa fa-circle fa-stack-2x" style="color: #e52d27;"></i>
						<i class="fa fa-youtube-play fa-stack-1x"></i>
					</span>
				</a>
			</div>
		</div>
	</div>
	
	<div class="footer-copyright">
		&copy<?php echo date("Y"); ?> The Triangle. All rights are reserved, except where otherwise noted.
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
