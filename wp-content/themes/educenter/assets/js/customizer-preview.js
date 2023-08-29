/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function ($) {

	function educenter_set_dynamic_css (control, style) {
		jQuery('style.' + control).remove();
		jQuery('head').append('<style class="' + control + '">' + style + '</style>');
	}

	// Site title and description.
	wp.customize('blogname', function (value) {
		value.bind(function (to) {
			$('.site-title a').text(to);
		});
	});
	wp.customize('blogdescription', function (value) {
		value.bind(function (to) {
			$('.site-description').text(to);
		});
	});

	// Header text color.
	wp.customize('header_textcolor', function (value) {
		value.bind(function (to) {
			if ('blank' === to) {
				$('.site-title, .site-description').css({
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				});
			} else {
				$('.site-title, .site-description').css({
					'clip': 'auto',
					'position': 'relative'
				});
				$('.site-title a, .site-description').css({
					'color': to
				});
			}
		});
	});


	/*********
	 * Header Quick Infromation
	*/
	wp.customize('educenter_quick_info_icon_color', function (value) {
		value.bind(function (color) {
			$('.general-header .top-header ul li i').css('color', color);
		})
	});
	wp.customize('educenter_quick_info_color', function (value) {
		value.bind(function (color) {
			$('.general-header .top-header ul li').css('color', color);
		})
	});



	/************
	 * Top Header Settings 
	*/
	wp.customize('educenter_top_header_hide_show', function (value) {
		value.bind(function (to) {
			var visibility = JSON.parse(to);
			var desk_visibility = 'desktop-' + visibility.desktop;
			var tab_visibility = 'tablet-' + visibility.tablet;
			var mob_visibility = 'mobile-' + visibility.mobile;
			var educenter_top_bar = 'top-header clearfix' + desk_visibility + ' ' + tab_visibility + ' ' + mob_visibility;
			$('.top-header').attr('class', educenter_top_bar);
		});
	});

	wp.customize('educenter_top_header', function (value) {
		value.bind(function (to) {
			if (to === 'enable') {
				jQuery('.top-header').css('display', 'block');
			} else {
				jQuery('.top-header').css('display', 'none');
			}

		})
	});
	wp.customize('educenter_th_bg_color', function (value) {
		value.bind(function (color) {
			$('.top-header').css('background-color', color);
		})
	});
	wp.customize('educenter_th_text_color', function (value) {
		value.bind(function (color) {
			$('.top-header span, .top-header .contact-info  li, .top-bar-menu .contact-info li i').css('color', color);
		})
	});
	wp.customize('educenter_th_anchor_color', function (value) {
		value.bind(function (color) {
			var css = '.top-header a{ color:' + color + '!important}';
			educenter_set_dynamic_css('educenter_th_anchor_color', css);
		})
	});

	wp.customize('educenter_th_content_padding', function (value) {
		value.bind(function (to) {
			var selector = ".top-header";
			var section_padding = JSON.parse(to);
			$(selector).css({ "padding-top": section_padding.desktop.top + "px", "padding-right": section_padding.desktop.right + "px", "padding-bottom": section_padding.desktop.bottom + "px", "padding-left": section_padding.desktop.left + "px" });

			if (($(window).width() >= 700) && ($(window).width() < 992)) {
				$(selector).css({ "padding-top": section_padding.tablet.top + "px", "padding-right": section_padding.tablet.right + "px", "padding-bottom": section_padding.tablet.bottom + "px", "padding-left": section_padding.tablet.left + "px" });
			}

			if ($(window).width() < 500) {
				$(selector).css({ "padding-top": section_padding.mobile.top + "px", "padding-right": section_padding.mobile.right + "px", "padding-bottom": section_padding.mobile.bottom + "px", "padding-left": section_padding.mobile.left + "px" });
			}

		});
	});
	wp.customize('educenter_th_content_margin', function (value) {
		value.bind(function (to) {
			var selector = ".top-header";
			var section_margin = JSON.parse(to);
			$(selector).css({ "margin-top": section_margin.desktop.top + "px", "margin-right": section_margin.desktop.right + "px", "margin-bottom": section_margin.desktop.bottom + "px", "margin-left": section_margin.desktop.left + "px" });

			if (($(window).width() >= 700) && ($(window).width() < 992)) {
				$(selector).css({ "margin-top": section_margin.tablet.top + "px", "margin-right": section_margin.tablet.right + "px", "margin-bottom": section_margin.tablet.bottom + "px", "margin-left": section_margin.tablet.left + "px" });
			}

			if ($(window).width() < 500) {
				$(selector).css({ "margin-top": section_margin.mobile.top + "px", "margin-right": section_margin.mobile.right + "px", "margin-bottom": section_margin.mobile.bottom + "px", "margin-left": section_margin.mobile.left + "px" });
			}

		});
	});
	wp.customize('educenter_th_content_radius', function (value) {
		value.bind(function (to) {
			var section_val = JSON.parse(to);
			var selector = '.top-header';

			var css = selector + "{ border-radius: " + section_val.desktop.top + "px " + section_val.desktop.right + "px " + section_val.desktop.bottom + "px " + section_val.desktop.left + "px;}";

			css += '@media screen and (max-width:768px){';
			selector + "{ border-radius: " + section_val.tablet.top + "px " + section_val.tablet.right + "px " + section_val.tablet.bottom + "px " + section_val.tablet.left + "px;}";
			css += '}';


			css += '@media screen and (max-width:480px){';
			css += selector + "{ border-radius: " + section_val.mobile.top + "px " + section_val.mobile.right + "px " + section_val.mobile.bottom + "px " + section_val.mobile.left + "px;}";
			css += '}';

			educenter_set_dynamic_css('educenter_th_content_radius', css);
		});
	});

	/********
	 * Header ( Margin, Padding, Radious ) Options
	*/
	wp.customize('educenter_header_margin_padding', function (value) {
		value.bind(function (to) {
			var value = JSON.parse(to);
			var css = '';
			// css += "#masthead-header .bottom-header{ border-radius: " + value.radius.desktop.top + "px " + value.radius.desktop.right + "px " + value.radius.desktop.bottom + "px " + value.radius.desktop.left + "px;}";
			// css += '@media screen and (max-width:768px){';
			// "#masthead-header .bottom-header{ border-radius: " + value.radius.tablet.top + "px " + value.radius.tablet.right + "px " + value.radius.tablet.bottom + "px " + value.radius.tablet.left + "px;}";
			// css += '}';
			// css += '@media screen and (max-width:480px){';
			// css += "#masthead-header .bottom-header{ border-radius: " + value.radius.mobile.top + "px " + value.radius.mobile.right + "px " + value.radius.mobile.bottom + "px " + value.radius.mobile.left + "px;}";
			// css += '}';

			css += "#masthead-header .bottom-header{margin-top:" + value.margin.desktop.top + "px; margin-right:" + value.margin.desktop.right + "px; margin-bottom:" + value.margin.desktop.bottom + "px; margin-left:" + value.margin.desktop.left + "px; }";
			css += '@media screen and (max-width:768px){';
			css += "#masthead-header .bottom-header{margin-top:" + value.margin.tablet.top + "px; margin-right:" + value.margin.tablet.right + "px; margin-bottom:" + value.margin.tablet.bottom + "px; margin-left:" + value.margin.tablet.left + "px; }";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += "#masthead-header .bottom-header{margin-top:" + value.margin.mobile.top + "px; margin-right:" + value.margin.mobile.right + "px; margin-bottom:" + value.margin.mobile.bottom + "px; margin-left:" + value.margin.mobile.left + "px; }";
			css += '}';

			css += "#masthead-header .bottom-header{padding-top:" + value.padding.desktop.top + "px; padding-right:" + value.padding.desktop.right + "px; padding-bottom:" + value.padding.desktop.bottom + "px; padding-left:" + value.padding.desktop.left + "px; }";
			css += '@media screen and (max-width:768px){';
			css += "#masthead-header .bottom-header{padding-top:" + value.padding.tablet.top + "px; padding-right:" + value.padding.tablet.right + "px; padding-bottom:" + value.padding.tablet.bottom + "px; padding-left:" + value.padding.tablet.left + "px; }";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += "#masthead-header .bottom-header{padding-top:" + value.padding.mobile.top + "px; padding-right:" + value.padding.mobile.right + "px; padding-bottom:" + value.padding.mobile.bottom + "px; padding-left:" + value.padding.mobile.left + "px; }";
			css += '}';

			educenter_set_dynamic_css('educenter_header_margin_padding', css);
		});
	});

	wp.customize('educenter_hamburger_color', function (value) {
		value.bind(function (to) {
			$('.header-nav-toggle div').css('background-color', to);
		})
	});



	/** Menu Item Settings */
	wp.customize('educenter_header_item_group', function (value) {
		value.bind(function (to) {
			var value = JSON.parse(to);
			var css = ".box-header-nav .main-menu .page_item a, .box-header-nav .main-menu>.menu-item>a, .headertwo .box-header-nav .main-menu .page_item a, .headertwo .box-header-nav .main-menu>.menu-item>a{ \
                color:" + value.color + "; \
                background: " + value.bg_color + "; \
            }";

			css += ".box-header-nav .main-menu .page_item a, .box-header-nav .main-menu>.menu-item>a, .headertwo .box-header-nav .main-menu .page_item a, .headertwo .box-header-nav .main-menu>.menu-item>a{ border-radius: " + value.radius.desktop.top + "px " + value.radius.desktop.right + "px " + value.radius.desktop.bottom + "px " + value.radius.desktop.left + "px;}";
			css += '@media screen and (max-width:768px){';
			".box-header-nav .main-menu .page_item a, .box-header-nav .main-menu>.menu-item>a, .headertwo .box-header-nav .main-menu .page_item a, .headertwo .box-header-nav .main-menu>.menu-item>a{ border-radius: " + value.radius.tablet.top + "px " + value.radius.tablet.right + "px " + value.radius.tablet.bottom + "px " + value.radius.tablet.left + "px;}";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += ".box-header-nav .main-menu .page_item a, .box-header-nav .main-menu>.menu-item>a, .headertwo .box-header-nav .main-menu .page_item a, .headertwo .box-header-nav .main-menu>.menu-item>a{ border-radius: " + value.radius.mobile.top + "px " + value.radius.mobile.right + "px " + value.radius.mobile.bottom + "px " + value.radius.mobile.left + "px;}";
			css += '}';

			css += ".box-header-nav .main-menu .page_item a, .box-header-nav .main-menu>.menu-item>a, .headertwo .box-header-nav .main-menu .page_item a, .headertwo .box-header-nav .main-menu>.menu-item>a{margin-top:" + value.margin.desktop.top + "px; margin-right:" + value.margin.desktop.right + "px; margin-bottom:" + value.margin.desktop.bottom + "px; margin-left:" + value.margin.desktop.left + "px; }";
			css += '@media screen and (max-width:768px){';
			css += ".box-header-nav .main-menu .page_item a, .box-header-nav .main-menu>.menu-item>a, .headertwo .box-header-nav .main-menu .page_item a, .headertwo .box-header-nav .main-menu>.menu-item>a{margin-top:" + value.margin.tablet.top + "px; margin-right:" + value.margin.tablet.right + "px; margin-bottom:" + value.margin.tablet.bottom + "px; margin-left:" + value.margin.tablet.left + "px; }";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += ".box-header-nav .main-menu .page_item a, .box-header-nav .main-menu>.menu-item>a, .headertwo .box-header-nav .main-menu .page_item a, .headertwo .box-header-nav .main-menu>.menu-item>a{margin-top:" + value.margin.mobile.top + "px; margin-right:" + value.margin.mobile.right + "px; margin-bottom:" + value.margin.mobile.bottom + "px; margin-left:" + value.margin.mobile.left + "px; }";
			css += '}';

			css += ".box-header-nav .main-menu .page_item a, .box-header-nav .main-menu>.menu-item>a, .headertwo .box-header-nav .main-menu .page_item a, .headertwo .box-header-nav .main-menu>.menu-item>a{padding-top:" + value.padding.desktop.top + "px; padding-right:" + value.padding.desktop.right + "px; padding-bottom:" + value.padding.desktop.bottom + "px; padding-left:" + value.padding.desktop.left + "px; }";
			css += '@media screen and (max-width:768px){';
			css += ".box-header-nav .main-menu .page_item a, .box-header-nav .main-menu>.menu-item>a, .headertwo .box-header-nav .main-menu .page_item a, .headertwo .box-header-nav .main-menu>.menu-item>a{padding-top:" + value.padding.tablet.top + "px; padding-right:" + value.padding.tablet.right + "px; padding-bottom:" + value.padding.tablet.bottom + "px; padding-left:" + value.padding.tablet.left + "px; }";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += ".box-header-nav .main-menu .page_item a, .box-header-nav .main-menu>.menu-item>a, .headertwo .box-header-nav .main-menu .page_item a, .headertwo .box-header-nav .main-menu>.menu-item>a{padding-top:" + value.padding.mobile.top + "px; padding-right:" + value.padding.mobile.right + "px; padding-bottom:" + value.padding.mobile.bottom + "px; padding-left:" + value.padding.mobile.left + "px; }";
			css += '}';

			educenter_set_dynamic_css('educenter_header_item_group', css);
		});
	});

	/** Sub Menu Item ( Child Menu ) Settings */
	wp.customize('educenter_header_sub_item_group', function (value) {
		value.bind(function (to) {
			var value = JSON.parse(to);

			var css = ".box-header-nav .main-menu .children, .box-header-nav .main-menu .sub-menu{ \
                background: " + value.bg_color + "; \
            }";

			css += ".box-header-nav .main-menu .children>.page_item>a, .box-header-nav .main-menu .sub-menu>.menu-item>a{ \
                color:" + value.color + ";\
            }";

			css += ".box-header-nav .main-menu .children>.page_item>a, .box-header-nav .main-menu .sub-menu>.menu-item>a{ border-radius: " + value.radius.desktop.top + "px " + value.radius.desktop.right + "px " + value.radius.desktop.bottom + "px " + value.radius.desktop.left + "px;}";
			css += '@media screen and (max-width:768px){';
			".box-header-nav .main-menu .children>.page_item>a, .box-header-nav .main-menu .sub-menu>.menu-item>a{ border-radius: " + value.radius.tablet.top + "px " + value.radius.tablet.right + "px " + value.radius.tablet.bottom + "px " + value.radius.tablet.left + "px;}";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += ".box-header-nav .main-menu .children>.page_item>a, .box-header-nav .main-menu .sub-menu>.menu-item>a{ border-radius: " + value.radius.mobile.top + "px " + value.radius.mobile.right + "px " + value.radius.mobile.bottom + "px " + value.radius.mobile.left + "px;}";
			css += '}';

			css += ".box-header-nav .main-menu .children>.page_item>a, .box-header-nav .main-menu .sub-menu>.menu-item>a{margin-top:" + value.margin.desktop.top + "px; margin-right:" + value.margin.desktop.right + "px; margin-bottom:" + value.margin.desktop.bottom + "px; margin-left:" + value.margin.desktop.left + "px; }";
			css += '@media screen and (max-width:768px){';
			css += ".box-header-nav .main-menu .children>.page_item>a, .box-header-nav .main-menu .sub-menu>.menu-item>a{margin-top:" + value.margin.tablet.top + "px; margin-right:" + value.margin.tablet.right + "px; margin-bottom:" + value.margin.tablet.bottom + "px; margin-left:" + value.margin.tablet.left + "px; }";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += ".box-header-nav .main-menu .children>.page_item>a, .box-header-nav .main-menu .sub-menu>.menu-item>a{margin-top:" + value.margin.mobile.top + "px; margin-right:" + value.margin.mobile.right + "px; margin-bottom:" + value.margin.mobile.bottom + "px; margin-left:" + value.margin.mobile.left + "px; }";
			css += '}';

			css += ".box-header-nav .main-menu .children>.page_item>a, .box-header-nav .main-menu .sub-menu>.menu-item>a{padding-top:" + value.padding.desktop.top + "px; padding-right:" + value.padding.desktop.right + "px; padding-bottom:" + value.padding.desktop.bottom + "px; padding-left:" + value.padding.desktop.left + "px; }";
			css += '@media screen and (max-width:768px){';
			css += ".box-header-nav .main-menu .children>.page_item>a, .box-header-nav .main-menu .sub-menu>.menu-item>a{padding-top:" + value.padding.tablet.top + "px; padding-right:" + value.padding.tablet.right + "px; padding-bottom:" + value.padding.tablet.bottom + "px; padding-left:" + value.padding.tablet.left + "px; }";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += ".box-header-nav .main-menu .children>.page_item>a, .box-header-nav .main-menu .sub-menu>.menu-item>a{padding-top:" + value.padding.mobile.top + "px; padding-right:" + value.padding.mobile.right + "px; padding-bottom:" + value.padding.mobile.bottom + "px; padding-left:" + value.padding.mobile.left + "px; }";
			css += '}';

			educenter_set_dynamic_css('educenter_header_sub_item_group', css);
		});
	});

	/** Menu Active Item Settings */
	wp.customize('educenter_header_nav_hover_group', function (value) {
		value.bind(function (to) {
			var value = JSON.parse(to);
			var css = ".box-header-nav .main-menu .page_item.current_page_item>a, .box-header-nav .main-menu .page_item:hover>a, .box-header-nav .main-menu .page_item.focus>a, .box-header-nav .main-menu>.menu-item.current-menu-item>a, .box-header-nav .main-menu>.menu-item:hover>a, .box-header-nav .main-menu>.menu-item.focus>a, .headertwo .box-header-nav .main-menu .page_item.current_page_item>a, .headertwo .box-header-nav .main-menu>.menu-item.current-menu-item>a, .headertwo .box-header-nav .main-menu .page_item:hover>a, .headertwo .box-header-nav .main-menu .page_item.focus>a, .headertwo .box-header-nav .main-menu>.menu-item:hover>a, .headertwo .box-header-nav .main-menu>.menu-item.focus>a{\
                color:" + value.nav_color + "; \
                background: " + value.nav_bg_color + " !important; \
            }";
			educenter_set_dynamic_css('educenter_header_nav_hover_group', css);
		});
	});


	/************
	 * Header Button 
	*/
	wp.customize('educenter_header_button_color', function (value) {
		value.bind(function (to) {
			var value = JSON.parse(to);
			var css = ".educenter-header-button{ \
                color:" + value.text + "; \
                background: " + value.background + "; \
                font-size:" + value[ 'font-size' ] + "px;\
                width:" + value.width + "px;\
            }";
			css += ".educenter-header-button{ border-radius: " + value.radius.desktop.top + "px " + value.radius.desktop.right + "px " + value.radius.desktop.bottom + "px " + value.radius.desktop.left + "px;}";
			css += '@media screen and (max-width:768px){';
			".educenter-header-button{ border-radius: " + value.radius.tablet.top + "px " + value.radius.tablet.right + "px " + value.radius.tablet.bottom + "px " + value.radius.tablet.left + "px;}";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += ".educenter-header-button{ border-radius: " + value.radius.mobile.top + "px " + value.radius.mobile.right + "px " + value.radius.mobile.bottom + "px " + value.radius.mobile.left + "px;}";
			css += '}';

			css += ".educenter-header-button{margin-top:" + value.margin.desktop.top + "px; margin-right:" + value.margin.desktop.right + "px; margin-bottom:" + value.margin.desktop.bottom + "px; margin-left:" + value.margin.desktop.left + "px; }";
			css += '@media screen and (max-width:768px){';
			css += ".educenter-header-button{margin-top:" + value.margin.tablet.top + "px; margin-right:" + value.margin.tablet.right + "px; margin-bottom:" + value.margin.tablet.bottom + "px; margin-left:" + value.margin.tablet.left + "px; }";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += ".educenter-header-button{margin-top:" + value.margin.mobile.top + "px; margin-right:" + value.margin.mobile.right + "px; margin-bottom:" + value.margin.mobile.bottom + "px; margin-left:" + value.margin.mobile.left + "px; }";
			css += '}';

			css += ".educenter-header-button{padding-top:" + value.padding.desktop.top + "px; padding-right:" + value.padding.desktop.right + "px; padding-bottom:" + value.padding.desktop.bottom + "px; padding-left:" + value.padding.desktop.left + "px; }";
			css += '@media screen and (max-width:768px){';
			css += ".educenter-header-button{padding-top:" + value.padding.tablet.top + "px; padding-right:" + value.padding.tablet.right + "px; padding-bottom:" + value.padding.tablet.bottom + "px; padding-left:" + value.padding.tablet.left + "px; }";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += ".educenter-header-button{padding-top:" + value.padding.mobile.top + "px; padding-right:" + value.padding.mobile.right + "px; padding-bottom:" + value.padding.mobile.bottom + "px; padding-left:" + value.padding.mobile.left + "px; }";
			css += '}';

			educenter_set_dynamic_css('educenter_header_button_color', css);
		});
	});

	wp.customize('educenter_header_button_hover_color', function (value) {
		value.bind(function (to) {
			var value = JSON.parse(to);
			var css = ".educenter-header-button:hover{ color:" + value.text + "; background: " + value.background + "; }";
			educenter_set_dynamic_css('educenter_header_button_hover_color', css);
		});
	});


	// Sections dynamic

	var settingIds = [ 'fservices', 'aboutus', 'cta', 'services', 'counter', 'courses', 'blog', 'team', 'gallery', 'testimonial' ];

	$.each(settingIds, function (i, settingId) {

		wp.customize('educenter_' + settingId + '_super_title', function (value) {
			value.bind(function (to) {
				var sectionClass = '#edu-' + settingId + '-section .ed-badge';
				if ($(sectionClass).length == 0) {
					wp.customize.preview.send('refresh');
				} else {
					$(sectionClass).text(to);
				}
			})
		});

		wp.customize('educenter_' + settingId + '_section_title', function (value) {
			value.bind(function (to) {
				var sectionClass = '#edu-' + settingId + '-section .section-header';
				if ($(sectionClass).length == 0) {
					wp.customize.preview.send('refresh');
				} else {
					$(sectionClass).text(to);
				}

			})
		});

		wp.customize('educenter_' + settingId + '_section_subtitle', function (value) {
			value.bind(function (to) {
				var sectionClass = '#edu-' + settingId + '-section';
				if ($(sectionClass).length == 0) {
					wp.customize.preview.send('refresh');
				} else {
					$(sectionClass + ' .section-tagline-text').text(to);
				}

			})
		});



		wp.customize('educenter_' + settingId + '_bg_type', function (value) {
			value.bind(function (to) {

				var sectionClass = '#edu-' + settingId + '-section';

				if (to === 'default' || to === 'color-bg' || to === 'gradient-bg' || to === 'image-bg') {
					$(sectionClass + ' iframe').css('display', 'none');
				}
				if ('color-bg' === to) {
					var color = wp.customize('educenter_' + settingId + '_bg_color').get();
					// $( sectionClass ).removeAttr( 'style' );
					var css = sectionClass + '{background-color:' + color + '}';
					educenter_set_dynamic_css('educenter_' + settingId + '_bg_color', css);

				}
			});
		});

		wp.customize('educenter_' + settingId + '_bg_color', function (value) {
			value.bind(function (to) {
				var sectionClass = '#edu-' + settingId + '-section';
				var css = sectionClass + '{background-color:' + to + '}';
				educenter_set_dynamic_css('educenter_' + settingId + '_bg_color', css);
			});
		});


		wp.customize('educenter_' + settingId + '_super_title_color', function (value) {
			value.bind(function (to) {
				var sectionClass = '#edu-' + settingId + '-section';
				var css = sectionClass + ' .ed-badge{background-color:' + to + '}';

				css += sectionClass + ' .ed-badge:after{background-color:' + to + '}';


				educenter_set_dynamic_css('educenter_' + settingId + '_super_title_color', css);
			});
		});

		wp.customize('educenter_' + settingId + '_title_color', function (value) {
			value.bind(function (to) {
				var sectionClass = '#edu-' + settingId + '-section';
				var css = sectionClass + ' .section-header{color:' + to + '}';
				educenter_set_dynamic_css('educenter_' + settingId + '_title_color', css);
			});
		});

		wp.customize('educenter_' + settingId + '_text_color', function (value) {
			value.bind(function (to) {

				var sectionClass = '#edu-' + settingId + '-section';
				var css = sectionClass + ' .section-tagline-text{color:' + to + '}';

				educenter_set_dynamic_css('educenter_' + settingId + '_text_color', css);
			});
		});


		wp.customize('educenter_' + settingId + '_link_color', function (value) {
			value.bind(function (to) {
				var sectionClass = '#edu-' + settingId + '-section';
				var css = sectionClass + ' a,' + sectionClass + ' a > i{color:' + to + '}';
				educenter_set_dynamic_css('educenter_' + settingId + '_link_color', css);
			});
		});

		wp.customize('educenter_' + settingId + '_link_hov_color', function (value) {
			value.bind(function (to) {
				var sectionClass = '#edu-' + settingId + '-section';
				var css = sectionClass + ' a:hover, ' + sectionClass + ' a:hover > i{color:' + to + '}';
				educenter_set_dynamic_css('educenter_' + settingId + '_link_hov_color', css);
			});
		});



		wp.customize('educenter_' + settingId + '_padding', function (value) {
			value.bind(function (to) {
				var selector = '#edu-' + settingId + '-section';
				var section_padding = JSON.parse(to);
				var css = selector + '{padding-top:' + section_padding.desktop.top + 'px; padding-right:' + section_padding.desktop.right + 'px; padding-bottom:' + section_padding.desktop.bottom + 'px; padding-left:' + section_padding.desktop.left + 'px}';
				educenter_set_dynamic_css('educenter_' + settingId + 'padding_desktop', css);

				if (($(window).width() >= 700) && ($(window).width() < 992)) {
					var css = '@media screen and (max-width:992px){';
					css += selector + '{ padding-top:' + section_padding.tablet.top + 'px; padding-right:' + section_padding.tablet.right + 'px; padding-bottom:' + section_padding.tablet.bottom + 'px; padding-left:' + section_padding.tablet.left + 'px}';
					css += '}';
					educenter_set_dynamic_css('educenter_' + settingId + 'padding_tablet', css);
				}
				if ($(window).width() < 500) {
					var css = '@media screen and (max-width:500px){';
					css += selector + '{ padding-top:' + section_padding.mobile.top + 'px; padding-right:' + section_padding.mobile.right + 'px; padding-bottom:' + section_padding.mobile.bottom + 'px; padding-left:' + section_padding.mobile.left + 'px}';
					css += '}';
					educenter_set_dynamic_css('educenter_' + settingId + 'padding_mobile', css);
				}

			});
		});


		wp.customize('educenter_' + settingId + '_ts_color', function (value) {
			value.bind(function (to) {
				var sectionClass = '#edu-' + settingId + '-section';
				var css = sectionClass + ' .top-section-seperator svg{ fill:' + to + '}';
				educenter_set_dynamic_css('educenter_' + settingId + '_ts_color', css);
			});
		});

		wp.customize('educenter_' + settingId + '_bs_color', function (value) {
			value.bind(function (to) {
				var sectionClass = '#edu-' + settingId + '-section';
				var css = sectionClass + ' .bottom-section-seperator svg{ fill:' + to + '}';
				educenter_set_dynamic_css('educenter_' + settingId + '_bs_color', css);
			});
		});

		wp.customize('educenter_' + settingId + '_ts_height_desktop', function (value) {
			value.bind(function (to) {
				var sectionClass = '#edu-' + settingId + '-section';
				var desktop = to;
				var tablet = wp.customize('educenter_' + settingId + '_ts_height_tablet').get();
				var mobile = wp.customize('educenter_' + settingId + '_ts_height_mobile').get();

				var css = sectionClass + ' .section-seperator.top-section-seperator{height:' + desktop + 'px}';

				if (tablet) {
					css += '@media screen and (max-width:768px){';
					css += sectionClass + ' .section-seperator.top-section-seperator{height:' + tablet + 'px}';
					css += '}';
				}

				if (mobile) {
					css += '@media screen and (max-width:480px){';
					css += sectionClass + ' .section-seperator.top-section-seperator{height:' + mobile + 'px}';
					css += '}';
				}

				educenter_set_dynamic_css('educenter_' + settingId + '_ts_height', css);
			});
		});

		wp.customize('educenter_' + settingId + '_ts_height_tablet', function (value) {
			value.bind(function (to) {
				var sectionClass = '#edu-' + settingId + '-section';
				var desktop = wp.customize('educenter_' + settingId + '_ts_height_desktop').get();
				var tablet = to;
				var mobile = wp.customize('educenter_' + settingId + '_ts_height_mobile').get();

				var css = sectionClass + ' .section-seperator.top-section-seperator{height:' + desktop + 'px}';

				if (tablet) {
					css += '@media screen and (max-width:768px){';
					css += sectionClass + ' .section-seperator.top-section-seperator{height:' + tablet + 'px}';
					css += '}';
				}

				if (mobile) {
					css += '@media screen and (max-width:480px){';
					css += sectionClass + ' .section-seperator.top-section-seperator{height:' + mobile + 'px}';
					css += '}';
				}

				educenter_set_dynamic_css('educenter_' + settingId + '_ts_height', css);
			});
		});

		wp.customize('educenter_' + settingId + '_ts_height_mobile', function (value) {
			value.bind(function (to) {
				var sectionClass = '#edu-' + settingId + '-section';
				var desktop = wp.customize('educenter_' + settingId + '_ts_height_desktop').get();
				var tablet = wp.customize('educenter_' + settingId + '_ts_height_tablet').get();
				var mobile = to;

				var css = sectionClass + ' .section-seperator.top-section-seperator{height:' + desktop + 'px}';

				if (tablet) {
					css += '@media screen and (max-width:768px){';
					css += sectionClass + ' .section-seperator.top-section-seperator{height:' + tablet + 'px}';
					css += '}';
				}

				if (mobile) {
					css += '@media screen and (max-width:480px){';
					css += sectionClass + ' .section-seperator.top-section-seperator{height:' + mobile + 'px}';
					css += '}';
				}

				educenter_set_dynamic_css('educenter_' + settingId + '_ts_height', css);
			});
		});

		wp.customize('educenter_' + settingId + '_bs_height_desktop', function (value) {
			value.bind(function (to) {
				var sectionClass = '#edu-' + settingId + '-section';
				var desktop = to;
				var tablet = wp.customize('educenter_' + settingId + '_bs_height_tablet').get();
				var mobile = wp.customize('educenter_' + settingId + '_bs_height_mobile').get();

				var css = sectionClass + ' .section-seperator.bottom-section-seperator{height:' + desktop + 'px}';

				if (tablet) {
					css += '@media screen and (max-width:768px){';
					css += sectionClass + ' .section-seperator.bottom-section-seperator{height:' + tablet + 'px}';
					css += '}';
				}

				if (mobile) {
					css += '@media screen and (max-width:480px){';
					css += sectionClass + ' .section-seperator.bottom-section-seperator{height:' + mobile + 'px}';
					css += '}';
				}

				educenter_set_dynamic_css('educenter_' + settingId + '_bs_height', css);
			});
		});

		wp.customize('educenter_' + settingId + '_bs_height_tablet', function (value) {
			value.bind(function (to) {
				var sectionClass = '#edu-' + settingId + '-section';
				var desktop = wp.customize('educenter_' + settingId + '_bs_height_desktop').get();
				var tablet = to;
				var mobile = wp.customize('educenter_' + settingId + '_bs_height_mobile').get();

				var css = sectionClass + ' .section-seperator.bottom-section-seperator{height:' + desktop + 'px}';

				if (tablet) {
					css += '@media screen and (max-width:768px){';
					css += sectionClass + ' .section-seperator.bottom-section-seperator{height:' + tablet + 'px}';
					css += '}';
				}

				if (mobile) {
					css += '@media screen and (max-width:480px){';
					css += sectionClass + ' .section-seperator.bottom-section-seperator{height:' + mobile + 'px}';
					css += '}';
				}

				educenter_set_dynamic_css('educenter_' + settingId + '_bs_height', css);
			});
		});

		wp.customize('educenter_' + settingId + '_bs_height_mobile', function (value) {
			value.bind(function (to) {
				var sectionClass = '#edu-' + settingId + '-section';
				var desktop = wp.customize('educenter_' + settingId + '_bs_height_desktop').get();
				var tablet = wp.customize('educenter_' + settingId + '_bs_height_tablet').get();
				var mobile = to;

				var css = sectionClass + ' .section-seperator.bottom-section-seperator{height:' + desktop + 'px}';

				if (tablet) {
					css += '@media screen and (max-width:768px){';
					css += sectionClass + ' .section-seperator.bottom-section-seperator{height:' + tablet + 'px}';
					css += '}';
				}

				if (mobile) {
					css += '@media screen and (max-width:480px){';
					css += sectionClass + ' .section-seperator.bottom-section-seperator{height:' + mobile + 'px}';
					css += '}';
				}

				educenter_set_dynamic_css('educenter_' + settingId + '_bs_height', css);
			});
		});


	});

	/** header footer */
	var settingIds = [ 'header', 'footer' ];
	$.each(settingIds, function (i, settingId) {
		var sectionClass = '';
		if (settingId == 'header') {
			sectionClass = "#masthead-header .bottom-header";
		}
		wp.customize('educenter_' + settingId + '_bg_color', function (value) {
			value.bind(function (to) {
				var css = sectionClass + '{background-color:' + to + '}';
				educenter_set_dynamic_css('educenter_' + settingId + '_bg_color', css);
			});
		});



		wp.customize('educenter_' + settingId + '_background_image', function (value) {
			value.bind(function (to) {
				var css = sectionClass + '{background-image:url(' + to + ')}';
				educenter_set_dynamic_css('educenter_' + settingId + '_background_image', css);
			});
		});

		wp.customize('educenter_' + settingId + '_background_image_repeat', function (value) {
			value.bind(function (to) {
				var css = sectionClass + '{background-repeat:' + to + '}';
				educenter_set_dynamic_css('educenter_' + settingId + '_background_image_repeat', css);
			});
		});

		wp.customize('educenter_' + settingId + '_background_image_size', function (value) {
			value.bind(function (to) {
				var css = sectionClass + '{background-size:' + to + '}';
				educenter_set_dynamic_css('educenter_' + settingId + '_background_image_size', css);
			});
		});

		wp.customize('educenter_' + settingId + '_background_image_position', function (value) {
			value.bind(function (to) {
				to = to.replace('-', ' ');
				var css = sectionClass + '{background-position:' + to + '}';
				educenter_set_dynamic_css('educenter_' + settingId + '_background_image_position', css);
			});
		});

		wp.customize('educenter_' + settingId + '_background_image_attach', function (value) {
			value.bind(function (to) {
				var css = sectionClass + '{background-attachment:' + to + '}';
				educenter_set_dynamic_css('educenter_' + settingId + '_background_image_attach', css);
			});
		});



		wp.customize('educenter_' + settingId + '_overlay_color', function (value) {
			value.bind(function (to) {
				var css = sectionClass + '::before{background-color:' + to + '}';
				educenter_set_dynamic_css('educenter_' + settingId + '_overlay_color', css);
			});
		});
	});

	/** Services Block Grid Settings */
	wp.customize('educenter_services_block', function (value) {
		value.bind(function (to) {
			var value = JSON.parse(to);
			var css = '';

			css += ".ed-services.layout-2 .ed-col-holder .col{ border-radius: " + value.radius.desktop.top + "px " + value.radius.desktop.right + "px " + value.radius.desktop.bottom + "px " + value.radius.desktop.left + "px;}";
			css += '@media screen and (max-width:768px){';
			".ed-services.layout-2 .ed-col-holder .col{ border-radius: " + value.radius.tablet.top + "px " + value.radius.tablet.right + "px " + value.radius.tablet.bottom + "px " + value.radius.tablet.left + "px;}";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += ".ed-services.layout-2 .ed-col-holder .col{ border-radius: " + value.radius.mobile.top + "px " + value.radius.mobile.right + "px " + value.radius.mobile.bottom + "px " + value.radius.mobile.left + "px;}";
			css += '}';

			css += ".ed-services.layout-2 .ed-col-holder .col{margin-top:" + value.margin.desktop.top + "px; margin-right:" + value.margin.desktop.right + "px; margin-bottom:" + value.margin.desktop.bottom + "px; margin-left:" + value.margin.desktop.left + "px; }";
			css += '@media screen and (max-width:768px){';
			css += ".ed-services.layout-2 .ed-col-holder .col{margin-top:" + value.margin.tablet.top + "px; margin-right:" + value.margin.tablet.right + "px; margin-bottom:" + value.margin.tablet.bottom + "px; margin-left:" + value.margin.tablet.left + "px; }";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += ".ed-services.layout-2 .ed-col-holder .col{margin-top:" + value.margin.mobile.top + "px; margin-right:" + value.margin.mobile.right + "px; margin-bottom:" + value.margin.mobile.bottom + "px; margin-left:" + value.margin.mobile.left + "px; }";
			css += '}';

			css += ".ed-services.layout-2 .ed-col-holder .col{padding-top:" + value.padding.desktop.top + "px; padding-right:" + value.padding.desktop.right + "px; padding-bottom:" + value.padding.desktop.bottom + "px; padding-left:" + value.padding.desktop.left + "px; }";
			css += '@media screen and (max-width:768px){';
			css += ".ed-services.layout-2 .ed-col-holder .col{padding-top:" + value.padding.tablet.top + "px; padding-right:" + value.padding.tablet.right + "px; padding-bottom:" + value.padding.tablet.bottom + "px; padding-left:" + value.padding.tablet.left + "px; }";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += ".ed-services.layout-2 .ed-col-holder .col{padding-top:" + value.padding.mobile.top + "px; padding-right:" + value.padding.mobile.right + "px; padding-bottom:" + value.padding.mobile.bottom + "px; padding-left:" + value.padding.mobile.left + "px; }";
			css += '}';

			educenter_set_dynamic_css('educenter_services_block', css);
		});
	});

	/** Services Block Item Icon Settings */
	wp.customize('educenter_services_icon_style', function (value) {
		value.bind(function (to) {
			var value = JSON.parse(to);
			var css = ".ed-services.layout-2 .ed-service-left .ed-col-holder .col .icon-holder{ \
                background-color: " + value.bg_color + "; \
                color:" + value.color + "; \
                border:solid " + value.borderwidth + "px " + value.bordercolor + "; \
            }";

			css += ".ed-services.layout-2 .ed-service-left .ed-col-holder .col .icon-holder{ border-radius: " + value.radius.desktop.top + "px " + value.radius.desktop.right + "px " + value.radius.desktop.bottom + "px " + value.radius.desktop.left + "px;}";
			css += '@media screen and (max-width:768px){';
			".ed-services.layout-2 .ed-service-left .ed-col-holder .col .icon-holder{ border-radius: " + value.radius.tablet.top + "px " + value.radius.tablet.right + "px " + value.radius.tablet.bottom + "px " + value.radius.tablet.left + "px;}";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += ".ed-services.layout-2 .ed-service-left .ed-col-holder .col .icon-holder{ border-radius: " + value.radius.mobile.top + "px " + value.radius.mobile.right + "px " + value.radius.mobile.bottom + "px " + value.radius.mobile.left + "px;}";
			css += '}';

			css += ".ed-services.layout-2 .ed-service-left .ed-col-holder .col .icon-holder{padding-top:" + value.padding.desktop.top + "px; padding-right:" + value.padding.desktop.right + "px; padding-bottom:" + value.padding.desktop.bottom + "px; padding-left:" + value.padding.desktop.left + "px; }";
			css += '@media screen and (max-width:768px){';
			css += ".ed-services.layout-2 .ed-service-left .ed-col-holder .col .icon-holder{padding-top:" + value.padding.tablet.top + "px; padding-right:" + value.padding.tablet.right + "px; padding-bottom:" + value.padding.tablet.bottom + "px; padding-left:" + value.padding.tablet.left + "px; }";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += ".ed-services.layout-2 .ed-service-left .ed-col-holder .col .icon-holder{padding-top:" + value.padding.mobile.top + "px; padding-right:" + value.padding.mobile.right + "px; padding-bottom:" + value.padding.mobile.bottom + "px; padding-left:" + value.padding.mobile.left + "px; }";
			css += '}';

			educenter_set_dynamic_css('educenter_services_icon_style', css);
		});
	});

	/** Our Course Block Settings */
	wp.customize('educenter_course_block', function (value) {
		value.bind(function (to) {
			var value = JSON.parse(to);
			var css = '';

			css += ".ed-courses.layout-2 .ed-col-wrap .ed-col-three{ border-radius: " + value.radius.desktop.top + "px " + value.radius.desktop.right + "px " + value.radius.desktop.bottom + "px " + value.radius.desktop.left + "px;}";
			css += '@media screen and (max-width:768px){';
			".ed-courses.layout-2 .ed-col-wrap .ed-col-three{ border-radius: " + value.radius.tablet.top + "px " + value.radius.tablet.right + "px " + value.radius.tablet.bottom + "px " + value.radius.tablet.left + "px;}";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += ".ed-courses.layout-2 .ed-col-wrap .ed-col-three{ border-radius: " + value.radius.mobile.top + "px " + value.radius.mobile.right + "px " + value.radius.mobile.bottom + "px " + value.radius.mobile.left + "px;}";
			css += '}';

			css += ".ed-courses.layout-2 .ed-col-wrap .ed-col-three{margin-top:" + value.margin.desktop.top + "px; margin-right:" + value.margin.desktop.right + "px; margin-bottom:" + value.margin.desktop.bottom + "px; margin-left:" + value.margin.desktop.left + "px; }";
			css += '@media screen and (max-width:768px){';
			css += ".ed-courses.layout-2 .ed-col-wrap .ed-col-three{margin-top:" + value.margin.tablet.top + "px; margin-right:" + value.margin.tablet.right + "px; margin-bottom:" + value.margin.tablet.bottom + "px; margin-left:" + value.margin.tablet.left + "px; }";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += ".ed-courses.layout-2 .ed-col-wrap .ed-col-three{margin-top:" + value.margin.mobile.top + "px; margin-right:" + value.margin.mobile.right + "px; margin-bottom:" + value.margin.mobile.bottom + "px; margin-left:" + value.margin.mobile.left + "px; }";
			css += '}';

			css += ".ed-courses.layout-2 .ed-col-wrap .ed-col-three{padding-top:" + value.padding.desktop.top + "px; padding-right:" + value.padding.desktop.right + "px; padding-bottom:" + value.padding.desktop.bottom + "px; padding-left:" + value.padding.desktop.left + "px; }";
			css += '@media screen and (max-width:768px){';
			css += ".ed-courses.layout-2 .ed-col-wrap .ed-col-three{padding-top:" + value.padding.tablet.top + "px; padding-right:" + value.padding.tablet.right + "px; padding-bottom:" + value.padding.tablet.bottom + "px; padding-left:" + value.padding.tablet.left + "px; }";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += ".ed-courses.layout-2 .ed-col-wrap .ed-col-three{padding-top:" + value.padding.mobile.top + "px; padding-right:" + value.padding.mobile.right + "px; padding-bottom:" + value.padding.mobile.bottom + "px; padding-left:" + value.padding.mobile.left + "px; }";
			css += '}';

			educenter_set_dynamic_css('educenter_course_block', css);
		});
	});

	/***** Call To Action Image Settings */
	wp.customize('educenter_calltoaction_image_style', function (value) {
		value.bind(function (to) {
			var value = JSON.parse(to);
			var css = "#edu-cta-section .cat-image-wrap img{ \
                background-color:" + value.bg_color + "px; \
                height:" + value.height + "px; \
                position:relative; \
                z-index:9; \
            }";

			css += "#edu-cta-section .cat-image-wrap img{ border-radius: " + value.radius.desktop.top + "px " + value.radius.desktop.right + "px " + value.radius.desktop.bottom + "px " + value.radius.desktop.left + "px;}";
			css += '@media screen and (max-width:768px){';
			"#edu-cta-section .cat-image-wrap img{ border-radius: " + value.radius.tablet.top + "px " + value.radius.tablet.right + "px " + value.radius.tablet.bottom + "px " + value.radius.tablet.left + "px;}";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += "#edu-cta-section .cat-image-wrap img{ border-radius: " + value.radius.mobile.top + "px " + value.radius.mobile.right + "px " + value.radius.mobile.bottom + "px " + value.radius.mobile.left + "px;}";
			css += '}';

			css += "#edu-cta-section .cat-image-wrap img{margin-top:" + value.margin.desktop.top + "px; margin-right:" + value.margin.desktop.right + "px; margin-bottom:" + value.margin.desktop.bottom + "px; margin-left:" + value.margin.desktop.left + "px; }";
			css += '@media screen and (max-width:768px){';
			css += "#edu-cta-section .cat-image-wrap img{margin-top:" + value.margin.tablet.top + "px; margin-right:" + value.margin.tablet.right + "px; margin-bottom:" + value.margin.tablet.bottom + "px; margin-left:" + value.margin.tablet.left + "px; }";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += "#edu-cta-section .cat-image-wrap img{margin-top:" + value.margin.mobile.top + "px; margin-right:" + value.margin.mobile.right + "px; margin-bottom:" + value.margin.mobile.bottom + "px; margin-left:" + value.margin.mobile.left + "px; }";
			css += '}';

			css += "#edu-cta-section .cat-image-wrap img{padding-top:" + value.padding.desktop.top + "px; padding-right:" + value.padding.desktop.right + "px; padding-bottom:" + value.padding.desktop.bottom + "px; padding-left:" + value.padding.desktop.left + "px; }";
			css += '@media screen and (max-width:768px){';
			css += "#edu-cta-section .cat-image-wrap img{padding-top:" + value.padding.tablet.top + "px; padding-right:" + value.padding.tablet.right + "px; padding-bottom:" + value.padding.tablet.bottom + "px; padding-left:" + value.padding.tablet.left + "px; }";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += "#edu-cta-section .cat-image-wrap img{padding-top:" + value.padding.mobile.top + "px; padding-right:" + value.padding.mobile.right + "px; padding-bottom:" + value.padding.mobile.bottom + "px; padding-left:" + value.padding.mobile.left + "px; }";
			css += '}';

			educenter_set_dynamic_css('educenter_calltoaction_image_style', css);
		});
	});

	/********
	 * Counter Icon 
	*/
	wp.customize('educenter_counter_group_style', function (value) {
		value.bind(function (to) {
			var value = JSON.parse(to);
			var css = ".educenter_counter{ \
                background-color: " + value.bg_color + "; \
                color: " + value.color + "; \
                border:" + value.borderwidth + "px solid " + value.bordercolor + "; \
            }";

			css += ".educenter_counter{ border-radius: " + value.radius.desktop.top + "px " + value.radius.desktop.right + "px " + value.radius.desktop.bottom + "px " + value.radius.desktop.left + "px;}";
			css += '@media screen and (max-width:768px){';
			".educenter_counter{ border-radius: " + value.radius.tablet.top + "px " + value.radius.tablet.right + "px " + value.radius.tablet.bottom + "px " + value.radius.tablet.left + "px;}";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += ".educenter_counter{ border-radius: " + value.radius.mobile.top + "px " + value.radius.mobile.right + "px " + value.radius.mobile.bottom + "px " + value.radius.mobile.left + "px;}";
			css += '}';

			css += ".educenter_counter{padding-top:" + value.padding.desktop.top + "px; padding-right:" + value.padding.desktop.right + "px; padding-bottom:" + value.padding.desktop.bottom + "px; padding-left:" + value.padding.desktop.left + "px; }";
			css += '@media screen and (max-width:768px){';
			css += ".educenter_counter{padding-top:" + value.padding.tablet.top + "px; padding-right:" + value.padding.tablet.right + "px; padding-bottom:" + value.padding.tablet.bottom + "px; padding-left:" + value.padding.tablet.left + "px; }";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += ".educenter_counter{padding-top:" + value.padding.mobile.top + "px; padding-right:" + value.padding.mobile.right + "px; padding-bottom:" + value.padding.mobile.bottom + "px; padding-left:" + value.padding.mobile.left + "px; }";
			css += '}';

			educenter_set_dynamic_css('educenter_counter_group_style', css);
		});
	});

	wp.customize('educenter_counter_icon_style', function (value) {
		value.bind(function (to) {
			var value = JSON.parse(to);
			var css = ".educenter_counter .educenter_counter-icon{ \
                background-color: " + value.bg_color + "; \
                color: " + value.color + "; \
                border:" + value.borderwidth + "px solid " + value.bordercolor + "; \
            }";

			css += ".educenter_counter .educenter_counter-icon{ border-radius: " + value.radius.desktop.top + "px " + value.radius.desktop.right + "px " + value.radius.desktop.bottom + "px " + value.radius.desktop.left + "px;}";
			css += '@media screen and (max-width:768px){';
			".educenter_counter .educenter_counter-icon{ border-radius: " + value.radius.tablet.top + "px " + value.radius.tablet.right + "px " + value.radius.tablet.bottom + "px " + value.radius.tablet.left + "px;}";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += ".educenter_counter .educenter_counter-icon{ border-radius: " + value.radius.mobile.top + "px " + value.radius.mobile.right + "px " + value.radius.mobile.bottom + "px " + value.radius.mobile.left + "px;}";
			css += '}';

			css += ".educenter_counter .educenter_counter-icon{padding-top:" + value.padding.desktop.top + "px; padding-right:" + value.padding.desktop.right + "px; padding-bottom:" + value.padding.desktop.bottom + "px; padding-left:" + value.padding.desktop.left + "px; }";
			css += '@media screen and (max-width:768px){';
			css += ".educenter_counter .educenter_counter-icon{padding-top:" + value.padding.tablet.top + "px; padding-right:" + value.padding.tablet.right + "px; padding-bottom:" + value.padding.tablet.bottom + "px; padding-left:" + value.padding.tablet.left + "px; }";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += ".educenter_counter .educenter_counter-icon{padding-top:" + value.padding.mobile.top + "px; padding-right:" + value.padding.mobile.right + "px; padding-bottom:" + value.padding.mobile.bottom + "px; padding-left:" + value.padding.mobile.left + "px; }";
			css += '}';

			educenter_set_dynamic_css('educenter_counter_icon_style', css);
		});
	});

	/*****
	 * Our Team Member
	*/
	wp.customize('educenter_team_style', function (value) {
		value.bind(function (to) {
			$('.team-section').removeClass('style1 style2 style3').addClass(to);
		})
	});

	/***** Team Block Settings */
	wp.customize('educenter_team_grid_style', function (value) {
		value.bind(function (to) {
			var value = JSON.parse(to);
			var css = ".ed-team-member .ed-team-col{ \
                background-color: " + value.bg_color + "; \
                border:" + value.borderwidth + "px solid " + value.bordercolor + "; \
            }";

			css += ".ed-team-member .ed-team-col{ border-radius: " + value.radius.desktop.top + "px " + value.radius.desktop.right + "px " + value.radius.desktop.bottom + "px " + value.radius.desktop.left + "px;}";
			css += '@media screen and (max-width:768px){';
			".ed-team-member .ed-team-col{ border-radius: " + value.radius.tablet.top + "px " + value.radius.tablet.right + "px " + value.radius.tablet.bottom + "px " + value.radius.tablet.left + "px;}";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += ".ed-team-member .ed-team-col{ border-radius: " + value.radius.mobile.top + "px " + value.radius.mobile.right + "px " + value.radius.mobile.bottom + "px " + value.radius.mobile.left + "px;}";
			css += '}';

			css += ".ed-team-member .ed-team-col{margin-top:" + value.margin.desktop.top + "px; margin-right:" + value.margin.desktop.right + "px; margin-bottom:" + value.margin.desktop.bottom + "px; margin-left:" + value.margin.desktop.left + "px; }";
			css += '@media screen and (max-width:768px){';
			css += ".ed-team-member .ed-team-col{margin-top:" + value.margin.tablet.top + "px; margin-right:" + value.margin.tablet.right + "px; margin-bottom:" + value.margin.tablet.bottom + "px; margin-left:" + value.margin.tablet.left + "px; }";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += ".ed-team-member .ed-team-col{margin-top:" + value.margin.mobile.top + "px; margin-right:" + value.margin.mobile.right + "px; margin-bottom:" + value.margin.mobile.bottom + "px; margin-left:" + value.margin.mobile.left + "px; }";
			css += '}';

			css += ".ed-team-member .ed-team-col{padding-top:" + value.padding.desktop.top + "px; padding-right:" + value.padding.desktop.right + "px; padding-bottom:" + value.padding.desktop.bottom + "px; padding-left:" + value.padding.desktop.left + "px; }";
			css += '@media screen and (max-width:768px){';
			css += ".ed-team-member .ed-team-col{padding-top:" + value.padding.tablet.top + "px; padding-right:" + value.padding.tablet.right + "px; padding-bottom:" + value.padding.tablet.bottom + "px; padding-left:" + value.padding.tablet.left + "px; }";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += ".ed-team-member .ed-team-col{padding-top:" + value.padding.mobile.top + "px; padding-right:" + value.padding.mobile.right + "px; padding-bottom:" + value.padding.mobile.bottom + "px; padding-left:" + value.padding.mobile.left + "px; }";
			css += '}';

			educenter_set_dynamic_css('educenter_team_grid_style', css);
		});
	});

	/***** Team Block Items Settings */
	wp.customize('educenter_team_image_style', function (value) {
		value.bind(function (to) {
			var value = JSON.parse(to);
			var css = ".ed-team-member .ed-team-col .ed-inner-wrap .ed-img img{ \
                background-color: " + value.bg_color + "; \
                height:" + value.height + "px; \
                width:" + value.width + "px; \
                margin-top:" + value.margintop + "px; \
            }";

			css += ".ed-team-member .ed-team-col .ed-inner-wrap .ed-img img{ border-radius: " + value.radius.desktop.top + "px " + value.radius.desktop.right + "px " + value.radius.desktop.bottom + "px " + value.radius.desktop.left + "px;}";
			css += '@media screen and (max-width:768px){';
			".ed-team-member .ed-team-col .ed-inner-wrap .ed-img img{ border-radius: " + value.radius.tablet.top + "px " + value.radius.tablet.right + "px " + value.radius.tablet.bottom + "px " + value.radius.tablet.left + "px;}";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += ".ed-team-member .ed-team-col .ed-inner-wrap .ed-img img{ border-radius: " + value.radius.mobile.top + "px " + value.radius.mobile.right + "px " + value.radius.mobile.bottom + "px " + value.radius.mobile.left + "px;}";
			css += '}';

			css += ".ed-team-member .ed-team-col .ed-inner-wrap .ed-img img{padding-top:" + value.padding.desktop.top + "px; padding-right:" + value.padding.desktop.right + "px; padding-bottom:" + value.padding.desktop.bottom + "px; padding-left:" + value.padding.desktop.left + "px; }";
			css += '@media screen and (max-width:768px){';
			css += ".ed-team-member .ed-team-col .ed-inner-wrap .ed-img img{padding-top:" + value.padding.tablet.top + "px; padding-right:" + value.padding.tablet.right + "px; padding-bottom:" + value.padding.tablet.bottom + "px; padding-left:" + value.padding.tablet.left + "px; }";
			css += '}';
			css += '@media screen and (max-width:480px){';
			css += ".ed-team-member .ed-team-col .ed-inner-wrap .ed-img img{padding-top:" + value.padding.mobile.top + "px; padding-right:" + value.padding.mobile.right + "px; padding-bottom:" + value.padding.mobile.bottom + "px; padding-left:" + value.padding.mobile.left + "px; }";
			css += '}';

			educenter_set_dynamic_css('educenter_team_image_style', css);
		});
	});

	jQuery(document).ready(function () {
		wp.customize.selectiveRefresh.bind('partial-content-rendered', function (placement) {
			var brtl = false;
			if ($("body").hasClass('rtl')) {
				brtl = true;
			}
			var p_p_id = placement.partial.id;
			if (p_p_id === 'educenter_slider_selective_refresh') {

				/**
				 * Main Banner Slider
				*/
				$(".slider-layout-2 .ed-slide").lightSlider({
					item: 1,
					slideMove: 1,
					slideMargin: 0,
					loop: true,
					auto: true,
					pager: false,
					mode: 'fade',
					useCSS: true,
					cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
					easing: 'linear', //'for jquery animation',////
					controls: true,
					slideEndAnimation: true,
					speed: 2000,
					pause: 5000,
					enableDrag: false,
					rtl: brtl,
				});
			}

			if (p_p_id == 'educenter_homepage_service_refresh') {

				$(".ed-service-slide").lightSlider({
					item: $('.ed-service-slide').data('items') || 3,
					autoWidth: false,
					slideMove: 1,
					slideMargin: 20,
					loop: true,
					controls: false,
					adaptiveHeight: true,
					pager: true,
					rtl: brtl,
					onSliderLoad: function () {
						$('.ed-service-slide').removeClass('cS-hidden');
					},
					responsive: [ {
						breakpoint: 1100,
						settings: {
							item: 2,
							slideMove: 1,
							slideMargin: 20,
						}
					},
					{
						breakpoint: 640,
						settings: {
							item: 1,
							slideMove: 1,
							slideMargin: 0,
						}
					}
					]
				});
			}

			if (p_p_id == 'educenter_team_refresh') {
				/**
				 * Our Team Member
				*/
				$(".ed-team-wrapper.slider").lightSlider({
					item: $(".ed-team-wrapper").data('items') || 3,
					autoWidth: false,
					slideMove: 1,
					slideMargin: 10,
					loop: true,
					controls: false,
					adaptiveHeight: false,
					pager: true,
					rtl: brtl,
					onSliderLoad: function () {
						$('.ed-team-wrapper').removeClass('cS-hidden');
					},
					responsive: [ {
						breakpoint: 870,
						settings: {
							item: 2,
							slideMove: 1,
							slideMargin: 10,
						}
					},
					{
						breakpoint: 570,
						settings: {
							item: 1,
							slideMove: 1,
							slideMargin: 2,
						}
					}
					]
				});
			}

			if (p_p_id == 'educenter_testimonial_area_refresh') {
				/**
				 * Our Testimonials
				*/
				$(".ed-testimonial-wrap").lightSlider({
					item: $(".ed-testimonial-wrap").data('items') || 3,
					autoWidth: false,
					slideMove: 1,
					slideMargin: 30,
					loop: true,
					controls: false,
					adaptiveHeight: false,
					pager: true,
					rtl: brtl,
					onSliderLoad: function () {
						$('.ed-testimonial-wrap').removeClass('cS-hidden');
					},
					responsive: [ {
						breakpoint: 870,
						settings: {
							item: 2,
							slideMove: 1,
							slideMargin: 20,
						}
					},
					{
						breakpoint: 570,
						settings: {
							item: 1,
							slideMove: 1,
							slideMargin: 2,
						}
					}
					]
				});
			}

			if (p_p_id == 'educenter_gallery_refresh') {
				/**
				* Gallery Light Box
				*/
				$("a[rel^='edugallery']").prettyPhoto({
					theme: 'light_rounded',
					slideshow: 5000,
					autoplay_slideshow: false,
					keyboard_shortcuts: true,
					deeplinking: false,
					default_width: 500,
					default_height: 344,
				});
			}

			if (p_p_id == 'educenter_blog_area_refresh' || p_p_id == 'educenter_courses_section_area_refresh') {
				/**
				 * Latest News Blog Area
				*/
				$(".ed-blog-slider").lightSlider({
					item: $(".ed-blog-slider").data('items') || 3,
					autoWidth: false,
					slideMove: 1,
					slideMargin: 10,
					loop: true,
					controls: false,
					adaptiveHeight: true,
					pager: true,
					rtl: brtl,
					onSliderLoad: function () {
						$('.ed-blog-slider').removeClass('cS-hidden');
					},
					responsive: [ {
						breakpoint: 870,
						settings: {
							item: 2,
							slideMove: 1,
							slideMargin: 10,
						}
					},
					{
						breakpoint: 570,
						settings: {
							item: 1,
							slideMove: 1,
							slideMargin: 2,
						}
					}
					]
				});
			}
		});
	});


})(jQuery);
