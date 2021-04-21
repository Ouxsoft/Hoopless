#######################################
# Standard
#######################################
FROM php:7.4-fpm-buster AS standard

ARG user=www-data
ARG group=www-data

# fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

WORKDIR "/application"s

RUN apt-get update \
    && apt-get install -y \
    wget \
    gnupg \
    g++ \
    locales \
    unzip \
    dialog \
    apt-utils \
    curl \
    git \
    && apt-get clean

# libpng-dev needed by "gd" extension
# libzip-dev needed by "zip" extension
# libicu-dev for intl extension
RUN apt-get update \
    && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libicu-dev \
    vim \
    && apt-get clean

RUN docker-php-ext-configure gd --with-freetype --with-jpeg

# install necessary tools for running application
RUN docker-php-ext-install \
    gd \
    intl \
    opcache \
    zip

# set UTC server time
RUN echo "UTC" > /etc/timezone \
    && dpkg-reconfigure -f noninteractive tzdata

## install opcache, apcu
RUN docker-php-source extract \
    && pecl install opcache apcu \
    && docker-php-ext-enable opcache apcu \
    && docker-php-source delete \
    && rm -rf /tmp/*

# install composer
RUN EXPECTED_CHECKSUM="$(php -r 'copy("https://composer.github.io/installer.sig", "php://stdout");')" \
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    ACTUAL_CHECKSUM="$(php -r "echo hash_file('sha384', 'composer-setup.php');")" \
    if [ "$EXPECTED_CHECKSUM" != "$ACTUAL_CHECKSUM" ] \
    then \
        >&2 echo 'ERROR: Invalid installer checksum' \
        rm composer-setup.php \
        exit 1 \
    fi \
    php composer-setup.php --quiet \
    RESULT=$? \
    rm composer-setup.php \
    exit $RESULT

# allow webserver to to use modify application
RUN chown -R $group:$user /application/

USER $user

#######################################
# Development
#######################################
FROM standard AS development

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

RUN pecl install xdebug \
    && echo "xdebug.remote_enable=on\n" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_autostart=on\n" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_port=9000\n" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_handler=dbgp\n" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_connect_back=1\n" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && docker-php-ext-enable xdebug \
    && rm -rf /tmp/*

#######################################
# Production
#######################################
FROM standard AS production
