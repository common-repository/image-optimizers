<?php
/**
 * @package  imazeOptimizers
 * @developer  name : Abu Sayed Russell
 */
namespace IMOP\Common;

class IMOPBaseController {
	
	public function imop_last_code()
	{
		$option = get_option( 'imop_wp_optimize' );
		return isset( $option ) && $option == 'last_code_imop_image' ? true : false;
	}
	public function imop_wp_version_check() {
		$wp_version = get_bloginfo( 'version' );
		return ! version_compare( $wp_version, '4.9', '<' ) ? true : false;
	} 
}