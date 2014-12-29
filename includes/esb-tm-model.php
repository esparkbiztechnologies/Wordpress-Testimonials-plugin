<?php

/**
 * Model File
 * Handles to database functionality & other functions
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
* Escape Attr
*/
function esb_tm_escape_attr($data){

    if( !empty( $data ) ) {
        $data = esc_attr(stripslashes_deep($data));
    }
    return $data;
}

/**
* Strip Slashes From Array
*/
function esb_tm_escape_slashes_deep($data = array(),$flag=true){

    if($flag != true) {
            $data = esb_tm_nohtml_kses($data);
    }
    $data = stripslashes_deep($data);
    return $data;
}

/**
* Strip Html Tags 
* 
* It will sanitize text input (strip html tags, and escape characters)
*/
function esb_tm_nohtml_kses($data = array()) {

    if ( is_array($data) ) {

            $data = array_map(array($this,'esb_tm_nohtml_kses'), $data);

    } elseif ( is_string( $data ) ) {

            $data = wp_filter_nohtml_kses($data);
    }

    return $data;
}

/**
 * Convert Object To Array
 */
function esb_tm_object_to_array($result) {

    $array = array();
    foreach ($result as $key=>$value)
    {	
        if (is_object($value)) {
            $array[$key]=esb_tm_object_to_array($value);
        } else {
            $array[$key]=$value;
        }
    }
    return $array;
}

/**
 * Display Short Content
 */
function esb_tm_excerpt( $content ) {
    
    $text = strip_shortcodes( $content );
    $text = str_replace(']]>', ']]&gt;', $text);
    $text = strip_tags($text);
    $excerpt_length = apply_filters('excerpt_length', 10);
    $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
    $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
    if ( count($words) > $excerpt_length ) {
         array_pop($words);
         $text = implode(' ', $words);
         $text = $text . $excerpt_more;
     } else {
         $text = implode(' ', $words);
     }        
     return $text;
}

/**
 * Display Company Link
 */
function esb_tm_get_company_link_html( $post_id ) {
    
    $prefix = ESB_TM_META_PREFIX;

    $company_name       = get_post_meta( $post_id, $prefix . 'company_name', true );
    $company_link       = get_post_meta( $post_id, $prefix . 'company_link', true );
    $company_link_target= get_post_meta( $post_id, $prefix . 'company_link_target', true );

    $link_html = '';
    if( !empty( $company_name ) ) { // check company name is not empty

        if( !empty( $company_link ) ) {
            $target_attr = '';
            if( !empty( $company_link_target ) ) {
                $target_attr = 'target="'.$company_link_target.'"';
            }
            $link_html .= '<a '. $target_attr .' href="'.$company_link.'">';
        }
        if( !empty( $company_name ) ) {
            $link_html .= $company_name;
        }
        if( !empty( $company_link ) ) {
            $link_html .= '</a>';
        }
    }
    return $link_html;
}
?>