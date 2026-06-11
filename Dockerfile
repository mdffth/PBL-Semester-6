FROM dunglas/frankenphp:php8.3

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install Python
RUN apt-get update && apt-get install -y \
    python3 \
    python3-pip \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /app

COPY . .

# Install dependency PHP
RUN composer install --no-dev --optimize-autoloader

# Install dependency Python
RUN pip3 install --break-system-packages -r requirements.txt

RUN php artisan config:clear

EXPOSE 8080

CMD ["php", "artisan", "octane:frankenphp", "--host=0.0.0.0", "--port=8080"]