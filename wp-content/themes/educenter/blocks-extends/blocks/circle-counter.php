<?php
add_filter( 'render_block_core/paragraph', 'render_educenter_circle_counter_block_variation', 10, 2 );
/**
 * Render counter block markup.
 *
 * @since 0.9.10
 *
 * @param string $html  Block html content.
 * @param array  $block Block data.
 *
 * @return string
 */
function render_educenter_circle_counter_block_variation( string $html, array $block ): string {
	
    if ( !array_key_exists('className', $block['attrs']) || $block['attrs']['className'] !== 'is-circle-sp-counter' ) {
        return $html;
    }

    
    
	$dom = dom( $html );
	$p   = get_dom_element( 'p', $dom );
    
	if ( ! $p ) {
		return $html;
	}

    $defaults = [
        'percent' => '10',
        'size' => '210',
        'linewidth' => "20",
        'cap' => 'round',
        'barcolor' => '#ccc',
        "scalecolor" => "",
        "trackcolor" => "#7f8c8d",

    ];

    $attrs = array_merge($defaults, $block['attrs']);

    // print_r($attrs);

    
        $html = '
           <div class="is-circle-sp-counter">
                <span class="sp-chart" style="width: '. $attrs['size'].'px;height: '. $attrs['size'].'px;"
                    data-percent="'. $attrs['percent'].'" 
                    data-size="'. $attrs['size'].'"
                    data-line-cap="'. $attrs['cap'].'"
                    data-bar-color="'. $attrs['barcolor'].'"
                    data-line-width= "'. $attrs['linewidth'].'"
                    
                    data-scale-color = "'. $attrs['scalecolor'].'"
                    data-bar-color= "'. $attrs['barcolor'].'"
                    data-track-color = "'. $attrs['trackcolor'].'"
                    >
                    <span class="sp-percent">'. $attrs['percent'].'</span>
                </span>
            </div>
    ';
    return $html;

}

add_filter( 'educenter_block_inline_css', 'educenter_add_circle_counter_support_css', 10, 2 );
/**
 * Conditionally add counter JS.
 *
 * @since 0.9.10
 *
 * @param string $js   Inline js.
 * @param string $html Block html content.
 *
 * @return string
 */
function educenter_add_circle_counter_support_css( string $css, string $html ): string {
    /** clasic theme compatible */
    if( !$html){
        global $post;
        
        if( $post && $post->post_content) $html = apply_filters( 'the_content', $post->post_content );
    }
    
    if ( str_contains( $html, 'is-circle-sp-counter' ) ) {
        
        $dir = dirname( __DIR__, 1 );
		$css .= file_get_contents( $dir . '/assets/css/circle-counter.css' );
	}


	return $css;
}

add_filter( 'educenter_block_inline_js', 'add_educenter_circle_counter_support_js', 10, 2 );
function add_educenter_circle_counter_support_js( string $js, string $html ): string {
    /** clasic theme compatible */
    if( !$html){
        global $post;
        
        if( $post && $post->post_content) $html = apply_filters( 'the_content', $post->post_content );
    }
    
    if ( str_contains( $html, 'is-circle-sp-counter' ) ) {
        
		$dir = dirname( __DIR__, 1 );
		$js .= file_get_contents( $dir . '/assets/js/circle-counter.js' );
	}


	return $js;
}
