FROM php:8.2-fpm

# Instalar dependências do sistema e extensões do PHP necessárias ao Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Instalar o Laravel automaticamente na pasta /var/www/html se não existir
WORKDIR /var/www/html
RUN [ ! -f "artisan" ] && composer create-project laravel/laravel . || true
