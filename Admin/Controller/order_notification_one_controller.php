<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();


$notification = '';
    $sqlb = 'SELECT * FROM shop_digisurf_order WHERE order_notification = "N" ';
     
     $retvalb = mysql_query( $sqlb, $conn );     
     if(! $retvalb )
     {
        die('Could not get data: ' . mysql_error());
     }

     while($row1 = mysql_fetch_array($retvalb, MYSQL_ASSOC)){
      $order_number = $row1['order_number'];
      $notification .= '<li>
                        <a href="/Admin/ViewOrder/'.$order_number.'">
                          <i class="fa fa-shopping-cart text-aqua"></i>New Order: '.$order_number.'
                        </a>
                      </li>';
    }

    echo $notification;
?>