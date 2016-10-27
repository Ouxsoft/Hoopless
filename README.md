# HXCMS
Created by: mrheroux.com
HXCMS is a light-weight content management system (CMS) designed for a LAMP.

##System Requirements
* MySQL
* PHP with pdo extention
* Configure php.ini
 * memory_limit = 32M
 * upload_max_filesize = 15M
 * post_max_size = 20M
 * Apache with mod_rewrite

##File Structure Explained
* .git - git version control
* .tmp - Temporary file storage (where plugins are unzipped)
* assets - Images, video, other things that aren't code, markup, or configuration. Think very static
* config - server specfic configurations
* lib - library files contains reusable core classes and functions
* logs - contains a running log
* pages - where individual pages are stored
* plugins - *.tar.gz files that allow for features to be easily installed
* resources - Configuration files, something that has code or markup in it
** themes - where the files go
* .gitignore - defines what files stay out of version control
* .htaccess - allows for proper rewrite and caching
* humans.txt - information about author
* README.md - general information
* robots.txt - request bots do not cache certain files

##Server Configuration (Ubuntu)
* sudo apt-get update
* sudo apt-get install apache2 php7.0 php7.0-mbstring mysql-server mysql-client php7.0-mysql php7.0-mcrypt php-gettext
* sudo service apache2 restart
* sudo service mysql start
* PHPMyAdmin (optional)
** sudo apt-get install phpmyadmin
** sudo apt install libmysqlclient-dev
** GRANT ALL PRIVILEGES ON *.* TO 'phpmyadmin'@'localhost';
** Edit /etc/apache2/apache2.conf add to bottom "Include /etc/phpmyadmin/apache.conf"
* create virtualhost
* sudo vim /etc/apache2/sites-avaliable/sites.conf
* sudo a2enmod rewrite
* sudo a2enmod headers
* sudo service apache2 restart
* service apache2 restart
* Run SQL in database (not released).
* Edit config.ini.php and enter server and database settings.