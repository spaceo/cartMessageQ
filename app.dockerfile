FROM php:7.2.0RC6-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev \
    mysql-client libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install pdo_mysql bcmath

# Composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

# amqp extension
RUN apt-get install -y librabbitmq-dev --no-install-recommends && \
pecl install amqp && \
docker-php-ext-enable amqp
