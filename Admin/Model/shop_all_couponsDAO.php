<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];
                        $sqlcoupons = 'select * from shop_digisurf_coupons order by idx DESC';
                        $retvalcoupons = mysql_query( $sqlcoupons, $conn );                 
                             if(! $retvalcoupons )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $all_coupons = '';
                        while($rowcoupons = mysql_fetch_array($retvalcoupons, MYSQL_ASSOC)){
                            $idx = $rowcoupons['idx'];
                            $coupons_image = $rowcoupons['image1'];
                            $coupons_name = $rowcoupons['coupon_name'];
                            $coupons_code = $rowcoupons['coupon_code'];
                            $coupons_discount = $rowcoupons['coupon_discount'];
                            $coupons_start_date = $rowcoupons['coupon_start_date'];
                            $coupons_end_date = $rowcoupons['coupon_end_date'];
                            $coupons_status = $rowcoupons['coupon_status'];
                            $coupons_url = $rowcoupons['coupon_url'];

                            $current_status = '';
                            if($coupons_status == 'Y'){
                                $current_status = 'Enabled';
                            } elseif($coupons_status == 'N'){
                                $current_status = 'Disabled';
                            }

                            $all_coupons .= '<tr class="color-palette text-center coupons-list">
                                              <td><img src="'.$coupons_image.'"></td>
                                              <td>'.$coupons_name.'</td>
                                              <td>'.$coupons_code.'</td>
                                              <td>'.$coupons_discount.'</td>
                                              <td>'.$coupons_start_date.'</td>
                                              <td>'.$coupons_end_date.'</td>
                                              <td>'.$current_status.'</td>
                                              <td>'.$coupons_url.'</td>
                                              <!--<td><form method="get" action=""><button type="button" onclick="window.location=\'/Admin/EditCoupons/'.$coupons_url.'\';" class="btn btn-primary btn-flat" title="Edit"><i class="fa fa-pencil"></i></button><input type="hidden" name="" ></form></td>-->
                                              <td><form method="POST" action="/Admin/AllShopCoupons"><button type="submit" name="delete_coupon_submit" class="btn btn-danger btn-flat" title="Edit"><i class="fa fa-trash"></i></button><input type="hidden" name="coupon_id" value="'.$idx.'"></form></td>
                                            </tr>';
                        }

?>