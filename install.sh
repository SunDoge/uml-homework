#!/bin/bash
#composer install
#php artisan key:generate
#php artisan migrate
php artisan migrate:refresh
php artisan db:seed