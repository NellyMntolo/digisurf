<?php
include '../lang/lang.php';
mysql_set_charset("utf8");

include 'menuDAO.php';
include 'footerDAO.php';
$current_lang = $_SESSION['lang'];
$slides = '';
                    //CONTENT
                        $sqlen_payment = 'select * from digisurf_payment where code ="'.$current_lang.'"';
                        $retvalen_payment = mysql_query( $sqlen_payment, $conn );
                             if(! $retvalen_payment )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowen_payment = mysql_fetch_array($retvalen_payment, MYSQL_ASSOC);
                            $payment_text1 = $rowen_payment['text1'];
                            $payment_text2 = $rowen_payment['text2'];
                            $payment_text3 = $rowen_payment['text3'];
                            $payment_text4 = $rowen_payment['text4'];
                            $payment_text5 = $rowen_payment['text5'];
                            $payment_text6 = $rowen_payment['text6'];
                            $payment_text7 = $rowen_payment['text7'];
                            $payment_text8 = $rowen_payment['text8'];
                            $payment_text9 = $rowen_payment['text9'];
                            $payment_text10 = $rowen_payment['text10'];
                            $payment_text11 = $rowen_payment['text11'];
                            $payment_text12 = $rowen_payment['text12'];
                            $payment_text13 = $rowen_payment['text13'];
                            $payment_text14 = $rowen_payment['text14'];
                            $payment_entext15 = $rowen_payment['text15'];
                            $payment_text16 = $rowen_payment['text16'];
                            $payment_text17 = $rowen_payment['text17'];
                            $payment_text18 = $rowen_payment['text18'];
                            $payment_text19 = $rowen_payment['text19'];
                            $payment_text20 = $rowen_payment['text20'];
                            $payment_text21 = $rowen_payment['text21'];
                            $payment_text22 = $rowen_payment['text22'];
                            $payment_text23 = $rowen_payment['text23'];
                            $payment_text24 = $rowen_payment['text24'];
                            $payment_text25 = $rowen_payment['text25'];
                            $payment_text26 = $rowen_payment['text26'];
                            $payment_text27 = $rowen_payment['text27'];
                            $payment_text28 = $rowen_payment['text28'];
                            $payment_text29 = $rowen_payment['text29'];
                            $payment_text30 = $rowen_payment['text30'];
                            $payment_text31 = $rowen_payment['text31'];
                            $payment_text32 = $rowen_payment['text32'];
                            $payment_text33 = $rowen_payment['text33'];
                            $payment_entext34 = $rowen_payment['text34'];
                            $payment_text35 = $rowen_payment['text35'];
                            $payment_text36 = $rowen_payment['text36'];
                            $payment_entext37 = $rowen_payment['text37'];
                            $payment_text38 = $rowen_payment['text38'];
                            $payment_text39 = $rowen_payment['text39'];
                            $payment_text40 = $rowen_payment['text40'];
                            $payment_text41 = $rowen_payment['text41'];
                            $payment_text42 = $rowen_payment['text42'];
                            $payment_text43 = $rowen_payment['text43'];
                            $payment_text44 = $rowen_payment['text44'];
                            $payment_text45 = $rowen_payment['text45'];
                            $payment_text46 = $rowen_payment['text46'];
                            $payment_text47 = $rowen_payment['text47'];
                            $payment_text48 = $rowen_payment['text48'];
                            $payment_text49 = $rowen_payment['text49'];
                            $payment_entext50 = $rowen_payment['text50'];
                            $payment_text51 = $rowen_payment['text51'];
                            $payment_text52 = $rowen_payment['text52'];
                            $payment_entext53 = $rowen_payment['text53'];
                            $payment_text54 = $rowen_payment['text54'];
                            $payment_text55 = $rowen_payment['text55'];
                            $payment_text56 = $rowen_payment['text56'];
                            $payment_text57 = $rowen_payment['text57'];
                            $payment_text58 = $rowen_payment['text58'];
                            $payment_text59 = $rowen_payment['text59'];
                            $payment_text60 = $rowen_payment['text60'];
                            $payment_text61 = $rowen_payment['text61'];
                            $payment_text62 = $rowen_payment['text62'];
                            $payment_text63 = $rowen_payment['text63'];
                            $payment_text64 = $rowen_payment['text64'];
                            $payment_text65 = $rowen_payment['text65'];
                            $payment_text66 = $rowen_payment['text66'];
                            $payment_text67 = $rowen_payment['text67'];
                            $payment_text68 = $rowen_payment['text68'];
                            $payment_text69 = $rowen_payment['text69'];
                            $payment_text70 = $rowen_payment['text70'];
                            $payment_text71 = $rowen_payment['text71'];
                            $payment_entext72 = $rowen_payment['text72'];
                            $payment_text73 = $rowen_payment['text73'];
                            $payment_text74 = $rowen_payment['text74'];
                            $payment_text75 = $rowen_payment['text75'];
                            $payment_text76 = $rowen_payment['text76'];
                            $payment_text77 = $rowen_payment['text77'];
                            $payment_entext78 = $rowen_payment['text78'];
                            $payment_text79 = $rowen_payment['text79'];
                            $payment_entext80 = $rowen_payment['text80'];
                            $payment_text81 = $rowen_payment['text81'];
                            $payment_text82 = $rowen_payment['text82'];
                            $payment_entext83 = $rowen_payment['text83'];
                            $payment_text84 = $rowen_payment['text84'];
                            $payment_entext85 = $rowen_payment['text85'];
                            $payment_text86 = $rowen_payment['text86'];
                            $payment_entext87 = $rowen_payment['text87'];
                            $payment_text88 = $rowen_payment['text88'];
                            $payment_image1 = $rowen_payment['image1'];
                            $payment_image2 = $rowen_payment['image2'];
                            $payment_image3 = $rowen_payment['image3'];
                            $payment_image4 = $rowen_payment['image4'];
                            $payment_image5 = $rowen_payment['image5'];
                            $payment_image6 = $rowen_payment['image6'];
                            $payment_image7 = $rowen_payment['image7'];
                            $payment_image8 = $rowen_payment['image8'];
                            $payment_image9 = $rowen_payment['image9'];
                            $payment_image10 = $rowen_payment['image10'];
                            $payment_image11 = $rowen_payment['image11'];

                            $payment_trimmedtext15 = nl2br($payment_entext15); 
                            $payment_text15 = $payment_trimmedtext15; 

                            $payment_trimmedtext34 = nl2br($payment_entext34); 
                            $payment_text34 = $payment_trimmedtext34;

                            $payment_trimmedtext37 = nl2br($payment_entext37); 
                            $payment_text37 = $payment_trimmedtext37;

                            $payment_trimmedtext50 = nl2br($payment_entext50); 
                            $payment_text50 = $payment_trimmedtext50;

                            $payment_trimmedtext53 = nl2br($payment_entext53); 
                            $payment_text53 = $payment_trimmedtext53;

                            $payment_trimmedtext78 = nl2br($payment_entext78); 
                            $payment_text78 = $payment_trimmedtext78;

                            $payment_trimmedtext80 = nl2br($payment_entext80); 
                            $payment_text80 = $payment_trimmedtext80;

                            $payment_trimmedtext83 = nl2br($payment_entext83); 
                            $payment_text83 = $payment_trimmedtext83;

                            $payment_trimmedtext85 = nl2br($payment_entext85); 
                            $payment_text85 = $payment_trimmedtext85;

                            $payment_trimmedtext87 = nl2br($payment_entext87); 
                            $payment_text87 = $payment_trimmedtext87;

                            $payment_trimmedtext72 = nl2br($payment_entext72); 
                            $payment_text72 = $payment_trimmedtext72; 

                        


                            
?>