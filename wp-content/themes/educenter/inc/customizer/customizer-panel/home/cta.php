<?php
	/******
	 * Call To Action Section
	*/
	$wp_customize->add_section(new Educenter_Toggle_Section($wp_customize, 'educenter_cta_settings', array(
		'title'		=> 	esc_html__('Call To Action','educenter'),
		'panel'		=> 'educenter_homepage_settings',
		'priority'  => educenter_get_section_position('educenter_cta_settings'),
		'hiding_control' => 'educenter_cta_area_options'
    )));

    $wp_customize->add_setting('educenter_cta_settings_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control(new Educenter_Custom_Control_Tab($wp_customize, 'educenter_cta_settings_nav', array(
        'type' => 'tab',
        'section' => 'educenter_cta_settings',
        'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'educenter'),
                'fields' => array(
					'educenter_cta_pageid',
					'educenter_cta_button_url',
					'educenter_cta_button_one_text',
					'educenter_cta_button_two_url',
					'educenter_calltoaction_image',
					'educenter_cta_alignment',
					'educenter_cta_layout',
					'educenter_cta_title_font_size',
					'educenter_cta_desc_font_size',
					'educenter_calltoaction_image_style',
                ),
                'active' => true,
            ),
            array(
                'name' => esc_html__('Style', 'educenter'),
                'fields' => array(
					'educenter_cta_icon_style',
					'educenter_cta_cs_heading',
					'educenter_cta_super_title_color',
					'educenter_cta_title_color',
					'educenter_cta_text_color',
					'educenter_cta_link_color',
					'educenter_cta_link_hover_color',
				)
            ),
            array(
                'name' => esc_html__('Advanced', 'educenter'),
                'fields' => array(
					'educenter_cta_padding',
                    'educenter_cta_bg_type',
                    'educenter_cta_bg_color',
                    'educenter_cta_bg_gradient',
                    'educenter_cta_bg_image',
                    'educenter_cta_bg_video',
                    'educenter_cta_overlay_color',
					'educenter_cta_content_heading',
					'educenter_cta_content_bg_type',
                    'educenter_cta_content_bg_color',
                    'educenter_cta_content_bg_gradient',
					'educenter_cta_content_padding',
					'educenter_cta_content_margin',
					'educenter_cta_content_radius',
                    'educenter_cta_cs_seperator',
					'educenter_cta_seperator0',
					'educenter_cta_section_seperator',
					'educenter_cta_seperator1',
					'educenter_cta_top_seperator',
					'educenter_cta_ts_color',
					'educenter_cta_ts_height',
					'educenter_cta_seperator2',
					'educenter_cta_bottom_seperator',
					'educenter_cta_bs_color',
					'educenter_cta_bs_height'
                ),
            ),
        ),
    )));
	
		/**
         * Enable/Disable Option
         *
         * @since 1.0.0
        */
        $wp_customize->add_setting('educenter_cta_area_options', array(
		    'default' => 'enable',
			'transport' => 'postMessage',
		    'sanitize_callback' => 'sanitize_text_field',     //done
		));

		$wp_customize->add_control(new Educenter_Switch_Control($wp_customize, 'educenter_cta_area_options', array(
		    'label' => esc_html__('Enable', 'educenter'),
		    'section' => 'educenter_cta_settings',
		    'switch_label' => array(
		        'enable' => esc_html__('Yes', 'educenter'),
		        'disable' => esc_html__('No', 'educenter'),
		    ),
		)));
		
		
		
		$wp_customize->add_setting( 'educenter_cta_pageid', array(
			'sanitize_callback' => 'absint',
			'transport' => 'postMessage',
		) );

		$wp_customize->add_control( 'educenter_cta_pageid', array(
			'type' => 'dropdown-pages',
			'section' => 'educenter_cta_settings',
			'label' => esc_html__( 'Select Call To Action Pages','educenter' )
		) );

		$wp_customize->add_setting('educenter_cta_button_url', array(
			'default'       =>      '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'esc_url_raw'
		));

		$wp_customize->add_control('educenter_cta_button_url', array(
			'section'    => 'educenter_cta_settings',
			'label'      => esc_html__('Enter Button One URL', 'educenter'),
			'type'       => 'url'  
		));


		$wp_customize->add_setting('educenter_cta_button_one_text', array(
			'default'       =>      '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field'
		));

		$wp_customize->add_control('educenter_cta_button_one_text', array(
			'section'    => 'educenter_cta_settings',
			'label'      => esc_html__('Enter Button Two Text', 'educenter'),
			'type'       => 'text'  
		));

		
		$wp_customize->add_setting('educenter_cta_button_two_url', array(
			'default'       =>      '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'esc_url_raw'
		));

		$wp_customize->add_control('educenter_cta_button_two_url', array(
			'section'    => 'educenter_cta_settings',
			'label'      => esc_html__('Enter Button Two URL', 'educenter'),
			'type'       => 'url'  
		));

		$wp_customize->add_setting('educenter_calltoaction_image', array(
			'transport' => 'postMessage',
			'sanitize_callback'	=> 'esc_url_raw'		//done
		));
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'educenter_calltoaction_image', array(
			'label'	   => esc_html__('Image','educenter'),
			'section'  => 'educenter_cta_settings'
		)));
		

		/** alignment */
        $wp_customize->add_setting(
            'educenter_cta_alignment',
            array(
                'default'           => 'text-center',
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage',
            )
        );
        $wp_customize->add_control(
            new Educenter_Custom_Control_Buttonset(
                $wp_customize,
                'educenter_cta_alignment',
                array(
                    'choices'  => array(
                        'text-left' => esc_html__('Left', 'educenter'),
                        'text-right' => esc_html__('Right', 'educenter'),
                        'text-center' => esc_html__('Center', 'educenter'),
                    ),
                    'label'    => esc_html__( 'Alignment', 'educenter' ),
                    'section'  => 'educenter_cta_settings',
                    'settings' => 'educenter_cta_alignment',
                )
            )
        );
		
		$wp_customize->add_setting('educenter_cta_layout', array(
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'postMessage',
			'default' => 'cta-center'
		));

		$wp_customize->add_control(new Educenter_Selector($wp_customize, 'educenter_cta_layout', array(
            'section' => 'educenter_cta_settings',
            'label' => esc_html__('Layout', 'educenter'),
            'options' => array(
				'cta-center' => get_template_directory_uri() . '/inc/customizer/images/footer/col-1-1.jpg',
                'cta-left' => get_template_directory_uri() . '/inc/customizer/images/footer/col-2-1-1.jpg',
                'cta-right' => get_template_directory_uri() . '/inc/customizer/images/footer/col-2-1-1.jpg'
            )
        )));

		/** Block Items Images Settings */
		$wp_customize->add_setting( 'educenter_calltoaction_image_style',
			array(
				'transport' => 'postMessage',
				'sanitize_callback' => 'educenter_sanitize_field_background',
				'default'           => json_encode(array(
					'margin'   	=> '',
					'padding'   => '',
					'radius'    => '',
					'bg_color'  => '',
					'height'    => '',
				)),
			)
		);
		$wp_customize->add_control( new Educenter_Custom_Control_Group($wp_customize, 'educenter_calltoaction_image_style',
			array(
				'label'    => esc_html__( 'Image Settings', 'educenter' ),
				'section'  => 'educenter_cta_settings',
				'settings' => 'educenter_calltoaction_image_style',
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
				'height' => array(
					'type'  => 'number',
					'label' => esc_html__( 'Height(px)', 'educenter' ),
				),
			))
		);

		$wp_customize->selective_refresh->add_partial( "educenter_calltoaction_refresh", array (
			'settings' => array(
				'educenter_cta_area_options',
				'educenter_cta_pageid',
				'educenter_cta_button_url',
				'educenter_cta_button_one_text',
				'educenter_cta_button_two_url',
				'educenter_calltoaction_image',
				'educenter_cta_alignment',
				'educenter_cta_layout',


				'educenter_cta_section_seperator',
				'educenter_cta_top_seperator',
				'educenter_cta_bottom_seperator'

			),
			'selector' => "#edu-cta-section",
			'fallback_refresh' => true,
			'container_inclusive' => true,
			'render_callback' => function () {
				return do_action( 'educenter_calltoaction');
			}
		));


		$wp_customize->add_setting('educenter_cta_settings_upgrade_text', array(
			'sanitize_callback' => 'educenter_sanitize_text'
		));

		$wp_customize->add_control(new Educenter_Upgrade_Text($wp_customize, 'educenter_cta_settings_upgrade_text', array(
			'section' => 'educenter_cta_settings',
			'label' => esc_html__('For more layouts and settings,', 'educenter'),
			'choices' => array(
				esc_html__('Two diffrent layout', 'educenter'),
				esc_html__('Font Size Option', 'educenter'),
				esc_html__('Position Option', 'educenter'),
				esc_html__('Video Option', 'educenter'),
				esc_html__('Bakground - image, video, gradient', 'educenter'),
				esc_html__('Margin, Padding, Radious Option', 'educenter'),
				esc_html__('Button Color, margin, padding, radious option', 'educenter'),
				esc_html__('And many more...', 'educenter'),
			),
			'priority' => 300
		)));