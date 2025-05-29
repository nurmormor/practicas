#!/bin/bash
set -e

echo "✅ Ejecutando setup inicial de Laravel..."

if [ ! -d "vendor" ]; then
  echo "📦 Ejecutando composer install..."
  composer install --no-dev --optimize-autoloader
fi

if [ ! -f ".env" ]; then
  echo "📝 Creando .env desde .env.example..."
  cp .env.example .env
fi

if ! grep -q '^APP_KEY=base64:' .env; then
  echo "🔐 Generando APP_KEY..."
  php artisan key:generate
fi

echo "🗄️ Ejecutando migraciones..."
php artisan migrate --force

echo "🔗 Creando enlace a storage..."
php artisan storage:link || true

echo "⚙️ Cacheando configuración..."
php artisan config:cache
php artisan route:cache

echo "🚀 Iniciando Apache..."
apache2-foreground
