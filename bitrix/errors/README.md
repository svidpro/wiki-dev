# ERRORS

- Uncaught ReferenceError: BX is not defined

```php
<?
CUtil::InitJSCore();
CJSCore::Init(array("fx"));
CJSCore::Init(array('ajax'));
CJSCore::Init(array("popup"));

$APPLICATION->ShowHead();
?>
```