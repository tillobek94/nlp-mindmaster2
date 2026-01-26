FROM php:8.2-apache
RUN apt-get update && apt-get install -y git unzip zip libzip-dev
RUN docker-php-ext-install pdo pdo_mysql zip
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html
COPY . .
RUN composer install --no-interaction --prefer-dist --no-dev --no-scripts
ENV PORT=3000
EXPOSE 3000
CMD php -S 0.0.0.0:${PORT} -t public
