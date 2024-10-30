<?php
/**
 * @package  imazeOptimizers
 * @developer  name : Abu Sayed Russell
 */
namespace IMOP\Setup;
if (!class_exists('IMOPEnqueue')) {
	class IMOPEnqueue
	{

	    public function imop_register()
	    {
	    	if ( ( is_admin() && isset($_GET['page'])  && ( $_GET["page"] == "imop" || $_GET['page'] == 'imop' ))) {
				add_action( 'admin_enqueue_scripts', array( $this, 'imop_enqueue_script_admin' ) );
			}
			add_action( 'admin_enqueue_scripts', array( $this, 'mmwps_global_enqueue' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'imop_enqueue_script_front' ) );
	    }
	    /**
		 * Admin Script
		 * @return string
		 * Feature added by : Abu Sayed Russell <abusayedrussell@gmail.com>
		 * Date       : 19.04.2020
		*/
	    public function imop_enqueue_script_admin(){
			$suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
			if ( ( isset($_GET['page']) && ( $_GET['page'] == 'imop' || $_GET['page'] == 'imop' ))) {
				wp_enqueue_script('jquery');
				wp_enqueue_style("imop-font",  imop_plugin_url('/assets/plugins/font-awesome/css/font-awesome.min.css'), null , IMOP_VERSION);
							wp_enqueue_style("imop-reset", imop_plugin_url('/assets/css/reset.css'), null , IMOP_VERSION);
				wp_enqueue_style("imop-robot", imop_plugin_url('/assets/plugins/roboto/roboto.css'), null , IMOP_VERSION);
				wp_enqueue_style("imop-vendor", imop_plugin_url('/assets/plugins/app-build/vendor.css'), null , IMOP_VERSION);
				wp_enqueue_style("imop-animate", imop_plugin_url('/assets/plugins/notify/animate.css'), null , IMOP_VERSION);
				wp_enqueue_style("imop-main", imop_plugin_url('/assets/plugins/app-build/main.css'), null , IMOP_VERSION);
				wp_enqueue_script("imop-boots", imop_plugin_url('/assets/plugins/bootstrap/js/bootstrap.min.js'),array( 'jquery' ), IMOP_VERSION, true);
				wp_enqueue_script("imop-notify", imop_plugin_url('/assets/plugins/notify/notify.min.js'), array( 'jquery' ), IMOP_VERSION, true);			
				wp_enqueue_script("imop-main", imop_plugin_url('/assets/plugins/app-build/main.js'), array( 'jquery' ), IMOP_VERSION, true);
			}
	    }
	    /**
		 * admin_enqueue_scripts global
		 * Feature added by : Abu Sayed Russell <abusayedrussell@gmail.com>
		 * Date       : 21.04.2020
		*/
		public function mmwps_global_enqueue(){
			$suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
			wp_enqueue_style("imop-global", imop_plugin_url('/assets/plugins/app-build/global.css'), null , IMOP_VERSION);
			wp_enqueue_script("imop-global", imop_plugin_url('/assets/plugins/app-build/global.js'), array( 'jquery' ), IMOP_VERSION, true);
		}
	    /**
		 * Optimizers front-end
		 * Feature added by : Abu Sayed Russell <abusayedrussell@gmail.com>
		 * Date       : 21.04.2020
		*/
		public function imop_enqueue_script_front(){
			$suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
			wp_enqueue_script("imop-lazy", imop_plugin_url('/assets/imop-lazy-items.js'),array( 'jquery' ), IMOP_VERSION, true);
		}
	}
}