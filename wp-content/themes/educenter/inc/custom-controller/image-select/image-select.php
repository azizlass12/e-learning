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
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Educenter_Image_Select' ) ) :
    /**
     * Image Select Control
     */
    class Educenter_Image_Select extends WP_Customize_Control {
        public $type = 'select';
        public function __construct($manager, $id, $args = array(), $choices = array()) {
            $this->image_path = $args['image_path'];
            $this->choices = $args['choices'];
            parent::__construct($manager, $id, $args);
        }
        public function enqueue() {
            wp_enqueue_style('educenter-image-select-control', get_template_directory_uri() . '/inc/custom-controller/image-select/image-select.css', array(), '1.0.0');
            wp_enqueue_script('educenter-image-select-control', get_template_directory_uri().'/inc/custom-controller/image-select/image-select.js', array( 'jquery' ), '1.0.0', true);
        }
        public function render_content() {
            if (!empty($this->choices)) {
                ?>
                <label>
                    <span class="customize-control-title">
                        <?php echo esc_html($this->label); ?>
                    </span>
                    <?php if ($this->description) { ?>
                        <span class="description customize-control-description">
                            <?php echo wp_kses_post($this->description); ?>
                        </span>
                    <?php } ?>
                    <select class="select-image-control" <?php $this->link(); ?>>
                        <?php
                        foreach ($this->choices as $key => $choice) {
                            printf('<option data-image="%1$s" value="%2$s" %3$s>%4$s</option>', esc_attr($this->image_path . $key) . '.png', esc_attr($key), selected($this->value(), $key, false), esc_html($choice));
                        }
                        ?>
                    </select>
                    <div class="select-image-wrap"><img src="<?php echo $this->image_path . $this->value(); ?>.png"/></div>
                </label>
                <?php
            }
        }
    }
endif;