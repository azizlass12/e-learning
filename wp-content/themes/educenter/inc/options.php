<?php
/**
 * Default color palettes
 *
 * @since Educenter 1.5.3
 * @param null
 * @return array $educenter_default_color_palettes
 *
 */
if ( ! function_exists( 'educenter_default_color_palettes' ) ) {
	function educenter_default_color_palettes() {
		$palettes = array(
			'#000000',
			'#ffffff',
			'#dd3333',
			'#dd9933',
			'#eeee22',
			'#81d742',
			'#1e73be',
			'#8224e3',
		);
		return apply_filters( 'educenter_default_color_palettes', $palettes );
	}
}

if (!function_exists('educenter_svg_seperator')) {
    function educenter_svg_seperator() {
        return array(
            'big-triangle-center' 	=> esc_html__('Big Triangle Center', 'educenter'),
            'big-triangle-left' 	=> esc_html__('Big Triangle Left', 'educenter'),
            'big-triangle-right' 	=> esc_html__('Big Triangle Right', 'educenter'),
            'clouds' 		=> esc_html__('Clouds', 'educenter'),
            'curve-center' 	=> esc_html__('Curve Center', 'educenter'),
            'curve-repeater'=> esc_html__('Curve Repeater', 'educenter'),
            'droplets' 		=> esc_html__('Droplets', 'educenter'),
            'paper-cut' 	=> esc_html__('Paint Brush', 'educenter'),
            'small-triangle-center' => esc_html__('Small Triangle Center', 'educenter'),
            'tilt-left'     => esc_html__('Tilt Left', 'educenter'),
            'tilt-right'    => esc_html__('Tilt Right', 'educenter'),
            'uniform-waves' => esc_html__('Uniform Waves', 'educenter'),
            'water-waves'   => esc_html__('Water Waves', 'educenter'),
            'big-waves'     => esc_html__('Big Waves', 'educenter'),
            'slanted-waves' => esc_html__('Slanted Waves', 'educenter'),
            'zigzag'        => esc_html__('Zigzag', 'educenter'),
            'curv-1'        => esc_html__('Curv 1', 'educenter'),
            'curv-2'        => esc_html__('Curv 2', 'educenter'),
            'curv-3'        => esc_html__('Curv 3', 'educenter'),
            'curv-4'        => esc_html__('Curv 4', 'educenter'),
            'curv-5'        => esc_html__('Curv 5', 'educenter'),
            'curv-6'        => esc_html__('Curv 6', 'educenter'),
            'curv-7'        => esc_html__('Curv 7', 'educenter'),
            'curv-8'        => esc_html__('Curv 8', 'educenter'),
            'curv-9'        => esc_html__('Curv 9', 'educenter'),
            'curv-10'        => esc_html__('Curv 10', 'educenter'),
            'curv-11'        => esc_html__('Curv 11', 'educenter'),
            'curv-12'        => esc_html__('Curv 12', 'educenter'),
        );
    }
}

  
  /**
  * repeater Social icons function.
  */
  if(!function_exists('educenter_font_awesome_social_icon_array') ){
	function educenter_font_awesome_social_icon_array(){
	  return array(
			"fab fa-facebook",
			"fab fa-youtube",
			"fab fa-instagram",
			"fab fa-twitter",
			"fab fa-google",
			"fab fa-linkedin",
			"fab fa-pinterest",
			"fab fa-dribbble",
			'fab fa-stumbleupon',
			'fab fa-tumblr',
			'fab fa-vimeo-square',
			'fa fa-rss',
			'fab fa-flickr',
			'fa fa-envelope',
			'fa fa-heart'

		);
	}
  }