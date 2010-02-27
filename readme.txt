=== Sypex Dumper 2 for WordPress ===
Contributors: zapimir
Donate link: http://sypex.net/en/products/dumper/sponsors/
Tags: backup, restore, cron, mysql, database
Requires at least: 2.9.0
Tested up to: 2.9.2
Stable tag: 1.0

Plugin integrates Sypex Dumper 2 in WordPress. Which can help you create a backup and restore of your MySQL database.


== Description ==

Plugin integrates Sypex Dumper 2 in WordPress. Which can help you create a backup and restore of your MySQL database.
Sypex Dumper, unlike many similar scripts (plugins), is optimized for maximum performance, as well as for working with large databases of hundreds or thousands of megabytes.
Key features, briefly: backup and restore of MySQL database without using third-party programs, just pure PHP; impressive performance; support for two formats file compression (Gzip and Bzip2); friendly Web 2.0 interface with AJAX; work in several stages (to bypass the time restrictions);  special file format with the meta-information; MySQL service functions (check, optimize, repair);  smart backup with post-processing.

Sypex Dumper can work independently of WordPress, just go to the `wordpress/sxd/` and enter the MySQL Username and password.


== Installation ==

1. Download latest version of Sypex Dumper from http://sypex.net/en/products/dumper/downloads/
2. Copy folder `sxd` to folder `wordpress`
3. Set chmod 777 for backup folder `sxd/backup` 
4. Set chmod 666 or 777 for files `sxd/cfg.php` and `sxd/ses.php`. 
5. Copy the file `auth_wb2.php` from the archive to `sxd` directory
6. Open `sxd/cfg.php` and find line 
	'auth' => 'mysql cfg', 
	replace
	'auth' => 'wp2 mysql cfg', 
7. Copy `wp-sxd` from the archive to `wordpress/wp-content/plugins`
8. Enter Wordpress Admin panel -> Plugins and Activate plugin "Sypex Dumper 2 for WordPress"
9. Then added menu Sypex Dumper 2 where you can make backup/restore database without additional authorization.



== Frequently Asked Questions ==

= How do I schedule automatic backups to be saved to my server? =

Sypex Dumper starting from version 2.0.5 supports the work from the command line (console/cron). 

The following arguments: 

* -h=localhost - MySQL-host
* -o=3306 - port
* -u=root - username
* -p=password - password
* -j=my_job - name of the saved job
Only argument -j with the name of the saved job required, all the rest must be specified in the event that they differ from the data stored in the config file. 

Examples

in unix systems: 

/usr/local/bin/php /absolute_path_to_dumper/index.php -j=my_job

in windows: 

z:\php5.2\php.exe absolute_path_to_dumper\index.php -j=my_job

Path to php interpreter may vary. 

Dumper can run from the command line to perform jobs as exports and imports (for example, if you need to reset every day database of demo-site). 


== Screenshots ==

1. Sypex Dumper 2 in WordPress Admin

== Changelog ==

= 1.0 =
* Stable Release

== Upgrade Notice ==

= 1.0 =
* Stable Release