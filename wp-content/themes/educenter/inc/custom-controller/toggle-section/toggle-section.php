<?php
if (class_exists('WP_Customize_Section') && !class_exists('Educenter_Toggle_Section')) {
    /**
     * Class Educenter_Toggle_Section
     *
     * @access public
     */
    class Educenter_Toggle_Section extends WP_Customize_Section {
        /**
         * The type of customize section being rendered.
         *
         * @access public
         * @var    string
         */
        public $type = 'toggle-section';
        /**
         * Flag to display icon when entering in customizer
         *
         * @access public
         * @var bool
         */
        public $hide;
        /**
         * Name of customizer hiding control.
         *
         * @access public
         * @var bool
         */
        public $hiding_control;
        /**
         * Educenter_Toggle_Section constructor.
         *
         * @param WP_Customize_Manager $manager Customizer Manager.
         * @param string               $id Control id.
         * @param array                $args Arguments.
         */
        public function __construct(WP_Customize_Manager $manager, $id, array $args = array()) {
            parent::__construct($manager, $id, $args);
            if (isset($args['hiding_control'])) {
                $this->hide = get_theme_mod($args['hiding_control'], 'enable');
            }
            add_action('customize_controls_init', array($this, 'enqueue'));
        }
        /**
         * Add custom parameters to pass to the JS via JSON.
         *
         * @access public
         */
        public function json() {
            $json = parent::json();
            $json['hide'] = $this->hide;
            $json['hiding_control'] = $this->hiding_control;
            return $json;
        }
        /**
         * Enqueue function.
         *
         * @access public
         * @return void
         */
        public function enqueue() {
            wp_enqueue_style('educenter-toggle-section', get_template_directory_uri() . '/inc/custom-controller/toggle-section/toggle-section.css', array());
            wp_enqueue_script('educenter-toggle-section', get_template_directory_uri() . '/inc/custom-controller/toggle-section/toggle-section.js', array('jquery'), '1.0', true);
        }
        /**
         * Outputs the Underscore.js template.
         *
         * @access public
         * @return void
         */
        protected function render_template() {
            ?>
            <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }}">
                <h3 class="accordion-section-title <# if ( data.hide == 'enable' ) { #> educenter-section-visible <# } else { #> educenter-section-hidden <# }#>" tabindex="0">
                    {{ data.title }}
                    <# if ( data.hide == 'enable' ) { #>
                    <a data-control="{{ data.hiding_control }}" class="educenter-toggle-section" href="#"><span class="dashicons dashicons-visibility"></span></a>
                    <# } else { #>
                    <a data-control="{{ data.hiding_control }}" class="educenter-toggle-section" href="#"><span class="dashicons dashicons-hidden"></span></a>
                    <# } #>
                </h3>
                <ul class="accordion-section-content">
                    <li class="customize-section-description-container section-meta <# if ( data.description_hidden ) { #>customize-info<# } #>">
                        <div class="customize-section-title">
                            <button class="customize-section-back" tabindex="-1">
                            </button>
                            <h3>
                                <span class="customize-action">
                                    {{{ data.customizeAction }}}
                                </span>
                                {{ data.title }}
                            </h3>
                            <# if ( data.description && data.description_hidden ) { #>
                            <button type="button" class="customize-help-toggle dashicons dashicons-editor-help" aria-expanded="false"></button>
                            <div class="description customize-section-description">
                                {{{ data.description }}}
                            </div>
                            <# } #>
                        </div>
                        <# if ( data.description && ! data.description_hidden ) { #>
                        <div class="description customize-section-description">
                            {{{ data.description }}}
                        </div>
                        <# } #>
                    </li>
                </ul>
            </li>
            <?php
        }
    }
}