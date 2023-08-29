<?php

$wp_customize->add_section('educenter_header_button_section', array(
    'title' => esc_html__('Header CTA Button', 'educenter'),
    'panel' => 'educenter_header_general_settings',
    'description' => esc_html__('The CTA button will show on menu', 'educenter')
));

$wp_customize->add_setting('educenter_header_button_enable', array(
    'sanitize_callback' => 'educenter_sanitize_text',
    'default' => 'disable',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Educenter_Switch_Control($wp_customize, 'educenter_header_button_enable', array(
    'section' => 'educenter_header_button_section',
    'label' => esc_html__('Enable Button', 'educenter'),
    'switch_label' => array(
        'enable' => esc_html__('Yes', 'educenter'),
        'disable' => esc_html__('No', 'educenter')
    ),
    'class' => 'switch-section'
)));

$wp_customize->add_setting('educenter_header_button_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
    'priority' => -1,
));
$wp_customize->add_control(new Educenter_Custom_Control_Tab($wp_customize, 'educenter_header_button_nav', array(
    'type' => 'tab',
    'section' => 'educenter_header_button_section',
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'educenter'),
            'fields' => array(
                'educenter_hb_icon',
                'educenter_hb_title',
                'educenter_hb_text',
                'educenter_hb_link',
                'educenter_header_button_hide_show'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'educenter'),
            'fields' => array(
                'educenter_header_button_color',
                'educenter_header_button_hover_color',
                'educenter_header_button_border_radius',
                'educenter_header_button_border_margin',
                'educenter_header_button_border_padding',
                'educenter_header_button_size',
                'educenter_header_button_width',
            ),
        )
    ),
)));


$wp_customize->add_setting('educenter_hb_icon', array(
    'sanitize_callback' => 'educenter_sanitize_text',
    'default' => 'fa fa-phone-volume',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Educenter_Fontawesome_Icon_Chooser($wp_customize, 'educenter_hb_icon', array(
    'section' => 'educenter_header_button_section',
    'label' => esc_html__('Icon', 'educenter')
)));


$wp_customize->add_setting('educenter_hb_title', array(
    'default' => esc_html__('Free Call', 'educenter'),
    'sanitize_callback' => 'educenter_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('educenter_hb_title', array(
    'section' => 'educenter_header_button_section',
    'type' => 'text',
    'label' => esc_html__('Button Title', 'educenter')
));

$wp_customize->add_setting('educenter_hb_text', array(
    'default' => esc_html__('+01-559-236-8009', 'educenter'),
    'sanitize_callback' => 'educenter_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('educenter_hb_text', array(
    'section' => 'educenter_header_button_section',
    'type' => 'text',
    'label' => esc_html__('Button Text', 'educenter')
));

$wp_customize->add_setting('educenter_hb_link', array(
    'default' => esc_html__('tel:5592368009', 'educenter'),
    'sanitize_callback' => 'educenter_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('educenter_hb_link', array(
    'section' => 'educenter_header_button_section',
    'type' => 'text',
    'label' => esc_html__('Button Link', 'educenter')
));

$wp_customize->add_setting( 'educenter_header_button_color', array(
        'sanitize_callback' => 'educenter_sanitize_field_background',
        'transport' => 'postMessage',
        'default'           => json_encode(array(
            'background'   => '',
            'color' => '',
        )),
    )
);
$wp_customize->add_control( new Educenter_Custom_Control_Group( $wp_customize, 'educenter_header_button_color',
        array(
            'label'    => esc_html__( 'Button', 'educenter' ),
            'section'  => 'educenter_header_button_section',
            'settings' => 'educenter_header_button_color',
            'priority' => 100,
        ),
        array(
            'background'      => array(
                'type'  => 'color',
                'label' => esc_html__( 'Background', 'educenter' ),
            ),
            'text' => array(
                'type'  => 'color',
                'label' => esc_html__( 'Color', 'educenter' ),
            ),
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

            'font-size' => array(
                'type'  => 'text',
                'label' => esc_html__( 'Font Size(px)', 'educenter' ),
            ),
            
            'width' => array(
                'type'  => 'text',
                'label' => esc_html__( 'Width(px)', 'educenter' ),
            ),
        )
    )
);

$wp_customize->add_setting('educenter_header_button_hover_color',
    array(
        'sanitize_callback' => 'educenter_sanitize_field_background',
        'transport' => 'postMessage',
        'default'           => json_encode(array(
            'background'   => '',
            'color' => '',
        )),
    )
);
$wp_customize->add_control( new Educenter_Custom_Control_Group( $wp_customize, 'educenter_header_button_hover_color',
        array(
            'label'    => esc_html__( 'Button Hover', 'educenter' ),
            'section'  => 'educenter_header_button_section',
            'settings' => 'educenter_header_button_hover_color',
            'priority' => 100,
        ),
        array(
            'background'      => array(
                'type'  => 'color',
                'label' => esc_html__( 'Background', 'educenter' ),
            ),
            'text' => array(
                'type'  => 'color',
                'label' => esc_html__( 'Color', 'educenter' ),
            )
        )
    )
);



// hide show 
$wp_customize->add_setting( 'educenter_header_button_hide_show',
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
$wp_customize->add_control(new Educenter_Custom_Control_Responsive_Buttonset( $wp_customize, 'educenter_header_button_hide_show',
        array(
            'choices'  => array(
                'show' => esc_html__( 'Show', 'educenter' ),
                'hide' => esc_html__( 'Hide', 'educenter' ),
            ),
            'label'    => esc_html__( 'Hide/Show', 'educenter' ),
            'section' => 'educenter_header_button_section',
        )
    )
);


$wp_customize->selective_refresh->add_partial( 'educenter_header_button_refresh', array (
    'settings' => array( 
        'educenter_header_button_enable',
        'educenter_hb_icon',
        'educenter_hb_title',
        'educenter_hb_text',
        'educenter_hb_link',
        'educenter_header_button_hide_show'
     ),
     'selector' => '.nav-buttons',
     'container_inclusive' => true,
     'render_callback' => function () {
        return do_action('educenter_nav_buttons');
     }
));


$wp_customize->add_setting('educenter_pro_header_cta_upgrade_text', array(
    'sanitize_callback' => 'educenter_sanitize_text'
));

$wp_customize->add_control(new EduCenter_Upgrade_Text($wp_customize, 'educenter_pro_header_cta_upgrade_text', array(
    'section' => "educenter_header_button_section",
    'label' => esc_html__('For more styling and controls,', 'educenter'),
    'choices' => array(
        esc_html__('Background Option - Gradient, Image', 'educenter'),
        esc_html__('Icon Color, Margin, Padding, Font Size etc', 'educenter'),
        esc_html__('And more...', 'educenter'),
        
    ),
    'priority' => 200
)));