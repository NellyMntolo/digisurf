<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];
$productid = mysql_real_escape_string($_GET['product_id'],$conn);

                        $sql_reset='UPDATE shop_digisurf_product SET product_notification="Y" where product_url ="'.$productid.'" LIMIT 1';              
                        $retval_reset = mysql_query( $sql_reset, $conn );
                        if(! $retval_reset )
                            {
                                die('Could not enter data: ' . mysql_error());
                            }

                        $sqlweareen = 'select * from shop_digisurf_product where product_url ="'.$productid.'" LIMIT 1';
                        $retvalweareen = mysql_query( $sqlweareen, $conn );                 
                             if(! $retvalweareen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        //$all_products = '';
                        $total_quantity = '';
                        $current_Status = '';
                        $new_status = '';

                        //Discount
                        $total_discount = '';
                        $product_id = '';
                        $product_discount_id = '';


                        $rowweareen = mysql_fetch_array($retvalweareen, MYSQL_ASSOC);
                            $product_id = $rowweareen['product_id']; 
                            $product_name = $rowweareen['product_name'];
                            $product_sku = $rowweareen['product_sku'];
                            $product_barcode = $rowweareen['product_barcode'];
                            $product_status = $rowweareen['product_status'];
                            $product_price = $rowweareen['product_price'];
                            $product_quantity = $rowweareen['product_quantity'];
                            $product_discount_id = $rowweareen['product_discount_id'];
                            $product_url = $rowweareen['product_url'];
                            $product_image = $rowweareen['product_image'];
                            $product_description = $rowweareen['product_description'];
                            $product_meta_title = $rowweareen['product_meta_title'];
                            $product_meta_key = $rowweareen['product_meta_key'];
                            $product_meta_desc = $rowweareen['product_meta_desc'];
                            $product_text17 = $rowweareen['product_text7'];
                            $product_text18 = $rowweareen['product_text8'];
                            $product_text19 = $rowweareen['product_text9'];
                            $product_text20 = $rowweareen['product_text10'];
                            $product_text21 = $rowweareen['product_text11'];
                            $product_text22 = $rowweareen['product_text12'];
                            $product_text23 = $rowweareen['product_text13'];
                            $product_points = $rowweareen['product_points'];


                            if($product_status == 'Y'){
                              $new_status = '<input type="checkbox" style="opacity: 0;" id="content_text4" name="content_text4" class="form-control" data-on-color="success" data-off-color="danger" checked value="Y">';
                            } elseif($product_status == 'N') {
                              $new_status = '<input type="checkbox" style="opacity: 0;" id="content_text4" name="content_text4" class="form-control" data-on-color="success" data-off-color="danger" value="Y">';
                            }

                        $sqltags = 'select * from shop_digisurf_tags where product_id ="'.$product_id.'" ';
                        $retvaltags = mysql_query( $sqltags, $conn );                 
                             if(! $retvaltags )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $product_tags = array();
                        while($rowtags = mysql_fetch_array($retvaltags, MYSQL_ASSOC)){
                            $product_tags[] = $rowtags['product_tag'];                             
                        }
                        $product_tag = implode(",", $product_tags);


                        $all_groups = '';
                        $sqlgroups = 'select * from shop_digisurf_group';
                        $retvalgroups = mysql_query( $sqlgroups, $conn );                 
                             if(! $retvalgroups )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        while($rowgroups = mysql_fetch_array($retvalgroups, MYSQL_ASSOC)){
                            $group_id = $rowgroups['group_id'];
                            $group_name = $rowgroups['group_name'];

                            $all_groups .= '<option value="'.$group_id.'">'.$group_name.'</option>';
                        }

                        $all_customers = '';
                        $sqlcustomers = 'select * from shop_digisurf_customer';
                        $retvalcustomers = mysql_query( $sqlcustomers, $conn );                 
                             if(! $retvalcustomers )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        while($rowcustomers = mysql_fetch_array($retvalcustomers, MYSQL_ASSOC)){
                            $customer_id = $rowcustomers['customer_id'];
                            $customer_first_name = $rowcustomers['customer_first_name']; 
                            $customer_last_name = $rowcustomers['customer_last_name'];
                            
                            $all_customers .= '<option value="'.$customer_id.'" >'.$customer_first_name[0].'. '.$customer_last_name.'</option>';
                        }


                        $all_discounts = '';
                        $sqldiscounts = 'select * from shop_digisurf_discount where product_id = "'.$product_id.'" ';
                        $retvaldiscounts = mysql_query( $sqldiscounts, $conn );                 
                             if(! $retvaldiscounts )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        while($rowdiscounts = mysql_fetch_array($retvaldiscounts, MYSQL_ASSOC)){
                            $discount_id = $rowdiscounts['idx'];
                            $discount_group_id = $rowdiscounts['group_id']; 
                            $discount_customer_id = $rowdiscounts['customer_id'];
                            $discount_amount = $rowdiscounts['amount'];
                            $discount_start_date = $rowdiscounts['start_date'];
                            $discount_end_date = $rowdiscounts['end_date'];

                            $sqldiscounts_group = 'select * from shop_digisurf_group where group_id = "'.$discount_group_id.'" LIMIT 1';
                            $retvaldiscounts_group = mysql_query( $sqldiscounts_group, $conn );                 
                                 if(! $retvaldiscounts_group )
                                 {
                                    die('Could not get data: ' . mysql_error());
                                 }
                            $rowdiscounts_group = mysql_fetch_array($retvaldiscounts_group, MYSQL_ASSOC);
                            $discount_group_name = $rowdiscounts_group['group_name'];

                            $sqlcus_group = 'select * from shop_digisurf_customer where customer_id = "'.$discount_customer_id.'" LIMIT 1';
                            $retvalcus_group = mysql_query( $sqlcus_group, $conn );                 
                                 if(! $retvalcus_group )
                                 {
                                    die('Could not get data: ' . mysql_error());
                                 }
                            $rowcus_group = mysql_fetch_array($retvalcus_group, MYSQL_ASSOC);
                            $discount_cus_name = $rowcus_group['customer_first_name'];
                            $discount_cus_last = $rowcus_group['customer_last_name'];
                            
                            $all_discounts .= '<tr class="color-palette">
                                                  <td>'.$discount_id.'</td>
                                                  <td>'.$discount_group_name.'</td>
                                                  <td>'.$discount_cus_name.' '.$discount_cus_last.'</td>
                                                  <td>- $'.$discount_amount.'</td>
                                                  <td>'.$discount_start_date.' - '.$discount_end_date.'</td>
                                                  <td><form method="POST" action="/Admin/AllShopProduct"><button type="submit" class="btn btn-danger btn-flat loadin" title="Edit" name="delete_discount"><i class="fa fa-trash"></i></button><input type="hidden" name="delete_discount_id" value="'.$discount_id.'"></form></td>
                                                </tr>';
                        }


                        $sql_shipping = 'select * from shop_digisurf_shipping where product_id = "'.$product_id.'" ';
                        $retval_shipping = mysql_query( $sql_shipping, $conn );                 
                             if(! $retval_shipping )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $row_shipping = mysql_fetch_array($retval_shipping, MYSQL_ASSOC);
                            $shipping_id = $row_shipping['product_id'];
                            $shipping_text1 = $row_shipping['text1'];
                            $shipping_text2 = $row_shipping['text2'];
                            $shipping_text3 = $row_shipping['text3'];
                            $shipping_text4 = $row_shipping['text4'];
                            $shipping_text5 = $row_shipping['text5'];



                        $sql_images = 'select * from shop_digisurf_images where product_id = "'.$product_id.'" ';
                        $retval_images = mysql_query( $sql_images, $conn );                 
                             if(! $retval_images )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                             $product_images = '';
                        while($row_images = mysql_fetch_array($retval_images, MYSQL_ASSOC)){
                            $product_images .= '<div class="project-list" ><img class="thumb" src="'.$row_images['product_images'].'"></div>';
                          }



                          $sql_related_products = 'select * from shop_digisurf_related_products where product_id = "'.$product_id.'"';
                            $retval_related_products = mysql_query( $sql_related_products, $conn );                 
                             if(! $retval_related_products )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                            $total__related_products =mysql_num_rows($retval_related_products);

                        //$product_product_id = '';
                        $existing_products = '';
                        while($row_related_products = mysql_fetch_array($retval_related_products, MYSQL_ASSOC)){
                            $product_product_id = $row_related_products['all_product_id']; 

                        $sqlproducts = 'select * from shop_digisurf_product where product_id = "'.$product_product_id.'"';
                        $retvalproducts = mysql_query( $sqlproducts, $conn );                 
                             if(! $retvalproducts )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                            $total_products =mysql_num_rows($retvalproducts);

                        
                        while($rowproducts = mysql_fetch_array($retvalproducts, MYSQL_ASSOC)){
                            $existing_product_id = $rowproducts['product_id'];
                            $existing_product_name = $rowproducts['product_name'];       

                            $existing_products .= '<option value="'.$existing_product_id.'" selected>'.$existing_product_name.'</option>';                 
                        }                           
                        }


                        $sqlall_products = 'select * from shop_digisurf_product order by idx DESC';
                        $retvalall_products = mysql_query( $sqlall_products, $conn );                 
                             if(! $retvalall_products )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $all_products = '';
                        while($rowall_products = mysql_fetch_array($retvalall_products, MYSQL_ASSOC)){
                            $shit_product_id = $rowall_products['product_id']; 
                            $shit_product_name = $rowall_products['product_name'];

                            $all_products .= '<option value="'.$shit_product_id.'">'.$shit_product_name.'</option>';
                        }

?>