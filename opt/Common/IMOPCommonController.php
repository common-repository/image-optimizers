<?php
/**
 * @package  imazeOptimizers
 * @developer  name : Abu Sayed Russell
 */
namespace IMOP\Common;

if (!class_exists('IMOPCommonController')) {
	
	class IMOPCommonController{
		
		public function imop_register()
		{
			add_filter( "plugin_action_links_" . IMOP_PLUGIN_BASE, array( $this, 'imop_settings_link' ) );
			add_action( 'wp_head', array( $this, 'imop_developer' ) );
			add_filter('the_generator', array( $this,'imop_remove_version'));
			add_action( 'admin_notices', array( $this, 'imop_wp_version_error_warning'));
		}
		/**
		 * Setting Link
		 * Feature added by : Abu Sayed Russell abusayedrussell@gmail.com
		 * Date       : 15.04.2020
		*/
		public function imop_settings_link( $links )
		{
			$imop_base = plugin_basename( __FILE__ );
			$settings_link = '<a href="admin.php?page=imop" title="Plugin Setting">Settings</a>';
			array_push( $links, $settings_link );
			 
			$imop_base = '<a href="https://www.paypal.me/donate786p" target="_blank" title="Donate">'.esc_html__( 'Donate', 'imop' ).'</a>';
            array_push( $links, $imop_base );

			return $links;
		}
		/**
		 * WP version check
		 * Feature added by : Abu Sayed Russell abusayedrussell@gmail.com
		 * Date       : 15.04.2020
		*/
		public function imop_wp_version_error_warning( ) {
			$wp_version = get_bloginfo( 'version' );

			if ( ! version_compare( $wp_version, IMOP_WP_VERSION, '<' ) ) {
				return;
			}

		?>
		<div class="notice notice-warning imop-warning">
		<p><?php
			echo sprintf(
				__( '<strong>Post slider %1$s requires WordPress %2$s or higher to work properly.</strong> Please <a href="%3$s">update WordPress</a> first.', 'posr-slider' ),
				IMOP_VERSION,
				IMOP_WP_VERSION,
				admin_url( 'update-core.php' )
			);
		?></p>
		</div>
		<?php }
		/**
		 * Developer information
		 * Feature added by : Abu Sayed Russell abusayedrussell@gmail.com
		 * Date       : 15.04.2020
		*/
		public function imop_developer()
		{
			echo '<!-- Image Optimisers Developed by Abu Sayed Russell Email: abusayedrussell@gmail.com -->';
		}
		/**
		 * Remove version
		 * Feature added by : Abu Sayed Russell abusayedrussell@gmail.com
		 * Date       : 15.04.2020
		*/
		public function imop_remove_version() {
			return '';
		}
	}
}