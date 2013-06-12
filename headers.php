<?php
	//Show all errors. Remove before release.  
	error_reporting(E_ALL);
	ini_set('display_errors','1');
	
	global $db;
	$db = new mysqli('localhost', 'dbuser', 'dbpassword', 'dbname');
	if($db->connect_errno > 0){
	    die('Unable to connect to database [' . $db->connect_error . ']');
	}

	function clean($var) { //Cleans input of html and mysql injection
		return mysql_real_escape_string(stripslashes(htmlentities($var, ENT_QUOTES, 'UTF-8')));
	}

	function fix_magic_quotes()
	{
		if (get_magic_quotes_gpc()) {
			$func = create_function(
			'&$val, $key',
			'if(!is_numeric($val)) {$val = stripslashes($val);}'
		);
		array_walk_recursive($_GET, $func);
		array_walk_recursive($_POST, $func);
		array_walk_recursive($_COOKIE, $func);
		}
		return true;
	}

fix_magic_quotes();


ob_start();
session_start();
?>