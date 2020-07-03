<?
class optiwork_project extends CModule
{	
	const MODULE_ID = 'optiwork.project';
	var $MODULE_ID = 'optiwork.project';
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_CSS;
	var $strError = '';

	function __construct()
	{
		$arModuleVersion = array();
		include(dirname(__FILE__)."/version.php");
		$this->MODULE_VERSION = $arModuleVersion["VERSION"];
		$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
		$this->MODULE_NAME = "Базовый модуль для проектов.";
		$this->MODULE_DESCRIPTION = "";

		$this->PARTNER_NAME = "Optiwork";
		$this->PARTNER_URI = "https://optiwork.ru";
	}
	
	function DoInstall()
	{		
		global $APPLICATION;
		RegisterModule(self::MODULE_ID);		
	}

	function DoUninstall()
	{		
		global $APPLICATION;
		UnRegisterModule(self::MODULE_ID);	
	}
}
?>
