<?php
// Sypex Dumper 2 authorization file for WordPress 2.9.x
$path = '../wp-config.php'; 
$config = array();
foreach($_COOKIE AS $c => $v){
	if(strpos($c, 'wordpress_logged_in') !== false) {
		$config['COOKIE'] = explode('|', $v);
		break;
	}	
}
// Parsing config, to skip including wp-settings.php 
if(isset($config['COOKIE']) && count($config['COOKIE']) == 3){
	$file = file_get_contents($path);
	if(preg_match_all("/define\('(\w+)',\s*'(.*?)'\);/m", $file, $m, PREG_SET_ORDER) && preg_match("/^\\\$table_prefix\s*=\s*'(.+?)';/m", $file, $t)){
		$config['TAB_PREFIX'] = stripcslashes($t[1]);
		foreach($m AS $c){
			$config[$c[1]] = stripcslashes($c[2]);
		}
		if($this->connect($config['DB_HOST'], '', $config['DB_USER'], $config['DB_PASSWORD'])){
			// Check user
			mysql_selectdb($config['DB_NAME']);
			mysql_query("SET NAMES {$config['DB_CHARSET']}");
			if($r = mysql_query("SELECT user_pass, meta_value AS user_level FROM {$config['TAB_PREFIX']}users u LEFT JOIN {$config['TAB_PREFIX']}usermeta m ON (u.id = m.user_id) WHERE u.user_login = '{$config['COOKIE'][0]}' AND m.meta_key = 'wp_user_level'")){
				$u = mysql_fetch_assoc($r);
				$pass_frag = substr($u['user_pass'], 8, 4);
				$r = mysql_query("SELECT option_value FROM {$config['TAB_PREFIX']}options WHERE option_name = 'logged_in_salt'");
				$o = mysql_fetch_assoc($r);
				
				$key  = hash_hmac('md5', $config['COOKIE'][0] . $pass_frag . '|' . $config['COOKIE'][1], $config['LOGGED_IN_KEY'] . $o['option_value']);
				$hash = hash_hmac('md5', $config['COOKIE'][0] . '|' . $config['COOKIE'][1], $key);
				if($hash == $config['COOKIE'][2]){
					// User logged in, check admin permisions
					if($u['user_level'] > 7) $auth = 1;
					$this->CFG['my_db']   = $config['DB_NAME'];
				}
			}
		}
	}
}
?>