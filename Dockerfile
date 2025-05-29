# Etapa 1: Compilación de assets frontend
FROM node:20 AS frontend

WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# Etapa 2: Backend PHP con Apache
FROM php:8.2-apache

# Instalar extensiones necesarias para Laravel
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev libonig-dev libxml2-dev zip \
    && docker-php-ext-install pdo pdo_mysql zip

# Habilitar mod_rewrite para Apache
RUN a2enmod rewrite

# Copiar Composer desde imagen oficial
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Copiar backend Laravel (ajusta si está en subcarpeta)
COPY . .

# Copiar assets compilados desde frontend
COPY --from=frontend /app/public/build ./public/build

# Establecer permisos adecuados
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Configurar Apache para servir desde /public
RUN printf '%s\n' \
"<VirtualHost *:80>" \
"    DocumentRoot /var/www/html/public" \
"" \
"    <Directory /var/www/html/public>" \
"        Options Indexes FollowSymLinks" \
"        AllowOverride All" \
"        Require all granted" \
"    </Directory>" \
"" \
"    ErrorLog \${APACHE_LOG_DIR}/error.log" \
"    CustomLog \${APACHE_LOG_DIR}/access.log combined" \
"</VirtualHost>" \
> /etc/apache2/sites-available/000-default.conf
EXPOSE 80
