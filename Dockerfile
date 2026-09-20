FROM richarvey/nginx-php-fpm:latest

WORKDIR /var/www/html
COPY . .

ENV WEBROOT=/var/www/html/public
ENV PHP_ERRORS_STDERR=1
ENV RUN_CLI=false
ENV NGINX_CONF_INCLUDE=laravel

RUN composer install --no-dev --optimize-autoloader
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache