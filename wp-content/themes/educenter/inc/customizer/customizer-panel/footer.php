<?php
/**
 * Footer Settings
*/
$wp_customize->add_section('educenter_footer_section', array(
    'title'		  => esc_html__('Footer Setting','educenter'),
    // 'priority'	  => 300,
));

$wp_customize->add_setting('educenter_footer_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
    'priority' => -1,
));
$wp_customize->add_control(new Educenter_Custom_Control_Tab($wp_customize, 'educenter_footer_nav', array(
    'type' => 'tab',
    'section' => 'educenter_footer_section',
    'buttons' => array(
        array(
            'name' => esc_html__('Settings', 'educenter'),
            'fields' => array(
                'educenter_footer_column',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'educenter'),
            'fields' => array(
                'educenter_footer_bg_heading',
                'educenter_footer_bg_type',
                'educenter_footer_bg_color',
                'educenter_footer_bg_gradient',
                'educenter_footer_background_image',
                'educenter_footer_bg_image',
                'educenter_footer_overlay_color',
                'educenter_footer_margin_padding',

                'educenter_footer_bottom_seperator',
                'educenter_footer_seperator0',
                'educenter_footer_section_seperator',
                'educenter_footer_top_seperator',
                'educenter_footer_ts_color',
                'educenter_footer_ts_height',
                
            )
        )
    )
)));

$wp_customize->add_setting('educenter_footer_block_editor_support', array(
    'default' => 'disable',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',     //done
));
$wp_customize->add_control(new Educenter_Switch_Control($wp_customize, 'educenter_footer_block_editor_support', array(
    'label'  =>  esc_html__('Block Editor Support', 'educenter'),
    'description' => esc_html__('After Enable and Disable Please refresh your page to see the effect', 'educenter'),
    'section' => 'educenter_footer_section',
    'switch_label' => array(
        'enable' => esc_html__('Yes', 'educenter'),
        'disable' => esc_html__('No', 'educenter'),
    ),
)));

$wp_customize->add_setting('educenter_footer_column', array(
    'sanitize_callback' => 'educenter_sanitize_text',
    'default' => 'ed-col-4'
));
$imagepath =  get_template_directory_uri() . '/inc/customizer/images/footer/';
$wp_customize->add_control(new Educenter_Selector($wp_customize, 'educenter_footer_column', array(
    'section' => 'educenter_footer_section',
    'label' => esc_html__('Footer Column', 'educenter'),
    'class' => 'one-third-width',
    'options' => array(
        'ed-col-1' => $imagepath . 'col-1-1.jpg',
        'ed-col-2' => $imagepath . 'col-2-1-1.jpg',
        'ed-col-3' => $imagepath . 'col-3-1-1-1.jpg',
        'ed-col-4' => $imagepath . 'col-4-1-1-1-1.jpg',
    )
)));

$id = "footer";
$wp_customize->add_setting("educenter_{$id}_bg_type", array(
    'default' => 'color-bg',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));
$wp_customize->add_control("educenter_{$id}_bg_type", array(
    'section' => "educenter_{$id}_section",
    'type' => 'select',
    'label' => esc_html__('Background Type', 'educenter'),
    'choices' => array(
        'none'      => esc_html__('Default', 'educenter'),
        'color-bg'  => esc_html__('Color Background', 'educenter'),
        'gradient-bg' => esc_html__('Gradient Background (pro)', 'educenter'),
        'image-bg' => esc_html__('Image Background(Pro)', 'educenter'),
        'video-bg' => esc_html__('Video Background(Pro)', 'educenter')
    )
));

$wp_customize->add_setting("educenter_{$id}_bg_color", array(
    'default' => '#15171b',
    'sanitize_callback' => 'sanitize_hex_color',
    // 'transport' => 'postMessage'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "educenter_{$id}_bg_color", array(
    'section' => "educenter_{$id}_section",
    'label' => esc_html__('Background Color', 'educenter'),
)));


$wp_customize->add_setting( 'educenter_footer_margin_padding',
    array(
        'sanitize_callback' => 'educenter_sanitize_field_background',
        // 'transport' => 'postMessage',
        'default'           => json_encode(array(
            'padding'   => '',
            'margin' => '',
            'radius' => '',
        )),
    )
);
$wp_customize->add_control(new Educenter_Custom_Control_Group($wp_customize,'educenter_footer_margin_padding',
        array(
            'label'    => esc_html__( 'Margin/Padding', 'educenter' ),
            'section' => "educenter_{$id}_section",
            'settings' => 'educenter_footer_margin_padding',
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
/** seprator */
$wp_customize->add_setting("educenter_{$id}_seperator0", array(
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control(new Educenter_Separator_Control($wp_customize, "educenter_{$id}_seperator0", array(
    'section' => "educenter_{$id}_section",
)));

$wp_customize->add_setting("educenter_{$id}_section_seperator", array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => 'no',
    //'transport' => 'postMessage'
));
$wp_customize->add_control("educenter_{$id}_section_seperator", array(
    'section' => "educenter_{$id}_section",
    'type' => 'select',
    'label' => esc_html__('Enable Separator', 'educenter'),
    'choices' => array(
        'no' => esc_html__('Disable', 'educenter'),
        'top' => esc_html__('Enable Top Separator', 'educenter'),
    )
));

$wp_customize->add_setting("educenter_{$id}_top_seperator", array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => 'big-triangle-center',
    //'transport' => 'postMessage'
));
$wp_customize->add_control("educenter_{$id}_top_seperator", array(
    'section' => "educenter_{$id}_section",
    'type' => 'select',
    'label' => esc_html__('Top Separator', 'educenter'),
    'choices' => educenter_svg_seperator(),
));

$wp_customize->add_setting("educenter_{$id}_ts_color", array(
    'default' => '#15171b',
    'sanitize_callback' => 'educenter_sanitize_color_alpha',
    //'transport' => 'postMessage'
));
$wp_customize->add_control(new Educenter_Alpha_Color_Control($wp_customize, "educenter_{$id}_ts_color", array(
    'section' => "educenter_{$id}_section",
    'label' => esc_html__('Top Separator Color', 'educenter'),
)));

$wp_customize->add_setting("educenter_{$id}_ts_height_desktop", array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => 80,
    //'transport' => 'postMessage'
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
    'section' => "educenter_{$id}_section",
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
    )
)));


$wp_customize->add_setting('educenter_pro_footer_settings_panel_upgrade_text', array(
    'sanitize_callback' => 'educenter_sanitize_text'
));

$wp_customize->add_control(new EduCenter_Upgrade_Text($wp_customize, 'educenter_pro_footer_settings_panel_upgrade_text', array(
    'section' => "educenter_{$id}_section",
    'label' => esc_html__('For more styling and controls,', 'educenter'),
    'choices' => array(
        esc_html__('Contains Two Inner Sections: Main Footer Settings and Bottom Footer Settings', 'educenter'),
        esc_html__('Choice over display Layout', 'educenter'),
        esc_html__('Choice over fonts and its hover color', 'educenter'),
        esc_html__('Place to Enter Copyright Text', 'educenter'),
        esc_html__('Change Footer Right Side Settings', 'educenter'),
        esc_html__('Can also customize bottom footer background color', 'educenter'),
        esc_html__('Dynamic text editor option for bubble text', 'educenter'),
        esc_html__('Background Option, video, image, gradient and many more...', 'educenter'),
        esc_html__('Tet Color, Link Color, Radious and more...', 'educenter'),
    ),
    'priority' => 200
)));

$wp_customize->selective_refresh->add_partial('educenter_footer_refresh', array(
    'settings' => array(
        'educenter_footer_block_editor_support',
        'educenter_footer_column'
    ),
    'selector' => '#footer .bottom-footer',
    'fallback_refresh' => true,
    'container_inclusive' => false,
    'render_callback' => function() {
        return do_action('educenter_button_footer');
    }
));