<?php
include '../lang/lang.php';
mysql_set_charset("utf8");

include 'menuDAO.php';
include 'footerDAO.php';
$current_lang = $_SESSION['lang'];
                    //CONTENT
                        $sqlen_contact = 'select * from digisurf_contact where code ="'.$current_lang.'"';
                        $retvalen_contact = mysql_query( $sqlen_contact, $conn );
                             if(! $retvalen_contact )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowen_contact = mysql_fetch_array($retvalen_contact, MYSQL_ASSOC);
                            $contact_text1 = $rowen_contact['text1'];
                            $contact_text2 = $rowen_contact['text2'];
                            $contact_text3 = $rowen_contact['text3'];
                            $contact_text4 = $rowen_contact['text4'];
                            $contact_text5 = $rowen_contact['text5'];
                            $contact_text6 = $rowen_contact['text6'];
                            $contact_text7 = $rowen_contact['text7'];
                            $contact_text8 = $rowen_contact['text8'];
                            $contact_text9 = $rowen_contact['text9'];
                            $contact_text10 = $rowen_contact['text10'];
                            $contact_image1 = $rowen_contact['image1'];
                            //$contact_image2 = $rowen_contact['image2'];


                            
?>