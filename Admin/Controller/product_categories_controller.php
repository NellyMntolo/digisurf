<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];


if(isset($_POST['new_category_submit'])){

 $max = 'SELECT sortable_order FROM shop_digisurf_product_categories where code="'.$current_lang.'" ORDER BY sortable_order DESC';
  $retvalmaxen = mysql_query( $max, $conn );                 
                             if(! $retvalmaxen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
  $rowmaxen = mysql_fetch_array($retvalmaxen, MYSQL_ASSOC);
  $large = $rowmaxen['sortable_order'];



  $tag_max = 'SELECT category_id FROM shop_digisurf_product_categories ORDER BY category_id DESC';
  $tag_retvalmaxen = mysql_query( $tag_max, $conn );                 
                             if(! $tag_retvalmaxen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
  $tag_rowmaxen = mysql_fetch_array($tag_retvalmaxen, MYSQL_ASSOC);
  $tag_large = $tag_rowmaxen['category_id'];

  $entext1 = mysql_real_escape_string($_POST['content_text1'],$conn);

  $image1 = $_FILES['category_image1']['name'];
  $uploaded_image1 = '';

  if($image1 != null) {
    $file_tmp =$_FILES['category_image1']['tmp_name'];
      move_uploaded_file($file_tmp, getcwd()."/../../uploads/".$image1);
    $uploaded_image1 = "/uploads/".$image1;
  }

$vowels = array(" ", "&", "?", "/");
$enurl = str_replace($vowels, '_', $entext1);

  $sqla = 'INSERT INTO shop_digisurf_product_categories (code, category_name, category_id, sortable_order, image1, url) VALUES ("'.$current_lang.'", "'.$entext1.'","'.$tag_large.'"+1,"'.$large.'"+1, "'.$uploaded_image1.'", "'.$enurl.'")';            
                   $retvala = mysql_query( $sqla, $conn );
                   if(! $retvala )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

                           header("Refresh:0; url=/Admin/ProductCategories");
    
}



if(isset($_POST['update_category_submit'])){

  $categoryid = mysql_real_escape_string($_POST['category_id'],$conn);
  
  $entext1 = mysql_real_escape_string($_POST['content_text1'],$conn);
  $image1 = $_FILES['category_image1']['name'];

  $vowels = array(" ", "&", "?", "/");
  $enurl = str_replace($vowels, '_', $entext1);

  $sql="UPDATE shop_digisurf_product_categories SET category_name='".$entext1."', url='".$enurl."' WHERE category_id='".$categoryid."' AND code='".$current_lang."' ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

    if($image1 != null) {
      $file_tmp1 =$_FILES['category_image1']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../uploads/".$image1);
      $filename = "/uploads/".$image1;
      $sql1="UPDATE shop_digisurf_product_categories SET image1='".$filename."' WHERE category_id ='".$categoryid."' AND code='".$current_lang."'";
      $retval1 = mysql_query( $sql1, $conn );
                   if(! $retval1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }
                       header("Refresh:0; url=/Admin/ProductCategories");
}


if(isset($_POST['delete_category'])){
  $categoryid = mysql_real_escape_string($_POST['category_id'],$conn);

        $sqlin = 'DELETE FROM shop_digisurf_product_categories WHERE category_id ="'.$categoryid.'" ';
                 $retvalin = mysql_query( $sqlin, $conn );
                   if(! $retvalin )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }
                       


        $sqlreseten1 = "ALTER TABLE shop_digisurf_product_categories DROP idx; ";
        $sqlreseten2 = "ALTER TABLE shop_digisurf_product_categories AUTO_INCREMENT = 1; ";
        $sqlreseten3 = "ALTER TABLE shop_digisurf_product_categories ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

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

        $sqlcategoryin = 'DELETE FROM shop_digisurf_product_category_list WHERE category_id ="'.$categoryid.'" ';
                 $retvalcategoryin = mysql_query( $sqlcategoryin, $conn );
                   if(! $retvalcategoryin )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }
                       


        $sqlresetcategory1 = "ALTER TABLE shop_digisurf_product_category_list DROP idx; ";
        $sqlresetcategory2 = "ALTER TABLE shop_digisurf_product_category_list AUTO_INCREMENT = 1; ";
        $sqlresetcategory3 = "ALTER TABLE shop_digisurf_product_category_list ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

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
                       header("Refresh:0; url=/Admin/ProductCategories");

}
?>