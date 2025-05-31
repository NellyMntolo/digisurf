<?php 
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];

$result = '';
//if(isset($_POST['selected_category'])){ 
  $categoryname = mysql_real_escape_string($_POST['selected_category'],$conn);

  $sql_catag_name = 'SELECT text1 FROM digisurf_categories WHERE idx = "'.$categoryname.'" AND code="'.$current_lang.'" LIMIT 1';    
     $retval_catag_name = mysql_query( $sql_catag_name, $conn );     
     if(! $retval_catag_name )
     {
        die('Could not get data: ' . mysql_error());
     }

     $rowcategory = mysql_fetch_array($retval_catag_name, MYSQL_ASSOC);
     $text1 = $rowcategory['text1'];       
     $result = $text1;
//}

echo $result;

?>