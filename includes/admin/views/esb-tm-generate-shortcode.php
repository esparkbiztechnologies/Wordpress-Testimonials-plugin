<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

?>
<div class="wrap">
    
    <h2><?php _e( 'Generate Shortcode', 'esbtm' ) ?></h2>
    <hr>
    
    <div class="esb-tm-gen-stcd-sidebar">
        
        <div class="esb-tm-option-wrap">
            <?php $categories = get_terms( ESB_TM_POST_TAXONOMY, array( 'hide_empty' => 0 ) ); ?>
            <label for="esb_tm_category"><?php _e( 'Category Name', 'esbtm' ) ?></label>
            <select class="esb-tm-select" id="esb_tm_category" name="esb_tm_category">
                <option value=""><?php _e( 'All Categories', 'esbtm' ) ?></option>
                <?php
                    if( !empty( $categories ) && !is_wp_error( $categories ) ) {
                        foreach ( $categories as $term ) {
                            echo '<option value="'.$term->term_id.'">'.$term->name.'&nbsp;('.$term->count.')</option>';
                        }
                    }
                ?>
            </select>
        </div>
        
        <div class="esb-tm-option-wrap">
            <label for="esb_tm_layout"><?php _e( 'Layout', 'esbtm' ) ?></label>
            <select class="esb-tm-select" id="esb_tm_layout" name="esb_tm_layout">
                <option value="slider"><?php _e( 'Slider', 'esbtm' ) ?></option>
                <option value="grid"><?php _e( 'Grid', 'esbtm' ) ?></option>
                <option value="list"><?php _e( 'List', 'esbtm' ) ?></option>
            </select>
        </div>
        
        <div class="esb-tm-option-wrap">
            <label for="esb_tm_style"><?php _e( 'Item Style', 'esbtm' ) ?></label>
            <select class="esb-tm-select" id="esb_tm_style" name="esb_tm_style">
                <option value="style1"><?php _e( 'Style 1', 'esbtm' ) ?></option>
                <option value="style2"><?php _e( 'Style 2', 'esbtm' ) ?></option>
                <option value="style3"><?php _e( 'Style 3', 'esbtm' ) ?></option>
                <option value="style4"><?php _e( 'Style 4', 'esbtm' ) ?></option>
                <option value="style5"><?php _e( 'Style 5', 'esbtm' ) ?></option>
            </select>
        </div>
        
        <div class="esb-tm-option-wrap">
            <label for="esb_tm_image_size"><?php _e( 'Image Size', 'esbtm' ) ?></label>
            <select class="esb-tm-select" id="esb_tm_image_size" name="esb_tm_image_size">
                <option value="large_image"><?php _e( 'Large', 'esbtm' ) ?></option>
                <option value="medium_image"><?php _e( 'Medium', 'esbtm' ) ?></option>
                <option value="small_image"><?php _e( 'Small', 'esbtm' ) ?></option>
                <option value="no_image"><?php _e( 'Without Image', 'esbtm' ) ?></option>
            </select>
        </div>
        
        <div class="esb-tm-option-wrap">
            <label for="esb_tm_image_radius"><?php _e( 'Image Radius', 'esbtm' ) ?></label>
            <select class="esb-tm-select" id="esb_tm_image_radius" name="esb_tm_image_radius">
                <option value="large_radius"><?php _e( 'Large Radius', 'esbtm' ) ?></option>
                <option value="medium_radius"><?php _e( 'Medium Radius', 'esbtm' ) ?></option>
                <option value="small_radius"><?php _e( 'Small Radius', 'esbtm' ) ?></option>
                <option value="no_radius"><?php _e( 'Without Radius', 'esbtm' ) ?></option>
            </select>
        </div>
        
        <div class="esb-tm-option-wrap">
            <label for="esb_tm_order_by"><?php _e( 'Order By', 'esbtm' ) ?></label>
            <select class="esb-tm-select" id="esb_tm_order_by" name="esb_tm_order_by">
                <option value="date"><?php _e( 'Publish Date', 'esbtm' ) ?></option>
                <option value="menu_order"><?php _e( 'Order', 'esbtm' ) ?></option>
                <option value="rand"><?php _e( 'Random', 'esbtm' ) ?></option>
            </select>
        </div>
        
        <div class="esb-tm-option-wrap">
            <label for="esb_tm_order"><?php _e( 'Order', 'esbtm' ) ?></label>
            <select class="esb-tm-select" id="esb_tm_order" name="esb_tm_order">
                <option value="DESC"><?php _e( 'Descending', 'esbtm' ) ?></option>
                <option value="ASC"><?php _e( 'Ascending', 'esbtm' ) ?></option>
            </select>
        </div>
        
        <div class="esb-tm-option-wrap">
            <label for="esb_tm_number"><?php _e( 'Number of items', 'esbtm' ) ?></label>
            <input class="esb-tm-input-text" type="text" id="esb_tm_number" name="esb_tm_number" placeholder="<?php _e( 'All', 'esbtm' ) ?>" />
        </div>
        
        <div class="esb-tm-option-wrap esb-tm-option-slider-opt esb-tm-display-none">
            <label for="esb_tm_auto_play"><?php _e( 'Auto Play', 'esbtm' ) ?></label>
            <select class="esb-tm-select" id="esb_tm_auto_play" name="esb_tm_auto_play">
                <option value="true"><?php _e( 'True', 'esbtm' ) ?></option>
                <option value="false"><?php _e( 'False', 'esbtm' ) ?></option>
            </select>
        </div>
        
        <div class="esb-tm-option-wrap esb-tm-option-slider-opt esb-tm-display-none">
            <label for="esb_tm_loop"><?php _e( 'Loop', 'esbtm' ) ?></label>
            <select class="esb-tm-select" id="esb_tm_loop" name="esb_tm_loop">
                <option value="true"><?php _e( 'True', 'esbtm' ) ?></option>
                <option value="false"><?php _e( 'False', 'esbtm' ) ?></option>
            </select>
        </div>
        
        <div class="esb-tm-option-wrap esb-tm-option-slider-opt esb-tm-display-none">
            <label for="esb_tm_pause_on_hover"><?php _e( 'Pause On Hover', 'esbtm' ) ?></label>
            <select class="esb-tm-select" id="esb_tm_pause_on_hover" name="esb_tm_pause_on_hover">
                <option value="false"><?php _e( 'False', 'esbtm' ) ?></option>
                <option value="true"><?php _e( 'True', 'esbtm' ) ?></option>
            </select>
        </div>
        
        <div class="esb-tm-option-wrap esb-tm-option-slider-opt esb-tm-display-none">
            <label for="esb_tm_next_prev_visibility"><?php _e( 'Slider Buttons Visibility', 'esbtm' ) ?></label>
            <select class="esb-tm-select" id="esb_tm_next_prev_visibility" name="esb_tm_next_prev_visibility">
                <option value="true"><?php _e( 'Visible', 'esbtm' ) ?></option>
                <option value="false"><?php _e( 'Hidden', 'esbtm' ) ?></option>
            </select>
        </div>
        
        <div class="esb-tm-option-wrap esb-tm-option-slider-opt esb-tm-display-none">
            <label for="esb_tm_next_prev_radius"><?php _e( 'Slider Buttons Radius', 'esbtm' ) ?></label>
            <select class="esb-tm-select" id="esb_tm_next_prev_radius" name="esb_tm_next_prev_radius">
                <option value="large_radius"><?php _e( 'Large Radius', 'esbtm' ) ?></option>
                <option value="medium_radius"><?php _e( 'Medium Radius', 'esbtm' ) ?></option>
                <option value="small_radius"><?php _e( 'Small Radius', 'esbtm' ) ?></option>
                <option value="no_radius"><?php _e( 'Without Radius', 'esbtm' ) ?></option>
            </select>
        </div>
        
        <div class="esb-tm-option-wrap esb-tm-option-slider-opt esb-tm-display-none">
            <label for="esb_tm_duration"><?php _e( 'Duration', 'esbtm' ) ?></label>
            <input class="esb-tm-input-text" type="text" id="esb_tm_duration" name="esb_tm_duration" placeholder="<?php _e( 'Seconds', 'esbtm' ) ?>" />
        </div>
        
        <div class="esb-tm-option-wrap esb-tm-option-grid-opt esb-tm-display-none">
            <label for="esb_tm_columns_number"><?php _e( 'Columns Number', 'esbtm' ) ?></label>
            <select class="esb-tm-select" id="esb_tm_columns_number" name="esb_tm_columns_number">
                <option value="2"><?php _e( '2 Columns', 'esbtm' ) ?></option>
                <option value="3"><?php _e( '3 Columns', 'esbtm' ) ?></option>
                <option value="4"><?php _e( '4 Columns', 'esbtm' ) ?></option>
            </select>
        </div>
        
        <div class="esb-tm-option-wrap esb-tm-option-grid-list-opt esb-tm-display-none">
            <label for="esb_tm_border_style"><?php _e( 'Border Style', 'esbtm' ) ?></label>
            <select class="esb-tm-select" id="esb_tm_border_style" name="esb_tm_border_style">
                <option value="dashed"><?php _e( 'Dashed', 'esbtm' ) ?></option>
                <option value="groove"><?php _e( 'Groove', 'esbtm' ) ?></option>
                <option value="ridge"><?php _e( 'Ridge', 'esbtm' ) ?></option>
                <option value="solid"><?php _e( 'Solid', 'esbtm' ) ?></option>
                <option value="no_border"><?php _e( 'Without Border', 'esbtm' ) ?></option>
            </select>
        </div>
        
        <div class="esb-tm-option-wrap esb-tm-option-grid-list-opt esb-tm-display-none">
            <label for="esb_tm_border_color"><?php _e( 'Border Color', 'esbtm' ) ?></label>
            <input class="esb-tm-color-picker-text" type="text" id="esb_tm_border_color" name="esb_tm_border_color" data-default-color="" placeholder="<?php _e( 'Color', 'esbtm' ) ?>" />
            <input class="button-primary esb-tm-view-color-btn" type="button" value="<?php _e( 'View Color', 'esbtm' ) ?>" />
        </div>
        
        <div class="esb-tm-option-wrap">
            <label for="esb_tm_font_style"><?php _e( 'Font Style', 'esbtm' ) ?></label>
            <select class="esb-tm-select" id="esb_tm_font_style" name="esb_tm_font_style">
                <option value="custom"><?php _e( 'Custom Style', 'esbtm' ) ?></option>
                <option value="default"><?php _e( 'Current Theme Style', 'esbtm' ) ?></option>
            </select>
        </div>
        
        <div class="esb-tm-option-wrap esb-tm-option-font-style-opt esb-tm-display-none">
            <label for="esb_tm_text_font_family"><?php _e( 'Text Font Family', 'esbtm' ) ?></label>
            <select class="esb-tm-select" id="esb_tm_text_font_family" name="esb_tm_text_font_family">
                <option value=""><?php _e( 'Current Theme Font', 'esbtm' ) ?></option>
                <option value="Georgia, serif"><?php _e( 'Georgia', 'esbtm' ) ?></option>
                <option value="'Palatino Linotype', 'Book Antiqua', Palatino, serif"><?php _e( 'Palatino Linotype', 'esbtm' ) ?></option>
                <option value="'Times New Roman', Times, serif"><?php _e( 'Times New Roman', 'esbtm' ) ?></option>
                <option value="Arial, Helvetica, sans-serif"><?php _e( 'Arial', 'esbtm' ) ?></option>
                <option value="'Arial Black', Gadget, sans-serif"><?php _e( 'Arial Black', 'esbtm' ) ?></option>
                <option value="'Comic Sans MS', cursive, sans-serif"><?php _e( 'Comic Sans MS', 'esbtm' ) ?></option>
                <option value="Impact, Charcoal, sans-serif"><?php _e( 'Impact', 'esbtm' ) ?></option>
                <option value="'Lucida Sans Unicode', 'Lucida Grande', sans-serif"><?php _e( 'Lucida Sans Unicode', 'esbtm' ) ?></option>
                <option value="Tahoma, Geneva, sans-serif"><?php _e( 'Tahoma', 'esbtm' ) ?></option>
                <option value="'Trebuchet MS', Helvetica, sans-serif"><?php _e( 'Trebuchet MS', 'esbtm' ) ?></option>
                <option value="Verdana, Geneva, sans-serif"><?php _e( 'Verdana', 'esbtm' ) ?></option>
                <option value="'Courier New', Courier, monospace"><?php _e( 'Courier New', 'esbtm' ) ?></option>
                <option value="'Lucida Console', Monaco, monospace"><?php _e( 'Lucida Console', 'esbtm' ) ?></option>
            </select>
        </div>
        
        <div class="esb-tm-option-wrap esb-tm-option-font-style-opt esb-tm-display-none">
            <label for="esb_tm_text_font_color"><?php _e( 'Text Font Color', 'esbtm' ) ?></label>
            <input class="esb-tm-color-picker-text" type="text" id="esb_tm_text_font_color" name="esb_tm_text_font_color" data-default-color="" placeholder="<?php _e( 'Color', 'esbtm' ) ?>" />
            <input class="button-primary esb-tm-view-color-btn" type="button" value="<?php _e( 'View Color', 'esbtm' ) ?>" />
        </div>
        
        <div class="esb-tm-option-wrap esb-tm-option-font-style-opt esb-tm-display-none">
            <label for="esb_tm_text_font_size"><?php _e( 'Text Font Size (px)', 'esbtm' ) ?></label>
            <input class="esb-tm-input-text" type="text" id="esb_tm_text_font_size" name="esb_tm_text_font_size" placeholder="<?php _e( 'Size', 'esbtm' ) ?>" />
        </div>
        
        <div class="esb-tm-option-wrap esb-tm-option-font-style-opt esb-tm-display-none">
            <label for="esb_tm_name_font_family"><?php _e( 'Name Font Family', 'esbtm' ) ?></label>
            <select class="esb-tm-select" id="esb_tm_name_font_family" name="esb_tm_name_font_family">
                <option value=""><?php _e( 'Current Theme Font', 'esbtm' ) ?></option>
                <option value="Georgia, serif"><?php _e( 'Georgia', 'esbtm' ) ?></option>
                <option value="'Palatino Linotype', 'Book Antiqua', Palatino, serif"><?php _e( 'Palatino Linotype', 'esbtm' ) ?></option>
                <option value="'Times New Roman', Times, serif"><?php _e( 'Times New Roman', 'esbtm' ) ?></option>
                <option value="Arial, Helvetica, sans-serif"><?php _e( 'Arial', 'esbtm' ) ?></option>
                <option value="'Arial Black', Gadget, sans-serif"><?php _e( 'Arial Black', 'esbtm' ) ?></option>
                <option value="'Comic Sans MS', cursive, sans-serif"><?php _e( 'Comic Sans MS', 'esbtm' ) ?></option>
                <option value="Impact, Charcoal, sans-serif"><?php _e( 'Impact', 'esbtm' ) ?></option>
                <option value="'Lucida Sans Unicode', 'Lucida Grande', sans-serif"><?php _e( 'Lucida Sans Unicode', 'esbtm' ) ?></option>
                <option value="Tahoma, Geneva, sans-serif"><?php _e( 'Tahoma', 'esbtm' ) ?></option>
                <option value="'Trebuchet MS', Helvetica, sans-serif"><?php _e( 'Trebuchet MS', 'esbtm' ) ?></option>
                <option value="Verdana, Geneva, sans-serif"><?php _e( 'Verdana', 'esbtm' ) ?></option>
                <option value="'Courier New', Courier, monospace"><?php _e( 'Courier New', 'esbtm' ) ?></option>
                <option value="'Lucida Console', Monaco, monospace"><?php _e( 'Lucida Console', 'esbtm' ) ?></option>
            </select>
        </div>
        
        <div class="esb-tm-option-wrap esb-tm-option-font-style-opt esb-tm-display-none">
            <label for="esb_tm_name_font_color"><?php _e( 'Name Font Color', 'esbtm' ) ?></label>
            <input class="esb-tm-color-picker-text" type="text" id="esb_tm_name_font_color" name="esb_tm_name_font_color" data-default-color="" placeholder="<?php _e( 'Color', 'esbtm' ) ?>" />
            <input class="button-primary esb-tm-view-color-btn" type="button" value="<?php _e( 'View Color', 'esbtm' ) ?>" />
        </div>
        
        <div class="esb-tm-option-wrap esb-tm-option-font-style-opt esb-tm-display-none">
            <label for="esb_tm_name_font_size"><?php _e( 'Name Font Size (px)', 'esbtm' ) ?></label>
            <input class="esb-tm-input-text" type="text" id="esb_tm_name_font_size" name="esb_tm_name_font_size" placeholder="<?php _e( 'Size', 'esbtm' ) ?>" />
        </div>
        
        <div class="esb-tm-option-wrap esb-tm-option-font-style-opt esb-tm-display-none">
            <label for="esb_tm_position_font_family"><?php _e( 'Position Font Family', 'esbtm' ) ?></label>
            <select class="esb-tm-select" id="esb_tm_position_font_family" name="esb_tm_position_font_family">
                <option value=""><?php _e( 'Current Theme Font', 'esbtm' ) ?></option>
                <option value="Georgia, serif"><?php _e( 'Georgia', 'esbtm' ) ?></option>
                <option value="'Palatino Linotype', 'Book Antiqua', Palatino, serif"><?php _e( 'Palatino Linotype', 'esbtm' ) ?></option>
                <option value="'Times New Roman', Times, serif"><?php _e( 'Times New Roman', 'esbtm' ) ?></option>
                <option value="Arial, Helvetica, sans-serif"><?php _e( 'Arial', 'esbtm' ) ?></option>
                <option value="'Arial Black', Gadget, sans-serif"><?php _e( 'Arial Black', 'esbtm' ) ?></option>
                <option value="'Comic Sans MS', cursive, sans-serif"><?php _e( 'Comic Sans MS', 'esbtm' ) ?></option>
                <option value="Impact, Charcoal, sans-serif"><?php _e( 'Impact', 'esbtm' ) ?></option>
                <option value="'Lucida Sans Unicode', 'Lucida Grande', sans-serif"><?php _e( 'Lucida Sans Unicode', 'esbtm' ) ?></option>
                <option value="Tahoma, Geneva, sans-serif"><?php _e( 'Tahoma', 'esbtm' ) ?></option>
                <option value="'Trebuchet MS', Helvetica, sans-serif"><?php _e( 'Trebuchet MS', 'esbtm' ) ?></option>
                <option value="Verdana, Geneva, sans-serif"><?php _e( 'Verdana', 'esbtm' ) ?></option>
                <option value="'Courier New', Courier, monospace"><?php _e( 'Courier New', 'esbtm' ) ?></option>
                <option value="'Lucida Console', Monaco, monospace"><?php _e( 'Lucida Console', 'esbtm' ) ?></option>
            </select>
        </div>
        
        <div class="esb-tm-option-wrap esb-tm-option-font-style-opt esb-tm-display-none">
            <label for="esb_tm_position_font_color"><?php _e( 'Position Font Color', 'esbtm' ) ?></label>
            <input class="esb-tm-color-picker-text" type="text" id="esb_tm_position_font_color" name="esb_tm_position_font_color" data-default-color="" placeholder="<?php _e( 'Color', 'esbtm' ) ?>" />
            <input class="button-primary esb-tm-view-color-btn" type="button" value="<?php _e( 'View Color', 'esbtm' ) ?>" />
        </div>
        
        <div class="esb-tm-option-wrap esb-tm-option-font-style-opt esb-tm-display-none">
            <label for="esb_tm_position_font_size"><?php _e( 'Position Font Size (px)', 'esbtm' ) ?></label>
            <input class="esb-tm-input-text" type="text" id="esb_tm_position_font_size" name="esb_tm_position_font_size" placeholder="<?php _e( 'Size', 'esbtm' ) ?>" />
        </div>
        
    </div><!-- .esb-tm-gen-stcd-sidebar -->
    
    <div class="esb-tm-main-content esb-tm-notice">
        <strong><?php _e( 'Note: ', 'esbtm' ) ?></strong><?php _e( 'copy the following shortcode in the yellow box to the page editor or post editor or testimonials widget to display the testimonials in the website.', 'esbtm' ) ?>
    </div><!-- .esb-tm-main-content -->
    
    <div class="esb-tm-main-content esb-tm-gen-stcd-content">
    </div><!-- .esb-tm-main-content -->
    
    <div class="esb-tm-main-content esb-tm-display-shortcode">
    </div><!-- .esb-tm-main-content -->
    
</div><!-- .wrap -->