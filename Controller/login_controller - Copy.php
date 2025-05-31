<?php 
   include("../Model/dbconfig.php");
   mysql_set_charset("utf8");
   header('Content-Type: text/html; charset=utf-8');
   session_start();
   error_reporting(0);
  $error = '';

$results = '';


      $myusername=mysql_real_escape_string($_POST['username'],$conn);
      $mypassword=mysql_real_escape_string($_POST['password'],$conn);

      //$hash_sql="SELECT password FROM cormember  WHERE ct_Email='$myusername' or ct_Phone='$myusername' ";
      $hash_sql="SELECT ct_WebPassword, ct_LimitWebLogin FROM cormember  WHERE ct_Mobile='$myusername' OR ct_Phone='$myusername' ";  //ifnull limitelogin column     
      $hash_result=mysql_query($hash_sql, $conn);
      
      $hashed_row = mysql_fetch_array($hash_result, MYSQL_ASSOC);
      //$hashed_password = $hashed_row['password'];
      $pw = $hashed_row['ct_WebPassword'];
      $ct_LimitWebLogin = $hashed_row['ct_LimitWebLogin'];

      //if(crypt($mypassword, $hashed_password) === $hashed_password) { 
   // if($pw === $mypassword && $ct_LimitWebLogin != 1 ){ // 7 Days ban


      //echo $pw.' '.$mypassword;
      if($pw === $mypassword && $ct_LimitWebLogin != 1){
      
      //$sql="SELECT * FROM cormember WHERE ct_Email='$myusername' or ct_Phone='$myusername' and password='$hashed_password'"; 
      $sql="SELECT * FROM cormember WHERE ct_Mobile='$myusername' or ct_Phone='$myusername' and ct_WebPassword='$pw'";      
      $result=mysql_query($sql, $conn);
      
      $count=mysql_num_rows($result);
      //echo $count;

      if(! $result )
          {
            die('Could not confirm user: ' . mysql_error());
          }
      $row_customer = mysql_fetch_array($result, MYSQL_ASSOC);
       $customer_mobile = $row_customer['ct_Mobile'];
       $customer_phone = $row_customer['ct_Phone'];
       $customer_name = $row_customer['ct_Name'];
       // echo $customer_phone;
       // echo $customer_name;

       $login_visitor = '';

       if($customer_mobile != ''){
        $login_visitor = $customer_mobile;
       } else {
        $login_visitor = $customer_phone;
       }
        
      if($count==1) {
        $_SESSION['login_visitor']=$login_visitor;
        $_SESSION['login_name']=$customer_name;  
        $results = 'Y'; 
         
           //header("location: /Booking");
         } elseif($count > 1){
          $results = 'D';
         } 

   } elseif ($ct_LimitWebLogin == 1){
      $results = 'L';

   }
    else {
      $results = 'N';

   } 

echo $results;

// 7 days ban
// elseif ($ct_LimitWebLogin == 1){
//       $results = 'L';

//    }

 
?>