<?php
/**
 * Customizer Control: educenter-switch
 *
 * @subpackage  Controls
 * @since       1.0
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Educenter_Color_Tab_Control' ) ) :
    /**
     * Color Tab Control
     */
    class Educenter_Color_Tab_Control extends WP_Customize_Control {
        public $type = 'color-tab';
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
        public $group;
        public function __construct($manager, $id, $args = array()) {
            if (isset($args['palette'])) {
                $this->palette = $args['palette'];
            }
            parent::__construct($manager, $id, $args);
        }
        /**
		 * enqueue css and scrpts
		 *
		 * @since  1.0.0
		 */
		public function enqueue() {
            wp_enqueue_style('educenter-color-tab-control', get_template_directory_uri() . '/inc/custom-controller/color-tab/color-tab.css', array(), '1.0.0');
			wp_enqueue_script('educenter-color-tab-control', get_template_directory_uri().'/inc/custom-controller/color-tab/color-tab.js', array( 'jquery', 'jquery-ui-slider' ), '1.0.0', true);
        }
        /**
         * Refresh the parameters passed to the JavaScript via JSON.
         *
         * @see WP_Customize_Control::to_json()
         */
        public function to_json() {
            parent::to_json();
            // Process the palette
            if (is_array($this->palette)) {
                $palette_string = implode('|', $this->palette);
            } else {
                // Default to true.
                $palette_string = ( false === $this->palette || 'false' === $this->palette ) ? 'false' : 'true';
            }
            $this->json['show_opacity'] = ( false === $this->show_opacity || 'false' === $this->show_opacity ) ? 'false' : 'true';
            $this->json['group'] = array();
            $this->json['l10n'] = $this->l10n();
            $this->json['group'] = $this->group;
            $this->json['palette'] = $palette_string;
            foreach ($this->settings as $setting_key => $setting) {
                list( $_key ) = explode('_', $setting_key);
                $this->json[$_key][$setting_key] = array(
                    'id' => $setting->id,
                    'link' => $this->get_link($setting_key),
                    'value' => $this->value($setting_key),
                    'default' => $setting->default
                );
            }
        }
        /**
         * An Underscore (JS) template for this control's content (but not its container).
         *
         * Class variables for this control class are available in the `data` JS object;
         * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
         *
         * @see WP_Customize_Control::print_template()
         *
         * @access protected
         */
        protected function content_template() {
            ?>
            <# if ( data.label ) { #>
            <span class="customize-control-title">
                <label>{{{ data.label }}}</label>
                <div class="color-tab-toggle"><span class="dashicons dashicons-edit"></span></div>
            </span>
            <# } #>
            <# if ( data.description ) { #>
            <span class="description customize-control-description">{{{ data.description }}}</span>
            <# } #>
            <div class="color-tab-wrap" style="display:none">
                <ul class="color-tab-switchers">
                    <li data-tab="color-tab-content-normal" class="active">{{{ data.l10n['normal'] }}}</li>
                    <li data-tab="color-tab-content-hover">{{{ data.l10n['hover'] }}}</li>
                </ul>
                <div class="color-tab-contents">
                    <div class="color-tab-content-normal" style="display:block">
                        <# _.each( data.normal, function( args, key ) { #>
                        <div class="color-content-wrap {{ key }}">
                            <label class="color-tab-label">{{ data.group[ key ] }}</label>
                            <input class="alpha-color-control" type="text" value="{{ args.value }}" data-alpha="{{ data.show_opacity }}" data-default-color="{{ args.default }}" data-palette="{{ data.palette }}" {{{ args.link }}} />   
                        </div>
                        <# } ); #>
                    </div>
                    <div class="color-tab-content-hover" style="display:none">
                        <# _.each( data.hover, function( args, key ) { #>
                        <div class="color-content-wrap {{ key }}">
                            <label class="color-tab-label">{{ data.group[ key ] }}</label>
                            <input class="alpha-color-control" type="text"  value="{{ args.value }}" data-alpha="{{ data.show_opacity }}" data-default-color="{{ args.default }}" data-palette="{{ data.palette }}" {{{ args.link }}} />   
                        </div>
                        <# } ); #>
                    </div>
                </div>
            </div>
            <?php
        }
        /**
         * Returns an array of translation strings.
         *
         * @access protected
         * @param string|false $id The string-ID.
         * @return string
         */
        protected function l10n($id = false) {
            $translation_strings = array(
                'normal' => esc_attr__('Normal', 'educenter'),
                'hover' => esc_attr__('Hover', 'educenter')
            );
            if (false === $id) {
                return $translation_strings;
            }
            return $translation_strings[$id];
        }
    }
endif;