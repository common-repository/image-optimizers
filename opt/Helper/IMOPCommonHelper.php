<?php 
/**
 * @package  imazeOptimizers
 * @developer  name : Abu Sayed Russell
 */

/**
 * plugin url
 * @param  string  $path  file path
 * @return string
 * Feature added by : Abu Sayed Russell <abusayedrussell@gmail.com>
 * Date       : 18.04.2020
*/
if ( ! function_exists( 'imop_plugin_url' ) ) {
	function imop_plugin_url( $path = '' ) {
	  $url = plugins_url( $path, IMOP_FILE );

	  if ( is_ssl()
	  and 'http:' == substr( $url, 0, 5 ) ) {
	    $url = 'https:' . substr( $url, 5 );
	  }
	  return $url;
	}
}
/**
 * Setting Page Hook
 * @return string
 * Feature added by : Abu Sayed Russell <abusayedrussell@gmail.com>
 * Date       : 19.04.2020
*/
if ( ! function_exists( 'imop_admin_setting_form' ) ) {
    function imop_admin_setting_form() {
        ob_start();
        ?>
        <input type="hidden" id="security_imop" name="security" value="<?php echo wp_create_nonce( 'imop_setting_nonce' ); ?>"/>
        <form id="imop_form" method="post" action="<?php echo esc_attr( $_SERVER['REQUEST_URI'] ) ?>">
         <?php 
            settings_errors();
            settings_fields( 'imop_setting_field' );
            do_settings_sections( 'imop_setting_page' );
         ?>
         <button id="imop_save_setting" type="button" class="btn btn-info save-and-add-setting save_button save_setting"> <?php esc_html_e( 'Save Changes', 'wpdesign' ); ?></button>
        </form>
        <?php
        $output = ob_get_clean();
        echo $output;
    }
}
add_action( 'imop_admin_email_setting', 'imop_admin_setting_form', 10 );