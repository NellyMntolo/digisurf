<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();

$current_lang = $_SESSION['lang'];
if(isset($_POST['page_submit'])){

  $entext1 = mysql_real_escape_string($_POST['content_entext1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['content_entext2'],$conn);
  $entext3 = mysql_real_escape_string($_POST['content_entext3'],$conn);
  $entext4 = mysql_real_escape_string($_POST['content_entext4'],$conn);
  $entext5 = mysql_real_escape_string($_POST['content_entext5'],$conn);
  $entext6 = mysql_real_escape_string($_POST['content_entext6'],$conn);
  $entext7 = mysql_real_escape_string($_POST['content_entext7'],$conn);
  $entext8 = mysql_real_escape_string($_POST['content_entext8'],$conn);
  $entext9 = mysql_real_escape_string($_POST['content_entext9'],$conn);


 $sql="UPDATE digisurf_menu SET text1='".$entext1."', text2='".$entext2."', text3='".$entext3."', text4='".$entext4."', text5='".$entext5."', text6='".$entext6."', text7='".$entext7."', text8='".$entext8."', text9='".$entext9."' where code ='".$current_lang."'";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

                       header("Refresh:0; url=/Admin/Menu");
                       //header('Location: ' . $_SERVER['HTTP_REFERER']);
}


?>