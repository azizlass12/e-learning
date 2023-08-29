<?php
/* ============SERVICE SECTION PANEL============ */
$wp_customize->add_section(new Educenter_Toggle_Section($wp_customize, 'educenter_courses_settings', array(
    'title' => esc_html__('Our Courses', 'educenter'),
    'panel' => 'educenter_homepage_settings',
    'priority' => educenter_get_section_position('educenter_courses_settings'),
    'hiding_control' => 'educenter_courses_section_area_options'
)));

/**
 * Enable/Disable Option
 *
 * @since 1.0.0
*/
    $wp_customize->add_setting('educenter_courses_section_area_options', array(
        'default' => 'enable',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',     //done
    ));
    $wp_customize->add_control(new Educenter_Switch_Control($wp_customize, 'educenter_courses_section_area_options', array(
        'label' => esc_html__('Enable', 'educenter'),
        'section' => 'educenter_courses_settings',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'educenter'),
            'disable' => esc_html__('No', 'educenter'),
        ),
        'class' => 'switch-section',
        'priority' => 2
    )));

    $wp_customize->add_setting('educenter_course_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Educenter_Custom_Control_Tab($wp_customize, 'educenter_course_nav', array(
        'type' => 'tab',
        'section' => 'educenter_courses_settings',
        'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'educenter'),
                'fields' => array(
                    'educenter_course_title_heading',
                    'educenter_courses_section_title',
                    'educenter_courses_section_subtitle',
                    'educenter_courses_section_view',
                    'educenter_courses_section_column',
                    'educenter_course_area_settings',
                    'educenter_courses_show_button',
                ),
                'active' => true,
            ),
            array(
                'name' => esc_html__('Style', 'educenter'),
                'fields' => array(
                    'educenter_courses_cs_heading',
                    'educenter_course_block',
                    'educenter_course_icon_style',
                    'educenter_course_cs_heading',
                    'educenter_courses_super_title_color',
                    'educenter_courses_title_color',
                    'educenter_courses_text_color',
                    'educenter_courses_link_color',
                    'educenter_courses_link_hover_color',
                ),
            ),
            array(
                'name' => esc_html__('Advanced', 'educenter'),
                'fields' => array(
                    'educenter_courses_bg_type',
                    'educenter_courses_bg_color',
                    'educenter_courses_bg_gradient',
                    'educenter_courses_bg_image',
                    'educenter_courses_bg_video',
                    'educenter_courses_overlay_color',
                    'educenter_courses_padding',

                    'educenter_courses_seperator0',
                    'educenter_courses_section_seperator',
                    'educenter_courses_seperator1',
                    'educenter_courses_top_seperator',
                    'educenter_courses_ts_color',
                    'educenter_courses_ts_height',
                    'educenter_courses_seperator2',
                    'educenter_courses_bottom_seperator',
                    'educenter_courses_bs_color',
                    'educenter_courses_bs_height'
                ),
            ),
        ),
    )));

    $wp_customize->add_setting('educenter_course_title_heading', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new Educenter_Customize_Heading($wp_customize, 'educenter_course_title_heading', array(
        'section' => 'educenter_courses_settings',
        'label' => esc_html__('Section Title & Sub Title', 'educenter')
    )));

    $wp_customize->add_setting('educenter_courses_section_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
        'default' => get_theme_mod('educenter_service_title', '')
    ));
    $wp_customize->add_control('educenter_courses_section_title', array(
        'section' => 'educenter_courses_settings',
        'type' => 'text',
        'label' => esc_html__('Title', 'educenter')
    ));

    $wp_customize->add_setting('educenter_courses_section_subtitle', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => get_theme_mod('educenter_service_subtitle', ''),
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control('educenter_courses_section_subtitle', array(
        'section' => 'educenter_courses_settings',
        'type' => 'text',
        'label' => esc_html__('Title', 'educenter')
    ));

    /** list / slider */
    $wp_customize->add_setting('educenter_courses_section_view', array(
        'default' => 'grid',
        // 'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'         
    ));
    $wp_customize->add_control('educenter_courses_section_view', array(
        'label'   => esc_html__('View Style','educenter'),
        'section' => 'educenter_courses_settings',
        'type'    => 'select',
        'choices' => array(
            'grid' => esc_html__('Grid','educenter'),	
            'slide' => esc_html__('Slide','educenter'),	
        )
    ));

    /** column */
    $wp_customize->add_setting('educenter_courses_section_column', array(
        'default' => '4',
        // 'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'         
    ));
    $wp_customize->add_control('educenter_courses_section_column', array(
        'label'   => esc_html__('Column','educenter'),
        'section' => 'educenter_courses_settings',
        'type'    => 'select',
        'choices' => array(
            '1' => esc_html__('1','educenter'),
            '2' => esc_html__('2','educenter'),			
            '3' => esc_html__('3','educenter'),			
            '4' => esc_html__('4','educenter'),			
        )
    ));

    // Default Promo Features Service Page.
    $wp_customize->add_setting('educenter_course_area_settings', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'educenter_sanitize_repeater',		//done
        'default' => json_encode(array(
            array(
                'course_page' => '',
                'course_price' =>'',

            )
        ))
    ));
    $wp_customize->add_control(new Educenter_Repeater_Control( $wp_customize, 
        'educenter_course_area_settings', 
        array(
            'label' 	   => esc_html__('Course Settings', 'educenter'),
            'section' 	   => 'educenter_courses_settings',
            'settings' 	   => 'educenter_course_area_settings',
            'box_label' => esc_html__('Course', 'educenter'),
            'add_label' => esc_html__('Add New', 'educenter'),
        ),
        array(
            'course_page' => array(
                'type' => 'select',
                'label' => esc_html__('Course', 'educenter'),
                'options' => $slider_pages
            ),
            'course_price' => array(
                'type' => 'text',
                'label' => esc_html__('Price', 'educenter'),
                
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


    $wp_customize->add_setting('educenter_courses_show_button', array(
        'default' => 'enable',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',     //done
    ));
    $wp_customize->add_control(new Educenter_Switch_Control($wp_customize, 'educenter_courses_show_button', array(
        'label' => esc_html__('Read More Button', 'educenter'),
        'section' => 'educenter_courses_settings',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'educenter'),
            'disable' => esc_html__('No', 'educenter'),
        )
    )));

    

    /** Service Section Block Settings */
    $wp_customize->add_setting( 'educenter_course_block', array(
            'sanitize_callback' => 'educenter_sanitize_field_background',
            'transport' => 'postMessage',
            'default'       => json_encode(array(
                'margin'    => '',
                'padding'   => '',
                'radius'    => '',
            )),
        )
    );
    $wp_customize->add_control(new Educenter_Custom_Control_Group( $wp_customize, 'educenter_course_block',
        array(
            'label'    => esc_html__( 'Block Settings', 'educenter' ),
            'section'  => 'educenter_courses_settings',
            'settings' => 'educenter_course_block',
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

    $wp_customize->add_setting('educenter_courses_settings_upgrade_text', array(
        'sanitize_callback' => 'educenter_sanitize_text'
    ));

    $wp_customize->add_control(new EduCenter_Upgrade_Text($wp_customize, 'educenter_courses_settings_upgrade_text', array(
        'section' => 'educenter_courses_settings',
        'label' => esc_html__('For more styling and controls,', 'educenter'),
        'choices' => array(
            esc_html__('Switch Between List View and Slider', 'educenter'),
            esc_html__('Change course details', 'educenter'),
            esc_html__('Control over background color', 'educenter'),
            esc_html__('Change fonts color', 'educenter'),
            esc_html__('Change title bubble text', 'educenter'),
        ),
        'priority' => 300
    )));


    $wp_customize->selective_refresh->add_partial('educenter_courses_area_refresh', array(
        'settings' => array(
                            'educenter_courses_section_area_options', 
                            // 'educenter_courses_section_title',
                            // 'educenter_courses_section_subtitle',
                            'educenter_courses_section_column',
                            'educenter_courses_section_view',
                            'educenter_course_area_settings',

                            'educenter_courses_show_button',

        
                            'educenter_courses_section_seperator',
                            'educenter_courses_top_seperator', 
                            'educenter_courses_bottom_seperator'
                        
                        
                        ),
        'selector' => '#edu-courses-section',
        'fallback_refresh' => true,
        'container_inclusive' => true,
        'render_callback' => function() {
            return do_action('educenter_courses');
        }
    ));