jQuery(document).ready(function ($) {

    function isScrolledIntoView (elem) {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();
        var elemTop = $(elem).parent().offset().top;
        var elemBottom = elemTop + $(elem).parent().height();
        return ((elemBottom <= docViewBottom));
    }

    function countUp () {
        $('.is-sp-counter').each(function () {
            var $this = $(this),
                countTo = $this.attr('data-end'),
                counterStart = $this.attr('data-start'),
                ended = $this.attr('ended');


            if (ended != "true" && isScrolledIntoView($this)) {
                $this.text(counterStart);
                $({ countNum: $this.text() }).animate({
                    countNum: countTo
                },
                    {
                        duration: 2500,
                        easing: 'swing',
                        step: function () {
                            $this.text(Math.floor(this.countNum) + $this.attr('data-prefix'));
                        },
                        complete: function () {
                            $this.text(this.countNum + $this.attr('data-prefix'));
                        }
                    });
                $this.attr('ended', 'true');
            }
        });
    }

    if (isScrolledIntoView(".is-sp-counter")) {
        countUp();
    }

    $(document).scroll(function () {
        if (isScrolledIntoView(".is-sp-counter")) {
            countUp();
        }
    });
});