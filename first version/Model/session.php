<?php
   include('dbconfig.php');
  mysql_set_charset("utf8");
  error_reporting(0);
  session_start();

   
   $user_check=$_SESSION['login_visitor'];

   $ses_sql=mysql_query("select * from shop_digisurf_customer where customer_email='$user_check'",$conn);
	

   if($ses_sql === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
   
  $row=mysql_fetch_array($ses_sql,MYSQL_ASSOC);
  
   
   $login_session=$row['customer_email'];

   if(!isset($_SESSION['login_visitor'])){
      header("location:/Login");
   }

   $time = $_SERVER['REQUEST_TIME'];
    /**
     * for a 30 minute timeout, specified in seconds
     */
    $timeout_duration = 86400;

    /**
     * Here we look for the user’s LAST_ACTIVITY timestamp. If
     * it’s set and indicates our $timeout_duration has passed, 
     * blow away any previous $_SESSION data and start a new one.
     */
    if (isset($_SESSION['LAST_ACTIVITY']) && ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
          session_unset();     
          session_destroy();          
          header("Location: /LogoutAccount");


          //header("Location: /Admin/Lock/");
          //session_start();    
        }
        
    /**
     * Finally, update LAST_ACTIVITY so that our timeout 
     * is based on it and not the user’s login time.
     */
    $_SESSION['LAST_ACTIVITY'] = $time;
?>