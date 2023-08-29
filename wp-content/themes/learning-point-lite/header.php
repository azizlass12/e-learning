<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Learning Point Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
?>
<a class="skip-link screen-reader-text" href="#tabnavigator">
<?php esc_html_e( 'Skip to content', 'learning-point-lite' ); ?>
</a>
<?php
$learning_point_lite_show_topinfo_sections 	   = esc_attr( get_theme_mod('learning_point_lite_show_topinfo_sections', false) );
$learning_point_lite_show_topsocial_icons_sections        = esc_attr( get_theme_mod('learning_point_lite_show_topsocial_icons_sections', false) ); 
$learning_point_lite_show_appointmentbtn_sections        = esc_attr( get_theme_mod('learning_point_lite_show_appointmentbtn_sections', false) ); 
$learning_point_lite_show_frontpageslider_section 	       = esc_attr( get_theme_mod('learning_point_lite_show_frontpageslider_section', false) );
$learning_point_lite_show_4colorboxes_sections    = esc_attr( get_theme_mod('learning_point_lite_show_4colorboxes_sections', false) );
?>
<div id="templatelayout" <?php if( get_theme_mod( 'learning_point_lite_boxlayoutoptions' ) ) { echo 'class="boxlayout"'; } ?>>
<?php
if ( is_front_page() && !is_home() ) {
	if( !empty($learning_point_lite_show_frontpageslider_section)) {
	 	$inner_cls = '';
	}
	else {
		$inner_cls = 'siteinner';
	}
}
else {
$inner_cls = 'siteinner';
}
?>

<div class="site-header <?php echo esc_attr($inner_cls); ?> ">   
  <div class="topinfobar"> 
    <div class="container">           
     <?php if( $learning_point_lite_show_topinfo_sections != ''){ ?>   
      <div class="leftxx"> 
                   
         
        
         
      </div><!--end .left-->                 
    <?php } ?>               
          
          <div class="infodetailbx">
          
                
           <?php 
            $email = get_theme_mod('learning_point_lite_topemailinfo');
               if( !empty($email) ){ ?>                
                 <div class="infobox">
                     <i class="fas fa-envelope-open-text"></i>
                     <span>
                        <a href="<?php echo esc_url('mailto:'.sanitize_email($email)); ?>"><?php echo sanitize_email($email); ?></a>
                    </span> 
                </div>            
              <?php } ?> 
              
               <?php $learning_point_lite_toptelephone = get_theme_mod('learning_point_lite_toptelephone');
               if( !empty($learning_point_lite_toptelephone) ){ ?>              
                 <div class="infobox">
                     <i class="fas fa-phone-volume"></i>               
                     <span><?php echo esc_html($learning_point_lite_toptelephone); ?></span>   
                 </div>       
             <?php } ?>
                
          
               <?php if( $learning_point_lite_show_topsocial_icons_sections != ''){ ?>                
                    <div class="topsocial_icons">                                                
					   <?php $learning_point_lite_facebook_link = get_theme_mod('learning_point_lite_facebook_link');
                        if( !empty($learning_point_lite_facebook_link) ){ ?>
                        <a class="fab fa-facebook-f" target="_blank" href="<?php echo esc_url($learning_point_lite_facebook_link); ?>"></a>
                       <?php } ?>
                    
                       <?php $learning_point_lite_twitter_link = get_theme_mod('learning_point_lite_twitter_link');
                        if( !empty($learning_point_lite_twitter_link) ){ ?>
                        <a class="fab fa-twitter" target="_blank" href="<?php echo esc_url($learning_point_lite_twitter_link); ?>"></a>
                       <?php } ?>
                
                      <?php $learning_point_lite_googleplus_link = get_theme_mod('learning_point_lite_googleplus_link');
                        if( !empty($learning_point_lite_googleplus_link) ){ ?>
                        <a class="fab fa-google-plus" target="_blank" href="<?php echo esc_url($learning_point_lite_googleplus_link); ?>"></a>
                      <?php }?>
                
                      <?php $learning_point_lite_linkedin_link = get_theme_mod('learning_point_lite_linkedin_link');
                        if( !empty($learning_point_lite_linkedin_link) ){ ?>
                        <a class="fab fa-linkedin" target="_blank" href="<?php echo esc_url($learning_point_lite_linkedin_link); ?>"></a>
                      <?php } ?> 
                      
                      <?php $learning_point_lite_instagram_link = get_theme_mod('learning_point_lite_instagram_link');
                        if( !empty($learning_point_lite_instagram_link) ){ ?>
                        <a class="fab fa-instagram" target="_blank" href="<?php echo esc_url($learning_point_lite_instagram_link); ?>"></a>
                      <?php } ?> 
                 </div><!--end .topsocial_icons--> 
               <?php } ?>  
                       
           </div><!--end .infodetailbx-->                
                     
       <div class="clear"></div>   
     </div><!-- .container -->   
 </div><!--end .topinfobar-->    

  
 <div class="container"> 
     <div class="logo">
           <?php learning_point_lite_the_custom_logo(); ?>
            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
                <p><?php echo esc_html($description); ?></p>
            <?php endif; ?>
     </div><!-- logo --> 
  
     <div id="mainnavigator">       
		   <button class="menu-toggle" aria-controls="main-navigation" aria-expanded="false" type="button">
			<span aria-hidden="true"><?php esc_html_e( 'Menu', 'learning-point-lite' ); ?></span>
			<span class="dashicons" aria-hidden="true"></span>
		   </button>

		  <nav id="main-navigation" class="site-navigation primary-navigation" role="navigation">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container' => 'ul',
				'menu_id' => 'primary',
				'menu_class' => 'primary-menu menu',
			) );
			?>
		  </nav><!-- .site-navigation -->
	    </div><!-- #mainnavigator -->
       <div class="clear"></div>       
  </div><!-- .container --> 
</div><!--.site-header --> 
 
<?php 
if ( is_front_page() && !is_home() ) {
if($learning_point_lite_show_frontpageslider_section != '') {
	for($i=1; $i<=3; $i++) {
	  if( get_theme_mod('learning_point_lite_frontslide'.$i,false)) {
		$slider_Arr[] = absint( get_theme_mod('learning_point_lite_frontslide'.$i,true));
	  }
	}
?> 
<div class="frontslider-sections">              
<?php if(!empty($slider_Arr)){ ?>
<div id="slider" class="nivoSlider">
<?php 
$i=1;
$slidequery = new WP_Query( array( 'post_type' => 'page', 'post__in' => $slider_Arr, 'orderby' => 'post__in' ) );
while( $slidequery->have_posts() ) : $slidequery->the_post();
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); 
$thumbnail_id = get_post_thumbnail_id( $post->ID );
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 
?>
<?php if(!empty($image)){ ?>
<img src="<?php echo esc_url( $image ); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php }else{ ?>
<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/slider-default.jpg" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php } ?>
<?php $i++; endwhile; ?>
</div>   

<?php 
$j=1;
$slidequery->rewind_posts();
while( $slidequery->have_posts() ) : $slidequery->the_post(); ?>                 
    <div id="slidecaption<?php echo esc_attr( $j ); ?>" class="nivo-html-caption">         
    	<h2><?php the_title(); ?></h2>
    	<?php the_excerpt(); ?>
		<?php
        $learning_point_lite_frontslidebutton = get_theme_mod('learning_point_lite_frontslidebutton');
        if( !empty($learning_point_lite_frontslidebutton) ){ ?>
            <a class="slide_morebtn" href="<?php the_permalink(); ?>"><?php echo esc_html($learning_point_lite_frontslidebutton); ?></a>
        <?php } ?>                  
    </div>   
<?php $j++; 
endwhile;
wp_reset_postdata(); ?>   
<?php } ?>
 </div><!-- .frontslider-sections -->    
<?php } } ?>

   
        
<?php if ( is_front_page() && ! is_home() ) { ?>
   <?php if( $learning_point_lite_show_4colorboxes_sections != ''){ ?> 
   <section id="home_services_section">
     <div class="container">
        <div class="page_area_row">  
               <?php 
                for($n=1; $n<=4; $n++) {    
                if( get_theme_mod('learning_point_lite_4colorbx'.$n,false)) {      
                    $queryvar = new WP_Query('page_id='.absint(get_theme_mod('learning_point_lite_4colorbx'.$n,true)) );		
                    while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>     
                    <div class="threecolumn_servicesbox"> 
                      <div class="bg_column color-bg-box-<?php echo esc_attr( $n ); ?>">                                      
                        <?php if(has_post_thumbnail() ) { ?>
                        <div class="srviconbox"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>        
                        <?php } ?>
                        <div class="short_descriptionbox">              	
                          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>                                               
                         </div> 
                       </div>                            
                    </div>
                    <?php endwhile;
                    wp_reset_postdata();                                  
                } } ?>                                 
            <div class="clear"></div>
         </div>
      </div><!-- .container -->
    </section><!-- #home_services_section -->
  <?php } ?>
<?php } ?>