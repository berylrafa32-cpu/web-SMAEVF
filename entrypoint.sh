#!/bin/sh

# Jalankan migration database otomatis
php artisan migrate --force

# Jalankan proses bawaan image Docker
exec /start.sh