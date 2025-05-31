<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];

$publish = '';
$send_to_index = '';
$faqid = mysql_real_escape_string($_GET['faq_id'],$conn);

                        $sqlproducten = 'select * from digisurf_faq WHERE idx="'.$faqid.'" and code ="'.$current_lang.'" LIMIT 1';
                        $retvalproducten = mysql_query( $sqlproducten, $conn );                 
                             if(! $retvalproducten )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowproducten = mysql_fetch_array($retvalproducten, MYSQL_ASSOC);
                            $idx = $rowproducten['idx']; 
                            $entext1 = $rowproducten['text1'];
                            $entext2 = $rowproducten['text2'];
                            $a = $rowproducten['misc_id']; 
?>