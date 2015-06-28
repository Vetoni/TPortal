TPortal - простейший туристический портал, построенный на основе Yii Framework 2.0.
Позволяет быстро выбрать понравившейся тур и оформить заказ.
Содержит также админ часть для управления турами, странами, регионами итп.
Админ часть (backend) сделана с использованием популярной темы AdminLTE.

Для успешного использования вам потребуется включить расширение PHP fileinfo.

Так же потребуется склонировать репозиторий GitHub, доступный по аддрессу git@github.com:Vetoni/TPortal.git
(либо https://github.com/Vetoni/TPortal.git в случае HTTPS соединения)

Поскольку данный проект сделан с использованием Yii Framework 2.0, нужно установить менеджер зависимостей Composer.

Инструкции по установке и первоначальной настройке Composer можно найти в официальной документации Yii Framework 2.0
После этого нужно обновить внешние пакеты коммандой "composer update".

Конфигурация в вебсервере Apache предполагает создание двух виртуальных хостов примерно с таким мэпингом:

```xml
<VirtualHost *:80>
DocumentRoot C:/Development/TPortal/frontend/web
ServerName tportal.com
</VirtualHost>

<VirtualHost *:80>
DocumentRoot C:/Development/TPortal/backend/web
ServerName admin.tportal.com
</VirtualHost>
```

Для того чтобы установить базу, потребуется сперва создать пустую с названием tportal (по умолчанию).
И запустить миграции с помощью комманды: php yii migrate

Для входа в админку:

Имя пользователя: admin<br/>
Пароль 1111111

