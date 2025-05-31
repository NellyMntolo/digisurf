<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
error_reporting(0);
$current_lang = $_SESSION['lang'];
$error = '';

if(isset($_POST['sign_up'])){

  if(!empty($_POST['text1']) && !empty($_POST['text2']) && !empty($_POST['text3']) && !empty($_POST['text4']) && !empty($_POST['code'])  ){

      if($_POST['code'] == $_SESSION['rand_code']) {

  $max_misc = 'SELECT customer_id FROM shop_digisurf_customer ORDER BY customer_id DESC';
  $retvalmax_miscen = mysql_query( $max_misc, $conn );                 
                             if(! $retvalmax_miscen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
  $rowmax_miscen = mysql_fetch_array($retvalmax_miscen, MYSQL_ASSOC);
  $large_misc = $rowmax_miscen['customer_id'];

  $themisc = $large_misc+1;
  
  $entext1 = mysql_real_escape_string($_POST['text1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['text2'],$conn);
  $entext3 = mysql_real_escape_string($_POST['text3'],$conn);
  $entext4 = mysql_real_escape_string($_POST['text4'],$conn);


  $seed = str_split('1234567890'); // and any other characters
  shuffle($seed); // probably optional since array_is randomized; this may be redundant
  $rand = '';
  foreach (array_rand($seed, 10) as $k) $rand .= $seed[$k];

$vowels = array(" ", "&", "?", "/");
$enurl = str_replace($vowels, '_', $entext1);
  $sqla = 'INSERT INTO shop_digisurf_customer (customer_id, customer_first_name, customer_last_name, customer_email, customer_password, customer_reg_date, customer_approve, customer_type, customer_url, customer_member_id) VALUES ( "'.$themisc.'", "'.$entext1.'", "'.$entext2.'", "'.$entext3.'", "'.$entext4.'", now(), "N", "R", "'.$enurl.'", "'.$rand.'")';

  $retvala = mysql_query( $sqla, $conn );
    if(! $retvala ) {  
        die('Could not enter data: ' . mysql_error());
      }

$sqlb = 'INSERT INTO shop_digisurf_address (customer_id) VALUES ( "'.$themisc.'")';

  $retvalb = mysql_query( $sqlb, $conn );
    if(! $retvalb ) {  
        die('Could not enter data: ' . mysql_error());
      }

$sqlc = 'INSERT INTO shop_digisurf_group_members (customer_id) VALUES ( "'.$themisc.'")';

  $retvalc = mysql_query( $sqlc, $conn );
    if(! $retvalc ) {  
        die('Could not enter data: ' . mysql_error());
      }

      header("Refresh:0; url=/Home");

    }else{
      $error = 'Please enter correct security code!';
   }

   } else{
      $error = 'Please fill in ALL fields!';
   }

}
?>