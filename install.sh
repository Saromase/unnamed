#!bin/bash
php artisan migrate:fresh
php artisan database:storage:insert
php artisan database:products:insert
exit 0