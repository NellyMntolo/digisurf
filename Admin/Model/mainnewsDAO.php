<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];
                        $sqlwethinken = 'select * from digisurf_case where code ="'.$current_lang.'"';
                        $retvalwethinken = mysql_query( $sqlwethinken, $conn );                 
                             if(! $retvalwethinken )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowwethinken = mysql_fetch_array($retvalwethinken, MYSQL_ASSOC);
                            $idx = $rowwethinken['idx']; 
                            $entext1 = $rowwethinken['text1'];
                            $entext2 = $rowwethinken['text2'];
                            $entext3 = $rowwethinken['text3'];
                            $entext4 = $rowwethinken['text4'];
                            $enimage1 = $rowwethinken['image1'];

?>