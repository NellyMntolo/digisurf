<?php
include '../lang/lang.php';
mysql_set_charset("utf8");

include 'menuDAO.php';
include 'footerDAO.php';

$current_lang = $_SESSION['lang'];

                        $sqlmain_downloadsen = 'select * from digisurf_downloads_en where code ="'.$current_lang.'"';
                        $retvalmain_downloadsen = mysql_query( $sqlmain_downloadsen, $conn );                 
                             if(! $retvalmain_downloadsen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowmain_downloadsen = mysql_fetch_array($retvalmain_downloadsen, MYSQL_ASSOC);
                            $main_downloads_text1 = $rowmain_downloadsen['text1'];
                            $main_downloads_text2 = $rowmain_downloadsen['text2'];
                            $main_downloads_text3 = $rowmain_downloadsen['text3'];
                            $main_downloads_text4 = $rowmain_downloadsen['text4'];


?>