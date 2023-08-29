<?php
/**
 * Dynamic css
*/
if ( ! function_exists( 'educenter_dynamic_css' ) ) {

    function educenter_dynamic_css() {
        
        $primary_color = get_theme_mod('educenter_primary_color', apply_filters('educenter_primary_color', '#ffb606') );
        
        $rgba = educenter_hex2rgba($primary_color, 0.7);

        $educenter_colors = '';

        /** header / breadcrumb */
        $breadcum_color = get_theme_mod('header_bg_color');
        if($breadcum_color):
            $educenter_colors .="
            .ed-breadcrumb .ed-overlay,
            .lp-archive-courses #learn-press-course.course-summary .course-summary-content .course-detail-info:before {
                background: {$breadcum_color};
                content: '';
                height: 100%;
                width: 100%;
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
            }";
        endif;

    /**
     *  Background Color
    */         
        $educenter_colors .= "
        body{--wp--preset--color--primary: {$primary_color}; }

        .box-header-nav .main-menu .children>.page_item.focus>a, .box-header-nav .main-menu .sub-menu>.menu-item.focus>a, .box-header-nav .main-menu .children>.page_item:hover>a, .box-header-nav .main-menu .sub-menu>.menu-item:hover>a,
        .general-header .top-header,
        .ed-courses .ed-img-holder .course_price,
        
        .ed-slider .ed-slide div .ed-slider-info a.slider-button,
        .ed-slider.slider-layout-2 .lSAction>a,

        .general-header .main-navigation>ul>li:before, 
        .general-header .main-navigation>ul>li.current_page_item:before,
        .general-header .main-navigation ul ul.sub-menu,

        .ed-pop-up .search-form input[type='submit'],

        .ed-services.layout-3 .ed-service-slide .col:before,

        .ed-about-us .ed-about-content .listing .icon-holder,

        .ed-cta.layout-1 .ed-cta-holder a.ed-button,

        .ed-cta.layout-1 .ed-cta-holder h2:before,

        h2.section-header:after,
        .ed-services.layout-2 .ed-service-left .ed-col-holder .col .icon-holder:hover,

        .ed-button,

        section.ed-gallery .ed-gallery-wrapper .ed-gallery-item .ed-gallery-button,

        .ed-team-member .ed-team-col .ed-inner-wrap .ed-text-holder h3.ed-team-title:before,

        .ed-testimonials .lSPager.lSpg li a,
        .ed-blog .ed-blog-wrap .lSPager.lSpg li a,

        .ed-blog .ed-blog-wrap .ed-blog-col .ed-title h3:before,

        .goToTop,

        .nav-previous a, 
        .nav-next a,
        .page-numbers,

        #comments form input[type='submit'],

        .widget-ed-title h2:before,

        .widget_search .search-submit, 
        .widget_product_search input[type='submit'],

        .woocommerce #respond input#submit, 
        .woocommerce a.button, 
        .woocommerce button.button, 
        .woocommerce input.button,

        .woocommerce nav.woocommerce-pagination ul li a:focus, 
        .woocommerce nav.woocommerce-pagination ul li a:hover, 
        .woocommerce nav.woocommerce-pagination ul li span.current,

        .woocommerce #respond input#submit.alt, 
        .woocommerce a.button.alt, 
        .woocommerce button.button.alt, 
        .woocommerce input.button.alt,

        .wpcf7 input[type='submit'], 
        .wpcf7 input[type='button'],

        .list-tab-event .nav-tabs li.active::before,
        .widget-area.sidebar-events .book-title,
        .widget-area.sidebar-events .widget_book-event .event_register_foot .event_register_submit,
        .thim-list-content li::before,
        .tp_event_counter,
        
        .single-lp_course #learn-press-course .course-summary-sidebar .course-sidebar-preview .lp-course-buttons button.button-enroll-course,
        .single-lp_course ul.learn-press-nav-tabs .course-nav.active::before,

        .woocommerce-account .woocommerce-MyAccount-navigation ul li a,

        .lSSlideOuter .lSPager.lSpg>li.active a, 
        .lSSlideOuter .lSPager.lSpg>li:hover a,
        .ed-services .ed-service-left .ed-col-holder .col h3:before, 
        .ed-courses .ed-text-holder h3:before,
        .educenter_counter:before,
        .educenter_counter:after,
        .header-nav-toggle div,
        .ed-header .ed-badge,
        .ed-header .ed-badge::after,
        .not-found .backhome a{

            background-color: $primary_color;

        }
        .ed-gallery .ed-gallery-wrapper .ed-gallery-item .caption{
            background-color: {$primary_color}c9;
        }
        
        \n";


        $educenter_colors .= "
        .ed-slider .lSSlideOuter .lSPager.lSpg > li:hover a, .ed-slider .lSSlideOuter .lSPager.lSpg > li.active a,
        .ed-about-us.layout-2 .ed-about-list h3.ui-accordion-header,
        .ed-about-us.layout-2 .ed-about-list h3.ui-accordion-header:before,
        .woocommerce div.product .woocommerce-tabs ul.tabs li:hover, 
        .woocommerce div.product .woocommerce-tabs ul.tabs li.active{

            background-color: $primary_color !important;

        }\n";


         $educenter_colors .= "
        .ed-slider .ed-slide div .ed-slider-info a.slider-button:hover,
        .ed-cta.layout-1 .ed-cta-holder a.ed-button:hover{

            background-color: $rgba;

        }\n";


    /**
     *  Color
    */
        $educenter_colors .= "

        .box-header-nav .main-menu .page_item.current_page_item>a, .box-header-nav .main-menu .page_item.focus>a, .box-header-nav .main-menu>.menu-item.focus>a, .box-header-nav .main-menu .page_item:hover>a, .box-header-nav .main-menu>.menu-item.current-menu-item>a, .box-header-nav .main-menu>.menu-item:hover>a,
        
        .single-lp_course #learn-press-course-tabs .course-nav.active label,
        .single-lp_course .course-extra-box__content li::before,
        #learn-press-profile #profile-nav .lp-profile-nav-tabs > li.wishlist > a::before,
        .learn-press-pagination .page-numbers > li .page-numbers.current,
        .learn-press-pagination .page-numbers > li .page-numbers:hover,
        .lp-archive-courses .learn-press-courses[data-layout=\"list\"] .course .course-item .course-content .course-permalink .course-title:hover,
        .lp-archive-courses .learn-press-courses[data-layout=\"list\"] .course .course-item .course-content .course-wrap-meta .meta-item::before,
        .lp-archive-courses .learn-press-courses[data-layout=\"list\"] .course .course-item .course-content .course-permalink .course-title:hover,
        input[type=\"radio\"]:nth-child(3):checked ~ .switch-btn:nth-child(4)::before,
        input[type=\"radio\"]:nth-child(1):checked ~ .switch-btn:nth-child(2)::before,
        .lp-archive-courses .course-summary .course-summary-content .course-detail-info .course-info-left .course-meta .course-meta__pull-left .meta-item::before ,
        input[name=\"course-faqs-box-ratio\"]:checked + .course-faqs-box .course-faqs-box__title,
        .course-tab-panel-faqs .course-faqs-box:hover .course-faqs-box__title,

        .ed-services.layout-2 .ed-service-left .ed-col-holder .col .icon-holder i,

        .ed-about-us .ed-about-content .listing .text-holder h3 a:hover,

        .ed-courses .ed-text-holder span,

        section.ed-gallery .ed-gallery-wrapper .ed-gallery-item .ed-gallery-button a i,

        .ed-blog .ed-blog-wrap .ed-blog-col .ed-category-list a,

        .ed-blog .ed-blog-wrap .ed-blog-col .ed-bottom-wrap .ed-tag a:hover, 
        .ed-blog .ed-blog-wrap .ed-blog-col .ed-bottom-wrap .ed-share-wrap a:hover,
        .ed-blog .ed-blog-wrap .ed-blog-col .ed-meta-wrap .ed-author a:hover,

        .page-numbers.current,
        .page-numbers:hover,

        .widget_archive a:hover, 
        .widget_categories a:hover, 
        .widget_recent_entries a:hover, 
        .widget_meta a:hover, 
        .widget_product_categories a:hover, 
        .widget_recent_comments a:hover,

        .woocommerce #respond input#submit:hover, 
        .woocommerce a.button:hover, 
        .woocommerce button.button:hover, 
        .woocommerce input.button:hover,
        .woocommerce ul.products li.product .price,
        .woocommerce nav.woocommerce-pagination ul li .page-numbers,

        .woocommerce #respond input#submit.alt:hover, 
        .woocommerce a.button.alt:hover, 
        .woocommerce button.button.alt:hover, 
        .woocommerce input.button.alt:hover,

        .woocommerce-message:before,
        .woocommerce-info:before,

        .woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a, .woocommerce-account .woocommerce-MyAccount-navigation ul li:hover a,

        .main-navigation .close-icon:hover,
        .widget-area.sidebar-events .widget_book-event ul li.event-cost .value,

        .tp-event-info .tp-info-box .heading i,
        .item-event .time-from,

        .not-found .page-header .tag404,

        #comments ol.comment-list li article footer.comment-meta .comment-author.vcard b a,
        #comments ol.comment-list li article footer.comment-meta .comment-author.vcard b,
        #comments ol.comment-list li article footer.comment-meta .comment-author.vcard span,

        .ed-services .ed-service-left .ed-col-holder .col h3 a:hover, 
        .title a:hover,
        .ed-courses .ed-text-holder h3 a:hover,
        .ed-about-us .ed-about-content .listing .text-holder h3 a,
        .ed-testimonials .ed-testimonial-wrap.layout-1 .ed-test-slide .ed-text-holder h3 a:hover,
        .ed-blog .ed-blog-wrap .ed-blog-col .ed-title h3 a:hover,
        .not-found .backhome a:hover{

            color: $primary_color !important;

        }\n";


        $educenter_colors .= "
        
        @media (max-width: 900px){
            .box-header-nav .main-menu .children>.page_item:hover>a, .box-header-nav .main-menu .sub-menu>.menu-item:hover>a {

                color: $primary_color !important;

        } }\n";

    /**
     *  Border Color
    */
        $educenter_colors .= "

        .ed-slider .ed-slide div .ed-slider-info a.slider-button,

        .ed-pop-up .search-form input[type='submit'],

        .ed-cta.layout-1 .ed-cta-holder a.ed-button,

        .ed-services.layout-2 .ed-col-holder .col,

        .ed-button,.ed-services.layout-2

        .page-numbers,
        .page-numbers:hover,

        .ed-courses.layout-2 .ed-text-holder,

        .ed-testimonials .ed-testimonial-wrap.layout-1 .ed-test-slide .ed-img-holder,
        .ed-testimonials .ed-testimonial-wrap.layout-1 .ed-test-slide .ed-text-holder,

        .goToTop,

        #comments form input[type='submit'],


        .woocommerce #respond input#submit, 
        .woocommerce a.button, 
        .woocommerce button.button, 
        .woocommerce input.button,

        .woocommerce nav.woocommerce-pagination ul li,

        .cart_totals h2, 
        .cross-sells>h2, 
        .woocommerce-billing-fields h3, 
        .woocommerce-additional-fields h3, 
        .related>h2, 
        .upsells>h2, 
        .woocommerce-shipping-fields>h3,

        .woocommerce-cart .wc-proceed-to-checkout a.checkout-button,

        .woocommerce div.product .woocommerce-tabs ul.tabs:before,

        .wpcf7 input[type='submit'], 
        .wpcf7 input[type='button'],

        .ed-slider .ed-slide div .ed-slider-info a.slider-button:hover,
        .educenter_counter,
        .ed-cta.layout-1 .ed-cta-holder a.ed-button:hover,
        .primary-section .ed-blog .ed-blog-wrap.layout-2 .ed-blog-col,
        .page-numbers,
        .single-lp_course #learn-press-course .course-summary-sidebar .course-sidebar-preview .lp-course-buttons button.button-enroll-course,
        .single-lp_course #learn-press-course .course-summary-sidebar .course-sidebar-preview .lp-course-buttons button:hover,
        .woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a, 
        .woocommerce-account .woocommerce-MyAccount-navigation ul li:hover a,
        .woocommerce-account .woocommerce-MyAccount-content,

        .woocommerce-message,
        .woocommerce-info,
        .cross-sells h2:before, .cart_totals h2:before, 
        .up-sells h2:before, .related h2:before, 
        .woocommerce-billing-fields h3:before, 
        .woocommerce-shipping-fields h3:before, 
        .woocommerce-additional-fields h3:before, 
        #order_review_heading:before, 
        .woocommerce-order-details h2:before, 
        .woocommerce-column--billing-address h2:before, 
        .woocommerce-column--shipping-address h2:before, 
        .woocommerce-Address-title h3:before, 
        .woocommerce-MyAccount-content h3:before, 
        .wishlist-title h2:before, 
        .woocommerce-account .woocommerce h2:before, 
        .widget-area .widget .widget-title:before,
        .ed-slider .ed-slide div .ed-slider-info a.slider-button,
        .not-found .backhome a,
        .not-found .backhome a:hover,
        .comments-area h2.comments-title:before{

            border-color: $primary_color;

        }\n";


        $educenter_colors .= "

        .nav-next a:after{

            border-left: 11px solid $primary_color;

        }\n";


        $educenter_colors .= "

        .woocommerce-account .woocommerce-MyAccount-navigation ul li a{

            border: 1px solid $primary_color;
            margin-right: 1px;

        }\n";

        $educenter_colors .= "
        .nav-previous a:after{

            border-right: 11px solid $primary_color

        }\n";


        /**
         * slider color option
         */
        $slider_colors = get_theme_mod('educenter-slider-color');
        if( $slider_colors ){
            $slider_colors = json_decode($slider_colors);
            
            $educenter_colors.= "
                .ed-slider .ed-slide div .ed-slider-info h2{
                    color: {$slider_colors->title};
                }
                .ed-slider .ed-slide div .ed-slider-info p{
                    color: {$slider_colors->content};
                }
                .ed-slider .ed-slide div .ed-slider-info a.slider-button{
                    color: {$slider_colors->button_text};
                    background-color: {$slider_colors->button_bg};
                    border-color: {$slider_colors->button_bg};
                }
            ";
        }

        $desktopCss = $tabletCss = $mobileCss = "";
        $dynamic_css = apply_filters( 'educenter_external_css', array('desktop' => $desktopCss, 'tablet' => $tabletCss, 'mobile' => $mobileCss) );
        
        $educenter_colors .= $dynamic_css['desktop'];

        $educenter_colors .= "@media screen and (max-width:768px){{$dynamic_css['tablet']}}";
        $educenter_colors .= "@media screen and (max-width:480px){{$dynamic_css['mobile']}}";


        wp_add_inline_style( 'educenter-style', educenter_strip_whitespace(apply_filters( 'educenter_dynamic_css', $educenter_colors )) );
        wp_add_inline_style( 'education-xpert-style', educenter_strip_whitespace(apply_filters( 'educenter_dynamic_css', $educenter_colors )) );
    }
}
add_action( 'wp_enqueue_scripts', 'educenter_dynamic_css', 99 );
function educenter_strip_whitespace($css) {
    $replace = array(
        "#/\*.*?\*/#s" => "", // Strip C style comments.
        "#\s\s+#" => " ", // Strip excess whitespace.
    );
    $search = array_keys($replace);
    $css = preg_replace($search, $replace, $css);

    $replace = array(
        ": " => ":",
        "; " => ";",
        " {" => "{",
        " }" => "}",
        ", " => ",",
        "{ " => "{",
        ";}" => "}", // Strip optional semicolons.
        ",\n" => ",", // Don't wrap multiple selectors.
        "\n}" => "}", // Don't wrap closing braces.
        "} " => "}", // Put each rule on it's own line.
    );
    $search = array_keys($replace);
    $css = str_replace($search, $replace, $css);

    return trim($css);
}


function get_educenter_dynamic_padding_value($padding){
    $css = $tab_css = $mobile_css = '';
    // desktop padding
    $padding_desktop = educenter_cssbox_values_inline( $padding, 'desktop' );
    if ( strpos( $padding_desktop, 'px' ) !== false ) {
        $css .= 'padding:' . $padding_desktop . ';';
    }
    // tablet padding
    $padding_desktop = educenter_cssbox_values_inline( $padding, 'tablet' );
    if ( strpos( $padding_desktop, 'px' ) !== false ) {
        $tab_css .= 'padding:' . $padding_desktop . ';';
    }
    // mobile padding
    $padding_desktop = educenter_cssbox_values_inline( $padding, 'mobile' );
    if ( strpos( $padding_desktop, 'px' ) !== false ) {
        $mobile_css .= 'padding:' . $padding_desktop . ';';
    }

    return ['desktop' => $css, 'tablet' => $tab_css, 'mobile' => $mobile_css];

}

function get_educenter_dynamic_margin_value($margin){
    $css = $tab_css = $mobile_css = '';
    // desktop margin
    $margin_desktop = educenter_cssbox_values_inline( $margin, 'desktop' );
    if ( strpos( $margin_desktop, 'px' ) !== false ) {
        $css .= 'margin:' . $margin_desktop . ';';
    }
    // tablet margin
    $margin_desktop = educenter_cssbox_values_inline( $margin, 'tablet' );
    if ( strpos( $margin_desktop, 'px' ) !== false ) {
        $tab_css .= 'margin:' . $margin_desktop . ';';
    }
    // mobile margin
    $margin_desktop = educenter_cssbox_values_inline( $margin, 'mobile' );
    if ( strpos( $margin_desktop, 'px' ) !== false ) {
        $mobile_css .= 'margin:' . $margin_desktop . ';';
    }

    return ['desktop' => $css, 'tablet' => $tab_css, 'mobile' => $mobile_css];

}

function get_educenter_dynamic_radius_value($radius){
    $css = $tab_css = $mobile_css = '';

    $radius_desktop = educenter_cssbox_values_inline( $radius, 'desktop' );
    if ( strpos( $radius_desktop, 'px' ) !== false ) {
        $css .= 'border-radius:' . $radius_desktop . ';';
    }
    // tablet radius
    $radius_desktop = educenter_cssbox_values_inline( $radius, 'tablet' );
    if ( strpos( $radius_desktop, 'px' ) !== false ) {
        $tab_css .= 'border-radius:' . $radius_desktop . ';';
    }
    // mobile radius
    $radius_desktop = educenter_cssbox_values_inline( $radius, 'mobile' );
    if ( strpos( $radius_desktop, 'px' ) !== false ) {
        $mobile_css .= 'border-radius:' . $radius_desktop . ';';
    }

    return ['desktop' => $css, 'tablet' => $tab_css, 'mobile' => $mobile_css];

}

function educenter_merge_two_arra($array1, $array2){
    if(is_array($array1) && is_array($array2)){
        $desktop = $array1['desktop'] . $array2['desktop'];
        $tablet  = $array1['tablet'] . $array2['tablet'];
        $mobile  = $array1['mobile'] . $array2['mobile'];
    

        return array(
            'desktop' => $desktop,
            'tablet' => $tablet,
            'mobile' => $mobile
        );
    }
    return array(
        'desktop' => '',
        'tablet' => '',
        'mobile' => ''
    );

}

function get_educenter_dynamic_css_return_val( $wrapper, $desktop, $tablet, $mobile, $className){
    $dynamicCss = $tabletCss = $mobileCss = '';
    if( $wrapper && is_array($wrapper)){
            $dynamicCss = $wrapper['desktop'];
            $tabletCss = $wrapper['tablet'];
            $mobileCss = $wrapper['mobile'];
    }
    if( $desktop ){
        $dynamicCss .="{$className} {
            {$desktop}
        }";
    }
    if( $tablet ){
        $tabletCss .= "{$className} {
            {$tablet}
        }";
    }

    if($mobile ) {
        $mobileCss .= "{$className} {
            {$mobile}
        }";
    }


    // echo $dynamic_css; exit;
    return array(
        'desktop' => $dynamicCss,
        'tablet' => $tabletCss,
        'mobile' => $mobileCss
    );
    
}



function educenter_dynamic_top_header_css( $parent_css ) {

    $bg     = get_theme_mod('educenter_th_bg_color');
    
    $color  = get_theme_mod('educenter_th_text_color');
    $anchor = get_theme_mod('educenter_th_anchor_color');
    
    $css = $tab_css = $mobile_css = "";
    
    
    if( $bg ){
        $css .= "background-color: {$bg};";
    }
    if( $color ){
        $css .= "color: {$color};";
    }

    
    // Padding
    $padding = get_theme_mod('educenter_th_content_padding');
    $padding = json_decode( $padding, true );
    $padding = get_educenter_dynamic_padding_value($padding);
    
    $css.= $padding['desktop'];
    $tab_css.= $padding['tablet'];
    $mobile_css.= $padding['mobile'];
    
    // Margin
    $margin = get_theme_mod('educenter_th_content_margin');
    $margin = json_decode( $margin, true );
    $margin = get_educenter_dynamic_margin_value($margin);
    
    $css.= $margin['desktop'];
    $tab_css.= $margin['tablet'];
    $mobile_css.= $margin['mobile'];

    // radius
    $radius = get_theme_mod('educenter_th_content_radius');
    $radius = json_decode( $radius, true );
    $radius = get_educenter_dynamic_radius_value($radius);
    
    $css.= $radius['desktop'];
    $tab_css.= $radius['tablet'];
    $mobile_css.= $radius['mobile'];


    $css1 = get_educenter_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.general-header .top-header');


    $css2 = array(
        'desktop' => '',
        'tablet' => '',
        'mobile' => '',
    );

    if( $anchor ){
        $css2['desktop'] .=".general-header .top-header a{ color: {$anchor};}";
    }

    
    $return = educenter_merge_two_arra($parent_css,  educenter_merge_two_arra($css1, $css2) );

    return $return;
    
    
}

add_filter('educenter_external_css', 'educenter_dynamic_top_header_css', 100);

function educenter_dynamic_header_quick_info_css( $parent_css ){

    $css = $tab_css = $mobile_css = "";
    $icon = get_theme_mod('educenter_quick_info_icon_color');
    
    if( $icon ){
        $css .="color: {$icon};";
    }
    
    $css1= get_educenter_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.general-header .top-header ul li i');
    

    $css = $tab_css = $mobile_css = "";

    $color = get_theme_mod('educenter_quick_info_color');
    if( $color ){
        $css .="color: {$color};";
    }    
    
    $css2 = array(
        'desktop' => '',
        'tablet' => '',
        'mobile' => '',
    );
    
    if( $css ){
        $css2['desktop'] = ".quickcontact{{$css}}";
    }
    
    return educenter_merge_two_arra($parent_css,  educenter_merge_two_arra($css1, $css2) );


}

add_filter('educenter_external_css', 'educenter_dynamic_header_quick_info_css');

function educenter_dynamic_header_social_links_css( $parent_css ){

    $css = $tab_css = $mobile_css = "";
    $icon_color  = get_theme_mod('educenter_social_icon_color');
    $icon_bg = get_theme_mod('educenter_social_icon_bg_color');
    
    if( $icon_color ){
        $css .="color: {$icon_color};";
    }

    if( $icon_bg ){
        $css .="background-color: {$icon_bg};";
    }
    
    $css1= get_educenter_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.general-header .top-header .right-contact .edu-social li a i');
    

    $css = $tab_css = $mobile_css = "";

    $hover_color = get_theme_mod('educenter_social_icon_hover_color');
    $hover_bg = get_theme_mod( 'educenter_social_icon_hover_bg_color' );

    if( $hover_color ){
        $css .="color: {$hover_color};";
    }

    if( $hover_bg ){
        $css .="background-color: {$hover_bg};";
    }
    

    $css2= get_educenter_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.general-header .top-header .right-contact .edu-social li a i:hover');
    
    return educenter_merge_two_arra($parent_css, educenter_merge_two_arra($css1, $css2) );


}
add_filter('educenter_external_css', 'educenter_dynamic_header_social_links_css');

add_filter('educenter_external_css', 'educenter_dynamic_header_css');
function educenter_dynamic_header_css( $parent_css ){

    $css = $tab_css = $mobile_css = "";
    
    $buger = get_theme_mod('educenter_hamburger_color');
    $css .= ".header-nav-toggle div{background-color: {$buger};}";

    // Padding
    $padding = get_theme_mod('educenter_header_margin_padding');
    $margin_padding = json_decode( $padding, true );

    if( $margin_padding && is_array($margin_padding) ){
        $padding = get_educenter_dynamic_padding_value($margin_padding['padding']);
        $css.= $padding['desktop'];
        $tab_css.= $padding['tablet'];
        $mobile_css.= $padding['mobile'];

        // margin
        $margin = get_educenter_dynamic_margin_value($margin_padding['margin']);
        $css.= $margin['desktop'];
        $tab_css.= $margin['tablet'];
        $mobile_css.= $margin['mobile'];
    }


    // bg type
    $bg_type = get_theme_mod("educenter_header_bg_type", "color-bg");
    if( $bg_type == 'image-bg'){
        $bg_image = get_theme_mod('educenter_header_background_image');
        $bg_color = get_theme_mod('educenter_header_bg_color', '#f2f4f6');
        if ( $bg_image ) {
            $css .= ' 
                background-image: url("' . esc_url( $bg_image ) . '"); 
                background-repeat: '. get_theme_mod('educenter_header_background_image_repeat', 'no-repeat').'; 
                background-position: '. get_theme_mod('educenter_header_background_image_position', 'center center').'; 
                background-size: '. get_theme_mod('educenter_header_background_image_size', 'cover').';
                background-color: '. $bg_color. ';
                background-attachment: '. get_theme_mod('educenter_header_background_image_attach', 'fixed'). ';
            ';
        }
    }else if( $bg_type == 'color-bg'){
        $color = get_theme_mod("educenter_header_bg_color");
        if( $color ){
            $css .= "background-color:" . $color . ";";
        }
    }

    return educenter_merge_two_arra($parent_css,  get_educenter_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.bottom-header') );    
}

add_filter('educenter_external_css', 'educenter_dynamic_header_nav_css');
function educenter_dynamic_header_nav_css( $parent_css  ){

    $css = $css1 = $tab_css = $mobile_css = "";
    $nav = get_theme_mod('educenter_header_item_group');
    $nav = json_decode( $nav, true );

    if( $nav && is_array($nav) ){
        $padding = get_educenter_dynamic_padding_value($nav['padding']);
        $css.= $padding['desktop'];
        $tab_css.= $padding['tablet'];
        $mobile_css.= $padding['mobile'];

        // margin
        $margin = get_educenter_dynamic_margin_value($nav['margin']);
        $css.= $margin['desktop'];
        $tab_css.= $margin['tablet'];
        $mobile_css.= $margin['mobile'];

        // Radius
        $radius = get_educenter_dynamic_radius_value($nav['radius']);
        $css.= $radius['desktop'];
        $tab_css.= $radius['tablet'];
        $mobile_css.= $radius['mobile'];
    

        if( $nav['bg_color']){
            $css.= "background-color:{$nav['bg_color']};";
        }
        if( $nav['color']){
            $css.= "color:{$nav['color']};";
        } 
    }
    
    $css1 = get_educenter_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.box-header-nav .main-menu .page_item a, .box-header-nav .main-menu>.menu-item>a');   
    
    $css2 = array(
        'desktop' => '',
        'tablet' => '',
        'mobile' => '',
    );
    

    return educenter_merge_two_arra( $parent_css,  educenter_merge_two_arra($css1, $css2) );
}

add_filter('educenter_external_css', 'educenter_dynamic_header_nav_sub_menu_css');
function educenter_dynamic_header_nav_sub_menu_css( $parent_css ){

    // Bg Color, Color, Margin, Padding Radius 
    $css = $css1 = $css2 = $css3 = $tab_css = $mobile_css = "";

    $nav = get_theme_mod('educenter_header_sub_item_group');
    $nav = json_decode( $nav, true );

    if( $nav && is_array($nav) ){
        $padding = get_educenter_dynamic_padding_value($nav['padding']);
        $css.= $padding['desktop'];
        $tab_css.= $padding['tablet'];
        $mobile_css.= $padding['mobile'];

        // margin
        $margin = get_educenter_dynamic_margin_value($nav['margin']);
        $css.= $margin['desktop'];
        $tab_css.= $margin['tablet'];
        $mobile_css.= $margin['mobile'];

        // Radius
        $radius = get_educenter_dynamic_radius_value($nav['radius']);
        $css.= $radius['desktop'];
        $tab_css.= $radius['tablet'];
        $mobile_css.= $radius['mobile'];
    
        if( $nav['color']){
            $css.= "color:{$nav['color']};";
        }   
    }

    $css1 = get_educenter_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.box-header-nav .main-menu .children>.page_item>a, .box-header-nav .main-menu .sub-menu>.menu-item>a'); 

    if( $nav && is_array($nav) ){
        if( $nav['bg_color']){
            $css2 .= "background-color:{$nav['bg_color']};";
        }
    }
    $css3 = get_educenter_dynamic_css_return_val('', $css2, $tab_css, $mobile_css, '.box-header-nav .main-menu .children, .box-header-nav .main-menu .sub-menu'); 

    return educenter_merge_two_arra($parent_css, educenter_merge_two_arra($css1, $css3) );
}

add_filter('educenter_external_css', 'educenter_dynamic_header_nav_active_menu_css');
function educenter_dynamic_header_nav_active_menu_css( $parent_css ){

    // Bg Color, Color, Margin, Padding Radius 
    $css = $tab_css = $mobile_css = "";
    $css1 = array(
            'desktop' => '',
            'tablet' => '',
            'mobile' => ''
        );
    $nav = get_theme_mod('educenter_header_nav_hover_group');
    $nav = json_decode( $nav, true );

    if( $nav && is_array($nav) ){

        if( $nav['nav_bg_color']){
            $css.= "background-color:{$nav['nav_bg_color']};";
        }
        if( $nav['nav_color']){
            $css.= "color:{$nav['nav_color']} !important;";
        }
        $css1 = get_educenter_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.box-header-nav .main-menu .page_item.current_page_item>a, .box-header-nav .main-menu .page_item:hover>a, .box-header-nav .main-menu .page_item.focus>a, .box-header-nav .main-menu>.menu-item.current-menu-item>a, .box-header-nav .main-menu>.menu-item:hover>a, .box-header-nav .main-menu>.menu-item.focus>a, .box-header-nav .main-menu .children>.page_item:hover>a, .box-header-nav .main-menu .children>.page_item.focus>a, .box-header-nav .main-menu .sub-menu>.menu-item:hover>a, .box-header-nav .main-menu .sub-menu>.menu-item.focus>a, .headertwo .box-header-nav .main-menu .page_item.current_page_item>a, .headertwo .box-header-nav .main-menu>.menu-item.current-menu-item>a, .headertwo .box-header-nav .main-menu .page_item:hover>a, .headertwo .box-header-nav .main-menu .page_item.focus>a, .headertwo .box-header-nav .main-menu>.menu-item:hover>a, .headertwo .box-header-nav .main-menu>.menu-item.focus>a');    
    }

    return educenter_merge_two_arra($parent_css , $css1 );
}


add_filter('educenter_external_css', 'educenter_dynamic_footer_css');
if( !function_exists('educenter_dynamic_footer_css')){
    function educenter_dynamic_footer_css( $parent_css ){
        $tab_css = $mobile_css = "";

        $css = $css1 = array();
        $sectionname = "footer";
        $sectionclass = "#footer .footer-wrapper";
        $sectionbgtype = get_theme_mod('educenter_footer_bg_type', 'color-bg');
        if ($sectionbgtype == 'color-bg' || $sectionbgtype == 'image-bg') {
            $sectionbgcolor = get_theme_mod('educenter_' . $sectionname . '_bg_color');
            $css[] = "background-color: $sectionbgcolor";
        }
        if ($sectionbgtype == 'image-bg') {
            $sectionbgimage = get_theme_mod('educenter_' . $sectionname . '_bg_image_url');
            if( $sectionbgimage ):
                $sectionbgimage_repeat = get_theme_mod('educenter_' . $sectionname . '_bg_image_repeat', 'no-repeat');
                $sectionbgimage_size = get_theme_mod('educenter_' . $sectionname . '_bg_image_size', 'cover');
                $sectionbgimage_position = get_theme_mod('educenter_' . $sectionname . '_bg_position', 'center center');
                $sectionbgimage_position = str_replace('-', ' ', $sectionbgimage_position);
                $sectionbgimage_attach = get_theme_mod('educenter_' . $sectionname . '_bg_image_attach', 'fixed');
                //$sectionbgoverlay = get_theme_mod('educenter_' . $sectionname . '_overlay_color');

                $css[] = "background-image: url($sectionbgimage)";
                $css[] = "background-size: {$sectionbgimage_size}";
                $css[] = "background-position: {$sectionbgimage_position}";
                $css[] = "background-attachment: {$sectionbgimage_attach}";
                $css[] = "background-repeat: {$sectionbgimage_repeat}";
                // if (!empty($sectionbgoverlay)) {
                //     $css1[] = "background-color: $sectionbgoverlay";
                // }
            endif;
        } elseif ($sectionbgtype == 'video-bg') {
            // if (!empty($sectionbgoverlay)) {
            //     $css1[] = "background-color: $sectionbgoverlay";
            // }
        } elseif ($sectionbgtype == 'gradient-bg') {
            $sectiongradientcolor = get_theme_mod('educenter_' . $sectionname . '_bg_gradient');
            $css[] = "$sectiongradientcolor";
        }


        // Padding
        $padding = get_theme_mod('educenter_footer_margin_padding');
        $margin_padding = json_decode( $padding, true );

        if( $margin_padding && is_array($margin_padding) ){
            $padding = get_educenter_dynamic_padding_value($margin_padding['padding']);
            $css[] = $padding['desktop'];
            $tab_css.= $padding['tablet'];
            $mobile_css.= $padding['mobile'];

            // margin
            $margin = get_educenter_dynamic_margin_value($margin_padding['margin']);
            $css[] = $margin['desktop'];
            $tab_css.= $margin['tablet'];
            $mobile_css.= $margin['mobile'];

            // radius
            // $radius = get_educenter_dynamic_radius_value($margin_padding['radius']);
            // $css[] = $radius['desktop'];
            // $tab_css.= $radius['tablet'];
            // $mobile_css.= $radius['mobile'];
        }

        // $tab_css.= $margin['tablet'];
        // $mobile_css.= $margin['mobile'];
        
        $css = "$sectionclass{" . implode(';', $css) . "}";
        $css .= "$sectionclass::before{" . implode(';', $css1) . "}";

        $foo = '';
        $top_seperator_color = get_theme_mod("educenter_{$sectionname}_ts_color", '#15171b');
        $top_seperator_height = get_theme_mod('educenter_' . $sectionname . '_ts_height_desktop', 80);
        $top_seperator_height_tablet = get_theme_mod('educenter_' . $sectionname . '_ts_height_tablet');
        $top_seperator_height_mobile = get_theme_mod('educenter_' . $sectionname . '_ts_height_mobile');
        
        if( $top_seperator_color ){
            $css .= ".footer-seprator .section-seperator svg{fill: {$top_seperator_color}}";
        }
        if (!empty($top_seperator_height)) {
            $css .= ".footer-seprator .section-seperator.bottom-section-seperator{height: {$top_seperator_height}px}";
        }
        if (!empty($top_seperator_height_tablet)) {
            $tab_css .= ".footer-seprator .section-seperator.bottom-section-seperator{height: {$top_seperator_height_tablet}px}";
        }
        if (!empty($top_seperator_height_mobile)) {
            $mobile_css .= ".footer-seprator .section-seperator.bottom-section-seperator{height: {$top_seperator_height_mobile}px}";
        }
    
        $css1 = array(
            'desktop' => $css,
            'mobile' => $tab_css,
            'tablet' => $mobile_css
        );
        
        return educenter_merge_two_arra($parent_css, $css1 );
    }
}


add_filter('educenter_external_css', 'educenter_dynamic_header_button_css');
function educenter_dynamic_header_button_css( $parent_css ){

    $css = $tab_css = $mobile_css = "";
    
    // Padding
    $nav = get_theme_mod('educenter_header_button_color');
    $nav = json_decode( $nav, true );
    if( isset($nav['padding'])){
        $padding = get_educenter_dynamic_padding_value($nav['padding']);
        $css.= $padding['desktop'];
        $tab_css.= $padding['tablet'];
        $mobile_css.= $padding['mobile'];
    }

    if( isset($nav['margin'])){
        // margin
        $margin = get_educenter_dynamic_margin_value($nav['margin']);
        $css.= $margin['desktop'];
        $tab_css.= $margin['tablet'];
        $mobile_css.= $margin['mobile'];
    }

    if( isset($nav['radius'])){
        // radius
        $radius = get_educenter_dynamic_radius_value($nav['radius']);
        $css.= $radius['desktop'];
        $tab_css.= $radius['tablet'];
        $mobile_css.= $radius['mobile'];
    }

    if( isset( $nav['background'] ) && $nav['background'] ){
        $css .="background-color: {$nav['background']};";
    }
    if( isset( $nav['text'] ) && $nav['text'] ){
        $css .="color: {$nav['text']};";
    }
    if( isset( $nav['font-size'] ) && $nav['font-size'] ){
        $css .="font-size: {$nav['font-size']}px;";
    }

    if( isset( $nav['width'] ) && $nav['width'] ){
        $css .="width: {$nav['width']}px;";
    }

    $css1= get_educenter_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.educenter-header-button');


    $css2 = array(
        'desktop' => '',
        'tablet' => '',
        'mobile' => '',
    );
    $nav = get_theme_mod('educenter_header_button_hover_color');

    $nav = json_decode( $nav, true );
    if( ( isset( $nav['background'] ) && $nav['background'] ) || ( isset( $nav['text'] ) && $nav['text'] )  ){
        $css2['desktop'] = ".educenter-header-button:hover{
            background-color: {$nav['background']};
            color: {$nav['text']};
        }";
    }
    // print_r($css1); exit;
    return educenter_merge_two_arra($parent_css, educenter_merge_two_arra($css1, $css2) );

}

 /**
 * Home page common settings
 * 
 */
add_filter('educenter_external_css', 'educenter_common_settings_css');
function educenter_common_settings_css( $parent_css ){
   $educenter_dynamic = $tab_css = $mobile_css = '';
    $home_sections = [ 'fservices', 'aboutus', 'cta', 'services', 'counter', 'courses', 'blog', 'team', 'gallery', 'testimonial' ];
    
    foreach($home_sections as $sectionname){

        $sectionclass = '#edu-' . $sectionname . '-section';
        
        $super_title_color = get_theme_mod("educenter_{$sectionname}_super_title_color");
        $title_color = get_theme_mod("educenter_{$sectionname}_title_color");
        $text_color = get_theme_mod("educenter_{$sectionname}_text_color");
        
        if ($super_title_color) {
            $educenter_dynamic .= "{$sectionclass} .ed-badge{background-color:$super_title_color}";
            $educenter_dynamic .= "{$sectionclass} .ed-badge:after{background-color:$super_title_color}";
        }
        if ($title_color) {
            $educenter_dynamic .= "{$sectionclass} .section-header{color:$title_color}";
        }

        if ($text_color) {
            $educenter_dynamic .= "{$sectionclass} {color:$text_color}";
        }
        
        $sectionbgtype = get_theme_mod('educenter_' . $sectionname . '_bg_type', 'color-bg');
        $sectionbgimage = get_theme_mod('educenter_' . $sectionname . '_bg_image_url');    
        $sectionbgimage_repeat = get_theme_mod('educenter_' . $sectionname . '_bg_image_repeat', 'no-repeat');
        $sectionbgimage_size = get_theme_mod('educenter_' . $sectionname . '_bg_image_size', 'cover');
        $sectionbgimage_position = get_theme_mod('educenter_' . $sectionname . '_bg_position', 'center center');
        $sectionbgimage_position = str_replace('-', ' ', $sectionbgimage_position);
        $sectionbgimage_attach = get_theme_mod('educenter_' . $sectionname . '_bg_image_attach', 'fixed');
        $sectionbgoverlay = get_theme_mod('educenter_' . $sectionname . '_overlay_color');
        $sectionalignitem = get_theme_mod('educenter_' . $sectionname . '_align_item', 'top');
        
        $top_seperator_height = get_theme_mod('educenter_' . $sectionname . '_ts_height_desktop', 60);
        $bottom_seperator_height = get_theme_mod('educenter_' . $sectionname . '_bs_height_desktop', 60);
        
        $top_seperator_height_tablet = get_theme_mod('educenter_' . $sectionname . '_ts_height_tablet');
        $bottom_seperator_height_tablet = get_theme_mod('educenter_' . $sectionname . '_bs_height_tablet');
        
        $top_seperator_height_mobile = get_theme_mod('educenter_' . $sectionname . '_ts_height_mobile');
        $bottom_seperator_height_mobile = get_theme_mod('educenter_' . $sectionname . '_bs_height_mobile');
        
        $section_seperator = get_theme_mod("educenter_{$sectionname}_section_seperator");
        $top_seperator_color = get_theme_mod("educenter_{$sectionname}_ts_color", '#FF0000');
        $bottom_seperator_color = get_theme_mod("educenter_{$sectionname}_bs_color", '#FF0000');

        $css = $css1 = array();
        if ($sectionbgtype == 'color-bg' || $sectionbgtype == 'image-bg') {
            $sectionbgcolor = get_theme_mod('educenter_' . $sectionname . '_bg_color');
            $css[] = "background-color: $sectionbgcolor";
        }

        $educenter_dynamic .= "$sectionclass{" . implode(';', $css) . "}";
        


        /***********
         * Section Spperator
        */
        if (!empty($top_seperator_height)) {
            $educenter_dynamic .= "$sectionclass .section-seperator.top-section-seperator{height: {$top_seperator_height}px}";
        }
        if (!empty($bottom_seperator_height)) {
            $educenter_dynamic .= "$sectionclass .section-seperator.bottom-section-seperator{height: {$bottom_seperator_height}px}";
        }
        if (!empty($top_seperator_height_tablet)) {
            $tab_css .= "$sectionclass .section-seperator.top-section-seperator{height: {$top_seperator_height_tablet}px}";
        }
        if (!empty($bottom_seperator_height_tablet)) {
            $tab_css .= "$sectionclass .section-seperator.bottom-section-seperator{height: {$bottom_seperator_height_tablet}px}";
        }
        if (!empty($top_seperator_height_mobile)) {
            $mobile_css .= "$sectionclass .section-seperator.top-section-seperator{height: {$top_seperator_height_mobile}px}";
        }
        if (!empty($bottom_seperator_height_mobile)) {
            $mobile_css .= "$sectionclass .section-seperator.bottom-section-seperator{height: {$bottom_seperator_height_mobile}px}";
        }
        if ($section_seperator == 'top' || $section_seperator == 'top-bottom') {
            $educenter_dynamic .= "$sectionclass .top-section-seperator svg{ fill:$top_seperator_color }";
        }
        if ($section_seperator == 'bottom' || $section_seperator == 'top-bottom') {
            $educenter_dynamic .= "$sectionclass .bottom-section-seperator svg{ fill:$bottom_seperator_color }";
        }

        
        /**
         * Section Padding
         */
        $css = array();
        $section_padding = get_theme_mod("educenter_{$sectionname}_padding");
        $section_padding = json_decode( $section_padding, true );
        
        if( $section_padding ){
            $padding = get_educenter_dynamic_padding_value($section_padding);
            $css[] = $padding['desktop'];
            $tab_css.= $padding['tablet'];
            $mobile_css.= $padding['mobile'];
        }
        $educenter_dynamic .= "$sectionclass{" . implode(';', $css) . "}";

         
    }

    $css2 = array(
        'desktop' => $educenter_dynamic,
        'tablet' => $tab_css,
        'mobile' => $mobile_css,
    );

    return educenter_merge_two_arra($parent_css, $css2 );
}


/** counter section */
add_filter('educenter_external_css', 'educenter_counter_dynamic_css');
function educenter_counter_dynamic_css( $parent_css ){

    $css = $tab_css = $mobile_css = "";
    $group = get_theme_mod('educenter_counter_icon_style');
    $val = json_decode( $group, true );

    if( isset( $val['padding'] ) ){
        $padding = get_educenter_dynamic_padding_value($val['padding']);
        $css.= $padding['desktop'];
        $tab_css.= $padding['tablet'];
        $mobile_css.= $padding['mobile'];
    }

    if( isset( $val['radius'] ) ){
        $radius = get_educenter_dynamic_radius_value($val['radius']);
        $css.= $radius['desktop'];
        $tab_css.= $radius['tablet'];
        $mobile_css.= $radius['mobile'];
    }

    if( isset( $val['bg_color'] ) ){
        $css .= "background-color: {$val['bg_color']};";
    }
    
    if( isset( $val['color'] )){
        $css .= "color: {$val['color']};";
    }

    if( isset( $val['borderwidth'] ) && !empty( $val['borderwidth'] )){
        $css .= "border:{$val['borderwidth']}px solid {$val['bordercolor']};";
    }
    $css1 = get_educenter_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.educenter_counter-icon');
    

    $css = $tab_css = $mobile_css = "";
    $group = get_theme_mod('educenter_counter_group_style');
    $val = json_decode( $group, true );
    
    if( isset( $val['padding'] ) ){
        $padding = get_educenter_dynamic_padding_value($val['padding']);
        $css.= $padding['desktop'];
        $tab_css.= $padding['tablet'];
        $mobile_css.= $padding['mobile'];
    }

    if( isset( $val['radius'] ) ){
        $radius = get_educenter_dynamic_radius_value($val['radius']);
        $css.= $radius['desktop'];
        $tab_css.= $radius['tablet'];
        $mobile_css.= $radius['mobile'];
    }

    if( isset( $val['bg_color'] ) && !empty( $val['bg_color'] ) ){
        $css .= "background-color: {$val['bg_color']};";
    }
    
    if( isset( $val['color'] ) && !empty( $val['color'] )){
        $css .= "color: {$val['color']};";
    }

    if( isset( $val['borderwidth'] ) && !empty( $val['borderwidth'] )){
        $css .= "border:{$val['borderwidth']}px solid {$val['bordercolor']};";
    }
    $css2 = get_educenter_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.educenter_counter');
    
    $css3 = array(
            'desktop' => '',
            'mobile' => '',
            'tablet' => ''
    );
    if(isset($css2['desktop']) && !empty($css2['desktop'])){
        // overlay
        $afterbefore = ".educenter_counter:before, .educenter_counter:after{display:none}";
        $css3 = array(
            'desktop'=>  $afterbefore,
            'mobile' => '',
            'tablet' => ''
        );
    }
    $css1 = educenter_merge_two_arra($css1, $css2);
    
    return educenter_merge_two_arra($parent_css,  educenter_merge_two_arra($css1, $css3));
}


/***** Call To Action */
add_filter('educenter_external_css', 'educenter_dynamic_calltoaction_css');
function educenter_dynamic_calltoaction_css( $parent_css ){
    

    $css = $tab_css = $mobile_css = "";
    $group = get_theme_mod('educenter_calltoaction_image_style');
    $val = json_decode( $group, true );
    
    if( isset( $val['padding'] ) ){
        $padding = get_educenter_dynamic_padding_value($val['padding']);
        $css.= $padding['desktop'];
        $tab_css.= $padding['tablet'];
        $mobile_css.= $padding['mobile'];
    }

    if( isset( $val['margin'] ) ){
        $margin = get_educenter_dynamic_margin_value($val['margin']);
        $css.= $margin['desktop'];
        $tab_css.= $margin['tablet'];
        $mobile_css.= $margin['mobile'];
    }

    if( isset( $val['radius'] ) ){
        $radius = get_educenter_dynamic_radius_value($val['radius']);
        $css.= $radius['desktop'];
        $tab_css.= $radius['tablet'];
        $mobile_css.= $radius['mobile'];
    }

    if( isset( $val['bg_color'] ) ){
        $css .= "background-color: {$val['bg_color']};";
        $css .= "position: relative;";
        $css .= "z-index: 9;";
    }

    if( isset( $val['height'] )){
        $css .= "height: {$val['height']}px;";
    }
    
    $css2 = get_educenter_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '#edu-cta-section .cat-image-wrap img');
    
    return educenter_merge_two_arra($parent_css, $css2);
}

add_filter('educenter_external_css', 'educenter_poular_course_dynamic_css');
function educenter_poular_course_dynamic_css( $parent_css ){

    $css = $tab_css = $mobile_css = "";

    $padding = get_theme_mod('educenter_services_icon_style');
    $val = json_decode( $padding, true );

    if( isset( $val['padding'] ) ){
        $padding = get_educenter_dynamic_padding_value($val['padding']);
        $css.= $padding['desktop'];
        $tab_css.= $padding['tablet'];
        $mobile_css.= $padding['mobile'];
    }

    if( isset( $val['radius'] ) ){
        $radius = get_educenter_dynamic_radius_value($val['radius']);
        $css.= $radius['desktop'];
        $tab_css.= $radius['tablet'];
        $mobile_css.= $radius['mobile'];
    }

    if( isset( $val['bg_color'] ) ){
        $css .= "background-color: {$val['bg_color']};";
    }

    // if( isset( $val['color'] ) ){
    //     $css .= "color: {$val['color']};";
    // }
    
    if( isset( $val['borderwidth'] ) && $val['borderwidth'] ){
        $css .= "border:solid {$val['borderwidth']}px {$val['bordercolor']};";
    }
    $css1 = get_educenter_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.ed-services.layout-2 .ed-service-left .ed-col-holder .col .icon-holder');    


    $css = $tab_css = $mobile_css = "";
    $padding = get_theme_mod('educenter_services_block');
    $val = json_decode( $padding, true );

    if( isset( $val['padding'] ) ){
        $padding = get_educenter_dynamic_padding_value($val['padding']);
        $css.= $padding['desktop'];
        $tab_css.= $padding['tablet'];
        $mobile_css.= $padding['mobile'];
    }

    if( isset( $val['radius'] ) ){
        $radius = get_educenter_dynamic_radius_value($val['radius']);
        $css.= $radius['desktop'];
        $tab_css.= $radius['tablet'];
        $mobile_css.= $radius['mobile'];
    }
    
    if( isset( $val['margin'] ) ){
        $margin = get_educenter_dynamic_margin_value($val['margin']);
        $css.= $margin['desktop'];
        $tab_css.= $margin['tablet'];
        $mobile_css.= $margin['mobile'];
    }
    $css2 = get_educenter_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.ed-services .ed-service-left .ed-col-holder .col');    

    $css1 =  educenter_merge_two_arra($css1, $css2);

    
    return educenter_merge_two_arra($parent_css, $css1);

}

add_filter('educenter_external_css', 'educenter_courses_dynamic_css');
function educenter_courses_dynamic_css( $parent_css ){

    $css = $tab_css = $mobile_css = "";
    $padding = get_theme_mod('educenter_course_block');
    $val = json_decode( $padding, true );

    if( isset( $val['padding'] ) ){
        $padding = get_educenter_dynamic_padding_value($val['padding']);
        $css.= $padding['desktop'];
        $tab_css.= $padding['tablet'];
        $mobile_css.= $padding['mobile'];
    }

    if( isset( $val['radius'] ) ){
        $radius = get_educenter_dynamic_radius_value($val['radius']);
        $css.= $radius['desktop'];
        $tab_css.= $radius['tablet'];
        $mobile_css.= $radius['mobile'];
    }
    
    if( isset( $val['margin'] ) ){
        $margin = get_educenter_dynamic_margin_value($val['margin']);
        $css.= $margin['desktop'];
        $tab_css.= $margin['tablet'];
        $mobile_css.= $margin['mobile'];
    }
    $css2 = get_educenter_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.ed-courses.layout-2 .ed-col-wrap .ed-col-three');    

    
    return educenter_merge_two_arra($parent_css, $css2);

}

/** Team Section Style */
add_filter('educenter_external_css', 'educenter_team_dynamic_css');
function educenter_team_dynamic_css( $parent_css ){
    $css = $tab_css = $mobile_css = "";

    $group = get_theme_mod('educenter_team_image_style');
    $val = json_decode( $group, true );
    
    if( isset( $val['padding'] ) ){
        $padding = get_educenter_dynamic_padding_value($val['padding']);
        $css.= $padding['desktop'];
        $tab_css.= $padding['tablet'];
        $mobile_css.= $padding['mobile'];
    }

    if( isset( $val['radius'] ) ){
        $radius = get_educenter_dynamic_radius_value($val['radius']);
        $css.= $radius['desktop'];
        $tab_css.= $radius['tablet'];
        $mobile_css.= $radius['mobile'];
    }

    if( isset( $val['bg_color'] ) && $val['bg_color'] ){
        $css .= "background-color: {$val['bg_color']};";
    }
    
    if( isset( $val['width'] ) && $val['width'] ){
        $css .= "width: {$val['width']}px;";
    }

    if( isset( $val['height'] ) && $val['height'] ){
        $css .= "height: {$val['height']}px;";
    }
    
    if( isset( $val['margintop'] ) &&  $val['margintop'] ){
        $css .= "margin-top: {$val['margintop']}px;";
    }
    $css1 = get_educenter_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.ed-team-member .ed-team-col .ed-inner-wrap .ed-img img');
    

    $css = $tab_css = $mobile_css = "";
    $group = get_theme_mod('educenter_team_grid_style');
    $val = json_decode( $group, true );

    if( isset( $val['padding'] ) ){
        $padding = get_educenter_dynamic_padding_value($val['padding']);
        $css.= $padding['desktop'];
        $tab_css.= $padding['tablet'];
        $mobile_css.= $padding['mobile'];
    }

    if( isset( $val['margin'] ) ){
        $margin = get_educenter_dynamic_margin_value($val['margin']);
        $css.= $margin['desktop'];
        $tab_css.= $margin['tablet'];
        $mobile_css.= $margin['mobile'];
    }

    if( isset( $val['radius'] ) ){
        $radius = get_educenter_dynamic_radius_value($val['radius']);
        $css.= $radius['desktop'];
        $tab_css.= $radius['tablet'];
        $mobile_css.= $radius['mobile'];
    }

    if( isset( $val['bg_color'] ) ){
        $css .= "background-color: {$val['bg_color']};";
    }
    
    if( isset( $val['color'] )){
        $css .= "color: {$val['color']};";
    }

    if( isset( $val['borderwidth'] )){
        $css .= "border:{$val['borderwidth']}px solid {$val['bordercolor']};";
    }
    $css2 = get_educenter_dynamic_css_return_val('', $css, $tab_css, $mobile_css, '.ed-team-member .ed-team-col');
    

    return educenter_merge_two_arra( educenter_merge_two_arra($css1, $css2), $parent_css );
  
}