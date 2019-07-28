<?php

define('PLS_WPORG_THEME', true);

/* Load the Placester Blueprint Theme Framework. */
require_once( get_template_directory() . '/blueprint/blueprint.php' );
new Placester_Blueprint('2.5');

/**
 * 	Filter the default prefix used in 'pls_do_atomic' and 'pls_apply_atomic'.
 * 	All add_filters that hook into events set by pls_do_atomic will need to catch
 * 	the prefix_event_name for example:
 *
 *	blueprint will mean that you need to hook against blueprint_close_header, or blueprint_open_header
 */

// Introduce yourself to the class...
add_filter( 'pls_prefix', 'manchester_prefix' );
    function manchester_prefix() {
        return 'manchester';
}

// custom featured listings list
include_once('custom/home-listing-list.php');

// custom sidebar search widget
include_once('custom/sidebar-quick-search-widget.php');

// custom sidebar recent posts widget
include_once('custom/sidebar-recent-posts-widget.php');

// custom sidebar recent posts widget
include_once('custom/sidebar-listings-widget.php');

// custom sidebar agent widget
include_once('custom/sidebar-agent-widget.php');

// custom listing page search form
include_once('custom/listings-search-form.php');

// custom listing page search list
include_once('custom/listings-search-list.php');

// custom property details page
include_once('custom/property-details.php');

// custom primary menu
include_once('custom/home-slideshow.php');

add_image_size( 'blog-image', 150, 150, true );

/**
 * Any modifications to its behavior (add/remove support for features, define 
 * constants etc.) must be hooked in 'after_setup_theme' with a priority of 10 if the
 * framework is a parent theme or a priority of 11 if the theme is a child theme. This 
 * allows the class to add or remove theme-supported features at the appropriate time, 
 * which is on the 'after_setup_theme' hook with a priority of 12.
 * 
 */
add_action( 'after_setup_theme', 'manch_setup', 10 );
function manch_setup() {
	add_theme_support( 'post-thumbnails' );

	remove_theme_support( 'pls-color-options' );
	remove_theme_support( 'pls-typography-options' );
		
    remove_theme_support( 'pls-default-css' );
    remove_theme_support( 'pls-default-css-header' );
    remove_theme_support( 'pls-default-css-nav' );
    remove_theme_support( 'pls-default-css-sidebar-widgets' );
    remove_theme_support( 'pls-default-css-listings-search' );
    remove_theme_support( 'pls-default-css-listings-detail' );
    
    add_theme_support( 'pls-routing-util-templates' );

    remove_theme_support( 'pls-meta-data');
    remove_theme_support( 'pls-meta-tags');
    remove_theme_support( 'pls-micro-data');
}

function manch_about_us_sidebar () {

	/** Set up the primary sidebar arguments. */
	$sidebar = array(
		'id' => 'about',
		'name' => __( 'About Us Sidebar', 'manchester' ),
		'description' => __( 'The main (primary) widget area, most often used as a sidebar.', 'manchester' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s widget-%2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	);
	register_sidebar($sidebar);
};
add_action( 'widgets_init', 'manch_about_us_sidebar' );

add_action('wp_enqueue_scripts', 'manch_scripts_styles');
function manch_scripts_styles() {
	$template_uri = get_template_directory_uri();

	if (!is_admin()) {
		wp_enqueue_style('manchester', $template_uri . '/css/style.css');
		wp_enqueue_style('google-font-andada', 'http://fonts.googleapis.com/css?family=Andada');

		wp_enqueue_script('manchester', $template_uri . '/js/script.js', array('jquery'), false, true);

		if (is_singular( array('post', 'page') )) {
			wp_enqueue_script('comment-reply');
		}
	}
}

add_action('wp_print_scripts', 'manch_custom_css', 99);
function manch_custom_css() {
	if (!is_admin()) {
		$custom_css = pls_get_option('pls-custom-css');
    	if ( (pls_get_option('pls-css-options')) && $custom_css ) {
        	printf( '<style type="text/css">%s</style>', $custom_css );
    	}
    }
}
