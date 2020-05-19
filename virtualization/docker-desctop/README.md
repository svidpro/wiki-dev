# Установка Docker Desktop
- Sing up on [hub.docker.com](https://hub.docker.com/)
- [Install Docker Desktop on Windows](https://docs.docker.com/docker-for-windows/install/)
	- Download
	- Install
	- Enable virtualization
	- Open icon desktop docker
	- Check icon docker in [windows tray](https://c2n.me/47nbFzU.png)
- Problem: disable virtualization. 
	- [Description problem](https://docs.docker.com/docker-for-windows/troubleshoot/#virtualization-must-be-enabled)
	- Solve problem: enable virtualization
		- [How to enable virtualization](https://support.bluestacks.com/hc/ru/articles/115003174386-%D0%9A%D0%B0%D0%BA-%D0%B2%D0%BA%D0%BB%D1%8E%D1%87%D0%B8%D1%82%D1%8C-%D0%B0%D0%BF%D0%BF%D0%B0%D1%80%D0%B0%D1%82%D0%BD%D1%83%D1%8E-%D0%B2%D0%B8%D1%80%D1%82%D1%83%D0%B0%D0%BB%D0%B8%D0%B7%D0%B0%D1%86%D0%B8%D1%8E-VT-%D0%BD%D0%B0-%D0%9F%D0%9A-#%E2%80%9C5%E2%80%9D)
			- Поиск (Search) → Восстановление (Recovery) → Перезагрузить сейчас (Restart now) → Поиск и устранение неисправностей (Troubleshoot) → Дополнительные параметры (Advanced option) → Параметры встроенного ПО UEFI (UEFI Firmware Settings) → Перезагрузить (Restart)
		 	- В настройках BIOS → Расширенный режим → Настройки процессора → Виртуализация (в низу списка) (выбор через клавиатуру, так как работал колесо инвертировано)
 
 # Commands
 - [The base command for the Docker CLI](https://docs.docker.com/engine/reference/commandline/docker/)
 
# Начало работы с докером
- [Get started with Docker for Windows](https://docs.docker.com/docker-for-windows/)
	- Test your installation by commands in cmd or powerShell (but with limitations)
		- ```docker --version```
- [Samples](https://docs.docker.com/samples/)	
- Complete anything from [Docker Tutorials and Labs](https://github.com/docker/labs)

# Docker for beginners
[Docker for beginners](https://github.com/docker/labs/tree/master/beginner)<br>

## 1.0 Running your first container

[1.0 Running your first container](https://github.com/docker/labs/blob/master/beginner/chapters/alpine.md)

### Commands
- ```docker images``` - see a list of all images on your system
- ```docker pull alpine``` - fetches the alpine image from the Docker registry and saves it in our system
- ```docker run alpine ls -l``` - запустили alpine
- ```docker run alpine echo "hello from alpine"``` - отправили команду вывести строку в alpine
- ```docker run alpine /bin/sh``` - запустили и вышли из shell
- ```docker run -it alpine /bin/sh``` - запустили и остались в shell
	- Running the run command with the -it flags attaches us to an interactive tty in the container. Now you can run as many commands in the container as you want.
- ```docker ps``` - command shows you all containers that are currently running
- ```docker ps -a``` - see above is a list of all containers that you ran
- ```docker run --help``` - to see a list of all flags it supports

### Terminology
- *Images* - The file system and configuration of our application which are used to create containers. 
- *Containers* - Running instances of Docker images — containers run the actual applications.
- *Docker daemon* - The background service running on the host that manages building, running and distributing Docker containers.
- *Docker client* - The command line tool that allows the user to interact with the Docker daemon.
- *Docker Store* - A registry of Docker images, where you can find trusted and enterprise ready containers, plugins, and Docker editions.

## 2.0 Webapps with Docker

[Webapps with Docker](https://github.com/docker/labs/blob/master/beginner/chapters/webapps.md)<br>

### Commands
- ```docker run -d dockersamples/static-site``` - single-page website that was already created for this demo
- ```docker stop a7a0e504ca3e```
- ```docker rm   a7a0e504ca3e```
- ```docker run --name static-site -e AUTHOR="Your Name" -d -P dockersamples/static-site 02db973e248f```
	- ```-d``` will create a container with the process detached from our terminal
	- ```-P``` will publish all the exposed container ports to random ports on the Docker host
	- ```-e``` is how you pass environment variables to the container
	- ```--name``` allows you to specify a container name
	- ```AUTHOR``` is the environment variable name and Your Name is the value that you can pass
- ```$ docker run --name static-site-2 -e AUTHOR="Your Name" -d -p 8888:80 dockersamples/static-site``` - указываем свой порт
- 
```
docker stop static-site
docker rm static-site
docker rm -f static-site-2
```

### Docker Images
- [a git repository - images can be committed](https://docs.docker.com/engine/reference/commandline/commit/)
- ```docker search```
- ```docker pull ubuntu:12.04``` - with version
