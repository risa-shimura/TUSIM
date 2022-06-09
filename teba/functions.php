<?php
/*-----------------------------------------------*
Define THEME
/*-----------------------------------------------*/
if (!defined('TEBA_URI_PATH')) define('TEBA_URI_PATH', get_template_directory_uri());
if (!defined('TEBA_ABS_PATH')) define('TEBA_ABS_PATH', get_template_directory());
if (!defined('TEBA_URI_PATH_FR')) define('TEBA_URI_PATH_FR', TEBA_URI_PATH.'/framework');
if (!defined('TEBA_ABS_PATH_FR')) define('TEBA_ABS_PATH_FR', TEBA_ABS_PATH.'/framework');
if (!defined('TEBA_URI_PATH_ADMIN')) define('TEBA_URI_PATH_ADMIN', TEBA_URI_PATH_FR.'/admin');
if (!defined('TEBA_ABS_PATH_ADMIN')) define('TEBA_ABS_PATH_ADMIN', TEBA_ABS_PATH_FR.'/admin');

/*-----------------------------------------------*
Register Default Fonts
/*-----------------------------------------------*/
function teba_fonts_url() {
    $font_url = '';
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'teba' ) ) {
        $font_url = add_query_arg( 'family', urlencode('IBM Plex Sans:400,500,600,700|Roboto|Noto Serif' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}
/*-----------------------------------------------*
Enqueue Style , Script
/*-----------------------------------------------*/
function teba_enqueue_scripts() {
	global $teba_options;
	wp_enqueue_style( 'fonts', teba_fonts_url(), array(), '1.0.0');
	wp_enqueue_style( 'bootstrap', TEBA_URI_PATH. '/assets/css/bootstrap.min.css');
    wp_enqueue_style( 'teba-font-icons', TEBA_URI_PATH. '/assets/css/font-icons.css');
	wp_enqueue_style( 'teba-plugins', TEBA_URI_PATH. '/assets/css/plugins.css' );
	wp_enqueue_style( 'teba-core', TEBA_URI_PATH. '/assets/css/core.css');
	wp_enqueue_style( 'teba-style', TEBA_URI_PATH.'/assets/css/style.css' );
	wp_enqueue_style( 'teba-wp-custom-style', TEBA_URI_PATH . '/assets/css/wp-custom-style.css');
    /* script */
	wp_enqueue_script( 'modernizr', TEBA_URI_PATH.'/assets/js/modernizr.js', array( 'jquery' ), false, true);
	wp_enqueue_script( 'teba-vendors', TEBA_URI_PATH. '/assets/js/vendors.js', array( 'jquery' ), false, true);
    wp_enqueue_script( 'teba-custom', TEBA_URI_PATH. '/assets/js/custom.js', array( 'jquery' ), false, true );
	/*  Queue Comments reply js */
	if ( is_singular() && comments_open() && get_option('thread_comments') ){
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'teba_enqueue_scripts' );

/* Add Stylesheet And Script Backend */
function custom_admin_scripts(){
	wp_enqueue_script( 'teba-action', TEBA_URI_PATH_ADMIN.'/assets/js/action.js', array('jquery'), '', true  );
	wp_enqueue_style( 'teba-style-admin', TEBA_URI_PATH_ADMIN.'/assets/css/style-admin.css', false );
}
add_action( 'admin_enqueue_scripts', 'custom_admin_scripts');
/*------------------------------------------*
Framework , Theme Options
/*-----------------------------------------------*/
if( function_exists( 'teba_redux_setup' ) ) {
	teba_redux_setup( TEBA_ABS_PATH_ADMIN.'/options.php' );
}
require_once (TEBA_ABS_PATH_ADMIN.'/index.php');
require_once TEBA_ABS_PATH_FR . '/includes.php';

/* Init Functions */
function teba_init() {
	global $teba_options;
	require_once TEBA_ABS_PATH_FR.'/presets.php';
}
add_action( 'init', 'teba_init' );
/* This theme styles the visual editor to resemble the theme style */
function teba_after_setup_theme() {
	add_action( 'wp_enqueue_scripts', 'teba_enqueue_scripts', 99 );
	add_editor_style( 'framework/admin/assets/css/teba-editor.css' );
	if ( is_rtl() ) {
		add_editor_style( 'framework/admin/assets/css/teba-editor-rtl.css' );
	}
}
add_action( 'after_setup_theme', 'teba_after_setup_theme' );
/*-----------------------------------------------*
Template Functions
/*-----------------------------------------------*/
require_once TEBA_ABS_PATH_FR . '/template-functions.php';
require_once TEBA_ABS_PATH_FR . '/templates/post-functions.php';

/*-----------------------------------------------*
Register Sidebar
/*-----------------------------------------------*/
if (!function_exists('teba_RegisterSidebars')) {
	function teba_RegisterSidebars(){
		register_sidebar(array(
			'name' => esc_html__('Main Sidebar', 'teba'),
			'id' => 'teba-main-sidebar',
		    'description'   => esc_html__( 'This is default sidebar.', 'teba' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => esc_html__('Blog Left Sidebar', 'teba'),
			'id' => 'teba-left-sidebar',
			'description'   => esc_html__( 'This is blog left sidebar.', 'teba' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => esc_html__('Blog Right Sidebar', 'teba'),
			'id' => 'teba-right-sidebar',
			'description'   => esc_html__( 'This is blog right sidebar.', 'teba' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => esc_html__('Sidepanel Menu', 'teba'),
			'id' => 'teba-sidepanel',
		    'description'   => esc_html__( 'This is sidepanel header.', 'teba' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Widget 1', 'teba'),
			'id' => 'teba-footer-widget',
		    'description'   => esc_html__( 'This is footer widget sidebar.', 'teba' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '<div style="clear:both;"></div></div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Widget 2', 'teba'),
			'id' => 'teba-footer-widget-2',
		    'description'   => esc_html__( 'This is footer widget sidebar.', 'teba' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '<div style="clear:both;"></div></div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Widget 3', 'teba'),
			'id' => 'teba-footer-widget-3',
		    'description'   => esc_html__( 'This is footer widget sidebar.', 'teba' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '<div style="clear:both;"></div></div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Widget 4', 'teba'),
			'id' => 'teba-footer-widget-4',
		    'description'   => esc_html__( 'This is footer widget sidebar.', 'teba' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '<div style="clear:both;"></div></div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Widget 5', 'teba'),
			'id' => 'teba-footer-widget-5',
		    'description'   => esc_html__( 'This is footer widget sidebar.', 'teba' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '<div style="clear:both;"></div></div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Widget 6', 'teba'),
			'id' => 'teba-footer-widget-6',
		    'description'   => esc_html__( 'This is footer widget sidebar.', 'teba' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '<div style="clear:both;"></div></div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
	if (class_exists ( 'Woocommerce' )) {
			register_sidebar(array(
				'name' => esc_html__('Shop Sidebar', 'teba'),
				'id' => 'teba-shop-sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="wg-title">',
				'after_title' => '</h4>',
			));
		}
	}
}
add_action( 'widgets_init', 'teba_RegisterSidebars' );
/*-----------------------------------------------*
WooCommerce
/*-----------------------------------------------*/
if (class_exists('Woocommerce')) {
   require_once TEBA_ABS_PATH.'/woocommerce/wc-template-function.php';
   require_once TEBA_ABS_PATH.'/woocommerce/wc-template-hooks.php';
}?>