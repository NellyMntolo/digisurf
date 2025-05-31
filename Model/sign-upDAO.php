<?php
include '../lang/lang.php';
mysql_set_charset("utf8");

include 'menuDAO.php';
include 'footerDAO.php';
$current_lang = $_SESSION['lang'];


                    //CONTENT
                        $sqlen_sign_up = 'select * from digisurf_signup where code ="'.$current_lang.'"';
                        $retvalen_sign_up = mysql_query( $sqlen_sign_up, $conn );
                             if(! $retvalen_sign_up )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowen_sign_up = mysql_fetch_array($retvalen_sign_up, MYSQL_ASSOC);
                            $sign_up_text1 = $rowen_sign_up['text1'];
                            $sign_up_text2 = $rowen_sign_up['text2'];
                            $sign_up_text3 = $rowen_sign_up['text3'];
                            $sign_up_text4 = $rowen_sign_up['text4'];
                            $sign_up_text5 = $rowen_sign_up['text5'];
                            $sign_up_text6 = $rowen_sign_up['text6'];
                            $sign_up_text7 = $rowen_sign_up['text7'];
                            $sign_up_text8 = $rowen_sign_up['text8'];
                            $sign_up_text9 = $rowen_sign_up['text9'];
                            $sign_up_text10 = $rowen_sign_up['text10'];
                            $sign_up_text11 = $rowen_sign_up['text11'];
                            $sign_up_text12 = $rowen_sign_up['text12'];
                            $sign_up_text13 = $rowen_sign_up['text13'];
                            $sign_up_text14 = $rowen_sign_up['text14'];
                            $sign_up_text15 = $rowen_sign_up['text15'];
                            $sign_up_text16 = $rowen_sign_up['text16'];
                            $sign_up_text17 = $rowen_sign_up['text17'];
                            $sign_up_text18 = $rowen_sign_up['text18'];
                            $sign_up_image1 = $rowen_sign_up['image1'];
                            
?>