FROM php:7.4-fpm-alpine3.12

# use the default production configuration
#RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

WORKDIR "/application"

# fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

# install essential build tools
RUN apk add --no-cache \
    autoconf \
    g++ \
    make \
    openssl-dev \
    git

# set UTC server time
RUN echo "UTC" > /etc/timezone

# install composer
ENV COMPOSER_HOME /composer
ENV PATH ./vendor/bin:/composer/vendor/bin:$PATH
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN curl -s https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer

# install bzip2 extension
RUN apk add --no-cache \
    bzip2-dev \
    && docker-php-ext-install -j$(nproc) bz2 \
    && docker-php-ext-enable bz2 \
    && rm -rf /tmp/*

# install GD extension
RUN apk add --no-cache \
      freetype \
      libjpeg-turbo \
      libpng \
      freetype-dev \
      libjpeg-turbo-dev \
      libpng-dev \
    && docker-php-ext-configure gd \
      --with-freetype=/usr/include/ \
      --with-png=/usr/include/ \
      --with-jpeg=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-enable gd \
    && apk del --no-cache \
      freetype-dev \
      libjpeg-turbo-dev \
      libpng-dev \
    && rm -rf /tmp/*

# install intl extension
RUN apk add --no-cache \
    icu-dev \
    && docker-php-ext-install -j$(nproc) intl \
    && docker-php-ext-enable intl \
    && rm -rf /tmp/*

# install mbstring extension
RUN apk add --no-cache \
    oniguruma-dev \
    && docker-php-ext-install mbstring \
    && docker-php-ext-enable mbstring \
    && rm -rf /tmp/*

# install yaml extension
RUN apk add --no-cache \
    oniguruma-dev \
    && docker-php-ext-install yaml \
    && docker-php-ext-enable yaml \
    && rm -rf /tmp/*

# install curl extension
RUN apk add --no-cache \
    oniguruma-dev \
    && docker-php-ext-install curl \
    && docker-php-ext-enable curl \
    && rm -rf /tmp/*

# install opcache, xdebug
# WARNING disable XDBUG on prod
RUN docker-php-source extract \
    && pecl install opcache xdebug apcu \
    && echo "xdebug.remote_enable=on\n" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_autostart=on\n" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_port=9000\n" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_handler=dbgp\n" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_connect_back=1\n" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && docker-php-ext-enable opcache xdebug apcu \
    && docker-php-source delete \
    && rm -rf /tmp/*    
    
# allow webserver to to use modify application
RUN chown -R www-data:www-data /application/

# # install apps
#     zip \
#     unzip \
#     php7.2 \
#     php7.2-mysql \
#     php7.2-dom \
#     php7.2-json \
#     php7.2-gd \
#     php7.2-yaml \
#     libxml2 \
#     curl