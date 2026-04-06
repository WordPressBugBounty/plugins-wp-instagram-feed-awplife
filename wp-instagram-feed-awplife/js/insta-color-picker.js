jQuery(document).ready(function() {
    // tab切换
    jQuery("div.bhoechie-tab-menu>div.ifgp-list-group>a").click(function(e) {
        e.preventDefault();
        jQuery(this).siblings('a.active').removeClass("active");
        jQuery(this).addClass("active");
        var index = jQuery(this).index();
        jQuery("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        jQuery("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });

    // range slider
    var rangeSlider = function() {
        var slider = jQuery('.range-slider'),
            range = jQuery('.range-slider__range'),
            value = jQuery('.range-slider__value');

        slider.each(function() {
            value.each(function() {
                var val = jQuery(this).prev().attr('value');
                jQuery(this).html(val);
            });

            range.on('input', function() {
                jQuery(this).next(value).html(this.value);
            });
        });
    };
    rangeSlider();

    // Color picker initialization
    jQuery('#ifgp_insta_lightbox_color').wpColorPicker();
});

function IgpGetShortcode() {
    var shortcode = '[IFG';

    var ifgp_instagram_access_token = jQuery("#ifgp_instagram_access_token").val();
    if (ifgp_instagram_access_token) {
        shortcode = shortcode + ' ifgp_instagram_access_token="' + ifgp_instagram_access_token + '"';
    } else {
        shortcode = shortcode + ' ifgp_instagram_access_token="' + '"';
    }

    var ifgp_insta_layout = jQuery('[name=ifgp_insta_layout]:checked').val();
    if (ifgp_insta_layout) {
        shortcode = shortcode + ' ifgp_insta_layout="' + ifgp_insta_layout + '"';
    } else {
        shortcode = shortcode + ' ifgp_insta_layout="' + 'insta_layout_grid' + '"';
    }

    var ifgp_insta_grid_columns_l = jQuery("#ifgp_insta_grid_columns_l").val();
    if (ifgp_insta_grid_columns_l) {
        shortcode = shortcode + ' ifgp_insta_grid_columns_l="' + ifgp_insta_grid_columns_l + '"';
    } else {
        shortcode = shortcode + ' ifgp_insta_grid_columns_l="' + '' + '"';
    }

    var ifgp_insta_image_limit = jQuery("#ifgp_insta_image_limit").val();
    if (ifgp_insta_image_limit) {
        shortcode = shortcode + ' ifgp_insta_image_limit="' + ifgp_insta_image_limit + '"';
    }
    var ifgp_insta_image_spacing = jQuery("#ifgp_insta_image_spacing").val();
    if (ifgp_insta_image_spacing) {
        shortcode = shortcode + ' ifgp_insta_image_spacing="' + ifgp_insta_image_spacing + '"';
    }

    var ifgp_insta_icon_image = jQuery("#ifgp_insta_icon_image").val();
    if (jQuery("#ifgp_insta_icon_image").prop('checked') == true) {
        shortcode = shortcode + ' ifgp_insta_icon_image="' + ifgp_insta_icon_image + '"';
    }

    var ifgp_insta_caption_image = jQuery("#ifgp_insta_caption_image").val();
    if (jQuery("#ifgp_insta_caption_image").prop('checked') == true) {
        shortcode = shortcode + ' ifgp_insta_caption_image="' + ifgp_insta_caption_image + '"';
    }

    var ifgp_insta_link_redirection = jQuery("#ifgp_insta_link_redirection").val();
    if (jQuery("#ifgp_insta_link_redirection").prop('checked') == true) {
        shortcode = shortcode + ' ifgp_insta_link_redirection="' + ifgp_insta_link_redirection + '"';
    }

    var ifgp_insta_lightbox = jQuery("#ifgp_insta_lightbox").val();
    if (jQuery("#ifgp_insta_lightbox").prop('checked') == true) {
        shortcode = shortcode + ' ifgp_insta_lightbox="' + ifgp_insta_lightbox + '"';
    }
    var ifgp_insta_lightbox_color = jQuery("#ifgp_insta_lightbox_color").val();
    if (ifgp_insta_lightbox_color) {
        shortcode = shortcode + ' ifgp_insta_lightbox_color="' + ifgp_insta_lightbox_color + '"';
    } else {
        shortcode = shortcode + ' ifgp_insta_lightbox_color="' + '' + '"';
    }
    shortcode = shortcode + ' ]';
    jQuery('#awl-shortcode').text(shortcode);
    	// custom modal triggers
	const targetModal = document.querySelector('#insta-shortcode-modal');
	if (targetModal) {
		targetModal.style.display = 'block';
	}
	
	// Show tooltip trigger
	const trigger = document.querySelector('#ifgp-copy-trigger');
	if (trigger) {
		ifgp_show_tooltip(trigger);
	}
}

function ifgp_copy_shortcode() {
    var copyText = document.getElementById("awl-shortcode");
    copyText.select();
    document.execCommand("copy");
}