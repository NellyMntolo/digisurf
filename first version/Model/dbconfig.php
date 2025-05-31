<?php
	// $dbhost = 'localhost';

	 //   	// $dbuser = ''; 
	 //   	// $dbpass = '';
	 //   	$dbuser = ''; 
	 //   	$dbpass = '';
	 //   	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	 //   	//mysql_select_db('');
	 //   	mysql_select_db('');
	 //   	mysql_set_charset("utf8");
	 //   	mysql_query("SET NAMES 'utf8'");	
	 //   	mysql_query("SET CHARACTER SET utf8", $conn); 


	 //   	if(! $conn )
	 //   {
	 //      die('Could not connect: ' . mysql_error());
	 //   }
error_reporting(0);
		$dbhost = 'localhost';

	   	$dbuser = ''; 
	   	$dbpass = '';
	   	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	   	mysql_select_db('');
	   	mysql_set_charset("utf8");
	   	mysql_query("SET NAMES 'utf8'");	
	   	mysql_query("SET CHARACTER SET utf8", $conn); 


	   	if(! $conn )
	   {
	      die('Could not connect: ' . mysql_error());
	   }





/*
$dsn = 'mysql:host=localhost;dbname=Customer';
$username = 'root';
$password = '123456';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 

$conn = new PDO($dsn, $username, $password, $options);
*/