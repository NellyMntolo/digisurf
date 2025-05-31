<?php 
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];

$result = '';
//if(isset($_POST['selected_tag'])){ 
  $tagname = mysql_real_escape_string($_POST['selected_tag'],$conn);

  $sql_tag_name = 'SELECT category_id FROM shop_digisurf_product_categories WHERE category_id = "'.$tagname.'" AND code="'.$current_lang.'" LIMIT 1';    
     $retval_tag_name = mysql_query( $sql_tag_name, $conn );     
     if(! $retval_tag_name )
     {
        die('Could not get data: ' . mysql_error());
     }

     $rowtag = mysql_fetch_array($retval_tag_name, MYSQL_ASSOC);
     $text2 = $rowtag['category_id'];       
     $result = $text2;
//}

echo $result;

?>