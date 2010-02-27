<?php
/*
Plugin Name: Sypex Dumper 2 for WordPress 
Plugin URI: http://sypex.net/en/products/dumper/downloads/
Description: Sypex Dumper 2 integration. Help you create a backup copy (dump, export) of a MySQL database, and also restore the database from the backup file if needed
Version: 1.0
Author: zapimir
Author URI: http://sypex.net
*/

add_option("wp-sxd_version", "1.0");
add_action('admin_menu', 'sxd_plugin_menu');

function sxd_plugin_menu() {
  add_menu_page('Sypex Dumper', 'Sypex Dumper 2', 'manage_options', __FILE__, sxd_main_menu);
} 

function sxd_main_menu() {
?>
<h2>Sypex Dumper 2</h2>
<iframe src="../sxd/" width="586" height="462" frameborder="0" style="margin:0;"></iframe>
<?php
}
?>