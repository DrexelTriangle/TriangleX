<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Triangle_X
 */

 the_title('<title>', ' | The Triangle</title>');
 
?>

<?php insert_ad('Global Banner Top', 'banner-top'); ?>

<div id="post-<?php the_ID(); ?>" class="generic-container">	
	<div class="single-title">
		<?php
			the_title('<h1>', '</h1>');
		
			if (the_subtitle('', '', false) !== '' || the_subtitle('', '', false) !== false)
				echo the_subtitle('<h2>', '</h2>');
		?>
	</div>
	
	<div class="single-meta">
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
	
	<article class="single-content">
		<?php the_content(); ?>
	</article>
	
	<div class="single-comments">
		<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if(comments_open() || get_comments_number())
				comments_template();
		?>
	</div>
</div>

<?php insert_ad('Global Banner Bottom', 'banner-bottom'); ?>
