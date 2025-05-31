<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];

$locationid = mysql_real_escape_string($_GET['location_id'],$conn);

                        $sqllocationen = 'select * from digisurf_locations WHERE idx="'.$locationid.'" LIMIT 1';
                        $retvallocationen = mysql_query( $sqllocationen, $conn );                 
                             if(! $retvallocationen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowlocationen = mysql_fetch_array($retvallocationen, MYSQL_ASSOC);
                            $idx = $rowlocationen['idx']; 
                            $entext1 = $rowlocationen['text1'];
                            $entext2 = $rowlocationen['text2'];
                            $entext3 = $rowlocationen['text3'];
                            $entext4 = $rowlocationen['text4'];
                            $entext5 = $rowlocationen['text5'];
                            $entext6 = $rowlocationen['text6'];
                            $entext7 = $rowlocationen['lat'];
                            $entext8 = $rowlocationen['lon'];
                            $enimage1 = $rowlocationen['image1'];
?>