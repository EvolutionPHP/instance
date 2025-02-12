<?php
namespace EvolutionPHP\Instance;
/**
 * @template T of object
 *
 */
class Instance
{
	static private $serviceList = [];
	/**
	 * @param class-string<T>|T $className Either a string containing the name of
	 * @param array|null $arguments
	 * @return T
	 * @throws \Exception
	 */
	static function get($className)
	{
		if(!array_key_exists($className, self::$serviceList)) {
			return self::register($className);
		}
		return self::$serviceList[$className];
	}

	/**
	 * @param class-string<T>|T $className Either a string containing the name of
	 * @param array|null $arguments
	 * @return T
	 * @throws \Exception
	 */
	static function register($className, $arguments = null)
	{
		if(!class_exists($className)){
			throw new \Exception('Class "' . $className . '" not found');
		}
		if(is_null($arguments)) {
			$class = new $className();
		}else{
			$class = new $className(...$arguments);
		}
		self::$serviceList[$className] = $class;
		return self::$serviceList[$className];
	}
}