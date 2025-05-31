<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];

$locationid = mysql_real_escape_string($_GET['second_slider_id'],$conn);

                        $sqlsecond = 'select * from index_second_slider WHERE idx="'.$locationid.'" LIMIT 1';
                        $retvalsecond = mysql_query( $sqlsecond, $conn );                 
                             if(! $retvalsecond )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowsecond = mysql_fetch_array($retvalsecond, MYSQL_ASSOC);
                            $idx = $rowsecond['idx']; 
                            $entext1 = $rowsecond['text1'];
                            $entext2 = $rowsecond['text2'];
                            $entext3 = $rowsecond['text3'];
                            $enimage1 = $rowsecond['image1'];
?>