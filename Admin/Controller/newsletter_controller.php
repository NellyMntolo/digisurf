<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];


if(isset($_POST['page_submit'])){


	$entext1 = mysql_real_escape_string($_POST['newsletter_info'],$conn);
  $entext2 = mysql_real_escape_string($_POST['newsletter_url'],$conn);
  $entext3 = mysql_real_escape_string($_POST['newsletter_slogan'],$conn);
  // $entext4 = mysql_real_escape_string($_POST['general_entext4'],$conn);

  $image1 = $_FILES['newsletter_image1']['name'];

  // $max_newsletter = 'SELECT newsletter_id FROM digisurf_newsletter WHERE code="'.$current_lang.'" ORDER BY newsletter_id DESC';
  // $retvalmax_newsletter = mysql_query( $max_newsletter, $conn );                 
  //                            if(! $retvalmax_newsletter )
  //                            {
  //                               die('Could not get newsletter data: ' . mysql_error());
  //                            }
  // $rowmax_newsletter = mysql_fetch_array($retvalmax_newsletter, MYSQL_ASSOC);
  // $large_newsletter = $rowmax_newsletter['newsletter_id'];

  // $thenewsletter = '';
  // if($newsletterid != null){
  //     $thenewsletter = $newsletterid;
  // } else {
  //   $thenewsletter = $large_newsletter+1;
  // }

 $sql="UPDATE digisurf_newsletter SET newsletter_info='".$entext1."', newsletter_url='".$entext2."', newsletter_slogan='".$entext3."' where code ='".$current_lang."' ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }
    
    if($image1 != null) {
      $file_tmp1 =$_FILES['newsletter_image1']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../uploads/".$image1);
      $filename = "/uploads/".$image1;
      $sql1="UPDATE digisurf_newsletter SET image1='".$filename."' where code ='".$current_lang."' ";
      $retval1 = mysql_query( $sql1, $conn );
                   if(! $retval1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

                       header("Refresh:0; url=/Admin/Newsletter/");
}

?>