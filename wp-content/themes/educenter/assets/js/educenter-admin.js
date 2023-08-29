/**
 * Educenter Theme Admin Js
*/
jQuery(document).ready(function ($) {


    /******
     * social icon click event 
    */
    $('body').on('click', '#customize-control-educenter_contact_quick_link a, #customize-control-educenter_maintenance_social a, #customize-control-educenter_topheader_social_link a, #customize-control-educenter_social_link_left a, #customize-control-educenter_contact_social_link a', function (e) {
        e.preventDefault();
        wp.customize.section('educenter_social_section').expand();
        return false;
    });

    /******
     * Quick info click event 
    */
    $('body').on('click', '#customize-control-educenter_topheader_quick_link a', function (e) {
        e.preventDefault();
        wp.customize.section('educenter_quick_info').expand();
        return false;
    });

    /**
     * Customizer Option Auto focus
     */
    jQuery('h3.accordion-section-title').on('click', function () {
        var id = $(this).parent().attr('id');
        try {
            var is_panel = id.includes("panel");
            var is_section = id.includes("section");

            if (is_panel) {
                focus_item = id.replace('accordion-panel-', '');
                console.log(focus_item);
                history.pushState({}, null, '?autofocus[panel]=' + focus_item);
            }
            if (is_section) {
                focus_item = id.replace('accordion-section-', '');
                history.pushState({}, null, '?autofocus[section]=' + focus_item);
            }
        } catch (e) {
            console.log(e);
        }
    });

    /**
     * Multiple Gallery Image Control
    */
    $('.upload_gallery_button').click(function (event) {
        var current_gallery = $(this).closest('label');

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
        var val = current_gallery.find('.gallery_values').val();
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

                current_gallery.find('.gallery_values').val(ids.join(',')).trigger('change');
            }
        );
        return false;
    });


    //Homepage Section Sortable
    function educenter_sections_order (container) {
        var sections = $(container).sortable('toArray');
        var sec_ordered = [];
        $.each(sections, function (index, sec_id) {
            sec_id = sec_id.replace("accordion-section-", "");
            sec_ordered.push(sec_id);
        });

        $.ajax({
            url: ajaxurl,
            type: 'post',
            dataType: 'html',
            data: {
                'action': 'educenter_sections_reorder',
                'sections': sec_ordered,
            }
        }).done(function (data) {
            $.each(sec_ordered, function (key, value) {
                wp.customize.section(value).priority(key);
            });
            $(container).find('.educenter-drag-spinner').hide();
            wp.customize.previewer.refresh();
        });
    }
    $('#sub-accordion-panel-educenter_homepage_settings').sortable({
        axis: 'y',
        helper: 'clone',
        cursor: 'move',
        items: '> li.control-section:not(#accordion-section-educenter-upgrade-section-homepage-settings):not(#accordion-section-educenter_banner_slider)',
        delay: 150,
        update: function (event, ui) {
            $('#sub-accordion-panel-educenter_homepage_settings').find('.educenter-drag-spinner').show();
            educenter_sections_order('#sub-accordion-panel-educenter_homepage_settings');
            $('.wp-full-overlay-sidebar-content').scrollTop(0);
        }
    });

    //Scroll to section
    $('body').on('click', '#sub-accordion-panel-educenter_homepage_settings .control-subsection .accordion-section-title', function (event) {
        var section_id = $(this).parent('.control-subsection').attr('id');
        scrollToSection(section_id);
    });

});



function scrollToSection (section_id) {

    var preview_section_id = "edu-fservices-section";

    var $contents = jQuery('#customize-preview iframe').contents();

    switch (section_id) {

        case 'accordion-section-educenter_fservices_settings':
            preview_section_id = "edu-fservices-section";
            break;

        case 'accordion-section-educenter_aboutus_settings':
            preview_section_id = "edu-aboutus-section";
            break;

        case 'accordion-section-educenter_cta_settings':
            preview_section_id = "edu-cta-section";
            break;

        case 'accordion-section-educenter_services_settings':
            preview_section_id = "edu-services-section";
            break;

        case 'accordion-section-educenter_courses_settings':
            preview_section_id = "edu-courses-section";
            break;

        case 'accordion-section-educenter_gallery_settings':
            preview_section_id = "edu-gallery-section";
            break;

        case 'accordion-section-educenter_counter_settings':
            preview_section_id = "edu-counter-section";
            break;

        case 'accordion-section-educenter_team_settings':
            preview_section_id = "edu-team-section";
            break;

        case 'accordion-section-educenter_testimonial_settings':
            preview_section_id = "edu-testimonials-section";
            break;

        case 'accordion-section-educenter_blog_settings':
            preview_section_id = "edu-blog-section";
            break;

        case 'accordion-section-educenter_events_settings':
            preview_section_id = "edu-wp-events-section";
            break;

    }

    if ($contents.find('#' + preview_section_id).length > 0) {
        $contents.find("html, body").animate({
            scrollTop: $contents.find("#" + preview_section_id).offset().top
        }, 1000);
    }
}
