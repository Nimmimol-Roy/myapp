FROM php:8.2-apache

RUN a2enmod rewrite

RUN apt-get update && apt-get install -y \
    sqlite3 libsqlite3-dev zip unzip git \
    && docker-php-ext-install pdo pdo_sqlite

WORKDIR /var/www/html

COPY . .

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html\
    && chmod -R 775 /var/www/html/myapp/storage \
    && chmod -R 775 /var/www/html/myapp/bootstrap/cache \
    && mkdir -p /var/www/html/myapp/database \
    && touch /var/www/html/myapp/database/database.sqlite \
    && chmod -R 775 /var/www/html/myapp/database

COPY ./docker/vhost.conf /etc/apache2/sites-available/000-default.conf
