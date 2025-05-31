<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];
                        $sqlprojecten = 'select * from digisurf_solution where code ="'.$current_lang.'"';
                        $retvalprojecten = mysql_query( $sqlprojecten, $conn );                 
                             if(! $retvalprojecten )
                             {
                                die('Could not get data: ' . mysql_error());
                             }               




                        $sqlindexen = 'select * from digisurf_solution where code ="'.$current_lang.'"';
                        $retvalindexen = mysql_query( $sqlindexen, $conn );                 
                             if(! $retvalindexen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowindexen = mysql_fetch_array($retvalindexen, MYSQL_ASSOC);
                            $idx = $rowindexen['idx']; 
                            $entext1 = $rowindexen['text1'];
                            $entext2 = $rowindexen['text2'];
                            $entext3 = $rowindexen['text3'];
                            $entext4 = $rowindexen['text4'];
?>