#!/usr/bin/env bash
echo "=== Iniciando despliegue ==="

# Verificar versión de PHP
echo "Verificando versión de PHP..."
php -v

# Instalar dependencias con Composer
echo "Instalando dependencias..."
composer install --no-dev --optimize-autoloader --working-dir=/var/www/html

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


echo "Running seeders..."
php artisan db:seed --force

# Generar clave JWT
echo "Generando clave JWT..."
php artisan jwt:secret --force

echo "=== Despliegue completado con éxito ==="


