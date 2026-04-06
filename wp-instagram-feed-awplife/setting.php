<?php
if (! defined('ABSPATH')) exit; // Exit if accessed directly
// CSS
wp_enqueue_style('ifgp-styles-css', IFGP_PLUGIN_URL . 'css/styles.css', array(), IFGP_PLUGIN_VER);
wp_enqueue_style('ifgp-layout-css', IFGP_PLUGIN_URL . 'css/ifgp-layout.css', array(), IFGP_PLUGIN_VER);
wp_enqueue_style('ifgp-metabox-css', IFGP_PLUGIN_URL . 'css/metabox.css', array(), IFGP_PLUGIN_VER);
wp_enqueue_style('ifgp-settings-css', IFGP_PLUGIN_URL . 'css/ifgp-settings.css', array(), IFGP_PLUGIN_VER);
wp_enqueue_style('wp-color-picker');

// js
wp_enqueue_script('ifgp-admin-js', IFGP_PLUGIN_URL  . 'js/ifgp-admin.js', array('jquery'), IFGP_PLUGIN_VER, true);
wp_enqueue_script('ifgp-insta-color-picker', IFGP_PLUGIN_URL  . 'js/insta-color-picker.js', array('jquery', 'wp-color-picker', 'ifgp-admin-js'), IFGP_PLUGIN_VER, true);

?>
<style type="text/css">
    .instagg .ifgp-container { width: 100% !important; max-width: 100% !important; display: block !important; margin: 0 auto !important; }
    /* Outer layout stabilization */
    .instagg .ifgp-col-md-9 { flex: 0 0 75% !important; width: 75% !important; max-width: 75% !important; }
    .instagg .ifgp-col-md-3 { flex: 0 0 25% !important; width: 25% !important; max-width: 25% !important; }
    /* Inner tab stabilization */
    .instagg .bhoechie-tab-container { width: 100% !important; display: flex !important; min-height: 500px !important; flex-wrap: nowrap !important; }
    .instagg .bhoechie-tab-menu { width: 250px !important; flex: 0 0 250px !important; max-width: 250px !important; }
    .instagg .bhoechie-tab { flex: 1 1 auto !important; width: 100% !important; min-width: 0 !important; }
    .instagg .bhoechie-tab-content { width: 100% !important; min-width: 900px !important; display: none; padding: 30px !important; box-sizing: border-box !important; }
    .instagg .bhoechie-tab-content.active { display: block !important; }
    .instagg .igp_pannel_bottom { width: 100% !important; min-width: 900px !important; box-sizing: border-box !important; }
    /* Form field stabilization */
    .instagg .ifgp-col-md-4 { flex: 0 0 33.33% !important; width: 33.33% !important; max-width: 33.33% !important; }
    .instagg .ifgp-col-md-8 { flex: 0 0 66.66% !important; width: 66.66% !important; max-width: 66.66% !important; }
    /* Hard pixel guards for desktop */
    @media (min-width: 900px) {
        .instagg .bhoechie-tab-content { min-width: 959px !important; width: 959px !important; }
        .instagg .ifgp-col-md-9 { min-width: 959px !important; }
    }
    /* Premium Header Styles */
    .instagg-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        padding: 5px 0;
    }
    .instagg-title-wrap {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .instagg-icon-circle {
        background: linear-gradient(135deg, #cd2757 0%, #e91e63 100%);
        color: #fff;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 10px rgba(205, 39, 87, 0.3);
    }
    .instagg-icon-circle .dashicons {
        font-size: 18px;
        width: 18px;
        height: 18px;
    }
    .instagg-version-badge {
        background: #f0f0f1;
        color: #646970;
        font-size: 11px;
        font-weight: 600;
        padding: 2px 10px;
        border-radius: 50px;
        border: 1px solid #dcdcde;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .instagg-main-title {
        font-size: 1.4em !important;
        font-weight: 700 !important;
        margin: 0 !important;
        color: #1d2327;
    }
    /* Premium Redesign Layer */
    .instagg-glass-header {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(246, 247, 247, 0.8) 100%) !important;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(205, 39, 87, 0.1) !important;
        padding: 12px 20px !important;
        border-radius: 8px 8px 0 0;
    }
    .instagg-resource-links {
        display: flex;
        gap: 20px;
        align-items: center;
    }
    .instagg-res-link {
        text-decoration: none !important;
        color: #646970 !important;
        font-size: 13px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s ease;
        padding: 5px 10px;
        border-radius: 4px;
    }
    .instagg-res-link:hover {
        color: #cd2757 !important;
        background: rgba(205, 39, 87, 0.05);
        transform: translateY(-1px);
    }
    .instagg-res-link .dashicons {
        font-size: 16px;
        width: 16px;
        height: 16px;
    }
    .instagg-version-badge {
        position: relative;
        background: #fff !important;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
    .instagg-version-badge::after {
        content: '';
        position: absolute;
        top: -2px;
        right: -2px;
        width: 8px;
        height: 8px;
        background: #4caf50;
        border-radius: 50%;
        border: 2px solid #fff;
        animation: instagg-pulse 2s infinite;
    }
    @keyframes instagg-pulse {
        0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(76, 175, 80, 0.7); }
        70% { transform: scale(1); box-shadow: 0 0 0 6px rgba(76, 175, 80, 0); }
        100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(76, 175, 80, 0); }
    }
    /* Slider UI Fix */
    .range-slider {
        max-width: 450px !important;
        display: flex !important;
        flex-direction: row !important;
        align-items: center !important;
        gap: 10px !important;
        height: 40px !important;
    }
    .range-slider__range {
        flex: 1 !important;
        margin: 0 !important;
        order: 1 !important;
    }
    .range-slider__value {
        order: 2 !important;
        margin: 0 !important;
        flex-shrink: 0 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        height: 28px !important;
        width: 45px !important;
        font-size: 13px !important;
        font-weight: 600 !important;
        padding: 0 !important;
        border-radius: 4px !important;
    }
    .range-slider__value:after {
        top: 50% !important;
        transform: translateY(-50%) !important;
        left: -6px !important;
        border-right: 6px solid #cd2757 !important;
        border-top: 6px solid transparent !important;
        border-bottom: 6px solid transparent !important;
    }
    /* Upgrade Button Styles */
    .awp-hero-upgrade-btn {
        display: inline-flex !important;
        align-items: center !important;
        background: #fff !important;
        color: #cd2757 !important;
        padding: 12px 30px !important;
        border-radius: 50px !important;
        text-decoration: none !important;
        font-weight: 700 !important;
        font-size: 16px !important;
        margin-top: 25px !important;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) !important;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .awp-hero-upgrade-btn:hover {
        transform: scale(1.05) translateY(-3px) !important;
        box-shadow: 0 15px 30px rgba(0,0,0,0.15) !important;
        background: #fdfdfd !important;
    }
    .awp-hero-upgrade-btn .dashicons {
        margin-right: 10px !important;
        font-size: 20px !important;
        width: 20px !important;
        height: 20px !important;
    }
</style>
<div class="ifgp-container" style="margin-top:20px;">
	<div class="ifgp-row">
		<div class="ifgp-col-md-9">
		<div class="postbox-container insta-settings" style="margin-top:20px; margin-bottom:20px;">
			<div class="postbox">
				<div class="postbox-header instagg-glass-header">
					<div class="instagg-header">
						<div class="instagg-title-wrap">
							<div class="instagg-icon-circle">
								<span class="dashicons dashicons-instagram"></span>
							</div>
							<h2 class="instagg-main-title"><?php esc_html_e('Instagram Feed Gallery', 'wp-instagram-feed-awplife'); ?></h2>
						</div>
						<div class="instagg-resource-links">
							<a href="https://awplife.com/documentation/instagram-feed-gallery/" target="_blank" class="instagg-res-link">
								<span class="dashicons dashicons-editor-help"></span><?php esc_html_e('Docs', 'wp-instagram-feed-awplife'); ?>
							</a>
							<a href="https://awplife.com/contact/" target="_blank" class="instagg-res-link">
								<span class="dashicons dashicons-sos"></span><?php esc_html_e('Support', 'wp-instagram-feed-awplife'); ?>
							</a>
							<a href="https://www.youtube.com/@awplife" target="_blank" class="instagg-res-link">
								<span class="dashicons dashicons-video-alt3"></span><?php esc_html_e('Tutorials', 'wp-instagram-feed-awplife'); ?>
							</a>
						</div>
						<div class="instagg-version-badge">
							<?php echo 'v' . esc_html(IFGP_PLUGIN_VER); ?>
						</div>
					</div>
				</div>
				<div class="inside instagg">
					<div class="ifgp-row bhoechie-tab-container">
						<div class="ifgp-col-lg-3 ifgp-col-md-3 bhoechie-tab-menu">
							<div class="ifgp-list-group">
								<a href="#" class="ifgp-list-group-item active">
									<span class="dashicons dashicons-instagram"></span><?php esc_html_e('Instagram Token', 'wp-instagram-feed-awplife'); ?>
								</a>
								<a href="#" class="ifgp-list-group-item">
									<span class="dashicons dashicons-layout"></span><?php esc_html_e('Layouts', 'wp-instagram-feed-awplife'); ?>
								</a>
								<a href="#" class="ifgp-list-group-item">
									<span class="dashicons dashicons-admin-generic"></span><?php esc_html_e('Config', 'wp-instagram-feed-awplife'); ?>
								</a>
								<a href="#" class="ifgp-list-group-item">
									<span class="dashicons dashicons-welcome-view-site"></span><?php esc_html_e('LightBox', 'wp-instagram-feed-awplife'); ?>
								</a>
								<a href="#" class="ifgp-list-group-item">
									<span class="dashicons dashicons-cart"></span><?php esc_html_e('Upgrade To Pro', 'wp-instagram-feed-awplife'); ?>
								</a>
							</div>
						</div>
						<div class="ifgp-col-lg-9 ifgp-col-md-9 bhoechie-tab">
							<div class="bhoechie-tab-content active">
								<h2><?php esc_html_e('Type Instagram Access Token', 'wp-instagram-feed-awplife'); ?></h2>
								<hr>
								<div class="ifgp-row">
									<div class="ifgp-col-md-4">
										<div class="ma_field_discription">
											<h4><?php esc_html_e('Instagram Access Token', 'wp-instagram-feed-awplife'); ?></h4>
											<p><?php esc_html_e('Enter access token to add the Instagram feed. You can generate access token easily from here', 'wp-instagram-feed-awplife'); ?> <a target="_blank" href="https://www.youtube.com/watch?v=VrqbUP67Jbw"><?php esc_html_e('Youtube Video', 'wp-instagram-feed-awplife'); ?></a></p>

										</div>
									</div>
									<div class="ifgp-col-md-8">
										<div class="ma_field ifgp-panel-body">
											<textarea class="ifgp-form-control" rows="5" id="ifgp_instagram_access_token" name="ifgp_instagram_access_token"></textarea>
											<div><strong><?php esc_html_e('Access Token Limit:', 'wp-instagram-feed-awplife'); ?></strong> <?php esc_html_e('calls within one hour = 200 * Number of Users |', 'wp-instagram-feed-awplife'); ?> <strong><?php esc_html_e('More details:', 'wp-instagram-feed-awplife'); ?></strong> <a href="https://developers.facebook.com/docs/graph-api/overview/rate-limiting#application-level-rate-limiting" target="_blank"><?php esc_html_e('check here', 'wp-instagram-feed-awplife'); ?></a></div>
										</div>
									</div>
								</div>
							</div>
							<div class="bhoechie-tab-content">
								<h2><?php esc_html_e('Choose Gallery Layout Type', 'wp-instagram-feed-awplife'); ?></h2>
								<hr>
								<div class="ifgp-row">
									<div class="ifgp-col-md-3">
										<input type="radio" name="ifgp_insta_layout" id="ifgp_insta_layout_grid" value="insta_layout_grid" checked>
										<label for="ifgp_insta_layout_grid"><img class="ifgp-img-fluid" src="<?php echo esc_url(IFGP_PLUGIN_URL . '/img/Grid-Layout.png'); ?>" /></label>
									</div>
									<!-- Pro Layouts Moved to Upgrade Tab -->
								</div>
							</div>
							<div class="bhoechie-tab-content ">
								<h2><?php esc_html_e('Configuration', 'wp-instagram-feed-awplife'); ?></h2>
								<hr>
								<div class="ifgp-row">
									<div class="ifgp-col-md-4">
										<div class="ma_field_discription">
											<h4><?php esc_html_e('Rows & Column', 'wp-instagram-feed-awplife'); ?></h4>
											<p><?php esc_html_e('Choose columns acording to device', 'wp-instagram-feed-awplife'); ?></p>
										</div>
									</div>
									<div class="ifgp-col-md-8">
										<div class="ma_field ifgp-panel-body">
											<select id="ifgp_insta_grid_columns_l" name="ifgp_insta_grid_columns_l" class="ifgp-form-control">
												<option value="1"><?php esc_html_e('Columns 12', 'wp-instagram-feed-awplife'); ?></option>
												<option value="2"><?php esc_html_e('Columns 6', 'wp-instagram-feed-awplife'); ?></option>
												<option value="3" selected><?php esc_html_e('Columns 4', 'wp-instagram-feed-awplife'); ?></option>
												<option value="4"><?php esc_html_e('Columns 3', 'wp-instagram-feed-awplife'); ?></option>
												<option value="6"><?php esc_html_e('Columns 2', 'wp-instagram-feed-awplife'); ?></option>
												<option value="12"><?php esc_html_e('Columns 1', 'wp-instagram-feed-awplife'); ?></option>
											</select>
										</div>
									</div>
								</div>
								<div class="ifgp-row">
									<div class="ifgp-col-md-4">
										<div class="ma_field_discription">
											<h4><?php esc_html_e('Instagram Image Limit', 'wp-instagram-feed-awplife'); ?></h4>
											<p><?php esc_html_e('How much images you want to show the instagram gallery.', 'wp-instagram-feed-awplife'); ?></p>
										</div>
									</div>
									<div class="ifgp-col-md-8">
										<div class="ma_field ifgp-panel-body">
											<p class="range-slider">
												<input id="ifgp_insta_image_limit" name="ifgp_insta_image_limit" class="range-slider__range" type="range" value="24" min="1" max="50" step="1">
												<span class="range-slider__value"><?php esc_html_e('0', 'wp-instagram-feed-awplife'); ?></span>
											</p>
										</div>
									</div>
								</div>
								<div class="ifgp-row">
									<div class="ifgp-col-md-4">
										<div class="ma_field_discription">
											<h4><?php esc_html_e('Instagram Image Spacing', 'wp-instagram-feed-awplife'); ?></h4>
											<p><?php esc_html_e('Set Image Spacing.', 'wp-instagram-feed-awplife'); ?></p>
										</div>
									</div>
									<div class="ifgp-col-md-8">
										<div class="ma_field ifgp-panel-body">
											<p class="range-slider">
												<input id="ifgp_insta_image_spacing" name="ifgp_insta_image_spacing" class="range-slider__range" type="range" value="3" min="0" max="20" step="1">
												<span class="range-slider__value"><?php esc_html_e('0', 'wp-instagram-feed-awplife'); ?></span>
											</p>
										</div>
									</div>
								</div>
								<div class="ifgp-row">
									<div class="ifgp-col-md-4">
										<div class="ma_field_discription">
											<h4><?php esc_html_e('Icon On Photos', 'wp-instagram-feed-awplife'); ?></h4>
											<p><?php esc_html_e('Set icon on photos', 'wp-instagram-feed-awplife'); ?></p>
										</div>
									</div>
									<div class="ifgp-col-md-8">
										<div class="ma_field ifgp-panel-body">
											<label class="switch">
												<input type="checkbox" id="ifgp_insta_icon_image" name="ifgp_insta_icon_image" value="yes" checked>
												<div class="slider round"></div>
											</label>
										</div>
									</div>
								</div>
								<div class="ifgp-row">
									<div class="ifgp-col-md-4">
										<div class="ma_field_discription">
											<h4><?php esc_html_e('Show Caption On Photos', 'wp-instagram-feed-awplife'); ?></h4>
											<p><?php esc_html_e('Set captions on photo', 'wp-instagram-feed-awplife'); ?></p>
										</div>
									</div>
									<div class="ifgp-col-md-8">
										<div class="ma_field ifgp-panel-body">
											<label class="switch">
												<input type="checkbox" id="ifgp_insta_caption_image" name="ifgp_insta_caption_image" value="yes">
												<div class="slider round"></div>
											</label>
										</div>
									</div>
								</div>
								<div class="ifgp-row">
									<div class="ifgp-col-md-4">
										<div class="ma_field_discription">
											<h4><?php esc_html_e('Instagram Image Link', 'wp-instagram-feed-awplife'); ?></h4>
											<p><?php esc_html_e('Choose option for instagram Image Link New Tab', 'wp-instagram-feed-awplife'); ?></p>
										</div>
									</div>
									<div class="ifgp-col-md-8">
										<div class="ma_field ifgp-panel-body">
											<label class="switch">
												<input type="checkbox" id="ifgp_insta_link_redirection" name="ifgp_insta_link_redirection" value="_new">
												<div class="slider round"></div>
											</label>
										</div>
									</div>
								</div>
							</div>
							<div class="bhoechie-tab-content">
								<h2><?php esc_html_e('Lightbox', 'wp-instagram-feed-awplife'); ?></h2>
								<hr>

								<div class="ifgp-row">
									<div class="ifgp-col-md-4">
										<div class="ma_field_discription">
											<h4><?php esc_html_e('Lightbox', 'wp-instagram-feed-awplife'); ?></h4>
											<p><?php esc_html_e('On Off Lightbox', 'wp-instagram-feed-awplife'); ?></p>
										</div>
									</div>
									<div class="ifgp-col-md-8">
										<div class="ma_field ifgp-panel-body">
											<label class="switch">
												<input type="checkbox" id="ifgp_insta_lightbox" name="ifgp_insta_lightbox" value="yes">
												<div class="slider round"></div>
											</label>
										</div>
									</div>
								</div>
								<div class="ifgp-row">
									<div class="ifgp-col-md-4">
										<div class="ma_field_discription">
											<h4><?php esc_html_e('Lightbox Color', 'wp-instagram-feed-awplife'); ?></h4>
											<p><?php esc_html_e('Changing the color of your Lightbox', 'wp-instagram-feed-awplife'); ?></p>
										</div>
									</div>
									<div class="ifgp-col-md-8">
										<div class="ma_field ifgp-panel-body">
											<input type="text" id="ifgp_insta_lightbox_color" name="ifgp_insta_lightbox_color" value="#ffffff">
										</div>
									</div>
								</div>
							</div>
							<div class="bhoechie-tab-content">
								<div class="awp-upgrade-container">
									<div class="awp-upgrade-hero">
										<div class="awp-offer-badge"><?php esc_html_e('Limited Time Offer', 'wp-instagram-feed-awplife'); ?></div>
										<h1><?php esc_html_e('Upgrade to Pro & Unlock Full Power', 'wp-instagram-feed-awplife'); ?></h1>
										<p><?php esc_html_e('Get 5 Stunning Layouts, Instagram Profile Display, Advanced Customization, and Priority Support.', 'wp-instagram-feed-awplife'); ?></p>
										<div style="margin-top: 25px; font-size: 1.5em; font-weight: bold;">
											<strike style="opacity: 0.6; margin-right: 10px;"><?php esc_html_e('$49', 'wp-instagram-feed-awplife'); ?></strike>
											<span><?php esc_html_e('$39', 'wp-instagram-feed-awplife'); ?></span>
										</div>
										<a href="https://awplife.com/wordpress-plugins/instagram-feed-gallery-premium/" target="_blank" class="awp-hero-upgrade-btn">
											<span class="dashicons dashicons-cart"></span>
											<?php esc_html_e('Upgrade To Pro Now', 'wp-instagram-feed-awplife'); ?>
										</a>
									</div>

									<div class="awp-features-grid">
										<div class="awp-feature-card">
											<span class="dashicons dashicons-layout"></span>
											<h3><?php esc_html_e('5 Premium Layouts', 'wp-instagram-feed-awplife'); ?></h3>
											<p><?php esc_html_e('Choose from Grid, Masonry, Mosaic, Carousel, and List layouts to match your site design.', 'wp-instagram-feed-awplife'); ?></p>
										</div>
										<div class="awp-feature-card">
											<span class="dashicons dashicons-admin-users"></span>
											<h3><?php esc_html_e('Instagram Profile Info', 'wp-instagram-feed-awplife'); ?></h3>
											<p><?php esc_html_e('Showcase your Instagram username, bio, followers, and following count beautifully.', 'wp-instagram-feed-awplife'); ?></p>
										</div>
										<div class="awp-feature-card">
											<span class="dashicons dashicons-smartphone"></span>
											<h3><?php esc_html_e('Mobile Responsive', 'wp-instagram-feed-awplife'); ?></h3>
											<p><?php esc_html_e('Dedicated column controls for mobile devices to ensure your feed looks perfect on all screens.', 'wp-instagram-feed-awplife'); ?></p>
										</div>
										<div class="awp-feature-card">
											<span class="dashicons dashicons-upload"></span>
											<h3><?php esc_html_e('Load More Button', 'wp-instagram-feed-awplife'); ?></h3>
											<p><?php esc_html_e('Allow visitors to load more posts without leaving the page with advanced "Load More" functionality.', 'wp-instagram-feed-awplife'); ?></p>
										</div>
										<div class="awp-feature-card">
											<span class="dashicons dashicons-visibility"></span>
											<h3><?php esc_html_e('Advanced Lightbox', 'wp-instagram-feed-awplife'); ?></h3>
											<p><?php esc_html_e('Enhanced lightbox with a built-in Follow button to grow your Instagram audience faster.', 'wp-instagram-feed-awplife'); ?></p>
										</div>
										<div class="awp-feature-card">
											<span class="dashicons dashicons-media-code"></span>
											<h3><?php esc_html_e('Custom CSS Utility', 'wp-instagram-feed-awplife'); ?></h3>
											<p><?php esc_html_e('Easily apply your own custom styles directly from the settings page without touching code.', 'wp-instagram-feed-awplife'); ?></p>
										</div>
									</div>

									<div class="awp-comparison-section">
										<h2 style="text-align: center; margin-bottom: 30px; font-weight: 800;"><?php esc_html_e('Why Go Pro?', 'wp-instagram-feed-awplife'); ?></h2>
										<table class="awp-comparison-table">
											<thead>
												<tr>
													<th class="feature-name"><?php esc_html_e('Features', 'wp-instagram-feed-awplife'); ?></th>
													<th class="free-col"><?php esc_html_e('Free Version', 'wp-instagram-feed-awplife'); ?></th>
													<th class="pro-col"><?php esc_html_e('Pro Version', 'wp-instagram-feed-awplife'); ?></th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td class="feature-name"><?php esc_html_e('Number of Layouts', 'wp-instagram-feed-awplife'); ?></td>
													<td class="free-col"><?php esc_html_e('1 (Grid)', 'wp-instagram-feed-awplife'); ?></td>
													<td class="pro-col"><?php esc_html_e('5 (Grid, Masonry, Mosaic, Carousel, List)', 'wp-instagram-feed-awplife'); ?></td>
												</tr>
												<tr>
													<td class="feature-name"><?php esc_html_e('Instagram Profile Statistics', 'wp-instagram-feed-awplife'); ?></td>
													<td class="free-col"><span class="cross-icon">✘</span></td>
													<td class="pro-col"><span class="check-icon">✔</span></td>
												</tr>
												<tr>
													<td class="feature-name"><?php esc_html_e('Mobile Column Settings', 'wp-instagram-feed-awplife'); ?></td>
													<td class="free-col"><span class="cross-icon">✘</span></td>
													<td class="pro-col"><span class="check-icon">✔</span></td>
												</tr>
												<tr>
													<td class="feature-name"><?php esc_html_e('Image Load Limit', 'wp-instagram-feed-awplife'); ?></td>
													<td class="free-col"><?php esc_html_e('Max 50', 'wp-instagram-feed-awplife'); ?></td>
													<td class="pro-col"><?php esc_html_e('Up to 200', 'wp-instagram-feed-awplife'); ?></td>
												</tr>
												<tr>
													<td class="feature-name"><?php esc_html_e('Follow Button In Lightbox', 'wp-instagram-feed-awplife'); ?></td>
													<td class="free-col"><span class="cross-icon">✘</span></td>
													<td class="pro-col"><span class="check-icon">✔</span></td>
												</tr>
												<tr>
													<td class="feature-name"><?php esc_html_e('Custom CSS Support', 'wp-instagram-feed-awplife'); ?></td>
													<td class="free-col"><span class="cross-icon">✘</span></td>
													<td class="pro-col"><span class="check-icon">✔</span></td>
												</tr>
												<tr>
													<td class="feature-name"><?php esc_html_e('Priority Email Support', 'wp-instagram-feed-awplife'); ?></td>
													<td class="free-col"><span class="cross-icon">✘</span></td>
													<td class="pro-col"><span class="check-icon">✔</span></td>
												</tr>
											</tbody>
										</table>
									</div>

									<div class="awp-upgrade-buttons">
										<a href="https://awplife.com/wordpress-plugins/instagram-feed-gallery-premium/" target="_blank" class="btn-premium">
											<span class="dashicons dashicons-cart" style="margin-right: 8px;"></span>
											<?php esc_html_e('Upgrade To Pro Now', 'wp-instagram-feed-awplife'); ?>
										</a>
										<a href="https://awplife.com/demo/instagram-feed-gallery-premium/" target="_blank" class="btn-demo">
											<?php esc_html_e('Check Live Demo', 'wp-instagram-feed-awplife'); ?>
										</a>
									</div>

									<div class="awp-premium-layouts-preview" style="margin-top: 60px; text-align: center;">
										<h2 style="font-weight: 800; margin-bottom: 25px;"><?php esc_html_e('Unlock Premium Layouts', 'wp-instagram-feed-awplife'); ?></h2>
										<div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
											<a style="transition: transform 0.3s ease; display: inline-block;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'" href="https://awplife.com/demo/instagram-feed-gallery-premium/instagram-feed-gallery-masonry-layout/" target="_new"><img style="width: 160px; border-radius: 8px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);" src="<?php echo esc_url(IFGP_PLUGIN_URL . '/img/masonry.png'); ?>" alt="Masonry Layout" title="View Masonry Demo" /></a>
											<a style="transition: transform 0.3s ease; display: inline-block;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'" href="https://awplife.com/demo/instagram-feed-gallery-premium/instagram-feed-gallery-mosaic/" target="_new"><img style="width: 160px; border-radius: 8px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);" src="<?php echo esc_url(IFGP_PLUGIN_URL . '/img/mosaic.jpg'); ?>" alt="Mosaic Layout" title="View Mosaic Demo" /></a>
											<a style="transition: transform 0.3s ease; display: inline-block;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'" href="https://awplife.com/demo/instagram-feed-gallery-premium/instagram-carousel-layout/" target="_new"><img style="width: 160px; border-radius: 8px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);" src="<?php echo esc_url(IFGP_PLUGIN_URL . '/img/carousel-layout.png'); ?>" alt="Carousel Layout" title="View Carousel Demo" /></a>
											<a style="transition: transform 0.3s ease; display: inline-block;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'" href="https://awplife.com/demo/instagram-feed-gallery-premium/instagram-post-layout/" target="_new"><img style="width: 160px; border-radius: 8px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);" src="<?php echo esc_url(IFGP_PLUGIN_URL . '/img/post-layout.png'); ?>" alt="Post List Layout" title="View Post List Demo" /></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="ifgp-panel igp_pannel_bottom">
						<div class="ifgp-row ifgp-panel-body ifgp-align-items-center" style="background: rgba(255,255,255,0.05); display: flex !important; justify-content: flex-end !important;">
							<div class="ifgp-col-md-12" style="display: flex !important; justify-content: flex-end !important; text-align: right !important;">
								<button type="button" class="igp_button button_1" onclick="IgpGetShortcode()" style="background: #fff; color: #cd2757; letter-spacing: 1px; padding: 12px 30px; margin-left: auto !important;"><?php esc_html_e('Generate Shortcode', 'wp-instagram-feed-awplife'); ?></button>
							</div>
						</div>
						<div class="ifgp-modal" id="insta-shortcode-modal">
							<div class="ifgp-modal-dialog">
								<div class="ifgp-modal-content">
									<div class="ifgp-modal-header">
										<h4 class="ifgp-modal-title" id="modal-new-ticket-label"><?php esc_html_e('Instagram Feed Gallery Premium Shortcode', 'wp-instagram-feed-awplife'); ?></h4>
										<button type="button" class="ifgp-close" data-ifgp-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									</div>
									<div class="ifgp-modal-body ifgp-text-center">
										<textarea id="awl-shortcode" readonly rows="13" cols="120" style="width: 100%; font-size: 15px;">
										</textarea>
										<div class="ifgp-tooltip-trigger ifgp-text-center" id="ifgp-copy-trigger">
											<button type="button" class="igp_button button_1" title="Copied" onclick="ifgp_copy_shortcode()"><i class="fa fa-copy" aria-hidden="true"></i> <?php esc_html_e('Copy Shortcode', 'wp-instagram-feed-awplife'); ?></button>
											<span class="ifgp-tooltip-text"><?php esc_html_e('Copied!', 'wp-instagram-feed-awplife'); ?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="ifgp-col-md-3">
		<div class="postbox-container" style="margin-top:20px; margin-bottom:10px;">
			<div class="meta-box-sortables ui-sortable">
				<div class="postbox">
					<div class="postbox-header">
						<h2 class="hndle ui-sortable-handle" style="font-size: 16px; text-align: center;"><?php esc_html_e('Our Themes', 'wp-instagram-feed-awplife'); ?></h2>
						<div class="handle-actions hide-if-no-js"></div>
					</div>
					<div class="inside" style="padding: 0 6px 0px; line-height: 1.4; font-size: 13px;">
						<a href="https://awplife.com/premium-wordpress-themes/" target="_new"><img src="<?php echo esc_url(IFGP_PLUGIN_URL . '/img/Premium-wordpress-themes.jpg'); ?>" class="ifgp-img-fluid"></a>
					</div>
				</div>
			</div>
			<div class="postbox ">
				<h2 style="font-size: 16px; padding: 10px; border-bottom: 1px solid #c3c4c7;"><?php esc_html_e('Rate Our Plugin', 'wp-instagram-feed-awplife'); ?></h2>
				<div class="inside">
					<div style="text-align:center">
						<p><?php
						/* translators: 1: HTML bold start tag, 2: HTML bold end tag */
						printf(esc_html__('If you like our plugin then please %1$sRate us%2$s on WordPress', 'wp-instagram-feed-awplife'), '<b>', '</b>');
						?></p>
					</div>
					<div style="text-align:center">
						<span class="dashicons dashicons-star-filled"></span>
						<span class="dashicons dashicons-star-filled"></span>
						<span class="dashicons dashicons-star-filled"></span>
						<span class="dashicons dashicons-star-filled"></span>
						<span class="dashicons dashicons-star-filled"></span>
					</div>
					<br>
					<div style="text-align:center">
						<a href="https://wordpress.org/support/plugin/wp-instagram-feed-awplife/reviews/" target="_new" class="button button-primary button-large" style="background: #cd2757; border:none; text-shadow: none;"><span class="dashicons dashicons-heart" style="line-height:1.4;"></span> <?php esc_html_e('Please Rate Us', 'wp-instagram-feed-awplife'); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>