<?php
/**
 * Customizer Control: educenter-checkbox
 *
 * @subpackage  Controls
 * @since       1.0
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Educenter_Checkbox_Control' ) ) :
    /**
     * Checkbox Control
     */
    class Educenter_Checkbox_Control extends WP_Customize_Control {
        /**
         * Control type
         *
         * @var string
         */
        public $type = 'checkbox-toggle';
        /**
         * Control method
         *
         * @since 1.0.0
         */
        public function render_content() {
            ?>
            <div class="educenter-checkbox-toggle">
                <div class="toogle-wrap">
                    <div class="onoff-switch">
                        <input type="checkbox" id="<?php echo esc_attr($this->id); ?>" name="<?php echo esc_attr($this->id); ?>" class="onoff-switch-checkbox" value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?> <?php checked($this->value()); ?>>
                        <label class="onoff-switch-label" for="<?php echo esc_attr($this->id); ?>"></label>
                    </div>
                    <span class="customize-control-title onoff-switch-title"><?php echo esc_html($this->label); ?></span>
                </div>
                <?php if (!empty($this->description)) { ?>
                    <span class="description customize-control-description">
                        <?php echo wp_kses_post($this->description); ?>
                    </span>
                <?php } ?>
            </div>
            <?php
        }
    }
endif;
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Educenter_Multiple_Check_Control' ) ) :
    /**
     * Multiple Checkbox Control
     */
    class Educenter_Multiple_Check_Control extends WP_Customize_Control {
        public $type = 'checkbox-multiple';
        /**
		 * enqueue css and scrpts
		 *
		 * @since  1.0.0
		 */
		public function enqueue() {
            wp_enqueue_style('educenter-multi-checkbox-control', get_template_directory_uri() . '/inc/custom-controller/multi-checkbox/multi-checkbox.css', array(), '1.0.0');
			wp_enqueue_script('educenter-multi-checkbox-control', get_template_directory_uri().'/inc/custom-controller/multi-checkbox/multi-checkbox.js', array( 'jquery', 'jquery-ui-slider' ), '1.0.0', true);
        }
        public function render_content() {
            if (empty($this->choices)) {
                return;
            }
            ?>
            <div class="customize-control-checkbox-multiple">
                <span class="customize-control-title">
                    <?php echo esc_html($this->label); ?>
                </span>
                <?php if ($this->description) { ?>
                    <span class="description customize-control-description">
                        <?php echo wp_kses_post($this->description); ?>
                    </span>
                <?php } ?>
                <?php $multi_values = !is_array($this->value()) ? explode(',', $this->value()) : $this->value(); ?>
                <ul>
                    <?php foreach ($this->choices as $value => $label) : ?>
                        <li>
                            <label>
                                <input type="checkbox" value="<?php echo esc_attr($value); ?>" <?php checked(in_array($value, $multi_values)); ?> />
                                <?php echo esc_html($label); ?>
                            </label>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr(implode(',', $multi_values)); ?>" />
            </div>
            <?php
        }
    }
endif;