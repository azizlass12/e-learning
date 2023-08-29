jQuery(document).ready(function ($) {
    jQuery("[class*='sp-position-']").each(function (e) {
        $this = $(this);

        var cls = jQuery(this).attr('class');
        var clsArray = cls.split(' ');

        if (Array.isArray(clsArray)) {
            var ind = clsArray.findIndex((item) => item.includes('sp-position-'));
            if (ind !== -1) {
                var p = clsArray[ ind ];
                delete clsArray[ ind ];
                $this.css("position", p.split('-')[ 2 ]);
            }
            clsArray = clsArray.filter(Boolean);
            var ind = clsArray.findIndex((t) => t.includes('sp-zindex-'));
            if (ind !== -1) {
                var p = clsArray[ ind ];
                var pos = p.split('-');
                if (pos[ 2 ] == '' && pos[ 3 ]) {
                    $this.css('z-index', "-" + pos[ 3 ]);
                } else {
                    $this.css("z-index", pos[ 2 ]);
                }

                delete clsArray[ ind ];
            }


            clsArray = clsArray.filter(Boolean);
            clsArray.forEach(function (item, index, arr) {
                if (item.includes('spposition-')) {
                    var pos = arr[ index ].split('-');

                    if (pos[ 2 ] == '' && pos[ 3 ]) {
                        $this.css(pos[ 1 ], "-" + pos[ 3 ] + "px");
                    } else {
                        $this.css(pos[ 1 ], pos[ 2 ] + "px");
                    }
                    delete arr[ index ];
                }
            });

            $this.attr('class', clsArray.join(' '));
        }
    });
});