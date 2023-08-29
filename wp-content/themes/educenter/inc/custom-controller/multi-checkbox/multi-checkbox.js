(function ($) {
    jQuery(document).ready(function ($) {
        /**
         * Select Multiple Category
         */
        $('.customize-control-checkbox-multiple input[type="checkbox"]').on('change', function () {

                var checkbox_values = $(this).parents('.customize-control').find('input[type="checkbox"]:checked').map(
                    function () {
                        return $(this).val();
                    }
                ).get().join(',');

                $(this).parents('.customize-control').find('input[type="hidden"]').val(checkbox_values).trigger('change');

            }
        );
    });
})(jQuery);
