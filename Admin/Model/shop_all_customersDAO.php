<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];
                        $sqlweareen = 'select * from shop_digisurf_customer order by idx DESC';
                        $retvalweareen = mysql_query( $sqlweareen, $conn );                 
                             if(! $retvalweareen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $all_customers = '';

                        $total_customers =mysql_num_rows($retvalweareen);

/*

                        if($customer_discount_id != null) {
                                
                                $sqldiscount = 'select * from shop_digisurf_discount where customer_id ="'.$customer_id.'" limit 1';
                                $retvaldiscount = mysql_query( $sqldiscount, $conn );                 
                                     if(! $retvaldiscount )
                                     {
                                        die('Could not get data: ' . mysql_error());
                                     }
                                $rowdiscount = mysql_fetch_array($retvaldiscount, MYSQL_ASSOC);
                                $amount = $rowweareen['amount'];
                                $total_discount = '<span style="text-decoration: line-through;" class="label bg-maroon">'.$amount.'</span> <br>'
                            }*/


                        while($rowweareen = mysql_fetch_array($retvalweareen, MYSQL_ASSOC)){
                            $customer_id = $rowweareen['customer_id']; 
                            $customer_gender = $rowweareen['customer_gender'];
                            $customer_first_name = $rowweareen['customer_first_name'];
                            $customer_last_name = $rowweareen['customer_last_name'];
                            $customer_email = $rowweareen['customer_email'];
                            $customer_dob = $rowweareen['customer_dob'];
                            $customer_reg_date = $rowweareen['customer_reg_date'];
                            $customer_type = $rowweareen['customer_type'];
                            $customer_url = $rowweareen['customer_url'];
                            $customer_initials = $rowweareen['customer_initials'];
                            $customer_last_update = $rowweareen['customer_last_update'];
                            $customer_member_id = $rowweareen['customer_member_id'];

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

                            $all_customers .= '<tr class="color-palette text-center">
                                                  <td>'.$customer_gender.'</td>
                                                  <td>'.$customer_member_id.'</td>
                                                  <!--<td>'.$customer_first_name.'</td>
                                                  <td>'.$customer_last_name.'</td>-->
                                                  <td>'.$customer_email.'</td>
                                                  <td>'.$customer_reg_date.'</td>
                                                  <td>'.$customer_last_update.'</td>
                                                  <td>'.$c_type.'</td>
                                                  <td>
                                                  <div class="input-group input-group-lg">
                                                    <div class="input-group-btn">
                                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa fa-pencil" style="width: 20px;"></i></button>
                                                      <ul class="dropdown-menu" style="margin-left: -100px;">
                                                        <li><a href="/Admin/EditCustomer/'.$customer_url.'"><i class="fa fa-pencil-square-o"></i> Edit</a></li>
                                                        <li><a href="/Admin/ViewCustomer/'.$customer_url.'"><i class="fa fa-eye"></i> View</a></li>
                                                        <li class="divider"></li>
                                                        <li><form action="/Admin/AllShopCustomer" method="POST"><button type="submit" style="width:80%; background:transparent;" class="text-red" title="Cannot Undo" name="delete_project_submit"><i class="fa fa-trash text-red"></i><input type="hidden" value="'.$customer_id.'" name="product_id"> Delete</button></form></li>
                                                      </ul>
                                                    </div><!-- /btn-group -->
                                                  </div><!-- /input-group -->
                                                  </td>
                                                </tr>';

                                            
                        }







                        $sqlnotifications = 'select * from shop_digisurf_customer where customer_notification="N" order by idx DESC';
                        $retvalnotifications = mysql_query( $sqlnotifications, $conn );                 
                             if(! $retvalnotifications )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $all_customer_notifications = '';

                        $total_customer_notification =mysql_num_rows($retvalnotifications);

/*

                        if($customer_discount_id != null) {
                                
                                $sqldiscount = 'select * from shop_digisurf_discount where customer_id ="'.$customer_id.'" limit 1';
                                $retvaldiscount = mysql_query( $sqldiscount, $conn );                 
                                     if(! $retvaldiscount )
                                     {
                                        die('Could not get data: ' . mysql_error());
                                     }
                                $rowdiscount = mysql_fetch_array($retvaldiscount, MYSQL_ASSOC);
                                $amount = $rowweareen['amount'];
                                $total_discount = '<span style="text-decoration: line-through;" class="label bg-maroon">'.$amount.'</span> <br>'
                            }*/


                        while($rownotifications = mysql_fetch_array($retvalnotifications, MYSQL_ASSOC)){
                            $customer_id = $rowweareen['customer_id']; 
                            $customer_gender = $rownotifications['customer_gender'];
                            $customer_first_name = $rownotifications['customer_first_name'];
                            $customer_last_name = $rownotifications['customer_last_name'];
                            $customer_email = $rownotifications['customer_email'];
                            $customer_dob = $rownotifications['customer_dob'];
                            $customer_reg_date = $rownotifications['customer_reg_date'];
                            $customer_type = $rownotifications['customer_type'];
                            $customer_url = $rownotifications['customer_url'];
                            $customer_initials = $rownotifications['customer_initials'];
                            $customer_last_update = $rownotifications['customer_last_update'];

                            $c_type = '';
                            if ($customer_type == "R") {
                              $c_type = "Regular";
                            } elseif ($customer_type == "M") {
                              $c_type = "Member";
                            } elseif ($customer_type == "V") {
                              $c_type = "VIP";
                            }

                            $all_customer_notifications .= '<tr class="color-palette text-center">
                                                  <td>'.$customer_gender.'</td>
                                                  <td>'.$customer_first_name.'</td>
                                                  <td>'.$customer_last_name.'</td>
                                                  <td>'.$customer_email.'</td>
                                                  <td>'.$customer_reg_date.'</td>
                                                  <td>'.$customer_last_update.'</td>
                                                  <td>'.$c_type.'</td>
                                                  <td>
                                                  <div class="input-group input-group-lg">
                                                    <div class="input-group-btn">
                                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa fa-pencil" style="width: 20px;"></i></button>
                                                      <ul class="dropdown-menu" style="margin-left: -100px;">
                                                        <li><a href="/Admin/EditCustomer/'.$customer_url.'"><i class="fa fa-pencil-square-o"></i> Edit</a></li>
                                                        <li><a href="/Admin/ViewCustomer/'.$customer_url.'"><i class="fa fa-eye"></i> View</a></li>
                                                        <li class="divider"></li>
                                                        <li><form action="/Admin/AllShopCustomer" method="POST"><button type="submit" style="width:80%; background:transparent;" class="text-red" title="Cannot Undo" name="delete_project_submit"><i class="fa fa-trash text-red"></i><input type="hidden" value="'.$customer_id.'" name="product_id"> Delete</button></form></li>
                                                      </ul>
                                                    </div><!-- /btn-group -->
                                                  </div><!-- /input-group -->
                                                  </td>
                                                </tr>';

                                            
                        }
?>