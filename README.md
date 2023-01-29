# Yeeeeeeeeeeeehaw

Just trying laravel 9

## Requirements

-   PHP >= 8.2.1
-   Composer >= 2.5.1
-   Node.js >= 18.12.0
-   Yarn >= 1.22.9
-   PostgreSQL

## Installation

```bash
# copy and setup environment
$ cp .env.example .env

# install node dependencies
$ yarn install

# compile js
$ yarn build

# install composer dependencies
$ composer install

# generate key
$ php artisan key:generate

# migrate with seeder
$ php artisan migrate --seed

# open new terminal and run laravel server
$ php artisan serve
```
