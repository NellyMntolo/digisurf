<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();


$notification = '';
    $sqlb = 'SELECT * FROM shop_digisurf_product WHERE product_notification = "N" ';
     
     $retvalb = mysql_query( $sqlb, $conn );     
     if(! $retvalb )
     {
        die('Could not get data: ' . mysql_error());
     }

     while($row1 = mysql_fetch_array($retvalb, MYSQL_ASSOC)){
      $product_url = $row1['product_url'];
      $product_name = $row1['product_name'];
      $notification .= '<li>
                        <a href="/Admin/ViewProduct/'.$product_url.'">
                          <i class="fa fa-tag text-yellow"></i>New Product: '.$product_name.'
                        </a>
                      </li>';
    }

    echo $notification;
?>