<?php
namespace Optiwork\Project;

/**
 * Settings for project
 * Class Config
 * @package Optiwork\Project
 */
class Config
{
	static private $_instance = null;

	private $dataConfig = array();

	private function __construct() {
		$this->dataConfig = $this->loadConfig();
	}

	/**
	 * @return array
	 */
	private function loadConfig()
	{
		$arConfig = [
			// группы пользователей
			"USER_GROUP_ADMIN"	=> 1,

			// инфоблоки
			"IBLOCK_ID_NAME"	=> 1,

			// хайлоады
			"HL_NAME" => 1,

			// ссылки
			"LINK_NAME_1" => "http://xxxx.ru/local/templates/xxx/xxx.jpg",
			"LINK_NAME_2" => "/var/www/u0179614/data/www/name/xxx/xxx/",
			"LINK_NAME_3" => "/xxx/xxx/",

			// свойство хххххх
			"PROPERTY_NAME_ID"  => 1,
		];

		return $arConfig;
	}

	static public function getInstance()
	{
		if (is_null(self::$_instance)) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	/**
	 * Gets a value param by key
	 *
	 * @param string $key - name param
	 * @return string|number - value param by key
	 */
	static public function get($key)
	{
		return self::getInstance()->dataConfig[$key];
	}

	private function __clone()
	{
	}

	private function __wakeup()
	{
	}
}