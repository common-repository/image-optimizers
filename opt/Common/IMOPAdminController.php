<?php
/**
 * @package  imazeOptimizers
 * @developer  name : Abu Sayed Russell
 */
namespace IMOP\Common;

use IMOP\Api\IMOPSettingsApi;
use IMOP\Api\Callbacks\IMOPAdminCallbacks;
use IMOP\Common\IMOPBaseController;


class IMOPAdminController extends IMOPBaseController
{

  public $settings;

  public $callbacks;

  public $pages = array();


  public function imop_register()
  {
      if ( version_compare( PHP_VERSION, '5.6.0', '>=' ) ) {
        if ( ! $this->imop_last_code() ) return;
        if ( ! $this->imop_wp_version_check() ) return;
        $this->settings = new IMOPSettingsApi();

        $this->callbacks = new IMOPAdminCallbacks();

        $this->setPages();

        $this->setSettings();

        $this->setSections();

        $this->setFields();

        $this->settings->addPages( $this->pages )->withSubPage( 'Settings' )->imop_register();
      }else{
          add_action( 'admin_notices',  'imop_php_version_error_warning');
      }
  }

  public function setPages()
  {
    $this->pages = array(
      array(
        'page_title' => 'Settings', 
    		'menu_title' => 'Image Optimizers', 
    		'capability' => 'manage_options', 
    		'menu_slug' => 'imop', 
    		'callback' => array( $this->callbacks, 'imop_setting_view' ), 
    		'icon_url' => 'dashicons-format-image', 
    		'position' => 10
      ),
      
    );
  }

  public function setSettings()
  {
    $args = array(
      array(
        'option_group' => 'imop_setting_form_settings',
        'option_name' => 'imop_for_desktop',
      ),
      array(
        'option_group' => 'imop_setting_form_settings',
        'option_name' => 'imop_for_mobile',
      ),
      array(
        'option_group' => 'imop_setting_form_settings',
        'option_name' => 'imop_for_caching',
      ),
      array(
        'option_group' => 'imop_setting_form_settings',
        'option_name' => 'imop_for_viewport',
      ),
      
      
    );

    $this->settings->setSettings($args);
  }

  public function setSections()
  {
    $args = array(
      array(
        'id' => 'imop_settings_index',
        'title' => '',
        'page' => 'imop_setting_page'
      ),
    );

    $this->settings->setSections($args);
  }

  public function setFields()
  {
    $args = array(
      array(
        'id' => 'imop_for_desktop',
        'title' => 'Enable For Desktop',
        'callback' => array($this->callbacks, 'imop_optionField'),
        'page' => 'imop_setting_page',
        'section' => 'imop_settings_index',
        'args' => array(
          'option_name' => 'imop_settings',
          'label_for' => 'imop_for_desktop',
          'placeholder' => '',
           'default'  =>   1,
           'input_type' => 'checkbox',
        )
      ),
      array(
        'id' => 'imop_for_mobile',
        'title' => 'Enable For Mobile',
        'callback' => array($this->callbacks, 'imop_optionField'),
        'page' => 'imop_setting_page',
        'section' => 'imop_settings_index',
        'args' => array(
          'option_name' => 'imop_settings',
          'label_for' => 'imop_for_mobile',
          'placeholder' => '',
           'default'  =>   1,
           'input_type' => 'checkbox',
        )
      ),
      array(
        'id' => 'imop_for_caching',
        'title' => 'Enable For Caching',
        'callback' => array($this->callbacks, 'imop_optionField'),
        'page' => 'imop_setting_page',
        'section' => 'imop_settings_index',
        'args' => array(
          'option_name' => 'imop_settings',
          'label_for' => 'imop_for_caching',
          'placeholder' => '',
           'default'  =>   1,
           'input_type' => 'checkbox',
        )
      ),
      array(
        'id' => 'imop_for_viewport',
        'title' => 'Enable For Viewport(Distance Loading)',
        'callback' => array($this->callbacks, 'imop_optionField'),
        'page' => 'imop_setting_page',
        'section' => 'imop_settings_index',
        'args' => array(
          'option_name' => 'imop_settings',
          'label_for' => 'imop_for_viewport',
          'placeholder' => '',
           'default'  =>   10,
           'input_type' => 'number',
        )
      ),
    );

    $this->settings->setFields($args);
  }
}