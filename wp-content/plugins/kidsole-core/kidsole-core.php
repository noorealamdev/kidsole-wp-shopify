<?php
/*
 * Plugin Name: Kidsole Core
 * Description: Custom plugin to work with kidsole.com Shopify store
 * Plugin URI: https://kidsole.com
 * Author: Noor-E-Alam
 * Requires PHP: 7.4
 * Version 1.0.0
*/


if (!defined('ABSPATH')) exit; // Exit if accessed directly

if ( ! class_exists( 'KidsoleShopify' ) ) {
	final class KidsoleShopify {

		/**
		 * Constructor function.
		 */
		public function __construct() {
			$this->define();
			$this->includes();
			$this->init();
		}

		public function define() {
			define( 'KIDSOLE_VER', '1.0.0' );
			define( 'KIDSOLE_DIR', plugin_dir_path( __FILE__ ) );
			define( 'KIDSOLE_URL', plugin_dir_url( __FILE__ ) );
		}

		public function includes () {
			require_once KIDSOLE_DIR . '/vendor/autoload.php';
			include_once( KIDSOLE_DIR . 'class/KidsoleEnqueue.php' );
			include_once( KIDSOLE_DIR . 'class/KidsoleHelper.php' );
			include_once( KIDSOLE_DIR . 'class/KidsolePipeDriveAPI.php' );
		}

		public function init() {
			add_action( 'plugins_loaded', [ $this, 'kidsole_shopify_init' ] );
		}

            
		public function kidsole_shopify_init() {
			//load_plugin_textdomain( 'zerosock_text_domain', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );

			// Check if Elementor installed and activated.
//            if ( ! did_action( 'elementor/loaded' ) ) {
//                return;
//            }
//
//            // Check for required Elementor version.
//            if ( ! version_compare( ELEMENTOR_VERSION, '3.0.0', '>=' ) ) {
//                return;
//            }

			// Check for required PHP version.
			if ( version_compare( PHP_VERSION, '7.4', '<' ) ) {
				return;
			}

			// Once we get here, We have passed all validation checks so we can safely run our plugin.
            

			KidsoleEnqueue::instance()->initialize();
			KidsoleHelper::instance()->initialize();
			KidsolePipeDriveApi::instance()->initialize();

		}

	}

	new KidsoleShopify();
}
