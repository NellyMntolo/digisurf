<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];

$orderid = mysql_real_escape_string($_GET['order_id'],$conn);

                        $sql_reset='UPDATE shop_digisurf_order SET order_notification="Y" where order_number ="'.$orderid.'" LIMIT 1';              
                        $retval_reset = mysql_query( $sql_reset, $conn );
                        if(! $retval_reset )
                            {
                                die('Could not enter data: ' . mysql_error());
                            }


                        $sqlweareen = 'select * from shop_digisurf_order where order_number ="'.$orderid.'" LIMIT 1';
                        $retvalweareen = mysql_query( $sqlweareen, $conn );                 
                             if(! $retvalweareen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowweareen = mysql_fetch_array($retvalweareen, MYSQL_ASSOC);
                            $order_id = $rowweareen['order_id']; 
                            $customer_id = $rowweareen['customer_id'];
                            $order_number = $rowweareen['order_number'];
                            $order_date = $rowweareen['order_date'];
                            $order_status = $rowweareen['order_status'];                            
                            $order_price = $rowweareen['order_price'];
                            
                            $current_order_status = '';
                            if ($order_status =="C") {
                               $current_order_status = '<option value="C">Cancelled</option>
                                                        <option value="D">Delivered</option>
                                                        <option value="P">Pending</option>
                                                        <option value="S">Shipping</option>';                                
                            } elseif ($order_status =="D") {
                               $current_order_status = '<option value="D">Delivered</option>
                                                        <option value="C">Cancelled</option>
                                                        <option value="P">Pending</option>
                                                        <option value="S">Shipping</option>';                                
                            } elseif ($order_status =="P") {
                               $current_order_status = '<option value="P">Pending</option>
                                                        <option value="D">Delivered</option>
                                                        <option value="C">Cancelled</option>
                                                        <option value="S">Shipping</option>';                                
                            } elseif ($order_status =="S") {
                               $current_order_status = '<option value="S">Shipping</option>
                                                        <option value="P">Pending</option>
                                                        <option value="D">Delivered</option>
                                                        <option value="C">Cancelled</option>';                                
                            }


                            $sqlcustomers = 'select * from shop_digisurf_customer where customer_id = "'.$customer_id.'" LIMIT 1';
                            $retvalcustomers = mysql_query( $sqlcustomers, $conn );                 
                             if(! $retvalcustomers )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_customer = mysql_fetch_array($retvalcustomers, MYSQL_ASSOC);
                            $customer_gender = $row_customer['customer_gender'];
                            $customer_first_name = $row_customer['customer_first_name'];
                            $customer_last_name = $row_customer['customer_last_name'];
                            $customer_email = $row_customer['customer_email'];
                            $customer_password = $row_customer['customer_password'];
                            $customer_dob = $row_customer['customer_dob'];
                            $customer_reg_date = $row_customer['customer_reg_date'];
                            $customer_type = $row_customer['customer_type'];
                            $customer_url = $row_customer['customer_url'];
                            $customer_initials = $row_customer['customer_initials'];
                            $customer_last_update = $row_customer['customer_last_update'];


                        $sql_address = 'select * from shop_digisurf_address where customer_id="'.$customer_id.'" ';
                        $retval_address = mysql_query( $sql_address, $conn );                 
                             if(! $retval_address )
                             {
                                die('Could not get data: ' . mysql_error());
                             }


                        $row_address = mysql_fetch_array($retval_address, MYSQL_ASSOC);
                        $address_city = $row_address['address_city'];
                        $address_country = $row_address['address_country'];
                        $address_one = $row_address['address_one'];
                        $address_two = $row_address['address_two'];
                        $address_three = $row_address['address_three'];
                        $address_landline = $row_address['address_landline'];
                        $address_mobile = $row_address['address_mobile'];




                            $sqlorders = 'select * from shop_digisurf_order_list where order_id = "'.$order_id.'"';
                            $retvalorders = mysql_query( $sqlorders, $conn );                 
                             if(! $retvalorders )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                            $total_orders =mysql_num_rows($retvalorders);

                            //$product_id = '';
                            $all_products= '';
                            $all_products_total = '';
                            $product_discount = '';
                            $product_shipping = '';
                            while($roworders = mysql_fetch_array($retvalorders, MYSQL_ASSOC)){
                                $product_id = $roworders['product_id']; 




                            $sqlorders_products = 'select * from shop_digisurf_product where product_id = "'.$product_id.'"';
                            $retvalorders_products = mysql_query( $sqlorders_products, $conn );                 
                             if(! $retvalorders_products )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                            $total_orders_products =mysql_num_rows($retvalorders_products);

                            
                            while($roworders_products = mysql_fetch_array($retvalorders_products, MYSQL_ASSOC)){
                                $product_name = $roworders_products['product_name'];
                                $product_sku = $roworders_products['product_sku'];
                                $product_barcode = $roworders_products['product_barcode'];
                                $product_status = $roworders_products['product_status'];
                                $product_price = $roworders_products['product_price'];
                                $product_quantity = $roworders_products['product_quantity'];
                                $product_discount_id = $roworders_products['product_discount_id'];
                                $product_url = $roworders_products['product_url'];
                                $product_image = $roworders_products['product_image']; 


                                $sqlorders_quantity = 'select * from shop_digisurf_order_list where order_id = "'.$order_id.'"';
                                $retvalorders_quantity = mysql_query( $sqlorders_quantity, $conn );                 
                                 if(! $retvalorders_quantity )
                                 {
                                    die('Could not get data: ' . mysql_error());
                                 }
                                $roworders_quantity = mysql_fetch_array($retvalorders_quantity, MYSQL_ASSOC);
                                $order_product_quantity = $roworders_quantity['product_quantity'];

                                if($product_status == 'Y'){
                                    $current_Status = 'Enabled';
                                } elseif($product_status == 'N'){
                                    $current_Status = 'Disabled';
                                }

                                $all_products .= '<tr class="color-palette text-center">
                                                      <td><img src="'.$product_image.'"></td>
                                                      <td>'.$product_name.'</td>
                                                      <td>'.$product_barcode.'</td>
                                                      <td>'.$total_discount.'$'.$product_price.'</td>
                                                      <td>'.$order_product_quantity.'</td>
                                                      <td>'.$current_Status.'</td>
                                                      <td><form method="get" action=""><button type="button" onclick="window.location=\'/Admin/ViewProduct/'.$product_url.'\';" class="btn bg-teal btn-flat" title="Edit"><i class="fa fa-pencil"></i></button><input type="hidden" name="" ></form></td>
                                                    </tr>';  

                                $all_products_total += $product_price;               
                            }









                            $sql_product_discounts = 'select * from shop_digisurf_discount where product_id = "'.$product_id.'"';
                            $retval_product_discounts = mysql_query( $sql_product_discounts, $conn );                 
                             if(! $retval_product_discounts )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            
                            while($row_product_discounts = mysql_fetch_array($retval_product_discounts, MYSQL_ASSOC)){
                                $product_discount += $row_product_discounts['amount']; 
                            }


                            $sql_product_shippings = 'select * from shop_digisurf_shipping where product_id = "'.$product_id.'"';
                            $retval_product_shippings = mysql_query( $sql_product_shippings, $conn );                 
                             if(! $retval_product_shippings )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            
                            while($row_product_shippings = mysql_fetch_array($retval_product_shippings, MYSQL_ASSOC)){
                                $product_shipping += $row_product_shippings['text5']; 
                            }
                                                         
                            }


                            

?>