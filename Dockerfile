FROM php:8.3-apache

RUN apt-get update && apt-get install -y \
    libgd-dev \
    zlib1g-dev \
 && docker-php-ext-install gd exif \
 && a2enmod rewrite headers \
 && rm -rf /var/lib/apt/lists/*

COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf

COPY . /var/www/app
RUN chown -R www-data:www-data /var/www/app

EXPOSE 80
