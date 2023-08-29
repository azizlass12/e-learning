(function ($) {
    jQuery(document).ready(function ($) {
            
        // Select Image Js
        $('.select-image-control').on('change', function () {
            var activeImage = $(this).find(':selected').attr('data-image');
            $(this).next('.select-image-wrap').find('img').attr('src', activeImage);
        });
    });
})(jQuery);
