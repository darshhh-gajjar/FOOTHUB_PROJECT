FROM php:8.4-apache


RUN apt-get update && apt-get install -y \
    git curl zip unzip libonig-dev libxml2-dev libzip-dev


RUN docker-php-ext-install pdo pdo_mysql zip


COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


WORKDIR /var/www

COPY . /var/www


RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/public|g' /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite


RUN composer install --no-interaction --prefer-dist --optimize-autoloader


RUN npm install && npm run build || true


RUN a2enmod rewrite
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache


RUN cp .env.example .env || true
RUN php artisan key:generate || true

EXPOSE 80
CMD ["apache2-foreground"]