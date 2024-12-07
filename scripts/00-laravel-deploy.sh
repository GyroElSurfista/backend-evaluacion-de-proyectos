#!/usr/bin/env bash
echo "Running composer"
composer update
composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html
composer require tymon/jwt-auth

# echo "generating application key..."
# php artisan key:generate --show

echo "Caching config..."
php artisan config:clear
php artisan config:cache

echo "Caching routes..."
php artisan config:clear
php artisan route:cache

echo "Fresh migrations"
php artisan migrate:fresh --force


echo "Running migrations..."
php artisan migrate --force

echo "Running seeders..."
php artisan db:seed --force

php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
php artisan jwt:secret


