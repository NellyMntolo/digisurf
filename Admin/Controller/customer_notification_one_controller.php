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

     while($row1 = mysql_fetch_array($retvalb, MYSQL_ASSOC)){
      $customer_url = $row1['customer_url'];
      $customer_name = $row1['customer_first_name'];
      $customer_last_name = $row1['customer_last_name'];
      $notification .= '<li>
                        <a href="/Admin/ViewCustomer/'.$customer_url.'">
                          <i class="fa fa-users text-green"></i>New customer: '.$customer_name.' '.$customer_last_name.'
                        </a>
                      </li>';
    }

    echo $notification;
?>