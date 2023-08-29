<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Learning Point Lite
 */
?>
<div id="sidebar">    
    <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
        <aside id="categories" class="widget widget_categories"> 
        <h3 class="widget-title"><span class="widget-title-tab"><?php esc_html_e( 'Categories', 'learning-point-lite' ); ?></span></h3>          
            <ul>
                <?php wp_list_categories('title_li=');  ?>
            </ul>
        </aside>        
       
        <aside id="archives" class="widget widget_archive"> 
        <h3 class="widget-title"><span class="widget-title-tab"><?php esc_html_e( 'Archives', 'learning-point-lite' ); ?></span></h3>          
            <ul>
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </aside>        
         
         <aside id="meta" class="widget widget_meta"> 
         <h3 class="widget-title"><span class="widget-title-tab"><?php esc_html_e( 'Meta', 'learning-point-lite' ); ?></span></h3>          
            <ul>
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
            </ul>
        </aside>
    <?php endif; // end sidebar widget area ?>	
</div><!-- sidebar -->