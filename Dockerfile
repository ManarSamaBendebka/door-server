FROM php:8.2-cli

# تثبيت الإضافات المطلوبة للـ PHP
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo_mysql zip bcmath

# تثبيت Composer (مدير الحزم للـ PHP)
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# تعيين مجلد العمل داخل الحاوية
WORKDIR /app

# نسخ كل الملفات من مشروعك
COPY . .

# تثبيت مكتبات Laravel
RUN composer install --no-dev --optimize-autoloader

# تفعيل الكاش (لتسريع لارفيل)
RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# الأمر اللي يشغل السيرفر
CMD php artisan serve --host=0.0.0.0 --port=$PORT
