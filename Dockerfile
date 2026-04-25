# ---------- STAGE 1: BUILD FRONTEND ----------
FROM node:20-alpine AS frontend
WORKDIR /app

COPY package.json package-lock.json* ./
RUN npm ci

COPY . .
RUN npm run build


# ---------- STAGE 2: COMPOSER ----------
FROM composer:2 AS vendor
WORKDIR /app

COPY composer.json composer.lock* ./
RUN composer install --no-interaction --prefer-dist --no-scripts --no-autoloader --no-dev --ignore-platform-reqs
COPY . .

RUN composer dump-autoload --optimize --no-dev


# ---------- STAGE 3: PHP-FPM ----------
FROM php:8.3-fpm

WORKDIR /var/www

# ===== SYSTEM DEPENDENCIES =====
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libmagickwand-dev \
    zip \
    unzip \
    git \
    curl \
    libonig-dev \
    libxml2-dev \
    default-mysql-client \
    && rm -rf /var/lib/apt/lists/*

# ===== NODE.JS (cho npm ci / npm run build) =====
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && rm -rf /var/lib/apt/lists/*

# ===== COMPOSER =====
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# ===== PHP EXTENSIONS =====
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        pdo_mysql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
        zip

# ===== IMAGICK =====
RUN pecl install imagick \
    && docker-php-ext-enable imagick

# ===== CLEAN =====
RUN rm -rf /tmp/pear

# Copy source
COPY . .

# Copy vendor + build
COPY --from=vendor /app/vendor ./vendor
COPY --from=frontend /app/public/build ./public/build

# Copy entrypoint
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Quyền
RUN chown -R www-data:www-data /var/www

ENTRYPOINT ["entrypoint.sh"]
CMD ["php-fpm"]