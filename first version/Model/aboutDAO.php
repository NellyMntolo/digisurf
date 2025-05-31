<?php
include '../lang/lang.php';
mysql_set_charset("utf8");

include 'menuDAO.php';
include 'footerDAO.php';
$current_lang = $_SESSION['lang'];
                    //CONTENT
                        $sqlen_about = 'select * from digisurf_about where code ="'.$current_lang.'"';
                        $retvalen_about = mysql_query( $sqlen_about, $conn );
                             if(! $retvalen_about )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowen_about = mysql_fetch_array($retvalen_about, MYSQL_ASSOC);
                            $about_text1 = $rowen_about['text1'];
                            $about_text2 = $rowen_about['text2'];
                            $about_text3 = $rowen_about['text3'];
                            $about_text4 = $rowen_about['text4'];
                            $about_text5 = $rowen_about['text5'];
                            $about_text6 = $rowen_about['text6'];
                            $about_text7 = $rowen_about['text7'];
                            $about_text8 = $rowen_about['text8'];
                            $about_text9 = $rowen_about['text9'];
                            $about_text10 = $rowen_about['text10'];
                            $about_image1 = $rowen_about['image1'];
                            $about_image2 = $rowen_about['image2'];


                            
?>