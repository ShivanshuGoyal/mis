<?php
	define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'p');
    define('DB_DATABASE', 'mis');
	
	define("SECURE", FALSE);
	define("WEBSITE_ROOT", "http://localhost/mis/WebsiteRoot");

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
?>