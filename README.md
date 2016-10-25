# hxcms
Created by: MrHeroux.com
HXCMS is a light-weight content management system (CMS) designed for PHP developers to create fast websites.

##System Requirements
* MySQL
* PHP with pdo extention
* Configure php.ini
 * memory_limit = 32M
 * upload_max_filesize = 15M
 * post_max_size = 20M
 * Apache with mod_rewrite

##Setup Server
* sudo apt-get update
* sudo apt-get install apache2 php7.0 php7.0-mbstring mysql-server mysql-client php7.0-mysql php7.0-mcrypt php-gettext
* sudo service apache2 restart
* sudo service mysql start
* sudo apt-get install phpmyadmin
* sudo apt install libmysqlclient-dev


* GRANT ALL PRIVILEGES ON *.* TO 'phpmyadmin'@'localhost';
* Edit /etc/apache2/apache2.conf add to bottom "Include /etc/phpmyadmin/apache.conf"
* create virtualhost
* sudo vim /etc/apache2/sites-avaliable/sites.conf
* sudo a2enmod rewrite
* sudo a2enmod headers
* sudo service apache2 restart
* Service apache2 restart
* Run SQL in database (not released).
* Edit config.ini.php and enter server and database settings.
