<?php
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

	   error_reporting(0);