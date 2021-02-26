## Разворачивание проекта ##
* скопировать .env.example в .env, указать соответствующие настройки БД, название приложения и прочие настройки
* настроить web-сервер, php7.3
* composer install
* npm install
* php artisan key:generate
* php artisan migrate
* php artisan db:seed (если ошибка composer dump-autoload)
* В сиде UserSeeder указаны почта и пароль главного админа. Эти данные перед запуском проекта нужно заменить.
* npm run dev (каждый раз после выгрузки последней версии из репозитория)
* php artisan storage:link
