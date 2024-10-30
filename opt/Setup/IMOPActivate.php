<?php
/**
 * @package  imazeOptimizers
 * @developer  name : Abu Sayed Russell
 */
namespace IMOP\Setup;
if (!class_exists('IMOPActivate')) {
	class IMOPActivate{
		/**
		 * Active Plugin
		 * @return string
		 * Feature added by : Abu Sayed Russell <abusayedrussell@gmail.com>
		 * Date       : 19.04.2020
		*/
	    public static function imop_activatePluginFlush() {
			flush_rewrite_rules();

			$default = array();
			if ( ! get_option( 'imop_version' ) ) {
				update_option( 'imop_version', IMOP_VERSION );
			}
			if ( ! get_option( 'imop_wp_optimize' ) ) {
				update_option( 'imop_wp_optimize', 'last_code_imop_image' );
			}
			if ( ! get_option( 'imop_setting_data' ) ) {
			update_option( 'imop_setting_data', $default );
		}
		}
	}
}