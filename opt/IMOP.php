<?php
/**
 * @package  imazeOptimizers
 * @developer  name : Abu Sayed Russell
 */
namespace IMOP;

final class IMOP
{
	/**
	 * Store all the classes inside an array
	 * @return array Full list of classes
	 * Feature added by : Abu Sayed Russell abusayedrussell@gmail.com
 	 * Date       : 06.04.2020
	 */
	public static function imop_getServices()
	{
		return [
			Common\IMOPAdminController::class,
			Common\IMOPCommonController::class,
			Common\IMOPAjaxController::class,
			Common\IMOPLazyController::class,
			Setup\IMOPEnqueue::class,
		];
	}

	/**
	 * Loop through the classes, initialize them,
	 * and call the imop_registerServices() method if it exists
	 * @return
	 * Feature added by : Abu Sayed Russell abusayedrussell@gmail.com
 	 * Date       : 06.04.2020
	 */
	public static function imop_registerServices()
	{
		foreach (self::imop_getServices() as $class) {
			$imop_service = self::imop_instantiate($class);
			if (method_exists($imop_service, 'imop_register')) {
				$imop_service->imop_register();
			}
		}
	}

	/**
	 * Initialize the class
	 * @param  class $class    class from the services array
	 * @return class imop_instantiate  new instance of the class
	 * Feature added by : Abu Sayed Russell abusayedrussell@gmail.com
 	 * Date       : 06.04.2020
	 */
	private static function imop_instantiate($class)
	{
		$imop_service = new $class();

		return $imop_service;
	}
}