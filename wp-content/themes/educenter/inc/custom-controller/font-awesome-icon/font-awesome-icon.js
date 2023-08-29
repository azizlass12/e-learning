
(function ($) {
    jQuery(document).ready(function ($) {
        var delay = (function () {
            var timer = 0;
            return function (callback, ms) {
                clearTimeout(timer);
                timer = setTimeout(callback, ms);
            };
        })();

        // FontAwesome Icon Control JS
        $('body').on('click', '.educenter-customizer-icon-box .educenter-icon-list.fontawesome-list li', function () {
            var icon_class = $(this).find('i').attr('class');
            $(this).closest('.educenter-icon-box').find('.educenter-icon-list.fontawesome-list li').removeClass('icon-active');
            $(this).addClass('icon-active');
            $(this).closest('.educenter-icon-box').prev('.educenter-selected-icon').children('i').attr('class', '').addClass(icon_class);
            $(this).closest('.educenter-icon-box').next('input').val(icon_class).trigger('change');
            $(this).closest('.educenter-icon-box').slideUp();
        });

        $('body').on('click', '.educenter-customizer-icon-box .educenter-selected-icon', function () {
            $(this).next().slideToggle();
        });

        $('body').on('change', '.educenter-customizer-icon-box .educenter-icon-search select', function () {
            var selected = $(this).val();
            $(this).closest('.educenter-icon-box').find('.educenter-icon-search-input').val('');
            $(this).closest('.educenter-icon-box').find('.educenter-icon-list.fontawesome-list li').show();
            $(this).closest('.educenter-icon-box').find('.educenter-icon-list.fontawesome-list').hide().removeClass('active');
            $(this).closest('.educenter-icon-box').find('.' + selected).fadeIn().addClass('active');
        });

        $('body').on('keyup', '.educenter-customizer-icon-box .educenter-icon-search input', function (e) {
            var $input = $(this);
            var keyword = $input.val().toLowerCase();
            search_criteria = $input.closest('.educenter-icon-box').find('.educenter-icon-list.fontawesome-list.active i');

            delay(function () {
                $(search_criteria).each(function () {
                    if ($(this).attr('class').indexOf(keyword) > -1) {
                        $(this).parent().show();
                    } else {
                        $(this).parent().hide();
                    }
                });
            }, 500);
        });

    });
})(jQuery);
