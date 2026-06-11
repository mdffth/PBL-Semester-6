FROM dunglas/frankenphp:php8.3

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install dependency OS + Python + ZIP
RUN apt-get update && apt-get install -y \
    python3 \
    python3-pip \
    unzip \
    zip \
    libzip-dev \
    && docker-php-ext-install zip \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /app

COPY . .

# Composer boleh dijalankan sebagai root di container build
ENV COMPOSER_ALLOW_SUPERUSER=1

RUN composer install --no-dev --optimize-autoloader

# Python requirements
COPY requirements.txt .
RUN pip3 install --break-system-packages -r requirements.txt

EXPOSE 8080

CMD ["php", "artisan", "octane:frankenphp", "--host=0.0.0.0", "--port=8080"]