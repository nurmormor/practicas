# Etapa 1: Compilar frontend
FROM node:20 AS frontend

WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# Etapa 2: Backend Laravel con Apache
FROM php:8.2-apache

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev libonig-dev libxml2-dev zip \
    && docker-php-ext-install pdo pdo_mysql zip exif

# Habilitar mod_rewrite en Apache
RUN a2enmod rewrite

# Copiar Composer desde imagen oficial
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

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

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Copiar código del backend
COPY . .

# Copiar assets generados del frontend
COPY --from=frontend /app/public/build ./public/build

# Asignar permisos
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Copiar el script de arranque
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Puerto expuesto
EXPOSE 80

# Usar el script como punto de entrada
ENTRYPOINT ["/entrypoint.sh"]
