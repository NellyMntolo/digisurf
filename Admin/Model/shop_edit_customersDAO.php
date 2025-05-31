<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];
$customerurl = mysql_real_escape_string($_GET['customer_id'],$conn);

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
                            $customer_approve = $row_customer['customer_approve'];
                            $customer_sponsor = $row_customer['customer_sponsor'];

                            $c_type = '';
                            if($customer_type == "V"){
                              $c_type = '<option value="'.$customer_type.'">VIP</option><option value="M">Member</option><option value="R">Regular</option><option value="SWD">Senior Web Distributor</option><option value="IWD">Independent Web Distributor </option>';
                            } elseif ($customer_type == "M") {
                              $c_type = '<option value="'.$customer_type.'">Member</option><option value="V">VIP</option><option value="R">Regular</option><option value="SWD">Senior Web Distributor</option><option value="IWD">Independent Web Distributor </option>';
                            } elseif ($customer_type == "R") {
                              $c_type = '<option value="'.$customer_type.'">Regular</option><option value="V">VIP</option><option value="M">Member</option><option value="SWD">Senior Web Distributor</option><option value="IWD">Independent Web Distributor </option>';
                            } elseif ($customer_type == "SWD") {
                              $c_type = '<option value="'.$customer_type.'">Senior Web Distributor</option><option value="R">Regular</option><option value="V">VIP</option><option value="M">Member</option><option value="IWD">Independent Web Distributor </option>';
                            } elseif ($customer_type == "IWD") {
                              $c_type = '<option value="'.$customer_type.'">Independent Web Distributor</option><option value="R">Regular</option><option value="V">VIP</option><option value="M">Member</option><option value="SWD">Senior Web Distributor</option>';
                            }

                            $c_approve = '';
                            if($customer_approve == "Y"){
                              $c_approve = '<option value="'.$customer_approve.'">YES</option><option value="N">NO</option>';
                            } elseif ($customer_approve == "N") {
                              $c_approve = '<option value="'.$customer_approve.'">NO</option><option value="Y">YES</option>';
                            }

                            $gender = '';

                            if($customer_gender == "Male"){
                              $gender = '<div class="col-md-4">
                                            <div class="input-group">
                                              <div class="input-group-addon">
                                                <i class="fa fa-male text-aqua"></i>
                                              </div>
                                              <input id="male" type="radio" style="opacity: 0;" id="" name="content_text1" value="Male" data-on-text="YES" data-off-text="NO" data-on-color="info" data-off-color="primary" checked>
                                            </div><!-- /.input group -->  
                                          </div>

                                          <div class="col-md-4">
                                            <div class="input-group">
                                              <div class="input-group-addon">
                                                <i class="fa fa-female text-fuchsia"></i>
                                              </div>
                                              <input id="female" type="radio" style="opacity: 0;" id="" name="content_text1" value="Female" data-on-text="YES" data-off-text="NO" data-on-color="info" data-off-color="primary"> 
                                            </div><!-- /.input group -->   
                                          </div>';
                            }

                            if($customer_gender == "Female"){
                              $gender = '<div class="col-md-4">
                                            <div class="input-group">
                                              <div class="input-group-addon">
                                                <i class="fa fa-male text-aqua"></i>
                                              </div>
                                              <input id="male" type="radio" style="opacity: 0;" id="" name="content_text1" value="Male" data-on-text="YES" data-off-text="NO" data-on-color="info" data-off-color="primary">
                                            </div><!-- /.input group -->  
                                          </div>

                                          <div class="col-md-4">
                                            <div class="input-group">
                                              <div class="input-group-addon">
                                                <i class="fa fa-female text-fuchsia"></i>
                                              </div>
                                              <input id="female" type="radio" style="opacity: 0;" id="" name="content_text1" value="Female" data-on-text="YES" data-off-text="NO" data-on-color="info" data-off-color="primary" checked> 
                                            </div><!-- /.input group -->   
                                          </div>';
                            }

/**/
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
                        

?>