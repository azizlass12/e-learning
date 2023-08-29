<?php        
/**
 *	Main Banner Slider.
*/
$wp_customize->add_section(new Educenter_Toggle_Section($wp_customize, 'educenter_banner_slider', array(
    'title'		=>	esc_html__('Home Slider Settings','educenter'),
    'panel'		=> 'educenter_homepage_settings',
    'priority'  => -1,
    'hiding_control' => 'educenter_slider_options'
)));

$wp_customize->add_setting('educenter_slider_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(new Educenter_Custom_Control_Tab($wp_customize, 'educenter_slider_nav', array(
    'type' => 'tab',
    'section' => 'educenter_banner_slider',
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'educenter'),
            'fields' => array(
                'educenter_slider_options',
                'educenter_homepage_slider_type',
                'educenter_banner_nav_style',
                'educenter_banner_all_sliders',
                    
                'educenter_banner_normal_all_sliders',
                
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'educenter'),
            'fields' => array(
                'educenter-slider-controls',
                'educenter-slider-color',
            ),
        ),
        array(
            'name' => esc_html__('Advanced', 'educenter'),
            'fields' => array(
                
                
            )
        )
    ),
)));
/**
 * Banner Slider
*/
    $wp_customize->add_setting( 'educenter_slider_options', array(
        'default'            =>  'enable',
        'transport' => 'postMessage',
        'sanitize_callback'  =>  'sanitize_text_field',
    ));

    $wp_customize->add_control(new Educenter_Switch_Control( $wp_customize,'educenter_slider_options', 
        array(
            'section'       => 'educenter_banner_slider',
            'label'         =>  esc_html__('Enable Slider', 'educenter'),
            'type'          =>  'switch',
            'switch_label' => array(
                'enable' => esc_html__('Yes', 'educenter'),
                'disable' => esc_html__('No', 'educenter'),
            ),
        )
    ));
    

    $wp_customize->add_setting('educenter_homepage_slider_type', array(
        'default' => 'default',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('educenter_homepage_slider_type', array(
        'type' => 'radio',
        'label' => esc_html__('Choose Slider Type', 'educenter'),
        'section' => 'educenter_banner_slider',
        'setting' => 'educenter_homepage_slider_type',
        'choices' => array(
            'default' => esc_html__('Default Slider', 'educenter'),
            'advance' => esc_html__('Advance Slider', 'educenter'),
        )
    ));

    /** Slider Navigation Style */
    $wp_customize->add_setting('educenter_banner_nav_style', array(
        'default' => '1',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'         
    ));

    $wp_customize->add_control('educenter_banner_nav_style', array(
        'label'   => esc_html__('Navigation Style','educenter'),
        'section' => 'educenter_banner_slider',
        'type'    => 'select',
        'choices' => array(
            '1' => esc_html__('Style 1','educenter'),
            '2' => esc_html__('Style 2','educenter'),			
        )
    ));
    
    /**
     * Slider Settings Area
    */
    $wp_customize->add_setting( 'educenter_banner_all_sliders', array(
        'sanitize_callback' => 'educenter_sanitize_repeater',
        'transport' => 'postMessage',
        'default' => json_encode( array(
        array(
                'slider_page' => '',
                'button_text' => '',
                'button_url' => ''
            )
        ) )        
    ));

    $wp_customize->add_control( new Educenter_Repeater_Control( $wp_customize, 'educenter_banner_all_sliders', array(
        'label'   => esc_html__('Slider Settings Area','educenter'),
        'section' => 'educenter_banner_slider',
        'settings' => 'educenter_banner_all_sliders',
        'box_label' => esc_html__('Slider Settings', 'educenter'),
        'add_label' => esc_html__('Add New', 'educenter'),
        ),
    array(
        
        'slider_page' => array(
            'type'      => 'select',
            'label'     => esc_html__( 'Select Slider Page', 'educenter' ),
            'options'   => $slider_pages
        ),
        'button_text' => array(
            'type'      => 'text',
            'label'     => esc_html__( 'Enter Button Text', 'educenter' ),
            'default'   => ''
        ),
        'button_url' => array(
            'type'      => 'text',
            'label'     => esc_html__( 'Enter Button Url', 'educenter' ),
            'default'   => ''
        )	          
    )));


    /**
     * Normal Slider Settings Area
    */
    $wp_customize->add_setting( 'educenter_banner_normal_all_sliders', array(
        'sanitize_callback' => 'educenter_sanitize_repeater',
        'transport' => 'postMessage',
        'default' => json_encode( array(
            array(
                    'slider_img' => '',
                    'slider_title' => '',
                    'slider_desc' => '',
                    'button_text' => '',
                    'button_url' => ''
                )
            ) )        
        ));

        $wp_customize->add_control( new Educenter_Repeater_Control( $wp_customize, 'educenter_banner_normal_all_sliders', array(
        'label'   => esc_html__('Advance Slider Settings','educenter'),
        'section' => 'educenter_banner_slider',
        'settings' => 'educenter_banner_normal_all_sliders',
        
        'box_label' => esc_html__('Slider Options', 'educenter'),
        'add_label' => esc_html__('Add New', 'educenter'),
        ),
        array(
            'slider_img' => array(
                'type'      => 'upload',
                'label'     => esc_html__( 'Slider Image', 'educenter' ),
                'default'   => ''
            ),
            'slider_title' => array(
                'type'      => 'text',
                'label'     => esc_html__( 'Slider Title', 'educenter' ),
                'default'   => ''
            ),
            'slider_desc' => array(
                'type'      => 'textarea',
                'label'     => esc_html__( 'Slider Description', 'educenter' ),
                'default'   => ''
            ),
            'button_text' => array(
                'type'      => 'text',
                'label'     => esc_html__( 'Button Text', 'educenter' ),
                'default'   => ''
            ),
            'button_url' => array(
                'type'      => 'text',
                'label'     => esc_html__( 'Button Url', 'educenter' ),
                'default'   => ''
            )	          
        )));
    

    /** slider config controls */
    $wp_customize->add_setting(
        'educenter-slider-controls',
        array(
            'sanitize_callback' => 'educenter_sanitize_field_background',
            'default'           => json_encode(array(
                'loop'   => 1,
                'autoplay'   => 1,
                'pager'   => 0,
                'controls'   => 1,
                'usecss'   => 1,
                'mode'   => 'fade',
                'csseasing'   => 'ease',
                'easing'   => 'linear',
                'slideendanimation'   => 1,
                'drag'   => 1,
                'speed'   => 2000,
                'pause'   => 5000
            )),
        )
    );
    $wp_customize->add_control(
        new Educenter_Custom_Control_Group(
            $wp_customize,
            'educenter-slider-controls',
            array(
                'label'    => esc_html__( 'Slider Controls', 'educenter' ),
                'section'  => 'educenter_banner_slider',
                'settings' => 'educenter-slider-controls',
                'priority' => 100,
            ),
            array(
                'loop'      => array(
                    'type'  => 'checkbox',
                    'label' => esc_html__( 'Loop', 'educenter' ),
                ),
                'autoplay' => array(
                    'type'  => 'checkbox',
                    'label' => esc_html__( 'Auto Play', 'educenter' ),
                ),
                'pager' => array(
                    'type'  => 'checkbox',
                    'label' => esc_html__( 'Pager', 'educenter' ),
                ),
                'controls' => array(
                    'type'  => 'checkbox',
                    'label' => esc_html__( 'Controls', 'educenter' ),
                ),
                
                'slideEndAnimation' => array(
                    'type'  => 'checkbox',
                    'label' => esc_html__( 'Slide End Animation', 'educenter' ),
                ),
                'drag' => array(
                    'type'  => 'checkbox',
                    'label' => esc_html__( 'Drag', 'educenter' ),
                ),
                'usecss' => array(
                    'type'  => 'checkbox',
                    'label' => esc_html__( 'useCSS', 'educenter' ),
                ),

                'mode'      => array(
                    'type'  => 'select',
                    'label' => esc_html__( 'Mode', 'educenter' ),
                    'options' => array(
                        'slide' => __("Slide", 'educenter'),
                        'fade' => __("Fade", 'educenter'),
                    )
                ),
                
                'cssEasing'      => array(
                    'type'  => 'checkbox',
                    'label' => esc_html__( 'CSS Easing', 'educenter' )
                ),
                'easing'      => array(
                    'type'  => 'select',
                    'label' => esc_html__( 'Easing', 'educenter' ),
                    'options' => array(
                        'linear' => __("Linear", 'educenter')
                    )
                ),
                
                'speed'      => array(
                    'type'  => 'text',
                    'label' => esc_html__( 'Speed', 'educenter' ),
                ),

                'pause'      => array(
                    'type'  => 'text',
                    'label' => esc_html__( 'Pause', 'educenter' ),
                )
            )
        )
    );


    $wp_customize->add_setting(
        'educenter-slider-color',
        array(
            'sanitize_callback' => 'educenter_sanitize_field_background',
            'default'           => json_encode(array(
                'title'   => '#fff',
                'content'   => "#fff",
                'button_bg'   => '',
                'button_text'   => ''
            )),
        )
    );
    $wp_customize->add_control(
        new Educenter_Custom_Control_Group(
            $wp_customize,
            'educenter-slider-color',
            array(
                'label'    => esc_html__( 'Slider Color', 'educenter' ),
                'section'  => 'educenter_banner_slider',
                'settings' => 'educenter-slider-color',
                'priority' => 100,
            ),
            array(
                'title'      => array(
                    'type'  => 'color',
                    'label' => esc_html__( 'Title', 'educenter' ),
                ),
                'content' => array(
                    'type'  => 'color',
                    'label' => esc_html__( 'Content', 'educenter' ),
                ),
                'button_bg' => array(
                    'type'  => 'color',
                    'label' => esc_html__( 'Button BG', 'educenter' ),
                ),
                'button_text' => array(
                    'type'  => 'color',
                    'label' => esc_html__( 'Button Color', 'educenter' ),
                )
            )
        )
    );


    $wp_customize->add_setting('educenter_banner_slider_upgrade_text', array(
        'sanitize_callback' => 'educenter_sanitize_text'
    ));

    $wp_customize->add_control(new Educenter_Upgrade_Text($wp_customize, 'educenter_banner_slider_upgrade_text', array(
        'section' => 'educenter_banner_slider',
        'label' => esc_html__('For more slider layouts and settings,', 'educenter'),
        'choices' => array(
            esc_html__('Multiple slider layouts', 'educenter'),
            esc_html__('Includes 5 slider types - Banner, Video, Pages, Advance, Revolution', 'educenter'),
            esc_html__('Placement for revolution and video slider', 'educenter'),
            esc_html__('Control over display description', 'educenter'),
            esc_html__('Adjustment for description alignment', 'educenter'),
            esc_html__('Adjustment for title, description and butotn font, margin, padding', 'educenter'),
            esc_html__('Overlay Option', 'educenter'),
            esc_html__('Slider Height, Alignement, Margin, Padding, Radious, Bottom Seprator', 'educenter'),
            esc_html__('And more...', 'educenter'),
        ),
        'priority' => 100
    )));

    
    $wp_customize->selective_refresh->add_partial('educenter_slider_selective_refresh', array(
        'settings' => array('educenter_slider_options','educenter_homepage_slider_type','educenter_banner_nav_style','educenter_banner_all_sliders', 'educenter_banner_normal_all_sliders'),
        'selector' => '.ed-slider',
        'container_inclusive' => true,
        'render_callback' => function() {
            if( in_array( get_theme_mod('educenter_slider_options', 'enable') , array( 1, 'enable')) ) {
                return educenter_banner_section();
            }
        }
    ));

    $wp_customize->selective_refresh->add_partial( 'educenter_homepage_slider_type', array (
        'settings' => array( 'educenter_homepage_slider_type' ),
        'selector' => '.ed-slider .ed-slider-info',
    ));