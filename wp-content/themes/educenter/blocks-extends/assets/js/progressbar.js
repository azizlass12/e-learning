jQuery(document).ready(function ($) {
    function isScrolledIntoProgressView (elem) {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();
        var elemTop = $(elem).parent().offset().top;
        var elemBottom = elemTop + $(elem).parent().height();
        return ((elemBottom <= docViewBottom));
    }

    function progressBarUp () {
        $('.is-sp-progressbar').each(function () {
            var $this = $(this),
                countTo = $this.attr('data-value'),
                ended = $this.attr('ended');




            if (ended != "true" && isScrolledIntoProgressView($this.parent())) {


                $this.css("width", countTo + '%');

                var content = $this.html();
                $this.html(content + "<span class='percent'>" + countTo + "% </span>");

                $this.attr('ended', 'true');
            }
        });



        $('.is-sp-progressbar-wrapper').each(function () {

            var $this = $(this),
                counterTo = $this.attr('data-progress'),
                ended = $this.attr('ended');

            if (ended != "true" && isScrolledIntoProgressView($this)) {
                for (var i = 1; i < parseInt(counterTo); i++) {
                    console.log('sdfsdfsfd ', i);
                    $this.find('.progress').attr("style", "--progress-percent: " + i);

                }

                $({ countNum: "0%" }).animate({
                    countNum: counterTo
                },
                    {
                        duration: 2000,
                        easing: 'swing',
                        step: function () {
                            $this.find('.number').attr('data-display', Math.floor(this.countNum) + "%");
                        },
                        complete: function () {
                            $this.find('.number').attr('data-display', Math.floor(this.countNum) + "%");
                        }
                    });


                $this.attr('ended', 'true');
            }
        });
    }

    if (isScrolledIntoProgressView(".is-sp-progressbar-wrapper")) {
        progressBarUp();
    }

    $(document).scroll(function () {
        if (isScrolledIntoProgressView(".is-sp-progressbar-wrapper")) {
            progressBarUp();
        }
    });
});