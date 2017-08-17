<?php
require_once( get_template_directory() .'/shop-options/shop-options.php');
require_once (get_template_directory() .'/custom-post-type/custom-post-type-Exhibitions.php');
require_once (get_template_directory() .'/custom-post-type/custom-post-type-partners.php');
require_once (get_template_directory() .'/widgets/class-pages-widget.php');

require_once (get_template_directory(). '/widgets/class-sa-important-link.php');
require_once get_template_directory() . '/widgets/class-wp-widget-categories.php';
require_once get_template_directory() . '/widgets/class-showcase-widget.php';
require_once get_template_directory() . '/widgets/class-sa-twitter-widget.php';
require_once get_template_directory() . '/widgets/class-social-link.php';
require_once get_template_directory() . '/widgets/class-sa-fblikebox-widget.php';

//THEME SUPPORT
function sa_theme_setup() {
	add_theme_support( 'custom-logo' );

	//FEATURED IMAGE SUPPORT
	add_theme_support( 'post-thumbnails' );

	//NAV MENUS
	register_nav_menus( array(
		'primary' => __( 'Primary Menu' ),
		'another-menu' => __( 'Another Menu' )
	) );

}

add_action( 'after_setup_theme', 'sa_theme_setup' );


//WIDGET LOCATIONS
function sa_init_widgets( $id ) {
	register_sidebar( array(
		'name'          => 'sidebar',
		'id'            => 'sidebar',
		'before_widget' => '<div class="callout">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	) );

	register_sidebar( array(
		'name'          => 'Showcase',
		'id'            => 'showcase',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => ''
	) );
	register_sidebar( array(
		'name'          => 'footer-1',
		'id'            => 'footer-1',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => ''
	) );
	register_sidebar( array(
		'name'          => 'footer-2',
		'id'            => 'footer-2',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => ''
	) );


}

add_action( 'widgets_init', 'sa_init_widgets' );


/**
 * Enqueue scripts and styles.
 */

function rtcampOne_scripts() {
	wp_enqueue_style( 'rtcampOne-bootstrap-style', get_stylesheet_directory_uri() . '/lib/css/bootstrap.min.css', array(), '6.2.1' );
	wp_enqueue_script( 'rtcampOne-bootstrap-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js' );
	wp_enqueue_script( 'rtcampOne-bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' );
	wp_enqueue_style( 'rtcampOne-fonts-glyficon', 'http://netdna.bootstrapcdn.com/bootstrap/3.0.0-rc2/css/bootstrap-glyphicons.css' );

	wp_enqueue_script( 'rtcampOne-fontawesome', 'https://use.fontawesome.com/37626d472d.js' );
	wp_enqueue_style( 'rtcampOne-fonts-google', 'https://fonts.googleapis.com/css?family=Raleway|Josefin+Sans' );
	wp_enqueue_style( 'rtcampOne-style', get_stylesheet_uri() );
	wp_enqueue_style( 'rtcampOne-foundation-style', get_stylesheet_directory_uri() . '/lib/css/foundation.css', array(), '6.2.1' );
	wp_enqueue_style( 'rtcampOne-custom-style', get_stylesheet_directory_uri() . '/css/style.css', array(), '1.0.0' );

	wp_enqueue_script( 'rtcampOne-app', get_template_directory() . '/lib/js/app.js', array(), '' );

}

add_action( 'wp_enqueue_scripts', 'rtcampOne_scripts' );

//REGISTER WIDGET
function sa_register_widgets() {
	register_widget( 'WP_Widget_Categories_Custom' );

}

add_action( 'widgets_init', 'sa_register_widgets' );

?>
