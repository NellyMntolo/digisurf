<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];
$publish = '';
$send_to_index = '';
$solutionid = mysql_real_escape_string($_GET['workshop_id'],$conn);

                        $sqlsolutionen = 'select * from digisurf_solution WHERE idx="'.$solutionid.'" and code ="'.$current_lang.'" LIMIT 1';
                        $retvalsolutionen = mysql_query( $sqlsolutionen, $conn );                 
                             if(! $retvalsolutionen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowsolutionen = mysql_fetch_array($retvalsolutionen, MYSQL_ASSOC);
                            $idx = $rowsolutionen['idx']; 
                            $entext1 = $rowsolutionen['text1'];
                            $entext2 = $rowsolutionen['text2'];
                            $entext3 = $rowsolutionen['text3'];
                            $entext4 = $rowsolutionen['text4'];
                            $entext5 = $rowsolutionen['text5'];
                            $entext6 = $rowsolutionen['text6'];
                            $entext7 = $rowsolutionen['text7'];
                            $entext8 = $rowsolutionen['text8'];
                            $entext9 = $rowsolutionen['text9'];
                            $entext10 = $rowsolutionen['text10'];
                            $entext11 = $rowsolutionen['text11'];
                            $entext12 = $rowsolutionen['text12'];
                            $entext13 = $rowsolutionen['text13'];
                            $enimage1 = $rowsolutionen['image1'];
                            $enimage2 = $rowsolutionen['image2'];
                            $enimage3 = $rowsolutionen['image3'];
                            $enimage4 = $rowsolutionen['image4'];
                            $enimage5 = $rowsolutionen['image5'];
                            $a = $rowsolutionen['misc_id']; 


?>