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
                        while($rowweareen = mysql_fetch_array($retvalweareen, MYSQL_ASSOC)){
                            $product_id = $rowweareen['product_id']; 
                            $product_name = $rowweareen['product_name'];

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
                            $package_id = $rowall_packages['package_id']; 
                            $package_name = $rowall_packages['package_name'];

                            $all_packages .= '<option value="'.$package_id.'">'.$package_name.'</option>';
                        }


                        $sql_related_case = 'select * from digisurf_project where code="'.$current_lang.'" order by idx DESC';
                        $retval_related_case = mysql_query( $sql_related_case, $conn );                 
                             if(! $retval_related_case )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $all_case_studies = '';
                        while($row_related_case = mysql_fetch_array($retval_related_case, MYSQL_ASSOC)){
                            $case_id = $row_related_case['idx']; 
                            $case_name = $row_related_case['text4'];

                            $all_case_studies .= '<option value="'.$case_id.'">'.$case_name.'</option>';
                        }

?>