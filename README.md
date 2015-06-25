TPortal - простейший туристический портал построенный на основе Yii Framework 2.0.<br />
Позволяет быстро выбрать понравившейся тур и оформить заказ.<br />
Содержит так же админ часть для управления турами, странами, регионами итп.<br />
Админ часть (backend) сделана с использованием популярной темы AdminLTE.

Для успешной установки и настройки вам потребуется включить расширение PHP fileinfo.<br />

Так же потребуется склонировать репозиторий с GitHub, доступный по аддрессу git@github.com:Vetoni/TPortal.git<br />
(либо https://github.com/Vetoni/TPortal.git в случае HTTPS соединения)

Поскольку данный проект сделан с использованием Yii Framework 2.0<br />
нужно установить менеджер зависимостей Composer.

Инструкции по установке и первоначальной подготовке Composer можно найти в официальной документации Yii Framework 2.0<br />
После этого нужно обновить внешние пакеты коммандой composer update.

Конфигурация в вебсервере Apache предполагает создание трех виртуальных хостов примерно с таким мэпингом:<br />

```xml
<VirtualHost *:80>
DocumentRoot C:/Development/Estore/web
ServerName estore.com
</VirtualHost>

<VirtualHost *:80>
DocumentRoot C:/Development/TPortal/frontend/web
ServerName tportal.com
</VirtualHost>

<VirtualHost *:80>
DocumentRoot C:/Development/TPortal/backend/web
ServerName admin.tportal.com
</VirtualHost>
```

Дамп базы данных находится непосредственно в репозитарии проекта в папке sql.<br />
Миграции не используются.

