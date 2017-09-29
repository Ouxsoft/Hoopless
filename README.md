|_  _  _  _ | _  _ _
| |(_)(_)|_)|(/__\_\
  
A modern lightweight PHP based content management system designed for web curators and web developers.

## Features
* Easy local server configuration via config files.
* Built in themes to template site.
 * Mustache
   * permalink
 * Bootstrap 4 Base Theme (responsive mobile first design)
 * Grunt Watch (Automatic minified JavaScript and SCSS files).
* Designed for GIT workflow.
* Uses "assets" to provide content.
* Uses "nodes" to produce pages. You can think of a node as a the split which determines one web page from another. All nodes exists in the /nodes directory as a individual sub folder, which is name after the node's id (node_id). Within a node folder there are usually two files that contains the page's specific logic (logic.php) and view (view.mustache). A nodes logic and view are stored as individual text files for version controlling purposes via GIT (if desired). A node is accessed via the instance_controller node_alias, which is stored in the site's database.
* Uses "aliases" symlinks to make editing "nodes" easy, which accounts for the one to many relationship 
* Uses "lib" files to store reusable PHP class and functions. Libs files are ment to be used similarly to how import files work in ANSI C/C++.

## Requirements
* Linux
* Apache2
* MySQL
* PHP 7
* Python

## Future Development Plans
- [] naming convention -- functions named as context + verb + how

### Dynamic node links / permlink
- [ ] have tiny mce show this all cool like.
### Theme updates
- [x] Use PHP Mustache for themes
- [x] Fix up nodes to use PHP Mustache and further Boostrap4 support
- [ ] Change "mrheroux" theme to "default"
- [x] Allow for datetime calls with Mustache {{f.date}}mm/dd/YYY{f.date}}
- [x] Area specific alerts
### Node editor
- [x] Finish authentication
- [ ] Create admin panel set root user in config
- [ ] Add validation to node management script
- [ ] Add node_menu setup
- [ ] Allow users to upload files and use them in nodes
- [ ] Add text file based node history, e.g. nodes/{node_id}/file_id
- [ ] Create a node_revision database file_id | status (draft,published), user_id
- [ ] Use GIT to track page change.
### Database Improvements
- [ ] Change table from plural to singular name, e.g. `users` to `user`
- [ ] Change tables pk from `id` to `user_id`
### Plugins
- [ ] Create setup script where you can choose what plugins to install
- [ ] Make contact form, etc. packages.
- [ ] uses tar.gz files placed in /resources/plugins extracts
- [ ] to .tmp runs install.php script, which is contained in contained in plugin,
- [ ] to install.php features and remove.php to remove features.
### Misc
- [ ] Make resume.pdf able to be included without being on github?
- [ ] Change projects to two columns and render all images
- [ ] Add ehs cc as case study multiple...
- [ ] Move color outside of angularjs
- [ ] MVC implementation
 * model (brains / logic)
 * view - presentation layer / layout / colors
 * controller - handles communication through user and control

# Install

## System Requirements
* Linux - Ubuntu 16 Server recommended
* MySQL
* PHP with pdo extention

## Setup a Ubuntu Server
* sudo apt-get update
* sudo apt-get install apache2 php7.0 php7.0-mbstring mysql-server mysql-client php7.0-mysql php7.0-mcrypt php-gettext
* sudo service apache2 restart
* sudo service mysql start

## Edit PHP config
* locate php.ini
* vim php.ini
** memory_limit = 32M

** upload_max_filesize = 15M
** post_max_size = 20M
** Apache with mod_rewrite

## Install PHPMyAdmin (optional)
** sudo apt-get install phpmyadmin
** sudo apt install libmysqlclient-dev
** GRANT ALL PRIVILEGES ON *.* TO 'phpmyadmin'@'localhost';
** Edit /etc/apache2/apache2.conf add to bottom "Include /etc/phpmyadmin/apache.conf"

## Create virtualhost
* sudo vim /etc/apache2/sites-avaliable/sites.conf
* -> see online how-tos
* sudo a2enmod rewrite
* sudo a2enmod headers
* sudo service apache2 restart
* service apache2 restart

## Run setup SQL
* mysql -u root -p
* source /var/www/[hoopless]/hoopless.sql

## Setup config files
* Edit resources/config/sample.conf save as resources/conf/default.conf.

## Install python library
sudo apt-get install python-pip
sudo pip install --upgrade pip
sudo pip install MySQL-python
sudo pip install sh
