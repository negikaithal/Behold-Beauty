FROM php:8.2-fpm-alpine

# Install system dependencies & PHP extensions
RUN apk add --no-cache \
    nginx \
    supervisor \
    curl \
    git \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    oniguruma-dev \
    sqlite-dev \
    unzip

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_sqlite mbstring gd zip bcmath

# Copy composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy app files
COPY . .

# Install PHP packages
RUN composer install --no-dev --optimize-autoloader

# Directory permissions
RUN chmod -R 777 storage bootstrap/cache database

# Setup SQLite database & seed
RUN touch database/database.sqlite \
    && php artisan key:generate \
    && php artisan migrate:force --seed

# Copy Docker Nginx & Supervisor configs
COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

EXPOSE 10000

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
