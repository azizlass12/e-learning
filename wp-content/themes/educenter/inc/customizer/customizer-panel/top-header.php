<?php
    /**
	 * Top Header 
	*/
    $wp_customize->add_section(new Educenter_Toggle_Section($wp_customize, 'educenter_top_header', array(
        'title' =>	esc_html__('Top Header Settings','educenter'),
        'panel' => 'educenter_header_general_settings',
        'priority' => 1,
        'hiding_control' => 'educenter_top_header'
    )));
    $wp_customize->add_setting('educenter_top_header_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Educenter_Custom_Control_Tab($wp_customize, 'educenter_top_header_nav', array(
        'type' => 'tab',
        'section' => 'educenter_top_header',
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'educenter'),
                'fields' => array(
                    'educenter_top_header',
                    'educenter_top_header_hide_show',
                    'educenter_topheader_left',
                    'educenter_topheader_right',
                    'educenter_topheader_heading',
                    'educenter_topheader_social_link',
                    'educenter_topheader_quick_link',
                    'educenter_topheader_free_hand'
                ),
                'active' => true,
            ),
            array(
                'name' => esc_html__('Style', 'educenter'),
                'fields' => array(
                    'educenter_th_bg_color',
                    'educenter_th_text_color',
                    'educenter_th_anchor_color',
                ),
            ),
            array(
                'name' => esc_html__("Advance", 'educenter'),
                'fields' => array(
                    'educenter_th_content_heading',
                    'educenter_th_content_padding',
                    'educenter_th_content_margin',
                    'educenter_th_content_radius',
                )
            )
        ),
    )));

    /*****
     * Top Header Setting
    */
    $wp_customize->add_setting('educenter_top_header', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 'disable',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new Educenter_Switch_Control($wp_customize, 'educenter_top_header', array(
        'section' => 'educenter_top_header',
        'label' => esc_html__('Enable Top Header', 'educenter'),
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'educenter'),
            'disable' => esc_html__('No', 'educenter')
        )
    )));

    // hide show 
    $wp_customize->add_setting( 'educenter_top_header_hide_show',
        array(
            'default' => json_encode(array(
                'desktop' => 'show',
                'tablet' => 'hide',
                'mobile' => 'hide'
            )),
            'sanitize_callback' => 'educenter_sanitize_field_responsive_buttonset',
            'transport'         => 'postMessage',
        )
    );
    $wp_customize->add_control(new Educenter_Custom_Control_Responsive_Buttonset( $wp_customize, 'educenter_top_header_hide_show',
            array(
                'choices'  => array(
                    'show' => esc_html__( 'Show', 'educenter' ),
                    'hide' => esc_html__( 'Hide', 'educenter' ),
                ),
                'label'    => esc_html__( 'Hide/Show', 'educenter' ),
                'section' => 'educenter_top_header',
            )
        )
    );



	$topheader_options = array(
        'none' => esc_html__('None', 'educenter'),
        'quick_contact' => esc_html__('Quick Contact Information', 'educenter'),
        'social_media'  => esc_html__('Social Media Links', 'educenter'),
        'top_menu'  => esc_html__('Top Menu Nav', 'educenter'),
        'free_hand'  => esc_html__('Free Hand', 'educenter'),
    );
		// Top Header Left Side Options.
		$wp_customize->add_setting('educenter_topheader_left', array(
		    'default' => 'quick_contact',
            'transport' => 'postMessage',
		    'sanitize_callback' => 'sanitize_text_field'        //done
		));
		$wp_customize->add_control('educenter_topheader_left', array(
		    'label' => esc_html__('Top Header Left Side', 'educenter'),
		    'section' => 'educenter_top_header',
		    'type' => 'select',
		    'choices' => $topheader_options
		));
        

		// Top Header Right Side Options.
		$wp_customize->add_setting('educenter_topheader_right', array(
		    'default' => 'social_media',
            'transport' => 'postMessage',
		    'sanitize_callback' => 'sanitize_text_field'        //done
		));
		$wp_customize->add_control('educenter_topheader_right', array(
		    'label' => esc_html__('Top Header Right Side', 'educenter'),
		    'section' => 'educenter_top_header',
		    'type' => 'select',
		    'choices' => $topheader_options
		));
        
        
        $wp_customize->selective_refresh->add_partial( 'educenter_topheader_right', array (
            'settings' => array(
                'educenter_top_header', 
                'educenter_topheader_right',
                'educenter_topheader_left',
                'educenter_topheader_free_hand',
            ),
            'selector' => '#masthead-header',
            'fallback_refresh' => true,
            'render_callback' => function () {
               return do_action( 'educenter_header' ); 
            }
        ));

		$wp_customize->add_setting('educenter_topheader_heading', array(
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control(new Educenter_Customize_Heading($wp_customize, 'educenter_topheader_heading', array(
			'section' => 'educenter_top_header',
			'label' => esc_html__('Links', 'educenter')
		)));
		$wp_customize->add_setting('educenter_topheader_social_link', array(
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control(new Educenter_Info_Text($wp_customize, 'educenter_topheader_social_link', array(
			'label' => esc_html__('Social Icons', 'educenter'),
			'section' => 'educenter_top_header',
			'description' => sprintf(esc_html__('Add your %s here', 'educenter'), '<a href="#" target="_blank">Social Icons</a>')
		)));
        
		$wp_customize->add_setting('educenter_topheader_quick_link', array(
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control(new Educenter_Info_Text($wp_customize, 'educenter_topheader_quick_link', array(
			'label' => esc_html__('Quick Info', 'educenter'),
			'section' => 'educenter_top_header',
			'description' => sprintf(esc_html__('Add your %s here', 'educenter'), '<a href="#" target="_blank">Quick Info</a>')
		)));

        $wp_customize->add_setting('educenter_topheader_free_hand', array(
			'sanitize_callback' => 'educenter_sanitize_text',
			'default' => esc_html__('Need Any Help: +1-559-236-8009 or help@example.com', 'educenter'),
			'transport' => 'postMessage'
		));
        $wp_customize->add_control('educenter_topheader_free_hand', array(
		    'label' => esc_html__('Free hand', 'educenter'),
		    'section' => 'educenter_top_header',
		    'type' => 'textarea'
		));

        /*******
         *  Top Header Style 
        */
        $wp_customize->add_setting('educenter_th_bg_color', array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'educenter_sanitize_color_alpha',
        ));
        $wp_customize->add_control(new Educenter_Alpha_Color_Control($wp_customize, 'educenter_th_bg_color', array(
            'label' => esc_html__('Background', 'educenter'),
            'section' => 'educenter_top_header',
            'palette' => array(
                '#FFFFFF',
                '#000000',
                '#f5245f',
                '#1267b3',
                '#feb600',
                '#00C569',
                'rgba( 255, 255, 255, 0.2 )',
                'rgba( 0, 0, 0, 0.2 )'
            )
        )));
        $wp_customize->add_setting('educenter_th_text_color', array(
            'default' => '#FFFFFF',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'educenter_th_text_color', array(
            'section' => 'educenter_top_header',
            'label' => esc_html__('Color', 'educenter')
        )));
        $wp_customize->add_setting('educenter_th_anchor_color', array(
            'default' => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'educenter_th_anchor_color', array(
            'section' => 'educenter_top_header',
            'label' => esc_html__('Anchor(Link)', 'educenter')
        )));
        
        /********
         *  Container Settings 
        */
        $wp_customize->add_setting("educenter_th_content_heading", array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control(new Educenter_Customize_Heading($wp_customize, "educenter_th_content_heading", array(
            'section' => 'educenter_top_header',
            'label' => esc_html__('Content Area', 'educenter'),
            'priority' => 152
        )));

        $wp_customize->add_setting(
            "educenter_th_content_padding",
            array(
                'transport' => 'postMessage',
                'sanitize_callback' => 'educenter_sanitize_field_default_css_box'
            )
        );
        $wp_customize->add_control(
            new Educenter_Custom_Control_Cssbox(
                $wp_customize,
                "educenter_th_content_padding",
                array(
                    'label'    => esc_html__( 'Padding (px)', 'educenter' ),
                    'section' => 'educenter_top_header',
                    'settings' => "educenter_th_content_padding",
                    'priority' => 152
                ),
                array(),
                array()
            )
        );

        $wp_customize->add_setting(
            "educenter_th_content_margin",
            array(
                'transport' => 'postMessage',
                'sanitize_callback' => 'educenter_sanitize_field_default_css_box'
            )
        );
        $wp_customize->add_control(
            new Educenter_Custom_Control_Cssbox(
                $wp_customize,
                "educenter_th_content_margin",
                array(
                    'label'    => esc_html__( 'Margin (px)', 'educenter' ),
                    'section' => 'educenter_top_header',
                    'settings' => "educenter_th_content_margin",
                    'priority' => 152
                ),
                array(),
                array()
            )
        );

        $wp_customize->add_setting(
            "educenter_th_content_radius",
            array(
                'transport' => 'postMessage',
                'sanitize_callback' => 'educenter_sanitize_field_default_css_box'
            )
        );
        $wp_customize->add_control(
            new Educenter_Custom_Control_Cssbox(
                $wp_customize,
                "educenter_th_content_radius",
                array(
                    'label'    => esc_html__( 'Radius(px)', 'educenter' ),
                    'section' => 'educenter_top_header',
                    'settings' => "educenter_th_content_radius",
                    'priority' => 152
                ),
                array(),
                array()
            )
        );