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
  $entext5 = $_POST['content_text5'];
  $entext6 = mysql_real_escape_string($_POST['content_text6'],$conn);
  $entext7 = mysql_real_escape_string($_POST['content_text7'],$conn);
  $entext8 = mysql_real_escape_string($_POST['content_text8'],$conn);
  $entext9 = mysql_real_escape_string($_POST['content_text9'],$conn);
  $entext10 = mysql_real_escape_string($_POST['content_text10'],$conn);
  $entext11 = mysql_real_escape_string($_POST['content_text11'],$conn);
  $entext12 = mysql_real_escape_string($_POST['content_text12'],$conn);
  $entext13 = mysql_real_escape_string($_POST['content_text13'],$conn);
  $entext14 = mysql_real_escape_string($_POST['content_text14'],$conn);
  $entext15 = mysql_real_escape_string($_POST['content_text15'],$conn);
  $entext16 = mysql_real_escape_string($_POST['content_text16'],$conn);
  $entext17 = mysql_real_escape_string($_POST['content_text17'],$conn);
  $entext18 = mysql_real_escape_string($_POST['content_text18'],$conn);
  $entext19 = mysql_real_escape_string($_POST['content_text19'],$conn);
  $entext20 = mysql_real_escape_string($_POST['content_text20'],$conn);
  $entext21 = mysql_real_escape_string($_POST['content_text21'],$conn);
  $entext22 = mysql_real_escape_string($_POST['content_text22'],$conn);
  $entext23 = mysql_real_escape_string($_POST['content_text23'],$conn);
  $entext24 = mysql_real_escape_string($_POST['content_text24'],$conn);
  $entext25 = mysql_real_escape_string($_POST['content_text25'],$conn);
  $entext26 = mysql_real_escape_string($_POST['content_text26'],$conn);
  $entext27 = mysql_real_escape_string($_POST['content_text27'],$conn);
  $entext28 = mysql_real_escape_string($_POST['content_text28'],$conn);
  $entext29 = mysql_real_escape_string($_POST['content_text29'],$conn);
  $entext30 = mysql_real_escape_string($_POST['content_text30'],$conn);
  $entext31 = mysql_real_escape_string($_POST['content_text31'],$conn);
  $entext32 = mysql_real_escape_string($_POST['content_text32'],$conn);
  $entext33 = mysql_real_escape_string($_POST['content_text33'],$conn);
  $entext34 = mysql_real_escape_string($_POST['content_text34'],$conn);
  $entext35 = mysql_real_escape_string($_POST['content_text35'],$conn);
  $entext36 = mysql_real_escape_string($_POST['content_text36'],$conn);
  $entext37 = mysql_real_escape_string($_POST['content_text37'],$conn);
  $entext38 = mysql_real_escape_string($_POST['content_text38'],$conn);
  $entext39 = mysql_real_escape_string($_POST['content_text39'],$conn);
  $entext40 = mysql_real_escape_string($_POST['content_text40'],$conn);
  $entext41 = mysql_real_escape_string($_POST['content_text41'],$conn);
  $entext42 = mysql_real_escape_string($_POST['content_text42'],$conn);
  $entext43 = mysql_real_escape_string($_POST['content_text43'],$conn);
  $entext44 = mysql_real_escape_string($_POST['content_text44'],$conn);
  $entext45 = mysql_real_escape_string($_POST['content_text45'],$conn);
  $entext46 = mysql_real_escape_string($_POST['content_text46'],$conn);
  $entext47 = mysql_real_escape_string($_POST['content_text47'],$conn);
  $entext48 = mysql_real_escape_string($_POST['content_text48'],$conn);
  $entext49 = mysql_real_escape_string($_POST['content_text49'],$conn);
  $entext50 = mysql_real_escape_string($_POST['content_text50'],$conn);
  $entext51 = mysql_real_escape_string($_POST['content_text51'],$conn);
  $entext52 = mysql_real_escape_string($_POST['content_text52'],$conn);
  $entext53 = mysql_real_escape_string($_POST['content_text53'],$conn);
  $entext54 = mysql_real_escape_string($_POST['content_text54'],$conn);
  $entext55 = mysql_real_escape_string($_POST['content_text55'],$conn);
  $entext56 = mysql_real_escape_string($_POST['content_text56'],$conn);
  $entext57 = mysql_real_escape_string($_POST['content_text57'],$conn);
  $entext58 = mysql_real_escape_string($_POST['content_text58'],$conn);
  $entext59 = mysql_real_escape_string($_POST['content_text59'],$conn);
  $entext60 = mysql_real_escape_string($_POST['content_text60'],$conn);
  $entext61 = mysql_real_escape_string($_POST['content_text61'],$conn);
  $entext62 = mysql_real_escape_string($_POST['content_text62'],$conn);
  $entext63 = mysql_real_escape_string($_POST['content_text63'],$conn);
  $entext64 = mysql_real_escape_string($_POST['content_text64'],$conn);
  $entext65 = mysql_real_escape_string($_POST['content_text65'],$conn);
  $entext66 = mysql_real_escape_string($_POST['content_text66'],$conn);
  $entext67 = mysql_real_escape_string($_POST['content_text67'],$conn);
  $entext68 = mysql_real_escape_string($_POST['content_text68'],$conn);
  $entext69 = mysql_real_escape_string($_POST['content_text69'],$conn);
  $entext70 = mysql_real_escape_string($_POST['content_text70'],$conn);
  $entext71 = mysql_real_escape_string($_POST['content_text71'],$conn);
  $entext72 = mysql_real_escape_string($_POST['content_text72'],$conn);
  $entext73 = mysql_real_escape_string($_POST['content_text73'],$conn);
  $entext74 = mysql_real_escape_string($_POST['content_text74'],$conn);
  $entext75 = mysql_real_escape_string($_POST['content_text75'],$conn);
  $entext76 = mysql_real_escape_string($_POST['content_text76'],$conn);
  $entext77 = mysql_real_escape_string($_POST['content_text77'],$conn);
  $entext78 = mysql_real_escape_string($_POST['content_text78'],$conn);
  $entext79 = mysql_real_escape_string($_POST['content_text79'],$conn);


  $image1 = $_FILES['48_image1']['name'];
  $image2 = $_FILES['48_image2']['name'];
  $image3 = $_FILES['knowing_image1']['name'];
  $image4 = $_FILES['knowing_image2']['name'];
  $image5 = $_FILES['participate1_image1']['name'];
  $image6 = $_FILES['participate1_image2']['name'];
  $image7 = $_FILES['participate2_image1']['name'];
  $image8 = $_FILES['participate2_image2']['name'];

 $sql="UPDATE digisurf_48 SET text1='".$entext1."', text2='".$entext2."', text3='".$entext3."', text4='".$entext4."', text5='".$entext5."', text6='".$entext6."', text7='".$entext7."', text8='".$entext8."', text9='".$entext9."', text10='".$entext10."', text11='".$entext11."', text12='".$entext12."', text13='".$entext13."', text14='".$entext14."', text15='".$entext15."', text16='".$entext16."', text17='".$entext17."', text18='".$entext18."', text19='".$entext19."', text20='".$entext20."', text21='".$entext21."', text22='".$entext22."', text23='".$entext23."', text24='".$entext24."', text25='".$entext25."', text26='".$entext26."', text27='".$entext27."', text28='".$entext28."', text29='".$entext29."', text30='".$entext30."', text31='".$entext31."', text32='".$entext32."', text33='".$entext33."', text34='".$entext34."', text35='".$entext35."', text36='".$entext36."', text37='".$entext37."', text38='".$entext38."', text39='".$entext39."', text40='".$entext40."', text41='".$entext41."', text42='".$entext42."', text43='".$entext43."', text44='".$entext44."', text45='".$entext45."', text46='".$entext46."', text47='".$entext47."', text48='".$entext48."', text49='".$entext49."', text50='".$entext50."', text51='".$entext51."', text52='".$entext52."', text53='".$entext53."', text54='".$entext54."', text55='".$entext55."', text56='".$entext56."', text57='".$entext57."', text58='".$entext58."', text59='".$entext59."', text60='".$entext60."', text61='".$entext61."', text62='".$entext62."', text63='".$entext63."', text64='".$entext64."', text65='".$entext65."', text66='".$entext66."', text67='".$entext67."', text68='".$entext68."', text69='".$entext69."', text70='".$entext70."', text71='".$entext71."', text72='".$entext72."', text73='".$entext73."', text74='".$entext74."', text75='".$entext75."', text76='".$entext76."', text77='".$entext77."', text78='".$entext78."', text79='".$entext79."' where code ='".$current_lang."' ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }
    

    if($image1 != null) {
      $file_tmp1 =$_FILES['48_image1']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../uploads/".$image1);
      $filename = "/uploads/".$image1;
      $sql1="UPDATE digisurf_48 SET image1='".$filename."' where code ='".$current_lang."' ";
      $retval1 = mysql_query( $sql1, $conn );
                   if(! $retval1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image2 != null) {
      $file_tmp2 =$_FILES['48_image2']['tmp_name'];
      move_uploaded_file($file_tmp2, getcwd()."/../../uploads/".$image2);
      $filename = "/uploads/".$image2;
      $sql2="UPDATE digisurf_48 SET image2='".$filename."' where code ='".$current_lang."' ";
      $retval2 = mysql_query( $sql2, $conn );
                   if(! $retval2 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image3 != null) {
      $file_tmp3 =$_FILES['knowing_image1']['tmp_name'];
      move_uploaded_file($file_tmp3, getcwd()."/../../uploads/".$image3);
      $filename = "/uploads/".$image3;
      $sql3="UPDATE digisurf_48 SET image3='".$filename."' where code ='".$current_lang."' ";
      $retval3 = mysql_query( $sql3, $conn );
                   if(! $retval3 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image4 != null) {
      $file_tmp4 =$_FILES['knowing_image2']['tmp_name'];
      move_uploaded_file($file_tmp4, getcwd()."/../../uploads/".$image4);
      $filename = "/uploads/".$image4;
      $sql4="UPDATE digisurf_48 SET image4='".$filename."' where code ='".$current_lang."' ";
      $retval4 = mysql_query( $sql4, $conn );
                   if(! $retval4 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }


    if($image5 != null) {
      $file_tmp5 =$_FILES['participate1_image1']['tmp_name'];
      move_uploaded_file($file_tmp5, getcwd()."/../../uploads/".$image5);
      $filename = "/uploads/".$image5;
      $sql5="UPDATE digisurf_48 SET image5='".$filename."' where code ='".$current_lang."' ";
      $retval5 = mysql_query( $sql5, $conn );
                   if(! $retval5 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }


    if($image6 != null) {
      $file_tmp6 =$_FILES['participate1_image2']['tmp_name'];
      move_uploaded_file($file_tmp6, getcwd()."/../../uploads/".$image6);
      $filename = "/uploads/".$image6;
      $sql6="UPDATE digisurf_48 SET image6='".$filename."' where code ='".$current_lang."' ";
      $retval6 = mysql_query( $sql6, $conn );
                   if(! $retval6 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }


    if($image7 != null) {
      $file_tmp7 =$_FILES['participate2_image1']['tmp_name'];
      move_uploaded_file($file_tmp7, getcwd()."/../../uploads/".$image7);
      $filename = "/uploads/".$image7;
      $sql7="UPDATE digisurf_48 SET image7='".$filename."' where code ='".$current_lang."' ";
      $retval7 = mysql_query( $sql7, $conn );
                   if(! $retval7 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image8 != null) {
      $file_tmp8 =$_FILES['participate2_image2']['tmp_name'];
      move_uploaded_file($file_tmp8, getcwd()."/../../uploads/".$image8);
      $filename = "/uploads/".$image8;
      $sql8="UPDATE digisurf_48 SET image8='".$filename."' where code ='".$current_lang."' ";
      $retval8 = mysql_query( $sql8, $conn );
                   if(! $retval8 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

                       header("Refresh:0; url=/Admin/48");
}


?>