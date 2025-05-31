<?php
		$dbhost = '68.178.143.67';

	   	//$dbuser = 'root'; 
	   	//$dbpass = '123456';
	   	$dbuser = 'Customer'; 
	   	$dbpass = 'Hover1@liven';
	   	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	   	mysql_select_db('Customer');
	   	mysql_set_charset("utf8");
	   	mysql_query("SET NAMES 'utf8'");	
	   	mysql_query("SET CHARACTER SET utf8", $conn); 


	   	if(! $conn )
	   {
	      die('Could not connect: ' . mysql_error());
	   }
