# События

```php
<?
use Bitrix\Main,
	Bitrix\Sale,
	Bitrix\Main\Event;

$eventHandler = Main\EventManager::getInstance();
?>
```

- [Работа с заказом D7](https://mrcappuccino.ru/blog/post/work-with-order-bitrix-d7)
- [Работа с корзиной D7](https://mrcappuccino.ru/blog/post/work-with-basket-bitrix-d7)

## События интернет магазин D7

- [Cобытия модуля Интернет-магазин](https://dev.1c-bitrix.ru/api_d7/bitrix/sale/events/index.php)

### События заказа

- [События на сохранение заказа](https://dev.1c-bitrix.ru/api_d7/bitrix/sale/events/order_saved.php)

Обновление названия товара определенного типа дополнительных работ.<br>
Задача уточнить название концепции, по которой делается дополнительная работа.<br>
При стандартной интгерации сайта и Б24 удобно дозаписать нужную информацию в название товара.<br> 
```php
<?
$eventHandler->addEventHandler('sale','OnSaleOrderSaved','updateNameProductForB24');
function updateNameProductForB24(Main\Event $event)
{
	/** @var Order $order */
	$order = $event->getParameter("ENTITY");

	/** @var Basket $basket */
	$basket = $order->getBasket();

	foreach ($basket as $basketItem)
	{
		$basketPropertyCollection = $basketItem->getPropertyCollection();
		$arProperty = $basketPropertyCollection->getPropertyValues();
		
		// условие обновления
		if (in_array($arProperty["TYPE_OF_MERCH"]["VALUE"], ["REWORK", "ACTORS", "CHECKLIST"])
			&& $arProperty["UPDATE_NAME"]["VALUE"] != "Y"
		)
		{
			$productName = $basketItem->getField('NAME');
			$conceptName = $arProperty["CONCEPT_NAME"]["VALUE"];
			$conceptID = $arProperty["CONCEPT_ID"]["VALUE"];

			$basketItem->setField('NAME', $productName . " - " . $conceptName . " (" . $conceptID . ")");
			$basketItem->save();

			// сохраняем все имеющиеся свойства
			foreach ($arProperty as $property)
			{
				$setProperty[] = [
					'NAME' => $property["NAME"],
					'CODE' => $property["CODE"],
					'VALUE' => $property["VALUE"],
					'SORT' => $property["SORT"],
					'XML_ID' => $property["XML_ID"],
				];
			}
			
			// добавляем новое свойство
			$setProperty[] = [
				'NAME' => 'Обновление названия для Б24',
				'CODE' => 'UPDATE_NAME',
				'VALUE' => 'Y',
				'SORT' => 10000,
			];

			$basketPropertyCollection->setProperty($setProperty);
			$basketPropertyCollection->save();
		}
	}

	return new Main\EventResult(Main\EventResult::SUCCESS);
}
?>
```

### События корзины

- [События сохранения корзины](https://dev.1c-bitrix.ru/api_d7/bitrix/sale/events/basket_saved.php)

Просмотр названия и свойств товара
```php
<?
$eventHandler->addEventHandler('sale','OnSaleBasketSaved','myFunction');
function myFunction(Main\Event $event)
{
	/** @var Basket $basket */
	$basket = $event->getParameter("ENTITY");

	foreach ($basket as $basketItem)
	{
		$productName = $basketItem->getField('NAME');
		Main\Diag\Debug::writeToFile($productName);
		
		$basketPropertyCollection = $basketItem->getPropertyCollection();
		$arProperty = $basketPropertyCollection->getPropertyValues();
		Main\Diag\Debug::writeToFile($arProperty);

		$basketItem->setField('NAME', 'Новое название товара');
		$basketItem->save();
	}

	return new Main\EventResult(Main\EventResult::SUCCESS);
}
?>
```