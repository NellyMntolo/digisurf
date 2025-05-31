<?php
include 'dbconfig.php';
mysql_set_charset("utf8");

$current_lang = $_SESSION['lang'];

                        $sqlfooteren = 'select * from digisurf_footer where code ="'.$current_lang.'"';
                        $retvalfooteren = mysql_query( $sqlfooteren, $conn );                 
                             if(! $retvalfooteren )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowfooteren = mysql_fetch_array($retvalfooteren, MYSQL_ASSOC);
                            $idx = $rowfooteren['idx']; 
                            $entext1 = $rowfooteren['text1'];
                            $entext2 = $rowfooteren['text2'];
                            $entext3 = $rowfooteren['text3'];
                            $entext4 = $rowfooteren['text4'];
                            $entext5 = $rowfooteren['text5'];
                            $entext6 = $rowfooteren['text6'];
                            $entext7 = $rowfooteren['text7'];
                            $entext8 = $rowfooteren['text8'];
                            $entext9 = $rowfooteren['text9'];
                            $entext10 = $rowfooteren['text10'];
                            $entext11 = $rowfooteren['text11'];
                            $entext12 = $rowfooteren['text12'];
                            $entext13 = $rowfooteren['text13'];
                            $entext14 = $rowfooteren['text14'];




                        $sqlsocial = 'select * from digisurf_social';
                        $retvalsocial = mysql_query( $sqlsocial, $conn );                 
                             if(! $retvalsocial )
                             {
                                die('Could not get data: ' . mysql_error());
                             }   


?>