<?php 
/**
 * @package  imazeOptimizers
 * @developer  name : Abu Sayed Russell
 */
use IMOP\Library\IMOPGetFunction;

/**
 * Enable For Desktop
 * @return string
 * Feature added by : Abu Sayed Russell <abusayedrussell@gmail.com>
 * Date       : 19.04.2020
*/
function imop_desktop_enable(){
    return IMOPGetFunction::imop_last_code_desktop_enable();
}
/**
 * Enable For Mobile
 * @return string
 * Feature added by : Abu Sayed Russell <abusayedrussell@gmail.com>
 * Date       : 19.04.2020
*/
function imop_mobile_enable(){
    return IMOPGetFunction::imop_last_code_mobile_enable();
}
/**
 * Enable For Viewport
 * @return string
 * Feature added by : Abu Sayed Russell <abusayedrussell@gmail.com>
 * Date       : 19.04.2020
*/
function imop_viewport_enable(){
    return IMOPGetFunction::imop_last_code_viewport_enable();
}
/**
 * Enable For Caching
 * @return string
 * Feature added by : Abu Sayed Russell <abusayedrussell@gmail.com>
 * Date       : 19.04.2020
*/
function imop_caching_enable(){
    return IMOPGetFunction::imop_last_code_caching_enable();
}
?>