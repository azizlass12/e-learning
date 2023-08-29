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
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Educenter_Repeater_Control' ) ) :
    /**
    * Repeater Custom Control Function
    */
    class Educenter_Repeater_Control  extends WP_Customize_Control {
        /**
         * The control type.
         *
         * @access public
         * @var string
         */
        public $type = 'repeater';
        public $box_label = '';
        public $add_label = '';
        private $cats = '';
        /**
         * The fields that each container row will contain.
         *
         * @access public
         * @var array
         */
        public $fields = array();
        /**
		 * enqueue css and scrpts
		 *
		 * @since  1.2.8
		 */
		public function enqueue() {
            wp_enqueue_style('educenter-repeater-control', get_template_directory_uri() . '/inc/custom-controller/repeater/repeater.css', array(), '1.0.0');
            wp_enqueue_script('educenter-repeater-control', get_template_directory_uri().'/inc/custom-controller/repeater/repeater.js', array( 'jquery', 'customize-controls' ), '1.0.0', true);
            wp_enqueue_style('font-awesome-icon-control', get_template_directory_uri() . '/inc/custom-controller/font-awesome-icon/font-awesome-icon.css', array(), '1.0.0');
			wp_enqueue_script('font-awesome-icon-control', get_template_directory_uri().'/inc/custom-controller/font-awesome-icon/font-awesome-icon.js', array( 'jquery', 'jquery-ui-slider' ), '1.0.0', true);

            // Localize the script with new data
            $translation_array = array(
                'url_to_icon' => esc_url(get_template_directory_uri()) . '/assets/images/icons/',
            );
            wp_localize_script('educenter-repeater-control', 'educenter_script', $translation_array);
		}
        /**
         * Repeater drag and drop controller
         *
         * @since  1.0.0
         */
        public function __construct($manager, $id, $args = array(), $fields = array()) {
            $this->fields = $fields;
            $this->box_label = $args['box_label'];
            $this->add_label = $args['add_label'];
            $this->cats = get_categories(array('hide_empty' => false));
            parent::__construct($manager, $id, $args);
        }
        public function render_content() {
            ?>
            <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <?php if ($this->description) { ?>
                <span class="description customize-control-description">
                    <?php echo wp_kses_post($this->description); ?>
                </span>
            <?php } ?>
            <ul class="educenter-repeater-field-control-wrap">
                <?php
                $this->get_fields();
                ?>
            </ul>
            <input type="hidden" <?php esc_attr($this->link()); ?> class="educenter-repeater-collector" value="<?php echo esc_attr($this->value()); ?>" />
            <button type="button" class="button educenter-add-control-field"><?php echo esc_html($this->add_label); ?></button>
            <?php
        }
        private function get_fields() {
            $fields = $this->fields;
            $values = json_decode($this->value());
            if (is_array($values)) {
                foreach ($values as $value) {
                    ?>
                    <li class="educenter-repeater-field-control">
                        <h3 class="educenter-repeater-field-title"><?php echo esc_html($this->box_label); ?></h3>
                        <div class="educenter-repeater-fields">
                            <?php
                            foreach ($fields as $key => $field) {
                                $class = isset($field['class']) ? $field['class'] : '';
                                ?>
                                <div class="educenter-fields educenter-type-<?php echo esc_attr($field['type']) . ' ' . esc_attr($class); ?>">
                                    <?php
                                    $label = isset($field['label']) ? $field['label'] : '';
                                    $description = isset($field['description']) ? $field['description'] : '';
                                    if ( !in_array( $field['type'], array('checkbox', 'wrapper-start', 'wrapper-end')) ) {
                                        ?>
                                        <span class="customize-control-repeater-title"><?php echo esc_html($label); ?></span>
                                        <span class="description customize-control-description"><?php echo esc_html($description); ?></span>
                                        <?php
                                    }
                                    $new_value = isset($value->$key) ? $value->$key : '';
                                    $default = isset($field['default']) ? $field['default'] : '';
                                    switch ($field['type']) {
                                        case 'wrapper-start':
                                            echo '<div class="wrapper-start">';
                                                echo '<span class="customize-control-repeater-title">'. esc_html($label). '</span>';
                                                // echo '</div>';
                                            break;
                                        
                                        case 'wrapper-end':
                                            echo '
                                            </div>';
                                            break;
                                        

                                        case 'url':
                                            echo '<input data-default="' . esc_attr($default) . '" data-name="' . esc_attr($key) . '" type="url" value="' . esc_attr($new_value) . '"/>';
                                            break;
                                        case 'text':
                                            echo '<input data-default="' . esc_attr($default) . '" data-name="' . esc_attr($key) . '" type="text" value="' . esc_attr($new_value) . '"/>';
                                            break;
                                        case 'number':
                                            echo '<input data-default="' . esc_attr($default) . '" data-name="' . esc_attr($key) . '" type="number" value="' . esc_attr($new_value) . '"/>';
                                            break;
                                        case 'textarea':
                                            echo '<textarea data-default="' . esc_attr($default) . '"  data-name="' . esc_attr($key) . '">' . esc_textarea($new_value) . '</textarea>';
                                            break;
                                        case 'upload':
                                            $image = $image_class = "";
                                            if ($new_value) {
                                                $image = '<img src="' . esc_url($new_value) . '" style="max-width:100%;"/>';
                                                $image_class = ' hidden';
                                            }
                                            echo '<div class="educenter-fields-wrap">';
                                            echo '<div class="attachment-media-view">';
                                            echo '<div class="placeholder' . esc_attr($image_class) . '">';
                                            esc_html_e('No image selected', 'educenter');
                                            echo '</div>';
                                            echo '<div class="thumbnail thumbnail-image">';
                                            echo $image;
                                            echo '</div>';
                                            echo '<div class="actions sp-clearfix">';
                                            echo '<button type="button" class="button educenter-delete-button align-left">' . esc_html__('Remove', 'educenter') . '</button>';
                                            echo '<button type="button" class="button educenter-upload-button alignright">' . esc_html__('Select Image', 'educenter') . '</button>';
                                            echo '<input data-default="' . esc_attr($default) . '" class="upload-id" data-name="' . esc_attr($key) . '" type="hidden" value="' . esc_attr($new_value) . '"/>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '</div>';
                                            break;
                                        case 'category':
                                            echo '<select data-default="' . esc_attr($default) . '"  data-name="' . esc_attr($key) . '">';
                                            echo '<option value="0">' . esc_html__('Select Category', 'educenter') . '</option>';
                                            echo '<option value="-1">' . esc_html__('Latest Posts', 'educenter') . '</option>';
                                            foreach ($this->cats as $cat) {
                                                printf('<option value="%1$s" %2$s>%3$s</option>', esc_attr($cat->term_id), selected($new_value, $cat->term_id, false), esc_html($cat->name));
                                            }
                                            echo '</select>';
                                            break;
                                        case 'select':
                                            $options = $field['options'];
                                            echo '<select  data-default="' . esc_attr($default) . '"  data-name="' . esc_attr($key) . '">';
                                            foreach ($options as $option => $val) {
                                                printf('<option value="%1$s" %2$s>%3$s</option>', esc_attr($option), selected($new_value, $option, false), esc_html($val));
                                            }
                                            echo '</select>';
                                            break;
                                        case 'checkbox':
                                            echo '<label>';
                                            echo '<input data-default="' . esc_attr($default) . '" value="' . esc_attr($new_value) . '" data-name="' . esc_attr($key) . '" type="checkbox" ' . checked($new_value, 'yes', false) . '/>';
                                            echo esc_html($label);
                                            echo '<span class="description customize-control-description">' . esc_html($description) . '</span>';
                                            echo '</label>';
                                            break;
                                        case 'colorpicker':
                                            echo '<input data-default="' . esc_attr($default) . '" class="educenter-color-picker" data-alpha="true" data-name="' . esc_attr($key) . '" type="text" value="' . esc_attr($new_value) . '"/>';
                                            break;
                                        case 'selector':
                                            $options = $field['options'];
                                            echo '<div class="selector-labels">';
                                            foreach ($options as $option => $val) {
                                                $class = ( $new_value == $option ) ? 'selector-selected' : '';
                                                echo '<label class="' . $class . '" data-val="' . esc_attr($option) . '">';
                                                echo '<img src="' . esc_url($val) . '"/>';
                                                echo '</label>';
                                            }
                                            echo '</div>';
                                            echo '<input data-default="' . esc_attr($default) . '" type="hidden" value="' . esc_attr($new_value) . '" data-name="' . esc_attr($key) . '"/>';
                                            break;
                                        case 'pro': ?>
                                            <a href="<?php echo apply_filters('educenter-pro-link', esc_url('https://sparklewpthemes.com/wordpress-themes/education-wordpress-theme/') );?>" target="_blank"> <strong><?php echo esc_html__('Upgrade to PRO', 'educenter'); ?></strong></a>
                                            <?php
                                            break;
                                        case 'radio':
                                            $options = $field['options'];
                                            echo '<div class="radio-labels">';
                                            foreach ($options as $option => $val) {
                                                echo '<label>';
                                                echo '<input value="' . esc_attr($option) . '" type="radio" ' . checked($new_value, $option, false) . '/>';
                                                echo esc_html($val);
                                                echo '</label>';
                                            }
                                            echo '</div>';
                                            echo '<input data-default="' . esc_attr($default) . '" type="hidden" value="' . esc_attr($new_value) . '" data-name="' . esc_attr($key) . '"/>';
                                            break;
                                        case 'switch':
                                            $switch = $field['switch'];
                                            $switch_class = ($new_value == 'enable' || $new_value == 'on') ? 'switch-on' : '';
                                            echo '<div class="onoffswitch ' . esc_attr($switch_class) . '">';
                                            echo '<div class="onoffswitch-inner">';
                                            echo '<div class="onoffswitch-active">';
                                            echo '<div class="onoffswitch-switch">' . esc_html($switch["on"]) . '</div>';
                                            echo '</div>';
                                            echo '<div class="onoffswitch-inactive">';
                                            echo '<div class="onoffswitch-switch">' . esc_html($switch["off"]) . '</div>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '<input data-default="' . esc_attr($default) . '" type="hidden" value="' . esc_attr($new_value) . '" data-name="' . esc_attr($key) . '"/>';
                                            break;
                                        case 'range':
                                            $options = $field['options'];
                                            $new_value = $new_value ? $new_value : $options['val'];
                                            echo '<div class="educenter-range-slider" >';
                                            echo '<div class="range-input" data-defaultvalue="' . esc_attr($options['val']) . '" data-value="' . esc_attr($new_value) . '" data-min="' . esc_attr($options['min']) . '" data-max="' . esc_attr($options['max']) . '" data-step="' . esc_attr($options['step']) . '"></div>';
                                            echo '<input  class="range-input-selector" type="text" disabled="disabled" value="' . esc_attr($new_value) . '"  data-name="' . esc_attr($key) . '"/>';
                                            echo '<span class="unit">' . esc_html($options['unit']) . '</span>';
                                            echo '</div>';
                                            break;
                                        case 'icon':
                                            echo '<div class="educenter-customizer-icon-box">';
                                            echo '<div class="educenter-selected-icon">';
                                            echo '<i class="' . esc_attr($new_value) . '"></i>';
                                            echo '<span><i class="dashicons dashicons-arrow-down-alt2"></i></span>';
                                            echo '</div>';
                                            echo '<div class="educenter-icon-box">';
                                            echo '<div class="educenter-icon-search">';
                                            echo '<select>';
                                            if (apply_filters('educenter_show_font_awesome', true)) {
                                                echo '<option value="fontawesome-list">' . esc_html__('Font Awesome', 'educenter') . '</option>';
                                            }
                                            echo '</select>';
                                            echo '<input type="text" class="educenter-icon-search-input" placeholder="' . esc_attr__('Type to filter', 'educenter') . '" />';
                                            echo '</div>';
                                            if (apply_filters('educenter_show_font_awesome', true)) {
                                                echo '<ul class="educenter-icon-list fontawesome-list active sp-clearfix">';
                                                $educenter_font_awesome_icon_array = educenter_font_awesome_icon_array();
                                                foreach ($educenter_font_awesome_icon_array as $educenter_font_awesome_icon) {
                                                    $icon_class = $new_value == $educenter_font_awesome_icon ? 'icon-active' : '';
                                                    echo '<li class=' . esc_attr($icon_class) . '><i class="' . esc_attr($educenter_font_awesome_icon) . '"></i></li>';
                                                }
                                                echo '</ul>';
                                            }
                                            
                                            echo '</div>';
                                            echo '<input data-default="' . esc_attr($default) . '" type="hidden" value="' . esc_attr($new_value) . '" data-name="' . esc_attr($key) . '"/>';
                                            echo '</div>';
                                        break;

                                        case 'educenter-icon':
                                            echo '<div class="educenter-customizer-icon-box">';
                                            echo '<div class="educenter-selected-icon">';
                                            echo '<img src="'.esc_url(get_template_directory_uri()).'/assets/images/icons/'.esc_attr($new_value).'"/>';
                                            echo '<span><i class="dashicons dashicons-arrow-down-alt2"></i></span>';
                                            echo '</div>';
                                            echo '<div class="educenter-icon-box">';
                                            
                                                echo '<ul class="educenter-icon-list educenter-icons active sp-clearfix">';
                                                $educenter_icon_array = educenter_icon_array();
                                                foreach ($educenter_icon_array as $educenter_icon) {
                                                    $icon_class = $new_value == $educenter_icon ? 'icon-active' : '';
                                                    echo '<li class='.esc_attr( $icon_class ).'><img src="'.esc_url(get_template_directory_uri()).'/assets/images/icons/'.esc_attr( $educenter_icon ).'" /></li>';
                                                }
                                                echo '</ul>';
                                            echo '</div>';
                                            echo '<input data-default="' . esc_attr($default) . '" type="hidden" value="' . esc_attr($new_value) . '" data-name="' . esc_attr($key) . '"/>';
                                            echo '</div>';

                                            break;
                                            
                                        case 'social-icon':
                                            echo '<div class="educenter-customizer-icon-box">';
                                            echo '<div class="educenter-selected-icon">';
                                            echo '<i class="'.esc_attr($new_value).'"></i>';
                                            echo '<span><i class="dashicons dashicons-arrow-down-alt2"></i></span>';
                                            echo '</div>';
                                            echo '<div class="educenter-icon-box">';
                                            
                                                echo '<ul class="educenter-icon-list fontawesome-list active sp-clearfix">';
                                                $font_awesome_icon_array = educenter_font_awesome_social_icon_array();
                                                foreach ($font_awesome_icon_array as $font_awesome_icon) {
                                                    $icon_class = $new_value == $font_awesome_icon ? 'icon-active' : '';
                                                    echo '<li class='.esc_attr( $icon_class ).'><i class="'.esc_attr( $font_awesome_icon ).'"></i></li>';
                                                }
                                                echo '</ul>';
                                            echo '</div>';
                                            echo '<input data-default="' . esc_attr($default) . '" type="hidden" value="' . esc_attr($new_value) . '" data-name="' . esc_attr($key) . '"/>';
                                            echo '</div>';

                                            break;
                                        case 'social-icon2':
                                            echo '<div class="fp-repeater-selected-icon">';
                                            echo '<i class="'.esc_attr($new_value).'"></i>';
                                            echo '<span><i class="fa fa-angle-down"></i></span>';
                                            echo '</div>';
                                            echo '<ul class="fp-repeater-icon-list sp-clearfix">';
                                            $font_awesome_icon_array = educenter_font_awesome_social_icon_array();
                    
                                            foreach ($font_awesome_icon_array as $font_awesome_icon) {
                                                $icon_class = $new_value == $font_awesome_icon ? 'icon-active' : '';
                                                echo '<li class='.esc_attr( $icon_class ).'><i class="'.esc_attr( $font_awesome_icon ).'"></i></li>';
                                            }
                                            echo '</ul>';
                                            echo '<input data-default="'.esc_attr($default).'" type="hidden" value="'.esc_attr($new_value).'" data-name="'.esc_attr($key).'"/>';
                                        break;

                                                
                                        case 'multicategory':
                                            $new_value_array = !is_array($new_value) ? explode(',', $new_value) : $new_value;
                                            echo '<ul class="educenter-multi-category-list">';
                                            echo '<li><label><input type="checkbox" value="-1" ' . checked('-1', $new_value, false) . '/>' . esc_html__('Latest Posts', 'educenter') . '</label></li>';
                                            foreach ($this->cats as $cat) {
                                                $checked = in_array($cat->term_id, $new_value_array) ? 'checked="checked"' : '';
                                                echo '<li>';
                                                echo '<label>';
                                                echo '<input type="checkbox" value="' . esc_attr($cat->term_id) . '" ' . $checked . '/>';
                                                echo esc_html($cat->name);
                                                echo '</label>';
                                                echo '</li>';
                                            }
                                            echo '</ul>';
                                            echo '<input data-default="' . esc_attr($default) . '" type="hidden" value="' . esc_attr(implode(',', $new_value_array)) . '" data-name="' . esc_attr($key) . '"/>';
                                            break;

                                        case 'gallery':?>
                                            <div class="gallery-screenshot sp-clearfix">
                                                <?php
                                                    {
                                                    $ids = explode( ',', $new_value );
                                                        foreach ( $ids as $attachment_id ) {
                                                            $img = wp_get_attachment_image_src( $attachment_id, 'thumbnail' );
                                                            if(!$img) continue;
                                                            echo '<div class="screen-thumb"><img src="' . esc_url( $img[0] ) . '" /></div>';
                                                        }
                                                    }
                                                ?>
                                            </div>
                                            <input id="edit-gallery" class="button upload_gallery_button" type="button" value="<?php esc_attr_e('Add/Edit Gallery','educenter') ?>" />
                                            <input id="clear-gallery" class="button upload_gallery_button" type="button" value="<?php esc_attr_e('Clear','educenter') ?>" />
                                            
                                            <?php echo '<input data-default="'.esc_attr($default).'" type="hidden" value="'.esc_attr($new_value).'" data-name="'.esc_attr($key).'"/>';
                                            break;
        
                                        default:
                                            break;
                                    }
                                    ?>
                                </div>
                            <?php }
                            ?>
                            <div class="sp-clearfix educenter-repeater-footer">
                                <div class="alignright">
                                    <a class="educenter-repeater-field-remove" href="#remove"><?php esc_html_e('Delete', 'educenter') ?></a> |
                                    <a class="educenter-repeater-field-close" href="#close"><?php esc_html_e('Close', 'educenter') ?></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php
                }
            }
        }
    }
    //end repeater control
endif;
if( !function_exists('educenter_sanitize_repeater')){
    /**
     * Repeat Fields Sanitization
    */
    function educenter_sanitize_repeater($input) {
        $input_decoded = json_decode($input, true);
        if (!empty($input_decoded)) {
            foreach ($input_decoded as $boxes => $box) {
                foreach ($box as $key => $value) {
                    $input_decoded[$boxes][$key] = wp_kses_post($value);
                }
            }
            return json_encode($input_decoded);
        }
        //return $input;
    }
}