# Настйрока VPS/VDS Linux сервера

## Создание нового пользователя

```
apt-get -y install sudo adduser
adduser www
sudo usermod -a -G sudo www
sudo service ssh restart
```

Переключаемся на нового пользователя

## Обновление системы и установка основных пакетов

Обновляем систему:<br>
```
sudo apt-get update
```

Устанавливаем пакеты:<br>
```
sudo apt-get install -y firewalld mc zsh vim mosh tmux htop git curl wget unzip zip gcc build-essential make
```

## Переключаемся на oh-my-zhc

Установка [oh-my-zsh](https://github.com/robbyrussell/oh-my-zsh)
```
sh -c "$(curl -fsSL https://raw.githubusercontent.com/robbyrussell/oh-my-zsh/master/tools/install.sh)"
```

Configure some needed aliases:

```
vim ~/.zshrc
	:colorscheme pablo
    alias cls="clear"
```
[Изменение цветовой схемы VIM](https://xakinfo.ru/os/linux/izmenenie-cvetovoj-shemy-v-vim/)

Set default shell as zsh:

```
chsh -s $(which zsh)
```

### Настройка доступа на сервер (порт SSH)

Необходимо изменить стандартный порт подключения по shh 22 на другой, чтобы откинуть левые подключения переборщиков [пример](https://c2n.me/47mb7RY.png)<br>
Пример сообщения: there was 818 failed login attempts since the last successful login<br>

[Как изменить SSH-порт в CentOS / RHEL 7/8 и Fedora с помощью SELinux](https://itsecforu.ru/2019/09/06/%F0%9F%94%A5-%D0%BA%D0%B0%D0%BA-%D0%B8%D0%B7%D0%BC%D0%B5%D0%BD%D0%B8%D1%82%D1%8C-ssh-%D0%BF%D0%BE%D1%80%D1%82-%D0%B2-centos-rhel-7-8-%D0%B8-fedora-%D1%81-%D0%BF%D0%BE%D0%BC%D0%BE%D1%89%D1%8C%D1%8E-s/)<br>
[Описание файла sshd_config](https://vds-admin.ru/ssh/nastroika-servera-ssh-vo-freebsd-fail-sshdconfig)<br>
	
#### Шаг 1: Резервное копирование текущей конфигурации SSH<br>
```
date_format=`date +%Y_%m_%d:%H:%M:%S`
sudo cp /etc/ssh/sshd_config /etc/ssh/sshd_config_$date_format
ls /etc/ssh/sshd_config*
```

#### Шаг 2: Измените порт службы SSH
```
sudo vi /etc/ssh/sshd_config
``` 

Делаем изменения в файл:
```
#Port 22 → Port 33000
```
*NOTE vim:*<br>
*i / insert → далем изменение текста → esc*<br>
*:wq - сохраняем изменения*<br>

#### Шаг 3: Разрешить новый SSH-порт в SELinux<br>
Данный шаг пропускаем, если semanager - Disabled<br>
Необходимо отдельно ознакомиться с [SELinux – описание и особенности работы с системой. Часть 1](https://habr.com/ru/company/kingservers/blog/209644/)<br>
Команды, если работают:
```sestatus``` - посмотреть статус
```getenforce``` - посмотреть статус
```setenforce``` - установить статус

#### Шаг 4: Откройте порт SSH на Firewalld

Проверяем запущена ли служба firewalld
```
systemctl status firewalld
```

Если служба firewalld не запущена, то запускаем её:<br>
```
sudo systemctl unmask firewalld
sudo systemctl enable firewalld
sudo systemctl start firewalld
```

Проверяем запуск службы<br>
```
sudo firewall-cmd --permanent --list-all
```

Открываем порт
```
sudo firewall-cmd --permanent --add-port=33000/tcp
sudo firewall-cmd --reload
```

#### Шаг 5: Перезапустите службу sshd

```
sudo systemctl restart sshd
netstat -tunl | grep 33000
```

### Настройка доступа на сервер (доступ по ключам)

Закрываем доступ для root:

```
sudo vim /etc/ssh/sshd_config
    AllowUsers www
    PermitRootLogin no
```

Настраиваем доступ по ключам

- [источник 1](https://losst.ru/avtorizatsiya-po-klyuchu-ssh)
- [источник 2](https://firstvds.ru/technology/dobavit-ssh-klyuch)
- [источник 3](https://community.vscale.io/hc/ru/community/posts/207745269-%D0%9A%D0%B0%D0%BA-%D1%81%D0%B3%D0%B5%D0%BD%D0%B5%D1%80%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D1%82%D1%8C-SSH-%D0%BA%D0%BB%D1%8E%D1%87-%D0%B4%D0%BB%D1%8F-%D0%B4%D0%BE%D1%81%D1%82%D1%83%D0%BF%D0%B0-%D0%BD%D0%B0-%D1%81%D0%B5%D1%80%D0%B2%D0%B5%D1%80)

Закрываем авторизацию по логину и паролю:

```
sudo vim /etc/ssh/sshd_config
    PasswordAuthentication no
```


## Установка пакетов под нужное окружение

Пакеты для Django (надо выделить общие пакеты после изучения, включить их в верхний список, а здесь оставить только для django, также можно отдельно выделить python блок):
```
sudo apt-get install -y tree redis-server nginx  libssl-dev zlib1g-dev libbz2-dev libreadline-dev libsqlite3-dev llvm libncurses5-dev libncursesw5-dev xz-utils tk-dev libffi-dev liblzma-dev python3-dev python-imaging python3-lxml libxslt-dev python-libxml2 python-libxslt1 libffi-dev libssl-dev python-dev gnumeric libsqlite3-dev libpq-dev libxml2-dev libxslt1-dev libjpeg-dev libfreetype6-dev libcurl4-openssl-dev supervisor
```

## Дополнительно

### Проверка оболочки
[Как определить и изменить командную оболочку (shell) в Linux](https://pingvinus.ru/note/change-shell)
- ```echo $SHELL``` и ```echo $0``` - проверить текущю оболчку
- ```cat /etc/shells``` - список всех оболочек
- ```название_оболочки``` - переключиться на оболчку
- ```chsh -s путь_новой_оболочки``` - переключиться на оболочку
- ```chsh -s /bin/sh www``` - изменить оболочку для пользователя

### Описание пакетов и команд
- ```apt-get``` для Debian [подробнее](https://linux-faq.ru/page/komanda-apt-get)
- ```yum``` - для CentOS [подробнее](https://losst.ru/ustanovka-paketov-v-centos-7)
- ```uname -a``` - посмотреть название и версию системы
- ```sudo``` - [подробнее](https://losst.ru/komanda-sudo-v-linux)
- ```useradd``` - [подробнее](https://losst.ru/kak-sozdat-polzovatelya-linux)
- ```usermod``` [подробнее](https://losst.ru/kak-dobavit-polzovatelya-v-gruppu-linux)
- ```adduser```
	- [Команды adduser и useradd](https://pingvinus.ru/note/useradd)
	- [Чем отличается adduser от useradd?](https://unixhow.com/1633/chem-otlichaetsya-adduser-ot-useradd)
- ```firewalld``` - [подробнее](https://losst.ru/nastrojka-firewall-centos-7)
	- ```systemctl status firewalld``` - проверка состояния службы firewalld
- ```mc``` - [Midnight Commander(mc)](https://www.voipnotes.ru/blog/midnight-commandermc-console-file-manager-for-linux/)
- ```finger``` - пакет для более подробного вывода информации о пользователе (```finger nameUser```, ```finger -l```) [подробнее](https://www.linuxlib.ru/manpages/FINGER.1.shtml)
- ```curl``` - [подробнее](https://losst.ru/kak-polzovatsya-curl)
- ```semanage```
- ```zsh```
	- [cli-console-tips](https://xakep.ru/2017/05/18/cli-console-tips/)
    - [zsh-config](https://creio.github.io/zsh-config/)
    - [Oh My Zsh!](https://niklan.net/blog/149)
- vim mosh tmux htop git curl wget unzip zip gcc build-essential make 
- tree redis-server nginx  libssl-dev zlib1g-dev libbz2-dev libreadline-dev libsqlite3-dev llvm libncurses5-dev libncursesw5-dev xz-utils tk-dev libffi-dev liblzma-dev python3-dev python-imaging python3-lxml libxslt-dev python-libxml2 python-libxslt1 libffi-dev libssl-dev python-dev gnumeric libsqlite3-dev libpq-dev libxml2-dev libxslt1-dev libjpeg-dev libfreetype6-dev libcurl4-openssl-dev supervisor