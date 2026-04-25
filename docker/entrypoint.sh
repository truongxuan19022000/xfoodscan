#!/bin/bash
set -e

echo "[Entrypoint] Starting container..."

# ===== đảm bảo đúng thư mục Laravel =====
cd /var/www/html

# ===== check artisan tồn tại =====
if [ ! -f artisan ]; then
    echo "ERROR: artisan not found in $(pwd)"
    ls -la
    exit 1
fi

# ===== tạo .env nếu chưa có =====
if [ ! -f .env ]; then
    echo "Creating .env from .env.example..."
    cp .env.example .env
fi



# ===== cài vendor nếu chưa có =====
if [ ! -d "vendor" ]; then
    echo "[Entrypoint] Installing composer dependencies..."
    composer install --no-interaction --prefer-dist --no-dev --optimize-autoloader
fi

# ===== build frontend nếu chưa có =====
if [ ! -d "public/build" ]; then
    echo "[Entrypoint] Building frontend assets..."
    npm ci && npm run build
fi

# ===== generate APP KEY =====
if grep -q "APP_KEY=$" .env || grep -q "APP_KEY=\"\"" .env || grep -q "APP_KEY=''" .env; then
    echo "Generating APP KEY..."
    php artisan key:generate --force
fi

# ===== chờ DB =====
echo "Waiting for database..."
MAX_TRIES=30

for i in $(seq 1 $MAX_TRIES); do
    php artisan migrate --force && {
        echo "Migration success"
        break
    }

    echo "DB not ready... retry ($i/$MAX_TRIES)"
    sleep 2
done

# ===== storage link =====
echo "Creating storage link..."
php artisan storage:link || true

# ===== clear cache =====
php artisan optimize:clear || true

# ===== permissions =====
chown -R www-data:www-data storage bootstrap/cache || true

echo "[Entrypoint] Ready!"

# chạy command chính
exec "$@"