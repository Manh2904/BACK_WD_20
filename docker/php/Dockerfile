ARG PHP_VERSION

FROM php:${PHP_VERSION}-fpm

WORKDIR /var/www/html

RUN apt update && apt install -y \
    vim \
    zip \
    unzip\
    libmagickwand-dev\
    imagemagick \
    libzip-dev

RUN curl -sL https://deb.nodesource.com/setup_16.x | bash
RUN apt-get -y install nodejs
RUN docker-php-ext-install exif
RUN docker-php-ext-install gd
RUN pecl install imagick
RUN docker-php-ext-enable imagick
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-enable pdo_mysql

# install composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

#RUN usermod -u 1000 www-data
#RUN groupmod -g 1000 www-data
#USER www-data:www-data

# CMD ["/var/www/html/docker/php/script.sh"]
