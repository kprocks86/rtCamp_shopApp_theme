<?php

class social_link_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct(
			'social_link_Widget', // Base ID
			__( 'Social link widget', 'Text_domain' ), // Name
			array( 'description' => __( 'A Widget to display social links of user', 'Text_username_domain' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		$title          = apply_filters( 'widget_title', $instance['title'] );
		$FB_username    = $instance['FB_username'];
		$Insta_username = $instance['Insta_username'];
		$Tw_username    = $instance['Tw_username'];
		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		//DISPLAY CONTENT
		echo $this->getContent( $FB_username, $Insta_username, $Tw_username );
		echo $args['after_widget'];
	}

	public function getContent( $FB_username, $Insta_username, $Tw_username ) {
		$output = '<a class="hollow button" href="https://www.facebook.com/' . $FB_username . '" ><i class="fa fa-facebook fa-lg"  aria-hidden="true"><span>/' . $FB_username . '</span></i></a> 
				  <a class="hollow button warning"  href="https://www.instagram.com/' . $Insta_username . '"><i class="fa fa-instagram fa-lg" aria-hidden="true"><span>/' . $Insta_username . '</span></i></a> 
				  <a class="hollow button alert" href="https://twitter.com/' . $Tw_username . '"><i class="fa fa-twitter fa-lg" aria-hidden="true"><span>/' . $Tw_username . '</span></i></a>';

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
			$title = __( 'Social Link Widget', 'text_domain' );
		}
		$FB_username    = $instance['FB_username'];
		$Insta_username = $instance['Insta_username'];
		$Tw_username    = $instance['Tw_username'];
		?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
                   name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
                   value="<?php echo esc_attr( $title ); ?>"/></p>

        <p><label for="<?php echo $this->get_field_id( 'FB_username' ); ?>"><?php _e( 'FACEBOOK username:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'FB_username' ); ?>"
                   name="<?php echo $this->get_field_name( 'FB_username' ); ?>" type="text"
                   value="<?php echo esc_attr( $FB_username ); ?>"/></p>

        <p>
            <label for="<?php echo $this->get_field_id( 'Insta_username' ); ?>"><?php _e( 'INSTAGRAM username:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'Insta_username' ); ?>"
                   name="<?php echo $this->get_field_name( 'Insta_username' ); ?>" type="text"
                   value="<?php echo esc_attr( $Insta_username ); ?>"/></p>

        <p><label for="<?php echo $this->get_field_id( 'Tw_username' ); ?>"><?php _e( 'TWITTER username:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'Tw_username' ); ?>"
                   name="<?php echo $this->get_field_name( 'Tw_username' ); ?>" type="text"
                   value="<?php echo esc_attr( $Tw_username ); ?>"/></p>


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
		$instance                   = array();
		$instance['title']          = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['FB_username']    = ( ! empty( $new_instance['FB_username'] ) ) ? strip_tags( $new_instance['FB_username'] ) : '';
		$instance['Insta_username'] = ( ! empty( $new_instance['Insta_username'] ) ) ? strip_tags( $new_instance['Insta_username'] ) : '';
		$instance['Tw_username']    = ( ! empty( $new_instance['Tw_username'] ) ) ? strip_tags( $new_instance['Tw_username'] ) : '';

		return $instance;
	}
}

function register_social_link_Widget() {
	register_widget( 'social_link_Widget' );
}

add_action( 'widgets_init', 'register_social_link_Widget' );