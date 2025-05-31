<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];

$new_status = '';
$couponid = mysql_real_escape_string($_GET['coupon_id'],$conn);
                        $sqlweareen = 'select * from shop_digisurf_coupons where coupon_url="'.$couponid.'"';
                        $retvalweareen = mysql_query( $sqlweareen, $conn );                 
                             if(! $retvalweareen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowcoupons = mysql_fetch_array($retvalweareen, MYSQL_ASSOC);
                            $idx = $rowcoupons['idx'];
                            $coupons_image = $rowcoupons['image1'];
                            $coupons_name = $rowcoupons['coupon_name'];
                            $coupons_code = $rowcoupons['coupon_code'];
                            $coupons_discount = $rowcoupons['coupon_discount'];
                            $coupons_start_date = $rowcoupons['coupon_start_date'];
                            $coupons_end_date = $rowcoupons['coupon_end_date'];
                            $coupons_status = $rowcoupons['coupon_status'];
                            $coupons_url = $rowcoupons['coupon_url'];
                            
                            if($coupon_status == 'Y'){
                              $new_status = '<input type="checkbox" style="opacity: 0;" id="content_text5" name="content_text5" class="form-control" data-on-color="success" data-off-color="danger" checked value="Y">';
                            } elseif($coupon_status == 'N') {
                              $new_status = '<input type="checkbox" style="opacity: 0;" id="content_text5" name="content_text5" class="form-control" data-on-color="success" data-off-color="danger" value="Y">';
                            }

?>