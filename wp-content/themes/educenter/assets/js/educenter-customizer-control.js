(function (api) {

    wp.customize('educenter_homepage_slider_type', function (setting) {
        var defaultSlider = function (control) {
            var visibility = function () {
                if ('default' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        var advancetSlider = function (control) {
            var visibility = function () {
                if ('advance' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        wp.customize.control('educenter_banner_all_sliders', defaultSlider);
        wp.customize.control('educenter_banner_normal_all_sliders', advancetSlider);
    });

    wp.customize('educenter_homepage_service_type', function (setting) {
        var defaultSlider = function (control) {
            var visibility = function () {
                if ('default' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        var advancetSlider = function (control) {
            var visibility = function () {
                if ('advance' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        wp.customize.control('educenter_fservices_area_settings', defaultSlider);
        wp.customize.control('educenter_fservices_area_settings_advance', advancetSlider);
    });

    /** education xpert theme compatible */
    wp.customize('education_xpert_feature_services_type', function (setting) {
        var defaultOption = function (control) {
            var visibility = function () {
                if ('default' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        var advanceOption = function (control) {
            var visibility = function () {
                if ('advance' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        wp.customize.control('education_xpert_feature_services_area_settings', defaultOption);
        wp.customize.control('education_xpert_feature_services_area_settings_advance', advanceOption);
    });

    /** course view */
    wp.customize('educenter_courses_section_view', function (setting) {
        var gridSlide = function (control) {
            var visibility = function () {
                if ('grid' === setting.get() || 'slide' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        wp.customize.control('educenter_courses_section_column', gridSlide);
    });



    //common settings
    var settingIds = [ 'fservices', 'aboutus', 'cta', 'services', 'counter', 'courses', 'blog', 'team', 'gallery', 'testimonial', 'header', 'footer' ];
    $ = jQuery;
    $.each(settingIds, function (i, settingId) {
        wp.customize('educenter_' + settingId + '_bg_type', function (setting) {
            var setupControlColorBg = function (control) {
                var visibility = function () {
                    if ('color-bg' === setting.get() || 'image-bg' === setting.get()) {
                        control.container.removeClass('customizer-hidden');
                    } else {
                        control.container.addClass('customizer-hidden');
                    }
                };
                visibility();
                setting.bind(visibility);
            };

            var setupControlImageBg = function (control) {
                var visibility = function () {
                    if ('image-bg' === setting.get()) {
                        control.container.removeClass('customizer-hidden');
                    } else {
                        control.container.addClass('customizer-hidden');
                    }
                };
                visibility();
                setting.bind(visibility);
            };

            var setupControlVideoBg = function (control) {
                var visibility = function () {
                    if ('video-bg' === setting.get()) {
                        control.container.removeClass('customizer-hidden');
                    } else {
                        control.container.addClass('customizer-hidden');
                    }
                };
                visibility();
                setting.bind(visibility);
            };

            var setupControlGradientBg = function (control) {
                var visibility = function () {
                    if ('gradient-bg' === setting.get()) {
                        control.container.removeClass('customizer-hidden');
                    } else {
                        control.container.addClass('customizer-hidden');
                    }
                };
                visibility();
                setting.bind(visibility);
            };

            var setupControlOverlay = function (control) {
                var visibility = function () {
                    if ('none' === setting.get() || 'color-bg' === setting.get() || 'gradient-bg' === setting.get()) {
                        control.container.addClass('customizer-hidden');
                    } else {
                        control.container.removeClass('customizer-hidden');
                    }
                };
                visibility();
                setting.bind(visibility);
            };

            wp.customize.control('educenter_' + settingId + '_bg_color', setupControlColorBg);
            wp.customize.control('educenter_' + settingId + '_bg_image', setupControlImageBg);
            wp.customize.control('educenter_' + settingId + '_bg_image_url', setupControlImageBg);

            wp.customize.control('educenter_' + settingId + '_bg_video', setupControlVideoBg);
            wp.customize.control('educenter_' + settingId + '_bg_gradient', setupControlGradientBg);
            wp.customize.control('educenter_' + settingId + '_overlay_color', setupControlOverlay);
        });

        wp.customize('educenter_' + settingId + '_section_seperator', function (setting) {

            var setupTopSeperator = function (control) {
                var visibility = function () {
                    if ('top' === setting.get() || 'top-bottom' === setting.get()) {
                        control.container.removeClass('customizer-hidden');
                    } else {
                        control.container.addClass('customizer-hidden');
                    }
                };
                visibility();
                setting.bind(visibility);
            };

            var setupBottomSeperator = function (control) {
                var visibility = function () {
                    if ('bottom' === setting.get() || 'top-bottom' === setting.get()) {
                        control.container.removeClass('customizer-hidden');
                    } else {
                        control.container.addClass('customizer-hidden');
                    }
                };
                visibility();
                setting.bind(visibility);
            };

            wp.customize.control('educenter_' + settingId + '_seperator1', setupTopSeperator);
            wp.customize.control('educenter_' + settingId + '_top_seperator', setupTopSeperator);
            wp.customize.control('educenter_' + settingId + '_ts_color', setupTopSeperator);
            wp.customize.control('educenter_' + settingId + '_ts_height', setupTopSeperator);
            wp.customize.control('educenter_' + settingId + '_seperator2', setupBottomSeperator);
            wp.customize.control('educenter_' + settingId + '_bottom_seperator', setupBottomSeperator);
            wp.customize.control('educenter_' + settingId + '_bs_color', setupBottomSeperator);
            wp.customize.control('educenter_' + settingId + '_bs_height', setupBottomSeperator);
        });
    });



    /*****
    * About Us Progress Bar 
   */
    wp.customize('educenter_aboutus_counter_enable', function (setting) {
        var counter = function (control) {
            var visibility = function () {
                if ('enable' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        wp.customize.control('educenter_aboutus_counter', counter);
    });

    wp.customize('educenter_aboutus_signature_enable', function (setting) {
        var signature = function (control) {
            var visibility = function () {
                if ('enable' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        wp.customize.control('educenter_aboutus_profile_image', signature);
        wp.customize.control('educenter_aboutus_profile_name', signature);
        wp.customize.control('educenter_aboutus_profile_role', signature);
        wp.customize.control('educenter_aboutus_signature', signature);

    });


})(wp.customize);