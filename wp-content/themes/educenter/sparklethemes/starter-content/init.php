<?php
    
function educenter_starter_content_setup(){
    $sample_page_id = 2;
    $query = new WP_Query(
        array(
            'post_type'              => 'page',
            'title'                  => 'Sample Page',
            'post_status'            => 'all',
            'posts_per_page'         => 1,
            'no_found_rows'          => true,
            'ignore_sticky_posts'    => true,
            'update_post_term_cache' => false,
            'update_post_meta_cache' => false,
            'orderby'                => 'post_date ID',
            'order'                  => 'ASC',
        )
    );
     
    if ( ! empty( $query->post ) ) {
        $sample_page_id = $query->ID;
    }
    

    add_theme_support( 'starter-content', apply_filters('educenter_starter_content', array(
        'options' => array(
            'show_on_front' => 'page',
            'page_on_front' => '{{home}}',
            'page_for_posts' => '{{blog}}',
            // Our Custom
            'blogdescription' => __('Just another WordPress site', 'educenter'),
        ),
        'posts' => array(
            'home'    => require __DIR__ . '/home.php',
            'services' => require __DIR__ . '/service.php',
            'gallery' => require __DIR__ . '/gallery.php',
            'blog' => require __DIR__ . '/blog.php',
            'team' => require __DIR__ . '/team.php',
        ),

        'theme_mods'  => apply_filters('educenter_starter_content_theme_mods', array(
            'educenter_primary_color' => apply_filters('educenter_primary_color', '#ffb606'),
            'educenter_email_address' => 'info@example.com',
            'educenter_phone_number' => '0123456789',
            'educenter_opeening_time' => __('10AM - 10PM', 'educenter'),
            'educenter_social_facebook' => '#',
            'educenter_social_twitter' => '#',
            'educenter_social_instagram' => '#',

            'educenter_set_frontpage' => false,
            'educenter_homepage_slider_type' => 'advance',

            'educenter_banner_normal_all_sliders' => json_encode( array(
                array(
                    'slider_img' => get_template_directory_uri(  ). '/assets/images/default/pexels-photo-820823.jpeg',
                    'slider_title' => __('Welcome To Our University', 'educenter'),
                    'slider_desc' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit labore mollitia, aliquam nisi neque perspiciatis expedita, nulla deleniti…', 'educenter'),
                    'button_text' => __('Admision Open', 'educenter'),
                    'button_url' => '#'
                ),

                array(
                    'slider_img' => get_template_directory_uri(  ). '/assets/images/default/pexels-photo-267885.jpeg',
                    'slider_title' => __('Turn Your Dream Into Reality', 'educenter'),
                    'slider_desc' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit labore mollitia, aliquam nisi neque perspiciatis expedita, nulla deleniti…', 'educenter'),
                    'button_text' => __('Admision Open', 'educenter'),
                    'button_url' => '#'
                ),

                array(
                    'slider_img' => get_template_directory_uri(  ). '/assets/images/default/fatigued-young-laptop-beautiful-seductive-seat-1366717-pxhere.com.jpg',
                    'slider_title' => __('Your Success Is Our Mission', 'educenter'),
                    'slider_desc' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit labore mollitia, aliquam nisi neque perspiciatis expedita, nulla deleniti…', 'educenter'),
                    'button_text' => __('Admision Open', 'educenter'),
                    'button_url' => '#'
                ),
            )),

            // parent theme 
            'educenter_fservices_area_options' => 1,
            'educenter_homepage_service_type' => 'advance',
            'educenter_fservices_section_title' => __('Our Featured Courses', 'educenter'),
            'educenter_fservices_section_subtitle' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit labore mollitia, aliquam nisi neque perspiciatis expedita, nulla deleniti…', 'educenter'),
            'educenter_fservices_area_settings_advance' => json_encode( array(
                array(
                      'services_icon' => 'fas fa-female',
                      'title' => __('Fashion','educenter') ,
                      'link' => '#',
                ),
                
                array(
                      'services_icon' => 'fas fa-volume-up',
                      'title' => __('Music','educenter') ,
                      'link' => '#',
                ),
                
                array(
                      'services_icon' => 'fa fa-plane',
                      'title' => __('Travel','educenter') ,
                      'link' => '#',
                ))
            ),        

            /** child theme xpert */
            'education_xpert_feature_services_type' => 'advance',
            'education_xpert_feature_services_area_settings_advance' => json_encode( array(
                array(
                      'services_icon' => 'fas fa-female',
                      'title' => __('Fashion Courses','educenter') ,
                      'description' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit labore mollitia, aliquam nisi neque perspiciatis expedita, nulla deleniti…', 'educenter'),
                ),
                
                array(
                      'services_icon' => 'fas fa-volume-up',
                      'title' => __('Music & Art','educenter') ,
                      'description' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit labore mollitia, aliquam nisi neque perspiciatis expedita, nulla deleniti…', 'educenter'),
                ),
                
                array(
                      'services_icon' => 'fa fa-plane',
                      'title' => __('Travel & Tourism','educenter') ,
                      'description' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit labore mollitia, aliquam nisi neque perspiciatis expedita, nulla deleniti…', 'educenter'),
                )
            )),        

            /** about us section */

            'educenter_aboutus_section_area_options' => true,
            'educenter_aboutus_main_title' => esc_html__( 'About US', 'educenter' ),
            'educenter_aboutus_main_subtitle' => esc_html__( 'Details information about us', 'educenter' ),
            'educenter_aboutus_page_features_image' => get_template_directory_uri(  ). '/assets/images/default/bg6.jpg',
            'educenter_aboutus_page_features_image' => get_template_directory_uri(  ). '/assets/images/default/laptop-notebook-computer-work-man-technology-1042998-pxhere.com.png',
            'educenter_aboutus_area_settings' =>  json_encode( array(
                array(
                    'about_icon' => 'fa fa-user',
                    'about_page' => $sample_page_id,
                ),
                array(
                    'about_icon' => 'fa fa-user',
                    'about_page' => $sample_page_id,
                ),
                array(
                    'about_icon' => 'fa fa-user',
                    'about_page' => $sample_page_id,
                ),
            )),
            
            /** Testimonials  */
            'educenter_testimonial_area_options' => true,
            'educenter_testimonial_title' => esc_html__( 'WHAT ARE THEY SAYING ABOUT TESTIMONIAL', 'educenter' ),
            'educenter_testimonial_subtitle' => esc_html__( "The most profound words will remain unread unless you can keep the learner engaged. You can't see their eyes to know if they got it so … say it, show it, write it, demo it and link it to an activity.", 'educenter' ),
            'educenter_testimonial_area_settings' => json_encode( array(
                array( 'testimonial_page' => $sample_page_id ),
                array( 'testimonial_page' => $sample_page_id ),
                array( 'testimonial_page' => $sample_page_id ),
            )),


            /** child theme xpert */
            'educenter_services_area_options' => false,
            'educenter_courses_section_area_options' => false,
            'educenter_gallery_area_options' => false,

            'educenter_counter_bg_image' => get_template_directory_uri(  ). '/assets/images/default/bg6.jpg',
            'educenter_counter_area_settings' => json_encode( array(
                array(
                      'counter_icon' => 'fab fa-gitter',
                      'counter_number' => '988877',
                      'counter_title' => __('Shield', 'educenter') 
                ),
                array(
                      'counter_icon' => 'fa fa-trophy',
                      'counter_number' => '10908',
                      'counter_title' => __('Trophies', 'educenter') 
                ),
                array(
                      'counter_icon' => 'fa fa-desktop',
                      'counter_number' => '8272',
                      'counter_title' => __('Online', 'educenter') 
                ),
                array(
                      'counter_icon' => 'fa fa-star',
                      'counter_number' => '123000',
                      'counter_title' => __('Passed', 'educenter') 
                ),

            ) ),

            
            'educenter_team_area_options' => false,
            'educenter_blog_area_term_id' => '1',
        )),

        'nav_menus' => array(
            'menu-1' => array(
				'name' => __( 'Primary Menu', 'educenter' ),
				'items' => array(
					'page_home',
					'page_blog',
                    
					'page_service' => array(
						'type' => 'post_type',
						'object' => 'page',
						'object_id' => '{{services}}',
					),

                    'page_team' => array(
						'type' => 'post_type',
						'object' => 'page',
						'object_id' => '{{team}}',
					),
				),
			),
		),

        
    )));
}
add_action( 'after_setup_theme', 'educenter_starter_content_setup' );