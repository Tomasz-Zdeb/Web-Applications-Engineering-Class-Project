FROM php:7.4.3-fpm-alpine3.11

# Install PostgreSQL PDO extension dependencies
RUN apk update && apk add --no-cache postgresql-dev

# Install PostgreSQL PDO extension
RUN docker-php-ext-install pdo pdo_pgsql

COPY . /app

VOLUME [ "/app" ]