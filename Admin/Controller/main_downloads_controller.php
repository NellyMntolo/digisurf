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
  $passcode = mysql_real_escape_string($_POST['content_entext1'],$conn);
  $image1 = $_FILES['download_image1']['name'];

 $sql="UPDATE digisurf_downloads_en SET text1='".$entext1."', text2='".$entext2."', text3='".$entext3."', text4='".$entext4."' where code ='".$current_lang."' ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }
$sql_passcode="UPDATE digisurf_downloads_en SET passcode='".$passcode."' ";              
                   $retval_passcode = mysql_query( $sql_passcode, $conn );
                   if(! $retval_passcode )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }


if($image1 != null) {
      $file_tmp1 =$_FILES['download_image1']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../uploads/".$image1);
      $filename = "/uploads/".$image1;
      $sql1="UPDATE digisurf_downloads_en SET image1='".$filename."' where code ='".$current_lang."' ";
      $retval1 = mysql_query( $sql1, $conn );
                   if(! $retval1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }
    
                      header("Refresh:0; url=/Admin/Downloads");
}


if(isset($_POST['add_download'])){

      $realname = $_FILES['download_file']['name'];
      $file_name = explode(".",$_FILES['download_file']['name']);
      $newfilename = round(microtime(true)) . '.' . end($file_name);
      $file_tmp =$_FILES['download_file']['tmp_name'];
      $file_type=$_FILES['download_file']['type'];


  if($realname != null) {
      $file_tmp1 = $_FILES['download_file']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../Downloads/".$newfilename);

      $sqlb = 'INSERT INTO green_downloads (text1, text2, text3) VALUES ( "'.$realname.'", "'.date("y/m/d").'", "'.$newfilename.'")';

  $retvalb = mysql_query( $sqlb, $conn );
    if(! $retvalb ) {  
        die('Could not enter data: ' . mysql_error());
      }
                      header("Refresh:0; url=/Admin/Downloads");

    } else {
      header("Refresh:0; url=/Admin/Downloads");
    }

  
}



if(isset($_POST['edit_download'])){

  $downloadid = mysql_real_escape_string($_POST['download_id'],$conn);

  $realname = $_FILES['download_file']['name'];
      $file_name = explode(".",$_FILES['download_file']['name']);
      $newfilename = round(microtime(true)) . '.' . end($file_name);
      $file_tmp =$_FILES['download_file']['tmp_name'];
      $file_type=$_FILES['download_file']['type'];


  if($realname != null) {
      $file_tmp1 = $_FILES['download_file']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../Downloads/".$newfilename);


      $sql="UPDATE green_downloads SET text1='".$realname."', text2='".date("y/m/d")."', text3='".$newfilename."' WHERE idx='".$downloadid."' LIMIT 1";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }    

          header("Refresh:0; url=/Admin/Downloads");

    } else {
      header("Refresh:0; url=/Admin/Downloads");
    }   

}


if(isset($_POST['delete_download'])){
  $download_id = mysql_real_escape_string($_POST['download_id'],$conn);

        $sqlin = 'DELETE FROM green_downloads WHERE idx ="'.$download_id.'" LIMIT 1';
                 $retvalin = mysql_query( $sqlin, $conn );
                   if(! $retvalin )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }                       


        $sqlreseten1 = "ALTER TABLE green_downloads DROP idx; ";
        $sqlreseten2 = "ALTER TABLE green_downloads AUTO_INCREMENT = 1; ";
        $sqlreseten3 = "ALTER TABLE green_downloads ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

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
header("Refresh:0; url=/Admin/Downloads");
}




if(isset($_POST['add_video'])){
      $video = mysql_real_escape_string($_POST['video_url'],$conn);
      $videoname = mysql_real_escape_string($_POST['video_name'],$conn);

      $sqlb = 'INSERT INTO green_videos (text1, text2) VALUES ( "'.$video.'", "'.$videoname.'")';

      $retvalb = mysql_query( $sqlb, $conn );
        if(! $retvalb ) {  
            die('Could not enter data: ' . mysql_error());
          }
                      header("Refresh:0; url=/Admin/Downloads");
}


if(isset($_POST['delete_video'])){
  $video_id = mysql_real_escape_string($_POST['video_id'],$conn);

        $sqlin = 'DELETE FROM green_videos WHERE idx ="'.$video_id.'" LIMIT 1';
                 $retvalin = mysql_query( $sqlin, $conn );
                   if(! $retvalin )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }                       


        $sqlreseten1 = "ALTER TABLE green_videos DROP idx; ";
        $sqlreseten2 = "ALTER TABLE green_videos AUTO_INCREMENT = 1; ";
        $sqlreseten3 = "ALTER TABLE green_videos ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

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
header("Refresh:0; url=/Admin/Downloads");
}



?>