FROM php:8.2-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    libpq-dev \
    git \
    unzip \
    libicu-dev \
    libonig-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_pgsql intl mbstring zip

RUN pecl install xdebug-3.2.0 \
    && docker-php-ext-enable xdebug

COPY ./build/php/configs /
COPY ./build/php/configs/etc/php.d/xdebug.ini $PHP_INI_DIR/conf.d/xdebug.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY app /var/www

RUN composer install

RUN chown -R www-data:www-data /var/www

CMD ["php-fpm"]
