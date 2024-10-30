<?php
/**
 * @package  imazeOptimizers
 * @developer  name : Abu Sayed Russell
 */
namespace IMOP\Setup;

if (!class_exists('IMOPDeactivate')) {
	/**
	 * Deactive Plugin
	 * @return string
	 * Feature added by : Abu Sayed Russell <abusayedrussell@gmail.com>
	 * Date       : 19.04.2020
	*/
	class IMOPDeactivate{
 		public static function imop_deactivatePluginFlash() {
			flush_rewrite_rules();
		}
	}
}