<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];
                        $sqlweareen = 'select * from digisurf_thankyou where code ="'.$current_lang.'"';
                        $retvalweareen = mysql_query( $sqlweareen, $conn );                 
                             if(! $retvalweareen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowweareen = mysql_fetch_array($retvalweareen, MYSQL_ASSOC);
                            $idx = $rowweareen['idx']; 
                            $entext1 = $rowweareen['pay_thankone'];
                            $entext2 = $rowweareen['pay_thanktwo'];
                            $entext3 = $rowweareen['pay_thankthree'];
                            $entext4 = $rowweareen['contact_thankone'];
                            $entext5 = $rowweareen['contact_thanktwo'];
                            $entext6 = $rowweareen['contact_thankthree'];
                            $entext7 = $rowweareen['health_thankone'];
                            $entext8 = $rowweareen['health_thanktwo'];
                            $entext9 = $rowweareen['health_thankthree'];
                            $entext10 = $rowweareen['knowing_thankone'];
                            $entext11 = $rowweareen['knowing_thanktwo'];
                            $entext12 = $rowweareen['knowing_thankthree'];
                            $entext13 = $rowweareen['48_thankone'];
                            $entext14 = $rowweareen['48_thanktwo'];
                            $entext15 = $rowweareen['48_thankthree'];
                            $entext16 = $rowweareen['signup_thankone'];
                            $entext17 = $rowweareen['signup_thanktwo'];
                            $entext18 = $rowweareen['signup_thankthree'];
                            $entext19 = $rowweareen['cart_thankone'];
                            $entext20 = $rowweareen['cart_thanktwo'];
                            $entext21 = $rowweareen['cart_thankthree'];

?>