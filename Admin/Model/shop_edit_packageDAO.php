<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];
//
$packageid = mysql_real_escape_string($_GET['package_id'],$conn);


                        $sql_reset='UPDATE shop_digisurf_package SET package_notification="Y" where package_url ="'.$packageid.'" LIMIT 1';              
                        $retval_reset = mysql_query( $sql_reset, $conn );
                        if(! $retval_reset )
                            {
                                die('Could not enter data: ' . mysql_error());
                            }

                        $sqlweareen = 'select * from shop_digisurf_package where package_url ="'.$packageid.'" LIMIT 1';
                        $retvalweareen = mysql_query( $sqlweareen, $conn );                 
                             if(! $retvalweareen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowweareen = mysql_fetch_array($retvalweareen, MYSQL_ASSOC);
                            $package_id = $rowweareen['package_id']; 
                            $package_name = $rowweareen['package_name'];
                            $package_price = $rowweareen['package_price'];                            
                            $package_start_date = $rowweareen['package_start_date'];
                            $package_update_date = $rowweareen['package_update_date'];
                            $package_url = $rowweareen['package_url'];
                            $package_image = $rowweareen['package_image'];
                            $package_description = $rowweareen['package_description'];
                            $package_related_case_study = $rowweareen['package_related_case_study'];
                            $package_text7 = $rowweareen['package_text7'];
                            $package_text8 = $rowweareen['package_text8'];
                            $package_text9 = $rowweareen['package_text9'];
                            $package_text10 = $rowweareen['package_text10'];
                            $package_text11 = $rowweareen['package_text11'];
                            $package_text12 = $rowweareen['package_text12'];
                            $package_text13 = $rowweareen['package_text13'];
                            $package_text23 = $rowweareen['package_text23'];
                            $package_text24 = $rowweareen['package_text24'];
                            $package_points = $rowweareen['package_points'];


                        $sqllist = 'select * from shop_digisurf_package_list where package_id = "'.$package_id.'"';
                            $retvallist = mysql_query( $sqllist, $conn );                 
                             if(! $retvallist )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                            $total_list =mysql_num_rows($retvallist);

                        //$package_product_id = '';
                        $existing_products = '';
                        while($rowlist = mysql_fetch_array($retvallist, MYSQL_ASSOC)){
                            $package_product_id = $rowlist['product_id']; 

                        $sqlproducts = 'select * from shop_digisurf_product where product_id = "'.$package_product_id.'"';
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


                        $sql_related_packages = 'select * from shop_digisurf_related_packages where package_id = "'.$package_id.'"';
                            $retval_related_packages = mysql_query( $sql_related_packages, $conn );                 
                             if(! $retval_related_packages )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                            $total__related_packages =mysql_num_rows($retval_related_packages);

                        //$package_product_id = '';
                        $existing_packages = '';
                        while($row_related_packages = mysql_fetch_array($retval_related_packages, MYSQL_ASSOC)){
                            $package_product_id = $row_related_packages['all_package_id']; 

                        $sqlpackages = 'select * from shop_digisurf_package where package_id = "'.$package_product_id.'"';
                        $retvalpackages = mysql_query( $sqlpackages, $conn );                 
                             if(! $retvalpackages )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                            $total_packages =mysql_num_rows($retvalpackages);

                        
                        while($rowpackages = mysql_fetch_array($retvalpackages, MYSQL_ASSOC)){
                            $existing_package_id = $rowpackages['package_id'];
                            $existing_package_name = $rowpackages['package_name'];       

                            $existing_packages .= '<option value="'.$existing_package_id.'" selected>'.$existing_package_name.'</option>';                 
                        }                           
                        }



                        $sql_shipping = 'select * from shop_digisurf_package_shipping where package_id = "'.$package_id.'" ';
                        $retval_shipping = mysql_query( $sql_shipping, $conn );                 
                             if(! $retval_shipping )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $row_shipping = mysql_fetch_array($retval_shipping, MYSQL_ASSOC);
                            $shipping_id = $row_shipping['package_id'];
                            $shipping_text1 = $row_shipping['text1'];
                            $shipping_text2 = $row_shipping['text2'];
                            $shipping_text3 = $row_shipping['text3'];
                            $shipping_text4 = $row_shipping['text4'];
                            $shipping_text5 = $row_shipping['text5'];
                        


                        $sqlall_products = 'select * from shop_digisurf_product order by idx DESC';
                        $retvalall_products = mysql_query( $sqlall_products, $conn );                 
                             if(! $retvalall_products )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $all_products = '';
                        while($rowall_products = mysql_fetch_array($retvalall_products, MYSQL_ASSOC)){
                            $product_id = $rowall_products['product_id']; 
                            $product_name = $rowall_products['product_name'];

                            $all_products .= '<option value="'.$product_id.'">'.$product_name.'</option>';
                        }


                        $sqlall_packages = 'select * from shop_digisurf_package order by idx DESC';
                        $retvalall_packages = mysql_query( $sqlall_packages, $conn );                 
                             if(! $retvalall_packages )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $all_packages = '';
                        while($rowall_packages = mysql_fetch_array($retvalall_packages, MYSQL_ASSOC)){
                            $all_package_id = $rowall_packages['package_id']; 
                            $all_package_name = $rowall_packages['package_name'];

                            $all_packages .= '<option value="'.$all_package_id.'">'.$all_package_name.'</option>';
                        }

                        $sql_related_case = 'select * from digisurf_project where idx="'.$package_related_case_study.'" limit 1';
                        $retval_related_case = mysql_query( $sql_related_case, $conn );                 
                             if(! $retval_related_case )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        
                        $row_related_case = mysql_fetch_array($retval_related_case, MYSQL_ASSOC);
                            $case_id = $row_related_case['idx']; 
                            $case_name = $row_related_case['text4'];

                            $related_case  = '';
                            if(mysql_num_rows($retval_related_case) == 1){
                            $related_case = '<option value="'.$case_id.'" selected>'.$case_name.'</option>';
                        }


                        $sql_other_related_case = 'select * from digisurf_project where code="'.$current_lang.'" order by idx desc';
                        $retval_other_related_case = mysql_query( $sql_other_related_case, $conn );                 
                             if(! $retval_other_related_case )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $other_related_case = '';
                        while($row_other_related_case = mysql_fetch_array($retval_other_related_case, MYSQL_ASSOC)){
                            $case_id = $row_other_related_case['idx']; 
                            $case_name = $row_other_related_case['text4'];

                            $other_related_case .= '<option value="'.$case_id.'" selected>'.$case_name.'</option>';
                        }



                        $sql_images = 'select * from shop_digisurf_package_images where package_id = "'.$package_id.'" ';
                        $retval_images = mysql_query( $sql_images, $conn );                 
                             if(! $retval_images )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $package_images = '';
                        while($row_images = mysql_fetch_array($retval_images, MYSQL_ASSOC)){
                            $package_images .= '<div class="project-list" ><img class="thumb" src="'.$row_images['package_images'].'"></div>';
                          }
                        

?>