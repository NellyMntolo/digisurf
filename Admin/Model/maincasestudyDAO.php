<?php
include 'dbconfig.php';
mysql_set_charset("utf8");                    
$current_lang = $_SESSION['lang'];
                        $sqlmain_projecten = 'select * from digisurf_case where code ="'.$current_lang.'"';
                        $retvalmain_projecten = mysql_query( $sqlmain_projecten, $conn );                 
                             if(! $retvalmain_projecten )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowmain_projecten = mysql_fetch_array($retvalmain_projecten, MYSQL_ASSOC);
                            $entext1 = $rowmain_projecten['text1'];
                            $entext2 = $rowmain_projecten['text2'];
                            $entext3 = $rowmain_projecten['text3'];
                            $entext4 = $rowmain_projecten['text4'];
                            $entext5 = $rowmain_projecten['text5'];
                            $entext6 = $rowmain_projecten['text6'];
                            $entext7 = $rowmain_projecten['text7'];


?>