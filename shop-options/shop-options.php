<?php
function add_theme_menu_item() {
	add_menu_page( "Theme Panel", "Theme Panel", "manage_options", "theme-panel", "theme_settings_page", null, 99 );
}


add_action( "admin_menu", "add_theme_menu_item" );

function theme_settings_page() {

	?>

    <div class="wrap">
        <h1>Theme Panel</h1>
        <form name="themeoptions" method="post" action="">
            <input type="hidden" name="update_settings" value="Y"/>
			<?php
			settings_fields( "section" );
			do_settings_sections( "theme-options" );
			submit_button();
			?>
        </form>
    </div>
	<?php
	if ( isset( $_POST["update_settings"] ) ) {
		$logo = esc_attr( $_POST['theme_rtcampOne_logo'] );
		update_option( "theme_rtcampOne_logo", $logo );

		$page = esc_attr( $_POST['theme_page'] );
		update_option( "theme_rtcampOne_page", $page );

		$vid1 = esc_attr( $_POST['slider1'] );
		update_option( "theme_rtcampOne_slider1", $vid1 );
		$vid2 = esc_attr( $_POST['slider2'] );
		update_option( "theme_rtcampOne_slider2", $vid2 );
		$vid3 = esc_attr( $_POST['slider3'] );
		update_option( "theme_rtcampOne_slider3", $vid3 );
		$vid4 = esc_attr( $_POST['slider4'] );
		update_option( "theme_rtcampOne_slider4", $vid4 );
		$vid5 = esc_attr( $_POST['slider5'] );
		update_option( "theme_rtcampOne_slider5", $vid5 );
		$fbusername = esc_attr( $_POST['fbusername'] );
		update_option( "fb_username", $fbusername );
		$twitterprofile = esc_attr( $_POST['twitterprofile'] );
		update_option( "twitter_profile", $twitterprofile );
	}
}

function rtcampOne_options_settings_init() {
	// Add Logo uploader
	add_settings_field( 'rtcampOne_setting_logo', __( 'Logo' ), 'rtcampOne_setting_logo', 'theme-options', 'section' );
}

add_action( 'admin_init', 'rtcampOne_options_settings_init' );
function rtcampOne_setting_logo() {
	$rtcampOne_options = get_option( 'theme_rtcampOne_options' );
	?>
    <input type="text" id="logo_url" name="theme_rtcampOne_logo"
           value="<?php echo esc_url( $rtcampOne_options['logo'] ); ?>"/>
    <input id="upload_logo_button" type="button" class="button" value="<?php _e( 'Upload Logo', 'rtcampOne' ); ?>"/>
    <span class="description"><?php _e( 'Upload an image for the banner.', 'rtcampOne' ); ?></span>
	<?php
}

// meadia uplode media
function rtcampOne_options_enqueue_scripts() {
	wp_register_script( 'media-uploader', get_template_directory_uri() . '/lib/js/upload.js', array(
		'jquery',
		'media-upload',
		'thickbox'
	) );


	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'thickbox' );
	wp_enqueue_style( 'thickbox' );

	wp_enqueue_script( 'media-upload' );
	wp_enqueue_script( 'media-uploader' );


}

add_action( 'admin_enqueue_scripts', 'rtcampOne_options_enqueue_scripts' );
function rtcampOne_get_default_options() {
	$options = wp_get_attachment_image_src( $attachment_id = 0 );

	return $options;
}

function rtcampOne_options_init() {
	$rtcampOne_options = get_option( 'theme_rtcampOne_logo' );
	// Are our options saved in the DB?
	if ( false === $rtcampOne_options ) {
		// If not, we'll save our default options
		$rtcampOne_options = rtcampOne_get_default_options();
		add_option( 'theme_rtcampOne_logo', $rtcampOne_options );
	}
	// In other case we don't need to update the DB
}

add_action( 'after_setup_theme', 'rtcampOne_options_init' );
function content() {
	?>

    <select id="pages" name="theme_page">
        <option value="">
			<?php echo esc_attr( __( 'Choose Page' ) ); ?></option>
		<?php
		$pages = get_pages();

		foreach ( $pages as $page ) {
			$option = '<option value="' . $page->ID . '">';
			$option .= $page->post_title;
			$option .= '</option>';
			echo $option;
		}
		?>
    </select>

	<?php
}


/* Facebook username */
function fb_username() {
	?>
    <input id="fb" type="text" name="fbusername"/>

	<?php
}

/* Twitter Profile */
function twitter_username() {
	?>
    <input id="twitter" type="text" name="twitterprofile"/>

	<?php
}

function youtube_slider() {
	?>
    <input id="video1" type="text" name="slider1" value="https://www.youtube.com/embed/" /><br>
    <input id="video2" type="text" name="slider2" value="https://www.youtube.com/embed/"/><br>
    <input id="video3" type="text" name="slider3" value="https://www.youtube.com/embed/"/><br>
    <input id="video4" type="text" name="slider4" value="https://www.youtube.com/embed/"/><br>
    <input id="video5" type="text" name="slider5" value="https://www.youtube.com/embed/"/><br>

	<?php


}


function display_theme_panel_fields() {
	add_settings_section( "section", "All Settings", null, "theme-options" );
	add_settings_field( "youtube_slider", "YouTube Slider Settings ", "youtube_slider", "theme-options", "section" );
	add_settings_field( "content", "Static Page Content", "content", "theme-options", "section" );
	add_settings_field( "fb_username", "FB Page Username", "fb_username", "theme-options", "section" );
	add_settings_field( "twitter_username", "Twitter Profile Username", "twitter_username", "theme-options", "section" );
}

add_action( "admin_init", "display_theme_panel_fields" );