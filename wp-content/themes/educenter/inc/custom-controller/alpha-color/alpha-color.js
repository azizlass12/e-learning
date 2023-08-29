jQuery(document).ready(function ($) {
    jQuery('html').addClass('colorpicker-ready');
});

(function (api) {
    // Alpha Color Picker Control
    api.controlConstructor['alpha-color'] = api.Control.extend({

        ready: function () {

            var control = this;

            var paletteInput = control.container.find('.alpha-color-control').data('palette');

            if (true == paletteInput) {
                palette = true;
            } else if ((typeof (paletteInput) !== 'undefined') && paletteInput.indexOf('|') !== -1) {
                palette = paletteInput.split('|');
            } else {
                palette = false;
            }

            control.container.find('.alpha-color-control').wpColorPicker({
                change: function (event, ui) {
                    var color = ui.color.toString();

                    if (jQuery('html').hasClass('colorpicker-ready')) {
                        control.setting.set(color);
                    }
                },
                clear: function (event) {
                    var element = jQuery(event.target).closest('.wp-picker-input-wrap').find('.wp-color-picker')[0];
                    var color = '';

                    if (element) {
                        control.setting.set(color);
                    }
                },
                palettes: palette
            });
        }
    });
})(wp.customize);