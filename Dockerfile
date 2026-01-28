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
    libzip-dev \
    sqlite3 \
    libsqlite3-dev

# PHP extension lar
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install pdo pdo_mysql pdo_sqlite gd zip

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

# AVVAL CACHE TOZALASH, KEYIN CACHE QILISH
RUN php artisan cache:clear \
    && php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear \
    && php artisan storage:link \
    && php artisan config:cache \
    && php artisan route:cache

# SQLite database yaratish (agar kerak bo'lsa)
RUN touch database/database.sqlite \
    && chmod 755 database/database.sqlite

EXPOSE 80

CMD ["apache2-foreground"]
