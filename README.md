# [RU]
# I4P-Lib-EAC
## Что такое I4P-Lib-EAC?
I4P-Lib-EAC это библиотека для I4P-Core, которая позволяет легко работать (читать/записывать значения) с виртуальными хостами.

## На какие языки сейчас переведен I4P-Lib-EAC?
- Англиский
- PS: Больше тут и не зачем, это библиотека

## Какой функционал сейчас имеется?
- Считывание всего файла
- Поиск домена и считывание с него данных.
- Замена параметров для всех доменов, если даже установлено несколько IP-адресов.
- Сохранение все в файл.

## Какие требование к серверу?
- [Необезательно] Продукт 4-го поколения ISPManager (Учтите, что софт платный)
- [Необезательно] [I4P-Core](https://github.com/pimnik98/I4P-Core)
- Установлен на сервере PHP 5.3+

## Как установить?
- Вручную, скачав файл или автоматический через репозиторий

## Как подключиться к репозиторию I4P?
1. Авторизуйтесь администратором
2. Перейдите `Настройки сервера > Плагины > Источники`
3. Добавьте этот источник
> http://isp4private.ru/download/plugins/plugins.xml
4. Потом выберите и обновите источник

## Где я могу посмотреть список текущих аддонов?
- [ADDONS.md](https://github.com/pimnik98/I4P-Core/blob/main/ADDONS.md)

## Я хочу помочь проекту
Вы можете просто поддержать проект, поставив звезду нам в репозиторий.
Подписывайтесь на уведомления от репозитория, тогда вы сможете наблюдать за измениями в самом репозитории ISP4Private

Если вы используйте данный фреймворк, плагины основанные на нем и тому подобное, то только вы несете ответственность за порчу данных,вывод из строя оборудования и прочие поломки.

## Пример использования
```
<?php
# Подключаем библиотеку
# У I4P-Core все библиотеки находяться по пути
# /usr/local/ispmgr/lib/php/isp4private/libs/
requirce_once 'I4P-Lib-EAC.php';
$eac = new I4PLib_EAC("/etc/httpd/conf/httpd.conf");

# Прочитать содержимое значение DocumentRoot
# Если переменная не найдена, результат будет FALSE
$read = $eac->getConfig("isp4private.ru","DocumentRoot");

# Установить содержимое значение DocumentRoot
# Будет возращено количество заменений в документе
$write = $eac->setConfig("isp4private.ru","DocumentRoot","/var/www/");

# Сохранить все изменения
$eac->save();
?>
```

# [EN]
# I4P-Lib-EAC
## What is I4P-Lib-EAC?
I4P-Lib-EAC is a library for I4P-Core that makes it easy to work (read/write values) with virtual hosts.

## What languages have I4P-Lib-EAC been translated into now?
- English
- PS: There's no more reason here, it's a library

## What functionality is available now?
- Reading the entire file
- Search for a domain and reading data from it.
- Replacement of parameters for all domains, even if several IP addresses are installed.
- Saving everything to a file.

## What are the server requirements?
- [Optional] The 4th generation ISPmanager product (Note that the software is paid)
- [Optional] [I4P-Core](https://github.com/pimnik98/I4P-Core)
- Installed on PHP 5 server.3+

## How to install?
- Manually by downloading a file or automatically through the repository

## How to connect to the I4P repository?
1. Log in as an administrator
2. Go to `Server Settings > Plugins > Sources`
3. Add this source
> http://isp4private.ru/download/plugins/plugins.xml
4. Then select and update the source

## Where can I see the list of current addons?
- [ADDONS.md](https://github.com/pimnik98/I4P-Core/blob/main/ADDONS.md)

## I want to help the project
You can simply support the project by putting a star in our repository.
Subscribe to notifications from the repository, then you will be able to observe changes in the ISP4Private repository itself

If you use this framework, plugins based on it and the like, then only you are responsible for data corruption, equipment failure and other breakdowns.

## Usage example
```
<?php
# Connecting the library
# I4P-Core has all libraries located on the path
# /usr/local/ispmgr/lib/php/isp4private/libs/
requirce_once 'I4P-Lib-EAC.php ';
$eac = new I4PLib_EAC("/etc/httpd/conf/httpd.conf");

# Read the contents of the DocumentRoot value
# If the variable is not found, the result will be FALSE
$read = $eac->getConfig("isp4private.ru","DocumentRoot");

# Set the contents to the DocumentRoot value
# The number of substitutions in the document will be returned
$write = $eac->setConfig("isp4private.ru","DocumentRoot","/var/www/");

# Save all changes
$eac->save();
?>
```
