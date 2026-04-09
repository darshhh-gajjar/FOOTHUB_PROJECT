FROM php:8.2-cli

# Install dependencies
RUN apt-get update && apt-get install -y \
    unzip git curl libzip-dev zip nodejs npm \
    && docker-php-ext-install zip

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

# Install PHP deps (IMPORTANT FIX)
RUN composer install --no-interaction --prefer-dist --optimize-autoloader || true

# Frontend (optional)
RUN npm install || true
RUN npm run build || true

# Laravel setup (safe mode)
RUN cp .env.example .env || true
RUN php artisan key:generate || true

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=10000