# Define las extensiones PHP necesarias
ARG PHP_EXTENSIONS="mysqli pgsql pdo_mysql pdo_pgsql zip bcmath opcache"

FROM thecodingmachine/php:8.2-v4-apache-node20

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Copia los archivos del proyecto
COPY . .

# Instala dependencias de Composer
RUN composer install --no-dev --optimize-autoloader

# Permisos correctos para Laravel
RUN chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

# Genera el cache de configuración de Laravel (si tienes .env ya configurado)
RUN php artisan config:cache || true

# Puerto por defecto (Apache en esta imagen usa 80)
EXPOSE 80
