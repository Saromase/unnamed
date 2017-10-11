#!/bin/bash
php artisan migrate:fresh
php artisan database:storage:insert
php artisan database:products:insert
php artisan database:user:insert
exit 0