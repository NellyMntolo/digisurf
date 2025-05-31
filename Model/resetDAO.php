<?php
/*include '../lang/lang.php';
mysql_set_charset("utf8");

include 'menuDAO.php';
include 'footerDAO.php';
$current_lang = $_SESSION['lang'];*/
                    //CONTENT
$resetenumerator = mysql_real_escape_string($_GET['enumerator'],$conn);
//$resetenumerator = '8dc5e3700a4f06b2a983bd7f2f19845d';

$content = '';

                        $sqlen_reset = 'select * from shop_digisurf_customer where customer_secret_code ="'.$resetenumerator.'"';
                        $retvalen_reset = mysql_query( $sqlen_reset, $conn );
                             if(! $retvalen_reset )
                             {
                                die('This Has Expired, Please Start Again: ' . mysql_error());
                             }
                        $rowen_reset = mysql_fetch_array($retvalen_reset, MYSQL_ASSOC);
                            $reset_customer_id = $rowen_reset['customer_id'];
                            $reset_customer_secret_code = $rowen_reset['customer_secret_code'];
                            
                        if ($resetenumerator == $reset_customer_secret_code) {
                            # code...
                            $content = '<h3>Please enter your new password</h3>
                                        <div class="form-group">
                                            <input type="password" class="form-control alt" id="pass1" placeholder="Password" name="">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control alt" id="pass2" placeholder="Re-enter Password" name="new_pass">
                                        </div>
                                        <input type="hidden" name="customer_id" value="'.$reset_customer_id.'">
                                        <div class="form-group">
                                            <button name="reset_submit" type="submit" class="btn btn-info btn-block">Submit</button>
                                        </div>';
                        } elseif($resetenumerator != $reset_customer_secret_code) {
                            $content = '<h3>Please Try Again</h3>';
                        }
?>