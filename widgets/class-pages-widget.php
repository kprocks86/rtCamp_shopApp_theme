<?php class page_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
// Base ID of your widget
			'page_widget',
// Widget name will appear in UI
			__( 'Pages Widget', 'custom_widget_domain' ),
// Widget description
			array( 'description' => __( 'Sample widget for showing random pages', 'custom_widget_domain' ), )
		);
	}
	/* function page_widget() {
	parent::WP_Widget(false, $name == __ ('Custom Pages Widget','custom_widget_domain'));
	} */
// Widget Backend
	public function form( $instance ) {
//Set the title
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'Pages', 'custom_widget_domain' );
		}
		?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> Pages
        </p><br/>

        <label><?php _e( 'Pages:' ); ?></label>
        <div style="overflow-y:scroll; height:150px">
			<?php
			$pages = get_pages();
			foreach ( $pages as $page ) {
				echo '<input id=' . $this->get_field_id( 'title' ) . ' type="checkbox" name="' . $this->get_field_name( 'title' ) . '[]" value="' . $page->ID . '" ' . ( in_array( $page->ID, $instance['title'] ) ? 'checked' : '' ) . '>' . esc_html( $page->post_title ) . '<br/>';
			}
			?>
        </div>

		<?php
	}

// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = esc_sql( $new_instance['title'] );

		return $instance;
	}

// Creating widget front-end
	public function widget( $args, $instance ) {
		echo '<h3>Pages </h3>';
		echo '<ul>';
		foreach ( $instance['title'] as $page ) {
			$pagedata = get_post( $page );
			echo "<li><a href='" . get_the_permalink( $page ) . "'>" . $pagedata->post_title . "</a></li>";
		}
		echo "</ul>";
	}
}

function register_page_widget() {
	register_widget( 'page_widget' );
}

add_action( 'widgets_init', 'register_page_widget' );