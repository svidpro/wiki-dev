# Шаблоны масок ввода

## Маски с использованием jQuery плагина Masked input plugin

- [Masked input plugin (GitHub)](https://github.com/digitalBush/jquery.maskedinput)
- [Маски ввода для текстовых полей](https://snipp.ru/jquery/masked-input)
- [jQuery.Maskedinput js - документация на русском с примерами](https://webstool.ru/jquery.maskedinput.html)

```javascript
$(".birth-day").mask("99.99.9999");
$(".phone").mask("+7 (999) 999-99-99"); // Данная маска иногда вызывает потерю клиента, некоторые люди не видят +7 и пишут 8903... в итоге теряется последняя цифра телефона. 
$('.mask-phone').mask('9 (999) 999-99-99'); // Лучше использовать данную маску для ввода номера телефона
$(".mask-bik").mask('049999999'); // БИК (всегда начинается с 04)
$('.mask-kpp').mask('999999999'); // КПП
$('.mask-account').mask('99999 999 9 9999 9999999'); // Расчетный счет
$('.mask-inn').mask('9999999999?99'); // ИНН физического лиц (12 цифр) и ИНН юридического лица (10 цифр)
$('.mask-ks').mask('30199999999999999999'); // Корреспондентский счет (всегда начинается с 301)
```

## Маски с использованием Inputmask

- Inputmask [GitHub](https://github.com/RobinHerbots/Inputmask) [Demo](https://robinherbots.github.io/Inputmask/)

## Маски на Vue.js

### Данные
- vue-the-mask [GitHub](https://github.com/vuejs-tips/vue-the-mask) [Demo](https://vuejs-tips.github.io/vue-the-mask/)
- cleave.js [GitHub](https://github.com/nosir/cleave.js)
- text-mask [GitHub](https://github.com/text-mask/text-mask)
- jQuery-Mask-Plugin [GitHub](https://github.com/igorescobar/jQuery-Mask-Plugin)
- vanilla-masker [GitHub](https://github.com/fernandofleury/vanilla-masker)
- ui-mask [GitHub](https://github.com/angular-ui/ui-mask)
- inputmask-core [GitHub](https://github.com/insin/inputmask-core)
- vue-masked-input [GitHub](https://github.com/niksmr/vue-masked-input)
- v-mask [GitHub](https://github.com/probil/v-mask)
- awesome-mask [GitHub](https://github.com/moip/awesome-mask)
- string-mask [GitHub](https://github.com/the-darc/string-mask)
- PureMask.js [GitHub](https://github.com/romulobrasil/PureMask.js)
- vue-mask [GitHub](https://github.com/devindex/vue-mask)

### Валюта
- v-money [GitHub](https://github.com/vuejs-tips/v-money)
- jquery-maskmoney [GitHub](https://github.com/plentz/jquery-maskmoney)
- autoNumeric [GitHub](https://github.com/autoNumeric/autoNumeric)
- Jquery-Price-Format [GitHub](https://github.com/flaviosilveira/Jquery-Price-Format)
- vue-numeric [GitHub](https://github.com/kevinongko/vue-numeric)