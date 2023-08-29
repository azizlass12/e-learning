<?php
/**
 * Educenter Theme Customizer
 *
 * @package Educenter
 */

/**
 * Section Re Order
*/
add_action('wp_ajax_educenter_sections_reorder', 'educenter_sections_reorder');

function educenter_sections_reorder() {

    if (isset($_POST['sections'])) {

        set_theme_mod('educenter_homepage_section_order_list', $_POST['sections']);
    }

    wp_die();
}

function educenter_get_section_position($key) {
    $sections = educenter_homepage_section();
	$position = array_search($key, $sections);
    $return = ( $position + 1 ) * 11;

    return $return;
}

if( !function_exists('educenter_homepage_section') ){
	function educenter_homepage_section(){
		$home_sections = array(
			'educenter_fservices_settings',
			'educenter_aboutus_settings',
			'educenter_cta_settings',
			'educenter_services_settings',
			'educenter_counter_settings',                                    
			'educenter_courses_settings',
			'educenter_blog_settings',
			'educenter_team_settings',
			'educenter_gallery_settings',
			'educenter_testimonial_settings'
		);

		if ( class_exists( 'TP_Event' ) || class_exists( 'WPEMS' ) ) {
			$home_sections[] = 'educenter_events_settings';
		}


		$defaults = apply_filters('educenter_homepage_section_order_list', $home_sections );

		$sections = get_theme_mod('educenter_homepage_section_order_list', $defaults);
		if( !is_array($sections)){
			$sections = explode(',', $sections);
		}
		return $sections;
	}
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function educenter_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->register_section_type('EduCenter_Customize_Upgrade_Section');

	/**
	 * List All Pages
	*/
	$slider_pages = array();
	$slider_pages_obj = get_pages();
	$slider_pages[''] = esc_html__('Select Page','educenter');
	foreach ($slider_pages_obj as $page) {
	  $slider_pages[$page->ID] = $page->post_title;
	}

	/**
	 * List All Category
	*/
	$categories = get_categories( );
	$educenter_cat = array();
	foreach( $categories as $category ) {
	    $educenter_cat[$category->term_id] = $category->name;
	}


	$edu_pro_features = '<ul class="upsell-features">
		<li>' . esc_html__( "One click demo import" , "educenter" ) . '</li>
		<li>' . esc_html__( "Section reorder" , "educenter" ) . '</li>
		<li>' . esc_html__( "Video background, Parallax background" , "educenter" ) . '</li>
		<li>' . esc_html__( "Unlimited slider with linkable button" , "educenter" ) . '</li>
		<li>' . esc_html__( "Add unlimited blocks(like slider, team, testimonial) for each Section" , "educenter" ) . '</li>
		<li>' . esc_html__( "Fully customizable options for Front Page blocks" , "educenter" ) . '</li>
		<li>' . esc_html__( "Remove footer credit Text" , "educenter" ) . '</li>
		<li>' . esc_html__( "4 header layouts and advanced header settings" , "educenter" ) . '</li>
		<li>' . esc_html__( "2 blog layouts" , "educenter" ) . '</li>
		<li>' . esc_html__( "Advanced color options each section" , "educenter" ) . '</li>
		<li>' . esc_html__( "PreLoader option" , "educenter" ) . '</li>
		<li>' . esc_html__( "Sidebar layout options" , "educenter" ) . '</li>
		<li>' . esc_html__( "Website layout (Fullwidth or Boxed)" , "educenter" ) . '</li>
		<li>' . esc_html__( "Advanced blog settings" , "educenter" ) . '</li>
		<li>' . esc_html__( "9 custom widgets" , "educenter" ) . '</li>
		<li>' . esc_html__( "WooCommerce Compatible" , "educenter" ) . '</li>
		<li>' . esc_html__( "Fully Multilingual and Translation ready" , "educenter" ) . '</li>
		<li>' . esc_html__( "Fully RTL(Right to left) languages compatible" , "educenter" ) . '</li>
	</ul>';
	

	/**
	 * Important Link
	*/
	$wp_customize->add_section('educenter_implink_link_section',array(
		'title' 			=> esc_html__( 'Pro Theme Features', 'educenter' ),
		'priority'			=> 1
	));

		$wp_customize->add_setting('educenter_pro_theme_features', array(
			'title' => esc_html__('Pro Theme Features', 'educenter'),
			'sanitize_callback' => 'educenter_sanitize_text',
			'priority'			=> 1
		));

		$wp_customize->add_control( new Educenter_Customize_Control_Info_Text( $wp_customize, 'educenter_pro_theme_features', array(
			'settings'		=> 'educenter_pro_theme_features',
			'section'		=> 'educenter_implink_link_section',
			'description'	=> $edu_pro_features,
		)));

		$wp_customize->add_setting('educenter_implink_link_options', array(
			'title' => esc_html__('Important Links', 'educenter'),
			'sanitize_callback' => 'sanitize_text_field',
			'priority'			=> 2
		));

		$wp_customize->add_control( new Educenter_Customize_Control_Info_Text( $wp_customize, 'educenter_implink_link_options', array(
			'settings'		=> 'educenter_implink_link_options',
			'section'		=> 'educenter_implink_link_section',
			'description'	=> '<a class="educenter-implink" href="http://docs.sparklewpthemes.com/educenter/" target="_blank">'.esc_html__('Documentation', 'educenter').'</a><a class="educenter-implink" href="https://sparklewpthemes.com/wordpress-themes/education-wordpress-theme/" target="_blank">'.esc_html__('Live Demo', 'educenter').'</a><a class="educenter-implink" href="https://sparklewpthemes.com/support/" target="_blank">'.esc_html__('Support Forum', 'educenter').'</a><a class="educenter-implink" href="https://www.facebook.com/sparklewpthemes" target="_blank">'.esc_html__('Like Us in Facebook', 'educenter').'</a>',
		)));

	
	$wp_customize->register_control_type('Educenter_Custom_Control_Tab');
	$wp_customize->register_control_type('Educenter_Background_Control');
    $wp_customize->register_control_type('Educenter_Range_Slider_Control');
    // //$wp_customize->register_control_type('Educenter_Multiple_Check_Control');
    $wp_customize->register_control_type('Educenter_Color_Tab_Control');
    $wp_customize->register_control_type('Educenter_Custom_Control_Buttonset');
	$wp_customize->register_section_type('Educenter_Toggle_Section');

	
	require get_template_directory() . '/inc/customizer/customizer-panel/home/common-settings.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/top-header.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/header.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/social-settings.php';
    require get_template_directory() . '/inc/customizer/customizer-panel/quick-info.php';
	require get_template_directory() . '/inc/customizer/customizer-panel/header-cta.php';
	

	/**
	 * General Settings Panel
	*/
	$wp_customize->add_panel('educenter_general_settings', array(
	   'priority' => 3,
	   'title' => esc_html__('General Settings', 'educenter')
	));
		
		/**
	     * Logo & Tagline Settings
	    */
		$wp_customize->add_section( 'title_tagline', array(
		     'title'    => esc_html__( 'Site Logo/Title/Tagline', 'educenter' ),
		     'panel'    => 'educenter_general_settings',
		     'priority' => 1,
		) );

		/**
	     * Background Settings
	    */
		$wp_customize->add_section( 'background_image', array(
		     'title'    => esc_html__( 'Background Image', 'educenter' ),
		     'panel'    => 'educenter_general_settings',
		     'priority' => 2,
		) );

		$wp_customize->get_section( 'static_front_page' )->priority = 3;


		/**
		 * Themes Color Settings
		*/	
			$wp_customize->get_section('colors' )->title = esc_html__('Themes Colors Settings', 'educenter');
			$wp_customize->get_section('colors' )->priority = 2;

			$wp_customize->add_setting('educenter_primary_color', array(
			    'default' => '#ffb606',
			    'sanitize_callback' => 'sanitize_hex_color',        
			));
			$wp_customize->add_control('educenter_primary_color', array(
			    'type'     => 'color',
			    'label'    => esc_html__('Primary Theme Colors', 'educenter'),
			    'section'  => 'colors',
			    'setting'  => 'educenter_primary_color',
			));
		
			/**
			 * General Settings
			 */
			$wp_customize->add_section( 'educenter_general', array(
			    'priority'       => 1,
			    'title'          => esc_html__( 'Genral Settings', 'educenter' ),
			    'panel' => 'educenter_general_settings',
			) );

				$wp_customize->add_setting('educenter_show_bubble', array(
					'default' => true,
					'sanitize_callback' => 'educenter_sanitize_checkbox',        
				));
				$wp_customize->add_control('educenter_show_bubble', array(
					'type'     => 'checkbox',
					'label'    => esc_html__('Show Bubble Title', 'educenter'),
					'section'  => 'educenter_general',
					'setting'  => 'educenter_show_bubble',
				));

			

			/**
			 * General Settings Panel
			*/
			$wp_customize->add_panel('educenter_header_general_settings', array(
			   'priority' => 4,
			   'title' => esc_html__('Header Settings', 'educenter'),
			));


			$wp_customize->add_section(new EduCenter_Customize_Upgrade_Section($wp_customize, 'educenter-upgrade-section', array(
		        'title' => esc_html__('More Sections on Premium', 'educenter'),
		        'panel' => 'educenter_header_general_settings',
				'priority' => 210,
		        'options' => array(
		            esc_html__('--Drag and Drop Reorder Sections--', 'educenter'),
		            esc_html__('- Highlight Section', 'educenter'),
		            esc_html__('- Service Section', 'educenter'),
		            esc_html__('- Portfolio Section', 'educenter'),
		            esc_html__('- Portfolio Slider Section', 'educenter'),
		            esc_html__('- Content Slider Section', 'educenter'),
		            esc_html__('- Team Section', 'educenter'),
		            esc_html__('- Testimonial Section', 'educenter'),
		            esc_html__('- Pricing Section', 'educenter'),
		            esc_html__('- Blog Section', 'educenter'),
		            esc_html__('- Counter Section', 'educenter'),
		            esc_html__('- Call To Action Section', 'educenter'),
		            esc_html__('------------------------', 'educenter'),
		            esc_html__('- Elementor Pagebuilder Compatible. All the above sections can be created with Elementor Page Builder or Customizer whichever you like.', 'educenter'),
		        )
		    )));


			/**
			 * Main Header Layout Settings
			*/
			$wp_customize->add_section( 'educenter_main_header_layout', array(
				'title'           => esc_html__('Header Layout', 'educenter'),
				'priority'        => 2,
				'panel'			  => 'educenter_header_general_settings'
			));

				$wp_customize->add_setting('educenter_main_header_layout_upgrade_text', array(
			        'sanitize_callback' => 'educenter_sanitize_text'
			    ));

			    $wp_customize->add_control(new Educenter_Upgrade_Text($wp_customize, 'educenter_main_header_layout_upgrade_text', array(
			        'section' => 'educenter_main_header_layout',
			        'label' => esc_html__('For more header layouts,', 'educenter'),
			        'choices' => array(
			            esc_html__('Plus 4 header styles', 'educenter'),
			            esc_html__('Different Menu and Logo Layouts', 'educenter'),
			            esc_html__('Adjustments for phone, contact and email', 'educenter'),
						esc_html__('Dynamic text editor option for bubble text', 'educenter'),
			        ),
			        'priority' => 100
			    )));

			/**
			 * Menu Settings
			*/
			$wp_customize->add_section( 'educenter_main_menu_settings', array(
				'title'           => esc_html__('Menu General Settings', 'educenter'),
				'priority'        => 3,
				'panel'			  => 'educenter_header_general_settings'
			));

			/**
			 * Front Page Settings
			*/
			$wp_customize->add_section( 'educenter_frontpage_settings', array(
				'title'           => esc_html__('Enable FrontPage / Home Page', 'educenter'),
				'priority'        => 4,
			));

				$wp_customize->add_setting( 'educenter_set_frontpage', array(
					'sanitize_callback' => 'sanitize_text_field',
					'default' => false
				));

				$wp_customize->add_control( 'educenter_set_frontpage', array(
					'type' => 'checkbox',
					'priority'        => -1,
					'label' => esc_html__( 'Enable Educenter FrontPage','educenter' ),
					'section' => 'static_front_page'
				));


			


		/**
		 * Header Settings
		*/
		$wp_customize->get_section( 'header_image')->title = esc_html__( 'Breadcrumb Images', 'educenter' );
		$wp_customize->get_section( 'header_image' )->priority = 5;
		$wp_customize->get_section( 'header_image' )->transport = 'postMessage';

		$wp_customize->add_setting('header_image_upgrade_text', array(
	        'sanitize_callback' => 'educenter_sanitize_text'
	    ));

	    $wp_customize->add_control(new EduCenter_Upgrade_Text($wp_customize, 'header_image_upgrade_text', array(
	        'section' => 'header_image',
	        'label' => esc_html__('For more settings and controls,', 'educenter'),
	        'choices' => array(
	            esc_html__('Option to Enable/Disable Breadcrumbs Section', 'educenter'),
	            esc_html__('Option to Enable/Disable Breadcrumbs Menu', 'educenter'),
				esc_html__('Dynamic text editor option for bubble text', 'educenter'),
				esc_html__('Video, Gradient, Color Background Option', 'educenter'),
				esc_html__('Margin, Padding, Radious Option', 'educenter'),
				esc_html__('Alignment Option', 'educenter'),
	        ),
	        'priority' => 100
	    )));

		$wp_customize->add_setting("header_bg_color", array(
			'default' => '',
			'sanitize_callback' => 'educenter_sanitize_color_alpha',
		));
		$wp_customize->add_control(new Educenter_Alpha_Color_Control($wp_customize, "header_bg_color", array(
			'section' => 'header_image',
			'label' => esc_html__('Background/Overlay', 'educenter')
		)));

		/**
		 * HomePage Settings Panel
		*/
		$wp_customize->add_panel('educenter_homepage_settings', array(
		   'priority' => 5,
		   'title' => esc_html__('Home Page Sections', 'educenter'),
		   'description' => esc_html__('Drag and Drop to Reorder', 'educenter'). '<img class="educenter-drag-spinner" src="'.admin_url('/images/spinner.gif').'">',
		));

			
		require get_template_directory() . '/inc/customizer/customizer-panel/home/slider.php';
		require get_template_directory() . '/inc/customizer/customizer-panel/home/features.php';
		require get_template_directory() . '/inc/customizer/customizer-panel/home/aboutus.php';
		require get_template_directory() . '/inc/customizer/customizer-panel/home/counter.php';
		require get_template_directory() . '/inc/customizer/customizer-panel/home/cta.php';
		require get_template_directory() . '/inc/customizer/customizer-panel/home/popular-course.php';
		require get_template_directory() . '/inc/customizer/customizer-panel/home/course.php';
		require get_template_directory() . '/inc/customizer/customizer-panel/home/gallery.php';
		require get_template_directory() . '/inc/customizer/customizer-panel/home/team.php';
		require get_template_directory() . '/inc/customizer/customizer-panel/home/testimonial.php';
		require get_template_directory() . '/inc/customizer/customizer-panel/home/blog.php';

		if ( class_exists( 'TP_Event' ) || class_exists( 'WPEMS' ) ) {
			require get_theme_file_path('inc/customizer/customizer-panel/home//events.php');
		}
		
		

		$wp_customize->add_section(new EduCenter_Customize_Upgrade_Section($wp_customize, 'educenter-upgrade-section-homepage-settings', array(
			'title' => esc_html__('3 More Sections on Premium', 'educenter'),
			'panel' => 'educenter_homepage_settings',
			'options' => array(
				esc_html__('- Our Services', 'educenter'),
				esc_html__('- Video Call to Action', 'educenter'),
				esc_html__('- Our Client and Brand Logo Settings', 'educenter'),
				esc_html__('- Course Section with Multiple Layout and Options', 'educenter'),
				esc_html__('- Multiple Layout in every section', 'educenter'),
				esc_html__('- Free Hand HTML Block', 'educenter'),
				esc_html__('- Every Section have margin, padding, radious and more options', 'educenter'),
				esc_html__('- And more...', 'educenter'),
				esc_html__('------------------------', 'educenter'),
				esc_html__('- Elementor Pagebuilder Compatible. All the above sections can be created with Elementor Page Builder or Customizer whichever you like.', 'educenter'),
			)
		)));

	    
		/**
		 * Blog Template.
		*/
		$wp_customize->add_section('educenter_blog_template', array(
			'title'		  => esc_html__('Blog Template Settings','educenter'),
			'priority'	  => 8,
		));

		$wp_customize->add_setting('educenter_blog_template_upgrade_text', array(
	        'sanitize_callback' => 'educenter_sanitize_text'
	    ));

	    $wp_customize->add_control(new EduCenter_Upgrade_Text($wp_customize, 'educenter_blog_template_upgrade_text', array(
	        'section' => 'educenter_blog_template',
	        'label' => esc_html__('For more settings and controls,', 'educenter'),
	        'choices' => array(
	            esc_html__('Multi-Select option to choose category to show posts', 'educenter'),
	            esc_html__('Choose Between Normal and Masonary Layout', 'educenter'),
	            esc_html__('Control over display on post description', 'educenter'),
	            esc_html__('Change fonts color', 'educenter'),
	            esc_html__('Button Link Text Customization', 'educenter'),
	            esc_html__('Control over display on post author, date and category', 'educenter'),
				esc_html__('Dynamic text editor option for bubble text', 'educenter'),
	        ),
	        'priority' => 100
	    )));
		/**
		 * Web Page Layout Settings
		*/
		$wp_customize->add_section( 'educenter_pro_web_layout', array(
			'title'           => esc_html__('Web Page Layout Settings', 'educenter'),
			'priority'        => 8,
		));

		$wp_customize->add_setting('educenter_pro_web_layout_upgrade_text', array(
	        'sanitize_callback' => 'educenter_sanitize_text'
	    ));

	    $wp_customize->add_control(new EduCenter_Upgrade_Text($wp_customize, 'educenter_pro_web_layout_upgrade_text', array(
	        'section' => 'educenter_pro_web_layout',
	        'label' => esc_html__('For more styles settings,', 'educenter'),
	        'choices' => array(
	            esc_html__('Switch Between Boxed and Fullwidth Layout', 'educenter'),
				esc_html__('Dynamic text editor option for bubble text', 'educenter'),
	        ),
	        'priority' => 100
	    )));


		require get_template_directory() . '/inc/customizer/customizer-panel/footer.php';

		/**
		 * Switch(Enable/Diable) Sanitization Function
		*/
		function educenter_enabledisable_sanitize($input) {
		    if ( $input == 1 ) {
		        return 1;
		    } else {
		        return '';
		    }
		}

		/**
		 * Text Sanitization Function
		*/
		function educenter_sanitize_text( $input ) {
		    return wp_kses_post( force_balance_tags( $input ) );
		}


		/** educenter checkbox  */
		function educenter_sanitize_checkbox( $input ){
              
            //returns true if checkbox is checked
            return ( absint( $input ) ? true : false );
        }

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'educenter_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'educenter_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'educenter_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function educenter_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function educenter_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function educenter_customize_preview_js() {
	wp_enqueue_script( 'educenter-customizer', get_template_directory_uri() . '/assets/js/customizer-preview.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'educenter_customize_preview_js' );
