<?php
/**
 * Customizer Control: educenter-tabs
 *
 * @subpackage  Controls
 * @since       1.0
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Educenter_Custom_Control_Tab' ) ) :
    /**
     * Tab Control
     */
    class Educenter_Custom_Control_Tab extends WP_Customize_Control {
        public $type = 'tab';
        public $buttons = '';
        public function __construct($manager, $id, $args = array()) {
            parent::__construct($manager, $id, $args);
        }
        public function to_json() {
            parent::to_json();
            $first = true;
            $formatted_buttons = array();
            $all_fields = array();
            foreach ($this->buttons as $button) {
                //$fields = array();
                $active = isset($button['active']) ? $button['active'] : false;
                if ($active && $first) {
                    $first = false;
                } elseif ($active && !$first) {
                    $active = false;
                }
                
                $class = "";
                if(isset($button['class'])){
                    $class = $button['class'];
                }
                $formatted_buttons[] = array(
                    'name' => $button['name'],
                    'fields' => $button['fields'],
                    'class' => $class,
                    'active' => $active,
                );
                $all_fields = array_merge($all_fields, $button['fields']);
            }
            $this->json['buttons'] = $formatted_buttons;
            $this->json['fields'] = $all_fields;
        }
        /**
         * enqueue css and scrpts
         *
         * @since  1.2.8
         */
        public function enqueue() {
            wp_enqueue_style('educenter-tab-control', get_template_directory_uri() . '/inc/custom-controller/tab/css/tab.css', array());
            wp_enqueue_script('educenter-tab-control', get_template_directory_uri().'/inc/custom-controller/tab/js/tab.js', array( 'jquery', 'customize-controls' ), '', true);
        }
        public function content_template() {
            ?>
            <div class="customizer-tab-wrap">
                <# if ( data.buttons ) { #>
                <div class="customizer-tabs">
                    <# for (tab in data.buttons) { #>
                    <a href="#" class="customizer-tab {{ data.buttons[tab].class }} <# if ( data.buttons[tab].active ) { #> active <# } #>" data-tab="{{ tab }}">{{ data.buttons[tab].name }}</a>
                    <# } #>
                </div>
                <# } #>
            </div>
            <?php
        }
    }
endif;