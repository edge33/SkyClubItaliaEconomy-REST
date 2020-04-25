# Developer guide

TOC:
- Laradock runtime
- Setting up the API
- Setting up the database

## Laradock runtime

In order to start developing in short time a **Laradock** configuration is provided in the *laradock* folder.

requirements:

- Docker
- Docker compose 

rename the **.env** file from the **.env.example** file in the **laradock** directory and configure it according to your preferences. 

These are the changes I applied for this project:

- COMPOSE_PATH_SEPARATOR=: (use ; on windows)
- PHP_VERSION=7.0
- WORKSPACE_INSTALL_XDEBUG=true
- PHP_FPM_INSTALL_XDEBUG=true
- APACHE_DOCUMENT_ROOT=/var/www/public	
- PMA_PORT=8081


To start the environment, enter the **laradock** directory and issue:

`$ docker-compose up -d apache2 mysql phpmyadmin php-fpm`

After your work is done, you can stop the environment via:

`$ docker-compose down`


## Setting up the API

rename to **.env** the **.env.example** file in the root directory of the project and change the configuration according to your needs.

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=economy
DB_USERNAME=root
DB_PASSWORD=root

DB_CONNECTION_PHPBB=mysql
DB_HOST_PHPBB=mysql
DB_PORT_PHPBB=3306
DB_DATABASE_PHPBB=php_bb
DB_USERNAME_PHPBB=root
DB_PASSWORD_PHPBB=root

DB_CONNECTION_TEST=mysql
DB_HOST_TEST=mysql
DB_PORT_TEST=3306
DB_DATABASE_TEST=test_db
DB_USERNAME_TEST=root
DB_PASSWORD_TEST=root
```

Three DBs are required for this app:
- economy (App DB)
- php_bb (for user authentication against php db tables)
- test_db (in order to run feature test with phpunit)


## Setting up the Databases

After starting the runtime, and configuring the API, access **phpMyAdmin** at *127.0.0.1:8081*
and create a the required DBs: **economy**, **php_bb** and **test_db**, or just any name as long as the same names are used in the **.env** file for laravel.

In order to test the Auth against phpBB tables, add the following tables to the **php_bb** DB and fill them with dummy data:
- phpbb_profile_fields_data
- phpbb_users

## Build the app and prepare for usage

Before running **composer** to install dependencies, it is mandatory to generate the RSA keys in advance. You can use the following script to generate the keys, run DB migrations, install Passport for API authentication and run the app. Run it from the project root.

```
#!/bin/bash
openssl genrsa -out storage/oauth-private.key 4096
openssl rsa -in storage/oauth-private.key -pubout > storage/oauth-public.key
composer install
php artisan migrate
php artisan passport:install
```