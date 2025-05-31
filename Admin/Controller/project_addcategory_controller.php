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
          $sql_option_name = 'SELECT * FROM think_category WHERE text1 != "'.$category1.'" AND text1 != "'.$category2.'" AND text1 != "'.$category3.'" AND text1 != "'.$category4.'" AND text1 != "'.$category5.'" AND text1 != "'.$category6.'" AND text1 != "'.$category7.'" AND text1 != "'.$category8.'" AND text1 != "'.$category9.'" AND text1 != "'.$category10.'"';
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
              $text1 = $rowoption['text1'];       
              $text2 = $rowoption['text2'];
              $result .= '<option value="'.$text1.'">'.$text1.'</option>';
     }
  }
     
*/

     $sql_misc = 'SELECT * FROM digisurf_project WHERE idx = "'.$selected_option.'" ';    
     $retval_misc = mysql_query( $sql_misc, $conn );     
     if(! $retval_misc )
     {
        die('Could not get data: ' . mysql_error());
     }

      $row_misc = mysql_fetch_array($retval_misc, MYSQL_ASSOC);
      $misc_id = $row_misc['misc_id'];
      //echo "<br>misc id = ".$misc_id;

      if ($misc_id != null) {
          $sql_option_name1 = 'SELECT * FROM digisurf_category_list WHERE text1 != "'.$misc_id.'" and code ="'.$current_lang.'" ';
          $retval_option_name = mysql_query( $sql_option_name1, $conn );     
           if(! $retval_option_name )
           {
              die('Could not get data: ' . mysql_error());
           }
          
           while($rowoption1 = mysql_fetch_array($retval_option_name, MYSQL_ASSOC)){
                  $all_catagsnames [] = $rowoption1['text2'];
                }
                
                if (!empty($all_catagsnames)) {
                
                  //foreach ($all_catagsnames as $key => $value) {
                      //$sql_catagnames = 'SELECT * FROM digisurf_categories WHERE text2 = "'.$value.'" and code ="'.$current_lang.'" ORDER BY text2 ASC ';
                      $sql_catagnames = 'SELECT * FROM digisurf_categories WHERE code ="'.$current_lang.'" ORDER BY text2 ASC ';
                      $retval_catagnames = mysql_query( $sql_catagnames, $conn );     
                       if(! $retval_catagnames )
                       {
                          die('Could not get data: ' . mysql_error());
                       }

                      while($rowcatagnames = mysql_fetch_array($retval_catagnames, MYSQL_ASSOC)){
                      $text1 = $rowcatagnames['text1'];
                      $text2 = $rowcatagnames['text2'];
                      $result .= '<option value="'.$text2.'">'.$text1.'</option>';

                    }
                    
                  //}

                } elseif(empty($all_catagsnames)) {
                  $sql_option_name2 = 'SELECT * FROM digisurf_category_list WHERE code ="'.$current_lang.'" ';
                  $retval_option_name2 = mysql_query( $sql_option_name2, $conn );     
                   if(! $retval_option_name2 )
                   {
                      die('Could not get data: ' . mysql_error());
                   }

                    while($rowoption2 = mysql_fetch_array($retval_option_name2, MYSQL_ASSOC)){
                          $all_catagsnames2 [] = $rowoption2['text2'];                          
                        }

                    if(!empty($all_catagsnames2)){
                      //$test = array_unique($all_catagsnames2);
                      //print_r(implode($all_catagsnames2,', '));
                    //foreach ($all_catagsnames2 as $keys => $values) {

                      //$sql_option_name_check = 'SELECT * FROM digisurf_categories where text2 != "'.$values.'" and code ="'.$current_lang.'" ORDER BY text2 ASC'; 
                     $sql_option_name_check = 'SELECT * FROM digisurf_categories WHERE text2 NOT IN ('.implode($all_catagsnames2,',').')  and code ="'.$current_lang.'" ORDER BY text2 ASC';    
                     $retval_option_name1 = mysql_query( $sql_option_name_check, $conn );     
                     if(! $retval_option_name1 )
                     {
                        die('Could not get data: ' . mysql_error());
                     }

                     while($rowoption23 = mysql_fetch_array($retval_option_name1, MYSQL_ASSOC)){
                      $idx = $rowoption23['idx'];
                      $text1 = $rowoption23['text1'];
                      $text2 = $rowoption23['text2'];
                      $text3 [] = $rowoption23['text2'];
                      //echo "<br>".$text2;
                      //echo array_unique($text2);
                      $result .= '<option value="'.$text2.'">'.$text1.'</option>';
                    }
                                  

                    //}
                  } else {
                             $sql_option_name3 = 'SELECT * FROM digisurf_categories where code ="'.$current_lang.'" ORDER BY text2 ASC';    
                             $retval_option_name3 = mysql_query( $sql_option_name3, $conn );     
                             if(! $retval_option_name3 )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                             while($rowoption3 = mysql_fetch_array($retval_option_name3, MYSQL_ASSOC)) {
                              $idx = $rowoption3['idx'];  
                              $text1 = $rowoption3['text1'];
                              $text2 = $rowoption3['text2'];
                              $result .= '<option value="'.$text2.'">'.$text1.'</option>';
                     } 
                  }
                }

          } else {
                 $sql_option_name3 = 'SELECT * FROM digisurf_categories where code ="'.$current_lang.'" ORDER BY text2 ASC';    
                 $retval_option_name3 = mysql_query( $sql_option_name3, $conn );     
                 if(! $retval_option_name3 )
                 {
                    die('Could not get data: ' . mysql_error());
                 }

                 while($rowoption3 = mysql_fetch_array($retval_option_name3, MYSQL_ASSOC)) {
                  $idx = $rowoption3['idx'];  
                  $text1 = $rowoption3['text1'];
                  $text2 = $rowoption3['text2'];
                  $result .= '<option value="'.$text2.'">'.$text1.'</option>';
         } 
      }

echo $result;


?>