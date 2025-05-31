<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];
                        $sqlweareen = 'select * from digisurf_invite where code ="'.$current_lang.'"';
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
                            $entext10 = $rowweareen['text10'];
                            $entext11 = $rowweareen['text11'];
                            $entext12 = $rowweareen['text12'];
                            $entext13 = $rowweareen['text13'];
                            $entext14 = $rowweareen['text14'];
                            $entext15 = $rowweareen['text15'];
                            $entext16 = $rowweareen['text16'];
                            $entext17 = $rowweareen['text17'];
                            $entext18 = $rowweareen['text18'];
                            $entext19 = $rowweareen['text19'];
                            $entext20 = $rowweareen['text20'];
                            $entext21 = $rowweareen['text21'];
                            $entext22 = $rowweareen['text22'];
                            $entext23 = $rowweareen['text23'];
                            $entext24 = $rowweareen['text24'];
                            $entext25 = $rowweareen['text25'];
                            $entext26 = $rowweareen['text26'];
                            $entext27 = $rowweareen['text27'];
                            $entext28 = $rowweareen['text28'];
                            $entext29 = $rowweareen['text29'];
                            $entext30 = $rowweareen['text30'];
                            $entext31 = $rowweareen['text31'];
                            $entext32 = $rowweareen['text32'];
                            $entext33 = $rowweareen['text33'];
                            $entext34 = $rowweareen['text34'];
                            $entext35 = $rowweareen['text35'];
                            $entext36 = $rowweareen['text36'];
                            $entext37 = $rowweareen['text37'];
                            $entext38 = $rowweareen['text38'];
                            $entext39 = $rowweareen['text39'];
                            $entext40 = $rowweareen['text40'];
                            $entext41 = $rowweareen['text41'];
                            $entext42 = $rowweareen['text42'];
                            $entext43 = $rowweareen['text43'];
                            $entext44 = $rowweareen['text44'];
                            $entext45 = $rowweareen['text45'];
                            $entext46 = $rowweareen['text46'];
                            $entext47 = $rowweareen['text47'];
                            $enimage1 = $rowweareen['image1'];
                            $enimage2 = $rowweareen['image2'];
                            $enimage3 = $rowweareen['image3'];
                            $enimage4 = $rowweareen['image4'];
                            $enimage5 = $rowweareen['image5'];
                            $enimage6 = $rowweareen['image6'];

?>