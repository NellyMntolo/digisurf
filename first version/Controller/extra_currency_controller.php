<?php 
   include("../Model/dbconfig.php");
   mysql_set_charset("utf8");
   session_start();


$currency_status = 'Y';
                        $all_currencies = '';
                        $sqlcurrency_all = 'select * from shop_digisurf_currency WHERE currency_status = "'.$currency_status.'" ';
                            $retvalcurrency_all = mysql_query( $sqlcurrency_all, $conn );                 
                                 if(! $retvalcurrency_all )
                                 {
                                    die('Could not get data: ' . mysql_error());
                                 }

                            while($rowcurrency_all = mysql_fetch_array($retvalcurrency_all, MYSQL_ASSOC)){
                            $currency_iso_code = $rowcurrency_all['currency_iso_code']; 
                            $currency_name = $rowcurrency_all['currency_name'];  
                            $all_currencies .= '<option value="'.$currency_iso_code.'">'.$currency_name.' ('.$currency_iso_code.')</option>'; 
                               }

                               $current_symbol = '';
                               if (isSet($_POST['currency'])) {
                                  # code...
                                  $_SESSION['currency_session'] = $_POST['currency'];

                                $sqlsymbol = 'select currency_sign from shop_digisurf_currency WHERE currency_iso_code = "'.$_POST['currency'].'" ';
                                $retvalsymbol = mysql_query( $sqlsymbol, $conn );                 
                                     if(! $retvalsymbol )
                                     {
                                        die('Could not get data: ' . mysql_error());
                                     }

                                $rowsymbol = mysql_fetch_array($retvalsymbol, MYSQL_ASSOC);
                                $_SESSION['currency_symbol'] = $rowsymbol['currency_sign'];
                               }
                               header('Refresh:0;' . $_SERVER['HTTP_REFERER']);
?>