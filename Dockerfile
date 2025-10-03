FROM php:8.2-cli

# تثبيت الإضافات المطلوبة فقط
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libzip-dev \
    zip \
    && docker-php-ext-install zip bcmath

# تثبيت Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# مجلد العمل
WORKDIR /app

# نسخ المشروع
COPY . .

# تثبيت مكتبات Laravel
RUN composer install --no-dev --optimize-autoloader

# توليد APP_KEY إذا لم يوجد
RUN php artisan key:generate --force

# كاش Laravel
RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# تشغيل السيرفر
CMD php artisan serve --host=0.0.0.0 --port=$PORT

