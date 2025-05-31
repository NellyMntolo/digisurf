<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];


if(isset($_POST['page_submit'])){


	$entext1 = mysql_real_escape_string($_POST['general_entext1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['general_entext2'],$conn);
  $entext3 = mysql_real_escape_string($_POST['general_entext3'],$conn);

  $entext4 = $_POST['content_entext1'];
  $entext5 = mysql_real_escape_string($_POST['content_entext2'],$conn);
  $entext6 = mysql_real_escape_string($_POST['content_entext3'],$conn);
  $entext7 = mysql_real_escape_string($_POST['content_entext4'],$conn);
  $entext8 = mysql_real_escape_string($_POST['content_entext5'],$conn);

  $image1 = $_FILES['package_image1']['name'];
  $image2 = $_FILES['package_image2']['name'];
  $image3 = $_FILES['package_image3']['name'];
  $image4 = $_FILES['package_image4']['name'];
  $image5 = $_FILES['package_image5']['name'];

 $sql="UPDATE digisurf_all_package SET text1='".$entext1."', text2='".$entext2."', text3='".$entext3."', text4='".$entext4."', text5='".$entext5."', text6='".$entext6."', text7='".$entext7."', text8='".$entext8."' where code ='".$current_lang."' ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }
    

    if($image1 != null) {
      $file_tmp1 =$_FILES['package_image1']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../uploads/".$image1);
      $filename = "/uploads/".$image1;
      $sql1="UPDATE digisurf_all_package SET image1='".$filename."' where code ='".$current_lang."' ";
      $retval1 = mysql_query( $sql1, $conn );
                   if(! $retval1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image2 != null) {
      $file_tmp2 =$_FILES['package_image2']['tmp_name'];
      move_uploaded_file($file_tmp2, getcwd()."/../../uploads/".$image2);
      $filename = "/uploads/".$image2;
      $sql2="UPDATE digisurf_all_package SET image2='".$filename."' where code ='".$current_lang."' ";
      $retval2 = mysql_query( $sql2, $conn );
                   if(! $retval2 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }


    if($image3 != null) {
      $file_tmp3 =$_FILES['package_image3']['tmp_name'];
      move_uploaded_file($file_tmp3, getcwd()."/../../uploads/".$image3);
      $filename = "/uploads/".$image3;
      $sql3="UPDATE digisurf_all_package SET image3='".$filename."' where code ='".$current_lang."' ";
      $retval3 = mysql_query( $sql3, $conn );
                   if(! $retval3 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image4 != null) {
      $file_tmp4 =$_FILES['package_image4']['tmp_name'];
      move_uploaded_file($file_tmp4, getcwd()."/../../uploads/".$image4);
      $filename = "/uploads/".$image4;
      $sql4="UPDATE digisurf_all_package SET image4='".$filename."' where code ='".$current_lang."' ";
      $retval4 = mysql_query( $sql4, $conn );
                   if(! $retval4 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image5 != null) {
      $file_tmp5 =$_FILES['package_image5']['tmp_name'];
      move_uploaded_file($file_tmp5, getcwd()."/../../uploads/".$image5);
      $filename = "/uploads/".$image5;
      $sql5="UPDATE digisurf_all_package SET image5='".$filename."' where code ='".$current_lang."' ";
      $retval5 = mysql_query( $sql5, $conn );
                   if(! $retval5 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

                       header("Refresh:0; url=/Admin/Package");
}


?>