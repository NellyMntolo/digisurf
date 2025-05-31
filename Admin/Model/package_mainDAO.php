<?php
include 'dbconfig.php';
mysql_set_charset("utf8");

include 'menuDAO.php';
include 'footerDAO.php';

$current_lang = $_SESSION['lang'];
                        $sqlpackages = 'select * from digisurf_all_package where code ="'.$current_lang.'" ';
                        $retvalpackages = mysql_query( $sqlpackages, $conn );                 
                             if(! $retvalpackages )
                             {
                                die('Could not get data: ' . mysql_error());
                             }


                        $rowpackages = mysql_fetch_array($retvalpackages, MYSQL_ASSOC);
                            $entext1 = $rowpackages['text1']; 
                            $entext2 = $rowpackages['text2'];
                            $entext3 = $rowpackages['text3'];
                            $entext4 = $rowpackages['text4'];
                            $entext5 = $rowpackages['text5'];
                            $entext6 = $rowpackages['text6'];
                            $entext7 = $rowpackages['text7'];
                            $entext8 = $rowpackages['text8'];
                            $enimage1 = $rowpackages['image1'];
                            $enimage2 = $rowpackages['image2'];
                            $enimage3 = $rowpackages['image3'];
                            $enimage4 = $rowpackages['image4'];
                            $enimage5 = $rowpackages['image5'];


?>
