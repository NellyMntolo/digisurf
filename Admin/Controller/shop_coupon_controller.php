<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];
$secret = md5(uniqid(rand()));


if(isset($_POST['create_coupon_submit'])){

  $entext1 = mysql_real_escape_string($_POST['content_text1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['content_text2'],$conn);
  $entext3 = mysql_real_escape_string($_POST['content_text3'],$conn);
  $entext5 = mysql_real_escape_string($_POST['content_text5'],$conn);
  //$entext6 = mysql_real_escape_string($_POST['content_text6'],$conn);

  $image1 = $_FILES['coupon_image1']['name'];
  $uploaded_image1 = '';

  if($image1 != null) {
    $file_tmp =$_FILES['coupon_image1']['tmp_name'];
      move_uploaded_file($file_tmp, getcwd()."/../../../../../../uploads/".$image1);
    $uploaded_image1 = "/uploads/".$image1;
  }

  $re = '[-]';
    $str = mysql_real_escape_string($_POST['content_text4'],$conn);
    preg_match_all($re, $str, $matches);

    $start_date = '';
    $end_date = '';
    $val []= preg_split('/-/', $str);
    foreach ($val as $key => $value) {
      $times = array("AM", " PM", "  ");
      $endates = str_replace($times, '', $value);
      $start_date = $endates[0];
      $end_date = $endates[1];      
    }

$vowels = array(" ", "&", "?", "/");
$enurl = str_replace($vowels, '_', $entext1);
  $sqla = 'INSERT INTO shop_digisurf_coupons (image1,coupon_name,coupon_code,coupon_discount,coupon_start_date,coupon_end_date,coupon_status,coupon_url) VALUES ("'.$uploaded_image1.'", "'.$entext1.'", "'.$entext2.'", "'.$entext3.'", "'.$start_date.'", "'.$end_date.'", "'.$entext5.'", "'.$enurl.'")';

  $retvala = mysql_query( $sqla, $conn );
    if(! $retvala ) {  
        die('Could not enter data: ' . mysql_error());
      }

      header("Refresh:0; url=/Admin/AllCoupons/");
}


if(isset($_POST['edit_coupon_submit'])){

  $couponid = mysql_real_escape_string($_POST['coupon_id'],$conn);

  $entext1 = mysql_real_escape_string($_POST['content_text1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['content_text2'],$conn);
  $entext3 = mysql_real_escape_string($_POST['content_text3'],$conn);
  $entext5 = mysql_real_escape_string($_POST['content_text5'],$conn);
  //$entext6 = mysql_real_escape_string($_POST['content_text6'],$conn);

  $image1 = $_FILES['coupon_image1']['name'];

  $re = '[-]';
    $str = mysql_real_escape_string($_POST['content_text4'],$conn);
    preg_match_all($re, $str, $matches);

    $start_date = '';
    $end_date = '';
    $val []= preg_split('/-/', $str);
    foreach ($val as $key => $value) {
      $times = array("AM", " PM", "  ");
      $endates = str_replace($times, '', $value);
      $start_date = $endates[0];
      $end_date = $endates[1];      
    }


 $sql="UPDATE shop_digisurf_coupons SET coupon_name='".$entext1."', coupon_code='".$entext2."', coupon_discount='".$entext3."', coupon_start_date='".$start_date."', coupon_end_date='".$end_date."', coupon_status='".$entext5."', coupon_url='".$entext6."' WHERE idx='".$couponid."' LIMIT 1 ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

    if($image1 != null) {
      $file_tmp1 =$_FILES['coupon_image1']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../../../../../uploads/".$image1);
      $filename = "/uploads/".$image1;
      $sql1="UPDATE shop_digisurf_coupons SET image1='".$filename."' WHERE idx ='".$couponid."' ";
      $retval1 = mysql_query( $sql1, $conn );
                   if(! $retval1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

              header("Refresh:0; url=/Admin/AllCoupons/");
}


if(isset($_POST['delete_coupon_submit'])){
  $couponid = mysql_real_escape_string($_POST['coupon_id'],$conn);

        $sqlin = 'DELETE FROM shop_digisurf_coupons WHERE idx ="'.$couponid.'" LIMIT 1';
                 $retvalin = mysql_query( $sqlin, $conn );
                   if(! $retvalin )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }


        $sqlreseten1 = "ALTER TABLE shop_digisurf_coupons DROP idx; ";
        $sqlreseten2 = "ALTER TABLE shop_digisurf_coupons AUTO_INCREMENT = 1; ";
        $sqlreseten3 = "ALTER TABLE shop_digisurf_coupons ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

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

                       header("Refresh:0; url=/Admin/AllCoupons/");
}

?>