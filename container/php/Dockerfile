# PHP-FPM image with PostgreSQL extensions
FROM php:8.2-fpm

# Install system deps and PostgreSQL extensions for PHP
RUN set -eux; \
    apt-get update; \
    apt-get install -y --no-install-recommends libpq-dev; \
    docker-php-ext-configure pdo_pgsql; \
    docker-php-ext-install -j"$(nproc)" pdo pdo_pgsql; \
    rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

# Expose FPM port (intra-network use via service name `php`)
EXPOSE 9000
