<?php
add_action( 'enqueue_block_editor_assets', 'educenter_extend_block_enqueue_block_editor_assets' );

function educenter_extend_block_enqueue_block_editor_assets() {
	wp_enqueue_script( 'jquery' );
	// Enqueue our script
    wp_enqueue_script(
        'extend-block-example-js',
        esc_url( get_template_directory_uri( ).'/dist/extend-blocks.js' ),
        array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-block-editor', 'jquery' ),
        '1.0.2',
        true // Enqueue the script in the footer.
    );
}


add_action( 'wp_enqueue_scripts', 'edcuenter_block_extend_enqueue_scripts', 10 );
/**
 * Register proxy handle for inline frontend scripts.
 *
 * Called in styles.php to share page content string.
 *
 * @since 0.0.27
 *
 * @return void
 */
function educenter_reduce_whitespace( string $string ): string {
	return preg_replace( '/\s+/', ' ', $string );
}
function edcuenter_block_extend_enqueue_scripts(): void {
	
	$handle = get_template();
	wp_enqueue_script( 'jquery');
	wp_register_script(
		$handle,
		'',
		[],
		wp_get_theme()->get( 'version' ),
		true
	);

	wp_add_inline_script(
		$handle,
		educenter_reduce_whitespace(
			trim(
				apply_filters(
					'educenter_block_inline_js',
					'',
					(string) ( $GLOBALS['template_html'] ?? '' )
				)
			)
		)
	);

	wp_enqueue_script( $handle );


	/** enquue styles */

	wp_register_style(
		$handle,
		'',
		[],
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_style( $handle );

	wp_add_inline_style(
		$handle,
		educenter_reduce_whitespace(
			trim(
				apply_filters(
					'educenter_block_inline_css',
					'',
					(string) ( $GLOBALS['template_html'] ?? '' )
				)
			)
		)
	);
}



/**
 * Registers an editor stylesheet for the current theme.
 */
function educenter_block_add_editor_styles() {
    $font_url = str_replace( ',', '%2C', 'https://fonts.googleapis.com/icon?family=Material+Icons' );
    add_editor_style( $font_url );
	
	add_editor_style(get_template_directory_uri() . '/blocks-extends/assets/css/editor-style.css');
}
add_action( 'admin_init', 'educenter_block_add_editor_styles', 100 );

/**
 * Enqueue a script in the WordPress admin on edit.php.
 *
 * @param int $hook Hook suffix for the current admin page.
 */
function educenter_block_enqueue_admin_script( $hook ) {
    if ( 'post.php' != $hook ) {
        return;
    }

	$font_url = str_replace( ',', '%2C', 'https://fonts.googleapis.com/icon?family=Material+Icons' );
	wp_enqueue_style( 'googlefonts-material-icon', $font_url, array(), null );


    wp_enqueue_style( $font_url );
}
add_action( 'admin_enqueue_scripts', 'educenter_block_enqueue_admin_script' );

function educenter_block_scripts() {
 if( is_admin() ){
	wp_enqueue_script( "easy-pie-chart", get_template_directory_uri( ) . '/blocks-extends/assets/js/circle-counter.js', [  'jquery', 'wp-blocks', 'wp-element', 'wp-components', 'wp-i18n' ], '88898999', true );
 }
}
add_action( 'enqueue_block_assets', 'educenter_block_scripts' );



require_once __DIR__ . "/utility/dom.php";
require_once __DIR__ . "/blocks/counter.php";
require_once __DIR__ . "/blocks/icon.php";
require_once __DIR__ . "/blocks/progressbar.php";
require_once __DIR__ . "/blocks/position.php";
require_once __DIR__ . "/blocks/circle-counter.php";