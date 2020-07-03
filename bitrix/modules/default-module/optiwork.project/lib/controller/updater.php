<?php
/**
 * Created by Optiwork / Ivan Svidinsky
 * Site: https://optiwork.ru/
 * Date: 15.03.2020 9:06
 */

namespace Optiwork\Project\Controller;

use Bitrix\Main\Diag\Debug,
	Bitrix\Main\Engine\Controller,
	Bitrix\Main\Engine\ActionFilter\Authentication;

class Updater extends Controller
{
	public function configureActions()
	{
		$arConfigure = [
			'apply' => [
				'-prefilters' => [
					Authentication::class, // выполнение ajax запросов для неавторизированных пользователей
				],
			]
		];

		return $arConfigure;
	}

	public function applyAction()
	{
		$arRequest = $this->getRequest()->getPostList()->toArray();
		Debug::writeToFile('$arRequest');
		Debug::writeToFile($arRequest);

		return ['response' => 'success'];
	}
}