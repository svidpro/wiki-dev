<?php
/**
 * Created by Vlads.
 * Site: https://vlads.name/
 * Date: 04.03.2019 8:16
 */

namespace Optiwork\Project\System;

use CModule;
use \Bitrix\Highloadblock\HighloadBlockTable;

class CHLOrm
{
	protected $entity_data_class = '';
	protected $sTableID = '';

	function __construct($hl_id, $param = false)
	{
		$hl_id = intVal($hl_id);
		if ($hl_id > 0)
		{
			CModule::IncludeModule('highloadblock');
			$hlblock = HighloadBlockTable::getById($hl_id)->fetch(); // получаем объект вашего HL блока
			$entity = HighloadBlockTable::compileEntity($hlblock);  // получаем рабочую сущность
			$this->entity_data_class = $entity->getDataClass(); // получаем экземпляр класса
			$entity_table_name = $hlblock['TABLE_NAME']; // присваиваем переменной название HL таблицы
			$this->sTableID = 'tbl_' . $entity_table_name; // добавляем префикс и окончательно формируем название
		}
		else
		{
			//todo:error
		}
	}

	public function getClass()
	{
		return $this->entity_data_class;
	}

	public function getList($arData)
	{
		// подготавливаем данные
		$rsData = $this->entity_data_class::getList($arData);

		// выполняем запрос. Передаем в него наши данные и название таблицы, которое мы получили в самом начале
		return $rsData;
	}

	public function add($arData)
	{
		if (empty($arData))
		{
			return false;
		}

		return $this->entity_data_class::add($arData);
	}

	public function update($id, $arData)
	{
		if (empty($arData))
		{
			return false;
		}

		return $this->entity_data_class::update($id, $arData);
	}

	public function delete($el_id)
	{
		$id = intVal($el_id);
		if ($id > 0)
		{
			$this->entity_data_class::delete($el_id);
			$return = true;
		}
		else
		{
			$return = false;
		}

		return $return;
	}

	public function deleteByFilter($arFilter)
	{
		//удаляет все элементы по фильтру
		$rsEl = $this->GetList($arFilter);
		while ($el = $rsEl->Fetch())
		{
			$this->DeleteEl($el['ID']);
		}
	}
}