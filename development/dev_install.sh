#!/bin/bash
openssl genrsa -out storage/oauth-private.key 4096
openssl rsa -in storage/oauth-private.key -pubout > storage/oauth-public.key
composer install
php artisan migrate
php artisan passport:install