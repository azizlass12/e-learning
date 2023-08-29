(function ($) {
    $(document).ready(function () {


        var delay = (function () {
            var timer = 0;
            return function (callback, ms) {
                clearTimeout(timer);
                timer = setTimeout(callback, ms);
            };
        })();

        function educenter_refresh_repeater_values () {
            $(".educenter-repeater-field-control-wrap").each(function () {

                var values = [];
                var $this = $(this);

                $this.find(".educenter-repeater-field-control").each(function () {
                    var valueToPush = {};

                    $(this).find('[data-name]').each(function () {
                        var dataName = $(this).attr('data-name');
                        var dataValue = $(this).val();
                        valueToPush[ dataName ] = dataValue;
                    });

                    values.push(valueToPush);
                });

                $this.next('.educenter-repeater-collector').val(JSON.stringify(values)).trigger('change');
            });
        }

        $('#customize-theme-controls').on('click', '.educenter-repeater-field-title', function () {
            $(this).next().slideToggle();
            $(this).closest('.educenter-repeater-field-control').toggleClass('expanded');
        });

        $('#customize-theme-controls').on('click', '.educenter-fields.educenter-type-wrapper-start .wrapper-start', function () {
            $(this).parent().toggleClass('expanded');
        });

        $('#customize-theme-controls').on('click', '.educenter-repeater-field-close', function () {
            $(this).closest('.educenter-repeater-fields').slideUp();
            $(this).closest('.educenter-repeater-field-control').toggleClass('expanded');
        });

        $('body').on('click', '.educenter-icon-list.educenter-icons li', function () {
            var icon_class = $(this).find('img').attr('src');
            var icon_image = icon_class.split("/").pop();
            var img_home_url = educenter_script.url_to_icon;
            $(this).addClass('icon-active').siblings().removeClass('icon-active');
            $(this).parent('.educenter-icon-list.educenter-icons').parents('.educenter-customizer-icon-box').find('.educenter-selected-icon').children('img').attr('src', img_home_url + icon_image).addClass(icon_class);
            $(this).parent('.educenter-icon-list.educenter-icons').parents('.educenter-customizer-icon-box').find('input').val(icon_image).trigger('change');
            $(this).closest('.educenter-icon-box').slideUp();
        });

        $("body").on("click", '.educenter-add-control-field', function () {

            var $this = $(this).parent();
            if (typeof $this != 'undefined') {

                var field = $this.find(".educenter-repeater-field-control:first").clone();
                if (typeof field != 'undefined') {

                    field.find("input[type='text'][data-name]").each(function () {
                        var defaultValue = $(this).attr('data-default');
                        $(this).val(defaultValue);
                    });

                    field.find("textarea[data-name]").each(function () {
                        var defaultValue = $(this).attr('data-default');
                        $(this).val(defaultValue);
                    });

                    field.find("select[data-name]").each(function () {
                        var defaultValue = $(this).attr('data-default');
                        $(this).val(defaultValue);
                    });

                    field.find(".radio-labels input[type='radio']").each(function () {
                        var defaultValue = $(this).closest('.radio-labels').next('input[data-name]').attr('data-default');
                        $(this).closest('.radio-labels').next('input[data-name]').val(defaultValue);

                        if ($(this).val() == defaultValue) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });

                    field.find(".selector-labels label").each(function () {
                        var defaultValue = $(this).closest('.selector-labels').next('input[data-name]').attr('data-default');
                        var dataVal = $(this).attr('data-val');
                        $(this).closest('.selector-labels').next('input[data-name]').val(defaultValue);

                        if (defaultValue == dataVal) {
                            $(this).addClass('selector-selected');
                        } else {
                            $(this).removeClass('selector-selected');
                        }
                    });

                    field.find('.range-input').each(function () {
                        var $dis = $(this);
                        $dis.removeClass('ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all').empty();
                        var defaultValue = parseFloat($dis.attr('data-defaultvalue'));
                        $dis.siblings(".range-input-selector").val(defaultValue);
                        $dis.slider({
                            range: "min",
                            value: parseFloat($dis.attr('data-defaultvalue')),
                            min: parseFloat($dis.attr('data-min')),
                            max: parseFloat($dis.attr('data-max')),
                            step: parseFloat($dis.attr('data-step')),
                            slide: function (event, ui) {
                                $dis.siblings(".range-input-selector").val(ui.value);
                                educenter_refresh_repeater_values();
                            }
                        });
                    });

                    field.find('.onoffswitch').each(function () {
                        var defaultValue = $(this).next('input[data-name]').attr('data-default');
                        $(this).next('input[data-name]').val(defaultValue);
                        if (defaultValue == 'on') {
                            $(this).addClass('switch-on');
                        } else {
                            $(this).removeClass('switch-on');
                        }
                    });

                    field.find('.educenter-color-picker').each(function () {
                        $colorPicker = $(this);
                        $colorPicker.closest('.wp-picker-container').after($(this));
                        $colorPicker.prev('.wp-picker-container').remove();
                        $(this).wpColorPicker({
                            change: function (event, ui) {
                                setTimeout(function () {
                                    educenter_refresh_repeater_values();
                                }, 100);
                            }
                        });
                    });

                    field.find(".attachment-media-view").each(function () {
                        var defaultValue = $(this).find('input[data-name]').attr('data-default');
                        $(this).find('input[data-name]').val(defaultValue);
                        if (defaultValue) {
                            $(this).find(".thumbnail-image").html('<img src="' + defaultValue + '"/>').prev('.placeholder').addClass('hidden');
                        } else {
                            $(this).find(".thumbnail-image").html('').prev('.placeholder').removeClass('hidden');
                        }
                    });

                    field.find(".educenter-icon-list").each(function () {
                        var defaultValue = $(this).next('input[data-name]').attr('data-default');
                        $(this).next('input[data-name]').val(defaultValue);
                        $(this).prev('.educenter-selected-icon').children('i').attr('class', '').addClass(defaultValue);

                        $(this).find('li').each(function () {
                            var icon_class = $(this).find('i').attr('class');
                            if (defaultValue == icon_class) {
                                $(this).addClass('icon-active');
                            } else {
                                $(this).removeClass('icon-active');
                            }
                        });
                    });

                    field.find(".educenter-icon-list.educenter-icons").each(function () {
                        var defaultValue = $(this).next('input[data-name]').attr('data-default');
                        var img_home_url = educenter_script.url_to_icon;
                        $(this).next('input[data-name]').val(defaultValue);
                        $(this).prev('.educenter-selected-icon').children('img').attr('src', img_home_url + defaultValue).addClass(defaultValue);

                        $(this).find('li').each(function () {
                            var icon_class = $(this).find('img').attr('class');
                            if (defaultValue == icon_class) {
                                $(this).addClass('icon-active');
                            } else {
                                $(this).removeClass('icon-active');
                            }
                        });

                    });

                    field.find(".educenter-multi-category-list").each(function () {
                        var defaultValue = $(this).next('input[data-name]').attr('data-default');
                        $(this).next('input[data-name]').val(defaultValue);

                        $(this).find('input[type="checkbox"]').each(function () {
                            if ($(this).val() == defaultValue) {
                                $(this).prop('checked', true);
                            } else {
                                $(this).prop('checked', false);
                            }
                        });
                    });

                    //field.find('.educenter-fields').show();

                    $this.find('.educenter-repeater-field-control-wrap').append(field);

                    field.addClass('expanded').find('.educenter-repeater-fields').show();
                    $('.accordion-section-content').animate({
                        scrollTop: $this.height()
                    }, 1000);
                    educenter_refresh_repeater_values();
                }

            }
            return false;
        });

        $("#customize-theme-controls").on("click", ".educenter-repeater-field-remove", function () {
            if (typeof $(this).parent() != 'undefined') {
                $(this).closest('.educenter-repeater-field-control').slideUp('normal', function () {
                    $(this).remove();
                    educenter_refresh_repeater_values();
                });
            }
            return false;
        });

        $("#customize-theme-controls").on('keyup change', '[data-name]', function () {
            delay(function () {
                educenter_refresh_repeater_values();
                return false;
            }, 500);
        });


        $("#customize-theme-controls").on('change', 'input[type="checkbox"][data-name]', function () {
            if ($(this).is(":checked")) {
                $(this).val('yes');
            } else {
                $(this).val('no');
            }
            return false;
        });

        // Drag and drop to change order
        $(".educenter-repeater-field-control-wrap").sortable({
            orientation: "vertical",
            handle: ".educenter-repeater-field-title",
            update: function (event, ui) {
                educenter_refresh_repeater_values();
            }
        });

        // Set all variables to be used in scope
        var frame;

        // ADD IMAGE LINK
        $("body").on("click", '.customize-control-repeater .educenter-upload-button', function (event) {
            event.preventDefault();
            var imgContainer = $(this).closest('.educenter-fields-wrap').find('.thumbnail-image'),
                placeholder = $(this).closest('.educenter-fields-wrap').find('.placeholder'),
                imgIdInput = $(this).siblings('.upload-id');

            // Create a new media frame
            frame = wp.media({
                title: 'Select or Upload Image',
                button: {
                    text: 'Use Image'
                },
                multiple: false // Set to true to allow multiple files to be selected
            });

            // When an image is selected in the media frame...
            frame.on('select', function () {

                // Get media attachment details from the frame state
                var attachment = frame.state().get('selection').first().toJSON();

                // Send the attachment URL to our custom image input field.
                imgContainer.html('<img src="' + attachment.url + '" style="max-width:100%;"/>');
                placeholder.addClass('hidden');

                // Send the attachment id to our hidden input
                imgIdInput.val(attachment.url).trigger('change').change();

            });

            // Finally, open the modal on click
            frame.open();
        });

        // DELETE IMAGE LINK
        $("body").on("click", '.customize-control-repeater .educenter-delete-button', function (event) {

            event.preventDefault();
            var imgContainer = $(this).closest('.educenter-fields-wrap').find('.thumbnail-image'),
                placeholder = $(this).closest('.educenter-fields-wrap').find('.placeholder'),
                imgIdInput = $(this).siblings('.upload-id');

            // Clear out the preview image
            imgContainer.find('img').remove();
            placeholder.removeClass('hidden');

            // Delete the image id from the hidden input
            imgIdInput.val('').trigger('change');

        });

        var ColorChange = false;
        $('.educenter-color-picker').wpColorPicker({
            change: function (event, ui) {
                if (jQuery('html').hasClass('colorpicker-ready') && ColorChange) {
                    educenter_refresh_repeater_values();
                }
            }
        });
        ColorChange = true;

        //MultiCheck box Control JS
        $('body').on('change', '.educenter-type-multicategory input[type="checkbox"]', function () {
            var checkbox_values = $(this).parents('.educenter-type-multicategory').find('input[type="checkbox"]:checked').map(function () {
                return $(this).val();
            }).get().join(',');

            $(this).parents('.educenter-type-multicategory').find('input[type="hidden"]').val(checkbox_values).trigger('change');
            educenter_refresh_repeater_values();
        });

        $('.educenter-repeater-fields .range-input').each(function () {
            var $dis = $(this);
            $dis.slider({
                range: "min",
                value: parseFloat($dis.attr('data-value')),
                min: parseFloat($dis.attr('data-min')),
                max: parseFloat($dis.attr('data-max')),
                step: parseFloat($dis.attr('data-step')),
                slide: function (event, ui) {
                    $dis.siblings(".range-input-selector").val(ui.value);
                    educenter_refresh_repeater_values();
                }
            });
        });

        /**
         * Multiple Gallery Image Control
        */
        $('body').on('click', '.upload_gallery_button', function (event) {
            var current_gallery = $(this).closest('div');
            if (event.currentTarget.id === 'clear-gallery') {
                //remove value from input
                current_gallery.find('.gallery_values').val('').trigger('change');

                //remove preview images
                current_gallery.find('.gallery-screenshot').html('');
                return;
            }

            // Make sure the media gallery API exists
            if (typeof wp === 'undefined' || !wp.media || !wp.media.gallery) {
                return;
            }
            event.preventDefault();
            // Activate the media editor
            var val = current_gallery.find('input[data-name="gallery"]').val();
            var final;

            if (!val) {
                final = '[gallery ids="0"]';
            } else {
                final = '[gallery ids="' + val + '"]';
            }
            var frame = wp.media.gallery.edit(final);

            frame.state('gallery-edit').on(
                'update', function (selection) {

                    //clear screenshot div so we can append new selected images
                    current_gallery.find('.gallery-screenshot').html('');
                    var element, preview_html = '', preview_img;
                    var ids = selection.models.map(
                        function (e) {
                            element = e.toJSON();
                            preview_img = typeof element.sizes.thumbnail !== 'undefined' ? element.sizes.thumbnail.url : element.url;
                            preview_html = "<div class='screen-thumb'><img src='" + preview_img + "'/></div>";
                            current_gallery.find('.gallery-screenshot').append(preview_html);
                            return e.id;
                        }
                    );

                    current_gallery.find('input[data-name="gallery"]').val(ids.join(',')).trigger('change');
                    educenter_refresh_repeater_values();
                }
            );
            return false;
        });
    });

})(jQuery);