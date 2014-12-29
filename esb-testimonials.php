<?php
/*
Plugin Name: ESB Testimonials
Plugin URI: https://wordpress.org/plugins/esb-testimonials/
Description: Display testimonials with slider, grid or list view used with dynamic shortcode.
Version: 1.0.0
Author: Henry
Author URI: http://esparkinfo.com/
*/

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

if( !defined( 'ESB_TM_DIR' ) ) {
    define('ESB_TM_DIR', dirname( __FILE__ ) ); // plugin dir
}
if( !defined( 'ESB_TM_URL' ) ) {
    define('ESB_TM_URL', plugin_dir_url( __FILE__ ) ); // plugin url
}
if( !defined( 'ESB_TM_ADMIN_DIR' ) ) {
    define('ESB_TM_ADMIN_DIR', ESB_TM_DIR . '/includes/admin' ); // plugin admin dir
}
if( !defined( 'ESB_TM_META_PREFIX' ) ) {
    define( 'ESB_TM_META_PREFIX', '_esb_tm_' ); // meta box prefix
}
if( !defined('ESB_TM_POST_TYPE' ) ) {
    define('ESB_TM_POST_TYPE', 'esb_testimonials' ); // custom post type's slug
}
if( !defined('ESB_TM_POST_TAXONOMY' ) ) {
    define('ESB_TM_POST_TAXONOMY', 'esbtestimonials' ); // custom post taxonomy's slug
}
if( !defined('ESB_TM_BASENAME') ){
    define('ESB_TM_BASENAME', 'esb-testimonials');  // plugin base name
}
//include post type file
include ESB_TM_DIR . '/includes/esb-tm-post-types.php';

/**
 * Load Text Domain
 *
 * This gets the plugin ready for translation.
 */

function esb_tm_load_textdomain() {

  load_plugin_textdomain( 'esbtm', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

}
add_action( 'init', 'esb_tm_load_textdomain' ); 

/**
 * Activation Hook
 *
 * Register plugin activation hook.
 */
register_activation_hook( __FILE__, 'esb_tm_install' );

/**
 * Deactivation Hook
 *
 * Register plugin deactivation hook.
 */
register_deactivation_hook( __FILE__, 'esb_tm_uninstall');

/**
 * Plugin Setup (On Activation)
 *
 * Does the initial setup,
 * stest default values for the plugin options.
 */
function esb_tm_install() {
    
    global $user_ID;
    
    //register custom post type
    esb_tm_register_post_type();

    //IMP Call of Function
    //Need to call when custom post type is being used in plugin
    flush_rewrite_rules();

    //get option for when plugin is activating first time
    $esb_tm_set_option = get_option( 'esb_tm_set_option' );

    if( empty( $esb_tm_set_option ) ) { //check plugin version option

        $esb_tm_options = array();
        
        //update plugin options
        update_option( 'esb_tm_options', $esb_tm_options );
        
        //update plugin version to option 
        update_option( 'esb_tm_set_option', '1.0' );
    }
}

/**
 * Plugin Setup (On Deactivation)
 *
 * Delete plugin options.
 */
function esb_tm_uninstall() {
    
    //register custom post type
    esb_tm_register_post_type();

    //IMP Call of Function
    //Need to call when custom post type is being used in plugin
    flush_rewrite_rules();
    
}

global $esb_tm_options;
$esb_tm_options = get_option( 'esb_tm_options' );

//include model file
include ESB_TM_DIR . '/includes/esb-tm-model.php';

//include scripts file
include ESB_TM_DIR . '/includes/esb-tm-scripts.php';

//include shortcode file
include ESB_TM_DIR . '/includes/esb-tm-shortcode.php';

//include admin file
include ESB_TM_ADMIN_DIR . '/esb-tm-admin.php';

?>