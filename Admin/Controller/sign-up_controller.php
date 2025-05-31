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

  $entext5 = mysql_real_escape_string($_POST['content_entext1'],$conn);
  $entext6 = mysql_real_escape_string($_POST['content_entext2'],$conn);
  $entext7 = mysql_real_escape_string($_POST['content_entext3'],$conn);
  $entext8 = mysql_real_escape_string($_POST['content_entext4'],$conn);
  $entext9 = mysql_real_escape_string($_POST['content_entext5'],$conn);
  $entext10 = mysql_real_escape_string($_POST['content_entext6'],$conn);
  $entext11 = mysql_real_escape_string($_POST['content_entext7'],$conn);
  $entext12 = mysql_real_escape_string($_POST['content_entext8'],$conn);
  $entext13 = mysql_real_escape_string($_POST['content_entext9'],$conn);
  $entext14 = mysql_real_escape_string($_POST['content_entext10'],$conn);
  $entext15 = mysql_real_escape_string($_POST['content_entext11'],$conn);
  $entext16 = mysql_real_escape_string($_POST['content_entext12'],$conn);
  $entext17 = mysql_real_escape_string($_POST['content_entext13'],$conn);
  $entext18 = mysql_real_escape_string($_POST['content_entext14'],$conn);


  $image1 = $_FILES['log-in_image1']['name'];

 $sql="UPDATE digisurf_signup SET text1='".$entext1."', text2='".$entext2."', text3='".$entext3."', text4='".$entext4."', text5='".$entext5."', text6='".$entext6."', text7='".$entext7."', text8='".$entext8."', text9='".$entext9."', text10='".$entext10."', text11='".$entext11."', text12='".$entext12."', text13='".$entext13."', text14='".$entext14."', text15='".$entext15."', text16='".$entext16."', text17='".$entext17."', text18='".$entext18."' where code ='".$current_lang."' ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }





  if($image1 != null) {
      $file_tmp1 =$_FILES['log-in_image1']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../uploads/".$image1);
      $filename = "/uploads/".$image1;
      $sql1="UPDATE digisurf_signup SET image1='".$filename."' ";//where code ='".$current_lang."'
      $retval1 = mysql_query( $sql1, $conn );
                   if(! $retval1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    header("Refresh:0; url=/Admin/Sign-up");
    
}


?>