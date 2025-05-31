<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];


if(isset($_POST['page_submit'])){

	$entext1 = mysql_real_escape_string($_POST['general_entext1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['general_entext2'],$conn);
  $entext3 = mysql_real_escape_string($_POST['general_entext3'],$conn);
  $entext4 = mysql_real_escape_string($_POST['general_entext4'],$conn);

  //$image1 = $_FILES['booking_image1']['name'];

 $sql="UPDATE digisurf_booking SET text1='".$entext1."', text2='".$entext2."', text3='".$entext3."', text4='".$entext4."' where code ='".$current_lang."' ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

    // if($image1 != null) {
    //   $file_tmp1 =$_FILES['booking_image1']['tmp_name'];
    //   move_uploaded_file($file_tmp1, getcwd()."/../../uploads/".$image1);
    //   $filename = "/uploads/".$image1;
    //   $sql1="UPDATE digisurf_booking SET image1='".$filename."' where code ='".$current_lang."' ";
    //   $retval1 = mysql_query( $sql1, $conn );
    //                if(! $retval1 )
    //                    {
    //                       die('Could not enter image: ' . mysql_error());
    //                    }
    // }
                       header("Refresh:0; url=/Admin/Scheduling/");
}



?>