<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];
                        $sqlproducts = 'select * from shop_digisurf_product order by idx DESC';
                        $retvalproducts = mysql_query( $sqlproducts, $conn );                 
                             if(! $retvalproducts )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $all_products = '';
                        $total_quantity = '';
                        $current_Status = '';

                        //Discount
                        $total_discount = '';
                        $product_id = '';
                        $product_discount_id = '';


                        while($rowproducts = mysql_fetch_array($retvalproducts, MYSQL_ASSOC)){
                            $product_id = $rowproducts['product_id']; 
                            $product_name = $rowproducts['product_name'];
                            $product_sku = $rowproducts['product_sku'];
                            $product_barcode = $rowproducts['product_barcode'];
                            $product_status = $rowproducts['product_status'];
                            $product_price = $rowproducts['product_price'];
                            $product_quantity = $rowproducts['product_quantity'];
                            $product_discount_id = $rowproducts['product_discount_id'];
                            $product_url = $rowproducts['product_url'];
                            $product_image = $rowproducts['product_image'];
                            $product_points = $rowproducts['product_points'];
                            $search_type = $rowproducts['search_type'];
                            
                            /*if($product_quantity < 10){
                                $total_quantity = '<span class="label label-danger>'.$product_quantity.'</span>';
                            } else {
                                $total_quantity = '<span class="label label-info">'.$product_quantity.'</span>';
                            }*/
                            $total_quantity = '<span class="label label-info">'.$product_quantity.'</span>';
                            
                            if($product_status == 'Y'){
                                $current_Status = 'Enabled';
                            } elseif($product_status == 'N'){
                                $current_Status = 'Disabled';
                            }
                            
                            $all_products .= '<div class="project-list">
                                                <form class="cart_items_Form" method="GET" enctype="multipart/form-data" accept-charset="utf-8">
                                                <img style="width: 100%; float:left; height: 300px;" src="'.$product_image.'"/>
                                                <input type="hidden" value="'.$product_id.'" name="prod_id">
                                                <input type="hidden" value="'.$search_type.'" name="prod_type">
                                                <input type="button" value="Add" class="btn-success extra-btn cart_item_button">
                                                <input type="number" class="quantity" name="quantity" placeholder="Quantity" min="1"></form>
                                                </div>';
                            // $all_products .= '<tr class="color-palette text-center product-list">
                            //                   <!--<td><input name="deleted_product" type="checkbox"></td>-->
                            //                   <td><img src="'.$product_image.'"></td>
                            //                   <td>'.$product_name.'</td>
                            //                   <td>'.$product_barcode.'</td>
                            //                   <td>'.$total_discount.'$'.$product_price.'</td>
                            //                   <td>'.$product_points.'</td>
                            //                   <td>'.$total_quantity.'</td>
                            //                   <td>'.$current_Status.'</td>
                            //                   <td><form method="get" action=""><button type="button" onclick="window.location=\'/Admin/ViewProduct/'.$product_url.'\';" class="btn btn-primary btn-flat" title="Edit"><i class="fa fa-pencil"></i></button><input type="hidden" name="" ></form></td>
                            //                 </tr>';
                        }




                        $sqlpackages = 'select * from shop_digisurf_package order by idx DESC';
                        $retvalpackages = mysql_query( $sqlpackages, $conn );                 
                             if(! $retvalpackages )
                             {
                                die('Could not get data: ' . mysql_error());
                             }


                        while($rowpackages = mysql_fetch_array($retvalpackages, MYSQL_ASSOC)){
                            $package_id = $rowpackages['package_id']; 
                            $package_name = $rowpackages['package_name'];
                            $package_start_date = $rowpackages['package_start_date'];
                            $package_update_date = $rowpackages['package_update_date'];
                            $package_url = $rowpackages['package_url'];
                            $package_image = $rowpackages['package_image'];
                            $package_points = $rowpackages['package_points'];
                            $package_price = $rowpackages['package_price'];
                            $search_type = $rowpackages['search_type'];


                            $sqlpackages_products = 'select * from shop_digisurf_package_list where package_id="'.$package_id.'" ';
                            $retvalpackages_products = mysql_query( $sqlpackages_products, $conn );                 
                                 if(! $retvalpackages_products )
                                 {
                                    die('Could not get data: ' . mysql_error());
                                 }
                            $total_products =mysql_num_rows($retvalpackages_products);


                            $all_packages .= '<div class="project-list">
                                                <form class="cart_items_Form" method="GET" enctype="multipart/form-data" accept-charset="utf-8">
                                                <img style="width: 100%; float:left; height: 300px;" src="'.$package_image.'"/>
                                                <input type="hidden" value="'.$package_id.'" name="prod_id">
                                                <input type="hidden" value="'.$search_type.'" name="prod_type">
                                                <input type="button" value="Add" class="btn-success extra-btn cart_item_button">
                                                <input type="number" class="quantity" name="quantity" placeholder="Quantity" min="1"></form>
                                                </div>';


                            // $all_packages .= '<tr class="color-palette text-center package-list">
                            //                   <td><img src="'.$package_image.'"></td>
                            //                   <td>'.$package_name.'</td>
                            //                   <td>'.$package_discount.'</td>
                            //                   <td>'.$total_products.'</td>
                            //                   <td>'.$package_start_date.'</td>
                            //                   <td>'.$package_update_date.'</td>
                            //                   <td><form method="get" action=""><button type="button" onclick="window.location=\'/Admin/EditPackage/'.$package_url.'\';" class="btn btn-primary btn-flat" title="Edit"><i class="fa fa-pencil"></i></button><input type="hidden" name="" ></form></td>
                            //                 </tr>';
                        }

                        $sqlcustomers = 'select * from shop_digisurf_customer order by idx DESC';
                        $retvalcustomers = mysql_query( $sqlcustomers, $conn );                 
                             if(! $retvalcustomers )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $all_customers = '';

                        $total_customers =mysql_num_rows($retvalcustomers);

                        while($rowcustomers = mysql_fetch_array($retvalcustomers, MYSQL_ASSOC)){
                            $customer_id = $rowcustomers['customer_id']; 
                            $customer_gender = $rowcustomers['customer_gender'];
                            $customer_first_name = $rowcustomers['customer_first_name'];
                            $customer_last_name = $rowcustomers['customer_last_name'];
                            $customer_email = $rowcustomers['customer_email'];
                            $customer_dob = $rowcustomers['customer_dob'];
                            $customer_reg_date = $rowcustomers['customer_reg_date'];
                            $customer_type = $rowcustomers['customer_type'];
                            $customer_url = $rowcustomers['customer_url'];
                            $customer_initials = $rowcustomers['customer_initials'];
                            $customer_last_update = $rowcustomers['customer_last_update'];
                            $customer_member_id = $rowcustomers['customer_member_id'];

                            $c_type = '';
                            if ($customer_type == "R") {
                              $c_type = "Regular";
                            } elseif ($customer_type == "M") {
                              $c_type = "Member";
                            } elseif ($customer_type == "V") {
                              $c_type = "VIP";
                            } elseif ($customer_type == "SWD") {
                              $c_type = "Senior Web Distributor";
                            } elseif ($customer_type == "IWD") {
                              $c_type = "Independent Web Distributor";
                            }

                            $all_customers .= '<option value="'.$customer_id.'">'.$customer_first_name.' '.$customer_last_name.'</option>';

                                            
                        }

?>