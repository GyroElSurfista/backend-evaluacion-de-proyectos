#!/usr/bin/env bash
echo "Running composer"
composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html

# echo "generating application key..."
# php artisan key:generate --show

echo "Caching config..."
php artisan config:clear
php artisan config:cache

echo "Caching routes..."
php artisan config:clear
php artisan route:cache

echo "Rollbacking migrations..."
php artisan migrate:reset --force

echo "Running migrations..."
php artisan migrate --force

echo "Running seeders..."
php artisan db:seed --force