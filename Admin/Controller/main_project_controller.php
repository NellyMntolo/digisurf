<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();


if(isset($_POST['page_submit'])){

	$zhtext1 = mysql_real_escape_string($_POST['general_zhtext1'],$conn);
  $zhtext2 = mysql_real_escape_string($_POST['general_zhtext2'],$conn);
  $zhtext3 = mysql_real_escape_string($_POST['general_zhtext3'],$conn);
  $zhtext4 = mysql_real_escape_string($_POST['general_zhtext4'],$conn);


	$entext1 = mysql_real_escape_string($_POST['general_entext1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['general_entext2'],$conn);
  $entext3 = mysql_real_escape_string($_POST['general_entext3'],$conn);
  $entext4 = mysql_real_escape_string($_POST['general_entext4'],$conn);


 $sql="UPDATE green_case_en SET text1='".$entext1."', text2='".$entext2."', text3='".$entext3."', text4='".$entext4."' ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

 $sqlzh="UPDATE green_case_zh SET text1='".$zhtext1."', text2='".$zhtext2."', text3='".$zhtext3."', text4='".$zhtext4."' ";              
                   $retvalzh = mysql_query( $sqlzh, $conn );
                   if(! $retvalzh )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }
/*
    if($image1 != null) {
      $file_tmp1 =$_FILES['main_project_image1']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../uploads/".$image1);
      $filename = "/uploads/".$image1;
      $sql1="UPDATE think_main_project_en SET image1='".$filename."'";
      $retval1 = mysql_query( $sql1, $conn );
                   if(! $retval1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
      $sql2="UPDATE think_main_project_zh SET image1='".$filename."'";
      $retval2 = mysql_query( $sql2, $conn );
                   if(! $retval2 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }*/

                      header("Refresh:0; url=/Admin/Case_Studies/");
}


?>