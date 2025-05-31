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
  $entext11 = mysql_real_escape_string($_POST['content_text11'],$conn);
  $entext12 = mysql_real_escape_string($_POST['content_text12'],$conn);
  $entext13 = mysql_real_escape_string($_POST['content_text13'],$conn);
  $entext14 = mysql_real_escape_string($_POST['content_text14'],$conn);


 $sql="UPDATE digisurf_footer SET text1='".$entext1."', text2='".$entext2."', text3='".$entext3."', text4='".$entext4."', text5='".$entext5."', text6='".$entext6."', text7='".$entext7."', text8='".$entext8."', text9='".$entext9."', text10='".$entext10."', text11='".$entext11."', text12='".$entext12."', text13='".$entext13."', text14='".$entext14."' where code ='".$current_lang."' ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }



                       header("Refresh:0; url=/Admin/Footer");
}


if(isset($_POST['add_social'])){

$uploaded_image = '';

  $socialtext1 = mysql_real_escape_string($_POST['content_text4'],$conn);
  $socialtext2 = mysql_real_escape_string($_POST['content_text5'],$conn);
  $image = $_FILES['social_image']['name'];

if($image != null) {
    $file_tmp =$_FILES['social_image']['tmp_name'];
      move_uploaded_file($file_tmp, getcwd()."/../../uploads/".$image);
    $uploaded_image = "/uploads/".$image;
  }

if($socialtext1 != null){
  $sqlb = 'INSERT INTO digisurf_social (text1, text2, image1) VALUES ( "'.$socialtext1.'", "'.$socialtext2.'", "'.$uploaded_image.'")';

  $retvalb = mysql_query( $sqlb, $conn );
    if(! $retvalb ) {  
        die('Could not enter data: ' . mysql_error());
      }
   }                    header("Refresh:0; url=/Admin/Footer");
}


if(isset($_POST['edit_social'])){

  $socialid = mysql_real_escape_string($_POST['social_id'],$conn);

  $socialtext1 = mysql_real_escape_string($_POST['content_text4'],$conn);
  $socialtext2 = mysql_real_escape_string($_POST['content_text5'],$conn);
  $image1 = $_FILES['social_image']['name'];


   $sql="UPDATE digisurf_social SET text1='".$socialtext1."', text2='".$socialtext2."' WHERE idx='".$socialid."' LIMIT 1";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }    


if($image1 != null) {
      $file_tmp1 =$_FILES['social_image']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../uploads/".$image1);
      $filename = "/uploads/".$image1;
      $sql1="UPDATE digisurf_social SET image1='".$filename."' WHERE idx ='".$socialid."'";
      $retval1 = mysql_query( $sql1, $conn );
                   if(! $retval1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }     
    }   


   header("Refresh:0; url=/Admin/Footer");
}


if(isset($_POST['delete_social'])){
  $social_id = mysql_real_escape_string($_POST['social_id'],$conn);

        $sqlin = 'DELETE FROM digisurf_social WHERE idx ="'.$social_id.'" LIMIT 1';
                 $retvalin = mysql_query( $sqlin, $conn );
                   if(! $retvalin )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }                       


        $sqlreseten1 = "ALTER TABLE digisurf_social DROP idx; ";
        $sqlreseten2 = "ALTER TABLE digisurf_social AUTO_INCREMENT = 1; ";
        $sqlreseten3 = "ALTER TABLE digisurf_social ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

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
header("Refresh:0; url=/Admin/Footer");
}


?>