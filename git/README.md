# Использование git

- [PhpStorm подключаемся к проекту на GitHub](http://nikovit.ru/blog/phpstorm-podklyuchaemsya-k-proektu-na-github/)
- [Статья с командами](https://habr.com/ru/post/273897/)
- [Формат файла README](https://github.com/GnuriaN/format-README)

# .gitignore

- примеры файла
	- [.gitignore для Битрикса](https://tech-director.ru/blog/bitrix-full-gitignore-file/)
	- [.gitignore на GitHub](https://github.com/github/gitignore/blob/master/Ruby.gitignore)
	- [генерация gitignore.io](https://www.gitignore.io/)
	- [описание .gitignore atlassian.com](https://www.atlassian.com/git/tutorials/saving-changes/gitignore)
	- [описание .gitignore help.github.com](https://help.github.com/en/github/using-git/ignoring-files)
- Если забыл добавить .gitignore сразу в проект
	- Сама программа git всегда читает содержимое этого файла, если находит его. Если при этом она, как вы пишете, «не выполняет своих функций и не игнорирует файлы в коммите», то это потому, что файлы добавлены в индекс до того, как вы создали файл .gitignore.
	- [как это исправить](https://ru.stackoverflow.com/questions/432432/%d0%9d%d0%b5-%d0%b8%d0%b3%d0%bd%d0%be%d1%80%d0%b8%d1%80%d1%83%d1%8e%d1%82%d1%81%d1%8f-%d1%84%d0%b0%d0%b9%d0%bb%d1%8b-%d0%b2-gitignore/432895#432895)
	- ```git rm -r --cached .idea``` - удалить продукты IDE jetBrain
	- ```git commit -m "fix gitignore"```
	- либо<br>
	```git rm -rf --cached .```<br>
	  ```git add .```
- ```$ git config --global core.excludesFile ~/.gitignore``` - команда для добавления .gitignore в настройки проекта (но по идеи в настройках все сразу прописано)
- [Добавлять ли в .gitignore сам .gitignore?](https://qna.habr.com/q/443894)

# .gitmodules

- [описание](https://git-scm.com/book/ru/v2/%D0%98%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B-Git-%D0%9F%D0%BE%D0%B4%D0%BC%D0%BE%D0%B4%D1%83%D0%BB%D0%B8#r_git_submodules)
- пример
```
[submodule "xxx.ru/local/vendor/petrovich-php"]
	path = xxx.ru/local/vendor/petrovich-php
	url = https://github.com/petrovich/petrovich-php.git
```

# изменение аккаунта
- необходимо изменить место для репозиториев
- [How to Change a Git Remote's URL](https://linuxize.com/post/how-to-change-git-remote-url/)
```
git remote -v
git remote set-url origin [ваше_аккаунт]/[название_репозитория].git
```