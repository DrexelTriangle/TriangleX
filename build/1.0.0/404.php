<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Triangle_X
 */

get_header(); ?>

<div class="generic-wrapper">
	<div class="e404-container">
		<div class="e404-code">404</div>
		<h2>The page you were looking for cannot be found.</h2>

		<p><center>The page you were looking for could have been moved or no longer exists on this site. Contact The Triangle Web Department for further assistance.</center></p>
		<!--<p><?php esc_html_e( 'Alternatively, you can try searching for what you were looking for below.', 'triangle-x' ); ?></p>

		<?php
			get_search_form();

			/* translators: %1$s: smiley */
			$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'triangle-x' ), convert_smilies( ':)' ) ) . '</p>';
			the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
		?>-->
	</div>
</div>

<?php get_footer(); ?>