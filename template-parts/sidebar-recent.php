<?php
/**
 * Template part for displaying most recent articles sidebar item.
 *
 * @package Triangle_X
 */
?>

<div class="sidebar-title">Most Recent Articles</div>
<?php echo do_shortcode('[jetpack_top_posts_widget types="post" count="5" display="grid"]'); ?>