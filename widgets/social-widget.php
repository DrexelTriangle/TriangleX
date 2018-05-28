<?php
/**
 * Adds Social_Widget widget that includes social media links for Triangle accounts.
 */

class TX_Social_Widget extends WP_Widget
{
	/**
	 * Register widget with WordPress.
	 */
	function __construct()
	{
		parent::__construct(
			'tx_social_widget', // Base ID
			'Social Widget (Triangle X)', // Name
			array('description' => 'Social media links for Triangle accounts') // Args
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
		if (!empty($instance['title']))
		{
			echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
		}
		
		// Todo - clean this up at some point...
		echo '<ul class="social-links">
				<li class="social-item">
					<i class="fa fa-facebook" style="color: #3b5998;"></i>
					<a href="https://www.facebook.com/drexel.triangle/" target="_blank">Drexel Triangle</a>
				</li>
				<li class="social-item">
					<i class="fa fa-twitter" style="color: #00acee;"></i>
					<a href="https://twitter.com/drexeltriangle" target="_blank">@DrexelTriangle</a>
				</li>
				<li class="social-item">
					<i class="fa fa-instagram text-instagram"></i>
					<a href="https://www.instagram.com/drexeltriangle/" target="_blank">@drexeltriangle</a>
				</li>
				<li class="social-item">
					<i class="fa fa-youtube-play" style="color: #e52d27;"></i>
					<a href="https://www.youtube.com/user/DrexelTriangle" target="_blank">DrexelTriangle</a>
				</li>
			</ul>';
		
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

		return $instance;
	}

}

// Register the widget with WordPress
function tx_register_social_widget()
{
    register_widget('TX_Social_Widget');
}
add_action('widgets_init', 'tx_register_social_widget');

?>