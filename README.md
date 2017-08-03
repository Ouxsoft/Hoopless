# Hoopless
Rapidly develop beautiful websites without jumping through hoops. Hoopless is the modern lightweight content management system designed for web curators and web developers.

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