<?php
/**
 * @package  imazeOptimizers
 * @developer  name : Abu Sayed Russell
 */
namespace IMOP\Api\Callbacks;
class IMOPAdminCallbacks{
	
	public function imop_setting_view()
	{
		return require_once( IMOP_PLUGIN_DIR_PATH . 'views/setting_view.php');
	}
	public function imop_processSanitize( $input )
	{
		$output = get_option('imop_setting_data');

		if ( isset($_POST["remove"]) ) {
			unset($output[sanitize_text_field($_POST["remove"])]);

			return $output;
		}

		if ( count($output) == 0 ) {
			$output['imop_settings'] = $input;

			return $output;
		}

		foreach ($output as $key => $value) {
			if ('imop_settings' === $key) {
				$output[$key] = $input;
			} else {
				$output['imop_settings'] = $input;
			}
		}
		
		return $output;
	}
	
	public function imop_setting_sanitize( $input ){
		$output = esc_textarea( $input );
		return $input;
	}
	
	public function imop_optionField( $args ) {
		switch ($args['input_type']) {
			case 'text':
				$name        = esc_html($args['label_for']);
				$default        = esc_html($args['default']);
				$default_val = ( empty($default) ? '' : $default );
				$option_name = esc_html($args['option_name']);
				$value       = '';
				$imopSettingOption  = get_option( 'imop_setting_data' ) ?: array();
				$data = isset($imopSettingOption[1][$name]) ? $imopSettingOption[1][$name]: "";
				if (isset($data) && !empty($data)) {
					$value = $data;
				}else{
					$value       = $default_val;
				}

				echo '<div class="form-group"><input type="text" class="regular-text form-control" id="' . sanitize_title($name) . '" name="' . $option_name . '[' . sanitize_text_field($name) . ']" value="' . sanitize_text_field($value) . '" placeholder="' . sanitize_text_field($args['placeholder']) . '"></div>';
				break;
			case 'number':
				$name        = esc_html($args['label_for']);
				$default        = esc_html($args['default']);
				$default_val = ( empty($default) ? '' : $default );
				$option_name = esc_html($args['option_name']);
				$value       = '';
				$imopSettingOption  = get_option( 'cwpd_setting_data' ) ?: array();
				$data = isset($imopSettingOption[1][$name]) ? $imopSettingOption[1][$name]: "";
				if (isset($data) && !empty($data)) {
					$value = $data;
				}else{
					$value       = $default_val;
				}

				echo '<div class="form-group"><input type="number" class="regular-text form-control" id="' . sanitize_title($name) . '" name="' . $option_name . '[' . sanitize_text_field($name) . ']" value="' . sanitize_text_field($value) . '" placeholder="' . sanitize_text_field($args['placeholder']) . '"></div>';
				break;
			case 'checkbox':
				$name        = esc_html($args['label_for']);
				$default        = esc_html($args['default']);
				$default_val = ( empty($default) ? '' : $default );
				$option_name = esc_html($args['option_name']);
				$value       = '';
				$imopSettingOption  = get_option( 'imop_setting_data' ) ?: array();
				$data = isset($imopSettingOption[1][$name]) ? $imopSettingOption[1][$name]: "";
				if (isset($data) && !empty($data)) {
					$value = $data;
				}else{
					$value       = $default_val;
				}

				echo '<div class="form-group">
				<div class="onoffswitch">
		            <input type="' . $args['input_type'] . '" id="' . sanitize_title($name) . '" class="onoffswitch-checkbox" value="1" name="' . $option_name . '[' . sanitize_text_field($name) . ']" style="display:none;" ' . checked($data, 1, false) . '>
		            <label class="onoffswitch-label" for="' . $name . '" data-toggle="tooltip" title="Check this option to turn on the smtp auth."></label>
		        </div></div>';
				break;
			
			default:
				$name        = esc_html($args['label_for']);
				$default        = esc_html($args['default']);
				$default_val = ( empty($default) ? '' : $default );
				$option_name = esc_html($args['option_name']);
				$value       = '';
				$imopSettingOption  = get_option( 'imop_setting_data' ) ?: array();
				$data = isset($imopSettingOption[1][$name]) ? $imopSettingOption[1][$name]: "";
				if (isset($data) && !empty($data)) {
					$value = $data;
				}else{
					$value       = $default_val;
				}

				echo '<div class="form-group"><input type="' . $args['input_type'] . '" class="regular-text form-control" id="' . sanitize_title($name) . '" name="' . $option_name . '[' . sanitize_text_field($name) . ']" value="' . sanitize_text_field($value) . '" placeholder="' . sanitize_text_field($args['placeholder']) . '"></div>';
				break;
		}
	}
}
