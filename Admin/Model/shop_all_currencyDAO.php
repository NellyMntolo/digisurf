<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];
                        $sqlcurrency = 'select * from shop_digisurf_currency order by idx DESC';
                        $retvalcurrency = mysql_query( $sqlcurrency, $conn );                 
                             if(! $retvalcurrency )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $all_currencies = '';
                        while($rowcurrency = mysql_fetch_array($retvalcurrency, MYSQL_ASSOC)){
                            $currency_id = $rowcurrency['currency_id']; 
                            $currency_name = $rowcurrency['currency_name'];
                            $currency_iso_code = $rowcurrency['currency_iso_code'];
                            $currency_iso_num = $rowcurrency['currency_iso_num'];
                            $currency_sign = $rowcurrency['currency_sign'];
                            $currency_status = $rowcurrency['currency_status'];
                            $currency_default = $rowcurrency['currency_default'];

                            if($currency_status == 'Y'){
                                $current_status = 'Enabled';
                            } elseif($currency_status == 'N'){
                                $current_status = 'Disabled';
                            }

                            if($currency_default == 'Y'){
                                $current_default = 'Default';
                            } elseif($currency_default == 'N'){
                                $current_default = '-';
                            }

                            $all_currencies .= '<tr class="color-palette text-center currency-list">
                                              <td><input type="checkbox"></td>
                                              <td>'.$currency_name.'</td>
                                              <td>'.$currency_iso_code.'</td>
                                              <td>'.$currency_iso_num.'</td>
                                              <td>'.$currency_sign.'</td>
                                              <td>'.$current_status.'</td>
                                              <td>'.$current_default.'</td>
                                              <td><form method="get" action=""><button type="button" onclick="window.location=\'/Admin/EditCurrency/'.$currency_id.'\';" class="btn btn-primary btn-flat" title="Edit"><i class="fa fa-pencil"></i></button><input type="hidden" name="" ></form></td>
                                            </tr>';
                        }

?>