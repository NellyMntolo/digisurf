<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();

$user_id = $_SESSION['chat'];
if(isset($_POST['page_submit'])){


  $entext1 = mysql_real_escape_string($_POST['text1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['text2'],$conn);
  $entext3 = mysql_real_escape_string($_POST['text3'],$conn);
  $entext4 = mysql_real_escape_string($_POST['text4'],$conn);
  $entext5 = mysql_real_escape_string($_POST['text5'],$conn);

$image1 = $_FILES['profileimage']['name'];
$uploaded_image1 = '';
$image2 = $_FILES['login_image']['name'];

if($image1 != null) {
    $file_tmp =$_FILES['profileimage']['tmp_name'];
      move_uploaded_file($file_tmp, getcwd()."/../../uploads/".$image1);
    $uploaded_image1 = "/uploads/".$image1;
      $sql1="UPDATE think_master SET image1='".$uploaded_image1."' WHERE idx ='".$user_id."' ";
      $retval1 = mysql_query( $sql1, $conn );
                   if(! $retval1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
      $sql2="UPDATE message SET image='".$uploaded_image1."' WHERE header_id ='".$user_id."' ";
      $retval2 = mysql_query( $sql2, $conn );
                   if(! $retval2 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
  }

  if($image2 != null) {
    $file_tmp =$_FILES['login_image']['tmp_name'];
      move_uploaded_file($file_tmp, getcwd()."/../../uploads/".$image2);
    $uploaded_image2 = "/uploads/".$image2;
      $sql1="UPDATE dashboard SET image1='".$uploaded_image2."'";
      $retval1 = mysql_query( $sql1, $conn );
                   if(! $retval1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
  }


 $sql="UPDATE think_master SET firstname='".$entext1."', lastname='".$entext2."', jobtitle='".$entext3."', dob='".$entext4."', user_p='".$entext5."' WHERE idx ='".$user_id."' ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }



                        $new_language = mysql_real_escape_string($_POST['new_language'],$conn);

                        if ($new_language != null) {               

                        $sqlexisting_language = 'select code from digisurf_index where code="'.$new_language.'" ';
                        $retvalexisting_language = mysql_query( $sqlexisting_language, $conn );                 
                             if(! $retvalexisting_language )
                             {
                                die('Could not get data1: ' . mysql_error());
                             }                        


                        $rowexisting_language = mysql_fetch_array($retvalexisting_language, MYSQL_ASSOC);
                        $existing_code = $rowexisting_language['code'];                        
                        
                        if($existing_code != null) {
                          //echo "...";
                        } else {
                          echo "This function requires a payment.<br><br> Please consult the engineer. <br><br>This page will go back in 30 seconds.<br><br>You can remove unwanted languages using the red button next to them.";


                      }
                    }


                        $default_active = 'yes';
                        $default_language = mysql_real_escape_string($_POST['default_language'],$conn);

                        if($default_language != null){


                          $sqldef="UPDATE lang SET default_lang = NULL ";              
                          $retvaldef = mysql_query( $sqldef, $conn );
                          if(! $retvaldef )
                             {
                                die('Could not enter data: ' . mysql_error());
                             }

                          $sqldefault="UPDATE lang SET default_lang='".$default_language."', active_lang='".$default_active."' WHERE code ='".$default_language."' ";              
                          $retvaldefault = mysql_query( $sqldefault, $conn );
                          if(! $retvaldefault )
                             {
                                die('Could not enter data: ' . mysql_error());
                             }
                           }

                       header("Refresh:0; url=/Admin/Profile");
}




if(isset($_GET['remove_lang'])){
                          $remove_id = mysql_real_escape_string($_GET['remove_lang'],$conn);
                          $remove_language = 'no';
                          $sqlremove="UPDATE lang SET status='".$remove_language."' WHERE idx ='".$remove_id."' ";              
                          $retvalremove = mysql_query( $sqlremove, $conn );
                          if(! $retvalremove )
                             {
                                die('Could not enter data: ' . mysql_error());
                             }

                          header("Refresh:0; url=/Admin/Profile");
  }

if(isset($_GET['deactivate_lang'])){
                          $deactivate_id = mysql_real_escape_string($_GET['deactivate_lang'],$conn);
                          $deactivate_language = 'no';
                          $sql_deactivate="UPDATE lang SET active_lang='".$deactivate_language."' WHERE idx ='".$deactivate_id."' ";              
                          $retval_deactivate = mysql_query( $sql_deactivate, $conn );
                          if(! $retval_deactivate )
                             {
                                die('Could not enter data: ' . mysql_error());
                             }

                          header("Refresh:0; url=/Admin/Profile");
  }

?>