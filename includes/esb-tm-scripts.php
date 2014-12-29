<?php

/**
 * Scripts File
 * Handles to admin functionality & other functions
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Load Admin styles & scripts
 */
function esb_tm_admin_scripts(){
    
    // Load our font-awesome stylesheet.
    wp_enqueue_style( 'esb-tm-font-awesome-style', ESB_TM_URL . 'css/font-awesome.css' );

    // Load our testimonial stylesheet.
    wp_enqueue_style( 'esb-tm-testimonial-style', ESB_TM_URL . 'css/testimonial-style.css' );

    // Enqueu built-in style for color picker.
    if( wp_style_is( 'wp-color-picker', 'registered' ) ) { //since WordPress 3.5
            wp_enqueue_style( 'wp-color-picker' );
    } else {
            wp_enqueue_style( 'farbtastic' );
    }
    
    // Load our admin stylesheet.
    wp_enqueue_style( 'esb-tm-admin-style', ESB_TM_URL . 'css/admin-style.css' );
     
    // Load our jquery flexslider script.
    wp_enqueue_script( 'esb-tm-jquery-flexslider-script', ESB_TM_URL . 'js/jquery.flexslider.js' );
     				
    // Enqueu built-in script for color picker.
    if( wp_script_is( 'wp-color-picker', 'registered' ) ) { //since WordPress 3.5
            wp_enqueue_script( 'wp-color-picker' );
    } else {
            wp_enqueue_script( 'farbtastic' );
    }

    // Load our admin script.
    wp_enqueue_script( 'esb-tm-admin-script', ESB_TM_URL . 'js/admin-script.js' );
}

//add action to load scripts and styles for the back end
add_action( 'admin_enqueue_scripts', 'esb_tm_admin_scripts' );

/**
 * Load Public styles & scripts
 */
function esb_tm_public_scripts(){

    // Load our font-awesome stylesheet.
    wp_enqueue_style( 'esb-tm-font-awesome-style', ESB_TM_URL . 'css/font-awesome.css' );

    // Load our testimonial stylesheet.
    wp_enqueue_style( 'esb-tm-testimonial-style', ESB_TM_URL . 'css/testimonial-style.css' );

    // Load jQuery
    wp_enqueue_script( 'jquery' );

    // Load our jquery flexslider script.
    wp_enqueue_script( 'esb-tm-jquery-flexslider-script', ESB_TM_URL . 'js/jquery.flexslider.js' );
}

//add action to load scripts and styles for the front end
add_action( 'wp_enqueue_scripts', 'esb_tm_public_scripts' );

?>