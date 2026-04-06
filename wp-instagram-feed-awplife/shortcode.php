<?php
if (! defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Instagram Feed  Shortcode
 *
 * @access    public
 * @since     3.0
 *
 * @return    Create Fontend  Output
 */
add_shortcode('IFG', 'ifgp_instagram_feed_shortcode');
function ifgp_instagram_feed_shortcode($atts)
{
	ob_start();

	//js
	wp_enqueue_script('jquery');

	// Custom Layout CSS
	wp_enqueue_style('ifgp-layout-css', IFGP_PLUGIN_URL . 'css/ifgp-layout.css', array(), IFGP_PLUGIN_VER);
	wp_enqueue_style('ifgp-alw-style-css', IFGP_PLUGIN_URL . 'css/alw-style.css', array(), IFGP_PLUGIN_VER);
	wp_enqueue_style('ifgp-shortcode-css', IFGP_PLUGIN_URL . 'css/ifgp-shortcode.css', array(), IFGP_PLUGIN_VER);
	wp_enqueue_style('ifgp-main-css', IFGP_PLUGIN_URL . 'css/main.css', array(), IFGP_PLUGIN_VER);

	// Lightbox JS
	wp_enqueue_script('ifgp-lightbox-js', IFGP_PLUGIN_URL . 'js/ifgp-lightbox.js', array('jquery'), IFGP_PLUGIN_VER, true);
	wp_localize_script('ifgp-lightbox-js', 'ifgp_lightbox_vars', array(
		'plugin_url' => IFGP_PLUGIN_URL,
		'unknown_user' => __('Unknown User', 'wp-instagram-feed-awplife'),
		'recently' => __('Recently', 'wp-instagram-feed-awplife'),
		'no_caption' => __('No caption available', 'wp-instagram-feed-awplife'),
		'previous' => __('Previous', 'wp-instagram-feed-awplife'),
		'next' => __('Next', 'wp-instagram-feed-awplife'),
		'close' => __('Close', 'wp-instagram-feed-awplife'),
		'follow' => __('Follow', 'wp-instagram-feed-awplife'),
		'instagram_image' => __('Instagram Image', 'wp-instagram-feed-awplife')
	));

	// Dynamic CSS for shortcode
	$insta_image_spacing_attr = isset($atts['ifgp_insta_image_spacing']) ? $atts['ifgp_insta_image_spacing'] : (isset($atts['insta_image_spacing']) ? $atts['insta_image_spacing'] : null);
	$insta_lightbox_color_attr = isset($atts['ifgp_insta_lightbox_color']) ? $atts['ifgp_insta_lightbox_color'] : (isset($atts['insta_lightbox_color']) ? $atts['insta_lightbox_color'] : null);

	if ($insta_image_spacing_attr !== null || $insta_lightbox_color_attr !== null) {
		$spacing = $insta_image_spacing_attr !== null ? intval($insta_image_spacing_attr) : 3;
		$lb_color = $insta_lightbox_color_attr !== null ? sanitize_hex_color($insta_lightbox_color_attr) : '#ffffff';
		
		$custom_css = "
			.insta-gallery-div { padding: {$spacing}px !important; }
			.carouselGallery-left, .carouselGallery-right { color: {$lb_color}; }
			.carouselGallery-modal .iconscircle-cross { color: {$lb_color}; }
		";
		wp_add_inline_style('ifgp-shortcode-css', $custom_css);
	}

	//Access Token
	$instagram_access_token = isset($atts['ifgp_instagram_access_token']) ? sanitize_text_field($atts['ifgp_instagram_access_token']) : (isset($atts['instagram_access_token']) ? sanitize_text_field($atts['instagram_access_token']) : (isset($atts['instagram_acces_token']) ? sanitize_text_field($atts['instagram_acces_token']) : ""));
	$insta_image_limit = isset($atts['ifgp_insta_image_limit']) ? intval($atts['ifgp_insta_image_limit']) : (isset($atts['insta_image_limit']) ? intval($atts['insta_image_limit']) : 24);
	if ($insta_image_limit > 50) $insta_image_limit = 50;

	// Caching via transients
	$transient_key = 'ifgp_feed_' . md5($instagram_access_token . $insta_image_limit);
	$instagram_data = get_transient($transient_key);

	if (false === $instagram_data) {
		$instagram_data_decode = wp_remote_get("https://graph.instagram.com/me/media?fields=id,media_type,permalink,thumbnail_url,timestamp,media_url,caption,username,children{media_url}&access_token=$instagram_access_token&limit=$insta_image_limit");
		$instagram_response = isset($instagram_data_decode['response']['code']) ? $instagram_data_decode['response']['code'] : 0;
		$instagram_body = wp_remote_retrieve_body($instagram_data_decode);
		$instagram_data = json_decode($instagram_body, true);

		if ($instagram_response == 200 && !empty($instagram_data['data'])) {
			set_transient($transient_key, $instagram_data, HOUR_IN_SECONDS);
		}
	} else {
		$instagram_response = 200; // Found in cache
	}

	//Gallery
	$insta_layout = isset($atts['ifgp_insta_layout']) ? sanitize_text_field($atts['ifgp_insta_layout']) : (isset($atts['insta_layout']) ? sanitize_text_field($atts['insta_layout']) : "insta_layout_grid");
	$insta_grid_columns_l = isset($atts['ifgp_insta_grid_columns_l']) ? intval($atts['ifgp_insta_grid_columns_l']) : (isset($atts['insta_grid_columns_l']) ? intval($atts['insta_grid_columns_l']) : 3);
	$insta_icon_image = isset($atts['ifgp_insta_icon_image']) ? sanitize_text_field($atts['ifgp_insta_icon_image']) : (isset($atts['insta_icon_image']) ? sanitize_text_field($atts['insta_icon_image']) : "");
	$insta_image_spacing = isset($atts['ifgp_insta_image_spacing']) ? intval($atts['ifgp_insta_image_spacing']) : (isset($atts['insta_image_spacing']) ? intval($atts['insta_image_spacing']) : 3);
	if ($insta_image_spacing > 20) $insta_image_spacing = 20;
	$insta_caption_image = isset($atts['ifgp_insta_caption_image']) ? sanitize_text_field($atts['ifgp_insta_caption_image']) : (isset($atts['insta_caption_image']) ? sanitize_text_field($atts['insta_caption_image']) : "");
	$insta_link_redirection = isset($atts['ifgp_insta_link_redirection']) ? sanitize_text_field($atts['ifgp_insta_link_redirection']) : (isset($atts['insta_link_redirection']) ? sanitize_text_field($atts['insta_link_redirection']) : "");
	$insta_lightbox = isset($atts['ifgp_insta_lightbox']) ? sanitize_text_field($atts['ifgp_insta_lightbox']) : (isset($atts['insta_lightbox']) ? sanitize_text_field($atts['insta_lightbox']) : "");
	$insta_lightbox_color = isset($atts['ifgp_insta_lightbox_color']) ? sanitize_hex_color($atts['ifgp_insta_lightbox_color']) : (isset($atts['insta_lightbox_color']) ? sanitize_hex_color($atts['insta_lightbox_color']) : "#ffffff");

	if ($insta_layout == 'insta_layout_grid') {
		require('layout/instagram-grid-layout-shortcode.php');
	}

	//Include code file
	return ob_get_clean();
}

/**
 * Backward Compatibility Function wrapper
 */
if (!function_exists('wp_instagram_feed_shortcode')) {
	function wp_instagram_feed_shortcode($atts)
	{
		return ifgp_instagram_feed_shortcode($atts);
	}
}
