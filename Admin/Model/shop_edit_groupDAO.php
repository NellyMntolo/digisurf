<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];
$groupid = mysql_real_escape_string($_GET['group_id'],$conn);
                        $sqlweareen = 'select * from shop_digisurf_group where group_url ="'.$groupid.'" LIMIT 1';
                        $retvalweareen = mysql_query( $sqlweareen, $conn );                 
                             if(! $retvalweareen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
$bgGradient = '';
$bgColor = '';
$bgText = '';

                        $rowweareen = mysql_fetch_array($retvalweareen, MYSQL_ASSOC);
                            $group_id = $rowweareen['group_id']; 
                            $group_name = $rowweareen['group_name'];
                            $group_discount = $rowweareen['group_discount'];
                            $group_theme = $rowweareen['group_theme'];
                            $group_url = $rowweareen['group_url'];
                            $group_start_date = $rowweareen['group_start_date'];
                            $group_update_date = $rowweareen['group_update_date'];

                            if($group_theme == 1){
                                $bgGradient = 'bg-teal-gradient';
                                $bgColor = 'bg-teal';
                                $bgText = 'text-teal';
                            }
                            if($group_theme == 2){
                                $bgGradient = 'bg-aqua-gradient';
                                $bgColor = 'bg-aqua';
                                $bgText = 'text-aqua';
                            }
                            if($group_theme == 3){
                                $bgGradient = 'bg-light-blue-gradient';
                                $bgColor = 'bg-light-blue';
                                $bgText = 'text-light-blue';
                            }
                            if($group_theme == 4){
                                $bgGradient = 'bg-navy-gradient';
                                $bgColor = 'bg-navy';
                                $bgText = 'text-navy';
                            }


                        $sqlmembers = 'select * from shop_digisurf_group_members where group_id = "'.$group_id.'"';
                            $retvalmembers = mysql_query( $sqlmembers, $conn );                 
                             if(! $retvalmembers )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                            $total_members =mysql_num_rows($retvalmembers);

                        $customer_id = '';
                        while($rowmembers = mysql_fetch_array($retvalmembers, MYSQL_ASSOC)){
                            $customer_id .= $rowmembers['customer_id'];                             
                        }

                            $sqlcustomers = 'select * from shop_digisurf_customer where customer_id = "'.$customer_id.'"';
                            $retvalcustomers = mysql_query( $sqlcustomers, $conn );                 
                             if(! $retvalcustomers )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                             $all_members = '';
                             while($rowcustomers = mysql_fetch_array($retvalcustomers, MYSQL_ASSOC)){
                                $customer_id = $rowcustomers['customer_id'];
                                $customer_gender = $rowcustomers['customer_gender'];
                                $customer_first_name = $rowcustomers['customer_first_name'];
                                $customer_last_name = $rowcustomers['customer_last_name'];
                                $customer_email = $rowcustomers['customer_email'];
                                $customer_password = $rowcustomers['customer_password'];
                                $customer_dob = $rowcustomers['customer_dob'];
                                $customer_reg_date = $rowcustomers['customer_reg_date'];
                                $customer_type = $rowcustomers['customer_type'];
                                $customer_url = $rowcustomers['customer_url'];
                                $customer_initials = $rowcustomers['customer_initials'];
                                $customer_last_update = $rowcustomers['customer_last_update'];


                                $all_members .= '<tr class="color-palette text-center">
                                                  <td>'.$customer_gender.'</td>
                                                  <td>'.$customer_first_name.'</td>
                                                  <td>'.$customer_last_name.'</td>
                                                  <td>'.$customer_email.'</td>
                                                  <td>'.$customer_dob.'</td>
                                                  <td>'.$customer_reg_date.'</td>
                                                  <td>
                                                  <div class="input-group input-group-lg">
                                                    <div class="input-group-btn">
                                                      <button type="button" class="btn '.$bgColor.' dropdown-toggle" data-toggle="dropdown"><i class="fa fa-pencil" style="width: 20px;"></i></button>
                                                      <ul class="dropdown-menu">
                                                        <li><a href="/Admin/EditCustomer/'.$customer_url.'"><i class="fa fa-pencil-square-o"></i> Edit</a></li>
                                                        <li><a href="/Admin/ViewCustomer/'.$customer_url.'"><i class="fa fa-eye"></i> View</a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="#"><i class="fa fa-unlink"></i> Remove</a></li>
                                                      </ul>
                                                    </div><!-- /btn-group -->
                                                  </div><!-- /input-group -->

                                                  </td>
                                                </tr>';
                             }

?>