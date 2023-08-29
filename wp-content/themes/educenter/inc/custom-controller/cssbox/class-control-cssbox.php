<?php
/**
 * Customizer Control: educenter-cssbox.
 *
 * @package  Controls
 * @see         https://github.com/aristath/kirki
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.2.8
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if( class_exists('WP_Customize_Control')){
	/**
	 * Buttonset control
	 */
	class Educenter_Custom_Control_Cssbox extends WP_Customize_Control {
		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'educenter-cssbox';
		/**
		 * Repeater drag and drop controler
		 *
		 * @since  1.2.8
		 */
		public function __construct( $manager, $id, $args = array(), $fields = array(), $attr = array() ) {
			$this->fields = $fields;
			$this->attr   = $attr;
			$this->label  = $args['label'];
			parent::__construct( $manager, $id, $args );
		}
		/**
		 * enqueue css and scrpts
		 *
		 * @since  1.2.8
		 */
		public function enqueue() {
			wp_enqueue_style('educenter-cssbox', get_template_directory_uri() . '/inc/custom-controller/cssbox/css/cssbox.css', array());
			wp_enqueue_script('educenter-cssbox', get_template_directory_uri().'/inc/custom-controller/cssbox/js/cssbox.js', array( 'jquery', 'customize-controls' ), '', true);
		}
		/**
		 * Renders the control wrapper and calls $this->render_content() for the internals.
		 *
		 * @see WP_Customize_Control::render()
		 */
		protected function render() {
			$id    = 'customize-control-' . str_replace( array( '[', ']' ), array( '-', '' ), $this->id );
			$class = 'customize-control has-switchers customize-control-' . $this->type;
			?><li id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
			<?php $this->render_content(); ?>
			</li>
			<?php
		}
		public function render_content() {
			if ( is_array( $this->value() ) && ! empty( $this->value() ) ) {
				$values = json_encode( $this->value() );
			} else {
				$values = $this->value();
			}
			?>
			<ul class="cssbox-field-control-wrap">
				<?php $this->get_fields(); ?>
			</ul>
			<input type="hidden" <?php $this->link(); ?> class="cssbox-collection-value" value="<?php echo esc_attr( $values ); ?>"/>
			<?php
		}
		public function get_fields() {
			$devices = array(
				'desktop' => array(
					'icon' => 'dashicons-laptop',
				),
				'tablet'  => array(
					'icon' => 'dashicons-tablet',
				),
				'mobile'  => array(
					'icon' => 'dashicons-smartphone ',
				),
			);
			$default_fields  = array(
				'top'    => true,
				'right'  => true,
				'bottom' => true,
				'left'   => true,
			);
			$box_fields_attr = ! empty( $this->fields ) ? $this->fields : $default_fields;
			$attr            = $this->attr;
			if ( is_array( $this->value() ) && ! empty( $this->value() ) ) {
				$values = $this->value();
			} else {
				$values = json_decode( $this->value(), true );
			}
			$min       = isset( $attr['min'] ) ? $attr['min'] : 0;
			$max       = isset( $attr['max'] ) ? $attr['max'] : 1000;
			$step      = isset( $attr['step'] ) ? $attr['step'] : 1;
			$link      = isset( $attr['link'] ) ? $attr['link'] : 1;
			$devices   = isset( $attr['devices'] ) ? $attr['devices'] : $devices;
			$link_text = isset( $attr['link_text'] ) ? $attr['link_text'] : esc_html__( 'Link', 'educenter' );
			?>
			<li class="cssbox-field-control">
				<h3 class="cssbox-field-label">
					<?php
					echo "<span class='cssbox-field-title'>" . esc_html( $this->label ) . '</span>';
					?>
				</h3>
				<?php
				if ( $this->description ) {
					?>
					<span class="description customize-control-description">
						<?php echo wp_kses_post( $this->description ); ?>
					</span>
					<?php
				}
				?>
				<div class="cssbox-fields">
				<?php
				if ( count( $devices ) > 1 ) {
					?>
					<ul class="responsive-switchers">
						<?php
						$i = 1;
						foreach ( $devices as $device_id => $device_details ) {
							if ( $i == 1 ) {
								$active = ' active';
							} else {
								$active = '';
							}
							?>
							<li class="<?php echo esc_attr( $device_id ); ?>">
								<button type="button" class="preview-<?php echo esc_attr( $device_id ) . ' ' . $active; ?>" data-device="<?php echo esc_attr( $device_id ); ?>">
									<i class="dashicons <?php echo esc_attr( $device_details['icon'] ); ?>"></i>
								</button>
							</li>
							<?php
							$i ++;
						}
						?>
					</ul>
					<?php
				}
				?>
					<div class="responsive-switchers-fields">
						<?php
						$i = 1;
						foreach ( $devices as $device_id => $device_details ) {
							if ( $i == 1 ) {
								$active = ' active';
							} else {
								$active = '';
							}
							echo '<ul class="cssbox-device-wrap control-wrap ' . $device_id . ' ' . $active . '">';
							foreach ( $box_fields_attr as $field_id => $box_single_field ) {
								$value   = isset( $values[ $device_id ][ $field_id ] ) ? $values[ $device_id ][ $field_id ] : '';
								$default = isset( $box_single_field[ $device_id ][ $field_id ] ) ? $box_single_field[ $device_id ][ $field_id ] : '';
								if ( ! $value ) {
									if ( isset( $box_single_field['default'] ) ) {
										$value = $box_single_field['default'];
									}
								}
								echo '<li>';
								?>
								<label>
									<span>
										<?php echo ucfirst( esc_attr( $field_id ) ); ?>
									</span>
								<input data-device="<?php echo esc_attr( $device_id ); ?>" data-single-name="<?php echo esc_attr( $field_id ); ?>" data-default="<?php echo esc_attr( $default ); ?>" min="<?php echo esc_attr( $min ); ?>" max="<?php echo esc_attr( $max ); ?>" step="<?php echo esc_attr( $step ); ?>" type="number" class="cssbox-field" value="<?php echo esc_attr( $value ); ?>">
								</label>
								<?php
								echo '</li>';
							}
							if ( $link ) {
								$cssbox_link = isset( $values[ $device_id ]['cssbox_link'] ) ? $values[ $device_id ]['cssbox_link'] : '';
								?>
								<li>
									<label>
										<span title="<?php echo esc_attr( $link_text ); ?>"><?php echo esc_html( $link_text ); ?></span>
										<span class="field-link">
											<input data-device="<?php echo esc_attr( $device_id ); ?>" data-single-name="cssbox_link" data-default="<?php echo esc_attr( $default ); ?>"  type="checkbox" class="cssbox-field cssbox_link" value="<?php echo esc_attr( $value ); ?>" <?php checked( true, $cssbox_link, true ); ?>>
											<span class="tgl-btn"></span>
										</span>
									</label>
								</li>
								<?php
							}
							echo '</ul>';
							$i ++;
						}
						?>
					</div>
				</div>
			</li>
			<?php
		}
	}
}
if ( ! function_exists( 'educenter_sanitize_field_default_css_box' ) ) :
	/**
	 * Sanitize Default Css Box
	 *
	 * @since Educenter 1.5.3
	 *
	 * @param $input
	 * @return array
	 *
	 */
	function educenter_sanitize_field_default_css_box( $input ) {
		$input_decoded = json_decode( $input, true );
		$output        = array();
		if ( ! empty( $input_decoded ) ) {
			foreach ( $input_decoded as $device_id => $device_details ) {
				foreach ( $device_details as $key => $value ) {
					if ( $key == 'cssbox_link' ) {
						$output[ $device_id ][ $key ] = ( ( isset( $value ) && true === $value ) ? true : false );
					} else {
						$output[ $device_id ][ $key ] = $value !='' ? intval( $value ) : '';
					}
				}
			}
			return json_encode( $output );
		}
		return $input;
	}
endif;
if ( ! function_exists( 'educenter_not_empty' ) ) {
	/**
	 * educenter_not_empty
	 * @param $var
	 * @return bool
	 */
	function educenter_not_empty( $var ) {
		if ( trim( $var ) === '' ) {
			return false;
		}
		return true;
	}
}
if ( ! function_exists( 'educenter_cssbox_values_inline' ) ) {
	/**
	 * educenter_cssbox_values_inline description
	 * @param  array  $position_collection
	 * @param  string $device
	 * @return string
	 */
	function educenter_cssbox_values_inline( $position_collection, $device ) {
		$inline_css = '';
		if ( ! is_array( $position_collection ) ) {
			return false;
		}
		foreach ( $position_collection as $device_data => $value ) {
			switch ( $device_data ) {
				case 'desktop':
					if ( 'desktop' == $device ) {
						$top    = ( isset( $value['top'] ) && educenter_not_empty( $value['top'] ) ) ? $value['top'] : '';
						$right  = ( isset( $value['right'] ) && educenter_not_empty( $value['right'] ) ) ? $value['right'] : '';
						$bottom = ( isset( $value['bottom'] ) && educenter_not_empty( $value['bottom'] ) ) ? $value['bottom'] : '';
						$left   = ( isset( $value['left'] ) && educenter_not_empty( $value['left'] ) ) ? $value['left'] : '';
						if ( educenter_not_empty( $top ) || educenter_not_empty( $right ) || educenter_not_empty( $bottom ) || educenter_not_empty( $left ) ) {
							$top        = ( educenter_not_empty( $top ) ) ? $top . 'px' : 0;
							$right      = ( educenter_not_empty( $right ) ) ? $right . 'px' : 0;
							$bottom     = ( educenter_not_empty( $bottom ) ) ? $bottom . 'px' : 0;
							$left       = ( educenter_not_empty( $left ) ) ? $left . 'px' : 0;
							$inline_css = $top . ' ' . $right . ' ' . $bottom . ' ' . $left;
						} else {
							$inline_css = '0';
						}
					}
					break;
				case 'tablet':
					if ( 'tablet' == $device ) {
						$top    = ( isset( $value['top'] ) && educenter_not_empty( $value['top'] ) ) ? $value['top'] : '';
						$right  = ( isset( $value['right'] ) && educenter_not_empty( $value['right'] ) ) ? $value['right'] : '';
						$bottom = ( isset( $value['bottom'] ) && educenter_not_empty( $value['bottom'] ) ) ? $value['bottom'] : '';
						$left   = ( isset( $value['left'] ) && educenter_not_empty( $value['left'] ) ) ? $value['left'] : '';
						if ( educenter_not_empty( $top ) || educenter_not_empty( $right ) || educenter_not_empty( $bottom ) || educenter_not_empty( $left ) ) {
							$top        = ( educenter_not_empty( $top ) ) ? $top . 'px' : 0;
							$right      = ( educenter_not_empty( $right ) ) ? $right . 'px' : 0;
							$bottom     = ( educenter_not_empty( $bottom ) ) ? $bottom . 'px' : 0;
							$left       = ( educenter_not_empty( $left ) ) ? $left . 'px' : 0;
							$inline_css = $top . ' ' . $right . ' ' . $bottom . ' ' . $left;
						} else {
							$inline_css = '0';
						}
					}
					break;
				case 'mobile':
					if ( 'mobile' == $device ) {
						$top    = ( isset( $value['top'] ) && educenter_not_empty( $value['top'] ) ) ? $value['top'] : '';
						$right  = ( isset( $value['right'] ) && educenter_not_empty( $value['right'] ) ) ? $value['right'] : '';
						$bottom = ( isset( $value['bottom'] ) && educenter_not_empty( $value['bottom'] ) ) ? $value['bottom'] : '';
						$left   = ( isset( $value['left'] ) && educenter_not_empty( $value['left'] ) ) ? $value['left'] : '';
						if ( educenter_not_empty( $top ) || educenter_not_empty( $right ) || educenter_not_empty( $bottom ) || educenter_not_empty( $left ) ) {
							$top        = ( educenter_not_empty( $top ) ) ? $top . 'px' : 0;
							$right      = ( educenter_not_empty( $right ) ) ? $right . 'px' : 0;
							$bottom     = ( educenter_not_empty( $bottom ) ) ? $bottom . 'px' : 0;
							$left       = ( educenter_not_empty( $left ) ) ? $left . 'px' : 0;
							$inline_css = $top . ' ' . $right . ' ' . $bottom . ' ' . $left;
						} else {
							$inline_css = '0';
						}
					}
					break;
				default:
					break;
			}
    }
		return $inline_css;
	}
}