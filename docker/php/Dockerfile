FROM php:7.4-fpm

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

ENV COMPOSER_HOME /composer
ENV PATH ./vendor/bin:/composer/vendor/bin:$PATH
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer

WORKDIR /var/www/

COPY composer.json .
COPY . .
RUN composer install --no-scripts

RUN composer update