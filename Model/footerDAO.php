<?php
include '../lang/lang.php';
mysql_set_charset("utf8");

$current_lang = $_SESSION['lang'];

                        $sqlfooteren = 'select * from digisurf_footer where code ="'.$current_lang.'"';
                        $retvalfooteren = mysql_query( $sqlfooteren, $conn );                 
                             if(! $retvalfooteren )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowfooteren = mysql_fetch_array($retvalfooteren, MYSQL_ASSOC);
                            $footer_text1 = $rowfooteren['text1'];
                            $footer_text2 = $rowfooteren['text2'];
                            $footer_entext3 = $rowfooteren['text3'];
                            $footer_text4 = $rowfooteren['text4'];
                            $footer_text5 = $rowfooteren['text5'];
                            $footer_text6 = $rowfooteren['text6'];
                            $footer_text7 = $rowfooteren['text7'];
                            $footer_text8 = $rowfooteren['text8'];
                            $footer_text9 = $rowfooteren['text9'];
                            $footer_text10 = $rowfooteren['text10'];
                            $footer_text11 = $rowfooteren['text11'];
                            $footer_text12 = $rowfooteren['text12'];
                            $footer_text13 = $rowfooteren['text13'];
                            $footer_text14 = $rowfooteren['text14'];

                            $footer_textparagraph3 = trim($footer_entext3);
                            $footer_trimmedtext3 = nl2br($footer_textparagraph3); 
                            $footer_text3 = $footer_trimmedtext3; 

                        $sqlsocial = 'select * from digisurf_social';
                        $retvalsocial = mysql_query( $sqlsocial, $conn );                 
                             if(! $retvalsocial )
                             {
                                die('Could not get data: ' . mysql_error());
                             }   


                        $social = '';
                        while($rowsocial = mysql_fetch_array($retvalsocial, MYSQL_ASSOC)){
                                                    $idx = $rowsocial['idx'];
                                                    $socialtext1 = $rowsocial['text1'];     
                                                    $socialtext2 = $rowsocial['text2']; 
                                                    $socialimage = $rowsocial['image1']; 

                                                    $social .= '<a href="'.$socialtext1.'" target="'.$socialtext2.'"><img src="'.$socialimage.'"" alt=""></a>';
                                        }
?>