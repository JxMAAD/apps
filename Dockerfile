FROM php:8.4-fpm

WORKDIR /var/www:Z

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip curl \
    libpq-dev libzip-dev libpng-dev libicu-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip gd intl bcmath mbstring

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy composer dulu (BIAR CACHE BAGUS)
COPY composer.json composer.lock ./

# Install dependencies (tanpa script dulu biar aman)
RUN composer install --no-interaction --prefer-dist --no-scripts

# Copy semua file project
COPY . .

# Generate autoload
RUN composer dump-autoload --optimize

# Permission Laravel
RUN chmod -R 777 storage bootstrap/cache

CMD ["php-fpm"]
