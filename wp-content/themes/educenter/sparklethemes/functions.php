<?php
/**
 * Main Custom admin functions area
 *
 * @since SparklewpThemes
 *
 * @param Educenter
 */


if( ! function_exists( 'educenter_frontpage_template_set' ) ) :
    /**
     * Enable Front Page Action
     *
     * @since 1.0.0
     */
    function educenter_frontpage_template_set() {

        $educenter_set_frontpage = get_theme_mod( 'educenter_set_frontpage' ,false);

        if( 1 != $educenter_set_frontpage ){

           if ( 'posts' == get_option( 'show_on_front' ) ) {
              include( get_home_template() );
           }
            else {
              include( get_page_template() );
           }
        }
    }

endif;

add_action( 'educenter_frontpage', 'educenter_frontpage_template_set', 10 );



if ( ! function_exists( 'educenter_breadcrumb' ) ) :

  /**
   * Breadcrumb.
   *
   * @since 1.0.0
   */
  function educenter_breadcrumb() {

    if ( ! function_exists( 'breadcrumb_trail' ) ) {
      require_once trailingslashit( get_template_directory() ) . '/sparklethemes/breadcrumbs/breadcrumbs.php';
    }

    $breadcrumb_args = array(
      'container'   => 'div',
      'show_browse' => false,
    );

    breadcrumb_trail( $breadcrumb_args );

  }

endif;


if ( ! function_exists( 'educenter_add_breadcrumb' ) ) :

  /**
   * Add breadcrumb.
   *
   * @since 1.0.0
   */
  function educenter_add_breadcrumb() {

    // Bail if home page.
    if ( is_front_page() || is_home() ) {
      return;
    }  ?>

    <div class="ed-breadcrumb">
       <div class="ed-overlay"></div>
       <div class="container">
          <div class="breadcrumb-list">
            <h2 class="ed-header-title">
              <?php 
                 if( is_category() || is_archive() ){
                 
                     the_archive_title( '<span>', '</span>' );
                 
                 }elseif( is_search() ){
                 
                     /* translators: %s: search query. */
                     printf( esc_html__( 'Search Results for: %s', 'educenter' ), '<span>' . get_search_query() . '</span>' );
                 
                 }elseif( is_404() ){
                 
                     esc_html_e('Error Page', 'educenter');
                 
                 }else{
                 
                      the_title(); 
                 }
              ?>
            </h2>
            <div id="breadcrumb" class="bread-list">
              <?php educenter_breadcrumb(); ?>
            </div>

          </div>
       </div>
    </div>

  <?php

  }

endif;

add_action( 'educenter_add_breadcrumb', 'educenter_add_breadcrumb', 10 );



if ( ! function_exists( 'educenter_woocommerce_breadcrumb' ) ) :

  /**
   * Add breadcrumb.
   *
   * @since 1.0.0
   */
  function educenter_woocommerce_breadcrumb() {

    // Bail if home page.
    if ( is_front_page() || is_home() ) {
      return;
    }  ?>

    <div class="ed-breadcrumb">
       <div class="ed-overlay"></div>

       <div class="container">
          <div class="breadcrumb-list">

            <h2 class="ed-header-title">
              <?php 

                if( is_product() ) {

                    the_title(); 

                }elseif( is_search() ){ 
                    /* translators: %1$s: search query. */
                    printf( esc_html__( 'Search Results for : %1$s', 'educenter' ), '<span>' . get_search_query() . '</span>' ); 
                }else{  

                  woocommerce_page_title();  

                } 

              ?> 
            </h2>

            <div id="breadcrumb" class="bread-list">
              <?php woocommerce_breadcrumb(); ?>
            </div>

          </div>
       </div>
    </div>

  <?php

  }

endif;

add_action( 'educenter_woocommerce', 'educenter_woocommerce_breadcrumb', 10 );


/**
 * Social Media Links
*/
add_action('educenter_social_links','educenter_social_links', 5);
if (! function_exists( 'educenter_social_links' ) ):
	function educenter_social_links($extra = null ){
		$social_icon = get_theme_mod('educenter_social_media', json_encode( array(
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
        
        )));

        echo '<ul class="edu-social">';
        if (!empty( $social_icon ) ) :
            $social_icon = json_decode($social_icon);
                foreach ( $social_icon as $icon ) {
                    if( !$icon ) continue; 
                    if( isset( $icon->enable ) && ( $icon->enable == 'off' || $icon->enable == 'disabled') ) continue; 
                    if( !$icon->link ) continue;
                    ?>
	                <li>
	                	<a href="<?php if($icon->link) echo esc_url( $icon->link ); ?>" target="__blank"><i class="<?php echo esc_html( $icon->icon ); ?>"></i></a>
	                </li>
	            <?php }
        endif;
        if( $extra)  echo $extra;
        echo '</ul>';
	}
endif;

/**
 * Top Header Quick Informaint 
*/
add_action('educenter_top_quick','educenter_top_quick_information', 5);

if (! function_exists( 'educenter_top_quick_information' ) ):
	function educenter_top_quick_information(){ ?>
		<ul class="quickcontact">
        	<?php
                $quick_content = get_theme_mod('educenter_quick_content',  json_encode(array(
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
                
                )));

                $quick_content = json_decode( $quick_content );
                if( is_array( $quick_content ) ){
                    foreach( $quick_content as $quick ){
                        if( $quick->enable !== 'on' || $quick->val == '' ) continue;
                        ?>
                             <li class="sp_quick_info">
                                <?php if( $quick->link): ?>
                                    <a href="<?php echo esc_url( $quick->link ); ?>">
                                <?php endif; ?>
                                    
                                <?php if( $quick->icon ): ?>
                                    <i class="<?php echo esc_attr($quick->icon); ?>"></i>
                                <?php endif; ?>
                                
                                <?php if( $quick->val ): ?>
                                    <?php echo esc_html( $quick->val ); ?>
                                <?php endif; ?>

                                <?php if( $quick->link): ?>
                                    </a>
                                <?php endif; ?>
                            </li>
                        <?php
                    }
                }
	        ?>
                
        </ul>
		<?php
	}
endif;

if (! function_exists( 'educenter_topheader_free_hand' ) ):

    function educenter_topheader_free_hand(){ ?>
            <span><i class="far fa-dot-circle"></i> <?php echo wp_kses_post( force_balance_tags( get_theme_mod('educenter_topheader_free_hand','Need Any Help: +1-559-236-8009 or help@example.com') ) ); ?></span>
    <?php }
endif;
add_action('educenter_topheader_free_hand','educenter_topheader_free_hand', 5);

/**
  * Footer Copyright Information
 */
if ( ! function_exists( 'educenter_footer_copyright' ) ){

    /**
     * Footer Copyright Information
     *
     * @since 1.0.0
    */

    function educenter_footer_copyright() {

        $copyright = ''; 

        if( !empty( $copyright ) ) { 

            echo esc_html( apply_filters( 'educenter_copyright_text', $copyright . ' ' ) ); 

        } else { 
            echo esc_html( apply_filters( 'educenter_copyright_text', $content = esc_html__('Copyright  &copy; ','educenter') . date( 'Y' ) . ' ' . get_bloginfo( 'name' ) .' - ' ) );
        }

        printf( 'WordPress Theme : By %1$s', '<a href=" ' . esc_url('https://sparklewpthemes.com/') . ' " rel="designer" target="_blank">'.esc_html__( 'Sparkle Themes','educenter' ).'</a>' );   
    }
    
}

add_action( 'educenter_copyright', 'educenter_footer_copyright', 5 );


if ( ! function_exists( 'educenter_section_title' ) ) :
  /**
   * All Section Main Title & Sub Title
   *
   * @since 1.0.0
  */
  function educenter_section_title( $title, $subtitle ) { 
  
   if( !empty($title) || !empty($subtitle) ){ ?>

      <div class="ed-header layout-2">

        <?php if(get_theme_mod('educenter_show_bubble', true)): ?>
          <span class="ed-badge"><?php esc_html_e('Explore', 'educenter'); ?></span>
        <?php endif; ?>

        <?php if( function_exists( 'pll_register_string' ) ){ ?>

          <h2 class="section-header"><?php echo esc_html( pll__( $title ) ); ?></h2>

        <?php }else{ ?>

          <h2 class="section-header"><?php echo esc_html( $title ); ?></h2>

        <?php } ?>

        <?php if( !empty( $subtitle ) ){ ?>

            <?php if( function_exists( 'pll_register_string' ) ){ ?>

              <p class="section-tagline-text"><?php echo esc_html( pll__( $subtitle ) ); ?></p>

            <?php }else{ ?>

              <p class="section-tagline-text"><?php echo esc_html( $subtitle ); ?></p>

            <?php } ?>

        <?php } ?>

      </div>
    
    <?php }

  }

endif;


/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function educenter_custom_excerpt_length( $length ) {

  if(is_admin() ){

    return $length;

  }elseif( is_front_page() ){

    return 18;
    
  }else{

    return 42;

  }

}
add_filter( 'excerpt_length', 'educenter_custom_excerpt_length', 999 );

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function educenter_excerpt_more( $more ) {

  if(is_admin() ){

    return $more;

  }

    return '...';
}
add_filter( 'excerpt_more', 'educenter_excerpt_more' );


/**
 * Customizer Custom Control Class Layout 
*/

if(class_exists( 'WP_Customize_control')) {


    /**
     * Info Test Custom Control Function
    */
    class Educenter_Customize_Control_Info_Text extends WP_Customize_Control{
        public function render_content(){ ?>
          <span class="customize-control-title">
          <?php echo esc_html( $this->label ); ?>
        </span>
        <?php if( $this->description ){ ?>
          <span class="description customize-control-description">
            <?php echo wp_kses_post( $this->description ); ?>
          </span>
        <?php }
        }
    }

    /**
     * Multiple Gallery Image Upload Custom Control Function
    */
    class Educenter_Display_Gallery_Control extends WP_Customize_Control{
        public $type = 'gallery';         
        public function render_content() { ?>
        <label>
            <span class="customize-control-title">
                <?php echo esc_html( $this->label ); ?>
            </span>

            <?php if($this->description){ ?>
                <span class="description customize-control-description">
                <?php echo wp_kses_post( $this->description ); ?>
                </span>
            <?php } ?>

            <div class="gallery-screenshot sp-clearfix">
              <?php
                  {
                  $ids = explode( ',', $this->value() );
                      foreach ( $ids as $attachment_id ) {
                          $img = wp_get_attachment_image_src( $attachment_id, 'thumbnail' );
                          if(!$img) continue;
                          echo '<div class="screen-thumb"><img src="' . esc_url( $img[0] ) . '" /></div>';
                      }
                  }
              ?>
            </div>

            <input id="edit-gallery" class="button upload_gallery_button" type="button" value="<?php esc_attr_e('Add/Edit Gallery','educenter') ?>" />
            <input id="clear-gallery" class="button upload_gallery_button" type="button" value="<?php esc_attr_e('Clear','educenter') ?>" />
            <input type="hidden" class="gallery_values" <?php echo esc_url( $this->link() ); ?> value="<?php echo esc_attr( $this->value() ); ?>">
        </label>
        <?php }
    }

}


/**
 * WooCommerce Section Start Here
*/
if ( ! function_exists( 'educenter_is_woocommerce_activated' ) ) {

    function educenter_is_woocommerce_activated() {

        if ( class_exists( 'WooCommerce' ) ) { return true; } else { return false; }

    }

}


/**
  * Convert hexdec color string to rgb(a) string 
*/
if ( ! function_exists( 'educenter_hex2rgba' ) ) {
    function educenter_hex2rgba($color, $opacity = false) { 
        $default = 'rgb(0,0,0)'; 
        if(empty($color))
            return $default;  
        if ($color[0] == '#' ) {
            $color = substr( $color, 1 );
        }
        if (strlen($color) == 6) {
            $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
            $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
            return $default;
        }
        $rgb =  array_map('hexdec', $hex);
        if($opacity){
            if(abs($opacity) > 1)
            $opacity = 1.0;
            $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
            $output = 'rgb('.implode(",",$rgb).')';
        }
        return $output;
    }
}


if ( ! function_exists( 'educenter_fonts_url' ) ) :

  /**
   * Return fonts URL.
   *
   * @since 1.0.0
   * @return string Font URL.
   */
  function educenter_fonts_url() {

    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'latin,latin-ext';

    $fonts = array( 
      'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,600;1,700;1,900&display=swap',
      'Roboto:wght@400;500;600;700;800&display=swap',
      'Montserrat:ital,wght@0,100;0,200;0,300;1,100;1,200;1,300&display=swap',
    );


    if ( 'off' !== _x( 'on', 'Lato font: on or off', 'educenter' ) ) {
      $fonts[] = 'Lato:300,400,500,700';
    }


    if ( $fonts ) {
      $fonts_url = add_query_arg( array(
        'family' => urlencode( implode( '|', $fonts ) ),
        'subset' => urlencode( $subsets ),
      ), 'https://fonts.googleapis.com/css' );
    }

    return $fonts_url;
  }

endif;



/**
 * Schema type
*/
function educenter_html_tag_schema() {

    $schema     = 'http://schema.org/';
    
    $type       = 'WebPage';
    // Is single post
    if ( is_singular( 'post' ) ) {
        $type   = 'Article';
    }
    // Is author page
    elseif ( is_author() ) {
        $type   = 'ProfilePage';
    }
    // Is search results page
    elseif ( is_search() ) {
        $type   = 'SearchResultsPage';
    }
    echo 'itemscope="itemscope" itemtype="' . esc_attr( $schema ) . esc_attr( $type ) . '"';
}


/**
 * Page and Post Page Display Layout Metabox function
*/
add_action('add_meta_boxes', 'educenter_metabox_section');
if ( ! function_exists( 'educenter_metabox_section' ) ) {
    function educenter_metabox_section(){   
        add_meta_box('educenter_display_layout', 
            esc_html__( 'Display Layout Options', 'educenter' ), 
            'educenter_display_layout_callback', 
            array('page','post'), 
            'normal', 
            'high'
        );
    }
}

$educenter_page_layouts =array(
    'leftsidebar' => array(
        'value'     => 'leftsidebar',
        'label'     => esc_html__( 'Left Sidebar', 'educenter' ),
        'thumbnail' => get_template_directory_uri() . '/assets/images/left-sidebar.png',
    ),
    'rightsidebar' => array(
        'value'     => 'rightsidebar',
        'label'     => esc_html__( 'Right (Default)', 'educenter' ),
        'thumbnail' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
    ),
     'nosidebar' => array(
        'value'     => 'nosidebar',
        'label'     => esc_html__( 'Full width', 'educenter' ),
        'thumbnail' => get_template_directory_uri() . '/assets/images/no-sidebar.png',
    )
);

/**
 * Function for Page layout meta box
*/
if ( ! function_exists( 'educenter_display_layout_callback' ) ) {
    function educenter_display_layout_callback(){
        global $post, $educenter_page_layouts;
        wp_nonce_field( basename( __FILE__ ), 'educenter_settings_nonce' ); ?>
        <table>
            <tr>
              <td>            
                <?php
                  $i = 0;  
                  foreach ($educenter_page_layouts as $field) {  
                  $educenter_page_metalayouts = esc_attr( get_post_meta( $post->ID, 'educenter_page_layouts', true ) ); 
                ?>            
                  <div class="radio-image-wrapper slidercat" id="slider-<?php echo intval( $i ); ?>">
                    <label class="description">
                        <span>
                          <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" />
                        </span></br>
                        <input type="radio" name="educenter_page_layouts" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( esc_html( $field['value'] ), 
                            $educenter_page_metalayouts ); if(empty($educenter_page_metalayouts) && esc_html( $field['value'] ) =='rightsidebar'){ echo "checked='checked'";  } ?>/>
                         <?php echo esc_html( $field['label'] ); ?>
                    </label>
                  </div>
                <?php  $i++; }  ?>
              </td>
            </tr>            
        </table>
    <?php
    }
}

/**
 * Save the custom metabox data
*/
if ( ! function_exists( 'educenter_save_page_settings' ) ) {
    function educenter_save_page_settings( $post_id ) { 
        global $educenter_page_layouts, $post;
         if ( !isset( $_POST[ 'educenter_settings_nonce' ] ) || !wp_verify_nonce( sanitize_key( $_POST[ 'educenter_settings_nonce' ] ) , basename( __FILE__ ) ) ) 
            return;
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
            return;        
        if (isset( $_POST['post_type'] ) && 'page' == $_POST['post_type']) {  
            if (!current_user_can( 'edit_page', $post_id ) )  
                return $post_id;  
        } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
                return $post_id;  
        }  

        foreach ($educenter_page_layouts as $field) {  
            $old = esc_attr( get_post_meta( $post_id, 'educenter_page_layouts', true) );
            if ( isset( $_POST['educenter_page_layouts']) ) { 
                $new = sanitize_text_field( wp_unslash( $_POST['educenter_page_layouts'] ) );
            }
            if ($new && $new != $old) {  
                update_post_meta($post_id, 'educenter_page_layouts', $new);  
            } elseif ('' == $new && $old) {  
                delete_post_meta($post_id,'educenter_page_layouts', $old);  
            } 
         } 
    }
}
add_action('save_post', 'educenter_save_page_settings');

add_filter( 'body_class', function( $classes ) {
  $new_class = array();
  if( get_theme_mod( 'educenter_set_frontpage', false) ){
      $new_class[] = 'educenter-home-enable';
  }
  
  if( in_array( get_theme_mod( 'educenter_slider_options', 'enable' ), array(1, 'enable') ) ){
    $slider_type = get_theme_mod('educenter_homepage_slider_type', 'default');
    $is_slider_active = false;
    if( $slider_type == 'default' ){
      $slider_items = get_theme_mod('educenter_banner_all_sliders');
      $banner_slider = json_decode( $slider_items );
      if(is_array($banner_slider) && $banner_slider[0]->slider_page ) $is_slider_active = true;
    }else{
      $slider_items = get_theme_mod('educenter_banner_normal_all_sliders');
      $banner_slider = json_decode( $slider_items );
      if( is_array($banner_slider) && $banner_slider[0]->slider_img ) $is_slider_active = true;
    }

    
    
    if( $is_slider_active ){
      $new_class[] = 'educenter-slider-enable';
    }else{
      $new_class[] = 'educenter-slider-disable';
    } 
  }else{
    $new_class[] = 'educenter-slider-disable';
  }
  return array_merge( $classes, $new_class );
} );

if( !function_exists( 'educenter_get_data_attribute' )){
  function educenter_get_data_attribute($controls){
    // print_r($controls); exit;
    $data = "";
    foreach($controls as $k => $v){
      $data .=" data-{$k}='". esc_attr( $v ) ."'";
    }
    
    return $data;
  }
}