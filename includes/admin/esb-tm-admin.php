<?php

/**
 * Admin File
 * Handles to admin functionality & other functions
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Custom Meta box for post type.
 */
function esb_tm_meta_box() {

    add_meta_box( 'esb_tm_testimonial_meta', __( 'Testimonial Options', 'esbtm' ), 'esb_tm_testimonial_meta_options_page', ESB_TM_POST_TYPE, 'normal', 'high' );
    
}

/**
 * Testimonial Meta Options
 */
function esb_tm_testimonial_meta_options_page(){
    
    include ESB_TM_DIR . '/includes/admin/views/esb-tm-testimonial-meta.php';
}

/**
 * Save Meta for post type.
 */
function esb_tm_save_meta( $post_id ) {
    
    $prefix = ESB_TM_META_PREFIX;
    
    /* Save Meta For Testimonial Post Type */
    if(isset( $_POST['post_type'] ) && $_POST['post_type'] == ESB_TM_POST_TYPE ) {
        
        if( isset( $_POST[$prefix.'position'] ) ) {
            update_post_meta( $post_id, $prefix.'position', esb_tm_escape_slashes_deep( $_POST[$prefix.'position'] ) );
        }
        if( isset( $_POST[$prefix.'company_name'] ) ) {
            update_post_meta( $post_id, $prefix.'company_name', esb_tm_escape_slashes_deep( $_POST[$prefix.'company_name'] ) );
        }
        if( isset( $_POST[$prefix.'company_link'] ) ) {
            update_post_meta( $post_id, $prefix.'company_link', esb_tm_escape_slashes_deep( $_POST[$prefix.'company_link'] ) );
        }
        if( isset( $_POST[$prefix.'company_link_target'] ) ) {
            update_post_meta( $post_id, $prefix.'company_link_target', esb_tm_escape_slashes_deep( $_POST[$prefix.'company_link_target'] ) );
        }
    }
}

/**
 * Custom column
 *
 * Handles the custom columns
 */
function esb_tm_manage_custom_column( $column_name, $post_id ) {

    global $wpdb,$post;

    $prefix = ESB_TM_META_PREFIX;

    $post_data = get_post( $post_id );
    
    switch ($column_name) {

        case 'image' :
                            $post_thumbnail_id = get_post_thumbnail_id( $post_id );
                            echo !empty( $post_thumbnail_id ) ? '<img src="' . wp_get_attachment_thumb_url( $post_thumbnail_id ) . '" width="80" />' : '';
                            break;
        case 'order' :
                            echo isset( $post_data->menu_order ) ? $post_data->menu_order : 0;
                            break;
        case 'position' :
                            $position   = get_post_meta( $post_id, $prefix . 'position', true );
                            echo $position;
                            break;
        case 'text' :
                            echo isset( $post_data->post_content ) ? esb_tm_excerpt( $post_data->post_content ) : '';
                            break;
        case 'company' :
                            echo esb_tm_get_company_link_html( $post_id );
                            break;

    }
}

/**
 * Add New Column
 */
function add_new_esb_tm_columns($new_columns) {

    unset($new_columns['title']);
    unset($new_columns['author']);
    unset($new_columns['taxonomy-'.ESB_TM_POST_TAXONOMY]);
    unset($new_columns['date']);

    $new_columns['image']   = __('Image','esbtm');
    $new_columns['title']   = _x('Title','column name','esbtm');
    $new_columns['order']   = __('Order','esbtm');
    $new_columns['position']= __('Position','esbtm');
    $new_columns['company'] = __('Company','esbtm');
    $new_columns['text']    = __('Testimonial Text','esbtm');
    $new_columns['author']  = _x('Author','column name','esbtm');
    $new_columns['taxonomy-'.ESB_TM_POST_TAXONOMY]  = _x('Categories','column name','esbtm');
    $new_columns['date']    = _x('Date','column name','esbtm');

    return $new_columns;
}

/**
 * Add Custom admin menu
 */
function esb_tm_add_custom_admin_menu() {
    
    add_submenu_page( 'edit.php?post_type=' . ESB_TM_POST_TYPE, __( 'Generate Shortcode', 'esbtm' ), __( 'Generate Shortcode', 'esbtm' ), 'manage_options', 'esb_tm_gen_stcd', 'esb_tm_generate_shortcode' );
}

/**
 * Include generate shortcode file
 */
function esb_tm_generate_shortcode() {
    
    include ESB_TM_ADMIN_DIR . '/views/esb-tm-generate-shortcode.php';
}

/**
 * Display Shortcode Content using AJAX
 */
function esb_tm_display_shortcode() {
    
    ob_start();
    if( !empty( $_POST['stcd_str'] ) ) {
        
        //display shortcode
        $stcd_str = stripslashes( trim( $_POST['stcd_str'] ) );
        echo do_shortcode( $stcd_str );
    }
    echo ob_get_clean();
    exit;
}

//add action to create custom meta box
add_action( 'admin_init', 'esb_tm_meta_box' );

//add action to save custom meta
add_action( 'save_post', 'esb_tm_save_meta' );

//add new field to post listing page
add_action( 'manage_'.ESB_TM_POST_TYPE.'_posts_custom_column', 'esb_tm_manage_custom_column', 10, 2 );
add_filter( 'manage_edit-'.ESB_TM_POST_TYPE.'_columns', 'add_new_esb_tm_columns' );

//add action to add custom admin menu
add_action( 'admin_menu', 'esb_tm_add_custom_admin_menu' );

//add action to display shortcode using AJAX
add_action( 'wp_ajax_esb_tm_display_shortcode', 'esb_tm_display_shortcode' );
add_action( 'wp_ajax_nopriv_esb_tm_display_shortcode', 'esb_tm_display_shortcode' );
?>