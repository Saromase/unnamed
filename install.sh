#!/bin/bash
php artisan migrate:fresh
php artisan database:storage:insert
php artisan database:products:insert
php artisan database:user:insert
php artisan database:inventory:insert


exit 0