<?php 
   include("../Model/dbconfig.php");
   mysql_set_charset("utf8");
   header('Content-Type: text/html; charset=utf-8');
   session_start();
   error_reporting(E_ALL);
  $error = '';

$results = '';

if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['login_code'])  ){
  // echo 'got here 1';

    // if($_POST['login_code'] == $_SESSION['rand_code']) {
// echo 'got here 2';

      $myusername=mysql_real_escape_string($_POST['username'],$conn);
      $mypassword=mysql_real_escape_string($_POST['password'],$conn);

      $customer_sql="SELECT * FROM shop_digisurf_customer WHERE customer_email='$myusername' or customer_member_id='$myusername' and customer_password='$mypassword'";     
      $customer_result=mysql_query($customer_sql, $conn);
      
      $count=mysql_num_rows($customer_result);

      if(! $customer_result )
          {
            die('Could not confirm user: ' . mysql_error());
          }
      $row_customer = mysql_fetch_array($customer_result, MYSQL_ASSOC);
      $customer_id = $row_customer['customer_id'];
      $customer_type = $row_customer['customer_type'];
      $_SESSION['customer_type'] = $row_customer['customer_type'];
      $customer_last_update = $row_customer['customer_last_update'];
      $customer_approve = $row_customer['customer_approve'];
      $customer_email = $row_customer['customer_email'];
      $customer_first_name = $row_customer['customer_first_name'];
      $customer_member_id = $row_customer['customer_member_id'];

      $the_user = strstr($customer_email, '@', true);

       $login_visitor = '';

       if($customer_email != ''){
        $login_visitor = $customer_email;
       } else {
        $login_visitor = $customer_member_id;
       }
        
      if($count==1) {
        $_SESSION['login_visitor']=$customer_email;
        $customer_email=$_SESSION['login_visitor'];
        $_SESSION['login_name']=$the_user.'@...';
        // $_SESSION['login_name']=$customer_email;
        $_SESSION['customer_member_id']=$customer_member_id;
        $results = 'Y';
         } elseif($count > 1){
          $results = 'D';
         } 


   //}
   else{
      $results = 'L';
   }

   } else{
      $results = 'N';
   }

echo $results;

// 7 days ban
// elseif ($ct_LimitWebLogin == 1){
//       $results = 'L';

//    }

 
?>