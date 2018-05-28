<?php
/**
 * Adds TX_Mailchimp_Widget widget for displaying Triangle mailchimp signup.
 */

class TX_Mailchimp_Newsletter extends WP_Widget
{
	/**
	 * Register widget with WordPress.
	 */
	function __construct()
	{
		parent::__construct(
			'tx_mailchimp_newsletter', // Base ID
			'Mailchimp Newsletter (Triangle X)', // Name
			array('description' => 'Mailchimp signup form for The Triangle newsletter') // Args
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
		
		if (!empty($instance['description']))
		{
			printf('<p>%1$s</p>', $instance['description']);
		}
		
		// Todo - clean this up at some point...
		?>
			<div id="mc_embed_signup">
				<form action="//thetriangle.us2.list-manage.com/subscribe/post?u=6eb4aab81745d3436b16a6181&amp;id=7389750c95" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					<div id="mc_embed_signup_scroll">
						<div class="mc-field-group">
							<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="email@example.com">
						</div>
						<div id="mce-responses" class="clear">
							<div class="response" id="mce-error-response" style="display:none"></div>
							<div class="response" id="mce-success-response" style="display:none"></div>
						</div>
						<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
						<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_6eb4aab81745d3436b16a6181_7389750c95" tabindex="-1" value=""></div>
						<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
					</div>
				</form>
			</div>	
		<?php
		
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
		
		$description = !empty($instance['description']) ? $instance['description'] : 'New Description';
		print('<p>');
		printf('<label for="%1$s">Description:</label>', $this->get_field_id('description'));
		printf('<input class="widefat" id="%1$s" name="%2$s" type="text" value="%3$s">', $this->get_field_id('description'), $this->get_field_name('description'), $description);
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
		$instance['description'] = (!empty( $new_instance['description'])) ? sanitize_text_field($new_instance['description']) : '';

		return $instance;
	}

}

// Register the widget with WordPress
function tx_register_mailchimp_widget()
{
    register_widget('TX_Mailchimp_Newsletter');
}
add_action('widgets_init', 'tx_register_mailchimp_widget');

?>