# .htaccess (ссылки и снипеты)

- Ссылки на полезные источники по htaccess
    - [Полезные хаки и сниппеты для .htaccess](https://habr.com/ru/post/165701/)
    - [Директива Default_charset](https://profiphp.ru/directives/default_charset.html)
    - [Использование файлов .htaccess (Битрикс "Курс для хостеров")](https://dev.1c-bitrix.ru/learning/course/?COURSE_ID=32&LESSON_ID=3295)
- Доступ к разделу по IP
```
order deny,allow 
deny from all 
allow from xx.xxx.xxx.xxx
```

- 301 редирект для групп страниц
    - строки создаются через excel функцией СЦЕПИТЬ, соединением двух столбцов что переадресовывать и куда + добавление в начало Redirect 301
    - ```=СЦЕПИТЬ("Redirect 301";" ";A1;" ";B1)``` 
    - [Скачать пример xlsx](https://yadi.sk/i/M_nWCEC5GEL56g)
```
<IfModule mod_rewrite.c>
  Options +FollowSymLinks
  RewriteEngine On

  Redirect 301 /test/ /new/test/
</IfModule>
```