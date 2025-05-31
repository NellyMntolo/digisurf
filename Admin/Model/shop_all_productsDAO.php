<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];
                        $sqlweareen = 'select * from shop_digisurf_product order by idx DESC';
                        $retvalweareen = mysql_query( $sqlweareen, $conn );                 
                             if(! $retvalweareen )
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

/*

                        if($product_discount_id != null) {
                                
                                $sqldiscount = 'select * from shop_digisurf_discount where product_id ="'.$product_id.'" limit 1';
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
                            $product_points = $rowweareen['product_points'];
                            
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

                            $all_products .= '<tr class="color-palette text-center product-list">
                                              <!--<td><input name="deleted_product" type="checkbox"></td>-->
                                              <td><img src="'.$product_image.'"></td>
                                              <td>'.$product_name.'</td>
                                              <td>'.$product_barcode.'</td>
                                              <td>'.$total_discount.'$'.$product_price.'</td>
                                              <td>'.$product_points.'</td>
                                              <td>'.$total_quantity.'</td>
                                              <td>'.$current_Status.'</td>
                                              <td><form method="get" action=""><button type="button" onclick="window.location=\'/Admin/ViewProduct/'.$product_url.'\';" class="btn btn-primary btn-flat" title="Edit"><i class="fa fa-pencil"></i></button><input type="hidden" name="" ></form></td>
                                            </tr>';
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
                            $package_discount = $rowpackages['package_discount'];
                            $package_start_date = $rowpackages['package_start_date'];
                            $package_update_date = $rowpackages['package_update_date'];
                            $package_url = $rowpackages['package_url'];
                            $package_image = $rowpackages['package_image'];
                            $package_points = $rowpackages['package_points'];
                            $package_price = $rowpackages['package_price'];


                            $sqlpackages_products = 'select * from shop_digisurf_package_list where package_id="'.$package_id.'" ';
                            $retvalpackages_products = mysql_query( $sqlpackages_products, $conn );                 
                                 if(! $retvalpackages_products )
                                 {
                                    die('Could not get data: ' . mysql_error());
                                 }
                            $total_products =mysql_num_rows($retvalpackages_products);

                            $all_packages .= '<tr class="color-palette text-center package-list">
                                              <td><img src="'.$package_image.'"></td>
                                              <td>'.$package_name.'</td>
                                              <td>'.$package_discount.'</td>
                                              <td>'.$total_products.'</td>
                                              <td>'.$package_start_date.'</td>
                                              <td>'.$package_update_date.'</td>
                                              <td><form method="get" action=""><button type="button" onclick="window.location=\'/Admin/EditPackage/'.$package_url.'\';" class="btn btn-primary btn-flat" title="Edit"><i class="fa fa-pencil"></i></button><input type="hidden" name="" ></form></td>
                                            </tr>';
                        }

?>