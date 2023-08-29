(function (api) {
    // Range Slider Control
    api.controlConstructor[ 'range-slider' ] = wp.customize.Control.extend({
        ready: function () {
            var control = this,
                slider_input = control.container.find('.educenter-slider-input'),
                desktop_slider = control.container.find('.educenter-slider.desktop-slider'),
                desktop_slider_input = slider_input.find('input.desktop-input'),
                tablet_slider = control.container.find('.educenter-slider.tablet-slider'),
                tablet_slider_input = slider_input.find('input.tablet-input'),
                mobile_slider = control.container.find('.educenter-slider.mobile-slider'),
                mobile_slider_input = slider_input.find('input.mobile-input'),
                slider_input,
                $this,
                val;


            // Desktop slider
            desktop_slider.slider({
                range: 'min',
                value: parseFloat(desktop_slider_input.val()),
                min: parseFloat(desktop_slider_input.attr('min')),
                max: parseFloat(desktop_slider_input.attr('max')),
                step: parseFloat(desktop_slider_input.attr('step')),
                slide: function (event, ui) {
                    jQuery(this).parent().find('.slider-input').val(ui.value).keyup();
                    // $(this).parent().find('.slider-input').trigger('change');
                },
                change: function (event, ui) {
                    // control.settings['desktop'].set(ui.value);
                    jQuery(this).parent().find('.slider-input').trigger('change');
                }
            });

            // // Tablet slider
            tablet_slider.slider({
                range: 'min',
                value: parseFloat(tablet_slider_input.val()),
                min: parseFloat(tablet_slider_input.attr('min')),
                max: parseFloat(tablet_slider_input.attr('max')),
                step: parseFloat(tablet_slider_input.attr('step')),
                slide: function (event, ui) {
                    jQuery(this).parent().find('.slider-input').val(ui.value).keyup();
                },
                change: function (event, ui) {
                    jQuery(this).parent().find('.slider-input').trigger('change');
                }
            });

            // // Mobile slider
            mobile_slider.slider({
                range: 'min',
                value: parseFloat(mobile_slider_input.val()),
                min: parseFloat(mobile_slider_input.attr('min')),
                max: parseFloat(mobile_slider_input.attr('max')),
                step: parseFloat(mobile_slider_input.attr('step')),
                slide: function (event, ui) {
                    jQuery(this).parent().find('.slider-input').val(ui.value).keyup();
                },
                change: function (event, ui) {
                    jQuery(this).parent().find('.slider-input').trigger('change');
                }
            });

            // Update the slider when the number value change
            jQuery('input.desktop-input').on('change keyup paste', function () {
                $this = jQuery(this);
                val = $this.val();
                slider_input = $this.parent().prev('.educenter-slider.desktop-slider');

                slider_input.slider('value', val);
            });

            jQuery('input.tablet-input').on('change keyup paste', function () {
                $this = jQuery(this);
                val = $this.val();
                slider_input = $this.parent().prev('.educenter-slider.tablet-slider');

                slider_input.slider('value', val);
            });

            jQuery('input.mobile-input').on('change keyup paste', function () {
                $this = jQuery(this);
                val = $this.val();
                slider_input = $this.parent().prev('.educenter-slider.mobile-slider');

                slider_input.slider('value', val);
            });

            // Save the values
            control.container.on('change keyup paste', '.desktop input', function () {
                control.settings[ 'desktop' ].set(jQuery(this).val());
            });

            control.container.on('change keyup paste', '.tablet input', function () {
                control.settings[ 'tablet' ].set(jQuery(this).val());
            });

            control.container.on('change keyup paste', '.mobile input', function () {
                control.settings[ 'mobile' ].set(jQuery(this).val());
            });

        }

    });
})(wp.customize);