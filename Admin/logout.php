<?php
   include 'Model/session.php';
   mysql_set_charset("utf8");
   session_start();

   //session_destroy();
   /*
   if(session_destroy())
   {
      header("Location: /Admin");
   }
   */

   $offline = 'offline';
         $sql_status="UPDATE user SET status='".$offline."' WHERE name ='".$user_check."' ";              
                   $retval_status = mysql_query( $sql_status, $conn );
                   if(! $retval_status )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }
   if(isset($_POST['end_session'])) {
   		//session_unset();
   		//session_destroy();
    unset($_SESSION['login_user']);
         
   		header("Location: /Admin");

         
   } else {
   		//session_unset();
   		//session_destroy();
      unset($_SESSION['login_user']);
   		header("Location: /Admin");

   }

   unset($_SESSION['login_user']);
      header("Location: /Admin");
?>