<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();


$notification = '';
    $sqlb = 'SELECT * FROM shop_digisurf_package WHERE package_notification = "N" ';
     
     $retvalb = mysql_query( $sqlb, $conn );     
     if(! $retvalb )
     {
        die('Could not get data: ' . mysql_error());
     }

     while($row1 = mysql_fetch_array($retvalb, MYSQL_ASSOC)){
      $package_name = $row1['package_name'];
      $package_url = $row1['package_url'];
      $notification .= '<li>
                        <a href="/Admin/EditPackage/'.$package_url.'">
                          <i class="fa fa-sitemap text-red"></i>New Package: '.$package_name.'
                        </a>
                      </li>';
    }

    echo $notification;
?>