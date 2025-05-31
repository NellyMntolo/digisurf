<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];


if(isset($_POST['new_category_submit'])){

 $max = 'SELECT sortable_order FROM digisurf_package_categories where code="'.$current_lang.'" ORDER BY sortable_order DESC';
  $retvalmaxen = mysql_query( $max, $conn );                 
                             if(! $retvalmaxen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
  $rowmaxen = mysql_fetch_array($retvalmaxen, MYSQL_ASSOC);
  $large = $rowmaxen['sortable_order'];



  $tag_max = 'SELECT category_id FROM digisurf_package_categories ORDER BY category_id DESC';
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
  $videofile_name = '';

  $video_name = $_FILES['video_name']['name'];
  $video_tmp = $_FILES['video_name']['tmp_name'];
  $video_url = mysql_real_escape_string($_POST['video_url'],$conn);
  $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $video_name);

  if($image1 != null) {
    $file_tmp =$_FILES['category_image1']['tmp_name'];
      move_uploaded_file($file_tmp, getcwd()."/../../uploads/".$image1);
    $uploaded_image1 = "/uploads/".$image1;
  }

  if($video_name != null) {
      $videofile_name = "/Assets/video/".$withoutExt;
      move_uploaded_file($video_tmp, getcwd()."/../../Assets/video/".$video_name);
    }

  

$vowels = array(" ", "&", "?", "/");
$enurl = str_replace($vowels, '_', $entext1);

  $sqla = 'INSERT INTO digisurf_package_categories (code, category_name, category_id, sortable_order, image1, url, video_name, video_url) VALUES ("'.$current_lang.'", "'.$entext1.'","'.$tag_large.'"+1,"'.$large.'"+1, "'.$uploaded_image1.'", "'.$enurl.'", "'.$videofile_name.'", "'.$video_url.'")';            
                   $retvala = mysql_query( $sqla, $conn );
                   if(! $retvala )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

                           header("Refresh:0; url=/Admin/PackageCategories");
    
}



if(isset($_POST['update_category_submit'])){

  $categoryid = mysql_real_escape_string($_POST['category_id'],$conn);
  
  $entext1 = mysql_real_escape_string($_POST['content_text1'],$conn);

  $image1 = $_FILES['category_image1']['name'];
  $uploaded_image1 = '';
  $videofile_name = '';

  $video_name = $_FILES['video_name']['name'];
  $video_tmp = $_FILES['video_name']['tmp_name'];
  $video_url = mysql_real_escape_string($_POST['video_url'],$conn);
  $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $video_name);

  $vowels = array(" ", "&", "?", "/");
  $enurl = str_replace($vowels, '_', $entext1);

  

  $sql="UPDATE digisurf_package_categories SET category_name='".$entext1."', url='".$enurl."', video_url='".$video_url."' WHERE category_id='".$categoryid."' AND code='".$current_lang."' ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

  if($video_name != null) {
      $videofile_name = "/Assets/video/".$withoutExt;
      move_uploaded_file($video_tmp, getcwd()."/../../Assets/video/".$video_name);
      $sqlvideo="UPDATE digisurf_package_categories SET video_name='".$videofile_name."' WHERE category_id ='".$categoryid."' AND code='".$current_lang."'";
      $retvalvideo = mysql_query( $sqlvideo, $conn );
                   if(! $retvalvideo )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image1 != null) {
      $file_tmp1 =$_FILES['category_image1']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../uploads/".$image1);
      $filename = "/uploads/".$image1;
      $sql1="UPDATE digisurf_package_categories SET image1='".$filename."' WHERE category_id ='".$categoryid."' AND code='".$current_lang."'";
      $retval1 = mysql_query( $sql1, $conn );
                   if(! $retval1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

                       header("Refresh:0; url=/Admin/PackageCategories");
}


if(isset($_POST['delete_category'])){
  $categoryid = mysql_real_escape_string($_POST['category_id'],$conn);

        $sqlin = 'DELETE FROM digisurf_package_categories WHERE category_id ="'.$categoryid.'" ';
                 $retvalin = mysql_query( $sqlin, $conn );
                   if(! $retvalin )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }
                       


        $sqlreseten1 = "ALTER TABLE digisurf_package_categories DROP idx; ";
        $sqlreseten2 = "ALTER TABLE digisurf_package_categories AUTO_INCREMENT = 1; ";
        $sqlreseten3 = "ALTER TABLE digisurf_package_categories ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

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


        $sqlcategoryin = 'DELETE FROM digisurf_package_category_list WHERE category_id ="'.$categoryid.'" ';
                 $retvalcategoryin = mysql_query( $sqlcategoryin, $conn );
                   if(! $retvalcategoryin )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }
                       


        $sqlresetcategory1 = "ALTER TABLE digisurf_package_category_list DROP idx; ";
        $sqlresetcategory2 = "ALTER TABLE digisurf_package_category_list AUTO_INCREMENT = 1; ";
        $sqlresetcategory3 = "ALTER TABLE digisurf_package_category_list ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

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
                       header("Refresh:0; url=/Admin/PackageCategories");

}
?>