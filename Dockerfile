FROM php:8.2-apache
RUN apt-get update && apt-get install -y git unzip zip libzip-dev libpng-dev libonig-dev
RUN docker-php-ext-install pdo pdo_mysql mysqli mbstring exif pcntl bcmath gd zip
RUN a2enmod rewrite
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html
COPY . .
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev --no-scripts
RUN composer dump-autoload
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV APP_KEY="base64:WCsh7Denu0ebpDtZKxOpvuQL44dSLgdPYHl7yUUde4A="
ENV DB_CONNECTION=mysql
ENV DB_HOST=${MYSQLHOST}
ENV DB_PORT=${MYSQLPORT}
ENV DB_DATABASE=${MYSQLDATABASE}
ENV DB_USERNAME=${MYSQLUSER}
ENV DB_PASSWORD=${MYSQLPASSWORD}
RUN chown -R www-data:www-data storage bootstrap/cache
EXPOSE 3000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=${PORT:-3000}"]
