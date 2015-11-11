<?php

include_once '/../config/db_cred.inc.php';

session_start();
if (!isset($_SESSION['token'])) {
	$_SESSION['token'] = sha1(uniqid(mt_rand(),TRUE));
}

foreach ($C as $name => $val){
    define($name, $val);
}
$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
$dbo = new PDO($dsn, DB_USER, DB_PASS);