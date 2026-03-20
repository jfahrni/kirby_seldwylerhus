FROM php:8.3-apache

RUN apt-get update && apt-get install -y \
    libjpeg62-turbo-dev \
    libpng-dev \
    libwebp-dev \
    libavif-dev \
    zlib1g-dev \
 && docker-php-ext-configure gd --with-jpeg --with-webp --with-avif \
 && docker-php-ext-install gd exif \
 && a2enmod rewrite headers \
 && rm -rf /var/lib/apt/lists/*

COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf
