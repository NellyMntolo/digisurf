<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();

$current_lang = $_SESSION['lang'];


if(isset($_POST['new_category_submit'])){

  $max = 'SELECT sortable_order FROM digisurf_categories_articles where code="'.$current_lang.'" ORDER BY sortable_order DESC';
  $retvalmaxen = mysql_query( $max, $conn );                 
                             if(! $retvalmaxen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
  $rowmaxen = mysql_fetch_array($retvalmaxen, MYSQL_ASSOC);
  $large = $rowmaxen['sortable_order'];



  $category_max = 'SELECT text2 FROM digisurf_categories_articles ORDER BY text2 DESC';
  $category_retvalmaxen = mysql_query( $category_max, $conn );                 
                             if(! $category_retvalmaxen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
  $category_rowmaxen = mysql_fetch_array($category_retvalmaxen, MYSQL_ASSOC);
  $category_large = $category_rowmaxen['text2'];

  $entext1 = mysql_real_escape_string($_POST['content_text1'],$conn);

  // $image1 = $_FILES['category_image1']['name'];
  // $uploaded_image1 = '';

  // if($image1 != null) {
  //   $file_tmp =$_FILES['category_image1']['tmp_name'];
  //     move_uploaded_file($file_tmp, getcwd()."/../../uploads/".$image1);
  //   $uploaded_image1 = "/uploads/".$image1;
  // }


  // $sqla = 'INSERT INTO digisurf_categories_articles (code, text1, text2, sortable_order, image1) VALUES ("'.$current_lang.'", "'.$entext1.'","'.$category_large.'"+1,"'.$large.'"+1, "'.$uploaded_image1.'")';            
  $sqla = 'INSERT INTO digisurf_categories_articles (code, text1, text2, sortable_order) VALUES ("'.$current_lang.'", "'.$entext1.'","'.$category_large.'"+1,"'.$large.'"+1)';      
                   $retvala = mysql_query( $sqla, $conn );
                   if(! $retvala )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

                       header("Refresh:0; url=/Admin/articleCategories");     
}



if(isset($_POST['update_category_submit'])){
  
  $categoryid = mysql_real_escape_string($_POST['category_id'],$conn);
  
  $entext1 = mysql_real_escape_string($_POST['content_text1'],$conn);
  // $image1 = $_FILES['category_image1']['name'];

  $sql="UPDATE digisurf_categories_articles SET text1='".$entext1."' WHERE text2='".$categoryid."' AND code='".$current_lang."' ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

    // if($image1 != null) {
    //   $file_tmp1 =$_FILES['category_image1']['tmp_name'];
    //   move_uploaded_file($file_tmp1, getcwd()."/../../uploads/".$image1);
    //   $filename = "/uploads/".$image1;
    //   $sql1="UPDATE digisurf_categories_articles SET image1='".$filename."' WHERE text2 ='".$categoryid."' AND code='".$current_lang."'";
    //   $retval1 = mysql_query( $sql1, $conn );
    //                if(! $retval1 )
    //                    {
    //                       die('Could not enter image: ' . mysql_error());
    //                    }
    // }
                       header("Refresh:0; url=/Admin/articleCategories");
}


if(isset($_POST['delete_category'])){
  $categoryid = mysql_real_escape_string($_POST['category_id'],$conn);

        $sqlin = 'DELETE FROM digisurf_categories_articles WHERE text2 ="'.$categoryid.'" ';
                 $retvalin = mysql_query( $sqlin, $conn );
                   if(! $retvalin )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }                      


        $sqlreseten1 = "ALTER TABLE digisurf_categories_articles DROP idx; ";
        $sqlreseten2 = "ALTER TABLE digisurf_categories_articles AUTO_INCREMENT = 1; ";
        $sqlreseten3 = "ALTER TABLE digisurf_categories_articles ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

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

        $sqlcategoryin = 'DELETE FROM digisurf_category_list WHERE text2 ="'.$categoryid.'" ';
                 $retvalcategoryin = mysql_query( $sqlcategoryin, $conn );
                   if(! $retvalcategoryin )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }
                       


        $sqlresetcategory1 = "ALTER TABLE digisurf_category_list DROP idx; ";
        $sqlresetcategory2 = "ALTER TABLE digisurf_category_list AUTO_INCREMENT = 1; ";
        $sqlresetcategory3 = "ALTER TABLE digisurf_category_list ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

        $retvalresetcategory1 = mysql_query( $sqlresetcategory1, $conn );
        $retvalresetcategory2 = mysql_query( $sqlresetcategory2, $conn );
        $retvalresetcategory3 = mysql_query( $sqlresetcategory3, $conn );
                  if(! $retvalresetcategory1 )
                       {
                          die('Could not alter category data: ' . mysql_error());
                       }

                       if(! $retvalresetcategory2 )
                       {
                          die('Could not alter category data: ' . mysql_error());
                       }

                       if(! $retvalresetcategory3 )
                       {
                          die('Could not alter category data: ' . mysql_error());
                       }
                       header("Refresh:0; url=/Admin/articleCategories");
}
?>