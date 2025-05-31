<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];
$publish = '';
$send_to_index = '';
$blogid = mysql_real_escape_string($_GET['blog_id'],$conn);
$rates = '';

                        $sqlblogen = 'select * from digisurf_blog WHERE idx="'.$blogid.'" and code ="'.$current_lang.'" LIMIT 1';
                        $retvalblogen = mysql_query( $sqlblogen, $conn );                 
                             if(! $retvalblogen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowblogen = mysql_fetch_array($retvalblogen, MYSQL_ASSOC);
                            $idx = $rowblogen['idx']; 
                            $entext1 = $rowblogen['text1'];
                            $entext2 = $rowblogen['text2'];
                            $entext3 = $rowblogen['text3'];
                            $entext4 = $rowblogen['text4'];
                            $entext5 = $rowblogen['text5'];
                            $entext6 = $rowblogen['text6'];
                            $entext7 = $rowblogen['text7'];
                            $entext8 = $rowblogen['text8'];
                            $entext9 = $rowblogen['text9'];
                            $entext10 = $rowblogen['text10'];
                            $entext11 = $rowblogen['text11'];
                            $entext12 = $rowblogen['text12'];
                            $entext13 = $rowblogen['text13'];
                            $entext14 = $rowblogen['text14'];
                            $enimage1 = $rowblogen['image1'];
                            $enimage2 = $rowblogen['image2'];
                            $enimage3 = $rowblogen['image3'];
                            $enimage4 = $rowblogen['image4'];
                            $enimage5 = $rowblogen['image5'];
                            $enimage6 = $rowblogen['image6'];
                            $enimage7 = $rowblogen['image7'];
                            $enimage8 = $rowblogen['image8'];
                            $enimage9 = $rowblogen['image9'];
                            $enimage10 = $rowblogen['image10'];
                            $enimage11 = $rowblogen['image11'];
                            $blog_publish = $rowblogen['publish'];
                            $blog_send_to_index = $rowblogen['send_to_index'];
                            $a = $rowblogen['misc_id'];

                            if($blog_publish == "yes"){
                              $publish = "<input type=\"checkbox\" id=\"checker\" type=\"checkbox\" value=\"yes\" name=\"publish\" class=\"form-content\" checked=\"true\">";
                             } elseif ($blog_publish == "no") {
                               $publish = "<input type=\"checkbox\" id=\"checker\" type=\"checkbox\" value=\"yes\" name=\"publish\" class=\"form-content\">";
                             }

                             if($blog_send_to_index == "yes"){
                              $send_to_index = "<input type=\"checkbox\" id=\"checker\" type=\"checkbox\" value=\"yes\" name=\"send_to_index\" class=\"form-content\" checked=\"true\">";
                             } elseif ($blog_send_to_index == "no") {
                               $send_to_index = "<input type=\"checkbox\" id=\"checker\" type=\"checkbox\" value=\"yes\" name=\"send_to_index\" class=\"form-content\">";
                             }



                            $current_categories = '';

      $sql_all_categories = 'SELECT * FROM digisurf_category_list_articles WHERE text1 = "'.$blogid.'" and code ="'.$current_lang.'" ';    
      $retval_all_categories = mysql_query( $sql_all_categories, $conn );     
      if(! $retval_all_categories )
      {
        die('Could not get data: ' . mysql_error());
      }

      //$all_categories = '';
      while($row_all_categories = mysql_fetch_array($retval_all_categories, MYSQL_ASSOC)){
      $all_categories = $row_all_categories['text2'];
    


      $sql_all_categories_names = 'SELECT * FROM digisurf_categories_articles WHERE text2 = "'.$all_categories.'" and code ="'.$current_lang.'" ';    
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