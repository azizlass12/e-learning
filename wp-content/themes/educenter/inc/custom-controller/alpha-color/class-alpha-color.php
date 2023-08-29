<?php
/**
 * Customizer Control: educenter-alpha-color
 *
 * @subpackage  Controls
 * @since       1.0
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Educenter_Alpha_Color_Control' ) ) :
    /**
     * Alpha Color Control
     */
    class Educenter_Alpha_Color_Control extends WP_Customize_Control {
        /**
         * Official control name.
         */
        public $type = 'alpha-color';
        /**
         * Add support for palettes to be passed in.
         *
         * Supported palette values are true, false, or an array of RGBa and Hex colors.
         */
        public $palette;
        /**
         * Add support for showing the opacity value on the slider handle.
         */
        public $show_opacity;
        /**
		 * enqueue css and scrpts
		 *
		 * @since  1.0.0
		 */
		public function enqueue() {
            wp_enqueue_style('educenter-alpha-color-control', get_template_directory_uri() . '/inc/custom-controller/alpha-color/alpha-color.css', array(), '1.0.0');
            wp_enqueue_script('wp-color-picker-alpha', get_template_directory_uri() . '/inc/custom-controller/alpha-color/wp-color-picker-alpha.js', array('jquery', 'wp-color-picker'), '1.0.2', true);
			wp_enqueue_script('educenter-alpha-color-control', get_template_directory_uri().'/inc/custom-controller/alpha-color/alpha-color.js', array( 'jquery', 'wp-color-picker' ), '1.0.0', true);
        }
        /**
         * Render the control.
         */
        public function render_content() {
            // Process the palette
            if (is_array($this->palette)) {
                $palette = implode('|', $this->palette);
            } else {
                // Default to true.
                $palette = ( false === $this->palette || 'false' === $this->palette ) ? 'false' : 'true';
            }
            // Support passing show_opacity as string or boolean. Default to true.
            $show_opacity = ( false === $this->show_opacity || 'false' === $this->show_opacity ) ? 'false' : 'true';
            // Begin the output. 
            ?>
            <label>
                <span class="customize-control-title">
                    <?php echo esc_html($this->label); ?>
                </span>
                <?php if (!empty($this->description)) { ?>
                    <span class="description customize-control-description">
                        <?php echo wp_kses_post($this->description); ?>
                    </span>
                <?php } ?>
            </label>
            <input class="alpha-color-control" data-alpha="<?php echo esc_attr($show_opacity); ?>" type="text" data-palette="<?php echo esc_attr($palette); ?>" data-default-color="<?php echo esc_attr($this->settings['default']->default); ?>" <?php $this->link(); ?>  />
            <?php
        }
    }
endif;
if( !function_exists('educenter_sanitize_color_alpha')):
    function educenter_sanitize_color_alpha($color) {
        $color = str_replace('#', '', $color);
        if ('' === $color) {
            return '';
        }
        // 3 or 6 hex digits, or the empty string.
        if (preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', '#' . $color)) {
            // convert to rgb
            $colour = $color;
            if (strlen($colour) == 6) {
                list( $r, $g, $b ) = array($colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5]);
            } elseif (strlen($colour) == 3) {
                list( $r, $g, $b ) = array($colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2]);
            } else {
                return false;
            }
            $r = hexdec($r);
            $g = hexdec($g);
            $b = hexdec($b);
            return 'rgba(' . join(',', array('r' => $r, 'g' => $g, 'b' => $b, 'a' => 1)) . ')';
        }
        return strpos(trim($color), 'rgb') !== false ? $color : false;
    }
endif;
if( is_admin() and !function_exists('educenter_color_translation_text')){
	add_action( 'wp_default_scripts', 'educenter_color_translation_text' );
	function educenter_color_translation_text( $scripts ){
		$scripts->add( 'wp-color-picker', "/wp-admin/js/color-picker.js", array( 'iris' ), false, 1 );
		did_action( 'init' ) && $scripts->localize(
			'wp-color-picker',
			'wpColorPickerL10n',
			array(
				'clear'            => __( 'Clear', 'educenter' ),
				'clearAriaLabel'   => __( 'Clear color', 'educenter' ),
				'defaultString'    => __( 'Default' , 'educenter' ),
				'defaultAriaLabel' => __( 'Select default color', 'educenter' ),
				'pick'             => __( 'Select Color' , 'educenter' ),
				'defaultLabel'     => __( 'Color value' , 'educenter' ),
			)
		);
	}
}