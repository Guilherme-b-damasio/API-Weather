FROM php:8.2.19-apache

RUN apt-get update && \
    apt-get install -y git

RUN docker-php-ext-install pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer