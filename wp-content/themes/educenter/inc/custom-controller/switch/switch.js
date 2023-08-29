(function ($) {
    // Switch Control
    $('body').on('click', '.onoffswitch', function () {
        var $this = $(this);
        if ($this.hasClass('switch-on')) {
            $(this).removeClass('switch-on');
            $this.next('input').val('disabled').trigger('change')
        } else {
            $(this).addClass('switch-on');
            $this.next('input').val('enable').trigger('change')
        }
    });
})(jQuery);