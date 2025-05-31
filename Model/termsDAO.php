<?php
include '../lang/lang.php';
mysql_set_charset("utf8");

include 'menuDAO.php';
include 'footerDAO.php';
$current_lang = $_SESSION['lang'];
                        $sqlweareen = 'select * from digisurf_terms where code ="'.$current_lang.'"';
                        $retvalweareen = mysql_query( $sqlweareen, $conn );                 
                             if(! $retvalweareen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowweareen = mysql_fetch_array($retvalweareen, MYSQL_ASSOC);
                            $terms_idx = $rowweareen['idx']; 
                            $terms_text1 = $rowweareen['text1'];
                            $terms_entext2 = $rowweareen['text2'];
                            $terms_text3 = $rowweareen['text3'];
                            $terms_text4 = $rowweareen['text4'];
                            $terms_image1 = $rowweareen['image1'];
                            $terms_image2 = $rowweareen['image2'];

                            $terms_textparagraph2 = trim($terms_entext2);
                            $terms_trimmedtext2 = nl2br($terms_textparagraph2); 
                            $terms_text2 = $terms_trimmedtext2; 

?>