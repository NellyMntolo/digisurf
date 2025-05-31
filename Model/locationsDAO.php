<?php
include '../lang/lang.php';
mysql_set_charset("utf8");
error_reporting(E_ALL);
header("Content-type: text/xml");
header("Access-Control-Allow-Origin: *");

include 'menuDAO.php';
include 'footerDAO.php';
$current_lang = $_SESSION['lang'];


                    //CONTENT
                        $sqlen_content = 'select * from digisurf_stores order by idx asc';
                        $retvalen_content = mysql_query( $sqlen_content, $conn );
                             if(! $retvalen_content )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                             
                        while($rowen_content = mysql_fetch_array($retvalen_content, MYSQL_ASSOC)) {
                            $content_store_idx = $rowen_content['idx'];

                        }

     
?>