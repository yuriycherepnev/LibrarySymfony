# LibrarySymfony
Добрый день.
Чтоб настроить приложение, в первую очередь его нужно скачать с gitHub.
Далее в файле .env прописать название базы данных, имя пользователя и пароль для установки связи с базой данных.
Как пример:
DATABASE_URL=mysql://root:root@127.0.0.1:3306/library?serverVersion=5.7

Далее необходимо выполнить миграцию в базу данных, чтобы были созданы таблицы необходимые нам для работы приложения.
Для этого в корне проекта в консоли надо прописать команды:
php bin/console doctrine:migrations:diff
php bin/console doctrine:migrations:migrate

Теперь можно запустить проект на локальном сервере. 
Для этого в корне проекта в консоли можно прописать команды:
symfony server:start
symfony open:local
Либо можно запустить на любом другом локальном сервере.
Я работал через OpenServer.

Приложение запустилось.
База данных пока пуста, во вкладке добавить книгу, Вы можете добавить книги в библиотеку, они отбразятся во вкладке список книг.
Каждую книгу можно отредактировать или удалить.

Также уточню, при добавлении книг реализована простая валидация.
Все поля должны быть заполнены. 
Поле год издания должно быть заполнено цифрами, остальные произвольно.
