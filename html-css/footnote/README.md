# Footnote

- [пример](http://shpargalkablog.ru/2015/07/footnote.html)
- [Accessible Footnotes with CSS](https://www.sitepoint.com/accessible-footnotes-css/)

```html

<style>
article {
  counter-reset: footnotes; /* создать счётчик */ 
}
[id^="ref"] {
  counter-increment: footnotes; /* указать, что каждая ссылка, чей id начинается "ref", прибавляет к счётчику единицу */ 
  text-decoration: none; /* убрать подчёркивание */ 
}
[id^="ref"]:after {
  content: '[' counter(footnotes) ']'; /* показать цифру на счётчике в скобках */ 
  vertical-align: super; /* поместить на линию верхнего индекса */ 
  font-size: 60%; /* уменьшить шрифт цифры */ 
  margin-left: .1em;
}
[href^="#ref"] {
  text-decoration: none;
}
[id^="node"]:target,
[id^="ref"]:target { /* изменить фон элемента при переходе к id */ 
  background: LightBlue;
}
footer {
  border-top: 1px solid silver; /* горизонтальная линия */ 
  font-size: 80%; /* уменьшить шрифт под горизонтальной линией */ 
}
</style>

<article>
  <h3>CSS сноски</h3>
  <p>Нумеровать CSS сноски нет необходимости. Это сделано с помощью <a href="#node-1" id="ref-1">нумерованного списка</a> и <a href="#node-2" id="ref-2">CSS счётчика</a>. Также тут использована разметка <a href="#node-3" id="ref-3">HTML5</a>.
  <footer>
    <ol>
      <li id="node-1"><a href="#ref-1">↩</a> Согласно w3.org рядом с пунктом &lt;li&gt;, находящимся внутри списка &lt;ol&gt;, браузер должен проставлять порядковый номер.
      <li id="node-2"><a href="#ref-2">↩</a> CSS счётчик определяет порядковый номер тега внутри указанного родителя, а псевдоэлемент показывает это число.
      <li id="node-3"><a href="#ref-3">↩</a> Тег &lt;footer&gt; может использоваться на странице более одного раза, а &lt;li&gt; может не иметь закрывающегося тега.
    </ol>
  </footer>
</article>

```