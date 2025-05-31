<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];

$publish = '';
$send_to_index = '';
$productid = mysql_real_escape_string($_GET['product_id'],$conn);

                        $sqlproducten = 'select * from digisurf_product WHERE idx="'.$productid.'" and code ="'.$current_lang.'" LIMIT 1';
                        $retvalproducten = mysql_query( $sqlproducten, $conn );                 
                             if(! $retvalproducten )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowproducten = mysql_fetch_array($retvalproducten, MYSQL_ASSOC);
                            $idx = $rowproducten['idx']; 
                            $entext1 = $rowproducten['text1'];
                            $entext2 = $rowproducten['text2'];
                            $entext3 = $rowproducten['text3'];
                            $entext4 = $rowproducten['text4'];
                            $entext5 = $rowproducten['text5'];
                            $entext6 = $rowproducten['text6'];
                            $enimage1 = $rowproducten['image1'];
                            $enimage2 = $rowproducten['image2'];
                            $enimage3 = $rowproducten['image3'];
                            $enimage4 = $rowproducten['image4'];
                            $enimage5 = $rowproducten['image5'];
                            $enimage6 = $rowproducten['image6'];
                            $a = $rowproducten['misc_id']; 
?>