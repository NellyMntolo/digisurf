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

  //$entext5 = $_POST['content_entext1'];
  //$entext6 = mysql_real_escape_string($_POST['content_entext2'],$conn);

  $entext7 = mysql_real_escape_string($_POST['content_entext1'],$conn);
  $entext8 = mysql_real_escape_string($_POST['content_entext2'],$conn);
  //$entext9 = mysql_real_escape_string($_POST['content_entext5'],$conn);
  //$entext10 = $_POST['content_entext6'];

  $image1 = $_FILES['about_image1']['name'];
  $image2 = $_FILES['about_image2']['name'];
  $image3 = $_FILES['about_image3']['name'];
  $image4 = $_FILES['about_image4']['name'];


  $video_name = $_FILES['video_name']['name'];
  $video_tmp = $_FILES['video_name']['tmp_name'];
  $video_url = mysql_real_escape_string($_POST['video_url'],$conn);

  $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $video_name);

  $videofile_name = "/assets/video/".$withoutExt;
  move_uploaded_file($video_tmp, getcwd()."/../../assets/video/".$video_name);

 $sql="UPDATE digisurf_about SET text1='".$entext1."', text2='".$entext2."', text3='".$entext3."', text4='".$entext4."', text7='".$entext7."', text8='".$entext8."' where code ='".$current_lang."' ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }
    

    if($video_name != null) {
      $videofile_name = "/assets/video/".$withoutExt;
      move_uploaded_file($video_tmp, getcwd()."/../../assets/video/".$video_name);
      $sqlvideo_name1="UPDATE digisurf_about SET text5='".$videofile_name."', text6='".$video_url."' where code ='".$current_lang."' ";
      $retvalvideo_name1 = mysql_query( $sqlvideo_name1, $conn );
                   if(! $retvalvideo_name1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($video_url != null) {
      $sqlvideo_name1="UPDATE digisurf_about SET text6='".$video_url."' where code ='".$current_lang."' ";
      $retvalvideo_name1 = mysql_query( $sqlvideo_name1, $conn );
                   if(! $retvalvideo_name1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image1 != null) {
      $file_tmp1 =$_FILES['about_image1']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../uploads/".$image1);
      $filename = "/uploads/".$image1;
      $sql1="UPDATE digisurf_about SET image1='".$filename."' where code ='".$current_lang."' ";
      $retval1 = mysql_query( $sql1, $conn );
                   if(! $retval1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image2 != null) {
      $file_tmp2 =$_FILES['about_image2']['tmp_name'];
      move_uploaded_file($file_tmp2, getcwd()."/../../uploads/".$image2);
      $filename = "/uploads/".$image2;
      $sql2="UPDATE digisurf_about SET image2='".$filename."' where code ='".$current_lang."' ";
      $retval2 = mysql_query( $sql2, $conn );
                   if(! $retval2 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image3 != null) {
      $file_tmp3 =$_FILES['about_image3']['tmp_name'];
      move_uploaded_file($file_tmp3, getcwd()."/../../uploads/".$image3);
      $filename = "/uploads/".$image3;
      $sql3="UPDATE digisurf_about SET image3='".$filename."' where code ='".$current_lang."' ";
      $retval3 = mysql_query( $sql3, $conn );
                   if(! $retval3 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }


    if($image4 != null) {
      $file_tmp4 =$_FILES['about_image4']['tmp_name'];
      move_uploaded_file($file_tmp4, getcwd()."/../../uploads/".$image4);
      $filename = "/uploads/".$image4;
      $sql4="UPDATE digisurf_about SET image4='".$filename."' where code ='".$current_lang."' ";
      $retval4 = mysql_query( $sql4, $conn );
                   if(! $retval4 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

                       header("Refresh:0; url=/Admin/About");
}



if(isset($_POST['add_special'])){
  $add_special_id = mysql_real_escape_string($_POST['add_special_id'],$conn);


  $entext1 = mysql_real_escape_string($_POST['content_text1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['content_text2'],$conn);

  $image1 = $_FILES['add_special_image1']['name'];
  $uploaded_image1 = '';

  if($image1 != null) {
    $file_tmp =$_FILES['add_special_image1']['tmp_name'];
      move_uploaded_file($file_tmp, getcwd()."/../../uploads/".$image1);
    $uploaded_image1 = "/uploads/".$image1;
  }

  $sqla = 'INSERT INTO about_sliders (text1, text2, image1) VALUES ("'.$entext1.'", "'.$entext2.'", "'.$uploaded_image1.'")';

  $retvala = mysql_query( $sqla, $conn );
    if(! $retvala ) {  
        die('Could not enter data: ' . mysql_error());
      }



      header('Location: ' . $_SERVER['HTTP_REFERER']);

}


if(isset($_POST['edit_special'])){

  $edit_special_id = mysql_real_escape_string($_POST['edit_special_id'],$conn);


  $zhtext1 = mysql_real_escape_string($_POST['content_text1'],$conn);
  $zhtext2 = mysql_real_escape_string($_POST['content_text2'],$conn);

  $image1 = $_FILES['edit_special_image1']['name'];

  if($image1 != null) {
      $file_tmp1 =$_FILES['edit_special_image1']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../uploads/".$image1);
      $filename = "/uploads/".$image1;
      $sql2="UPDATE about_sliders SET image1='".$filename."' WHERE idx ='".$edit_special_id."'";
      $retval2 = mysql_query( $sql2, $conn );
                   if(! $retval2 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

 $sqlzh="UPDATE about_sliders SET text1='".$zhtext1."', text2='".$zhtext2."' WHERE idx='".$edit_special_id."' LIMIT 1 ";              
                   $retvalzh = mysql_query( $sqlzh, $conn );
                   if(! $retvalzh )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }
header('Location: ' . $_SERVER['HTTP_REFERER']);


  }


  if(isset($_POST['delete_special'])){
  $delete_special_id = mysql_real_escape_string($_POST['delete_special_id'],$conn);

        $sqlin = 'DELETE FROM about_sliders WHERE idx ="'.$delete_special_id.'" LIMIT 1';
                 $retvalin = mysql_query( $sqlin, $conn );
                   if(! $retvalin )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }
                       


        $sqlreseten1 = "ALTER TABLE about_sliders DROP idx; ";
        $sqlreseten2 = "ALTER TABLE about_sliders AUTO_INCREMENT = 1; ";
        $sqlreseten3 = "ALTER TABLE about_sliders ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

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

                       header('Location: ' . $_SERVER['HTTP_REFERER']);

}



if(isset($_POST['add_location'])){

  $max = 'SELECT sortable_order FROM about_steps ORDER BY sortable_order DESC';
  $retvalmaxen = mysql_query( $max, $conn );                 
                             if(! $retvalmaxen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
  $rowmaxen = mysql_fetch_array($retvalmaxen, MYSQL_ASSOC);
  $large = $rowmaxen['sortable_order'];


  $entext1 = mysql_real_escape_string($_POST['location_entext1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['location_entext2'],$conn);

  $image1 = $_FILES['location_image1']['name'];
  $uploaded_image1 = '';

  if($image1 != null) {
    $file_tmp =$_FILES['location_image1']['tmp_name'];
      move_uploaded_file($file_tmp, getcwd()."/../../uploads/".$image1);
    $uploaded_image1 = "/uploads/".$image1;
  }


  $sqla = 'INSERT INTO about_steps (text1, text2, image1, sortable_order) VALUES ( "'.$entext1.'", "'.$entext2.'", "'.$uploaded_image1.'", "'.$large.'"+1)';

  $retvala = mysql_query( $sqla, $conn );
    if(! $retvala ) {  
        die('Could not enter data: ' . mysql_error());
      }

      header("Refresh:0; url=/Admin/About/");
  }



if(isset($_POST['edit_location'])){
  $locationid = mysql_real_escape_string($_POST['location_id'],$conn);

  $entext1 = mysql_real_escape_string($_POST['location_entext1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['location_entext2'],$conn);
  $image1 = $_FILES['location_image1']['name'];

 $sql="UPDATE about_steps SET text1='".$entext1."', text2='".$entext2."' WHERE idx = '".$locationid."' LIMIT 1 ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

  if($image1 != null) {
      $file_tmp1 =$_FILES['location_image1']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../uploads/".$image1);
      $filename = "/uploads/".$image1;
      $sql1="UPDATE about_steps SET image1='".$filename."' WHERE idx ='".$locationid."'";
      $retval1 = mysql_query( $sql1, $conn );
                   if(! $retval1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }
                       header("Refresh:0; url=/Admin/About/");
}

if(isset($_POST['delete_location'])){
  $locationid = mysql_real_escape_string($_POST['location_id'],$conn);

  $strap = 'SELECT sortable_order FROM about_steps WHERE idx = "'.$locationid.'" LIMIT 1';
  $retvalstrapen = mysql_query( $strap, $conn );                 
                             if(! $retvalstrapen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
  $rowstrapen = mysql_fetch_array($retvalstrapen, MYSQL_ASSOC);
  $returnstrap = $rowstrapen['sortable_order'];


        $sqlin = 'DELETE FROM about_steps WHERE idx ="'.$locationid.'" LIMIT 1';
                 $retvalin = mysql_query( $sqlin, $conn );
                   if(! $retvalin )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }
                       


        $sqlreseten1 = "ALTER TABLE about_steps DROP idx; ";
        $sqlreseten2 = "ALTER TABLE about_steps AUTO_INCREMENT = 1; ";
        $sqlreseten3 = "ALTER TABLE about_steps ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

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

                       $sqlen="UPDATE about_steps SET sortable_order= sortable_order-1  WHERE sortable_order >'".$returnstrap."' ";              
                       $retvalen = mysql_query( $sqlen, $conn );
                       if(! $retvalen )
                           {
                              die('Could not enter data: ' . mysql_error());
                           }

                       header("Refresh:0; url=/Admin/About/");

}

?>