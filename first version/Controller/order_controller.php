<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();

$current_lang = $_SESSION['lang'];
$current_customer = $_SESSION['login_visitor'];
$current_total = $_SESSION['liven_total'];


if(isset($_POST['new_order'])){

  $max_misc = 'SELECT order_id FROM shop_digisurf_order ORDER BY order_id DESC';
  $retvalmax_miscen = mysql_query( $max_misc, $conn );                 
                             if(! $retvalmax_miscen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
  $rowmax_miscen = mysql_fetch_array($retvalmax_miscen, MYSQL_ASSOC);
  $large_misc = $rowmax_miscen['order_id'];

  $sqlcustomer_id = 'SELECT customer_id, customer_points FROM shop_digisurf_customer WHERE customer_email="'.$current_customer.'"';
  $retvalcustomer_id = mysql_query( $sqlcustomer_id, $conn );                 
                             if(! $retvalcustomer_id )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
  $rowcustomer_id = mysql_fetch_array($retvalcustomer_id, MYSQL_ASSOC);
  $real_customer_id = $rowcustomer_id['customer_id'];
  $real_customer_points = $rowcustomer_id['customer_points'];

  $themisc = $large_misc+1;
  
  $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'); // and any other characters
  shuffle($seed); // probably optional since array_is randomized; this may be redundant
  $rand = '';
  foreach (array_rand($seed, 10) as $k) $rand .= $seed[$k];
  //print_r($rand);


  $points = mysql_real_escape_string($_POST['points'],$conn);
  $quantities = mysql_real_escape_string($_POST['quantities'],$conn);
  $product_type = mysql_real_escape_string($_POST['product_types'],$conn);


if($_POST['products'] != null || $_POST['products'] != ''){
  $sqla = 'INSERT INTO shop_digisurf_order (order_id, customer_id, order_number, order_date, order_status, order_price, order_points, order_notification) VALUES ( "'.$themisc.'", "'.$real_customer_id.'", "'.$rand.'", now(), "P", "'.$current_total.'", "'.$points.'", "N" )';

  $retvala = mysql_query( $sqla, $conn );
    if(! $retvala ) {  
        die('Could not enter data: ' . mysql_error());
      }

                    $all_prods = explode(',',$_POST['products']);
                    $all_quants = explode(',',$_POST['quantities']);
                    $all_prod_types = explode(',',$_POST['product_types']);

                    for($i = 0; $i < count($all_prods); $i++){
                            $all_quants[$i] = (int)$all_quants[$i];
                            $all_prod_types[$i] = (string)$all_prod_types[$i];
                            //print_r("product =".$all_prods[$i]."<br>");
                            //print_r("quantity =".$all_quants[$i]."<br>");
                            //print_r("types =".$all_prod_types[$i]."<br>");                        
                              $sql_order_products = 'INSERT INTO shop_digisurf_order_list (order_id, product_id, customer_id, product_quantity, product_type) VALUES ("'.$themisc.'", "'.$all_prods[$i].'", "'.$real_customer_id.'", "'.$all_quants[$i].'", "'.$all_prod_types[$i].'")';  
                               $retval_order_products = mysql_query( $sql_order_products, $conn );
                               if(! $retval_order_products )
                                   {
                                      die('Could not enter data: ' . mysql_error());
                                   }  

                              //Type Product
                              $sql_product_quantity="UPDATE shop_digisurf_product SET product_quantity= product_quantity - '".$all_quants[$i]."'  WHERE product_id='".$all_prods[$i]."' AND search_type='".$all_prod_types[$i]."' ";              
                              $retval_product_quantity = mysql_query( $sql_product_quantity, $conn );
                              if(! $retval_product_quantity )
                                    {
                                      die('Could not enter data: ' . mysql_error());
                                    }      

                              //Type Package
                              /*$sql_package_quantity="UPDATE shop_digisurf_package SET customer_points='".$all_quants[$i]."'  WHERE customer_id='".$real_customer_id."' ";              
                              $retval_package_quantity = mysql_query( $sql_package_quantity, $conn );
                              if(! $retval_package_quantity )
                                   {
                                      die('Could not enter data: ' . mysql_error());
                                   }   */                                                     
                        }



                  $customer_point_update = $real_customer_points + $points;

                  $sql_user_points="UPDATE shop_digisurf_customer SET customer_points='".$customer_point_update."'  WHERE customer_id='".$real_customer_id."' LIMIT 1 ";              
                  $retval_user_points = mysql_query( $sql_user_points, $conn );
                  if(! $retval_user_points )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }
                  
}


      unset($_SESSION["cart_item"]);
      $_SESSION['pay_thankyou'] = "99999999999999994";
      header("Refresh:0; url=/ThankYou");
}

?>