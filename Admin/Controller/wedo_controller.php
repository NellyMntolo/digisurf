<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();


if(isset($_POST['page_submit'])){

	$zhtext1 = mysql_real_escape_string($_POST['general_zhtext1'],$conn);
  $zhtext2 = mysql_real_escape_string($_POST['general_zhtext2'],$conn);
  $zhtext3 = mysql_real_escape_string($_POST['general_zhtext3'],$conn);
  $zhtext4 = mysql_real_escape_string($_POST['general_zhtext4'],$conn);

  $zhtext5 = mysql_real_escape_string($_POST['content_zhtext1'],$conn);
  $zhtext6 = mysql_real_escape_string($_POST['content_zhtext2'],$conn);
  $zhtext7 = mysql_real_escape_string($_POST['content_zhtext3'],$conn);
  $zhtext8 = mysql_real_escape_string($_POST['content_zhtext4'],$conn);
  $zhtext9 = mysql_real_escape_string($_POST['content_zhtext5'],$conn);
  $zhtext10 = mysql_real_escape_string($_POST['content_zhtext6'],$conn);
  $zhtext11 = mysql_real_escape_string($_POST['content_zhtext7'],$conn);
  $zhtext12 = mysql_real_escape_string($_POST['content_zhtext8'],$conn);
  $zhtext13 = mysql_real_escape_string($_POST['content_zhtext9'],$conn);
  $zhtext14 = mysql_real_escape_string($_POST['content_zhtext10'],$conn);
  $zhtext15 = mysql_real_escape_string($_POST['content_zhtext11'],$conn);
  $zhtext16 = mysql_real_escape_string($_POST['content_zhtext12'],$conn);
  $zhtext17 = mysql_real_escape_string($_POST['content_zhtext13'],$conn);
  $zhtext18 = mysql_real_escape_string($_POST['content_zhtext14'],$conn);
  $zhtext19 = mysql_real_escape_string($_POST['content_zhtext15'],$conn);
  $zhtext20 = mysql_real_escape_string($_POST['content_zhtext16'],$conn);
  $zhtext21 = mysql_real_escape_string($_POST['content_zhtext17'],$conn);
  $zhtext22 = mysql_real_escape_string($_POST['content_zhtext18'],$conn);
  $zhtext23 = mysql_real_escape_string($_POST['content_zhtext19'],$conn);
  $zhtext24 = mysql_real_escape_string($_POST['content_zhtext20'],$conn);
  $zhtext25 = mysql_real_escape_string($_POST['content_zhtext21'],$conn);
  $zhtext26 = mysql_real_escape_string($_POST['content_zhtext22'],$conn);
  $zhtext27 = mysql_real_escape_string($_POST['content_zhtext23'],$conn);
  $zhtext28 = mysql_real_escape_string($_POST['content_zhtext24'],$conn);
  $zhtext29 = mysql_real_escape_string($_POST['content_zhtext25'],$conn);
  $zhtext30 = mysql_real_escape_string($_POST['content_zhtext26'],$conn);
  $zhtext31 = mysql_real_escape_string($_POST['content_zhtext27'],$conn);
  $zhtext32 = mysql_real_escape_string($_POST['content_zhtext28'],$conn);
  $zhtext33 = mysql_real_escape_string($_POST['content_zhtext29'],$conn);
  $zhtext34 = mysql_real_escape_string($_POST['content_zhtext30'],$conn);
  $zhtext35 = mysql_real_escape_string($_POST['content_zhtext31'],$conn);
  $zhtext36 = mysql_real_escape_string($_POST['content_zhtext32'],$conn);
  $zhtext37 = mysql_real_escape_string($_POST['content_zhtext33'],$conn);
  $zhtext38 = mysql_real_escape_string($_POST['content_zhtext34'],$conn);
  $zhtext39 = mysql_real_escape_string($_POST['content_zhtext35'],$conn);
  $zhtext40 = mysql_real_escape_string($_POST['content_zhtext36'],$conn);
  $zhtext41 = mysql_real_escape_string($_POST['content_zhtext37'],$conn);
  $zhtext42 = mysql_real_escape_string($_POST['content_zhtext38'],$conn);
  $zhtext43 = mysql_real_escape_string($_POST['content_zhtext39'],$conn);
  $zhtext44 = mysql_real_escape_string($_POST['content_zhtext40'],$conn);
  $zhtext45 = mysql_real_escape_string($_POST['content_zhtext41'],$conn);
  $zhtext46 = mysql_real_escape_string($_POST['content_zhtext42'],$conn);
  $zhtext47 = mysql_real_escape_string($_POST['content_zhtext43'],$conn);
  $zhtext48 = mysql_real_escape_string($_POST['content_zhtext44'],$conn);
  $zhtext49 = mysql_real_escape_string($_POST['content_zhtext45'],$conn);
  $zhtext50 = mysql_real_escape_string($_POST['content_zhtext46'],$conn);
  $zhtext51 = mysql_real_escape_string($_POST['content_zhtext47'],$conn);
  $zhtext52 = mysql_real_escape_string($_POST['content_zhtext48'],$conn);
  $zhtext53 = mysql_real_escape_string($_POST['content_zhtext49'],$conn);
  $zhtext54 = mysql_real_escape_string($_POST['content_zhtext50'],$conn);
  $zhtext55 = mysql_real_escape_string($_POST['content_zhtext51'],$conn);
  $zhtext56 = mysql_real_escape_string($_POST['content_zhtext52'],$conn);
	$zhimage1 = $_FILES['wedo_image1']['name'];
	$zhimage2 = $_FILES['wedo_image2']['name'];
  $zhimage3 = $_FILES['wedo_image3']['name'];
  $zhimage4 = $_FILES['wedo_image4']['name'];
  $zhimage5 = $_FILES['wedo_image5']['name'];
  $zhimage6 = $_FILES['wedo_image6']['name'];
  $zhimage7 = $_FILES['wedo_image7']['name'];


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
	$image1 = $_FILES['wedo_image1']['name'];
	$image2 = $_FILES['wedo_image2']['name'];
  $image3 = $_FILES['wedo_image3']['name'];
  $image4 = $_FILES['wedo_image4']['name'];
  $image5 = $_FILES['wedo_image5']['name'];
  $image6 = $_FILES['wedo_image6']['name'];
  $image7 = $_FILES['wedo_image7']['name'];


 $sql="UPDATE think_wedo_en SET text1='".$entext1."', text2='".$entext2."', text3='".$entext3."', text4='".$entext4."', text5='".$entext5."', text6='".$entext6."', text7='".$entext7."', text8='".$entext8."', text9='".$entext9."', text10='".$entext10."', text11='".$entext11."', text12='".$entext12."', text13='".$entext13."', text14='".$entext14."', text15='".$entext15."', text16='".$entext16."', text17='".$entext17."', text18='".$entext18."', text19='".$entext19."', text20='".$entext20."', text21='".$entext21."', text22='".$entext22."', text23='".$entext23."', text24='".$entext24."', text25='".$entext25."', text26='".$entext26."', text27='".$entext27."', text28='".$entext28."', text29='".$entext29."', text30='".$entext30."', text31='".$entext31."', text32='".$entext32."', text33='".$entext33."', text34='".$entext34."', text34='".$entext34."', text35='".$entext35."', text36='".$entext36."', text37='".$entext37."', text38='".$entext38."', text39='".$entext39."', text40='".$entext40."', text41='".$entext41."', text42='".$entext42."', text43='".$entext43."', text44='".$entext44."', text45='".$entext45."', text46='".$entext46."', text47='".$entext47."', text48='".$entext48."', text49='".$entext49."', text50='".$entext50."', text51='".$entext51."', text52='".$entext52."', text53='".$entext53."', text54='".$entext54."', text55='".$entext55."', text56='".$entext56."' ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

 $sqlzh="UPDATE think_wedo_zh SET text1='".$zhtext1."', text2='".$zhtext2."', text3='".$zhtext3."', text4='".$zhtext4."', text5='".$zhtext5."', text6='".$zhtext6."', text7='".$zhtext7."', text8='".$zhtext8."', text9='".$zhtext9."', text10='".$zhtext10."', text11='".$zhtext11."', text12='".$zhtext12."', text13='".$zhtext13."', text14='".$zhtext14."', text15='".$zhtext15."', text16='".$zhtext16."', text17='".$zhtext17."', text18='".$zhtext18."', text19='".$zhtext19."', text20='".$zhtext20."', text21='".$zhtext21."', text22='".$zhtext22."', text23='".$zhtext23."', text24='".$zhtext24."', text25='".$zhtext25."', text26='".$zhtext26."', text27='".$zhtext27."', text28='".$zhtext28."', text29='".$zhtext29."', text30='".$zhtext30."', text31='".$zhtext31."', text32='".$zhtext32."', text33='".$zhtext33."', text34='".$zhtext34."', text34='".$zhtext34."', text35='".$zhtext35."', text36='".$zhtext36."', text37='".$zhtext37."', text38='".$zhtext38."', text39='".$zhtext39."', text40='".$zhtext40."', text41='".$zhtext41."', text42='".$zhtext42."', text43='".$zhtext43."', text44='".$zhtext44."', text45='".$zhtext45."', text46='".$zhtext46."', text47='".$zhtext47."', text48='".$zhtext48."', text49='".$zhtext49."', text50='".$zhtext50."', text51='".$zhtext51."', text52='".$zhtext52."', text53='".$zhtext53."', text54='".$zhtext54."', text55='".$zhtext55."', text56='".$zhtext56."' ";              
                   $retvalzh = mysql_query( $sqlzh, $conn );
                   if(! $retvalzh )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

    if($image1 != null) {
      $file_tmp1 =$_FILES['wedo_image1']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../uploads/".$image1);
      $filename = "/uploads/".$image1;
      $sql1="UPDATE think_wedo_en SET image1='".$filename."'";
      $retval1 = mysql_query( $sql1, $conn );
                   if(! $retval1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
      $sql2="UPDATE think_wedo_zh SET image1='".$filename."'";
      $retval2 = mysql_query( $sql2, $conn );
                   if(! $retval2 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image2 != null) {
      $file_tmp1 =$_FILES['wedo_image2']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../uploads/".$image2);
      $filename = "/uploads/".$image2;
      $sql1="UPDATE think_wedo_en SET image2='".$filename."'";
      $retval1 = mysql_query( $sql1, $conn );
                   if(! $retval1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
      $sql2="UPDATE think_wedo_zh SET image2='".$filename."'";
      $retval2 = mysql_query( $sql2, $conn );
                   if(! $retval2 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image3 != null) {
      $file_tmp1 =$_FILES['wedo_image3']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../uploads/".$image3);
      $filename = "/uploads/".$image3;
      $sql1="UPDATE think_wedo_en SET image3='".$filename."'";
      $retval1 = mysql_query( $sql1, $conn );
                   if(! $retval1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
      $sql3="UPDATE think_wedo_zh SET image3='".$filename."'";
      $retval3 = mysql_query( $sql3, $conn );
                   if(! $retval3 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image4 != null) {
      $file_tmp1 =$_FILES['wedo_image4']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../uploads/".$image4);
      $filename = "/uploads/".$image4;
      $sql1="UPDATE think_wedo_en SET image4='".$filename."'";
      $retval1 = mysql_query( $sql1, $conn );
                   if(! $retval1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
      $sql4="UPDATE think_wedo_zh SET image4='".$filename."'";
      $retval4 = mysql_query( $sql4, $conn );
                   if(! $retval4 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image5 != null) {
      $file_tmp1 =$_FILES['wedo_image5']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../uploads/".$image5);
      $filename = "/uploads/".$image5;
      $sql1="UPDATE think_wedo_en SET image5='".$filename."'";
      $retval1 = mysql_query( $sql1, $conn );
                   if(! $retval1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
      $sql5="UPDATE think_wedo_zh SET image5='".$filename."'";
      $retval5 = mysql_query( $sql5, $conn );
                   if(! $retval5 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image6 != null) {
      $file_tmp1 =$_FILES['wedo_image6']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../uploads/".$image6);
      $filename = "/uploads/".$image6;
      $sql1="UPDATE think_wedo_en SET image6='".$filename."'";
      $retval1 = mysql_query( $sql1, $conn );
                   if(! $retval1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
      $sql6="UPDATE think_wedo_zh SET image6='".$filename."'";
      $retval6 = mysql_query( $sql6, $conn );
                   if(! $retval6 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image7 != null) {
      $file_tmp1 =$_FILES['wedo_image7']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../uploads/".$image7);
      $filename = "/uploads/".$image7;
      $sql1="UPDATE think_wedo_en SET image7='".$filename."'";
      $retval1 = mysql_query( $sql1, $conn );
                   if(! $retval1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
      $sql2="UPDATE think_wedo_zh SET image7='".$filename."'";
      $retval2 = mysql_query( $sql2, $conn );
                   if(! $retval2 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

   /*

    if($image3 != null) {
      $wedo_image3 = addslashes(file_get_contents($_FILES['wedo_image3']['tmp_name']));
      $sqlimage3="UPDATE think_wedo_en SET image3='".$wedo_image3."'";
      $retvalimage3 = mysql_query( $sqlimage3, $conn );
                   if(! $retvalimage3 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }


    if($image4 != null) {
      $wedo_image4 = addslashes(file_get_contents($_FILES['wedo_image4']['tmp_name']));
      $sqlimage4="UPDATE think_wedo_en SET image4='".$wedo_image4."'";
      $retvalimage4 = mysql_query( $sqlimage4, $conn );
                   if(! $retvalimage4 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image5 != null) {
      $wedo_image5 = addslashes(file_get_contents($_FILES['wedo_image5']['tmp_name']));
      $sqlimage5="UPDATE think_wedo_en SET image5='".$wedo_image5."'";
      $retvalimage5 = mysql_query( $sqlimage5, $conn );
                   if(! $retvalimage5 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($image6 != null) {
      $wedo_image6 = addslashes(file_get_contents($_FILES['wedo_image6']['tmp_name']));
      $sqlimage6="UPDATE think_wedo_en SET image6='".$wedo_image6."'";
      $retvalimage6 = mysql_query( $sqlimage6, $conn );
                   if(! $retvalimage6 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

   

    if($zhimage3 != null) {
      $wedo_image3 = addslashes(file_get_contents($_FILES['wedo_image3']['tmp_name']));
      $sqlimage3="UPDATE think_wedo_zh SET image3='".$wedo_image3."'";
      $retvalimage3 = mysql_query( $sqlimage3, $conn );
                   if(! $retvalimage3 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($zhimage4 != null) {
      $wedo_image4 = addslashes(file_get_contents($_FILES['wedo_image4']['tmp_name']));
      $sqlimage4="UPDATE think_wedo_zh SET image4='".$wedo_image4."'";
      $retvalimage4 = mysql_query( $sqlimage4, $conn );
                   if(! $retvalimage4 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($zhimage5 != null) {
      $wedo_image5 = addslashes(file_get_contents($_FILES['wedo_image5']['tmp_name']));
      $sqlimage5="UPDATE think_wedo_zh SET image5='".$wedo_image5."'";
      $retvalimage5 = mysql_query( $sqlimage5, $conn );
                   if(! $retvalimage5 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

    if($zhimage6 != null) {
      $wedo_image6 = addslashes(file_get_contents($_FILES['wedo_image6']['tmp_name']));
      $sqlimage6="UPDATE think_wedo_zh SET image6='".$wedo_image6."'";
      $retvalimage6 = mysql_query( $sqlimage6, $conn );
                   if(! $retvalimage6 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }
*/
  


                       header("Refresh:0; url=/Admin/WeDo");
}


?>