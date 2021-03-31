#!/bin/sh
docker-compose exec app cp .env.example .env
docker-compose exec app openssl genrsa -out storage/oauth-private.key 4096
docker-compose exec app openssl rsa -in storage/oauth-private.key -pubout > storage/oauth-public.key
docker-compose exec app composer install
docker-compose exec app php artisan migrate --seed
# docker-compose exec app php artisan passport:client --password