<?php 
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];

$result = '';
//if(isset($_POST['test-input'])){ 
  $selected_option = mysql_real_escape_string($_POST['test-input'],$conn);
  //$selected_option = "12";



/* OLDER SCRIPT
    $sql_category = 'SELECT * FROM green_project_en WHERE idx = "'.$selected_option.'" ';    
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

      if ($category1 != null || $category2 != null || $category3 != null || $category4 != null || $category5 != null || $category6 != null || $category7 != null || $category8 != null || $category9 != null || $category10 != null) {
          $sql_option_name = 'SELECT * FROM think_category WHERE category_name != "'.$category1.'" AND category_name != "'.$category2.'" AND category_name != "'.$category3.'" AND category_name != "'.$category4.'" AND category_name != "'.$category5.'" AND category_name != "'.$category6.'" AND category_name != "'.$category7.'" AND category_name != "'.$category8.'" AND category_name != "'.$category9.'" AND category_name != "'.$category10.'"';
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
            }
      } else {
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
     }
  }
     
*/

     $sql_misc = 'SELECT * FROM shop_digisurf_package WHERE package_id = "'.$selected_option.'" ';    
     $retval_misc = mysql_query( $sql_misc, $conn );     
     if(! $retval_misc )
     {
        die('Could not get data: ' . mysql_error());
     }

      $row_misc = mysql_fetch_array($retval_misc, MYSQL_ASSOC);
      $misc_id = $row_misc['package_id'];
      //echo "<br>misc id = ".$misc_id;

      if ($misc_id != null) {
          $sql_option_name1 = 'SELECT * FROM digisurf_package_category_list WHERE package_id != "'.$misc_id.'" ';
          $retval_option_name = mysql_query( $sql_option_name1, $conn );     
           if(! $retval_option_name )
           {
              die('Could not get data: ' . mysql_error());
           }
          
           while($rowoption1 = mysql_fetch_array($retval_option_name, MYSQL_ASSOC)){
                  $all_catagsnames [] = $rowoption1['category_id'];
                }
                
                if (!empty($all_catagsnames)) {
                
                  //foreach ($all_catagsnames as $key => $value) {
                      //$sql_catagnames = 'SELECT * FROM shop_digisurf_package_categories WHERE category_id = "'.$value.'" and code ="'.$current_lang.'" ORDER BY category_id ASC ';
                      $sql_catagnames = 'SELECT * FROM digisurf_package_categories WHERE code ="'.$current_lang.'" ORDER BY category_id ASC ';
                      $retval_catagnames = mysql_query( $sql_catagnames, $conn );     
                       if(! $retval_catagnames )
                       {
                          die('Could not get data: ' . mysql_error());
                       }

                      while($rowcatagnames = mysql_fetch_array($retval_catagnames, MYSQL_ASSOC)){
                      $category_name = $rowcatagnames['category_name'];
                      $category_id = $rowcatagnames['category_id'];
                      $result .= '<option value="'.$category_id.'">'.$category_name.'</option>';

                    }
                    
                  //}

                } elseif(empty($all_catagsnames)) {
                  $sql_option_name2 = 'SELECT * FROM digisurf_package_category_list ';
                  $retval_option_name2 = mysql_query( $sql_option_name2, $conn );     
                   if(! $retval_option_name2 )
                   {
                      die('Could not get data: ' . mysql_error());
                   }

                    while($rowoption2 = mysql_fetch_array($retval_option_name2, MYSQL_ASSOC)){
                          $all_catagsnames2 [] = $rowoption2['category_id'];                          
                        }

                    if(!empty($all_catagsnames2)){
                      //$test = array_unique($all_catagsnames2);
                      //print_r(implode($all_catagsnames2,', '));
                    //foreach ($all_catagsnames2 as $keys => $values) {

                      //$sql_option_name_check = 'SELECT * FROM shop_digisurf_package_categories where category_id != "'.$values.'" and code ="'.$current_lang.'" ORDER BY category_id ASC'; 
                     $sql_option_name_check = 'SELECT * FROM digisurf_package_categories WHERE category_id NOT IN ('.implode($all_catagsnames2,',').')  and code ="'.$current_lang.'" ORDER BY category_id ASC';    
                     $retval_option_name1 = mysql_query( $sql_option_name_check, $conn );     
                     if(! $retval_option_name1 )
                     {
                        die('Could not get data: ' . mysql_error());
                     }

                     while($rowoption23 = mysql_fetch_array($retval_option_name1, MYSQL_ASSOC)){
                      $idx = $rowoption23['idx'];
                      $category_name = $rowoption23['category_name'];
                      $category_id = $rowoption23['category_id'];
                      $text3 [] = $rowoption23['category_id'];
                      //echo "<br>".$category_id;
                      //echo array_unique($category_id);
                      $result .= '<option value="'.$category_id.'">'.$category_name.'</option>';
                    }
                                  

                    //}
                  } else {
                             $sql_option_name3 = 'SELECT * FROM digisurf_package_categories where code ="'.$current_lang.'" ORDER BY category_id ASC';    
                             $retval_option_name3 = mysql_query( $sql_option_name3, $conn );     
                             if(! $retval_option_name3 )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                             while($rowoption3 = mysql_fetch_array($retval_option_name3, MYSQL_ASSOC)) {
                              $idx = $rowoption3['idx'];  
                              $category_name = $rowoption3['category_name'];
                              $category_id = $rowoption3['category_id'];
                              $result .= '<option value="'.$category_id.'">'.$category_name.'</option>';
                     } 
                  }
                }

          } else {
                 $sql_option_name3 = 'SELECT * FROM digisurf_package_categories where code ="'.$current_lang.'" ORDER BY category_id ASC';    
                 $retval_option_name3 = mysql_query( $sql_option_name3, $conn );     
                 if(! $retval_option_name3 )
                 {
                    die('Could not get data: ' . mysql_error());
                 }

                 while($rowoption3 = mysql_fetch_array($retval_option_name3, MYSQL_ASSOC)) {
                  $idx = $rowoption3['idx'];  
                  $category_name = $rowoption3['category_name'];
                  $category_id = $rowoption3['category_id'];
                  $result .= '<option value="'.$category_id.'">'.$category_name.'</option>';
         } 
      }

echo $result;


?>