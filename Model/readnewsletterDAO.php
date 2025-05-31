<?php
include '../lang/lang.php';
mysql_set_charset("utf8");

include 'menuDAO.php';
include 'footerDAO.php';
$current_lang = $_SESSION['lang'];
$publish = '';
$send_to_index = '';
//$newsletter_id = mysql_real_escape_string($_GET['newsletter_id'],$conn);
//idx="'.$newsletter_id.'" and
                        $sql_read_newsletter = 'select * from digisurf_newsletter WHERE code ="'.$current_lang.'" LIMIT 1';
                        $retval_read_newsletter = mysql_query( $sql_read_newsletter, $conn );                 
                             if(! $retval_read_newsletter )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $row_read_newsletter = mysql_fetch_array($retval_read_newsletter, MYSQL_ASSOC);
                            $newsletter_idx = $row_read_newsletter['idx']; 
                            $newsletter_text1 = $row_read_newsletter['newsletter_id'];
                            $newsletter_text2 = $row_read_newsletter['newsletter_info'];
                            $newsletter_text3 = $row_read_newsletter['newsletter_url'];
                            $newsletter_text4 = $row_read_newsletter['newsletter_slogan'];
                            $newsletter_image1 = $row_read_newsletter['image1'];