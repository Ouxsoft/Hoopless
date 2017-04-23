# Hoopless
Rapidly develop beautiful websites without jumping through hoops using Hoopless,
a lightweight content management system designed for Linux, Apache, MySQL, and
PHP.

## Features
* Easy local server configuration via config files.
* Uses "themes" to template sites.
** Mustache
** Bootstrap 4 Base Theme (responsive mobile first design)
** Grunt Watch (Automatic minified JavaScript and SCSS files).
* Designed for GIT workflow.
* Uses "assets" to provide content.
* Uses "nodes" to produce pages. You can think of a node as a the split which determines one web page from another. All nodes exists in the /nodes directory as a individual sub folder, which is name after the node's id (node_id). Within a node folder there are usually two files that contains the page's specific logic (logic.php) and view (view.mustache). A nodes logic and view are stored as individual text files for version controlling purposes via GIT (if desired). A node is accessed via the instance_controller node_alias, which is stored in the site's database.
* Uses "lib" files to store reusable PHP class and functions. Libs files are ment to be used similarly to how import files work in ANSI C/C++.

## Future Development Plans
1. Theme updates
..* Use PHP Mustache for themes
..* Fix up nodes to use PHP Mustache and further Boostrap4 support
..* Change "mrheroux" theme to "default"
2. Node editor
..* Finish authentication
..* Create admin panel set root user in config
..* Add validation to node management script
..* Add node_menu setup
..* Allow users to upload files and use them in nodes
..* Add text file based node history, e.g. nodes/{node_id}/file_id
..* Create a node_revision database file_id | status (draft,published), user_id
..* Use GIT to track page change.
3. Database Improvements
..* Change table from plural to singular name, e.g. `users` to `user`
..* Change tables pk from `id` to `user_id`
4. Dynamic node links
..* Allow for node links to work even when pages URL change, e.g. $instance->href(1)
5. Plugins
..* Create setup script where you can choose what plugins to install
..* Make contact form, etc. packages.
..* uses tar.gz files placed in /resources/plugins extracts
..* to .tmp runs install.php script, which is contained in contained in plugin,
..* to install features and remove.php to remove features.
6. Misc
..* Make resume.pdf able to be included without being on github?
..* Change projects to two columns and render all images
..* Add ehs cc as case study multiple...
..* Move color outside of angularjs
