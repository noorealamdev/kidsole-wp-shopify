<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'KidsoleHelper' ) ) {
	class KidsoleHelper {

		protected static $instance = null;

		public static function instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function initialize() {
            add_filter('theme_page_templates', [$this, 'register_custom_template_list']);
            add_filter('page_template', [$this, 'render_clinicians_custom_template']);
            add_filter('page_template', [$this, 'render_thankyou_custom_template']);
            add_filter('page_template', [$this, 'render_survey_result_custom_template']);
            // Create custom db table for thank you page survey
            add_action( 'init', [$this, 'thankyou_page_survey_table'] );
		}

        public function thankyou_page_survey_table() {
            global $wpdb;
            $table_name = $wpdb->prefix . "thankyou_survey";
            $charset_collate = $wpdb->get_charset_collate();
            $sql = "CREATE TABLE IF NOT EXISTS $table_name (
              id bigint(20) NOT NULL AUTO_INCREMENT,
              option varchar(150),
              ip varchar(150),
              PRIMARY KEY id (id)
            ) $charset_collate;";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }


        public function register_custom_template_list ($templates) {
            $templates['cliniciansform.php'] = 'Clinicians form template';
            $templates['thank-you.php'] = 'Thank you template';
            $templates['survey-result.php'] = 'Survey result template';
            return $templates;
        }

        public function render_clinicians_custom_template ($template) {
            $post = get_post();
            $page_template = get_post_meta( $post->ID, '_wp_page_template', true );
            if (basename ($page_template) == 'cliniciansform.php'){
                $template = dirname(__DIR__).'/templates/cliniciansform.php';
                return $template;
            } else {
                return $template;
            }
        }

        public function render_thankyou_custom_template ($template) {
            $post = get_post();
            $page_template = get_post_meta( $post->ID, '_wp_page_template', true );
            if (basename ($page_template) == 'thank-you.php'){
                $template = dirname(__DIR__).'/templates/thank-you.php';
                return $template;
            } else {
                return $template;
            }
        }

        public function render_survey_result_custom_template ($template) {
            $post = get_post();
            $page_template = get_post_meta( $post->ID, '_wp_page_template', true );
            if (basename ($page_template) == 'survey-result.php'){
                $template = dirname(__DIR__).'/templates/survey-result.php';
                return $template;
            } else {
                return $template;
            }
        }

	}

}