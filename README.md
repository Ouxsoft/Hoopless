# Hoopless
Rapidly develop beautiful websites without jumping through hoops using Hoopless,
a lightweight content management system designed for Linux, Apache, MySQL, and
PHP.

## Features
* Easy local server configuration via config files.
* Bootstrap 4 Base Theme
..* Responsive mobile first design
* Grunt
..* automatic minified js and css for themes
* Supports GIT workflow.
* Uses "assets" to provide content.
* Uses "nodes" to produce pages.
* Uses "themes" to template nodes.
* Uses "lib" files for PHP class and function page specific includes.

## Future Development Plans
1. Theme updates
..* Use PHP Mustache for themes
..* Fix up nodes to use PHP Mustache and further Boostrap4 support
..* Change "mrheroux" theme to "default"
2. Node editor
..* Allow users to upload files and use them in nodes
..* Add text file based node history, e.g. nodes/{node_id}/file_id
..* Create a node_revision database file_id | status (draft,published), user_id
..* Use GIT to track page change.
3. Database Improvements
..* Change table from plural to singular name, e.g. `users` to `user`
..* Change tables pk from `id` to `user_id`
4. Dynamic node links
..* Allow for node links to work even when pages URL change, e.g. $instance->href(1)
5. Finish authentication
..* Create admin panel set root user in config
..* Add validation to node management script
..* Add node_menu setup
7. Plugins
..* Create setup script where you can choose what plugins to install
..* Make contact form, etc. packages.
..* uses tar.gz files placed in /resources/plugins extracts
..* to .tmp runs install.php script, which is contained in contained in plugin,
..* to install features and remove.php to remove features.
8. Misc
..* Make resume.pdf able to be included without being on github?
..* Change projects to two columns and render all images
..* Add ehs cc as case study multiple...
..* Move color outside of angularjs
