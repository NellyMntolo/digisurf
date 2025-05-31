<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];


if(isset($_POST['create_project_submit'])){
  $miscid = mysql_real_escape_string($_POST['misc_id'],$conn);

  $max = 'SELECT sortable_order FROM digisurf_white_papers WHERE code="'.$current_lang.'" ORDER BY sortable_order DESC';
  $retvalmaxen = mysql_query( $max, $conn );                 
                             if(! $retvalmaxen )
                             {
                                die('Could not get sortable data: ' . mysql_error());
                             }
  $rowmaxen = mysql_fetch_array($retvalmaxen, MYSQL_ASSOC);
  $large = $rowmaxen['sortable_order'];


  $max_misc = 'SELECT misc_id FROM digisurf_white_papers WHERE code="'.$current_lang.'" ORDER BY misc_id DESC';
  $retvalmax_miscen = mysql_query( $max_misc, $conn );                 
                             if(! $retvalmax_miscen )
                             {
                                die('Could not get misc data: ' . mysql_error());
                             }
  $rowmax_miscen = mysql_fetch_array($retvalmax_miscen, MYSQL_ASSOC);
  $large_misc = $rowmax_miscen['misc_id'];

  $themisc = '';
  if($miscid != null){
      $themisc = $miscid;
  } else {
    $themisc = $large_misc+1;
  }


  $entext1 = mysql_real_escape_string($_POST['general_entext1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['general_entext2'],$conn);
  $entext3 = mysql_real_escape_string($_POST['general_entext3'],$conn);
  $entext4 = mysql_real_escape_string($_POST['general_entext4'],$conn);

  $entext5 = mysql_real_escape_string($_POST['content_entext1'],$conn);
  $entext6 = $_POST['content_entext2'];
  $date = mysql_real_escape_string($_POST['content_entext3'],$conn);


  $image1 = $_FILES['case_image1']['name'];
  $uploaded_image1 = '';

  if($image1 != null) {
    $file_tmp =$_FILES['case_image1']['tmp_name'];
      move_uploaded_file($file_tmp, getcwd()."/../../uploads/".$image1);
    $uploaded_image1 = "/uploads/".$image1;
  }


$vowels = array(" ", "&", "?");
$enurl = str_replace($vowels, '_', $entext4);
  $sqla = 'INSERT INTO digisurf_white_papers (code, text1, text2, text3, text4, text5, text6, text7, image1, sortable_order, url, misc_id) VALUES ( "'.$current_lang.'", "'.$entext1.'", "'.$entext2.'", "'.$entext3.'", "'.$entext4.'", "'.$entext5.'", "'.$entext6.'", "'.$date.'", "'.$uploaded_image1.'", "'.$large.'"+1, "'.$enurl.'", "'.$themisc.'")';

  $retvala = mysql_query( $sqla, $conn );
    if(! $retvala ) {  
        die('Could not enter data: ' . mysql_error());
      }

      header("Refresh:0; url=/Admin/ViewAllWhitePapers");

}


if(isset($_POST['edit_project_submit'])){

  $blogid = mysql_real_escape_string($_POST['blog_id'],$conn);
  $a = mysql_real_escape_string($_POST['a'],$conn);

  $entext1 = mysql_real_escape_string($_POST['general_entext1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['general_entext2'],$conn);
  $entext3 = mysql_real_escape_string($_POST['general_entext3'],$conn);
  $entext4 = mysql_real_escape_string($_POST['general_entext4'],$conn);

  $entext5 = mysql_real_escape_string($_POST['content_entext1'],$conn);
  $entext6 = $_POST['content_entext2'];
  $date = mysql_real_escape_string($_POST['content_entext3'],$conn);
  $passcode = mysql_real_escape_string($_POST['paper_passcode'],$conn);

  $image1 = $_FILES['case_image1']['name'];

$vowels = array(" ", "&", "?");
$enurl = str_replace($vowels, '_', $entext4);

 $sql="UPDATE digisurf_white_papers SET text1='".$entext1."', text2='".$entext2."', text3='".$entext3."', text4='".$entext4."', text5='".$entext5."', text6='".$entext6."', text7='".$date."', url='".$enurl."'  WHERE idx='".$blogid."' AND code='".$current_lang."' AND misc_id='".$a."' LIMIT 1 ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

    if($image1 != null) {
      $file_tmp1 =$_FILES['case_image1']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../uploads/".$image1);
      $filename = "/uploads/".$image1;
      $sql1="UPDATE digisurf_white_papers SET image1='".$filename."' WHERE idx ='".$blogid."' AND code='".$current_lang."'";
      $retval1 = mysql_query( $sql1, $conn );
                   if(! $retval1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

 $sql_passcode="UPDATE digisurf_white_papers SET passcode='".$passcode."' ";              
                   $retval_passcode = mysql_query( $sql_passcode, $conn );
                   if(! $retval_passcode )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }






      $realname1 = $_FILES['download_file1']['name'];
      $realname2 = $_FILES['download_file2']['name'];
      $realname3 = $_FILES['download_file3']['name'];
      $realname4 = $_FILES['download_file4']['name'];
      $realname5 = $_FILES['download_file5']['name'];
      


  if($realname1 != null) {
      $file_name1 = explode(".",$_FILES['download_file1']['name']);
      $newfilename1 = round(microtime(true)) . '.' . end($file_name1);
      $file_tmp1 = $_FILES['download_file1']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../Downloads/".$newfilename1);

      $sqlb ="UPDATE digisurf_white_papers SET download1_a='".$realname1."', download1_b='".$newfilename1."' WHERE idx='".$blogid."' AND code='".$current_lang."' ";

  $retvalb = mysql_query( $sqlb, $conn );
    if(! $retvalb ) {  
        die('Could not enter data: ' . mysql_error());
      }
    }

    if($realname2 != null) {
      $file_name2 = explode(".",$_FILES['download_file2']['name']);
      $newfilename2 = round(microtime(true)) . '.' . end($file_name2);
      $file_tmp2 = $_FILES['download_file2']['tmp_name'];
      move_uploaded_file($file_tmp2, getcwd()."/../../Downloads/".$newfilename2);

      $sqlb ="UPDATE digisurf_white_papers SET download2_a='".$realname2."', download2_b='".$newfilename2."' WHERE idx='".$blogid."' AND code='".$current_lang."' ";

  $retvalb = mysql_query( $sqlb, $conn );
    if(! $retvalb ) {  
        die('Could not enter data: ' . mysql_error());
      }
    }

    if($realname3 != null) {
      $file_name3 = explode(".",$_FILES['download_file3']['name']);
      $newfilename3 = round(microtime(true)) . '.' . end($file_name3);
      $file_tmp3 = $_FILES['download_file3']['tmp_name'];
      move_uploaded_file($file_tmp3, getcwd()."/../../Downloads/".$newfilename3);

      $sqlb ="UPDATE digisurf_white_papers SET download3_a='".$realname3."', download3_b='".$newfilename3."' WHERE idx='".$blogid."' AND code='".$current_lang."' ";

  $retvalb = mysql_query( $sqlb, $conn );
    if(! $retvalb ) {  
        die('Could not enter data: ' . mysql_error());
      }
    }

    if($realname4 != null) {
      $file_name4 = explode(".",$_FILES['download_file4']['name']);
      $newfilename4 = round(microtime(true)) . '.' . end($file_name4);
      $file_tmp4 = $_FILES['download_file4']['tmp_name'];
      move_uploaded_file($file_tmp4, getcwd()."/../../Downloads/".$newfilename4);

      $sqlb ="UPDATE digisurf_white_papers SET download4_a='".$realname4."', download4_b='".$newfilename4."' WHERE idx='".$blogid."' AND code='".$current_lang."' ";

  $retvalb = mysql_query( $sqlb, $conn );
    if(! $retvalb ) {  
        die('Could not enter data: ' . mysql_error());
      }
    }

    if($realname5 != null) {
      $file_name5 = explode(".",$_FILES['download_file5']['name']);
      $newfilename5 = round(microtime(true)) . '.' . end($file_name5);
      $file_tmp5 = $_FILES['download_file5']['tmp_name'];
      move_uploaded_file($file_tmp5, getcwd()."/../../Downloads/".$newfilename5);

      $sqlb ="UPDATE digisurf_white_papers SET download5_a='".$realname5."', download5_b='".$newfilename5."' WHERE idx='".$blogid."' AND code='".$current_lang."' ";

  $retvalb = mysql_query( $sqlb, $conn );
    if(! $retvalb ) {  
        die('Could not enter data: ' . mysql_error());
      }
    }


              header("Refresh:0; url=/Admin/ViewAllWhitePapers");
}


if(isset($_POST['delete_project_submit'])){
  $blogid = mysql_real_escape_string($_POST['blog_id'],$conn);

  $strap = 'SELECT sortable_order FROM digisurf_white_papers WHERE idx = "'.$blogid.'" AND code="'.$current_lang.'" LIMIT 1';
  $retvalstrapen = mysql_query( $strap, $conn );                 
                             if(! $retvalstrapen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
  $rowstrapen = mysql_fetch_array($retvalstrapen, MYSQL_ASSOC);
  $returnstrap = $rowstrapen['sortable_order'];

  $strap_misc = 'SELECT misc_id FROM digisurf_white_papers WHERE idx = "'.$blogid.'" AND code="'.$current_lang.'" LIMIT 1';
  $retvalstrapen_misc = mysql_query( $strap_misc, $conn );                 
                             if(! $retvalstrapen_misc )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
  $rowstrapen_misc = mysql_fetch_array($retvalstrapen_misc, MYSQL_ASSOC);
  $returnstrap_misc = $rowstrapen_misc['misc_id'];



        $sqlin = 'DELETE FROM digisurf_white_papers WHERE idx ="'.$blogid.'" AND code="'.$current_lang.'" LIMIT 1';
                 $retvalin = mysql_query( $sqlin, $conn );
                   if(! $retvalin )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }
                       


        $sqlreseten1 = "ALTER TABLE digisurf_white_papers DROP idx; ";
        $sqlreseten2 = "ALTER TABLE digisurf_white_papers AUTO_INCREMENT = 1; ";
        $sqlreseten3 = "ALTER TABLE digisurf_white_papers ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

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


                    $sqlen="UPDATE digisurf_white_papers SET sortable_order= sortable_order-1  WHERE sortable_order >'".$returnstrap."' AND code='".$current_lang."' ";              
                       $retvalen = mysql_query( $sqlen, $conn );
                       if(! $retvalen )
                           {
                              die('Could not enter data: ' . mysql_error());
                           }
                    $sqlen_misc="UPDATE digisurf_white_papers SET misc_id= misc_id-1  WHERE misc_id >'".$returnstrap_misc."' AND code='".$current_lang."' ";              
                       $retvalen_misc = mysql_query( $sqlen_misc, $conn );
                       if(! $retvalen_misc )
                           {
                              die('Could not enter data: ' . mysql_error());
                           }
                       header("Refresh:0; url=/Admin/ViewAllWhitePapers");

}


if(isset($_POST['delete_images'])){

  $idx= mysql_real_escape_string($_POST['event_id'],$conn);
  $check_image1 = mysql_real_escape_string($_POST['check_image1'],$conn);
 

if($check_image1 == 'yes'){

 $sql="UPDATE digisurf_white_papers SET image1 = NULL WHERE idx = '".$idx."' AND code='".$current_lang."' ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
      echo '<h1 style="width: 100%; height: auto; position: relative; margin: o auto; margin-top: 20%; display: inline-block; font-style: italic; color: #71af4a;">no image selected</h1>';
      header('Refresh:3;' . $_SERVER['HTTP_REFERER']);
    }


                       //header("Refresh:0; url=/Admin/ViewAllEvents/");
    //
}
?>