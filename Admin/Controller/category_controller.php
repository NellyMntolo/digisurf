<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];


if(isset($_POST['add_category'])){

  $max = 'SELECT sortable_order FROM digisurf_categories where code="'.$current_lang.'" ORDER BY sortable_order DESC';
  $retvalmaxen = mysql_query( $max, $conn );                 
                             if(! $retvalmaxen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
  $rowmaxen = mysql_fetch_array($retvalmaxen, MYSQL_ASSOC);
  $large = $rowmaxen['sortable_order'];



  $category_max = 'SELECT text2 FROM digisurf_categories ORDER BY text2 DESC';
  $category_retvalmaxen = mysql_query( $category_max, $conn );                 
                             if(! $category_retvalmaxen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
  $category_rowmaxen = mysql_fetch_array($category_retvalmaxen, MYSQL_ASSOC);
  $category_large = $category_rowmaxen['text2'];

  $entext1 = mysql_real_escape_string($_POST['content_entext1'],$conn);

  $sqla = 'INSERT INTO digisurf_categories (code, text1, text2, sortable_order) VALUES ("'.$current_lang.'", "'.$entext1.'","'.$category_large.'"+1,"'.$large.'"+1)';            
                   $retvala = mysql_query( $sqla, $conn );
                   if(! $retvala )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

                       header("Refresh:0; url=/Admin/eventCategories");     
}



if(isset($_POST['edit_category'])){
  $max = 'SELECT sortable_order FROM digisurf_categories where code="'.$current_lang.'" ORDER BY sortable_order DESC';
  $retvalmaxen = mysql_query( $max, $conn );                 
                             if(! $retvalmaxen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
  $rowmaxen = mysql_fetch_array($retvalmaxen, MYSQL_ASSOC);
  $large = $rowmaxen['sortable_order'];

  $categoryid = mysql_real_escape_string($_POST['category_id'],$conn);
  
  $entext1 = mysql_real_escape_string($_POST['content_entext2'],$conn);
  $entext3 = mysql_real_escape_string($_POST['content_entext3'],$conn);

  if($entext3 != ''){
  $categorygroup = mysql_real_escape_string($_POST['category_group'],$conn);
  $cataglang = mysql_real_escape_string($_POST['catag_lang'],$conn);

    $sqla = 'INSERT INTO digisurf_categories (code, text1, text2, sortable_order) VALUES ("'.$cataglang.'", "'.$entext3.'","'.$categorygroup.'","'.$large.'"+1)';            
                   $retvala = mysql_query( $sqla, $conn );
                   if(! $retvala )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

  } else {

  $sql="UPDATE digisurf_categories SET text1='".$entext1."' WHERE idx='".$categoryid."' AND code='".$current_lang."' ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }
          }

                       header("Refresh:0; url=/Admin/eventCategories");
}


if(isset($_POST['delete_category'])){
  $categorygroup = mysql_real_escape_string($_POST['category_group'],$conn);
  $categoryid = mysql_real_escape_string($_POST['category_id'],$conn);

  $entext1 = mysql_real_escape_string($_POST['content_entext2'],$conn);


  $strap = 'SELECT sortable_order FROM digisurf_categories WHERE idx = '.$categoryid.' AND code="'.$current_lang.'" LIMIT 1';
  $retvalstrapen = mysql_query( $strap, $conn );                 
                             if(! $retvalstrapen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
  $rowstrapen = mysql_fetch_array($retvalstrapen, MYSQL_ASSOC);
  $returnstrap = $rowstrapen['sortable_order'];

        $sqlin = 'DELETE FROM digisurf_categories WHERE text2 ="'.$categorygroup.'" ';
                 $retvalin = mysql_query( $sqlin, $conn );
                   if(! $retvalin )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }
                       


        $sqlreseten1 = "ALTER TABLE digisurf_categories DROP idx; ";
        $sqlreseten2 = "ALTER TABLE digisurf_categories AUTO_INCREMENT = 1; ";
        $sqlreseten3 = "ALTER TABLE digisurf_categories ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

        $retvalreseten1 = mysql_query( $sqlreseten1, $conn );
        $retvalreseten2 = mysql_query( $sqlreseten2, $conn );
        $retvalreseten3 = mysql_query( $sqlreseten3, $conn );
                  if(! $retvalreseten1 )
                       {
                          die('Could not alter english data: ' . mysql_error());
                       }

                       if(! $retvalreseten2 )
                       {
                          die('Could not alter english data: ' . mysql_error());
                       }

                       if(! $retvalreseten3 )
                       {
                          die('Could not alter english data: ' . mysql_error());
                       }

                       $sqlen="UPDATE digisurf_categories SET sortable_order= sortable_order-1  WHERE sortable_order >'".$returnstrap."' ";              
                       $retvalen = mysql_query( $sqlen, $conn );
                       if(! $retvalen )
                           {
                              die('Could not enter data: ' . mysql_error());
                           }
                       header("Refresh:0; url=/Admin/eventCategories");
}
?>