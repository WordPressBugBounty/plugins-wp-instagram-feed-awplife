<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
@package Wp Instagram Feed Awplife
 * Plugin Name:       Social Media Feed Gallery for Instagram
 * Plugin URI:        https://awplife.com/wordpress-plugins/instagram-feed-gallery-premium/
 * Description:       Create a responsive social media feed gallery with Instagram access token. Grid layout, lightbox, shortcode support.
 * Version:           1.4.9
 * Requires at least: 5.0
 * Requires PHP:      7.0
 * Author:            A WP Life
 * Author URI:        https://profiles.wordpress.org/awordpresslife
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wp-instagram-feed-awplife
 * Domain Path:       /languages
 * License:           GPL2
 */

if ( ! class_exists( 'Instagram_Feed_Awplife' ) ) {

	class Instagram_Feed_Awplife {
		
		protected $protected_plugin_api;
		protected $ajax_plugin_nonce;
		
		public function __construct() {
			$this->_constants();
			$this->_hooks();
		}
		
		protected function _constants() {
			//Plugin Version
			define( 'IFGP_PLUGIN_VER', '1.4.9' );
			
			//Plugin Text Domain
			define("IFGP_TXTDM", "wp-instagram-feed-awplife" );

			//Plugin Name
			define( 'IFGP_PLUGIN_NAME', 'wp-instagram-feed-awplife' );

			//Plugin Slug
			define( 'IFGP_PLUGIN_SLUG', 'wp-instagram-feed-awplife' );

			//Plugin Directory Path
			define( 'IFGP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

			//Plugin Directory URL
			define( 'IFGP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

			/**
			 * Create a key for the .htaccess secure download link.
			 * @uses    NONCE_KEY     Defined in the WP root config.php
			 */
			define( 'IFGP_SECURE_KEY', md5( NONCE_KEY ) );
			
		} // end of constructor function
		
		/**
		 * Setup the default filters and actions
		 */
		protected function _hooks() {
			//Load text domain
			add_action( 'init', array( $this, '_load_textdomain' ) );
			
			//add instagram type gallery menu item, change menu filter for multisite
			add_action( 'admin_menu', array( $this, 'instagram_feed_menu' ) );
		
			add_action( 'wp_enqueue_scripts', array(&$this, 'enqueue_scripts_in_header') );
		
		}// end of hook function
		
		public function enqueue_scripts_in_header() {
			wp_enqueue_script('jquery');
		}
		
		/**
		 * Loads the text domain.
		 */
		public function _load_textdomain() {
			load_plugin_textdomain( 'wp-instagram-feed-awplife', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
		}
		
		/**
		 * Adds the Instagram Feed menu item
		 */
		public function instagram_feed_menu() {
			$icon =  IFGP_PLUGIN_URL  . '/img/insta-icon.png';
			add_menu_page( 'Instagram Feed', 'Instagram Feed', 'administrator', 'wp-instagram-feed-awplife', array( $this, 'wp_instagram_feed_settings_page'), $icon , 65);
		}
		
		public function wp_instagram_feed_settings_page() {
			require_once('setting.php');
		}
		
		
	} // end of class

	/**
	 * Instantiates the Class
	 * @since     1.0
	 * @global    object	$ifgp_gallery_object
	 */
	$igp_gallery_object = new Instagram_Feed_Awplife();
	require_once('shortcode.php');
} // end of class exists
?>