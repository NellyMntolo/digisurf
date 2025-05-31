<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];


if(isset($_POST['promo_submit'])){


$entext1 = mysql_real_escape_string($_POST['promo_text'],$conn);

  $sqla = 'INSERT INTO shop_digisurf_promo (promo_text, promo_date) VALUES ("'.$entext1.'", now())';

  $retvala = mysql_query( $sqla, $conn );
    if(! $retvala ) {  
        die('Could not enter data: ' . mysql_error());
      }

      header("Refresh:0; url=/Admin/Home");

}
?>