<?php
/**
 * Counter Section. 
*/
$wp_customize->add_section(new Educenter_Toggle_Section($wp_customize, 'educenter_counter_settings', array(
    'title'		=> 	esc_html__('Counter Section','educenter'),
    'panel'		=> 'educenter_homepage_settings',
    'priority'  => educenter_get_section_position('educenter_counter_settings'),
    'hiding_control' => 'educenter_counter_section_area_options'
)));
    $wp_customize->add_setting('educenter_counter_settings_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Educenter_Custom_Control_Tab($wp_customize, 'educenter_counter_settings_nav', array(
        'type' => 'tab',
        'section' => 'educenter_counter_settings',
        'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'educenter'),
                'fields' => array(
                    'educenter_counter_settings',
                    'educenter_counter_title_heading',
                    'educenter_counter_section_subtitle',
                    'educenter_counter_section_title',
                    'educenter_counter_bg_image',
                    'educenter_counter_area_settings',
                ),
                'active' => true,
            ),
            array(
                'name' => esc_html__('Style', 'educenter'),
                'fields' => array(
                    'educenter_counter_group_style',
                    'educenter_counter_icon_style',
                    'educenter_counter_cs_heading',
                    'educenter_counter_super_title_color',
                    'educenter_counter_title_color',
                    'educenter_counter_text_color',
                    'educenter_counter_link_color',
                    'educenter_counter_link_hover_color',
                ),
            ),
            array(
                'name' => esc_html__('Advanced', 'educenter'),
                'fields' => array(
                    'educenter_counter_bg_type',
                    'educenter_counter_bg_color',
                    'educenter_counter_bg_gradient',
                    'educenter_counter_bg_video',
                    'educenter_counter_overlay_color',
                    'educenter_counter_padding',
                    'educenter_counter_content_heading',
					'educenter_counter_content_bg_type',
                    'educenter_counter_content_bg_color',
                    'educenter_counter_content_bg_gradient',
					'educenter_counter_content_padding',
					'educenter_counter_content_margin',
					'educenter_counter_content_radius',
                	'educenter_counter_cs_seperator',
					'educenter_counter_seperator0',
					'educenter_counter_section_seperator',
					'educenter_counter_seperator1',
					'educenter_counter_top_seperator',
					'educenter_counter_ts_color',
					'educenter_counter_ts_height',
					'educenter_counter_seperator2',
					'educenter_counter_bottom_seperator',
					'educenter_counter_bs_color',
					'educenter_counter_bs_height',
                ),
            ),
        ),
    )));
    /**
     * Enable/Disable Option
     *
     * @since 1.0.0
    */
    $wp_customize->add_setting('educenter_counter_section_area_options', array(
        'default' => 'enable',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',     //done
    ));
    $wp_customize->add_control(new Educenter_Switch_Control($wp_customize, 'educenter_counter_section_area_options', array(
        'label' => esc_html__('Enable', 'educenter'),
        'section' => 'educenter_counter_settings',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'educenter'),
            'disable' => esc_html__('No', 'educenter'),
        ),
    )));
    
    $wp_customize->add_setting('educenter_counter_title_heading', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new Educenter_Customize_Heading($wp_customize, 'educenter_counter_title_heading', array(
        'section' => 'educenter_counter_settings',
        'label' => esc_html__('Section Title & Sub Title', 'educenter')
    )));

    // Counter Section Title.
    $wp_customize->add_setting('educenter_counter_section_title', array(
        'transport' => 'postMessage',
        'sanitize_callback'	=> 'sanitize_text_field'		//done
    ));
    $wp_customize->add_control('educenter_counter_section_title', array(
        'label'	   => esc_html__('Title','educenter'),
        'section'  => 'educenter_counter_settings',
        'type'	   => 'text',
    ));
    // Counter Section Title.
    $wp_customize->add_setting('educenter_counter_section_subtitle', array(
        'transport' => 'postMessage',
        'sanitize_callback'	=> 'sanitize_text_field'		//done
    ));
    $wp_customize->add_control('educenter_counter_section_subtitle', array(
        'label'	   => esc_html__('Sub Title','educenter'),
        'section'  => 'educenter_counter_settings',
        'type'	   => 'text',
    ));

    
    $wp_customize->add_setting( 'educenter_counter_bg_image', array(
        'default'       =>      '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'esc_url_raw'
    ));
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'educenter_counter_bg_image', array(
        'section'       => 'educenter_counter_settings',
        'label'         => esc_html__('Upload Counter BG Image', 'educenter'),
        'type'          => 'image',
    )));
    
    // Counter Section.
    $wp_customize->add_setting('educenter_counter_area_settings', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'educenter_sanitize_repeater',		//done
        'default' => json_encode(array(
            array(
                'counter_icon'  =>'',
                'counter_title'  =>'',
                'counter_number'  =>'',	            
                'counter_suffix' => ''
            )
        ))
    ));
    $wp_customize->add_control(new Educenter_Repeater_Control( $wp_customize, 
        'educenter_counter_area_settings', 
        array(
            'label' 	   => esc_html__('Counter Items', 'educenter'),
            'section' 	   => 'educenter_counter_settings',
            'settings' 	   => 'educenter_counter_area_settings',
            'box_label' => esc_html__('Counter Settings', 'educenter'),
            'add_label' => esc_html__('Add New', 'educenter'),
        ),
        array(
            'counter_icon' => array(
                'type' => 'icon',
                'label' => esc_html__('Choose Icon', 'educenter'),
                'default' => 'fa fa-cogs'
            ),
            'counter_title' => array(
                'type' => 'text',
                'label' => esc_html__('Title', 'educenter'),
                'default' => ''
            ),
            'counter_number' => array(
                'type' => 'text',
                'label' => esc_html__('Number', 'educenter'),
                'default' => ''
            ),
            'counter_suffix' => array(
                'type' => 'text',
                'label' => esc_html__('Suffix', 'educenter'),
                'default' => ''
            ),
        )
    ));
    
    /**** Counter Block Settings */
    $wp_customize->add_setting('educenter_counter_group_style',
        array(
            'transport' => 'postMessage',
            'sanitize_callback' => 'educenter_sanitize_field_background',
            'default'           => json_encode(array(
                'padding'   => '',
                'radius'    => '',
                'bg_color'  => '',
                'color'     => '',
                'borderwidth' => '',
                'bordercolor' => '',
            )),
        )
    );
    $wp_customize->add_control( new Educenter_Custom_Control_Group( $wp_customize, 'educenter_counter_group_style',
        array(
            'label'    => esc_html__( 'Block Settings', 'educenter' ),
            'section'  => 'educenter_counter_settings',
            'settings' => 'educenter_counter_group_style',
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
                'type'  => 'text',
                'label' => esc_html__( 'Border Width', 'educenter' ),
            ),
            'bordercolor' => array(
                'type'  => 'color',
                'label' => esc_html__( 'Border Color', 'educenter' ),
            ),
        ))
    );

    /*** Counter Block Items Icon Settings */
    $wp_customize->add_setting( 'educenter_counter_icon_style',
        array(
            'transport' => 'postMessage',
            'sanitize_callback' => 'educenter_sanitize_field_background',
            'default'           => json_encode(array(
                'padding'   => '',
                'radius'    => '',
                'bg_color'  => '',
                'color'     => '',
                'bordercolor'  => '',
                'borderwidth'  => '',
            )),
        )
    );
    $wp_customize->add_control( new Educenter_Custom_Control_Group( $wp_customize, 'educenter_counter_icon_style',
        array(
            'label'    => esc_html__( 'Block Icon Settings', 'educenter' ),
            'section'  => 'educenter_counter_settings',
            'settings' => 'educenter_counter_icon_style',
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
                'type'  => 'text',
                'label' => esc_html__( 'Border Width', 'educenter' ),
            ),
            'bordercolor' => array(
                'type'  => 'color',
                'label' => esc_html__( 'Border Color', 'educenter' ),
            ),
        ))
    );


    $wp_customize->selective_refresh->add_partial('educenter_counter_refresh', array(
        'settings' => array(
            'educenter_counter_section_area_options', 
            
            'educenter_counter_area_settings',
            'educenter_counter_bg_image',

            'educenter_counter_section_seperator',
            'educenter_counter_top_seperator',
            'educenter_counter_bottom_seperator'
        ),
        'selector' => '#edu-counter-section',
        'fallback_refresh' => true,
        'container_inclusive' => true,
        'render_callback' => function() {
            return educenter_counter_section();
        }
    ));

    $wp_customize->add_setting('educenter_counter_settings_upgrade_text', array(
        'sanitize_callback' => 'educenter_sanitize_text'
    ));

    $wp_customize->add_control(new EduCenter_Upgrade_Text($wp_customize, 'educenter_counter_settings_upgrade_text', array(
        'section' => 'educenter_counter_settings',
        'label' => esc_html__('For more styling and controls,', 'educenter'),
        'choices' => array(
            esc_html__('Includes Two Different Layouts', 'educenter'),
            esc_html__('Dynamic text editor option for bubble text', 'educenter'),
            esc_html__('Column Option', 'educenter'),
            esc_html__('Background - Color, Video, Image, Gradient Option', 'educenter'),
            esc_html__('Margin Padding, Radious', 'educenter'),
            esc_html__('Typography Option', 'educenter'),
            esc_html__('Alignment Option', 'educenter'),
        ),
        'priority' => 300
    )));