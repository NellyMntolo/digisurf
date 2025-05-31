<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");

session_start();
error_reporting(E_ALL);
$current_lang = $_SESSION['lang'];
$error = '';
$result = '';

$entext1 = '';
$entext2 = '';
$customer_email = '';
$code = '';
$themisc = '';

if(isset($_POST['customer_submit'])){

  if(!empty($_POST['Password']) && !empty($_POST['customer_first_name']) && !empty($_POST['customer_last_name']) ) {

    $Password_entext1 = mysql_real_escape_string($_POST['Password'],$conn);
    $customer_first_name_entext2 = mysql_real_escape_string($_POST['customer_first_name'],$conn);
    $customer_last_name_entext3 = mysql_real_escape_string($_POST['customer_last_name'],$conn);
    $customer_address_entext4 = mysql_real_escape_string($_POST['customer_address'],$conn);

$sql="UPDATE shop_digisurf_customer SET customer_password='".$Password_entext1."', customer_first_name='".$customer_first_name_entext2."', customer_last_name='".$customer_last_name_entext3."' where customer_email='".$_SESSION['login_visitor']."' LIMIT 1";            
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

      $address_sql="UPDATE shop_digisurf_address SET customer_id='".$themisc."', address_city='".$customer_address_entext4."' ";              
                   $address_retval = mysql_query( $address_sql, $conn );
                   if(! $address_retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }
      $result = 'Y';
      header('Location: ' . $_SERVER['HTTP_REFERER']);

    } else {
      $result = 'L';
   } 

   if ($customer_email == $_POST['username']) {
      $result = 'D';
   }

}
echo $result;
?>