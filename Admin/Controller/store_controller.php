<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];
error_reporting(E_ALL);

if(isset($_POST['add_store'])){


  $entext1 = mysql_real_escape_string($_POST['content_entext1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['content_entext2'],$conn);
  $entext3 = mysql_real_escape_string($_POST['content_entext3'],$conn);
  $entext4 = mysql_real_escape_string($_POST['content_entext4'],$conn);
  $entext5 = mysql_real_escape_string($_POST['content_entext5'],$conn);
  $entext6 = mysql_real_escape_string($_POST['content_entext6'],$conn);

  // $image1 = $_FILES['content_image1']['name'];
  // $uploaded_image1 = '';

  // if($image1 != null) {
  //   $file_tmp =$_FILES['content_image1']['tmp_name'];
  //     move_uploaded_file($file_tmp, getcwd()."/../../uploads/".$image1);
  //   $uploaded_image1 = "/uploads/".$image1;
  // }
 // store_image1, "'.$uploaded_image1.'"

  $vowels = array(" ", "&", "?", "/", ";");
  $enurl = str_replace($vowels, '_', $entext1);

  $sqla = 'INSERT INTO digisurf_stores (store_id, store_name, store_address, store_lat, store_lng, store_type, store_url) VALUES ( "'.$entext1.'", "'.$entext2.'", "'.$entext3.'", "'.$entext4.'", "'.$entext5.'", "'.$entext6.'", "'.$enurl.'")';

  $retvala = mysql_query( $sqla, $conn );
    if(! $retvala ) {  
        die('Could not enter data: ' . mysql_error());
      }

      header("Refresh:0; url=/Admin/Stores/");
  }

if(isset($_POST['delete_store'])){
  $storeid = mysql_real_escape_string($_POST['delete_store'],$conn);

        $sqlin = 'DELETE FROM digisurf_stores WHERE idx ="'.$storeid.'" LIMIT 1';
                 $retvalin = mysql_query( $sqlin, $conn );
                   if(! $retvalin )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }
                       
        $sqlreseten1 = "ALTER TABLE digisurf_stores DROP idx; ";
        $sqlreseten2 = "ALTER TABLE digisurf_stores AUTO_INCREMENT = 1; ";
        $sqlreseten3 = "ALTER TABLE digisurf_stores ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

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

                       header("Refresh:0; url=/Admin/Stores");

}
?>