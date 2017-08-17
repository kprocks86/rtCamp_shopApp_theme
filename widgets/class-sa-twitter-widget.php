<?php

class Sa_Twitter_widget extends WP_Widget {

	/**
	 * Sets up a new Twitter Tweets widget instance.
	 *
	 * @access public
	 */
	public function __construct() {
		parent::__construct(
			'Sa_Twitter_widget', // Base ID
			__( 'Twitter tweets', 'text_domain' ), // Name
			array( 'description' => __( 'A Widget to display tweets', 'text_domain' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		require_once get_template_directory() . '/lib/twitter-widget/twitteroauth.php';

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Tweets' );

		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		?>

		<?php echo $args['before_widget']; ?>

		<?php if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		if ( isset( $instance['username'] ) == false ) {
			$instance['username'] = 'rtcamp';
		}

		$twitter_customer_key = 'sSX9hcoGsabB2Ay3b4edxFtft';

		$twitter_customer_secret = 'c27ZpRNtEGdwgco2pBE4g2XbHeAt6TcrQrk8HQ9lIsSPfUziZZ';

		$twitter_access_token = '4179367623-oOzb3vPaDJ4joadIcPIRTnspXUV5Kcbqim9bL2V';

		$twitter_access_token_secret = 'MGJTJbbObZrPRO0pcQKHr2l4k92apCa4a4XzaqpaD51vI';

		$connection = new TwitterOAuth( $twitter_customer_key, $twitter_customer_secret, $twitter_access_token, $twitter_access_token_secret );
		$x          = 0;
		$my_tweets  = $connection->get( 'statuses/user_timeline', array(
			'screen_name' => 'echo get_option("twitter_profile");',
			'count'       => 25
		) );

		for ( $p = 0; $p < 25; $p ++ ) {
			//function 9preg_replace) to convert text url into links.
			$string = preg_replace( '@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<br><a target="blank" rel="nofollow" href="$1" target="_blank">$1</a>', $my_tweets[ $p ]->text );
			if ( ! preg_match( "/@(\w+)/", $string ) ) {
				$tweets[ $x ] = $string;
				$x ++;
			}
		}

		if ( isset( $my_tweets->errors ) ) {
			echo 'Error :' . $my_tweets->errors[0]->code . ' - ' . $my_tweets->errors[0]->message;
		} else {
			echo '<ul class="list-group">';
			for ( $u = 0, $x = 0; $u < $instance['number']; $u ++, $x ++ ) {
				echo '<li class="list-group-item text-style-tweets list-unstyled">' . $tweets[ $x ] . '</li>';
			}
			echo '</ul>';
		}

		echo $args['after_widget'];

		?>

		<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

	}


	/**
	 * Handles updating the settings for the current Twitter Tweets widget instance.
	 *
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 *
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance             = $old_instance;
		$instance['title']    = sanitize_text_field( $new_instance['title'] );
		$instance['username'] = sanitize_text_field( $new_instance['username'] );
		$instance['number']   = (int) $new_instance['number'];

		return $instance;
	}

	/**
	 * Outputs the settings form for the Twitter Tweets widget.
	 *
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title    = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$username = isset( $instance['username'] ) ? esc_attr( $instance['username'] ) : 'rtcamp';
		$number   = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
                   name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>"/>
        </p>

        <p><label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php _e( 'Twitter Username:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'username' ); ?>"
                   name="<?php echo $this->get_field_name( 'username' ); ?>" type="text"
                   value="<?php echo $username; ?>" placeholder="rtcamp"/></p>

        <p>
            <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of Tweets to show:' ); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" max="10" min="1"
                   name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1"
                   value="<?php echo $number; ?>" size="3"/></p>

		<?php
	}
}

function Register_Sa_Twitter_widget() {
	register_widget( 'Sa_Twitter_widget' );

}

add_action( 'widgets_init', 'Register_Sa_Twitter_widget' );