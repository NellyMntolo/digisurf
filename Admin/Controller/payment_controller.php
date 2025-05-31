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

  $entext5 = mysql_real_escape_string($_POST['content_entext1'],$conn);
  $entext6 = mysql_real_escape_string($_POST['content_entext2'],$conn);
  $entext7 = mysql_real_escape_string($_POST['content_entext3'],$conn);
  $entext8 = mysql_real_escape_string($_POST['content_entext4'],$conn);
  $entext9 = mysql_real_escape_string($_POST['content_entext5'],$conn);
  $entext10 = mysql_real_escape_string($_POST['content_entext6'],$conn);
  $entext11 = mysql_real_escape_string($_POST['content_entext7'],$conn);
  $entext12 = mysql_real_escape_string($_POST['content_entext8'],$conn);
  $entext13 = mysql_real_escape_string($_POST['content_entext9'],$conn);
  $entext14 = mysql_real_escape_string($_POST['content_entext10'],$conn);
  $entext15 = mysql_real_escape_string($_POST['content_entext11'],$conn);
  $entext16 = mysql_real_escape_string($_POST['content_entext12'],$conn);
  $entext17 = mysql_real_escape_string($_POST['content_entext13'],$conn);
  $entext18 = mysql_real_escape_string($_POST['content_entext14'],$conn);
  $entext19 = mysql_real_escape_string($_POST['content_entext15'],$conn);
  $entext20 = mysql_real_escape_string($_POST['content_entext16'],$conn);
  $entext21 = mysql_real_escape_string($_POST['content_entext17'],$conn);
  $entext22 = mysql_real_escape_string($_POST['content_entext18'],$conn);
  $entext23 = mysql_real_escape_string($_POST['content_entext19'],$conn);
  $entext24 = mysql_real_escape_string($_POST['content_entext20'],$conn);
  $entext25 = mysql_real_escape_string($_POST['content_entext21'],$conn);
  $entext26 = mysql_real_escape_string($_POST['content_entext22'],$conn);
  $entext27 = mysql_real_escape_string($_POST['content_entext23'],$conn);
  $entext28 = mysql_real_escape_string($_POST['content_entext24'],$conn);
  $entext29 = mysql_real_escape_string($_POST['content_entext25'],$conn);
  $entext30 = mysql_real_escape_string($_POST['content_entext26'],$conn);
  $entext31 = mysql_real_escape_string($_POST['content_entext27'],$conn);
  $entext32 = mysql_real_escape_string($_POST['content_entext28'],$conn);
  $entext33 = mysql_real_escape_string($_POST['content_entext29'],$conn);
  $entext34 = mysql_real_escape_string($_POST['content_entext30'],$conn);
  $entext35 = mysql_real_escape_string($_POST['content_entext31'],$conn);
  $entext36 = mysql_real_escape_string($_POST['content_entext32'],$conn);
  $entext37 = mysql_real_escape_string($_POST['content_entext33'],$conn);
  $entext38 = mysql_real_escape_string($_POST['content_entext34'],$conn);
  $entext39 = mysql_real_escape_string($_POST['content_entext35'],$conn);
  $entext40 = mysql_real_escape_string($_POST['content_entext36'],$conn);
  $entext41 = mysql_real_escape_string($_POST['content_entext37'],$conn);
  $entext42 = mysql_real_escape_string($_POST['content_entext38'],$conn);
  $entext43 = mysql_real_escape_string($_POST['content_entext39'],$conn);
  $entext44 = mysql_real_escape_string($_POST['content_entext40'],$conn);
  $entext45 = mysql_real_escape_string($_POST['content_entext41'],$conn);
  $entext46 = mysql_real_escape_string($_POST['content_entext42'],$conn);
  $entext47 = mysql_real_escape_string($_POST['content_entext43'],$conn);
  $entext48 = mysql_real_escape_string($_POST['content_entext44'],$conn);
  $entext49 = mysql_real_escape_string($_POST['content_entext45'],$conn);
  $entext50 = mysql_real_escape_string($_POST['content_entext46'],$conn);
  $entext51 = mysql_real_escape_string($_POST['content_entext47'],$conn);
  $entext52 = mysql_real_escape_string($_POST['content_entext48'],$conn);
  $entext53 = mysql_real_escape_string($_POST['content_entext49'],$conn);
  $entext54 = mysql_real_escape_string($_POST['content_entext50'],$conn);
  $entext55 = mysql_real_escape_string($_POST['content_entext51'],$conn);
  $entext56 = mysql_real_escape_string($_POST['content_entext52'],$conn);
  $entext57 = mysql_real_escape_string($_POST['content_entext53'],$conn);
  $entext58 = mysql_real_escape_string($_POST['content_entext54'],$conn);
  $entext59 = mysql_real_escape_string($_POST['content_entext55'],$conn);
  $entext60 = mysql_real_escape_string($_POST['content_entext56'],$conn);
  $entext61 = mysql_real_escape_string($_POST['content_entext57'],$conn);
  $entext62 = mysql_real_escape_string($_POST['content_entext58'],$conn);
  $entext63 = mysql_real_escape_string($_POST['content_entext59'],$conn);
  $entext64 = mysql_real_escape_string($_POST['content_entext60'],$conn);
  $entext65 = mysql_real_escape_string($_POST['content_entext61'],$conn);
  $entext66 = mysql_real_escape_string($_POST['content_entext62'],$conn);
  $entext67 = mysql_real_escape_string($_POST['content_entext63'],$conn);
  $entext68 = mysql_real_escape_string($_POST['content_entext64'],$conn);
  $entext69 = mysql_real_escape_string($_POST['content_entext65'],$conn);
  $entext70 = mysql_real_escape_string($_POST['content_entext66'],$conn);
  $entext71 = mysql_real_escape_string($_POST['content_entext67'],$conn);
  $entext72 = mysql_real_escape_string($_POST['content_entext68'],$conn);
  $entext73 = mysql_real_escape_string($_POST['content_entext69'],$conn);
  $entext74 = mysql_real_escape_string($_POST['content_entext70'],$conn);
  $entext75 = mysql_real_escape_string($_POST['content_entext71'],$conn);
  $entext76 = mysql_real_escape_string($_POST['content_entext72'],$conn);
  $entext77 = mysql_real_escape_string($_POST['content_entext73'],$conn);
  $entext78 = mysql_real_escape_string($_POST['content_entext74'],$conn);
  $entext79 = mysql_real_escape_string($_POST['content_entext75'],$conn);
  $entext80 = mysql_real_escape_string($_POST['content_entext76'],$conn);
  $entext81 = mysql_real_escape_string($_POST['content_entext77'],$conn);
  $entext82 = mysql_real_escape_string($_POST['content_entext78'],$conn);
  $entext83 = mysql_real_escape_string($_POST['content_entext79'],$conn);
  $entext84 = mysql_real_escape_string($_POST['content_entext80'],$conn);
  $entext85 = mysql_real_escape_string($_POST['content_entext81'],$conn);
  $entext86 = mysql_real_escape_string($_POST['content_entext82'],$conn);
  $entext87 = mysql_real_escape_string($_POST['content_entext83'],$conn);
  $entext88 = mysql_real_escape_string($_POST['content_entext84'],$conn);

  $image1 = $_FILES['payment_image1']['name'];
  $image2 = $_FILES['payment_image2']['name'];
  $image3 = $_FILES['payment_image3']['name'];
  $image4 = $_FILES['payment_image4']['name'];
  $image5 = $_FILES['payment_image5']['name'];
  $image6 = $_FILES['payment_image6']['name'];
  $image7 = $_FILES['payment_image7']['name'];
  $image8 = $_FILES['payment_image8']['name'];
  $image9 = $_FILES['payment_image9']['name'];
  $image10 = $_FILES['payment_image10']['name'];
  $image11 = $_FILES['payment_image11']['name'];

 $sql="UPDATE digisurf_payment SET text1='".$entext1."', text2='".$entext2."', text3='".$entext3."', text4='".$entext4."', text5='".$entext5."', text6='".$entext6."', text7='".$entext7."', text8='".$entext8."', text9='".$entext9."', text10='".$entext10."', text11='".$entext11."', text12='".$entext12."', text13='".$entext13."', text14='".$entext14."', text15='".$entext15."', text16='".$entext16."', text17='".$entext17."', text18='".$entext18."', text19='".$entext19."', text20='".$entext20."', text21='".$entext21."', text22='".$entext22."', text23='".$entext23."', text24='".$entext24."', text25='".$entext25."', text26='".$entext26."', text27='".$entext27."', text28='".$entext28."', text29='".$entext29."', text30='".$entext30."', text31='".$entext31."', text32='".$entext32."', text33='".$entext33."', text34='".$entext34."', text35='".$entext35."', text36='".$entext36."', text37='".$entext37."', text38='".$entext38."', text39='".$entext39."', text40='".$entext40."', text41='".$entext41."', text42='".$entext42."', text43='".$entext43."', text44='".$entext44."', text45='".$entext45."', text46='".$entext46."', text47='".$entext47."', text48='".$entext48."', text49='".$entext49."', text50='".$entext50."', text51='".$entext51."', text52='".$entext52."', text53='".$entext53."', text54='".$entext54."', text55='".$entext55."', text56='".$entext56."', text57='".$entext57."', text58='".$entext58."', text59='".$entext59."', text60='".$entext60."', text61='".$entext61."', text62='".$entext62."', text63='".$entext63."', text64='".$entext64."', text65='".$entext65."', text66='".$entext66."', text67='".$entext67."', text68='".$entext68."', text69='".$entext69."', text70='".$entext70."', text71='".$entext71."', text72='".$entext72."', text73='".$entext73."', text74='".$entext74."', text75='".$entext75."', text76='".$entext76."', text77='".$entext77."', text78='".$entext78."', text79='".$entext79."', text80='".$entext80."', text81='".$entext81."', text82='".$entext82."', text83='".$entext83."', text84='".$entext84."', text85='".$entext85."', text86='".$entext86."', text87='".$entext87."', text88='".$entext88."' where code ='".$current_lang."' ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

    if($image1 != null) {
      $file_tmp1 =$_FILES['payment_image1']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../uploads/".$image1);
      $filename = "/uploads/".$image1;
      $sql1="UPDATE digisurf_payment SET image1='".$filename."' where code ='".$current_lang."' ";
      $retval1 = mysql_query( $sql1, $conn );
                   if(! $retval1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image2 != null) {
      $file_tmp2 =$_FILES['payment_image2']['tmp_name'];
      move_uploaded_file($file_tmp2, getcwd()."/../../uploads/".$image2);
      $filename = "/uploads/".$image2;
      $sql2="UPDATE digisurf_payment SET image2='".$filename."' where code ='".$current_lang."' ";
      $retval2 = mysql_query( $sql2, $conn );
                   if(! $retval2 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image3 != null) {
      $file_tmp3 =$_FILES['payment_image3']['tmp_name'];
      move_uploaded_file($file_tmp3, getcwd()."/../../uploads/".$image3);
      $filename = "/uploads/".$image3;
      $sql3="UPDATE digisurf_payment SET image3='".$filename."' where code ='".$current_lang."' ";
      $retval3 = mysql_query( $sql3, $conn );
                   if(! $retval3 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image4 != null) {
      $file_tmp4 =$_FILES['payment_image4']['tmp_name'];
      move_uploaded_file($file_tmp4, getcwd()."/../../uploads/".$image4);
      $filename = "/uploads/".$image4;
      $sql4="UPDATE digisurf_payment SET image4='".$filename."' where code ='".$current_lang."' ";
      $retval4 = mysql_query( $sql4, $conn );
                   if(! $retval4 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image5 != null) {
      $file_tmp5 =$_FILES['payment_image5']['tmp_name'];
      move_uploaded_file($file_tmp5, getcwd()."/../../uploads/".$image5);
      $filename = "/uploads/".$image5;
      $sql5="UPDATE digisurf_payment SET image5='".$filename."' where code ='".$current_lang."' ";
      $retval5 = mysql_query( $sql5, $conn );
                   if(! $retval5 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image6 != null) {
      $file_tmp6 =$_FILES['payment_image6']['tmp_name'];
      move_uploaded_file($file_tmp6, getcwd()."/../../uploads/".$image6);
      $filename = "/uploads/".$image6;
      $sql6="UPDATE digisurf_payment SET image6='".$filename."' where code ='".$current_lang."' ";
      $retval6 = mysql_query( $sql6, $conn );
                   if(! $retval6 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image7 != null) {
      $file_tmp7 =$_FILES['payment_image7']['tmp_name'];
      move_uploaded_file($file_tmp7, getcwd()."/../../uploads/".$image7);
      $filename = "/uploads/".$image7;
      $sql7="UPDATE digisurf_payment SET image7='".$filename."' where code ='".$current_lang."' ";
      $retval7 = mysql_query( $sql7, $conn );
                   if(! $retval7 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image8 != null) {
      $file_tmp8 =$_FILES['payment_image8']['tmp_name'];
      move_uploaded_file($file_tmp8, getcwd()."/../../uploads/".$image8);
      $filename = "/uploads/".$image8;
      $sql8="UPDATE digisurf_payment SET image8='".$filename."' where code ='".$current_lang."' ";
      $retval8 = mysql_query( $sql8, $conn );
                   if(! $retval8 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image9 != null) {
      $file_tmp9 =$_FILES['payment_image9']['tmp_name'];
      move_uploaded_file($file_tmp9, getcwd()."/../../uploads/".$image9);
      $filename = "/uploads/".$image9;
      $sql9="UPDATE digisurf_payment SET image9='".$filename."' where code ='".$current_lang."' ";
      $retval9 = mysql_query( $sql9, $conn );
                   if(! $retval9 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image10 != null) {
      $file_tmp10 =$_FILES['payment_image10']['tmp_name'];
      move_uploaded_file($file_tmp10, getcwd()."/../../uploads/".$image10);
      $filename = "/uploads/".$image10;
      $sql10="UPDATE digisurf_payment SET image10='".$filename."' where code ='".$current_lang."' ";
      $retval10 = mysql_query( $sql10, $conn );
                   if(! $retval10 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image11 != null) {
      $file_tmp11 =$_FILES['payment_image11']['tmp_name'];
      move_uploaded_file($file_tmp11, getcwd()."/../../uploads/".$image11);
      $filename = "/uploads/".$image11;
      $sql11="UPDATE digisurf_payment SET image11='".$filename."' where code ='".$current_lang."' ";
      $retval11 = mysql_query( $sql11, $conn );
                   if(! $retval11 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }
                       header("Refresh:0; url=/Admin/Pricing");
}



?>