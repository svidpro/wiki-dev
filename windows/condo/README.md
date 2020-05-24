# Устнавока и настройка condo

```
choco search anaconda
choco install anaconda3 -y
```

## Condo command after .exe 

Start ```Anaconda Navigator PowerShell Prompt``` ![](./img/condo_navigator.png) 

Команды для консоли:
- ```c:\tools\Anaconda3\_conda.exe info``` check start environment
![](./img/condo_info.png)

- Install [Dark Theme for Jupiter NoteBook](https://github.com/dunovank/jupyter-themes) ```c:\tools\Anaconda3\_conda.exe install jupyterthemes```

## Windows User Environment Variables for CONDO

```condo not found```

- [Изучаем переменные среды в Windows 10](https://lumpics.ru/environment-variables-in-windows-10/)

```Мой компьютер → Свойства → Дополнительные парметры системы → Переменные среды → Системные переменные```

```Path```

add
- ```C:\tools\Anaconda3```
- ```C:\tools\Anaconda3\Scripts```
- ```C:\tools\Anaconda3\Library\bin```

Restart explorer
- ```taskkill /F /IM explorer.exe```
- ```explorer.exe```

## Commands

- [Commands Anaconda](https://docs.anaconda.com/anaconda-cloud/commandreference/)