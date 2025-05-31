<?php 
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];

$result = '';

$myusername = mysql_real_escape_string($_POST['user'],$conn);
$mypassword = mysql_real_escape_string($_POST['onepass'],$conn);

     $hash_sql="SELECT ct_WebPassword FROM cormember  WHERE ct_Mobile='$myusername' ";     
      $hash_result=mysql_query($hash_sql, $conn);
      
      $hashed_row = mysql_fetch_array($hash_result, MYSQL_ASSOC);
      $hashed_password = $hashed_row['password'];
      $pw = $hashed_row['ct_WebPassword'];

      //if(crypt($mypassword, $hashed_password) === $hashed_password) { 
    if($pw === $mypassword) {       
      $result = "Y";    

   } else{
      $result = 'N';    
   } 
      
echo $result;


?>