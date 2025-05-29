# Usamos PHP con Apache
FROM php:8.2-apache

# Instalamos dependencias del sistema
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev libonig-dev libxml2-dev zip \
    && docker-php-ext-install pdo pdo_mysql zip

# Habilitamos mod_rewrite para Laravel
RUN a2enmod rewrite

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Copiar archivos del proyecto
COPY . .

# Asignar permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Exponer el puerto del servidor
EXPOSE 80
