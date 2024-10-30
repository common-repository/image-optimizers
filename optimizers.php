<?php
/**
 * @package  imazeOptimizers
 */
/*
Plugin Name: Image Optimizers
Plugin URI: https://creativestheme.com
Description: Excellent Image Optimizer! A practical image optimizer plug-in that works well with great flexibility.
Version: 1.0.2
Author: Abu Sayed Russell
Author URI: https://facebook.com/abu.sayed.russell.036
License: GPLv3 or later
Domain Path: /languages/
Text Domain: imop
*/

// If this file is called firectly, abort!!!
defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

/**
* Constant
* Feature added by : Abu Sayed Russell <abusayedrussell@gmail.com>
* Date       : 19.04.2020
*/
if (!defined("IMOP_VERSION"))
    define("IMOP_VERSION", '1.0.5');

if (!defined("IMOP_WP_VERSION"))
    define("IMOP_WP_VERSION", '5');

if (!defined("IMOP_PHP_VERSION"))
    define("IMOP_PHP_VERSION", '5.6.0');

if (!defined("IMOP_FILE"))
    define("IMOP_FILE", __FILE__);

if (!defined("IMOP_PLUGIN_BASE"))
    define("IMOP_PLUGIN_BASE", plugin_basename(IMOP_FILE));

if (!defined("IMOP_PLUGIN_DIR_PATH"))
    define("IMOP_PLUGIN_DIR_PATH", plugin_dir_path(IMOP_FILE));

if (!defined("IMOP_PLUGIN_DIR_URL"))
    define("IMOP_PLUGIN_DIR_URL", plugin_dir_url(IMOP_FILE));
// Require once the Composer Autoload
if ( version_compare( PHP_VERSION, IMOP_PHP_VERSION, '>=' ) ) {
    require_once ( IMOP_PLUGIN_DIR_PATH . '/vendor/autoload.php' );
}else{
    add_action( 'admin_notices',  'imop_php_version_error_warning');
}

function imop_php_version_error_warning( ) {
        $php_version = phpversion();
         ?>
        <div class="notice notice-warning mmwps-warning">
         <p><?php echo sprintf( __("Your current PHP version is <strong> $php_version </strong>. You need to upgrade your PHP version to <strong> ".IMOP_PHP_VERSION." or later</strong> to run Image Optimizers.", "imop" ) ); ?></p>
        </div>
    <?php
}

/**
 * The code that runs during plugin activation
 */
if ( version_compare( PHP_VERSION, IMOP_PHP_VERSION, '>=' ) ) {
    function imop_active_wpdesign() {
    	IMOP\Setup\IMOPActivate::imop_activatePluginFlush();
    }
    register_activation_hook( __FILE__, 'imop_active_wpdesign' );
}
/**
 * The code that runs during plugin deactivation
 */
if ( version_compare( PHP_VERSION, IMOP_PHP_VERSION, '>=' ) ) {
    function imop_deactivate_wpdesign() {
    	IMOP\Setup\IMOPDeactivate::imop_deactivatePluginFlash();
    }
    register_deactivation_hook( __FILE__, 'imop_deactivate_wpdesign' );
}
/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'IMOP\\IMOP' ) ) {
	IMOP\IMOP::imop_registerServices();
}