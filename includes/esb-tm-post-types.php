<?php

/**
 * Custom Post Types & Taxonomies File
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Register custom post type.
 */
function esb_tm_register_post_type() {
    
    $labels = array(
            'name'               => _x( 'Testimonials', 'esb_testimonial', 'esbtm' ),
            'singular_name'      => _x( 'Testimonial', 'esb_testimonial', 'esbtm' ),
            'menu_name'          => _x( 'Testimonials', 'esb_testimonial', 'esbtm' ),
            'name_admin_bar'     => _x( 'Testimonial', 'esb_testimonial', 'esbtm' ),
            'add_new'            => _x( 'Add New', 'esb_testimonial', 'esbtm' ),
            'add_new_item'       => __( 'Add New Testimonial', 'esbtm' ),
            'new_item'           => __( 'New Testimonial', 'esbtm' ),
            'edit_item'          => __( 'Edit Testimonial', 'esbtm' ),
            'view_item'          => __( 'View Testimonial', 'esbtm' ),
            'all_items'          => __( 'All Testimonials', 'esbtm' ),
            'search_items'       => __( 'Search Testimonial', 'esbtm' ),
            'parent_item_colon'  => __( 'Parent Testimonial:', 'esbtm' ),
            'not_found'          => __( 'No testimonial found.', 'esbtm' ),
            'not_found_in_trash' => __( 'No testimonial found in Trash.', 'esbtm' ),
    );

    $args = array(
            'labels'             => $labels,
            'public'             => false,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => false,
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor', 'thumbnail', 'author', 'page-attributes' ),
    );

    register_post_type( ESB_TM_POST_TYPE, $args );
     
}

/**
 * Register Custom Taxonomies
 */
function esb_tm_register_taxonomies() {
    
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
            'name' 		=> _x( 'Categories', 'taxonomy general name', 'esbtm'),
            'singular_name' 	=> _x( 'Category', 'taxonomy singular name','esbtm' ),
            'search_items'	=> __( 'Search Categories','esbtm' ),
            'all_items'		=> __( 'All Categories','esbtm' ),
            'parent_item'	=> __( 'Parent Category','esbtm' ),
            'parent_item_colon' => __( 'Parent Category:','esbtm' ),
            'edit_item' 	=> __( 'Edit Category' ,'esbtm'), 
            'update_item' 	=> __( 'Update Category' ,'esbtm'),
            'add_new_item' 	=> __( 'Add New Category' ,'esbtm'),
            'new_item_name' 	=> __( 'New Category Name' ,'esbtm'),
            'menu_name' 	=> __( 'Categories' ,'esbtm')
          );

    $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => false
    );
	
    register_taxonomy( ESB_TM_POST_TAXONOMY, ESB_TM_POST_TYPE, $args );	
}

//add action to create custom post type
add_action( 'init', 'esb_tm_register_post_type' );

//add action to create custom taxonomies
add_action( 'init', 'esb_tm_register_taxonomies' );

?>