```php
<?=number_format($offerResort["TOTAL_PRICE"], 0, ',', ' ')?> руб.
```


https://rextester.com/l/php
```php
<?php //php 7.2.24

$test1 = 'ООО "Рога и Копыта"';
$test2 = "ООО «Рога и Копыта»";
$test3 = "ООО 'Рога и Копыта'";
$test4 = 'ООО "Рога - Копыта"';

echo str_replace("&quot;", '"', htmlspecialchars($test1));
echo "   |   ";
echo htmlspecialchars($test2);
echo "   |   ";
echo htmlspecialchars($test3);
echo "   |   ";
echo htmlspecialchars($test4);

?>
```

```php
function preparePost($value)
{
	$data = htmlspecialchars($value);
	$data2 = iconv("UTF-8", "Windows-1251", $data);
	$data3 = str_replace("&quot;", '"', $data2);
	return $data3;
}
```