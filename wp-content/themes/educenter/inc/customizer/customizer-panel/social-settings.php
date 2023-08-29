<?php
/**
 * Theme Customizer
 */
$wp_customize->add_section('educenter_social_section', array(
    'title' => esc_html__('Social Links', 'educenter'),
    'panel' => 'educenter_header_general_settings',
    // 'priority' => 201,
));
$wp_customize->add_setting('educenter_social_section_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
    
));
$wp_customize->add_control(new Educenter_Custom_Control_Tab($wp_customize, 'educenter_social_section_nav', array(
    'type' => 'tab',
    'section' => 'educenter_social_section',
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'educenter'),
            'fields' => array(
                'educenter_social_media',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'educenter'),
            'fields' => array(
               'educenter_social_icon_color',
               'educenter_social_icon_bg_color',
               'educenter_social_icon_hover_color',
               'educenter_social_icon_hover_bg_color'
            ),
        ),
    ),
)));
$wp_customize->add_setting('educenter_social_media', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'educenter_sanitize_repeater',
    'default' => json_encode( array(
                array(
                    'icon' => 'fab fa-facebook-f',
                    'link' => get_theme_mod('educenter_social_facebook', ''),
                    'enable' => 'on'
                ),
                array(
                    'icon' => 'fab fa-twitter',
                    'link' => get_theme_mod('educenter_social_twitter', ''),
                    'enable' => 'on'
                ),
                array(
                    'icon' => 'fab fa-instagram',
                    'link' => get_theme_mod('educenter_social_instagram', ''),
                    'enable' => 'on'
                ),
                array(
                    'icon' => 'fab fa-pinterest',
                    'link' => get_theme_mod('educenter_social_pinterest', ''),
                    'enable' => 'on'
                ),
                array(
                    'icon' => 'fab fa-linkedin',
                    'link' => get_theme_mod('educenter_social_linkedin', ''),
                    'enable' => 'on'
                ),

                array(
                    'icon' => 'fab fa-youtube',
                    'link' => get_theme_mod('educenter_social_youtube', ''),
                    'enable' => 'on'
                ),
            
            ))    
));
$wp_customize->add_control(new Educenter_Repeater_Control($wp_customize, 'educenter_social_media', array(
        'label' => esc_html__('Social Links', 'educenter'),
        'section' => 'educenter_social_section',
        'box_label' => esc_html__('Social Link', 'educenter'),
        'add_label' => esc_html__('Add New', 'educenter'),
    ), 
    array(
        'icon' => array(
            'type' => 'social-icon',
            'label' => esc_html__('Select Icon', 'educenter'),
            'default' => 'icofont-facebook'
        ),
        'link' => array(
            'type' => 'url',
            'label' => esc_html__('Add Link', 'educenter'),
            'default' => ''
        ),
        'enable' => array(
            'type' => 'switch',
            'label' => esc_html__('Enable', 'educenter'),
            'switch' => array(
                'on' => 'Yes',
                'off' => 'No'
            ),
            'default' => 'on'
        )
    )
));

$wp_customize->selective_refresh->add_partial( 'educenter_social_media_refresh', array (
    'settings' => array( 'educenter_social_media' ),
    'selector' => '.edu-social',
    'container_inclusive' => true,
    'render_callback' => function () {
        return do_action( 'educenter_social_links' );
    }
));

$wp_customize->add_setting('educenter_social_icon_color', array(
    'sanitize_callback' => 'educenter_sanitize_color_alpha',
    'default' => '',
));
$wp_customize->add_control(new Educenter_Alpha_Color_Control($wp_customize, 'educenter_social_icon_color', array(
    'section' => 'educenter_social_section',
    'label' => esc_html__('Color', 'educenter')
)));
$wp_customize->add_setting('educenter_social_icon_bg_color', array(
    'sanitize_callback' => 'educenter_sanitize_color_alpha',
    'default' => ''
));
$wp_customize->add_control(new Educenter_Alpha_Color_Control($wp_customize, 'educenter_social_icon_bg_color', array(
    'section' => 'educenter_social_section',
    'label' => esc_html__('Background Color', 'educenter')
)));
$wp_customize->add_setting('educenter_social_icon_hover_color', array(
    'sanitize_callback' => 'educenter_sanitize_color_alpha',
    'default' => '',
));
$wp_customize->add_control(new Educenter_Alpha_Color_Control($wp_customize, 'educenter_social_icon_hover_color', array(
    'section' => 'educenter_social_section',
    'label' => esc_html__('Hover Color', 'educenter')
)));
$wp_customize->add_setting('educenter_social_icon_hover_bg_color', array(
    'sanitize_callback' => 'educenter_sanitize_color_alpha',
    'default' => ''
));
$wp_customize->add_control(new Educenter_Alpha_Color_Control($wp_customize, 'educenter_social_icon_hover_bg_color', array(
    'section' => 'educenter_social_section',
    'label' => esc_html__('Hover Background Color', 'educenter')
)));