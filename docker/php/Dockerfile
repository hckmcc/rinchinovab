FROM php:8.3-fpm

RUN apt update -q && \
    apt install -q -y libpq-dev libzip-dev zip unzip git && \
    docker-php-ext-install pdo_pgsql pgsql zip

RUN apt update -q && \
    apt install -q -y curl gnupg && \
    curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt install -q -y nodejs && \
    npm install -g npm@latest

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

