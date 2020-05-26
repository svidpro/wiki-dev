# Event & template for mail

## Event

```php
<?
AddEventHandler("main", "OnAfterUserRegister", Array("MyClassRegMail", "OnAfterUserRegisterHandler"));
class MyClassRegMail
{
	function OnAfterUserRegisterHandler(&$arFields)
	{
		$arEventFields= array(
			"LOGIN" => $arFields["LOGIN"],
			"NAME" => $arFields["NAME"],
			"LAST_NAME" => $arFields["LAST_NAME"],
			"PASSWORD" => $arFields["PASSWORD"],
			"EMAIL" => $arFields["EMAIL"],
		);
		CEvent::Send("REG_USER_BOOKING", SITE_ID, $arEventFields);
	}
}
?>
```

## Template

```html
<style>
		body
		{
			font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
			font-size: 14px;
			color: #000;
		}
	</style>
<table cellpadding="0" cellspacing="0" width="850" style="background-color: #d1d1d1; border-radius: 2px; border:1px solid #d1d1d1; margin: 0 auto;" border="1" bordercolor="#d1d1d1">
<tbody>
<tr>
	<td height="83" width="850" bgcolor="#eaf3f5" style="border: none; padding-top: 23px; padding-right: 17px; padding-bottom: 24px; padding-left: 17px;">
		<table cellpadding="0" cellspacing="0" width="100%">
		<tbody>
		<tr>
			<td bgcolor="#ffffff" height="75" style="font-weight: bold; text-align: center; font-size: 26px; color: #0b3961;">
				 Регистрация на сайте «XXXXXX» <br>
 <img src="https://xxxxxx.xx/bitrix/templates/name/images/xxx.png">
			</td>
		</tr>
		<tr>
			<td bgcolor="#bad3df" height="11">
			</td>
		</tr>
		</tbody>
		</table>
	</td>
</tr>
<tr>
	<td width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; padding-right: 44px; padding-bottom: 16px; padding-left: 44px;">
		<p style="margin-top:30px; margin-bottom: 28px; font-weight: bold; font-size: 19px;">
			 Уважаемый(ая) #NAME# #LAST_NAME#!
		</p>
		<p>
			 Благодарим Вас за регистрацию на сайте «XXXXXX».
		</p>
		<p>
			 Ваш логин:
		</p>
		<p>
			 #LOGIN#
		</p>
		<p>
			 Ваш пароль:
		</p>
		<p>
			 #PASSWORD#
		</p>
		<p>
			 Ваш личный кабинет доступен по <a href="/personal/">адресу</a>
		</p>
	</td>
</tr>
<tr>
	<td height="40px" width="850" bgcolor="#f7f7f7" valign="top" style="border: none; padding-top: 0; padding-right: 44px; padding-bottom: 30px; padding-left: 44px;">
		<p style="border-top: 1px solid #d1d1d1; margin-bottom: 5px; margin-top: 0; padding-top: 20px; line-height:21px;">
			 С уважением,<br>
			 администрация «XXXXXX»<br>
			 E-mail : <a href="xxx@xxxx.ru" style="color:#2e6eb6;">xxx@xxxx.ru</a><br>
		</p>
	</td>
</tr>
</tbody>
</table>
```