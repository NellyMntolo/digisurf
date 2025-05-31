<?php
   include('dbconfig.php');
  mysql_set_charset("utf8");
  error_reporting(0);
   session_start();

   
   $user_check=$_SESSION['login_user'];

   $ses_sql=mysql_query("select * from think_master where user_n='$user_check'",$conn);
	

   if($ses_sql === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
   
  $row=mysql_fetch_array($ses_sql,MYSQL_ASSOC);
  
   
   $login_session=$row['user_n'];   
   $login_firstname=$row['firstname'];
   $login_lastname=$row['lastname'];
   $login_jobtitle=$row['jobtitle'];
   $login_dob=$row['dob'];
   $login_image=$row['image1'];
   $login_pass=$row['user_p'];
   $_SESSION['chat'] = $row['idx'];

   if(!isset($_SESSION['login_user'])){
      header("location:/Admin");
   }

   $time = $_SERVER['REQUEST_TIME'];
    /**
     * for a 30 minute timeout, specified in seconds
     */
    $timeout_duration = 3600;

    /**
     * Here we look for the user’s LAST_ACTIVITY timestamp. If
     * it’s set and indicates our $timeout_duration has passed, 
     * blow away any previous $_SESSION data and start a new one.
     */
    if (isset($_SESSION['LAST_ACTIVITY']) && ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
          //session_unset();     
          //session_destroy();          
          header("Location: /Admin/Logout");


          //header("Location: /Admin/Lock/");
          //session_start();    
        }
        
    /**
     * Finally, update LAST_ACTIVITY so that our timeout 
     * is based on it and not the user’s login time.
     */
    $_SESSION['LAST_ACTIVITY'] = $time;
?>