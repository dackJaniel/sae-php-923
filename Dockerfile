FROM php:8.3.7-apache

COPY . /var/www/html
RUN apt-get update \
    && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install \
    mysqli \
    pdo \
    pdo_mysql \
    && docker-php-ext-enable \
    pdo_mysql

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

ENV COMPOSER_ALLOW_SUPERUSER=1
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer
RUN composer install

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Apache neu starten, um die neue Konfiguration zu übernehmen
RUN service apache2 restart

# Set working directory
WORKDIR /var/www/html
