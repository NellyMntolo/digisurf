<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];
//
$categoryurl = mysql_real_escape_string($_GET['category_url'],$conn);


                        $sqlcategory = 'select * from digisurf_categories WHERE text2="'.$categoryurl.'" and code="'.$current_lang.'" ';
                        $retvalcategory = mysql_query( $sqlcategory, $conn );                 
                             if(! $retvalcategory )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $all_categories = '';                               
                        
                        $rowcategory = mysql_fetch_array($retvalcategory, MYSQL_ASSOC);
                        $category_id = $rowcategory['text2']; 
                        $category_name = $rowcategory['text1']; 
                        $category_image = $rowcategory['image1'];
?>