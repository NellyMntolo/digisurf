<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];

$customerurl = mysql_real_escape_string($_GET['customer_id'],$conn);


                        $sql_reset='UPDATE shop_digisurf_customer SET customer_notification="Y" where customer_url ="'.$customerurl.'" LIMIT 1';              
                        $retval_reset = mysql_query( $sql_reset, $conn );
                        if(! $retval_reset )
                            {
                                die('Could not enter data: ' . mysql_error());
                            }
                        
                        $sql_customer = 'select * from shop_digisurf_customer where customer_url="'.$customerurl.'" ';
                        $retval_customer = mysql_query( $sql_customer, $conn );                 
                             if(! $retval_customer )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_customer = mysql_fetch_array($retval_customer, MYSQL_ASSOC);
                            $customer_id = $row_customer['customer_id'];
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
                            $customer_sponsor = $row_customer['customer_sponsor'];
                            $customer_discount = $row_customer['customer_discount'];
                            $customer_member_id = $row_customer['customer_member_id'];
                            $customer_points = $row_customer['customer_points'];

                            $c_type = '';
                            if ($customer_type == "R") {
                              $c_type = "Regular Customer";
                            } elseif ($customer_type == "M") {
                              $c_type = "Discount Member";
                            } elseif ($customer_type == "V") {
                              $c_type = "VIP";
                            } elseif ($customer_type == "SWD") {
                              $c_type = "Senior Web Distributor";
                            } elseif ($customer_type == "IWD") {
                              $c_type = "Independent Web Distributor";
                            }



                        $sql_group_members = 'select * from shop_digisurf_group_members where customer_id="'.$customer_id.'" ';
                        $retval_group_members = mysql_query( $sql_group_members, $conn );                 
                             if(! $retval_group_members )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $row_group_members = mysql_fetch_array($retval_group_members, MYSQL_ASSOC);
                        $member_group_id = $row_group_members['group_id'];



                        $sql_group_name = 'select * from shop_digisurf_group where group_id="'.$member_group_id.'" ';
                        $retval_group_name = mysql_query( $sql_group_name, $conn );                 
                             if(! $retval_group_name )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $row_group_name = mysql_fetch_array($retval_group_name, MYSQL_ASSOC);
                        $member_group_name = $row_group_name['group_name'];
                        $member_group_start_date = $row_group_name['group_start_date'];
                        $member_group_url = $row_group_name['group_url'];



                        $sql_group_members_total = 'select * from shop_digisurf_group_members where group_id="'.$member_group_id .'" ';
                        $retval_group_members_total = mysql_query( $sql_group_members_total, $conn );                 
                             if(! $retval_group_members_total )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $total_group_members =mysql_num_rows($retval_group_members_total);
/*
                        $final_groupt_totals = '';
                        while( $row_group_name = mysql_fetch_array($retval_group_name, MYSQL_ASSOC)) && ($total_group_members =mysql_num_rows($retval_group_members_total)) ){

                                $member_group_name = $row_group_name['group_name'];
                                $member_group_start_date = $row_group_name['group_start_date'];
                                //$total_group_members =mysql_num_rows($retval_group_members_total);

                                $final_groupt_totals = '<td><a>'.$member_group_name.'</a></td>
                                                  <td>'.$member_group_start_date.'</td>
                                                  <td>'.$total_group_members.'</td>';
                        }
                        */


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


                        $sql_discount_history = 'select * from shop_digisurf_discount where customer_id="'.$customer_id.'" ';
                        $retval_discount_history = mysql_query( $sql_discount_history, $conn );                 
                             if(! $retval_discount_history )
                             {
                                die('Could not get data: ' . mysql_error());
                             }


                        $discount_total =mysql_num_rows($retval_discount_history);
                        $all_discounts = '';
                        while($row_discount_history = mysql_fetch_array($retval_discount_history, MYSQL_ASSOC)){
                        $discount_amount = $row_discount_history['amount'];
                        $discount_start_date = $row_discount_history['start_date'];
                        $discount_end_date = $row_discount_history['end_date'];

                        $all_discounts .= '<tr class="color-palette text-center">
                                              <td>'.$discount_start_date.'</td>
                                              <td>'.$discount_end_date.'</td>
                                              <td>$'.$discount_amount.'</td>
                                            </tr>';

                        }

                        $sql_customer_visits = 'select * from shop_digisurf_customer_visits where customer_id="'.$customer_id.'" order by idx desc';
                        $retval_customer_visits = mysql_query( $sql_customer_visits, $conn );                 
                             if(! $retval_customer_visits )
                             {
                                die('Could not get data: ' . mysql_error());
                             }


                        $all_customer_visits = '';
                        while($row_customer_visits = mysql_fetch_array($retval_customer_visits, MYSQL_ASSOC)){
                        $customer_visit_date = $row_customer_visits['visit_date'];
                        $customer_origin = $row_customer_visits['origin'];
                        $customer_ip_address = $row_customer_visits['ip_address'];

                        $all_customer_visits .= '<tr class="color-palette text-center">
                                                      <td>'.$customer_visit_date.'</td>
                                                      <!--<td>'.$customer_origin.'</td>-->
                                                      <td>'.$customer_ip_address.'</td>
                                                    </tr>';

                        }


                        $sql_order_history = 'select * from shop_digisurf_order where customer_id="'.$customer_id.'" ';
                        $retval_order_history = mysql_query( $sql_order_history, $conn );                 
                             if(! $retval_order_history )
                             {
                                die('Could not get data: ' . mysql_error());
                             }


                        $order_total =mysql_num_rows($retval_order_history);
                        $all_orders = '';
                        while($row_order_history = mysql_fetch_array($retval_order_history, MYSQL_ASSOC)){
                        $order_id = $row_order_history['order_id'];
                        $order_number = $row_order_history['order_number'];
                        $order_date = $row_order_history['order_date'];
                        $order_status = $row_order_history['order_status'];
                        $order_price = $row_order_history['order_price'];

                        $all_orders .= '<tr class="color-palette text-center">
                                          <td>'.$order_date.'</td>
                                          <td><a href="/Admin/ViewOrder/'.$order_number.'">'.$order_number.'</a></td>
                                          <td>'.$order_status.'</td>
                                          <td>$'.$order_price.'</td>
                                        </tr>';

                        }


                        $sql_bonus_history = 'select * from shop_digisurf_bonus where customer_id="'.$customer_id.'" ';
                        $retval_bonus_history = mysql_query( $sql_bonus_history, $conn );                 
                             if(! $retval_bonus_history )
                             {
                                die('Could not get data: ' . mysql_error());
                             }


                        $bonus_total =mysql_num_rows($retval_bonus_history);
                        $all_bonus = '';
                        while($row_bonus_history = mysql_fetch_array($retval_bonus_history, MYSQL_ASSOC)){
                        $bonus_points = $row_bonus_history['bonus_points'];
                        $bonus_date = $row_bonus_history['bonus_date'];
                        $bonus_rewards = $row_bonus_history['bonus_rewards'];

                        $all_bonus .= '<tr class="color-palette text-center">
                                          <td>'.$bonus_date.'</td>
                                          <td>'.$bonus_points.'</td>
                                          <td>'.$bonus_rewards.'</td>
                                        </tr>';

                        }


                        $sql_storage_history = 'select * from shop_digisurf_storage where customer_id="'.$customer_id.'" ';
                        $retval_storage_history = mysql_query( $sql_storage_history, $conn );                 
                             if(! $retval_storage_history )
                             {
                                die('Could not get data: ' . mysql_error());
                             }


                        $storage_total =mysql_num_rows($retval_storage_history);
                        $all_storage = '';
                        while($row_storage_history = mysql_fetch_array($retval_storage_history, MYSQL_ASSOC)){
                        $storage_points = $row_storage_history['storage_points'];
                        $storage_date = $row_storage_history['storage_date'];
                        $storage_rewards = $row_storage_history['storage_rewards'];

                        $all_storage .= '<tr class="color-palette text-center">
                                          <td>'.$storage_date.'</td>
                                          <td>'.$storage_points.'</td>
                                          <td>'.$storage_rewards.'</td>
                                        </tr>';

                        }

?>