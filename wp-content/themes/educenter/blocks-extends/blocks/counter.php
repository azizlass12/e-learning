<?php
add_filter( 'render_block_core/paragraph', 'educenter_render_counter_block_variation', 10, 2 );
/**
 * Render counter block markup.
 *
 * @since 1.5.2
 *
 * @param string $html  Block html content.
 * @param array  $block Block data.
 *
 * @return string
 */
function educenter_render_counter_block_variation( string $html, array $block ): string {
	$counter = $block['attrs']['counter'] ?? '';

	if ( ! $counter ) {
		return $html;
	}

	$dom = dom( $html );
	$p   = get_dom_element( 'p', $dom );

	if ( ! $p ) {
		return $html;
	}


	$p->setAttribute(
		'class',
		implode(
			' ',
			[
				'wp-block-paragraph',
				'is-sp-counter',
				...explode(
					' ',
					$p->getAttribute( 'class' )
				),
			]
		)
	);

	$dataEnd = $block['attrs']['dataEnd'] ?? 700;
	$p->setAttribute( "data-end", (string) $dataEnd );

	$dataEnd = $block['attrs']['dataStart'] ?? 700;
	$p->setAttribute( "data-start", (string) $dataEnd );
	
	$prefix = $block['attrs']['prefix'] ?? '';
	$p->setAttribute( "data-prefix", (string) $prefix );

	$p->textContent = trim( $p->textContent );

	return $dom->saveHTML();
}

add_filter( 'educenter_block_inline_js', 'educenter_block_add_counter_js', 10, 2 );

/**
 * Conditionally add counter JS.
 *
 * @since 1.5.2
 *
 * @param string $js   Inline js.
 * @param string $html Block html content.
 *
 * @return string
 */
function educenter_block_add_counter_js( string $js, string $html ): string {
	/** clasic theme compatible */
    if( !$html){
        global $post;
        
        if( $post && $post->post_content) $html = apply_filters( 'the_content', $post->post_content );
    }
	
	if ( str_contains( $html, 'is-sp-counter' ) ) {
		$dir = dirname( __DIR__, 1 );
		$js .= file_get_contents( $dir . '/assets/js/counter.js' );
	}

	return $js;
}