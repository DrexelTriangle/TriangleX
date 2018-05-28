<?php
/**
 * Adds frontpage content area with a grid of stories
 */

$do_not_duplicate = array();

class TX_FP_Story_Grid extends WP_Widget
{
	/**
	 * Register widget with WordPress.
	 */
	function __construct()
	{
		parent::__construct(
			'tx_fp_story_grid', // Base ID
			'Frontpage Story Grid (Triangle X)', // Name
			array('description' => 'Frontpage content area with a grid of stories') // Args
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
		printf('<section id="section-%1$s" class="frontpage-category-main">', strtolower($instance['title']));
		
		// Print section title to page
		if (!empty($instance['title']))
		{
			$catLink = get_category_link($instance['category']);
			echo $args['before_title'] . '<a href="' . $catLink . '">' . apply_filters('widget_title', $instance['title']) . '</a>' . $args['after_title'];
		}
		
		global $do_not_duplicate;
		$query = new WP_Query(array('posts_per_page' => $instance['numPosts'], 'offset' => 0, 'cat' => $instance['category'], 'post__not_in' => $do_not_duplicate));
		
		echo '<ul class="stories-sixpack">';
		
		while($query->have_posts())
		{
			$query->the_post();
			
			echo '<li class="story-item">';
			if(has_post_thumbnail())
			{
				// For stories with thumbnails
				printf('<a href="%1$s">%2$s</a>', get_the_permalink(), get_the_post_thumbnail());
				printf('<div class="frontpage-postinfo">By %1$s | %2$s</div>', coauthors_posts_links(null, null, null, null, false), get_the_date('M. j, Y'));
				printf('<a class="text-headline-small" href="%1$s">%2$s</a>', get_the_permalink(), get_the_title());
			}
			else
			{
				// For stories with no thumbnails, print bigger headline
				printf('<a class="text-headline-medium" href="%1$s">%2$s</a>', get_the_permalink(), get_the_title());
				printf('<div class="frontpage-postinfo">By %1$s | %2$s</div>', coauthors_posts_links(null, null, null, null, false), get_the_date('M. j, Y'));
				printf('<p>%1$s</p>', get_the_excerpt());
			}
			echo '</li>';
		}
		
		echo '</ul>';
		
		printf('</section>');		
		echo $args['after_widget'];
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
		
		// Add field to select the number of posts to be displayed
		$numPosts = !empty($instance['numPosts']) ? $instance['numPosts'] : 6;
		print('<p>');
		printf('<label for="%1$s">Number of Posts:</label>', $this->get_field_id('numPosts'));
		printf('<input class="widefat" id="%1$s" name="%2$s" type="number" value="%3$s">', $this->get_field_id('numPosts'), $this->get_field_name('numPosts'), $numPosts);
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
		$instance['numPosts'] = (!empty( $new_instance['numPosts'])) ? $new_instance['numPosts'] : '';

		return $instance;
	}

}

// Register the widget with WordPress
function tx_register_fp_story_grid()
{
    register_widget('TX_FP_Story_Grid');
}
add_action('widgets_init', 'tx_register_fp_story_grid');

?>