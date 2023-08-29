<?php

$section_array = [ 'fservices', 'aboutus', 'cta', 'services', 'counter', 'courses', 'blog', 'team', 'gallery', 'testimonial' ];
$super_title_exclude_array = [ 'cta' ];
$exculde_settings_array = $section_array;
foreach ($section_array as $id) {
    $wp_customize->add_setting("educenter_{$id}_bg_type", array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control("educenter_{$id}_bg_type", array(
        'section' => "educenter_{$id}_settings",
        'type' => 'select',
        'label' => esc_html__('Background Type', 'educenter'),
        'choices' => array(
            'none' => esc_html__('Default', 'educenter'),
            'color-bg' => esc_html__('Color Background', 'educenter'),
            'gradient-bg' => esc_html__('Gradient Background(Pro)', 'educenter'),
            'image-bg' => esc_html__('Image Background(Pro)', 'educenter'),
            'video-bg' => esc_html__('Video Background(Pro)', 'educenter')
        ),
        'priority' => 15
    ));
    $wp_customize->add_setting("educenter_{$id}_bg_color", array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "educenter_{$id}_bg_color", array(
        'section' => "educenter_{$id}_settings",
        'label' => esc_html__('Background Color', 'educenter'),
        'priority' => 20
    )));
    
    $wp_customize->add_setting("educenter_{$id}_cs_heading", array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new Educenter_Customize_Heading($wp_customize, "educenter_{$id}_cs_heading", array(
        'section' => "educenter_{$id}_settings",
        'label' => esc_html__('Color Settings', 'educenter'),
        'priority' => 50
    )));

    if( !in_array( $id, $super_title_exclude_array ) ){
        $wp_customize->add_setting("educenter_{$id}_super_title_color", array(
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "educenter_{$id}_super_title_color", array(
            'section' => "educenter_{$id}_settings",
            'label' => esc_html__('Super Title Color', 'educenter'),
            'priority' => 55
        )));
    }

    $wp_customize->add_setting("educenter_{$id}_title_color", array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "educenter_{$id}_title_color", array(
        'section' => "educenter_{$id}_settings",
        'label' => esc_html__('Title Color', 'educenter'),
        'priority' => 55
    )));

    $wp_customize->add_setting("educenter_{$id}_text_color", array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "educenter_{$id}_text_color", array(
        'section' => "educenter_{$id}_settings",
        'label' => esc_html__('Section Text Color', 'educenter'),
        'priority' => 55
    )));


    $wp_customize->add_setting("educenter_{$id}_link_color", array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "educenter_{$id}_link_color", array(
        'section' => "educenter_{$id}_settings",
        'label' => esc_html__('Link Color', 'educenter'),
        'priority' => 56
    )));

    $wp_customize->add_setting("educenter_{$id}_link_hover_color", array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "educenter_{$id}_link_hover_color", array(
        'section' => "educenter_{$id}_settings",
        'label' => esc_html__('Link Hover Color', 'educenter'),
        'priority' => 58
    )));


    
    $wp_customize->add_setting("educenter_{$id}_cs_seperator", array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new Educenter_Separator_Control($wp_customize, "educenter_{$id}_cs_seperator", array(
        'section' => "educenter_{$id}_settings",
        'priority' => 80
    )));
    /** padding */
    $wp_customize->add_setting(
        "educenter_{$id}_padding",
        array(
            'transport' => 'postMessage',
            'sanitize_callback' => 'educenter_sanitize_field_default_css_box'
        )
    );
    $wp_customize->add_control(
        new Educenter_Custom_Control_Cssbox(
            $wp_customize,
            "educenter_{$id}_padding",
            array(
                'label'    => esc_html__( 'Padding (px)', 'educenter' ),
                'section' => "educenter_{$id}_settings",
                'settings' => "educenter_{$id}_padding",
                'priority' => 80
            ),
            array(),
            array()
        )
    );

    
    $wp_customize->add_setting("educenter_{$id}_seperator0", array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new Educenter_Separator_Control($wp_customize, "educenter_{$id}_seperator0", array(
        'section' => "educenter_{$id}_settings",
        'priority' => 90
    )));
    $wp_customize->add_setting("educenter_{$id}_section_seperator", array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 'no',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control("educenter_{$id}_section_seperator", array(
        'section' => "educenter_{$id}_settings",
        'type' => 'select',
        'label' => esc_html__('Enable Separator', 'educenter'),
        'choices' => array(
            'no' => esc_html__('Disable', 'educenter'),
            'top' => esc_html__('Enable Top Separator', 'educenter'),
            'bottom' => esc_html__('Enable Bottom Separator', 'educenter'),
            'top-bottom' => esc_html__('Enable Top & Bottom Separator', 'educenter')
        ),
        'priority' => 95
    ));
    $wp_customize->add_setting("educenter_{$id}_seperator1", array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new Educenter_Separator_Control($wp_customize, "educenter_{$id}_seperator1", array(
        'section' => "educenter_{$id}_settings",
        'priority' => 100
    )));
    $wp_customize->add_setting("educenter_{$id}_top_seperator", array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 'big-triangle-center',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control("educenter_{$id}_top_seperator", array(
        'section' => "educenter_{$id}_settings",
        'type' => 'select',
        'label' => esc_html__('Top Separator', 'educenter'),
        'choices' => educenter_svg_seperator(),
        'priority' => 105
    ));
    $wp_customize->add_setting("educenter_{$id}_ts_color", array(
        'default' => '#FF0000',
        'sanitize_callback' => 'educenter_sanitize_color_alpha',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new Educenter_Alpha_Color_Control($wp_customize, "educenter_{$id}_ts_color", array(
        'section' => "educenter_{$id}_settings",
        'label' => esc_html__('Top Separator Color', 'educenter'),
        'priority' => 115
    )));
    $wp_customize->add_setting("educenter_{$id}_ts_height_desktop", array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 60,
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting("educenter_{$id}_ts_height_tablet", array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting("educenter_{$id}_ts_height_mobile", array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new Educenter_Range_Slider_Control($wp_customize, "educenter_{$id}_ts_height", array(
        'section' => "educenter_{$id}_settings",
        'label' => esc_html__('Top Separator Height (px)', 'educenter'),
        'settings' => array(
            'desktop' => "educenter_{$id}_ts_height_desktop",
            'tablet' => "educenter_{$id}_ts_height_tablet",
            'mobile' => "educenter_{$id}_ts_height_mobile",
        ),
        'input_attrs' => array(
            'min' => 20,
            'max' => 200,
            'step' => 1,
        ),
        'priority' => 120
    )));
    $wp_customize->add_setting("educenter_{$id}_seperator2", array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new Educenter_Separator_Control($wp_customize, "educenter_{$id}_seperator2", array(
        'section' => "educenter_{$id}_settings",
        'priority' => 125
    )));
    $wp_customize->add_setting("educenter_{$id}_bottom_seperator", array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 'big-triangle-center',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control("educenter_{$id}_bottom_seperator", array(
        'section' => "educenter_{$id}_settings",
        'type' => 'select',
        'label' => esc_html__('Bottom Separator', 'educenter'),
        'choices' => educenter_svg_seperator(),
        'priority' => 130
    ));
    $wp_customize->add_setting("educenter_{$id}_bs_color", array(
        'default' => '#FF0000',
        'sanitize_callback' => 'educenter_sanitize_color_alpha',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new Educenter_Alpha_Color_Control($wp_customize, "educenter_{$id}_bs_color", array(
        'section' => "educenter_{$id}_settings",
        'label' => esc_html__('Bottom Separator Color', 'educenter'),
        'priority' => 135,
    )));
    $wp_customize->add_setting("educenter_{$id}_bs_height_desktop", array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 60,
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting("educenter_{$id}_bs_height_tablet", array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 60,
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting("educenter_{$id}_bs_height_mobile", array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 60,
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new Educenter_Range_Slider_Control($wp_customize, "educenter_{$id}_bs_height", array(
        'section' => "educenter_{$id}_settings",
        'label' => esc_html__('Bottom Separator Height (px)', 'educenter'),
        'input_attrs' => array(
            'min' => 20,
            'max' => 200,
            'step' => 1,
        ),
        'settings' => array(
            'desktop' => "educenter_{$id}_bs_height_desktop",
            'tablet' => "educenter_{$id}_bs_height_tablet",
            'mobile' => "educenter_{$id}_bs_height_mobile",
        ),
        'priority' => 140
    )));
}