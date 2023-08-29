<?php
/**
 * How It Works Section
*/
$wp_customize->add_section(new Educenter_Toggle_Section($wp_customize, 'educenter_how_it_works_section', array(
    'title' => esc_html__('How It Works Section', 'educenter'),
    'panel' => 'educenter_frontpage_settings',
    'priority' => educenter_get_section_position('educenter_how_it_works_section'),
    'hiding_control' => 'educenter_how_it_works_section_disable'
)));

//Enable/Diable how_it_works Section
$wp_customize->add_setting('educenter_how_it_works_section_disable', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
    'default' => 'disable'
));
$wp_customize->add_control(new Educenter_Switch_Control($wp_customize, 'educenter_how_it_works_section_disable', array(
    'section' => 'educenter_how_it_works_section',
    'label' => esc_html__('Enable Section', 'educenter'),
    'switch_label' => array(
        'enable' => esc_html__('Yes', 'educenter'),
        'disable' => esc_html__('No', 'educenter'),
    ),
    'class' => 'switch-section',
    'priority' => 2
)));

$wp_customize->add_setting('educenter_how_it_works_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(new Educenter_Custom_Control_Tab($wp_customize, 'educenter_how_it_works_nav', array(
    'type' => 'tab',
    'section' => 'educenter_how_it_works_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'educenter'),
            'fields' => array(
                'educenter_how_it_works_section_disable',
                'educenter_how_it_works_title_subtitle_heading',
                'educenter_how_it_works_super_title',
                'educenter_how_it_works_title',
                'educenter_how_it_works_title_align',
                'educenter_how_it_works_page',
                'educenter_how_it_works_type',
                'educenter_how_it_works_advance_settings'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'educenter'),
            'fields' => array(
                'educenter_how_it_works_cs_heading',
                'educenter_how_it_works_super_title_color',
                'educenter_how_it_works_title_color',
                'educenter_how_it_works_text_color',
                'educenter_how_it_works_link_color',
                'educenter_how_it_works_link_hover_color',
            ),
        ),
        array(
            'name' => esc_html__('Advanced', 'educenter'),
            'fields' => array(
                'educenter_how_it_works_bg_type',
                'educenter_how_it_works_bg_color',
                'educenter_how_it_works_bg_gradient',
                'educenter_how_it_works_bg_image',
                'educenter_how_it_works_bg_video',
                'educenter_how_it_works_overlay_color',
                'educenter_how_it_works_padding',
                'educenter_how_it_works_content_heading',
                'educenter_how_it_works_content_bg_type',
                'educenter_how_it_works_content_bg_color',
                'educenter_how_it_works_content_bg_gradient',
                'educenter_how_it_works_content_padding',
                'educenter_how_it_works_content_margin',
                'educenter_how_it_works_content_radius',
                'educenter_how_it_works_cs_seperator',
                'educenter_how_it_works_seperator0',
                'educenter_how_it_works_section_seperator',
                'educenter_how_it_works_seperator1',
                'educenter_how_it_works_top_seperator',
                'educenter_how_it_works_ts_color',
                'educenter_how_it_works_ts_height',
                'educenter_how_it_works_seperator2',
                'educenter_how_it_works_bottom_seperator',
                'educenter_how_it_works_bs_color',
                'educenter_how_it_works_bs_height'
            ),
        )
    ),
)));

$wp_customize->add_setting('educenter_how_it_works_title_subtitle_heading', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field'
));
$wp_customize->add_control(new Educenter_Customize_Heading($wp_customize, 'educenter_how_it_works_title_subtitle_heading', array(
    'section' => 'educenter_how_it_works_section',
    'label' => esc_html__('Section Title & Sub Title', 'educenter')
)));

$wp_customize->add_setting('educenter_how_it_works_super_title', array(
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));
$wp_customize->add_control('educenter_how_it_works_super_title', array(
    'section' => 'educenter_how_it_works_section',
    'type' => 'text',
    'label' => esc_html__('Super Title', 'educenter')
));
$wp_customize->add_setting('educenter_how_it_works_title', array(
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));
$wp_customize->add_control('educenter_how_it_works_title', array(
    'section' => 'educenter_how_it_works_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'educenter')
));

$wp_customize->add_setting('educenter_how_it_works_title_align', array(
    'default' => 'text-center',
    'sanitize_callback' => 'educenter_sanitize_select',
    'transport' => 'postMessage'
));

$wp_customize->add_control(
    new Educenter_Custom_Control_Buttonset( $wp_customize, 'educenter_how_it_works_title_align',
        array(
            'choices'  => array(
                'text-left' => esc_html__('Left', 'educenter'),
                'text-center' => esc_html__('Center', 'educenter'),
                'text-right' => esc_html__('Right', 'educenter'),
            ),
            'label'    => esc_html__( 'Alignment', 'educenter' ),
            'section'  => 'educenter_how_it_works_section',
            'settings' => 'educenter_how_it_works_title_align',
        )
    )
);

/*****
 * How It Wirks Type
 */
$wp_customize->add_setting('educenter_how_it_works_type', array(
    'default' => 'default',
    'transport' => 'postMessage',
    'sanitize_callback' => 'educenter_sanitize_select'
));
$wp_customize->add_control('educenter_how_it_works_type', array(
    'section' => 'educenter_how_it_works_section',
    'type' => 'radio',
    'label' => esc_html__('Select How It Works Type', 'educenter'),
    'choices' => array(
        'default' => esc_html__('Default', 'educenter'),
        'advance' => esc_html__('Advance', 'educenter')
    )
));

/****
 * Default How It Works Options
 */
$wp_customize->add_setting('educenter_how_it_works_page', array(
    'sanitize_callback' => 'educenter_sanitize_repeater',
    'transport' => 'postMessage',
    'default' => json_encode(array(
        array(
            'block_page'  => '',
            'block_icon' => 'fas fa-address-card'
        )
    )),
));
$wp_customize->add_control(new Educenter_Repeater_Control($wp_customize, 'educenter_how_it_works_page', array(
    'section' => 'educenter_how_it_works_section',
    'label' => esc_html__('How it works', 'educenter'),
    'box_label' => esc_html__('Block Item', 'educenter'),
    'add_label' => esc_html__('Add New', 'educenter'),
    ), 
    array(
        'block_icon' => array(
            'type' => 'icon',
            'label' => esc_html__('Choose Icon', 'educenter'),
            'default' => 'fas fa-address-card'
        ),
        'block_page' => array(
            'type' => 'select',
            'label' => esc_html__('Page', 'educenter'),
            'default' => '',
            'options' => $pages
        )
    )
));

/****
 * Advance How It Wroks Options
 */
$id = "how_it_works";
$wp_customize->add_setting("educenter{$id}_advance_settings", array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'educenter_sanitize_repeater',		//done
    'default' => json_encode(array(
        array(
            'block_image'      => '',
            'block_icon'       => 'fas fa-address-card',
            'block_title'      => '',
            'block_desc'       => '',
            'button_text'      => '',
            'button_url'       => '',
        )
    ))
));
$wp_customize->add_control(new Educenter_Repeater_Control( $wp_customize, "educenter{$id}_advance_settings", 
    array(
        'label' 	   => esc_html__('How It Works Settings', 'educenter'),
        'section' 	   => "educenter{$id}_section",
        'settings' 	   => "educenter{$id}_advance_settings",
        'box_label' => esc_html__('Block Item', 'educenter'),
        'add_label' => esc_html__('Add New Item', 'educenter'),
    ),
    array(
        'block_image' => array(
            'type' => 'upload',
            'label' => __("Upload Image", 'educenter'),
        ),
        'block_icon' => array(
            'type' => 'icon',
            'label' => esc_html__('Choose Icon', 'educenter'),
            'default' => 'fas fa-address-card'
        ),
        'block_title' => array(
            'type' => 'text',
            'label' => __("Title", 'educenter'),
        ),
        'block_desc' => array(
            'type' => 'textarea',
            'label' => __("Short Description", 'educenter'),
        ),
        'button_text' => array(
            'type' => 'text',
            'label' => esc_html__('Enter First Button Text', 'educenter'),
            'default' => ''
        ),
        'button_url' => array(
            'type' => 'url',
            'label' => esc_html__('Enter First Button Url', 'educenter'),
            'default' => ''
        ),
    )
));

$wp_customize->selective_refresh->add_partial( 'educenter_how_it_works_settings', array (
    'settings' => array( 
        'educenter_how_it_works_section_disable',
        'educenter_how_it_works_page', 
        'educenter_how_it_works_type',
        'educenter_how_it_works_advance_settings',
        'educenter_how_it_works_section_seperator', 
        'educenter_how_it_works_top_seperator', 
        'educenter_how_it_works_bottom_seperator'
    ),
    'selector' => '#how_it_works-section',
    'fallback_refresh' => true,
    'container_inclusive' => true,
    'render_callback' => function () {
        return get_template_part( 'section/section', 'how_it_works' );
    }
));
