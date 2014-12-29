<?php

/**
 * Custom Shortcodes File
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Display testimonials
 * 
 * Handles to display testimonials with slider, grid or list
 */
function esb_tm_stcd_testimonials( $atts, $content ){
    
    $atts = shortcode_atts( array(
            'category'              => '',
            'layout'                => 'slider',
            'style'                 => 'style1',
            'image_size'            => 'large_image',
            'image_radius'          => 'large_radius',
            'order_by'              => 'date',
            'order'                 => 'DESC',
            'number'                => '',
            'auto_play'             => 'true',
            'loop'                  => 'true',
            'pause_on_hover'        => 'false',
            'next_prev_visibility'  => 'true',
            'next_prev_radius'      => 'large_radius',
            'duration'              => '',
            'columns_number'        => '2',
            'border_style'          => 'dashed',
            'border_color'          => '',
            'font_style'            => 'custom',
            'text_font_family'      => '',
            'text_font_color'       => '',
            'text_font_size'        => '',
            'name_font_family'      => '',
            'name_font_color'       => '',
            'name_font_size'        => '',
            'position_font_family'  => '',
            'position_font_color'   => '',
            'position_font_size'    => '',
    ), $atts );
    
    extract( $atts );
    
    $number         = !empty( $number ) ? $number : '-1';
    $duration       = !empty( $duration ) ? $duration : '5000';
    $border_color   = !empty( $border_color ) ? $border_color : '#dddddd';
    $columns_number = !empty( $columns_number ) ? $columns_number : '2';        
    
    global $post;

    $prefix = ESB_TM_META_PREFIX;

    ob_start();
    
    $reqtestimonialargs = array(
                                    'post_type'     => ESB_TM_POST_TYPE,
                                    'post_status'   => 'publish',
                                    'posts_per_page'=> $number,
                                    'orderby'       => $order_by,
                                    'order'         => $order
                                );

    if( !empty( $category ) ) {
        
        $reqtestimonialargs['tax_query'] = array(
                                                    array(
                                                            'taxonomy' => ESB_TM_POST_TAXONOMY,
                                                            'field'    => 'term_id',
                                                            'terms'    => $category,
                                                        )
                                                );
    }
    
    //fire query in to table for retriving data
    $reqtestimonials_query = new WP_Query( $reqtestimonialargs );

    if ( $reqtestimonials_query->have_posts() ) { 
        $public_class = !is_admin() ? ' esb-tm-public ' : '';
    ?>
        <div class="esb-tm-testimonials-wrap">
            <div class="<?php echo $public_class ?> <?php echo $layout ?> <?php echo $style ?> <?php echo $image_size ?> <?php echo $image_radius ?> <?php echo 'slidernav_' . $next_prev_radius ?> <?php echo 'column_' . $columns_number ?>">
                <ul class="slides">
    <?php
        $i = 1;
        while ( $reqtestimonials_query->have_posts() ) {
            $reqtestimonials_query->the_post();

                $post_id = $post->ID;
                $image_url = wp_get_attachment_thumb_url( get_post_thumbnail_id( $post_id ) );

                $testi_img_html = '<img src="'. $image_url .'" alt="" />';

                $position = get_post_meta( $post_id, $prefix . 'position', true );
                
                $alternate_class = ( $i % $columns_number == 0 ) ? ' alternate ' : '';
                $i++;
                ?>
                    <li class="esb-tm-item-wrap <?php echo $alternate_class ?>">
                        <div class="esb-tm-img">
                            <?php echo $testi_img_html ?>
                        </div>
                        <div class="esb-tm-text <?php echo $font_style ?>">
                            <?php the_content() ?>
                        </div>
                        <div class="esb-tm-name <?php echo $font_style ?>">
                            <?php the_title() ?>
                        </div>
                        <div class="esb-tm-position <?php echo $font_style ?>">
                            <?php 
                                echo $position;
                                $company = esb_tm_get_company_link_html( $post_id );
                                echo !empty( $company ) ? ' / ' . $company : '';
                            ?>
                        </div>
                    </li>
                <?php
        }
    ?>
                </ul><!-- .slides -->
            </div>
        </div><!-- .esb-tm-testimonials-wrap -->
        <div class="clear"></div>
        
        <style type="text/css">
            .esb-tm-text.custom, .esb-tm-text.custom p {
                font-family: <?php echo $text_font_family ?>;
                color: <?php echo $text_font_color ?>;
                font-size: <?php echo $text_font_size ?>px;
            }
            .esb-tm-name.custom {
                font-family: <?php echo $name_font_family ?>;
                color: <?php echo $name_font_color ?>;
                font-size: <?php echo $name_font_size ?>px;
            }
            .esb-tm-position.custom, .esb-tm-position.custom a {
                font-family: <?php echo $position_font_family ?>;
                color: <?php echo $position_font_color ?>;
                font-size: <?php echo $position_font_size ?>px;
            }
            .esb-tm-testimonials-wrap .esb-tm-item-wrap {
                <?php if( empty( $border_style ) || $border_style == 'no_border' ) { ?>
                    border: none;
                <?php } else { ?>
                    border: none;
                    border-bottom-width: 1px;
                    border-bottom-style: <?php echo $border_style ?>;
                    border-bottom-color: <?php echo $border_color ?>;
                <?php } ?>
            }
            .esb-tm-testimonials-wrap .grid .esb-tm-item-wrap {
                <?php if( empty( $border_style ) || $border_style == 'no_border' ) { ?>
                    border: none;
                <?php } else { ?>
                    border: none;
                    border-right-width: 1px;
                    border-right-style: <?php echo $border_style ?>;
                    border-right-color: <?php echo $border_color ?>;
                <?php } ?>
            }
            @media (min-width:30px) and (max-width: 450px){
                .esb-tm-testimonials-wrap .grid .esb-tm-item-wrap {
                    <?php if( empty( $border_style ) || $border_style == 'no_border' ) { ?>
                        border: none;
                    <?php } else { ?>
                        border: none;
                        border-bottom-width: 1px;
                        border-bottom-style: <?php echo $border_style ?>;
                        border-bottom-color: <?php echo $border_color ?>;
                    <?php } ?>
                }
                .esb-tm-testimonials-wrap .grid .esb-tm-item-wrap.alternate {
                    <?php if( empty( $border_style ) || $border_style == 'no_border' ) { ?>
                        border: none;
                    <?php } else { ?>
                        border: none;
                        border-bottom-width: 1px;
                        border-bottom-style: <?php echo $border_style ?>;
                        border-bottom-color: <?php echo $border_color ?>;
                    <?php } ?>
                }
                .esb-tm-testimonials-wrap .grid .esb-tm-item-wrap:last-child {
                    border: none;
                }
            }
        </style>
        <script type="text/javascript">
            jQuery( document ).ready( function($) {
                $('.slider').flexslider({
                    animation: "slide",
                    animationLoop: <?php echo $loop ?>,
                    pauseOnHover: <?php echo $pause_on_hover ?>,
                    directionNav: <?php echo $next_prev_visibility ?>,
                    slideshow: <?php echo $auto_play ?>,
                    controlNav: false,
                    slideshowSpeed: <?php echo $duration ?>,
                });
            });
        </script>
    <?php
        //Reset Query
        wp_reset_query();
    }
    
    return ob_get_clean();
}

//add shortcode for display testimonials
add_shortcode( 'esb_tm_stcd', 'esb_tm_stcd_testimonials' );

?>