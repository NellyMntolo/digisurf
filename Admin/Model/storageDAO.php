<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];
                        $sqlstorage = 'select * from shop_digisurf_storage order by idx desc';
                        $retvalstorage = mysql_query( $sqlstorage, $conn );                 
                             if(! $retvalstorage )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $all_storage = '';
                        while($rowstorage = mysql_fetch_array($retvalstorage, MYSQL_ASSOC)){
                            $storageidx = $rowstorage['idx']; 
                            $storage_member_name = $rowstorage['storage_member_name'];
                            $storage_member_number = $rowstorage['storage_member_number'];
                            $storage_order_number = $rowstorage['storage_order_number'];
                            $storage_bill_number = $rowstorage['storage_bill_number'];
                            $storage_list_number = $rowstorage['storage_list_number'];
                            $storage_points = $rowstorage['storage_points'];

                            $all_storage .= '<tr class="text-center">
                                                  <th>'.$storage_member_name.'</th>
                                                  <th>'.$storage_member_number.'</th>
                                                  <th>'.$storage_order_number.'</th>
                                                  <th>'.$storage_bill_number.'</th>
                                                  <th>'.$storage_list_number.'</th>
                                                  <th>'.$storage_points.'</th>
                                                </tr>';
                        }

                        $sqlcustomers = 'select * from shop_digisurf_customer order by idx desc';
                        $retvalcustomers = mysql_query( $sqlcustomers, $conn );                 
                             if(! $retvalcustomers )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $all_customers = '';
                        while($rowcustomers = mysql_fetch_array($retvalcustomers, MYSQL_ASSOC)){
                            $cuidx = $rowcustomers['idx']; 
                            $customer_first_name = $rowcustomers['customer_first_name'];
                            $customer_id = $rowcustomers['customer_id'];
                            $customer_points = $rowcustomers['customer_points'];

                            $all_customers .= '<option value="'.$customer_id.'">'.$customer_first_name.'</option>';
                        }



                        $sqlproduct = 'select * from shop_digisurf_product order by idx desc';
                        $retvalproduct = mysql_query( $sqlproduct, $conn );                 
                             if(! $retvalproduct )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $sqlpackage = 'select * from shop_digisurf_package order by idx desc';
                        $retvalpackage = mysql_query( $sqlpackage, $conn );                 
                             if(! $retvalpackage )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $all_products = '';
                        while($rowproduct = mysql_fetch_array($retvalproduct, MYSQL_ASSOC)){
                            $product_id = $rowproduct['product_id']; 
                            $product_name = $rowproduct['product_name'];
                            $product_sku = $rowproduct['product_sku'];
                            $product_barcode = $rowproduct['product_barcode'];
                            $product_status = $rowproduct['product_status'];
                            $product_price = $rowproduct['product_price'];
                            $product_quantity = $rowproduct['product_quantity'];
                            $product_discount_id = $rowproduct['product_discount_id'];
                            $product_url = $rowproduct['product_url'];
                            $product_image = $rowproduct['product_image'];
                            $product_description = $rowproduct['product_description'];
                            $product_meta_title = $rowproduct['product_meta_title'];
                            $product_meta_key = $rowproduct['product_meta_key'];
                            $product_meta_desc = $rowproduct['product_meta_desc'];
                            $product_text17 = $rowproduct['product_text7'];
                            $product_text18 = $rowproduct['product_text8'];
                            $product_text19 = $rowproduct['product_text9'];
                            $product_text20 = $rowproduct['product_text10'];
                            $product_text21 = $rowproduct['product_text11'];
                            $product_text22 = $rowproduct['product_text12'];
                            $product_text23 = $rowproduct['product_text13'];
                            $product_points = $rowproduct['product_points'];

                            $all_products .= '<div style="position: relative; float: left; width: 30%; margin-top: 10px; margin-left: 2%;">
                                                <input type="hidden" name="storage_product" value=""> 
                                                <input type="checkbox" name="storage_product" value="'.$product_id.'" class="mycheckbox">
                                                <img src="'.$product_image.'" style="width: 100%; height: 200px;" name="image1" class="checkimage">
                                            </div>';
                        }

?>

