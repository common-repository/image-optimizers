<?php

/**
 * Trigger this file on Plugin uninstall
 *
 * @package  imazeOptimizers
 */

/** Exit if uninstall.php is not called by WordPress. */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
}
function imop_remove_data() {
	delete_option('imop_version');
	delete_option('imop_wp_design');
	delete_option('imop_setting_data');
}
imop_remove_data();