<?php
/* Team Section. */
$wp_customize->add_section(new Educenter_Toggle_Section($wp_customize, 'educenter_team_settings', array(
    'title'		=> 	esc_html__('Our Team Section','educenter'),
    'panel'		=> 'educenter_homepage_settings',
    'priority'  => educenter_get_section_position('educenter_team_settings'),
    'hiding_control' => 'educenter_team_area_options'
)));
    /**
     * Enable/Disable Option
     *
     * @since 1.0.0
    */
    $wp_customize->add_setting('educenter_team_area_options', array(
        'default' => 'disable',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',     //done
    ));
    $wp_customize->add_control(new Educenter_Switch_Control($wp_customize, 'educenter_team_area_options', array(
        'label' => esc_html__('Enable', 'educenter'),
        'section' => 'educenter_team_settings',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'educenter'),
            'disable' => esc_html__('No', 'educenter'),
        ),
    )));

    $wp_customize->add_setting('educenter_team_settings_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Educenter_Custom_Control_Tab($wp_customize, 'educenter_team_settings_nav', array(
        'type' => 'tab',
        'section' => 'educenter_team_settings',
        'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'educenter'),
                'fields' => array(
                    'educenter_team_area_options',
                    'educenter_team_settings',
                    'educenter_team_area_title_heading',
                    'educenter_team_area_title',
                    'educenter_team_area_subtitle',
                    'educenter_team_area_settings',
                    'educenter_team_style',
                    'educenter_team_col',
                    'educenter_team_area_slider_item',
                    'educenter_team_area_slider_or_grid'
                ),
                'active' => true,
            ),
            array(
                'name' => esc_html__('Style', 'educenter'),
                'fields' => array(
                    'educenter_team_grid_style',
                    'educenter_team_image_style',
                    'educenter_team_cs_heading',
                    'educenter_team_super_title_color',
                    'educenter_team_title_color',
                    'educenter_team_text_color',
                    'educenter_team_link_color',
                    'educenter_team_link_hover_color',
                ),
            ),
            array(
                'name' => esc_html__('Advanced', 'educenter'),
                'fields' => array(
                    'educenter_team_bg_type',
                    'educenter_team_bg_color',
                    'educenter_team_bg_gradient',
                    'educenter_team_bg_image',
                    'educenter_team_bg_video',
                    'educenter_team_overlay_color',
                    'educenter_team_padding',
                    'educenter_team_content_heading',
					'educenter_team_content_bg_type',
                    'educenter_team_content_bg_color',
                    'educenter_team_content_bg_gradient',
					'educenter_team_content_padding',
					'educenter_team_content_margin',
					'educenter_team_content_radius',
                    'educenter_team_cs_seperator',
					'educenter_team_seperator0',
					'educenter_team_section_seperator',
					'educenter_team_seperator1',
					'educenter_team_top_seperator',
					'educenter_team_ts_color',
					'educenter_team_ts_height',
					'educenter_team_seperator2',
					'educenter_team_bottom_seperator',
					'educenter_team_bs_color',
					'educenter_team_bs_height'
                ),
            ),
        ),
    )));
    

    $wp_customize->add_setting('educenter_team_area_title_heading', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new Educenter_Customize_Heading($wp_customize, 'educenter_team_area_title_heading', array(
        'section' => 'educenter_team_settings',
        'label' => esc_html__('Section Title & Sub Title', 'educenter')
    )));


    // Team Section Title.
    $wp_customize->add_setting( 'educenter_team_area_title', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'			//done
    ) );
    $wp_customize->add_control( 'educenter_team_area_title', array(
        'label'    => esc_html__( 'Super Title', 'educenter' ),
        'section'  => 'educenter_team_settings',
        'type'     => 'text',
    ));
    // Team Section Title.
    $wp_customize->add_setting( 'educenter_team_area_subtitle', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'			//done
    ) );
    $wp_customize->add_control( 'educenter_team_area_subtitle', array(
        'label'    => esc_html__( 'Title', 'educenter' ),
        'section'  => 'educenter_team_settings',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('educenter_team_area_slider_or_grid', array(
        'default' => 'slider',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('educenter_team_area_slider_or_grid', array(
        'type' => 'select',
        'label' => esc_html__('Column', 'educenter'),
        'section' => 'educenter_team_settings',
        'setting' => 'educenter_team_area_slider_or_grid',
        'choices' => array(
            'slider' => esc_html__('Slider', 'educenter'),
            'grid' => esc_html__('Grid', 'educenter')
            
        )
    ));

    $wp_customize->add_setting('educenter_team_area_slider_item', array(
        'default' => '3',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('educenter_team_area_slider_item', array(
        'type' => 'select',
        'label' => esc_html__('Column', 'educenter'),
        'section' => 'educenter_team_settings',
        'setting' => 'educenter_team_area_slider_item',
        'choices' => array(
            1 => esc_html__('1', 'educenter'),
            2 => esc_html__('2', 'educenter'),
            3 => esc_html__('3', 'educenter'),
            4 => esc_html__('4', 'educenter'),
            
        )
    ));
    
  
    // Our Team Page.
    $wp_customize->add_setting('educenter_team_area_settings', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'educenter_sanitize_repeater',		//done
        'default' => json_encode(array(
            array(
                'team_page'   => '',
                'team_position' =>'',
                'facebook'    =>'',
                'twitter'     =>'',
                'linkedin'    =>'',
                'instagram'   => '',
                'alignment'   => 'text-center',
            )
        ))
    ));
    $wp_customize->add_control(new Educenter_Repeater_Control( $wp_customize, 
        'educenter_team_area_settings', 
        array(
            'label' 	   => esc_html__('Team Blocks', 'educenter'),
            'section' 	   => 'educenter_team_settings',
            'settings' 	   => 'educenter_team_area_settings',
            'box_label' => esc_html__('Team Block', 'educenter'),
            'add_label' => esc_html__('Add New', 'educenter'),
        ),
        array(
            'team_page' => array(
                'type'    => 'select',
                'label'   => esc_html__('Team Page', 'educenter'),
                'options' => $slider_pages
            ),
            'team_position' => array(
                'type'    => 'text',
                'label'   => esc_html__('Designation', 'educenter'),
                'default' => ''
            ),
            'facebook'  => array(
                'type'   => 'pro',
                'label'  => esc_html__('Facebook Link', 'educenter'),
                'default' => ''
            ),
            'twitter' 	=> array(
                'type'    => 'url',
                'label'   => esc_html__('Twitter Link', 'educenter'),
                'default' => ''
            ),
            'linkedin'   => array(
                'type'    => 'url',
                'label'   => esc_html__('Linkedin Link', 'educenter'),
                'default' => ''
            ),
            'instagram' => array(
                'type'    => 'url',
                'label'   => esc_html__('Instagram Link', 'educenter'),
                'default' => ''
            ),
            'alignment' => array(
                'type' => 'pro',
                'label' => esc_html__('Alignment', 'educenter'),
                
            ),
        )
    ));
    
   
    $wp_customize->add_setting('educenter_team_style', array(
        'sanitize_callback' => 'educenter_sanitize_options',
        'default' => 'style1',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new Educenter_Selector($wp_customize, 'educenter_team_style', array(
        'section' => 'educenter_team_settings',
        'label' => esc_html__('Team Block Style', 'educenter'),
        'options' => array(
            'style1' => get_template_directory_uri() . '/inc/customizer/images/team/team-style1.png',
            'style2' => get_template_directory_uri() . '/inc/customizer/images/team/team-style2.png',
        )
    )));

    /** Service Section Block Settings */
    $wp_customize->add_setting('educenter_team_grid_style',
        array(
            'transport' => 'postMessage',
            'sanitize_callback' => 'educenter_sanitize_field_background',
            'default'           => json_encode(array(
                'margin'    => '',
                'padding'   => '',
                'radius'    => '',
                'bg_color'  => '',
                'borderwidth' => '',
                'bordercolor' => '',
            )),
        )
    );
    $wp_customize->add_control( new Educenter_Custom_Control_Group( $wp_customize, 'educenter_team_grid_style',
        array(
            'label'    => esc_html__( 'Block Settings', 'educenter' ),
            'section'  => 'educenter_team_settings',
            'settings' => 'educenter_team_grid_style',
        ),
        array(
            'margin' => array(
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
                'type'  => 'color',
                'label' => esc_html__( 'Background', 'educenter' ),
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

    /** Block Items Image Settings */
    $wp_customize->add_setting( 'educenter_team_image_style',
        array(
            'transport' => 'postMessage',
            'sanitize_callback' => 'educenter_sanitize_field_background',
            'default'           => json_encode(array(
                'padding'   => '',
                'radius'    => '',
                'bg_color'  => '',
                'height'    => '',
                'width'     => '',
                'margintop' => '',
                'align'     => '',
            )),
        )
    );
    $wp_customize->add_control( new Educenter_Custom_Control_Group($wp_customize, 'educenter_team_image_style',
        array(
            'label'    => esc_html__( 'Block Items Image Settings', 'educenter' ),
            'section'  => 'educenter_team_settings',
            'settings' => 'educenter_team_image_style',
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
            'bg_color' => array(
                'type'  => 'color',
                'label' => esc_html__( 'Background', 'educenter' ),
            ),
            'height' => array(
                'type'  => 'number',
                'label' => esc_html__( 'Height(px)', 'educenter' ),
            ),
            'width' => array(
                'type'  => 'number',
                'label' => esc_html__( 'Width(px)', 'educenter' ),
            ),
            'margintop' => array(
                'type'  => 'number',
                'label' => esc_html__( 'Margin Top (px)', 'educenter' ),
            )
        ))
    );


    $wp_customize->add_setting('educenter_team_settings_upgrade_text', array(
        'sanitize_callback' => 'educenter_sanitize_text'
    ));

    $wp_customize->add_control(new EduCenter_Upgrade_Text($wp_customize, 'educenter_team_settings_upgrade_text', array(
        'section' => 'educenter_team_settings',
        'label' => esc_html__('For more controls,', 'educenter'),
        'choices' => array(
            esc_html__('Provision for inclusion of social links', 'educenter'),
            esc_html__('Dynamic text editor option for bubble text', 'educenter'),
            esc_html__('Multiple Layout', 'educenter'),
            esc_html__('Margin & Padding Option', 'educenter'),
            esc_html__('Background Option', 'educenter'),
        ),
        'priority' => 300
    )));

    $wp_customize->selective_refresh->add_partial('educenter_team_refresh', array(
        'settings' => array(
                            'educenter_team_area_options',
                            'educenter_team_area_title',
                            'educenter_team_area_subtitle',
                            'educenter_team_area_slider_or_grid',
                            'educenter_team_style',
                            
                            
                            'educenter_team_section_seperator',
                            'educenter_team_top_seperator',
                            'educenter_team_bottom_seperator',
            
                            'educenter_team_area_title',
                            'educenter_team_area_subtitle',
                            'educenter_team_area_settings',
                            'educenter_team_area_slider_item',
                        ),
        'selector' => '#edu-team-section',
        'fallback_refresh' => true,
        'container_inclusive' => true,
        'render_callback' => function() {
            return educenter_ourteam_section();
        }
    ));