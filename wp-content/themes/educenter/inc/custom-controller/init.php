<?php
/**
 * Includes all the custom controller classes
 *
 * @param string $file_path , path from the theme
 * @return string full path of file inside theme
 *
 */
require get_template_directory() . '/inc/custom-controller/font-icons.php';
/** tabs */
require get_template_directory() .'/inc/custom-controller/tab/class-tab-controller.php';
require get_template_directory() .'/inc/custom-controller/switch/class-switch.php';
require get_template_directory() .'/inc/custom-controller/font-awesome-icon/font-awesome-icon.php';

require get_template_directory() .'/inc/custom-controller/repeater/class-repeater.php';
require get_template_directory() .'/inc/custom-controller/range/class-range.php';
require get_template_directory() .'/inc/custom-controller/alpha-color/class-alpha-color.php';
require get_template_directory() .'/inc/custom-controller/heading/heading.php';
require get_template_directory() .'/inc/custom-controller/selector/class-selector.php';
require get_template_directory() .'/inc/custom-controller/info/info.php';
require get_template_directory() .'/inc/custom-controller/multi-checkbox/multi-checkbox.php';
require get_template_directory() .'/inc/custom-controller/image-select/image-select.php';
require get_template_directory() .'/inc/custom-controller/background-control/background-control.php';
require get_template_directory() .'/inc/custom-controller/color-tab/color-tab.php';
require get_template_directory() .'/inc/custom-controller/range-slider/range-slider.php';
require get_template_directory() .'/inc/custom-controller/toggle-section/toggle-section.php';
require get_template_directory() .'/inc/custom-controller/seprator/class-seprator.php';
/*cssbox controller*/
require get_template_directory() .'/inc/custom-controller/cssbox/class-control-cssbox.php';
/*buttonset controller*/
require get_template_directory() .'/inc/custom-controller/buttonset/class-control-buttonset.php';
require get_template_directory() .'/inc/custom-controller/buttonset/class-control-responsive-buttonset.php';
/* group controller*/
require get_template_directory() .'/inc/custom-controller/group/class-control-group.php';