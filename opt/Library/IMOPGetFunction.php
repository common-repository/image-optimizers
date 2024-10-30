<?php
/**
 * @package  imazeOptimizers
 * @developer  name : Abu Sayed Russell
 */
namespace IMOP\Library;

if (!class_exists('IMOPGetFunction')) {

	class IMOPGetFunction {
		/**
		 * Enable Mobile
		 * @return Desktop
		 * Feature added by : Abu Sayed Russell <abusayedrussell@gmail.com>
		 * Date       : 19.04.2020
		*/
		public static function imop_last_code_desktop_enable(){
			$imoploadEnableOption  = get_option( 'imop_setting_data' ) ? : array();
	      	$laodenable = isset($imoploadEnableOption[1]["imop_for_desktop"]) ? $imoploadEnableOption[1]["imop_for_desktop"]: 1;
	      	return $laodenable;
		}
		/**
		 * Enable Mobile
		 * @return string
		 * Feature added by : Abu Sayed Russell <abusayedrussell@gmail.com>
		 * Date       : 19.04.2020
		*/
		public static function imop_last_code_mobile_enable(){
			$imopmobileEnableOption  = get_option( 'imop_setting_data' ) ? : array();
	      	$enablemobile = isset($imopmobileEnableOption[1]["imop_for_mobile"]) ? $imopmobileEnableOption[1]["imop_for_mobile"]: 1;
	      	return $enablemobile;
		}
		/**
		 * Enable Caching
		 * @return string
		 * Feature added by : Abu Sayed Russell <abusayedrussell@gmail.com>
		 * Date       : 19.04.2020
		*/
		public static function imop_last_code_caching_enable(){
			$imopcachingEnableOption  = get_option( 'imop_setting_data' ) ? : array();
	      	$enablecaching = isset($imopcachingEnableOption[1]["imop_for_caching"]) ? $imopcachingEnableOption[1]["imop_for_caching"]: 1;
	      	return $enablecaching;
		}
		/**
		 * Enable Mobile
		 * @return string
		 * Feature added by : Abu Sayed Russell <abusayedrussell@gmail.com>
		 * Date       : 19.04.2020
		*/
		public static function imop_last_code_viewport_enable(){
			$imopviewportEnableOption  = get_option( 'imop_setting_data' ) ? : array();
	      	$enableviewport = isset($imopviewportEnableOption[1]["imop_for_viewport"]) ? $imopviewportEnableOption[1]["imop_for_viewport"]: 1;
	      	return $enableviewport;
		}
	}
}