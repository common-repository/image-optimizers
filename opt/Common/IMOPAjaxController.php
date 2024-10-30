<?php
/**
 * @package  imazeOptimizers
 * @developer  name : Abu Sayed Russell
 */
namespace IMOP\Common;
class IMOPAjaxController{
	
	public function imop_register()
    {
        add_action( 'wp_ajax_imop_setting_action', array( $this, 'imop_ajax_handler' ) );
    }
    /**
	 * Setting Data option
	 * @return string
	 * Feature added by : Abu Sayed Russell <abusayedrussell@gmail.com>
	 * Date       : 19.04.2020
	*/
	private function imop_setting_options($data, $key = null) {
		global $imop_data;
		if (empty($data))
		return;

		if ($key != null) { 
			update_option('imop_setting_data',array($key, $data));
		} else { 
			foreach ( $data as $k=>$v ) {
				if (!isset($imop_data[$k]) || $imop_data[$k] != $v) {
					update_option('imop_setting_data',array($k, $v));
				} else if (is_array($v)) {
					foreach ($v as $key=>$val) {
						if ($key != $k && $v[$key] == $val) {
						update_option('imop_setting_data',array($k, $v));
						break;
						}
					}
				}
			}
		}
	}
	/**
	 * Setting Save Handler
	 * @return string
	 * Feature added by : Abu Sayed Russell <abusayedrussell@gmail.com>
	 * Date       : 19.04.2020
	*/
    public function imop_ajax_handler()
	{
		$nonce = sanitize_text_field($_POST['security']);
		if (! wp_verify_nonce($nonce, 'imop_setting_nonce') ) die('-1');
		$save_type = $_POST['type'];

		if ($save_type == 'save_imop_setting')
		{
			wp_parse_str($_POST['data'], $imop_data);
			unset($imop_data['security']);
			self::imop_setting_options($imop_data);
			die('1');
		}
		die();
	}
}
