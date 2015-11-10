<?php 
// db config
$connectInfo = array(
	'host' => 'localhost',
	'dbname' => 'take_framework',
	'dbuser' => 'root',
	'password' => 'root'
);

// is_webroot
// yes = 0;
// no = 1;
define('IS_WEBROOT', 0);

// route
// set root controller & action
define('CTRL', 'index');
define('ACTION', 'index');