FROM richarvey/nginx-php-fpm:latest

# Set working directory
WORKDIR /var/www/html

# Copy semua kode project ke container
COPY . .

# Konfigurasi Environment buat Nginx/Laravel
ENV WEBROOT=/var/www/html/public
ENV PHP_ERRORS_STDERR=1
ENV RUN_CLI_MIGRATIONS=false

# Install dependency laravel lewat composer
RUN composer install --no-dev --optimize-autoloader

# Set permission folder storage
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache