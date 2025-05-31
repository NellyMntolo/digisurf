<?php
include 'dbconfig.php';
mysql_set_charset("utf8");                    

$current_lang = $_SESSION['lang'];


                        $sqlmain_downloads = 'select * from training_downloads ORDER BY idx DESC';
                        $retvalmain_downloads = mysql_query( $sqlmain_downloads, $conn );                 
                             if(! $retvalmain_downloads )
                             {
                                die('Could not get data: ' . mysql_error());
                             }


                        $sql_download_videos = 'select * from green_videos ORDER BY idx DESC';
                        $retval_download_videos = mysql_query( $sql_download_videos, $conn );                 
                             if(! $retval_download_videos )
                             {
                                die('Could not get data: ' . mysql_error());
                             }


?>