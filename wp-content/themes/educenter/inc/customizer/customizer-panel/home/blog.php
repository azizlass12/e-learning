<?php
/*************
 * Blog Section
*/
$wp_customize->add_section(new Educenter_Toggle_Section($wp_customize, 'educenter_blog_settings', array(
    'title'		=> 	esc_html__('Blog Section','educenter'),
    'panel'		=> 'educenter_homepage_settings',
    'priority'  => educenter_get_section_position('educenter_blog_settings'),
    'hiding_control' => 'educenter_blog_area_options'
)));
    $wp_customize->add_setting('educenter_blog_settings_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Educenter_Custom_Control_Tab($wp_customize, 'educenter_blog_settings_nav', array(
        'type' => 'tab',
        'section' => 'educenter_blog_settings',
        'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'educenter'),
                'fields' => array(
                    'educenter_blog_area_options',
                    'educenter_blog_subtitle',
                    'educenter_blog_title',
                    'educenter_blog_slider_item',
                    'educenter_blog_area_term_id',
                    'educenter_posts_num',
                    'educenter_blog_categories',
                    'educenter_post_date_options',
                    'educenter_post_reading_time',
                    'educenter_post_comments_options',
                    'educenter_post_author_options',
                    'educenter_blog_home_btn',
                    'educenter_home_blog_alignment',
                ),
                'active' => true,
            ),
            array(
                'name' => esc_html__('Style', 'educenter'),
                'fields' => array(
                    'educenter_blog_cs_heading',
                    'educenter_blog_super_title_color',
                    'educenter_blog_title_color',
                    'educenter_blog_text_color',
                    'educenter_blog_link_color',
                    'educenter_blog_link_hover_color',
                ),
            ),
            array(
                'name' => esc_html__('Advanced', 'educenter'),
                'fields' => array(
                    'educenter_blog_bg_type',
                    'educenter_blog_bg_color',
                    'educenter_blog_bg_gradient',
                    'educenter_blog_bg_image',
                    'educenter_blog_bg_video',
                    'educenter_blog_overlay_color',
                    'educenter_blog_padding',
                    'educenter_blog_content_heading',
					'educenter_blog_content_bg_type',
                    'educenter_blog_content_bg_color',
                    'educenter_blog_content_bg_gradient',
					'educenter_blog_content_padding',
					'educenter_blog_content_margin',
					'educenter_blog_content_radius',
                    'educenter_blog_cs_seperator',
					'educenter_blog_seperator0',
					'educenter_blog_section_seperator',
					'educenter_blog_seperator1',
					'educenter_blog_top_seperator',
					'educenter_blog_ts_color',
					'educenter_blog_ts_height',
					'educenter_blog_seperator2',
					'educenter_blog_bottom_seperator',
					'educenter_blog_bs_color',
					'educenter_blog_bs_height'
                ),
            ),
        ),
    )));
    /**
     * Enable/Disable Option
     *
     * @since 1.0.0
    */
    $wp_customize->add_setting('educenter_blog_area_options', array(
        'default' => 'enable',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',     //done
    ));
    $wp_customize->add_control(new Educenter_Switch_Control($wp_customize, 'educenter_blog_area_options', array(
        'label' => esc_html__('Enable', 'educenter'),
        'section' => 'educenter_blog_settings',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'educenter'),
            'disable' => esc_html__('No', 'educenter'),
        ),
    )));
    
    
    // Blog Title.
    $wp_customize->add_setting('educenter_blog_title', array(
        'transport' => 'postMessage',
        'sanitize_callback'	=> 'sanitize_text_field'		//done
    ));
    $wp_customize->add_control('educenter_blog_title', array(
        'label'	   => esc_html__('Title','educenter'),
        'section'  => 'educenter_blog_settings',
        'type'	   => 'text',
    ));
    
    // Blog Title.
    $wp_customize->add_setting('educenter_blog_subtitle', array(
        'transport' => 'postMessage',
        'sanitize_callback'	=> 'sanitize_text_field'		//done
    ));
    $wp_customize->add_control('educenter_blog_subtitle', array(
        'label'	   => esc_html__('Sub Title','educenter'),
        'section'  => 'educenter_blog_settings',
        'type'	   => 'text',
    ));

    $wp_customize->add_setting('educenter_blog_slider_item', array(
        'default' => '3',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('educenter_blog_slider_item', array(
        'type' => 'select',
        'label' => esc_html__('Columns', 'educenter'),
        'section' => 'educenter_blog_settings',
        'setting' => 'educenter_blog_slider_item',
        'choices' => array(
            1 => esc_html__('1', 'educenter'),
            2 => esc_html__('2', 'educenter'),
            3 => esc_html__('3', 'educenter'),
            4 => esc_html__('4', 'educenter'),
            
        )
    ));
    
    // Blog Posts.
    $wp_customize->add_setting('educenter_blog_area_term_id', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',     //done
    ));
    $wp_customize->add_control(new Educenter_Multiple_Check_Control($wp_customize, 'educenter_blog_area_term_id', array(
        'label'    => esc_html__('Select Category', 'educenter'),
        'settings' => 'educenter_blog_area_term_id',
        'section'  => 'educenter_blog_settings',
        'choices'  => $educenter_cat,
    )));
    
    // Select Blog Post Layout.
    $wp_customize->add_setting('educenter_posts_num', array(
        'transport' => 'postMessage',
        'default'			 =>	'three',
        'sanitize_callback'	 =>	'sanitize_text_field'		//done	
    ));
    $wp_customize->add_control( 'educenter_posts_num', array(
        'label'	  =>	esc_html__('Number of Blog Posts','educenter'),
        'section' =>	'educenter_blog_settings',
        'type'	  =>	'select',
        'choices' => array(
            'three' => esc_html__('3','educenter'),
            'six'   => esc_html__('6','educenter' ),
        )
    ));


    /**
     * Enable/Disable Option for Post Elements Date
     *
     * @since 1.0.0
    */
    $wp_customize->add_setting('educenter_post_date_options', array(
        'transport' => 'postMessage',
        'default' => 'enable',
        'sanitize_callback' => 'sanitize_text_field',     //done
    ));
    $wp_customize->add_control(new Educenter_Switch_Control($wp_customize, 'educenter_post_date_options', array(
        'label' => esc_html__('Post Meta Date', 'educenter'),
        'settings' => 'educenter_post_date_options',
        'section' => 'educenter_blog_settings',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'educenter'),
            'disable' => esc_html__('No', 'educenter'),
        ),
    )));
    
    /**
     * Enable/Disable Option for Post Elements Tags
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting('educenter_post_author_options', array(
        'transport' => 'postMessage',
        'default' => 'enable',
        'sanitize_callback' => 'sanitize_text_field',     //done
    ));
    $wp_customize->add_control(new Educenter_Switch_Control($wp_customize, 'educenter_post_author_options', array(
        'label' => esc_html__('Post Meta Author', 'educenter'),
        'settings' => 'educenter_post_author_options',
        'section' => 'educenter_blog_settings',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'educenter'),
            'disable' => esc_html__('No', 'educenter'),
        ),
    )));

    // Blog Template Read More Button.
     $wp_customize->add_setting( 'educenter_blog_home_btn', array(
        'transport' => 'postMessage',
        'default'           => esc_html__( 'Read More','educenter' ),
        'sanitize_callback' => 'sanitize_text_field',		//done
    ));
    $wp_customize->add_control('educenter_blog_home_btn', array(
        'label'		  => esc_html__( 'Enter Button Text', 'educenter' ),
        'section'	  => 'educenter_blog_settings',
        'type' 		  => 'text',
    ));


    $wp_customize->add_setting('educenter_home_blog_alignment',
        array(
            'default'           => 'text-center',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(new Educenter_Custom_Control_Buttonset($wp_customize,'educenter_home_blog_alignment',
        array(
            'choices'  => array(
                'text-left' => esc_html__('Left', 'educenter'),
                'text-right' => esc_html__('Right', 'educenter'),
                'text-center' => esc_html__('Center', 'educenter'),
            ),
            'label'    => esc_html__( 'Blog Content Alignment', 'educenter' ),
            'section'  => 'educenter_blog_settings',
            'settings' => 'educenter_home_blog_alignment',
        )
    ));


    $wp_customize->selective_refresh->add_partial('educenter_blog_area_refresh', array(
        'settings' => array('educenter_blog_area_options', 
                            'educenter_blog_title',
                            'educenter_blog_subtitle',
                            'educenter_blog_area_term_id',
                            'educenter_blog_slider_item',
                            'educenter_posts_num',
                            'educenter_post_date_options',
                            'educenter_post_author_options',
                            'educenter_blog_home_btn',
                            'educenter_home_blog_alignment',

                            "educenter_blog_section_seperator",
                            "educenter_blog_top_seperator",
                            "educenter_blog_bottom_seperator"		
                        ),
        'selector' => '#edu-blog-section',
        'fallback_refresh' => true,
        'container_inclusive' => true,
        'render_callback' => function() {
            return educenter_blog_section();
        }
    ));


    $wp_customize->add_setting('educenter_blog_settings_upgrade_text', array(
        'sanitize_callback' => 'educenter_sanitize_text'
    ));

    $wp_customize->add_control(new EduCenter_Upgrade_Text($wp_customize, 'educenter_blog_settings_upgrade_text', array(
        'section' => 'educenter_blog_settings',
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