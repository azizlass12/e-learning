<?php
/**
 * Theme Customizer
 *
 */
				

$wp_customize->add_section('educenter_quick_info', array(
    'title' => esc_html__('Quick Information', 'educenter'),
	'panel' => 'educenter_header_general_settings',
));

	$wp_customize->add_setting('educenter_quick_nav', array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
		'priority' => -1,
	));
	$wp_customize->add_control(new Educenter_Custom_Control_Tab($wp_customize, 'educenter_quick_nav', array(
		'type' => 'tab',
		'section' => 'educenter_quick_info',
		'buttons' => array(
			array(
				'name' => esc_html__('Settings', 'educenter'),
				'fields' => array(
					'educenter_quick_content',
				),
				'active' => true,
			),
			array(
				'name' => esc_html__('Style', 'educenter'),
				'fields' => array(
					'educenter_quick_info_icon_color',
					'educenter_quick_info_color',
				)
			)
		)
	)));

	$wp_customize->add_setting('educenter_quick_content', array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'educenter_sanitize_repeater',
		'default' => json_encode(array(
			array(
				'icon' => 'fas fa-envelope',
				'label' => '',
				'val' => get_theme_mod('educenter_email_address', 'info@sptheme.com'),
				'link' => '',
				'enable' => 'on'
			),
			array(
				'icon' => 'fas fa-phone',
				'label' => '',
				'val' => get_theme_mod('educenter_phone_number', '+01-559-236-8009'),
				'link' => '',
				'enable' => 'on'
			),
			array(
				'icon' => 'fas fa-map',
				'label' => '',
				'val' => get_theme_mod('educenter_map_address', '28 Street, New York City'),
				'link' => '',
				'enable' => 'on'
			),
			array(
				'icon' => 'fas fa-clock',
				'label' => '',
				'val' => get_theme_mod('educenter_opeening_time'),
				'link' => '',
				'enable' => 'on'
			),
			
		))
	));
	$wp_customize->add_control(new Educenter_Repeater_Control($wp_customize, 'educenter_quick_content', array(
			'label' => esc_html__('Information', 'educenter'),
			'section' => 'educenter_quick_info',
			'box_label' => esc_html__('Information Item', 'educenter'),
			'add_label' => esc_html__('Add New', 'educenter'),
		), 
		array(
			'icon' => array(
				'type' => 'icon',
				'label' => esc_html__('Icon', 'educenter'),
				'default' => ''
			),
			'label' => array(
				'type' => 'text',
				'label' => esc_html__('Label', 'educenter'),
				'default' => ''
			),
			'val' => array(
				'type' => 'text',
				'label' => esc_html__('Value', 'educenter'),
				'default' => ''
			),
			'link' => array(
				'type' => 'text',
				'label' => esc_html__('Link', 'educenter'),
				'default' => ''
			),
			

			'enable' => array(
				'type' => 'switch',
				'label' => esc_html__('Enable', 'educenter'),
				'switch' => array(
					'on' => __('Yes', 'educenter'),
					'off' => __('No', 'educenter')
				),
				'default' => 'on'
			)
		)
	));

	/******
	 * Style ( Color )
	*/
	$wp_customize->add_setting("educenter_quick_info_icon_color", array(
		'default' => '',
		'sanitize_callback' => 'educenter_sanitize_color_alpha',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(new Educenter_Alpha_Color_Control($wp_customize, "educenter_quick_info_icon_color", array(
		'section' => 'educenter_quick_info',
		'label' => esc_html__('Icon Color', 'educenter'),
	)));

	$wp_customize->add_setting("educenter_quick_info_color", array(
		'default' => '',
		'sanitize_callback' => 'educenter_sanitize_color_alpha',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(new Educenter_Alpha_Color_Control($wp_customize, "educenter_quick_info_color", array(
		'section' => 'educenter_quick_info',
		'label' => esc_html__('Text Color', 'educenter'),
	)));

	$wp_customize->selective_refresh->add_partial( 'educenter_quick_content', array (
		'settings' => array( 
			'educenter_quick_content' 
		),
		'selector' => '.contact-info .quickcontact',
		'container_inclusive' => true,
		'render_callback' => function () {
			return do_action( 'educenter_top_quick', 5 );	
		}
	));