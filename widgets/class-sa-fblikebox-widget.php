<?php

class Sa_fblikebox_widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct(
			'Sa_fblikebox_widget', // Base ID
			__( 'Facebook Likebox', 'text_domain' ), // Name
			array( 'description' => __( 'A Widget to dispalay facebook page', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		$title         = apply_filters( 'widget_title', $instance['title'] );
		$page_username = $instance['page_username'];

		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		//DISPLAY CONTENT
		echo $this->getContent( $page_username );
		echo $args['after_widget'];
	}

	public function getContent( $page_username ) {
		$output = '<div class="fb-page" data-href="https://www.facebook.com/' . $page_username . '/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/' . $page_username . '/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/' . $page_username . '/">' . $page_username . '</a></blockquote></div>';

		return $output;
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'Fb likebox Widget', text_domain );
		}
		$page_username = $instance['page_username'];
		$text          = $instance['text'];
		?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
                   name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
                   value="<?php echo esc_attr( $title ); ?>"/></p>

        <p><label for="<?php echo $this->get_field_id( 'page_username' ); ?>"><?php _e( 'PAGE username:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'page_username' ); ?>"
                   name="<?php echo $this->get_field_name( 'page_username' ); ?>" type="text"
                   value="<?php echo esc_attr( $page_username ); ?>"/></p>


		<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                  = array();
		$instance['title']         = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['page_username'] = ( ! empty( $new_instance['page_username'] ) ) ? strip_tags( $new_instance['page_username'] ) : '';

		return $instance;
	}
}

function register_Sa_fblikebox_widget() {
	register_widget( 'Sa_fblikebox_widget' );
}

add_action( 'widgets_init', 'register_Sa_fblikebox_widget' );