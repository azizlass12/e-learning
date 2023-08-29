<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Learning Point Lite
 */

get_header(); ?>

<div class="container">
    <div id="tabnavigator">
        <div class="template_contentbx">
            <header class="page-header">
                <h1 class="entry-title"><?php esc_html_e( '404 Not Found', 'learning-point-lite' ); ?></h1>                
            </header><!-- .page-header -->
            <div class="page-content">
                <p><?php esc_html_e( 'Looks like you have taken a wrong turn....Dont worry... it happens to the best of us.', 'learning-point-lite' ); ?></p>  
            </div><!-- .page-content -->
        </div><!-- template_contentbx-->   
        <?php get_sidebar();?>       
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>