<?php
/**
 * Describe child theme functions
 *
 * @package Educenter
 * @subpackage SparkEducation
 * 
 */

if ( ! function_exists( 'sparkeducation_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sparkeducation_setup() {
    
    $sparkeducation_theme_info = wp_get_theme();
    $GLOBALS['sparkeducation_version'] = $sparkeducation_theme_info->get( 'Version' );

    add_theme_support( "title-tag" );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'editor-style' );
    add_theme_support( 'widgets-block-editor' );
    add_theme_support( "wp-block-styles" ) ;
    add_theme_support( "responsive-embeds" );
    add_theme_support( "align-wide" );

}
endif;

add_action( 'after_setup_theme', 'sparkeducation_setup', 100 );

/**
 * Enqueue child theme styles and scripts
 */
add_action( 'wp_enqueue_scripts', 'sparkeducation_scripts', 20 );

function sparkeducation_scripts() {
    
    global $sparkeducation_version;
    
    wp_dequeue_style( 'educenter-style' );

    wp_dequeue_style( 'educenter-responsive' );
    
	wp_enqueue_style( 'educenter-parent-style', trailingslashit( esc_url ( get_template_directory_uri() ) ) . '/style.css', esc_attr( $sparkeducation_version ) );

    /**
     * Load Animate CSS Library File
    */
    wp_enqueue_style( 'educenter-parent-responsive', trailingslashit( esc_url ( get_template_directory_uri() ) ) . '/assets/css/responsive.css', esc_attr( $sparkeducation_version ) );

    wp_enqueue_style( 'sparkeducation-style', get_stylesheet_uri(), esc_attr( $sparkeducation_version ) );

    if ( has_header_image() ) {
        $custom_css = '.ed-breadcrumb{ background-image: url("' . esc_url( get_header_image() ) . '"); background-repeat: no-repeat; background-position: center center; background-size: cover; background-attachment: fixed; }';
        wp_add_inline_style( 'sparkeducation-style', $custom_css );
    }

    
    if ( is_rtl() ) {
        wp_enqueue_style('educenter-parent-rtl', get_template_directory_uri() .'/rtl.css');
    }

    /**
     * Load Custom Themes JavaScript Library File
    */
    wp_enqueue_script( 'sparkeducation-custom', trailingslashit( esc_url ( get_stylesheet_directory_uri()  ) ). '/assets/js/custom.js', array('jquery', 'jquery-ui-accordion'), '20151215', true );
}

/**
 * Footer Widget Function Area
*/
if ( ! function_exists( 'sparkeducation_footer_widget_area' ) ) {

    function sparkeducation_footer_widget_area(){ ?>
            
            <div class="top-footer layout-1">
                
                <?php if ( is_active_sidebar( 'footer-1' ) ) {  dynamic_sidebar( 'footer-1' );  } ?>
                    
            </div>

        <?php 
    }
}
add_action( 'sparkeducation_footer_widget', 'sparkeducation_footer_widget_area', 9 );

add_filter('educenter_starter_content_theme_mods', function( $modes ){
    $modes['educenter_slider_options'] = 'disable';
    $modes['educenter_primary_color'] = '#F5812D';
    
    return $modes;
});


add_filter('educenter_dynamic_css', function($dynamic_css){
    wp_add_inline_style( 'educenter-parent-style', $dynamic_css);
    return $dynamic_css;
},10, 1);


add_filter( 'educenter_block_pattern_categories', function( $category ){
    $category['sparkedu'] = array( 'label' => __( 'SparkEducation', 'sparkeducation' ) );
    return $category;
}, 20, 1 );

add_filter( 'educenter-pro-link', function(){
    return 'https://sparklewpthemes.com/wordpress-themes/sparkeducation-free-lms-education-theme/';
}, 100);

add_filter( 'educenter_primary_color', function(){
    return '#F5812D';
}, 100);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sparkeducation_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'sparkeducation' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here footer widget', 'sparkeducation' ),
		'before_widget' => '<div id="%1$s" class="widget ed-col %2$s"><div class="ed-col-wrapper">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="widget-ed-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

}
add_action( 'widgets_init', 'sparkeducation_widgets_init' );

require_once (get_stylesheet_directory(  ). '/learnpress-functions.php');
require_once (get_stylesheet_directory(  ). '/starter-content/init.php');