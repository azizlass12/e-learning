/**
 * CssBox JS
 */
jQuery(document).ready(function ($) {
    // Responsive switchers
    $('.customize-control .responsive-switchers button').on('click', function (event) {

        // Set up variables
        var $this = $(this),
            $devices = $('.responsive-switchers'),
            $device = $(event.currentTarget).data('device'),
            $control = $('.customize-control.has-switchers'),
            $body = $('.wp-full-overlay'),
            $footer_devices = $('.wp-full-overlay-footer .devices');

        // Button class
        $devices.find('button').removeClass('active');
        $devices.find('button.preview-' + $device).addClass('active');

        // Control class
        $control.find('.control-wrap').removeClass('active');
        $control.find('.control-wrap.' + $device).addClass('active');
        $control.removeClass('control-device-desktop control-device-tablet control-device-mobile').addClass('control-device-' + $device);

        // Wrapper class
        $body.removeClass('preview-desktop preview-tablet preview-mobile').addClass('preview-' + $device);

        // Panel footer buttons
        $footer_devices.find('button').removeClass('active').attr('aria-pressed', false);
        $footer_devices.find('button.preview-' + $device).addClass('active').attr('aria-pressed', true);

        // Open switchers
        if ($this.hasClass('preview-desktop')) {
            $control.toggleClass('responsive-switchers-open');
        }

    });

    // If panel footer buttons clicked
    $('.wp-full-overlay-footer .devices button').on('click', function (event) {

        // Set up variables
        var $this = $(this),
            $devices = $('.customize-control.has-switchers .responsive-switchers'),
            $device = $(event.currentTarget).data('device'),
            $control = $('.customize-control.has-switchers');

        // Button class
        $devices.find('button').removeClass('active');
        $devices.find('button.preview-' + $device).addClass('active');

        // Control class
        $control.find('.control-wrap').removeClass('active');
        $control.find('.control-wrap.' + $device).addClass('active');
        $control.removeClass('control-device-desktop control-device-tablet control-device-mobile').addClass('control-device-' + $device);

        // Open switchers
        if (!$this.hasClass('preview-desktop')) {
            $control.addClass('responsive-switchers-open');
        } else {
            $control.removeClass('responsive-switchers-open');
        }

    });

    // Linked button
    $('.educenter-linked').on('click', function () {

        // Set up variables
        var $this = $(this);

        // Remove linked class
        $this.parent().parent('.dimension-wrap').prevAll().slice(0, 4).find('input').removeClass('linked').attr('data-element', '');

        // Remove class
        $this.parent('.link-dimensions').removeClass('unlinked');

    });

    // Unlinked button
    $('.educenter-unlinked').on('click', function () {

        // Set up variables
        var $this = $(this),
            $element = $this.data('element');

        // Add linked class
        $this.parent().parent('.dimension-wrap').prevAll().slice(0, 4).find('input').addClass('linked').attr('data-element', $element);

        // Add class
        $this.parent('.link-dimensions').addClass('unlinked');

    });

    // Values linked inputs
    $('.dimension-wrap').on('input', '.linked', function () {

        var $data = $(this).attr('data-element'),
            $val = $(this).val();

        $('.linked[ data-element="' + $data + '" ]').each(function (key, value) {
            $(this).val($val).change();
        });

    });

});

wp.customize.controlConstructor[ 'educenter-cssbox' ] = wp.customize.Control.extend(
    {
        ready: function () {

            'use strict';

            var control = this;

            this.container.on(
                'change keyup input',
                '.cssbox-field',
                function (e) {
                    e.preventDefault();
                    var $ = jQuery;
                    var cssbox_field = $(this);

                    if (!cssbox_field.hasClass('cssbox_link')) {
                        var dataValue = cssbox_field.val(),
                            device_wrap = cssbox_field.closest('.cssbox-device-wrap');

                        if (device_wrap.find('.cssbox_link').is(':checked')) {
                            device_wrap.find('.cssbox-field').each(
                                function () {
                                    $(this).val(dataValue);
                                }
                            );
                        }
                    }
                    control.updateValue();
                }
            );
        },

        /**
         * Update
         */
        updateValue: function () {
            'use strict';
            var control = this;

            var valueToPush = {};
            control.container.find('.cssbox-field').each(
                function () {

                    var $ = jQuery;
                    var device = $(this).attr('data-device'),
                        dataName = $(this).attr('data-single-name');

                    if (typeof valueToPush[ device ] === 'undefined') {
                        valueToPush[ device ] = {};
                    }
                    if ($(this).attr('type') === 'checkbox') {
                        if ($(this).is(':checked')) {
                            var dataValue = 1;
                        } else {
                            var dataValue = '';
                        }
                    } else {
                        var dataValue = $(this).val();
                    }
                    valueToPush[ device ][ dataName ] = dataValue;
                }
            );
            var collector = jQuery(control).find('.cssbox-collection-value');
            collector.val(JSON.stringify(valueToPush));
            control.setting.set(JSON.stringify(valueToPush));
        },
    }
);
