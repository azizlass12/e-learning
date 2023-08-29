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
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Educenter_Switch_Control' ) ) :
    /**
     * Switch Control
     */
    class Educenter_Switch_Control extends WP_Customize_Control {
        public $type = 'switch';
        public $on_off_label = array();
        public $class;
        public function __construct($manager, $id, $args = array()) {
            $this->on_off_label = $args['switch_label'];
            $this->class = isset($args['class']) ? $args['class'] : '';
            parent::__construct($manager, $id, $args);
        }
        /**
         * enqueue css and scrpts
         *
         * @since  1.0.0
         */
        public function enqueue() {
            wp_enqueue_style('educenter-switch-control', get_template_directory_uri() . '/inc/custom-controller/switch/switch.css', array());
            wp_enqueue_script('educenter-switch-control', get_template_directory_uri().'/inc/custom-controller/switch/switch.js', array( 'jquery', 'customize-controls' ), '', true);
        }
        public function render_content() {
            $switch_class = ($this->value() == 'enable') ? 'switch-on ' : '';
            $switch_class .= $this->class;
            $on_off_label = $this->on_off_label;
            ?>
            <div class="onoffswitch <?php echo esc_attr($switch_class); ?>">
                <div class="onoffswitch-inner">
                    <div class="onoffswitch-active">
                        <div class="onoffswitch-switch"><?php echo esc_html($on_off_label['enable']) ?></div>
                    </div>
                    <div class="onoffswitch-inactive">
                        <div class="onoffswitch-switch"><?php echo esc_html($on_off_label['disable']) ?></div>
                    </div>
                </div>
            </div>
            <input <?php $this->link(); ?> type="hidden" value="<?php echo esc_attr($this->value()); ?>"/>
            <span class="customize-control-title">
                <?php echo esc_html($this->label); ?>
            </span>
            <?php if ($this->description) { ?>
                <span class="description customize-control-description">
                    <?php echo wp_kses_post($this->description); ?>
                </span>
            <?php } ?>
            <?php
        }
    }
endif;