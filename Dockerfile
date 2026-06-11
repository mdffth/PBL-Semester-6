FROM dunglas/frankenphp:php8.3

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get install -y \
    python3 \
    python3-pip \
    unzip \
    zip \
    git \
    libzip-dev \
    && docker-php-ext-install zip pdo_mysql \
    && rm -rf /var/lib/apt/lists/*

ENV COMPOSER_ALLOW_SUPERUSER=1

WORKDIR /app

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN pip3 install --break-system-packages -r requirements.txt

EXPOSE 8080

CMD sh -c "php artisan serve --host=0.0.0.0 --port=${PORT:-8080}"