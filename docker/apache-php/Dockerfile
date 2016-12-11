FROM php:7.0-apache

# APACHE
RUN a2enmod rewrite

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# BASE
RUN apt-get update
RUN apt-get install -y -qq git zip

# PHP
RUN apt-get install -y -qq libjpeg62-turbo-dev libpng12-dev libfreetype6-dev libicu-dev libmcrypt-dev

RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
RUN docker-php-ext-configure intl
RUN docker-php-ext-install -j$(nproc) gd pdo_mysql opcache mcrypt mbstring intl zip

RUN pecl install apcu apcu_bc-1.0.3
RUN docker-php-ext-enable apcu --ini-name 10-docker-php-ext-apcu.ini
RUN docker-php-ext-enable apc --ini-name 20-docker-php-ext-apc.ini

# COMPOSER
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer global require hirak/prestissimo
