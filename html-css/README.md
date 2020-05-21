# HTML & CSS решения

- ресайз видео под ширину экрана (при вставке через iframe) [статья](https://html5book.ru/adaptivnoe-video/)
```
.video-wrap {
	position: relative;
	padding-bottom: 56.25%; /* задаёт высоту контейнера для 16:9 (если 4:3 — поставьте 75%) */
	height: 0;
	overflow: hidden;
}
.video-wrap iframe {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	border-width: 0;
	outline-width: 0;
}
```

- [Box-Shadow CSS3: тень блока (примеры)](https://prowebmastering.ru/box-shadow.html)<br>
Легкая тень
```
box-shadow: 0 0 10px 5px rgba(221, 221, 221, 1);
```

- пустой HTML шаблон
```html
<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>HTML5</title>
  <!--[if IE]>
   <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <style>
   article, aside, details, figcaption, figure, footer,header,
   hgroup, menu, nav, section { display: block; }
  </style>
 </head>
 <body>
  <p>Привет, мир</p>
 </body>
</html>
```

- ```min-height: 100vh;``` - по высоте экрана