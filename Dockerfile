FROM php:8.2-fpm

# Dependências do sistema
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
    cron \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY ./src/ .

# Permissões
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Copiar crontab
COPY ./docker/cron/scheduler /etc/cron.d/scheduler
RUN chmod 0644 /etc/cron.d/scheduler && crontab /etc/cron.d/scheduler
RUN touch /var/log/cron.log

# Comando padrão: PHP-FPM + cron
CMD ["sh", "-c", "cron && php-fpm"]
