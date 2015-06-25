TPortal - простейший туристический портал построенный на основе Yii Framework 2.0.
Позволяет быстро выбрать понравившейся тур и оформить заказ.
Содержит так же админ часть для управления турами, странами, регионами итп.
Админ часть (backend) сделана с использованием популярной темы AdminLTE.

Для успешной установки и настройки вам потребуется включить расширение PHP fileinfo.

Так же потребуется склонировать репозиторий с GitHub, доступный по аддрессу git@github.com:Vetoni/TPortal.git
(либо https://github.com/Vetoni/TPortal.git в случае HTTPS соединения)

Поскольку данный проект сделан с использованием Yii Framework 2.0
нужно установить менеджер зависимостей Composer.

Инструкции по установке и первоначальной подготовке Composer можно найти в официальной документации Yii Framework 2.0
После этого нужно обновить внешние пакеты коммандой composer update.

Конфигурация в вебсервере Apache предполагает создание трех виртуальных хостов примерно с таким мэпингом:

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

Дамп базы данных находится непосредственно в репозитарии проекта в папке sql.
Миграции не используются.

