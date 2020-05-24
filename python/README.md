# Python

## Оглавление

- [API Yandex](./api-yandex)

## Информационные материалы

- [ru-python-beginners/faq](https://github.com/ru-python-beginners/faq): Русскоязычный краудсорсинговый проект помощи начинающим python разработчикам

## Оптимизация изображение

- [Google Rapid and Accurate Image Super Resolution](https://github.com/MKFMIKU/RAISR)

## Менеджеры пакетов и среды

- ```pip``` — это менеджер пакетов для Python.
- ```venv``` — является менеджером среды для Python.
- ```conda``` — является одновременно менеджером пакетов и среды и не зависит от языка.

```venv``` создает изолированные среды только для разработки на Python, а ```conda``` может создавать изолированные среды для любого поддерживаемого языка программирования.

C помощью [Conda](https://docs.conda.io/en/latest/index.html) можно:
- Установить пакеты (написанные на любом языке) из репозиториев, таких как Anaconda Repository и Anaconda Cloud.
- Установить пакеты из PyPI, используя pip в активной среде Conda.

[Источник](https://python.ivan-shamaev.ru/guide-conda-environments-anaconda-python-data-science-platform/)

## pip for windows

При правильной установке - ставится вместе с установкой python

- Problem: ``` pip is configured with locations that require TLS/SSL, however the ssl module in Python is not available.```
- Solve: install [OpenSSL](https://slproweb.com/products/Win32OpenSSL.html)