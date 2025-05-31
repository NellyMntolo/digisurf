<?php
include '../lang/lang.php';
mysql_set_charset("utf8");

include 'menuDAO.php';
include 'footerDAO.php';
$current_lang = $_SESSION['lang'];
$slides = '';
                    //CONTENT
        $page_newsletter_Sql = 'SELECT * FROM digisurf_newsletter ORDER BY idx DESC';
        $page_retval_newsletter = mysql_query( $page_newsletter_Sql, $conn );                 
                                 if(! $page_retval_newsletter )
                                 {
                                    die('Could not get data: ' . mysql_error());
                                 }
        $page_row_newsletter = mysql_fetch_array($page_retval_newsletter, MYSQL_ASSOC);
        $page_newsletter_info = $page_row_newsletter['newsletter_info'];
        $page_newsletter_url = $page_row_newsletter['newsletter_url'];
        $page_newsletter_image = $page_row_newsletter['image1'];


                        


                            
?>