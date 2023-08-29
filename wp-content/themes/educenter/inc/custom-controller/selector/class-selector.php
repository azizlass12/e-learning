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
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Educenter_Selector' ) ) :
        /**
     * Select Box Control
     */
    class Educenter_Selector extends WP_Customize_Control {
        public $type = 'selector';
        public $options = array();
        public $class = '';
        /**
         * enqueue css and scrpts
         *
         * @since  1.0.0
         */
        public function enqueue() {
            wp_enqueue_style('educenter-selector-control', get_template_directory_uri() . '/inc/custom-controller/selector/selector.css', array());
            wp_enqueue_script('educenter-selector-control', get_template_directory_uri().'/inc/custom-controller/selector/selector.js', array( 'jquery', 'customize-controls' ), '', true);
        }
        public function __construct($manager, $id, $args = array()) {
            $this->options = $args['options'];
            $this->class = isset($args['class']) ? $args['class'] : '';
            parent::__construct($manager, $id, $args);
        }
        public function render_content() {
            $options = $this->options;
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
                <div class="selector-labels <?php echo esc_attr($this->class) ?>">
                    <?php
                    foreach ($options as $key => $image) {
                        $class = ( $this->value() == $key ) ? 'selector-selected' : '';
                        echo '<label class="' . esc_attr($class) . '" data-val="' . esc_attr($key) . '">';
                        echo '<img src="' . esc_url($image) . '"/>';
                        echo '</label>';
                    }
                    ?>
                </div>
                <input type="hidden" value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?> />
            </label>
            <?php
        }
    }
endif;

if(!function_exists('educenter_sanitize_options')){
    /**
    * Sanitization Optoins.
    */
    function educenter_sanitize_options( $input, $setting ){
        //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
        $input = sanitize_key($input);
        //get the list of possible select options 
        $options = $setting->manager->get_control( $setting->id )->options;
        //return input if valid or return default option
        return ( array_key_exists( $input, $options ) ? $input : $setting->default );  
    }
}