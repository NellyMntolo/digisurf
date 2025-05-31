<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];
$publish = '';
$send_to_index = '';
$caseid = mysql_real_escape_string($_GET['event_id'],$conn);

                        $sqlcaseen = 'select * from digisurf_project WHERE idx="'.$caseid.'" and code ="'.$current_lang.'" LIMIT 1';
                        $retvalcaseen = mysql_query( $sqlcaseen, $conn );                 
                             if(! $retvalcaseen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowcaseen = mysql_fetch_array($retvalcaseen, MYSQL_ASSOC);
                            $idx = $rowcaseen['idx']; 
                            $entext1 = $rowcaseen['text1'];
                            $entext2 = $rowcaseen['text2'];
                            $entext3 = $rowcaseen['text3'];
                            $entext4 = $rowcaseen['text4'];
                            $entext5 = $rowcaseen['text5'];
                            $entext6 = $rowcaseen['text6'];
                            $enimage1 = $rowcaseen['image1'];
                            $a = $rowcaseen['misc_id']; 






        $current_categories = '';

      $sql_all_categories = 'SELECT * FROM digisurf_category_list WHERE text1 = "'.$caseid.'" and code ="'.$current_lang.'" ';    
      $retval_all_categories = mysql_query( $sql_all_categories, $conn );     
      if(! $retval_all_categories )
      {
        die('Could not get data: ' . mysql_error());
      }

      //$all_categories = '';
      while($row_all_categories = mysql_fetch_array($retval_all_categories, MYSQL_ASSOC)){
      $all_categories = $row_all_categories['text2'];
    


      $sql_all_categories_names = 'SELECT * FROM digisurf_categories WHERE text2 = "'.$all_categories.'" and code ="'.$current_lang.'" ';    
      $retval_all_categories_names = mysql_query( $sql_all_categories_names, $conn );     
      if(! $retval_all_categories_names )
      {
        die('Could not get data: ' . mysql_error());
      }

      $row_all_categories_names = mysql_fetch_array($retval_all_categories_names, MYSQL_ASSOC);
      $text1 = $row_all_categories_names['text1'];
      $text2 = $row_all_categories_names['text2'];

        if ($text1 != null) {
          $current_categories .= $text1.'<br>';
        }
}

?>