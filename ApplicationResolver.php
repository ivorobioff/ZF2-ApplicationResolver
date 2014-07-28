<?php
namespace Developer\ApplicationResolver;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class ApplicationResolver 
{
	static private $environment;

	static public function setEnvironmentName($name)
	{
		self::$environment = $name;
	}

	static public function is($name)
	{
		return self::$environment == $name;
	}

	static public function getEnvironmentName()
	{
		return self::$environment;
	}

	static public function modules(array $defaultModules, array $environmentSpecificModules = [])
	{
		$env = self::getEnvironmentName();

		if (isset($environmentSpecificModules[$env]))
		{
			return array_merge($defaultModules, $environmentSpecificModules[$env]);
		}

		return $defaultModules;
	}
} 