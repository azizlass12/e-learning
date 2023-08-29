<?php            
/**
 * Our Team Member Area
*/
$wp_customize->add_section(new Educenter_Toggle_Section($wp_customize, 'educenter_events_settings', array(
    'title' => esc_html__('Events', 'educenter'),
    'panel' => 'educenter_homepage_settings',
    'priority' => educenter_get_section_position('educenter_events_settings'),
    'hiding_control' => 'educenter_events_area_options'
)));

    $wp_customize->add_setting('educenter_events_area_options', array(
        'default' => 'enable',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',     //done
    ));
    $wp_customize->add_control(new Educenter_Switch_Control($wp_customize, 'educenter_events_area_options', array(
        'label' => esc_html__('Enable', 'educenter'),
        'section' => 'educenter_events_settings',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'educenter'),
            'disable' => esc_html__('No', 'educenter'),
        ),
        'class' => 'switch-section',
        'priority' => 2
    )));

    $wp_customize->add_setting('educenter_events_area_title', array(
        'default'       =>      '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('educenter_events_area_title', array(
        'section'    => 'educenter_events_settings',
        'label'      => esc_html__('Title', 'educenter'),
        'type'       => 'text'  
    ));
    $wp_customize->add_setting('educenter_events_area_subtitle', array(
        'default'       =>      '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('educenter_events_area_subtitle', array(
        'section'    => 'educenter_events_settings',
        'label'      => esc_html__('Sub Title', 'educenter'),
        'type'       => 'text'  
    ));

    $wp_customize->add_setting('educenter_events_category', array(
        'default' => 'all',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'         
    ));

    $wp_customize->add_control('educenter_events_category', array(
        'label'   => esc_html__('Events','educenter'),
        'section' => 'educenter_events_settings',
        'type'    => 'select',
        'choices' => array(
            'all'   => esc_html__( "All", 'educenter' ),
            'happening' => esc_html__('Happening Events','educenter'),
            'upcoming' => esc_html__('Upcomming Events','educenter'),
            'expired' => esc_html__('Expired Events','educenter')
        )
    ));

    $wp_customize->add_setting('educenter_events_show_tab', array(
        'default' => '1',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'         
    ));

    $wp_customize->add_control('educenter_events_show_tab', array(
        'label'   => esc_html__('Show Tab','educenter'),
        'section' => 'educenter_events_settings',
        'type'    => 'checkbox'
    ));
    $wp_customize->selective_refresh->add_partial('education_pro_events_refresh', array(
            'settings' => array('educenter_events_show_tab', 
            'educenter_events_category',
            'educenter_events_area_options',
            'educenter_events_area_title',
            'educenter_events_area_subtitle',
        ),
        'selector' => '#edu-wp-events-section',
        'container_inclusive' => true,
        'render_callback' => function() {
            return do_action('educenter_wp_events');
        }
    ));