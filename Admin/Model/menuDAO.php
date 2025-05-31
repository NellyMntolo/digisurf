<?php
include 'dbconfig.php';
mysql_set_charset("utf8");

$current_lang = $_SESSION['lang'];

                        $sqlmenuen = 'select * from digisurf_menu where code ="'.$current_lang.'" ';
                        $retvalmenuen = mysql_query( $sqlmenuen, $conn );                 
                             if(! $retvalmenuen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowmenuen = mysql_fetch_array($retvalmenuen, MYSQL_ASSOC);
                            $entext1 = $rowmenuen['text1'];
                            $entext2 = $rowmenuen['text2'];
                            $entext3 = $rowmenuen['text3'];
                            $entext4 = $rowmenuen['text4'];
                            $entext5 = $rowmenuen['text5'];
                            $entext6 = $rowmenuen['text6'];
                            $entext7 = $rowmenuen['text7'];
                            $entext8 = $rowmenuen['text8'];
                            $entext9 = $rowmenuen['text9'];
                            $entext10 = $rowmenuen['text10'];
                            $entext11 = $rowmenuen['text11'];
                            $entext12 = $rowmenuen['text12'];
                            $entext13 = $rowmenuen['text13'];
                            $entext14 = $rowmenuen['text14'];
                            $entext15 = $rowmenuen['text15'];
                            $entext16 = $rowmenuen['text16'];
                            $entext17 = $rowmenuen['text17'];
                            $entext18 = $rowmenuen['text18'];
                            $entext19 = $rowmenuen['text19'];
                            $entext20 = $rowmenuen['text20'];
                            $entext21 = $rowmenuen['text21'];
                            $entext22 = $rowmenuen['text22'];
                            $entext23 = $rowmenuen['text23'];
?>