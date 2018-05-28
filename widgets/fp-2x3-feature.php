<?php
/**
 * Adds frontpage content area with 2 stories on the left, 3 on the right, and a featured story in the middle
 */

$do_not_duplicate = array();

class TX_FP_2x3_Feature extends WP_Widget
{
	/**
	 * Register widget with WordPress.
	 */
	function __construct()
	{
		parent::__construct(
			'tx_fp_2x3_feature', // Base ID
			'Frontpage 2x3 Feature (Triangle X)', // Name
			array('description' => 'Frontpage content area with 2 stories on the left, 3 on the right, and a featured story in the middle') // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget($args, $instance)
	{
		echo $args['before_widget'];
		
		// Create content section
		printf('<section id="section-%1$s" class="fp-2x3-feature">', strtolower($instance['title']));
		
		// Create left side stories
		print('<div class="left"><ul class="stories-teaser">');
		$this->get_teasers($instance['category']);
		print('</ul></div>');
		
		// Create middle feature story
		print('<div class="feature">');
		$this->get_frontpage_feature();
		print('</div>');
		
		// Create right side stories
		print('<div class="right"><ul class="stories-list">');
		$this->get_stories($instance['category']);
		print('</ul></div>');
		
		printf('</section>');		
		echo $args['after_widget'];
	}
	
	/**
	 * Check to see if there are any featured articles, display the most recent one if there are
	 *
	 * @see WP_Widget::widget()
	 */
	private function get_frontpage_feature()
	{
		global $do_not_duplicate;
		$query_featured = new WP_Query(array(
			'meta_key' => 'featured_article',
			'post_type' => array('post', 'snowball'),
			'meta_value' => 1,
			'posts_per_page' => 1
		));

		if($query_featured->have_posts())
		{
			while($query_featured->have_posts())
			{
				$query_featured->the_post();
				$postID = get_the_ID();
				$link = get_permalink();
				array_push($do_not_duplicate, $postID);
				
				printf('<a href="%1$s">%2$s</a>', $link, get_the_post_thumbnail());
				printf('<a class="text-headline-large" href="%1$s">%2$s</a>', $link, get_the_title());
				printf('<div class="frontpage-postinfo">Featured this week in %1$s</div>', get_the_category()[0]->name);
				printf('<div class="category-author">By %1$s | %2$s</div>', coauthors_posts_links(null, null, null, null, false), get_the_date('M. j, Y'));
				printf('<p>%1$s</p>', get_the_excerpt());
			}
		}
	}
	
	/**
	 * Get stories for font page left column
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param int $catID     ID of category to query posts for.
	 */
	private function get_teasers($catID)
	{
		// Get feature post to make sure it's not duplicated because this function is called before the global array is populated
		$do_not_duplicate = array();
		$query_featured = new WP_Query(array(
			'meta_key' => 'featured_article',
			'post_type' => array('post', 'snowball'),
			'meta_value' => 1,
			'posts_per_page' => 1
		));

		if($query_featured->have_posts())
		{
			while($query_featured->have_posts())
			{
				$query_featured->the_post();
				array_push($do_not_duplicate, get_the_ID());
			}
		}	
		
		$query = new WP_Query(array('posts_per_page' => 2, 'offset' => 0, 'cat' => $catID, 'post__not_in' => $do_not_duplicate));

		while($query->have_posts())
		{
			$query->the_post();
			$link = get_the_permalink();
			
			echo '<li class="story-item">';
			printf('<a href="%1$s"><div class="highlights-thumbnail-mobile">%2$s</div></a>', $link, get_the_post_thumbnail(null, array('class' => '169-preview-medium')));
			printf('<a class="text-headline-medium" href="%1$s">%2$s</a>', $link, get_the_title());
			printf('<div class="category-tease"><a href="%3$s"><div class="highlights-thumbnail-desktop">%1$s</div></a> %2$s</div>', get_the_post_thumbnail(null, array('class' => '169-preview-medium')), get_the_excerpt(), $link);
			printf('<div class="category-author">By %1$s | %2$s</div>', coauthors_posts_links(null, null, null, null, false), get_the_date('M. j, Y'));
			echo '</li>';
		}
	}
	
	/**
	 * Get stories for font page right column
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param int $catID     ID of category to query posts for.
	 */
	private function get_stories($catID)
	{
		global $do_not_duplicate;
		$query = new WP_Query(array('posts_per_page' => 3, 'offset' => 2, 'cat' => $catID, 'post__not_in' => $do_not_duplicate));

		while($query->have_posts())
		{
			$query->the_post();
			echo '<li class="story-item">';		
			printf('<a class="text-headline-small" href="%1$s">%2$s</a>', get_the_permalink(), get_the_title());
			printf('<div class="category-author">By %1$s | %2$s</div>', coauthors_posts_links(null, null, null, null, false), get_the_date('M. j, Y'));
			printf('<p>%1$s</p>', get_the_excerpt());
			echo '</li>';
		}	
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form($instance)
	{
		$title = !empty($instance['title']) ? $instance['title'] : 'New Title';
		print('<p>');
		printf('<label for="%1$s">Title:</label>', $this->get_field_id('title'));
		printf('<input class="widefat" id="%1$s" name="%2$s" type="text" value="%3$s">', $this->get_field_id('title'), $this->get_field_name('title'), $title);
		print('</p>');
		
		// Add all categories to select list
		print('<p>');
		printf('<select id="%1$s" name="%2$s" class="widefat">', $this->get_field_id('category'), $this->get_field_name('category'));
		foreach(get_terms('category', 'parent=0&hide_empty=0') as $term)
		{
			printf('<option %1$s value="%2$s">%3$s</option>', selected($instance['category'], $term->term_id), $term->term_id, $term->name);
		}
		printf('</select>');
		print('</p>');
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update($new_instance, $old_instance)
	{
		$instance = array();
		$instance['title'] = (!empty( $new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
		$instance['category'] = (!empty( $new_instance['category'])) ? $new_instance['category'] : '';

		return $instance;
	}

}

// Register the widget with WordPress
function tx_register_fp_2x3_feature()
{
    register_widget('TX_FP_2x3_Feature');
}
add_action('widgets_init', 'tx_register_fp_2x3_feature');

?>