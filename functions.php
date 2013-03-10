<?php
/**
 * TANDEM functions and definitions
 *
 * @package TANDEM
 * @since TANDEM 1.0
 * @last_updated TANDEM 1.2
 */


if ( ! function_exists( 'tandem_setup' ) ) :
	function tandem_setup() {
		/**
		 * Add bbPress functions
		 *
		 * @since TANDEM 1.0
		 */
		require( get_stylesheet_directory() . '/bbpress-functions.php' );

		/**
		 * Make theme available for translation
		 * Translations can be filed in the /languages/ directory
		 *
		 * @since TANDEM 1.0
		 */
		load_child_theme_textdomain( 'tandem', get_stylesheet_directory() . '/languages' );
	}
endif;
add_action( 'after_setup_theme', 'tandem_setup' );

/**
 * Enqueue scripts and styles
 *
 * @since TANDEM 1.0
 * @last_updated TANDEM 1.1
 */
function tandem_scripts_styles() {
	global $wp_styles, $wp_scripts;

	wp_register_style( 'tandem-theme', get_stylesheet_directory_uri() . '/style.css', array( 'reset-html5', 'bike-theme' ), '1.2' );
	wp_enqueue_style( 'tandem-theme' );
	if ( ! is_404() ) :
		wp_register_script( 'tandem-theme-script', get_stylesheet_directory_uri() . '/script.js', array( 'jquery', 'bike-theme-script' ), '1.2', true );
		wp_enqueue_script( 'tandem-theme-script' );
	endif;
}
add_action( 'wp_enqueue_scripts', 'tandem_scripts_styles' );

/**
 * Add support for widgets
 *
 * @since TANDEM 1.0
 */
function tandem_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar (forum)', 'bike' ),
		'id' => 'sidebar-forum-left',
		'description' => __( 'Benyttes til at inds&aelig;tte indhold i venstre side under undermenu p&aring; side under forum.', 'bike' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'before_title' => '<h1>',
		'after_title' => '</h1>',
		'after_widget' => '</aside>',
	) );
}
add_action( 'widgets_init', 'tandem_widgets_init' );


/**
 * Change the bbPress breadcrumbs
 *
 * @since TANDEM 1.0
 * @last_updated TANDEM 1.1
 */
function tandem_bbp_breadcrumb( $args = array() ) {
    $args['include_home'] = false;
    //$args['include_root'] = false;

    return $args;
}
add_filter( 'bbp_after_get_breadcrumb_parse_args', 'tandem_bbp_breadcrumb' );

/**
 * Change URL to redirect to after user registration
 *
 * @since TANDEM 1.3
 */
function tandem_registration_redirect() {
	return wp_get_referer();
}
add_filter( 'bbp_user_register_redirect_to', 'tandem_registration_redirect' );
add_filter( 'bbp_user_lost_pass_redirect_to', 'tandem_registration_redirect' );
