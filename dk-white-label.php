<?php
/*
 * Plugin Name: DK White Label
 * Version: 0.1
 * Plugin URI: 
 * Description: White Label WordPress Admin 
 * Author: Emili Castells
 * Author URI: http://www.dinamiko.com
 * Requires at least: 3.9
 * Tested up to: 4.4.2
 *
 * Text Domain: dkwl
 * Domain Path: /languages/
 */

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'DKWL' ) ) {

	final class DKWL {

		private static $instance;

		public static function instance() {

			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof DKWL ) ) {
				self::$instance = new DKWL;
				self::$instance->setup_constants();
				add_action( 'plugins_loaded', array( self::$instance, 'dkwl_load_textdomain' ) );								
				self::$instance->includes();	
			}

			return self::$instance;

		}

		public function dkwl_load_textdomain() {

			load_plugin_textdomain( 'dkwl', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 

		}

		private function setup_constants() {

			if ( ! defined( 'DKWL_VERSION' ) ) { define( 'DKWL_VERSION', '0.1' ); }
			if ( ! defined( 'DKWL_PLUGIN_DIR' ) ) { define( 'DKWL_PLUGIN_DIR', plugin_dir_path( __FILE__ ) ); }
			if ( ! defined( 'DKWL_PLUGIN_URL' ) ) { define( 'DKWLPLUGIN_URL', plugin_dir_url( __FILE__ ) ); }
			if ( ! defined( 'DKWL_PLUGIN_FILE' ) ) { define( 'DKWL_PLUGIN_FILE', __FILE__ ); }			

		}

		private function includes() {

			if ( is_admin() ) {

				require_once DKWL_PLUGIN_DIR . 'includes/class-dkwl-admin-api.php';
				$this->admin = new DKWL_Admin_API();

				require_once DKWL_PLUGIN_DIR . 'includes/class-dkwl-settings.php';
				$settings = new DKWL_Settings( $this );

			}

			require_once DKWL_PLUGIN_DIR . 'includes/dkwl-load-js-css.php';	
			require_once DKWL_PLUGIN_DIR . 'includes/dkwl-functions.php';

		}

		public function __clone() {
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'dkwl' ), DKWL_VERSION );
		}

		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'dkwl' ), DKWL_VERSION );
		}

	}

}

function DKWL() {

	return DKWL::instance();

}

DKWL();