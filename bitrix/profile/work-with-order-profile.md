# Work with order profile

```php
<?
use Bitrix\Sale;
use CSaleOrderUserProps,
    CSaleOrderUserPropsValue;
?>
```

## Профиль пользователя

- [API Класс CSaleOrderUserProps](https://dev.1c-bitrix.ru/api_help/sale/classes/csaleorderuserprops/index.php)

## Получение свойств профиля
- D7
- [bxapi](https://bxapi.ru/src/?id=357206)
```php
<?
$userProperties = Sale\OrderUserProperties::getList(
	[
		'order' => ["DATE_UPDATE" => "DESC"],
		'filter' => [
			"USER_ID" => (int)($idUser)
		],
		"select" => ["*"]
	]
)->fetchAll();

echoArray($userProperties);
?>
```

- [API](https://dev.1c-bitrix.ru/api_help/sale/classes/csaleorderuserprops/csaleorderuserprops__getlist.244c2c9f.php)
```php
<?
$db = CSaleOrderUserProps::GetList(
	["DATE_UPDATE" => "DESC"],
	["USER_ID" => $idUser],
	false,
	["nTopCount" => 1]
);
$profile = $db->Fetch();
echoArray($profile);
?>
```

## Получение свойств заказа, являющиеся профилем

- Вытащено из компонента [bitrix:sale.personal.profile.detail](https://bxapi.ru/code/2tNUjZot91AtsLL/)
```php
<?
$saleOrderUserPropertiesValue = new CSaleOrderUserPropsValue;
$userPropertiesList = $saleOrderUserPropertiesValue::GetList(
	["SORT" => "ASC"],
	["USER_ID" => (int)($idUser)],
	false,
	false,
	["ID", "CODE", "ORDER_PROPS_ID", "VALUE", "SORT", "PROP_TYPE"]
);

while ($property = $userPropertiesList->Fetch())
{
	echoArray($property);
}
?>
```

## Создание профиля

- Создаем профиль ```CSaleOrderUserProps::Add```
- Добавляем свойства заказа, которые являются профилем ```CSaleOrderUserPropsValue::Add```

```php
<?
function createProfile($personTypeID, $idUser, $personData)
{
	//создаём профиль
	//PERSON_TYPE_ID - идентификатор типа плательщика, для которого создаётся профиль
	$arProfileFields = [
		"NAME" => ($personTypeID == 2) ? "Профиль юридического лица" : "Профиль физического лица",
		"USER_ID" => $idUser,
		"PERSON_TYPE_ID" => $personTypeID
	];
	$PROFILE_ID = CSaleOrderUserProps::Add($arProfileFields);

	//если профиль создан
	if ($PROFILE_ID)
	{
		//формируем массив свойств
		if ($personTypeID == 2) // юр.лицо
		{
			$PROPS = [
				[
					"USER_PROPS_ID" => $PROFILE_ID,
					"ORDER_PROPS_ID" => 32,
					"NAME" => "Email",
					"VALUE" => $personData['EMAIL']
				],
				[
					"USER_PROPS_ID" => $PROFILE_ID,
					"ORDER_PROPS_ID" => 33,
					"NAME" => "Контактный телефон по заказу",
					"VALUE" => $personData['PHONE']
				],
				[
					"USER_PROPS_ID" => $PROFILE_ID,
					"ORDER_PROPS_ID" => 34,
					"NAME" => "ФИО контактного лица",
					"VALUE" => $personData['REG_LAST_NAME'] . ' ' . $personData['REG_NAME'],
				],
				[
					"USER_PROPS_ID" => $PROFILE_ID,
					"ORDER_PROPS_ID" => 55,
					"NAME" => "Факс",
					"VALUE" => $personData['ORG_FAX']
				],
				[
					"USER_PROPS_ID" => $PROFILE_ID,
					"ORDER_PROPS_ID" => 55,
					"NAME" => "Факс",
					"VALUE" => $personData['ORG_FAX']
				],
				// юр. данные
				[
					"USER_PROPS_ID" => $PROFILE_ID,
					"ORDER_PROPS_ID" => 49,
					"NAME" => "ИНН",
					"VALUE" => $personData['INN']
				],
				[
					"USER_PROPS_ID" => $PROFILE_ID,
					"ORDER_PROPS_ID" => 50,
					"NAME" => "КПП",
					"VALUE" => $personData['KPP']
				],
				[
					"USER_PROPS_ID" => $PROFILE_ID,
					"ORDER_PROPS_ID" => 51,
					"NAME" => "Название организации",
					"VALUE" => $personData['ORG_SHORT_NAME']
				],
				[
					"USER_PROPS_ID" => $PROFILE_ID,
					"ORDER_PROPS_ID" => 54,
					"NAME" => "Название организации (полное)",
					"VALUE" => $personData['ORG_FULL_NAME']
				],
				[
					"USER_PROPS_ID" => $PROFILE_ID,
					"ORDER_PROPS_ID" => 52,
					"NAME" => "Фактический адрес",
					"VALUE" => $personData['ORG_ADDRESS_FACT']
				],
				[
					"USER_PROPS_ID" => $PROFILE_ID,
					"ORDER_PROPS_ID" => 53,
					"NAME" => "Юридический адрес",
					"VALUE" => $personData['ORG_ADDRESS']
				],
				[
					"USER_PROPS_ID" => $PROFILE_ID,
					"ORDER_PROPS_ID" => 56,
					"NAME" => "Банковский счет",
					"VALUE" => $personData['BANK_RS']
				],
				[
					"USER_PROPS_ID" => $PROFILE_ID,
					"ORDER_PROPS_ID" => 57,
					"NAME" => "Корреспондентский счет",
					"VALUE" => $personData['BANK_KS']
				],
				[
					"USER_PROPS_ID" => $PROFILE_ID,
					"ORDER_PROPS_ID" => 58,
					"NAME" => "БИК",
					"VALUE" => $personData['BIK']
				],
				[
					"USER_PROPS_ID" => $PROFILE_ID,
					"ORDER_PROPS_ID" => 59,
					"NAME" => "Наименование банка",
					"VALUE" => $personData['BANK_NAME']
				],
			];
		}
		else // физ.лицо
		{
			$PROPS = [
				[
					"USER_PROPS_ID" => $PROFILE_ID,
					"ORDER_PROPS_ID" => 6,
					"NAME" => "Email",
					"VALUE" => $personData['EMAIL']
				],
				[
					"USER_PROPS_ID" => $PROFILE_ID,
					"ORDER_PROPS_ID" => 7,
					"NAME" => "Контактный телефон по заказу",
					"VALUE" =>$personData['PHONE']
				],
				[
					"USER_PROPS_ID" => $PROFILE_ID,
					"ORDER_PROPS_ID" => 17,
					"NAME" => "ФИО контактного лица",
					"VALUE" => $personData['REG_LAST_NAME'] . ' ' . $personData['REG_NAME'],
				]
			];
		}

		//добавляем значения свойств к созданному ранее профилю
		foreach ($PROPS as $prop)
		{
			CSaleOrderUserPropsValue::Add($prop);
		}
	}
}
?>
```
