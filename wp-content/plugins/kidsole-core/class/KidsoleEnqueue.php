<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'KidsoleEnqueue' ) ) {
	class KidsoleEnqueue {

		protected static $instance = null;

		public static function instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function initialize() {
			add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts'] );
		}

		public function enqueue_scripts() {
			// CSS
			wp_enqueue_style('kidsole-bootstrap', KIDSOLE_URL . 'assets/css/bootstrap.min.css' );
			wp_enqueue_style('kidsole-core-style', KIDSOLE_URL . 'assets/css/kidosle-core.css' );

			// JS
			wp_enqueue_script('bootstrap-bundle', KIDSOLE_URL . 'assets/js/bootstrap-bundle.min.js', array(), '5.1.3', true);
			wp_enqueue_script('kidsole-core-script', KIDSOLE_URL . 'assets/js/kidsole-core.js', array('jquery'), '1.0.0', true);
			wp_localize_script( 'ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

		}

	}

}