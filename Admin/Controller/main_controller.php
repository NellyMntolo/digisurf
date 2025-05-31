<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];

if(isset($_POST['page_submit'])){

	$entext1 = mysql_real_escape_string($_POST['general_entext1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['general_entext2'],$conn);
  $entext3 = mysql_real_escape_string($_POST['general_entext3'],$conn);

  $entext4 = mysql_real_escape_string($_POST['content_entext4'],$conn);
  $entext5 = mysql_real_escape_string($_POST['content_entext5'],$conn);
  $entext6 = mysql_real_escape_string($_POST['content_entext6'],$conn);
  $entext7 = mysql_real_escape_string($_POST['content_entext7'],$conn);
  $entext8 = mysql_real_escape_string($_POST['content_entext8'],$conn);
  $entext9 = mysql_real_escape_string($_POST['content_entext9'],$conn);
  $entext10 = mysql_real_escape_string($_POST['content_entext10'],$conn);
  $entext11 = mysql_real_escape_string($_POST['content_entext11'],$conn);
  $entext12 = mysql_real_escape_string($_POST['content_entext12'],$conn);
  $entext13 = mysql_real_escape_string($_POST['content_entext13'],$conn);
  $entext14 = mysql_real_escape_string($_POST['content_entext14'],$conn);
  $entext15 = mysql_real_escape_string($_POST['content_entext15'],$conn);
  $entext16 = mysql_real_escape_string($_POST['content_entext16'],$conn);
  $entext17 = mysql_real_escape_string($_POST['content_entext17'],$conn);
  $entext18 = mysql_real_escape_string($_POST['content_entext18'],$conn);
  $entext19 = mysql_real_escape_string($_POST['content_entext19'],$conn);
  $entext20 = mysql_real_escape_string($_POST['content_entext20'],$conn);
  $entext21 = mysql_real_escape_string($_POST['content_entext21'],$conn);
  $entext22 = mysql_real_escape_string($_POST['content_entext22'],$conn);
  $entext23 = mysql_real_escape_string($_POST['content_entext23'],$conn);
  $entext24 = mysql_real_escape_string($_POST['content_entext24'],$conn);
  $entext25 = mysql_real_escape_string($_POST['content_entext25'],$conn);
  $entext26 = mysql_real_escape_string($_POST['content_entext26'],$conn);
  $entext27 = mysql_real_escape_string($_POST['content_entext27'],$conn);
  $entext28 = mysql_real_escape_string($_POST['content_entext28'],$conn);
  $entext29 = mysql_real_escape_string($_POST['content_entext29'],$conn);
  $entext30 = mysql_real_escape_string($_POST['content_entext30'],$conn);
  $entext31 = mysql_real_escape_string($_POST['content_entext31'],$conn);
  $entext32 = mysql_real_escape_string($_POST['content_entext32'],$conn);
  $entext33 = mysql_real_escape_string($_POST['content_entext33'],$conn);
  $entext34 = mysql_real_escape_string($_POST['content_entext34'],$conn);
  $entext35 = mysql_real_escape_string($_POST['content_entext35'],$conn);
  $entext36 = mysql_real_escape_string($_POST['content_entext36'],$conn);
  $entext37 = mysql_real_escape_string($_POST['content_entext37'],$conn);
  $entext38 = mysql_real_escape_string($_POST['content_entext38'],$conn);
  $entext39 = mysql_real_escape_string($_POST['content_entext39'],$conn);
  $entext40 = mysql_real_escape_string($_POST['content_entext40'],$conn);
  $entext41 = mysql_real_escape_string($_POST['content_entext41'],$conn);
  $entext42 = mysql_real_escape_string($_POST['content_entext42'],$conn);



  // $image1 = $_FILES['index_image1']['name'];
  $image2 = $_FILES['index_image2']['name'];
  $image3 = $_FILES['index_image3']['name'];
  $image4 = $_FILES['index_image4']['name'];

  $image5 = $_FILES['index_image5']['name'];
  $image6 = $_FILES['index_image6']['name'];
  $image7 = $_FILES['index_image7']['name'];
  $image8 = $_FILES['index_image8']['name'];

  $image9 = $_FILES['index_image9']['name'];
  // $image10 = $_FILES['index_image10']['name'];

 $sql="UPDATE digisurf_index SET text1='".$entext1."', text2='".$entext2."', text3='".$entext3."', text4='".$entext4."', text5='".$entext5."', text6='".$entext6."', text7='".$entext7."', text8='".$entext8."', text9='".$entext9."', text10='".$entext10."', text11='".$entext11."', text12='".$entext12."', text13='".$entext13."', text14='".$entext14."', text15='".$entext15."', text16='".$entext16."', text17='".$entext17."', text18='".$entext18."', text19='".$entext19."', text20='".$entext20."', text21='".$entext21."', text22='".$entext22."', text23='".$entext23."', text24='".$entext24."', text25='".$entext25."', text26='".$entext26."', text27='".$entext27."', text28='".$entext28."', text29='".$entext29."', text30='".$entext30."', text31='".$entext31."', text32='".$entext32."', text33='".$entext33."', text34='".$entext34."', text35='".$entext35."', text36='".$entext36."', text37='".$entext37."', text38='".$entext38."', text39='".$entext39."', text40='".$entext40."', text41='".$entext41."', text42='".$entext42."' where code ='".$current_lang."' ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

  if($image1 != null) {
      $file_tmp1 =$_FILES['index_image1']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../uploads/".$image1);
      $filename = "/uploads/".$image1;
      $sql1="UPDATE digisurf_index SET image1='".$filename."' where code ='".$current_lang."' ";
      $retval1 = mysql_query( $sql1, $conn );
                   if(! $retval1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image2 != null) {
      $file_tmp2 =$_FILES['index_image2']['tmp_name'];
      move_uploaded_file($file_tmp2, getcwd()."/../../uploads/".$image2);
      $filename = "/uploads/".$image2;
      $sql2="UPDATE digisurf_index SET image2='".$filename."' where code ='".$current_lang."' ";
      $retval2 = mysql_query( $sql2, $conn );
                   if(! $retval2 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image3 != null) {
      $file_tmp3 =$_FILES['index_image3']['tmp_name'];
      move_uploaded_file($file_tmp3, getcwd()."/../../uploads/".$image3);
      $filename = "/uploads/".$image3;
      $sql3="UPDATE digisurf_index SET image3='".$filename."' where code ='".$current_lang."' ";
      $retval3 = mysql_query( $sql3, $conn );
                   if(! $retval3 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }


    if($image4 != null) {
      $file_tmp4 =$_FILES['index_image4']['tmp_name'];
      move_uploaded_file($file_tmp4, getcwd()."/../../uploads/".$image4);
      $filename = "/uploads/".$image4;
      $sql4="UPDATE digisurf_index SET image4='".$filename."' where code ='".$current_lang."' ";
      $retval4 = mysql_query( $sql4, $conn );
                   if(! $retval4 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }


    if($image5 != null) {
      $file_tmp5 =$_FILES['index_image5']['tmp_name'];
      move_uploaded_file($file_tmp5, getcwd()."/../../uploads/".$image5);
      $filename = "/uploads/".$image5;
      $sql5="UPDATE digisurf_index SET image5='".$filename."' where code ='".$current_lang."' ";
      $retval5 = mysql_query( $sql5, $conn );
                   if(! $retval5 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image6 != null) {
      $file_tmp6 =$_FILES['index_image6']['tmp_name'];
      move_uploaded_file($file_tmp6, getcwd()."/../../uploads/".$image6);
      $filename = "/uploads/".$image6;
      $sql6="UPDATE digisurf_index SET image6='".$filename."' where code ='".$current_lang."' ";
      $retval6 = mysql_query( $sql6, $conn );
                   if(! $retval6 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image7 != null) {
      $file_tmp7 =$_FILES['index_image7']['tmp_name'];
      move_uploaded_file($file_tmp7, getcwd()."/../../uploads/".$image7);
      $filename = "/uploads/".$image7;
      $sql7="UPDATE digisurf_index SET image7='".$filename."' where code ='".$current_lang."' ";
      $retval7 = mysql_query( $sql7, $conn );
                   if(! $retval7 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image8 != null) {
      $file_tmp8 =$_FILES['index_image8']['tmp_name'];
      move_uploaded_file($file_tmp8, getcwd()."/../../uploads/".$image8);
      $filename = "/uploads/".$image8;
      $sql8="UPDATE digisurf_index SET image8='".$filename."' where code ='".$current_lang."' ";
      $retval8 = mysql_query( $sql8, $conn );
                   if(! $retval8 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image9 != null) {
      $file_tmp9 =$_FILES['index_image9']['tmp_name'];
      move_uploaded_file($file_tmp9, getcwd()."/../../uploads/".$image9);
      $filename = "/uploads/".$image9;
      $sql9="UPDATE digisurf_index SET image9='".$filename."' where code ='".$current_lang."' ";
      $retval9 = mysql_query( $sql9, $conn );
                   if(! $retval9 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

  //   if($image10 != null) {
  //     $file_tmp10 =$_FILES['index_image10']['tmp_name'];
  //     move_uploaded_file($file_tmp10, getcwd()."/../../uploads/".$image10);
  //     $filename = "/uploads/".$image10;
  //     $sql10="UPDATE digisurf_index SET image10='".$filename."' where code ='".$current_lang."' ";
  //     $retval10 = mysql_query( $sql10, $conn );
  //                  if(! $retval10 )
  //                      {
  //                         die('Could not enter image: ' . mysql_error());
  //                      }
  //   }


    header("Refresh:0; url=/Admin/Main");
    
}



if(isset($_POST['add_first_slider'])){


  $entext1 = mysql_real_escape_string($_POST['location_entext1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['location_entext2'],$conn);
  $entext3 = mysql_real_escape_string($_POST['location_entext3'],$conn);
  $entext4 = mysql_real_escape_string($_POST['location_entext4'],$conn);
  $entext5 = mysql_real_escape_string($_POST['location_entext5'],$conn);
  $entext6 = mysql_real_escape_string($_POST['location_entext6'],$conn);

  $image1 = $_FILES['location_image1']['name'];
  $uploaded_image1 = '';

  if($image1 != null) {
    $file_tmp =$_FILES['location_image1']['tmp_name'];
      move_uploaded_file($file_tmp, getcwd()."/../../uploads/".$image1);
    $uploaded_image1 = "/uploads/".$image1;
  }


  $sqla = 'INSERT INTO index_first_slider (text1, text2, text3, text4, text5, text6, image1) VALUES ( "'.$entext1.'", "'.$entext2.'", "'.$entext3.'", "'.$entext4.'", "'.$entext5.'", "'.$entext6.'", "'.$uploaded_image1.'")';

  $retvala = mysql_query( $sqla, $conn );
    if(! $retvala ) {  
        die('Could not enter data: ' . mysql_error());
      }

      header("Refresh:0; url=/Admin/Main/");
  }

  if(isset($_POST['edit_first_slider'])){
  $locationid = mysql_real_escape_string($_POST['first_slider_id'],$conn);

  $entext1 = mysql_real_escape_string($_POST['location_entext1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['location_entext2'],$conn);
  $entext3 = mysql_real_escape_string($_POST['location_entext3'],$conn);
  $entext4 = mysql_real_escape_string($_POST['location_entext4'],$conn);
  $entext5 = mysql_real_escape_string($_POST['location_entext5'],$conn);
  $entext6 = mysql_real_escape_string($_POST['location_entext6'],$conn);
  $image1 = $_FILES['location_image1']['name'];

 $sql="UPDATE index_first_slider SET text1='".$entext1."', text2='".$entext2."', text3='".$entext3."', text4='".$entext4."', text5='".$entext5."', text6='".$entext6."' WHERE idx = '".$locationid."' LIMIT 1 ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

  if($image1 != null) {
      $file_tmp1 = $_FILES['location_image1']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../uploads/".$image1);
      $filename = "/uploads/".$image1;
      $sql1="UPDATE index_first_slider SET image1='".$filename."' WHERE idx ='".$locationid."'";
      $retval1 = mysql_query( $sql1, $conn );
                   if(! $retval1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }
                      header("Refresh:0; url=/Admin/Main/");
}


  if(isset($_POST['delete_first_slider'])){
  $locationid = mysql_real_escape_string($_POST['first_slider_id'],$conn);

        $sqlin = 'DELETE FROM index_first_slider WHERE idx ="'.$locationid.'" LIMIT 1';
                 $retvalin = mysql_query( $sqlin, $conn );
                   if(! $retvalin )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }
                       


        $sqlreseten1 = "ALTER TABLE index_first_slider DROP idx; ";
        $sqlreseten2 = "ALTER TABLE index_first_slider AUTO_INCREMENT = 1; ";
        $sqlreseten3 = "ALTER TABLE index_first_slider ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

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

                       header("Refresh:0; url=/Admin/Main/");

}




if(isset($_POST['add_second_slider'])){


  $entext1 = mysql_real_escape_string($_POST['location_entext1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['location_entext2'],$conn);
  $entext3 = mysql_real_escape_string($_POST['location_entext3'],$conn);
  $image1 = $_FILES['location_image1']['name'];
  $uploaded_image1 = '';

  if($image1 != null) {
    $file_tmp =$_FILES['location_image1']['tmp_name'];
      move_uploaded_file($file_tmp, getcwd()."/../../uploads/".$image1);
    $uploaded_image1 = "/uploads/".$image1;
  }


  $sqla = 'INSERT INTO index_second_slider (text1, text2, text3, image1) VALUES ( "'.$entext1.'", "'.$entext2.'", "'.$entext3.'", "'.$uploaded_image1.'")';

  $retvala = mysql_query( $sqla, $conn );
    if(! $retvala ) {  
        die('Could not enter data: ' . mysql_error());
      }

      header("Refresh:0; url=/Admin/Main/");
  }

  if(isset($_POST['edit_second_slider'])){
  $locationid = mysql_real_escape_string($_POST['second_slider_id'],$conn);

  $entext1 = mysql_real_escape_string($_POST['location_entext1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['location_entext2'],$conn);
  $entext3 = mysql_real_escape_string($_POST['location_entext3'],$conn);
  $image1 = $_FILES['location_image1']['name'];

 $sql="UPDATE index_second_slider SET text1='".$entext1."', text2='".$entext2."', text3='".$entext3."' WHERE idx = '".$locationid."' LIMIT 1 ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

  if($image1 != null) {
      $file_tmp1 =$_FILES['location_image1']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../uploads/".$image1);
      $filename = "/uploads/".$image1;
      $sql1="UPDATE index_second_slider SET image1='".$filename."' WHERE idx ='".$locationid."'";
      $retval1 = mysql_query( $sql1, $conn );
                   if(! $retval1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }
                       header("Refresh:0; url=/Admin/Main/");
}


  if(isset($_POST['delete_second_slider'])){
  $locationid = mysql_real_escape_string($_POST['second_slider_id'],$conn);

        $sqlin = 'DELETE FROM index_second_slider WHERE idx ="'.$locationid.'" LIMIT 1';
                 $retvalin = mysql_query( $sqlin, $conn );
                   if(! $retvalin )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }
                       


        $sqlreseten1 = "ALTER TABLE index_second_slider DROP idx; ";
        $sqlreseten2 = "ALTER TABLE index_second_slider AUTO_INCREMENT = 1; ";
        $sqlreseten3 = "ALTER TABLE index_second_slider ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

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

                       header("Refresh:0; url=/Admin/Main/");

}
?>