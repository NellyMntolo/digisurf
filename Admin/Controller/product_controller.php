<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];


if(isset($_POST['page_submit'])){

  $entext1 = mysql_real_escape_string($_POST['content_entext1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['content_entext2'],$conn);
  $entext3 = mysql_real_escape_string($_POST['content_entext3'],$conn);
  $entext4 = $_POST['content_entext4'];
  $entext5 = mysql_real_escape_string($_POST['content_entext5'],$conn);
  $entext6 = mysql_real_escape_string($_POST['content_entext6'],$conn);

  $image1 = $_FILES['product_image1']['name'];
  $image2 = $_FILES['product_image2']['name'];

 $sql="UPDATE digisurf_all_product SET text1='".$entext1."', text2='".$entext2."', text3='".$entext3."', text4='".$entext4."', text5='".$entext5."', text6='".$entext6."' where code ='".$current_lang."' ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

  if($image1 != null) {
      $file_tmp1 =$_FILES['product_image1']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../uploads/".$image1);
      $filename = "/uploads/".$image1;
      $sql1="UPDATE digisurf_all_product SET image1='".$filename."' where code ='".$current_lang."' ";
      $retval1 = mysql_query( $sql1, $conn );
                   if(! $retval1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image2 != null) {
      $file_tmp2 =$_FILES['product_image2']['tmp_name'];
      move_uploaded_file($file_tmp2, getcwd()."/../../uploads/".$image2);
      $filename = "/uploads/".$image2;
      $sql2="UPDATE digisurf_all_product SET image2='".$filename."' where code ='".$current_lang."' ";
      $retval2 = mysql_query( $sql2, $conn );
                   if(! $retval2 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    header("Refresh:0; url=/Admin/Product/");
    
}


?>