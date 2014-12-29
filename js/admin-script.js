/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery( document ).ready( function($) {
   
    //generate shortcode
    esb_tm_generate_shortcode();

    //manage layout options
    esb_tm_manage_layout_options();
    
    //manage font style options
    esb_tm_manage_font_style_options();

    $( document ).on( 'change', '#esb_tm_layout', function() {

        //manage layout options
        esb_tm_manage_layout_options();

    });

    $( document ).on( 'change', '#esb_tm_font_style', function() {

        //manage font style options
        esb_tm_manage_font_style_options();

    });

    $( document ).on( 'change', '.esb-tm-select', function() {

       //generate shortcode
       esb_tm_generate_shortcode();

    });

    $( document ).on( 'blur', '.esb-tm-input-text', function() {

       //generate shortcode
       esb_tm_generate_shortcode();

    });
    

    $( document ).on( 'click', '.esb-tm-view-color-btn', function() {

       //generate shortcode
       esb_tm_generate_shortcode();

    });
    
    //set colorpicker
    if( $( '.esb-tm-color-picker-text' ).length > 0 ) {
        $( '.esb-tm-color-picker-text' ).wpColorPicker();
    }
});

/**
 * manage layout options
 */
function esb_tm_manage_layout_options() {
    
    var layout = jQuery( '#esb_tm_layout' ).val();
    
    jQuery( '.esb-tm-option-slider-opt' ).addClass( 'esb-tm-display-none' );
    jQuery( '.esb-tm-option-grid-opt' ).addClass( 'esb-tm-display-none' );
    jQuery( '.esb-tm-option-list-opt' ).addClass( 'esb-tm-display-none' );
    jQuery( '.esb-tm-option-grid-list-opt' ).addClass( 'esb-tm-display-none' );

    if( layout == 'slider' ) {
        jQuery( '.esb-tm-option-slider-opt' ).removeClass( 'esb-tm-display-none' );
    } else if( layout == 'grid' ) {
        jQuery( '.esb-tm-option-grid-opt' ).removeClass( 'esb-tm-display-none' );
        jQuery( '.esb-tm-option-grid-list-opt' ).removeClass( 'esb-tm-display-none' );
    } else if( layout == 'list' ) {
        jQuery( '.esb-tm-option-list-opt' ).removeClass( 'esb-tm-display-none' );
        jQuery( '.esb-tm-option-grid-list-opt' ).removeClass( 'esb-tm-display-none' );
    }
}

/**
 * manage font style options
 */
function esb_tm_manage_font_style_options() {
    
    var font_style = jQuery( '#esb_tm_font_style' ).val();
    
    if( font_style == 'custom' ) {
        jQuery( '.esb-tm-option-font-style-opt' ).removeClass( 'esb-tm-display-none' );
    } else {
        jQuery( '.esb-tm-option-font-style-opt' ).addClass( 'esb-tm-display-none' );
    }
}

/**
 * Generate Shortcode
 */
function esb_tm_generate_shortcode() {
    
    var layout = jQuery( '#esb_tm_layout' ).val();
    
    var font_style = jQuery( '#esb_tm_font_style' ).val();
    
    var category = jQuery( '#esb_tm_category' ).val();
    category = ( category != '' && category != 'undefined' ) ? category : '';
    
    var layout = jQuery( '#esb_tm_layout' ).val();
    layout = ( layout != '' && layout != 'undefined' ) ? layout : '';
    
    var style = jQuery( '#esb_tm_style' ).val();
    style = ( style != '' && style != 'undefined' ) ? style : '';
    
    var image_size = jQuery( '#esb_tm_image_size' ).val();
    image_size = ( image_size != '' && image_size != 'undefined' ) ? image_size : '';
    
    var image_radius = jQuery( '#esb_tm_image_radius' ).val();
    image_radius = ( image_radius != '' && image_radius != 'undefined' ) ? image_radius : '';
    
    var order_by = jQuery( '#esb_tm_order_by' ).val();
    order_by = ( order_by != '' && order_by != 'undefined' ) ? order_by : '';
    
    var order = jQuery( '#esb_tm_order' ).val();
    order = ( order != '' && order != 'undefined' ) ? order : '';
    
    var number = jQuery( '#esb_tm_number' ).val();
    number = ( number != '' && number != 'undefined' ) ? number : '';
    
    var auto_play = jQuery( '#esb_tm_auto_play' ).val();
    auto_play = ( auto_play != '' && auto_play != 'undefined' ) ? auto_play : '';

    var loop = jQuery( '#esb_tm_loop' ).val();
    loop = ( loop != '' && loop != 'undefined' ) ? loop : '';

    var pause_on_hover = jQuery( '#esb_tm_pause_on_hover' ).val();
    pause_on_hover = ( pause_on_hover != '' && pause_on_hover != 'undefined' ) ? pause_on_hover : '';

    var next_prev_visibility = jQuery( '#esb_tm_next_prev_visibility' ).val();
    next_prev_visibility = ( next_prev_visibility != '' && next_prev_visibility != 'undefined' ) ? next_prev_visibility : '';

    var next_prev_radius = jQuery( '#esb_tm_next_prev_radius' ).val();
    next_prev_radius = ( next_prev_radius != '' && next_prev_radius != 'undefined' ) ? next_prev_radius : '';

    var duration = jQuery( '#esb_tm_duration' ).val();
    duration = ( duration != '' && duration != 'undefined' ) ? duration : '';

    var columns_number = jQuery( '#esb_tm_columns_number' ).val();
    columns_number = ( columns_number != '' && columns_number != 'undefined' ) ? columns_number : '';

    var border_style = jQuery( '#esb_tm_border_style' ).val();
    border_style = ( border_style != '' && border_style != 'undefined' ) ? border_style : '';

    var border_color = jQuery( '#esb_tm_border_color' ).val();
    border_color = ( border_color != '' && border_color != 'undefined' ) ? border_color : '';

    var text_font_family = jQuery( '#esb_tm_text_font_family' ).val();
    text_font_family = ( text_font_family != '' && text_font_family != 'undefined' ) ? text_font_family : '';

    var text_font_color = jQuery( '#esb_tm_text_font_color' ).val();
    text_font_color = ( text_font_color != '' && text_font_color != 'undefined' ) ? text_font_color : '';

    var text_font_size = jQuery( '#esb_tm_text_font_size' ).val();
    text_font_size = ( text_font_size != '' && text_font_size != 'undefined' ) ? text_font_size : '';

    var name_font_family = jQuery( '#esb_tm_name_font_family' ).val();
    name_font_family = ( name_font_family != '' && name_font_family != 'undefined' ) ? name_font_family : '';

    var name_font_color = jQuery( '#esb_tm_name_font_color' ).val();
    name_font_color = ( name_font_color != '' && name_font_color != 'undefined' ) ? name_font_color : '';

    var name_font_size = jQuery( '#esb_tm_name_font_size' ).val();
    name_font_size = ( name_font_size != '' && name_font_size != 'undefined' ) ? name_font_size : '';

    var position_font_family = jQuery( '#esb_tm_position_font_family' ).val();
    position_font_family = ( position_font_family != '' && position_font_family != 'undefined' ) ? position_font_family : '';

    var position_font_color = jQuery( '#esb_tm_position_font_color' ).val();
    position_font_color = ( position_font_color != '' && position_font_color != 'undefined' ) ? position_font_color : '';

    var position_font_size = jQuery( '#esb_tm_position_font_size' ).val();
    position_font_size = ( position_font_size != '' && position_font_size != 'undefined' ) ? position_font_size : '';


    var stcd_str = '[esb_tm_stcd';
    
    stcd_str += ' category="'+category+'"';
    stcd_str += ' layout="'+layout+'"';
    stcd_str += ' style="'+style+'"';
    stcd_str += ' image_size="'+image_size+'"';
    stcd_str += ' image_radius="'+image_radius+'"';
    stcd_str += ' order_by="'+order_by+'"';
    stcd_str += ' order="'+order+'"';
    stcd_str += ' number="'+number+'"';
    
    if( layout == 'slider' ) {
        
        stcd_str += ' auto_play="'+auto_play+'"';
        stcd_str += ' loop="'+loop+'"';
        stcd_str += ' pause_on_hover="'+pause_on_hover+'"';
        stcd_str += ' next_prev_visibility="'+next_prev_visibility+'"';
        stcd_str += ' next_prev_radius="'+next_prev_radius+'"';
        stcd_str += ' duration="'+duration+'"';
        
    } else if( layout == 'grid' ) {
        
        stcd_str += ' columns_number="'+columns_number+'"';
        stcd_str += ' border_style="'+border_style+'"';
        stcd_str += ' border_color="'+border_color+'"';
        
    } else if( layout == 'list' ) {
        
        stcd_str += ' border_style="'+border_style+'"';
        stcd_str += ' border_color="'+border_color+'"';
    }
    
    stcd_str += ' font_style="'+font_style+'"';
    
    if( font_style == 'custom' ) {
        
        stcd_str += ' text_font_family="'+text_font_family+'"';
        stcd_str += ' text_font_color="'+text_font_color+'"';
        stcd_str += ' text_font_size="'+text_font_size+'"';
        stcd_str += ' name_font_family="'+name_font_family+'"';
        stcd_str += ' name_font_color="'+name_font_color+'"';
        stcd_str += ' name_font_size="'+name_font_size+'"';
        stcd_str += ' position_font_family="'+position_font_family+'"';
        stcd_str += ' position_font_color="'+position_font_color+'"';
        stcd_str += ' position_font_size="'+position_font_size+'"';
    }
    
    stcd_str += ']';
    
    jQuery( '.esb-tm-gen-stcd-content' ).html( stcd_str );
    
    var data = {
                    action  : 'esb_tm_display_shortcode',
                    stcd_str: stcd_str
                };
    jQuery.post( ajaxurl, data, function(response) {
        
        jQuery( '.esb-tm-display-shortcode' ).html( response );
    });
}