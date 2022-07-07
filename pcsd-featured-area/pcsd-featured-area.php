<?php
/*
  Plugin Name: PCSD Featured Area
  Description: Featured Area Controller
  Version: 0.1
  Author: Josh Espinoza
  Author URI: tech.provo.edu
*/



add_filter( 'the_content', 'featured_area_display');
function featured_area_display($content) {
    // Check if we're inside the main loop in a single Post.
    if ( is_singular() && in_the_loop() && is_main_query() ) {
        print_r(get_fields());
        return $content . esc_html__( 'I’m filtering the content inside the main loop', 'wporg');
    }
 
    return $content;
}









//Editor Fields
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_62c7098576833',
        'title' => 'Featured Area - Fields',
        'fields' => array(
            array(
                'key' => 'field_62c70c35435fc',
                'label' => 'Notes',
                'name' => '',
                'type' => 'message',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => 'Instructions for Users on the backend',
                'new_lines' => 'wpautop',
                'esc_html' => 0,
            ),
            array(
                'key' => 'field_62c70a533eb59',
                'label' => 'hide featured area on single',
                'name' => 'hide_featured_area_on_single',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'no' => 'No',
                    'yes' => 'Yes',
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'default_value' => '',
                'layout' => 'vertical',
                'return_format' => 'value',
                'save_other_choice' => 0,
            ),
            array(
                'key' => 'field_62c7099436f18',
                'label' => 'Single Featured Image',
                'name' => 'single_featured_image',
                'type' => 'image',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'preview_size' => 'large',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array(
                'key' => 'field_62c70db83c1a1',
                'label' => 'gallery/video select',
                'name' => 'gallery_video_select',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_62c70a533eb59',
                            'operator' => '!=',
                            'value' => 'yes',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'single' => 'Single Image',
                    'gallery' => 'Image Gallery',
                    'video' => 'Video',
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'default_value' => '',
                'layout' => 'vertical',
                'return_format' => 'value',
                'save_other_choice' => 0,
            ),
            array(
                'key' => 'field_62c709e49490c',
                'label' => 'Featured Gallery',
                'name' => 'featured_gallery',
                'type' => 'gallery',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_62c70db83c1a1',
                            'operator' => '==',
                            'value' => 'gallery',
                        ),
                        array(
                            'field' => 'field_62c70a533eb59',
                            'operator' => '!=',
                            'value' => 'yes',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'preview_size' => 'large',
                'insert' => 'append',
                'library' => 'all',
                'min' => 5,
                'max' => 15,
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array(
                'key' => 'field_62c70b11760d2',
                'label' => 'Featured Video',
                'name' => 'featured_video',
                'type' => 'file',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_62c70db83c1a1',
                            'operator' => '==',
                            'value' => 'video',
                        ),
                        array(
                            'field' => 'field_62c70a533eb59',
                            'operator' => '!=',
                            'value' => 'yes',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'library' => 'all',
                'min_size' => '',
                'max_size' => '',
                'mime_types' => 'mp4',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => array(
            0 => 'featured_image',
        ),
        'active' => true,
        'description' => 'test',
        'show_in_rest' => 0,
    ));
    
    endif;		