<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];


if(isset($_POST['page_submit'])){


	$entext1 = mysql_real_escape_string($_POST['content_text1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['content_text2'],$conn);
  $entext3 = mysql_real_escape_string($_POST['content_text3'],$conn);
  $entext4 = mysql_real_escape_string($_POST['content_text4'],$conn);
  $entext5 = mysql_real_escape_string($_POST['content_text5'],$conn);
  $entext6 = mysql_real_escape_string($_POST['content_text6'],$conn);
  $entext7 = mysql_real_escape_string($_POST['content_text7'],$conn);
  $entext8 = mysql_real_escape_string($_POST['content_text8'],$conn);
  $entext9 = mysql_real_escape_string($_POST['content_text9'],$conn);
  $entext10 = mysql_real_escape_string($_POST['content_text10'],$conn);


  //$image1 = $_FILES['48_image1']['name'];

 $sql="UPDATE digisurf_bodyrecords SET text1='".$entext1."', text2='".$entext2."', text3='".$entext3."', text4='".$entext4."', text5='".$entext5."', text6='".$entext6."', text7='".$entext7."', text8='".$entext8."', text9='".$entext9."', text10='".$entext10."' where code ='".$current_lang."' ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }
    

    // if($image1 != null) {
    //   $file_tmp1 =$_FILES['48_image1']['tmp_name'];
    //   move_uploaded_file($file_tmp1, getcwd()."/../../uploads/".$image1);
    //   $filename = "/uploads/".$image1;
    //   $sql1="UPDATE digisurf_48 SET image1='".$filename."' where code ='".$current_lang."' ";
    //   $retval1 = mysql_query( $sql1, $conn );
    //                if(! $retval1 )
    //                    {
    //                       die('Could not enter image: ' . mysql_error());
    //                    }
    // }

    

                       header("Refresh:0; url=/Admin/Body_Records");
}


?>