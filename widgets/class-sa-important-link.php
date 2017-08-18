<?php

class importantLink_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct(
			'importantLink_widget', // Base ID
			__( 'importantLink Widget', 'text_domain' ), // Name
			array( 'description' => __( 'A Widget to display links', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		$title   = apply_filters( 'widget_title', $instance['title'] );
		$link1 = $instance['link1'];
		$link2 = $instance['link2'];
		$link3 = $instance['link3'];
		$link4 = $instance['link4'];
		$link5 = $instance['link5'];

		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo '<h3>' . $title . '</h3>';
		}
		//DISPLAY CONTENT
		echo $this->getContent( $link1,$link2,$link3,$link4,$link5);
		echo $args['after_widget'];
	}

	public function getContent( $link1,$link2,$link3,$link4,$link5 ) {
				$output = '<ul><li><a href="' . $link1 . '">'. $link1.'</a></li><li><a href="'. $link2.'">'. $link2.'</a></li><li><a href="'. $link3.'">'. $link3.'</a></li><li><a href="'.$link4.'">'. $link4.'</a></li><li><a href="'.$link5.'">'. $link5.'</a></li></ul>';


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
			$title = __( 'importantLink Widget', text_domain );
		}
		$link1 = $instance['link1'];
		$link2 = $instance['link2'];
		$link3 = $instance['link3'];
		$link4 = $instance['link4'];
		$link5 = $instance['link5'];
		?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
			       name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
			       value="<?php echo esc_attr( $title ); ?>"/></p>

		<p><label for="<?php echo $this->get_field_id( 'link1' ); ?>"><?php _e( 'link1:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'link1' ); ?>"
			       name="<?php echo $this->get_field_name( 'link1' ); ?>" type="text"
			       value="<?php echo esc_attr( $link2 ); ?>"/></p>
		<p><label for="<?php echo $this->get_field_id( 'link2' ); ?>"><?php _e( 'link2:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'link2' ); ?>"
			       name="<?php echo $this->get_field_name( 'link2' ); ?>" type="text"
			       value="<?php echo esc_attr( $link2 ); ?>"/></p>
		<p><label for="<?php echo $this->get_field_id( 'link3' ); ?>"><?php _e( 'link3:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'link3' ); ?>"
			       name="<?php echo $this->get_field_name( 'link3' ); ?>" type="text"
			       value="<?php echo esc_attr( $link3 ); ?>"/></p>
		<p><label for="<?php echo $this->get_field_id( 'link4' ); ?>"><?php _e( 'link4:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'link4' ); ?>"
			       name="<?php echo $this->get_field_name( 'link4' ); ?>" type="text"
			       value="<?php echo esc_attr( $link4 ); ?>"/></p>
		<p><label for="<?php echo $this->get_field_id( 'link5' ); ?>"><?php _e( 'link5:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'link5' ); ?>"
			       name="<?php echo $this->get_field_name( 'link5' ); ?>" type="text"
			       value="<?php echo esc_attr( $link5 ); ?>"/></p>



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
		$instance            = array();
		$instance['title']   = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['link1'] = ( ! empty( $new_instance['link1'] ) ) ? strip_tags( $new_instance['link1'] ) : '';
		$instance['link2'] = ( ! empty( $new_instance['link1'] ) ) ? strip_tags( $new_instance['link2'] ) : '';
		$instance['link3'] = ( ! empty( $new_instance['link1'] ) ) ? strip_tags( $new_instance['link3'] ) : '';
		$instance['link4'] = ( ! empty( $new_instance['link1'] ) ) ? strip_tags( $new_instance['link4'] ) : '';
		$instance['link5'] = ( ! empty( $new_instance['link1'] ) ) ? strip_tags( $new_instance['link5'] ) : '';
		return $instance;
	}
}

function register_importantLink_widget() {
	register_widget( 'importantLink_Widget' );
}

add_action( 'widgets_init', 'register_importantLink_widget' );