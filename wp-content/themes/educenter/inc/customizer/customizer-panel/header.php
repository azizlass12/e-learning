<?php
    /**
	 * Header Layout Settings
	*/
	$wp_customize->add_section('educenter_header', array(
		'title'		=>	esc_html__('Header Settings','educenter'),
		'panel'		=> 'educenter_header_general_settings',
	));
    $wp_customize->add_setting('educenter_header_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
        'priority' => -1,
    ));
    $wp_customize->add_control(new Educenter_Custom_Control_Tab($wp_customize, 'educenter_header_nav', array(
        'type' => 'tab',
        'section' => 'educenter_header',
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'educenter'),
                'fields' => array(
                    'educenter_main_header_sticky',
                    'educenter_sidebar_sticky',
                    'educenter_menu_absolute',
                    
                ),
                'active' => true,
            ),
            array(
                'name' => esc_html__('Style', 'educenter'),
                'fields' => array(
                    'educenter_header_bg_heading',
                    'educenter_hamburger_color',
                    'educenter_header_bg_type',
                    'educenter_header_bg_color',
                    'educenter_header_bg_gradient',
                    'educenter_header_background_image',
                    'educenter_header_bg_image',
                    'educenter_header_overlay_color',
                    'educenter_header_margin_padding',
                ),
            ),
            array(
                'name' => esc_html__('Menu Style', 'educenter'),
                'fields' => array(
                    'educenter_menu',
                    'educenter_header_nav_color_heading',
                    'educenter_header_nav_container_bg_color',
                    'educenter_header_nav_hover_group',
                    'educenter_header_item_group',
                    'educenter_header_sub_item_group',
                    'educenter_header_container_nav_radius',
                    'educenter_header_nav_item_radius'
                )
            )
        ),
    )));
		
        $wp_customize->add_setting('educenter_main_header_sticky', array(
		    'default' => 'disable',
			// 'transport' => 'postMessage',
		    'sanitize_callback' => 'sanitize_text_field',     //done
		));
		$wp_customize->add_control(new Educenter_Switch_Control($wp_customize, 'educenter_main_header_sticky', array(
		    'label'  =>  esc_html__('Sticky Menu', 'educenter'),
		    'section' => 'educenter_header',
		    'switch_label' => array(
		        'enable' => esc_html__('Yes', 'educenter'),
		        'disable' => esc_html__('No', 'educenter'),
		    ),
		)));
        
        $wp_customize->add_setting('educenter_sidebar_sticky', array(
		    'default' => 'disable',
			// 'transport' => 'postMessage',
		    'sanitize_callback' => 'sanitize_text_field',     //done
		));
		$wp_customize->add_control(new Educenter_Switch_Control($wp_customize, 'educenter_sidebar_sticky', array(
		    'label'  =>  esc_html__('Sidebar Sticky', 'educenter'),
		    'section' => 'educenter_header',
		    'switch_label' => array(
		        'enable' => esc_html__('Yes', 'educenter'),
		        'disable' => esc_html__('No', 'educenter'),
		    ),
		)));

        $wp_customize->add_setting('educenter_menu_absolute', array(
		    'default' => 'disable',
			'transport' => 'postMessage',
		    'sanitize_callback' => 'sanitize_text_field',     //done
		));

		$wp_customize->add_control(new Educenter_Switch_Control($wp_customize, 'educenter_menu_absolute', array(
		    'label' => esc_html__('Over Nav', 'educenter'),
		    'section' => 'educenter_header',
		    'switch_label' => array(
		        'enable' => esc_html__('Yes', 'educenter'),
		        'disable' => esc_html__('No', 'educenter'),
		    ),
		)));


        $wp_customize->add_setting('educenter_main_header_upgrade_text', array(
            'sanitize_callback' => 'educenter_sanitize_text'
        ));

        $wp_customize->add_control(new Educenter_Upgrade_Text($wp_customize, 'educenter_main_header_upgrade_text', array(
            'section' => 'educenter_header',
            'label' => esc_html__('For more header settings,', 'educenter'),
            'choices' => array(
                esc_html__('Includes Left Settings and Right Settings', 'educenter'),
                esc_html__('Includes options for social icons', 'educenter'),
                esc_html__('Includes options for top nav menu', 'educenter'),
                esc_html__('Includes options for quick information', 'educenter'),
                esc_html__('Dynamic text editor option for bubble text', 'educenter'),
            ),
            'priority' => 100
        )));
        

         //heading
        $wp_customize->add_setting('educenter_header_bg_heading', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control(new Educenter_Customize_Heading($wp_customize, 'educenter_header_bg_heading', array(
            'section' => 'educenter_header',
            'label' => esc_html__('Header Background', 'educenter')
        )));

        $wp_customize->add_setting("educenter_hamburger_color", array(
            'default' => '#ffc107',
            'sanitize_callback' => 'educenter_sanitize_color_alpha',
            'transport' => 'postMessage'
        ));
        
        $wp_customize->add_control(new Educenter_Alpha_Color_Control($wp_customize, "educenter_hamburger_color", array(
            'section' => 'educenter_header',
            'label' => esc_html__('Hamburger Color(Mobile)', 'educenter'),
        )));

        // background 
        $wp_customize->add_setting("educenter_header_bg_type", array(
            'default' => 'none',
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_control("educenter_header_bg_type", array(
            'section' => 'educenter_header',
            'type' => 'select',
            'label' => esc_html__('Background Type', 'educenter'),
            'choices' => array(
                'none'     => esc_html__('Default', 'educenter'),
                'color-bg' => esc_html__('Color Background', 'educenter'),
                'image-bg' => esc_html__('Image Background', 'educenter'),
                'gradient-bg' => esc_html__('Gradient Background(Pro)', 'educenter'),
                'video-bg' => esc_html__('Video Background(Pro)', 'educenter'),
            ),
        ));

        $wp_customize->add_setting("educenter_header_bg_color", array(
            'default' => '#f2f4f6',
            'sanitize_callback' => 'educenter_sanitize_color_alpha',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_control(new Educenter_Alpha_Color_Control($wp_customize, "educenter_header_bg_color", array(
            'section' => 'educenter_header',
            'label' => esc_html__('Background Color', 'educenter'),
        )));

        // Registers example_background settings
        $wp_customize->add_setting("educenter_header_background_image", array(
            'sanitize_callback' => 'esc_url_raw',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_setting("educenter_header_background_image_id", array(
            'sanitize_callback' => 'absint',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_setting("educenter_header_background_image_repeat", array(
            'default' => 'no-repeat',
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_setting("educenter_header_background_image_size", array(
            'default' => 'cover',
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_setting("educenter_header_background_image_position", array(
            'default' => 'center center',
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_setting("educenter_header_background_image_attach", array(
            'default' => 'fixed',
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        ));
        // Registers example_background control
        $wp_customize->add_control(new Educenter_Background_Control($wp_customize, "educenter_header_bg_image", array(
            'label' => esc_html__('Background Image', 'educenter'),
            'transport' => 'postMessage',
            'section' => 'educenter_header',
            'settings' => array(
                'image_url' => "educenter_header_background_image",
                'image_id' => "educenter_header_background_image_id",
                'repeat' => "educenter_header_background_image_repeat", // Use false to hide the field
                'size' => "educenter_header_background_image_size",
                'position' => "educenter_header_background_image_position",
                'attach' => "educenter_header_background_image_attach"
            ),
        )));


        $wp_customize->add_setting("educenter_header_overlay_color", array(
            'default' => 'rgba(255,255,255,0)',
            'sanitize_callback' => 'educenter_sanitize_color_alpha',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_control(new Educenter_Alpha_Color_Control($wp_customize, "educenter_header_overlay_color", array(
            'label' => esc_html__('Background Overlay Color', 'educenter'),
            'section' => "educenter_header",
            'palette' => array(
                'rgb(255, 255, 255, 0.3)', // RGB, RGBa, and hex values supported
                'rgba(0, 0, 0, 0.3)',
                'rgba( 255, 255, 255, 0.2 )', // Different spacing = no problem
                '#00CC99', // Mix of color types = no problem
                '#00C439',
                '#00C569',
                'rgba( 255, 234, 255, 0.2 )', // Different spacing = no problem
                '#AACC99', // Mix of color types = no problem
                '#33C439',
            )
        )));

        $wp_customize->add_setting( 'educenter_header_margin_padding',
            array(
                'sanitize_callback' => 'educenter_sanitize_field_background',
                'transport' => 'postMessage',
                'default'           => json_encode(array(
                    'padding'   => '',
                    'margin' => '',
                    'radius' => '',
                )),
            )
        );
        $wp_customize->add_control(new Educenter_Custom_Control_Group($wp_customize,'educenter_header_margin_padding',
                array(
                    'label'    => esc_html__( 'Margin/Padding', 'educenter' ),
                    'section'  => 'educenter_header',
                    'settings' => 'educenter_header_margin_padding',
                ),
                array(
                    'margin'      => array(
                        'type'  => 'cssbox',
                        'label' => esc_html__( 'Margin(px)', 'educenter' ),
                    ),
                    'padding' => array(
                        'type'  => 'cssbox',
                        'label' => esc_html__( 'Padding(px)', 'educenter' ),
                    ),
                    'radius' => array(
                        'type'  => 'pro',
                        'label' => esc_html__( 'Radius(px)', 'educenter' ),
                    )
                )
            )
        );

        /******
         *  Menu Style Settings 
        */
        $wp_customize->add_setting('educenter_header_nav_color_heading', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));
        $wp_customize->add_control(new Educenter_Customize_Heading($wp_customize, 'educenter_header_nav_color_heading', array(
            'section' => 'educenter_header',
            'label' => esc_html__('Menu Color', 'educenter')
        )));



        $wp_customize->add_setting( 'educenter_header_item_group',
            array(
                'sanitize_callback' => 'educenter_sanitize_field_background',
                'transport' => 'postMessage',
                'default'           => json_encode(array(
                    'bg_color'   => '',
                    'color' => '',
                    'radius' => '',
                    'margin' => '',
                    'padding' => ''
                )),
            )
        );
        $wp_customize->add_control( new Educenter_Custom_Control_Group( $wp_customize, 'educenter_header_item_group',
            array(
                'label'    => esc_html__( 'Menu Item', 'educenter' ),
                'section'  => 'educenter_header',
                'settings' => 'educenter_header_item_group',
            ),
                array(
                    'bg_color'      => array(
                        'type'  => 'color',
                        'label' => esc_html__( 'Background', 'educenter' ),
                    ),
                    'color' => array(
                        'type'  => 'color',
                        'label' => esc_html__( 'Color', 'educenter' ),
                    ),
                    'padding' => array(
                        'type'  => 'cssbox',
                        'label' => esc_html__( 'Padding', 'educenter' ),
                    ),
                    'margin' => array(
                        'type'  => 'cssbox',
                        'label' => esc_html__( 'Margin', 'educenter' ),
                    ),
                    'radius' => array(
                        'type'  => 'cssbox',
                        'label' => esc_html__( 'Radius', 'educenter' ),
                    )
                )
            )
        );

        $wp_customize->add_setting( 'educenter_header_sub_item_group',
            array(
                'sanitize_callback' => 'educenter_sanitize_field_background',
                'transport' => 'postMessage',
                'default'           => json_encode(array(
                    'bg_color'   => '',
                    'color' => '',
                    'padding' => '',
                    'margin' => '',
                    'radius' => '' 
                )),
            )
        );
        $wp_customize->add_control( new Educenter_Custom_Control_Group( $wp_customize, 'educenter_header_sub_item_group',
            array(
                'label'    => esc_html__( 'Child Menu', 'educenter' ),
                'section'  => 'educenter_header',
                'settings' => 'educenter_header_sub_item_group',
            ),
                array(
                    'bg_color'      => array(
                        'type'  => 'color',
                        'label' => esc_html__( 'Background', 'educenter' ),
                    ),
                    'color' => array(
                        'type'  => 'color',
                        'label' => esc_html__( 'Color', 'educenter' ),
                    ),
                    'padding' => array(
                        'type'  => 'cssbox',
                        'label' => esc_html__( 'Padding', 'educenter' ),
                    ),
                    'margin' => array(
                        'type'  => 'cssbox',
                        'label' => esc_html__( 'Margin', 'educenter' ),
                    ),
                    'radius' => array(
                        'type'  => 'cssbox',
                        'label' => esc_html__( 'Radius', 'educenter' ),
                    )
                )
            )
        );

        $wp_customize->add_setting( 'educenter_header_nav_hover_group',
            array(
                'sanitize_callback' => 'educenter_sanitize_field_background',
                'transport' => 'postMessage',
                'default'           => json_encode(array(
                    'nav_bg_color'   => '',
                    'nav_color' => ''
                )),
            )
        );
        $wp_customize->add_control( new Educenter_Custom_Control_Group( $wp_customize, 'educenter_header_nav_hover_group',
                array(
                    'label'    => esc_html__( 'Menu Item - Hover / Active', 'educenter' ),
                    'section'  => 'educenter_header',
                    'settings' => 'educenter_header_nav_hover_group',
                    'priority' => 100,
                ),
                array(
                    'nav_bg_color'      => array(
                        'type'  => 'color',
                        'label' => esc_html__( 'Background', 'educenter' ),
                    ),
                    'nav_color' => array(
                        'type'  => 'color',
                        'label' => esc_html__( 'Color', 'educenter' ),
                    )
                )
            )
        );