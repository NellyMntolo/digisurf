<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];
//
$categoryurl = mysql_real_escape_string($_GET['category_url'],$conn);


                        $sqlcategory = 'select * from shop_digisurf_product_categories WHERE category_id="'.$categoryurl.'" and code="'.$current_lang.'" ';
                        $retvalcategory = mysql_query( $sqlcategory, $conn );                 
                             if(! $retvalcategory )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $all_categories = '';                               
                        
                        $rowcategory = mysql_fetch_array($retvalcategory, MYSQL_ASSOC);
                        $category_id = $rowcategory['category_id']; 
                        $category_name = $rowcategory['category_name']; 
                        $category_image = $rowcategory['image1'];
?>