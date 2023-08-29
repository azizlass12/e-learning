<?php
/* Testimonial Section. */
$wp_customize->add_section(new Educenter_Toggle_Section($wp_customize, 'educenter_testimonial_settings', array(
    'title'		=> 	esc_html__('Testimonial Section','educenter'),
    'panel'		=> 'educenter_homepage_settings',
    'priority'  => educenter_get_section_position('educenter_testimonial_settings'),
    'hiding_control' => 'educenter_testimonial_area_options'
)));
    /**
     * Enable/Disable Option
     *
     * @since 1.0.0
    */
    $wp_customize->add_setting('educenter_testimonial_area_options', array(
        'default' => 'enable',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',     //done
    ));
    $wp_customize->add_control(new Educenter_Switch_Control($wp_customize, 'educenter_testimonial_area_options', array(
        'label' => esc_html__('Enable', 'educenter'),
        'section' => 'educenter_testimonial_settings',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'educenter'),
            'disable' => esc_html__('No', 'educenter'),
        ),
    )));
    
    $wp_customize->add_setting('educenter_testimonial_settings_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Educenter_Custom_Control_Tab($wp_customize, 'educenter_testimonial_settings_nav', array(
        'type' => 'tab',
        'section' => 'educenter_testimonial_settings',
        'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'educenter'),
                'fields' => array(
                    'educenter_testimonial_area_options',
                    'educenter_testimonials_title_headding',
                    'educenter_testimonial_title',
                    'educenter_testimonial_subtitle',
                    'educenter_testimonial_title_align',
                    'educenter_testimonial_area_settings',
                    'educenter_testimonial_review_link',
                    'educenter_testimonial_cover_image',
                    'educenter_testimonial_slider_item',
                    'educenter_testimonial_layout',
                ),
                'active' => true,
            ),
            array(
                'name' => esc_html__('Style', 'educenter'),
                'fields' => array(
                    'educenter_testimonial_cs_heading',
                    'educenter_testimonial_super_title_color',
                    'educenter_testimonial_title_color',
                    'educenter_testimonial_text_color',
                    'educenter_testimonial_link_color',
                    'educenter_testimonial_link_hover_color',
                ),
            ),
            array(
                'name' => esc_html__('Advanced', 'educenter'),
                'fields' => array(
                    'educenter_testimonial_bg_type',
                    'educenter_testimonial_bg_color',
                    'educenter_testimonial_bg_gradient',
                    'educenter_testimonial_bg_image',
                    'educenter_testimonial_bg_video',
                    'educenter_testimonial_overlay_color',
                    'educenter_testimonial_padding',
					'educenter_testimonial_content_heading',
					'educenter_testimonial_content_bg_type',
                    'educenter_testimonial_content_bg_color',
                    'educenter_testimonial_content_bg_gradient',
					'educenter_testimonial_content_padding',
					'educenter_testimonial_content_margin',
					'educenter_testimonial_content_radius',
                    'educenter_testimonial_cs_seperator',
					'educenter_testimonial_seperator0',
					'educenter_testimonial_section_seperator',
					'educenter_testimonial_seperator1',
					'educenter_testimonial_top_seperator',
					'educenter_testimonial_ts_color',
					'educenter_testimonial_ts_height',
					'educenter_testimonial_seperator2',
					'educenter_testimonial_bottom_seperator',
					'educenter_testimonial_bs_color',
					'educenter_testimonial_bs_height'
                ),
            ),
        ),
    )));
    
    $wp_customize->add_setting('educenter_testimonials_title_headding', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new Educenter_Customize_Heading($wp_customize, 'educenter_testimonials_title_headding', array(
        'section' => 'educenter_testimonial_settings',
        'label' => esc_html__('Section Title & Sub Title', 'educenter')
    )));

    // Blog Title.
    $wp_customize->add_setting('educenter_testimonial_title', array(
        'transport' => 'postMessage',
        'sanitize_callback'	=> 'sanitize_text_field'		//done
    ));
    $wp_customize->add_control('educenter_testimonial_title', array(
        'label'	   => esc_html__('Title','educenter'),
        'section'  => 'educenter_testimonial_settings',
        'type'	   => 'text',
    ));
    // Blog Title.
    $wp_customize->add_setting('educenter_testimonial_subtitle', array(
        'transport' => 'postMessage',
        'sanitize_callback'	=> 'sanitize_text_field'		//done
    ));
    $wp_customize->add_control('educenter_testimonial_subtitle', array(
        'label'	   => esc_html__('Sub Title','educenter'),
        'section'  => 'educenter_testimonial_settings',
        'type'	   => 'text',
    ));


    $wp_customize->add_setting('educenter_testimonial_slider_item', array(
        'default' => '3',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('educenter_testimonial_slider_item', array(
        'type' => 'select',
        'label' => esc_html__('Column', 'educenter'),
        'section' => 'educenter_testimonial_settings',
        'setting' => 'educenter_testimonial_slider_item',
        'choices' => array(
            1 => esc_html__('1', 'educenter'),
            2 => esc_html__('2', 'educenter'),
            3 => esc_html__('3', 'educenter'),
            4 => esc_html__('4', 'educenter'),
            
        )
    ));

    $wp_customize->add_setting('educenter_testimonial_layout', array(
        'default' => 'layout-1',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('educenter_testimonial_layout', array(
        'type' => 'select',
        'label' => esc_html__('Layout', 'educenter'),
        'section' => 'educenter_testimonial_settings',
        'setting' => 'educenter_testimonial_layout',
        'choices' => array(
            'layout-1' => esc_html__('Layout 1', 'educenter'),
            'layout-2' => esc_html__('Layout 2', 'educenter')
        )
    ));

    //  Testimonial Page.
    $wp_customize->add_setting('educenter_testimonial_area_settings', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'educenter_sanitize_repeater',		//done
        'default' => json_encode(array(
            array(
                'testimonial_page' => '',
                'designation'=>'',
                'rating'    => '',
                'facebook_url' => '',
                'twitter_url' => '',
                'youtube_url' => '',
                'instagram_url' => '',
                'linkedin_url' => '',
            )
        ))
    ));
    $wp_customize->add_control(new Educenter_Repeater_Control( $wp_customize, 'educenter_testimonial_area_settings', 
        array(
            'label' 	   => esc_html__('Testimonial Blocks', 'educenter'),
            'section' 	   => 'educenter_testimonial_settings',
            'box_label' => esc_html__('Testimonial Block', 'educenter'),
            'add_label' => esc_html__('Add New', 'educenter'),
        ),
        array(
            'testimonial_page' => array(
                'type' => 'select',
                'label' => esc_html__('Testimonial Page', 'educenter'),
                'options' => $slider_pages
            ),
            'designation' => array(
                'type' => 'text',
                'label' => esc_html__('Designation', 'educenter'),
                'default' => ''
            ),
            'rating' => array(
                'type' => 'number',
                'label' => esc_html__('Rating', 'educenter'),
                'default' => '5'
            ),
            'facebook_url' => array(
                'type' => 'text',
                'label' => esc_html__('Facebook URL', 'educenter'),
                'default' => ''
            ),
            'twitter_url' => array(
                'type' => 'text',
                'label' => esc_html__('Twitter URL', 'educenter'),
                'default' => ''
            ),
            'youtube_url' => array(
                'type' => 'text',
                'label' => esc_html__('Youtube Url', 'educenter'),
                'default' => ''
            ),
            'instagram_url' => array(
                'type' => 'text',
                'label' => esc_html__('Instagram Url', 'educenter'),
                'default' => ''
            ),
            'linkedin_url' => array(
                'type' => 'text',
                'label' => esc_html__('Linkedin Url', 'educenter'),
                'default' => ''
            )
        )
    ));

    $wp_customize->add_setting('educenter_testimonial_review_link', array(
        'transport' => 'postMessage',
        'sanitize_callback'	=> 'sanitize_text_field'		//done
    ));
    $wp_customize->add_control('educenter_testimonial_review_link', array(
        'label'	   => esc_html__('All Review Link','educenter'),
        'section'  => 'educenter_testimonial_settings',
        'type'	   => 'text',
    ));

    $wp_customize->add_setting('educenter_testimonial_cover_image', array(
        'transport' => 'postMessage',
        'sanitize_callback'	=> 'esc_url_raw'		//done
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'educenter_testimonial_cover_image', 
        array(
            'label'	   => esc_html__('Testimonial Cover Image','educenter'),
            'section'  => 'educenter_testimonial_settings'
        )
    ));

    $wp_customize->add_setting('educenter_testimonial_settings_upgrade_text', array(
        'sanitize_callback' => 'educenter_sanitize_text'
    ));

    $wp_customize->add_control(new EduCenter_Upgrade_Text($wp_customize, 'educenter_testimonial_settings_upgrade_text', array(
        'section' => 'educenter_testimonial_settings',
        'label' => esc_html__('For more styles settings,', 'educenter'),
        'choices' => array(
            esc_html__('Switch Between List View and Slider', 'educenter'),
            esc_html__('Dynamic text editor option for bubble text', 'educenter'),
        ),
        'priority' => 100
    )));

    $wp_customize->selective_refresh->add_partial('educenter_testimonial_area_refresh', array(
        'settings' => array('educenter_testimonial_area_options', 
                            'educenter_testimonial_title',
                            'educenter_testimonial_subtitle',
                            'educenter_testimonial_slider_item',
                            'educenter_testimonial_layout',
                            'educenter_testimonial_area_settings'
                        ),
        'selector' => '#edu-testimonials-section',
        'container_inclusive' => true,
        'render_callback' => function() {
            return educenter_testimonials_section();
        }
    ));