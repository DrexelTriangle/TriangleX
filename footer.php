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
				<a href="http://thetriangle.us2.list-manage.com/subscribe/post?u=6eb4aab81745d3436b16a6181&id=7389750c95" target="_blank">
					<span class="fa-stack fa-1x">
						<i class="fa fa-circle fa-stack-2x" style="color: #07294D;"></i>
						<i class="fa fa-envelope-o fa-stack-1x"></i>
					</span>
				</a>
			</div>
			
			<div class="footer-tagline">
				THE INDEPENDENT STUDENT NEWSPAPER AT DREXEL UNIVERSITY SINCE 1926
			</div>
		</div>
		
		<nav class="footer-nav-container">
			<ul class="footer-nav-links">
				<a href="/" rel="Home">Home</a> |
				<a href="news" rel="News">News</a> |
				<a href="opinion" rel="Opinion">Opinion</a> |
				<a href="entertainment" rel="Arts and Entertainment">A&E</a> |
				<a href="sports" rel="Sports">Sports</a> |
				<a href="style" rel="Style">Style</a> |
				<a href="about" rel="About">About Us</a> |
				<a href="staff" rel="Staff">Staff Directory</a> |
				<a href="advertising" rel="Advertising">Advertising</a> |
				<a href="classifieds" rel="Classifieds">Classifieds</a> |
				<a href="join" rel="Join">Join</a> |
				<a href="contact" rel="Contact">Contact</a> |
				<a href="feed" rel="RSS Feed">RSS</a>
			</ul>
		</nav>
	</div>
	
	<div class="footer-copyright">
		&copy<?php echo date("Y"); ?> The Triangle. All rights are reserved, except where otherwise noted.
	</div>
	
	<div class="footer-disclaimer">
		The Triangle is an independent student organization and is not owned nor operated by Drexel University.
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
