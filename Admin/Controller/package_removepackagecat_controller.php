<?php 
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];


$result = '';
$result2 = '';
//if(isset($_POST['selected_tag'])){ 
  $selected_option = mysql_real_escape_string($_POST['selected_option'],$conn);
  //$sql_option_name = 'SELECT * FROM think_category WHERE idx = "'.$selected_option.'" LIMIT 1';   

  $sql_category = 'SELECT * FROM shop_digisurf_package WHERE package_id = "'.$selected_option.'" ';    
     $retval_category = mysql_query( $sql_category, $conn );     
     if(! $retval_category )
     {
        die('Could not get data: ' . mysql_error());
     }

      $row_category = mysql_fetch_array($retval_category, MYSQL_ASSOC);
      $misc_id = $row_category['package_id'];


      $sql_all_categories = 'SELECT * FROM digisurf_package_category_list WHERE package_id = "'.$misc_id.'" ';    
      $retval_all_categories = mysql_query( $sql_all_categories, $conn );     
      if(! $retval_all_categories )
      {
        die('Could not get data: ' . mysql_error());
      }

      //$all_categories = '';
      while($row_all_categories = mysql_fetch_array($retval_all_categories, MYSQL_ASSOC)){
      $all_categories = $row_all_categories['category_id'];
    

      $sql_all_categories_names = 'SELECT * FROM digisurf_package_categories WHERE category_id = "'.$all_categories.'" and code ="'.$current_lang.'" ';    
      $retval_all_categories_names = mysql_query( $sql_all_categories_names, $conn );     
      if(! $retval_all_categories_names )
      {
        die('Could not get data: ' . mysql_error());
      }

      $row_all_categories_names = mysql_fetch_array($retval_all_categories_names, MYSQL_ASSOC);
      $category_name = $row_all_categories_names['category_name'];
      $category_id = $row_all_categories_names['category_id'];

        if ($category_name != null) {
          $result .= '<option value="'.$category_id.'">'.$category_name.'</option>';
        }
}
        /*

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

        */

      /*


  $sql_option_name = 'SELECT * FROM think_category';    
     $retval_option_name = mysql_query( $sql_option_name, $conn );     
     if(! $retval_option_name )
     {
        die('Could not get data: ' . mysql_error());
     }

     while($rowoption = mysql_fetch_array($retval_option_name, MYSQL_ASSOC)) {
     	$idx = $rowoption['idx'];  
		$category_name = $rowoption['category_name'];       
	    $category_id = $rowoption['category_id'];
	    $result .= '<option value="'.$category_name.'">'.$category_name.'</option>';
	    $result2 = '<option value="'.$category_name.'">'.$category_name.'</option>';
     }
     */
     
//}

echo $result;

?>