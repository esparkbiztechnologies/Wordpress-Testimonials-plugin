<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

global $post;

$prefix = ESB_TM_META_PREFIX;

$post_id = $post->ID;

$position           = get_post_meta( $post_id, $prefix . 'position', true );
$position           = !empty( $position ) ? esb_tm_escape_attr( $position ) : '';

$company_name       = get_post_meta( $post_id, $prefix . 'company_name', true );
$company_name       = !empty( $company_name ) ? esb_tm_escape_attr( $company_name ) : '';

$company_link       = get_post_meta( $post_id, $prefix . 'company_link', true );
$company_link       = !empty( $company_link ) ? esb_tm_escape_attr( $company_link ) : '';

$company_link_target= get_post_meta( $post_id, $prefix . 'company_link_target', true );

?>
<table class="form-table esb-tm-form-table">
    
    <tr>
        <td>
            <label for="<?php echo $prefix ?>position"><?php _e( 'Position', 'esbtm' ) ?></label>
        </td>
        <td>
            <input type="text" name="<?php echo $prefix ?>position" id="<?php echo $prefix ?>position" class="regular-text" value="<?php echo $position; ?>" />
        </td>
    </tr>
    <tr>
        <td>
            <label for="<?php echo $prefix ?>company_name"><?php _e( 'Company Name', 'esbtm' ) ?></label>
        </td>
        <td>
            <input type="text" name="<?php echo $prefix ?>company_name" id="<?php echo $prefix ?>company_name" class="regular-text" value="<?php echo $company_name; ?>" />
        </td>
    </tr>
    <tr>
        <td>
            <label for="<?php echo $prefix ?>company_link"><?php _e( 'Company Website', 'esbtm' ) ?></label>
        </td>
        <td>
            <input type="text" name="<?php echo $prefix ?>company_link" id="<?php echo $prefix ?>company_link" class="regular-text" value="<?php echo $company_link; ?>" />
        </td>
    </tr>
    <tr>
        <td>
            <label for="<?php echo $prefix ?>company_link_target"><?php _e( 'Company Link Target', 'esbtm' ) ?></label>
        </td>
        <td>
            <select name="<?php echo $prefix ?>company_link_target" id="<?php echo $prefix ?>company_link_target">
                <option value="_blank" <?php selected( $company_link_target, '_blank' ) ?>><?php _e( '_Blank', 'esbtm' ) ?></option>
                <option value="_self" <?php selected( $company_link_target, '_self' ) ?>><?php _e( '_Self', 'esbtm' ) ?></option>
            </select>
        </td>
    </tr>
    
</table>