<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];
                        $sqlweareen = 'select * from digisurf_login where code ="'.$current_lang.'"';
                        $retvalweareen = mysql_query( $sqlweareen, $conn );                 
                             if(! $retvalweareen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowweareen = mysql_fetch_array($retvalweareen, MYSQL_ASSOC);
                            $idx = $rowweareen['idx']; 
                            $entext1 = $rowweareen['text1'];
                            $entext2 = $rowweareen['text2'];
                            $entext3 = $rowweareen['text3'];
                            $entext4 = $rowweareen['text4'];
                            $entext5 = $rowweareen['text5'];
                            $entext6 = $rowweareen['text6'];
                            $entext7 = $rowweareen['text7'];
                            $entext8 = $rowweareen['text8'];
                            $entext9 = $rowweareen['text9'];
                            //$enimage1 = $rowweareen['image1'];

?>