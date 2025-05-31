<?php 
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];
$result = '';


$myusername = mysql_real_escape_string($_POST['user'],$conn);
$mypassword = mysql_real_escape_string($_POST['onepass'],$conn);
$trap = '0'.$myusername.'';
     $hash_sql='SELECT ct_WebPassword FROM cormember  WHERE ct_Mobile='.$trap.' ';     
      $hash_result=mysql_query($hash_sql, $conn);
      
      $hashed_row = mysql_fetch_array($hash_result, MYSQL_ASSOC);
      $pw = $hashed_row['ct_WebPassword'];

    if($pw == $mypassword) {       
      $result = 'Y';    

   } elseif ($pw != $mypassword) {
      $result = 'N';    
   } 
      
echo $result;
//echo ' - '.$mypassword;


?>