<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];

$locationid = mysql_real_escape_string($_GET['step_id'],$conn);

                        $sqllocationen = 'select * from about_steps WHERE idx="'.$locationid.'" LIMIT 1';
                        $retvallocationen = mysql_query( $sqllocationen, $conn );                 
                             if(! $retvallocationen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowlocationen = mysql_fetch_array($retvallocationen, MYSQL_ASSOC);
                            $idx = $rowlocationen['idx']; 
                            $entext1 = $rowlocationen['text1'];
                            $entext2 = $rowlocationen['text2'];
                            $enimage1 = $rowlocationen['image1'];
?>