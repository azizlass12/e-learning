jQuery(document).ready(function ($) {
    $('.color-tab-toggle').on('click', function () {
        $(this).closest('.customize-control').find('.color-tab-wrap').slideToggle();
    });

    $('.color-tab-switchers li').on('click', function () {
        if ($(this).hasClass('active')) {
            return false;
        }
        var clicked = $(this).attr('data-tab');
        $(this).parent('.color-tab-switchers').find('li').removeClass('active');
        $(this).addClass('active');
        $(this).closest('.color-tab-wrap').find('.color-tab-contents > div').hide();
        $(this).closest('.color-tab-wrap').find('.' + clicked).fadeIn();
    });
    
});

(function (api) {    
    // Color Tab Control
    api.controlConstructor['color-tab'] = api.Control.extend({

        ready: function () {

            var control = this;

            control.container.find('.alpha-color-control').each(function () {
                var $elem = jQuery(this);
                var paletteInput = $elem.data('palette');
                var setting = jQuery(this).attr('data-customize-setting-link');

                if (true == paletteInput) {
                    palette = true;
                } else if ((typeof (paletteInput) !== 'undefined') && paletteInput.indexOf('|') !== -1) {
                    palette = paletteInput.split('|');
                } else {
                    palette = false;
                }

                $elem.wpColorPicker({
                    change: function (event, ui) {
                        var color = ui.color.toString();

                        if (jQuery('html').hasClass('colorpicker-ready')) {
                            wp.customize(setting, function (obj) {
                                obj.set(color);
                            });
                        }
                    },
                    clear: function (event) {
                        var element = jQuery(event.target).closest('.wp-picker-input-wrap').find('.wp-color-picker')[0];
                        var color = '';

                        if (element) {
                            wp.customize(setting, function (obj) {
                                obj.set(color);
                            });
                        }
                    },
                    palettes: palette
                });
            });
        }
    });
})(wp.customize);