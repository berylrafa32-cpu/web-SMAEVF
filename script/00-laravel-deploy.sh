#!/usr/bin/env bash
echo "Running migrations..."
php artisan migrate --force
php artisan config:clear
php artisan route:clear
php artisan optimize:clear
php artisan migrate --force