<?php
/**
 * Returns a formatted DOMDocument object from a given string.
 *
 * @since 1.5.2
 *
 * @param string $html HTML string to convert to DOM.
 *
 * @return \DOMDocument
 */
if(!function_exists('dom')):
	function dom( string $html ): DOMDocument {
		$dom = new DOMDocument();

		if ( ! $html ) {
			return $dom;
		}

		$libxml_previous_state   = libxml_use_internal_errors( true );
		$dom->preserveWhiteSpace = true;

		if ( defined( 'LIBXML_HTML_NOIMPLIED' ) && defined( 'LIBXML_HTML_NODEFDTD' ) ) {
			$options = LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD;
		} elseif ( defined( 'LIBXML_HTML_NOIMPLIED' ) ) {
			$options = LIBXML_HTML_NOIMPLIED;
		} elseif ( defined( 'LIBXML_HTML_NODEFDTD' ) ) {
			$options = LIBXML_HTML_NODEFDTD;
		} else {
			$options = 0;
		}

		// @see https://stackoverflow.com/questions/13280200/convert-unicode-to-html-entities-hex.
		$html = preg_replace_callback(
			'/[\x{80}-\x{10FFFF}]/u',
			static fn( array $matches ): string => sprintf(
				'&#x%s;',
				ltrim(
					strtoupper(
						bin2hex(
							iconv(
								'UTF-8',
								'UCS-4',
								current( $matches )
							)
						)
					),
					'0'
				)
			),
			$html
		);

		$dom->loadHTML( $html, $options );
		$dom->formatOutput = true;

		libxml_clear_errors();
		libxml_use_internal_errors( $libxml_previous_state );

		return $dom;
	}
endif;

/**
 * Returns a formatted DOMElement object from a DOMDocument object.
 *
 * @since 1.5.2
 *
 * @param string $tag            HTML tag.
 * @param mixed  $dom_or_element DOMDocument or DOMElement.
 * @param int    $index          Index of element to return.
 *
 * @return \DOMElement|null
 */
if( !function_exists('get_dom_element')):
	function get_dom_element( string $tag, $dom_or_element, int $index = 0 ) {
		if ( ! is_a( $dom_or_element, DOMDocument::class ) && ! is_a( $dom_or_element, DOMElement::class ) ) {
			return null;
		}

		$element = $dom_or_element->getElementsByTagName( $tag )->item( $index );

		if ( ! $element ) {
			return null;
		}

		return dom_element( $element );
	}
endif;

/**
 * Casts a DOMNode to a DOMElement.
 *
 * @since 1.5.2
 *
 * @param mixed $node DOMNode to cast to DOMElement.
 *
 * @return \DOMElement|null
 */

if( !function_exists('dom_element')):
	function dom_element( $node ) {
		if ( $node->nodeType === XML_ELEMENT_NODE ) {
			/* @var \DOMElement $node DOM Element node */
			return $node;
		}

		return null;
	}
endif;
/**
 * Returns an HTML element with a replaced tag.
 *
 * @since 0.0.20
 *
 * @param DOMElement $element DOM Element to change.
 * @param string     $name    Tag name, e.g: 'div'.
 *
 * @return DOMElement
 */
if( !function_exists('change_tag_name')):
	function change_tag_name( DOMElement $element, string $name ): DOMElement {
		if ( ! $element->ownerDocument ) {
			return new DOMElement( $name );
		}

		$child_nodes = [];

		foreach ( $element->childNodes as $child ) {
			$child_nodes[] = $child;
		}

		$new_element = $element->ownerDocument->createElement( $name );

		foreach ( $child_nodes as $child ) {
			$child2 = $element->ownerDocument->importNode( $child, true );
			$new_element->appendChild( $child2 );
		}

		foreach ( $element->attributes as $attr_node ) {
			$attr_name  = $attr_node->nodeName;
			$attr_value = $attr_node->nodeValue;

			$new_element->setAttribute( $attr_name, $attr_value );
		}

		if ( $element->parentNode ) {
			$element->parentNode->replaceChild( $new_element, $element );
		}

		return $new_element;
	}
endif;

/**
 * Returns array of dom elements by class name.
 *
 * @since 0.9.26
 *
 * @param DOMDocument|DOMElement $dom        DOM document or element.
 * @param string                 $class_name Element class name.
 * @param string                 $tag        Element tag name (optional).
 *
 * @return array
 */
if( !function_exists('get_elements_by_class_name')) {
	function get_elements_by_class_name( $dom, string $class_name, string $tag = '*' ): array {
		$elements = [];

		foreach ( $dom->getElementsByTagName( $tag ) as $element ) {
			if ( $element->hasAttribute( 'class' ) ) {
				$classes = explode( ' ', $element->getAttribute( 'class' ) );

				if ( in_array( $class_name, $classes, true ) ) {
					$elements[] = $element;
				}
			}
		}

		return $elements;
	}
}
