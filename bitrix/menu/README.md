# Bitrix menu

- Пример [.left.menu.php](./.left.menu.php)
- Расширенный режим редактирования: publick → "редактировать пункты меню" → "Редактировать меню в Панели управления" → "Расширенный режим"
- ```$arItem["PARAMS"]["MYNAME"]``` - параметры
- Условия
	- ```"$USER->IsAuthorized()"```, ```"CUser::IsAuthorized()"```
	- ```"CSite::InGroup(array(11,12))"```
	- ```"$APPLICATION->GetCurPage(true) != SITE_DIR.'index.php'"``` - показ на всех страницах, кроме главной
- [Документация](https://dev.1c-bitrix.ru/user_help/content/fileman/fileman/fileman_menu_edit.php)	