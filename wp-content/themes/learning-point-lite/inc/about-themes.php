<?php
/**
 * Learning Point Lite About Theme
 *
 * @package Learning Point Lite
 */

//about theme info
add_action( 'admin_menu', 'learning_point_lite_abouttheme' );
function learning_point_lite_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'learning-point-lite'), __('About Theme Info', 'learning-point-lite'), 'edit_theme_options', 'learning_point_lite_guide', 'learning_point_lite_mostrar_guide');   
} 

//Info of the theme
function learning_point_lite_mostrar_guide() { 	
?>
<div class="wrap-GT">
	<div class="gt-left">
   		<div class="heading-gt">
		 <h3><?php esc_html_e('About Theme Info', 'learning-point-lite'); ?></h3>
		</div>
       <p><?php esc_html_e('Learning Point Lite is a sharp, stylish, customizable, simple and modern eLearning WordPress theme with all the right material for a quick development of educational websites. You can use this theme for schools, college, universities, kindergarten, training center, coaching classes and other similar intentions. ', 'learning-point-lite'); ?></p>
<div class="heading-gt"> <?php esc_html_e('Theme Features', 'learning-point-lite'); ?></div>
 

<div class="col-2">
  <h4><?php esc_html_e('Theme Customizer', 'learning-point-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'learning-point-lite'); ?></div>
</div>

<div class="col-2">
  <h4><?php esc_html_e('Responsive Ready', 'learning-point-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'learning-point-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('Cross Browser Compatible', 'learning-point-lite'); ?></h4>
<div class="description"><?php esc_html_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'learning-point-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('E-commerce', 'learning-point-lite'); ?></h4>
<div class="description"><?php esc_html_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'learning-point-lite'); ?></div>
</div>
<hr />  
</div><!-- .gt-left -->
	
<div class="gt-right">    
     <a href="http://www.gracethemesdemo.com/documentation/learning-point/#homepage-lite" target="_blank"><?php esc_html_e('Documentation', 'learning-point-lite'); ?></a>    
</div><!-- .gt-right-->
<div class="clear"></div>
</div><!-- .wrap-GT -->
<?php } ?>