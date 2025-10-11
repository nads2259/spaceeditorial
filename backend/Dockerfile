# syntax=docker/dockerfile:1.6

####
# Composer dependencies
####
FROM composer:2.7 AS vendor
WORKDIR /var/www/html

COPY composer.json composer.lock ./
RUN composer install \
    --no-dev \
    --prefer-dist \
    --no-progress \
    --no-interaction

COPY . ./
RUN composer install \
    --no-dev \
    --prefer-dist \
    --no-progress \
    --no-interaction

####
# Build Laravel asset bundle
####
FROM node:20-alpine AS assets
WORKDIR /var/www/html

COPY package.json package-lock.json ./
RUN npm ci --legacy-peer-deps

COPY --from=vendor /var/www/html /var/www/html
RUN npm run build

####
# PHP-FPM runtime image
####
FROM php:8.3-fpm AS php

ENV COMPOSER_ALLOW_SUPERUSER=1 \
    PHP_MEMORY_LIMIT=512M \
    PHP_OPCACHE_VALIDATE_TIMESTAMPS=0 \
    PHP_OPCACHE_MEMORY_CONSUMPTION=192 \
    PHP_OPCACHE_MAX_ACCELERATED_FILES=20000

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        git \
        unzip \
        libzip-dev \
        libicu-dev \
        libonig-dev \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
        libxml2-dev \
        libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        bcmath \
        gd \
        intl \
        opcache \
        pdo_mysql \
        zip \
        pcntl \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY --from=vendor /var/www/html /var/www/html
COPY --from=assets /var/www/html/public/build /var/www/html/public/build

WORKDIR /var/www/html

RUN chown -R www-data:www-data storage bootstrap/cache \
    && find storage -type d -exec chmod 775 {} \; \
    && find storage -type f -exec chmod 664 {} \; \
    && chmod -R 775 bootstrap/cache

USER www-data

CMD ["php-fpm"]

####
# Nginx web tier image
####
FROM nginx:1.27-alpine AS nginx

COPY docker/backend/nginx.conf /etc/nginx/conf.d/default.conf
COPY --from=php /var/www/html /var/www/html

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]
