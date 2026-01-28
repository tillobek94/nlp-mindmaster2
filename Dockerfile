FROM php:8.2-apache

# ServerName sozlash
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Apache modlarini yoqish
RUN a2enmod rewrite

# Zarur kutubxonalar
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev

# PHP extension lar
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install pdo pdo_mysql gd zip

# PHP error log yoqish
RUN echo "error_reporting = E_ALL" >> /usr/local/etc/php/php.ini-production
RUN echo "display_errors = On" >> /usr/local/etc/php/php.ini-production
RUN echo "log_errors = On" >> /usr/local/etc/php/php.ini-production
RUN echo "error_log = /var/log/php_errors.log" >> /usr/local/etc/php/php.ini-production

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Fayllarni nusxalash
COPY . .

# Composer paketlari
RUN composer install --no-dev --optimize-autoloader

# Papka huquqlari
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# DocumentRoot public ga o'rnatish
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# index.php ni DirectoryIndex ga qo'shish
RUN sed -i 's/DirectoryIndex index.html/DirectoryIndex index.php index.html/' /etc/apache2/mods-enabled/dir.conf

# Soddalashtirilgan cache
RUN php artisan storage:link

EXPOSE 80

CMD ["apache2-foreground"]
