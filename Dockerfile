FROM dunglas/frankenphp:php8.3

RUN apt-get update && apt-get install -y \
    python3 \
    python3-pip

WORKDIR /app

COPY . .

RUN composer install --no-dev --optimize-autoloader

CMD ["php", "artisan", "octane:frankenphp", "--host=0.0.0.0", "--port=8080"]