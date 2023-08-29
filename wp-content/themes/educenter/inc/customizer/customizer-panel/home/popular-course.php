<?php
/* ============SERVICE SECTION PANEL============ */
$wp_customize->add_section(new Educenter_Toggle_Section($wp_customize, 'educenter_services_settings', array(
    'title' => esc_html__('Our Popular Courses', 'educenter'),
    'panel' => 'educenter_homepage_settings',
    'priority' => educenter_get_section_position('educenter_services_settings'),
    'hiding_control' => 'educenter_services_area_options'
)));

/**
 * Enable/Disable Option
 *
 * @since 1.0.0
*/
    $wp_customize->add_setting('educenter_services_area_options', array(
        'default' => 'enable',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',     //done
    ));
    $wp_customize->add_control(new Educenter_Switch_Control($wp_customize, 'educenter_services_area_options', array(
        'label' => esc_html__('Enable', 'educenter'),
        'section' => 'educenter_services_settings',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'educenter'),
            'disable' => esc_html__('No', 'educenter'),
        ),
        'class' => 'switch-section',
        'priority' => 2
    )));

    $wp_customize->add_setting('educenter_services_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Educenter_Custom_Control_Tab($wp_customize, 'educenter_services_nav', array(
        'type' => 'tab',
        'section' => 'educenter_services_settings',
        'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'educenter'),
                'fields' => array(
                    'educenter_services_title_heading',
                    'educenter_services_main_title',
                    'educenter_services_main_subtitle',
                    'educenter_services_area_settings',
                    'educenter_services_show_button',

                    'educenter_services_show_icon',
                    
                ),
                'active' => true,
            ),
            array(
                'name' => esc_html__('Style', 'educenter'),
                'fields' => array(
                    'educenter_services_block',
                    'educenter_services_icon_style',
                    'educenter_services_cs_heading',
                    'educenter_services_super_title_color',
                    'educenter_services_title_color',
                    'educenter_services_text_color',
                    'educenter_services_link_color',
                    'educenter_services_link_hover_color',
                ),
            ),
            array(
                'name' => esc_html__('Advanced', 'educenter'),
                'fields' => array(
                    'educenter_services_bg_type',
                    'educenter_services_bg_color',
                    'educenter_services_bg_gradient',
                    'educenter_services_bg_image',
                    'educenter_services_bg_video',
                    'educenter_services_overlay_color',
                    'educenter_services_padding',

                    'educenter_services_seperator0',
                    'educenter_services_section_seperator',
                    'educenter_services_seperator1',
                    'educenter_services_top_seperator',
                    'educenter_services_ts_color',
                    'educenter_services_ts_height',
                    'educenter_services_seperator2',
                    'educenter_services_bottom_seperator',
                    'educenter_services_bs_color',
                    'educenter_services_bs_height'
                ),
            ),
        ),
    )));

    $wp_customize->add_setting('educenter_services_title_heading', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new Educenter_Customize_Heading($wp_customize, 'educenter_services_title_heading', array(
        'section' => 'educenter_services_settings',
        'label' => esc_html__('Section Title & Sub Title', 'educenter')
    )));

    $wp_customize->add_setting('educenter_services_main_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
        'default' => get_theme_mod('educenter_service_title', '')
    ));
    $wp_customize->add_control('educenter_services_main_title', array(
        'section' => 'educenter_services_settings',
        'type' => 'text',
        'label' => esc_html__('Title', 'educenter')
    ));

    $wp_customize->add_setting('educenter_services_main_subtitle', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => get_theme_mod('educenter_service_subtitle', ''),
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control('educenter_services_main_subtitle', array(
        'section' => 'educenter_services_settings',
        'type' => 'text',
        'label' => esc_html__('Title', 'educenter')
    ));

    // Default Promo Features Service Page.
    $wp_customize->add_setting('educenter_services_area_settings', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'educenter_sanitize_repeater',		//done
        'default' => json_encode(array(
            array(
                'services_page' => '',
                'services_icon' =>'fa fa-desktop',

            )
        ))
    ));
    $wp_customize->add_control(new Educenter_Repeater_Control( $wp_customize, 
        'educenter_services_area_settings', 
        array(
            'label' 	   => esc_html__('Features Service', 'educenter'),
            'section' 	   => 'educenter_services_settings',
            'settings' 	   => 'educenter_services_area_settings',
            'box_label' => esc_html__('Service', 'educenter'),
            'add_label' => esc_html__('Add New', 'educenter'),
        ),
        array(
            'services_page' => array(
                'type' => 'select',
                'label' => esc_html__('Service Page', 'educenter'),
                'options' => $slider_pages
            ),
            'services_icon' => array(
                'type' => 'icon',
                'label' => esc_html__('Choose Icon', 'educenter'),
                'default' => 'fas fa-address-card'
            ),
            'bg_color' => array(
                'type'  => 'pro',
                'label' => esc_html__( 'Background', 'educenter' ),
            ),
            'color' => array(
                'type'  => 'pro',
                'label' => esc_html__( 'Color', 'educenter' ),
            ),
            'alignment' => array(
                'type' => 'pro',
                'label' => esc_html__("Alignment", 'educenter'),
            )
            
        )
    ));


    $wp_customize->add_setting('educenter_services_show_button', array(
        'default' => 'enable',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',     //done
    ));
    $wp_customize->add_control(new Educenter_Switch_Control($wp_customize, 'educenter_services_show_button', array(
        'label' => esc_html__('Read More Button', 'educenter'),
        'section' => 'educenter_services_settings',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'educenter'),
            'disable' => esc_html__('No', 'educenter'),
        )
    )));


    $wp_customize->add_setting('educenter_services_show_icon', array(
        'default' => 'enable',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',     //done
    ));
    $wp_customize->add_control(new Educenter_Switch_Control($wp_customize, 'educenter_services_show_icon', array(
        'label' => esc_html__('Show Icon', 'educenter'),
        'section' => 'educenter_services_settings',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'educenter'),
            'disable' => esc_html__('No', 'educenter'),
        )
    )));

    

    /** Service Section Block Settings */
    $wp_customize->add_setting( 'educenter_services_block', array(
            'sanitize_callback' => 'educenter_sanitize_field_background',
            'transport' => 'postMessage',
            'default'       => json_encode(array(
                'margin'    => '',
                'padding'   => '',
                'radius'    => '',
            )),
        )
    );
    $wp_customize->add_control(new Educenter_Custom_Control_Group( $wp_customize, 'educenter_services_block',
        array(
            'label'    => esc_html__( 'Block Settings', 'educenter' ),
            'section'  => 'educenter_services_settings',
            'settings' => 'educenter_services_block',
        ),
        array(
            'margin'      => array(
                'type'  => 'cssbox',
                'label' => esc_html__( 'Margin', 'educenter' ),
            ),
            'padding' => array(
                'type'  => 'cssbox',
                'label' => esc_html__( 'Padding', 'educenter' ),
            ),
            'radius' => array(
                'type'  => 'cssbox',
                'label' => esc_html__( 'Radius', 'educenter' ),
            ),
            'bg_color' => array(
                'type'  => 'pro',
                'label' => esc_html__( 'Background', 'educenter' ),
            ),
            'color' => array(
                'type'  => 'pro',
                'label' => esc_html__( 'Color', 'educenter' ),
            ),

            'alignment' => array(
                'type'  => 'pro',
                'label' => esc_html__( 'Alignment', 'educenter' ),
            ),
        ))
    );

    /** Service Section Block Items Icon Settings */
    $wp_customize->add_setting('educenter_services_icon_style',
        array(
            'sanitize_callback' => 'educenter_sanitize_field_background',
            'transport'     => 'postMessage',
            'default'       => json_encode(array(
                'padding'   => '',
                'radius'    => '',
                'bg_color'  => '',
                'color'     => '',
                'bordercolor' => '',
                'borderwidth' => '',
            )),
        )
    );
    $wp_customize->add_control( new Educenter_Custom_Control_Group( $wp_customize, 'educenter_services_icon_style',
        array(
            'label'    => esc_html__( 'Block Icon Settings', 'educenter' ),
            'section'  => 'educenter_services_settings',
            'settings' => 'educenter_services_icon_style',
        ),
        array(
            'padding' => array(
                'type'  => 'cssbox',
                'label' => esc_html__( 'Padding', 'educenter' ),
            ),
            'radius' => array(
                'type'  => 'cssbox',
                'label' => esc_html__( 'Radius', 'educenter' ),
            ),
            'margin' => array(
                'type'  => 'pro',
                'label' => esc_html__( 'Margin', 'educenter' ),
            ),
            'bg_color' => array(
                'type'  => 'color',
                'label' => esc_html__( 'Background', 'educenter' ),
            ),
            'color' => array(
                'type'  => 'pro',
                'label' => esc_html__( 'Color', 'educenter' ),
            ),
            'borderwidth' => array(
                'type'  => 'number',
                'label' => esc_html__( 'Border Width', 'educenter' ),
            ),
            'bordercolor' => array(
                'type'  => 'color',
                'label' => esc_html__( 'Border Color', 'educenter' ),
            ),
        ))
    );


    

$wp_customize->selective_refresh->add_partial( 'educenter_services_refresh', array (
    'settings' => array( 
        'educenter_services_area_options',
        'educenter_services_main_title',
        'educenter_services_main_subtitle',
        'educenter_services_area_settings',
        'educenter_services_show_button',
        'educenter_services_show_icon',
        
        'educenter_services_section_seperator',
        'educenter_services_top_seperator', 
        'educenter_services_bottom_seperator'
     ),
    'selector' => '#edu-services-section',
    'fallback_refresh' => true,
    'container_inclusive' => true,
    'render_callback' => function () {
        return educenter_services_section();
    }
));