    <?php
    /**
     * Features Services Area
    */

    $wp_customize->add_section(new Educenter_Toggle_Section($wp_customize, 'educenter_fservices_settings', array(
		'title'           => esc_html__('Features Services', 'educenter'),
		'panel'		=> 'educenter_homepage_settings',
		'priority'  => educenter_get_section_position('educenter_fservices_settings'),
		'hiding_control' => 'educenter_fservices_area_options'
    )));

        $wp_customize->add_setting( 'educenter_fservices_area_options', array(
            'default'            =>  'disable',
            'transport' => 'postMessage',
            'sanitize_callback'  =>  'sanitize_text_field',
        ));

        $wp_customize->add_control(new Educenter_Switch_Control( $wp_customize,'educenter_fservices_area_options', 
            array(
                'section'       => 'educenter_fservices_settings',
                'label'         =>  esc_html__('Enable Section', 'educenter'),
                'type'          =>  'switch',
                'description'   =>  esc_html__('Choose Options to Disable Featues Section','educenter'),
                'switch_label' => array(
                    'enable' => esc_html__('Yes', 'educenter'),
                    'disable' => esc_html__('No', 'educenter'),
                ),
            )
        ));

        $wp_customize->add_setting('educenter_fservices_nav', array(
            'transport' => 'postMessage',
            'sanitize_callback' => 'wp_kses_post',
        ));
        $wp_customize->add_control(new Educenter_Custom_Control_Tab($wp_customize, 'educenter_fservices_nav', array(
            'type' => 'tab',
            'section' => 'educenter_fservices_settings',
            'priority' => 1,
            'buttons' => array(
                array(
                    'name' => esc_html__('Content', 'educenter'),
                    'fields' => array(
                        'educenter_fservice_title_heading',
                        'educenter_fservices_section_title',
                        'educenter_fservices_section_subtitle',
                        'educenter_homepage_service_type',
                        'educenter_homepage_service_slider_item',
                        'educenter_sanitize_repeater',
                        'educenter_fservices_area_settings_advance',
                    ),
                    'active' => true,
                ),
                array(
                    'name' => esc_html__('Style', 'educenter'),
                    'fields' => array(
                        'educenter_fservices_icon_style',
                        'educenter_fservices_cs_heading',
                        'educenter_fservices_super_title_color',
                        'educenter_fservices_title_color',
                        'educenter_fservices_text_color',
                        'educenter_fservices_link_color',
                        'educenter_fservices_link_hover_color',
                    ),
                ),
                array(
                    'name' => esc_html__('Advanced', 'educenter'),
                    'fields' => array(
                        'educenter_fservices_bg_type',
                        'educenter_fservices_bg_color',
                       
                        'educenter_fservices_overlay_color',
                        'educenter_fservices_padding',
                        
                        'educenter_fservices_cs_seperator',
                        'educenter_fservices_seperator0',
                        'educenter_fservices_section_seperator',
                        'educenter_fservices_seperator1',
                        'educenter_fservices_top_seperator',
                        'educenter_fservices_ts_color',
                        'educenter_fservices_ts_height',
                        'educenter_fservices_seperator2',
                        'educenter_fservices_bottom_seperator',
                        'educenter_fservices_bs_color',
                        'educenter_fservices_bs_height'
                    ),
                ),
            ),
        )));
        
        $wp_customize->add_setting('educenter_fservice_title_heading', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));
        $wp_customize->add_control(new Educenter_Customize_Heading($wp_customize, 'educenter_fservice_title_heading', array(
            'section' => 'educenter_fservices_settings',
            'label' => esc_html__('Section Title & Sub Title', 'educenter')
        )));


        $wp_customize->add_setting('educenter_fservices_section_title', array(
            'default'       =>      '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field'
        ));

        $wp_customize->add_control('educenter_fservices_section_title', array(
            'section'    => 'educenter_fservices_settings',
            'label'      => esc_html__('Services Title', 'educenter'),
            'type'       => 'text'  
        ));
       


        $wp_customize->add_setting('educenter_fservices_section_subtitle', array(
            'default'       =>      '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field'
        ));

        $wp_customize->add_control('educenter_fservices_section_subtitle', array(
            'section'    => 'educenter_fservices_settings',
            'label'      => esc_html__('Services Sub Title', 'educenter'),
            'type'       => 'text'  
        ));

        $wp_customize->add_setting('educenter_homepage_service_type', array(
            'default' => 'default',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field'
        ));

        $wp_customize->add_control('educenter_homepage_service_type', array(
            'type' => 'radio',
            'label' => esc_html__('Service Type', 'educenter'),
            'section' => 'educenter_fservices_settings',
            'setting' => 'educenter_homepage_service_type',
            'choices' => array(
                'default' => esc_html__('Default', 'educenter'),
                'advance' => esc_html__('Advance', 'educenter')
            )
        ));

        $wp_customize->add_setting('educenter_homepage_service_slider_item', array(
            'default' => '3',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field'
        ));

        $wp_customize->add_control('educenter_homepage_service_slider_item', array(
            'type' => 'select',
            'label' => esc_html__('Slider Item', 'educenter'),
            'section' => 'educenter_fservices_settings',
            'setting' => 'educenter_homepage_service_slider_item',
            'choices' => array(
                1 => esc_html__('1 Item', 'educenter'),
                2 => esc_html__('2 Item', 'educenter'),
                3 => esc_html__('3 Item', 'educenter'),
                4 => esc_html__('4 Item', 'educenter'),
                
            )
        ));

        /**
         * Feature Services Settings Area
        */
        $wp_customize->add_setting( 'educenter_fservices_area_settings', array(
            'sanitize_callback' => 'educenter_sanitize_repeater',
            'transport' => 'postMessage',
            'default' => json_encode( array(
            array(
                    'services_icon' => 'fa fa-desktop',
                    'services_page' => '',
                    'bg_color' => '#004a8d',
                    'color' => '#fff',
                )
            ) )        
        ));

        $wp_customize->add_control( new Educenter_Repeater_Control( $wp_customize, 'educenter_fservices_area_settings', array(
            'label'   => esc_html__('Services Settings','educenter'),
            'section' => 'educenter_fservices_settings',
            'settings' => 'educenter_fservices_area_settings',
            'box_label' => esc_html__('Features Services','educenter'),
            'add_label' => esc_html__('Add New','educenter'),
        ),
        array(
            'services_icon' => array(
                'type'      => 'icon',
                'label'     => esc_html__( 'Select Services Icon', 'educenter' ),
                'default'   => 'fa fa-desktop'
            ),
            'services_page' => array(
                'type'      => 'select',
                'label'     => esc_html__( 'Select Services Page', 'educenter' ),
                'options'   => $slider_pages
            ),
            'bg_color' => array(
                'type'      => 'colorpicker',
                'label'     => esc_html__( 'Background', 'educenter' ),
                'default'   => '#004a8d'
            ),

            'color' => array(
                'type'      => 'colorpicker',
                'label'     => esc_html__( 'Color', 'educenter' ),
                'default'   => '#fff'
            )          
        )));

        $wp_customize->add_setting( 'educenter_fservices_area_settings_advance', array(
            'sanitize_callback' => 'educenter_sanitize_repeater',
            'transport' => 'postMessage',
            'default' => json_encode( array(
                array(
                    'services_icon' => 'fa fa-desktop',
                    'title' => '' ,
                    'link' => ''
                    )
                ) )        
            ));

            /** advacne */
            $wp_customize->add_control( new Educenter_Repeater_Control( $wp_customize, 'educenter_fservices_area_settings_advance', array(
            'label'   => esc_html__('Features Services','educenter'),
            'section' => 'educenter_fservices_settings',
            'settings' => 'educenter_fservices_area_settings_advance',
            'box_label' => esc_html__('Features Service', 'educenter'),
            'add_label' => esc_html__('Add New', 'educenter'),
            ),
            array(
                'services_icon' => array(
                    'type'      => 'icon',
                    'label'     => esc_html__( 'Select Services Icon', 'educenter' ),
                    'default'   => 'fa fa-desktop'
                ),
                'title' => array(
                    'type'      => 'text',
                    'label'     => esc_html__( 'Title', 'educenter' )
                ),
                'link' => array(
                'type'      => 'url',
                'label'     => esc_html__( 'Link', 'educenter' )
            ),      
        )));

        
        $wp_customize->selective_refresh->add_partial('educenter_homepage_service_refresh', array(
            'settings' => array('educenter_fservices_area_options',
                                'educenter_banner_all_sliders', 
                                'educenter_homepage_service_type',
                                'educenter_fservices_area_settings',
                                'educenter_fservices_area_settings_advance',
                                'educenter_homepage_service_slider_item',
                                'educenter_fservices_section_seperator',
                                'educenter_fservices_top_seperator',
                                'educenter_fservices_bottom_seperator'
                            ),
            'selector' => '#edu-fservices-section',
            'container_inclusive' => false,
            'render_callback' => function() {
                return educenter_features_services_section();
            }
            
        ));

        $wp_customize->add_setting('educenter_fservices_settings_upgrade_text', array(
            'sanitize_callback' => 'educenter_sanitize_text'
        ));

        $wp_customize->add_control(new Educenter_Upgrade_Text($wp_customize, 'educenter_fservices_settings_upgrade_text', array(
            'section' => 'educenter_fservices_settings',
            'label' => esc_html__('For more layouts and settings,', 'educenter'),
            'choices' => array(
                esc_html__('Switch betweeen Slide View and List View', 'educenter'),
                esc_html__('Includes color selection option', 'educenter'),
                esc_html__('Dynamic text editor option for bubble text', 'educenter'),
            ),
            'priority' => 300
        )));