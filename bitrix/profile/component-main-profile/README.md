# Component main.register

## Include component

Add custom property for control blocks input.

```php
<?$APPLICATION->IncludeComponent(
	"bitrix:main.profile", 
	"", 
	Array(
		"CHECK_RIGHTS" => "N",
		"SEND_INFO" => "N",
		"SET_TITLE" => "Y",
		"USER_PROPERTY" => array(""),// for example, UF_ORG_INN
		"USER_PROPERTY_NAME" => "",
		// custom params
		"INCLUDE_FORUM" => "N",
		"INCLUDE_BLOG" => "N",
		"INCLUDE_LEARNING" => "N",
		"INCLUDE_IS_ADMIN" => "N",
		"INCLUDE_WORK_INFO" => "N",
		"INCLUDE_PERSONAL_INFO" => "N",
	),
	false
);?>
```

## Template with upgrade

[Template](./template.php)