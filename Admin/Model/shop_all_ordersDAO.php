<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];
                        $sqlweareen = 'select * from shop_digisurf_order order by idx DESC';
                        $retvalweareen = mysql_query( $sqlweareen, $conn );                 
                             if(! $retvalweareen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $total_orders =mysql_num_rows($retvalweareen);

                        $all_orders = '';
                        while($rowweareen = mysql_fetch_array($retvalweareen, MYSQL_ASSOC)){
                            $order_id = $rowweareen['order_id']; 
                            $customer_id = $rowweareen['customer_id'];
                            $order_number = $rowweareen['order_number'];
                            $order_date = $rowweareen['order_date'];
                            $order_status = $rowweareen['order_status'];                            
                            $order_price = $rowweareen['order_price'];
                            $order_discount = $rowweareen['order_discount'];


                        $sql_order_customer = 'select * from shop_digisurf_customer where customer_id="'.$customer_id.'" LIMIT 1';
                        $retval_order_customer = mysql_query( $sql_order_customer, $conn );                 
                             if(! $retval_order_customer )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_order_customer = mysql_fetch_array($retval_order_customer, MYSQL_ASSOC);
                            $customer_order_f_name = $row_order_customer['customer_first_name']; 
                            $customer_order_l_name = $row_order_customer['customer_last_name']; 


                            if($order_status == "P"){
                            $all_orders .= '<tr class="text-center">
                                              <td>'.$order_number.'</td>
                                              <td>'.$customer_order_f_name[0].'. '.$customer_order_l_name.'</td>
                                              <td>$'.$order_price.'</td>
                                              <td><span class="label label-warning">pending</span></td>
                                              <td>'.$order_discount.'</td>
                                              <td>'.$order_date.'</td>
                                              <td><a href="/Admin/ViewOrder/'.$order_number.'" class="btn btn-flat"><i class="fa fa-pencil" style="width: 20px;"></i></a></td>
                                            </tr>';
                                          }

                            if($order_status == "C"){
                            $all_orders .= '<tr class="text-center">
                                              <td>'.$order_number.'</td>
                                              <td>'.$customer_order_f_name[0].'. '.$customer_order_l_name.'</td>
                                              <td>$'.$order_price.'</td>
                                              <td><span class="label label-danger">cancelled</span></td>
                                              <td>'.$order_discount.'</td>
                                              <td>'.$order_date.'</td>
                                              <td><a href="/Admin/ViewOrder/'.$order_number.'" class="btn btn-flat"><i class="fa fa-pencil" style="width: 20px;"></i></a></td>
                                            </tr>';
                                          }

                            if($order_status == "D"){
                            $all_orders .= '<tr class="text-center">
                                              <td>'.$order_number.'</td>
                                              <td>'.$customer_order_f_name[0].'. '.$customer_order_l_name.'</td>
                                              <td>$'.$order_price.'</td>
                                              <td><span class="label label-success">delivered</span></td>
                                              <td>'.$order_discount.'</td>
                                              <td>'.$order_date.'</td>
                                              <td><a href="/Admin/ViewOrder/'.$order_number.'" class="btn btn-flat"><i class="fa fa-pencil" style="width: 20px;"></i></a></td>
                                            </tr>';
                                          }

                            if($order_status == "S"){
                            $all_orders .= '<tr class="text-center">
                                              <td>'.$order_number.'</td>
                                              <td>'.$customer_order_f_name[0].'. '.$customer_order_l_name.'</td>
                                              <td>$'.$order_price.'</td>
                                              <td><span class="label label-primary">shipping</span></td>
                                              <td>'.$order_discount.'</td>
                                              <td>'.$order_date.'</td>
                                              <td><a href="/Admin/ViewOrder/'.$order_number.'" class="btn btn-flat"><i class="fa fa-pencil" style="width: 20px;"></i></a></td>
                                            </tr>';
                                          }
                        }






                        $sqlnotification = 'select * from shop_digisurf_order where order_notification="N" order by idx DESC';
                        $retvalnotification = mysql_query( $sqlnotification, $conn );                 
                             if(! $retvalnotification )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $total_order_notifications =mysql_num_rows($retvalnotification);

                        $all_order_notifications = '';
                        while($rownotification = mysql_fetch_array($retvalnotification, MYSQL_ASSOC)){
                            $order_id = $rownotification['order_id']; 
                            $customer_id = $rownotification['customer_id'];
                            $order_number = $rownotification['order_number'];
                            $order_date = $rownotification['order_date'];
                            $order_status = $rownotification['order_status'];                            
                            $order_price = $rownotification['order_price'];
                            $order_discount = $rownotification['order_discount'];


                        $sql_order_customer = 'select * from shop_digisurf_customer where customer_id="'.$customer_id.'" LIMIT 1';
                        $retval_order_customer = mysql_query( $sql_order_customer, $conn );                 
                             if(! $retval_order_customer )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_order_customer = mysql_fetch_array($retval_order_customer, MYSQL_ASSOC);
                            $customer_order_f_name = $row_order_customer['customer_first_name']; 
                            $customer_order_l_name = $row_order_customer['customer_last_name']; 


                            if($order_status == "P"){
                            $all_order_notifications .= '<tr class="text-center">
                                              <td>'.$order_number.'</td>
                                              <td>'.$customer_order_f_name[0].'. '.$customer_order_l_name.'</td>
                                              <td>$'.$order_price.'</td>
                                              <td><span class="label label-warning">pending</span></td>
                                              <td>'.$order_discount.'</td>
                                              <td>'.$order_date.'</td>
                                              <td><a href="/Admin/ViewOrder/'.$order_number.'" class="btn btn-flat"><i class="fa fa-pencil" style="width: 20px;"></i></a></td>
                                            </tr>';
                                          }

                            if($order_status == "C"){
                            $all_order_notifications .= '<tr class="text-center">
                                              <td>'.$order_number.'</td>
                                              <td>'.$customer_order_f_name[0].'. '.$customer_order_l_name.'</td>
                                              <td>$'.$order_price.'</td>
                                              <td><span class="label label-danger">cancelled</span></td>
                                              <td>'.$order_discount.'</td>
                                              <td>'.$order_date.'</td>
                                              <td><a href="/Admin/ViewOrder/'.$order_number.'" class="btn btn-flat"><i class="fa fa-pencil" style="width: 20px;"></i></a></td>
                                            </tr>';
                                          }

                            if($order_status == "D"){
                            $all_order_notifications .= '<tr class="text-center">
                                              <td>'.$order_number.'</td>
                                              <td>'.$customer_order_f_name[0].'. '.$customer_order_l_name.'</td>
                                              <td>$'.$order_price.'</td>
                                              <td><span class="label label-success">delivered</span></td>
                                              <td>'.$order_discount.'</td>
                                              <td>'.$order_date.'</td>
                                              <td><a href="/Admin/ViewOrder/'.$order_number.'" class="btn btn-flat"><i class="fa fa-pencil" style="width: 20px;"></i></a></td>
                                            </tr>';
                                          }

                            if($order_status == "S"){
                            $all_order_notifications .= '<tr class="text-center">
                                              <td>'.$order_number.'</td>
                                              <td>'.$customer_order_f_name[0].'. '.$customer_order_l_name.'</td>
                                              <td>$'.$order_price.'</td>
                                              <td><span class="label label-primary">shipping</span></td>
                                              <td>'.$order_discount.'</td>
                                              <td>'.$order_date.'</td>
                                              <td><a href="/Admin/ViewOrder/'.$order_number.'" class="btn btn-flat"><i class="fa fa-pencil" style="width: 20px;"></i></a></td>
                                            </tr>';
                                          }
                        }

?>