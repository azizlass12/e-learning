<?php    
/**
 *learning-point-lite Theme Customizer
 *
 * @package Learning Point Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function learning_point_lite_customize_register( $wp_customize ) {	
	
	function learning_point_lite_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function learning_point_lite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	} 
	
	function learning_point_lite_sanitize_phone_number( $phone ) {
		// sanitize phone
		return preg_replace( '/[^\d+]/', '', $phone );
	} 
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	 //Panel for section & control
	$wp_customize->add_panel( 'learning_point_lite_panel_section', array(
		'priority' => null,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options Panel', 'learning-point-lite' ),		
	) );
	
	//Site Layout Options
	$wp_customize->add_section('learning_point_lite_layout_sections',array(
		'title' => __('Site Layout Options','learning-point-lite'),			
		'priority' => 1,
		'panel' => 	'learning_point_lite_panel_section',          
	));		
	
	$wp_customize->add_setting('learning_point_lite_boxlayoutoptions',array(
		'sanitize_callback' => 'learning_point_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'learning_point_lite_boxlayoutoptions', array(
    	'section'   => 'learning_point_lite_layout_sections',    	 
		'label' => __('Check to Show Box Layout','learning-point-lite'),
		'description' => __('If you want to show box layout please check the Box Layout Option.','learning-point-lite'),
    	'type'      => 'checkbox'
     )); //Site Layout Options 
	
	$wp_customize->add_setting('learning_point_lite_template_coloroptions',array(
		'default' => '#ffa600',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'learning_point_lite_template_coloroptions',array(
			'label' => __('Color Options','learning-point-lite'),			
			'description' => __('More color options available in PRO Version','learning-point-lite'),
			'section' => 'colors',
			'settings' => 'learning_point_lite_template_coloroptions'
		))
	);
	
	$wp_customize->add_setting('learning_point_lite_site_hdrcolor',array(
		'default' => '#05305a',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'learning_point_lite_site_hdrcolor',array(					
			'description' => __('manage header background color','learning-point-lite'),
			'section' => 'colors',
			'settings' => 'learning_point_lite_site_hdrcolor'
		))
	);
	
	$wp_customize->add_setting('learning_point_lite_site_infobarcolor',array(
		'default' => '#0c2440',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'learning_point_lite_site_infobarcolor',array(					
			'description' => __('manage header top info background color','learning-point-lite'),
			'section' => 'colors',
			'settings' => 'learning_point_lite_site_infobarcolor'
		))
	);
	
	
	
	
	//Top Contact info section
	$wp_customize->add_section('learning_point_lite_topcontact_sections',array(
		'title' => __('Top Contact Section','learning-point-lite'),				
		'priority' => null,
		'panel' => 	'learning_point_lite_panel_section',
	));		
	
	
	$wp_customize->add_setting('learning_point_lite_toptelephone',array(
		'default' => null,
		'sanitize_callback' => 'learning_point_lite_sanitize_phone_number'	
	));
	
	$wp_customize->add_control('learning_point_lite_toptelephone',array(	
		'type' => 'text',
		'label' => __('enter phone number here','learning-point-lite'),
		'section' => 'learning_point_lite_topcontact_sections',
		'setting' => 'learning_point_lite_toptelephone'
	));	
	
	$wp_customize->add_setting('learning_point_lite_topemailinfo',array(
		'sanitize_callback' => 'sanitize_email'
	));
	
	$wp_customize->add_control('learning_point_lite_topemailinfo',array(
		'type' => 'email',
		'label' => __('enter email id here.','learning-point-lite'),
		'section' => 'learning_point_lite_topcontact_sections'
	));		
		
	
	$wp_customize->add_setting('learning_point_lite_show_topinfo_sections',array(
		'default' => false,
		'sanitize_callback' => 'learning_point_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'learning_point_lite_show_topinfo_sections', array(
	   'settings' => 'learning_point_lite_show_topinfo_sections',
	   'section'   => 'learning_point_lite_topcontact_sections',
	   'label'     => __('Check To show This Section','learning-point-lite'),
	   'type'      => 'checkbox'
	 ));//Show Top Contact section
	 
	 
	 //Top Social icons
	$wp_customize->add_section('learning_point_lite_topsocial_icons_sections',array(
		'title' => __('Header social Sections','learning-point-lite'),
		'description' => __( 'Add social icons link here to display icons in header.', 'learning-point-lite' ),			
		'priority' => null,
		'panel' => 	'learning_point_lite_panel_section', 
	));
	
	$wp_customize->add_setting('learning_point_lite_facebook_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'	
	));
	
	$wp_customize->add_control('learning_point_lite_facebook_link',array(
		'label' => __('Add facebook link here','learning-point-lite'),
		'section' => 'learning_point_lite_topsocial_icons_sections',
		'setting' => 'learning_point_lite_facebook_link'
	));	
	
	$wp_customize->add_setting('learning_point_lite_twitter_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('learning_point_lite_twitter_link',array(
		'label' => __('Add twitter link here','learning-point-lite'),
		'section' => 'learning_point_lite_topsocial_icons_sections',
		'setting' => 'learning_point_lite_twitter_link'
	));
	
	$wp_customize->add_setting('learning_point_lite_googleplus_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('learning_point_lite_googleplus_link',array(
		'label' => __('Add google plus link here','learning-point-lite'),
		'section' => 'learning_point_lite_topsocial_icons_sections',
		'setting' => 'learning_point_lite_googleplus_link'
	));
	
	$wp_customize->add_setting('learning_point_lite_linkedin_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('learning_point_lite_linkedin_link',array(
		'label' => __('Add linkedin link here','learning-point-lite'),
		'section' => 'learning_point_lite_topsocial_icons_sections',
		'setting' => 'learning_point_lite_linkedin_link'
	));
	
	$wp_customize->add_setting('learning_point_lite_instagram_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('learning_point_lite_instagram_link',array(
		'label' => __('Add instagram link here','learning-point-lite'),
		'section' => 'learning_point_lite_topsocial_icons_sections',
		'setting' => 'learning_point_lite_instagram_link'
	));
	
	$wp_customize->add_setting('learning_point_lite_show_topsocial_icons_sections',array(
		'default' => false,
		'sanitize_callback' => 'learning_point_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'learning_point_lite_show_topsocial_icons_sections', array(
	   'settings' => 'learning_point_lite_show_topsocial_icons_sections',
	   'section'   => 'learning_point_lite_topsocial_icons_sections',
	   'label'     => __('Check To show This Section','learning-point-lite'),
	   'type'      => 'checkbox'
	 ));//Show Header Social icons area
	
	// Front Slider Section		
	$wp_customize->add_section( 'learning_point_lite_frontpageslider_section', array(
		'title' => __('Frontpage Slider Sections', 'learning-point-lite'),
		'priority' => null,
		'description' => __('Default image size for slider is 1400 x 745 pixel.','learning-point-lite'), 
		'panel' => 	'learning_point_lite_panel_section',           			
    ));
	
	$wp_customize->add_setting('learning_point_lite_frontslide1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'learning_point_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('learning_point_lite_frontslide1',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slider 1:','learning-point-lite'),
		'section' => 'learning_point_lite_frontpageslider_section'
	));	
	
	$wp_customize->add_setting('learning_point_lite_frontslide2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'learning_point_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('learning_point_lite_frontslide2',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slider 2:','learning-point-lite'),
		'section' => 'learning_point_lite_frontpageslider_section'
	));	
	
	$wp_customize->add_setting('learning_point_lite_frontslide3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'learning_point_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('learning_point_lite_frontslide3',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slider 3:','learning-point-lite'),
		'section' => 'learning_point_lite_frontpageslider_section'
	));	// Homepage Slider Section
	
	$wp_customize->add_setting('learning_point_lite_frontslidebutton',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('learning_point_lite_frontslidebutton',array(	
		'type' => 'text',
		'label' => __('enter slider Read more button name here','learning-point-lite'),
		'section' => 'learning_point_lite_frontpageslider_section',
		'setting' => 'learning_point_lite_frontslidebutton'
	)); // Home Slider Read More Button Text
	
	$wp_customize->add_setting('learning_point_lite_show_frontpageslider_section',array(
		'default' => false,
		'sanitize_callback' => 'learning_point_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'learning_point_lite_show_frontpageslider_section', array(
	    'settings' => 'learning_point_lite_show_frontpageslider_section',
	    'section'   => 'learning_point_lite_frontpageslider_section',
	     'label'     => __('Check To Show This Section','learning-point-lite'),
	   'type'      => 'checkbox'
	 ));//Show Homepage Slider Section	
	 
	 
	 // 4 color boxes Services Section
	$wp_customize->add_section('learning_point_lite_4colorboxes_sections', array(
		'title' => __('Four color boxes Services Section','learning-point-lite'),
		'description' => __('Select pages from the dropdown for four column services sections','learning-point-lite'),
		'priority' => null,
		'panel' => 	'learning_point_lite_panel_section',          
	));	
	
	
	$wp_customize->add_setting('learning_point_lite_4colorbx1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'learning_point_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'learning_point_lite_4colorbx1',array(
		'type' => 'dropdown-pages',			
		'section' => 'learning_point_lite_4colorboxes_sections',
	));		
	
	$wp_customize->add_setting('learning_point_lite_4colorbx2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'learning_point_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'learning_point_lite_4colorbx2',array(
		'type' => 'dropdown-pages',			
		'section' => 'learning_point_lite_4colorboxes_sections',
	));
	
	$wp_customize->add_setting('learning_point_lite_4colorbx3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'learning_point_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'learning_point_lite_4colorbx3',array(
		'type' => 'dropdown-pages',			
		'section' => 'learning_point_lite_4colorboxes_sections',
	));	
	
	$wp_customize->add_setting('learning_point_lite_4colorbx4',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'learning_point_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'learning_point_lite_4colorbx4',array(
		'type' => 'dropdown-pages',			
		'section' => 'learning_point_lite_4colorboxes_sections',
	));	
	
	
	$wp_customize->add_setting('learning_point_lite_show_4colorboxes_sections',array(
		'default' => false,
		'sanitize_callback' => 'learning_point_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'learning_point_lite_show_4colorboxes_sections', array(
	   'settings' => 'learning_point_lite_show_4colorboxes_sections',
	   'section'   => 'learning_point_lite_4colorboxes_sections',
	   'label'     => __('Check To Show This Section','learning-point-lite'),
	   'type'      => 'checkbox'
	 ));//Show 4 color boxes Services Section
	 
	 
	//Sidebar Settings
	$wp_customize->add_section('learning_point_lite_sidebar_options', array(
		'title' => __('Sidebar Options','learning-point-lite'),		
		'priority' => null,
		'panel' => 	'learning_point_lite_panel_section',          
	));	
	
	$wp_customize->add_setting('learning_point_lite_hidesidebar_from_homepage',array(
		'default' => false,
		'sanitize_callback' => 'learning_point_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'learning_point_lite_hidesidebar_from_homepage', array(
	   'settings' => 'learning_point_lite_hidesidebar_from_homepage',
	   'section'   => 'learning_point_lite_sidebar_options',
	   'label'     => __('Check to hide sidebar from latest post page','learning-point-lite'),
	   'type'      => 'checkbox'
	 ));// Hide sidebar from latest post page
	 
	 
	 $wp_customize->add_setting('learning_point_lite_hidesidebar_singlepost',array(
		'default' => false,
		'sanitize_callback' => 'learning_point_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'learning_point_lite_hidesidebar_singlepost', array(
	   'settings' => 'learning_point_lite_hidesidebar_singlepost',
	   'section'   => 'learning_point_lite_sidebar_options',
	   'label'     => __('Check to hide sidebar from single post','learning-point-lite'),
	   'type'      => 'checkbox'
	 ));// hide sidebar single post	 

		 
}
add_action( 'customize_register', 'learning_point_lite_customize_register' );

function learning_point_lite_custom_css(){ 
?>
	<style type="text/css"> 					
        a, .listview_blogstyle h2 a:hover,
        #sidebar ul li a:hover,						
        .listview_blogstyle h3 a:hover,		
        .postmeta a:hover,
		.site-navigation .menu a:hover,
		.site-navigation .menu a:focus,
		.site-navigation .menu ul a:hover,
		.site-navigation .menu ul a:focus,
		.site-navigation ul li a:hover, 
		.site-navigation ul li.current-menu-item a,
		.site-navigation ul li.current-menu-parent a.parent,
		.site-navigation ul li.current-menu-item ul.sub-menu li a:hover, 			
        .button:hover,
		.nivo-caption h2 span,
		h2.services_title span,			
		.blog_postmeta a:hover,		
		.site-footer ul li a:hover, 
		.site-footer ul li.current_page_item a		
            { color:<?php echo esc_html( get_theme_mod('learning_point_lite_template_coloroptions','#ffa600')); ?>;}					 
            
        .pagination ul li .current, .pagination ul li a:hover, 
        #commentform input#submit:hover,		
        .nivo-controlNav a.active,
		.sd-search input, .sd-top-bar-nav .sd-search input,			
		a.blogreadmore,			
		.nivo-caption .slide_morebtn:hover,
		.learnmore:hover,		
		.copyrigh-wrapper:before,
		.infobox a.get_an_enquiry:hover,									
        #sidebar .search-form input.search-submit,				
        .wpcf7 input[type='submit'],				
        nav.pagination .page-numbers.current,		
		.blogreadbtn,
		a.getanappointment,
		.widget-title-tab,		
        .toggle a	
            { background-color:<?php echo esc_html( get_theme_mod('learning_point_lite_template_coloroptions','#ffa600')); ?>;}
			
		
		.tagcloud a:hover,		
		.topsocial_icons a:hover,
		.site-footer h5::after,	
		h3.widget-title,	
		h3.widget-title::after
            { border-color:<?php echo esc_html( get_theme_mod('learning_point_lite_template_coloroptions','#ffa600')); ?>;}
		
		.site-header	
            { background-color:<?php echo esc_html( get_theme_mod('learning_point_lite_site_hdrcolor','#05305a')); ?> !important;}
			
		.logo:before	
            { border-top:18px solid <?php echo esc_html( get_theme_mod('learning_point_lite_site_hdrcolor','#05305a')); ?> !important;}		
			
		.topinfobar	
            { background-color:<?php echo esc_html( get_theme_mod('learning_point_lite_site_infobarcolor','#0c2440')); ?>;}		
			
		button:focus,
		input[type="button"]:focus,
		input[type="reset"]:focus,
		input[type="submit"]:focus,
		input[type="text"]:focus,
		input[type="email"]:focus,
		input[type="url"]:focus,
		input[type="password"]:focus,
		input[type="search"]:focus,
		input[type="number"]:focus,
		input[type="tel"]:focus,
		input[type="range"]:focus,
		input[type="date"]:focus,
		input[type="month"]:focus,
		input[type="week"]:focus,
		input[type="time"]:focus,
		input[type="datetime"]:focus,
		input[type="datetime-local"]:focus,
		input[type="color"]:focus,
		textarea:focus,
		#templatelayout a:focus
            { outline:thin dotted <?php echo esc_html( get_theme_mod('learning_point_lite_template_coloroptions','#ffa600')); ?>;}				
	
    </style> 
<?php                                                                                          
}
         
add_action('wp_head','learning_point_lite_custom_css');	 

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function learning_point_lite_customize_preview_js() {
	wp_enqueue_script( 'learning_point_lite_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '19062019', true );
}
add_action( 'customize_preview_init', 'learning_point_lite_customize_preview_js' );