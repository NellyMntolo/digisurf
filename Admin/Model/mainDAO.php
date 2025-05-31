<?php
include 'dbconfig.php';
mysql_set_charset("utf8");

$current_lang = $_SESSION['lang'];

                        $sqlindexen = 'select * from digisurf_index where code ="'.$current_lang.'"';
                        $retvalindexen = mysql_query( $sqlindexen, $conn );                 
                             if(! $retvalindexen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowindexen = mysql_fetch_array($retvalindexen, MYSQL_ASSOC);
                            $index_idx = $rowindexen['idx']; 
                            $index_entext1 = $rowindexen['text1'];
                            $index_entext2 = $rowindexen['text2'];
                            $index_entext3 = $rowindexen['text3'];
                            $index_entext4 = $rowindexen['text4'];
                            $index_entext5 = $rowindexen['text5'];
                            $index_entext6 = $rowindexen['text6'];
                            $index_entext7 = $rowindexen['text7'];
                            $index_entext8 = $rowindexen['text8'];
                            $index_entext9 = $rowindexen['text9'];
                            $index_entext10 = $rowindexen['text10'];
                            $index_entext11 = $rowindexen['text11'];
                            $index_entext12 = $rowindexen['text12'];
                            $index_entext13 = $rowindexen['text13'];
                            $index_entext14 = $rowindexen['text14'];
                            $index_entext15 = $rowindexen['text15'];
                            $index_entext16 = $rowindexen['text16'];
                            $index_entext17 = $rowindexen['text17'];
                            $index_entext18 = $rowindexen['text18'];
                            $index_entext19 = $rowindexen['text19'];
                            $index_entext20 = $rowindexen['text20'];
                            $index_entext21 = $rowindexen['text21'];
                            $index_entext22 = $rowindexen['text22'];
                            $index_entext23 = $rowindexen['text23'];
                            $index_entext24 = $rowindexen['text24'];
                            $index_entext25 = $rowindexen['text25'];
                            $index_entext26 = $rowindexen['text26'];
                            $index_entext27 = $rowindexen['text27'];
                            $index_entext28 = $rowindexen['text28'];
                            $index_entext29 = $rowindexen['text29'];
                            $index_entext30 = $rowindexen['text30'];
                            $index_entext31 = $rowindexen['text31'];
                            $index_entext32 = $rowindexen['text32'];
                            $index_entext33 = $rowindexen['text33'];
                            $index_entext34 = $rowindexen['text34'];
                            $index_entext35 = $rowindexen['text35'];
                            $index_entext36 = $rowindexen['text36'];
                            $index_entext37 = $rowindexen['text37'];
                            $index_entext38 = $rowindexen['text38'];
                            $index_entext39 = $rowindexen['text39'];
                            $index_entext40 = $rowindexen['text40'];
                            $index_entext41 = $rowindexen['text41'];
                            $index_entext42 = $rowindexen['text42'];
                            $index_enimage1 = $rowindexen['image1'];
                            $index_enimage2 = $rowindexen['image2'];
                            $index_enimage3 = $rowindexen['image3'];
                            $index_enimage4 = $rowindexen['image4'];
                            $index_enimage5 = $rowindexen['image5'];
                            $index_enimage6 = $rowindexen['image6'];
                            $index_enimage7 = $rowindexen['image7'];
                            $index_enimage8 = $rowindexen['image8'];
                            $index_enimage9 = $rowindexen['image9'];
                            $index_enimage10 = $rowindexen['image10'];



                        $sqlfirst = 'select * from index_first_slider ORDER BY idx DESC';
                        $retvalfirst = mysql_query( $sqlfirst, $conn );                 
                             if(! $retvalfirst )
                             {
                                die('Could not get data: ' . mysql_error());
                             }



                        $sqlsecond = 'select * from index_second_slider ORDER BY idx DESC';
                        $retvalsecond = mysql_query( $sqlsecond, $conn );                 
                             if(! $retvalsecond )
                             {
                                die('Could not get data: ' . mysql_error());
                             }


?>