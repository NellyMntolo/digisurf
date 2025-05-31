<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];

$new_status = '';
$currencyid = mysql_real_escape_string($_GET['currency_id'],$conn);
                        $sqlweareen = 'select * from shop_digisurf_currency where currency_id="'.$currencyid.'" order by idx DESC';
                        $retvalweareen = mysql_query( $sqlweareen, $conn );                 
                             if(! $retvalweareen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowweareen = mysql_fetch_array($retvalweareen, MYSQL_ASSOC);
                            $currency_id = $rowweareen['currency_id']; 
                            $currency_name = $rowweareen['currency_name'];
                            $currency_iso_code = $rowweareen['currency_iso_code'];
                            $currency_iso_num = $rowweareen['currency_iso_num'];
                            $currency_sign = $rowweareen['currency_sign'];
                            $currency_status = $rowweareen['currency_status'];
                            
                            if($currency_status == 'Y'){
                              $new_status = '<input type="checkbox" style="opacity: 0;" id="content_text5" name="content_text5" class="form-control" data-on-color="success" data-off-color="danger" checked value="Y">';
                            } elseif($currency_status == 'N') {
                              $new_status = '<input type="checkbox" style="opacity: 0;" id="content_text5" name="content_text5" class="form-control" data-on-color="success" data-off-color="danger" value="Y">';
                            }

?>