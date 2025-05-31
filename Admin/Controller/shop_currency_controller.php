<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];
$secret = md5(uniqid(rand()));

if(isset($_POST['create_currency_submit'])){
  $max_misc = 'SELECT currency_id FROM shop_digisurf_currency ORDER BY currency_id DESC';
  $retvalmax_miscen = mysql_query( $max_misc, $conn );                 
                             if(! $retvalmax_miscen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
  $rowmax_miscen = mysql_fetch_array($retvalmax_miscen, MYSQL_ASSOC);
  $large_misc = $rowmax_miscen['currency_id'];


$themisc = $large_misc+1;

  $entext1 = mysql_real_escape_string($_POST['content_text1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['content_text2'],$conn);
  $entext3 = mysql_real_escape_string($_POST['content_text3'],$conn);
  $entext4 = mysql_real_escape_string($_POST['content_text4'],$conn);
  $entext5 = mysql_real_escape_string($_POST['content_text5'],$conn);

  $sqla = 'INSERT INTO shop_digisurf_currency (currency_id,currency_name,currency_iso_code,currency_iso_num,currency_sign,currency_status) VALUES ("'.$themisc.'", "'.$entext1.'", "'.$entext2.'", "'.$entext3.'", "'.$entext4.'", "'.$entext5.'")';

  $retvala = mysql_query( $sqla, $conn );
    if(! $retvala ) {  
        die('Could not enter data: ' . mysql_error());
      }

      header("Refresh:0; url=/Admin/AllCurrencies/");
}


if(isset($_POST['edit_currency_submit'])){

  $currencyid = mysql_real_escape_string($_POST['currency_id'],$conn);

  $entext1 = mysql_real_escape_string($_POST['content_text1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['content_text2'],$conn);
  $entext3 = mysql_real_escape_string($_POST['content_text3'],$conn);
  $entext4 = mysql_real_escape_string($_POST['content_text4'],$conn);
  $entext5 = mysql_real_escape_string($_POST['content_text5'],$conn);

 $sql="UPDATE shop_digisurf_currency SET currency_name='".$entext1."', currency_iso_code='".$entext2."', currency_iso_num='".$entext3."', currency_sign='".$entext4."', currency_status='".$entext5."' WHERE currency_id='".$currencyid."' LIMIT 1 ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

              header("Refresh:0; url=/Admin/AllCurrencies/");
}


if(isset($_POST['delete_currency_submit'])){
  $currencyid = mysql_real_escape_string($_POST['currency_id'],$conn);

        $sqlin = 'DELETE FROM shop_digisurf_currency WHERE currency_id ="'.$currencyid.'" LIMIT 1';
                 $retvalin = mysql_query( $sqlin, $conn );
                   if(! $retvalin )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }


        $sqlreseten1 = "ALTER TABLE shop_digisurf_currency DROP idx; ";
        $sqlreseten2 = "ALTER TABLE shop_digisurf_currency AUTO_INCREMENT = 1; ";
        $sqlreseten3 = "ALTER TABLE shop_digisurf_currency ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

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

                       header("Refresh:0; url=/Admin/AllCurrencies/");
}

?>