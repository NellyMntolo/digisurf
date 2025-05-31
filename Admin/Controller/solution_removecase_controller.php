<?php 
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();

$result = '';
$result2 = '';
//if(isset($_POST['selected_tag'])){ 
  $selected_option = mysql_real_escape_string($_POST['selected_option'],$conn);
  //$sql_option_name = 'SELECT * FROM think_category WHERE idx = "'.$selected_option.'" LIMIT 1';   

  $sql_category = 'SELECT * FROM green_solution_en WHERE idx = "'.$selected_option.'" ';    
     $retval_category = mysql_query( $sql_category, $conn );     
     if(! $retval_category )
     {
        die('Could not get data: ' . mysql_error());
     }

      $row_category = mysql_fetch_array($retval_category, MYSQL_ASSOC);
      $category1 = $row_category['category1'];       
      $category2 = $row_category['category2'];
      $category3 = $row_category['category3'];
      $category4 = $row_category['category4'];
      $category5 = $row_category['category5'];
      $category6 = $row_category['category6'];
      $category7 = $row_category['category7'];
      $category8 = $row_category['category8'];
      $category9 = $row_category['category9'];
      $category10 = $row_category['category10'];

        if ($category1 != null) {
          $result .= '<option value="'.$category1.'">'.$category1.'</option>';
        }

        if ($category2 != null) {
          $result .= '<option value="'.$category2.'">'.$category2.'</option>';
        }

        if ($category3 != null) {
          $result .= '<option value="'.$category3.'">'.$category3.'</option>';
        }

        if ($category4 != null) {
          $result .= '<option value="'.$category4.'">'.$category4.'</option>';
        }

        if ($category5 != null) {
          $result .= '<option value="'.$category5.'">'.$category5.'</option>';
        }

        if ($category6 != null) {
          $result .= '<option value="'.$category6.'">'.$category6.'</option>';
        }

        if ($category7 != null) {
          $result .= '<option value="'.$category7.'">'.$category7.'</option>';
        }

        if ($category8 != null) {
          $result .= '<option value="'.$category8.'">'.$category8.'</option>';
        }

        if ($category9 != null) {
          $result .= '<option value="'.$category9.'">'.$category9.'</option>';
        }

        if ($category10 != null) {
          $result .= '<option value="'.$category10.'">'.$category10.'</option>';
        }

      /*


  $sql_option_name = 'SELECT * FROM think_category';    
     $retval_option_name = mysql_query( $sql_option_name, $conn );     
     if(! $retval_option_name )
     {
        die('Could not get data: ' . mysql_error());
     }

     while($rowoption = mysql_fetch_array($retval_option_name, MYSQL_ASSOC)) {
     	$idx = $rowoption['idx'];  
		$text1 = $rowoption['text1'];       
	    $text2 = $rowoption['text2'];
	    $result .= '<option value="'.$text1.'">'.$text1.'</option>';
	    $result2 = '<option value="'.$text1.'">'.$text1.'</option>';
     }
     */
     
//}

echo $result;

?>