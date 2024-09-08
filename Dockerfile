FROM php:7.4.33-fpm

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    curl \
    git \
    unzip \
    libpq-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    && docker-php-ext-install pdo_pgsql pdo_mysql mbstring exif pcntl bcmath gd

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin --filename=composer

# Instalar RoadRunner
COPY --from=spiralscout/roadrunner:2.4.2 /usr/bin/rr /usr/bin/rr

WORKDIR /app

# Copiar el código de la aplicación
COPY . .

# Eliminar dependencias existentes y archivos de bloqueo
RUN rm -rf /app/vendor
RUN rm -rf /app/composer.lock

# Instalar dependencias de Composer
RUN composer install

# Instalar Laravel Octane y RoadRunner con más información de depuración
RUN composer require laravel/octane spiral/roadrunner --verbose

# Copiar el archivo de entorno
COPY .env.example .env

# Crear directorio de logs
RUN mkdir -p /app/storage/logs

# Limpiar cachés de Laravel
RUN php artisan cache:clear
RUN php artisan view:clear
RUN php artisan config:clear

# Instalar Octane con Swoole
RUN php artisan octane:install --server="swoole"

# Comando para iniciar Octane
CMD php artisan octane:start --server="swoole" --host="0.0.0.0"

# Exponer el puerto 8000
EXPOSE 8000