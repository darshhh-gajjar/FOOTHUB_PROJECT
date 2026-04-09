FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    unzip git curl libzip-dev zip nodejs npm \
    && docker-php-ext-install zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

RUN npm install && npm run build || true

RUN cp .env.example .env || true
RUN php artisan key:generate || true

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=10000