FROM richarvey/nginx-php-fpm:latest

WORKDIR /var/www/html
COPY . .

# Pastikan document root mengarah ke folder public Laravel
ENV WEBROOT=/var/www/html/public
ENV PHP_ERRORS_STDERR=1
ENV RUN_CLI_MIGRATIONS=true

RUN composer install --no-dev --optimize-autoloader
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache