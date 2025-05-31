<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();


$notification = '';
    $sqlb = 'SELECT * FROM shop_digisurf_customer WHERE customer_notification = "N" ';
     
     $retvalb = mysql_query( $sqlb, $conn );     
     if(! $retvalb )
     {
        die('Could not get data: ' . mysql_error());
     }

     $notification = mysql_num_rows($retvalb);

    echo $notification;
?>