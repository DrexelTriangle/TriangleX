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

<div class="generic-container" style="margin-bottom: 0px;">
	<div class="print-logo"><img src="<?php echo get_template_directory_uri() . '/images/logo-black.svg'; ?>"></img></div>

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
</div>

<div id="post-<?php the_ID(); ?>" class="generic-flex-container">
	<main id="content" class="flex-main">		
		<article class="single-content">
			<?php the_content(); ?>
		</article>
		
		<div id="comments" class="single-comments">
			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if(comments_open() || get_comments_number())
					comments_template();
			?>
		</div>
	</main>
	
	<aside id="sidebar" class="flex-sidebar">
		<?php insert_ad('Global Medium Rectangle Top', 'medium-rectangle');	?>
		<?php dynamic_sidebar('sidebar-global'); ?>
		<?php insert_ad('Global Medium Rectangle Bottom', 'medium-rectangle');?>
	</aside>
</div>

<?php insert_ad('Global Banner Bottom', 'banner-bottom'); ?>
