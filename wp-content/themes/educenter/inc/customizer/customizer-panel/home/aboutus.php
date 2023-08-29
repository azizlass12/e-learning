<?php
	/**
	 * About Us Section 
	*/
	$wp_customize->add_section(new Educenter_Toggle_Section($wp_customize, 'educenter_aboutus_settings', array(
		'title'		=>	esc_html__('About Us Section','educenter'),
		'panel'		=> 'educenter_homepage_settings',
		'priority'  => educenter_get_section_position('educenter_aboutus_settings'),
		'hiding_control' => 'educenter_aboutus_section_area_options'
	)));
	
    $wp_customize->add_setting('educenter_about_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Educenter_Custom_Control_Tab($wp_customize, 'educenter_about_nav', array(
        'type' => 'tab',
        'section' => 'educenter_aboutus_settings',
        'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'educenter'),
                'fields' => array(
					'educenter_aboutus_section_area_options',
					'educenter_aboutus_layout_design',
					'educenter_aboutus_main_title',
					'educenter_aboutus_main_subtitle',
                    'educenter_about',
					'educenter_aboutus_page_features_image',
					'educenter_aboutus_area_settings',
                    'educenter_aboutus_counter',
					'educenter_aboutus_counter_heading',
                    'educenter_aboutus_counter_enable',
                    'educenter_aboutus_profile_name',
					'educenter_aboutus_profile_role',
					'educenter_aboutus_profile_image',
					'educenter_aboutus_signature',
					'educenter_aboutus_signature_enable',
                ),
                'active' => true,
            ),
            array(
                'name' => esc_html__('Style', 'educenter'),
                'fields' => array(
					'educenter_aboutus_cs_heading',
                    'educenter_aboutus_super_title_color',
                    'educenter_aboutus_title_color',
					'educenter_aboutus_text_color',
					'educenter_aboutus_link_color',
					'educenter_aboutus_link_hover_color',
                ),
            ),
            array(
                'name' => esc_html__('Advanced', 'educenter'),
                'fields' => array(
					'educenter_aboutus_bg_type',
                    'educenter_aboutus_bg_color',
                    'educenter_aboutus_bg_gradient',
                    'educenter_aboutus_bg_image',
                    'educenter_aboutus_bg_video',
                    'educenter_aboutus_overlay_color',

                    'educenter_aboutus_content_heading',
					'educenter_aboutus_content_bg_type',
                    'educenter_aboutus_content_bg_color',
                    'educenter_aboutus_content_bg_gradient',
					'educenter_aboutus_content_padding',
					'educenter_aboutus_content_margin',
					'educenter_aboutus_content_radius',

                    'educenter_aboutus_padding',
					'educenter_aboutus_cs_seperator',
                    'educenter_aboutus_seperator0',
                    'educenter_aboutus_section_seperator',
                    'educenter_aboutus_seperator1',
                    'educenter_aboutus_top_seperator',
                    'educenter_aboutus_ts_color',
                    'educenter_aboutus_ts_height',
                    'educenter_aboutus_seperator2',
                    'educenter_aboutus_bottom_seperator',
                    'educenter_aboutus_bs_color',
                    'educenter_aboutus_bs_height'
                ),
            ),
        ),
    )));
    	/**
         * Enable/Disable Option
         *
         * @since 1.0.0
        */
        $wp_customize->add_setting('educenter_aboutus_section_area_options', array(
		    'default' => 'enable',
			'transport' => 'postMessage',
		    'sanitize_callback' => 'sanitize_text_field',     //done
		));
		$wp_customize->add_control(new Educenter_Switch_Control($wp_customize, 'educenter_aboutus_section_area_options', array(
		    'label' => esc_html__('Enable', 'educenter'),
		    'section' => 'educenter_aboutus_settings',
		    'switch_label' => array(
		        'enable' => esc_html__('Yes', 'educenter'),
		        'disable' => esc_html__('No', 'educenter'),
		    ),
        )));

        

		$wp_customize->add_setting( 'educenter_aboutus_main_title', array(
			'sanitize_callback' => 'sanitize_text_field', 	 //done	
			'transport' => 'postMessage'
		));

		$wp_customize->add_control('educenter_aboutus_main_title', array(
			'label'		=> esc_html__( 'Main Ttile', 'educenter' ),
			'section' => 'educenter_aboutus_settings',
			'type'      => 'text',
		));

		$wp_customize->add_setting('educenter_aboutus_main_subtitle', array(
			'default'       =>  '',
			'sanitize_callback' => 'sanitize_text_field'
		));

		$wp_customize->add_control('educenter_aboutus_main_subtitle', array(
			'section' => 'educenter_aboutus_settings',
			'label'      => esc_html__('Sub Title', 'educenter'),
			'type'       => 'text'  
		));

		// About Us Page.
		$wp_customize->add_setting( 'educenter_about', array(
			'transport' => 'postMessage',
			'sanitize_callback' => 'absint'			//done
		) );
		$wp_customize->add_control( 'educenter_about', array(
			'label'    => esc_html__( 'Select Page ', 'educenter' ),
			'section' => 'educenter_aboutus_settings',
			'type'     => 'dropdown-pages'
		));

		$wp_customize->add_setting('educenter_aboutus_layout_design', array(
            'default' => 'right-image',
			'transport' => 'postMessage',
            'sanitize_callback' => 'educenter_sanitize_options'
        ));
        $wp_customize->add_control(new Educenter_Selector($wp_customize, 'educenter_aboutus_layout_design', array(
            'section' => 'educenter_aboutus_settings',
            'label' => esc_html__('Layout', 'educenter'),
            'options' => array(
                'full-width' => get_template_directory_uri() . '/inc/customizer/images/footer/col-1-1.jpg',
                'right-image' => get_template_directory_uri() . '/inc/customizer/images/footer/col-2-1-1.jpg',
                'left-image' => get_template_directory_uri() . '/inc/customizer/images/footer/col-2-1-1.jpg',
            )
        )));
		
		// About Us Image.
		$wp_customize->add_setting('educenter_aboutus_page_features_image', array(
			'transport' => 'postMessage',
			'sanitize_callback'	=> 'esc_url_raw'		//done
		));
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'educenter_aboutus_page_features_image', array(
			'label'	   => esc_html__('Upload About Features Image','educenter'),
			'section' => 'educenter_aboutus_settings',
		)));

		 /**
		 * About Us Pages Area
		*/
		$wp_customize->add_setting( 'educenter_aboutus_area_settings', array(
			'sanitize_callback' => 'educenter_sanitize_repeater',
			'transport' => 'postMessage',
			'default' => json_encode( array(
			array(
					'about_icon' => 'fa fa-desktop',
					'about_page' => 0, 
				)
			) )        
		));

		$wp_customize->add_control( new Educenter_Repeater_Control( $wp_customize, 'educenter_aboutus_area_settings', array(
				'label'   => esc_html__('Tabs','educenter'),
				'section' => 'educenter_aboutus_settings',
				'settings' => 'educenter_aboutus_area_settings',
				'box_label' => esc_html__('Tab','educenter'),
				'add_label' => esc_html__('Add New','educenter'),
			),
			array(
				'about_icon' => array(
					'type'      => 'icon',
					'label'     => esc_html__( 'Icon', 'educenter' ),
					'default'   => 'fa fa-desktop'
				),
				'about_page' => array(
					'type'      => 'select',
					'label'     => esc_html__( 'Page', 'educenter' ),
					'options'   => $slider_pages
				)          
		) ) );

		$wp_customize->add_setting('educenter_aboutus_settings_upgrade_text', array(
			'sanitize_callback' => 'educenter_sanitize_text'
		));

		$wp_customize->add_control(new Educenter_Upgrade_Text($wp_customize, 'educenter_aboutus_settings_upgrade_text', array(
			'section' => 'educenter_aboutus_settings',
			'label' => esc_html__('For more layouts and settings,', 'educenter'),
			'choices' => array(
				esc_html__('Features Two different Layouts', 'educenter'),
				esc_html__('Dynamic text editor option for bubble text', 'educenter'),
				esc_html__('Typography Option', 'educenter'),
				esc_html__('Advance Text input fields', 'educenter'),
			),
			'priority' => 300
		)));

		

		$wp_customize->add_setting('educenter_aboutus_counter_enable', array(
		    'default' => 'enable',
			'transport' => 'postMessage',
		    'sanitize_callback' => 'sanitize_text_field',     //done
		));
		$wp_customize->add_control(new Educenter_Switch_Control($wp_customize, 'educenter_aboutus_counter_enable', array(
		    'label' => esc_html__('Counter Blocks', 'educenter'),
		    'section' => 'educenter_aboutus_settings',
		    'switch_label' => array(
		        'enable' => esc_html__('Show', 'educenter'),
		        'disable' => esc_html__('Hide', 'educenter'),
		    ),
        )));

		// About Us Counter
		$wp_customize->add_setting('educenter_aboutus_counter', array(
		    'sanitize_callback' => 'educenter_sanitize_repeater',		//done
			'transport' => 'postMessage',
		    'default' => json_encode(array(
		        array(
					'icon' => '',
		            'title'  =>'',
		            'number'  =>''          
		        )
		    ))
		));

		$wp_customize->add_control(new Educenter_Repeater_Control($wp_customize, 'educenter_aboutus_counter', 
			array(
			    'label' 	   => esc_html__('Counter', 'educenter'),
			    'section' => 'educenter_aboutus_settings',
			    'settings' 	   => 'educenter_aboutus_counter',
			    'box_label' => esc_html__('Counter Settings', 'educenter'),
			    'add_label' => esc_html__('Add New', 'educenter')
			),
		    array(
				'icon' => array(
		            'type' => 'icon',
		            'label' => esc_html__('Icon', 'educenter'),
		            'default' => ''
		        ),
		        'title' => array(
		            'type' => 'text',
		            'label' => esc_html__('Title', 'educenter'),
		            'default' => ''
		        ),
		        'number' => array(
		            'type' => 'text',
		            'label' => esc_html__('Number', 'educenter'),
		            'default' => ''
		        )
			)
		));
        

		$wp_customize->add_setting('educenter_aboutus_signature_enable', array(
		    'default' => 'enable',
			'transport' => 'postMessage',
		    'sanitize_callback' => 'sanitize_text_field',     //done
		));
		$wp_customize->add_control(new Educenter_Switch_Control($wp_customize, 'educenter_aboutus_signature_enable', array(
		    'label' => esc_html__('Signature Blocks', 'educenter'),
		    'section' => 'educenter_aboutus_settings',
		    'switch_label' => array(
		        'enable' => esc_html__('Show', 'educenter'),
		        'disable' => esc_html__('Hide', 'educenter'),
		    ),
        )));

		$wp_customize->add_setting( 'educenter_aboutus_profile_image', array(
			'sanitize_callback' => 'sanitize_text_field', 	 //done	
			'transport' => 'postMessage'
		));

		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'educenter_aboutus_profile_image', array(
			'label'	   => esc_html__('Profile Image','educenter'),
			'section' => 'educenter_aboutus_settings',
		)));

		$wp_customize->add_setting( 'educenter_aboutus_profile_name', array(
			'sanitize_callback' => 'sanitize_text_field', 	 //done	
			'transport' => 'postMessage'
		));

		$wp_customize->add_control('educenter_aboutus_profile_name', array(
			'label'		=> esc_html__( 'Profile Name', 'educenter' ),
			'section' => 'educenter_aboutus_settings',
			'type'      => 'text',
			'priority' => 10
		));
		
		$wp_customize->add_setting( 'educenter_aboutus_profile_role', array(
			'sanitize_callback' => 'sanitize_text_field', 	 //done	
			'transport' => 'postMessage'
		));

		$wp_customize->add_control('educenter_aboutus_profile_role', array(
			'label'		=> esc_html__( 'Designadtion', 'educenter' ),
			'section' => 'educenter_aboutus_settings',
			'type'      => 'text',
			'priority' => 10
		));
		$wp_customize->add_setting('educenter_aboutus_signature', array(
			'transport' => 'postMessage',
			'priority' => 10,
			'sanitize_callback'	=> 'esc_url_raw'		//done
		));

		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'educenter_aboutus_signature', array(
			'label'	   => esc_html__('Signature Image','educenter'),
			'section' => 'educenter_aboutus_settings',
		)));


		$wp_customize->selective_refresh->add_partial( "educenter_aboutus_refresh", array (
			'settings' => array( 
				'educenter_aboutus_section_area_options',
				'educenter_aboutus_layout_design',
				'educenter_aboutus_main_title',
				'educenter_aboutus_main_subtitle',
				'educenter_about',
				'educenter_aboutus_page_features_image',
				'educenter_aboutus_area_settings',
				'educenter_aboutus_counter',
				'educenter_aboutus_counter_enable',
				'educenter_aboutus_profile_name',
				'educenter_aboutus_profile_role',
				'educenter_aboutus_profile_image',
				'educenter_aboutus_signature',
				'educenter_aboutus_signature_enable',

				'educenter_aboutus_section_seperator',
				'educenter_aboutus_top_seperator',
				'educenter_aboutus_bottom_seperator'
			),
			'selector' => "#edu-aboutus-section",
			'fallback_refresh' => true,
			'container_inclusive' => false,
			'render_callback' => function () {
				return do_action('educenter_aboutus');
			}
		));