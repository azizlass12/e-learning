<?php
/* ============ Gallery ============ */
$wp_customize->add_section(new Educenter_Toggle_Section($wp_customize, 'educenter_gallery_settings', array(
    'title' => esc_html__('Gallery Section', 'educenter'),
    'panel' => 'educenter_homepage_settings',
    'priority' => educenter_get_section_position('educenter_gallery_settings'),
    'hiding_control' => 'educenter_gallery_area_options'
)));

/**
 * Enable/Disable Option
 *
 * @since 1.0.0
*/
    $wp_customize->add_setting('educenter_gallery_area_options', array(
        'default' => 'enable',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',     //done
    ));
    $wp_customize->add_control(new Educenter_Switch_Control($wp_customize, 'educenter_gallery_area_options', array(
        'label' => esc_html__('Enable', 'educenter'),
        'section' => 'educenter_gallery_settings',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'educenter'),
            'disable' => esc_html__('No', 'educenter'),
        ),
        'class' => 'switch-section',
        'priority' => 2
    )));

    $wp_customize->add_setting('educenter_gallery_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Educenter_Custom_Control_Tab($wp_customize, 'educenter_gallery_nav', array(
        'type' => 'tab',
        'section' => 'educenter_gallery_settings',
        'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'educenter'),
                'fields' => array(
                    'educenter_gallery_title_heading',
                    'educenter_gallery_section_title',
                    'educenter_gallery_section_subtitle',
                    'educenter_gallery_section_column',
                    'educenter_gallery_section_column_gap',
                    'educenter_gallery_section_full_width',
                    'educenter_gallery_image',
                ),
                'active' => true,
            ),
            array(
                'name' => esc_html__('Style', 'educenter'),
                'fields' => array(
                    'educenter_gallery_cs_heading',
                    'educenter_gallery_block',
                    'educenter_gallery_icon_style',
                    'educenter_gallery_cs_heading',
                    'educenter_gallery_super_title_color',
                    'educenter_gallery_title_color',
                    'educenter_gallery_text_color',
                    'educenter_gallery_link_color',
                    'educenter_gallery_link_hover_color',
                ),
            ),
            array(
                'name' => esc_html__('Advanced', 'educenter'),
                'fields' => array(
                    'educenter_gallery_bg_type',
                    'educenter_gallery_bg_color',
                    'educenter_gallery_bg_gradient',
                    'educenter_gallery_bg_image',
                    'educenter_gallery_bg_video',
                    'educenter_gallery_overlay_color',
                    'educenter_gallery_padding',

                    'educenter_gallery_seperator0',
                    'educenter_gallery_section_seperator',
                    'educenter_gallery_seperator1',
                    'educenter_gallery_top_seperator',
                    'educenter_gallery_ts_color',
                    'educenter_gallery_ts_height',
                    'educenter_gallery_seperator2',
                    'educenter_gallery_bottom_seperator',
                    'educenter_gallery_bs_color',
                    'educenter_gallery_bs_height'
                ),
            ),
        ),
    )));


    $wp_customize->add_setting('educenter_gallery_section_title', array(
        'default'       =>      '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('educenter_gallery_section_title', array(
        'section'    => 'educenter_gallery_settings',
        'label'      => esc_html__('Enter Gallery Main Title', 'educenter'),
        'type'       => 'text'  
    ));

    $wp_customize->add_setting('educenter_gallery_section_subtitle', array(
        'default'       =>      '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('educenter_gallery_section_subtitle', array(
        'section'    => 'educenter_gallery_settings',
        'label'      => esc_html__('Enter Gallery Main SubTitle', 'educenter'),
        'type'       => 'text'  
    ));

    /** gallery Column */
    $wp_customize->add_setting('educenter_gallery_section_column', array(
        'default' => '3',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'         
    ));
    $wp_customize->add_control('educenter_gallery_section_column', array(
        'label'   => esc_html__('Column','educenter'),
        'section' => 'educenter_gallery_settings',
        'type'    => 'select',
        'choices' => array(
            '1' => esc_html__('1','educenter'),
            '2' => esc_html__('2','educenter'),			
            '3' => esc_html__('3','educenter'),			
            '4' => esc_html__('4','educenter'),			
        )
    ));

    $wp_customize->add_setting('educenter_gallery_section_column_gap', array(
        'default' => 'gap',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'         
    ));
    $wp_customize->add_control('educenter_gallery_section_column_gap', array(
        'label'   => esc_html__('Column Gap','educenter'),
        'section' => 'educenter_gallery_settings',
        'type'    => 'select',
        'choices' => array(
            'gap' => esc_html__('Gap','educenter'),
            'no-gap' => esc_html__('No Gap','educenter')	
        )
    ));

    $wp_customize->add_setting('educenter_gallery_section_full_width', array(
        'default' => false,
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'         
    ));
    $wp_customize->add_control('educenter_gallery_section_full_width', array(
        'label'   => esc_html__('Full Width','educenter'),
        'section' => 'educenter_gallery_settings',
        'type'    => 'checkbox'
    ));

    $wp_customize->add_setting( 'educenter_gallery_image', array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field' // Done
    ) );

    $wp_customize->add_control( new Educenter_Display_Gallery_Control( $wp_customize, 'educenter_gallery_image', array(
        'settings'		=> 'educenter_gallery_image',
        'section'		=> 'educenter_gallery_settings',
        'label'			=> esc_html__( 'Upload Gallery Images', 'educenter' ),
    )));

    $wp_customize->selective_refresh->add_partial('educenter_gallery_refresh', array(
        'settings' => array('educenter_gallery_area_options', 
                            'educenter_gallery_section_title',
                            'educenter_gallery_section_subtitle',
                            'educenter_gallery_section_column',
                            'educenter_gallery_section_column_gap',
                            'educenter_gallery_section_full_width',
                            'educenter_gallery_image',

                            'educenter_gallery_section_seperator',
                            'educenter_gallery_top_seperator', 
                            'educenter_gallery_bottom_seperator'
                        ),
        'selector' => '#edu-gallery-section',
        'container_inclusive' => false,
        'render_callback' => function() {
            return educenter_gallery_section();
        }
    ));