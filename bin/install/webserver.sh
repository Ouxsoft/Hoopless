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



a2enmod php7.2
a2enmod rewrite

systemctl restart apache2


