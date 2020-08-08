#
# install apps
apt-get update;
apt-get install -y \
    git \
    zip \
    unzip \
    apache2 \
    php7.2 \
    libapache2-mod-php7.2 \
    php7.2-mysql \
    php7.2-dom \
    php7.2-json \
    php7.2-gd \
    php7.2-yaml \
    php7.2-mbstring \
    libxml2 curl

cp ../../docker/apache2/000-default.conf /etc/apache2/sites-available/000-default.conf

# configure apache2
a2enmod php7.2
a2enmod rewrite
a2enmod ssl

# install composer
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# update composer
cd /var/www/Hoopless && composer update;

# grant apache2 permissions to web directory
chown -R www-data:www-data /var/www

# restart apache2
systemctl restart apache2




