<?php
include '../lang/lang.php';
mysql_set_charset("utf8");

include 'menuDAO.php';
include 'footerDAO.php';
$current_lang = $_SESSION['lang'];
$verify_code = mysql_real_escape_string($_GET['verify_code'],$conn);

                    //CONTENT
                        $sqlen_sign_up_confirm = 'select * from shop_digisurf_customer where verify_code = "'.$verify_code.'"';
                        $retvalen_sign_up_confirm = mysql_query( $sqlen_sign_up_confirm, $conn );
                             if(! $retvalen_sign_up_confirm )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowen_sign_up_confirm = mysql_fetch_array($retvalen_sign_up_confirm, MYSQL_ASSOC);
                            $sign_up_confirm_customer_email = $rowen_sign_up_confirm['customer_email'];
                            $sign_up_confirm_verify_code = $rowen_sign_up_confirm['verify_code'];

                            //echo $sign_up_confirm_verify_code;

                            $sql_signup ="UPDATE shop_digisurf_customer SET customer_approve ='Y' LIMIT 1 ";              
                           $retval_sign_up = mysql_query( $sql_signup , $conn );
                           if(! $retval_sign_up )
                               {
                                  die('Could not enter data: ' . mysql_error());
                               }
                                    
?>