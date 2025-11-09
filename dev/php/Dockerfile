FROM php:8.2-fpm

WORKDIR /var/www/laravel

RUN apt-get update && apt-get upgrade && apt-get install -y \
    git \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_mysql

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
