FROM php:8.2-fpm

# System dependencies
RUN apt-get update && apt-get install -y \
    zip unzip curl git libpng-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql gd

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN docker-php-ext-install pdo pdo_mysql

CMD php artisan serve --host=0.0.0.0 --port=8000
