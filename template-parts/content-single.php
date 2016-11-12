<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Triangle_X
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<div class="article-headline">
		<?php
			the_title('<h1>', '</h1>');
		
			if (the_subtitle('', '', false) !== '' || the_subtitle('', '', false) !== false)
				echo the_subtitle('<h2>', '</h2>');
		?>
	</div>
	
	<div class="article-meta">
		<div class="author">By <?php coauthors_posts_links(); ?></div>
		<?php
			the_date('M. j, Y', '<div class="date">', '</div>');
			
			if (function_exists('sharing_display'))
				sharing_display('', true);
			 
			if (class_exists('Jetpack_Likes'))
			{
				$custom_likes = new Jetpack_Likes;
				echo $custom_likes->post_likes('');
			}
		?>
	</div>

	<div class="article-image">
		
	</div>
	
	<div class="article-content">
		<?php the_content(); ?>
	</div>

	<footer class="article-footer">
		<?php //triangle_x_entry_footer(); ?>
	</footer>
</article>
